 <?php
    $conn = mysqli_connect("localhost","root","","townofpablo");
    if(!$conn){
        die("Connessione fallita: ".mysqli_error());
    }

?>