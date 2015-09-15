<?php
$UserId = loadVariable("UserId",0);
$Password = loadVariable("Password","");
$FirstName = loadVariable("FirstName","");
$LastName = loadVariable("LastName","");
$Email = loadVariable("Email","");
$Status = loadVariable("Status",1);

if ($a=="") $a='list';

if ($a=="edit") {
	if ($AdminID!=0) {

		$SQL="select * from user where UserId =".$UserId;
		$rsAdmin = $objDB->select($SQL);
		if (count($rsAdmin)>0) {
			$Password = $rsAdmin[0]["password"];
			$FirstName = $rsAdmin[0]["firstname"];
			$LastName = $rsAdmin[0]["lastname"];
			$Email = $rsAdmin[0]["email"];
			
			$Status=$rsAdmin[0]["Status"];
			
		}
	}
}
if ($a=="list") {
	$SQL="select * from user order by lastname,firstname";
	$rsAdmin = $objDB->select($SQL);
	$numPerPage=10;  
	$iCount=count($rsAdmin);
	$page=loadVariable("page",1);

	$totalPages=ceil($iCount/$numPerPage);
	$start=($page*$numPerPage)-$numPerPage;
	$end=$numPerPage;
	if ($end>count($rsAdmin)) $end=$iCount;
		
	$SQL.=" LIMIT ".$start." , ".$end;
	$rsAdmin = $objDB->select($SQL);
}
?>
<script src="<?php echo $AbsoluteURL?>admin/js/ajax1.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
	function checkUser(userval){
		var url="<?php echo $AbsoluteURL?>admin/manage.php?p=checkuser";
		url=url+"&a=checkuser&q="+userval;
		xmlHttp = GetXmlHttpObject(stateChangeHandler);
		xmlHttp_Get(xmlHttp, url);
	}
	function checkcity(){
		if(document.getElementById('chk').value == '0'){
			return false;
		} else {
			return true;
		}
	}
</script>

	<div id="sub-nav"><div class="page-title">
						<h1>User Registration</h1>
						<span></span>
					</div>
</div>
<div id="page-layout">
	<div id="page-content">
		<div id="page-content-wrapper">
			<div class="inner-page-title">
				<h2>Registration</h2>
			</div>
			<div class="content-box">
                <?php if(isset($_POST['error']) && $_POST['error'] != ''){ ?>
                    <div class="response-msg inf ui-corner-all">
                      	<div>
                        	<span>Error Message</span>
                            <?php echo $_POST['error']?><?php unset($_POST['error']); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '' && $_SESSION['check'] == 'edit'){ ?>
                    <div class="response-msg inf ui-corner-all">
                        <div>
                      <span>Success Message</span>
                      <?php echo $_SESSION['success']?><?php unset($_SESSION['success']); unset($_SESSION['check']); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <form onSubmit="return checkcity();" method="post" action="<?php echo $AbsoluteURLAdmin?>manage.php">
                            <input type="hidden" name="p" value="user">
                            <input type="hidden" name="chk" id="chk"> 
                            <?php if($a == "edit"){ ?>
	                        <input type="hidden" name="AdminID" value="<?php echo $AdminID?>">
							<input type="hidden" name="a" value="update"><?php }else{ ?>
                            <input type="hidden" name="a" value="add"> 
                            <?php } ?>
                    	<ul>
							
                            <li>
								<label  class="desc">
									Email
								</label>
                                
                                	<input class="field text small" tabindex="1" maxlength="255" type="text" id="small-input" name="Email" value="<?php echo $Email?>" style="margin-left:24px;" />
                                
							</li>
                          	<li>
                            										
								<label  class="desc">
									Password
								</label>
								 
                                	<input class="field text small" tabindex="1" maxlength="255" type="password" id="small-input" name="Password" value="" />
                                
							</li>
							<li>
                             <label  class="desc">
								Firstname
							</label>
                            
                            	<input class="field text small" tabindex="1" maxlength="255" type="text" id="small-input" name="FirstName" value="<?php echo $FirstName?>" />
                            
								
							</li>
							<li>
								<label  class="desc">
									Lastname
								</label>
								
                                	<input class="field text small" tabindex="1" maxlength="255" type="text" id="small-input" name="LastName" value="<?php echo $LastName?>" />
                                
                                
							</li>
							
                            
                            <li>
                             	<label  class="desc">
									Status
                                </label>
                                
                                	<select name="Status" id="Status" size="1" class="field text small" <?php if ($_SESSION['session_adminID']==$AdminID) { ?> disabled="disabled" <?php } ?> style="margin-left:19px;">
                                    
                                        <option value="0" <?php if (!$Status) echo "selected";?>>Inactive</option>
                                        <option value="1" <?php if ($Status) echo "selected";?>>Active</option>
                                    </select>
                                    <?php if ($_SESSION['session_adminID']==$AdminID) { ?>
                                        	<input type="hidden" name="Status" id="Status" value="<?php echo $Status?>" />
                                    <?php } ?>
                                
							</li>
                            <li>
                            	<div>
                                	<input name="submit" type="submit" class="ui-state-default ui-corner-all ui-button" value="Save" />&nbsp;&nbsp;<input name="button" type="button" class="ui-state-default ui-corner-all ui-button" onclick='if(confirm(&quot;Are you sure you want to cancel?\n\nThis will cancel any changes you have made and not yet saved!&quot;)) { document.location.href=&quot;index.php?p=user_list&quot; }' value="Cancel" />
                                </div>
                            </li>
                        </ul>
                    </form>
					<div class="clear"></div>
				</div>
		</div>
	</div>
</div>	                    
				<?php if($a == "edit" || $_POST['a'] == 'add'){ ?>
                	<script type="text/javascript" language="javascript">
						$(document).ready(function() {
						   $('#tab1').css("display","none");
						   $('#tab2').css("display","block");
						});
					</script>
                <?php } ?>
 <script type="text/javascript" language="javascript">
					function checkdeletion(val) //for submitting form 
						{	
							if(val != ''){
								document.getElementById('todo').value = val;
								document.frmdelmember.submit();
								return true;				
							}
						}
				</script>
