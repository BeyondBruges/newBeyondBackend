<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionType;

class TransactionTypeController extends Controller
{
    public function index (){

        $transactionTypes = TransactionType::all();

        return view('admin.transactiontypes.index', compact('transactionTypes'));
    }

    public function create()
    {
        return view('admin.transactiontypes.create');
    }

    public function store(Request $request)
    {
        $transactionType = TransactionType::create($request->all());

        return redirect()->route('admin.transactiontypes.index');
    }

    public function edit($id)
    {
        $transactionType = TransactionType::find($id);
        return view('admin.transactiontypes.edit', compact('transactionType'));
    }

    public function update(Request $request, $id)
    {
        $transactionType = TransactionType::find($id);
        $transactionType->update($request->all());
        return redirect()->route('admin.transactiontypes.index');
    }

    public function show($id)
    {
        $transactionType = TransactionType::find($id);
        return view('admin.transactiontypes.show', compact('transactionType'));
    }

    public function destroy(TransactionType $TransactionType)
    {

        $analyticType->delete();

        return back();
    }

  
}
