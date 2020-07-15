<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Work;
use App\WorkDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\Flysystem\File;
use Illuminate\Support\Str;
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

        return view('engage.index' ,['dates' => $date ]);
    }

    public function desc()
    {
        // return 1;
        return view('engage.desc');

    }

    public function history()
    {
        // return 1;
        $date = DB::table('works')
            ->join('users', 'users.id', '=', 'works.user_id')
            ->select('works.*', 'users.name')
            ->where('users.id',Auth::user()->id )
            ->orderByDesc('works.begin_date')
            ->get();
            // return $date;
        return view('engage.history',['dates' => $date ]);

    }

    public function zoomhistory($id)
    {
        // return $id;
        $firm = WorkDetail::where('work_id',$id)->get();
        return view('engage.zoomhistory',['firms' => $firm ]);
    }

    public function zoombill($id)
    {
        // return $id;
        $zoombill = DB::table('bills')
            ->join('users', 'users.id', '=', 'bills.user_id')
            ->select('bills.*', 'users.name')
            ->where('bills.work_id',$id )
            ->get();

        // return $zoombill;
        // $zoombill = Bill::where('work_id',$id)->get();
        return view('engage.zoombill',['zoombill' => $zoombill ]);
    }

    public function workschedule()
    {
        // return 1;
        $date = Work::get();
        return view('engage.workschedule',['dates' => $date ]);

    }

    public function reviewer()
    {
        $workimg = Work::orderByDesc('id')->limit(1)->get();
        foreach( $workimg as $sum ){
            $result = $sum->id;
        }

        $details =  DB::table('work_details')
        ->select('work_details.*')
        ->where('work_id','like',$result)
        ->get();
        // return $details;

        return view('engage.reviewer',[
             'detail' => $details
             ]);
    }

    public function addstore(Request $request)
    {
        $workimg = new Work();
        $workimg->user_id = $request->user_id;
        $workimg->begin_date = $request->begin_date;
        // $workimg->end_date = $request->end_date;
        $workimg->address_work = $request->address;
        $workimg->status_bill = 'ค้างชำระ';
        $workimg->status_tranfar = 'ค้างชำระ';
        $workimg->status_work = 'กำลังตรวจสอบ';
        $workimg->save();
        // return $workimg;

        // ลูบวนเก็บค่าตาราง workimg_detail
        foreach ($request->work as $works){
            $workimg2 = new WorkDetail();
            $workimg2->work_id = $workimg->id;
            $workimg2->working = $works;
            $workimg2->save();

            if ($works == 'ตัดแต่งทางใบ'){
                $workimg2->leaf_palm = $request->leaf_palm;
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

        return redirect()->route('reviewer');
        // return redirect()->route('addcreate');
    }

    public function destroy($id) {

        // return $id ;
        Work::destroy($id);
        // return Work::destroy($id);
        return redirect()->route('index');


    }

}
