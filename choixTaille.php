<html>
    <head>
		<title>  Pamplemouse </title>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="form.css" media="screen" type="text/css" />
    </head>
    <body>
	 <h1 class="ecriture">  Bienvenue sur ✿ Pamplemouse </h1>
        
        <div class= "position">
             <a class="deco-button" href="accueilClient.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
             <br>
            <!-- tester si l'utilisateur est connecté -->
            <?php
				include ("deconnexion.php");
				deco();
                
                    
          
                    
                 // connexion à la base de données
                $db_username = 'Client';
                $db_password = 'Client';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');

                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    $requete = " SELECT nom, prenom
                                 FROM Client
                                 WHERE '$user' = idClient";
                  $exec_requete = mysqli_query($db,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                   // print_r($reponse);
                    
                  // echo ' <div style = "text-align : right; "> ';
                   echo "Bonjour, $reponse[nom] $reponse[prenom] !"; 
                   
                   include ("menuClient.php");
                                     
                }
               
				//requête qui trouve les tailles disponibles
                $nom = $_GET['nom'];
                
                $sql = "SELECT DISTINCT taille FROM articles_dispo
					WHERE nom LIKE '".$nom."' ";
				
			$result = $db->query($sql);
				//echo $result;

				if ($result->num_rows > 0) {
				echo "
				<form action=\"ajouterPanier.php?nom=".$nom."\" method=\"POST\">
				<label class=\"ecriture\"> <b>choisir la taille </b></label>
				<br> 
				<select class=\"ecriture\" name = \"taille\">  ";
				
				while($row = $result->fetch_assoc()) {
					echo "<option value=\"".$row['taille']."\">".$row['taille']."</option>";
				}
				echo "<input type =\"submit\" value=\"commander\"  name = \"commande\"/>";
                } else {echo "echec dans la recherche des tailles";}

mysqli_close($db); // fermer la connexion
            ?>
         
        </div>
                
   
    </body>
</html>
