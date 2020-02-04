<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'user';
    $db_password = 'user';
    $db_name     = 'user';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $identifiant = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($identifiant !== "" && $password !== "")
    {   /* Requete pour connexion createur */
         $requete = "SELECT count(*) FROM Createur where 
              idCreateur = '".$identifiant."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $identifiant;
          // $_SESSION['password'] = $password;
           $token =hash('sha256', $user->id.time());
           setcookie("authToken", $token, time()+60*60*24*365);
           header('Location: accueilCreateur.php');
        }
       
        else
        {
          $requete = "SELECT count(*) FROM Client where 
              idClient = '".$identifiant."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

             if($count!=0) // nom d'utilisateur et mot de passe correctes
             {
               
                $_SESSION['username'] = $identifiant;
              //  $_SESSION['password'] = $password;
                $token =hash('sha256', $user->id.time());
                setcookie("authToken", $token, time()+60*60*24*365);
                header('Location: accueilClient.php');
             }
        
            else{ $requete = "SELECT count(*) FROM Preparateur where 
              idPreparateur = '".$identifiant."' and mdp = '".$password."' ";
                $exec_requete = mysqli_query($db,$requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];
                  if($count!=0) // nom d'utilisateur et mot de passe correctes
                  {
                    $_SESSION['username'] = $identifiant;
                 //   $_SESSION['password'] = $password;
                    $token =hash('sha256', $user->id.time());
                    setcookie("authToken", $token, time()+60*60*24*365);
                    header('Location: accueilPreparateur.php');
                   }
                   else
                   {
                  header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
                  }
            }
       }
    }   

else
{
   header('Location: login.php');
}

}
mysqli_close($db); // fermer la connexion
?>
