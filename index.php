
<?php
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
/*-------------------------------------------
ROUTER
-------------------------------------------*/
//test de la valeur $path dans l'URL et import de la ressource
switch($path){
    //route /avalmvc/addArticle -> ./controler/controler_article.php
case $path === "/evalmvc/Add" :
    include './controler/controler_article.php';
    break;
//route /evalmvc/test -> ./test.php
case $path === "/evalmvc/test" :
include './test.php';
break;

//route /avalmvc/showAllArticle -> ./controler/show_all_article.php
case $path === "/evalmvc/show":
    include './controler/show_all_article.php';
 break; 
 case $path === "/evalmvc/update":
    include './controler/update_article.php';
 break; 
    
}
?>