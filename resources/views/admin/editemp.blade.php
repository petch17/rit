@extends('layouts.app2')

@section('css')
<style>
    body
    {
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
                    <form method="POST" action="{{ route('profileupdatestore' ) }}">
                    @csrf
                        {{--  {{ csrf_field() }}
                        {{ method_field('patch') }}  --}}
                        @foreach($admin as $item)
                        <div class="form-group row">
                            <label for="titlename" class="col-md-4 col-form-label text-md-right">
                                {{ __('คำนำหน้า') }}
                            </label>

                            <div class="col-md-6">
                                <input id="titlename" type="text" class="form-control" name="titlename" value="{{ $item->titlename }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('ชื่อ') }}
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $item->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">
                                {{ __('นามสกุล') }}
                            </label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $item->lastname }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">
                                {{ __('ที่อยู่') }}
                            </label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $item->address }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                {{ __('เบอร์โทร') }}
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $item->phone }}">
                            </div>
                            <td align="center"> <a href="{{route('reconfirm',['id'=>$item->id])}}" > คลิก </a> </td>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    $(document).ready(function() {
        document.getElementById('admin').classList.add('active');
        $('#table1').DataTable();
    });

</script>

@endsection
