<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$ProductId = loadVariable("ProductId",0);
$sz = loadVariable("Size",'0');
$CategoryId = loadVariable("CategoryId",'');
$SubCategoryId = loadVariable('SubCategoryId','');

$offer=loadVariable('offer','');
$brand=loadVariable('brand','');
$size=loadVariable('size','');
$color=loadVariable('color','');
$design=loadVariable('design','');
$material=loadVariable('material','');
$collar=loadVariable('collar','');
$file=loadVariable('file','');
$quantity=loadVariable('quantity','');
$price=loadVariable('price','');
$productname=loadVariable('productname','');

if ($a=="") $a='list';

if ($a=="edit") {
	if ($ProductId!=0) {
		$SQL="select * from product where ProductId =".$ProductId;
		$rsUser = $objDB->select($SQL);
		if (count($rsUser)>0) {
			$ProductId = $rsUser[0]["ProductId"];
			$productname = $rsUser[0]["ProductName"];
			$SubCategoryId = $rsUser[0]["SubCategoryId"];
			$CategoryId = $rsUser[0]["CategoryId"];
			$BrandId = $rsUser[0]["BrandId"];
			$MaterialId = $rsUser[0]["MaterialId"];
			$DesignId = $rsUser[0]["DesignId"];
			$CollarId = $rsUser[0]["CollarId"];
			$price = $rsUser[0]["ProductPrice"];
			$productimage=$rsUser[0]['ProductImage'];
			$offer=$rsUser[0]['offer'];
			
			
						
		}
		echo $SQL4="select * from product_qty where ProductId =".$ProductId." and Size=".$sz;
		$rsUser4 = $objDB->select($SQL4);
		if (count($rsUser4)>0) {
			
			echo $SizeId = $rsUser4[0]["SizeId"];
			echo $ColorId = $rsUser4[0]["ColorId"];
			echo $quantity=$rsUser4[0]['Quantity'];
			
						
		}
		
		
		
	}
}
if ($a=="list") {
	$SQL="select * from product";
	$SQL2="select * from product_qty";
	$rsUser2 = $objDB->select($SQL2);
	$rsUser = $objDB->select($SQL);
?>
			

<style type="text/css">
.hastable table a.btn span.ui-icon {
	left:0.2em;
}
</style>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<div id="sub-nav"><div class="page-title">
        		<?php if(isset($val) && $val != ''){
					 	$header = $val;
					 }else{
					 	$header = 'Manage Product';
					 }
					 ?>
			<h1><?php echo $header?></h1>
		</div>
</div>
<div id="page-layout">
	<div id="page-content">
			<div id="page-content-wrapper">
				<div class="inner-page-title">
					<h2>Product List<div style="float:right; font-size:16px;">
                    
                  </div></h2>
                  
                   <div class="clear"></div>
				</div>
				<div class="hastable">
                	<?php if(isset($_SESSION['success']) && $_SESSION['success'] != '' && $_SESSION['check'] == 'add'){ ?>
                        <div class="response-msg inf ui-corner-all">
							<div>
                            <span>Success Message</span>
								<?php echo $_SESSION['success']?><?php unset($_SESSION['success']); unset($_SESSION['check']); ?>
							</div>
						</div>
						<?php } ?>
                        <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '' && $_SESSION['check'] == 'add'){ ?>
                        <div class="response-msg inf ui-corner-all">
							<div>
                           		 <span>Error Message</span>
								<?php echo $_SESSION['error']?><?php unset($_SESSION['error']); unset($_SESSION['check']); ?>
							</div>
						</div>
						<?php } ?>
                        <p> <button type="button" id="deleteall_msg" class="ui-state-default ui-corner-all ui-button">Delete All</button></p>
                  <script language="javascript" type="text/javascript">
							  			var me = this;  
											jQuery(document).ready(function() {
												jQuery("#delete_all").dialog({
													autoOpen: false,
													bgiframe: true,
													resizable: false,
													width:500,
													modal: true,
													overlay: {
														backgroundColor: '#000',
														opadealsource: 0.5
													},
													buttons: {
														'Delete': function() {
															me.checkdeletion('delete');
															jQuery(this).dialog('close');
														},
														Cancel: function() {
															jQuery(this).dialog('close');
														}
													}
												});
												
												jQuery('#deleteall_msg').click(function(){
													jQuery('#delete_all').dialog('open');
													return false;
												});
											});
										</script>
                         <div id="delete_all" title="Delete ?">
                                            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to Delete all?</p>
                  </div>
                        <form id="frmdelmember" name="frmdelmember" method="post" action="manage.php" enctype="multipart/form-data"> 				
                            <input type="hidden" name="a" value="muldelete">
                            <input type="hidden" name="todo" id="todo" value=""> 
							<input type="hidden" name="p" value="<?php echo $p?>">
                   		<table id="sort-table"> 
						<thead> 
						<tr>
                            <th><input type="checkbox"  name="checkall" id="checkall" value="1" onclick="return checkAll(this.id);" /></th>
						    <th> ProductName</th>
                            <th> MainCategory</th>
                            <th> SubCategory</th>
                            <th> Barnd </th>
                            <th> Size</th>
                            <th> Color </th>
                            <th> Material</th>
                            <th> Design</th>
                            <th> Collar/Neck</th>
                            <th> Image</th>
                            <th> Quantity</th>
                            <th> Price</th>
                            <th> Discount</th>
                            <th style="width:128px">Options</th> 
						</tr> 
						</thead> 
                       <tbody> 
                       
                      <?php 
					  			  
					  if(!empty($rsUser)){ ?>
                        <?php for($i=0;$i<count($rsUser);$i++){
						
						
								for($r=0;$r<count($rsUser2);$r++){
								if($rsUser[$i]['ProductId']==$rsUser2[$r]['ProductId']){
						 ?>
						<tr>
                        
							<td class="center"><input name="multipledel[]" type="checkbox" id="multipledel[]" value="<?php echo $rsUser[$i]['ProductId']?>"></td> 
                          <td><?php echo viewtext($rsUser[$i]['ProductName']);?></td>
                            <td><?php
							 $SQL="select * from category where CategoryId =".$rsUser[$i]['CategoryId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['Category'];
							
							?></td>
                            <td><?php
							 $SQL="select * from subcategory where SubCategoryId =".$rsUser[$i]['SubCategoryId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['SubCategory'];
							
							?></td>
                            <td><?php
							 $SQL="select * from product_brand where BrandId =".$rsUser[$i]['BrandId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['BrandName'];
							
							?></td>
                            <td><?php
							 $SQL="select * from product_size where SizeId =".$rsUser2[$r]['SizeId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['Size'];
							
							?></td>
                            <td><?php
							 $SQL="select * from product_color where ColorId =".$rsUser2[$r]['ColorId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['ColorName'];
							
							?></td>
                            <td><?php
							 $SQL="select * from product_material where MaterialId =".$rsUser[$i]['MaterialId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['MaterialName'];
							
							?></td>
                            <td><?php
							 $SQL="select * from product_design where DesignId =".$rsUser[$i]['DesignId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['DesignName'];
							
							?></td>
                            <td><?php
							 $SQL="select * from product_collar where CollarId =".$rsUser[$i]['CollarId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['CollarName'];
							
							?></td>
                            <td>
							  <img src="<?php echo $AbsoluteAdminURL;?>images/Product_Image/<?php echo $rsUser[$i]['ProductImage'];?>" height="80" width="80"  id="pimage" name="pimage"/>
							
							</td>
                            <td><?php
							 echo viewtext($rsUser2[$r]['Quantity']);?>
							
							</td>
                            <td><?php
							 
							echo viewtext($rsUser[$i]['ProductPrice']);?>
							</td>
                            
                            <td><?php
							 
							echo viewtext($rsUser[$i]['offer'])."%";?>
							</td>
                            
                            
                            
                           <td><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=product&a=edit&ProductId=<?php echo $rsUser[$i]['ProductId']?>&Size=<?php echo $rsUser2[$r]['SizeId']; ?>" title="Edit" style="float:left" class="btn_no_text btn ui-state-default ui-corner-all tooltip"><span class="ui-icon ui-icon-wrench"></span></a>
                           		<a id="modal_confirmation_link<?php echo $i?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" href="javascript:void(0);" title="Delete"><span class="ui-icon ui-icon-circle-close"></span></a>
								 <div id="modal_confirmation<?php echo $i?>" title="Delete ?">
                                      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to Delete? This will Delete all the information related this Product.</p>
                                 </div>
							 <script language="javascript" type="text/javascript">
                                    jQuery(document).ready(function() {
                                        jQuery("#modal_confirmation<?php echo $i?>").dialog({
                                            autoOpen: false,
                                            bgiframe: true,
                                            resizable: false,
                                            width:500,
                                            modal: true,
                                            overlay: {
                                                backgroundColor: '#000',
                                                opacity: 0.5
                                            },
                                            buttons: {
                                                'Delete': function() {
                                                    document.location.href="<?php echo $AbsoluteURLAdmin;?>manage.php?p=product&a=delete&pimage=<?php echo $rsUser[$i]['ProductImage'];?>&ProductId=<?php echo $rsUser[$i]['ProductId']?>";
                                                    jQuery(this).dialog('close');
                                                },
                                                Cancel: function() {
                                                    jQuery(this).dialog('close');
                                                }
                                            }
                                        });
                                        
                                        jQuery('#modal_confirmation_link<?php echo $i?>').click(function(){
                                            jQuery('#modal_confirmation<?php echo $i?>').dialog('open');
                                            return false;
                                        });
                                    });
                                </script>
                                 <?php } }}?>
                          </td>
                        </tr> 
                      	 <?php }else{ ?>
                         <tr>
							<td colspan="10" align="center" style="text-align:center;font-weight:bolder"><?php echo NO_RECORD?></td>
                         </tr>
						<?php } ?>
						</tbody>
                        </table>
                        </form>
						<div id="pager">
					
								<a class="btn_no_text btn ui-state-default ui-corner-all first" title="First Page" href="#">
									<span class="ui-icon ui-icon-arrowthickstop-1-w"></span>
								</a>
								<a class="btn_no_text btn ui-state-default ui-corner-all prev" title="Previous Page" href="#">
									<span class="ui-icon ui-icon-circle-arrow-w"></span>
								</a>
							
								<input type="text" class="pagedisplay"/>
								<a class="btn_no_text btn ui-state-default ui-corner-all next" title="Next Page" href="#">
									<span class="ui-icon ui-icon-circle-arrow-e"></span>
								</a>
								<a class="btn_no_text btn ui-state-default ui-corner-all last" title="Last Page" href="#">
									<span class="ui-icon ui-icon-arrowthickstop-1-e"></span>
								</a>
								<select class="pagesize">
									<option value="10" selected="selected">10 results</option>
									<option value="20">20 results</option>
									<option value="30">30 results</option>
									<option value="40">40 results</option>

								</select>	
                              					
						</div>
					
                  <input type="button" class="ui-button float-right ui-state-default ui-corner-all" id="create-user" value="Add Product" onclick="document.location.href='index.php?p=product&a=add' " >
               		<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
	</div>
</div>
<?php }elseif($a=="edit" || $a=="add"){ ?>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/validate.js"></script>
<script type="text/javascript">
$().ready(function() {
	// validate signup form on keyup and submit
	$("#FrmTestimonials").validate({
		rules: {
			productname: "required",
			maincategory: "required",
			subcategory: "required",
			brand: "required",
			
			color: "required",
			design: "required",
			material: "required",
			
			quantity: "required",
			price: "required",
			productname: "required",
			
			
			
		messages: {
			subcategory: "Please enter your Sub Category"
		}
	}
	});
});
function funGetNeck(SubCategoryId){

if(SubCategoryId==2 || SubCategoryId==3 || SubCategoryId==4 || SubCategoryId==12 || SubCategoryId==14 || SubCategoryId==15 || SubCategoryId==16 || SubCategoryId==21 || SubCategoryId==22 || SubCategoryId==23 || SubCategoryId==24)
	{
		document.getElementById('neck').style.display="none";
	}
	else
	{
		document.getElementById('neck').style.display="inherit";
	}
}	
</script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ajax.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

	    var counter = 2;
		
	    $("#addButton").click(function () {
				
			if(counter>10){
		        alert("Only 10 textboxes allow");
		        return false;
		    }   
			
			var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
                newTextBoxDiv.after().html('<li><select name="size[]"><?php $sql="select * from product_size";$rssize=$objDB->select($sql);?><option value="">Select Size</option><?php for($c=0;$c<count($rssize);$c++){?><option value="<?php echo $rssize[$c]["SizeId"];?>"<?php if($SizeId==$rssize[$c]["SizeId"]){?> selected="selected" <?php }?>><?php echo $rssize[$c]["Size"];?></option><?php }?></select><select name="color[]"><?php $sql="select * from product_color";$rscolor=$objDB->select($sql);?><option value="">Select Color</option><?php for($c=0;$c<count($rscolor);$c++){?><option value="<?php echo $rscolor[$c]["ColorId"];?>"<?php if($ColorId==$rscolor[$c]["ColorId"]){?>selected="selected" <?php }?>><?php echo $rscolor[$c]["ColorName"];?></option><?php }?></select><input type="text" name="quantity[]" id="quantity[]" value="<?php echo viewtext($quantity);?>"/></li>');
            newTextBoxDiv.appendTo("#TextBoxesGroup");
			counter++;
	    });

	    $("#removeButton").click(function () {
		    if(counter==1){
		        alert("No more textbox to remove");
		        return false;
		    }   
	        counter--;
			
	        $("#TextBoxDiv" + counter).remove();
		});
		
		$("#getButtonValue").click(function () {
		
			var msg = '';
			for(i=1; i<counter; i++){
				msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
			}
		   	alert(msg);
		});
		
  });
</script>
<div id="page-layout">
	<div id="page-content">
		<div id="page-content-wrapper">
			<div class="inner-page-title">
            <?php if($a == 'add'){?>
				<h2>Add Product</h2>
            <?php }else{?>
            	<h2>View Product/Edit Product</h2>
            <?php }?>
			</div>
			<div class="content-box">
               
                    <form onSubmit="return checkcity();" name="FrmTestimonials" id="FrmTestimonials" method="post" action="<?php echo $AbsoluteURLAdmin;?>manage.php" enctype="multipart/form-data">
                    <input type="hidden" name="chk" id="chk"> 
                    <input type="hidden" name="p" value="product">
                            <?php if($a == "edit"){ ?>
                      <input type="hidden" name="ProductId" value="<?php echo $ProductId?>">
                      <input type="hidden" name="Size" value="<?php echo $sz?>">
                            
							<input type="hidden" name="a" value="update">                            
							<?php }else{ ?>
                            <input type="hidden" name="a" value="add"> 
                            <?php } ?>
                           
                            
                    	<ul>
                        	<li>
								<label  class="desc123">
									ProductName:
								</label>
								
                                <input name="productname" type="text" class="field text small" id="productname" onblur="MM_validateForm('productname','','R','price','','RisNum','quantity[]','','RisNum');return document.MM_returnValue"   value="<?php echo viewtext($productname);?>" />
                               
                            </li>
                            <li>
								<label  class="desc123">
									MainCategory:
								</label>
								
                                <select name="maincategory" id="maincategory" onChange="funGetSubCat(this.value)" class="field text small">
                                <?php 
									$sql="select * from category";
									$rsmcat=$objDB->select($sql);
								?>
                                <option value="">Select MainCategory</option>
                                <?php for($i=0;$i<count($rsmcat);$i++){?>
                                <option value="<?php echo $rsmcat[$i]["CategoryId"];?>"<?php if($CategoryId==$rsmcat[$i]["CategoryId"]){?> selected="selected" <?php }?>
                                ><?php echo $rsmcat[$i]["Category"];?></option>
                                <?php }?>
                                </select>
                              
                            </li>
                            <li>
								<label  class="desc123">
									SubCategory:</label>
                                <span id="Spansubcat">
                               
                                <select name="subcat" id="subcat" class="field text small">
                                
                                <option value="">Select SubCategory</option>
                                <?php $sql1="select * from subcategory";
									$rscat1=$objDB->select($sql1);
									for($j=0;$j<count($rscat1);$j++){
								?>
                               <option value="<?php echo $rscat1[$j]["SubCategoryId"];?>"<?php if($SubCategoryId==$rscat1[$j]["SubCategoryId"]){?> selected="selected" <?php }?>
                                ><?php echo $rscat1[$j]["SubCategory"];?></option>
       
       <?php  }?>                   
                                </select>
                                </span>
                              
								
								
                            </li>
                            <li>
								<label  class="desc123">
									Brand:
								</label>
								
                                <select name="brand" class="field text small" style="margin-left:40px;">
                                <?php 
									$sql="select * from product_brand";
									$rsbrand=$objDB->select($sql);
								?>
                                <option value="">Select Brand</option>
                                <?php for($i=0;$i<count($rsbrand);$i++){?>
                                <option value="<?php echo $rsbrand[$i]["BrandId"];?>"
                                <?php if($BrandId==$rsbrand[$i]["BrandId"]){?> selected="selected" <?php }?>><?php echo $rsbrand[$i]["BrandName"];?></option>
                                <?php }?>
                                </select>
                              
                            </li>
                           
                            <li>
								<label  class="desc123">
									Material:
								</label>
								
                                <select name="material" class="field text small" style="margin-left:27px;">
                                <?php 
									$sql="select * from product_material";
									$rsmaterial=$objDB->select($sql);
								?>
                                <option value="">Select Material</option>
                                <?php for($i=0;$i<count($rsmaterial);$i++){?>
                                <option value="<?php echo $rsmaterial[$i]["MaterialId"];?>"<?php if($MaterialId==$rsmaterial[$i]["MaterialId"]){?> selected="selected" <?php }?>><?php echo $rsmaterial[$i]["MaterialName"];?></option>
                                <?php }?>
                                </select>
                               
                            </li>
                            <li>
								<label  class="desc123">
									Design:
								</label>
								
                                <select name="design" class="field text small" style="margin-left:30px;">
                                <?php 
									$sql="select * from product_design";
									$rsdesign=$objDB->select($sql);
								?>
                                <option value="">Select Design</option>
                                <?php for($i=0;$i<count($rsdesign);$i++){?>
                                <option value="<?php echo $rsdesign[$i]["DesignId"];?>"<?php if($DesignId==$rsdesign[$i]["DesignId"]){?> selected="selected" <?php }?>><?php echo $rsdesign[$i]["DesignName"];?></option>
                                <?php }?>
                                </select>
                               
                            </li>
                            <div id="neck">
                            <li>
								<label  class="desc123">
									Collar/Neck:
								</label>
								
                                <select name="collar" class="field text small" style="margin-left:8px;">
                                <?php 
									$sql="select * from product_collar";
									$rscollar=$objDB->select($sql);
								?>
                                <option value="">Select Collar/Neck</option>
                                <?php for($i=0;$i<count($rscollar);$i++){?>
                                <option value="<?php echo $rscollar[$i]["CollarId"];?>"<?php if($CollarId==$rscollar[$i]["CollarId"]){?> selected="selected" <?php }?>><?php echo $rscollar[$i]["CollarName"];?></option>
                                <?php }?>
                                </select>
                               
                            </li>
                            
                            </div>
                            <li>
								<label  class="desc123" >
									ProductImage:
								</label>
								<img src="<?php echo $AbsoluteAdminURL;?>images/Product_Image/<?php echo $rsUser[0]['ProductImage'];?>" height="80" width="80"  />
                                <input type="file" id="file" name="file" class="field text small" style="margin-left:-5px;">
                              
                            </li>
                            
                            
                            <li>
								<label  class="desc123">
									Price:
								</label>
								
                                <input type="text" name="price" id="price"    value="<?php echo viewtext($price);?>" class="field text small" style="margin-left:40px;"/>
                               
                            </li>
                            <li>
								<label  class="desc123">
									Discount Offer:
								</label>
								
                                <input type="text" name="offer" id="offer"    value="" class="field text small" style="margin-left:-9px;" value="<?php echo viewtext($price);?>""/>
                               
                            </li>
                            <div id='TextBoxesGroup' style="width:360px; float:left;">
                                <div id="TextBoxDiv1">
                                    <li>
                                       <label  class="desc123" style="padding-right:50px; padding-left:30px;">
                                            Size
                                        </label>
                                        <label  class="desc123" style="padding-right:50px; padding-left:30px;">
                                            Color
                                        </label>
                                        <label  class="desc123" style="padding-right:50px; padding-left:30px;">
                                            Quantity
                                        </label>
                                    </li>
                                    <li>
                                    
                                    	<select name="size[]">
                                            <?php 
                                                $sql="select * from product_size";
                                                $rssize=$objDB->select($sql);
                                            ?>
                                            <option value="">Select Size</option>
                                            <?php for($c=0;$c<count($rssize);$c++){?>
                                            <option value="<?php echo $rssize[$c]["SizeId"];?>"<?php if($SizeId==$rssize[$c]["SizeId"]){?> selected="selected" <?php }?>><?php echo $rssize[$c]["Size"];?></option>
                                            <?php }?>
                                            </select>
                                        <select name="color[]">
                                            <?php 
                                                $sql="select * from product_color";
                                                $rscolor=$objDB->select($sql);
                                            ?>
                                            <option value="">Select Color</option>
                                            <?php for($c=0;$c<count($rscolor);$c++){?>
                                            <option value="<?php echo $rscolor[$c]["ColorId"];?>"<?php if($ColorId==$rscolor[$c]["ColorId"]){?> selected="selected" <?php }?>><?php echo $rscolor[$c]["ColorName"];?></option>
                                            <?php }?>
                                            </select>
                                        <input type="text" name="quantity[]" id="quantity[]"    value="<?php echo $rsUser4[0]["Quantity"];?>"/>
                                    </li>
								</div>
                            </div>
                            <div id="btn" style="width:300px; float:left; margin-top:35px;"><?php /*?><input type='button' class="ui-state-default ui-corner-all ui-button" value='Add Button' id='addButton'><?php */?>
                      <a> <img id="addButton" src="images/add.png" width="20" height="20" /></a>&nbsp;&nbsp;
                      <a> <img id="removeButton" src="images/delete.png" width="20" height="20" /></a>
                      </div>
                            <?php /*?><input type='button' class="ui-state-default ui-corner-all ui-button" value='Remove Button' id='removeButton'></div><?php */?>
                            <li>
                            	<div >
                                	<input name="submit" type="submit" class="ui-state-default ui-corner-all ui-button" value="Save" />&nbsp;&nbsp;<input name="button" type="button" class="ui-state-default ui-corner-all ui-button" onclick='if(confirm(&quot;Are you sure you want to cancel?\n\nThis will cancel any changes you have made and not yet saved!&quot;)) { document.location.href=&quot;index.php?p=product&quot;}' value="Cancel" />
                                </div>
                            </li>
                        </ul>
                    </form>
					<div class="clear"></div>
		  </div>
		</div>
	</div>
</div>	         
<?php } ?>           
<?php if($a == "edit" || $_POST['a'] == 'add'){ ?>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
	   $('#tab1').css("display","none");
	   $('#tab2').css("display","block");
	});
</script>
<?php } ?>
<script type="text/javascript" language="javascript">
function checkdeletion(val) //for submitting form 
{	
	if(val != ''){
		document.getElementById('todo').value = val;
		document.frmdelmember.submit();
		return true;				
	}
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	/* Table Sorter */
	$("#sort-table")
	.tablesorter({
		widgets: ['zebra'],
		headers: { 
		            // assign the secound column (we start counting zero) 
		            0: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            }, 
		            // assign the third column (we start counting zero) 
		            5: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            } 
		        } 
	})
	
	.tablesorterPager({container: $("#pager")}); 
	
	$(".header").append('<span class="ui-icon ui-icon-carat-2-n-s"></span>');

	
});

 	/* Check all table rows */

var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "check_all"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "check_none"; }
}


</script>
