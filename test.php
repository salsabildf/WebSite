












<?php

session_start();
    try {

        $bdd = new PDO('mysql:host=localhost;dbname=user;charset=utf8', 'user', 'user');
        
    } catch (Exception $e) {

        echo 'erreur :'. $e->getMessage() ;
        
    }

    if (isset($_POST['forminscription'])){

              $nom=htmlspecialchars($_POST['nom']);
              $prenom=htmlspecialchars($_POST['prenom']);
              $adressePostale=htmlspecialchars($_POST['adressePostale']);
              $idClient=htmlspecialchars($_POST['idClient']);
              $telephone=htmlspecialchars($_POST['telephone']);
              $mail=htmlspecialchars($_POST['mail']);
              $mot_de_passe=sha1($_POST['mdp']);
            


        if (!empty($_POST['nom'] ) AND !empty($_POST['prenom'] ) AND !empty($_POST['adressePostale'] )
                                  AND !empty($_POST['idClient'] ) AND !empty($_POST['telephone'] ) AND !empty($_POST['mail'] )
                                  AND !empty($_POST['mot_de_passe'] )){
            
              if(strlen($nom) > 255 AND strlen($prenom) > 255 AND strlen($aressePostale) > 255 AND strlen($mail) > 255 AND strlen($idClient) > 255 AND strlen($telephone) > 255 AND strlen($mail) > 255)
                   $erreur="Faut pas depasser les 255 caratères.";
               
              elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL))
                    $erreur="Entrez une boite e_mail correcte.";
              elseif($telephone > 9999999999)
                    $erreur="numéro de telephone trop grand.";
                
                
              else{

                        $idClientCount=$bdd->prepare('SELECT * FROM Client WHERE idClient=?');
                        $idClientCount->execute(array($idClient));
                        $idClientExist=$idClientCount->rowCount();

                        

                    if ($idClientExist != 0)
                        $erreur="idClient existe déjà !";
                
                    else{

                         $insertMembre=$bdd->prepare( ' INSERT INTO Client (idClient , mail , mdp , AdressePostale , nom, prenom, telephone) VALUES ( ?,?,?,?,?,?,?) ');
                         $insertMembre->execute(array($idClient , $mail , $mdp , $AdressePostale , $nom, $prenom, $telephone));

                          $message="Votre compte a bien était créé. <a class=\"button\" href=\"login.php\">Je me connecte !</a>"; //faire gaffe pour le code postal
                    }
                }
        }

        else
            $message ="<p class=\"button\">  Tous les champs doivent être remplis </p>";
    }

?>




 <link rel="stylesheet" href="inscription.css" media="screen" type="text/css" />

<!Doctype html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

            
 <div class="container">
 <!---heading---->
 <form method="POST" action=" ">
     <header class="heading"> Formulaire d'inscription</header><hr></hr>
    <!---Form starting----> 
    <div class="row ">
     <!--- For Name---->
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="firstname">Nom :</label> </div>
                 <div class="col-xs-8">
                     <input type="text" name="Nom" id="nom" placeholder="Entrez votre nom" class="form-control " value="<?php if (isset( $nom)) echo $nom;  ?>" />
             </div>
              </div>
         </div>
         
         
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="lastname">Prénom :</label></div>
                <div class ="col-xs-8">  
                     <input type="text" name="prenom" id="prenom" placeholder="Entez Votre Prénom" class="form-control last" value="<?php if (isset( $prenom)) echo $prenom;  ?>" />
                </div>
             </div>
         </div>
     <!-----For email---->
         <div class="col-sm-12">
             <div class="row">
                 <div class="col-xs-4">
                     <label class="mail" >E-mail :</label></div>
                 <div class="col-xs-8"  >    
                      <input type="text" name="mail"  id="mail"placeholder="Entrez votre E-mail" class="form-control" value="<?php if (isset( $mail)) echo $mail;  ?>" >
                 </div>
             </div>
         </div>
     <!-----For Password and confirm password---->
          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Adresse Postale :</label></div>
                  <div class="col-xs-8">
                         <input type="text" id="adressePostale" name="adressePostale" placeholder="Entrez votre Adresse Postale" class="form-control" value="<?php if (isset( $adressePostale)) echo $adressePostale;  ?>" >
                 </div>
          </div>
          </div>

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Téléphone :</label></div>
                  <div class="col-xs-8">
                         <input type="number" name="telephone" id="telephone" placeholder="Entrez votre numéro de téléphone" class="form-control" value="<?php if (isset( $telephone)) echo $telephone;  ?>">
                 </div>
          </div>
          </div>

           <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Crééez votre ID de connexion :</label></div>
                  <div class="col-xs-8">
                         <input type="number" name="idclient" id="idclient" placeholder="Entrez votre ID " class="form-control" value="<?php if (isset( $idClient)) echo $idClient;  ?>">
                 </div>
          </div>
          </div>

          <div class="col-sm-12">
                 <div class="row">
                     <div class="col-xs-4">
                          <label class="pass">Entrez un mot de passe :</label></div>
                   <div class="col-xs-8">
                         <input type="password" name="mdp" id="mdp" placeholder="Entrez un mot de passe" class="form-control">
                  </div>
              </div>
          </div>

         
          </div>
          
         <div class="col-sm-12">
             <div class ="row">
                 <div class="col-xs-4 ">
                   <label class="gender">Sexe:</label>
                 </div>
             
                 <div class="col-xs-4 male">     
                     <input type="radio" name="sexe"  id="sexe" value="homme">Mr</input>
                 </div>
                 
                 <div class="col-xs-4 female">
                     <input type="radio"  name="sexe" id="sexe" value="femme" >Mme</input>
                 </div>
            
             </div>
             <div class="col-sm-12">

                 <div class="btn btn-warning">
                        <input class="btn btn-warning" type="submit" name="forminscription" value="S'inscrire" />
                 </div>
           </div>
         </div>
     </div>  
</form>
     <?php 

                    if (isset($erreur)) {
                        echo '<div class="btn btn-warning2" > ' .$erreur .    '</div>'    ;
                    }

                 ?>
                 
         
</div>

</body>     
</html>
     
     