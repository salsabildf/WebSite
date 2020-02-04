 <?php
 session_start();
 ?>
 
 <?php
                $db_username = 'createur';
                $db_password = 'Createur';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
       
       
     if ( isset($_POST['nom'], $_POST['categorie'],  $_POST['idArticle'], $_POST['prix'], $_POST['couleur'], $_POST['taille'] ))
       {
//if  ($_POST['envoyez']== 'Enregistrez l\'article') {
           
            $nom = $_POST['nom'] ;
            $categorie = $_POST['categorie'];
            $idArticle =  $_POST['idArticle'];
            $prix =  $_POST['prix'];
            $idCreateur = $_SESSION['username'] ; 
            $couleur =$_POST['couleur'];
            $taille = $_POST['taille'];
       
            
            /*requete pour inserer l'article  */
                         
   $sql = "INSERT INTO Article (idArticle, nom, taille, couleur, prix, idCreateur, idCommande, categorie)
                      VALUES ('" .$idArticle. "','" .$nom. "','" .$taille. "','" .$couleur. "','" .$prix. "','" .$idCreateur. "', NULL,'" .$categorie. "')";
                   
              
  $conn = mysqli_query ($db, $sql);
                  if ($conn === TRUE)
                  {
                  header('Location: ajoutOK.php');
                  }
                  else
                  {
                   
                //  var_dump( $erreur);
                  echo "Error: " . $sql . "<br>" . $conn->error;
                  
                  }
    
           
       
         }
                              
         
         
      
 
	else
	 {
        
        header('Location: ajoutNOT.php?erreur=1'); // utilisateur ou mot de passe incorrect
     }
  ?>