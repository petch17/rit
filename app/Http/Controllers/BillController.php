<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\User;
use App\Work;
use App\WorkDetail;
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

        $sum = 0;
        $avg1 = 0;
        $avg2 = 0;
        $sack = 0;
        foreach( $bill as $detail ){
            if( $detail->working == "ตัดหญ้า"){
                // return 1;
                $grass = $detail->farm_grass ;
                $sum = $grass * 500;
            }
            elseif($detail->working == "ตัดปาล์ม"){
                // return 2;
                $palm = $detail->kilo_palm ;
                $sum2 = $palm * 3;
                $avg1 = $sum2 * 0.3; //เงินที่เราได้จากการขาย 30 %
                $avg2 = $sum2 - $avg1 ; //เงินที่ลูกค้าได้จากการขาย และ ลบส่วนที่ต้องแบ่งให้คนจ้าง 30 %
            }
            else{
                // return 3;
                $fertilizer = $detail->unit_fertilizer ;
                $sum3 = $fertilizer / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
                $sack = $sum3 * 600;
            }
        }

        $code = WorkDetail::get();

        foreach ($code as $code_id) {
            $code_run = $code_id->work_id;
        }
        // return $code_run;

        return view('bill.deposit',[
            'bills' => $bill, 'price1' => $sum , 'price2' => $avg1 , 'price3' => $sack , 'code_runs' => $code_run
            ]);

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

       $sum = 0;
       $avg1 = 0;
       $avg2 = 0;
       $sack = 0;
       foreach( $bill as $detail ){
           if( $detail->working == "ตัดหญ้า"){
               // return 1;
               $grass = $detail->farm_grass ;
               $sum = $grass * 500;
           }
           elseif($detail->working == "ตัดปาล์ม"){
               // return 2;
               $palm = $detail->kilo_palm ;
               $sum2 = $palm * 3;
               $avg1 = $sum2 * 0.3; //เงินที่เราได้จากการขาย 30 %
               $avg2 = $sum2 - $avg1 ; //เงินที่ลูกค้าได้จากการขาย และ ลบส่วนที่ต้องแบ่งให้คนจ้าง 30 %
           }
           else{
               // return 3;
               $fertilizer = $detail->unit_fertilizer ;
               $sum3 = $fertilizer / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
               $sack = $sum3 * 600;
           }
       }

       $code = WorkDetail::get();

       foreach ($code as $code_id) {
           $code_run = $code_id->work_id;
       }
       // return $code_run;

       return view('bill.monney',[
           'bills' => $bill, 'price1' => $sum , 'price2' => $avg1 , 'price3' => $sack , 'code_runs' => $code_run
           ]);


    }

    public function addbillstore(Request $request)
    {
        // return $request;

        $data = new Bill();
        $data->work_id = $request->work_id;
        $data->user_id = $request->user_id;
        $data->transfar_date = $request->transfar_date;
        // $data->transfar_monney = $request->transfar_monney;
        $data->transfar_desc = $request->transfar_desc;

        // return $data;

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

    public function addmonneystore(Request $request)
    {
        // return $request;

        $data = new Bill();
        $data->work_id = $request->work_id;
        $data->user_id = $request->user_id;
        $data->monney_date = $request->monney_date;
        // $data->transfar_monney = $request->transfar_monney;
        $data->desc = $request->desc;

        // return $data;

       if ($request->hasFile('image')) {
            $image = $request->file('image'); //ไฟล์ภาพ
            $name = $request->work_id.'.'.$image->getClientOriginalExtension(); //ชื่อของไฟล์ภาพ
            $destinationPath = public_path('images/money_slip'); //เลือกที่เก็บไฟล์ภาพ
            $image->move($destinationPath, $name); //บันทึกไฟล์ภาพลงที่เก็บ
            $data->monney_slip = $name;
        }
        // return $data;

        $data->save();

        Work::where( 'id',$request->work_id )
        ->update([
            'status_bill' => 'ชำระแล้ว',
        ]);

        return redirect()->route('home');

    }

}
