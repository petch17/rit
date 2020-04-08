<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit( )
    {
        // return 1;
        $bill = Bill::get();
        // $item = Auth::users();
        // return view('profile.index' , compact('item') );
        return view('bill.deposit',['bills' => $bill]);

    }

    public function monney(  )
    {
        // return 1;
        $bill = Bill::get();
        // $item = Auth::users();
        // return view('profile.index' , compact('item') )
        return view('bill.monney',['bills' => $bill]);

    }

    public function addbillstore(Request $request)
    {
        // return $request;

        User::where( 'id', Auth::user()->id )->update([
            'titlename' => $request->titlename,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile.index');;


    }

    public function addmonneystore(Request $request)
    {
        // return $request;

        User::where( 'id', Auth::user()->id )->update([
            'titlename' => $request->titlename,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile.index');;


    }

}
