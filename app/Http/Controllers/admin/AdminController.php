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
use Carbon\Carbon;

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
        $workss = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->get();
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
        $prob = DB::table('problems')
            ->join('users', 'users.id', '=', 'problems.user_id')
            ->select('problems.*', 'users.titlename' , 'users.name' , 'users.lastname' )
            ->get();
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
                    $palm_oil = 0 ; $palm = 0 ; $fertilizer = 0 ;
                    $equipment = 0 ; $oil_1 = 0 ; $grass = 0 ; $pui = 0 ;
                    $val_emp = 0 ; $palm_boss = 0 ; $pui_boss = 0 ;
                    $val_emp = 0 ; $palm_emp = 0 ; $pui_emp = 0 ;
                    $price_palm = 0; $service_palm = 300; $palm_val = 0;
                    $service_pui = 50; $oil_pui = 0;  $power_2 = 0;
                    $val_pui = 0; $power_1 = 0; $palm_3 = 0;$mmmmm=0;$palm_2=0;

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
                            // $val_emp = $val * 0.2 ; //เงินที่นายจ้างได้ ( นายจ้างได้เงิน 20% หลังจากหักค่าน้ำมันแล้ว )
                            $val_emp = $val / 5 ; //เงินที่ลูกจ้างได้ต่อคน

                            // return [ $sum1 , $grass , $oil_1 , $val  , $val_emp ];
                        }
                        elseif($detail->working == "ตัดแต่งทางใบ"){
                            // return 2;
                            $sum2  = DB::table('works')
                                    ->join('work_details', 'works.id', '=', 'work_details.work_id')
                                    ->select('works.*', 'work_details.*' )
                                    ->where('status_bill','=',  'ชำระแล้ว'  )
                                    ->where('begin_date','>=',  $request->date1  )
                                    ->where('end_date','<=',  $request->date2  )
                                    ->sum('work_details.leaf_palm'); // รวมจำนวนปาล์มทั้งหมด

                            $palm_oil = 300; //ค่าน้ำมัน
                            $equipment = 300 ; //ค่าอุปกรณ์
                            $power_1 = 500 ;//ค่าแรง

                            $palm = $sum2 * 20;
                            $mmmmm = $palm / 5; //ค่าแรง
                            $palm_2 = $mmmmm +  $equipment ;//เงินที่นายจ้างได้
                            $palm_3 = $palm +  $palm_oil +  $equipment ;//เงินที่นายจ้างได้


                            // return [ $palm_oil , $palm_boss , $palm_emp ] ;
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

                            $oil_pui = 500; //ค่าน้ำมันรถ
                            $power_2 = $service_pui *  $fertilizer ; //หาค่าแรง
                            $pui_emp = $power_2 / 5 ; //หารค่าแรงกับลูกจ้าง
                            $pui_boss = $pui + $pui_emp ; //เงินที่นายจ้างได้

                            $val_pui = $power_2 + $pui + $oil_pui ; //ค่าจ้างทั้งหมด
                            // return [ $pui , $pui_boss , $pui_emp ] ;
                        }
                    }
                    $sum_oil_0 = 0 ; $result = 0 ; $sum_emp = 0 ; $boss = 0 ;

                    $sum_oil_0 =  $oil_1 + $palm_oil + $oil_pui; //รวมค่าน้ำมัน
                    $result = $grass + $palm_3 + $val_pui ; //เงินที่ได้จากการทำงานทั้งหมด 3 งาน
                    $sum_emp = ( $pui_emp +  $val_emp + $mmmmm ) ;
                    $boss = ( $val_emp + $palm_2 + $pui_boss + $sum_oil_0 ) ; //เงินที่นายจ้างได้ทั้งหมด

                    $sumsult =  $result - ( $sum_oil_0 +  ($sum_emp*4) );

                    // return $fff;

                    // return [ $val_emp , $palm_boss , $pui_boss ] ;
                    // return [   $val_emp , $palm_emp , $pui_emp ] ;
                    // return [ $result , $boss , $sum_emp , $grass , $palm_val , $val_pui] ;


                    $day1 = $request->date1;
                    $day2 = $request->date2;

        return view('admin.report2',[
            'bills' => $bill , 'leader' => $boss , 'results' => $result , 'employee' => $sum_emp ,
            'grass1' => $grass , 'palm1' => $palm_3 , 'fertilizer1' => $val_pui , 'oil' => $sum_oil_0 ,
            'sumsults' => $sumsult , 'begin_date' => $day1 , 'end_date' => $day2
            ]);
    }


    public function confirm1()
    {
        $work_00 = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->where('works.status_work','กำลังตรวจสอบ' )
                ->get();
        // $work_00 = Work::where('works.status_work','กำลังดำเนินการ' )->get();
                // return $prob ;
        return view('admin.confirm1',[
            'work_0' => $work_00
            ]);
    }

    public function confirm2()
    {
        $work_00 = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->where('works.status_work','ตรวจสอบแล้ว' )
                ->get();
        // $work_00 = Work::where('works.status_work','กำลังดำเนินการ' )->get();
                // return $prob ;
        return view('admin.confirm2',[
            'work_0' => $work_00
            ]);
    }

    public function confirm3()
    {
        $work_11 = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->where('works.status_work','อยู่ระหว่างการดำเนินการ' )
                ->get();
                // return $work_1 ;
        return view('admin.confirm3',[
            'work_1' => $work_11
            ]);
    }

    public function confirm4()
    {
        $work_22 = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->where('works.status_work','ดำเนินการเสร็จสิ้น' )
                ->where('works.status_bill','ค้างชำระ' )
                ->get();
                // return $work_2 ;
        return view('admin.confirm4',[
            'work_2' => $work_22
            ]);
    }

    public function reconfirm($id)
    {
        // return $id;
        Work::where('id',$id)->update(['status_work'=>'ตรวจสอบแล้ว']);
        return Redirect()->route('home');
    }

    public function reconfirm2($id)
    {
        // return $id;
        Work::where('id',$id)->update(['status_work'=>'อยู่ระหว่างการดำเนินการ']);
        return Redirect()->route('home');
    }

    public function reconfirm3($id)
    {
        // return $id;
        $mytime = Carbon::now();
        $mytime = date('Y-m-d');
        Work::where('id',$id)->update(['status_work'=>'ดำเนินการเสร็จสิ้น' , 'end_date'=>$mytime]);
        return Redirect()->route('home');
    }

    public function reconfirm4($id)
    {
        // return $id;
        Work::where('id',$id)->update(['status_bill'=>'ชำระแล้ว']);
        $bill = DB::table('works')
        ->join('work_details', 'works.id', '=', 'work_details.work_id')
        ->join('users', 'users.id', '=', 'works.user_id')
        ->select('works.*', 'work_details.*','users.*')
        ->where('works.id',$id )
        ->get();
       //  return $bill;




         $mytime = Carbon::now();
         $mytime = date('Y-m-d');
         // return $mytime;


        return view('bill.monney',[
            'bills' => $bill , 'mydate' => $mytime
            ]);

    }

    public function adminbill($id)
    {
        // return $id;
        $workimgs = DB::table('works')
                ->join('work_details', 'works.id', '=', 'work_details.work_id')
                ->select('works.*', 'work_details.*' )
                ->where('work_details.work_id' , '=' , $id )
                ->get();
        // return $workimgs;

        return view('admin.adminbill',[
             'workimg_0' => $workimgs
             ]);
    }

    public function reviewer2($id)
    {
        // return $id;
        // $workimg = Work::orderByDesc('id')->limit(1)->get();
        // foreach( $workimg as $sum ){
        //     $result = $sum->id;
        // }

        $details =  DB::table('work_details')
        ->select('work_details.*')
        ->where('work_id','like',$id)
        ->get();
        // return $details;

        return view('admin.reviewer2',[
             'detail' => $details
             ]);
    }

    public function zoombill1()
    {
        return view('admin.zoombill1');
    }


}
