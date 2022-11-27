<?php 
  session_start();
  require_once('../../connessione.php'); 
?>


<html>
    <head>
        <title>Pannello di controllo</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body>
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];

               
                $sql = "DELETE FROM Portata WHERE id=$id";
                $res = mysqli_query($conn, $sql);

                if($res==true){
                    header('location: ../gestionePortata.php');
                }
                else{ 
                    header('location: ../gestionePortata.php');
                }

                

            }
            else{
                header('location: gestionePortata.php');
            }

        ?>
    </body>
</html>