@extends('layouts.myhome')

@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
<link rel='stylesheet' href='{{ asset ('css/fullcalendar.min.css')}}' />
@endsection

@section('content')
{{-- {!! $calendar_details->script() !!} --}}
{{-- <div id='calendar'></div> --}}
<br/><br/><br/>
<h1>
    กรุณากรอกข้อมูลด้านล่างให้ครบถ้วน
</h1> </br>
{!! Form::open(['route' => 'detailstore', 'method' => 'post', 'files'=>true ]) !!}

{!! Form::textarea('address', null,['class'=>'form-control','placeholder'=>'ใส่ที่อยู่สวน'] ); !!}
</br>
@foreach ($adddetail as $item)

@if ( $code == $code )

<section id="services">
    <ul class="nospace group">

        @if ( $item->working == 'ตัดหญ้า' && $item->work_id == $code )

        <li class="one_quarter">
            <article>
                <i class="fa fa-leaf fa-6x" aria-hidden="true"></i>
                <h6 class="heading"> ตัดหญ้า </h6>
                <footer>
                    <center>
                        <input name="work[]" type="hidden" value="ตัดหญ้า" />
                        {!! Form::number('farm_grass', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนไร่'] ); !!}
                    </center>
                </footer>
            </article>
        </li>

        @elseif( $item->working == 'ตัดปาล์ม' && $item->work_id == $code )

        <li class="one_quarter">
            <article>
                <i class="fa fa-tree fa-6x" aria-hidden="true"></i>
                <h6 class="heading"> ตัดปาล์ม </h6>
                <footer>
                    <center>
                        <input name="work[]" type="hidden" value="ตัดปาล์ม" />
                        {!! Form::number('kilo_palm', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนกิโลกรัม'] ); !!}
                    </center>
                </footer>
            </article>
        </li>

        @elseif( $item->working == 'ใส่ปุ๋ย' && $item->work_id == $code )

        <li class="one_quarter">
            <article>
                <i class="fa fa-archive fa-6x" aria-hidden="true"></i>
                <h6 class="heading"> ใส่ปุ๋ย </h6>
                <footer>
                    <center>
                        <input name="work[]" type="hidden" value="ใส่ปุ๋ย" />
                        {!! Form::number('unit_fertilizer', null,['class'=>'form-control','placeholder'=>'ใส่จำนวนต้น'] ); !!}
                    </center>
                </footer>
            </article>
        </li>

        @endif

    </ul>
</section>

@endif

@endforeach


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

{{-- <script src="{{ asset ('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{ asset ('js/moment.min.js')}}"></script>
<script src="{{ asset ('js/fullcalendar.min.js')}}"></script> --}}

{{-- <script>
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
</script> --}}

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
