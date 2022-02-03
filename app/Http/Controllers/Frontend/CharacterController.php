<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCharacterRequest;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CharacterController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('character_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $characters = Character::with(['media'])->get();

        return view('frontend.characters.index', compact('characters'));
    }

    public function create()
    {
        abort_if(Gate::denies('character_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.characters.create');
    }

    public function store(StoreCharacterRequest $request)
    {
        $character = Character::create($request->all());

        if ($request->input('image', false)) {
            $character->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $character->id]);
        }

        return redirect()->route('frontend.characters.index');
    }

    public function edit(Character $character)
    {
        abort_if(Gate::denies('character_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.characters.edit', compact('character'));
    }

    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $character->update($request->all());

        if ($request->input('image', false)) {
            if (!$character->image || $request->input('image') !== $character->image->file_name) {
                if ($character->image) {
                    $character->image->delete();
                }
                $character->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($character->image) {
            $character->image->delete();
        }

        return redirect()->route('frontend.characters.index');
    }

    public function show(Character $character)
    {
        abort_if(Gate::denies('character_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.characters.show', compact('character'));
    }

    public function destroy(Character $character)
    {
        abort_if(Gate::denies('character_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $character->delete();

        return back();
    }

    public function massDestroy(MassDestroyCharacterRequest $request)
    {
        Character::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('character_create') && Gate::denies('character_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Character();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
