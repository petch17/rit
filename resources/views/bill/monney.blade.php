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
                @php
                    $sum = 0;
                    $avg1 = 0;
                    $avg2 = 0;
                    $sack = 0;
                    foreach( $bills as $index=>$detailes ) {
                        if( $detailes->working == "ตัดหญ้า" ) {
                            $grass = $detailes->farm_grass ;
                            $sum = $grass * 500;
                        }
                        elseif( $detailes->working == "ตัดปาล์ม" ) {
                            $palm = $detailes->kilo_palm ;
                            $sum2 = $palm * 3;
                            $avg1 = $sum2 * 0.3; // เงินที่เราได้จากการขาย 30 %
                            $avg2 = $sum2 - $avg1 ; // เงินที่ลูกค้าได้จากการขาย และ ลบส่วนที่ต้องแบ่งให้คนจ้าง 30 %
                        }
                        else{
                            $fertilizer = $detailes->unit_fertilizer ;
                            $sum3 = $fertilizer / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
                            $sack = $sum3 * 600;
                        }
                    }
                    $sumation = $sum + $avg1 + $sack;

                    $deposit =  $sumation  * 0.3 ;

                    $result = $sumation - $deposit ;

                @endphp

                <div class="card-header"> <center> <h1> ใบเสร็จชำระค่าบริการ </h1> </center> </div>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td colspan="3"> </td>
                    </tr>

                    <tr>
                        @php
                            $date_in = $mydate ;
                            $datemine = show_tdate($date_in) ;
                        @endphp
                        <td height="6"> <b> นาม &nbsp;&nbsp; นาย ชาญณรงค์ สิทธิบุตร </b> </td>
                        <td colspan="2" height="6"> <b> วันที่ &nbsp;&nbsp; {{ $datemine }} </b> </td>
                    </tr>

                    <tr>
                        <td height="6"> <b> ที่อยู่ &nbsp;&nbsp; สวนปาล์มอินทนินท์ </b> </td>
                        <td colspan="2" height="6"> <b> โทร. &nbsp; 095-571-6743 </b> </td>
                    </tr>

                    <tr>
                        <td colspan="3"> </td>
                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าบริการตัดหญ้า </b> </td>
                        <td align="right"> {{ number_format( $sum , 2 ) }} </td>
                        <td align="center"> <b> บาท </b> </td>

                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าบริการตัดปาล์ม </b> </td>
                        <td align="right"> {{ number_format( $avg1 , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าบริการใส่ปุ๋ย </b> </td>
                        <td align="right"> {{ number_format( $sack , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td colspan="3"> </td>
                    </tr>

                    <tr>
                        <td height="30" align="right"> <b> ค่าใช้จ่ายทั้งหมด </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $sumation , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="30" align="right"> <b> ค่ามัดจำที่จ่ายไป </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $deposit , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="30" align="right"> <b> จำนวนเงินที่ต้องจ่าย </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $result , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                </table>


            </div>
            <br/>
        <center>
            <input class="btn btn-success" type="submit" name="Submit" value=" PRINT "
            onClick="javascript:this.style.display='none';window.print()">

            <a href="{{ route('home') }}">
                {!! Form::button('หน้าหลัก',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
            </a>
        </center>
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
        document.getElementById('report').classList.add('active');
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
