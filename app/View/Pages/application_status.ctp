<div class="container main-content ">
	<?php if(empty($is_exist)) { ?>
		<?php if(!empty($msg) && $msg==1) { ?>
			<div class="application_invalid">
				<p>টোকেন নং ভুল! পুনরায় চেষ্টা করুন, অথবা আপনার অ্যাপ্লিকেশন মুছে ফেলা হতে পারে, সেক্ষেত্রে, <a href="<?php echo $this->webroot?>contact">কর্তৃপক্ষের সাথে যোগাযোগ করুন।<span><i class="fa fa-external-link fa-lg"></i></span></a>.</p>
			</div>
		<?php } ?>
			<div class="col-sm-offset-4">
				<div class="application_status col-sm-6">
					<form class="form-horizontal" role="form" action="<?php echo $this->webroot;?>online_applications/public_status" method="post">
						<div class="form-group">
							<label class="control-label col-sm-4"><b>টোকেন নং<b></label>
							<div class="col-sm-8">          
								<input type="text" class="form-control" name="data[OnlineApplication][token]" class="form-control" id="user" placeholder="টোকেন নং প্রবেশ করুন">
							</div>
						</div>
						
						<div class="form-group">
			            	<label for="inputEmail3" class="col-sm-3 control-label"></label>
			                <div class="col-sm-9">
			                    <button type="submit" class="btn btn-primary pull-right submit-green s-c">Submit</button>
			                </div>
			            </div>
					</form>
				</div>
			</div>

	<?php } else { ?>
		<div class="application_success">
		<?php if($is_exist['OnlineApplication']['status']=="In Queue") { ?>
			<p>আপনার আবেদন এখনও প্রক্রিয়াধীন। শীঘ্রই যথাযথ ব্যবস্থা গ্রহণ করা হবে এবং আপনাকে জানানো হবে। ধন্যবাদ সঙ্গে থাকার জন্য।</p>
		<?php } elseif($is_exist['OnlineApplication']['status']=="Declined") { ?>
			<p>আপনার আবেদন প্রত্যাখ্যান করা হয়েছে।</p>
		<?php } elseif($is_exist['OnlineApplication']['status']=="Granted") { ?>
			<p>আপনার আবেদন গৃহীত হয়েছে।<a href="<?php echo $this->webroot.'files/online_applications/'.$is_exist['OnlineApplication']['pdf_link'];?>" target="_blank">আবেদন্টিকে প্রিন্ট করুন।</a> এবং স্কুলের অফিসের সাথে যোগাযোগ করুন । ধন্যবাদ সঙ্গে থাকার জন্য। </p>
		<?php } elseif($is_exist['OnlineApplication']['status']=="Admitted") { ?>
			<p>আবেদনকৃত শিক্ষার্থীর ভর্তি সম্পন্ন হয়েছে।</p>
		<?php } ?>
			<p style="margin-top: 10px;">যদি আপনার কোন জিজ্ঞাসা থাকে, তাহলে <a href="<?php echo $this->webroot?>contact">কর্তৃপক্ষের সাথে যোগাযোগ করুন।<span><i class="fa fa-external-link fa-lg"></i></span></a>.</p>
		</div>
	<?php } ?>
</div>