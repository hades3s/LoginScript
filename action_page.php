<?php 
session_start();
require_once("db.php");
$_SESSION['email2'] = $_POST['email2'];
$_SESSION['vorname2'] = $_POST['vorname2'];
$_SESSION['nachname2'] = $_POST['nachname2'];
$mail = $_SESSION['email'];
include ("header.php");
?>
<!DOCTYPE html>

		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-6  align ="center">
        			
        			<form method="post" action="upload.php" enctype="multipart/form-data">
					    <div class="form-group">
						
						</div> 
				        <div class="form-row">
						    <div class="col-md-7 mb-3">
						        <label for="fehler"><b>- Wählen Sie bitte eine Kategorie aus.</b></label>
    						</div>
						    <div class="col-md-5 mb-3">
						        <select class="custom-select" name="fehler" method="post">
						            <option value="leer"></option>
    	                            <option value="Client">Software</option>
    	                            <option value="Digitales Whiteboard">Präsentationssysteme</option>
    	                            <option value="NAS">NAS</option>
    	                            <option value="Peripherie">Peripherie</option>
                                    <option value="Server">Server</option>
                                    <option value="Sonstiges">Sonstiges</option>
                                </select>
    						</div>
    					</div>
				        <div class="form-row">
						    <div class="col-md-9 mb-3">
						        <label for="f_name"><b>- Name/Modell der betroffenen Hard-/Software</b></label>
                                <textarea class="form-control" name="f_name"  cols="25" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Softwarename, Gerätemodell ...."></textarea>
    						</div>						    
						    <div class="col-md-3 mb-3">
                                <label for="f_anzahl"><b>Anzahl</b></label>
                                <input type="text" class="form-control" id="validationCustom03" name = "f_anzahl" placeholder="0" required>
    						</div>

    					</div>						
    					<div class="form-group">
							<label for="f_wann"><b>- Wann tritt die Störung ein?</b></label>
							<textarea class="form-control" name="f_wann"  cols="25" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Dauerhaft?"></textarea>
						</div>
    					<div class="form-group">
							<label for="f_wie"><b>- Wie macht sich die Störung bemerkbar?</b></label>
							<textarea class="form-control" name="f_wie"  cols="25" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Wenn mehrere benutzer sich anmelden...."></textarea>
						</div>
						<div class="form-group">
							<label for="f_quellen"><b>- Wurden Fehlerquellen ausgeschlossen?</b></label>
							<textarea class="form-control" name="f_quellen"  cols="25" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Neustart, Überprüfung der Anschlüsse ...."></textarea>
						</div> 
						<div class="form-group">
							<label for="beschreibung"><b>- Beschreibung</b></label></br>
							<textarea class="form-control" name="beschreibung"  cols="25" rows="3" maxlength="10000" wrap="soft" method="post"></textarea>
						</div> 
                        <div class="form-group">
                            <label for="datei"><b>- Hier können Sie eine Datei (Screenshot..) hochladen.</b></label>
                            <input type="file" name="datei">
                        </div>
					
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control" name="senden">Senden</button>
						</div> 
					</form>
          		</div>
        	</div>
    	</div>
    	<div class="footer" align = "center">
        	<p>Powered by</p>
        	<a  href="http://www.3s-hamburg.de"><img src="images/3s_logo.png"  /></a>
   		</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

