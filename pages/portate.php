<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['carrello'][$id])){ 
              
            $_SESSION['carrello'][$id]['quantity']++; 
               
        }
        else{ 
              
            $sql_s="SELECT * FROM portata WHERE id={$id}"; 
			$query_s = $conn -> query($sql_s);	
            if($query_s -> num_rows != 0){ 
                  $row_s = $query_s -> fetch_assoc();
                $_SESSION['carrello'][$row_s['id']]=array( 
                        "quantity" => 1, 
                        "prezzo" => $row_s['prezzo'] 
                    ); 
                  
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 

    if(isset($_GET["action"]) && $_GET["action"] == "empty"){
        foreach($_SESSION["carrello"] as $keys => $values)
            unset($_SESSION["carrello"]);					
    }
  
?> 

            
<!-- Experience-->
<section class="resume-section" id="hamburger">
    <div class="resume-section-content">
        <h2 style="color: #f1384b" class="mb-5">Hamburger</h2>
        
                <?php
                    $query = "SELECT * FROM Portata WHERE tipologia='Hamburger'";
                    $risultato = $conn -> query($query);
                    if($risultato -> num_rows > 0){
                        while($row = $risultato -> fetch_assoc()){
            echo'
        <div style="float:right" class="flex-shrink-0">';
            if(!empty($_SESSION['user']))
                echo'<a href="index.php?page=prodotti&action=add&id='.$row['id'].'"><button class="w3-button w3-circle w3-teal"><i class="fa fa-plus" aria-hidden="true" style="color: white"></i></button></a>';
            if(!empty($_SESSION['user'])){
                echo' </div>
                <div class="d-flex align-items-start flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
            else{
                echo' </div>
                <div class="d-flex align-items-center flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
                        }
                    }
                ?>
    </div>
</section>

<section class="resume-section" id="impossibleBurgers">
    <div class="resume-section-content">
        <h2 style="color: #f1384b" class="mb-5">Impossible Burgers</h2>
        
                <?php
                    $query = "SELECT * FROM Portata WHERE tipologia='Impossible Burgers'";
                    $risultato = $conn -> query($query);
                    if($risultato -> num_rows > 0){
                        while($row = $risultato -> fetch_assoc()){
            echo'
        <div style="float:right" class="flex-shrink-0">';
            if(!empty($_SESSION['user']))
                echo'<a href="index.php?page=prodotti&action=add&id='.$row['id'].'"><button class="w3-button w3-circle w3-teal"><i class="fa fa-plus" aria-hidden="true" style="color: white"></i></button></a>';
            if(!empty($_SESSION['user'])){
                echo' </div>
                <div class="d-flex align-items-start flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
            else{
                echo' </div>
                <div class="d-flex align-items-center flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
                        }
                    }
                ?>
    </div>
</section>
        
<section class="resume-section" id="sandwiches">
    <div class="resume-section-content">
        <h2 style="color: #f1384b" class="mb-5">Sandwiches</h2>
        
                <?php
                    $query = "SELECT * FROM Portata WHERE tipologia='Sandwiches'";
                    $risultato = $conn -> query($query);
                    if($risultato -> num_rows > 0){
                        while($row = $risultato -> fetch_assoc()){
            echo'
        <div style="float:right" class="flex-shrink-0">';
            if(!empty($_SESSION['user']))
                echo'<a href="index.php?page=prodotti&action=add&id='.$row['id'].'"><button class="w3-button w3-circle w3-teal"><i class="fa fa-plus" aria-hidden="true" style="color: white"></i></button></a>';
            if(!empty($_SESSION['user'])){
                echo' </div>
                <div class="d-flex align-items-start flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
            else{
                echo' </div>
                <div class="d-flex align-items-center flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
                        }
                    }
                ?>
    </div>
</section>

<section class="resume-section" id="patatineFritte">
    <div class="resume-section-content">
        <h2 style="color: #f1384b" class="mb-5">Patatine Fritte</h2>
        
                <?php
                    $query = "SELECT * FROM Portata WHERE tipologia='Patatine fritte'";
                    $risultato = $conn -> query($query);
                    if($risultato -> num_rows > 0){
                        while($row = $risultato -> fetch_assoc()){
            echo'
        <div style="float:right" class="flex-shrink-0">';
            if(!empty($_SESSION['user']))
                echo'<a href="index.php?page=prodotti&action=add&id='.$row['id'].'"><button class="w3-button w3-circle w3-teal"><i class="fa fa-plus" aria-hidden="true" style="color: white"></i></button></a>';
                if(!empty($_SESSION['user'])){
                echo' </div>
                <div class="d-flex align-items-start flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
            else{
                echo' </div>
                <div class="d-flex align-items-center flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                    <div class="p-2">
                        <span class="text-primary">
                            <img class="img-thumbnail" style="background: none" src="'.$row['img'].'"></img>
                        </span>
                    </div>
                </div>';
            }
                        }
                    }
                ?>
    </div>
</section>

<section class="resume-section" id="milkshake">
    <div class="resume-section-content">
        <h2 style="color: #f1384b" class="mb-5">Milkshake</h2>
        
                <?php
                    $query = "SELECT * FROM Portata WHERE tipologia='Milkshake'";
                    $risultato = $conn -> query($query);
                    if($risultato -> num_rows > 0){
                        while($row = $risultato -> fetch_assoc()){
            echo'
        <div style="float:right" class="flex-shrink-0">';
            if(!empty($_SESSION['user']))
                echo'<a href="index.php?page=prodotti&action=add&id='.$row['id'].'"><button class="w3-button w3-circle w3-teal"><i class="fa fa-plus" aria-hidden="true" style="color: white"></i></button></a>';
        if(!empty($_SESSION['user'])){
            echo' </div>
            <div class="d-flex align-items-start flex-column justify-content-between">
                <div class="flex-grow-1">
                    <h3 class="mb-0">'.$row['nome'].'</h3>
                    <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                    <p>'.$row['descrizione'].'</p>
                </div>
            </div>';
        }
        else{
            echo' </div>
            <div class="d-flex align-items-center flex-column justify-content-between">
                <div class="flex-grow-1">
                    <h3 class="mb-0">'.$row['nome'].'</h3>
                    <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                    <p>'.$row['descrizione'].'</p>
                </div>
            </div>';
        }
                        }
                    }
                ?>
    </div>
</section>
<section class="resume-section" id="bevande">
    <div class="resume-section-content">
        <h2 style="color: #f1384b" class="mb-5">Bevande</h2>
                <?php
                    $query = "SELECT * FROM Portata WHERE tipologia='Bevande'";
                    $risultato = $conn -> query($query);
                    if($risultato -> num_rows > 0){
                        while($row = $risultato -> fetch_assoc()){
            echo'
        <div style="float:right" class="flex-shrink-0">';
            if(!empty($_SESSION['user']))
                echo'<a href="index.php?page=prodotti&action=add&id='.$row['id'].'"><button class="w3-button w3-circle w3-teal"><i class="fa fa-plus" aria-hidden="true" style="color: white"></i></button></a>';
            if(!empty($_SESSION['user'])){
                echo' </div>
                <div class="d-flex align-items-start flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                </div>';
            }
            else{
                echo' </div>
                <div class="d-flex align-items-center flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">'.$row['nome'].'</h3>
                        <div style="color: #fe9dbc" class="subheading mb-3">€'.$row['prezzo'].'</div>
                        <p>'.$row['descrizione'].'</p>
                    </div>
                </div>';
            }
                        }
                    }
                ?>
    </div>
</section>



<?php
    if(!empty($_SESSION['user']))
        echo'
            <a href="index.php?page=carrello" onclick="onCarrello()" style="position:fixed;right:30px;bottom:30px;"><button class="w3-button w3-circle" style="background-color: #a8ebe2;widht: 50px;height: 50px" id="carrelloBottone"><i class="fa fa-shopping-cart" aria-hidden="true" style="color: #8daeab"></i></button></a>   
        ';
?>
