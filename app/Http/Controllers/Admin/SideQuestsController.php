<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SideQuest;
use App\Models\Level;

class SideQuestsController extends Controller
{


	public function index(){

		$sidequests = SideQuest::all();
		return view('admin.sideQuests.index', compact('sidequests'));
	}

	public function create(){

		$levels = Level::all();
		return view('admin.sideQuests.create', compact('levels'));
	}

	public function store(Request $request){

		$sidequests = SideQuest::create($request->all());
		return redirect()->route('admin.side-quests.index');
	}

	public function edit($id){

		$sidequest = SideQuest::find($id);
		$levels = Level::all();
		return view('admin.sideQuests.edit', compact('sidequest', 'levels'));
	}

	public function update($id, Request $request){

		$sidequest = SideQuest::find($id);
		$sidequest->update($request->all());

		return redirect()->route('admin.side-quests.index');

	}
	


}
