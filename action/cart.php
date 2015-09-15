<?php 
if($_REQUEST["a"]=="cart"){
	echo $pid=$_REQUEST["ProductId"];
	echo $flag=0;
	echo $qty=loadVariable("quantity","");
	echo $size=$_REQUEST["size".$_REQUEST['s']];

	
	if(isset($_SESSION["userid"])!=""){
		$uid=$_SESSION["userid"];}
	else{
		$uid=$_COOKIE['PHPSESSID'];}
	
	$sql="select * from shoppingcart";
	$rspro=$objDB->select($sql);
	for($i=0;$i<count($rspro);$i++){
		$pid1=$rspro[$i]['ProductId'];
		$uid1=$rspro[$i]['UserId'];
		$size1=$rspro[$i]['Size'];
		if($pid==$pid1 && $uid==$uid1 && $size==$size1){
			$flag=1;
		}
	}
	if($flag==1){
		$sql="select * from shoppingcart where ProductId='".$pid."' and Size='".$size."'";
		$rspro=$objDB->select($sql);
		for($i=0;$i<count($rspro);$i++){ 
			$qty1=$rspro[$i]['Quantity']."<br>";
			$qty=$qty+$qty1;
			$sql2="update shoppingcart set Quantity='".$qty."' where ProductId='".$pid."' and Size='".$size."'";
			mysql_query($sql2);
			echo "URL^_^";?>
            <?php 
				if(isset($_SESSION["userid"])!=""){
					$uid=$_SESSION["userid"];}
				else{
					$uid=$_COOKIE['PHPSESSID'];}
				$sql1="select * from shoppingcart where UserId ='".$uid."'";
				$rsu = $objDB->select($sql1);
			?>
            <!--this--><input type="hidden" id="count" name="count" value="<?php echo count($rsu);?>" />
            <?php 
				for($i=0;$i<count($rsu);$i++){
					$pid=$rsu[$i]['ProductId'];
					$sz=$rsu[$i]['Size'];
					$sql2="select * from product where ProductId ='".$pid."'";
					$rsd = $objDB->select($sql2);
					for($d=0;$d<count($rsd);$d++){
			?> 
				<input type="hidden" id="price<?php echo $i;?>" name="price" value="
				<?php 
		 if($rsd[$d]['offer']!=0)
		 {                        
			$dp=$rsd[$d]['ProductPrice']*$rsd[$d]['offer']/100;
			
		 	$dp=$rsd[$d]['ProductPrice']-$dp;
			echo(round($dp));
		}
		else
		{
			echo $rsd[$d]['ProductPrice'];
		}
?>
                " />
				<input type="hidden" id="Qyt<?php echo $i;?>" name="Qyt" value="<?php echo $rsu[$i]['Quantity'];?>" />
                <div id="cart<?php echo $i;?>" class="cart" style="margin-top:5px;">            <div style="margin-left: 10px; width: 80px; float: left;">
            	<span style="color:#000000; font-size:14px;"><?php echo $rsd[$d]['ProductName'];?></span>
        </div>
        <div style="width:15px; float:left; margin-left:0px;">
        	<span style="color:#000000; font-size:14px;">
			<?php  
				$SQL="select * from product_size where SizeId ='".$sz."'";
            	$rsUser1 = $objDB->select($SQL);
            	for($us=0;$us<count($rsUser1);$us++){
            		echo $rsUser1[$us]['Size'];
            	}
        	?>
            </span>
        </div>
        <div style="width:15px; float:left; margin-left:10px;"><span style="color:#000000; font-size:14px;" ><?php echo $rsu[$i]['Quantity'];?></span>
        </div>
        <div style="float:left; width:65px; text-align:center; margin-left:-15px;">
        	<span style="color:#000000; font-size:14px;" id="total<?=$i?>">			            <?php 
			if($rsd[$d]['offer']!=0)
		 {                        
			$dp=$rsd[$d]['ProductPrice']*$rsd[$d]['offer']/100;
			
		 	$dp=$rsd[$d]['ProductPrice']-$dp;
			//echo(round($dp));
			$pricetotal=$rsu[$i]['Quantity']*(round($dp));
			echo $pricetotal;
		}
		else
		{
			
			$pricetotal=$rsu[$i]['Quantity']*$rsd[$d]['ProductPrice'];
        	echo $pricetotal;
		}
        		
        	?>
            </span>
        </div>
        <a href="javascript:funRemove('<?php echo $rsu[$i]['ProductId'];?>','<?php echo $i;?>','<?php echo count($rsu);?>','<?php echo $sz ?>')"><img src="images/minas1.jpg" /></a>
        <div style="clear:both"></div>
        <div class="h_desed_line" style="margin:12px;"></div>
    </div>
    			
			<?php }
			}?>
<?php	}
	} else {
		$sql="insert into shoppingcart(UserId,ProductId,Quantity,Size) values ('".$uid."','".$pid."','".$qty."','".$size."')";
		$objDB->insert($sql);
		echo "URL^_^";
?>
	<?php 
        if(isset($_SESSION["userid"])!=""){
            $uid=$_SESSION["userid"];}
        else{
            $uid=$_COOKIE['PHPSESSID'];}
        $sql1="select * from shoppingcart where UserId ='".$uid."'";
        $rsu = $objDB->select($sql1);
		?>
        <input type="hidden" id="count" name="count" value="<?php echo count($rsu);?>" />
        <?php 
        for($i=0;$i<count($rsu);$i++){
            $pid=$rsu[$i]['ProductId'];
            $sz=$rsu[$i]['Size'];
            $sql2="select * from product where ProductId ='".$pid."'";
            $rsd = $objDB->select($sql2);
            for($d=0;$d<count($rsd);$d++){
    ?> 
        <input type="hidden" id="price<?php echo $i;?>" name="price" value="
		<?php 
		 if($rsd[$d]['offer']!=0)
		 {                        
			$dp=$rsd[$d]['ProductPrice']*$rsd[$d]['offer']/100;
			
		 	$dp=$rsd[$d]['ProductPrice']-$dp;
			echo(round($dp));
		}
		else
		{
			echo $rsd[$d]['ProductPrice'];
		}
?>
        " />
        <input type="hidden" id="Qyt<?php echo $i;?>" name="Qyt" value="<?php echo $rsu[$i]['Quantity'];?>" />
        <div id="cart<?php echo $i;?>" class="cart" style="margin-top:5px;">            <div style="margin-left:10px; width:80px; float:left;">
            	<span style="color:#000000; font-size:14px;"><?php echo $rsd[$d]['ProductName'];?></span>
        </div>
        <div style="width:15px; float:left;">
        	<span style="color:#000000; font-size:14px; margin-left:0px;">
			<?php  
				$SQL="select * from product_size where SizeId ='".$sz."'";
            	$rsUser1 = $objDB->select($SQL);
            	for($us=0;$us<count($rsUser1);$us++){
            		echo $rsUser1[$us]['Size'];
            	}
        	?>
            </span>
        </div>
        <div style="width:15px; float:left; margin-left:10px;"><span style="color:#000000; font-size:14px;" ><?php echo $rsu[$i]['Quantity'];?></span>
        </div>
        <div style="float:left; width:65px; text-align:center; margin-left:-15px;">
        	<span style="color:#000000; font-size:14px;" id="total<?=$i?>">			            <?php 
			if($rsd[$d]['offer']!=0)
		 {                        
			$dp=$rsd[$d]['ProductPrice']*$rsd[$d]['offer']/100;
			
		 	$dp=$rsd[$d]['ProductPrice']-$dp;
			//echo(round($dp));
			$pricetotal=$rsu[$i]['Quantity']*(round($dp));
			echo $pricetotal;
		}
		else
		{
			
			$pricetotal=$rsu[$i]['Quantity']*$rsd[$d]['ProductPrice'];
        	echo $pricetotal;
		}
        		
        	?>
            </span>
        </div>
        <a href="javascript:funRemove('<?php echo $rsu[$i]['ProductId'];?>','<?php echo $i;?>','<?php echo count($rsu);?>','<?php echo $sz ?>')"><img src="images/minas1.jpg" /></a>
        <div style="clear:both"></div>
        <div class="h_desed_line" style="margin:12px;"></div>
    </div>
    <?php }
    }?>    
<?php }
}?>