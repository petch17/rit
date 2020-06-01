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
                <div class="card-header"> <center> <h1> ใบเสร็จชำระค่าบริการ </h1> </center> </div>

                <table class="table table-striped table-bordered">
                    <tr>
                        <td height="6"> <b> รายได้จากการตัดหญ้า </b> </td>
                        <td align="right"> {{ number_format( 7575757 , 2 ) }} </td>
                        <td align="center"> <b> บาท </b> </td>

                    </tr>

                    <tr>
                        <td height="6"> <b> รายได้จากการตัดปาล์ม </b> </td>
                        <td align="right"> {{ number_format( 01010101 , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="6"> <b> รายได้จากการใส่ปุ๋ย </b> </td>
                        <td align="right"> {{ number_format( 72727224 , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="30"> <b> รวมรายได้ </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( 13057075 , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าแรงงานลูกจ้างคนละ ( 80% ของรายได้ทั้งหมด / 5 ) </b> </td>
                        <td align="right"> {{ number_format( 40460868 , 2 ) }} </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="30"> <b> ค่าใช้จ่ายทั้งหมด </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( 13766685 , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                    </tr>

                    <tr>
                        <td height="30"> <b> กำไรสุทธิ </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( 144457 , 2 )  }} </b>
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
