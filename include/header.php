<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/ajax.js"></script> 
<div class="header">
                		<div class="logo"><a href="index.php"><img src="images/logo.png" alt="" /></a></div>
      <div class="header_right_box">
                        <div>
                        <div class="header_search_box_left"><img src="images/header_right_bg_left.png" alt="" /></div>
                        		
<div class="header_search_box">
                                		<div class="search_box">
                                        			<div class="search_text_box">
                                                    	<input type="text" id="ser" name="ser"/>
                                                    </div>
                                                    <div class="search_icon_box"><input name="image" type="image" src="images/search_icon.png"  onclick="funGetResult()" alt=""/></div>
                                                    
                                                    <div class="clear"></div>
                                        </div>
                                        <div class="search_nevi" ><a href="index.php?p=cart" style="margin-left:25px;" >My Cart</a>      |<?php 
	if(isset($_SESSION["username"])==""){
?>   <a href="index.php?p=login">Log In</a><?php } 
			elseif(isset($_SESSION["username"])!=""){?>
            <font style="font-size:15px; font-style:oblique; margin-left:5px;"><?
			echo $_SESSION["username"];
			?></font><a href="index.php?p=logout" style=" font-size:15px; margin-left:0px;">,Logout</a>     
<?php }?></div>
                                </div>
                                
                          <div class="clear"></div>
                        </div>
                        
                       
                        </div>
                        <div class="clear"></div>
                        
                </div>
                
                <div class="nevi_box">
                		<div class="nevi_left"><img src="images/nevi_left.png" alt="" /></div>
                  <div class="nevi_right"><img src="images/nevi_right.png" alt="" /></div>
                  <div class="nevi"><a href="index.php" style="padding-left:10px;">HOME</a>          <a href="index.php?p=gents" style="padding-left:20px;">MENS WEAR</a>          <a href="index.php?p=ladies" style="padding-left:30px;">LADEIS WEAR</a>          <a href="index.php?p=newproduct" style="padding-left:24px;">NEW PRODUCT</a>              <a href="index.php?p=contactus" style="padding-left:30px;">CONTACT US</a></div>
                        <div class="nevi_right_box">
                        		<div class="nevi_right_image"><img src="images/account_icon.png" name="Image25" width="23" height="50" border="0" id="Image25" /></div>
                          <div class="nevi_right_text"><a href="index.php?p=myaccount">My Account</a></div>
                          <div class="nevi_right_image"><img src="images/cart_icon.png" name="Image26" width="28" height="50" border="0" id="Image26" /></div>
                         
                          <div class="nevi_right_text"><a href="#">My Cart : (<?php 
			if(isset($_SESSION["userid"])!=""){
				$uid=$_SESSION["userid"];}
			else{
				$uid=$_COOKIE['PHPSESSID'];}
	
			$sql1="select * from shoppingcart where UserId ='".$uid."'";
			
			$rsu = $objDB->select($sql1);
			
			if(empty($rsu)){
				echo $Totalpro = "0";}
			else{
				echo $Totalpro = count($rsu)."";}
		?>)</a></div>
                          
                                <div class="clear"></div>
                  </div>
                        <div class="clear"></div>
                </div>
                