<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANaTT inscription</title>
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png">
</head>
<body>

    <header>
        <h2>REPUBLIQUE DU BENIN</h2>
        <p>Interface d'enregistrement des candidats</p>
    </header>

    <aside>
        <p>
            <a href="index.php">Acceuil</a>
        </p>
        <p>
            <a href="enrg_auto.php">Enregistrement des auto-école</a>
        </p>
        <p>
            <a href="enrg_cand.php">Enregistrement des candidats</a>
        </p>
        <p>
            <a href="recherche.php">Recherche</a>
        </p>
    </aside>
    
    


    <main >
        <form action="" method="post" class="candid">

        <?php
        require "connexion.php";

        try {

            if (isset($_POST['btn-enrg'])) {

                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $datnais = $_POST['datnais'];
                $ville = $_POST['ville'];
                $sexe = $_POST['sexe'];
                $categorie = $_POST['categorie'];
                $nomauto = $_POST['nomauto'];
                

                $query = "INSERT INTO candidat(nom,prenom,datnais,ville,sexe,categoriepermis,nomautoecole) VALUES(? , ? , ?, ?, ?, ?, ?)";
                $stmt = $db->prepare($query);
                $stmt->execute([$nom,$prenom,$datnais,$ville,$sexe,$categorie,$nomauto]);

                header("Refresh:3; url=enrg_cand.php");
                echo' <div class="alert alert-info"> Contacte enregistere avec succès </div>  ';
                unset($_POST['btn-enrg']);
            }

        } catch (PDOException $e) {
            header("Refresh:3; url=enrg_auto.php");
                echo' <div class="alert alert-danger"> Erreur lors de l\'enregistrement </div>  ';
        }


    
        ?>


            <h2>Enregistrement de candidat</h2>
            <div class="form-group">
                <label for="nom">Nom du candidat :</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom"> Prénom du cand :</label>
                <input type="text" name="prenom" id="prenom" required>
            </div>
            <div class="form-group">
                <label for="datnais">DateNais :</label>
                <input type="date" name="datnais" id="datnais" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" name="ville" id="ville" required>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe :</label>
                <input type="text" name="sexe" id="sexe" required>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie :</label>
                <input type="text" name="categorie" id="categorie" required>
            </div>
            <div class="form-group">
                <label for="nomauto">Nom de l'autoE:</label>
                <select name="nomauto" id="nomauto" required>
                        <?php
            
                        // Requête pour récupérer les catégories
                        $query = "SELECT * FROM auto";
                        $result = $db->query($query);
                        $row = $result->fetchAll(PDO::FETCH_ASSOC);
                        // Affichage des options du select
                        foreach($row as $r) {
                            echo "<option value='" . $r['nomautoecole'] . "'>" . $r['nomautoecole'] . "</option>";
                        }
                        // Fermer la connexion
                        ?>
                    </select>
            </div>
            <div class="form-group">
                <button class="" name="btn-enrg">Enregister</button>
            </div>
        </form>
    </main>



    <script src="dist/js/bootstrap.js"></script>
</body>
</html>