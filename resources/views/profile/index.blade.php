@extends('layouts.myhome')

@section('css')

@endsection

@section('content')

<div class="card-body">

    <div class="form-group row">
        <label for="name" class="form control">
            {{ __('นาม') }}
        </label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>
    </div>

</div>

@endsection

@section('js')

<script>
    $(document).ready(function () {
        document.getElementById('profile').classList.add('active');
        $('#table1').DataTable();
    });

</script>

@endsection
