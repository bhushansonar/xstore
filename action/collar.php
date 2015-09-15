<?php
$SubcategoryId=loadVariable("SubcategoryId","");
$CollarId=loadVariable("CollarId","");

$SQL="select * from product where SubCategoryId='".$SubcategoryId."'";
$rsUser = $objDB->select($SQL);
		for($p=0;$p<count($rsUser);$p++){
			 $CategoryId = $rsUser[0]["CategoryId"];
			 if($CategoryId==1)
			{   $CategoryId="Men";}
			else
			{	$CategoryId="Female";}
			 
			}
echo "getbrand^_^";

		?>
<div class="contain">
                		<?php include("include/sidebar.php");?>
                        <div class="contain_right" ">
                        <div class="h_line1"></div>
                        <div class="heading">
                        <?php  
$SQL1="select * from subcategory where SubCategoryId =".$SubcategoryId."";
$rsUser1 = $objDB->select($SQL1);
$SQL1="select * from product_collar where CollarId =".$CollarId."";
$rsUser2 = $objDB->select($SQL1);

$sql1="select * from product where CollarId='".$CollarId."' and SubCategoryId =".$SubcategoryId."";
$rsp=$objDB->select($sql1);
echo "We found"."&nbsp&nbsp".count($rsp)."&nbsp&nbsp"."Products for"."&nbsp&nbsp".$CategoryId."&nbsp&nbsp"."Apparels"."&nbsp&nbsp".$rsUser1[0]['SubCategory'].""."&nbsp&nbsp".$rsUser2[0]['CollarName'];?>
                        </div><div class="h_line1"></div>
                         <div class="gallery_box" style="padding-bottom:5px;">
                        <div><?php 

								$sql="select * from product_brand";
								$rsbrand=$objDB->select($sql);

							?>
                            Brand:<br /><select name="brand" onChange="funGetBrand(this.value,<?php echo $SubcategoryId;?>)" style="width:85px;">  
                    <option value="">--select--</option>
                            <?php for($i=0;$i<count($rsbrand);$i++){ ?>
                        	<option value="<?php echo $rsbrand[$i]["BrandId"]; ?>"><?php echo $rsbrand[$i]["BrandName"]; ?></option>
                         <?php }
						 
						 
						 ?>        		
                   </select></div>
                   
                  <div style="margin-left:100px; margin-top:-35px;"> <?php 

								$sql="select * from product_color";
								$rscolor=$objDB->select($sql);
								

							?>
                            Color:<br /><select name="color" onChange="funGetColor(this.value,<?php echo $SubcategoryId;?>)" style="width:85px;">  					
                    <option value="">--select--</option>
                            <?php for($c=0;$c<count($rscolor);$c++){ ?>
                        	<option value="<?php echo $rscolor[$c]["ColorId"]; ?>"><?php echo $rscolor[$c]["ColorName"]; ?></option>
                         <?php }
						 ?>        		
                   </select></div>
                   
                   			<div style="margin-left:200px; margin-top:-35px;"><?php 
								$sql="select * from product_size";
								$rssize=$objDB->select($sql);
							?>
                           <div id="sz"> Size:<br /><select name="size" onChange="funGetSize(this.value,<?php echo $SubcategoryId;?>)" style="width:85px;">  					
                    <option value="">--select--</option>
                            <?php for($s=0;$s<count($rssize);$s++){ ?>
                        	<option value="<?php echo $rssize[$s]["SizeId"]; ?>"><?php echo $rssize[$s]["Size"]; ?></option>
                         <?php }
						 ?>        		
                   </select></div></div>
                   
                  <div style="margin-left:300px; margin-top:-35px;"> <?php 

								$sql="select * from product_material";
								$rsmaterial=$objDB->select($sql);
								

							?>
                            Material:<br /><select name="material" onChange="funGetMaterial(this.value,<?php echo $SubcategoryId;?>)" style="width:85px;">  					
                    <option value="">--select--</option>
                            <?php for($m=0;$m<count($rsmaterial);$m++){ ?>
                        	<option value="<?php echo $rsmaterial[$m]["MaterialId"]; ?>"><?php echo $rsmaterial[$m]["MaterialName"]; ?></option>
                         <?php }
						 ?>        		
                   </select></div>
                   
                  <div style="margin-left:400px; margin-top:-35px;"> <?php 

								$sql="select * from product_design";
								$rsdesign=$objDB->select($sql);
								

							?>
                            Design:<br /><select name="design" onChange="funGetDesign(this.value,<?php echo $SubcategoryId;?>)" style="width:85px;">  					
                    <option value="">--select--</option>
                            <?php for($d=0;$d<count($rsdesign);$d++){ ?>
                        	<option value="<?php echo $rsdesign[$d]["DesignId"]; ?>"><?php echo $rsdesign[$d]["DesignName"]; ?></option>
                         <?php }
						 ?>        		
                   </select></div>
                   
                    <div style="margin-left:500px; margin-top:-35px;"><?php 

								$sql="select * from product_collar";
								$rscollar=$objDB->select($sql);
								

							?>
                         <div id="neck">   Collar/Neck:<br /><select name="collar" onChange="funGetCollar(this.value,<?php echo $SubcategoryId;?>)" style="width:85px;">  					
                    <option value="">--select--</option>
                            <?php for($c=0;$c<count($rscollar);$c++){ ?>
                        	<option value="<?php echo $rscollar[$c]["CollarId"]; ?>"><?php echo $rscollar[$c]["CollarName"]; ?></option>
                         <?php }
						 ?>        		
                   </select></div></div></div>
                        </div>
                        <div class="contain_right"><div class="h_line1"></div>
                   		  <div class="heading"><?php
							 $SQL1="select * from subcategory where SubCategoryId =".$SubcategoryId."";
							$rsUser1 = $objDB->select($SQL1);
							echo $rsUser1[0]['SubCategory'];
							
							?></div><div class="h_line1"></div>
                                <div class="gallery_box">
                                
                           		  <div class="gallery_line">
                                  <?php 
