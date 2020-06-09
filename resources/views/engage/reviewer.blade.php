@extends('layouts.app2')

@section('css')
@endsection

@section('content')


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
            <th> ลำดับ </th>
            <th> รายการ </th>
            <th> จำนวนเงิน </th>
            <th> หน่วย </th>
            {{-- <th> รายละเอียด </th> --}}
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
            <td align="center"> {{ $index+1 }} </td>
            <td align="center"> <b> {{ $item->working }} </b> </td>
            <td align="center"> </td>
            <td align="center"> </td>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>
        <tr>
            <td colspan="2" align="right"> ค่าแรงพนักงาน (ต่อคน) </td>
            <td align="right"> 300 </td>
            <td align="center"> บาท </td>
        </tr>
        <tr>
            <td colspan="2" align="right"> ค่าน้ำมันเครื่องตัดหญ้า (ต่อไร่) </td>
            <td align="right"> 100 </td>
            <td align="center"> บาท </td>
        </tr>
        <tr>
            <td colspan="2" align="right"> บริการทั้งหมด {{ $grass }} ไร่ </td>
            <td align="right"> @php echo number_format( $sum , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        @elseif( $item->working == 'ตัดปาล์ม' )
        <tbody>
            <td align="center"> {{ $index+1 }} </td>
            <td align="center"> <b> {{ $item->working }} </b>  </td>
            <td align="center">  </td>
            <td align="center">  </td>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>
        <tr>
            <td colspan="2" align="right"> ค่าแรงพนักงาน (ต่อคน) </td>
            <td align="right"> 300 </td>
            <td align="center"> บาท </td>
        </tr>
        <tr>
            <td colspan="2" align="right"> บริการทั้งหมด {{ $palm }} กิโลกรัม </td>
            <td align="right"> @php echo number_format( $avg1 , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        @else
        <tbody>
            <td align="center"> {{ $index+1 }} </td>
            <td align="center"> <b> {{ $item->working }} </b> </td>
            <td align="center">  </td>
            <td align="center">  </td>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>
        <tr>
            <td colspan="2" align="right"> ค่าแรงพนักงาน (ต่อคน) </td>
            <td align="right">300 </td>
            <td align="center">  บาท </td>
        </tr>
        <tr>
            <td colspan="2" align="right"> ค่าปุ๋ย (ต่อกระสอบ) </td>
            <td align="right"> 600 </td>
            <td align="center"> บาท </td>
        </tr>
        <tr>
            <td colspan="2" align="right"> บริการทั้งหมด {{ $fertilizer }} ต้น </td>
            <td align="right"> @php echo number_format( $sack , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        @endif

        @endforeach

        <tr>
            <th colspan="5">

            </th>
        </tr>

        <tr>
            <td colspan="2" align="right"> ยอดรวมทั้งหมด </td>
            <td align="right"> @php echo number_format( $sumation , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        <tr>
            <td colspan="2" align="right"> ค่ามัดจำ(30%) </td>
            <td align="right"> @php echo number_format( ( $sumation ) * 0.3 , 2 ) @endphp </td> {{-- ค่ามัดจำ 10 % ของยอดรวม --}}
            <td align="center"> บาท </td>
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

        <a href="{{route('destroy',['id'=>$item->work_id])}}" class="btn btn-danger">ยกเลิกบริการ</a>

        <a href="{{ route('deposit') }}">
            {!! Form::button('ยืนยัน',['type' => 'submit', 'class'=>'btn btn-outline-primary']); !!}
        </a>

        <form method="post" class="delete_form" action="{{route('destroy',['id'=>$item->work_id])}}">

            @csrf
        </form>

</center>
</div>
</div>

@endsection

@section('js')

@endsection
