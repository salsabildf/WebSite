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
                   // print_r($reponse);
            
             //  echo ' <div style = "text-align : right; "> ';
                 echo " Bonjour, $reponse[nomMarque] !";
               // echo ' </div>';
                   
                }
            
            mysqli_close($db); // fermer la connexion
            ?>
           
            
        </div>

        <?php include ("menuCreateur.php") ?>
        
    </body>
</html>
