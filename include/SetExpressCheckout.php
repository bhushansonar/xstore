<?php
if(isset($_SESSION["email"])=="")
	{
		Header("Location: index.php");
	}
	else{

/***********************************************************
SetExpressCheckout.php

This is the main web page for the Express Checkout sample.
The page allows the user to enter amount and currency type.
It also accept input variable paymentType which becomes the
value of the PAYMENTACTION parameter.

When the user clicks the Submit button, ReviewOrder.php is
called.

Called by index.html.

Calls ReviewOrder.php.

***********************************************************/
// clearing the session before starting new API Call
//session_unset();

	$paymentType = 'Sale';
?>

<?php
if(isset($_SESSION["userid"])!="")
	{
		$uid=$_SESSION["userid"];
	}
if(isset($_SESSION["email"])!="")
	{
		$email=$_SESSION["email"];
	}
?>
<?php 
	$sql="select * from shoppingcart where UserId='".$uid."'";
	$rchk = $objDB->select($sql);
	?>
<html>
<head>
<script type="text/javascript" language="JavaScript">


function FillFields(box) 
{	
document.ME.PERSONNAME.value  = document.ME.name.value;
document.ME.SHIPTOSTREET.value  = document.ME.address.value;
document.ME.SHIPTOCITY.value  = document.ME.city.value;
document.ME.SHIPTOSTATE.value = document.ME.state.value;
document.ME.SHIPTOCOUNTRYCODE.value  = document.ME.country.value;
document.ME.SHIPTOZIP.value  = document.ME.zip.value;
if(box.checked == false)
	 { 
	document.ME.PERSONNAME.value  = '';
	document.ME.SHIPTOSTREET.value  = '';
	document.ME.SHIPTOCITY.value  = '';
	document.ME.SHIPTOSTATE.value = '';
	document.ME.SHIPTOCOUNTRYCODE.value  = '';
	document.ME.SHIPTOZIP.value  = '';
 	}	
	return;
	
}

function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
    <title>PayPal NVP SDK - Simplified Shopping Cart Page for a Spiritual Store</title>
    <link href="sdk.css" rel="stylesheet" type="text/css" />
</head>
   
    
 
 
	<form action="index.php?p=ReviewOrder" method="POST" name="ME" onSubmit="MM_validateForm('email','','R','name','','R','address','','R','city','','R','state','','R','country','','R','zip','','R','PERSONNAME','','R','SHIPTOSTREET','','R','SHIPTOCITY','','R','SHIPTOSTATE','','R','SHIPTOCOUNTRYCODE','','R','SHIPTOZIP','','R');return document.MM_returnValue">
	<input type=hidden name=paymentType value='<?php echo $paymentType?>' >
    

    <?php for($c=0;$c<count($rchk);$c++){
	
		 $pid=$rchk[$c]['ProductId'];
		$sql1="select * from product where ProductId='".$pid."'";
		
		$rspro = $objDB->select($sql1);
		
		for($p=0;$p<count($rspro);$p++){
		
		
		?>
       
        <input type="hidden" size="30" maxlength="32" name="count" value="<?php echo count($rchk);?>" />
					
						<input type="hidden" size="30" maxlength="32" name="L_NAME<?=$c;?>" value="<?php echo $pname=$rspro[$p]['ProductName'];?>" />


				
					<input type="hidden" name="L_AMT<?=$c;?>" size="5" maxlength="32" value="<?php if($rspro[$p]['offer']!=0){$dp=$rspro[$p]['ProductPrice']*$rspro[$p]['offer']/100;$dp=$rspro[$p]['ProductPrice']-$dp;echo(round($dp/51));}else{echo(round($rspro[$p]['ProductPrice']/51));}?>" /> 
                    
                    <input type="hidden" name="L_ITEM<?=$c;?>" size="5" maxlength="32" value="<?php echo $proid=$rspro[$p]['ProductId']; ?>" /> 

					 <input type="hidden" size="3" maxlength="32" name="L_QTY<?=$c;?>" value="<?php echo $qty=$rchk[$c]['Quantity']; ?>" />
                     
                     <input type="hidden" size="3" maxlength="32" name="L_SZ<?=$c;?>" value="<?php $SQL="select * from product_size where SizeId =".$rchk[$c]['Size']."";
								$rsUser1 = $objDB->select($SQL);
								echo $rsUser1[0]['Size'];?>" /> 

			
      <?php       }}
		
	?>
    <div class="contain" style="margin-left:-500px;;">
    <div class="contain_right" style="width:450px;">
    <?php 
		$sql2="select * from user where email='".$email."' and UserId='".$uid."'";
		$user = $objDB->select($sql2);
		for($r=0;$r<count($user);$r++){
		
		?>	 <div class="h_line1"></div>
                   		  <div class="heading">Billing Address:</div>
                          <div class="h_line1"></div>
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                        		
                                                Email:<div class="login_text_box"> <input name="email" type="text" id="email" value="<?php echo $user[$r]['email'];?>" size="30" maxlength="32" /></div>
                                                Name:<div class="login_text_box"><input type="text" size="30" maxlength="32" name="name" value="<?php echo $user[$r]['firstname'];?>&nbsp;<?php echo $user[$r]['lastname'];?>" id="name" /></div>
                                                Address:<div class="login_text_box"><textarea name="address" id="address" style="margin-left:120px; width:250px; margin-top:-20px;"><?php echo $user[$r]['address'];?></textarea><!--<input type="text" size="30" maxlength="32" name="address" value="<?php echo $user[$r]['address'];?>" id="address" />--></div>
                                                City:<div class="login_text_box"><input type="text" size="30" maxlength="32" name="city" value="<?php echo $user[$r]['city'];?>" id="city" /></div>
                                                State:<div class="login_text_box"><?php 

$sql="select * from state";
$rsstate=$objDB->select($sql);
?>			
      <select name="state" id="state" style="width:250px; margin-left:120px; margin-top:-20px;">
                        	<option value="">--Select--</option>
                            <?php for($i=0;$i<count($rsstate);$i++){ ?>
                        	<option value="<?php echo $rsstate[$i]["StateName"]; ?>"<?php if($user[$r]['state']==$rsstate[$i]["StateName"]){?> selected="selected" <?php }?>><?php echo $rsstate[$i]["StateName"]; ?></option>
                         <?php }
						 ?>
                       </select><!--<input type="text" size="30" maxlength="32" name="state" value="<?php echo $user[$r]['state'];?>" id="state" />--></div>
                                                Country:<div class="login_text_box"><input type="text" size="30" maxlength="32" name="country" value="<?php echo $user[$r]['country'];?>" id="country" /></div>
                                                ZipCode:<div class="login_text_box"><input type="text" size="30" maxlength="32" name="zip" value="<?php echo $user[$r]['pincode'];?>" id="zip" /></div>
                                                 <?php } ?>
                                                Currency:<div class="login_text_box"><select name="currencyCodeType" style="margin-left:120px; margin-top:-20px; width:250px;">
<option value="USD" >USD</option>
</select></div>
                                                
                                               
                                        </div>      
                                        
                                </div>
                        </div>



          
                                             
                                             <div class="clear"></div>

	  </div>
      <div id="contain">
      <div class="contain_right" style="width:470px; margin-top:-532px;"><div class="h_line1"></div>
                   		  <div class="heading">Shipping Address</div>
                          <div class="h_line1"></div>
                                <div class="gallery_box">
                           		  
                                  		<div class="login_box">
                                        	 <input type="checkbox" name="ship" id="ship" onClick="FillFields(this)" style="margin-left:-25px;"><font color="#000000" size="2">Please check if Shipping Address is the same as the Billing Address.</font>	<br><br>
                                                Name:<div class="login_text_box"><input type="text" size="30" maxlength="32" name="PERSONNAME" value="" id="PERSONNAME" /></div>
                                                Address:<div class="login_text_box"><textarea name="SHIPTOSTREET" id="SHIPTOSTREET" style="margin-left:120px; width:250px; margin-top:-20px;"></textarea><!--<input type="text" size="30" maxlength="32" name="SHIPTOSTREET" value="" id="SHIPTOSTREET"/>--></div>
                                                City:<div class="login_text_box"><input type="text" size="30" maxlength="32" name="SHIPTOCITY" value="" id="SHIPTOCITY" /></div>
                                                State:<div class="login_text_box"><?php 

$sql="select * from state";
$rsstate=$objDB->select($sql);
?>			
      <select name="SHIPTOSTATE" id="SHIPTOSTATE" style="width:250px; margin-left:120px; margin-top:-20px;">
                        	<option value="">--Select--</option>
                            <?php for($i=0;$i<count($rsstate);$i++){ ?>
                        	<option value="<?php echo $rsstate[$i]["StateName"]; ?>"<?php if($user[$r]['state']==$rsstate[$i]["StateName"]){?> selected="selected" <?php }?>><?php echo $rsstate[$i]["StateName"]; ?></option>
                         <?php }
						 ?>
                       </select><!--<input type="text" size="30" maxlength="32" name="SHIPTOSTATE" value="" id="SHIPTOSTATE" />--></div>
                                                Country:<div class="login_text_box"><input type="hidden" name="SHIPTOCOUNTRYCODE" id="SHIPTOCOUNTRYCODE" value="">
                                            <input type="text" size="30" maxlength="32" name="SHIPTOCOUNTRYCODE1" value="india" id="SHIPTOCOUNTRYCODE1" disabled /></div>
                                                Zipcode:<div class="login_text_box"><input type="text" size="30" maxlength="32" name="SHIPTOZIP" value="" id="SHIPTOZIP" /></div>
                                                
                                              <center>  <div class="login_submit_button"><input name="button" type="image" src="images/submit.jpg" alt="" /></div></center>
                                        </div>      
                                        
                                </div>
                        </div>
      </div>
     
      

                                            <div class="clear"></div>
                              
               
                           
                      </div>

  
   

</form>

    
   
</body>

</html>
<?php } ?>