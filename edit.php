<link rel="stylesheet" href="../bienchezsoi/css/edit.css">

<?php
include("templates/header.php");
require_once('connect.php');
$dsn = 'mysql:host=localhost;dbname=Bienchezsoi';
$db = new PDO($dsn, "root", "root");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_produit = $_GET['id'];

    $query = $db->prepare('
        SELECT id, nom, marque, prix, "chaise" AS categorie FROM chaises WHERE id = :id
        UNION ALL
        SELECT id, nom, marque, prix, "tables" AS categorie FROM tables WHERE id = :id
        UNION ALL
        SELECT id, nom, marque, prix, "bureau" AS categorie FROM bureau WHERE id = :id
    ');
    $query->bindParam(':id', $id_produit, PDO::PARAM_INT);

    if ($query->execute()) {
        $produit = $query->fetch(PDO::FETCH_ASSOC);

        if ($produit) {
            $type_produit = ucfirst($produit['categorie']);
        } else {
            echo "Le produit avec l'ID $id_produit n'existe pas.";
            exit();
        }
    } else {
        echo "Erreur lors de la récupération du produit.";
        exit();
    }
} else {
    echo "ID du produit non spécifié.";
    exit();
}


?>

<h1> Éditer un produit</h1>

<form class="form" action="update.php" method="post">
    <input class="input" type="hidden" name="id" value="<?= $produit['id'] ?>">
    <input type="hidden" name="type_produit" value="<?= $type_produit ?>">

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= $produit['nom'] ?>" required>

    <label for="marque">Marque :</label>
    <input type="text" id="marque" name="marque" value="<?= $produit['marque'] ?>" required>

    <label for="prix">Prix :</label>
    <input type="number" step="0.01" id="prix" name="prix" value="<?= $produit['prix'] ?>" required>

    <input class="submit" type="submit" value="Enregistrer les modifications">
</form>
