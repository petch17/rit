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
            'priceparm' => $request->priceparm,
            'pricegrass' => $request->pricegrass,
            'pricepui' => $request->pricepui,
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
        $empp->priceparm = $request->priceparm;
        $empp->pricegrass = $request->pricegrass;
        $empp->pricepui = $request->pricepui;
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
        // return $request->date1;
       $bill = DB::table('works')
                ->join('work_details', 'works.id', '=', 'work_details.work_id')
                ->select('works.*', 'work_details.*' )
                ->where('begin_date','>=',  $request->date1  )
                ->where('end_date','<=',  $request->date2  )
                ->get();

                // return $bill;
                    $avg1 = 0;
                    $avg2 = 0;
                    $sack = 0;


                    foreach( $bill as $detail ){
                        if( $detail->working == "ตัดหญ้า"){
                            // return 1;
                            $sum1 = WorkDetail::sum('work_details.farm_grass'); // รวมจำนวนไร่ทั้งหมด
                            $grass = $sum1 * 500;
                            // return $grass;
                        }
                        elseif($detail->working == "ตัดปาล์ม"){
                            // return 2;
                            $sum2 = WorkDetail::sum('work_details.kilo_palm'); // รวมจำนวนปาล์มทั้งหมด
                            $palm = $sum2 * 3;
                            $avg1 = $palm * 0.3; //เงินที่เราได้จากการขาย 30 %
                            // return $avg1;
                            $avg2 = $sum2 - $avg1 ; //เงินที่ลูกค้าได้จากการขาย และ ลบส่วนที่ต้องแบ่งให้คนจ้าง 30 %
                        }
                        else{
                            // return 3;
                            $sum3 = WorkDetail::sum('work_details.unit_fertilizer'); // รวมจำนวนปุ๋ยทั้งหมด
                            $fertilizer = $sum3 / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
                            $sack = $fertilizer * 600;
                            // return $sack;
                        }
                    }

                    $result = $grass + $avg1 + $sack ; //เงินที่ได้จากการทำงานทั้งหมด 3 งาน
                    $boss = $result * 0.2 ; // เงินที่นายจ้างได้
                    $emp1 = $result - $boss ; //เงินทั้งหมด ลบ เงินที่นายจ้างได้
                    $emp2 = $emp1 / 5 ; // เงินที่ลบเงินนายจ้าง แล้วหาร 5 (ลูกจ้าง 5 คน แบ่งกัน) เงินที่ลูกจ้างได้

                    $day1 = $request->date1;
                    $day2 = $request->date2;

                    // return $emp2;

        return view('admin.report2',[
            'bills' => $bill , 'leader' => $boss , 'employee' => $emp2 , 'results' => $result ,
            'grass1' => $grass , 'palm1' => $avg1 , 'fertilizer1' => $sack,
            'begin_date' => $day1 , 'end_date' => $day2
            ]);
    }


}
