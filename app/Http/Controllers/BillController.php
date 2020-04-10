<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\User;
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

        return view('bill.deposit',['bills' => $bill, 'price1' => $sum , 'price2' => $avg1 , 'price3' => $sack ]);

    }

    public function monney(  )
    {
        // return 1;
        $bill = Bill::get();
        // $item = Auth::users();
        // return view('profile.index' , compact('item') )
        return view('bill.monney',['bills' => $bill]);

    }

    public function addbillstore(Request $request)
    {
        // return $request;

        User::where( 'id', Auth::user()->id )->update([
            'titlename' => $request->titlename,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile.index');;


    }

    public function addmonneystore(Request $request)
    {
        // return $request;

        User::where( 'id', Auth::user()->id )->update([
            'titlename' => $request->titlename,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile.index');;


    }

}
