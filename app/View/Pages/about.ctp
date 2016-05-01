<div class="container main-content">
	<div class="row">
		<div class="col-sm-9">
			<div class="tab-content">
				<div id="chairman" class="text-content tab-pane fade in active">
					<h1>চেয়ারম্যানের বাণী</h1>
					<hr>
					<p><?php echo $general_data['General']['chairman'];?></p>
				</div>
				<div id="headmaster" class="text-content tab-pane fade in active">
					<h1>প্রধান শিক্ষকের কথা</h1>
					<hr>
					<p><?php echo $general_data['General']['headmaster'];?></p>
				</div>
				<div id="mang-commitee" class="text-content tab-pane fade in active">
					<h1>ব্যবস্থাপনা কমিটি</h1>
					<hr>
					<p><?php echo $general_data['General']['governing'];?></p>
				</div>
				<div id="goal" class="text-content tab-pane fade in active">
					<h1>লক্ষ্য ও উদ্দেশ্য</h1>
					<hr>
					<p><?php echo $general_data['General']['purpose'];?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="side-link">
				<div class="side-bar side-menu">
					<h3>প্রয়োজনীয় লিংক সমূহ</h3>
					<hr>
					<ul id="side_link_about">
						<li class="active"><span><a href="#chairman"><span><i class="glyphicon glyphicon-menu-right"></i></span>চেয়ারম্যানের কথা</a></li>
						<li><a href="#headmaster"><span><i class="glyphicon glyphicon-menu-right"></i></span>প্রধান শিক্ষকের কথা</a></li>
						<li><a href="#mang-commitee"><span><i class="glyphicon glyphicon-menu-right"></i></span>ব্যবস্থাপনা কমিটি</a></li>
						<li><a href="#goal"><span><i class="glyphicon glyphicon-menu-right"></i></span>লক্ষ্য ও উদ্দেশ্য</a></li>
					</ul>
				</div>
			</div>
		</div>

		<script>
			$(document).ready(function(){
				var show_hash = window.location.hash.substr(1,window.location.hash.length);
				show_hide(show_hash);
				
				$('#side_link_about li a, #footer_link_about li a, #main_link_about li a').click(function(){
					show_hash = $(this).context.hash.substr(1, $(this).context.hash.length);
					show_hide(show_hash);
				});

				function show_hide (show_id) {
					var ids = ['chairman', 'headmaster', 'mang-commitee', 'goal'];
					console.log(show_id);
					$.each(ids, function(key, value) {
						if(value == show_id) {
							$('#'+value).show();
						} else {
							$('#'+value).hide();
						}
					});
				}
			});
		</script>
	</div>
</div>