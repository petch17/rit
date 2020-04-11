@extends('layouts.app2')

@section('css')
@endsection

@section('content')
<div id='calendar'></div>
<h1 align="center">
    เพิ่มข้อมูลพนักงาน
</h1> </br>

{!! Form::open(['route' => 'addstore', 'method' => 'post', 'files'=>true ]) !!}
@csrf

    <div class="form-group row">
        <label for="titlename" class="col-md-4 col-form-label text-md-right">
            {{ __('คำนำหน้า') }}
        </label>

        <div class="col-md-4">
            <input id="titlename" type="text" class="form-control" name="titlename" >
        </div>
    </div>

    <div class="form-group row">
        <label for="titlename" class="col-md-4 col-form-label text-md-right">
            {{ __('ชื่อ') }}
        </label>

        <div class="col-md-4">
            <input id="titlename" type="text" class="form-control" name="titlename" >
        </div>
    </div>


    <div class="form-group row">
        <label for="titlename" class="col-md-4 col-form-label text-md-right">
            {{ __('นามสกุล') }}
        </label>

        <div class="col-md-4">
            <input id="titlename" type="text" class="form-control" name="titlename" >
        </div>
    </div>

    <div class="form-group row">
        <label for="titlename" class="col-md-4 col-form-label text-md-right">
            {{ __('ที่อยู่') }}
        </label>

        <div class="col-md-4">
            <input id="titlename" type="text" class="form-control" name="titlename" >
        </div>
    </div>
    <div class="form-group row">
        <label for="titlename" class="col-md-4 col-form-label text-md-right">
            {{ __('เบอร์โทร') }}
        </label>

        <div class="col-md-4">
            <input id="titlename" type="text" class="form-control" name="titlename" >
        </div>
    </div>




</br> </br>
<div align="center">
    {!! Form::button('ยืนยัน',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
    {!! Form::button('ยกเลิก',['type' => 'reset', 'class'=>'btn btn-outline-danger', 'onclick'=>"window.history.back();"]); !!}
</div>
{!! Form::close() !!}
@endsection

@section('js')

@endsection
