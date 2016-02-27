<div class="container main-content suggrstion">
	<h1>সিলেবাস</h1>
	<hr>
	<table class="table table-responsive">
			<tr>
				<th>Date<hr></th>
				<th>Name<hr></th>
				<th>File<hr></th>
			</tr>

			<ul>
				<?php foreach ($syllabi as $key => $item) { ?>

				<tr>
					<li>
						<td><p><?php echo date_format(date_create($item['Syllabus']['modified']), 'd M Y');?></p></td>
						<td><p><?php echo $item['Syllabus']['title'];?></p></td>
						<td><a href="<?php echo $this->webroot.'files/syllabi/'.$item['Syllabus']['file'];?>" target="_blank"><span><i class="fa fa-file-pdf-o fa-3x"></i></span></a></td>	
					</li>		
				</tr>
				<?php } ?>
			</ul>
	</table>
</div>