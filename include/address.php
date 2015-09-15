<?php
if(isset($_SESSION["email"])=="")
	{
		Header("Location: index.php");
	}
	else{
?>
<?php 

error_reporting(0);

$email=loadvariable("email","");
$sql="select * from user where email='".$_SESSION["email"]."'";
$rsuser=$objDB->select($sql);

for($i=0;$i<count($rsuser);$i++)
{
	$firstname=$rsuser[$i]['firstname'];
	$address=$rsuser[$i]['address'];
	$country=$rsuser[$i]['country'];
	$state=$rsuser[$i]['state'];
	$city=$rsuser[$i]['city'];
	$pincode=$rsuser[$i]['pincode'];
	
	
	
}
		
?>
<form action="manage.php" name="pinfo">
<input type="hidden" value="address" name="p" id="p">
<div class="contain">
                		<?php include("include/accountsidebar.php") ?>
                        <div class="contain_right">
                         <div class="h_line1"></div>
                   		  <div class="heading">Address Information</div>
                           <div class="h_line1"></div>
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                                
       Name:
       <span id="spryfname">
       <div class="login_text_box"><input type="text" name="name" size="23" value="<?php echo $firstname;?>"/> 
       <span class="textfieldRequiredMsg" style="margin-left:120px;">* FirstName</span>
       </div></span>
       
     Address:
     <span id="sprytextarea1">
     <div class="login_text_box"><textarea name="address" style="margin-left:120px; width:248px; height:56px; margin-top:-20px;"><?php echo $address;?></textarea>
     <span class="textareaRequiredMsg">* Address</span><span class="textareaMaxCharsMsg" style="margin-left:120px;">Exceeded maximum number of characters.</span>
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
                       <span class="selectRequiredMsg" style="margin-left:120px;">* State</span>
                       </div></span>
                       
    City:
    <span id="sprycity">
    <div class="login_text_box"><input type="text" name="city" size="23" value="<?php echo $city;?>" /> 
    <span class="textfieldRequiredMsg" style="margin-left:120px;">* City</span>   
    </div></span>
                                               
   PinCode:
   <span id="sprytextfield1">
   <div class="login_text_box"><input type="text" name="pincode" size="23" value="<?php echo $pincode;?>"/>
   <span class="textfieldRequiredMsg" style="margin-left:120px;">* Pincode</span><span class="textfieldInvalidFormatMsg">Invalid format.</span>
    </div></span>
                                                
                                                <div class="login_submit_button"><input name="button" type="image" src="images/save_changes.jpg" alt=""  style="margin-left:120px;" /></div>
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
</form>
<?php } ?>
<script type="text/javascript">
var spryfname = new Spry.Widget.ValidationTextField("spryfname","none",{ validateOn:["change"]});
 
 
 
 var sprycountry = new Spry.Widget.ValidationSelect("sprycountry", {validateOn:["change"]});
 
 var sprystate = new Spry.Widget.ValidationTextField("sprystate","none",{ validateOn:["change"]});
 
 var sprycity = new Spry.Widget.ValidationTextField("sprycity","none",{ validateOn:["change"]});


var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {maxChars:100, validateOn:["blur"], counterId:"countsprytextarea1", counterType:"chars_remaining"});

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "zip_code", {format:"zip_custom", pattern:"000000", validateOn:["blur"]});
</script>   