<?php
    session_start();
    require_once('connessione.php');
    
	$accountT = TRUE;
    $passwordT = TRUE; 

    if(isset($_POST['login'])){
        if(empty($_POST['username']) || empty($_POST['pass'])){
            header("location: ../index.php");
        }
        else{
            $query = "SELECT * FROM Utente";
            $risultato = $conn -> query($query);
 

            if($risultato -> num_rows > 0){
                while($row = $risultato -> fetch_assoc()){
                    if($row['username'] == $_POST['username']){
                        if($row['password'] == $_POST['pass']){

                            $_SESSION['user'] = $_POST['username'];
                            header("location: ../index.php");
                        }
                        else{
                            $passwordT = FALSE;
                        }
                    }
                    else{
                        $accountT = FALSE;
                    }
                }
            }
        }

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
    <body>
    <body id="page-top"> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav" >
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><img class="img-fluid" src="../img/favicon.svg" alt="..." ></span>
                <span class="d-none d-lg-block"><img class="img-fluid" src="../img/mrbeast.png" alt="..." ></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""><h3 style="color: #8daeab"><b>Home</b></h3></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""><h3 style="color: #8daeab"><b>Menù</b></h3></a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href=""><h3 style="color: #8daeab"><b>Chi siamo</b></h3></a></li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" onclick="onLogin()" id="accediTasto" name="accediTasto" href="#">Accedi</a>
                        <a class="nav-link">o</a>
                        <a class="nav-link js-scroll-trigger" onclick="onRegistrati()" name="registratiTasto" href="#">Registrati</a>
                    </li>
                </ul>    
            </div>
        </nav>

            <div id="myModalLogFU" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div style="background-color: red" class="icon-box">
                                <i class="material-icons">&#xE5CD;</i>
                            </div>					
                            <h4 style="color: red;" class="modal-title w-100">Accesso fallito</h4>	
                        </div>
                        <div class="modal-body">
                            <p style="color: black" class="text-center">Non esiste nessun account con questo username.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="../index.php" style="width: 100%"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" style="color: red" data-dismiss="modal">OK</button></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="myModalLogFP" style="text-align: center" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div style="background-color: red" class="icon-box">
                                <i class="material-icons">&#xE5CD;</i>
                            </div>					
                            <h4 style="color: red;" class="modal-title w-100">Accesso fallito</h4>	
                        </div>
                        <div class="modal-body">
                            <p style="color: black" class="text-center">La password inserita è errata.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="../index.php" style="width: 100%"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="myModalRegF" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div style="background-color: red" class="icon-box">
                                <i class="material-icons">&#xE5CD;</i>
                            </div>				
                            <h4 style="color: red" class="modal-title w-100">Registrazione fallita</h4>	
                        </div>
                        <div class="modal-body">
                            <p style="color: black" class="text-center">È successo qualcosa di strano. Riprova.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="../index.php"><button style="width: 100%;background-color: red;" class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
                        </div>
                    </div>
                </div>
            </div>

        <div style="text-align: center" class="container-fluid p-0">    
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
                        <img src="../img/jimmy-red-hoddie.png" class="img-thumbnail" style="background: none;border-radius: 60%;"> </img>
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
                <img class="col-lg-4 col-12 p-0 m-0" src="../img/MrBeast-Friends-Image-1.jpeg" srcset="../img/MrBeast-Friends-Image-1.jpeg 560w, ../img/MrBeast-Friends-Image-1.jpeg 300w, ../img/MrBeast-Friends-Image-1.jpeg 150w"> 
                <img class="col-lg-4 col-12 p-0 m-0" src="../img/MrBeast-Friends-Image-2.jpeg" srcset="../img/MrBeast-Friends-Image-2.jpeg 560w, ../img/MrBeast-Friends-Image-2.jpeg 300w, ../img/MrBeast-Friends-Image-2.jpeg 150w"> 
                <img class="col-lg-4 col-12 p-0 m-0" src="../img/MrBeast-Friends-Image-3.jpeg" srcset="../img/MrBeast-Friends-Image-3.jpeg 560w, ../img/MrBeast-Friends-Image-3.jpeg 300w, ../img/MrBeast-Friends-Image-3.jpeg 150w">
            </div>
        </div>

        
        <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
            <script src="../js/scripts.js"></script>
        <!--===============================================================================================-->	
            <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
            <script src="../vendor/bootstrap/js/popper.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
            <script src="../vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
            <script src="../vendor/tilt/tilt.jquery.min.js"></script>
        <!--===============================================================================================-->
            <script src="../js/main.js"></script> 
    </body>
</html>


    
    
        
<?php
    if(!$passwordT){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalLogFP").modal("show");
                });
            </script>';             
    }  
    else if(!$accountT){
        echo '<script type="text/javascript">
                $(document).ready(function(){
                    $("#myModalLogFU").modal("show");
                });
            </script>';             
    }
       
?>