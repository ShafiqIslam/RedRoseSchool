<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Online Application</title>

	<style type="text/css">
	
	@font-face {
		font-family: "Siyam Rupali";
		src: url("Siyamrupali_1_01.eot?") format("eot"),
			 url("Siyamrupali_1_01.woff") format("woff"),
			 url("Siyamrupali_1_01.ttf") format("truetype"),
			 url("Siyamrupali_1_01.svg#SiyamRupali") format("svg");
		font-weight: normal;
		font-style:normal;
	}

	* {
		font-family: "Siyam Rupali";
		page-break-before: avoid;
	    page-break-inside: avoid;
	}
	body {
		font-family: "Siyam Rupali";
	}
	@page {
	    size: Legal;
	    margin: 1in;
	    page-break-before: avoid;
	    page-break-inside: avoid;
	}
	table{
		border-spacing: 0;
    	border-collapse: collapse;
	}
	.address p{
		font-size: 12px;
	}
	.close{
		color: #b7b7b7;
		/*font-size: 3em;*/
	}
	.test{
		background-color: #0a6084;
		color: #fff;
		page-break-before: avoid;
	    page-break-inside: avoid;

	}
	.table-border td{
		/*padding: 10px;		*/
		height: 20px;
		line-height: 20px;
		font-size: 13px;
	}
	.total , .vat, .g-total{
		background-color: #d0d1d1;		

	}
	.gray td{
		background-color:#f3f3f3; 
		padding: 10px;
	}
	.all-most td{
		font-size: 9px;
	}
	.all-most td span{
		display: block;
	}
	.pdf-tbl{
		margin-top: -40px;
	}
	</style>
	
</head>
<body>
	<div class="pdf-tbl">
		<header id="header" class=" container-fluid header-top" >
		    <div class="container">
		      <div class="row">
		        <div class="col-sm-2">
		          <img class="img-responsive logo" src="img/logo.jpg" alt="রেড রোজ স্কুল লোগো" />
		        </div>
		        <div class="col-sm-10">
		          <h1>রেড রোজ নার্সারি স্কুল</h1>
		        </div>
		      </div>
		    </div>    
		</header>
		<div style="clear:both"></div>

		<div class="data">
			<!--<p><b>ছাত্র/ছাত্রীর পূর্ণ নাম(বাংলায়):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>-->

		    <p><b>ছাত্র/ছাত্রীর পূর্ণ নাম(ইংরেজীতে):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর জন্ম তারিখ:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>রক্তের গ্রুপ:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর পিতার নাম(বাংলায়):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর পিতার নাম(ইংরেজীতে):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর ঠিকানা(বর্তমান):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর ঠিকানা(স্থায়ী):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর পিতার পেশা(বিস্তারিত):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>মাসিক আয়:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>পিতার মোবাইল / টেলিফোন(অফিস):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>পিতার মোবাইল / টেলিফোন(ব্যক্তিগত):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>ছাত্র/ছাত্রীর মায়ের নাম (বাংলায়):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>ছাত্র/ছাত্রীর মায়ের নাম (ইংরেজীতে):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>মায়ের পেশা:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>মাসিক আয়:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>ছাত্র/ছাত্রীর জাতীয়তা:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

			<p><b>ছাত্র/ছাত্রীর ধর্ম:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>অভিভাবকের নাম,ঠিকানা,পেশা ও সস্মর্ক:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর বিশেষ কোন দূর্বলতা(প্রয়োজ্য ক্ষেত্রে):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>যে শ্রেণীতে ভর্তি হতে ইচ্ছুক:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>ছাত্র/ছাত্রীর বিশেষ প্রবণতা:</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>

		    <p><b>পূর্ববর্তী স্কুলের নামও ছাড়পত্র নং(প্রয়োজ্য ক্ষেত্রে):</b> <strong><?php echo $data['OnlineApplication']['name_bn']; ?></strong></p>
		</div>
	</div>
	<!-- <table class="pdf-tbl" width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td valign="top">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<?php $logo = WWW_ROOT . 'img' . DS . 'logo.jpg'; ?>
						<td align="right"><img src="logo.jpg"></td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><p>ছাত্র/ছাত্রীর পূর্ণ নাম(বাংলায়): &#45;<?php echo $data['OnlineApplication']['id'];?></p></td>
					</tr>
					<tr>
						<td align="left" width="50%">
							<div class="address">
								<p>
								<?php echo $data['OnlineApplication']['name_en'];?> <br>
								<?php echo $data['OnlineApplication']['name_en'];?><br>
								<?php echo $data['OnlineApplication']['name_en'];?>
							</p>
							</div>
						</td>
						<td align="right" width="">
							<div class="address">
								<p>
								Invoice Date &#45; <?php echo date_format(date_create($data['OnlineApplication']['created']), 'd.m.Y');?> <br>
								Account Number &#45; <?php echo $data['OnlineApplication']['name_en'];?> <br>
								Invoice Number &#45; <?php echo $data['OnlineApplication']['name_en'];?>
							</p>
							</div>
						</td>
					</tr>
				</table>
				<h3>Invoice<h3>				
				<table class="table-border" width="100%" cellpadding="0" cellspacing="0" >
					<tr bgcolor="#0a6084">
						<th align="left" class="test">&nbsp;&nbsp;Description</th>
						<th class="test"></th>
						<th class="test"></th>
						<th class="test"></th>
						<th align="right" class="test">Total&nbsp;&nbsp;</th>

					</tr>
					<tr class="white">
						<td align="left">&nbsp;&nbsp;Calls</td>
						<td class="close"><?php echo $data['OnlineApplication']['name_en'];?></td>
						<td class="close">x</td>
						<td class="close"><?php echo $data['OnlineApplication']['name_en'];?> per call</td>
						<td align="right"><?php echo $data['OnlineApplication']['name_en'];?>&nbsp;&nbsp;</td>
					</tr>					
				</table>
				<table class="all-most" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td valign="top" align="left">All amounts shown are in GBP</td>
						<td align="right"  width="50%" valign="top">
							<span>To pay by BACS our bank account details are</span>
							<span>Sort Code: 20&#45;63&#45;28</span>
							<span>Account Number: 43976750</span>
						</td>
					</tr>
				</table>				
				
				<table width="100%" cellpadding="0" cellspacing="0">
					<?php
					$date = $data['OnlineApplication']['created'];
					$date = strtotime($date);
					$date = strtotime("+7 day", $date);
					?>
					<tr>
						<td align="center"><h3>The total amount due of &pound;<?php echo $data['OnlineApplication']['name_en'];?> will be debited from your account on or immediately after the <?php echo date('d-m-Y', $date);?></h3>
						</td>
					</tr>
				</table>
				<table class="all-most" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td align="right" valign="top">
							<span>My Customer App Limited &#45; Registered Address: 1 Pinnacle Way, Pride Park, Derby DE24 8ZS</span>
							<span>Registered Co. No: 9309997 &#45; VAT No: 210 533 462</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table> -->
