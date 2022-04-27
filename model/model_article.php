<?php
    class Article{
        /*-----------------------------------------
                        ATTRIBUTS
        ----------------------------------------*/
        private $id_article;
        private $name_article;
        private $prix_article;
        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/
        public function __construct($nom, $prix){
            $this->name_article = $nom;
            $this->prix_article = $prix;
        }
        /*-----------------------------------------
                    GETTERS AND SETTER
        ----------------------------------------*/
        public function getIdArticle():int{
            return $this->id_article;
        }
        public function getNomArticle():string{
            return $this->name_article;
        }
        public function getPrixArticle():float{
            return $this->prix_article;
        }
        public function setIdArticle($id):void{
            $this->id_article = $id;
        }
        public function setNomArticle($nom):void{
            $this->name_article = $nom;
        }
        public function setPrixArticle($prix):void{
            $this->prix_article = $prix;
        }
        /*-----------------------------------------
                        METHODES
        ----------------------------------------*/
        //version avec des paramétres
        public function addArticle($bdd, $nom, $prix):void{
            try{
                $req = $bdd->prepare('INSERT INTO article(name_article, prix_article) 
                VALUES(:name_article, :prix_article)');
                $req->execute(array(
                    'name_article' => $nom,
                    'prix_article' =>$prix
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        //version depuis l'instance de l'objet
        public function addArticleV2($bdd):void{
            $nom = $this->getNomArticle();
            $prix = $this->getPrixArticle();
            try{
                $req = $bdd->prepare('INSERT INTO article(name_article, prix_article) 
                VALUES(:name_article, :prix_article)');
                $req->execute(array(
                    'name_article' => $nom,
                    'prix_article' =>$prix
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        function showAllUserV2($bdd):array {
            try{
                $req = $bdd->prepare("SELECT * FROM article");
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

       public function showArticleV3($bdd):array {
     
            try{
                $req = $bdd->prepare("SELECT * FROM article");
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        public function showArticleV4($bdd){
            try{
                $req = $bdd->prepare('SELECT * FROM article');
                $req->execute();
                while($data = $req->fetch()){
                    echo '<p><a href="updateArticle.php?id='.$data['id_article'].'">Nom : '.$data['name_article'].' prix : '.$data['prix_article'].'</a></p>';
                }
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
       public function updateArticle($bdd, $nom, $prix, $value){
            try{
                $req = $bdd->prepare('INSERT INTO article(name_article, prix_article) 
                VALUES(:name_article, :prix_article
                WHERE id_article = :id_article');
                $req->execute(array(
                    'name_article' => $nom,
                    'prix_article' =>$prix,
                    'id_article' =>$value
                    
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
       public function getArticle($bdd, $id):array {
            try{
                $req = $bdd->prepare("SELECT name_article, prix_article FROM article WHERE id_article = :id_article");
                $req->execute(array(
                    'id_article' => $id,  
                ));
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    }
    ?>
        
    }
?>