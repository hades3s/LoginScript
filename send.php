<?php
session_start();
if ($_SESSION['ansprechpartner'] == 'nein')
    $kontakt = $_SESSION['vorname2'].$_SESSION['nachname2']." mit der folgende E-Mail Adresse: ".$_SESSION['email2'];
else
    $kontakt = $_SESSION['vorname']." ".$_SESSION['nachname']." mit der folgende E-Mail Adresse: ".$_SESSION['email'];
if($_SESSION['button'] == "fehler")
    $text = "Sehr geehrte Damen und Herren,</br></br>
    über Call for Help wurde folgende Störung erfasst:</br></br>
    - Fehlerkategorie: ".$_POST['fehler'].
    "</br>- Name/Modell der betroffenen Hard-/Software: ".$_POST['f_name'].
    "</br>- Wann tritt die Störung ein?</br>". 
    $_POST['f_wann'].
    "</br>- Wie macht sich die Störung bemerkbar?</br>".
    $_POST['f_wie'].
    "</br>- Wurden Fehlerquellen ausgeschlossen?</br>".
    $_POST['f_quellen'].
    "</br>- Anhang beigefügt? Ja/Nein [bool]</br></br>
    Störung gemeldet von: ".$kontakt.
    "</br></br>Diese Nachricht wurde automatisch generiert und bestätigt den Eingang Ihrer Störungsmeldung beim Schul-Support-Service. Nach erfolgter Bearbeitung erhalten Sie eine Rückmeldung mit der zugewiesenen Ticketnummer.</br></br>
    Mit freundlichen Grüßen,</br>
    - C4H -";
else
    $text = "Sehr geehrte Damen und Herren,</br></br>
    
    über Call for Help wurde folgende Anfrage gemeldet:</br></br>
    
    - Die gewünschte Anfrage: ".$_POST['anfrage'].
    "</br>- Anlaß der Anfrage:</br>". 
    $_POST['anlaß'].
    "</br>- Gewünschte Zeitraum</br>".
    $_POST['zeitraum'].
    "</br>- Weitere bemerkung</br>".
    $_POST['bemerkung'].
    "</br>- Anhang beigefügt? Ja/Nein [bool]</br></br>
    Störung gemeldet von: ".$kontakt.
    "</br></br>Diese Nachricht wurde automatisch generiert und bestätigt den Eingang Ihrer Anfrage beim Schul-Support-Service. Nach erfolgter Bearbeitung erhalten Sie eine Rückmeldung mit der zugewiesenen Ticketnummer.</br></br>
    Mit freundlichen Grüßen,</br>
    - C4H -";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "xxxxxxxxxxxxxx";  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "xxxxxxxxxxxxx";                 // SMTP username
    $mail->Password = "xxxxxxxxxxxx";                           // SMTP password
    $mail->SMTPSecure = "tls";                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $adress="xxxxxxxxxxxxx";
    $mail->setFrom("xxxxxxxxxxxxx");
    $mail->addAddress($adress);     // Add a recipient
    if ($_SESSION['email2'] != "")
        $mail->addAddress($_SESSION['email2']);  //addAddress('bani.hel@googlemail.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment($_SESSION['newpath']);         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "[3S C4H] [".$_SESSION['school_name']."] ".$_POST['fehler'];
    $mail->Body    = $text;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send())
    	header ('Location: action_page3.php');
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>