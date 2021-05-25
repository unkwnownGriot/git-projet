<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<style>
body
{
        background: #333;
        color:#fff;
}
</style>
<body>
        
</body>
</html>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=testsql;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
$message = isset($_POST['message']) ? $_POST['message'] : NULL;

if( $message==''  AND $pseudo == '')
{
        echo "<h1>NON ET NON PAS DE SPAM NI DE COMMENTAIRE VIDE MERCI!!!!</h1>";
        echo "cliquez sur le bouton retour pour revenir c'était juste en guise de test héhé";

}
else
{
// Insertion du message à l'aide d'une requête préparée 
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
 $req->execute(array($_POST['pseudo'], $_POST['message']));
 // Redirection du visiteur vers la page du minichat
  header('Location: minichat.php');

}





?>
