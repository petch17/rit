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
                <div class="card-header"> <center> <h1> ตารางรายละเอียดค่ามัดจำ </h1> </center> </div>

                        <table id="example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>


                                <th align="center"> ชื่อ </th>
                                <th align="center"> ค่ามัดจำ </th>
                                <th align="center"> วันที่จ่ายค่ามัดจำ </th>
                                <th align="center"> บันทึกช่วยจำ </th>

                                {{-- <th align="center"> ค่าบริการ </th>
                                <th align="center"> วันที่จ่ายค่าบริการ </th>
                                <th align="center"> บันทึกช่วยจำ </th> --}}

                            </thead>
                            <tbody>
                            @foreach ( $zoombill as $index=>$item )
                            <tr>


                                <td align="center"> {{ $item->name }}</td>
                                <td align="center"> <img src="{{asset('./images/tranfar_slip/'. $item->transfar_slip)}}" width="150" height="150">  </td>
                                <td align="center"> {{ $item->transfar_date  }} </td>


                                {{-- <td align="center"> <img src="{{asset('./images/money_slip/'. $item->monney_slip)}}" width="150" height="150">  </td>
                                <td align="center"> {{ $item->monney_date  }} </td>
                                <td align="center"> {{ $item->desc }} </td> --}}




                            </tr>


                            @endforeach
                             </tbody>
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
        document.getElementById('activity3').classList.add('active');
        document.getElementById('wkdetail').classList.add('active');
        $('#example').DataTable();
    });

</script>

@endsection
