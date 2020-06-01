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
                <div class="card-header"> <center> <h1> ตารางรายละเอียดงาน </h1> </center> </div>

                        <table id="example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <th > ลำดับ</th>
                                <th > บริการที่เลือก </th>
                                <th > กิโลกรัม </th>
                                <th > ต้น </th>
                                <th > ไร่ </th>
                            </thead>
                            <tbody>
                            @foreach ( $firms as $index=>$item )
                            <tr>
                                <td align="right"> {{ $index+1  }} </td>
                                <td align="center"> {{ $item->working  }} </td>
                                <td align="right"> {{ $item->kilo_palm  }} </td>
                                <td align="right"> {{ $item->unit_fertilizer  }} </td>
                                <td align="right"> {{ $item->farm_grass  }} </td>
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
