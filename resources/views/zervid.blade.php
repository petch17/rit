@extends('layouts.app')

@section('css')
{{-- <div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/aa.jpg')}}');"> --}}

<style>
    body { background-color:#00aa77; }
</style>
@endsection

@section('content')
<center>
    <style>
        h1 {text-align: center;}
        p {text-align: center;}
        div {text-align: center;}
        </style>
        <h1>รายละเอียดงานสวนปาล์ม </h1>
    {{-- <table width=90% style="border:1px dashed #00aa77;" cellspacing="5" bgcolor="#00aa77" cellpadding="5"><tr><td style="border:10px dashed white;"bgcolor="white">รายละเอียดงานสวนปาล์ม </td></tr></table> --}}

    <table width=90% style="border:0px dashed #ffaacc;" cellspacing="0" bgcolor="#ffaacc" cellpadding="5"><tr>
    <td style="border:1px dashed white;" bgcolor="white"><img src="{{ asset('images/demo/backgrounds/a5.jpg') }}" height="400" width="400">
        <table width=90% cellpadding="4" cellspacing="0" style="border:double 0px rgb(105, 183, 255);"><tr><td style="border:double 5px rgb(33, 235, 43);">1.บริการตัดปาล์ม คิดเป็นกิโลละ 3 บาท ตัดได้กี่กิโลกรัมเอามา * 3 (แล้วหักค่ามัดจำ 30% ) (อีก 70 % เป็นของลูกค้า)</td></tr></table>
        <br><br><br><br><br>
    <img src="{{ asset('images/demo/backgrounds/a7.jpg') }}" height="400" width="400">
    <table width=90% cellpadding="4" cellspacing="0" style="border:double 5px rgb(19, 196, 13);"><tr><td style="border:double 5px rgb(36, 235, 36);">2.บริการตัดหญ้า จำนวนไร่ละ 500 (ค่าแรง 400 + 100 ค่าน้ำมัน)</td></tr></table>
        <br><br><br><br><br>
    <img src="{{ asset('images/demo/backgrounds/a6.jpg') }}" height="400" width="400">
    <table width=90% cellpadding="4" cellspacing="0" style="border:double 0px rgb(25, 228, 42);"><tr><td style="border:double 5px rgb(31, 231, 64);">3.บริการใส่ปุ๋ย คิดเป็นกระสอบละ 50 กิโลกรัม ปุ๋ย 1 กระสอบราคา 600  บาท  1 กระสอบใส่ได้ 50 ต้น</td></tr></table>
</center>
@endsection

@section('js')

@endsection
