<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	
  <style>
  
  @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("<?= base_url() ?>share/tem/THSarabunNew.ttf") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("<?= base_url() ?>share/tem/THSarabunNew Bold.ttf") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("<?= base_url() ?>share/tem/THSarabunNew Italic.ttf") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("<?= base_url() ?>share/tem/THSarabunNew BoldItalic.ttf") format('truetype');
        }
       
		.small_para{
			font-size: 10px;
		}
		.product_font {
			font-size: 12px;
		}
		.head_product_font{
			font-size: 15px;
		}
		.table{
			width: 100%;
			border: 0px white;
			border-collapse: collapse; 
		}
		
		.right-table{
			float: right;
		}
		tr.border_bottom td{
			border-bottom: black 1px solid;
		}
		tr.head_product_font td{
			border: #9E9E9E 1.5px solid;
		}
		.headtable{
			border: 1.5px #9E9E9E solid
		}
		.font-blue{
			color: #000486;
		}
		.font-red{
			color: #C30000;
		}
  </style>
</head>
<body>
	
	<table  class="table">
		<tr>
			<td><h2 class="">QUOTATION</h2></td>
			<td>
				<img class="right-table" src="http://www.qmcal.com/img/logo-mc.gif"/>
			</td>

		</tr>
		
		<tr>
			<td><p class="small_para">This document is issued electronically</p></td>
			<td><p class="small_para right-table" style="margin-right: 50px">http://qmcal.com/</p></td>
		</tr>
	</table>
	<hr>
	<!-- inner head -->
	<br>
	<table class="table small_para">
		<tr >
			<td >C Code:</td>
			<td  class="font-red"><?= htmlspecialchars($customer_code) ?></td>
			<td ></td>
			<td ></td>
		</tr>
		<tr>
			<td>BILL</td>
			<td class="font-blue"><?= htmlspecialchars($customer_company) ?></td>
			<td>DATE</td>
			<td class="font-red"><?= htmlspecialchars($quote_date); ?></td>
		</tr>
		<tr>
			<td>Branch</td>
			<td class="font-blue"><?= htmlspecialchars($customer_branch); ?></td>
			<td>No #</td>
			<td class="font-red"><?= htmlspecialchars($quote_no) ?></td>
		</tr>
		<tr>
			<td>TAX ID</td>
			<td class="font-blue"><?= htmlspecialchars($customer_texid) ?></td>
			<td>Ref. #</td>
			<td class="font-blue"><?= htmlspecialchars($quote_ref); ?></td>
		</tr>
		<tr>
			<td>ADDRESS</td>
			<td width=200 class="font-blue"><?= htmlspecialchars($customer_address); ?></td>
			<td>Fax:</td>
			<td class="font-blue"><?= htmlspecialchars($customer_fax); ?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>Email:</td>
			<td class="font-blue"><?= htmlspecialchars($customer_email) ?></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td class="font-blue"><?= htmlspecialchars($customer_mobile) ?></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<br>
	<!-- product table for -->
	<table   class="table headtable">
		<tr class="head_product_font">
			<td style="width: 80px">Product nr</td>
			<td style="width: 230px">Description</td>
			<td style="width: 100px">Unit piece (THB)</td>
			<td style="width: 100px">Quantity (pcs)</td>
			<td style="width: 100px">Amount (THB)</td>
		</tr>
		<?php
		$sub_total = 0;
			foreach ($products as $key => $value) {
				echo '<tr class="product_font">';
				echo "<td>".htmlspecialchars($value->product_category_no.$value->product_no)."</td>";
				echo "<td>".htmlspecialchars($value->product_name)."</td>";
				echo "<td>{$value->product_price}</td>";
				echo "<td><center>".$value->quality."</center></td>";
				echo "<td>".$value->amount."</td>";
				echo "</tr>";
				$sub_total += $value->amount;
			}
			$tex = $sub_total *0.07;
			$total = $tex+$sub_total;
		?>
		
	<!-- product table for -->
		
	</table>
	<br>
	<br>
	<table class="table">
		<tr>
			<td style="width: 70%">
				<table class="small_para">
					<tr><td class="head_product_font">Condition:</td></tr>
					<tr><td>1. This quote is due within 30 days from the date of issue.</td></tr>
					<tr><td>2. The QMcal is the laboratory that follow ISO/IEC 17025 standard.</td></tr>
					<tr><td>3. The above price is applied for calibration service in the period of quote time.</td></tr>
					<tr><td>4. Payment term: <b class="font-blue">100% within the date of service.</b></td></tr>
					<tr><td>5. Invoice will be submitted as per payment terms.	</td></tr>
					<tr><td>6. Client responsibles for any damages of any nature/usaged/handling condition.	</td></tr>
					<tr><td>7. Upon accepted, please issue PO and email back for further process.	</td></tr>
				</table>
			</td>
		<td style="width: 30%">
			<table style="font: 11px bold">
				<tr class="border_bottom">
					<td style="width: 70px">SUBTOTAL</td>
					<td style="width: 100px;"><p style="margin-bottom: 10px;text-align: right" >฿ <?= $sub_total ?></p></td>
					
				</tr>
				
				<tr>
					<td>TAX RATE</td>
					<td><p style="margin-bottom: 10px;text-align: right" >7.00%</p></td>
				</tr>
				<tr class="border_bottom">
					<td>TOTAL TAX</td>
					<td><p style="margin-bottom: 10px;text-align: right" >฿ <?= $tex ?> </p></td>
				</tr>
				<tr>
					<td>TOTAL</td>
					<td><p style="margin-bottom: 10px;text-align: right" >฿ <?= $total ?> </p></td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
	<br><br><br>
	<!-- footer -->
	<table style="margin-left: 50px;width: 80%">
		<tr>
			<td style="width: 200px"></td>
			<td  style="text-align:right;" rowspan=2><img src="http://www.qmcal.com/img/sign2.png" width='200' alt="" /></td>
		</tr>
		
		<tr>
			<td style="width: 200px;font-size: 13px"><div style="padding-buttom:10px">___________________</div><br>Client confirmation (sign)</td>
			
		</tr>
		<tr>
			<td style="font-size: 13px">Date____/____/_____</td>
			<td style="text-align:right;padding-right: 40px"><i style="font-size: 13px">Issued by: QMCal admins</i></td>
		</tr>
	</table>
	<br><br>
	<table   class="table" style="font-size: 12px">
		<tr>
			<td>  Quality Associates Ltd. - Branch 00001</td>
		</tr>
		<tr>
			<td > Address : 88 Geo-Informatics and Space Technology Development Agency(Public Organization)<br> Moo 9 T.Tungsukla A.Sriracha Chonburi 20230</td>

		</tr>
		<tr>
			<td> Tax ID: 0115550004576</td>
		</tr>
		<tr>
			<td>  T: +66(0)889050555/(0)33005109  F:  +66(0)21018913  E: mc@quality-thailand.com  </td>
			<td style="text-align: right">  Customer copy	</td>
		</tr>
	</table>
</body>
</html>