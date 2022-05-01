<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSideQuest;
use App\Models\SideQuest;
use App\Models\User;

class UserSideQuestsController extends Controller
{
    public function index(){

        $usersidequests = UserSideQuest::all();
        return view('admin.userSideQuests.index', compact('usersidequests'));
    }

    public function create(){

        $users = User::all();
        $sidequests = SideQuest::all();
        return view('admin.userSideQuests.create', compact('users', 'sidequests'));
    }

    public function store(Request $request){

        $sidequests = UserSideQuest::create($request->all());
        return redirect()->route('admin.user-side-quests.index');
    }

    public function edit($id){

        $sidequest = UserSideQuest::find($id);
        $users = User::all();
        $sidequests = SideQuest::all();
        return view('admin.userSideQuests.edit', compact('sidequest', 'users', 'sidequests'));
    }

    public function update($id, Request $request){

        $sidequest = UserSideQuest::find($id);
        $sidequest->update($request->all());

        return redirect()->route('admin.user-side-quests.index');

    }
    

}
