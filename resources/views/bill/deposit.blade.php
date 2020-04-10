@extends('layouts.app2')
@section('css')

@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
<div class="card">
    <div class="card-header" align="center">
        <font color="black">
            <h3>{{ __('จ่ายค่ามัดจำ') }}</h3>
        </font>
    </div>

<div class="card-body"> {{-- start --}}

    {!! Form::open(['route' => 'addbillstore', 'method' => 'post', 'files'=>true ]) !!}
    @csrf



    <div class="form-group row">
        <label for="titlename" class="col-md-4 col-form-label text-md-right">
            {{ __('บริการที่ใช้') }}
        </label>

        <div class="col-md-6">

            @foreach ($bills as $index=>$item)

            <input readonly type="text" class="form-control" value="{{$index+1}}. {{ $item->working }}" >

            @endforeach

        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">
            {{ __('ค่าบริการทั้งหมด') }}
        </label>
        @php
            $result = $price1 + $price2 + $price3 ;
        @endphp

        <div class="col-md-6">
        <input readonly type="text" class="form-control" value="{{ number_format( $result , 2 ) }}" >
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">
            {{ __('ค่ามัดจำที่ต้องชำระ') }}
        </label>
        @php
            $avg_result = $result * 0.3 ;
        @endphp

        <div class="col-md-6">
        <input readonly type="text" class="form-control" value="{{ number_format( $avg_result , 2 ) }}" >
        </div>
    </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">
                {{ __('สลิปการโอนเงิน') }}
            </label>

            <div class="col-md-6">
                <input id="lastname" type="file"  name="image">
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">
                {{ __('วันที่แจ้งโอน') }}
            </label>

            <div class="col-md-6">
                <input id="address" type="date" class="form-control" name="address" >
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">
                {{ __('บันทึกช่วยจำ') }}
            </label>

            <div class="col-md-6">
                {!! Form::textarea('desc', null,['class'=>'form-control','placeholder'=>'โปรดกรอกข้อมูล'] ); !!}
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
</div>
</div>
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
