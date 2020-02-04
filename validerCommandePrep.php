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
				$user = $_SESSION['username'];
				
				$sql = " UPDATE Commande SET idPreparateur = '".$user."' WHERE Commande.idCommande = ".$commande." ";
				
				$result = $db->query($sql);
				
				if ($result) {
		// output data of each row
				echo "<div align=\"center\"> <font size=\"+3\">le traitement de la commande a bien été prise en compte</font></div>";

} else {
    echo "<div align=\"center\"> <font size=\"+3\">echec dans la validation du traitement</font></div>";
				
				
			}
				
				    mysqli_close($db); // fermer la connexion
            ?>
            
            
        </div>
     
          
    </body>
