<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\xeberler;

class contents extends Controller
{
    //Content Controller

    public function index()
    {
    	return view('meqale.index')->with('siyahi',xeberler::all());

    }

    public function qeydet(Request $request)
    {
    	$saxla = new xeberler();
    	$saxla->title = $request->input('title');
    	$saxla->full = $request->input('full');
    	$saxla->save();
    	return redirect('/');
    }
}
