<div class="container main-content academic">
	<h1>পাঠ্যতালিকা</h1>
	<hr>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-responsive booklist">
				<tr>
					<th>শ্রেণী নাম <hr></th>
					<th>পাঠ্যতালিকা<hr></th>
				</tr>

				<?php foreach ($syllabi as $key => $item) { ?>
				<tr>
					<td><p><?php echo $item['ClassName']['name'];?></p></td>
					<td><a href="<?php echo $this->webroot.'files/syllabi/'.$item['Syllabus']['file'];?>" target="_blank"><span><i class="fa fa-file-pdf-o fa-3x"></i></span></a></td>	
				</tr>
				<?php } ?>
			</table>
		</div>
    </div>
</div>