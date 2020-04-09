@extends('layouts.admin')

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
                <div class="card-header"> <center> <h1> ตารางรายละเอียดงาน </h1> </center> </div>

                        <table id="example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <th align="center"> รหัส</th>
                                <th align="center"> งานที่ </th>
                                <th align="center"> บริการ </th>
                                <th align="center"> กิโลกรัม </th>
                                <th align="center"> ต้น </th>
                                <th align="center"> ไร่ </th>
                            </thead>

                            @foreach ( $wdetail as $index=>$item )

                            <tbody>
                                <th align="center"> {{ $item->id  }} </th>
                                <th align="right"> {{ $item->work_id  }} </th>
                                <th align="center"> {{ $item->working  }} </th>
                                <th align="center"> {{ $item->kilo_palm  }} </th>
                                <th align="center"> {{ $item->unit_fertilizer  }} </th>
                                <th align="center"> {{ $item->farm_grass  }} </th>
                            </tbody>

                            @endforeach

                        </table>

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
        // document.getElementById('engage').classList.add('active');
        $('#example').DataTable();
    });

</script>

@endsection
