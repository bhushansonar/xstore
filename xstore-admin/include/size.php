<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$SizeId = loadVariable("SizeId",0);
$Size = loadVariable('Size','');

$SQL = "SELECT * FROM admin WHERE AdminID='".$_SESSION['session_adminID']."'";
$rsAdmin = $objDB->select($SQL);

if ($a=="") $a='list';

if ($a=="edit") {
	if ($SizeId!=0) {
		$SQL="select * from product_size where SizeId =".$SizeId;
		$rsUser = $objDB->select($SQL);
		if (count($rsUser)>0) {
			$SizeId = $rsUser[0]["SizeId"];
			$Size = $rsUser[0]["Size"];
			
		}
	}
}
if ($a=="list") {
	$SQL="select * from product_size";
	$rsUser = $objDB->select($SQL);
?>
			

<style type="text/css">
.hastable table a.btn span.ui-icon {
	left:0.2em;
}
</style>
<div id="sub-nav"><div class="page-title">
        		<?php if(isset($val) && $val != ''){
					 	$header = $val;
					 }else{
					 	$header = 'Manage Size';
					 }
					 ?>
			<h1><?php echo $header?></h1>
		</div>
</div>
<div id="page-layout">
	<div id="page-content">
			<div id="page-content-wrapper">
				<div class="inner-page-title">
					<h2>Size List<div style="float:right; font-size:16px;">
                  </div></h2>
                   <div class="clear"></div>
				</div>
				<div class="hastable">
                	<?php if(isset($_SESSION['success']) && $_SESSION['success'] != '' && $_SESSION['check'] == 'add'){ ?>
                        <div class="response-msg inf ui-corner-all">
							<div>
                            <span>Success Message</span>
								<?php echo $_SESSION['success']?><?php unset($_SESSION['success']); unset($_SESSION['check']); ?>
							</div>
						</div>
						<?php } ?>
                        <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '' && $_SESSION['check'] == 'add'){ ?>
                        <div class="response-msg inf ui-corner-all">
							<div>
                           		 <span>Error Message</span>
								<?php echo $_SESSION['error']?><?php unset($_SESSION['error']); unset($_SESSION['check']); ?>
							</div>
						</div>
						<?php } ?>
                        <p> <button type="button" id="deleteall_msg" class="ui-state-default ui-corner-all ui-button">Delete All</button></p>
                         <script language="javascript" type="text/javascript">
							  			var me = this;  
											jQuery(document).ready(function() {
												jQuery("#delete_all").dialog({
													autoOpen: false,
													bgiframe: true,
													resizable: false,
													width:500,
													modal: true,
													overlay: {
														backgroundColor: '#000',
														opadealsource: 0.5
													},
													buttons: {
														'Delete': function() {
															me.checkdeletion('delete');
															jQuery(this).dialog('close');
														},
														Cancel: function() {
															jQuery(this).dialog('close');
														}
													}
												});
												
												jQuery('#deleteall_msg').click(function(){
													jQuery('#delete_all').dialog('open');
													return false;
												});
											});
										</script>
                         <div id="delete_all" title="Delete ?">
                                            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to Delete all?</p>
                                        </div>
                        <form id="frmdelmember" name="frmdelmember" method="post" action="manage.php"> 				
                            <input type="hidden" name="a" value="muldelete">
                            <input type="hidden" name="todo" id="todo" value=""> 
							<input type="hidden" name="p" value="<?php echo $p?>">
                   		<table id="sort-table"> 
						<thead> 
						<tr>
                            <th><input type="checkbox"  name="checkall" id="checkall" value="1" onclick="return checkAll(this.id);" /></th>
						    <th>Size</th>
                            <th style="width:128px">Options</th> 
						</tr> 
						</thead> 
                       <tbody> 
                      <?php if(!empty($rsUser)){ ?>
                        <?php for($i=0;$i<count($rsUser);$i++){ ?>
						<tr>
							<td class="center"><input name="multipledel[]" type="checkbox" id="multipledel[]" value="<?php echo $rsUser[$i]['SizeId']?>"></td> 
                            <td><?php echo viewtext($rsUser[$i]['Size']);?></td>
                            
                            
                           <td><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=size&a=edit&SizeId=<?php echo $rsUser[$i]['SizeId']?>" title="Edit" style="float:left" class="btn_no_text btn ui-state-default ui-corner-all tooltip"><span class="ui-icon ui-icon-wrench"></span></a>
                           		<a id="modal_confirmation_link<?php echo $i?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" href="javascript:void(0);" title="Delete"><span class="ui-icon ui-icon-circle-close"></span></a>
								 <div id="modal_confirmation<?php echo $i?>" title="Delete ?">
                                      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to Delete? This will Delete all the information related this User.</p>
                                 </div>
								<script language="javascript" type="text/javascript">
                                    jQuery(document).ready(function() {
                                        jQuery("#modal_confirmation<?php echo $i?>").dialog({
                                            autoOpen: false,
                                            bgiframe: true,
                                            resizable: false,
                                            width:500,
                                            modal: true,
                                            overlay: {
                                                backgroundColor: '#000',
                                                opacity: 0.5
                                            },
                                            buttons: {
                                                'Delete': function() {
                                                    document.location.href="<?php echo $AbsoluteURLAdmin;?>manage.php?p=size&a=delete&SizeId=<?php echo $rsUser[$i]['SizeId']?>";
                                                    jQuery(this).dialog('close');
                                                },
                                                Cancel: function() {
                                                    jQuery(this).dialog('close');
                                                }
                                            }
                                        });
                                        
                                        jQuery('#modal_confirmation_link<?php echo $i?>').click(function(){
                                            jQuery('#modal_confirmation<?php echo $i?>').dialog('open');
                                            return false;
                                        });
                                    });
                                </script>
                                 <?php } ?>
                            </td>
                        </tr> 
                      	 <?php }else{ ?>
                         <tr>
							<td colspan="10" align="center" style="text-align:center;font-weight:bolder"><?php echo NO_RECORD?></td>
                         </tr>
						<?php } ?>
						</tbody>
                        </table>
                        </form>
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
					
                     <input type="button" class="ui-button float-right ui-state-default ui-corner-all" id="create-user" value="Add New Size" onclick="document.location.href='index.php?p=size&a=add'" >
               		<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
	</div>
