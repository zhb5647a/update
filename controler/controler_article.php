<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_article.php';
    include './view/view_article.php';
    //test
    if(isset($_POST['name_article']) AND isset($_POST['prix_article']) AND 
    $_POST['name_article'] != "" AND $_POST['prix_article'] !=""){
        //instancier un nouvel objet Article (appel au constructeur)
        $article = new Article($_POST['name_article'], $_POST['prix_article']);
        //appel à la méthode addArticleV2 de la classe Article
        $article->addArticleV2($bdd);
        //utiliser le getter pour afficher le nom
        echo 'l\'article '.$article->getNomArticle().' à été ajouté';
    }
    else{
        echo 'veuillez remplir les champs du formulaire';
    }
?>