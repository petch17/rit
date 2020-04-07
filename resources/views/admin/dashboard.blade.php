@extends('layouts.admin')

@section('content')
<div class="bgded overlay" style="background-image:url('{{asset('./images/demo/backgrounds/a8.jpg')}}');">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   หน้าหลักของ admin
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
