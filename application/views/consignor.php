<div class="row">
	<div class="col-md-5 col-md-offset-8 right" style="margin-top:50px;">Do You want to add another Consignor&nbsp&nbsp&nbsp<a href="<?php echo base_url();?>index.php/Consin/consignor"><button class="button1">Add</button></a></div>
</div>
<table cellspacing='0' style="margin-left:123px; margin-bottom:84px;"> 
		<tr>
			<th>Consignor ID</th>
			<th>Name</th>
			<th>Email-ID</th>
			<th>Mobile Number</th>
			<th>Company Name</th>
			<th>Company Address</th>
			<th>Created Date</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>
	   <?php foreach($result as $val){ ?>
		<tr>
			<td><?php echo $val->consignor_id; ?></td>
			<td><?php echo $val->consignor_name; ?></td>
			<td><?php echo $val->consignor_email; ?></td>
			<td><?php echo $val->consignor_phone; ?></td>
			<td><?php echo $val->consignor_companyname; ?></td>
			<td><?php echo $val->consignor_address; ?></td>
			<td><?php echo $val->consignor_createddate; ?></td>
			<td><?php echo $val->consignor_status; ?></td>
			<td><a href="<?php echo base_url();?>index.php/Consin/editconsign/<?php echo $val->consignor_id;?>"><button class="button1">Edit</button></a></td><td><a href="<?php echo base_url();?>index.php/Consin/delete_consign/<?php echo $val->consignor_id;?>"><button class="button1">Delete</button></a></td>
		</tr>
		<?php }?>
		<!--<tr>
			<td>1001</td>
			<td>Lakshmi Narayanan</td>
			<td>Yes</td>
			<td>Yes</td>
			<td>Yes</td>
			<td>Yes</td>
			<td>Yes</td>
			<td>Yes</td>
			<td><button class="button1">Edit</button></td><td><button class="button1"> Delete</button></td>
		</tr>-->  
</table>

