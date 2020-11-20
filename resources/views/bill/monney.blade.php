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
            $sum = 0; $avg1 = 0; $avg2 = 0; $sack = 0; $service_palm = 300; $price_palm = 0;
            $service_pui = 50; //ค่าแรงทำงาน 50 บาทต่อกระสอบ
            $palm_val = 0; $val_pui = 0;$palm_oil = 0 ; $equipment = 0 ;$power_1 = 0;
            $palm_2 = 0; $palm_222 = 0;

            foreach( $bills as $detailes ) {
                if( $detailes->working == "ตัดหญ้า" ) {
                    $grass = $detailes->farm_grass ;
                    $sum = $grass * 500;
                    $sum_oil = $grass * 100 ;
                    $sum_deposit = $sum - $sum_oil ;
                }
                elseif( $detailes->working == "ตัดแต่งทางใบ" ) {
                    $palm = $detailes->leaf_palm ;
                    $palm_oil = 300; //ค่าน้ำมัน
                    $equipment = 300 ; //ค่าอุปกรณ์
                    $power_1 = 500 ;//ค่าแรง

                    $sum2 = $palm * 20;
                    $mmmmm = $sum2 / 5; //ค่าแรง
                    $palm_2 = $mmmmm +  $equipment ;//เงินที่นายจ้างได้
                    $palm_222 =  $sum2 + $equipment +  $palm_oil ;
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

        @endphp
                <div class="card-header"> <center> <h1> ใบเสร็จชำระค่าบริการ </h1> </center> </div>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td colspan="3"> </td>
                    </tr>
                    <td colspan="3" height="6"> <b> ข้อมูลลูกค้า </b> </td>

                    <tr>

                        @php
                            $date_in = $mydate ;
                            $datemine = show_tdate($date_in) ;
                        @endphp
                            @foreach ( $bills as $index=>$item )
                        <td  height="6"> <b> นาม &nbsp;&nbsp; {{ $item->titlename }} {{ $item->name }} {{$item->lastname }}</b> </td>

                        <td colspan="2" height="6"> <b> วันที่ &nbsp;&nbsp; {{ $datemine }} </b> </td>
                    </tr>

                    <tr>
                        <td colspan="3"  height="6"> <b> ที่อยู่ &nbsp;&nbsp; {{ $item->address }} </b> </td>

                    </tr>

                    <tr>
                        <td colspan="3" height="6"> <b> โทร. &nbsp;{{ $item->phone }} </b> </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"> </td>
                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าบริการตัดหญ้า </b> </td>
                        <td align="right"> {{ number_format( $sum , 2 ) }} </td>
                        <td align="center"> <b> บาท </b> </td>

                    </tr>

                    <tr>
                        <td height="6"> <b> ตัดแต่งทางใบ </b> </td>
                        <td align="right"> {{ number_format( $palm_222 , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าบริการใส่ปุ๋ย </b> </td>
                        <td align="right"> {{ number_format( $val_pui , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td colspan="3"> </td>
                    </tr>
                    @php
                    $sumation = $sum + $palm_222  + $val_pui; //ยอดรวมทั้งหมด
                    $deposit = $sumation  * 0.3 ; // ค่ามัดจำที่ต้องจ่าย(30%)
                    $result = $sumation  - $deposit ; // ยอดค้างชำระทั้งหมด
                @endphp

                    <tr>
                        <td height="30" align="right"> <b> ค่ามัดจำ </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $deposit , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="30" align="right"> <b> จำนวนเงินคงค้างชำระ </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $result , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="30" align="right"> <b> รวมค่าใช้จ่ายทั้งสิ้น</b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">

                            <b> {{ number_format( $sumation , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>
                    <tr>
                        <td colspan="3"  height="6" style="border-bottom: solid 1px #000"> <b> ผู้รับเงิน &nbsp;&nbsp; นาง พัชรินทร์ สิทธิบุตร </b> </td>

                    </tr>

                </table>



            </div>
            <br/>
        <center>
            <input class="btn btn-success" type="submit" name="Submit" value=" PRINT "
            onClick="javascript:this.style.display='none';window.print()">
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
