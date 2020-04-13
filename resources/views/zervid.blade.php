@extends('layouts.app')

@section('css')
<style>
    body { background-color:#FFE873; }
</style>
@endsection

@section('content')
{{-- <div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a8.jpg')}}');"> --}}
<center>
    <font color="black"><h3>รายละเอียดบริการงานสวนปาล์มอินทนิน  </h3></font><br>

<img src="{{ asset('images/demo/backgrounds/a5.jpg') }}" height="400" width="400">

    <font color="black"><h3>1.บริการตัดปาล์ม  </h3></font>
    <font color="black"><h3>ตัดปาล์มคิดเป็นกิโลละ 3 บาท ตัดได้กี่กิโลกรัมเอามา * 3 (แล้วหักค่ามัดจำ 30% ) (อีก 70 % เป็นของลูกค้า)  </h3></font>
    <br><br><br><br><br>
<img src="{{ asset('images/demo/backgrounds/a7.jpg') }}" height="400" width="400">

    <font color="black"><h3>2.บริการตัดหญ้า  </h3></font>
    <font color="black"><h3>ตัดหญ้าจำนวนไร่ละ 500 (ค่าแรง 400 + 100 ค่าน้ำมัน)  </h3></font>
    <br><br><br><br><br>
<img src="{{ asset('images/demo/backgrounds/a6.jpg') }}" height="400" width="400">

    <font color="black"><h3>3.บริการใส่ปุ๋ย  </h3></font>
    <font color="black"><h3>ใส่ปุ๋ยคิดเป็นกระสอบละ 50 บาท ปุ๋ย1 กระสอบราคา 600  บาท  1กระสอบใส่ได้50ต้น  </h3></font>
</center>
@endsection

@section('js')

@endsection
