<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactTextRequest;
use App\Http\Requests\StoreContactTextRequest;
use App\Http\Requests\UpdateContactTextRequest;
use App\Models\ContactText;
use App\Models\Language;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactTextController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_text_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactTexts = ContactText::with(['language'])->get();

        return view('admin.contactTexts.index', compact('contactTexts'));
    }

    public function create()
    {
        abort_if(Gate::denies('contact_text_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contactTexts.create', compact('languages'));
    }

    public function store(StoreContactTextRequest $request)
    {
        $contactText = ContactText::create($request->all());

        return redirect()->route('admin.contact-texts.index');
    }

    public function edit(ContactText $contactText)
    {
        abort_if(Gate::denies('contact_text_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contactText->load('language');

        return view('admin.contactTexts.edit', compact('contactText', 'languages'));
    }

    public function update(UpdateContactTextRequest $request, ContactText $contactText)
    {
        $contactText->update($request->all());

        return redirect()->route('admin.contact-texts.index');
    }

    public function show(ContactText $contactText)
    {
        abort_if(Gate::denies('contact_text_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactText->load('language');

        return view('admin.contactTexts.show', compact('contactText'));
    }

    public function destroy(ContactText $contactText)
    {
        abort_if(Gate::denies('contact_text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactText->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactTextRequest $request)
    {
        ContactText::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
