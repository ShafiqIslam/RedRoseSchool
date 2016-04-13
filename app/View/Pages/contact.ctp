<style type="text/css">
	.address_details a:hover{
		text-decoration: none;
	}
</style>

<div class="container main-content">
	<div class="row">
      	<div class="col-sm-6">
       	  	<div class="address-field">
	          	<fieldset class="well form-horizontal">
	                <address>
						<strong>রেড রোজ নার্সারি স্কুল</strong><br>
						<i class="address_details">
							<?php echo $general_data['General']['address_1']?><br>
							<?php echo $general_data['General']['address_2']?><br>
							<a href="tel:+88<?php echo $general_data['General']['phone']?>">
								<span>
									<i class="glyphicon glyphicon-earphone"></i>  :  
									+880<?php echo $general_data['General']['phone']?>
								</span>
							</a><br>
							<a href="mailto:<?php echo $general_data['General']['mail']?>">
								<span>
									<i class="glyphicon glyphicon-envelope"></i>  :  
									<?php echo $general_data['General']['mail']?>
								</span>
							</a><br>
						</i>
	                </address>
	            </fieldset>
            </div>
        </div>
	    <div class="col-sm-6">
	       	<div class="contact-mail">

	            <form class="well form-horizontal" action="<?php echo $this->webroot?>messages/public_report" method="post"  id="contact_form">
	            	<fieldset>
	            
			            <!-- Form Name -->
			            <legend><h2>আমাদের সাথে যোগাযোগ</h2></legend>
			            
			            <!-- Text input-->
			            
			            <div class="form-group">
			              <label class="col-md-3 control-label">নাম</label>  
			              <div class="col-md-9 inputGroupContainer">
				              <div class="input-group">
				              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				              <input  name="data[Message][sender_name]" placeholder="আপনার নাম" class="form-control"  type="text" required>
				                </div>
			              </div>
			            </div>
			            
			            <!-- Text input-->
			            <div class="form-group">
			              <label class="col-md-3 control-label">ই-মেইল</label>  
			              <div class="col-md-9 inputGroupContainer">
			                <div class="input-group">
			                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			              		<input name="data[Message][sender_mail]" placeholder="আপনার ই-মেইল" class="form-control"  type="email" required>
			                </div>
			              </div>
			            </div>
			            
			            <!-- Text input-->
			                   
			            <div class="form-group">
			              <label class="col-md-3 control-label">ফোন</label>  
			                <div class="col-md-9 inputGroupContainer">
			                <div class="input-group">
			                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			              		<input name="data[Message][sender_phone]" data-format="+880 dddd-dddddd" class="form-control bfh-phone" type="text" required>
			                </div>
			              </div>
			            </div>
			            
			           
			            
			            <!-- Text area -->
			              
			            <div class="form-group">
			              <label class="col-md-3 control-label">মেসেজ</label>
			                <div class="col-md-9 inputGroupContainer">
			                <div class="input-group">
			                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			                        <textarea class="form-control" name="data[Message][text]" placeholder="আপনার মেসেজ লিখুন" required></textarea>
			              </div>
			              </div>
			            </div>
			            
			            <!-- Button -->
			            <div class="form-group">
			              <label class="col-md-3 control-label"></label>
			              <div class="col-md-9">
			                <button type="submit" class="btn btn-warning" ><span class="send">Send</span> <span class="glyphicon glyphicon-send"></span></button>
			              </div>
			            </div>
	            
	            	</fieldset>
	        	</form>
	        </div>
	    </div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="map">
				<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="500" src="https://maps.google.com/maps?hl=en&q=Red Rose Kindergarten, Khulna - Jessore - Dhaka Highway, Khulna, Khulna Division, Bangladesh&ie=UTF8&t=k&z=15&iwloc=B&output=embed"></iframe>
			</div>
		</div>
	</div>
</div>