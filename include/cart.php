    
<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/ajax.js"></script> 
<div class="contain">
                		<div class="contain_left">
                   		  
                                <div class="h_line1"></div>
                                <div class="heading">Specials</div>
                                <div class="h_line1"></div>
                                <div class="image_box">
                           		  <div class="image_part"><a href="index.php?p=product&SubCategoryId=8"><img src="images/product1.jpg" alt="" height="110px" width="110px"/></div>
                                  <div class="name_text">Men Shirts</a><br />
<span style="font-weight:bold;">Rs.899</span> </div>
                                </div>
                                <div class="image_box" style="border-top:none; padding-bottom:1px;">
                           		  <div class="image_part"><a href="index.php?p=product&SubCategoryId=1"><img src="images/product2.jpg" alt="" height="110px" width="110px" /></div>
                                  <div class="name_text">Men Jackets</a><br />
<span style="font-weight:bold;">Rs.1899</span> </div>
                          </div>
                        </div>
                        <div class="contain_right">
                        <div class="h_line1"></div>
                   		  <div class="heading">Cart</div>
                          <div class="h_line1"></div>
                          
                                <div class="gallery_box">
                               <!--<img src="images/removed.png"  width="680px;"/>-->
                                		<div class="product_d_part">
                                    			<div class="cart_line_box" style="background-color:#CCCCCC;">
                                                <div class="cart_line_name_box"><h1>Name</h1></div>
                                                <div class="cart_line_image_box"><h1>Image</h1></div>
                                                    <div class="cart_line_sku_box"><h1>Size</h1></div>
                                                    <div class="cart_line_price_box"><h1>Price</h1></div>
                                                    <div class="cart_line_qunty_box"><h1>Quantity</h1></div>
                                                    <div class="cart_line_subt_box"><h1>Subtotal</h1></div>
                                                    <div class="clear"></div>
                                                </div>
                                                <?php 
	if(isset($_SESSION["userid"])!=""){
		$uid=$_SESSION["userid"];
		}
	else
	{
		$uid=$_COOKIE['PHPSESSID'];
	}
	$sql1="select * from shoppingcart where UserId ='".$uid."'";
	$rsu = $objDB->select($sql1);
	for($u=0;$u<count($rsu);$u++){
		
		$pid=$rsu[$u]['ProductId'];
		$quantity=$rsu[$u]['Quantity'];
		$sz=$rsu[$u]['Size'];
		$sql1="select * from product where ProductId ='".$pid."'";
		$rsd = $objDB->select($sql1);
									
		for($d=0;$d<count($rsd);$d++){
		$sql2="select * from product_qty where ProductId ='".$pid."' and SizeId='".$sz."'";
		$rsize = $objDB->select($sql2);
		
		for($s=0;$s<count($rsize);$s++){
		?> 
                                                <div class="cart_line_box" id="cart<?php echo $u;?>">
                                            		<div class="cart_line_name_box"><?php echo $rsd[$d]["ProductName"];?></div>
                                                    <div class="cart_line_image_box"><img src="<?php echo $AbsoluteURLAdmin;?>images/Product_Image/<?php echo $rsd[$d]['ProductImage'];?>"  height="75" width="75" /></div>
                                                    <div class="cart_line_sku_box"><?php  $SQL="select * from product_size where SizeId ='".$sz."'";
	
	$rsUser1 = $objDB->select($SQL);
	for($us=0;$us<count($rsUser1);$us++){
	echo $rsUser1[$us]['Size'];
	}
?></div>
                                                    <div class="cart_line_price_box"><input type="hidden" id="price<?php echo $u;?>" name="price" value="
	<?php 
		 if($rsd[$d]['offer']!=0)
		 {                        
			$dp=$rsd[$d]['ProductPrice']*$rsd[$d]['offer']/100;
			
		 	$dp=$rsd[$d]['ProductPrice']-$dp;
			echo(round($dp));
		}
		else
		{
			echo $rsd[$d]['ProductPrice'];
		}
?>
    " />Rs.
	<?php 
	if($rsd[$d]['offer']!=0)
		 {                        
			$dp=$rsd[$d]['ProductPrice']*$rsd[$d]['offer']/100;
			
		 	$dp=$rsd[$d]['ProductPrice']-$dp;
			echo $price=(round($dp));
		}
		else
		{
			echo $price=$rsd[$d]['ProductPrice'];
		}
	?></div>
                                                    <div class="cart_line_qunty_box2">
                                                     <input type="text" id="Qyt<?php echo $u;?>" name="Qyt" size="5" value="<?php echo $rsu[$u]['Quantity'];?>" onblur="addtocart(<?php echo $rsize[$s]['Quantity'];?>,'<?php echo $u;?>','<?php echo count($rsu);?>','<?php echo $rsu[$u]['ProductId'];?>')"/>
                                                     
                                                    <a href="javascript:funRemove('<?php echo $rsu[$u]['ProductId'];?>','<?php echo $u;?>','<?php echo count($rsu);?>','<?php echo $sz ?>')"><img src="images/minas.jpg" /></a>
                                                    <div class="clear"></div>
                                                    </div>
                                                    <div class="cart_line_subt_box" id="subtotal">Rs.<label style="margin-left:2px;" id="total<?php echo $u;?>" class="total">
    <?php
		$total=$quantity*$price;
		echo $total; 
	?>
    </label></div>
                                                    <div class="clear"></div>
                                                    
                                            </div>  <?php }}} ?>
                                            	
                                            	<div class="cart_line_box">
                                            			<div class="cart_line_subt_box2">
                                                        <div class="cart_line_sku_box2"><h1>Total:</h1></div>
                                                        <div class="cart_line_subt_box">Rs.<label style="margin-left:2px;" id="totalamount" >
    </label></div>
                                                        <div class="clear"></div>
                                                        </div>
                                                        
                                                        <div class="clear"></div>
                                            </div>
                                            	<div style="padding-left:10px;"><br />
                                            <a href="index.php">    <img src="images/c_s.jpg" /></a>
                                              <a href="index.php?p=checkout">  <img src="images/check_out.jpg" /></a>
                                            <!--<div class="cart_button"><a <href="#">Continue&nbsp;Shopping </a></div>
                                                    <div class="checkout_button" style="border:1px solid #a4a4a4; line-height:20px;"><a href="index.php?p=checkout" style="color:#000000;">Check&nbsp;Out</a></div>-->
                                                    <div class="clear"></div>
                                                    </div>
                                    </div>
                                    <br />
                                </div>
      </div>
                        <div class="clear"></div>
                </div>
      <script type="text/javascript">
var totalPrice = 0;
for(var i=0;i<<?php echo count($rsu);?>;i++){
	var quantity = document.getElementById('Qyt'+i).value;
	var itemprice = document.getElementById('price'+i).value;
	var totalpricei = quantity*itemprice;
	totalPrice += totalpricei;
}
document.getElementById('totalamount').innerHTML = totalPrice;
</script>