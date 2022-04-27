<?php
   //import
   include '../utils/connectBdd.php';
   include '../model/model_article.php';
   include '../view/view_update_article.php';  /*---------------------------------------
   

    $article = new Article($_POST['name_article'], $_POST['prix_article']);
    /*---------------------------------------
                    TEST
    -----------------------------------------*/
    //test si $_GET['id'] existe
    if(isset($_GET['id'])AND !empty($_GET['id'])){
        //stocker dans id la valeur de l'id_util
        $id = $_GET['id'];
        $list =$article->getArticle($bdd, $id);
        echo '<script>
        setValueInput("'.$list[0]['name_article'].'", "'.$list[0]['prix_article'].'");
        </script>';
        //test pour vérifier si les champs du formulaire sont remplis
        if(isset($_POST['name_article']) AND isset($_POST['prix_article'])  AND 
            $_POST['name_article'] !='' AND $_POST['prix_article'] !=''){
            //stocker les super globales POST dans des variables
            $nom =$_POST['name_article'];
            $prix =$_POST['prix_article'];
            
            
            //appel de la fonction ajouter  un article en BDD
            $article-> updateArticle($bdd, $nom, $prix, $id) ;
            //message
            echo "$nom à été modifié en  BDD";
        }
        //sinon vides
        else{
            echo 'Veuillez compléter les champs du formulaire';
        }
    }
        




?>