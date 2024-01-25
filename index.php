<link rel="stylesheet" href="../bienchezsoi/css/index.css">

<?php

$dsn = 'mysql:host=localhost;dbname=Bienchezsoi';
$db = new PDO($dsn, "root", "root");

$queryChaises = $db->query('SELECT * FROM chaises');
$chaises = $queryChaises->fetchAll(PDO::FETCH_ASSOC);

$queryBureau = $db->query('SELECT * FROM bureau');
$bureau = $queryBureau->fetchAll(PDO::FETCH_ASSOC);

$queryTables = $db->query('SELECT * FROM tables');
$tables = $queryTables->fetchAll(PDO::FETCH_ASSOC);

include("templates/header.php")
?>

<h1> Nos Meubles</h1>

<div class="nos meubles">


    <table class="table">
        <thead>
            
            <th>Nom</th>
            <th>Marque</th>
            <th>Prix</th>
            <th>Actions</th>


        </thead>
        <div class="button-add">
<button> 
    <a href="add.php"> Ajouter un produit</a>
</button>
        </div>
        <tbody>
            <p> Nos chaises </p>
            <?php
            foreach ($chaises as $items) {
            ?>


                <tr>
                    
                    
                    <td><?= $items['nom'] ?></td>
                    <td><?= $items['marque'] ?></td>
                    <td><?= $items['prix'] ?></td>

            
                     <td> 
                    <a class="edit" href="details.php?id=<?= $items['id'] ?>&table=chaises">Voir</a> 
                    <a class="edit" href="edit.php?id=<?= $items['id'] ?>">Modifier</a> 
                    <a class="edit" href="#" onclick="return confirmDelete(<?= $items['id'] ?>, 'chaises')">Supprimer</a>
                    </td>                
        </tr>
            <?php
            }
            ?>
        </tbody>
    </table>



    <table class="table">
        <thead>
        
            <th>Nom</th>
            <th>Marque</th>
            <th>Prix</th>
            <th>Actions</th>

        </thead>
        <tbody>
            <p>Nos bureaux</p>
            <?php
            foreach ($bureau as $items) {
            ?>

             <tr>
                   
                <td><?= $items['nom'] ?></td>
                <td><?= $items['marque'] ?></td>
                <td><?= $items['prix'] ?></td>

                    <td> <a class="edit" href="details.php?id=<?= $items['id'] ?>&table=bureau">Voir</a> 
                    <a class="edit" href="edit.php?id=<?= $items['id'] ?>">Modifier</a> 
                    <a class="edit" href="#" onclick="return confirmDelete(<?= $items['id'] ?>, 'bureau')">Supprimer</a>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>




        <table class="table">
            <thead>
               
                <th>Nom</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Actions</th>
            </thead>
            <tbody>

                <p>Nos tables</p>
                <?php
                foreach ($tables as $items) {
                ?>
                    <tr>
                        
                        <td><?= $items['nom'] ?></td>
                        <td><?= $items['marque'] ?></td>
                        <td><?= $items['prix'] ?></td>

                        <td>
                            <a class="edit" href="details.php?id=<?= $items['id'] ?>&table=tables">Voir</a> 
                        <a class="edit" href="edit.php?id=<?= $items['id'] ?>">Modifier</a> 
                        <a class="edit" href="#" onclick="return confirmDelete(<?= $items['id'] ?>, 'tables')">Supprimer</a>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

  

    
        <script>
        function confirmDelete(id, categorie) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
                window.location.href = `delete.php?id=${id}&categorie=${categorie}`;
            }
            return false; 
        }
    </script>
</div>
</body>
</html>

      
