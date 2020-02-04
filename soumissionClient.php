 <?php
                $db_username = 'user';
                $db_password = 'user';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $bdd = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
       
       
     if ( isset($_POST['idClient'], $_POST['mail'],  $_POST['mdp'], $_POST['adressePostale'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'] ))
       {
//if  ($_POST['envoyez']== 'Enregistrez l\'article') {
           /* Pour sécurisez la connecxion */
       
            $idClient = $_POST['idClient'] ;
            $mail = $_POST['mail'];
            $mdp =  $_POST['mdp'];
            $adressePostale =  $_POST['adressePostale'];
            $nom = $_POST['nom'];
            $prenom =$_POST['prenom'];
            $telephone = $_POST['telephone'];
            
            /*requete pour inserer l'article  */
          if(strlen($nom) > 255 AND strlen($prenom) > 255 AND strlen($aressePostale) > 255 AND strlen($mail) > 255 AND strlen($idClient) > 255 AND strlen($telephone) > 255 AND strlen($mail) > 255)
                   $erreur=" Il ne Faut pas depasser 255 caratères.";
               
         elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL))
                    $erreur="Entrez une boite e_mail correcte.";
                    
         elseif($telephone > 999999999)
                    $erreur="numéro de telephone trop grand.";
                
               
           
         else{

                  $requete = "SELECT count(*) FROM Client where idClient = ?'";
                  $exec_requete = mysqli_query($bdd,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                  $count = $reponse['count(*)'];

             
                   
                /*  $idClientCount=$bdd->prepare('SELECT count(*) FROM Client WHERE idClient=?');
                  $idClientCount->execute(array($idClient));
                  $idClientExist=$idClientCount->rowCount();
*/
                        

              if($count != 0) 
                        $erreur="idClient existe déjà !";
                
              else{
       
                 
                  $sql = "INSERT INTO Client (idClient,mail, mdp, adressePostale, nom, prenom, telephone)
                      	VALUES ('" .$idClient. "','" .$mail. "','" .$mdp. "','" .$adressePostale. "','" .$nom. "','" .$prenom. "','" .$telephone. "')";
                  $conn = mysqli_query ($bdd, $sql);
      
                    if ($conn === TRUE) 
                        header('Location: inscriptionOK.php');
                
            
                    else
                     echo "Error: " . $sql . "<br>" . $conn->error;
            
              
                              
          
         
                }
          }
     }
           
           
  else
   
        header('Location: inscriptionNOT.php?erreur=1');

  ?>
