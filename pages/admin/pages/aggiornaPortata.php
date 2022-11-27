<?php  
  session_start();
  require_once('../../connessione.php');
?>
<?php 
                
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['nome'];
        $description = $_POST['descrizione'];
        $price = $_POST['prezzo'];
        $current_image = $_POST['img'];
        $category = $_POST['tipologia'];
        

        
        $sql3 = "UPDATE Portata(nome,tipologia,descrizione,prezzo,img) SET 
            nome = '$title',
            tipologia = '$category',
            descrizione = '$description',
            prezzo = $price,
            img = '$image_name'
            
            WHERE id=$id
        ";

        //Execute the SQL Query
        $res3 = mysqli_query($conn, $sql3);

        if($res3==true){ 
            echo 'sdds';
            header('location:gestisciPortata.php');
        }
        else{
            echo 'sa';
            header('location: gestisciPortata.php');
        }

        
    }

?>


<html>
    <head>
        <title>Pannello di controllo</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    
    <body>
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql2 = "SELECT * FROM Portata WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                $row2 = mysqli_fetch_assoc($res2);

                $title = $row2['nome'];
                $description = $row2['descrizione'];
                $price = $row2['prezzo'];
                $current_image = $row2['img'];
                $current_category = $row2['tipologia'];

            }
            else{
                header('location: gestisciPortata.php');
            }
        ?>


        <div class="main-content">
            <div class="wrapper">
                <h1>Aggiorna portata</h1>
                <a href="../index.php">Torna alla dashboard</a>
                <br><br>

                <form action="aggiornaPortata.php" method="POST">
                    
                    <table class="tbl-30">

                        <tr>
                            <td>Nome: </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $title; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Descrizione: </td>
                            <td>
                                <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Prezzo: </td>
                            <td>
                                <input type="number" name="price" value="<?php echo $price; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Immagine: </td>
                            <td>
                            <input type="text" name="img" value="<?php echo $current_image; ?>">
                            </td>
                        </tr>


                        <tr>
                            <td>Categoria: </td>
                            <td>
                                <select name="category">
                                    <option>Hamburger</option>
                                    <option>Impossible Burgers</option>
                                    <option>Sandwiches</option>
                                    <option>Patatine fritte</option>
                                    <option>Milkshake</option>
                                    <option>Bevande</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                                <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                            </td>
                        </tr>
                    
                    </table>
                    
                </form>

                

            </div>
        </div>

    </body>
</html>