<?php 
  session_start(); 
  require_once('../connessione.php');
?>  


<html>
    <head>
        <title>Pannello di controllo</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center" style="height:5%;padding-top: 20px">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="pages/gestisciPortata.php">Portate</a></li>
                    <li><a href="pages/gestisciOrdine.php">Ordini</a></li>
                    <li><a href="../pages/logout.php">Logout</a></li>
                </ul>
        </div>
        <!-- Menu Section Ends -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Pannello di controllo amministratore</h1>

            <div class="col-4 text-center">

                <?php 
                    $sql2 = "SELECT * FROM Portata";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                <br />
                Portate
            </div>

            <div class="col-4 text-center">
                
                <?php 
                    $sql3 = "SELECT * FROM ordine";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);
                ?>

                <h1><?php echo $count3; ?></h1>
                <br />
                Ordini totali
            </div>

            <div class="col-4 text-center">
                
                <?php 
                    $sql4 = "SELECT SUM(prezzo) AS PrezzoTotale FROM ordine WHERE statoOrdine=3";

                    $res4 = mysqli_query($conn, $sql4);

                    $row4 = mysqli_fetch_assoc($res4);
                    
                    $total_revenue = $row4['PrezzoTotale'];

                ?>

                <h1>€<?php if($total_revenue==null)
                                echo 0;
                            else
                                echo $total_revenue;  ?></h1>
                <br />
                Guadagni totali 
            </div>
        
            <div class="col-4 text-center">
                
                <?php 
                    $sql10 = "SELECT * FROM ordine WHERE statoOrdine = 3";
                    $res10 = mysqli_query($conn, $sql10);
                    $count10 = mysqli_num_rows($res10);
                ?>

                <h1><?php echo $count10; ?></h1>
                <br />
                Ordini completati
            </div>
            
            <div class="col-4 text-center">
                
                <?php 
                    $sql6 = "SELECT * FROM ordine WHERE statoOrdine = 2";
                    $res6 = mysqli_query($conn, $sql6);
                    $count6 = mysqli_num_rows($res6);
                ?>

                <h1><?php echo $count6; ?></h1>
                <br />
                Ordini spediti
            </div>

            <div class="col-4 text-center">
                
                <?php 
                    $sql7 = "SELECT * FROM ordine WHERE statoOrdine = 1";
                    $res7 = mysqli_query($conn, $sql7);
                    $count7 = mysqli_num_rows($res7);
                ?>

                <h1><?php echo $count7; ?></h1>
                <br />
                Ordini in preparazione
            </div>


            <div class="col-4 text-center">
                
                <?php 
                    $sql7 = "SELECT * FROM ordine WHERE statoOrdine = 0";
                    $res7 = mysqli_query($conn, $sql7);
                    $count7 = mysqli_num_rows($res7);
                ?>

                <h1><?php echo $count7; ?></h1>
                <br />
                Ordini cancellati
            </div>

        </div>
    </div>
    </body>
</html>