
<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/ajax.js">
</script>
<div class="contain_left">
                   		  <div class="h_line1"></div><div class="heading">Categories</div><div class="h_line1"></div>
                                <div class="categ">
                                		
           <ul id="theMenu">
            <li style="position: static;">
                <h3 class="head"><a href="javascript:;"> Mens Wear</a></h3>
                <ul style="display: none; margin-left:15px;" >
                <?php
                    $result = mysql_query("SELECT * FROM subcategory where CategoryId='1'");
                    while($row = mysql_fetch_array($result)){
                ?>
                    <li><a href="index.php?p=product&SubCategoryId=<?php echo $row['SubCategoryId'];?>"><?php echo $row['SubCategory'];?></a></li>
                <?php }?>
                                       
            </ul>
            </li>
            <li>
                <h3 class="head"><a href="javascript:;"> Womens Wear</a></h3>
                <ul style="display: none; margin-left:15px;">
                <?php
                    $result = mysql_query("SELECT * FROM subcategory where CategoryId='2'");
                    while($row = mysql_fetch_array($result)){
                 ?>
                    <li><a href="index.php?p=product&SubCategoryId=<?php echo $row['SubCategoryId'];?>"><?php echo $row['SubCategory'];?></a></li>
                <?php }?>
                </ul>
            </li>
          
                                               <h3 class="head"> <li><a href="#">Top sellers</a></li></h3>
                                                
                                             <h3 class="head">   <li><a href="#">New Lounch</a></li></h3>
                                              <h3 class="head">  <li><a href="#">Best sealler</a></li></h3>
        </ul>
                          </div>
                          
                                <div class="h_line1"></div><div class="heading">CART:&nbsp<?php 
			if(isset($_SESSION["userid"])!=""){
				$uid=$_SESSION["userid"];}
			else{
				$uid=$_COOKIE['PHPSESSID'];}
	
			$sql1="select * from shoppingcart where UserId ='".$uid."'";
			
			$rsu = $objDB->select($sql1);
			
			if(empty($rsu)){
				$Totalpro = "No";}
			else{
				$Totalpro = count($rsu)."";}
		?>
        <span id="tntpro"><?php echo $Totalpro;?></span>&nbsp;Product
	</div><div class="h_line1"></div>
                    <div class="image_box">
                       <div id="MyResult">     		  
    
                               <?php 
		if(isset($_SESSION["userid"])!=""){
			$uid=$_SESSION["userid"];}
		else{
			$uid=$_COOKIE['PHPSESSID'];
		}
		$sql1="select * from shoppingcart where UserId ='".$uid."'";
		$rsu = $objDB->select($sql1);
		for($i=0;$i<count($rsu);$i++){
			$pid=$rsu[$i]['ProductId'];
			$sz=$rsu[$i]['Size'];
			$sql2="select * from product where ProductId ='".$pid."'";
			$rsd = $objDB->select($sql2);
			for($d=0;$d<count($rsd);$d++){
	?> 
        <input type="hidden" id="price<?php echo $i;?>" name="price" value="
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
?>" />
	  	<input type="hidden" id="Qyt<?php echo $i;?>" name="Qyt" value="<?php echo $rsu[$i]['Quantity'];?>" />
      	<div id="cart<?php echo $i;?>" class="cart" style="margin-top:5px;">            <div style="margin-left:10px; width: 80px; float: left;">
            	<span style="color:#000000; font-size:14px;"><?php echo $rsd[$d]['ProductName'];?></span>
        </div>
        <div style="width:15px; float:left; margin-left:0px;">
        	<span style="color:#000000; font-size:14px;">
			<?php  
				$SQL="select * from product_size where SizeId ='".$sz."'";
            	$rsUser1 = $objDB->select($SQL);
            	for($us=0;$us<count($rsUser1);$us++){
            		echo $rsUser1[$us]['Size'];
					
            	}
        	?>
            </span>
        </div>
        <div style="width:15px; float:left; margin-left:10px;"><span style="color:#000000; font-size:14px;" ><?php echo $rsu[$i]['Quantity'];?></span>
        </div>
        <div style="float:left; width:65px; text-align:center; margin-left:-15px;">
        	<span style="color:#030303; font-size:14px;" id="total<?=$i?>">			            <?php 
			if($rsd[$d]['offer']!=0)
		 {                        
			$dp=$rsd[$d]['ProductPrice']*$rsd[$d]['offer']/100;
			
		 	$dp=$rsd[$d]['ProductPrice']-$dp;
			//echo(round($dp));
			$pricetotal=$rsu[$i]['Quantity']*(round($dp));
			echo $pricetotal;
		}
		else
		{
			
			$pricetotal=$rsu[$i]['Quantity']*$rsd[$d]['ProductPrice'];
        	echo $pricetotal;
		}
        		
        	?>
            </span>
        </div>
        <a href="javascript:funRemove('<?php echo $rsu[$i]['ProductId'];?>','<?php echo $i;?>','<?php echo count($rsu);?>','<?php echo $sz ?>')"><img src="images/minas1.jpg"/></a>
        <div style="clear:both"></div>
       
    </div>
    
 	<?php }
	}?>       
</div>
                                </div>
                                 <div class="image_box">
                                 <div class="cart_text1">
		<span style="font-size:16px; color:#030303">Total</span>
    </div>
	<div class="cart_text2">
		<span style="font-size:16px; color:#030303; margin-right:10px;">Rs.</span><label id="totalamount">0.00</label>
	</div>
 	<div class="clear"></div>
    <div class="h_line1"></div>
    </div>
     <div class="image_box">
   <label style="margin-left:25px;">Prices are tax Included</label>
    <div style="padding-left:25px;"><br />
    
    <a href="index.php?p=cart">    <img src="images/cart.jpg" /></a>
                                              <a href="index.php?p=cart">  <img src="images/check_out.jpg" /></a>
                                            <!--<div class="checkout_button" style="border:1px solid #a4a4a4; line-height:20px;"><a href="index.php?p=cart">Cart </a></div>
                                                    <div class="cart_button" ><a href="index.php?p=cart">Check&nbsp;Out</a></div>-->
                                                    <div class="clear"></div>
                                                    </div>
                                 </div>
                                
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