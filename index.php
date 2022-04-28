<?php
    session_start();
    if (isset($_SESSION['table'])) $table = $_SESSION['table'];
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include_once 'includes/head.inc.html'; ?>

    <body>

        <?php include_once 'includes/header.inc.html'; ?>

        <div class="container">
            <div class="row">
                <nav class="col-md-3 mt-3">     

                    <a class="btn btn-outline-secondary w=100" role="button" href="index.php">Home</a>

                    <?php if (isset($_table)) include_once 'includes/ul.inc.php'; ?>

                </nav>

                <section class="col-md-9 mt-3">
                    <?php if (isset($_GET['add'])){
                            include_once 'includes/form.inc.html';
                        }
                        elseif(isset($_POST['enregistrer'])){
                            $prenom = $_POST['user-prenom'];
                            $nom = $_POST['user-nom'];
                            $age = $_POST['user-age'];
                            $taille = $_POST['user-taille'];
                            $sex = $_POST['user-sex'];
                            $table = array(
                                "first_name" => $prenom,
                                "last_prenom" => $nom,
                                "age" => $age,
                                "size" => $taille,
                                "civility" => $sex,
                            );

                            $SESSION["table"] = $table;
                            echo '<p class="alert-succes texte-center py-3"> Données sauvegardées </p>';

                        } elseif (isset($_GET["debugging"])) {
                           echo '<h2>Débogage</h2>';
                           echo "<p>===> Lecture du tableau à l'aide de la fonction print_r()</p>";
                           print "<pre>";
                           print_r($table);
                           print "</pre>";
                        } else {
                            echo '<a role="button" class="btn btn-primary" href="index.php?add">Ajouter des données</a>';
                        }
                    ?>                                         
                </section>
            </div>
        </div>

        <?php include_once 'includes/footer.inc.html' ?>
    </body>
</html>