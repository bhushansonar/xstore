<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$MaterialId = loadVariable("MaterialId",0);
$MaterialName = loadVariable('MaterialName','');
$s = loadVariable("s","");

if($p == "material")
{	
		if($a == "add")
		{
		$SQL = "INSERT INTO product_material SET MaterialName='".inserttext($MaterialName)."'";
		$inserttextproperty = $objDB->insert($SQL);
		$success = "Material Added SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
		}
		
		elseif($a == "update")
		{
		$SQL = "UPDATE product_material SET MaterialName='".inserttext($MaterialName)."'		
		where MaterialId ='".$MaterialId."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$success = "Material Updated SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;	
		}
	
	
	if($a=="delete")
	{
	$SQL="delete from product_material  where MaterialId='".$MaterialId."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$success = "Material Deleted SuccessFully";
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
						$SQL="delete from product_material where MaterialId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}
						else
							{
								$erro = "Something Wrong.";
							}
				}					
			}
				$_SESSION['success'] = "<span>Selected Material's Deleted.</span>";
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