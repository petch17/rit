
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Listed &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('new/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('new/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('new/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('new/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('new/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('new/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('new/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('new/css/rangeslider.css') }}">

    <link rel="stylesheet" href="{{ asset('new/css/style.css') }}">

    @yield('css')

  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-2 bg-white" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="{{ url('/home') }}" class="text-black h2 mb-0">หน้าหลัก</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu">
                <li id="indexhome" ><a href="{{ url('/home') }}"><span>หน้าหลัก</span></a></li>
                <li class="has-children" >
                  <a><span>บริการ</span></a>
                  <ul class="dropdown">
                    <li id="engage" ><a href="{{ route('engage.index') }}">จ้างงาน</a></li>
                    <li id="history" ><a href="{{ route('history') }}">ตรวจสอบประวัติจ้างงาน</a></li>
                    <li id="engage" ><a href="{{ route('workschedule') }}">ตรวจสอบตารางงานองผุ้รับเหมา</a></li>
                  </ul>
                </li>
                <li><a href="blog.html"><span>Blog</span></a></li>
                <li><a href="contact.html"><span>Contact</span></a></li>
                <li class="has-children">
                    <a ><span>{{ Auth::user()->titlename }} {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                        </span>
                    </a>
                    <ul class="dropdown">
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
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>

    </header>

    @yield('content')

  </div>

  <script src="{{ asset('new/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('new/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('new/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('new/js/popper.min.js') }}"></script>
  <script src="{{ asset('new/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('new/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('new/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('new/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('new/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('new/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('new/js/aos.js') }}"></script>
  <script src="{{ asset('new/js/rangeslider.min.js') }}"></script>

  @yield('js')

  </body>
</html>
