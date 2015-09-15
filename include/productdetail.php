<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/magiczoomplus.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/jquery.idTabs.modified.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/ajaxsubmit.js">
</script>
<?php
$productid=$_REQUEST['ProductId'];
?>
<div class="contain">
                		<?php include("include/sidebar.php") ?>
                        
                        <div class="contain_right">
                        <?php 
											$sql1="select * from product where ProductId =".$productid."";
											
											
				$rsd = $objDB->select($sql1);							
		for($d=0;$d<count($rsd);$d++){
		
											?>
                                             <div class="h_line1"></div>
                   		  <div class="heading"><?php echo strtoupper($rsd[$d]["ProductName"]);?></div> <div class="h_line1"></div>
                                <div class="gallery_box">
                           		  		<div class="product_image"><a href="<?php echo $AbsoluteURLAdmin;?>images/Product_Image/resize/<?php echo $rsd[$d]['ProductImage'];?>" class="MagicZoomPlus" id="zoomImg" rel="zoom-position:right; zoom-distance:1; " ><img src="<?php echo $AbsoluteURLAdmin;?>images/Product_Image/<?php echo $rsd[$d]['ProductImage'];?>"  height="325" width="325" /></a></div>
                                        <div class="product_text_part">
                                   		  <div style="font-size:26px;"><?php echo strtoupper($rsd[$d]["ProductName"]);?></div>
                                                <div class="product_text">
Price :&nbsp;Rs.&nbsp;<?php echo $rsd[$d]['ProductPrice'];?> <br />
Availability: In stock
</div>
 <div class="clear" style="margin-bottom:10px;"></div>
 <?php if($rsd[$d]['offer']!=0){?>                                                        
                                          <blink> <div style="background-color:#FF0000; width:53px; margin-left:0px;"><span style="color:#FFFFFF;"><?php echo $rsd[$d]['offer'];?> %OFF</span></div></blink><?php } ?> <br>
										<div style="float:left;">QTY :</div>
                                        <form method="post" name="MyForm<?=$d;?>" onSubmit="xmlhttpPost('manage.php?p=cart&a=cart&ProductId=<?php echo $rsd[$d]['ProductId'];?>', 'MyForm<?=$d;?>', 'MyResult', '', '<?=$d;?>','<?php if(count($rsu)>0){echo count($rsu);}else{echo "1";}?>'); return false;" style="width:180px; height:100px;">

<input type="text" value="1" name="quantity" id="quantity" size="10" /><br /><br />

						<div style="font-size:16px; color:#030303; float:left; margin-left:0px; margin-bottom:10px; ">Size:&nbsp; 
                        
							<select name="size<?=$d;?>" id="size<?=$d;?>" style="width:150px; height:30px; text-align:center;" onChange="checksize(this.value,'<?=$d;?>')">
  								<option value=""> - Select Size - </option>
								<?php 
                                    $sql="select SizeId from product_qty where ProductId='".$rsd[$d]['ProductId']."'";
                                    $rsize = $objDB->select($sql);
                                    for($s=0;$s<count($rsize);$s++){	
                                    $SQL="select * from product_size where SizeId =".$rsize[$s]['SizeId']."";
                                    $rsUser1 = $objDB->select($SQL);
                                    for($us=0;$us<count($rsUser1);$us++){
                                ?>
								<option value="<?php echo $rsize[$s]['SizeId'];?>"><?php echo $rsUser1[$us]['Size']; ?></option>
<?php } }?>
							</select>
 						</div>
  						
                        <input type="hidden" value="<?=$d;?>" name="s" id="s" />
                       <input type="hidden" id="count" name="count" value="" />
                        <input type="hidden" value="<?php echo $rsd[$d]['SubCategoryId'];?>" name="SubCategoryId" id="SubCategoryId" /><br /><br />
                        	                        	<input name="submit" type="image" src="images/buy_now.jpg"  width="130px" height="30px"/>
                       
 					</form>&nbsp;&nbsp;&nbsp;<br />
<?php if(isset($_SESSION["userid"])!=""){?>  <div  ><a href="index.php?p=productdetail&a=wishlist&ProductId=<?php echo $productid; ?>"><input name="submit" type="image" src="images/wishlist.png"  width="190px" height="30px"/></a></div><?php } ?>
                                        
                                  </div>	
                                        <div class="clear"></div>
                                       <div id="slides" class="zoom-gallery" style="margin-left:15px;">
                    <ul class="tabbed-images">
                      <li> <a href="images/product/111027_blk_polo_01_1.jpg" rel="zoom-id:zoomImg" rev="images/product/1.jpg"><div class="product_image" style="height:auto; width:auto;"><img src="images/product/1_1.jpg" style="padding-left:0px; " /></div></a><a href="images/product/111027_blk_polo_02_1.jpg" rel="zoom-id:zoomImg" rev="images/product/2.jpg"><div class="product_image" style="height:auto; width:auto;"><img src="images/product/2_2.jpg" /></div></a> </li>
                      <li></li>
                      <li> <a href="images/product/111027_blk_polo_03_1.jpg" rel="zoom-id:zoomImg" rev="images/product/3.jpg"><div class="product_image" style="height:auto; width:auto;"><img src="images/product/3_3.jpg" /></div></a> </li>
                    </ul>
                  </div>
                                        <div id="more_info_block" class="clear">
	<ul id="more_info_tabs" class="idTabs idTabsShort">
		<li><a id="more_info_tab_more_info" href="#idTab1">More info</a></li>		
        <li><a id="more_info_tab_data_sheet" href="#idTab2">Data sheet</a></li>						
	</ul>
	<div id="more_info_sheets" class="sheets align_justify">
			<!-- full description -->
		<div id="idTab1"><p>Etiam leo felis, porttitor a ultricies nec, iaculis ac quam. Aliquam in lectus et nibh laoreet congue. Curabitur eget est orci. Ut nisl lacus, elementum et congue eu, luctus a quam. Vestibulum et quam vitae turpis dignissim dictum. Cras rhoncus libero ut turpis pretium tincidunt. Vestibulum at imperdiet quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p></div>
				<!-- product's features -->
		<ul id="idTab2" class="bullet">
        <li><span>Brand:</span> <?php
							 $SQL="select * from product_brand where BrandId =".$rsd[$d]['BrandId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['BrandName'];
							
							?> </li>
                            <div class="h_line" style="margin-top:3px; margin-left:-10px;"></div>
					<li><span>Material:</span> <?php
							 $SQL="select * from product_material where MaterialId =".$rsd[$d]['MaterialId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['MaterialName'];
							
							?></li>
                            <div class="h_line" style="margin-top:3px; margin-left:-10px;"></div>
					<li><span>Design:</span> <?php
							 $SQL="select * from product_design where DesignId =".$rsd[$d]['DesignId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['DesignName'];
							
							?></li>
                            <div class="h_line" style="margin-top:3px; margin-left:-10px;"></div>
					<li><span>Collar/Neck:</span> <?php
							 $SQL="select * from product_collar where CollarId =".$rsd[$d]['CollarId']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['CollarName'];
							
							?></li>
                            <div class="h_line" style="margin-top:3px; margin-left:-10px;"></div>
					<li><span>Available Sizes:</span> <?php                         	
							$SQL2="select * from product_qty where ProductId='".$rsd[$d]['ProductId']."'";
							$rsUser2 = $objDB->select($SQL2);
							for($r=0;$r<count($rsUser2);$r++){
								$SQL="select * from product_size where SizeId =".$rsUser2[$r]['SizeId']."";
								$rsUser1 = $objDB->select($SQL);
								if($rsUser1[0]['Size']=="L"){
					echo "(Large) L";}
					if($rsUser1[0]['Size']=="M"){
					echo "(Medium) M";}
					if($rsUser1[0]['Size']=="s"){
					echo "(Small) S";}
					if($rsUser1[0]['Size']=="XL"){
					echo "(X Large) XL ";}
					if($rsUser1[0]['Size']=="XXL"){
					echo "(XX Large) XXL";}
					if($rsUser1[0]['Size']=="FreeSize"){
						echo "FreeSize"."<br>";}
						if($rsUser1[0]['Size']=="28"){
						echo "28"."<br>";}
					if($rsUser1[0]['Size']=="30"){
						echo "30"."<br>";}
					if($rsUser1[0]['Size']=="32"){
						echo "32"."<br>";}
					if($rsUser1[0]['Size']=="34"){
						echo "34"."<br>";}
					if($rsUser1[0]['Size']=="36"){
						echo "36"."<br>";}
					if($rsUser1[0]['Size']=="38"){
						echo "38"."<br>";}
								?>&nbsp;&nbsp;
                                
							<?php }	
									
						?></li>
                        <div class="h_line" style="margin-top:3px; margin-left:-10px;"></div>
					 
                          
                            
                           
				</ul>
				
	</div>
</div>
                                        
                                </div>
                        </div>
                        <div class="clear"></div>
                    </div><?php } ?>