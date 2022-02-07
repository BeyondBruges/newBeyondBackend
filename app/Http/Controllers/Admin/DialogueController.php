<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDialogueRequest;
use App\Http\Requests\StoreDialogueRequest;
use App\Http\Requests\UpdateDialogueRequest;
use App\Models\Dialogue;
use App\Models\Hotspot;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DialogueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dialogue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dialogues = Dialogue::with(['hotspot'])->get();

        return view('admin.dialogues.index', compact('dialogues'));
    }

    public function create()
    {
        abort_if(Gate::denies('dialogue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotspots = Hotspot::pluck('key', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dialogues.create', compact('hotspots'));
    }

    public function store(StoreDialogueRequest $request)
    {
        $dialogue = Dialogue::create($request->all());

        return redirect()->route('admin.dialogues.index');
    }

    public function edit(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotspots = Hotspot::pluck('key', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dialogue->load('hotspot');

        return view('admin.dialogues.edit', compact('dialogue', 'hotspots'));
    }

    public function update(UpdateDialogueRequest $request, Dialogue $dialogue)
    {
        $dialogue->update($request->all());

        return redirect()->route('admin.dialogues.index');
    }

    public function show(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dialogue->load('hotspot');

        return view('admin.dialogues.show', compact('dialogue'));
    }

    public function destroy(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dialogue->delete();

        return back();
    }

    public function massDestroy(MassDestroyDialogueRequest $request)
    {
        Dialogue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
