<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$report=loadVariable("report","");

?>	

<style type="text/css">
.hastable table a.btn span.ui-icon {
	left:0.2em;
}
</style>
<div id="sub-nav"><div class="page-title" >
        		<?php if(isset($val) && $val != ''){
					 	$header = $val;
					 }else{
					 	$header = 'Category Inventory';
					 }
					 ?>
			<h1><?php echo $header?></h1>
		</div>
</div>
<div id="page-layout">
	<div id="page-content">
			<div id="page-content-wrapper" style="width:100%; margin-left:-10px;">				<div style="margin-top:20px;">
				<b style="font-size:20px;">Gents Category Inventory:</b>
                	
					
                  <div class="hastable">
                 
                  <table id="sort-table" style="width:340px;"> 
						<thead> 
						<tr>
						    <th>SubCategory Name</th>
                            <th>Total Product</th>
                            
						</tr> 
						</thead> 
                       <tbody> 
                      
						<tr><td>Jackets/Sweater</td>
                        <td>6</td>
                        </tr>
                          <tr><td>Jeans</td>
                          <td>3</td>
                          </tr>
                            
                           <tr> <td>Trousers</td>
                           <td>0</td>
                           </tr>
                           <tr> <td>Track Pants</td>
                           <td>0</td>
                           </tr>
                            <tr><td>Track Suits</td>
                            <td>0</td>
                            </tr>
                           <tr><td>Kurtas</td>
                           <td>5</td>
                           </tr>
                            <tr><td>Shervani</td>
                            <td>0</td></tr>
                            <tr><td>Shirts</td>
                            <td>0</td></tr>
                           <tr> <td>T-Shirts(Collar)</td>
                            <td>9</td>
                        </tr>
                        <tr> <td style="color:#030303; font-size:15px;">Total Products</td>
                            <td style="color:#030303; font-size:15px;">24</td>
                        </tr>
 						</tbody>
                        </table>  
                        </div> 
                  </div>      
                        
                        <div style="margin-left:450px; margin-top:-330px;">
                        <b style="font-size:20px;">Ladies Category Inventory:</b>
                	
					
                  <div class="hastable">
                 
                  <table id="sort-table" style="width:340px;"> 
						<thead> 
						<tr>
						    <th>SubCategory Name</th>
                            <th>Total Product</th>
                            
						</tr> 
						</thead> 
                       <tbody> 
                      
						<tr><td>Jackets/Sweater</td>
                        <td>0</td>
                        </tr>
                          <tr><td>Sarees</td>
                          <td>3</td>
                          </tr>
                            
                           <tr> <td>Tops</td>
                           <td>5</td>
                           </tr>
                           <tr> <td>Jeans</td>
                           <td>0</td>
                           </tr>
                            <tr><td>Scarves</td>
                            <td>0</td>
                            </tr>
                           <tr><td>Capris</td>
                           <td>3</td>
                           </tr>
                            <tr><td>Dresses</td>
                            <td>1</td></tr>
                            <tr><td>Kurtas/Kurtis</td>
                            <td>2</td></tr>
                           <tr> <td>T-Shirts</td>
                            <td>7</td>
                        </tr>
                        <tr> <td>Shirts</td>
                            <td>0</td>
                        </tr>
                        <tr> <td>Shorts</td>
                            <td>0</td>
                        </tr>
                        <tr> <td>Skirts</td>
                            <td>0</td>
                        </tr>
                        <tr> <td>Cholis</td>
                            <td>2</td>
                        </tr>
                        <tr> <td>Track-Pants</td>
                            <td>0</td>
                        </tr>
                        <tr> <td style="color:#030303; font-size:15px;">Total Products</td>
                            <td style="color:#030303; font-size:15px;">23</td>
                        </tr>
 						</tbody>
                        </table>  
                        </div> </div>
               		<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
	</div>
</div>

