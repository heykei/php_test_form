<?php
    session_start();
    if (isset($_SESSION['table'])) $table = $_SESSION['table'];
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include_once './includes/head.inc.html'; ?>

    <body>

        <?php include_once './includes/header.inc.html'; ?>

        <div class="container">
            <div class="row">
                <nav class="col-md-3 mt-3">     

                    <a class="btn btn-outline-secondary w-100" role="button" href="index.php">Home</a>

                    <?php if (isset($table)) include_once './includes/ul.inc.php'; ?>

                </nav>

                <section class="col-md-9 mt-3">
                    <?php if (isset($_GET['add'])){
                            include_once './includes/form.inc.html';
                        }
                        elseif(isset($_POST['enregistrer'])){
                            $prenom = $_POST['user-prenom'];
                            $nom = $_POST['user-nom'];
                            $age = $_POST['user-age'];
                            $taille = $_POST['user-taille'];
                            $sexe = $_POST['user-sex'];
                            $table = array(
                                "first_name" => $prenom,
                                "last_name" => $nom,
                                "age" => $age,
                                "size" => $taille,
                                "civility" => $sexe,
                            );

                            $_SESSION['table'] = $table;
                            echo '<p class="alert-success text-center py-3"><strong>Bravo ! </strong>Vous avez vendue votre âme !</p>';
                         
                        } elseif (isset($_GET['debugging'])) {
                            echo '<h2 class="text-center mb-5">Débogage</h2>';
                            echo '<h3 class="fs-6">===> Lecture du tableau à l\'aide de la fonction print_r()</h3>' ;
                            print '<pre>';
                            print_r($table);
                            print '</pre>';
                        } 

                        elseif (isset($_GET['concatenation'])) {
                            echo '<h2 class="text-center mb-5">Concaténation</h2>';
                            echo '<h3 class="fs-6">===> Construction d\'une phrase avec le contenu du tableau</h3>';
                            echo '<p>';
                            echo $civility=($table['civility'] == 'femme') ? 'Mme ' : 'Mr ';
                            echo $table['first_name'] .' '. $table['last_name'];
                            echo '<br />J\'ai '.$table['age'].' ans et je mesure '.$table['size'].'m.</p>';
                        }
                        
                        elseif (isset($_GET['loop'])) {
                            echo "<h2 class='text-center'>Boucle</h2><br>";
                            echo "<h3 class='fs-6'>===> Lecture du tableau à l'aide d'une boucle foreach</h3><br>";
                            $table = $_SESSION['table'];
                            $i = 0;
                            foreach ($table as $x => $value) {
                                echo '<div>à la ligne n°'. $i . 'correspond la clé"' . $x .'" et contient "'.$value .'"</div>';
                                $i++;
                            }
                        }                       
                        
                        elseif (isset($_GET['function'])) {
                            echo "<h2 class='text-center'>Fonction</h2><br>";
                            echo "<h3 class='fs-6'>===> J'utilise ma function readTable()</h3><br>";
                            function readTable() {
                                $table = $_SESSION['table'];
                                $i = 0;
                                foreach ($table as $x => $value) {
                                    echo '<div>à la ligne n°'. $i . 'correspond la clé"' . $x .'" et contient "'.$value .'"</div>';
                                    $i++;
                                  }
                            } 
                        readTable();                   
                        }
                        elseif (isset($_GET['del'])) {
                            session_destroy();
                            echo '<p class="alert-success text-center py-3"><strong>Bravo ! </strong>Vous l\'avez récupéré !</p>';
                        }

                         else {                         
                        echo '<a role="button" class="btn btn-primary w-50" href="index.php?add">Ajouter des données</a>';                  
                    }
                    ?>                                         
                </section>
            </div>
        </div>

        <?php include_once 'includes/footer.inc.html' ?>
    </body>
</html>