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

        <div class="main-content">
            <div class="wrapper">
                <h1>Aggiungi portate</h1>

                <br><br>

                <form action="aggiungiPortata.php" method="POST">
                
                    <table class="tbl-30">

                        <tr>
                            <td>Nome portata: </td>
                            <td>
                                <input type="text" name="title" placeholder="Nome della portata" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Descrizione: </td>
                            <td>
                                <textarea name="description" cols="30" rows="5" placeholder="Descrizione della portata"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Prezzo: </td>
                            <td>
                                <input type="number" name="price" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Allergeni: </td>
                            <td>
                                <textarea name="allergens" cols="30" rows="5" placeholder="Eventuali allergeni della portata"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Seleziona immagine: </td>
                            <td>
                                <input type="file" name="image">
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
                            <td colspan="2">
                                <input type="submit" name="submit" value="Aggiungi" class="btn-secondary">
                            </td>
                        </tr>

                    </table>

                </form>

                
                <?php 

                    //CHeck whether the button is clicked or not
                    if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $allergens = $_POST['allergens'];
                        $price = $_POST['price'];
                        $category = $_POST['category'];


                        if(isset($_FILES['image']['name'])){
                            $image_name = $_FILES['image']['name'];

                            if($image_name!=""){
                                $ext = end(explode('.', $image_name));

                                $image_name = "portata-".rand(0000,9999).".".$ext;

                                $src = $_FILES['image']['tmp_name'];

                                $dst = "../images/food/".$image_name;

                                $upload = move_uploaded_file($src, $dst);

                                if($upload==false){
                                    $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                                    header('location: aggiungiPortata.php');
                                    die();
                                }

                            }

                        }
                        else
                        {
                            $image_name = ""; 
                        }
                        $id = rand(0000,9999);
                        $sql2 = "INSERT INTO Portata SET 
                            id = $id,
                            nome = '$title',
                            prezzo = $price,
                            tipologia = '$category',
                            descrizione = '$description',
                            allergeni = '$allergens',
                            img = '$image_name'
                            
                        ";

                        $res2 = mysqli_query($conn, $sql2);

                        if($res2 == true){
                            $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                            header('location: gestisciPortata.php');
                        }
                        else{
                            $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                            header('location: gestisciPortata.php');
                        }

                        
                    }

                ?>


            </div>
        </div>
    </body>
</html>