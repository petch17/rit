@extends('layouts.app')

@section('css')

@endsection

@section('content')

{{-- ใส่ ฟอม --}}
<div class="card-body"> {{-- start --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf

        @foreach($profile as $item)

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('ชื่อ(นาย/นางสาว/นาง)') }}
            </label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control"
                name="name" value="{{ $item->name }}" >
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">
                {{ __('นามสกุล') }}
            </label>

            <div class="col-md-6">
                <input id="lastname" type="text" class="form-control"
                name="lastname" value="{{ $item->lastname }}" >
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">
                {{ __('ไอดี') }}
            </label>

            <div class="col-md-6">
                <input id="username" type="text"
                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                       name="username" value="{{ old('username') }}" required>

                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">
                {{ __('รหัสผ่าน') }}
            </label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                {{ __('ยืนยันรหัสผ่าน') }}
            </label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control"
                name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                {{ __('เบอร์โทร') }}
            </label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control"
                name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>


        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                {{ __('ที่อยู่') }}
            </label>

            <div class="col-md-6">
                <input id="password-confirm" textbox="password" class="form-control"
                name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        @endforeach

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('ยืนยัน') }}
                </button>
            </div>
        </div>
    </form>
</div> {{-- end --}}

@endsection

@section('js')

<script>
    $(document).ready(function () {
        document.getElementById('profile').classList.add('active');
        $('#table1').DataTable();
    });

</script>

@endsection
