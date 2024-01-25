

<?php
include("templates/header.php");
$dsn = 'mysql:host=localhost;dbname=Bienchezsoi';
$db = new PDO($dsn, "root", "root");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_produit = $_POST['id'];
    $type_produit = $_POST['type_produit'];
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $prix = $_POST['prix'];

    switch ($type_produit) {
        case 'Chaise':
            $query = $db->prepare('UPDATE chaises SET nom = :nom, marque = :marque, prix = :prix WHERE id = :id');
            break;
        case 'Tables':
            $query = $db->prepare('UPDATE tables SET nom = :nom, marque = :marque, prix = :prix WHERE id = :id');
            break;
        case 'Bureau':
            $query = $db->prepare('UPDATE bureau SET nom = :nom, marque = :marque, prix = :prix WHERE id = :id');
            break;
        default:
            echo "Type de produit non valide.";
            exit();
    }

    $query->bindParam(':id', $id_produit, PDO::PARAM_INT);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':marque', $marque, PDO::PARAM_STR);
    $query->bindParam(':prix', $prix, PDO::PARAM_STR);

    if ($query->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du produit.";
        // Vous pouvez ajouter d'autres informations ou rediriger l'utilisateur vers une page d'erreur
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
