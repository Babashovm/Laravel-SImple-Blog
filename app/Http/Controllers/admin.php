<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\admindata;

class admin extends Controller
{
    //admin Controller

	//middleware auth checking
    // public function __construct()
    // {
    // 	$this->middleware('auth');
    // }

    public function index()
    {
    	// return view('admin.index')->with('siyahi',admindata::all());
    	$list = admindata::orderBy('id','DESC')->paginate(5);
    	return view('admin.index')->with('siyahi',$list);

    }

    public function qeydet(Request $request)
    {
    	$saxla = new admindata();
    	$saxla->title = $request->input('title');
    	$saxla->full = $request->input('full');
    	$saxla->save();
    	return redirect('/admin');
    }

    public function sil($id)
    {
    	$sec = admindata::find($id);
    	$sec->delete();
    	return redirect()->back();
    }

    public function edit(Request $request)
    {
    	$id = $request->input('id');
    	$sec = admindata::find($id);
    	$sec->title = $request->input('title');
    	$sec->full = $request->input('full');
    	$sec->save();
    	return redirect()->back();
    }
}