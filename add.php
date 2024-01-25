<link rel="stylesheet" href="../bienchezsoi/css/add-product.css">

<?php
include("templates/header.php");
require_once('connect.php'); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['nom']) && !empty($_POST['nom']) &&
        isset($_POST['marque']) && !empty($_POST['marque']) &&
        isset($_POST['prix']) && !empty($_POST['prix']) &&
        isset($_POST['categorie']) && !empty($_POST['categorie'])
    ) {
        $nom = strip_tags($_POST['nom']);
        $marque = strip_tags($_POST['marque']);
        $prix = strip_tags($_POST['prix']);
        $categorie = strip_tags($_POST['categorie']);

        switch ($categorie) {
            case 'Chaise':
                $table = 'chaises';
                break;
            case 'Table':
                $table = 'tables';
                break;
            case 'Bureau':
                $table = 'bureau';
                break;
            default:
                echo "Catégorie non valide.";
                exit();
        }

        $sql = "INSERT INTO $table (nom, marque, prix) VALUES (:nom, :marque, :prix)";

        $query = $db->prepare($sql);

        $query->bindParam(':nom', $nom, PDO::PARAM_STR);
        $query->bindParam(':marque', $marque, PDO::PARAM_STR);
        $query->bindParam(':prix', $prix, PDO::PARAM_STR);


        if ($query->execute()) {
            echo "Produit ajouté avec succès";
        } else {
            echo "Erreur lors de l'ajout du produit";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}


?>

<form method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom">

    <label for="marque">Marque</label>
    <input type="text" name="marque" id="marque">

    <label for="prix">Prix</label>
    <input type="number" name="prix" id="prix">

    <label for="categorie">Catégorie</label>
    <select name="categorie" id="select-categorie">
        <option value="Chaise"> Chaise</option>
        <option value="Bureau"> Bureau</option>
        <option value="Table"> Table</option>
    </select>

    <button type="submit">Enregistrer</button>
</form>


<?php



require_once('close.php');
?>
