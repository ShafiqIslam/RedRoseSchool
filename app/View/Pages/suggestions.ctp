<div class="container main-content suggrstion">
	<h1>সাজেশন</h1>
	<hr>

	<table class="table table-responsive">
		<tr>
			<th>Class<hr></th>
			<th>Date<hr></th>
			<th>Name<hr></th>
			<th>File<hr></th>
		</tr>

		<?php foreach ($suggestions as $key => $item) { ?>
		<tr>
			<td><p><?php echo $item['ClassName']['name'];?></p></td>
			<td><p><?php echo date_format(date_create($item['Suggestion']['modified']), 'd M Y');?></p></td>
			<td><p><?php echo $item['Suggestion']['title'];?></p></td>
			<td><a href="<?php echo $this->webroot.'files/suggestions/'.$item['Suggestion']['file'];?>" target="_blank"><span><i class="fa fa-file-pdf-o fa-3x"></i></span></a></td>		
		</tr>
		<?php } ?>
	</ul>
	</table>
</div>