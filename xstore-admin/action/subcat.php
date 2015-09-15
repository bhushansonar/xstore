<?php
error_reporting(0); 
$CategoryId=loadVariable("CategoryId","");
echo "subcat1^_^";
$sql1="select * from subcategory where CategoryId='".$CategoryId."'";
$rscat=$objDB->select($sql1);

?>
<select name="subcat" id="subcat"  onChange="funGetNeck(this.value)" class="field text small">
<option value="">Select SubCategory</option>
<?php 
for($i=0;$i<count($rscat);$i++){?>
<option value="<?php echo $rscat[$i]["SubCategoryId"]; ?>"

><?php echo $rscat[$i]["SubCategory"];?></option>

<?php } ?>
</select>

