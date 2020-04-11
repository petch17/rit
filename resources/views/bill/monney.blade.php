@extends('layouts.app2')
@section('css')

@endsection

@section('content')

<div class="card-body"> {{-- start --}}
   <center><font color="black"><h3>ชำระค่าเงินทั้งหมด </h3></font></center>
    {!! Form::open(['route' => 'addmonneystore', 'method' => 'post', 'files'=>true ]) !!}
    @csrf
        {{--  {{ csrf_field() }}
        {{ method_field('patch') }}  --}}
        <div class="form-group row">
            <label for="titlename" class="col-md-4 col-form-label text-md-right">
                {{ __('บริการ') }}
            </label>

            <div class="col-md-6">
                <input id="titlename" type="text" class="form-control" name="titlename" >
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('ชื่อ') }}
            </label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" >
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">
                {{ __('สลิปเงิน') }}
            </label>

            <div class="col-md-6">
                <input id="lastname" type="text" class="form-control" name="lastname">
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">
                {{ __('วันที่โอน') }}
            </label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" >
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">
                {{ __('บันทึกช่วยจำ') }}
            </label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control" name="phone" >
            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('ยืนยันชำระ') }}
                </button>
            </div>
        </div>
        {!! Form::close() !!}
</div>
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
