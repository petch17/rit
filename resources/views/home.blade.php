@extends('layouts.myhome')

@section('css')

@endsection

@section('content')

<div class="site-blocks-cover overlay" style="background-image: url({{asset('images/demo/backgrounds/a4.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-10">


          <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <center>
                    <h1 data-aos="fade-up">welcome to : <span class="typed-words"></span></h1>
                    {{-- <p data-aos="fade-up" data-aos-delay="100">Explore top-rated attractions, activities and more!</p> --}}
                </center>
                </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <br>
  <div>
 ติดต่อเราได้ที่ 095-5716743 ( คุณชิด )
 นาง พัชรินทร์ สิทธิบุตร<br/>เลขที่บัญชี : 0201-67110-1409<br/>ธนาคาร : กสิกรไทย<br/>
 หรือชำระเงินผ่านทางพร้อมเพย์&nbsp;099-878-4747
 {{-- <h5>
    <font color="red">

    <font color="blue">
        ชำระเงินผ่านธนาคาร<br/>นาย ชาญณรงค์ สิทธิบุตร<br/>เลขที่บัญชี : 333-33333-33-3<br/>ธนาคาร : กสิกรไทย<br/>
        หรือชำระเงินผ่านทางพร้อมเพย์&nbsp;099-878-4747
    </font> <br/>
    <font color="red">

    </font> <br/>
</h5> --}}

  </div>

  @endsection

@section('js')

{{-- <script src="{{ asset('new/js/main.js') }}"></script> --}}
<script src="{{ asset('js/typed.js') }}"></script>
<script>
var typed = new Typed('.typed-words', {
strings: ["สวนปาล์มอินทนินท์"],
typeSpeed: 80,
backSpeed: 80,
backDelay: 4000,
startDelay: 1000,
loop: true,
showCursor: true
});
</script>

<script>
    $(document).ready(function () {
        document.getElementById('myhome').classList.add('active');
        // $('#table1').DataTable();
    });

</script>

@endsection
