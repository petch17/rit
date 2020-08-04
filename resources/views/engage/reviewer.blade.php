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
    <table class="table table-striped table-bordered" style="width:100%" >
        <tbody>
            <td align="center" style="width:10%"> ลำดับ </td>
            <td align="center" style="width:50%"> รายการ </td>
            <td align="center" style="width:20%"> จำนวนเงิน </td>
            <td align="center" style="width:20%"> หน่วย </td>
            {{-- <th> รายละเอียด </th> --}}
        </tbody>

        @foreach ($detail as $index=>$item)

        @php
            $sum = 0; $avg1 = 0; $avg2 = 0; $sack = 0; $service_palm = 300; $price_palm = 0;
            $service_pui = 50; //ค่าแรงทำงาน 50 บาทต่อกระสอบ
            $palm_val = 0; $val_pui = 0;$palm_oil = 0 ; $equipment = 0 ;$power_1 = 0;
            $palm_2 = 0; $palm_222 = 0;

            foreach( $detail as $detailes ) {
                if( $detailes->working == "ตัดหญ้า" ) {
                    $grass = $detailes->farm_grass ;
                    $sum = $grass * 500;
                    $sum_oil = $grass * 100 ;
                    $sum_deposit = $sum - $sum_oil ;
                }
                elseif( $detailes->working == "ตัดแต่งทางใบ" ) {
                    $palm = $detailes->leaf_palm ;
                    $palm_oil = 300; //ค่าน้ำมัน
                    $equipment = 300 ; //ค่าอุปกรณ์
                    $power_1 = 500 ;//ค่าแรง

                    $sum2 = $palm * 20;
                    $mmmmm = $sum2 / 5; //ค่าแรง
                    $palm_2 = $mmmmm +  $equipment ;//เงินที่นายจ้างได้
                    $palm_222 =  $sum2 + $equipment +  $palm_oil ;
                }
                else{
                    $fertilizer = $detailes->unit_fertilizer ;
                    $sum3 = $fertilizer / 50 ; // จำนวนต้น หาร กิโลต่อถุง -> หาจำนวนกระสอบ
                    $sack = $sum3 * 600;

                    $oil_pui = 500; //ค่าน้ำมันรถ
                    $powerman = $service_pui * $sum3 ;
                    $val_pui = $powerman + $sack + $oil_pui ;
                }
            }

        @endphp

        @if( $item->working == 'ตัดหญ้า' )
        <tbody>
            <td align="center"> {{ $index+1 }} </td>
            <td > <b> {{ $item->working }} </b> </td>
            <td align="center"> </td>
            <td align="center"> </td>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>
        <tr>
            <td > </td>
            <td > ค่าแรงลูกจ้าง 5 คน </td>
            <td align="right"> @php echo number_format( $sum_deposit , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>
        <tr>
            <td > </td>
            <td > ค่าน้ำมันเครื่องตัดหญ้า  </td>
            <td align="right"> @php echo number_format( $sum_oil , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>
        <tr>
            <td > </td>
            <td >ตัดหญ้า {{ $grass }} ไร่ รวมบริการ </td>
            <td align="right"> @php echo number_format( $sum , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        @elseif( $item->working == 'ตัดแต่งทางใบ' )
        <tbody>
            <td align="center"> {{ $index+1 }} </td>
            <td > <b> {{ $item->working }} </b>  </td>
            <td align="center">  </td>
            <td align="center">  </td>
            {{-- <th align="center"> <a target="_blank" href=""> คลิก </a> </th> --}}
        </tbody>

        <tr>
            <td > </td>
            <td > ค่าแรง </td>
            <td align="right"> @php echo number_format( $sum2 , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        <tr>
            <td > </td>
            <td > ค่าบรรทุก + ค่าอุปกรรณ์   </td>
            {{-- <td align="right"> @php echo number_format( $sum , 2 ) @endphp </td> --}}
            <td align="right">  @php echo number_format( ( $equipment + $palm_oil ) , 2 ) @endphp </td>
            <td align="center">  บาท </td>
        </tr>

        <tr>
            <td > </td>
            <td > รวมค่าบริการ {{ $palm }} ต้น </td>
            <td align="right"> @php echo number_format( $palm_222 , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        @else
        <tbody>
            <td align="center"> {{ $index+1 }} </td>
            <td > <b> {{ $item->working }} </b> </td>
            <td align="center">  </td>
            <td align="center">  </td>
        </tbody>

        <tr>
            <td > </td>
            <td > ค่าแรง </td>
            <td align="right"> @php echo number_format( $powerman , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        <tr>
            <td > </td>
            <td > ค่าปุ๋ย {{ $sum3 }} กระสอบ</td>
            <td align="right"> @php echo number_format( $sack , 2 ) @endphp</td>
            <td align="center"> บาท </td>
        </tr>

        <tr>
            <td > </td>
            <td > ค่าน้ำมันรถบรรทุก</td>
            <td align="right"> @php echo number_format( 500 , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        <tr>
            <td > </td>
            <td > รวมบริการ </td>
            <td align="right"> @php echo number_format( $val_pui , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>


        @endif

        @endforeach

        <tr>
            <th colspan="5">

            </th>
        </tr>

        @php
            $sumation = $sum + $palm_222  + $val_pui; //ยอดรวมทั้งหมด
        @endphp

        <tr>
            <td colspan="2" align="right"> ยอดรวมทั้งหมด </td>
            <td align="right"> @php echo number_format( $sumation , 2 ) @endphp </td>
            <td align="center"> บาท </td>
        </tr>

        @php
            $DDDDD = $sumation  * 0.3 ; // ค่ามัดจำที่ต้องจ่าย(30%)
        @endphp

        <tr>
            <td colspan="2" align="right"> ค่ามัดจำที่ต้องจ่าย(30%) </td>
            <td align="right"> @php echo number_format(  $DDDDD  , 2 ) @endphp </td> {{-- ค่ามัดจำ 10 % ของยอดรวม --}}
            <td align="center"> บาท </td>
        </tr>

        @php
            $TTTTT = $sumation  - $DDDDD ; // ยอดค้างชำระทั้งหมด
        @endphp

        {{-- <tr>
            <td colspan="2" align="right"> ยอดค้างชำระทั้งหมด </td>
            <td align="right"> @php echo number_format( $TTTTT , 2 ) @endphp </td> {{-- ค่ามัดจำ 10 % ของยอดรวม --}}
            {{-- <td align="center"> บาท </td>
        </tr> --}}

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