</body>
</html>

	<!-- <table class="pdf-tbl" width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td valign="top">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<?php $logo = WWW_ROOT . 'img' . DS . 'logo.jpg'; ?>
						<td align="right"><img src="logo.jpg"></td>
					</tr>
				</table>
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><p>Service user number &#45;<?php echo $invoice_data['Branch']['id'];?></p></td>
					</tr>
					<tr>
						<td align="left" width="50%">
							<div class="address">
								<p>
								<?php echo $invoice_data['Branch']['name'];?> <br>
								<?php echo $invoice_data['Branch']['address'];?><br>
								<?php echo $invoice_data['Branch']['postcode'];?>
							</p>
							</div>
						</td>
						<td align="right" width="">
							<div class="address">
								<p>
								Invoice Date &#45; <?php echo date_format(date_create($invoice_data['Invoice']['created']), 'd.m.Y');?> <br>
								Account Number &#45; <?php echo $invoice_data['Branch']['id'];?> <br>
								Invoice Number &#45; <?php echo $invoice_data['Invoice']['id'];?>
							</p>
							</div>
						</td>
					</tr>
				</table>
				<h3>Invoice<h3>				
				<table class="table-border" width="100%" cellpadding="0" cellspacing="0" >
					<tr bgcolor="#0a6084">
						<th align="left" class="test">&nbsp;&nbsp;Description</th>
						<th class="test"></th>
						<th class="test"></th>
						<th class="test"></th>
						<th align="right" class="test">Total&nbsp;&nbsp;</th>

					</tr>
					<tr class="white">
						<td align="left">&nbsp;&nbsp;Setup Fee</td>
						<td></td>
						<td></td>
						<td></td>
						<td align="right">&pound;<?php echo number_format($invoice_data['Invoice']['setup']);?>&nbsp;&nbsp;</td>
					</tr>
					<tr class="gray">
						<td align="left">&nbsp;&nbsp;Licence Fee</td>
						<td></td>
						<td></td>
						<td></td>
						<td align="right">&pound;<?php echo number_format($invoice_data['Invoice']['license']);?>&nbsp;&nbsp;</td>
					</tr>	
					<tr class="white">
						<td align="left">&nbsp;&nbsp;Registrations</td>
						<td class="close"><?php echo $invoice_data['Invoice']['reg_count'];?></td>
						<td class="close">x</td>
						<td class="close"><?php echo $this->Number->currency($invoice_data['Dealer']['dvla_reg'], 'GBP');?> per registration</td>
						<td align="right"><?php echo $this->Number->currency($invoice_data['Invoice']['reg'], 'GBP');?>&nbsp;&nbsp;</td>
					</tr>
					<tr class="gray">
						<td align="left">&nbsp;&nbsp;Postcodes</td>
						<td class="close"><?php echo $invoice_data['Invoice']['postcode_count'];?></td>
						<td class="close">x</td>
						<td class="close"><?php echo $this->Number->currency($invoice_data['Dealer']['postcode_lookup'], 'GBP');?> per postcode</td>
						<td align="right"><?php echo $this->Number->currency($invoice_data['Invoice']['postcode'], 'GBP');?>&nbsp;&nbsp;</td>
					</tr>
					<tr class="white">
						<td align="left">&nbsp;&nbsp;Text Messages</td>
						<td class="close"><?php echo $invoice_data['Invoice']['text_count'];?></td>
						<td class="close">x</td>
						<td class="close"><?php echo $this->Number->currency($invoice_data['Dealer']['text_fee'], 'GBP');?> per message</td>
						<td align="right"><?php echo $this->Number->currency($invoice_data['Invoice']['text'], 'GBP');?>&nbsp;&nbsp;</td>
					</tr>
					<tr class="gray">
						<td align="left">&nbsp;&nbsp;Line Rental</td>
						<td class="close"><?php echo $invoice_data['Invoice']['voip_rental_count'];?></td>
						<td class="close">x</td>
						<td class="close"><?php echo $this->Number->currency($invoice_data['Dealer']['voip_rental'], 'GBP');?> per line</td>
						<td align="right"><?php echo $this->Number->currency($invoice_data['Invoice']['voip_rental'], 'GBP');?>&nbsp;&nbsp;</td>
					</tr>
					<tr class="white">
						<td align="left">&nbsp;&nbsp;Calls</td>
						<td class="close"><?php echo $invoice_data['Invoice']['voip_count'];?></td>
						<td class="close">x</td>
						<td class="close"><?php echo $this->Number->currency($invoice_data['Dealer']['voip_call'], 'GBP');?> per call</td>
						<td align="right"><?php echo $this->Number->currency($invoice_data['Invoice']['voip_call'], 'GBP');?>&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td class="total" align="left">&nbsp;&nbsp;Total</td>
						<td class="total"></td>
						<td class="total"></td>
						<td class="total"></td>
						<td class="total" align="right">&pound;<?php echo $invoice_data['Invoice']['total'];?>&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td class="vat" align="left">&nbsp;&nbsp;VAT </td>
						<td class="vat"></td>
						<td class="vat"></td>
						<td class="vat"></td>
						<td class="vat" align="right">&pound;<?php echo $invoice_data['Invoice']['vat'];?>&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td class="g-total" align="left">&nbsp;&nbsp;Grand Total</td>
						<td class="g-total"></td>
						<td class="g-total"></td>
						<td class="g-total"></td>
						<td class="g-total" align="right">&pound;<?php echo $invoice_data['Invoice']['grand_total'];?>&nbsp;&nbsp;</td>
					</tr>					
				</table>
				<table class="all-most" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td valign="top" align="left">All amounts shown are in GBP</td>
						<td align="right"  width="50%" valign="top">
							<span>To pay by BACS our bank account details are</span>
							<span>Sort Code: 20&#45;63&#45;28</span>
							<span>Account Number: 43976750</span>
						</td>
					</tr>
				</table>				
				
				<table width="100%" cellpadding="0" cellspacing="0">
					<?php
					$date = $invoice_data['Invoice']['created'];
					$date = strtotime($date);
					$date = strtotime("+7 day", $date);
					?>
					<tr>
						<td align="center"><h3>The total amount due of &pound;<?php echo $invoice_data['Invoice']['grand_total'];?> will be debited from your account on or immediately after the <?php echo date('d-m-Y', $date);?></h3>
						</td>
					</tr>
				</table>
				<table class="all-most" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td align="right" valign="top">
							<span>My Customer App Limited &#45; Registered Address: 1 Pinnacle Way, Pride Park, Derby DE24 8ZS</span>
							<span>Registered Co. No: 9309997 &#45; VAT No: 210 533 462</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>  -->