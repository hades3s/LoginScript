<?php 
    session_start();
    
    $count = 0;
	$email = $_POST['email'];
	$password = $_POST['password'];
	  

	
	$statement1 = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	$result1 = $statement1->execute(array('email' => $email));
	$user = $statement1->fetch();
	
	$statement2 = $pdo->prepare("SELECT * FROM schools");
    $school = $statement2->execute();
	while($school = $statement2->fetch()) {
		if($school['email'] == $email){
		    $_SESSION['school_name'] = $school['school_name'];
		    $count = $count + 1;
		}
	}
	$_SESSION['count'] =$count;

	//Überprüfung des Passworts
	if ($user !== false && ($password == $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];
		$_SESSION['anrede'] = $user['Anrede'];
		$_SESSION['vorname'] = $user['vorname'];
		$_SESSION['nachname'] = $user['nachname'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['ansprechpartner'] = $_POST['ansprechpartner'];
		header('LOCATION:ansprechpartner.php');
		exit;
	} 

?>