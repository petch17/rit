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
                    $palm_2 = 0 ; $palm = 0 ; $fertilizer = 0 ;
                    $avg2 = 0 ; $oil_1 = 0 ; $grass = 0 ; $pui = 0 ;
                    $val_boss = 0 ; $palm_boss = 0 ; $pui_boss = 0 ;
                    $val_emp = 0 ; $palm_emp = 0 ; $pui_emp = 0 ;
                    $price_palm = 0;

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
                            $val_emp = ( $val - $val_boss ) / 4 ; //เงินที่ลูกจ้างได้ต่อคน

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

                            $service_palm = 300; $palm_val = 0;
                            $average = $palm / 1000 ; // แปลงค่าจาก กิโลกรัม -> ตัน
                            $price_palm = $average * $service_palm ;
                            $palm_val = $palm_2 + $price_palm ;

                            $palm_boss = ( $palm_2 * 0.2 ) + $price_palm ; //เงินที่นายจ้างได้ ( นายจ้างได้เงิน 20% หลังจากการขายหัก 30% แล้ว )
                            $palm_emp = ( $palm_2 - ( $palm_2 * 0.2 ) ) / 4 ; //เงินที่ลูกจ้างได้ต่อคน

                            // return [ $palm_2 , $palm_boss , $palm_emp ] ;
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

                            $service_pui = 50; //ค่าแรงทำงาน 50 บาทต่อกระสอบ
                            $oil_pui = 500; //ค่าน้ำมันรถ
                            $powerman = 0; $val_pui = 0;
                            $powerman = $service_pui * $sum3 ;
                            $val_pui = $powerman + $pui + $oil_pui ;

                            $pui_boss = $pui + $oil_pui ; //เงินที่นายจ้างได้
                            $pui_emp = $powerman / 4 ;
                            // return [ $pui , $pui_boss , $pui_emp ] ;
                        }
                    }
                    $sum_oil_0 = 0 ; $result = 0 ; $sum_emp = 0 ; $boss = 0 ;

                    $sum_oil_0 =  $oil_1 + $price_palm + 500; //รวมค่าน้ำมัน
                    $result = $grass + $$palm_val + $val_pui ; //เงินที่ได้จากการทำงานทั้งหมด 3 งาน
                    $boss = ( $val_boss + $palm_boss + $pui_boss + $oil_1 ) ; //เงินที่นายจ้างได้ทั้งหมด
                    $sum_emp = ( $pui_emp +  $val_emp + $palm_emp ) ;

                    // return [ $val_boss , $palm_boss , $pui_boss ] ;
                    // return [   $val_emp , $palm_emp , $pui_emp ] ;
                    // return [ $result , $boss , $sum_emp ] ;


                    $day1 = $request->date1;
                    $day2 = $request->date2;

        return view('admin.report2',[
            'bills' => $bill , 'leader' => $boss , 'results' => $result , 'employee' => $sum_emp ,
            'grass1' => $grass , 'palm1' => $palm_2 , 'fertilizer1' => $pui , 'oil' => $sum_oil_0 ,
            'begin_date' => $day1 , 'end_date' => $day2
            ]);
    }


    public function confirm1()
    {
        $work_00 = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->where('works.status_work','กำลังดำเนินการ' )
                ->get();
        // $work_00 = Work::where('works.status_work','กำลังดำเนินการ' )->get();
                // return $prob ;
        return view('admin.confirm1',[
            'work_0' => $work_00
            ]);
    }

    public function confirm2()
    {
        $work_11 = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->where('works.status_work','อยู่ระหว่างการดำเนินการ' )
                ->get();
                // return $work_1 ;
        return view('admin.confirm2',[
            'work_1' => $work_11
            ]);
    }

    public function confirm3()
    {
        $work_22 = DB::table('works')
                ->join('users', 'users.id', '=', 'works.user_id')
                ->select('works.*', 'users.titlename' , 'users.name' , 'users.lastname' )
                ->where('works.status_work','ดำเนินการเสร็จสิ้น' )
                ->where('works.status_bill','ค้างชำระ' )
                ->get();
                // return $work_2 ;
        return view('admin.confirm3',[
            'work_2' => $work_22
            ]);
    }

    public function reconfirm($id)
    {
        // return $id;
        Work::where('id',$id)->update(['status_work'=>'อยู่ระหว่างการดำเนินการ']);
        return Redirect()->route('home');
    }

    public function reconfirm2($id)
    {
        // return $id;
        $mytime = Carbon::now();
        $mytime = date('Y-m-d');
        Work::where('id',$id)->update(['status_work'=>'ดำเนินการเสร็จสิ้น' , 'end_date'=>$mytime]);
        return Redirect()->route('home');
    }

    public function reconfirm3($id)
    {
        // return $id;
        Work::where('id',$id)->update(['status_bill'=>'ชำระแล้ว']);
        return Redirect()->route('home');
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

}
