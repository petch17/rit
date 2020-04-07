@extends('layouts.myhome')

@section('css')
@endsection

@section('content')
<div id='calendar'></div>
<h1 align="center">
    ค่าใช้จ่ายทั้งหมด
</h1> </br>
<center>

    <table class="table">
        <thead>
            <th align="center"> # </th>
            <th align="center"> รายการ </th>
            <th align="center"> จำนวนเงิน </th>
            <th align="center"> หน่วย </th>
            {{-- <th align="center"> รายละเอียด </th> --}}
        </thead>

        @foreach ($detail as $index=>$item)

        @if( $item->working == 'ตัดหญ้า' )
        <tbody>
            <th align="center"> {{ $index+1 }} </th>
            <th align="center"><a href="http://127.0.0.1/rit/public/engage/123/desc" target="_blank" > {{ $item->working }} </a> </th>
            <th align="right"> @php echo number_format( $price1 , 2 ) @endphp </th>
            <th align="center"> บาท </th>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>

        @elseif( $item->working == 'ตัดปาล์ม' )
        <tbody>
            {{-- {{ $palm = $item->kilo_palm }} --}}
            {{-- {{ $sum = $item->kilo_palm * 3 }} --}}
            {{-- {{ $avg = $sum * 0.3 }} --}}
           {{-- {{ $sum2 = $sum - $avg }} --}}
            <th align="center"> {{ $index+1 }} </th>
            <th align="center"><a href="http://127.0.0.1/rit/public/engage/123/desc" target="_blank" > {{ $item->working }} </a> </th>
            <th align="right"> @php echo number_format( $price2 , 2 ) @endphp </th>
            <th align="center"> บาท </th>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>

        @else
        <tbody>
            <th align="center"> {{ $index+1 }} </th>
            <th align="center"><a href="http://127.0.0.1/rit/public/engage/123/desc" target="_blank" > {{ $item->working }} </a> </th>
            <th align="right"> @php echo number_format( $price3 , 2 ) @endphp </th>
            <th align="center"> บาท </th>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>
        @endif

        @endforeach

        <tr>
            <th colspan="5">

            </th>
        </tr>
        {{-- {{ $sum = $price1 + $price2 + $price3  }} --}}

        <tr>
            <th colspan="2" align="right"> ยอดรวม </th>
            <th align="right"> @php echo number_format( $price1 + $price2 + $price3 , 2 ) @endphp </th>
            <th align="center"> บาท </th>
        </tr>

        <tr>
            <th colspan="2" align="right"> ค่ามัดจำ(30%) </th>
            <th align="right"> @php echo number_format( ($price1 + $price2 + $price3)*0.1 , 2 ) @endphp </th> {{-- ค่ามัดจำ 10 % ของยอดรวม --}}
            <th align="center"> บาท </th>
        </tr>

    </table>

</center>
<h3>
    <font color="red">

    <font color="blue">
        ชำระเงินผ่านธนาคาร<br/>นาย ชาญณรงค์ สิทธิบุตร<br/>เลขที่บัญชี : 333-33333-33-3<br/>ธนาคาร : กสิกรไทย<br/>
        หรือชำระเงินผ่านทางพร้อมเพย์&nbsp;099-878-4747
    </font> <br/>
    <font color="red">

    </font> <br/>
</h3>

<center>
    <input class="btn btn-success" type="submit" name="Submit" value=" PRINT "
        onClick="javascript:this.style.display='none';window.print()"> <br> <br>
</center>
@endsection

@section('js')

@endsection
