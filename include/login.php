<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$email=loadVariable("email","");
$password=loadVariable("password","");
?>
<form action="manage.php" method="post" name="log">
<input type="hidden" name="p" id="p" value="login" />
<div class="contain">
                		<?php include("include/sidebar.php") ?>
                        <div class="contain_right">
                        <div class="h_line1"></div>
                   		  <div class="heading">Login</div>
                          <div class="h_line1"></div>
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                        		<div class="login_heading">Not yet a member? <a href="index.php?p=registration" style="color:#000000;">Click here to register a new account.</a></div><br />
                                                
              E-Mail:
              <span id="sprytextfieldemail">
              <div class="login_text_box"><input type="text"  name="email" />
              <span class="textfieldRequiredMsg" style="margin-left:120px;">* E-mail</span>
              <span class="textfieldInvalidFormatMsg" style="margin-left:120px;">Invalid E-Mail</span>              </div>
              </span>
              
             Password:
             <span id="sprypassword1">
           <div class="login_text_box"><input type="password"  name="password" />
            <span class="passwordRequiredMsg" style="margin-left:120px;">* Password</span>            </div>
            </span>
                              
                                          <div class="login_submit_button"><a href="index.php?p=passrecover" style="margin-left:120px;">I Forgot Password.</a></div>
                                                <div class="login_submit_button"><input name="button" type="image" src="images/login.jpg" alt="" style="margin-left:120px;" /></div>
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
<script type="text/javascript">
var sprytextfieldemail = new Spry.Widget.ValidationTextField("sprytextfieldemail","email",{ validateOn:["blur"]});
var sprypassword1  = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"]});
</script>  