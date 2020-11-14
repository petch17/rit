@extends('layouts.app')

@section('css')
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #FFFF66;
                color: #000000;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    @endsection

    @section('content')
    <div class="container">
        <div class="container">

            <div class="card-header" align="center"> <font color="black"><h1>{{ __('รายละเอียดงานสวนปาล์ม') }}</h1></font></div>

                <div class="row">
                    <div class="col-md-5">
                        <thead>
                            <tr>
                                <h2 class="border-right">1.บริการตัดแต่งทางใบ </h2>

                                <span style="border:1px dashed rgb(185, 4, 4);" bgcolor="white"><img src="{{ asset('images/demo/backgrounds/w.jpg') }}" height="300" width="300"></span>
                                <p class="position-relative"> <font color="red" size="5">  #จ้างขั้นต่ำ 300 ต้น</font></p>
                            </tr>
                        </thead>
                    </div>
                    <div class="col-md-7">
                        <br><br><br><br><br>
                        {{-- <marquee behavior=alternate direction=up scrollamount=2 scrolldelay=65 height=80 style="Text-align;filter:wave(add=0,phase=1, freq=1,strength=15,color=.FFFFFF)"> --}}
                            <h3>{{ __('1.บริการตัดแต่งทางใบ ') }}</h3>
                            <h3>{{ __(' คิดเป็นต้นละ 20  บาท') }}</h3>
                            <h3>{{ __(' คิดค่าบรรทุก 300 บาท ') }}</h3>
                            <h3>{{ __(' ค่าอุปกรณ์ 300 บาท ') }}</h3>
                            <h3>{{ __(' หักค่ามัดจำ 30% ') }}</h3>
                        {{-- </marquee> --}}

                    </div>
                    <div class="col-md-5">
                        <thead>
                            <tr>
                                <h2 class="border-right">2.บริการตัดหญ้า </h2>

                                <span style="border:1px dashed rgb(185, 4, 4);" bgcolor="white"><img src="{{ asset('images/demo/backgrounds/a7.jpg') }}" height="300" width="300"></span>
                                <p class="position-relative"> <font color="red" size="5">  #จ้างขั้นต่ำตั้งแต่ 4 ไร่ขึ้นไป</font></p>
                            </tr>
                        </thead>
                    </div>
                    <div class="col-md-7">
                        <br><br><br><br><br>
                        {{-- <marquee behavior=alternate direction=up scrollamount=2 scrolldelay=65 height=80 style="Text-align;filter:wave(add=0,phase=1, freq=1,strength=15,color=.FFFFFF)"> --}}
                            <h3>{{ __('2.บริการตัดหญ้า ') }}</h3>
                            <h3>{{ __('ค่าบริการจำนวนไร่ละ 500 บาท') }}</h3>
                            <h3>{{ __('ค่าแรงไร่ละ 400 บาท  ') }}</h3>
                            <h3>{{ __('ค่าน้ำมัน 100 บาท ต่อ 1 ไร่ ') }}</h3>

                        {{-- </marquee> --}}

                    </div>
                    <div class="col-md-5">
                        <thead>
                            <tr>
                                <h2 class="border-right">3.บริการใส่ปุ๋ย </h2>

                                <span style="border:1px dashed rgb(185, 4, 4);" bgcolor="white"><img src="{{ asset('images/demo/backgrounds/a6.jpg') }}" height="300" width="300"></span>
                                <p class="position-relative"> <font color="red" size="5">   #จ้างขั้นต่ำ 500 ต้นขึ้นไป</font></p>
                            </tr>
                        </thead>
                    </div>
                   <div class="col-md-7">
                        <br><br><br><br><br>
                   {{-- <MARQUEE behavior=alternate direction=left scrollAmount=3 width="4%"><font face=Webdings>3</font></MARQUEE><MARQUEE scrollAmount=1 direction=left width="2%">| | |</MARQUEE> --}}
                            <h3>{{ __('3.บริการใส่ปุ๋ย ') }}</h3>
                            <h3>{{ __('คิดค่าจ้างกระสอบละ 50 บาท ') }}</h3>
                            <h3>{{ __('ปุ๋ย คิดเป็นกระสอบละ 600 บาท ปุ๋ย 1 กระสอบ 50 กิโลกรัม ') }}</h3>
                            <h3>{{ __('ปุ๋ย1 กระสอบใส่ได้ 50 ต้น ') }}</h3>
                            <h3>{{ __('ค่าน้ำมันรถบรรทุกไปซื้อปุ๋ย 500 บาท') }}</h3>
                           {{-- <MARQUEE scrollAmount=1 direction=right width="2%">| | |</MARQUEE><MARQUEE behavior=alternate direction=right scrollAmount=3 width="4%"><font face=Webdings>4</font></MARQUEE>> --}}

                    </div>
                </div>


        </div>
    </div>


    @endsection


