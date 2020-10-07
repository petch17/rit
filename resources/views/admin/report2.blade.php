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

                <section id="services">
                    <ul class="nospace group">
                        <li class="one_quarter">
                            <article>
                            </article>
                        </li>

                        <li class="one_quarter">
                            <article>
                                <h6 class="heading"> ระหว่างวันที่</h6>
                                <footer>
                                    @php
                                        $date_in = $begin_date ;
                                        $day1 = show_tdate($date_in) ;
                                    @endphp
                                    {{ $day1  }}
                                </footer>
                            </article>
                        </li>

                        <li class="one_quarter">
                            <article>
                                <h6 class="heading"> ถึงวันที่</h6>
                                <footer>
                                    @php
                                        $date_in = $end_date ;
                                        $day2 = show_tdate($date_in) ;
                                    @endphp
                                    {{ $day2  }}
                                </footer>
                            </article>
                        </li>

                        <li class="one_quarter">
                            <article>
                            </article>
                        </li>

                    </ul>
                </section>
                <br/>

                <table class="table table-striped table-bordered">
                    <tr>
                        {{-- <td height="6"> <b>  <a href="{{ route('zoombill1') }}"> ตัดหญ้า </a> </b>  </td> --}}
                        <td height="6"> <b> ตัดหญ้า</b> </td>
                        <td align="right"> {{ number_format( $grass1 , 2 ) }} </td>
                        <td align="center"> <b> บาท </b> </td>




                    </tr>

                    <tr>
                        <td height="6"> <b> ตัดแต่งทางใบ</b> </td>
                        <td align="right"> {{ number_format( $palm1 , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>

                    </tr>

                    <tr>
                        <td height="6"> <b> รายได้จากการใส่ปุ๋ย </b> </td>
                        <td align="right"> {{ number_format( $fertilizer1 , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                    <tr>
                        <td height="30"> <b> รวมรายได้ </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $results , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าแรงที่ต้องจ่ายลูกจ้าง </b> </td>
                        <td align="right"> {{ number_format( $employee , 2 ) }} </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                    <tr>
                        <td height="6"> <b> ค่าน้ำมันทั้งหมด  </b> </td>
                        <td align="right"> {{ number_format( $oil , 2 ) }} </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                    @php
                        $sum_price = ( $employee * 4 ) + $oil ;
                    @endphp

                    <tr>
                        <td height="30"> <b> รวมรายจ่ายทั้งสิ้น </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $sum_price , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                    <tr>
                        <td height="30"> <b> ค่าน้ำมันที่นายจ้างได้คืน </b> </td>
                        <td width="106" align="right" > {{ number_format( $oil , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                    <tr>
                        <td height="30"> <b> เงินที่นายจ้างได้รับ </b> </td>
                        <td width="106" align="right" > {{ number_format( $sumsults , 2 )  }} </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                    <tr>
                        <td height="30"> <b> กำไรสุทธิ </b> </td>
                        <td width="106" align="right" style="border-bottom: solid 1px #000">
                            <b> {{ number_format( $leader , 2 )  }} </b>
                        </td>
                        <td align="center"> <b> บาท </b> </td>
                          {{-- <td align="center"> <a href="{{route('reviewer2',['id'=>$item_2->id])}}" > คลิก </a> </td> --}}
                    </tr>

                </table>


            </div>
            <br/>
        <center>
            <input class="btn btn-success" type="submit" name="Submit" value=" PRINT "
            onClick="javascript:this.style.display='none';window.print()">

            {!! Form::button('ย้อนกลับ',['type' => 'reset', 'class'=>'btn btn-outline-danger', 'onclick'=>"window.history.back();"]); !!}

            {{-- <a href="{{ route('home') }}">
                {!! Form::button('หน้าหลัก',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
            </a> --}}
        </center>
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
@php
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
@endphp
