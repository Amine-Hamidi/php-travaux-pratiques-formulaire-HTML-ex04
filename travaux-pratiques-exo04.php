<?php
 $host='localhost';
 $dbname='bibliotheque';
 $user='root';
 $pass='';




 try{
    
     $pdo= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);  
    echo "connexion reussie"."<br>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categorie    = $_POST['categorie'];
        
        $livre = findCategorie($categorie , $pdo);
        while($ligne = $livre->fetch()){
            echo $ligne['titre'].'<br>';
            //$livres []= new Livre($ligne['id'], $ligne['titre'], $ligne['auteur'], $ligne['categorie'], $ligne['stock']);
        }
        //echo $_POST['categorie'];
        
           
        
    }

}catch (PDOException $e){
    echo "Erreur de connexion : ".$e->getMessage();
}

function findCategorie($categorie, $pdo){
    $livres = [];
    $sql="SELECT * from livres where categorie= '$categorie'";
    $stmt=$pdo->query($sql);

    return $stmt;
    
}


?>


<form action="" method="POST">
  <div class="form-example">
    <label for="categorie">category: </label>
    <input type="text" name="categorie" id="categorie" required />
  </div>

  <div class="form-example">
    <input type="submit" value="Search" />
  </div>
</form>