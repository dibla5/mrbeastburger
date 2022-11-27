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
                <h1>Gestisci ordini</h1>

                        <br /><br /><br />
                        <br><br>

                        <table class="tbl-full">
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Data e ora ordine</th>
                                <th width="5%">Prezzo</th>
                                <th width="8%">Stato</th>
                                <th width="10%">Telefono</th>
                                <th width="10%">Username utente</th>
                                <th width="15%">Email</th>
                                <th width="10%">Indirizzo</th>
                                <th></th>
                            </tr>

                            <?php 
                                $sql = "SELECT * FROM Ordine ORDER BY id DESC";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);


                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res)){
                                        $id = $row['id'];
                                        $order_date = $row['dataOraOrdine'];
                                        $customer_address = $row['indirizzo'];
                                        $customer_name = $row['usernameUtente'];
                                        $price = $row['prezzo'];
                                        $status = $row['statoOrdine']; 
                                        $query = "SELECT * FROM Utente WHERE username = '$customer_name'";
                                        $res = $conn -> query($query);
 

                                        if($res -> num_rows > 0){
                                            while($row = $res -> fetch_assoc()){
                                                $customer_contact = $row['numTelefono'];
                                                $customer_email = $row['email'];
                                                
                                            }
                                        }
                                        
                                        ?>

                                            <tr>
                                                <td><?php echo $id; ?> </td>
                                                <td><?php echo $order_date; ?></td>
                                                <td><?php echo '€'.$price; ?></td>
                                        

                                                <td>
                                                    <?php 
                                                        if($status==1){
                                                            echo "<label style='color: blue;'>In preparazione</label>";
                                                        }
                                                        elseif($status==2)
                                                        {
                                                            echo "<label style='color: orange;'>In consegna</label>";
                                                        }
                                                        elseif($status==3)
                                                        {
                                                            echo "<label style='color: green;'><b>Consegnato</b></label>";
                                                        }
                                                        elseif($status==0)
                                                        {
                                                            echo "<label style='color: red;'>Cancellato</label>";
                                                        }
                                                    ?>
                                                </td>
                                                    
                                                <td><?php echo $customer_contact; ?></td>
                                                <td><?php echo $customer_name; ?></td>
                                                <td><?php echo $customer_email; ?></td>
                                                <td><?php echo $customer_address; ?></td>
                                                <td>
                                                    <a href="aggiornaOrdine.php?id=<?php echo $id; ?>" class="btn-secondary">Aggiorna ordine</a>
                                                </td>
                                            </tr>

                                        <?php

                                    }
                                }
                                else
                                {
                                    //Order not Available
                                    echo "<tr><td colspan='12' class='error'>Ordini non disponibili</td></tr>";
                                }
                            ?>

 
                        </table>
            </div>
    
        </div>

    </body>
</html>