<html>
    <head>
        <meta charset="utf-8">
        		<title> ✿ Pamplemouse </title>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
		 <div class= "position">
             <a class="deco-button" href="accueilClient.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
             <br>
           <p class ="center">  
         
		<?php  
		include ("deconnexion.php");
				deco();?>
		<?php
		
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
                   echo "Bonjour, $reponse[nom] $reponse[prenom] ! <br>"; 
                   
                   
                }
            
            mysqli_close($db); // fermer la connexion
		
	include("recherche.php") ;
    include ("menuClient.php") ;
        
        
			$servername = "localhost";
			$username = "Client";
			$password = "Client";
			$dbname = "user";

// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$article = $_GET['nom'];
			echo "<div align=\"center\"> <font size=\"+3\">".$article."</font></div>";
             
             //Requête  taille
             $sql = "SELECT DISTINCT taille,  prix FROM articles_dispo
					WHERE nom LIKE '".$article."' ";
        
			$result = $conn->query($sql);
            
            //requete 1 prix
            $sql1 = "SELECT DISTINCT  prix FROM articles_dispo
					WHERE nom LIKE '".$article."' ";
        
			$result1 = $conn->query($sql1);

            //Requête 2 Composition Matiere
             $sql2 = "SELECT DISTINCT M.nom, M.pourcentage
                      FROM RealiserAvec R , Matiere M, articles_dispo A  
                      WHERE A.nom LIKE '".$article."' AND A.idArticle = R.idArticle AND R.idMatiere = M.idMatiere";
             
             $result2 = $conn->query($sql2);
           //  $row2 = $result2->fetch_assoc();
            
            
	  if ($result->num_rows > 0) {
    // output data of each row
			echo " <br> Taille disponible : &nbsp;  ";
		while($row = $result->fetch_assoc()) {
            echo " " .$row['taille']." &nbsp;  &nbsp; ";
                }
              
             echo" <br> <br> Prix : ";
         while($row1 = $result1->fetch_assoc()) {
            echo "".$row1['prix']." € &nbsp;  ";
                }
            
             echo " <br><br> Composition de l'article  &nbsp;  <br>";
        while($row2 = $result2->fetch_assoc()) {
                   echo " &nbsp; ".$row2['pourcentage']."% de &nbsp;  " .$row2['nom']. "&nbsp; &nbsp;  <br>";
                  }
              
              
             
             
             
            echo "
             <a class = \"photos\" href = \"choixTaille.php?nom=".$article."\">  
				<img src=\"/pamplemousse/image/ajouter.png\" alt=\"ajouter au panier\" style=\"float:right;width:80px;height:80px;\">
				</a>
             <img src=\"/pamplemousse/image/".$article.".jpg\" alt=\"".$article."\" style=\"float:center;width:350px;height:540px;\">
             ";
        
        
        }
        
        
      else {
            echo "aucun résultat n'a été trouvé pour la recherche \" ".$rech." \"";
           }
$conn->close();

		?>
		</p> 
    </body>
</html>
