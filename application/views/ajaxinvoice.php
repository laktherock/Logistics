<?php if(!empty($con_result)){?>
<select name="consignorto" id="aid" style="position: absolute; left: 378px;">
<?php foreach ($con_result as $res ) { ?>
<option value="<?php echo $res->consignor_name;?>"><?php echo $res->consignor_name;?>/<?php echo $res->consignor_id;?></option>
<?php }?>
</select>
<?php }?>

<?php if(!empty($session)) {?>

<table>
<tr>
	<th>S.no.</th>
	<th>consignor_from</th>
	<th>consignor_to</th>
	<th>Products</th>
	<th>Quantity</th>
	<th>Price</th>
	<th>Discount</th>
	<th>Amount</th>
	<th> Action</th>
</tr>
<?php  $i=$sum=0; foreach ($_SESSION['invoice'] as $ses_key=>$key) {?>
<tr> 
	<td><?php echo $i+1; ?>
	<td><?php echo $key['consignorfrom']; ?></td>
	<td><?php echo $key['consignorto']; ?></td>
	<td><?php echo $key['products']; ?></td>
	<td><?php echo $key['quantity']; ?></td>	
	<td><?php echo $key['price']; ?></td>
	<td><?php echo $key['discount']; ?></td>
	<td><?php echo $key['amount']; ?></td>
	<td><a id="<?php echo $ses_key; ?>" class="button1">Delete</a></td>
	
</tr>
<?php $i++;$sum+=$key['amount'];} ?>
</table>
<div class="row">
	<div class="col-md-12 " style="margin-left: 401px">
	Total Amount: <?php echo $sum;?>
	</div>
</div>
<?php }?>