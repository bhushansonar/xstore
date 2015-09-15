<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$PackageID = loadVariable("PackageID",0);
$PackageName = loadVariable('PackageName','');
$PFeature = loadVariable('PFeature','');
$SPackage = loadVariable('SPackage','');
$GPackage = loadVariable('GPackage','');
$PPackage = loadVariable('PPackage','');
$SPrice = loadVariable('SPrice','');
$GPrice = loadVariable('GPrice','');
$PPrice = loadVariable('PPrice','');
$Includes = loadVariable('Includes','');
$WYRecieve = loadVariable('WYRecieve','');
$SDesc = loadVariable('SDesc','');
$SPTerms = loadVariable('SPTerms','');
$GIncludes = loadVariable('GIncludes','');
$GWYRecieve = loadVariable('GWYRecieve','');
$GDesc = loadVariable('GDesc','');
$GPTerms = loadVariable('GPTerms','');
$PIncludes = loadVariable('PIncludes','');
$PWYRecieve = loadVariable('PWYRecieve','');
$PDesc = loadVariable('PDesc','');
$PPTerms = loadVariable('PPTerms','');
$Silver = loadVariable('Silver','');
$Gold = loadVariable('Gold','');
$Platinum = loadVariable('Platinum','');
$SQL = "SELECT * FROM admin WHERE AdminID='".$_SESSION['session_adminID']."'";
$rsAdmin = $objDB->select($SQL);

if ($a=="") $a='list';

