<div id="contain">
<div class="contain_left">
                   		  
                                <div class="h_line1"></div>
                                <div class="heading">Specials</div>
                                <div class="h_line1"></div>
                                <div class="image_box">
                           		  <div class="image_part"><a href="index.php?p=product&SubCategoryId=19"><img src="images/product3.jpg" alt="" height="110px" width="110px"/></div>
                                  <div class="name_text">WoMen T-Shirts</a><br />
<span style="font-weight:bold;">Rs.1299</span> </div>
                                </div>
                                <div class="image_box" style="border-top:none; padding-bottom:1px;">
                           		  <div class="image_part"><a href="index.php?p=product&SubCategoryId=11"><img src="images/product4.jpg" alt="" height="110px" width="110px" /></div>
                                  <div class="name_text">WoMen Jackets</a><br />
<span style="font-weight:bold;">Rs.2199</span> </div>
                          </div>
                        </div>
<input type="hidden" name="userid" id="userid" value="
<?php
if(isset($_SESSION["userid"])!="")
	{
		echo $uid=$_SESSION["userid"];
	}
	else
	{
		echo $uid=$_COOKIE['PHPSESSID'];
	}
?>" />
<?php 
if($_REQUEST["a"]=="newuser"){
?>

<form name="reg" action="manage.php" method="post">
<input type="hidden" name="p" id="p" value="checkout" />
<input type="hidden" name="a" id="a" value="newuser" />
<div class="contain">
                		
                        <div class="contain_right">
                        <div class="h_line1"></div>
                   		  <div class="heading">New Member Registration</div>
                          <div class="h_line1"></div>
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                        		
  E-Mail:<span id="sprytextfield3">
  <div class="login_text_box"><input type="text" name="email2" />
  <span class="textfieldRequiredMsg" style="margin-left:120px;">* E-Mail</span><span class="textfieldInvalidFormatMsg" style="margin-left:120px;">Invalid format.</span>
  </div></span>
   Password:
   <span id="sprypassword1">
   <div class="login_text_box"><input type="password"  name="password"/>
   <span class="passwordRequiredMsg" style="margin-left:120px;">* Password</span>
<span class="passwordMinCharsMsg" style="margin-left:120px;">Minimun 7 Character</span> 
   </div></span>
   
    Verify Password:
     <span id="spryconformpassword">
    <div class="login_text_box"><input type="password" name="rpassword"/>
    <span class="confirmRequiredMsg" style="margin-left:120px;">* Required</span>
	<span class="confirmInvalidMsg" style="margin-left:120px;">Passwords Don't Match</span>
    </div></span>
    
    FirstName:
    <span id="spryfname">
    <div class="login_text_box"><input type="text" name="firstname" />
    <span class="textfieldRequiredMsg" style="margin-left:120px;">* FirstName</span>
    </div></span>
    
    LastName:
    <span id="sprylname">
    <div class="login_text_box"><input type="text" name="lastname"/>
    <span class="textfieldRequiredMsg" style="margin-left:120px;">* LastName</span> 
    </div></span>
                                                
     <span id="RadioGender"> 
     <span style="margin-left:0px;;">Gender:
     
     </span><input name="gender" type="radio" value="Male" <?php if($gender=="Male"){	?> checked="checked"<?php }?> style="margin-left:70px;"/>Male
<input name="gender" type="radio" value="Female" <?php if($gender=="Female"){								            ?> checked="checked"<?php }?>/>Female
<span class="radioRequiredMsg" >* Gender </span>  </span>
<br><br />                                                
  
   Birth-Date:
   <span id="sprydate">             
	<select name='date' style="margin-left:50px;">
     <option value="">Date</option>
	<?php for ( $date=1; $date <=31; $date++){?>
		<option value="<?php echo $date?>" <?php if($date == $bdate[2]){?> selected <?php }?>>		<?php echo $date?></option>
	 <?php }?>
    </select>
    <span class="selectRequiredMsg">* Date</span></span>
    
    <span id="sprymonth"> 
    <select name='month'>
     <option value="">Month</option>
     <option value="01" <?php if($bdate[1]=="01"){?> selected <?php }?>>Jan</option>
     <option value="02" <?php if($bdate[1]=="02"){?> selected <?php }?>>Feb</option>
     <option value="03" <?php if($bdate[1]=="03"){?> selected <?php }?>>Mar</option>
     <option value="04" <?php if($bdate[1]=="04"){?> selected <?php }?>>Apr</option>
     <option value="05" <?php if($bdate[1]=="05"){?> selected <?php }?>>May</option>
     <option value="06" <?php if($bdate[1]=="06"){?> selected <?php }?>>Jun</option>
     <option value="07" <?php if($bdate[1]=="07"){?> selected <?php }?>>July</option>
     <option value="08" <?php if($bdate[1]=="08"){?> selected <?php }?>>Aug</option>
     <option value="09" <?php if($bdate[1]=="09"){?> selected <?php }?>>Sept</option>
     <option value="10" <?php if($bdate[1]=="10"){?> selected <?php }?>>Oct</option>
     <option value="11" <?php if($bdate[1]=="11"){?> selected <?php }?>>Nov</option>
     <option value="12" <?php if($bdate[1]=="12"){?> selected <?php }?>>Dec</option>
    </select>
    <span class="selectRequiredMsg">* Month</span></span>
    
    <span id="spryyear"> 
    <select name='year'>
     <option value="">Year</option>
    	<?php for ( $year=1950; $year <=2012; $year++) {?>
		<option value="<?php echo $year ?>" <?php if($year == $bdate[0]) { ?> selected <?php } ?>><?php echo $year ?></option>
		<?php } ?>
		</select>
        <span class="selectRequiredMsg">* Year</span></span> 
            <br><br>
    Mobile Number:
    <span id="sprymobile">
    <div class="login_text_box"><input type="text" name="mobile" size="23" value="<?php echo $mobile;?>"/>
    <span class="textfieldRequiredMsg" style="margin-left:120px;">* Mobile</span>
                          <span class="textfieldInvalidFormatMsg">invalid Mobile No.</span>
    </div></span>
    
    Address:
     <span id="sprytextarea1">
    <div class="login_text_box"><textarea name="address" style="margin-left:120px; margin-top:-20px; width:248px; height:56px;"><?php echo $address;?></textarea>
    <span class="textareaRequiredMsg" style="margin-left:120px;">* Address</span><span class="textareaMaxCharsMsg" style="margin-left:120px;">Exceeded maximum number of characters.</span>
    </div></span>
                                               
    
    Country:
    <span id="sprystate">
    <div class="login_text_box"><input type="text" name="country" size="23" value="India" disabled="disabled"/> 
  <input type="hidden" name="country" id="country" size="23" value="India"/>
  <span class="textfieldRequiredMsg" style="margin-left:120px;">* Country</span>
  </div></span>
   
   State:
   <span id="sprycountry">
   <div class="login_text_box"><?php 
$sql="select * from state";
$rsstate=$objDB->select($sql);
?>     
<select name="state" id="state" style="width:170px; margin-left:120px; margin-top:-20px;">
<option value="">--Select--</option>
 <?php for($i=0;$i<count($rsstate);$i++){ ?>
<option value="<?php echo $rsstate[$i]["StateName"]; ?>"<?php if($state==$rsstate[$i]["StateName"]){?> selected="selected" <?php }?>><?php echo $rsstate[$i]["StateName"]; ?></option>
<?php }
 ?>
 </select>
 <span class="selectRequiredMsg" style="margin-left:120px; margin-top:20px;">* State</span>
 </div></span>
 
 City:
 <span id="sprycity">
 <div class="login_text_box"><input type="text" name="city" size="23" value="<?php echo $city;?>" />
 <span class="textfieldRequiredMsg" style="margin-left:120px;">* City</span>
  </div></span>
                                               
 
  PinCode:
   <span id="sprytextfield1">
  <div class="login_text_box"><input type="text" name="pincode" size="23" value="<?php echo $pincode;?>"/>
  <span class="textfieldRequiredMsg" style="margin-left:120px;">* Pincode</span><span class="textfieldInvalidFormatMsg" style="margin-left:120px;">Invalid format.</span> 
  </div></span>
                                                
                                                <div class="login_submit_button"><input name="button" type="image" src="images/submit.jpg" alt=""  style="margin-left:120px;"/></div>
                                        </div>  
                                            
                                        
                                </div>
                        </div>
                        <div class="clear"></div>
                </div>
                <script type="text/javascript">


var sprypassword1  = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:7,validateOn:["blur"]});
 
