			<!-- new-products -->
			<div class="new-products">
				<div class="container">
					<h3>Search Result</h3>
					<div class="agileinfo_new_products_grids">
						<?php 
						$query ="
						SELECT wine.*
						FROM wine WHERE WineName LIKE '%".$_POST['WineName']."%' ORDER BY WineUpdateDate";
						$result = mysql_query($query);
						$num_rows = mysql_num_rows($result);
						if($num_rows == 0){
							echo '<div class="alert alert-warning row container text-center" role="alert">
							<h1 class="col col-lg-5 col-offset-3">No records found</h1>
							</div>';
						}else{
							while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
								?>
								<div class="col-md-3 agileinfo_new_products_grid">
									<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
										<div class="hs-wrapper hs-wrapper1">
											<?php
											$imgResult = mysql_query("
												SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 6");
											while ($imgRow = mysql_fetch_array($imgResult, MYSQL_ASSOC)){
												echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
											} ?>

											<div class="w3_hs_bottom w3_hs_bottom_sub">
												<ul>
													<li>
														<a href="index.php?page=Details&&WineId=<?=$row['WineId']?>" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
													</li>
												</ul>
											</div>
										</div>
										<!-- <h5><a href="single.html">Skirts</a></h5> -->
										<?php echo  '<h5><a href="single.html">'.$row['WineName'].'</a></h5>';  ?>
										<div class="simpleCart_shelfItem">
											<?php 
											$sqlSelect = "
											SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine` WHERE `WineId` ='".$row['WineId']."' order by `TimeId` desc limit 1";

											$resultPrice = mysql_query($sqlSelect);
											while ($rowPrice=mysql_fetch_array($resultPrice,MYSQL_ASSOC)) 
											{
												?>
												<p><span><?php echo  "$".$rowPrice['PurchasePrice']?>

												</span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
												<?php 
											}
											if ($row['WineQuantity'] > 0) 
											{
												?>
												<p><a class="item_add" href="?action=checkout&&WineId=<?php echo  $row['WineId']?>">Add to card</a></p>
												<?php
											} else {
												?>
												<p><a class="item_add" href="#">Out of stock</a></p>
												<?php
											}
											?> 
										</div>
									</div>
								</div> 
								<?php }} ?>


								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				<!-- //new-products -->