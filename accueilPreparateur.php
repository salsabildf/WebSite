
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <h1 class="ecriture">  Bienvenue sur ✿ Pamplemouse  </h1>
      
        
        <div  class= "position">
            <a class="deco-button" href="accueilPreparateur.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
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
                  //echo "".$reponse."";
                  //print_r($reponse);
            
                  //      echo ' <div style = "text-align : right; "> ';
                        echo "Bonjour, $reponse[nom] $reponse[prenom] !";
                   //     echo ' </div>';
                }
            
            mysqli_close($db); // fermer la connexion
            ?>
            
            
        </div>
    
        <?php include ("menuPreparateur.php"); ?>
     
          
    </body>
</html>
