<?php

namespace App\Http\Controllers\admin;

use App\Employee;
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

    public function details($id)
    {
        // return $id;
        $workde = WorkDetail::where('work_id',$id)->get();
        // return $workde;
        return view('admin.details',['wdetail' => $workde ]);
    }

    public function prob()
    {
        $prob = Problem::get();
        return view('admin.prob',['probb' => $prob ]);
    }

    public function emp()
    {
        $empp = Employee::get();
        return view('admin.employee',['empps' => $empp ] );
    }

    public function addemployee()
    {
        return view('admin.addemployee');
    }

    public function editcustomer($id)
    {
        $editcustomer = User::where('id',$id)->orderBy('id')->get();
        return view('admin.editcustomer',['editcustomer' => $editcustomer ]);
    }

    public function editemp($id)
    {
        // return 1;
        $editemp = Employee::where('id',$id)->orderBy('id')->get();
        return view('admin.editemp',['editemps' => $editemp ]);
    }

    public function empupdatestore(Request $request)
    {
        // return $request;

        Employee::where( 'id',$request->id )
        ->update([
            'titlename' => $request->titlename,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('emp');;
    }

    public function customerupdatestore(Request $request)
    {
        // return $request;

        User::where( 'id',$request->id )
        ->update([
            'titlename' => $request->titlename,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('customer');;
    }

    public function addempstore(Request $request)
    {
        // return 1;
        $empp = new Employee();
        $empp->titlename = $request->titlename;
        $empp->name = $request->name;
        $empp->lastname = $request->lastname;
        $empp->address = $request->address;
        $empp->phone = $request->phone;
        // return $empp;
        $empp->save();
        return redirect()->route('emp');

    }

    public function report()
    {
        return view('admin.report');
    }

    public function report2(Request $request)
    {
        // return $request;
        $report2 = Work::where('begin_date','>=',$request->date1)
                    ->where('end_date','<=',$request->date2)
                    ->get();
                    return $report2;

        return view('admin.report2',['report2' => $report2 ]);
    }


}
