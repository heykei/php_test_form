<?php 
    session_start();

    if(isset($_SESSION['table'])) $table = $_SESSION['table'];
?>

<!DOCTYPE html>
<html lang="fr">
    
    <?php include_once './includes/head.inc.html'; ?>   

    <body>

        <?php include("./includes/header.inc.html"); ?> 

        <div class="container">
            <div class="row">
                
                <nav class="col-md-3 mt-3">
                    <!-- bouton Home -->
                    <a role="button" href="index.php" class="btn btn-outline-secondary w-100" >
                        Home</a>

                    <?php if (isset($table)) include_once './includes/ul.inc.php'; ?>

                </nav>

                <div class="col-md-9 mt-3">
                    <section>

                            <?php 
                                $buttonSubmit = '<div class="d-flex flex-row-reverse bd-highlight mt-4">
                                    <button name="enregistrer" type="submit" class="btn btn-primary">Enregistrer des données</button> </div>';
                                
                                if(isset($_GET['add'])) {
                                    echo '<p class="h1 text-center">Ajouter des données</p>';
                                    include './includes/form.inc.html';
                                    echo $buttonSubmit . '</form>';
                                } 

                                elseif(isset($_GET['addmore'])) {
                                    include './includes/form2.inc.php';
                                } 

                                elseif(isset($_POST['enregistrer'])) {
                                    $prenom = $_POST['first_name'];
                                    $nom = $_POST['last_name'];
                                    $age = $_POST['age'];
                                    $taille = $_POST['size'];
                                    $sex = $_POST['genre'];
                                    $html = $_POST['html'];
                                    $css = $_POST['css'];
                                    $javascript = $_POST['js'];
                                    $php = $_POST['php'];
                                    $mysql = $_POST['mysql'];
                                    $bootstrap = $_POST['bootstrap'];
                                    $symfony = $_POST['symfony'];
                                    $react = $_POST['react'];
                                    $color = $_POST['color'];
                                    $date = $_POST['date'];
                                    $image = array 
                                    (
                                    "name" => $name = $_FILES['img']['name'],
                                    "type" =>$type = $_FILES['img']['type'],
                                    "tmpname" =>$tmpName = $_FILES['img']['tmp_name'],
                                    "error" =>$error = $_FILES['img']['error'],
                                    "size" =>$filesize = $_FILES['img']['size'],
                                    );
                                    
                                    $tabExtension = explode('.', $name);
                                    $extension = strtolower(end($tabExtension));
                                    //Tableau des extensions que l'on accepte
                                    $extensions = ['jpg', 'png',];
                                    $maxSize = 200000;
                                    if(in_array($extension, $extensions) && $size <= $maxSize)
                                    {
                                    move_uploaded_file($tmpName, './uploaded/'.$name);
                                    }
                                    else {
                                    echo'<p class="alert-danger text-center py-3">Danger</p>';
                                    }
                                    $table = array(          
                                        "first_name" => $prenom,
                                        "last_name"  =>  $nom,
                                        "age" => $age,
                                        "size" => $taille,
                                        "civility" => $sex,
                                        "html" => $html,
                                        "css" => $css,
                                        "javascript" => $javascript,
                                        "php" => $php,
                                        "mysql" => $mysql,
                                        "bootstrap" => $bootstrap,
                                        "symfony" => $symfony,
                                        "react" => $react,
                                        "color" => $color,
                                        "date" => $date,
                                        "img" => $image,
                                        
                                    );
                                    
                                    $_SESSION["table"] = $table; 
                                    echo '<p class="alert-success text-center py-3"> Données sauvegardées</p>';

                                    if(empty($errors)==true){
                                        move_uploaded_file($file_tmp,'./uploaded/'.$file_name);
                                        echo '<p class="alert-danger text-center py-3"> error: 1</p>';
                                    }else{
                                        print_r($errors);
                                    }
                                    
                                    } else {
                                        if (isset($table)) {

                                        if(isset($_GET["debugging"])) {
                                            echo '<h2 class="text-center">Débogage</h2>';
                                            echo "<h3 class='fs-5'>===> Lecture du tableau à l'aide de la fonction print_r() </h3>";
                                            print "<pre>";
                                            print_r($table);
                                            print "</pre>";
            
                                        } elseif (isset($_GET['concatenation'])) {  
                                            echo '<h2 class="text-center">Concaténation</h2><br>';
            
                                            echo "<h3 class='fs-5'>===> Construction d'une phrase avec le contenu du tableau :</h3>";
                                            
                                            echo "<p>" ;
                                            echo ($table["civility"] == "Femme") ? "Mme " : "Mr " ;
                                            echo $table['first_name'] ." ". $table['last_name']; 
                                            echo " <br>J'ai " . $table["age"] . " ans et je mesure " . $table["size"] . "m.</p><br><br>";
                                            
                                            echo "<h3 class='fs-5' > ===> Construction d'une phrase après MAJ du tableau : </h3><br><br>";
                                            
                                            $table['first_name'] = ucfirst ($table['first_name']);
                                            $table['last_name'] = strtoupper($table['last_name']);
                                            echo "<p>" ;
                                            echo ($table["civility"] == "Femme") ? "Mme " : "Mr " ;                               
                                            echo $table["first_name"] ." ". $table["last_name"];
                                            echo " <br>J'ai " . $table["age"] . " ans et je mesure " . $table['size'] . "m.</p><br><br>";
                                            
            
                                            echo "<h3 class='fs-5' > ===> Affichage d'une virgule à la place du point pour la taille : </h3>";
                                            
                                            $table['size'] = str_replace('.' , ',', $table['size']);
                                            $table['first_name'] = ucfirst ($table['first_name']);
                                            $table['last_name'] = strtoupper($table['last_name']);
                                            echo "<p>" ;
                                            echo ($table["civility"] == "Femme") ? "Mme " : "Mr " ;                               
                                            echo $table["first_name"] ." ". $table["last_name"];
                                            echo " <br>J'ai " . $table["age"] . " ans et je mesure " . $table['size'] . "m.</p><br><br>";
            
                                        } else if (isset($_GET['loop'])) {

                                            echo "<h2 class='text-center'>Boucle</h2><br>";
                                            echo "<p>===> Lecture du tableau à l'aide d'une boucle foreach</p><br>";
                                            $table = $_SESSION['table'];
                                            $i = 0;
                                            foreach ($table as $x => $value) {
                                                if ($x == 'img') {
                                                unset($value);
                                                echo '<div>à la ligne n°' . $i . ' correspond la clé "' . $x . '" et contient</div>';
                                                echo "<img class='w-100' src='./uploaded/".$table['img']['name']."'>"; 
                                                } else {
                                                echo '<div>à la ligne n°' . $i . ' correspond la clé "' . $x . '" et contient "' . $value . '"</div>';
                                                $i++;
                                                }
                                            }
                                        
                                        } else if (isset($_GET['function'])){     

                                            echo "<h2 class='text-center'>Fonction</h2><br>";
                                            echo "<p>===> J'utilise ma fonction readTable()</p><br>";
                                            function readTable(){
                                                $table = $_SESSION['table'];
                                                $i = 0;
                                                
                                                foreach ($table as $x => $value) {
                                                    if ($x == 'img') {
                                                    unset($value);
                                                    echo '<div>à la ligne n°' . $i . ' correspond la clé "' . $x . '" et contient</div>';
                                                    echo "<img class='w-100' src='./uploaded/".$table['img']['name']."'>"; 
                                                    } else {
                                                    echo '<div>à la ligne n°' . $i . ' correspond la clé "' . $x . '" et contient "' . $value . '"</div>';
                                                    $i++;
                                                    }
                                                }
                                                
                                            }  
                                            readTable();   
                                            
                                                
            
                                            
                                        } elseif (isset($_GET['del'])) {
                                            unset ($_SESSION['table']);
                                            if (empty($_SESSION['table'])) {
                                                echo '<p class="alert-success text-center py-3"> Données suprimées</p>';
                                            }
                                        
                                        }else { 
                                            echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>'; 
                                            echo '<a role="button" class=" btn btn-secondary ms-2" href="index.php?addmore">Ajouter plus de données</a>'; 
                                        }  
                                    }else { 
                                        echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a> ';
                                        echo '<a role="button" class=" btn btn-secondary ms-2" href="index.php?addmore">Ajouter plus de données</a>'; 
                                    } 
                            }   
                            ?>

                        </section>
                    </div>
            </div>   
        </div>
        <br>
        <?php include("./includes/footer.inc.html"); ?> 
    </body>
</html>