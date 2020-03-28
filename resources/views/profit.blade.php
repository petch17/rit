@extends('layouts.myhome')

@section('css')

@endsection

@section('content')
<center>

<h1> กำไร-ขาดทุน </h1> </br>

        <form id="form1" name="form1" method="post" action='pro_fit.php'>

            <label>
                <font color="#000000"> &nbsp; ระหว่างวันที่
            </label>
            <input type="date" name="date1" required="required">

            <label>
                <font color="#000000"> &nbsp; ถึงวันที่ &nbsp;
            </label>
            <input type="date" name="date2" required="required">

            <input type="submit" name="btnSearch" value="ค้นหา">
        </form>

</center>
<br>

<?PHP
  if(isset($_POST["btnSearch"]))
  {
    $date1=$_REQUEST["date1"];
    $date2=$_REQUEST["date2"];

	  if ($date1 == "")	$date1 = "" ;
    if ($date2 == "")	$date2 = "" ;
 ?>
<center>
    <tr>
        <td>
            <h3>
                <label> &nbsp;
                    <font color="#000000"> ระหว่างวันที่
                        <font color="#000000">
                            <?php
                $date_in = $_REQUEST["date1"]; ;
                $date3 = show_tdate($date_in) ;
                echo $date3 ;
                // echo $_POST["date1"]; ?> &nbsp;
                            <font color="#000000">ถึงวันที่
                                <font color="#000000">
                                    <?PHP
                $date_in = $_REQUEST["date2"]; ;
                $date4 = show_tdate($date_in) ;
                echo $date4 ;
                // echo $_POST["date2"]; ?>
                </label> </h3>
        </td>
    </tr>
</center>

<table align="center" width="700" height="100" border="0">
    <tr>
        <td height="6">รายได้จากการขายสินค้า</a></td>
        <td>
            <?PHP
							$ans=0;
						    $sql2=" Select *,sum(sale_amount) AS totle2 ";
						    $sql2=$sql2." from sale s,sale_detail sd";
						    $sql2=$sql2." where sd.sale_id=s.sale_id and "  ;
						    $sql2=$sql2." sale_date BETWEEN '$date1' AND '$date2' and sale_status IN (select sale_status from sale WHERE sale_status='สั่งเสร็จสิ้น' ) group by sd.sale_id "  ;
						    $record2 = mysqli_query($con , $sql2) ;
						    // echo "<BR> ".$sql2." <BR>" ;
						  while( $data2 = mysqli_fetch_assoc($record2) ) {
						  		$ans=$ans+$data2['totle2']*$data2['sale_price'];
						   } ?>


            <?php echo number_format($ans,2)?></font>
        </td>
        <td></td>
    </tr>

    <tr>

    </tr>

    <tr>
        <td height="30">รวมรายได้</td>
        <td>
        <td width="106" align="right" style="border-bottom: solid 1px #000">
            <b><?php echo number_format($ans,2)?><b></td>
        </td>
    </tr>
    <tr>
        <br>

    </tr>

    <br><br>

    <tr>
        <td height="6">รายจ่ายต้นทุนสินค้า</a></td>
        <td>
            <?php
						$ans2=0;
						$sql=" Select *,sum(sale_amount) AS totle ";
						    $sql=$sql." from sale s,sale_detail sd , product p ";
						    $sql=$sql." where sd.sale_id=s.sale_id and sd.prod_id=p.prod_id and "  ;
						    $sql=$sql." sale_date BETWEEN '$date1' AND '$date2' and sale_status IN (select sale_status from sale WHERE sale_status='สั่งเสร็จสิ้น' ) group by sd.sale_id "  ;
						 $record = mysqli_query($con , $sql) ;
						    //echo "<BR> ".$sql." <BR>" ;
						  while( $data = mysqli_fetch_assoc($record) ) {
						  		$ans2=$ans2+$data['totle']*$data['prod_cost'];
						   } ?>


            <?php echo number_format($ans2,2)?></font>
        </td>
        <td></td>
    </tr>

    <tr>
        <td height="40">รวมรายจ่าย</td>
        <td>
        <td width="106" align="right" style="border-bottom: double 1px #000">
            <b><?php $cost2=$ans2 ?><?php echo number_format($cost2,2)?></b>
        </td>
    </tr>

    <tr>
        <td height="30" align="right">กำไรสุทธิ</td>
        <td>

        <td width="106" align="right" style="border-bottom: double 3px #000">
            <b><?php $profit=$ans-$cost2 ; echo number_format($profit,2) ?></b>

        </td>
    </tr>

</table>

<?PHP } ?>

<br>
<br>
<br>
<center>
    <input class="btn btn-success" type="submit" name="Submit" value=" PRINT "
        onClick="javascript:this.style.display='none';window.print()"> <br> <br>
    <form id="form3" name="form3" method="post" action="./index3.php">
        <input type="submit" name="btnAdd" value="หน้าหลัก">
    </form>
</center>

@endsection

@section('js')

<script>
    $(document).ready(function () {
        document.getElementById('profit').classList.add('active');
        // $('#table1').DataTable();
    });

</script>

@endsection

@php
function  show_tdate($date_in)
{
$month_arr = array("มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" , "กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ;

$tok = strtok($date_in, "-");
$year = $tok ;

$tok  = strtok("-");
$month = $tok ;

$tok = strtok("-");
$day = $tok ;

$year_out = $year + 543 ;
$cnt = $month-1 ;
$month_out = $month_arr[$cnt] ;

if ($day < 10 )
   $day_out = "".$day;
else
   $day_out = $day ;

   $t_date = $day_out." ".$month_out." ".$year_out ;

return $t_date ;
}
@endphp
