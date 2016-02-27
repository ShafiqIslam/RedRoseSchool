<div class="container application_submit_page main-content">
	<?php if($success) { ?>
		<h2>ধন্যবাদ!!</h2>
		<p class="success_notice">আপনি সঠিকভাবে আবেদন ফরম পূরণ করেছেন।</p>
		<p><span class="warning">আপনার অ্যাপ্লিকেশন টোকেন নং - <strong><?php echo $token;?>;</strong> পরবর্তীতে ব্যবহারের জন্য এই টোকেন নং টি সংরক্ষণ করুন।</span><a href="<?php echo $this->webroot;?>application_status">আপনার আবেদন ফরম দেখুন<span><i class="fa fa-external-link fa-lg"></i></span></a></p>
	<?php } else { ?>
		<h2 class="error">দুঃক্ষিত!!!</h2>
		<p class="error_p">কিছু ভুল হয়েছে। অনুগ্রহপূর্বক  <a href="<?php echo $this->webroot;?>online_application">আবার চেষ্টা করুন।<span><i class="fa fa-external-link fa-lg"></i></span></a></p>
	<?php } ?>
</div>