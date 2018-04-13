<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Call for Help</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password] {
    width: 30%;
    padding: 15px 10px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4682B4 ;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
}

button:hover {
    opacity: 0.8;
}
   
.container {
    margin: auto;
    width: 50%;
    border: none;
    padding: 10px;
}

span.psw {
    float: right;
    border-style: none;
    padding-top: 10px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen {
    span.psw {
      display: block;
      float: none;
    }
}
h2.h2text{
	text-align: center;
}
</style>
</head>
<body>
<center><img width="200px" height="200px" style="margin-bottom: 20px" src="logo.png" /></center>
<h2 class= "h2text"> Fehlermeldung </h2>

<?php 
session_start();
if(isset($_REQUEST['attempt'])) {
	
	$db_host = 'localhost';
	$db_name = 'test';
	$db_user = 'root';
	$db_password = '';
	$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$statement1 = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	$result1 = $statement1->execute(array('email' => $email));
	$user = $statement1->fetch();
	
	//Überprüfung des Passworts
	if ($user !== false && ($password == $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];
		$_SESSION['anrede'] = $user['Anrede'];
		$_SESSION['vorname'] = $user['vorname'];
		$_SESSION['nachname'] = $user['nachname'];
		$_SESSION['email'] = $user['email'];
		header('LOCATION:action_page.php');
		exit;
	} 
} 

?>

<form method="post" action="index.php?attempt">
	<div class="container">
  
    Herzlich Willkommen im Bereich Call for Help.</br>
    Dieser Bereich ist passwortgeschuetzt. Bitte geben Sie Ihre Zugangsdaten ein.</br></br></br>
    <label for="email"><b>E-Mail Adresse</b></label>
    <input type="text" placeholder="Bitte geben Sie Ihre E-Mail Adresse ein." name="email" required>
   
    <label for="psw"><b>Passwort</b></label>
    <input type="password" placeholder="Bitte geben Sie Ihren Passwort ein." name="password" required>
    <button type="submit" href="index.php">Anmelden</button></br></br></br></br>    

    
    <b>Hinweis!</b> Sollten Sie noch nicht ueber ein Passwort verfuegen, dann setzen Sie sich doch einfach mit unserer <a href="www.3s-hamburg.de/kontakt/" target="_blank">Service Hotline</a> in Verbindung
  </div>

</form>

</body>
</html>