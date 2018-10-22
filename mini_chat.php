<?php
	$title = MiniChat;
	$css = "css/index.css";
	require('entete.php');
	require('connexion_bdd.php');
?>
<h1>Mini Chat V1</h1>
<!--
	définition du formulaire
-->
<form action="mini_chat_post.php" method="POST">
		<div>
	        <label for="pseudo">Pseudo :</label>
	        <input type="text" name="pseudo" value="<?php 
	        if(isset($_COOKIE['pseudo'])) echo htmlspecialchars($_COOKIE['pseudo']);
	        ?>">
	    </div>
	    <div>
	        <label for="message">Message :</label>
	        <textarea id="msg" name="message"></textarea>
	    </div>

	    <div class="button">
        	<button type="submit">Valider</button>
   		</div>
</form>

<!--
	définition de l'affichage des messages
-->

<?php
	$affichage = $bdd->query('SELECT pseudo, message, date_msg FROM minichat ORDER BY id DESC');

	while ($donnees = $affichage -> fetch() )
	{
		 ?>
		 <p> 
				    <?php echo htmlspecialchars($donnees['date_msg']); ?> - 
				    <strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong> : <br />
				    <?php echo htmlspecialchars($donnees['message']); ?><br />
		</p>


<?php
	}
	$affichage->closeCursor();
?>

<?php
	require('fin.php')
?>