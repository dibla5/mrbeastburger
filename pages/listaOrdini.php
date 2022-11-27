<?php 
    session_start();
    require_once('connessione.php');  
    
    $user = $_SESSION['user']; 
?>  

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MrBeast Burger</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.svg">

        
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../css/util.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">

        <link href="../css/styles.css" rel="stylesheet" />

    </head>
    <body id="page-top"> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav" >
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><img class="img-fluid" src="../img/favicon.svg" alt="..." ></span>
                <span class="d-none d-lg-block"><img class="img-fluid" src="../img/mrbeast.png" alt="..." ></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.php#home"><h3 style="color: #8daeab"><b>Home</b></h3></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.php#hamburger"><h3 style="color: #8daeab"><b>Menù</b></h3></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.php#about"><h3 style="color: #8daeab"><b>Chi siamo</b></h3></a></li>
                    
                    <?php
                        if(!empty($_SESSION["user"])){
                            echo '
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="onPrenota()" href="#education"><h3 style="color: #8daeab">Prenota</h3></a></li> 
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="listaOrdini.php"><h3 style="color: #8daeab">Ordini</h3></a></li>        
                            ';
                        }
                    ?>
                    
                    <li class="nav-item">
                        <?php
                            if(!empty($_SESSION['user'])){
                                if($_SESSION['user'] == "admin"){
                                    echo '
                                        <a class="nav-link js-scroll-trigger" style="color:red"  id="pannelloDiControlloTasto" href="pages/admin/index.php">Pannello di controllo</a>     
                                        <a class="nav-link js-scroll-trigger" id="registratiTasto" href="logout.php">Esci</a>                                    
                                    ';
                                } 
                                else{
                                    echo '
                                        <a class="nav-link js-scroll-trigger" id="registratiTasto" href="logout.php">Esci</a>                                                                            
                                    '; 
                                }
                            }
                            else{
                                echo' 
                                    <a class="nav-link js-scroll-trigger" onclick="onLogin()" id="accediTasto" name="accediTasto" href="#">Accedi</a>
                                    <a class="nav-link">o</a>
                                    <a class="nav-link js-scroll-trigger" onclick="onRegistrati()" name="registratiTasto" href="#">Registrati</a>
                                ';
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
        <div style="text-align: center" id="overlayCarello">
			<div class="limiter">
				<div class="container-login100" style="background-image: url('../img/burgers-mrbeast.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
					<div style="justify-content: center" class="wrap-login100">
                        <span class="login100-form-title" style="color:#ff7546">Informazione dell'ordine</span>
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <?php
                                        $query = "SELECT * FROM Ordine WHERE usernameUtente='$user'";
                                        $risultato = $conn -> query($query);
                                        if($risultato -> num_rows > 0){
                                            while($row = $risultato -> fetch_assoc()){?>
                                                <th style="padding-right: 20px;" ><strong style="color: red">ID Ordine</strong>:</br><?php echo $row['id']; ?></input></th>
                                                <th style="padding-right: 20px;" ><strong style="color: red">Data e ora ordinazione</strong>:</br><?php echo $row['dataOraOrdine']; ?></th>
                                                <th style="padding-right: 20px;" ><strong style="color: red">Indirizzo</strong>:</br><?php echo $row['indirizzo']; ?></th>
                                                <th style="padding-right: 20px;" ><strong style="color: red">Stato ordine</strong>:</br>
                                                    <?php 
                                                        if($row['statoOrdine']==0)
                                                            echo 'Cancellato';
                                                        else if($row['statoOrdine']==1)
                                                            echo 'In preparazione';
                                                        else if($row['statoOrdine']==2)
                                                            echo 'Spedito'; 
                                                        else if($row['statoOrdine']==3)
                                                            echo 'Consegnato';
                                                    ?>
                                                </th>
                                            <?php
                                            }
                                        }
                                        ?>	 
                                </tr>
                            </thead>
                            
                            <div class="col-md-6">
                            </div>
                        </table>
						<a href="../index.php">
							<button class="close-button-form">
								<i class="fa fa-times" aria-hidden="true" style="color:red"></i>
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>

        <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
        <!--===============================================================================================-->	
            <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/bootstrap/js/popper.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
            <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <!--===============================================================================================-->
            <script src="js/main.js"></script>

    </body>
</html>

<?php
    if($ordinato){

    }
    else{

    }
?>