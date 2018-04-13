<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Call for Help</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}


input[type=text] {
    width: 45%;
    height: 30em;
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
    width: 45%;
}

select {
    width: 45%;
    padding: 60px 40px;
    margin: 0px 0;
    display: block;
    border: 1px solid #ccc;
    box-sizing: border-box;
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

require_once "./opt/lampp/lib/php/Mail.php";

session_start();
$db_host = 'localhost';
$db_name = 'test';
$db_user = 'root';
$db_password = '';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

$mail = $_SESSION['email'];
$statement2 = $pdo->prepare("SELECT * FROM schools");
$school = $statement2->execute();


$from = "taraji <ara_dawla@yahoo.fr>";
$to = "Ramona Recipient <arafet.benamor@aol.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";
$host = "smtp.mail.yahoo.com";
$username = "ara_dawla@yahoo.fr";
$password = "Eya2013@";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));
$mail = $smtp->send($to, $headers, $body);
echo 'Mail send';
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?> 
	
<form method="post" action="action_page.php?attempt">
	<div class="container">
	
	<?php 
	echo 'Herzlich Willkommen ' . $_SESSION['anrede'] . ' ' . $_SESSION['vorname'] . ' ' . $_SESSION['nachname'] . " im Bereich Call for Help.</br>
    Sie betreuen folgende Schulen. Wählen Sie bitte den Standort aus: ";
	echo '<select name="schule">';
	while($school = $statement2->fetch()) {
		if($school['email'] == $mail) {
			echo '<option value="'.$school['school_name'].'">'.$school['school_name'].'</option>';
		} 
	}
	echo '</select></br></br>';
	
	echo "Hier können Sie die Fehlermeldung beschreiben.</br></br></br>";
	?> 
	
    <label for="fehler"><b>Fehler Kategorie</b></label></br>
    <select name="fehler">
    	<option value="Client">Client</option>
    	<option value="Digitales Whiteboard">Digitales Whiteboard</option>
    	<option value="NAS">NAS</option>
    	<option value="Peripherie">Peripherie</option>
    	<option value="Server">Server</option>
    </select></br>
    <label for="beschreibung"><b>Beschreibung</b></label></br>
    <textarea name="html_elemente"  cols="50" rows="15" maxlength="10000" wrap="soft"></textarea></br>
    <button type="submit" href="action_page.php">Senden</button></br></br></br></br>    

  	</div>

</form>

</body>
</html>

