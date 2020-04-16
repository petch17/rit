<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Problem;
use App\User;
use Illuminate\Http\Request;
use App\Work;
use App\WorkDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function customers()
    {
        $customer = User::where('type','0')->get();
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

    public function emp()
    {
        $customer = User::get();
        return view('admin.employee',['customers' => $customer ] );
    }

    public function addemployee()
    {
        return view('admin.addemployee');
    }

    public function report()
    {
        $report = User::get();
        return view('admin.report',['report' => $report ]);
    }

    public function editcustomer()
    {
        $editcustomer = User::get();
        return view('admin.editcustomer',['editcustomer' => $editcustomer ]);
    }

    public function editemp()
    {
        $editemp = User::get();
        return view('admin.editemp',['editemp' => $editemp ]);
    }

    public function report2()
    {
        $report2 = User::get();
        return view('admin.report2',['report2' => $report2 ]);
    }

    public function addempstore(Request $request)
    {
        // return 1;
        $problem = new Problem();
        $problem->user_id = $request->user_id;
        $problem->desc = $request->desc;
        $problem->save();
        return redirect()->route('problem');

    }



}
