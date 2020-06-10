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
                ->where('status_bill','=',  'ชำระแล้ว'  )
                ->where('begin_date','>=',  $request->date1  )
                ->where('end_date','<=',  $request->date2  )
                ->get();

                // return $bill;
                    $palm_2 = 0;
                    $avg2 = 0;
                    $pui = 0;

                    foreach( $bill as $detail ){
                        if( $detail->working == "ตัดหญ้า" ){
                            // return 1;
                            $sum1 = DB::table('works')
                                    ->join('work_details', 'works.id', '=', 'work_details.work_id')
                                    ->select('works.*', 'work_details.*' )
                                    ->where('status_bill','=',  'ชำระแล้ว'  )
                                    ->where('begin_date','>=',  $request->date1  )
                                    ->where('end_date','<=',  $request->date2  )
                                    ->sum('work_details.farm_grass'); // รวมจำนวนไร่ทั้งหมด

                            $grass = $sum1 * 500;
                            $oil_1 = 100 * $sum1; //ค่าน้ำมัน

                            $val = $grass - $oil_1 ;
                            $val_boss = $val * 0.2 ; //เงินที่นายจ้างได้ ( นายจ้างได้เงิน 20% หลังจากหักค่าน้ำมันแล้ว )
                            $val_emp = ( $val - $val_boss ) / 5 ; //เงินที่ลูกจ้างได้ต่อคน

                            // return [ $sum1 , $grass , $oil_1 , $val , $val_boss , $val_emp ];
                        }
                        elseif($detail->working == "ตัดปาล์ม"){
                            // return 2;
                            $sum2  = DB::table('works')
                                    ->join('work_details', 'works.id', '=', 'work_details.work_id')
                                    ->select('works.*', 'work_details.*' )
                                    ->where('status_bill','=',  'ชำระแล้ว'  )
                                    ->where('begin_date','>=',  $request->date1  )
                                    ->where('end_date','<=',  $request->date2  )
                                    ->sum('work_details.kilo_palm'); // รวมจำนวนปาล์มทั้งหมด

                            $palm = $sum2 * 3;
                            $palm_2 = $palm * 0.3; //เงินที่เราได้จากการขาย 30 %
                            $avg2 = $sum2 - $palm_2 ; //เงินที่ลูกค้าได้จากการขาย และ ลบส่วนที่ต้องแบ่งให้คนจ้าง 30 %
                            $palm_bpss = $palm_2 * 0.2 ; //เงินที่นายจ้างได้ ( นายจ้างได้เงิน 20% หลังจากการขายหัก 30% แล้ว )
                            $palm_emp = ( $palm_2 - $palm_bpss ) / 5 ; //เงินที่ลูกจ้างได้ต่อคน
                            // return [ $palm_2 , $palm_bpss , $palm_emp ] ;
                        }
                        else{
                            // return 3;
                            $sum3  = DB::table('works')
                                    ->join('work_details', 'works.id', '=', 'work_details.work_id')
                                    ->select('works.*', 'work_details.*' )
                                    ->where('status_bill','=',  'ชำระแล้ว'  )
                                    ->where('begin_date','>=',  $request->date1  )
                                    ->where('end_date','<=',  $request->date2  )
                                    ->sum('work_details.unit_fertilizer'); // รวมจำนวนปุ๋ยทั้งหมด

                            $fertilizer = $sum3 / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
                            $pui = $fertilizer * 600;
                            $pui_boss = $pui * 0.2 ; //เงินที่นายจ้างได้ ( นายจ้างได้เงิน 20% )
                            $pui_emp = ( $pui - $pui_boss ) / 5 ;
                            // return [ $pui , $pui_boss , $pui_emp ] ;
                        }
                    }

                    $result = $grass + $palm_2 + $pui ; //เงินที่ได้จากการทำงานทั้งหมด 3 งาน
                    $boss = ( $val_boss + $palm_bpss + $pui_boss ) ; //เงินที่นายจ้างได้ทั้งหมด
                    $sum_emp = ( $pui_emp +  $val_emp + $palm_emp ) ;
                    // $employee1 = Employee::sum('priceparm');
                    // $employee2 = Employee::sum('pricegrass');
                    // $employee3 = Employee::sum('pricepui');
                    // return [ $employee1 , $employee2 , $employee3 ] ;

                    // $boss = $result - ( $employee1 + $employee2 + $employee3 ) ; // เงินที่นายจ้างได้
                    // $sum_emp = $employee1 + $employee2 + $employee3  ; // เงินที่ลูกจ้างได้
                    // $pluss = $boss + $sum_emp;
                    // return [ $result , $boss , $sum_emp ] ;


                    $day1 = $request->date1;
                    $day2 = $request->date2;

        return view('admin.report2',[
            'bills' => $bill , 'leader' => $boss , 'results' => $result , 'employee' => $sum_emp ,
            'grass1' => $grass , 'palm1' => $palm_2 , 'fertilizer1' => $pui , 'oil' => $oil_1 ,
            'begin_date' => $day1 , 'end_date' => $day2
            ]);
    }


}
