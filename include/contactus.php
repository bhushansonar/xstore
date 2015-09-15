<form name="contactform" method="post" action="manage.php">
<input type="hidden" value="send_form_email" name="p" id="p"/>
<div class="contain">
                		<?php include("include/sidebar.php") ?>
                        <div class="contain_right">
                   		  <div class="heading">Contact Us</div>
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                        		
                                                
                                                FirstName:<div class="login_text_box"><input  type="text" name="first_name" maxlength="50" size="30" /></div>
                                                LastName:<div class="login_text_box"><input  type="text" name="last_name" maxlength="50" size="30" /></div>
                                                E-Mail:<div class="login_text_box"><input  type="text" name="email" maxlength="80" size="30" /></div>
                                                Subject*:<div class="login_text_box"><input  type="text" name="subject" maxlength="50" size="30" /></div>
                                                Comments:<div class="login_text_box"><textarea  name="comments" maxlength="1000" cols="25" rows="6" style="margin-left:120px;"></textarea></div>
                                                
                                                
                                                <div class="login_submit_button"><input name="button" type="image" src="images/submit.jpg" alt=""  style="margin-left:120px;"/></div>
                                        </div>      
                                        
                                </div>
                        </div>
                        <div class="clear"></div>
                </div>
                </form>