@extends('layouts.app2')

@section('css')
@endsection

@section('content')
<div id='calendar'></div>

<center>
<div class="col-md-10">
<div class="card">
    <div class="card-header">
<h1 align="center">
    ค่าใช้จ่ายทั้งหมด
</h1>
    </div> </br>
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <th align="center"> # </th>
            <th align="center"> รายการ </th>
            <th align="center"> จำนวนเงิน </th>
            <th align="center"> หน่วย </th>
            {{-- <th align="center"> รายละเอียด </th> --}}
        </thead>

        @foreach ($detail as $index=>$item)

        @php
            $sum = 0;
            $avg1 = 0;
            $avg2 = 0;
            $sack = 0;
            foreach( $detail as $detailes ) {
                if( $detailes->working == "ตัดหญ้า" ) {
                    $grass = $detailes->farm_grass ;
                    $sum = $grass * 500;
                }
                elseif( $detailes->working == "ตัดปาล์ม" ) {
                    $palm = $detailes->kilo_palm ;
                    $sum2 = $palm * 3;
                    $avg1 = $sum2 * 0.3; // เงินที่เราได้จากการขาย 30 %
                    $avg2 = $sum2 - $avg1 ; // เงินที่ลูกค้าได้จากการขาย และ ลบส่วนที่ต้องแบ่งให้คนจ้าง 30 %
                }
                else{
                    $fertilizer = $detailes->unit_fertilizer ;
                    $sum3 = $fertilizer / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
                    $sack = $sum3 * 600;
                }
            }
            $sumation = $sum + $avg1 + $sack;

        @endphp

        @if( $item->working == 'ตัดหญ้า' )
        <tbody>
            <th align="center"> {{ $index+1 }} </th>
            <th align="center"> {{ $item->working }}  </th>
            <th align="right"> @php echo number_format( $sum , 2 ) @endphp </th>
            <th align="center"> บาท </th>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>

        @elseif( $item->working == 'ตัดปาล์ม' )
        <tbody>
            <th align="center"> {{ $index+1 }} </th>
            <th align="center">{{ $item->working }}  </th>
            <th align="right"> @php echo number_format( $avg1 , 2 ) @endphp </th>
            <th align="center"> บาท </th>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>

        @else
        <tbody>
            <th align="center"> {{ $index+1 }} </th>
            <th align="center"> {{ $item->working }} </th>
            <th align="right"> @php echo number_format( $sack , 2 ) @endphp </th>
            <th align="center"> บาท </th>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>
        @endif

        @endforeach

        <tr>
            <th colspan="5">

            </th>
        </tr>

        <tr>
            <th colspan="2" align="right"> ยอดรวม </th>
            <th align="right"> @php echo number_format( $sumation , 2 ) @endphp </th>
            <th align="center"> บาท </th>
        </tr>

        <tr>
            <th colspan="2" align="right"> ค่ามัดจำ(30%) </th>
            <th align="right"> @php echo number_format( ( $sumation ) * 0.3 , 2 ) @endphp </th> {{-- ค่ามัดจำ 10 % ของยอดรวม --}}
            <th align="center"> บาท </th>
        </tr>

    </table>
<h5>
    <font color="red">

    <font color="blue">
        ชำระเงินผ่านธนาคาร<br/>นาย ชาญณรงค์ สิทธิบุตร<br/>
        เลขที่บัญชี : 333-33333-33-3<br/>ธนาคาร : กสิกรไทย<br/>
        หรือชำระเงินผ่านทางพร้อมเพย์&nbsp;099-878-4747
    </font> <br/>
    <font color="red">

    </font> <br/>
</h5>

    <input class="btn btn-success" type="submit" name="Submit" value=" PRINT "
        onClick="javascript:this.style.display='none';window.print()">

        <a href="{{ route('home') }}">
            {!! Form::button('หน้าหลัก',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
        </a>
</center>
</div>
</div>

@endsection

@section('js')

@endsection
