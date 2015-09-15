<?php
$p = loadVariable("p","");
$a = loadVariable("a","");

echo $BrandId = loadVariable("BrandId",0);
$BrandName = loadVariable('BrandName','');
$CompanyName=loadVariable('CompanyName','');
$CompanyAddress=loadVariable('CompanyAddress','');
$ContactNo=loadVariable('ContactNo','');
$s = loadVariable("s","");
$file=loadvariable("file","");
echo $_FILES["file"]["name"];

if($p == "brand")
{	
	if($a == "add")
	{
		 $SQL = "INSERT INTO product_brand SET BrandName='".inserttext($BrandName)."',CompanyName='".inserttext($CompanyName)."',CompanyAddress='".inserttext($CompanyAddress)."',ContactNo='".inserttext($ContactNo)."'";
		
 $inserttextproperty = $objDB->insert($SQL);
		
		if($_FILES["file"]["name"]!=''){
		 $brand="brand_".$inserttextproperty.strrchr(basename($_FILES["file"]["name"]),".");
		
		 $tempfile=$_FILES['file']['tmp_name'];
			
		 $uploadpath="images/brand/".$brand;
			move_uploaded_file($tempfile,$uploadpath);
			
		//resampimagejpg(558, 487, $uploadpath, "images/Product_Image/resize/". $brand,100);
	 $SQL = "UPDATE product_brand SET BrandImage='".$brand."' where BrandId='".$inserttextproperty."'";

		 $objDB->sql_query($SQL);
		}
		
		$success = "Brand Added SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
	}
		
		elseif($a == "update")
		{
		  $SQL = "UPDATE product_brand SET BrandName='".inserttext($BrandName)."',CompanyName='".inserttext($CompanyName)."',CompanyAddress='".inserttext($CompanyAddress)."',ContactNo='".inserttext($ContactNo)."' where BrandId ='".$BrandId."'";
		
		 $updatetextproperty=$objDB->sql_query($SQL);
		 
		if($_FILES["file"]["name"]!=''){
		 $brand="brand_".$BrandId.strrchr(basename($_FILES["file"]["name"]),".");
		
		 $tempfile=$_FILES['file']['tmp_name'];
			
		$uploadpath="images/brand/".$brand;
			move_uploaded_file($tempfile,$uploadpath);
		//resampimagejpg(558, 487, $uploadpath, "images/Product_Image/resize/". $brand,100);
	  $SQL = "UPDATE product_brand SET BrandImage='".$brand."' where BrandId='".$BrandId."'";
	
		 $objDB->sql_query($SQL);
		}		
		$success = "Brand Updated SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;	
		}
	
	
	if($a=="delete"){
	$SQL="delete from product_brand  where BrandId='".$BrandId."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$success = "Brand Deleted SuccessFully";
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
						$SQL="delete from product_brand where BrandId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}else{
						$erro = "Something Wrong.";
					}
				}					
			}
			$_SESSION['success'] = "<span>Selected Brand Deleted.</span>";
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
		else
		{
			$success = "Selected atleast one Brand";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
}
?>