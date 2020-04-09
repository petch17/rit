<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Work;
use App\WorkDetail;
use DateTime;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use League\Flysystem\File;
use Illuminate\Support\Str;
use Calendar;
use Illuminate\Support\Facades\DB;

class EngageController extends Controller
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
    public function index()
    {
        $date = Work::get();
        // $event_list = [];
    	// foreach ($date as $key => $event) {
    	// 	$event_list[] = Calendar::event(
        //         $event->event_name,
        //         true,
        //         new \DateTime($event->start_date),
        //         new \DateTime($event->end_date.' +1 day')
        //     );
    	// }
    	// $calendar_details = Calendar::addEvents($event_list);

        // return view('events', compact('calendar_details') );

        // $now = new DateTime();
        // $currentday = $now->format('Y-m-d');

        // $currenttime = date_default_timezone_set('Asia/Bangkok');
        // $currenttime = Carbon::now()->format('H:i');
        // $date = DB::table('works')
        //     ->join('work_details', 'works.id', '=', 'work_details.work_id')
        //     ->select('works.*', 'work_details.working')
        //     ->get();

        return view('engage.index' ,['dates' => $date ]);
        // return view('engage.index' ,['dates' => $date , 'currentday' => $currentday]);
    }

    public function desc()
    {
        // return 1;
        return view('engage.desc');

    }

    public function workschedule()
    {
        // return 1;
        $date = Work::get();
        return view('engage.workschedule',['dates' => $date ]);

    }

    public function addstore(Request $request)
    {
        $workimg = new Work();
        $workimg->user_id = $request->user_id;
        $workimg->begin_date = $request->begin_date;
        $workimg->end_date = $request->end_date;
        $workimg->address_work = $request->address;
        $workimg->status_bill = 'ค้างชำระ';
        $workimg->status_work = 'รอดำเนินการ';
        $workimg->save();
        // return $workimg;

        // ลูบวนเก็บค่าตาราง workimg_detail
        foreach ($request->work as $works){
            $workimg2 = new WorkDetail();
            $workimg2->work_id = $workimg->id;
            $workimg2->working = $works;
            $workimg2->save();

            if ($works == 'ตัดปาล์ม'){
                $workimg2->kilo_palm = $request->kilo_palm;
                $workimg2->save();
            }
            elseif($works == 'ใส่ปุ๋ย'){
                $workimg2->unit_fertilizer = $request->unit_fertilizer;
                $workimg2->save();
            }
            else{
                $workimg2->farm_grass = $request->farm_grass;
                $workimg2->save();
            }
        }

        $details =  DB::table('work_details')->select('work_details.*')->where('work_id','like',$workimg->id)->get();
        // return $details;
        $sum = 0;
        $avg1 = 0;
        $avg2 = 0;
        $sack = 0;
        foreach( $details as $detail ){
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

        return view('engage.addcreate',[ 'detail' => $details , 'price1' => $sum , 'price2' => $avg1 , 'price3' => $sack ]);
        // return redirect()->route('addcreate');
    }

    public function checkworkstore(Request $request)
    {
        // return $request;
        foreach ($request->work as $works){
            $workimg2 = new WorkDetail();
            $workimg2->working = $works;
        }
        return $workimg2;
        return view('engage.addcreate',['requests' => $request ]);
    }

    public function addcreate()
    {
        return view('engage.addcreate');
    }

    public function show($id)
    {
        //
    }

    public function history()
    {
        // return 1;
        $date = DB::table('works')
            ->join('work_details', 'works.id', '=', 'work_details.work_id')
            ->join('users', 'users.id', '=', 'works.user_id')
            ->select('works.*', 'work_details.working', 'work_details.kilo_palm'
            , 'work_details.unit_fertilizer', 'work_details.farm_grass','users.*')
            ->where('users.id',Auth::user()->id )
            ->orderByDesc('works.begin_date')
            ->get();
            // return $date;
        return view('engage.history',['dates' => $date ]);

    }



    public function destroy($id) {

        // Edoc::destroy($id);

       $result = User::find($id);

    //    File::delete(base_path().'http://127.0.0.1:3000/pdffile/'.$result->file);
       $result->delete();

        if($result){
            return response()->json(['success' => '1']);
        }else{
            return response()->json(['success' => '0']);
        }

    }

}
