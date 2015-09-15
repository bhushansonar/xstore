<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$ColorId = loadVariable("ColorId",0);
$ColorName = loadVariable('ColorName','');
$s = loadVariable("s","");

if($p == "color")
{	
	if($a == "add")
	{
		$SQL = "INSERT INTO product_color SET ColorName='".inserttext($ColorName)."'";
		$inserttextproperty = $objDB->insert($SQL);
		$success = "Color Added SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
	}
		
		elseif($a == "update")
		{
		$SQL = "UPDATE product_color SET ColorName='".inserttext($ColorName)."' where ColorId ='".$ColorId."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$success = "Color Updated SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;	
		}
	
	
	if($a=="delete"){
	$SQL="delete from product_color  where ColorId='".$ColorId."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$success = "Color Deleted SuccessFully";
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
						$SQL="delete from product_color where ColorId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}else{
						$erro = "Something Wrong.";
					}
				}					
			}
			$_SESSION['success'] = "<span>Selected Color Deleted.</span>";
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
		else
		{
			$success = "Selected atleast one Color";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
}
?>