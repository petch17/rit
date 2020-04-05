@extends('layouts.myhome')
@section('css')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
<link rel='stylesheet' href='{{ asset ('css/fullcalendar.min.css')}}' />
@endsection

@section('content')
    <center> <h3> ตารางงานผู้รับเหมา </h3> </center>
    <div id='calendar'></div>

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
                    title : 'ไม่ว่าง',
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
        document.getElementById('workschedule').classList.add('active');
        // $('#table1').DataTable();
    });

</script>



@endsection
