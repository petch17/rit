@extends('layouts.myhome')

@section('css')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/aa.jpg')}}');">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    @endsection

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h1> ตารางวันที่จ้างงาน </h1>
                        </center>
                    </div>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    {{-- <table id="example" class="table table-striped table-bordered" style="width:100%"> --}}
                        <thead>
                            <tr>
                                <th align="center"> ชื่อ </th>
                                <th align="center"> วันที่เริ่ม </th>
                                {{-- <th align="center"> วันที่สิ้นสุด </th> --}}
                                <th align="center"> รายละเอียดงาน </th>
                                <th align="center"> รายละเอียดมัดจำ </th>
                                <th align="center"> สถานะงานที่จ้าง</th>
                                <th align="center"> ขอคืนเงินมัดจำ</th>

                            </tr>
                        </thead>

                        <tbody>

                        @foreach ( $dates as $index=>$item )
                            <tr>
                                <td align="center"> {{ $item->name  }} </td>
                                <td align="center">
                                    @php
                                        $date_in = $item->begin_date ;
                                        $date3 = show_tdate($date_in) ;
                                    @endphp
                                    {{ $date3  }}
                                </td>
                                {{-- <td align="center">
                                    @php
                                        $date_in = $item->end_date ;
                                        $date3 = show_tdate($date_in) ;
                                    @endphp
                                    {{ $date3  }}
                                </td> --}}

                             <td align="center"> <a href="{{route('adminbill',['id'=>$item->id])}}" > ดู </a> </td>
                                <td align="center"> <a href="{{route('zoombill',['id'=>$item->id])}}" target="_blank"> คลิก </a> </td>
                                @php
                                    $count = App\Work::where('status_work','กำลังตรวจสอบ') ->where('user_id',Auth::user()->id )->count();

                                    $count1 = App\Work::where('status_work','ตรวจสอบแล้ว') ->where('user_id',Auth::user()->id )->count();

                                    $count2 = App\Work::where('status_work','อยู่ระหว่างการดำเนินการ') ->where('user_id',Auth::user()->id )->count();

                                    $count3 = App\Work::where('status_work','ดำเนินการเสร็จสิ้น')
                                    ->where('status_bill','ค้างชำระ')
                                    ->where('user_id',Auth::user()->id )->count();
                                    $count4 = App\Work::where('status_work','งานของท่านถูกยกเลิก') ->where('user_id',Auth::user()->id )->count();


                                @endphp
                                {{-- @if ($count=='0'&& $count1=='0'&& $count2=='0'&& $count3=='0')
                                    <td align="center"> รอดำเนินการ </td> --}}
                                @if ($count!='0'&& $count1=='0'&& $count2=='0'&& $count3=='0'&& $count4=='0')
                                    <td align="center"> รอรับงาน</td>
                                @elseif ($count=='0'&& $count1!='0'&& $count2=='0'&& $count3=='0'&& $count4=='0')
                                    <td align="center"> รับงานแล้ว</td>
                                @elseif ($count=='0'&& $count1=='0'&& $count2!='0'&& $count3=='0'&& $count4=='0')
                                    <td align="center"> เริ่มงาน </td>
                                @elseif ($count=='0'&& $count1=='0'&& $count2=='0'&& $count3!='0'&& $count4=='0')
                                    <td align="center"> ดำเนินการเสร็จสิ้น </td>
                                @elseif ($count=='0'&& $count1=='0'&& $count2=='0'&& $count3=='0'&& $count4!='0')
                                    <td align="center"> งานของท่านถูกยกเลิก </td>
                                @elseif ($count=='0'&& $count1=='0'&& $count2=='0'&& $count3=='0'&& $count4=='0')
                                    <td align="center"> คืนเงินมัดจำเสร็จสิ้น </td>
                                @else

                                @endif
                                @if ($count=='0'&& $count1=='0'&& $count2=='0'&& $count3=='0'&& $count4!='0')
                                    <td align="center"> <a href="{{route('confirmpayblack5',['id'=>$item->id])}}" > คืนเงินมัดจำ </a> </td>
                                @else
                                @endif





                            </tr>

                        @endforeach

                        </tbody>


                    </table>

                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('js')

    <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            document.getElementById('activity2').classList.add('active');
            document.getElementById('history').classList.add('active');
            $('#example').DataTable();
        });

    </script>

    @endsection
    @php
    function show_tdate($date_in)
    {
    $month_arr = array("มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" ,
    "กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ;

    $tok = strtok($date_in, "-");
    $year = $tok ;

    $tok = strtok("-");
    $month = $tok ;

    $tok = strtok("-");
    $day = $tok ;

    $year_out = $year + 543 ;
    $cnt = $month-1 ;
    $month_out = $month_arr[$cnt] ;

    if ($day < 10 ) $day_out="" .$day; else $day_out=$day ; $t_date=$day_out." ".$month_out." ".$year_out ;

return $t_date ;
}
@endphp
