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
        <p>Interface d'enregistrement des auto-éoles</p>
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
        <form action="" method="post">

        <?php
        require "connexion.php";

        try {

            if (isset($_POST['btn-enrg'])) {
                $nomauto = $_POST['nomauto'];
                $depart = $_POST['depart'];

                $query = "INSERT INTO auto(nomautoecole,departement) VALUES(? , ?)";
                $stmt = $db->prepare($query);
                $stmt->execute([$nomauto,$depart]);

                header("Refresh:3; url=enrg_auto.php");
                echo' <div class="alert alert-info"> Contacte enregistere avec succès </div>  ';
                unset($_POST['btn-enrg']);
            }

        } catch (PDOException $e) {
            header("Refresh:3; url=enrg_auto.php");
                echo' <div class="alert alert-danger"> Erreur lors de l\'enregistrement </div>  ';
        }


    
        ?>


            <h2>Enregistrement Des auto-écoles</h2>
            <div class="form-group">
                <label for="nomauto">Nom de l'école :</label>
                <input type="text" name="nomauto" id="nomauto" required>
            </div>
            <div class="form-group">
                <label for="depart">Département :</label>
                <input type="text" name="depart" id="depart" required>
            </div>
            <div class="form-group">
                <button class="" name="btn-enrg">Enregister</button>
            </div>
        </form>
    </main>



    <script src="dist/js/bootstrap.js"></script>
</body>
</html>