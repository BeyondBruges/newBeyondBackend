<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductDescriptionRequest;
use App\Http\Requests\StoreProductDescriptionRequest;
use App\Http\Requests\UpdateProductDescriptionRequest;
use App\Models\Product;
use App\Models\ProductDescription;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductDescriptionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productDescriptions = ProductDescription::with(['product'])->get();

        return view('admin.productDescriptions.index', compact('productDescriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productDescriptions.create', compact('products'));
    }

    public function store(StoreProductDescriptionRequest $request)
    {
        $productDescription = ProductDescription::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $productDescription->id]);
        }

        return redirect()->route('admin.product-descriptions.index');
    }

    public function edit(ProductDescription $productDescription)
    {
        abort_if(Gate::denies('product_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productDescription->load('product');

        return view('admin.productDescriptions.edit', compact('productDescription', 'products'));
    }

    public function update(UpdateProductDescriptionRequest $request, ProductDescription $productDescription)
    {
        $productDescription->update($request->all());

        return redirect()->route('admin.product-descriptions.index');
    }

    public function show(ProductDescription $productDescription)
    {
        abort_if(Gate::denies('product_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productDescription->load('product');

        return view('admin.productDescriptions.show', compact('productDescription'));
    }

    public function destroy(ProductDescription $productDescription)
    {
        abort_if(Gate::denies('product_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductDescriptionRequest $request)
    {
        ProductDescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_description_create') && Gate::denies('product_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProductDescription();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
