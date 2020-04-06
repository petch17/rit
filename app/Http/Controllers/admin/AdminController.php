<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Problem;
use App\User;
use Illuminate\Http\Request;
use App\Work;
use App\WorkDetail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function customers()
    {
        $customer = User::get();
        return view('admin.customers' ,['customers' => $customer ] );
    }

    public function works()
    {
        $workss = Work::get();
        return view('admin.works' ,['wok' => $workss ]);
    }

    public function details()
    {
        $workde = WorkDetail::get();
        return view('admin.details',['wdetail' => $workde ]);
    }

    public function prob()
    {
        $prob = Problem::get();
        return view('admin.prob',['probb' => $prob ]);
    }

}
