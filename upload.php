<?php
session_start();
$upload_folder = 'upload/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));

//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
 die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
}
 
//Überprüfung der Dateigröße
$max_size = 500*1024; //500 KB
if($_FILES['datei']['size'] > $max_size) {
 die("Bitte keine Dateien größer 500kb hochladen");
}
 
//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;
$_SESSION['newpath'] =  $new_path;
 
//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
    $id = 1;
    do {
    $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
    $_SESSION['newpath'] =  $new_path;
    $id++;
    } while(file_exists($new_path));
}
 
//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
header ('LOCATION: send.php');

?>