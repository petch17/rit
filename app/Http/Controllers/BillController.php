<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\User;
use App\Work;
use App\WorkDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
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
    public function deposit( )
    {
        // return 1;
        $bill = DB::table('works')
        ->join('work_details', 'works.id', '=', 'work_details.work_id')
        ->join('users', 'users.id', '=', 'works.user_id')
        ->select('works.*', 'work_details.*','users.*')
        ->where('users.id',Auth::user()->id )
        ->where('works.status_bill','ค้างชำระ' )
        ->get();
        // return $bill;

        $sum = 0; $avg1 = 0; $avg2 = 0; $sack = 0; $service_palm = 300; $price_palm = 0;
        $service_pui = 50; //ค่าแรงทำงาน 50 บาทต่อกระสอบ
        $palm_val = 0; $val_pui = 0; $palm_oil = 0;$equipment = 0 ;

        foreach( $bill as $detailes ){
            if( $detailes->working == "ตัดหญ้า" ){
                $grass = $detailes->farm_grass ;
                $sum = $grass * 500;
                $sum_oil = $grass * 100 ;
                $sum_deposit = $sum - $sum_oil ;
            }
            elseif( $detailes->working == "ตัดแต่งทางใบ" ){
                $palm = $detailes->leaf_palm ;
                $palm_oil = 300; //ค่าน้ำมัน
                $equipment = 300 ; //ค่าอุปกรณ์
                $power_1 = 500 ;//ค่าแรง

                $sum2 = $palm * 20;
                $mmmmm = $sum2 / 5; //ค่าแรง
                $palm_2 = $mmmmm +  $equipment ;//เงินที่นายจ้างได้
                $palm_val = $sum2 +  $equipment + $palm_oil ;//เงินที่นายจ้างได้
            }
            else{
                $fertilizer = $detailes->unit_fertilizer ;
                $sum3 = $fertilizer / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
                $sack = $sum3 * 600;

                $oil_pui = 500; //ค่าน้ำมันรถ
                $powerman = $service_pui * $sum3 ;
                $val_pui = $powerman + $sack + $oil_pui ;
            }
        }
        $sumation = $sum + $palm_val + $val_pui;



        $code = WorkDetail::get();

        foreach ($code as $code_id) {
            $code_run = $code_id->work_id;
        }
        // return $code_run;


        $mytime = Carbon::now();
        $mytime = date('Y-m-d');

        return view('bill.deposit',[
            'bills' => $bill, 'price1' => $sumation , 'price2' => $sum2 ,
            'price3' => $sack , 'code_runs' => $code_run , 'mydate' => $mytime
            ]);

    }

    public function addbillstore(Request $request)
    {
        $mytime = Carbon::now();
        $mytime = date('Y-m-d');

        $data = new Bill();
        $data->work_id = $request->work_id;
        $data->user_id = $request->user_id;
        $data->transfar_date = $mytime;
        // $data->transfar_monney = $request->transfar_monney;
        $data->transfar_desc = $request->transfar_desc;

        // return [$data , $mytime ];

       if ($request->hasFile('image')) {
            $image = $request->file('image'); //ไฟล์ภาพ
            $name = $request->work_id.'.'.$image->getClientOriginalExtension(); //ชื่อของไฟล์ภาพ
            $destinationPath = public_path('images/tranfar_slip'); //เลือกที่เก็บไฟล์ภาพ
            $image->move($destinationPath, $name); //บันทึกไฟล์ภาพลงที่เก็บ
            $data->transfar_slip = $name;
        }
        // return $data;

        $data->save();

        Work::where( 'id',$request->work_id )
        ->update([
            'status_tranfar' => 'ชำระแล้ว',
        ]);

        return redirect()->route('home');

    }

    public function monney(  )
    {
       // return 1;
       $bill = DB::table('works')
       ->join('work_details', 'works.id', '=', 'work_details.work_id')
       ->join('users', 'users.id', '=', 'works.user_id')
       ->select('works.*', 'work_details.*','users.*')
       ->where('users.id',Auth::user()->id )
       ->where('works.status_bill','ค้างชำระ' )
       ->get();
        // return $bill;

        $mytime = Carbon::now();
        $mytime = date('Y-m-d');
        // return $mytime;


       return view('bill.monney',[
           'bills' => $bill , 'mydate' => $mytime
           ]);


    }
}
