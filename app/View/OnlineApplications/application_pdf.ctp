<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Online Appication</title>

	<style type="text/css">
	*{
		font-family: Helvetica;
		page-break-before: avoid;
	    page-break-inside: avoid;
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
	.address {
		font-size: 12px;
		text-align: left;
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
		padding-left: 10px;
		height: 20px;
		line-height: 20px;
		font-size: 13px;
		//border: 1px solid #000;
	}
	.table-border tr td{
		padding-left: 10px;
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
	.pdf-tbl{
		margin-top: -40px;
	}
	table td img{
		width: 80px;
		height: auto;
		margin-left: 0;
		//margin-right: auto;
		display: block;
	}
	.zebra-stripe td {
		background-color: rgb(251,251,251);
	}
	</style>
	
</head>
<body>
	<table class="pdf-tbl" width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td valign="top">
				
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td><img src="img/logo.jpg"></td>
								</tr>
								<tr>
									<td><h2 style="color: #0E8EAB;">Red Rose Nursery School</h2></td>
								</tr>
							</table>
						</td>
						<td align="right" width="200px">
							<table width="100%" cellpadding="3px" cellspacing="0"  style="background-color: rgb(241, 241, 241); padding: 5px;">
								<tr>
									<td>Application Date</td>
									<td><strong><?php echo date_format(date_create($data['OnlineApplication']['created']), 'd.m.Y');?></strong></td>
								</tr>
								<tr>
									<td>Token Number</td>
									<td style="color: red"><strong><?php echo $data['OnlineApplication']['token']; ?></strong></td>
								</tr>
								<tr>
									<td>Application Id</td>
									<td><strong><?php echo $data['OnlineApplication']['id']; ?></strong></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<h3 style="margin-top: 15px;">Student's Application Details</h3>			
				<table border="1px" class="table-border" width="100%" cellpadding="5px" cellspacing="0" style="margin-top: 20px;">
					<tr>
						<td>Student's Name</td>
						<td><strong><?php echo $data['OnlineApplication']['name_en']; ?></strong></td>
					</tr>
					<tr class="zebra-stripe">
						<td>Birth Date</td>
						<td><strong><?php echo date_format(date_create($data['OnlineApplication']['birthday']), 'd.m.Y');?></strong></td>
					</tr>
					<tr>
						<td>Father's Name</td>
						<td><strong><?php echo $data['OnlineApplication']['father_name_en']; ?></strong></td>
					</tr>
					<tr class="zebra-stripe">
						<td>Mother's Name</td>
						<td><strong><?php echo $data['OnlineApplication']['mother_name_en']; ?></strong></td>
					</tr>
					<tr>
						<td>Admitted Class</td>
						<td><strong><?php echo $data['OnlineApplication']['class_name_id']; ?></strong></td>
					</tr>
					<tr class="zebra-stripe">
						<td>Contact No.</td>
						<td><strong><?php echo $data['OnlineApplication']['mobile']; ?></strong></td>
					</tr>				
				</table>
				<table class="all-most" width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
					<tr>
						<td align="left" valign="top">
							I do hereby declare that the above mentioned information are correct. If any information provided by me is found false, <span style="color:#0E8EAB;">Red Rose Nursery</span> School reserves the right to cancel may admission. I shall be obliged to obey the rules and regulations of <span style="color:#0E8EAB;">Red Rose Nursery School</span>.
						</td>
					</tr>
				</table>

				<table class="all-most" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td align="left" valign="top">
							<p style="font-size: 10px; text-decoration: underline; margin-top: 70px;"><strong>Signature of the Guardian & date</strong></p>
						</td>
						<td align="right" valign="top">
							<p style="font-size: 10px; text-decoration: underline; margin-top: 70px;"><strong>Signature of the Headmaster & date</strong></p>
						</td>
					</tr>
				</table>
				<hr style="border: 1px dotted; margin-top: 30px; letter-spacing: 3px;">
				<h4 style="color: red;">Attention :</h4>
				<table class="all-most" width="100%" cellpadding="0" cellspacing="0" style="margin-top: -10px;">
					<tr>
						<td align="left" valign="top">
							<span>Please save your <span style="color:#0E8EAB; "> "Application Token" </span> number for further use.</span>
							<span>At the time of admission take the appllication printed form with you.</span>
						</td>
					</tr>
				</table>
				<table class="all-most" width="100%" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
					<tr>
						<td align="left" valign="top">
							<span style="font-size: 7px;">Generated on: <?php echo date("Y-m-d h:i:s A");?></span>
						</td>
						<td align="right" valign="top">
							<span style="font-size: 7px;">Technical Support By : XorCoder, website : www.xorcoder.com</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table> 
</body>
</html>