var conformpassword = new Spry.Widget.ValidationConfirm("spryconformpassword", "sprypassword1", {validateOn: ['blur']});

var radiogender  = new Spry.Widget.ValidationRadio("RadioGender",{validateOn:["blur", "change"]});

var spryfname = new Spry.Widget.ValidationTextField("spryfname","none",{ validateOn:["change"]});

var sprylname = new Spry.Widget.ValidationTextField("sprylname","none",{ validateOn:["change"]});

var spraymobile = new Spry.Widget.ValidationTextField("sprymobile", "phone_number", {format:"phone_custom", pattern:"0000000000", validateOn:["blur"]});

var sprydate = new Spry.Widget.ValidationSelect("sprydate", {validateOn:["change"]});

var sprymonth = new Spry.Widget.ValidationSelect("sprymonth", {validateOn:["change"]});

var spryyear = new Spry.Widget.ValidationSelect("spryyear", {validateOn:["change"]});

var sprycountry = new Spry.Widget.ValidationSelect("sprycountry", {validateOn:["change"]});
 
 var sprystate = new Spry.Widget.ValidationTextField("sprystate","none",{ validateOn:["change"]});
 
 var sprycity = new Spry.Widget.ValidationTextField("sprycity","none",{ validateOn:["change"]});


var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {maxChars:100, validateOn:["blur"], counterId:"countsprytextarea1", counterType:"chars_remaining"});

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "zip_code", {format:"zip_custom", pattern:"000000", validateOn:["blur"]});
 
