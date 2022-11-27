
	<?php
	if(isset($_SESSION['carrello'])){
	?>
		<div style="text-align: center" id="overlayCarello">
			<div class="limiter">
				<div class="container-login100">
					<div style="justify-content: center" class="wrap-login100">
						<form method="post" action="pages/checkout.php"> 
							<span class="login100-form-title" style="color:#ff7546">Carrello</span>
							
							<table class="table-responsive">
								<thead>
									<tr>
										<th style="padding-right: 20px;">Nome portata</th> 
										<th style="padding-right: 20px;" >Quantità</th> 
										<th style="padding-right: 20px;">Prezzo a portata</th> 
										<th style="padding-right: 20px;">Prezzo</th> 
									</tr>
								</thead>
								<tbody>
									<?php 
										
										$sql="SELECT * FROM portata WHERE id IN ("; 
													
												foreach($_SESSION['carrello'] as $id => $value) { 
													$sql.=$id.","; 
												} 
													
												$sql=substr($sql, 0, -1).") ORDER BY nome ASC"; 
												$query = $conn -> query($sql);
												$totalprice=0; 
												while($row = $query -> fetch_assoc()){ 
													$subtotal=$_SESSION['carrello'][$row['id']]['quantity']*$row['prezzo']; 
													$totalprice+=$subtotal; 
													
												?> 
													<tr> 
														<td style="padding-right: 20px;"><?php echo $row['nome'] ?></td> 
														<td style="padding-right: 20px;"><?php echo $_SESSION['carrello'][$row['id']]['quantity'] ?></td> 
														<td style="padding-right: 20px;">€<?php echo $row['prezzo'] ?></td> 
														<td style="padding-right: 20px;">€<?php echo $_SESSION['carrello'][$row['id']]['quantity']*$row['prezzo'] ?></td> 
														
													</tr> 
												<?php 
														
												} 
												$_SESSION['totale'] = $totalprice;
									?> 
								</tbody>
							</table>
							</br>
							<p style="color:Red">Prezzo totale: €<?php echo $totalprice ?></p>
							</br>
							<input type="submit" name="submit" class="btn btn-light" value="Ordina"></input>
						</form>
						<a href="index.php">
							<button class="close-button-form">
								<i class="fa fa-times" aria-hidden="true" style="color:red"></i>
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		else{
?>
			<div style="text-align: center" id="overlayCarello">
				<div class="limiter">
					<div class="container-login100">
						<div style="justify-content: center" class="wrap-login100">
							<span class="login100-form-title" style="color:#ff7546">Carrello</span>
							<p style="color:red">Il carrello è vuoto.</p>
							
							<a href="index.php">
								<button class="close-button-form">
									<i class="fa fa-times" aria-hidden="true" style="color:red"></i>
								</button>
							</a>
							<a href="index.php#hamburger">Aggiungi qualcosa al carrello</a>
						</div>
						
					</div>
				</div>
			</div>
<?php	} ?>