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



    <main>
        <form action="" method="post">
            <?php
                require "connexion.php";

                try {
                    $query = "SELECT * 
                                    FROM candidat ";
                    $stmt = $db -> query($query);
                    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                    //var_dump($result);
                } catch (PDOException $e) {
                    echo "Erreur : " . $e -> getMessage();
                }
            ?>


            <div class="form-group">
                <div class="form-group">
                    <label for="search">Recherche :</label>
                    <input type="search" name="search" id="search">
                </div>
                <div class="form-group">
                    <label for="au">Nom d'AUE :</label>
                    <select name="au" id="au">
                        <?php
                    $query = "SELECT * 
                                    FROM auto ";
                    $result2 = $db -> query($query);
                    $rep = $result2 -> fetchAll(PDO::FETCH_ASSOC);
                    $i = 0;
                    while($i < sizeof($rep)):
                ?>
                        <option value="<?=  $rep[$i]["nomautoecole"] ?>">
                            <?=  $rep[$i]["nomautoecole"]." -- ".$rep[$i]["departement"]  ?>
                        </option>
                        <?php $i++; endwhile?>
                    </select>
                </div>
            </div>
            <div class="form-group">

            </div>

        </form>
    </main>



    <script src="dist/js/bootstrap.js"></script>
</body>

</html>