@extends('layouts.myhome')

@section('css')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a4.jpg')}}');">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" >
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" >

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> <center> <h1> ตารางงาน </h1> </center> </div>

                        <table id="example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <th align="center"> รหัส</th>
                                <th align="center"> ชื่อ </th>
                                <th align="center"> วันที่เริ่ม </th>
                                {{-- <th align="center"> วันที่สื้นสุด </th> --}}
                                {{-- <th align="center"> ที่อยู่ </th> --}}
                                <th align="center">คงค้างชำระ</th>
                                <th align="center">ค่ามัดจำ</th>
                                <th align="center"> สถานะงาน </th>
                                <th align="center"> ดูรายละเอียด </th>
                            </thead>



                            <tbody>
                                @foreach ( $wok as $index=>$item )
                                <tr>
                                <td align="center"> {{ $item->id  }} </td>
                                <td align="center"> {{ $item->titlename  }} {{ $item->name  }} {{ $item->lastname  }} </td>
                                <td align="center">
                                    @php
                                        $date_in = $item->begin_date ;
                                        $date3 = show_tdate($date_in) ;
                                    @endphp
                                    {{ $date3  }} </td>
{{--
                                    @if ( $item->end_date == null || $item->end_date == ' ' )
                                        <td></td>
                                    @else
                                        <td align="center">
                                            @php
                                                $date_in = $item->end_date ;
                                                $date3 = show_tdate($date_in) ;
                                            @endphp
                                            {{ $date3  }} </td>
                                    @endif --}}
                                {{-- <td align="center"> {{ $item->address_work  }} </td> --}}
                                <td align="center"> {{ $item->status_bill  }} </td>
                                <td align="center"> {{ $item->status_tranfar  }} </td>
                                <td align="center"> {{ $item->status_work  }} </td>
                                <td align="center"> <a href="{{route('adminbill',['id'=>$item->id])}}" > ดู </a> </td>
                            </tr>

                            @endforeach
                            </tbody>


                        </table>

        </div>
    </div>
</div>

@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript" ></script>

<script>
     $(document).ready(function () {
        document.getElementById('activity3').classList.add('active');
        document.getElementById('wks').classList.add('active');
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
