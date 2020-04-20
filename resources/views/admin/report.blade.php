@extends('layouts.myhome')

@section('css')

<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a4.jpg')}}');">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" >
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" >

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> <center> <h1> กำไร-ขาดทุน </h1> </center> </div>

                {!! Form::open(['route' => 'report2', 'method' => 'post', 'files'=>true ]) !!}
                @csrf

                <section id="services">
                    <ul class="nospace group">
                        <li class="one_quarter">
                            <article>
                            </article>
                        </li>

                        <li class="one_quarter">
                            <article>
                                <h6 class="heading"> เลือกวันที่</h6>
                                <footer>
                                    {!! Form::date('date1', null, ['class' => 'form-control', 'placeholder' => '-- เลือกวันที่ --']) !!}
                                </footer>
                            </article>
                        </li>

                        <li class="one_quarter">
                            <article>
                                <h6 class="heading"> เลือกวันที่</h6>
                                <footer>
                                    {!! Form::date('date2', null, ['class' => 'form-control', 'placeholder' => '-- เลือกวันที่ --']) !!}
                                </footer>
                            </article>
                        </li>

                        <li class="one_quarter">
                            <article>
                            </article>
                        </li>

                    </ul>
                </section>

                </br> </br>
                <div align="center">
                    {!! Form::button('ยืนยัน',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
                    {!! Form::button('ยกเลิก',['type' => 'reset', 'class'=>'btn btn-outline-danger', 'onclick'=>"window.history.back();"]); !!}
                </div>
                {!! Form::close() !!}

                    </div>
                </div>
    </div>
</div>

@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript" ></script>

<script>
     $(document).ready(function () {
        document.getElementById('activity3').classList.add('active');
        document.getElementById('report').classList.add('active');
        $('#example').DataTable();
    });

</script>

@endsection
{{-- @php
function show_tdate($date_in)
{
$month_arr = array("มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" ,
"กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ;

$tok = strtok($date_in, "-");
$year = $tok ;

$tok = strtok("-");
$month = $tok ;

$tok = strtok("-");
$day = $tok ;

$year_out = $year + 543 ;
$cnt = $month-1 ;
$month_out = $month_arr[$cnt] ;

if ($day < 10 ) $day_out="" .$day; else $day_out=$day ; $t_date=$day_out." ".$month_out." ".$year_out ;

return $t_date ;
}
@endphp --}}
