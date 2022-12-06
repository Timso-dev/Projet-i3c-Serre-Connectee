<?php
// Informations d'identification
define('DB_SERVER', '10.199.132.11:3306');
define('DB_USERNAME', 'greenhouse');
define('DB_PASSWORD', 'Qeg56$tyu');
define('DB_NAME', 'greenhousedb');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>