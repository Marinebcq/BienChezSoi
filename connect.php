
<?php
try{
    // Connexion à la bdd
    $dsn = 'mysql:host=localhost;dbname=Bienchezsoi';
    $db = new PDO($dsn, "root", "root");
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}