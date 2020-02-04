<?php

				$db_username = 'Preparateur';
                $db_password = 'Preparateur';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');

                $commande = $_GET['id'];
                $today = date("Y-n-j");
                $id = rand ( 50 , 9999 );
                $sql = "SELECT idCommande FROM Commande WHERE idCommande = 5".$id."";
                $result = $db->query($sql);
                                
                $sql = " INSERT INTO `Facture` (`idFacture`, `dateEdition`, `idCommande`) VALUES
						 (5".$id.", '".$today."', ".$commande.") ";
				$result = $db->query($sql);
				if ($result){
				header('Location: accueilPreparateur.php');
				} else {
					header ('Location: editerFacture.php?id=".$commande."');
				}
				
         
?>
