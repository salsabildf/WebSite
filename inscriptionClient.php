<html>
           <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <head></head>
   </html>   
 
  
  <!DOCTYPE html>
   <html>
    <head>
     <meta charset="utf-8">
         <link rel="stylesheet" href="form.css" media="screen" type="text/css" />
    </head>
    
    <body>
     
       <form action="soumissionClient.php" method="POST">
        <label class="ecriture"> <b>Vous êtes : </b></label>
             <br> 
             <select class="ecriture" >
              <option value="femme">Mr</option>
              <option value="homme">Mme</option>
         
         
             </select>
             <br><br>
             
             <label class="ecriture"> <b>Votre nom </b></label>  <br>
             <input type="text" placeholder="Entrez votre nom" name ="nom" required>
             <br>
       
          <label class="ecriture"> <b>Votre prénom</b></label>  <br>
          <input type="text" placeholder="Entrez votre prénom" name ="prenom" required>
          <br>  
          <label class="ecriture" > <b>Votre mail</b></label>  <br>
          <input type="text" placeholder="Entrez votre mail" name ="mail" required>
           <br> 
            <label class="ecriture"> <b>Céez votre ID  Client de connexion</b></label> <br>
          <input type="number" placeholder="Ex : 348200 " name ="idClient" required>
            <br> 
          <label class="ecriture"> <b>Votre adresse Postale</b></label>
          <input type="text" placeholder="Entrez votre adresse Postale" name ="adressePostale" required>
          <br>
           
           <label class="ecriture"> <b>Votre numéro de téléphone</b></label><br>
          <input type="number" placeholder="Entrez votre numéro de téléphone" name ="telephone" required>
            <br><br>
            
          <label class="ecriture"> <b>Votre numéro de mot de passe</b></label>
          <input type="password" placeholder="Entrez votre mot de passe " name ="mdp" required>
            <br>  
           
         <input type ="submit" value=" Finaliser l'inscription"  name = "envoyez"/>
       
                <br>
         <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p class = \"ecriture\"  style='color:red'>Article non enregistré</p>";
                }
                ?>
       </form>
     <?php if (isset($message)) {echo $message;} ?>
    </body>
   </html>