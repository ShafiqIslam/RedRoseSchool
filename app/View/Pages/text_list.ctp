<div class="container main-content academic">
	<h1>পাঠ্যতালিকা</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-responsive booklist">
				<tr>
					<th>শ্রেণী নাম</th>
					<th>পাঠ্যতালিকা</th>
				</tr>

				<?php //foreach ($syllabi as $key => $item) { ?>
				<tr>
					<td><p><?php //echo $item['ClassName']['name'];?>Class-1</p></td>
					<td><a href="<?php //echo $this->webroot.'files/syllabi/'.$item['Syllabus']['file'];?>" target="_blank"><span><i class="fa fa-file-pdf-o fa-3x"></i></span></a></td><hr>
				</tr>
				<tr>
					<td><p><?php //echo $item['ClassName']['name'];?>Class-2</p></td>
					<td><a href="<?php //echo $this->webroot.'files/syllabi/'.$item['Syllabus']['file'];?>" target="_blank"><span><i class="fa fa-file-pdf-o fa-3x"></i></span></a></td><hr>
				</tr>

				<?php// } ?>
			</table>
		</div>
    </div>
</div>