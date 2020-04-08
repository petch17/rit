@extends('layouts.admin')

@section('css')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a4.jpg')}}');">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" >
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" >

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <center> <h1> ตารางบริการ </h1> </center> </div>

                        <table id="##example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <th align="center"> รหัส</th>
                                <th align="center"> รายการ </th>
                                <th align="center"> วันที่เริ่ม </th>
                                <th align="center"> วันที่สื้นสุด </th>
                                <th align="center"> ที่อยู่ </th>
                                <th align="center">ชำระเงินเงิน</th>
                                <th align="center"> บริการ </th>
                            </thead>

                            @foreach ( $wok as $index=>$item )

                            <tbody>
                                <th align="center"> {{ $item->id  }} </th>
                                <th align="right"> {{ $item->user_id  }} </th>
                                <th align="center"> {{ $item->begin_date  }} </th>
                                <th align="center"> {{ $item->end_date  }} </th>
                                <th align="center"> {{ $item->address_work  }} </th>
                                <th align="center"> {{ $item->status_bill  }} </th>
                                <th align="center"> {{ $item->status_work  }} </th>
                            </tbody>

                            @endforeach

                        </table>

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
        // document.getElementById('engage').classList.add('active');
        $('#example').DataTable();
    });

</script>

@endsection