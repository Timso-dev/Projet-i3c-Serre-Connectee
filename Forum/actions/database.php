<?php
try{
    $bdd = new PDO('mysql:host=10.199.132.11:3306;dbname=greenhousedb;charset=utf8;', 'greenhouse', 'Qeg56$tyu');
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
