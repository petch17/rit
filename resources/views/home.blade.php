@extends('layouts.myhome')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a4.jpg')}}');">

@section('css')

@endsection

@section('content')

<h1 align="center">
    รับจ้างเฉพาะภายในพื้นที่หมู่บ้านอินทนนท์
</h1>

@endsection

@section('js')

<script>
    $(document).ready(function() {
        document.getElementById('myindex').classList.add('active');
        // $('#table1').DataTable();
    });
</script>

@endsection
