<?php
setcookie('pseudo',$_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
require('connexion_bdd.php');//connexion à la base de données 
try {
	//verrifie si les variables existe et si les champs on bien été remplie
	if (isset($_POST['pseudo']) AND isset($_POST['message']) AND trim($_POST['pseudo'])!="" AND trim($_POST['message'])!="")
	{	//on insert les données dans la table 
		$info= $bdd->prepare('INSERT INTO minichat(pseudo, message, date_msg) VALUES(:pseudo, :message, now())');
		$info->execute(array(
			'pseudo' => $_POST['pseudo'],
			'message' => $_POST['message']));
	}
}
catch (PDOException $e) {
	die('Erreur : '. $e->getMessage().' Erreur : '. $e->getCode());
}
//redirection vers le mini_chat.php
header('Location:mini_chat.php');
?>