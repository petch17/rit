<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\service;

class serviceController extends Controller
{
    public function index()
    {
        $services = service::all();


        return view('service',['services' => $services]);
    }
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([

            'service_name' =>'required|max:255',
            'desc' => 'required|max:500',
            'price' => 'required|integer',
            'unit' => 'required|integer',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',


        ]);
        $imageName = time() . '.' . $request->pic->extension();
        $validatedData['pic']->move(public_path('pics'), $imageName);
        $validatedData['pic'] = $imageName;

        $services = new service($validatedData);
        $services->save();
        return redirect()->back()->withInput();
    }
}
