<?php 
  session_start(); 
  require_once('../../connessione.php');
?>
 

<html>
    <head>
        <title>Pannello di controllo</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    
    <body>
        <div class="main-content">
            <div class="wrapper">
            <a href="../index.php">Torna alla dashboard</a>
                <h1>Gestione portate</h1>

                <br /><br />
                        <br /><br /><br />
                        <table class="tbl-full">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Prezzo</th>
                                <th>Categoria</th>
                                <th></th>
                            </tr>

                            <?php 
                                $sql = "SELECT * FROM Portata";


                                $res = $conn -> query($sql);

                                if($res -> num_rows > 0){

                                    while($row = $res -> fetch_assoc()){
                                        $id = $row['id'];
                                        $title = $row['nome'];
                                        $price = $row['prezzo'];
                                        $image_name = $row['img'];
                                        $type = $row['tipologia'];
                                        ?>

                                        <tr>
                                            <td><?php echo $id; ?>. </td>
                                            <td><?php echo $title; ?></td>
                                            <td>€<?php echo $price; ?></td>
                                            <td><?php echo $type?></td>
                                            <td>
                                                <a href="aggiornaPortata.php?id=<?php echo $id; ?>" class="btn-secondary">Aggiorna portata</a>
                                                <a href="rimuoviPortata.php?id=<?php echo $id; ?>" class="btn-danger">Rimuovi portata</a>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //Food not Added in Database
                                    echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                                }

                            ?>

                            
                        </table>
                        
            </div>
            
        </div>
    </body>
</html>