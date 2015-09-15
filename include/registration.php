<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<form name="reg" action="manage.php" method="post">
<input type="hidden" value="registration" name="p" id="p"/>
<div class="contain">
                		<?php include("include/sidebar.php") ?>
                        <div class="contain_right">
                         <div class="h_line1"></div>
                   		  <div class="heading">Registration</div>
                           <div class="h_line1"></div>
                                <div class="gallery_box">
                                  		<div class="login_box">
       FirstName:
        <span id="spryfname">
       <div class="login_text_box"><input type="text" name="firstname" />
       <span class="textfieldRequiredMsg" style="margin-left:120px;" >* First Name</span>       
       </div>
       </span>
        LastName:
        <span id="sprylname">
        <div class="login_text_box">
        <input type="text" name="lastname"/>
        <span class="textfieldRequiredMsg" style="margin-left:120px;">* Last Name</span>      
        </div>
        </span>
        E-Mail:
        <span id="sprytextfieldemail">
        <div class="login_text_box"><input type="text" name="email" />
        <span class="textfieldRequiredMsg" style="margin-left:120px;">* E-mail</span>
                <span class="textfieldInvalidFormatMsg" style="margin-left:120px;">Invalid E-Mail</span>  
        </div>
        </span>
        Password:
        <span id="sprypassword1">
        <div class="login_text_box"><input type="password"  name="password"/>
        <span class="passwordRequiredMsg" style="margin-left:120px;">* Password</span>
<span class="passwordMinCharsMsg" style="margin-left:120px;">Minimun 7 Character Required</span> 

        </div>
        </span>
       Verify Password:
       <span id="spryconformpassword">
       <div class="login_text_box"><input type="password" name="password2"/>
       <span class="confirmRequiredMsg" style="margin-left:120px;"> * Required</span>
	<span class="confirmInvalidMsg" style="margin-left:120px;">Passwords Don't Match</span> 
       </div>
        </span>                                        
                                                <div class="login_submit_button"><input name="button" type="image" src="images/submit.jpg" alt="" style="margin-left:120px;"  /></div>
                                        </div>      
                                        
                                </div>
                        </div>
                        <div class="clear"></div>
                </div>
                </form>
                
                <script type="text/javascript">
var spryfname = new Spry.Widget.ValidationTextField("spryfname","none",{ validateOn:["change"]});
var sprylname = new Spry.Widget.ValidationTextField("sprylname","none",{ validateOn:["change"]});

var sprytextfieldemail = new Spry.Widget.ValidationTextField("sprytextfieldemail","email",{ validateOn:["blur"]});
var sprypassword1  = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:7,validateOn:["blur"]});
 
var conformpassword = new Spry.Widget.ValidationConfirm("spryconformpassword", "sprypassword1", {validateOn: ['blur']});


</script>
