<div class="container main-content result_login">

	<div class="application_invalid">
		<p> Invalid code or password. Check it again. If you forgot about your code and password, <a href="<?php echo $this->webroot?>contact">কর্তৃপক্ষের সাথে যগাযোগ করুন।<span><i class="fa fa-external-link fa-lg"></i></span></a>.</p>
	</div>

	<div class="col-sm-offset-4 col-sm-4 result_login_bg">
		<form class="form-horizontal" action="<?php echo $this->webroot;?>students/student_login" method="post">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">কোড নং</label>
				<div class="col-sm-8">
					<input type="text" name="data[Student][code]" class="form-control" id="user" placeholder="Enter code here">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">পাসওয়ার্ড</label>
				<div class="col-sm-8">
					<input type="password" name="data[Student][password]" class="form-control" id="user">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label"></label>
				<div class="col-sm-8">
					<button type="submit" class="btn btn-primary pull-right submit-green s-c">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
