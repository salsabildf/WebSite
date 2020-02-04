<html>
    <head>
        <meta charset="utf-8">
        		<title> ✿ Pamplemouse </title>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="recherche.css" media="screen" type="text/css" />
    </head>
    <div id="barre-nav">
        <ul>
            
             <!-- Barre de recherche -->
            <form action="article.php" method="POST">
            <input id="search" name="recherche" type="text" placeholder="Mot clé" />
            <input id="search-btn" type="submit" value="Rechercher" />
            </form>
        </ul>
        
    </div>
    


        


    <style type="text/css">
        
        
    form {
    width:30%;
    margin:0 auto 0 auto;
    padding: 10px;
    border: 1px solid #f1f1f1;
    background: none;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    border-radius: 10px;
    }
    #barre-nav #search {
    background-color: #429398;   
    border-style: solid;   
    border-width: 1px;   
    border-color: #ffffff;
    
  
    
    border: none;   /* Supprime les bordures par défaut */
    border-bottom-style: solid;   /* Style de la bordure */
    border-bottom-width: 1px;   /* Epaisseur de la bordure */
    border-bottom-color: #ffffff;   /* Couleur de la bordure */
    


    padding: 5px 5px 5px 5px; 
    color: #fff;   /* Couleur du texte du champ de saisie */    
    letter-spacing: 1px;   /* Espacement des caractères du texte du champ de saisie */
    font-family: 'Lora', serif;   /* Police du texte du champ de saisie */
    font-style: italic;   /* Style de la police du texte du champ de saisie : normal = normal ; italic = italique */
    font-weight: normal;   /* Graisse du texte du champ de saisie : normal = normal ; bold = gras */
    font-size: 14px;   /* Taille de la police du texte du champ de saisie */
    }
    /* Couleur du texte par défaut du champ de saisie */
::-webkit-input-placeholder {
color: #ffffff;
}
:-moz-placeholder { /* Firefox 18- */
color: #ffffff; 
}
::-moz-placeholder { /* Firefox 19+ */
color: #ffffff; 
}
:-ms-input-placeholder { 
color: #ffffff; 
}
    
    
    /* Bouton valider */
    #barre-nav #search-btn {
    color: #429398;   /* Couleur du texte du bouton valider */
    letter-spacing: 1px;   /* Espacement des caractères du texte du bouton valider */
    font-family: 'Lato', sans-serif;   /* Police du texte du bouton valider */
    font-style: normal;   /* Style de la police du texte du bouton valider : normal = normal ; italic = italique */
    font-weight: normal;   /* Graisse du texte du bouton valider : normal = normal ; bold = gras */
    font-size: 12px;   /* Taille de la police du texte du bouton valider */
    text-transform: uppercase;   /* Texte en majuscules */
    background-color: #fff;   /* Fond du bouton valider */
    border: none;
    padding: 5px 10px 5px 10px;
    margin-left: 5px;
    }
    
    /* Bouton valider au survol de la souris */
    #barre-nav #search-btn:hover {
    background-color: #e7c049;   /* Couleur de fond */
    color: #fff;   /* Couleur de la police */
    }   
    </style>
    
    
    
    
    
    
</html>