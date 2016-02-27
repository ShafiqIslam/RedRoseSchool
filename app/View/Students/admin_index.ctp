<?php echo $this->element('menu');?>
<?php 
$current_year = date('Y');
$starting_year = 2016;
?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <form class="form-horizontal col-md-6" method="post">
        <fieldset>
        	<legend><?php echo __('Select A Session'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Session</label>
                <div class="col-sm-9">
                    <select name="session" class="form-control">
                    	<?php for ($i=$current_year; $i>=$starting_year; $i--) { 
                    		echo "<option value='$i'>$i</option>";
                    	} ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn submit-green s-c">Submit</button>
                </div>
            </div>
        </fieldset>
        </form>

        <form class="form-horizontal col-md-6" method="post" action="<?php $this->webroot;?>students/find_by_code">
        <fieldset>
            <legend><?php echo __('Find a Student By Code'); ?></legend>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Code</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Enter Code Here" name="data[Student][code]">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn submit-green s-c">Go</button>
                </div>
            </div>
        </fieldset>
        </form>
    </div>
</div>
