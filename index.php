<?php
    session_start();
    require_once('pages/connessione.php');

	if(isset($_GET['page'])){ 
          
        $pages=array("portate", "carrello"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
               
        }else{ 
              
            $_page="portate"; 
              
        } 
          
    }else{ 
          
        $_page="portate"; 
          
    } 
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MrBeast Burger</title>
        <link rel="icon" type="image/x-icon" href="img/favicon.svg">
        
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        
        <link href="css/styles.css" rel="stylesheet" />

    </head>
    <body id="page-top"> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav" >
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><img class="img-fluid" src="img/favicon.svg" alt="..." ></span>
                 <span class="d-none d-lg-block"><img class="img-fluid" src="img/mrbeast.png" alt="..." ></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <?php
                    if($_page =='carrello'){
                            ?> 
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#home"><h3 style="color: #8daeab"><b>Home</b></h3></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#hamburger"><h3 style="color: #8daeab"><b>Menù</b></h3></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#about"><h3 style="color: #8daeab"><b>Chi siamo</b></h3></a></li>
                    <?php 
                    }
                    else{
                        ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#home"><h3 style="color: #8daeab"><b>Home</b></h3></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#hamburger"><h3 style="color: #8daeab"><b>Menù</b></h3></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about"><h3 style="color: #8daeab"><b>Chi siamo</b></h3></a></li>
                    <?php
                    }
                    ?>
                    
                    <?php
                        if(!empty($_SESSION["user"])){
                            echo '
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="onPrenota()" href="#education"><h3 style="color: #8daeab">Prenota</h3></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="pages/listaOrdini.php"><h3 style="color: #8daeab">Ordini</h3></a></li>       
                            ';
                        }
                    ?>
                    
                    <li class="nav-item">
                        <?php
                            if(!empty($_SESSION['user'])){
                                if($_SESSION['user'] == "admin"){
                                    echo '
                                        <a class="nav-link js-scroll-trigger" style="color:red"  id="pannelloDiControlloTasto" href="pages/admin/index.php">Pannello di controllo</a>     
                                        <a class="nav-link js-scroll-trigger" id="registratiTasto" href="pages/logout.php">Esci</a>                                    
                                    ';
                                } 
                                else{
                                    echo '
                                        <a class="nav-link js-scroll-trigger" id="registratiTasto" href="pages/logout.php">Esci</a>                                                                            
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
            
            <div id="overlayLogin">
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login100-pic js-tilt" data-tilt>
                                <img src="img/jimmy-mrbeast.png" alt="IMG">
                            </div>

                            <form class="login100-form validate-form" method="POST" action="pages/accedi.php">
                                <span class="login100-form-title" style="color:#ff7546">Effettua l'accesso</span>

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesto un username valida">
                                    <input class="input100" type="text" name="username" placeholder="Username" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                </div>
                                

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesta una password">
                                    <input class="input100" type="password" name="pass" placeholder="Password" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                
                                <div class="container-login100-form-btn">
                                    <input type="submit" class="login100-form-btn" name="login" value="Accedi">
                                </div>

                                <div class="text-center p-t-136">
                                    <a class="txt2" href="#">
                                        <a class="txt2" onclick="onRegistrati()" href="#">Non sei ancora registrato?</a>
                                    </a>
                                </div>
                            </form>
                            <button class="close-button-form" onclick="off()">
                                <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="overlayRegistrati">
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100">
                            <div class="login100-pic js-tilt" style="top :1000px" data-tilt>
                                <img src="img/jimmy-mrbeast.png" alt="IMG">
                            </div> 

                            <form class="login100-form validate-form" method="POST" action="pages/registrati.php">
                                <span class="login100-form-title" style="color:#ff7546">Effettua la registrazione</span>

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesto un username valida">
                                    <input class="input100" type="text" name="username" placeholder="Username" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesto un nome valida">
                                    <input class="input100" type="text" name="nome" placeholder="Nome" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesto un cognome valida">
                                    <input class="input100" type="text" name="cognome" placeholder="Cognome" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesto un numero di telefono valido">
                                    <input class="input100" type="number" name="numTelefono" placeholder="Numero di telefono" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesta un email valida: ex@abc.xyz">
                                    <input class="input100" type="text" name="email" placeholder="Email" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                </div>

                                
                                <div class="wrap-input100 validate-input" data-validate = "E' richiesta una password">
                                    <input class="input100" type="password" name="pass" placeholder="Password" required>
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                
                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn">Registrati</button>
                                </div>

                                <div class="text-center p-t-136">
                                    <a class="txt2" href="#">
                                        <a class="txt2" onclick="onLogin()" href="#">Sei già registrato?</a>
                                    </a>
                                </div>
                            </form>
                            <button class="close-button-form" onclick="off()">
                                <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="overlayPrenota">
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100" style="width: 400px;">

                            <form class="login100-form validate-form" method="POST" action="pages/prenota.php">
                                <span class="login100-form-title" style="color:#ff7546">Prenotazione tavolo</span>

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesto un numero valido">
                                    <input class="input100" type="text" name="numPersone" placeholder="Numero persone">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                </div>
                                

                                <div class="wrap-input100 validate-input" data-validate = "E' richiesta una data di prenotazione">
                                    <input class="input100" type="date" name="data" placeholder="Data">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                    
                                <div class="container-login100-form-btn">
                                    <input type="submit" class="login100-form-btn" name="prenota" value="Prenota"></input>
                                </div>
                            </form>
                            <button class="close-button-form" onclick="off()">
                                <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            
            
            <?php
                if(!empty($_SESSION['user']))
                    echo 'Benvenuto '.$_SESSION['user'];
            ?>
        </nav>
        <!-- Page Content-->
        <?php
            if(!empty($_SESSION['user']))
                echo '<div class="container-fluid p-0">';
            else
                echo '<div style="text-align: center" class="container-fluid p-0">';
        ?>

        <?php 
            if($_page =='carrello'){
                require("pages/".$_page.".php");
            }
            else{
        ?>


            <section style="text-align: center" class="resume-section" id="home">
                <div class="resume-section-content">
                    <h1 style="color: #fadc70" class="mb-0">
                        MrBeast
                        <span style="color: #75d9fb">Burger</span>
                    </h1>
                    <div style="color: white" class="subheading mb-5">
                        Via Antonio Cantore, 23 · Genova, GE 16149  </br>(+39) 329 5358554 ·
                        <a style="color: #75d9fb" href="mailto:mrbeastburger@townofpablo.top">mrbeastburger@townofpablo.top</a>
                    </div>
                    <p class="lead mb-5">
                    Il 19 novembre 2020, i fan di MrBeast sono scesi nella città di Wilson, nella Carolina del Nord, a poche miglia dalla città natale di Jimmy, Greenville,
                    per godersi il primo ristorante gratuito al mondo.
                    MrBeast, username di Jimmy su youtube, e i suoi migliori amici, Chandler, Chris e Karl, hanno ospitato migliaia di fan durante un evento per l'inaugurazione di MrBeast Burger, regalando i propri panini 
                    a tutte le persone che si sarebbero presentate. 
                    I fan hanno vissuto un'esperienza unica con in regalo, oltre al pasto, marchi, confezioni, uniformi del proprietario e youtuber MrBeast. </br>
                    <a style="color: white" href="https://www.youtube.com/watch?v=dg2Ag3e8W-Q&ab_channel=MrBeast"><strong>Guarda il video su YouTube nel canale di MrBeast.</strong></a></p>
                    <div class="social-icons">
                        <a class="social-icon" href="https://www.instagram.com/mrbeastburger/"><i class="fab fa-instagram"></i></a>
                        <a class="social-icon" href="https://twitter.com/MrBeastBurger"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="https://www.facebook.com/mrbeastburger"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </section>
            
            <hr class="m-4" style="color: white;">

              
                <?php require("pages/".$_page.".php"); ?> 
        
            <hr class="m-4" style="color: white;">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    
                    <div style="text-align: center" class="subheading mb-5">
                        <h1 style="color: #fadc70" class="mb-0">
                            Chi è
                            <span style="color: #75d9fb">MrBeast?</span>
                        </h1> 
                    </div>
                    <div style="text-align: center">
                        <img src="img/jimmy-red-hoddie.png" class="img-thumbnail" style="background: none;border-radius: 60%;"> </img>
                    </div>
                    <p class="lead mb-5">
                    MrBeast è un pluripremiato content creator noto per i suoi video su youtube e le sue attività di beneficenza. 
                    Inizialmente si è appogiato a Virtual Dining Concepts per creare MrBeast Burger, rendendolo disponibile solo per la consegna negli Stati Uniti,
                    poi, per espandere i propri confini, si rivolse all'azienda Town Of Pablo per la realizzazione di un sistema di consegne e prenotazioni in Italia.
                    I clienti possono ordinare MrBeast Burger solo tramite il sito <a style="color: white" href="https://localhost/mrbeastburger.top"><strong>mrbeastburger.top</strong></a>.  
                    Il menu è accessibile solo tramite il sito e le portate ordinate vengono consegnate direttamente a casa tua.</p>
                    <div class="social-icons" style="text-align: center">
                        <a class="social-icon" href="https://www.instagram.com/mrbeast/"><i class="fab fa-instagram"></i></a>
                        <a class="social-icon" href="https://twitter.com/MrBeast"><i class="fab fa-twitter"></i></a>
                        <a class="social-icon" href="https://www.facebook.com/MrBeast6000"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </section>
            <div class="row p-0 m-0">
                <img class="col-lg-4 col-12 p-0 m-0" src="img/MrBeast-Friends-Image-1.jpeg" srcset="img/MrBeast-Friends-Image-1.jpeg 560w, img/MrBeast-Friends-Image-1.jpeg 300w, img/MrBeast-Friends-Image-1.jpeg 150w"> 
                <img class="col-lg-4 col-12 p-0 m-0" src="img/MrBeast-Friends-Image-2.jpeg" srcset="img/MrBeast-Friends-Image-2.jpeg 560w, img/MrBeast-Friends-Image-2.jpeg 300w, img/MrBeast-Friends-Image-2.jpeg 150w"> 
                <img class="col-lg-4 col-12 p-0 m-0" src="img/MrBeast-Friends-Image-3.jpeg" srcset="img/MrBeast-Friends-Image-3.jpeg 560w, img/MrBeast-Friends-Image-3.jpeg 300w, img/MrBeast-Friends-Image-3.jpeg 150w">
            </div>
        </div>
    <?php
        }
?>
        
        <div id="myModalAggS" class="modal fade">
			<div class="modal-dialog modal-confirm">
				<div class="modal-content">
					<div class="modal-header">
						<div class="icon-box">
							<i class="material-icons">&#xE876;</i>
						</div>				
						<h4 style="color: #82ce34;" class="modal-title w-100">Prodotto aggiunto correttamente</h4>	
					</div>
					<div class="modal-body">
						<p style="color: black" class="text-center">Il prodotto da te scelto è stato aggiunto al carrello.</p>
					</div>
					<div class="modal-footer">
                        <a href="index.php"><button style="width: 100%;" class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
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
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalAggS").modal("show");
                });
            </script>'; 
    }  
?>