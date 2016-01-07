<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/invoicecss.css" />
</head>

<div class="errorcontainer"> <?php echo validation_errors(); ?></div>
	<form name="invoice" method="POST">
		<div class="row" style="margin-top: 30px; margin-bottom: 30px;">
			<div class="col-md-12 text-center" style="margin-top: 30px; margin-bottom: 72px;"><h1><span class="red">I</span>nvoice <span class="red">F</span>orm</h1></div>
			<div class="col-md-5 col-md-offset-1">
				<div class="row text-right" style="margin-left: 90px;">
					<div class="col-md-4 col-md-offset-1"  style="margin-bottom: 20px;">
						<select name="consignorfrom" id="confrom">		
							<?php foreach ($result as $val) {?>	
							<option <?php if(!empty($editresult) && ($editresult['0']->invoice_consignorfrom==$val->consignor_name)){echo "selected";}?> value="<?php echo $val->consignor_name;?>"><?php echo $val->consignor_name;?>/<?php echo $val->consignor_id;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4 col-md-offset-1"  style="margin-bottom: 20px;">
						<select name="consignorto" id="conto">
							<?php foreach ($result as $val) {?>	
							<option <?php if(!empty($editresult) && ($editresult['0']->invoice_consignorto==$val->consignor_name)){echo "selected";}?> value="<?php echo $val->consignor_id;?>"><?php echo $val->consignor_name;?>/<?php echo $val->consignor_id;?></option>
							<?php } ?>
						</select>
					</div>
					<input type="hidden" name="conid1" value="">
					<div id="ajax_response"></div>
				</div>
				<div class="row" style="margin-left: 90px;">
					<div class="col-md-2 col-md-offset-1 ">
						<input type="text" id="Products"  placeholder="Products" name="Products">
					</div>
					<div class="col-md-2 col-md-offset-1">
						<input type="text" id="Quantity"  placeholder="Quantity" name="Quantity">
					</div>
					<div class="col-md-2 col-md-offset-1 text-right">
						<input type="text" id="Price"  placeholder="Price" name="Price">
					</div>
				</div>
				<div class="row" style="margin-left: 90px;">
					<div class="col-md-2 col-md-offset-1">
						<input type="text" id="Per"  placeholder="Per" name="Per">
					</div>
					<div class="col-md-2 col-md-offset-1">
						<input type="text" id="Discount"  placeholder="Discount" name="Discount">
					</div>
					<div class="col-md-2 col-md-offset-1 text-right">
						<input type="text" id="podid"  placeholder="Pod id" name="podid">
					</div>
				</div>
			</div>
			<div class="col-md-4" style="margin-left: -24px; margin-top: 38px;">
				<textarea name="companyaddr" id="textarea" placeholder="Place your comments here"/><?php if(!empty(set_value('companyaddr'))){ echo set_value('companyaddr'); }elseif(!empty($editresult['0']->invoice_comments)){ echo $editresult['0']->invoice_comments; } else {echo ""; } ?></textarea> <br />
			</div>
		
			<div class="row" >
				<div class="col-md-12 text-center" style="margin-top: 20px; margin-bottom: 50px;">
					<button type="button" id="but" />Add </button>
				</div>
				
			</div>
			
			<div id="ajax_table" style="margin-left: 258px" ></div>

			<div class="row" >
				<div class="col-md-12 text-center" style="margin-top: 20px; margin-bottom: 72px;">
					<input type="submit" name="submit" value="Submit" id="but">
				</div>
				
			</div>
		</div>
	</form>	
<?php if(!empty($editresult)){?>
	<script type="text/javascript">
		$(function(){
			$.ajax({
		      type:'POST',
		      url:'http://yys/trainning/lakshmi/Liveproject/index.php/Invoice/edit_item_ajax',
		      data:{invoice_id:<?php echo $this->uri->segment(3);?>}			      
			}).done(function(data){
				$('#ajax_table').html(data);
			});
		});
	</script>
<?}?>	  

<script type="text/javascript">
	$(document).ready(function(){
		$('#conto').attr('disabled','disabled');
		$('#confrom').change(function(){

			//$('#cons_to').removeAttr('disabled');
			var cid=$('#confrom').val();
			$.ajax({

				type:'POST',
				url:'http://yys/trainning/lakshmi/Liveproject/index.php/Invoice/ajax_select',
				data:{cid:cid}
			})
			.done(function(data){
	    	 $("#conto").hide();
	    	 $("#ajax_response").html(data);
	   		 });
		});
	});
</script>	

<script type="text/javascript">
$(document).ready(function(){
  $('#but').click(function(){
  
    var con_from=$('#confrom').val();
    var consid=$('#aid').val();
    var products=$('#Products').val();
    var quantity=$('#Quantity').val();
    var price=$('#Price').val();
    var per=$('#Per').val();
    var discount=$('#Discount').val();
    var amount=$('#Amount').val();
//console.log(discount);
    $.ajax({

      type:'POST',
      url:'http://yys/trainning/lakshmi/Liveproject/index.php/Invoice/ajax_item',
      data:{ con_from :con_from,consid:consid,products:products,
      	quantity:quantity,price:price
        ,per:per,discount:discount,amount:amount}
}).done(function(data){

$('#ajax_table').html(data);
});
});  
});
</script>

