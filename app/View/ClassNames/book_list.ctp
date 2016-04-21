<div class="container main-content academic">
	<h1>পাঠ্যতালিকা</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-responsive booklist">
				<tr>
					<th>শ্রেণী নাম</th>
					<th>পাঠ্যতালিকা</th>
				</tr>
				<?php foreach($book_lists as $key => $item) { ?>
				<tr>
					<td><p><?php echo $item['ClassName']['name']?></p></td>
					<?php if(!empty($item['ClassName']['book_list'])) { ?>
					<td><a href="<?php echo $this->webroot.'files/book_lists/'.$item['ClassName']['book_list'];?>" target="_blank"><span><i class="fa fa-file-pdf-o fa-3x"></i></span></a></td><hr>
					<?php } else { ?>
						<td>Not Available.</td>
					<?php } ?>
				</tr>
				<?php } ?>
			</table>
		</div>
    </div>
</div>