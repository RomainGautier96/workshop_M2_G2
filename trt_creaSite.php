

<?php
$nameSite = $_POST['organisation'];
$loginConnexion = $_POST['loginConnexion'];
$pwdConnexion = $_POST['pwdConnexion'];

// On formate le nom de l'organisation
$nameSite = str_replace(' ', '_', $nameSite); 
$nameSite = str_replace("'", "", $nameSite);

// On copie colle le dossier baseDir/ sous le nom de l'oganisation
shell_exec("cp -avr baseDir/ $nameSite/");


// Connexion a BDD pour donner les droits a l'utilisateur
function connexionBDD($name,$login,$pwd){
	$bdd = new PDO('mysql:host=127.0.0.1;dname='.$name.';charset=utf8',$login,$pwd);
	return $bdd;
}

$bdd = connexionBDD("WCD2","root","passwordBDD");
// Creation de sa base
$sql = "CREATE DATABASE $nameSite;";
$statement = $bdd->prepare($sql);
$statement->execute();

// On donne les droits
$sqlLogin = "GRANT ALL PRIVILEGES ON $nameSite.* TO '$loginConnexion'@'localhost' identified by '$pwdConnexion';";
$statement = $bdd->prepare($sqlLogin);
$statement->execute();

// On applique les droits
$sqlFlush = "FLUSH PRIVILEGES;";
$statement = $bdd->prepare($sqlFlush);
$statement->execute();

// On demarre les var de SESSION pour l'automatisation
session_start();

// Affectation des variables
$_SESSION['langueSite'] = $_POST['pays'];
$_SESSION['nomOrganisation'] = $nameSite;
$_SESSION['descriptifOrganisation'] = $_POST['descriptif'];

$_SESSION['loginConnexion'] = $loginConnexion;
$_SESSION['pwdConnexion'] = $pwdConnexion;

$_SESSION['loginSPIP'] = $_POST['loginSPIP'];
$_SESSION['pwdSPIP'] = $_POST['pwdSPIP'];

$_SESSION['pseudo'] = $_POST['signature'];
$_SESSION['mail'] = $_POST['mail'];

// Redirection vers l'installation de SPIP de cet nouvel espace
header("Location: https://wdc2.vm.g6t.fr/$nameSite/ecrire/?exec=install&etape=1&chmod=493");
sleep(5);

