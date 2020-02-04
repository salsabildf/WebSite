<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <h1 class="ecriture">  Bienvenue sur  ✿ Pamplemouse </h1>
      
        
        <div class= "position" >
             <a class="deco-button" href="accueilCreateur.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
             <br>
            <!-- tester si l'utilisateur est connecté -->
            <?php
				include ("deconnexion.php");
				deco();
              

          
                    
                 // connexion à la base de données
                $db_username = 'createur';
                $db_password = 'Createur';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');

                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    $requete = " SELECT nomMarque
                                 FROM Createur
                                 WHERE '$user' = idCreateur";
                  $exec_requete = mysqli_query($db,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                  
				  echo " Bonjour, $reponse[nomMarque] !";
			    }
			    include("recherche.php");
				include ("menuCreateur.php");
				$tmp = $_GET['val'];
				$user = $_SESSION['username'];
			    
			    if ($tmp){
					$sql = "SELECT nom, taille, COUNT(DISTINCT idArticle)
							FROM Article
							WHERE idCreateur = ".$user." AND idCommande IS NOT NULL
							GROUP BY nom, taille  ";
				
					$result = $db->query($sql);

					if ($result->num_rows > 0) {
    // output data of each row
					echo "<div align=\"center\"> <font size=\"+3\">Articles vendus<br><br><br></font></div>";
					while($row = $result->fetch_assoc()) {
					echo "<div align=\"center\"> <font size=\"+3\">".$row['nom']." en taille ".$row['taille']."</font></div>";
					}
					} else {
					echo "<div align=\"center\"> <font size=\"+3\">aucun article n'a été vendu</font></div>";
					}
					
					
					
					} else{
					
					$sql = "SELECT nom, taille, COUNT(DISTINCT idArticle)
							FROM Article
							WHERE idCreateur = ".$user." AND idCommande IS NULL
							GROUP BY nom, taille";
				
				echo"test";
					$result = $db->query($sql);

					if ($result->num_rows > 0) {
    // output data of each row
					echo "<div align=\"center\"> <font size=\"+3\">Articles invendus<br><br><br></font></div>";
					while($row = $result->fetch_assoc()) {
					echo "<div align=\"center\"> <font size=\"+3\">".$row['nom']." en taille ".$row['taille']."</font></div>";
					}

					} else {
					echo "<div align=\"center\"> <font size=\"+3\">tous les articles ont été vendus</font></div>";
					  }
					}
			    
			 
			  mysqli_close($db); // fermer la connexion
            ?>
           
            
        </div>
        
    </body>
</html>
