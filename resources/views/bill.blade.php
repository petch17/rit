@extends('layouts.myhome')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a2.jpg')}}');">
@section('css')

@endsection

@section('content')
<table><h1> ยินดีต้อนรับสู่สวนปาล์มอินทนินท์</h1></table>
<table><h3> ระบบเรามีบริการไห้ลูกค้าเลือกถึง 3 บริการ</h3></table>
<table >
    <font color="black"><h3>1.บริการตัดปาล์ม  </h3></font>
            <font color="black"><h3>ตัดปาล์มคิดเป็นกิโลละ 3 บาท ตัดได้กี่กิโลกรัมเอามา * 3 (แล้วหักค่ามัดจำ 30% เข้าระบบ) (อีก 70 % เป็นของลูกค้า)  </h3></font>
</table>
<table>
    <font color="black"><h3>2.บริการตัดหญ้า  </h3></font>
    <font color="black"><h3>ตัดหญ้าจำนวนไร่ละ 500 (ค่าแรง 400 + 100 ค่าน้ำมัน)  หักค่ามักจำ 30% เข้าระบบ อีก 70 % เป็นของลูกค้า </h3></font>
</table>
<table>
    <font color="black"><h3>3.บริการใส่ปุ๋ย  </h3></font>
    <font color="black"><h3>ใส่ปุ๋ยคิดเป็นกระสอบละ 50 บาท ปุ๋ย1 กระสอบราคา 600  บาท  1กระสอบใส่ได้50ต้น  หักค่ามักจำ 30% เข้าระบบ อีก 70 % เป็นของลูกค้า </h3></font>
</table>

@endsection

@section('js')

<script>
    $(document).ready(function () {
        document.getElementById('bill').classList.add('active');
        $('#table1').DataTable();
    });

</script>

@endsection

{{-- @php
function  show_tdate($date_in)
{
$month_arr = array("มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" , "กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ;

$tok = strtok($date_in, "-");
$year = $tok ;

$tok  = strtok("-");
$month = $tok ;

$tok = strtok("-");
$day = $tok ;

$year_out = $year + 543 ;
$cnt = $month-1 ;
$month_out = $month_arr[$cnt] ;

if ($day < 10 )
   $day_out = "".$day;
else
   $day_out = $day ;

   $t_date = $day_out." ".$month_out." ".$year_out ;

return $t_date ;
}
@endphp --}}
