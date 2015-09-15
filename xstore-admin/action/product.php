<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$sz = loadVariable("Size",'');
$ProductId = loadVariable("ProductId",0);
$subcategory=loadVariable('subcat','');
$maincategory=loadVariable('maincategory','');
$brand=loadVariable('brand','');
$design=loadVariable('design','');
$material=loadVariable('material','');
$collar=loadVariable('collar','');
$price=loadVariable('price','');
$productname=loadVariable('productname','');
$file=loadvariable("file","");
$offer=loadVariable('offer','');

$size=loadVariable('size','');
$color=loadVariable('color','');
$quantity=loadVariable('quantity','');
 $_FILES["file"]["name"];

		
				
if($p == "product")
{	
	if($a == "add")
	{
		$SQL = "INSERT INTO product SET ProductName='".inserttext($productname)."',CategoryId='".inserttext($maincategory)."',SubCategoryId='".inserttext($subcategory)."',BrandId='".inserttext($brand)."',MaterialId='".inserttext($material)."',DesignId='".inserttext($design)."',CollarId='".inserttext($collar)."',ProductPrice='".inserttext($price)."',offer='".inserttext($offer)."'";
		
		$inserttextproperty = $objDB->insert($SQL);
		$pid= mysql_insert_id();
		
		if($_FILES["file"]["name"]!=''){
		$product="product_".$inserttextproperty.strrchr(basename($_FILES["file"]["name"]),".");
		
		$tempfile=$_FILES['file']['tmp_name'];
			
		echo $uploadpath="images/Product_Image/".$product;
			move_uploaded_file($tempfile,$uploadpath);
		resampimagejpg(558, 487, $uploadpath, "images/Product_Image/resize/". $product,100);
		$SQL = "UPDATE product SET ProductImage='".$product."' where ProductId='".$inserttextproperty."'";
		 $objDB->sql_query($SQL);
		}
		
		
		$count=count($size);
		for($i=0;$i<$count;$i++)
		{
			$sql1="insert into product_qty(ProductId,SizeId,ColorId,Quantity,SubCategoryId) values('".$pid."','".$size[$i]."','".$color[$i]."','".$quantity[$i]."','".$subcategory."') ";
			
		mysql_query($sql1);	
		}
		
			
			$success = "New Product Added SuccessFully";
					$_SESSION['success'] = $success;
					$_SESSION['check'] = 'add';
		
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		
		exit;
	}
		
		elseif($a == "update")
		{
		
			
			$SQL = "UPDATE product SET ProductName='".inserttext($productname)."',CategoryId='".inserttext($maincategory)."',SubCategoryId='".inserttext($subcategory)."',BrandId='".inserttext($brand)."',MaterialId='".inserttext($material)."',DesignId='".inserttext($design)."',CollarId='".inserttext($collar)."',ProductPrice='".inserttext($price)."',offer='".inserttext($offer)."' where ProductId ='".$ProductId."'";
		
		$updatetextproperty=$objDB->sql_query($SQL);
		
		if($_FILES["file"]["name"]!=''){
		$product="product_".$ProductId.strrchr(basename($_FILES["file"]["name"]),".");
		$tempfile=$_FILES['file']['tmp_name'];
			
			$uploadpath="images/Product_Image/".$product;
			move_uploaded_file($tempfile,$uploadpath);
		resampimagejpg(558, 487, $uploadpath, "images/Product_Image/resize/". $product,100);
				
		$SQL = "UPDATE product SET ProductImage='".$product."' where ProductId ='".$ProductId."'";
		$objDB->sql_query($SQL);
		}
					$success = "Product Updated SuccessFully";
					$_SESSION['success'] = $success;
					$_SESSION['check'] = 'add';
		
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);		
		exit;
		}
	
	
	if($a=="delete"){
			
		$sql="select * from product where ProductId='".$ProductId."'";
		$rsd = $objDB->select($sql);							
		for($d=0;$d<count($rsd);$d++){
		$product=$rsd[$d]["ProductImage"];
		}
		unlink("images/Product_Image/".$product);
		 unlink("images/Product_Image/resize/".$product);
		
	$SQL="delete from product  where ProductId='".$ProductId."'";
	$rspropertydel = $objDB->sql_query($SQL);
					$success = "Product Deleted SuccessFully";
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
						$SQL="delete from product where ProductId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}else{
						$erro = "Something Wrong.";
					}
				}					
			}
			$_SESSION['success'] = "<span>Selected Product Deleted.</span>";
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
		else
		{
			$success = "Select atleast one Product";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
}
?>