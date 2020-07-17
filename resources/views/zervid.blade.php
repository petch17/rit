@extends('layouts.app')

@section('css')
{{-- <div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/aa.jpg')}}');"> --}}

<style>
    body { background-color:#f0f0d0; }
</style>
@endsection

@section('content')
<center>
    <style>
        h1 {text-align: center;}
        p {text-align: center;}
        div {text-align: center;}
        </style>
          <div class="card-header" align="center"> <font color="black"><h1>{{ __('รายละเอียดงานสวนปาล์ม') }}</h1></font></div>
        <h1> </h1>
    {{-- <table width=90% style="border:1px dashed #00aa77;" cellspacing="5" bgcolor="#00aa77" cellpadding="5"><tr><td style="border:10px dashed white;"bgcolor="white">รายละเอียดงานสวนปาล์ม </td></tr></table> --}}

    {{-- <table width=90% style="border:0px dashed #ffaacc;" cellspacing="0" bgcolor="#ffaacc" cellpadding="5"><tr> --}}
        <table>
            <thead>
                <tr>
                    <h2>1.บริการตัดแต่งทางใบ </h2>
                </tr>

            </thead>
         </table>

    <td style="border:1px dashed white;" bgcolor="white"><img src="{{ asset('images/demo/backgrounds/w.jpg') }}" height="400" width="400">
        <br><br><br><br><br>
        <div class="card-header" align="center"> <font color="red">  #จ้างขั้นต่ำ 300 ต้น</font><h3>{{ __('1.ตัดแต่งทางใบ คิดเป็นต้นละ 20  บาท คิดค่าบรรทุก 300 ค่าอุปกรณ์ 300 บาท แล้วหักค่ามัดจำ 30% ') }}</h3></div>
        <br><br>
        <table>
            <thead>
                <tr>
                    <h2>2.บริการตัดหญ้า </h2>
                </tr>

            </thead>
         </table>

    <img src="{{ asset('images/demo/backgrounds/a7.jpg') }}" height="400" width="400">
    <br><br><br><br><br>
    <div class="card-header" align="center">  <font color="red">  #จ้างขั้นต่ำตั้งแต่ 4 ไร่ขึ้นไป</font><h3>{{ __('2.บริการตัดหญ้า จำนวนไร่ละ 500 บาท (ค่าแรง 400 บาท และค่าน้ำมัน 100 บาท ต่อ 1 ไร่)') }}</h3></div>
       <br><br><br><br><br>

        <table>
            <thead>
                <tr>
                    <h2>3.บริการใส่ปุ๋ย</h2>
                </tr>

            </thead>
         </table>
    <img src="{{ asset('images/demo/backgrounds/a6.jpg') }}" height="400" width="400">
    <br><br><br><br>
    <div class="card-header" align="center">  <font color="red">  #จ้างขั้นต่ำ 500 ต้นขึ้นไป</font><h3>{{ __('3.บริการใส่ปุ๋ย คิดเป็นกระสอบละ 600 บาท ปุ๋ย 1 กระสอบ 50 กิโลกรัม  1 กระสอบใส่ได้ 50 ต้น  คิดค่าจ้างกระสอบละ 50 บาท และหักค่าน้ำมันรถบรรทุกไปซื้อปุ๋ย 500 บาท') }}</h3></div>
    <br><br><br>

</center>
@endsection

@section('js')

@endsection
