<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;

class HomeController extends Controller
{
    public function zervid()
    {
        return view('zervid');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            return view('admin/dashboard');
        }else{
            return view('home');
        }

    }

    public function profit()
    {
        return view('profit');
    }

    public function bill()
    {
        return view('bill');
    }

    public function problem()
    {
        return view('problem');
    }


    public function problemstore(Request $request)
    {
        // return 1;
        $problem = new Problem();
        $problem->user_id = $request->user_id;
        $problem->desc = $request->desc;
        $problem->save();
        return redirect()->route('problem');

    }

}
