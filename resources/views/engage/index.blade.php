@extends('layouts.myhome')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a4.jpg')}}');">

@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
<link rel='stylesheet' href='{{ asset ('css/fullcalendar.min.css')}}' />
@endsection

@section('content')
{{-- {!! $calendar_details->script() !!} --}}
<div id='calendar'></div>
<br/><br/><br/>
<h1 align="center">
    โปรดเลือกใช้บริการ
</h1> </br>
{!! Form::open(['route' => 'addstore', 'method' => 'post', 'files'=>true ]) !!}

<input name="user_id" type="hidden" value="{{Auth::user()->id}}" />

<section id="services">
    <ul class="nospace group">
        <li class="one_quarter">
            <article>
            </article>
        </li>

        <li class="one_quarter">
            <article>
                <h6 class="heading"> เลือกวันที่เริ่มงาน : </h6>
                <footer>
                    {!! Form::date('begin_date', null, ['class' => 'form-control', 'placeholder' => '-- เลือกวันที่ --']) !!}
                </footer>
            </article>
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
</section>

<section id="services">
    <ul class="nospace group">
        <li class="one_quarter">
            <article>
                <i class="fa fa-leaf fa-6x" aria-hidden="true"></i>
                {{-- <img src="{{asset('./images/palm/cutgrass.jpg')}}" width="150" height="150"> --}}
                <h6 class="heading"> ตัดหญ้า </h6>
                {{-- <p> ตัดหญ้า </p> --}}
                <footer>
                    <center>
                        {!! Form::checkbox('work[]', 'ตัดหญ้า' ); !!}คลิกเพื่อเลือกรายการ
                        {!! Form::number('farm_grass', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนไร่'] ); !!}
                    </center>
                    {{-- {!! Form::button('เลือกบริการ',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!} --}}
                </footer>
            </article>
        </li>
        <li class="one_quarter">
            <article>
                <i class="fa fa-tree fa-6x" aria-hidden="true"></i>
                {{-- <img src="{{asset('./images/palm/cutpalm.png')}}" width="150" height="150"> --}}
                <h6 class="heading"> ตัดปาล์ม </h6>
                {{-- <p> ตัดปาล์ม </p> --}}
                <footer>
                    <center>
                        {!! Form::checkbox('work[]', 'ตัดปาล์ม' ); !!}คลิกเพื่อเลือกรายการ
                        {!! Form::number('kilo_palm', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนกิโลกรัม'] ); !!}
                    </center>
                    {{-- {!! Form::button('เลือกบริการ',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!} --}}
                </footer>
            </article>
        </li>
        <li class="one_quarter">
            <article>
                <i class="fa fa-archive fa-6x" aria-hidden="true"></i>
                {{-- <img src="{{asset('./images/palm/fertilizer.jpg')}}" width="150" height="150"> --}}
                <h6 class="heading"> ใส่ปุ๋ย </h6>
                {{-- <p> ใส่ปุ๋ย </p> --}}
                <footer>
                    <center>
                        {!! Form::checkbox('work[]', 'ใส่ปุ๋ย' ); !!}คลิกเพื่อเลือกรายการ
                        {!! Form::number('unit_fertilizer', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนต้น'] ); !!}
                    </center>
                    {{-- {!! Form::button('เลือกบริการ',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!} --}}
                </footer>
            </article>
        </li>
        {{-- <li class="one_quarter">
          <article><i class="fas fa-ribbon fa-4x"></i>
            <h6 class="heading">Arcu eget iaculis</h6>
            <p> ตัดหญ้า </p>
            <footer> {!! Form::checkbox('name', 'value' ); !!} </footer>
          </article>
        </li> --}}
    </ul>
</section>
</br> </br>
<div align="center">
    {!! Form::button('ยืนยัน',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
    {!! Form::button('ยกเลิก',['type' => 'reset', 'class'=>'btn btn-outline-danger', 'onclick'=>"window.history.back();"]); !!}
</div>
{!! Form::close() !!}


@endsection

@section('js')
<!-- Scripts -->
{{-- <script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> --}}

<script src="{{ asset ('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{ asset ('js/moment.min.js')}}"></script>
<script src="{{ asset ('js/fullcalendar.min.js')}}"></script>

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($dates as $index)
                {
                    title : '{{ $index->user_id }}',
                    start : '{{ $index->begin_date }}',
                    end : '{{ $index->end_date }}',
                    // url : '{{ route('engage.edit', $index->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>

<script>
    $(document).ready(function () {
        document.getElementById('engage').classList.add('active');
        // $('#table1').DataTable();
    });

</script>

<script>
    $(document).on('click', '.delBtn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        // alert(id);
        swal({
            title: "คุณต้องการลบ?",
            text: "หากคุณทำการลบข้อมูล จะไม่สามารถทำการกู้คืนได้อีก",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "DELETE",
                        url: '{{ url('trash')}}/' + id,
                        data: { ids: id, _token: $('#_token').val(), },
                        success: function (data) {
                            // alert(1)
                            // alert(data.success)
                            if (data.success == "1") {
                                swal("ทำการลบข้อมูลสำเร็จ", {
                                    icon: "success",
                                }).then(() => {
                                    // alert(1);
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: "พบข้อผิดพลาด",
                                    text: "กรุณาติดต่อผู้ดูแลระบบ",
                                    icon: "warning",
                                    dangerMode: true,

                                });
                            }
                        }
                    });
                } else {
                    swal("ยกเลิกการลบข้อมูล");
                }
            });
    });
</script>

@endsection
