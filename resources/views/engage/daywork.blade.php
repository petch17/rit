@extends('layouts.myhome')

@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
<link rel='stylesheet' href='{{ asset ('css/fullcalendar.min.css')}}' />
@endsection

@section('content')
{{-- {!! $calendar_details->script() !!} --}}
{{-- <div id='calendar'></div> --}}
<br/><br/><br/>
<h1 align="center">
    โปรดเลือกใช้บริการ
</h1> </br>
{!! Form::open(['route' => 'dayworkstore', 'method' => 'post', 'files'=>true ]) !!}

{{-- <input name="user_id" type="hidden" value="{{Auth::user()->id}}" /> --}}
@if ( $codes == $codes)

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

@else

error

@endif

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
