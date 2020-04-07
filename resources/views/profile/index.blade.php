@extends('layouts.app2')

@section('css')
<style>
    body {
        background-color: #FFE873;
    }

</style>
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">
                    <font color="black">
                        <h3>{{ __('แก้ไขข้อมูลส่วนตัว') }}</h3>
                    </font>
                </div>

                {{-- ใส่ ฟอม --}}
                <div class="card-body"> {{-- start --}}

                        {{--  {{ csrf_field() }}
                        {{ method_field('patch') }}  --}}
                        @foreach($profile as $item)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('คำนำหน้า') }}
                            </label>

                            <div class="col-md-6">
                                <label for="titlename" class="col-md-8 col-form-label">
                                    {{ __( $item->titlename ) }}
                                </label>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('ชื่อ') }}
                            </label>

                            <div class="col-md-6">
                                <label for="phone" class="col-md-8 col-form-label">
                                    {{ __( $item->name ) }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">
                                {{ __('นามสกุล') }}
                            </label>

                            <div class="col-md-6">
                                <label for="phone" class="col-md-8 col-form-label">
                                    {{ __( $item->lastname ) }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">
                                {{ __('ที่อยู่') }}
                            </label>

                            <div class="col-md-6">
                                <label for="phone" class="col-md-8 col-form-label">
                                    {{ __( $item->address ) }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                {{ __('เบอร์โทร') }}
                            </label>

                            <div class="col-md-6">
                                <label for="phone" class="col-md-8 col-form-label">
                                    {{ __( $item->phone ) }}
                                </label>
                            </div>
                        </div>

                        @endforeach


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                    <button type="submit" >
                                        <a href="{{ route('edit' ) }}">
                                            {{ __('แก้ไข') }}
                                        </a>
                                    </button>
                                    <button type="submit" >
                                        <a href="{{ url('home' ) }}">
                                            {{ __('หน้าหลัก') }}
                                        </a>
                                    </button>
                            </div>
                        </div>

                </div> {{-- end --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    $(document).ready(function() {
        document.getElementById('profile').classList.add('active');
        $('#table1').DataTable();
    });

</script>

@endsection
