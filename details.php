<link rel="stylesheet" href="../bienchezsoi/css/details.css">

<?php
include("templates/header.php");
require_once('connect.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $categorie = $_GET['table'];
    $id_produit = $_GET['id'];


    $queryProduit = $db->prepare("SELECT * FROM $categorie WHERE id = :id");

    $queryProduit->bindParam(':id', $id_produit, PDO::PARAM_INT);

    $produit = null; 

    if ($queryProduit->execute()) {
        $produit = $queryProduit->fetch(PDO::FETCH_ASSOC);
        
    } 

    if ($produit) {
        ?>
        <h1>Détails du produit</h1>
       
        <p>Nom : <?= $produit['nom'] ?></p>
        <p>Marque : <?= $produit['marque'] ?></p>
        <p>Prix : <?= $produit['prix'] ?></p>

        <button> 
        <a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a>
        </button>
        <?php
    } else {
        echo "Le produit avec l'ID $id_produit n'existe pas.";
    }

} else {
    echo "ID du produit non spécifié.";
}
?>
