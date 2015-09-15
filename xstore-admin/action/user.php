<?php
	$p = loadvariable('p','');
	$a = loadvariable('a','');	
	$UserId = loadvariable('UserId','0');	
	
	$Password = loadvariable('Password','');	
	$FirstName = loadvariable('FirstName','');	
	$LastName = loadvariable('LastName','');	
	$Email = loadvariable('Email','');		
	
	$Status = loadvariable('Status','');		
	$submit = loadvariable('submit','');
	$s = loadvariable('s','');
	if($p == 'user'){
		if($submit == 'Save'){
			if($a == 'add' && $UserId == '0'){
				$SQL="select email from admin where emal='".$Email."'";
				$rsAdmin = $objDB->select($SQL);
				if (count($rsAdmin)>0) {
					$error="The supplied UserName already exists.Please select a unique UserName."; ?>
					<html>
							<head></head>
							<body>
								<form name="frm" id="frm" method="post" action="index.php">
								
									<?  				
			
									foreach($_POST as $Key=>$Value){ 
										if($Key!="submit"){
											if($Key=="p"){
												$Value=$p;
											}
											if($Key=="a"){
												$Value='add';
											}
			
									?>
										<input type="hidden" name="<?=$Key?>" value="<?=$Value?>" />
									<? }
									}?>
										<input type="hidden" name="error"  value="<?=$error;?>" />
								</form>
							</body>
							<script language="javascript" type="text/javascript">
								document.frm.submit();
							</script>
						</html>
				<?php } else {
					// insert
					$SQL="INSERT user set email='".$Email."',password='".encodestring($Password)."',firstname='".$FirstName."',lastname='".$LastName."',Status=".$Status;
					$objDB->insert($SQL);
					$success = "New user Added SuccessFully";
					$_SESSION['success'] = $success;
					$_SESSION['check'] = 'add';
					header("Location:".$AbsoluteURLAdmin."index.php?p=user_list");	
					exit;		
				}
			}
			if($a == 'update' && $AdminID != '0'){
				// first we need to check if the UserName/Password already eixsts.
				$SQL="select email from user where email='".$email."' AND AdminID !=".$UserId;
				$rsAdmin = $objDB->select($SQL);
				if (count($rsAdmin)>0) {
					$error="The supplied UserName already exists.Please select a unique UserName."; ?>
					<html>
							<head></head>
							<body>
								<form name="frm" id="frm" method="post" action="index.php">
								
									<?  				
			
									foreach($_POST as $Key=>$Value){ 
										if($Key!="submit"){
											if($Key=="p"){
												$Value=$p;
											}
											if($Key=="a"){
												$Value='add';
											}
			
									?>
										<input type="hidden" name="<?=$Key?>" value="<?=$Value?>" />
									<? }
									}?>
										<input type="hidden" name="error"  value="<?=$error;?>" />
								</form>
							</body>
							<script language="javascript" type="text/javascript">
								document.frm.submit();
							</script>
						</html>
				<?php } else {
						// update
						if ($_SESSION['session_adminID']!=$UserId) { 
							$qry = ",Status='".$Status."'";
						}
						$SQL="UPDATE user set email='".$Email."',password='".encodestring($Password)."',firstname='".$FirstName."',lastname='".$LastName."' ".$qry." WHERE UserId='".$UserId."'";
					$objDB->sql_query($SQL);
					$success = "User Updated SuccessFully";
					$_SESSION['success'] = $success;
					$_SESSION['check'] = 'edit';
					header("Location:".$AbsoluteURL."xstore-admin/index.php?p=user_list");		
					exit;		
				}
			}
		}
		if($a == 'delete'&& $UserId != '0'){
			$SQL="delete from user where UserId=".$UserId;
			$rsAdmin = $objDB->sql_query($SQL);
			$success = "User Deleted SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURL."xstore-admin/index.php?p=user_list");
			exit;
		}
		if ($a == "muldelete") //code for deleting multiple data form the table
		{
	  		$multipledel = loadvariable('multipledel','');
		if($multipledel != '')
		{
			if(count($multipledel)>0)
			{	
				for($i=0;$i<count($multipledel);$i++)
				{
					$del_id = $multipledel[$i];
					//echo $del_id.'<br/>';
					$SQL="DELETE from user where UserId='".$del_id."' ";
					$rsMember = $objDB->sql_query($SQL);
				}					
			}
			$success = "Selected Users Deleted";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURL."xstore-admin/index.php?p=user_list");
			exit;
		}
		else
		{
			$success = "Selected atleast one User";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURL."xstore-admin/index.php?p=user_list");
			exit;
		}	
		
		
	}	
		if($a == 'status' && $s != '' && $UserId != '0'){
			$SQL="update user set Status = '".$s."' where UserId=".$UserId;		
			$rsAdmin = $objDB->sql_query($SQL);
			if($s == '0'){
				$success = "User Deactivated";			
			}else{
				$success = "User Activated";			
			}
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURL."xstore-admin/index.php?p=user_list");
		}
	}
?>