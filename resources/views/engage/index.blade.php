@extends('layouts.myhome')

@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
{{-- <link rel='stylesheet' href='{{ asset ('css/fullcalendar.min.css')}}' /> --}}
@endsection

@section('content')
{{-- {!! $calendar_details->script() !!} --}}
{{-- <div id='calendar'></div> --}}
<br/><br/><br/>
<h1 align="center">
    {{-- <div style="background-color:skyblue;"> --}}
        <font color="black"> โปรดเลือกใช้บริการ </font>
    {{-- </div> --}}
</h1> </br>
{!! Form::open(['route' => 'addstore', 'method' => 'post', 'files'=>true ]) !!}
@csrf
<input name="user_id" type="hidden" value="{{ Auth::user()->id }}" />

<section id="services">
    <ul class="nospace group">
        <li class="one_quarter">
            <article>
                {{-- <i class="fa fa-leaf fa-6x" aria-hidden="true"></i> --}}
                <img src="{{asset('./images/palm/a7.jpg')}}" width="150" height="150">
                <h6 class="heading"> ตัดหญ้า  </h6>
                {{-- <h6 class="heading"> <a href="" target="_blank"> ตัดหญ้า </a> </h6> --}}
                {{-- <p> ตัดหญ้า </p> --}}
                <footer>
                    <center>
                        {!! Form::checkbox('work[]', 'ตัดหญ้า' ); !!}คลิกเพื่อเลือกรายการ
                        {!! Form::number('farm_grass', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนไร่'] ); !!}
                        <font color="red">จ้างขั้นต่ำ 4 ไร่ </font>
                    </center>
                    {{-- {!! Form::button('เลือกบริการ',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!} --}}
                </footer>
            </article>
        </li>
        <li class="one_quarter">
            <article>
                {{-- <i class="fa fa-tree fa-6x" aria-hidden="true"></i> --}}
                <img src="{{asset('./images/palm/w.jpg')}}" width="150" height="150">
                <h6 class="heading"> ตัดแต่งทางใบ </h6>
                {{-- <p> ตัดแต่งทางใบ </p> --}}
                <footer>
                    <center>
                        {!! Form::checkbox('work[]', 'ตัดแต่งทางใบ' ); !!}คลิกเพื่อเลือกรายการ
                        {!! Form::number('leaf_palm', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนต้น'] ); !!}
                        <font color="red">จ้างขั้นต่ำ 300 ต้น</font>
                    </center>
                    {{-- {!! Form::button('เลือกบริการ',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!} --}}
                </footer>
            </article>
        </li>
        <li class="one_quarter">
            <article>
                {{-- <i class="fa fa-archive fa-6x" aria-hidden="true"></i> --}}
                <img src="{{asset('./images/palm/a6.jpg')}}" width="150" height="150">
                <h6 class="heading"> ใส่ปุ๋ย </h6>
                {{-- <p> ใส่ปุ๋ย </p> --}}
                <footer>
                    <center>
                        {!! Form::checkbox('work[]', 'ใส่ปุ๋ย' ); !!}คลิกเพื่อเลือกรายการ
                        {!! Form::number('unit_fertilizer', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนต้น'] ); !!}
                        <font color="red">จ้างขั้นต่ำ 500 ต้น</font>
                    </center>
                    {{-- {!! Form::button('เลือกบริการ',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!} --}}
                </footer>
            </article>
        </li>
    </ul>
</section></br></br>
<h1 align="center">
    {{-- <div style="background-color:skyblue;"> --}}
        <font color="black"> กรุณากรอกที่อยู่สวนปาล์มของท่านให้ละเอียด </font>
    {{-- </div> --}}

</h1> </br>
<center>
    {!! Form::textarea('address', null,['class'=>'form-control','placeholder'=>'ใส่ที่อยู่สวน'] ); !!}
</center> </br>

<h1 align="center">
    {{-- <div style="background-color:skyblue;"> --}}
        <p style="background-color: rgb(224, 95, 95)"> <font color="black"> **กรุณาตรวจสอบตารางานผู้รับเหมาก่อนเลือกวันที่เริ่มจ้างงาน**</p></font>
        <body>

            <p><a href="http://127.0.0.1:8000/schedule/engage/workschedule"><font color="red">คลิกเพื่อดูตารางงานผู้รับเหมา</a> </p> </font>
            <p><a href="http://127.0.0.1:8000/zervid"><font color="blue">คลิกเพื่อดูรายละเอียดงาน</a> </p> </font>

    {{-- </div> --}}

</h1> </br>
<h1 align="center">
    {{-- <div style="background-color:skyblue;"> --}}
        <font color="black"> กรุณาเลือกวันที่เริ่มงานของคุณ </font>
    {{-- </div> --}}

</h1> </br>
{{-- <section id="services">
    <ul class="nospace group">
        <li class="one_quarter">
            <article>
            </article>
        </li>

        <li class="one_quarter">
            <article> --}}
            <div align="center">
                <h6 class="heading"> เลือกวันที่เริ่มงาน : </h6>
                {{-- <footer> --}}
                    {!! Form::date('begin_date', null, ['class' => 'form-control', 'placeholder' => '-- เลือกวันที่ --']) !!}
                {{-- </footer> --}}
            </div>
            {{-- </article>
        </li>

        <li class="one_quarter">
            <article>
                <h6 class="heading"> เลือกวันที่สิ้นสุดงาน :</h6>
                <footer>
                    {!! Form::date('end_date', null, ['class' => 'form-control', 'placeholder' => '-- เลือกวันที่ --']) !!}
                </footer>
            </article>
        </li>

        <li class="one_quarter">
            <article>
            </article>
        </li>

    </ul>
</section> --}}
</br> </br>
<div align="center">
    {!! Form::button('ยืนยัน',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
    {!! Form::button('ยกเลิก',['type' => 'reset', 'class'=>'btn btn-outline-danger', 'onclick'=>"window.history.back();"]); !!}
</div>
{!! Form::close() !!}


@endsection

@section('js')

<script>
    $(document).ready(function () {
        document.getElementById('activity2').classList.add('active');
        document.getElementById('engage').classList.add('active');
        // $('#table1').DataTable();
    });

</script>

@endsection
