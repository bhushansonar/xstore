<?php
$p = loadVariable("p","");
$a = loadVariable("a","");

$SubCategoryId = loadVariable("SubCategoryId",0);
$SubCategory = loadVariable('SubCategory','');
$maincategory=loadVariable('maincategory','');
$s = loadVariable("s","");

if($p == "subcategory")
{	
	if($a == "add")
	{
		$SQL = "INSERT INTO subcategory SET SubCategory='".inserttext($SubCategory)."',CategoryId='".inserttext($maincategory)."'";
		$inserttextproperty = $objDB->insert($SQL);
		$success = "SubCategory Added SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
	}
		
		elseif($a == "update")
		{
		$SQL = "UPDATE subcategory SET SubCategory='".inserttext($SubCategory)."' where SubCategoryId ='".$SubCategoryId."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$success = "SubCategory Updated SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;	
		}
	
	
	if($a=="delete"){
	$SQL="delete from subcategory  where SubCategoryId='".$SubCategoryId."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$success = "SubCategory Deleted SuccessFully";
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
						$SQL="delete from subcategory where SubCategoryId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}else{
						$erro = "Something Wrong.";
					}
				}					
			}
			$_SESSION['success'] = "<span>Selected SubCategory Deleted.</span>";
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
		else
		{
			$success = "Selected atleast one Category";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
}
?>