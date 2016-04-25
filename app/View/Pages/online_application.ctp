
<div class="container application_body">
	<h2>অনলাইন অ্যাপ্লিকেশন ফরম</h2>
	<hr>
	<div class="online_application col-sm-offset-1 col-sm-10">
		<form action="<?php echo $this->webroot.'online_applications/public_add';?>" class="form-horizontal" method="post" role="form">

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর পূর্ণ নাম(বাংলায়):<b></label>
				<div class="col-sm-7">
					<input type="text" name="data[OnlineApplication][name_bn]" class="form-control" id="user" placeholder="ছাত্র/ছাত্রীর পূর্ণ নাম(বাংলায়)" required>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর পূর্ণ নাম(ইংরেজীতে):<b></label>
				<div class="col-sm-7">          
					<input type="text" name="data[OnlineApplication][name_en]" class="form-control" id="user" placeholder="Student's Name(In Engish)" required>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর জন্ম তারিখ:<b></label>
				<div class="col-sm-7">          
					<input id="datepicker" type="text" class="form-control" name="data[OnlineApplication][birthday]" placeholder="yyyy-mm-dd (যেমনঃ 2010-01-31)" required>
				</div>
			</div>

			<div class="form-group">
		       <label class="control-label col-sm-5"><b>রক্তের গ্রুপ:<b></label>
		      <div class="col-sm-7">          
		        <select name="data[OnlineApplication][blood_group]" class="form-control" required>
		        	<option selected="true" disabled="disabled" class="active">রক্তের গ্রুপ</option>
		        	<option value="A+">A+</option>
		        	<option value="B+">B+</option>
		        	<option value="AB+">AB+</option>
		        	<option value="O+">O+</option>
		        	<option value="A-">A-</option>
		        	<option value="B-">B-</option>
		        	<option value="AB-">AB-</option>
		        	<option value="O-">O-</option>
		        </select>
		      </div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর পিতার নাম(বাংলায়):<b></label>
				<div class="col-sm-7">          
					<input type="text" class="form-control" id="usr" name="data[OnlineApplication][father_name_bn]" placeholder="পিতার নাম(বাংলায়)" required>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর পিতার নাম(ইংরেজীতে):<b></label>
				<div class="col-sm-7">          
					<input type="text" class="form-control" id="usr" name="data[OnlineApplication][father_name_en]" placeholder="Farher's Name(In English)" required>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর ঠিকানা(বর্তমান):<b></label>
				<div class="col-sm-7">          
					<textarea name="data[OnlineApplication][present_address]" class="col-sm-12 form-control" required></textarea>
				</div>
			</div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর ঠিকানা(স্থায়ী):<b></label>
				<div class="col-sm-7">          
					<textarea name="data[OnlineApplication][permanent_address]" class="col-sm-12 form-control" required></textarea>
				</div>
			</div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর পিতার পেশা(বিস্তারিত):<b></label>
				<div class="col-sm-7">          
					<input type="text" class="form-control" name="data[OnlineApplication][father_occupation]" placeholder="বিস্তারিত" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>মাসিক আয়:<b></label>
				<div class="col-sm-7">          
					<input type="number" name="data[OnlineApplication][father_income]" class="form-control" id="usr" placeholder="মাসিক আয়" required>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>পিতার মোবাইল / টেলিফোন(অফিস):<b></label>
				<div class="col-sm-7 inputGroupContainer"> 
					<div class="input-group">
						<span class="input-group-addon">+৮৮</span>         
						<input type="number" name="data[OnlineApplication][father_office_mobile]" class="form-control" placeholder="" required>
					</div>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>পিতার মোবাইল / টেলিফোন(ব্যক্তিগত):<b></label>
				<div class="col-sm-7 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon">+৮৮</span>         
						<input type="number" name="data[OnlineApplication][father_mobile]" class="form-control" id="usr" placeholder="" required>
					</div>
				</div>
		    </div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর মায়ের নাম (বাংলায়):<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][mother_name_bn]"  type="text" class="form-control" id="usr" placeholder="মায়ের নাম (বাংলায়)" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর মায়ের নাম (ইংরেজীতে):<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][mother_name_en]" type="text" class="form-control" id="usr" placeholder="Mother's Name(In English)" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>মায়ের পেশা:<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][mother_occupation]" type="text" class="form-control" id="user" placeholder="মায়ের পেশা" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>মাসিক আয়:<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][mother_income]" type="number" class="form-control" id="user" placeholder="মাসিক আয়" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর জাতীয়তা:<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][nationality]"  type="text" class="form-control" id="usr" value="বাংলাদেশী">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর ধর্ম:<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][religion]"  type="text" class="form-control" id="usr" placeholder="" required>
				</div>
			</div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>অভিভাবকের নাম,ঠিকানা,পেশা ও সম্পর্ক:<b></label>
				<div class="col-sm-7">          
					<textarea name="data[OnlineApplication][guardian_name]"  class="col-sm-12 form-control" required></textarea>
				</div>
		     </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর বিশেষ কোন দূর্বলতা(প্রয়োজ্য ক্ষেত্রে):<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][weekness]"  type="text" class="form-control" id="usr" placeholder="শারীরীক/মানসিক">
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>যে শ্রেণীতে ভর্তি হতে ইচ্ছুক:<b></label>
				<div class="col-sm-7">          
					<select name="data[OnlineApplication][class_name_id]" class="form-control" required>
						<option selected="true" disabled="disabled" class="active">শ্রেণী নির্বাচন করুন</option>
						<?php foreach ($classNames as $key => $className) { ?>		        	
						<option value="<?php echo $key;?>"><?php echo $className;?></option>	
					<?php } ?>
					</select>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>ছাত্র/ছাত্রীর বিশেষ প্রবণতা:<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][speciallity]" type="text" class="form-control" id="usr" placeholder="" required>
				</div>
		    </div>

		    <div class="form-group">
				<label class="control-label col-sm-5"><b>পূর্ববর্তী স্কুলের নামও ছাড়পত্র নং(প্রয়োজ্য ক্ষেত্রে):<b></label>
				<div class="col-sm-7">          
					<input name="data[OnlineApplication][previous_school]" type="text" class="form-control" id="usr" placeholder="টি. সি./নাম">
				</div>
		    </div>

			<div class="form-group">
				<label class="control-label col-sm-5"><b>যোগাযোগ মোবাইল (এই নম্বরটিতে বার্তা পাবেন):<b></label>
				<div class="col-sm-7 inputGroupContainer">
					<div class="input-group">
						<span class="input-group-addon">+৮৮</span>
						<input type="number" name="data[OnlineApplication][mobile]" class="form-control" id="usr" placeholder="" required>
					</div>
				</div>
			</div>

		    <div class="form-group">
            	<label for="inputEmail3" class="col-sm-5 control-label"></label>
                <div class="col-sm-7">
                    <button type="submit" class="btn btn-primary pull-right submit-green s-c">Submit</button>
                </div>
            </div>
		</form>
	</div>
</div>

		<!--=======================Footer Part ================================-->
