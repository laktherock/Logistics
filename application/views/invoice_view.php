<div class="row">
	<div class="col-md-5 col-md-offset-8 right" style="margin-top:50px;">Add items &nbsp&nbsp&nbsp<a href="<?php echo base_url();?>index.php/Invoice/add_item"><button class="button1">Add</button></a></div>
</div>
<table cellspacing='0' style="margin-left:267px; margin-bottom:84px;"> 
		<tr>
		  <th>Invoice id</th>
          <th>Consignor From</th>
          <th>Consignor To</th>
          <th>Comments</th>
          <th>Created Date</th>
          <th>Status</th>
          <th colspan="2">Action</th>
		</tr>
	   <?php foreach($result as $val){ ?>
		<tr>
			<td><?php echo $val->invoice_id; ?></td>
			<td><?php echo $val->invoice_consignorfrom; ?></td>
			<td><?php echo $val->invoice_consignorto; ?></td>
			<td><?php echo $val->invoice_comments; ?></td>
			<td><?php echo $val->invoice_createddate; ?></td>
			<td><?php echo $val->invoice_status; ?></td>
			<td><a href="<?php echo base_url();?>index.php/Invoice/editinvoice/<?php echo $val->invoice_id;?>"><button class="button1">Edit</button></a></td><td><a href="<?php echo base_url();?>index.php/Invoice/deleteinvoice/<?php echo $val->invoice_id;?>"><button class="button1">Delete</button></a></td>
		</tr>
		<?php }?>
</table>

