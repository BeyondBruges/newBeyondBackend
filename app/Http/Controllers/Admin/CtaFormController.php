<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCtaFormRequest;
use App\Http\Requests\StoreCtaFormRequest;
use App\Http\Requests\UpdateCtaFormRequest;
use App\Models\CtaForm;
use App\Models\Language;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CtaFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cta_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctaForms = CtaForm::with(['language'])->get();

        return view('admin.ctaForms.index', compact('ctaForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('cta_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ctaForms.create', compact('languages'));
    }

    public function store(StoreCtaFormRequest $request)
    {
        $ctaForm = CtaForm::create($request->all());

        return redirect()->route('admin.cta-forms.index');
    }

    public function edit(CtaForm $ctaForm)
    {
        abort_if(Gate::denies('cta_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ctaForm->load('language');

        return view('admin.ctaForms.edit', compact('ctaForm', 'languages'));
    }

    public function update(UpdateCtaFormRequest $request, CtaForm $ctaForm)
    {
        $ctaForm->update($request->all());

        return redirect()->route('admin.cta-forms.index');
    }

    public function show(CtaForm $ctaForm)
    {
        abort_if(Gate::denies('cta_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctaForm->load('language');

        return view('admin.ctaForms.show', compact('ctaForm'));
    }

    public function destroy(CtaForm $ctaForm)
    {
        abort_if(Gate::denies('cta_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ctaForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyCtaFormRequest $request)
    {
        CtaForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
