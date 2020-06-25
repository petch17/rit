<!DOCTYPE html>
<html lang="en">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
    <title>สวนปาล์มอินทนินท์</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">

    @yield('css')

</head>

<body id="top">
    <!-- Top Background Image Wrapper -->
    <div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a2.jpg')}}');">
        {{-- <div class="wrapper row0">
    <div id="topbar" class="hoc clear">
      <p class="fl_left nospace"><i class="fas fa-phone"></i> +00 (123) 456 7890</p>
      <p class="fl_right nospace"><a class="btn" href="#">Get A Quote</a></p>
    </div>
  </div> --}}
        <div class="wrapper row1">
            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <h1><a href="{{ url('/home') }}">ระบบสวนปาล์มอินทนินท์</a></h1>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li id="myhome">
                            <a href="{{ url('/home') }}">
                                <i class="fa fa-home" aria-hidden="true"></i> หน้าหลัก</a>
                        </li>

                    @if (Auth::user()->type == '0')

                        <li id="activity2">
                            <a class="drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                <i class="fas fa-highlighter" aria-hidden="true"></i> บริการ</a>
                                <ul>
                                    <li id="engage">
                                        <a href="{{ route('index') }}">{{ __('จ้างงาน') }}</a>
                                    </li>
                                    <li id="history">
                                        <a href="{{ route('history') }}">{{ __('ตรวจสอบประวัติจ้างงาน') }}</a>
                                    </li>
                                    <li id="workschedule">
                                        <a class="workschedule" href="{{ route('workschedule') }}">{{ __('ตรวจสอบตารางงานของผู้รับเหมา') }}</a>
                                    </li>
                                </ul>
                        </li>


                        @php
                            $count_tranfar = App\Work::where('status_tranfar','ค้างชำระ')->count();

                            $count_work = App\Work::where('status_bill','ค้างชำระ')
                                        ->where('status_work','ดำเนินการเสร็จสิ้น')
                                        ->count();

                        @endphp

                        @if ( $count_work == '0' && $count_tranfar == '0' )

                        @elseif( $count_tranfar != '0' )
                        <li>
                            <a class="drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                <i class="fab fa-btc" aria-hidden="true"></i> แจ้งมัดจำ</a>
                                <ul>
                                    <li>
                                        <a href="{{ route('deposit') }}">{{ __('ชำระค่ามัดจำ') }}</a>
                                    </li>
                                </ul>
                        </li>
                        @elseif( $count_work != '0' )
                        <li>
                            <a href="{{ route('monney') }}">
                                <i class="fab fa-btc" aria-hidden="true"></i> ตรวจสอบใบเสร็จรับเงิน</a>
                        </li>
                        {{-- <li>
                            <a class="drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                <i class="fab fa-btc" aria-hidden="true"></i> ตรวจสอบใบเสร็จรับเงิน</a>
                                <ul>
                                    <li>
                                        <a href="{{ route('monney') }}">{{ __('ชำระค่าบริการ') }}</a>
                                    </li>
                                </ul>
                        </li> --}}
                        @endif


                    @else

                         @php
                            $count = App\Work::where('status_work','กำลังดำเนินการ')->count();

                            $count2 = App\Work::where('status_work','อยู่ระหว่างการดำเนินการ')->count();

                            $count3 = App\Work::where('status_work','ดำเนินการเสร็จสิ้น')
                                        ->where('status_bill','ค้างชำระ')
                                        ->count();

                        @endphp

                        <li id="confirm">
                            <a class="drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <i class="fa fa-cog" aria-hidden="true"></i> ตรวจสอบงาน</a>
                                <ul>
                                    <li id="con1">
                                        <a href="{{ route('confirm1') }}"> งานที่สั่งเข้ามา ( {{ $count }} ) </a>
                                    </li>
                                    <li id="con2">
                                        <a href="{{ route('confirm2') }}"> งานที่กำลังทำ ( {{ $count2 }} ) </a>
                                    </li>
                                    <li id="con3">
                                        <a href="{{ route('confirm3') }}"> งานที่รอชำระเงิน ( {{ $count3 }} ) </a>
                                    </li>
                                </ul>
                        </li>

                        <li id="activity2">
                            <a class="drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                <i class="fas fa-highlighter" aria-hidden="true"></i> บริการ</a>
                                <ul>
                                    <li id="engage">
                                        <a href="{{ route('index') }}">{{ __('จ้างงาน') }}</a>
                                    </li>
                                    <li id="history">
                                        <a href="{{ route('history') }}">{{ __('ตรวจสอบประวัติจ้างงาน') }}</a>
                                    </li>
                                    <li id="workschedule">
                                        <a class="workschedule" href="{{ route('workschedule') }}">{{ __('ตรวจสอบตารางงานของผู้รับเหมา') }}</a>
                                    </li>
                                </ul>
                        </li>

                        <li id="activity3">
                            <a class="drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                <i class="fas fa-list-ul" aria-hidden="true"></i> ตาราง</a>
                                <ul>
                                    <li id="wks">
                                        <a href="{{ route('works') }}">{{ __('ตารางงาน') }}</a>
                                    </li>
                                    {{-- <li id="wkdetail">
                                        <a href="{{ route('details') }}">{{ __('ตารางรายละเอียดงาน') }}</a>
                                    </li> --}}
                                    <li id="probs">
                                        <a href="{{ route('prob') }}">{{ __('ตารางแจ้งปัญหา') }}</a>
                                    </li>
                                    <li id="emps">
                                        <a href="{{ route('emp') }}">{{ __('ตารางพนักงาน') }}</a>
                                    </li>
                                    <li id="cus">
                                        <a href="{{ route('customers') }}">{{ __('ตารางลูกค้า') }}</a>
                                    </li>
                                    <li id="report">
                                        <a href="{{ route('report') }}">{{ __('รายงานกำไร-ขาดทุน') }}</a>
                                    </li>
                                </ul>
                        </li>

                    @endif

                        <li id="problem">
                            <a href="{{ route('problem') }}">
                                <i class="fa fa-cog" aria-hidden="true"></i> แจ้งปัญหา</a>
                        </li>


                        <li>
                            <a class="drop" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->titlename }} {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                                <span class="caret"></span>
                            </a>
                            <ul>
                                @guest
                                <li>
                                    <a href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('ลงทะเบียน') }}</a>
                                </li>
                                @endif
                                @else
                                <li>
                                <a href="{{ route('profile.index') }}"> แก้ไขข้อมูลผู้ใช้งาน </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('ออกจากระบบ') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @endguest
                            </ul>
                        </li>
                    </ul>
                    {{-- <li><a href="#">Link Text</a></li> --}}
                    </ul>
                </nav>
            </header>
        </div>

        <div id="breadcrumb" class="hoc clear">
            {{-- <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Ipsum</a></li>
                <li><a href="#">Dolor</a></li>
            </ul> --}}
        </div>
    </div>
    <!-- End Top Background Image Wrapper -->

    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <div class="content">

                @yield('content')

            </div>
            <!-- / main body -->
        </main>
    </div>

    <!-- Bottom Background Image Wrapper -->
        <div class="wrapper row5">
            <footer id="footer" class="hoc clear">
                <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
                <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/"
                        title="Free Website Templates">OS Templates</a></p>
            </footer>
        </div>
    <!-- End Bottom Background Image Wrapper -->
    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="{{asset('./layout/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('./layout/scripts/jquery.backtotop.js')}}"></script>
    <script src="{{asset('./layout/scripts/jquery.mobilemenu.js')}}"></script>

    @yield('js')

</body>

</html>
