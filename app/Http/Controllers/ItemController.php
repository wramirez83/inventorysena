<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function new(Request $res){
        $items = Item::all();
        return view('admin.item-new', compact('items'));
    }
    public function save(Request $res){
        $validator = Validator::make($res->all(), [
            'item' => 'required',
            'description' => 'required',
            'stock_min' => 'required',
            'stock_max' => 'required',
            'reference' => 'required'
        ]);
        if($validator->fails())
            return redirect()->back()->withErrors($validator);
        $data = $res->except(['_token']);
        $data['user_id'] = Auth::user()->id;
        
        Item::create($data);
        return redirect()->back()->with(['success' => 'Datos Guardados']);
    }
}