</script>
                </form>
               <?php } else{
if(isset($_SESSION["userid"])!="")
header("location:index.php?p=SetExpressCheckout");

?>
<form action="manage.php?p=checkout1" method="post" name="checkout">
<input type="hidden" name="p" id="p" value="checkout1" />

<div class="contain">
                		
                        <div class="contain_right">
                        <div class="h_line1"></div>
                   		  <div class="heading">Login</div>
                          <div class="h_line1"></div>
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                        		<div class="login_heading">Not yet a member? <a href="index.php?p=checkout&a=newuser" style="color:#000000;"> Click here to register a new account.</a></div>
                                                <div class="login_heading2">Login Here</div>
                                               E-Mail:
      <span id="sprytextfieldemail">
      <div class="login_text_box"><input type="text"  name="email" />
      <span class="textfieldRequiredMsg" style="margin-left:120px;">* E-mail.</span>
  <span class="textfieldInvalidFormatMsg" style="margin-left:120px;">Invalid E-Mail</span>
      </div></span>
                                               <!--<span style="margin-left:120px; margin-top:-30px;">Your Order Detail Will Be Sent To This E-mail Address</span><br>--><br />
   Password:
   <span id="sprytextfield2">
   <div class="login_text_box"><input type="password"  name="password2" />
   <span class="textfieldRequiredMsg" style="margin-left:120px;" >* Password</span>
   </div></span>
                                                <div class="login_submit_button"><a href="index.php?p=passrecover" style="margin-left:120px;">I Forgot Password.</a></div>
                                                <div class="login_submit_button"><input name="button" type="image" src="images/login.jpg" alt=""  style="margin-left:120px;" /></div>
                                        </div>      
                                         <font size="2" color="#800000";> <?php 
	if(isset($_SESSION["nologin"])!="")
	{
		echo $_SESSION["nologin"];
		unset($_SESSION["nologin"]);
		unset($_SESSION["email"]);
		unset($_SESSION["password3"]);
		
	}
?></font>
                                </div>
                        </div>
                        <div class="clear"></div>
                </div>
</form><?php } ?></div>

<script type="text/javascript">
var sprytextfieldemail = new Spry.Widget.ValidationTextField("sprytextfieldemail","email",{ validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur"]});

</script> 