@extends('layouts.myhome')

@section('css')

@endsection

@section('content')
<center>

<h1> รายการที่ต้องชำระเงิน </h1> </br>

</center>
<br>

<center>
    <table class="table">
        <thead>
            <th align="center"> # </th>
            <th align="center"> รายการ </th>
            <th align="center"> จำนวนเงิน </th>
            <th align="center"> หน่วย </th>
            <th align="center"> รายละเอียด </th>
        </thead>

        <tbody>
            <th align="center"> 1 </th>
            <th align="center"> ตัดปาล์ม </th>
            <th align="right"> @php echo number_format(2000,2) @endphp </th>
            <th align="center"> บาท </th>
            <th align="center"> <a target="_blank" href=""> คลิก </a> </th>
        </tbody>

        <tbody>
            <th align="center"> 2 </th>
            <th align="center"> ตัดหญ้า </th>
            <th align="right"> @php echo number_format(500,2) @endphp </th>
            <th align="center"> บาท </th>
            <th align="center"> <a target="_blank" href=""> คลิก </a> </th>
        </tbody>

        <tbody>
            <th align="center"> 3 </th>
            <th align="center"> ใส่ปุ๋ย </th>
            <th align="right"> @php echo number_format(1000,2) @endphp </th>
            <th align="center"> บาท </th>
            <th align="center"> <a target="_blank" href=""> คลิก </a> </th>
        </tbody>

        <tr>
            <th colspan="5">
                *****************************************************************
            </th>
        </tr>

        <tr>
            <th colspan="3" align="right"> รวม </th>
            <th align="right"> @php echo number_format(3500,2) @endphp </th>
            <th align="center"> บาท </th>
        </tr>
    </table>
</center>
<h3>
    <font color="red">
        *************************************************************************************************************************
    </font> <br/>
    <font color="blue">
        ชำระเงินผ่านธนาคาร<br/>นาย ชาญณรงค์ สิทธิบุตร<br/>เลขที่บัญชี : 333-33333-33-3<br/>ธนาคาร : กสิกรไทย<br/>
        หรือชำระเงินผ่านทางพร้อมเพย์&nbsp;099-878-4747
    </font> <br/>
    <font color="red">
        *************************************************************************************************************************
    </font> <br/>
</h3>

<center>
    <input class="btn btn-success" type="submit" name="Submit" value=" PRINT "
        onClick="javascript:this.style.display='none';window.print()"> <br> <br>
</center>

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
