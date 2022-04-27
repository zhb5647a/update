
<?php
//import
include './utils/connectBdd.php';
include './model/model_article.php';
include './view/view_showAll_article.php';
$article = new Article(null, null);

    // $obj = $article->showArticleV3($bdd);
    // foreach($obj as $value){
    //     echo '<p>le nom de l\'article  est un(e) : '.$value->name_article.' 
    //     ,le prix est est égal à :'.$value->prix_article.'</p>';
    // }
    $list = $article->showAllUserV2($bdd);
    //on parcours le tableau
    foreach($list as $value){
        //on affiche à chaque tour un paragraphe avec les valeurs du tableau
        echo '<p><a href="controler/update_article.php?id='.$value['id_article'].'">le nom est égal à : '.$value['name_article'].' le prix est :
        '.$value['prix_article'].'</a></p>';
    }
    
?>

    