</div>
<?php }elseif($a=="edit" || $a=="add"){ ?>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/validate.js"></script>
<script type="text/javascript">
$().ready(function() {
	// validate signup form on keyup and submit
	$("#FrmTestimonials").validate({
		rules: {
			Size: "required",
			
		messages: {
			Testimonials: "Please enter your Size"
		}
	}
	});
});

</script>
<div id="page-layout">
	<div id="page-content">
		<div id="page-content-wrapper">
			<div class="inner-page-title">
            <?php if($a == 'add'){?>
				<h2>Add Size</h2>
            <?php }else{?>
            	<h2>View Size/Edit Size</h2>
            <?php }?>
			</div>
			<div class="content-box">
               
                    <form onSubmit="return checkcity();" name="FrmTestimonials" id="FrmTestimonials" method="post" action="<?php echo $AbsoluteURLAdmin;?>manage.php">
                    <input type="hidden" name="chk" id="chk"> 
                    <input type="hidden" name="p" value="size">
                            <?php if($a == "edit"){ ?>
	                        <input type="hidden" name="SizeId" value="<?php echo $SizeId?>">
							<input type="hidden" name="a" value="update">                            
							<?php }else{ ?>
                            <input type="hidden" name="a" value="add"> 
                            <?php } ?>
                    	<ul>
                        	<li>
								<label  class="desc">
									Size:
								</label>
								
                                <input type="text" name="Size" id="Size"  class="field text small"  value="<?php echo viewtext($Size);?>" />
                               
                            </li>
                            <li>
                            	<div>
                                	<input name="submit" type="submit" class="ui-state-default ui-corner-all ui-button" value="Save" />&nbsp;&nbsp;<input name="button" type="button" class="ui-state-default ui-corner-all ui-button" onclick='if(confirm(&quot;Are you sure you want to cancel?\n\nThis will cancel any changes you have made and not yet saved!&quot;)) { document.location.href=&quot;index.php?p=size&quot;}' value="Cancel" />
                                </div>
                            </li>
                        </ul>
                    </form>
					<div class="clear"></div>
				</div>
		</div>
	</div>
</div>	         
<?php } ?>           
<?php if($a == "edit" || $_POST['a'] == 'add'){ ?>
<script type="text/javascript" language="javascript">
	$(document).ready(function() {
	   $('#tab1').css("display","none");
	   $('#tab2').css("display","block");
	});
</script>
<?php } ?>
<script type="text/javascript" language="javascript">
function checkdeletion(val) //for submitting form 
{	
	if(val != ''){
		document.getElementById('todo').value = val;
		document.frmdelmember.submit();
		return true;				
	}
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	/* Table Sorter */
	$("#sort-table")
	.tablesorter({
		widgets: ['zebra'],
		headers: { 
		            // assign the secound column (we start counting zero) 
		            0: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            }, 
		            // assign the third column (we start counting zero) 
		            5: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            } 
		        } 
	})
	
	.tablesorterPager({container: $("#pager")}); 
	
	$(".header").append('<span class="ui-icon ui-icon-carat-2-n-s"></span>');

	
});

 	/* Check all table rows */

var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "check_all"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "check_none"; }
}


</script>