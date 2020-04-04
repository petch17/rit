@extends('layouts.myhome')

@section('css')

@endsection

@section('content')
<center>

 <font color="black"><h1> แจ้งปัญหา </h1></font> </br>

</center>
<br>

<center>

    {!! Form::open(['route' => 'problemstore', 'method' => 'post', 'files'=>true ]) !!}

    <input name="user_id" type="hidden" value="{{Auth::user()->id}}" />

    <div>
        <label>กรุณาแจ้งปัญหา</label>
        {!! Form::textarea('desc', null,['class'=>'form-control','placeholder'=>'โปรดกรอกข้อมูล'] ); !!}
    </div>



    </br> </br>
    <div align="center">
        {!! Form::button('ยืนยัน',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
        {!! Form::button('ยกเลิก',['type' => 'reset', 'class'=>'btn btn-outline-danger', 'onclick'=>"window.history.back();"]); !!}
    </div>
    {!! Form::close() !!}


@endsection

@section('js')

<script>
    $(document).ready(function () {
        document.getElementById('problem').classList.add('active');
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
