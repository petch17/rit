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
        return view('profile.index',['profile' => $profiles]);

    }

    public function add( $id )
    {
        return $id;
        $profiles = User::find($id)->get();
        return view('profile.index',['profile' => $profiles]);

    }

}
