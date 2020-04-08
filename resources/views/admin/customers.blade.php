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
                <div class="card-header"> <center> <h1> ตารางรายชื่อ </h1> </center> </div>


                        <table id="##example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <th align="center">คำนำหน้า </th>
                                <th align="center"> ชื่อ </th>
                                <th align="center"> นามสกุล </th>
                                <th align="center"> สถานะ </th>
                                <th align="center"> ที่อยู่ </th>
                                <th align="center"> เบอร์โทร </th>
                            </thead>

                            @foreach ( $customers as $index=>$item )

                            <tbody>
                                <th align="center"> {{ $item->titlename  }} </th>
                                <th align="center"> {{ $item->name  }} </th>
                                <th align="right"> {{ $item->lastname  }} </th>
                                <th align="center"> {{ $item->username  }} </th>
                                <th align="center"> {{ $item->address  }} </th>
                                <th align="center"> {{ $item->phone  }} </th>
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