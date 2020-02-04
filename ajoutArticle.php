  <?php
       
       include("menuCreateur.php");
       ?>
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
     
       <form action="soumissionArticle.php" method="POST">
        <label class="ecriture"> <b>Categorie de l'article </b></label>
             <br> 
             <select class="ecriture" name = "categorie">
              <option value="Jupe">Jupe</option>
              <option value="Pantalon">Pantalon</option>
              <option value="Jean">Jean</option>
              <option value="Tee-shirt">Tee-shirt</option>
              <option value="Robe">Robe</option>
         
             </select>
             <br><br>
             
             <label class="ecriture"> <b>Couleur de l'article</b></label>  <br>
             <input type="color" placeholder="Ex : blue" name ="couleur" required>
             <br>
              <br>
          <label class="ecriture"> <b>Id de l'article</b></label>  <br>
          <input type="number" placeholder="Ex : 188924" name ="idArticle" required>
          <br>  <br>
          <label class="ecriture" > <b>Prix de l'article en €</b></label>  <br>
          <input type="number" placeholder="Ex : 13 €" name ="prix" required>
           <br>  <br>
          
          <label class="ecriture"> <b>Nom de l'article</b></label>
          <input type="text" placeholder="Ex : Pantalon Jubela" name ="nom" required>
          <br>
           
           <label class="ecriture"> <b>Taille de l'article</b></label>
          <input type="text" placeholder="Ex : XS " name ="taille" required>
            <br>  
         
           
         <input type ="submit" value="Enregistrez l'article"  name = "envoyez"/>
       
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