$sql1="select * from product where CollarId='".$CollarId."' and SubcategoryId='".$SubcategoryId."'";
$rspb=$objDB->select($sql1);
for($pb=0;$pb<count($rspb);$pb++){
?>
                               		<div class="image_box2">
<div class="product1box_heading_image ToolText" align="center" onMouseOver="javascript:this.className='product1box_heading_image ToolTextHover';" onMouseOut="javascript:this.className='product1box_heading_image ToolText';">
                           		  <div class="image_part">
                                  <a href="index.php?p=productdetail&ProductId=<?php echo $rspb[$pb]['ProductId'];?>" ><img src="<?php echo $AbsoluteURLAdmin;?>images/Product_Image/<?php echo $rspb[$pb]['ProductImage'];?>"  height="150" width="140"/></a></div><div class="h_line1"></div>
                                  <span><b>Available Sizes</b><br>
						<?php                         	
							$SQL2="select * from product_qty where ProductId='".$rspb[$pb]['ProductId']."'";
							$rsUser2 = $objDB->select($SQL2);
							for($r=0;$r<count($rsUser2);$r++){
								$SQL="select * from product_size where SizeId =".$rsUser2[$r]['SizeId']."";
								$rsUser1 = $objDB->select($SQL);
								if($rsUser1[0]['Size']=="L"){
					echo "Large(L)"."<br>";}
					if($rsUser1[0]['Size']=="M"){
					echo "Medium(M)"."<br>";}
					if($rsUser1[0]['Size']=="s"){
					echo "Small(S)"."<br>";}
					if($rsUser1[0]['Size']=="XL"){
					echo "X Large(XL) "."<br>";}
					if($rsUser1[0]['Size']=="XXL"){
					echo "XX Large(XXL)"."<br>";}
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
								?>
                                &nbsp;&nbsp;
                                
							<?php
							}	
									
						?>
                        </span></div>
                                      <div class="name_text"><?php echo strtoupper($rspb[$pb]['ProductName']);?><br />
<span style="font-weight:bold;">Rs.&nbsp;<input type="hidden" id="price" name="price" value="<?php echo $rspb[$pb]['ProductPrice'];?>" /><?php echo $rspb[$pb]['ProductPrice'];?></span> </div><?php if($rspb[$pb]['offer']!=0){ 
									?>               
                                       <blink><div style="background-color:#FF0000; width:55px; margin-top:-15px;"><span style="color:#FFFFFF;"><?php echo $rspb[$pb]['offer'];?> %OFF</span></div></blink><?php } ?>
                                       <form method="post" name="MyForm<?=$pb;?>" onSubmit="xmlhttpPost('manage.php?p=cart&a=cart&ProductId=<?php echo $rspb[$pb]['ProductId'];?>', 'MyForm<?=$pb;?>', 'MyResult', '', '<?=$pb;?>','<?php if(count($rsu)>0){echo count($rsu);}else{echo "1";}?>'); return false;" >
						<div style="float:left; margin-left:40px; margin-bottom:10px; ">
							<select name="size<?=$pb;?>" id="size<?=$pb;?>" style="width:120px; text-align:center;" onChange="checksize(this.value,'<?=$pb;?>')" >
  								<option value="">Select Size</option>
								<?php 
                                    $sql="select SizeId from product_qty where ProductId='".$rspb[$pb]['ProductId']."'";
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
  						<input type="hidden" value="1" name="quantity" id="quantity" />
                        <input type="hidden" value="<?=$pb;?>" name="s" id="s" />
                       <input type="hidden" id="count" name="count" value="" />
                        <input type="hidden" value="<?php echo $rspb[$pb]['SubCategoryId'];?>" name="SubCategoryId" id="SubCategoryId" />
                        <div  style=" margin-left:95px; margin-top:5px; margin-bottom:10px; ">		                        	<input name="submit" type="image" src="images/buy_now.jpg"  width="105px" height="30px"/>
                        </div>
                        
 					</form>
                    <div style="margin-left:0px; margin-top:-40px;margin-bottom:10px;">
                    	<a href="index.php?p=productdetail&ProductId=<?php echo $rspb[$pb]['ProductId'];?>"><img src="images/detail.jpg"  width="85px" height="30px" /></a>
                    </div>
                                </div>
                                
                                <?php }?>
                                				<div class="clear"></div>
                                        </div>
                                        
                                        
                                </div>
                        </div>
                        <div class="clear"></div>
                </div>