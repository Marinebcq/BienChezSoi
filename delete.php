<?php
include("templates/header.php");
$dsn = 'mysql:host=localhost;dbname=Bienchezsoi';
$db = new PDO($dsn, "root", "root");

if (isset($_GET['id']) && isset($_GET['categorie'])) {
    $id = $_GET['id'];
    $categorie = $_GET['categorie'];

    switch ($categorie) {
        case 'chaises':
            $sql = "DELETE FROM chaises WHERE id = :id";
            break;
        case 'bureau':
            $sql = "DELETE FROM bureau WHERE id = :id";
            break;
        case 'tables':
            $sql = "DELETE FROM tables WHERE id = :id";
            break;
        default:
            echo "Catégorie non reconnue.";
            exit;
    }

    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header('Location: index.php');
    exit;
} else {
    echo "Paramètres manquants.";
    exit;
}
?>
