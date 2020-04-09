@extends('layouts.myhome')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a1.jpg')}}');">

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" >
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" >

@endsection

@section('content')

<h1 align="center">
    รับจ้างเฉพาะภายในพื้นที่หมู่บ้านอินทนินท์
</h1>

@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript" ></script>
<script>
    $(document).ready(function() {
        document.getElementById('myindex').classList.add('active');
        // $('#table1').DataTable();
    });
</script>

@endsection
