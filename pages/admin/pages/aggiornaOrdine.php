<?php 
  session_start();
  require_once('../../connessione.php');
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div class="main-content">
    <div class="wrapper">
         <a href="../index.php">Torna alla dashboard</a>
        <h1>Aggiorna ordine</h1>
        <br><br>


        <?php 
            if(isset($_GET['id'])){
                $id=$_GET['id'];

                $sql = "SELECT * FROM Ordine ORDER BY id DESC";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1){
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
                       }
                }
            }
            else{
                header('location: gestisciOrdine.php');
            }
        
        ?>

        <form action="aggiornaOrdine.php" method="POST">
        
            <table class="tbl-30">

                <tr>
                    <td>Prezzo</td>
                    <td>
                        <b> € <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Stato ordine</td>
                    <td>
                        <select name="status">
                            <option <?php if($status==1){echo "Ordinato";} ?> value="Ordinato">Ordinato</option>
                            <option <?php if($status==2){echo "In preparazione";} ?> value="In preparazione">In preparazione</option>
                            <option <?php if($status==3){echo "Consegnato";} ?> value="Consegnato">Consegnato</option>
                            <option <?php if($status==0){echo "Cancellato";} ?> value="Cancellato">Cancellato</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Username utente: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Telefono: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Indirizzo consegna: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Aggiorna ordine" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $price = $_POST['price'];


                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                $sql2 = "UPDATE Ordine SET 
                    prezzo = $total,
                    statoOrdine = '$status',
                    usernameUtente = '$customer_name',
                    indirizzo = '$customer_address'
                    WHERE id=$id
                ";
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true){ 
                    header('location: gestisciOrdine.php');
                }
                else
                {
                    header('location: gestisciOrdine.php');
                }
            }
        ?>


    </div>
</div>
