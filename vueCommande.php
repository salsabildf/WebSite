<html>
    <head>
        <meta charset="utf-8">
        		<title>  Pamplemouse </title>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <div  class= "position">
            <a class="deco-button" href="menuCreateur.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
             <br>
             
            <!-- tester si l'utilisateur est connecté -->
            <?php
				include ("deconnexion.php");
				deco();
				  // connexion à la base de données
                $db_username = 'Preparateur';
                $db_password = 'Preparateur';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');

                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
               
                    // afficher un message
                    $requete = " SELECT nom, prenom
                                 FROM Preparateur
                                 WHERE ".$user." = idPreparateur";
                  
                  $exec_requete = mysqli_query($db,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
            
                        echo "Bonjour, $reponse[nom] $reponse[prenom] !";
                }
                include ("menuPreparateur.php");
				
				$commande = $_GET['id'];
				
				$sql = "SELECT idArticle, nom FROM Article WHERE idCommande = ".$commande." ";
				
				$result = $db->query($sql);
				
				if ($result->num_rows > 0) {
		// output data of each row
				while($row = $result->fetch_assoc()) {
				echo "<div align=\"center\"> <font size=\"+3\">".$row['idArticle']." ".$row['nom']."</font></div>
				
				</center>
			 ";
    }
    
  echo"  <a href = \"infoClient.php?id=".$commande."\" > Suivant </a> ";

} else {
    echo "<div align=\"center\"> <font size=\"+3\">aucun article ne correspond a cette commande</font></div>";
				
				
			}
				
				    mysqli_close($db); // fermer la connexion
            ?>
            
            
        </div>
     
          
    </body>
