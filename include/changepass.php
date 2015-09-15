<?php
if(isset($_SESSION["email"])=="")
	{
		Header("Location: index.php");
	}
	else{
?>
<form action="manage.php" name="pinfo" method="post">
<input type="hidden" value="changepass" name="p" id="p">
<div class="contain">
                		<?php include("include/accountsidebar.php") ?>
                        <div class="contain_right">
                        <div class="h_line1"></div>
                   		  <div class="heading">Change Password:<font color="#00CC00" size="+1" style="padding-left:40px;">   
	 <?php 
      if(isset($_SESSION["cpass"])!="")
	  {
	   echo $_SESSION["cpass"];
	   unset($_SESSION["cpass"]);
 	}
   ?></font>
   <font color="#FF0000" size="+1" style="padding-left:10px;">
   <?php 
      if(isset($_SESSION["old"])!="")
	  {
	   echo $_SESSION["old"];
	   unset($_SESSION["old"]);
 	}
   ?>  
   
   <?php 
      if(isset($_SESSION["new"])!="")
	  {
	   echo $_SESSION["new"];
	   unset($_SESSION["new"]);
 	}
   ?></font></div>
  
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                        	
                                                
 
 E-mail:<font size="3" style="color:#990066; margin-left:10px;"><label><?php echo $_SESSION["email"];?></label></font><br><br>
 
 Old Password:
 <span id="spryoldpass">
 <div class="login_text_box"><input type="password" name="oldpass" size="23"  style="margin-left:150px;"/>
 <span class="passwordRequiredMsg" style="margin-left:150px;">* Password</span>
<span class="passwordMinCharsMsg" style="margin-left:150px;">Minimun 7 Char</span>
 </div></span>
 New Password:
 <span id="sprynewpass">
 <div class="login_text_box"><input type="password" name="newpass" size="23"  style="margin-left:150px;"/>
 <span class="passwordRequiredMsg" style="margin-left:150px;">* Password</span>
<span class="passwordMinCharsMsg" style="margin-left:150px;">Minimun 7 Char  </span> 
 </div></span>
 Retype New Password:
 <span id="spryconformpassword">
 <div class="login_text_box"><input type="password" name="rnewpass" size="23" style="margin-left:150px;"/>
 <span class="confirmRequiredMsg" style="margin-left:150px;">* Required</span>
	<span class="confirmInvalidMsg" style="margin-left:150px;">Don't Match</span>
 </div></span>
                                                
                                                <div class="login_submit_button"><input name="button" type="image" src="images/save_changes.jpg" alt=""  style="margin-left:150px;" /></div>
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


var spryoldpass  = new Spry.Widget.ValidationPassword("spryoldpass", {minChars:7,validateOn:["blur"]});

var sprynewpass  = new Spry.Widget.ValidationPassword("sprynewpass", {minChars:7,validateOn:["blur"]});
 
var conformpassword = new Spry.Widget.ValidationConfirm("spryconformpassword", "sprynewpass", {validateOn: ['blur']});

</script>  