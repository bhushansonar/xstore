<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$report=loadVariable("report","");
$db = loadVariable("db","");
$sql="select * from ".$db;
$user = $objDB->select($sql);
?>	

<script type="application/javascript" >
function getname(tablename)
{
	location.href="index.php?p=report&db="+tablename;
}
</script>
<style type="text/css">
.hastable table a.btn span.ui-icon {
	left:0.2em;
}
</style>
<div id="sub-nav"><div class="page-title" style="margin-left:520px;">
        		<?php if(isset($val) && $val != ''){
					 	$header = $val;
					 }else{
					 	$header = 'Manage Reports';
					 }
					 ?>
			<h1><?php echo $header?></h1>
		</div>
</div>
<div id="page-layout">
	<div id="page-content">
			<div id="page-content-wrapper" style="width:105%; margin-left:-40px;">
				
                <center><form id="frmdelmember" name="frmdelmember" method="post" action=""> 	
                <font style="font-size:16px;">Select Report:</font><select name="report" style="margin-left:25px; margin-top:20px;" onchange="getname(this.value)">
                <option value="">--Select--</option>
                <option value="order_detail">Order Report</option>
                <option value="user">User Report</option>
                <option value="payment">Payment Report</option>
                </select>
                <div class="clear"></div>
                <input name="submit" type="button" class="ui-state-default ui-corner-all ui-button" value="Generate Report" style="margin-top:35px; margin-bottom:5px;"  onclick="document.location.href='index.php?p=export&db=<?=$db?>'"/>
                </center>
                
				<div class="hastable">
                        			
                            <input type="hidden" name="a" value="muldelete">
                            <input type="hidden" name="todo" id="todo" value=""> 
				<input type="hidden" name="p" value="<?php echo $p?>">
                <?php if($db=='payment'){?>
				
                   		<table id="sort-table"> 
						<thead> 
						<tr>
						    <th>TransactionId</th>
                            <th>TransactionType</th>
                            <th>PaymentType</th>
                            <th>PaymentStatus</th>
                            <th>OrderTime</th>
                            <th>ACK</th>
                            <th>Email</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>ProductId</th>
                            <th>ProductSize</th>
                            <th>Product_Qty</th>
                            <th>ProductPrice</th>
                            <th>TotalAmount</th>
						</tr> 
						</thead> 
                       <tbody> 
                      <?php  
				for($i=0;$i<count($user);$i++){
				?>
						<tr>
                            <td><?php echo viewtext($user[$i]['TransactionId']);?></td>
                            <td><?php echo viewtext($user[$i]['TransactionType']);?></td>
                            <td><?php echo viewtext($user[$i]['PaymentType']);?></td>
                            <td><?php echo viewtext($user[$i]['PaymentStatus']);?></td>
                            <td><?php echo viewtext($user[$i]['OrderTime']);?></td>
                            <td><?php echo viewtext($user[$i]['ACK']);?></td>
                           
                            <td><?php echo viewtext($user[$i]['Email']);?></td>
                           
                            <td><?php echo viewtext($user[$i]['FirstName']);?></td>
                            <td><?php echo viewtext($user[$i]['LastName']);?></td>
                            <td><?php echo viewtext($user[$i]['ProductId']);?></td>
                            <td><?php
							 $SQL="select * from product_size where SizeId =".$user[$i]['ProductSize']."";
							$rsUser1 = $objDB->select($SQL);
							echo $rsUser1[0]['Size'];
							
							?></td>
                            <td><?php echo viewtext($user[$i]['Product_Qty']);?></td>
                            <td><?php echo viewtext($user[$i]['ProductPrice']);?></td>
                            <td><?php echo viewtext($user[$i]['TotalAmount']);?></td>
                        </tr>
                        <?php } ?>
 						</tbody>
                        </table>
                        </form>
					 <?php } ?>
                     <?php if($db=='order_detail'){?>
                   		<table id="sort-table"> 
						<thead> 
						<tr>
						    <th>OrderId</th>
                            <th>TransactionId</th>
                            <th>UserId</th>
                            <th>OrderTime</th>
                            <th>Confirm</th>
                            <th>Totalamount</th>
                            <th>Status</th>
						</tr> 
						</thead> 
                       <tbody> 
                      <?php  
				for($i=0;$i<count($user);$i++){
				?>
						<tr>
                            <td><?php echo viewtext($user[$i]['OrderId']);?></td>
                           
                            <td><?php echo viewtext($user[$i]['TransactionId']);?></td>
                            <td><?php echo viewtext($user[$i]['UserId']);?></td>
                           
                            <td><?php echo viewtext($user[$i]['OrderTime']);?></td>
                            <td><?php echo viewtext($user[$i]['Confirm']);?></td>
                           
                            <td><?php echo viewtext($user[$i]['Totalamount']);?></td>
                            <td><?php echo viewtext($user[$i]['Status']);?></td>
                           
                        </tr>
                        <?php } ?>
 						</tbody>
                        </table>
                        </form>
					 <?php } ?>
                     <?php if($db=='user'){?>
                   		<table id="sort-table"> 
						<thead> 
						<tr>
						    <th>UserId</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>E-mail</th>
                            <th>Status</th>
						</tr> 
						</thead> 
                       <tbody> 
                      <?php 
				for($i=0;$i<count($user);$i++){
				?>
						<tr>
                            <td><?php echo viewtext($user[$i]['UserId']);?></td>
                           
                            <td><?php echo viewtext($user[$i]['firstname']);?></td>
                            <td><?php echo viewtext($user[$i]['lastname']);?></td>
                            <td><?php echo viewtext($user[$i]['email']);?></td>
                           
                            <td><?php if($user[$i]['Status']=="1"){
										echo "Active";}
										else
										{
											echo "DeActive";
										}?></td>
                           
                        </tr>
                        <?php } ?>
 						</tbody>
                        </table>
                        </form>
					 <?php } ?>
               		<div class="clear"></div>
				</div>
                <div id="pager">
					
								<a class="btn_no_text btn ui-state-default ui-corner-all first" title="First Page" href="#">
									<span class="ui-icon ui-icon-arrowthickstop-1-w"></span>
								</a>
								<a class="btn_no_text btn ui-state-default ui-corner-all prev" title="Previous Page" href="#">
									<span class="ui-icon ui-icon-circle-arrow-w"></span>
								</a>
							
								<input type="text" class="pagedisplay"/>
								<a class="btn_no_text btn ui-state-default ui-corner-all next" title="Next Page" href="#">
									<span class="ui-icon ui-icon-circle-arrow-e"></span>
								</a>
								<a class="btn_no_text btn ui-state-default ui-corner-all last" title="Last Page" href="#">
									<span class="ui-icon ui-icon-arrowthickstop-1-e"></span>
								</a>
								<select class="pagesize">
									<option value="10" selected="selected">10 results</option>
									<option value="20">20 results</option>
									<option value="30">30 results</option>
									<option value="40">40 results</option>

								</select>	
                              					
						</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
	</div>
</div>

