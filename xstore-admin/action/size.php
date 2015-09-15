<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$SizeId = loadVariable("SizeId",0);
$Size = loadVariable('Size','');
$s = loadVariable("s","");

if($p == "size")
{	
	if($a == "add")
	{
		$SQL = "INSERT INTO product_size SET Size='".inserttext($Size)."'";
		$inserttextproperty = $objDB->insert($SQL);
		$success = "Size Added SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
	}
		
		elseif($a == "update")
		{
		$SQL = "UPDATE product_size SET Size='".inserttext($Size)."' where SizeId ='".$SizeId."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$success = "Size Updated SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;	
		}
	
	
	if($a=="delete"){
	$SQL="delete from product_size  where SizeId='".$SizeId."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$success = "Size Deleted SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
	header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
	exit;	
	}
	
	if ($a == "muldelete") //code for deleting multiple data form the table
		{
	  		$multipledel = loadvariable('multipledel','');
			$todo = loadvariable('todo','');
		if($multipledel != '')
		{
			if(count($multipledel)>0)
			{	
				for($i=0;$i<count($multipledel);$i++)
				{
					$del_id = $multipledel[$i];
					//echo $del_id.'<br/>';
					if($todo == "delete"){
						$SQL="delete from product_size where SizeId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}else{
						$erro = "Something Wrong.";
					}
				}					
			}
			$_SESSION['success'] = "<span>Selected Size Deleted.</span>";
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
		else
		{
			$success = "Selected atleast one Size";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
}
?>