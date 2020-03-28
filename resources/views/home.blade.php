@extends('layouts.myhome')

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