if ($a=="edit") {
	if ($PackageID!=0) {
		$SQL="select * from packages where PackageID =".$PackageID;
		$rsUser = $objDB->select($SQL);
		if (count($rsUser)>0) {
			$PackageID = $rsUser[0]["PackageID"];
			$PackageName = $rsUser[0]["PackageName"];
			$SPrice = $rsUser[0]["SPrice"];
			$GPrice = $rsUser[0]["GPrice"];
			$PPrice = $rsUser[0]["PPrice"];
			$Includes = viewtext($rsUser[0]["Includes"]);
			$WYRecieve = viewtext($rsUser[0]["WYRecieve"]);
			$SDesc = viewtext($rsUser[0]["SDesc"]);
			$SPTerms = viewtext($rsUser[0]["SPTerms"]);
			$GIncludes = viewtext($rsUser[0]["GIncludes"]);
			$GWYRecieve = viewtext($rsUser[0]["GWYRecieve"]);
			$GDesc = viewtext($rsUser[0]["GDesc"]);
			$GPTerms  = viewtext($rsUser[0]["GPTerms"]);
			$PIncludes  = viewtext($rsUser[0]["PIncludes"]);
			$PWYRecieve  = viewtext($rsUser[0]["PWYRecieve"]);
			$PDesc  = viewtext($rsUser[0]["PDesc"]);
			$PPTerms  = viewtext($rsUser[0]["PPTerms"]);
			$Silver  = $rsUser[0]["Silver"];
			$Gold = $rsUser[0]["Gold"];
			$Platinum = $rsUser[0]["Platinum"];
		}
	}
}
if ($a=="list") {
	$SQL="select * from packages Where 1=1 order by PackageID DESC";
	$rsUser = $objDB->select($SQL);
?>
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
<style type="text/css">
.hastable table a.btn span.ui-icon {
	left:0.2em;
}
</style>
<div id="sub-nav"><div class="page-title">
        		<?php if(isset($val) && $val != ''){
					 	$header = $val;
					 }else{
					 	$header = 'Manage Packages';
					 }
					 ?>
			<h1><?php echo $header?></h1>
		</div>
</div>
<div id="page-layout">
	<div id="page-content">
			<div id="page-content-wrapper">
				<div class="inner-page-title">
					<h2>Package List<div style="float:right; font-size:16px;">
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
                        <!--<p> <button type="button" id="deleteall_msg" class="ui-state-default ui-corner-all ui-button">Delete All</button></p>-->
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
                            <th><input type="checkbox"  name="checkall" id="checkall" value="1" onClick="return checkAll(this.id);" /></th>
						    <th>Package Name</th>
                            <th>Silver (Price$)</th>
                            <th>Gold (Price$)</th>
                            <th>Pletinum (Price$)</th>
							<th style="width:128px">Options</th> 
						</tr> 
						</thead> 
                       <tbody> 
                      <?php if(!empty($rsUser)){ ?>
                        <?php for($i=0;$i<count($rsUser);$i++){ ?>
						<tr>
							<td class="center"><input name="multipledel[]" type="checkbox" id="multipledel[]" value="<?php echo $rsUser[$i]['PackageID']?>"></td> 
                            <td><?php echo viewtext($rsUser[$i]['PackageName']);?></td>
                            <td><?php echo $rsUser[$i]['SPrice'];?></td>
                            <td><?php echo $rsUser[$i]['GPrice'];?></td>
                            <td><?php echo $rsUser[$i]['PPrice'];?></td>
                           <td><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=package&a=edit&PackageID=<?php echo $rsUser[$i]['PackageID']?>" title="Edit" style="float:left" class="btn_no_text btn ui-state-default ui-corner-all tooltip"><span class="ui-icon ui-icon-wrench"></span></a>
                           		<!--<a id="modal_confirmation_link<?php echo $i?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" href="javascript:void(0);" title="Delete"><span class="ui-icon ui-icon-circle-close"></span></a>-->
								 <?php if($rsUser[$i]['Status'] == '1'){?>
                                    <a href="<?php echo $AbsoluteURLAdmin;?>manage.php?p=package&a=status&s=0&PackageID=<?php echo $rsUser[$i]['PackageID']?>" title="Deactivate" class="btn_no_text btn ui-state-default ui-corner-all tooltip"><span class="ui-icon ui-icon-radio-on"></span></a>
                                 <?php }else{ ?>
                                    <a href="<?php echo $AbsoluteURLAdmin;?>manage.php?p=package&a=status&s=1&PackageID=<?php echo $rsUser[$i]['PackageID']?>" title="Activate" class="btn_no_text btn ui-state-default ui-corner-all tooltip"><span class="ui-icon ui-icon-bullet"></span></a>
                                 <?php } ?>
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
                                                    document.location.href="<?php echo $AbsoluteURLAdmin;?>manage.php?p=package&a=delete&PackageID=<?php echo $rsUser[$i]['PackageID']?>";
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
					</form>
                     <input type="button" class="ui-button float-right ui-state-default ui-corner-all" id="create-user" value="Add New Packages" onClick="document.location.href='index.php?p=package&a=add'" >
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
	$("#FrmPackages").validate({
		rules: {
			PackageName: "required",
			Includes: "required",
			WYRecieve: "required",
			SDesc: "required",
			SPTerms: "required",
			GIncludes: "required",
			GWYRecieve: "required",
			GDesc: "required",
			GPTerms: "required",
			PIncludes: "required",
			PWYRecieve: "required",
			PDesc: "required",
			PPTerms: "required",
			'PFeature[]': {  //since it has brackets, the name must be in quotes to work
				 required: true,
				 minlength: 1
			},
			'SPackage[]': {  //since it has brackets, the name must be in quotes to work
				 required: true,
				 minlength: 1
			},
			'GPackage[]': {  //since it has brackets, the name must be in quotes to work
				 required: true,
				 minlength: 1
			},
			'PPackage[]': {  //since it has brackets, the name must be in quotes to work
				 required: true,
				 minlength: 1
			},
			SPrice: {
				required: true,
      			number: true
			},	
			GPrice: {
				required: true,
      			number: true
			},
			PPrice: {
				required: true,
      			number: true
			},
		messages: {
			PackageName: "Please enter your package name."
		}
	}
	});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
 	//var counter = 2;
    var counter = document.getElementById('take_count').value;
 	counter = parseInt(counter)+1;
		jQuery("#addButton").click(function () {
			/*if(counter>10){
				alert("Only 10 textboxes allow");
				return false;
			}*/   
			var newTextBoxDiv = jQuery(document.createElement('div'))
			.attr("id", 'TextBoxDiv' + counter);
			newTextBoxDiv.html('<li><label class="desc">Package Features '+ counter +'</label><div><input type="text" name="PFeature[]" id="PFeature" class="field text medium" value=""></div></li><div><li style="width:90px; float:left; clear:none"><label class="desc" style="width:90px">Silver Pack</label><div style="width:300px;"><select name="SPackage[]" id="SPackage[]" class="field select small"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></li></div><div><li style="width:90px; float:left; clear:none"><label class="desc" style="width:90px">Gold Pack</label><div style="width:300px;"><select name="GPackage[]" id="GPackage[]" class="field select small"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></li></div><div><li style="width:90px; float:left; clear:none"><label class="desc" style="width:90px">Platinum Pack</label><div style="width:300px;"><select name="PPackage[]" id="PPackage[]" class="field select small"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></li></div>');
			newTextBoxDiv.appendTo("#TextBoxesGroup");
			counter++;
    	});
 		jQuery("#removeButton").click(function () {
			if(counter==2){
				alert("No more textbox to remove");
				return false;
			}   
 			counter--;
        	jQuery("#TextBoxDiv" + counter).remove();
 		});
 		jQuery("#getButtonValue").click(function () {
		var msg = '';
		for(i=1; i<counter; i++){
			msg += "\n Textbox #" + i + " : " + jQuery('#textbox' + i).val();
		}
		 alert(msg);
	});
});
</script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>ckeditor/ckeditor.js"></script>
<div id="page-layout">
	<div id="page-content">
		<div id="page-content-wrapper">
			<div class="inner-page-title">
            <?php if($a == 'add'){?>
				<h2>Add Packages</h2>
            <?php }else{?>
            	<h2>View Packages/Edit Packages</h2>
            <?php }?>
			</div>
			<div class="content-box">
               <form name="FrmPackages" id="FrmPackages" method="post" action="<?php echo $AbsoluteURLAdmin;?>manage.php">
                    <input type="hidden" name="chk" id="chk"> 
                    <input type="hidden" name="p" value="package">
                    <input size="100" class="pt_input_text" type="hidden" value="0" name="dswtthemes_take_count" id="take_count"/>
                    <?php if($a == "edit"){ ?>
                        <input type="hidden" name="PackageID" value="<?php echo $PackageID?>">
                        <input type="hidden" name="a" value="update">                            
                    <?php }else{ ?>
                        <input type="hidden" name="a" value="add"> 
                    <?php } ?>
                    	<ul>
                        	<li>
								<label  class="desc">
									Package Name  
								</label>
								<div>
                                <input type="text" name="PackageName" id="PackageName"  class="field text medium"  value="<?php echo viewtext($PackageName);?>" />
                               </div>
                            </li>
                            <div>
                                    <li style="width:90px; float:left; clear:none">
                                        <label  class="desc" style="width:90px">
                                            Silver Pack
                                        </label>
                                        <div style="width:300px;">
                                        <input type="checkbox" name="Silver" id="Silver" value="1"<?php if($Silver == 1){?> checked="checked"<?php }?>/>
                                       </div>
                                    </li>
                                    </div>
                            <div>
                                <li style="width:90px; float:left; clear:none">
                                    <label  class="desc" style="width:90px">
                                        Gold Pack
                                    </label>
                                    <div style="width:300px;">
                                    <input type="checkbox" name="Gold" id="Gold" value="1"<?php if($Gold == 1){?> checked="checked"<?php }?>/>
                                   </div>
                                </li>
                                
                                </div>
                            <div>
                                <li style="width:90px; float:left; clear:none">
                                    <label  class="desc" style="width:90px">
                                        Platinum Pack
                                    </label>
                                    <div style="width:300px;">
                                    <input type="checkbox" name="Platinum" id="Platinum" value="1" <?php if($Platinum == 1){?> checked="checked"<?php }?>/>
                                   </div>
                                </li>
                                </div>
                            <div id="TextBoxesGroup">
                                <div id="TextBoxDiv0">  
                                <?php
									$SQL = "SELECT * FROM packfeatures WHERE PackageID='".$PackageID."' ORDER BY FeaturesID ASC";
									$rsPack = $objDB->select($SQL);
									if($a!='edit'){
										$rsPack = 1;
									}
								?>
                                <?php 
									for($i=0;$i<count($rsPack);$i++){
								?>
                                	<input type="hidden" name="FeaturesID[]" id="FeaturesID" value="<?php echo $rsPack[$i]['FeaturesID'];?>" />
                            		<li>
                                        <label  class="desc">
                                            Package Features <?php if($i!=0){echo $i;}?>
                                        </label>
                                        <div>
                                        <input type="text" name="PFeature[]" id="PFeature[]" class="field text medium" value="<?php echo viewtext($rsPack[$i]['PFeature']);?>">
                                       </div>
                                	</li>
                                    <div>
                                    <li style="width:90px; float:left; clear:none">
                                        <label  class="desc" style="width:90px">
                                            Silver Pack
                                        </label>
                                        <div style="width:300px;">
                                        <select name="SPackage[]" id="SPackage[]" class="field select small">
                                        	<option value="">Select</option>
                                            <option value="1" <?php if($rsPack[$i]['SPackage'] == '1'){?> selected="selected"<?php }?>>Yes</option>
                                            <option value="0" <?php if($rsPack[$i]['SPackage'] == '0'){?> selected="selected"<?php }?>>No</option>
                                        </select>
                                        <!--<input type="checkbox" name="SPackage[]" id="SPackage[]" value="Silver" <?php if($rsPack[$i]['SPackage'] == '1'){?> checked="checked"<?php }?>>--> 
                                       </div>
                                    </li>
                                    </div>
                                    <div>
                                    <li style="width:90px; float:left; clear:none">
                                        <label  class="desc" style="width:90px">
                                            Gold Pack
                                        </label>
                                        <div style="width:300px;">
                                        <select name="GPackage[]" id="GPackage[]" class="field select small">
                                        	<option value="">Select</option>
                                            <option value="1" <?php if($rsPack[$i]['GPackage'] == '1'){?> selected="selected"<?php }?>>Yes</option>
                                            <option value="0" <?php if($rsPack[$i]['GPackage'] == '0'){?> selected="selected"<?php }?>>No</option>
                                        </select>
                                       </div>
                                    </li>
                                    
                                    </div>
                                    <div>
                                    <li style="width:90px; float:left; clear:none">
                                        <label  class="desc" style="width:90px">
                                            Platinum Pack
                                        </label>
                                        <div style="width:300px;">
                                        <select name="PPackage[]" id="PPackage[]" class="field select small">
                                        	<option value="">Select</option>
                                            <option value="1" <?php if($rsPack[$i]['PPackage'] == '1'){?> selected="selected"<?php }?>>Yes</option>
                                            <option value="0" <?php if($rsPack[$i]['PPackage'] == '0'){?> selected="selected"<?php }?>>No</option>
                                        </select>
                                       </div>
                                    </li>
                                    </div>
                                	<?php }?>
                                </div>
                            </div>   
                            <li><button name="addButton" id="addButton" type="button" class="ui-state-default ui-corner-all ui-button">Add Another Features</button></li>
                            <li>
								<label  class="desc">
								Silver Pack	Price($)
								</label>
								<div>
                                <input type="text" name="SPrice" id="SPrice" class="field text small " value="<?php echo $SPrice;?>">
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Silver Pack	Description
								</label>
								<div>
                                <textarea type="text" name="SDesc" id="SDesc" class="field textarea small ckeditor"  style="width:50%; height:100px;"><?php echo $SDesc;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Silver Pack(Includes)
								</label>
								<div>
                                <textarea name="Includes" id="Includes"  style="width:50%; height:100px;" class="ckeditor"><?php echo $Includes;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Silver Pack(What You Receive)
								</label>
								<div>
                                <textarea name="WYRecieve" id="WYRecieve"  style="width:50%; height:100px;" class="ckeditor"><?php echo $WYRecieve;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Silver Pack(Payments Terms)
								</label>
								<div>
                                <textarea name="SPTerms" id="SPTerms"  style="width:50%; height:100px;" class="ckeditor"><?php echo $SPTerms;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Gold Pack Price($)
								</label>
								<div>
                                <input type="text" name="GPrice" id="GPrice" class="field text small" value="<?php echo $GPrice;?>">
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Gold Pack Description
								</label>
								<div>
                                <textarea type="text" name="GDesc" id="GDesc"  style="width:50%; height:100px;" class="ckeditor"><?php echo $GDesc;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Gold Pack(Includes)
								</label>
								<div>
                                <textarea name="GIncludes" id="GIncludes"  style="width:50%; height:100px;" class="ckeditor"><?php echo $GIncludes;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Gold Pack(What You Receive)
								</label>
								<div>
                                <textarea name="GWYRecieve" id="GWYRecieve"  style="width:50%; height:100px;" class="ckeditor"><?php echo $GWYRecieve;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Gold Pack(Payments Terms)
								</label>
								<div>
                                <textarea  name="GPTerms" id="GPTerms"  style="width:50%; height:100px;" class="ckeditor"><?php echo $GPTerms;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Pletinum Pack Price($)
								</label>
								<div>
                                <input type="text" name="PPrice" id="PPrice" class="field text small" value="<?php echo $PPrice;?>">
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Pletinum Pack Description
								</label>
								<div>
                                <textarea type="text" name="PDesc" id="PDesc"  style="width:50%; height:100px;" class="ckeditor"><?php echo $PDesc;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Pletinum Pack(Includes)
								</label>
								<div>
                                <textarea name="PIncludes" id="PIncludes"  style="width:50%; height:100px;" class="ckeditor"><?php echo $PIncludes;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Pletinum Pack(What You Receive)
								</label>
								<div>
                                <textarea name="PWYRecieve" id="PWYRecieve"  style="width:50%; height:100px;" class="ckeditor"><?php echo $PWYRecieve;?></textarea>
                               </div>
                            </li>
                            <li>
								<label  class="desc">
								Pletinum Pack(Payments Terms)
								</label>
								<div>
                                <textarea name="PPTerms" id="PPTerms"  style="width:50%; height:100px;" class="ckeditor"><?php echo $PPTerms;?></textarea>
                               </div>
                            </li>
                            <li>
                            	<div>
                                	<input name="submit" type="submit" class="ui-state-default ui-corner-all ui-button" value="Save" />&nbsp;&nbsp;<input name="button" type="button" class="ui-state-default ui-corner-all ui-button" onclick='if(confirm(&quot;Are you sure you want to cancel?\n\nThis will cancel any changes you have made and not yet saved!&quot;)) { document.location.href=&quot;index.php?p=package&quot;}' value="Cancel" />
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