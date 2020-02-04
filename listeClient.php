<html>
    <head>
        <meta charset="utf-8">
        		<title> ✿ Pamplemousse </title>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <div  class= "position">
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
                                 WHERE ".$user." = idCreateur";
                  
                  $exec_requete = mysqli_query($db,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
            
                        echo "Bonjour, $reponse[nomMarque] !";
                }
                
                
                include("menuCreateur.php");
                
                
                
                
                $listeclient = "SELECT * FROM Client";
                $rep = $db->query($listeclient);
                      
                if (  $rep->num_rows > 0 )
                
                {                echo "<div style=\"text-align:center;\">" ;
                   while ( $repfinal = $rep->fetch_array() )
                    {
    
                    echo " <a href =\"supprimerClient.php?name2=".$repfinal['idClient']."\" > -> ".$repfinal['idClient'].",   ".$repfinal['nom'].",  ".$repfinal['prenom']." /a>  <br> <br>";
                   
                    }
                    echo   "</div>";
                    }
                
                
                ?>