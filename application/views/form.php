<script>
	 $(function() {
		$( "#age" ).datepicker({
			dateFormat: "yy-mm-dd"
		});
	});
</script>
<div class="row">
	<div class="col-md-12 text-center"><h1><span class="red">C</span>onsignor <span class="red">F</span>orm</h1></div>
</div>
	<form method="POST">
		<div class="row">
			<div class="col-md-6 text-right " style="margin: 51px 2px">
				<input type="text" name="name" id="name" placeholder="Enter your full name" value="<?php if(!empty(set_value('name'))){ echo set_value('name'); }elseif(!empty($editresult['0']->consignor_name)){ echo $editresult['0']->consignor_name; } else {echo ""; } ?>"/><br />
				<span style="color:red;"><?php echo form_error('name'); ?></span>
				<input type="text" name="email" id="email" placeholder="Email address" value="<?php if(!empty(set_value('email'))){ echo set_value('email'); }elseif(!empty($editresult['0']->consignor_email)){ echo $editresult['0']->consignor_email; } else {echo ""; } ?>"/><br />
				<span style="color:red;"><?php echo form_error('email'); ?></span>
				<input type="text" name="mobile" id="mobile" placeholder="Mobile number" value="<?php if(!empty(set_value('mobile'))){ echo set_value('mobile'); }elseif(!empty($editresult['0']->consignor_phone)){ echo $editresult['0']->consignor_phone; } else {echo ""; } ?>"/><br />
				<span style="color:red;"><?php echo form_error('mobile'); ?></span>
				</div>
			<div class="col-md-5" style="margin: 49px 0px">
				<input type="text" name="companyname" id="Company Name" placeholder="Company Name" value="<?php if(!empty(set_value('companyname'))){ echo set_value('companyname'); }elseif(!empty($editresult['0']->consignor_companyname)){ echo $editresult['0']->consignor_companyname; } else {echo ""; } ?>"/><br />
				<span style="color:red;"><?php echo form_error('companyname'); ?></span>
				<textarea name="companyaddr" id="textarea" placeholder="Company Address" value="<?php if(!empty(set_value('companyaddr'))){ echo set_value('companyaddr'); }elseif(!empty($editresult['0']->consignor_address)){ echo $editresult['0']->consignor_address; } else {echo ""; } ?>"/></textarea> <br />
				<span style="color:red;"><?php echo form_error('companyaddr'); ?></span>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12 text-center"> 
				<input type="submit" name="submit" value="Register" />
			</div>
		</div>
	</form>
