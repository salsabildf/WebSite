<html>
    <head>
        <meta charset="utf-8">
        		<title> ✿ Pamplemouse </title>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>

<?php
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

$rech = $_GET['param'];

$sql = "SELECT DISTINCT nom FROM articles_dispo WHERE 
				categorie like '".$rech."' ";
				
				
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "".$rech."<br> <br> <br>";
    while($row = $result->fetch_assoc()) {
        echo "
				<a class = \"photos\" href = \"vueArticle.php?nom=".$row['nom']."\">  
				<img src=\"/pamplemousse/image/".$row['nom'].".jpg\" alt=\"".$row['nom']."\" style=\"float:right;width:220px;height:340px;\">
				</a>
			 ";
    }

} else {
    echo "aucun résultat n'a été trouvé pour la recherche \" ".$rech." \"";
}
$conn->close();

?>
</html>
