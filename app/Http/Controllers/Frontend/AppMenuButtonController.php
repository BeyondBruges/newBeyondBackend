<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppMenuButtonRequest;
use App\Http\Requests\StoreAppMenuButtonRequest;
use App\Http\Requests\UpdateAppMenuButtonRequest;
use App\Models\AppMenuButton;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppMenuButtonController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('app_menu_button_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appMenuButtons = AppMenuButton::all();

        return view('frontend.appMenuButtons.index', compact('appMenuButtons'));
    }

    public function create()
    {
        abort_if(Gate::denies('app_menu_button_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.appMenuButtons.create');
    }

    public function store(StoreAppMenuButtonRequest $request)
    {
        $appMenuButton = AppMenuButton::create($request->all());

        return redirect()->route('frontend.app-menu-buttons.index');
    }

    public function edit(AppMenuButton $appMenuButton)
    {
        abort_if(Gate::denies('app_menu_button_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.appMenuButtons.edit', compact('appMenuButton'));
    }

    public function update(UpdateAppMenuButtonRequest $request, AppMenuButton $appMenuButton)
    {
        $appMenuButton->update($request->all());

        return redirect()->route('frontend.app-menu-buttons.index');
    }

    public function show(AppMenuButton $appMenuButton)
    {
        abort_if(Gate::denies('app_menu_button_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.appMenuButtons.show', compact('appMenuButton'));
    }

    public function destroy(AppMenuButton $appMenuButton)
    {
        abort_if(Gate::denies('app_menu_button_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appMenuButton->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppMenuButtonRequest $request)
    {
        AppMenuButton::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
