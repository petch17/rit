<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    public function index( )
    {
        // return 1;
        $profiles = User::where('id', Auth::user()->id )->get();
        // $item = Auth::users();
        // return view('profile.index' , compact('item') );
        return view('profile.index',['profile' => $profiles]);

    }

    public function edit(  )
    {
        // return 1;
        $profiles = User::where('id', Auth::user()->id )->get();
        // $item = Auth::users();
        // return view('profile.index' , compact('item') );
        return view('profile.edit',['profile' => $profiles]);

    }

    public function profileupdatestore(Request $request)
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
