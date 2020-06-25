<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>สวนปาล์ม</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    ระบบสวนปาล์มอิทนินท์
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li id="myindex">
                            <a class="nav-link" href="{{  url('/home') }}">{{ __('หน้าหลัก') }}</a>
                        </li>

                        @if (Auth::user()->type == '0')

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('บริการ') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{  route('index') }}" >
                                        {{ __('จ้างงาน') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route ('history') }}" >
                                        {{ __('ตรวจสอบประวัติการจ้างงาน') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('workschedule') }}" >
                                        {{ __('ตรวจสอบตารางงานของผู้รับเหมา') }}
                                    </a>
                                </div>
                            </li>
                                @php
                                $count_num = App\Work::where('status_tranfar','ค้างชำระ')->count();

                                $count_num1 = App\Work::where('status_bill','ค้างชำระ')
                                                ->where('status_work','ดำเนินการเสร็จสิ้น')
                                                ->count();

                            @endphp

                            @if ( $count_num1 == '0' && $count_num == '0' )

                            @elseif( $count_num != '0' )
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('แจ้งมัดจำ') }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{  route('deposit') }}" >
                                            {{ __('ชำระค่ามัดจำ') }}
                                        </a>
                                    </div>
                                </li>

                            @elseif( $count_num1 != '0' )
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('แจ้งมัดจำ') }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{route('monney') }}" >
                                            {{ __('ชำระค่าบริการ') }}
                                        </a>
                                    </div>
                                </li>
                            @endif

                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('บริการ') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{  route('index') }}" >
                                        {{ __('จ้างงาน') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('history') }}" >
                                        {{ __('ตรวจสอบประวัติการจ้างงาน') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('workschedule') }}" >
                                        {{ __('ตรวจสอบตารางงานของผู้รับเหมา') }}
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('ตาราง') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{  route('works') }}" >
                                        {{ __('ตารางงาน') }}
                                    </a>

                                    {{-- <a class="dropdown-item" href="{{  route('details') }}" >
                                        {{ __('ตารางรายละเอียดงาน') }}
                                    </a> --}}

                                    <a class="dropdown-item" href="{{  route('prob') }}" >
                                        {{ __('ตารางแจ้งปัญหา') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('emp') }}" >
                                        {{ __('ตารางพนักงาน') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('customers') }}" >
                                        {{ __('ตารางลูกค้า') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('report') }}" >
                                        {{ __('รายงานกำไร-ขาดทุน') }}
                                    </a>
                                </div>
                            </li>

                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('problem') }}">{{ __('แจ้งปัญหา') }}</a>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('ลงทะเบียน') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->titlename }} {{ Auth::user()->name }} {{ Auth::user()->lastname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ออกจากระบบ') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')

</body>
</html>
