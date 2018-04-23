<?php 
session_start();
require_once("db.php");
if (isset ($_POST['b_fehler']))  
    header('LOCATION: action_page.php'); 
if (isset ($_POST['b_anfrage']))
    header('LOCATION: action_page2.php');

$mail = $_SESSION['email'];

$statement2 = $pdo->prepare("SELECT * FROM schools");
$school = $statement2->execute();
include ("header.php");
?>

		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-6  align ="center">
        			
        			<form method="post" > 

        				<div class="form-row">
        				    <div class="col-md-12 mb-3">
						        <?php
						            if($_SESSION['ansprechpartner'] == 'ja')

	                                    echo "<b>Willkommen " . $_SESSION['anrede'] . ' ' . $_SESSION['vorname'] . ' ' . $_SESSION['nachname'] . " im Bereich Call for Help</b>";
	                                else
	                                    echo "<b>Bitte geben Sie Ihre Kontaktdaten ein.</b>";
	                            ?>
	                        </div>
					    </div>	
                        <?php
						   if($_SESSION['ansprechpartner'] == 'nein')
	                            echo "<div class=\"form-row\">
    						<div class=\"col-md-2 mb-3\">
      							<label for=\"validationCustom01\">Anrede</label>
      							<select class=\"custom-select\" name=\"anrede_neu\" method=\"post\">
      							    <option value=\"leer\"></option>
    	                        	<option value=\"anrede_herr\">Herr</option>
    	                        	<option value=\"anrede_frau\">Frau</option>
                           		</select></br>
    						</div>
    						<div class=\"col-md-5 mb-3\">
      							<label for=\"validationCustom02\">Vorname</label>
      							<input type=\"text\" class=\"form-control\" id=\"validationCustom02\" name = \"vorname2\" placeholder=\"Vorname\">
    						</div>
    						<div class=\"col-md-5 mb-3\">
      							<label for=\"validationCustom02\">Nachname</label>
      							<input type=\"text\" class=\"form-control\" id=\"validationCustom02\" name = \"nachname2\" placeholder=\"Nachname\">
    						</div>
  						</div>
  						
  						<div class=\"form-row\">
    						<div class=\"col-md-12\">
      							<label for=\"email2\">E-Mail Adresse</label>
      							<input type=\"text\" class=\"form-control\" id=\"validationCustom03\" name = \"email2\" placeholder=\"Bitte geben Sie Ihre E-Mail Adresse ein.\" required>
    						</div>
    					</div>";
    					?>
					    <div class="form-group">
						
						</div> 
        				<div class="form-group">
        				    <?php
        				        if ($_SESSION['count'] == 1)
        				            echo '<label for=\"Standort\">Die 3S Schule: <b>'.$_SESSION['school_name'].'</b></label></br></br></br></br>';
        				        else {  
            				        echo '<label for="Standort">Suchen Sie bitte den Standort aus.</label><select class="custom-select" name="schule">';
    						        while($school = $statement2->fetch()) {
    		                            if($school['email'] == $mail) {
    		                                $_SESSION['school_name'] = $school['school_name'];
    			                            echo '<option value="'.$school['school_name'].'">'.$school['school_name'].'</option>';
    		                            } 
    		                            $count++;
    	                            }
                                	echo '</select></br></br>';
        				        }
                            ?>
					    </div> 					    
					
						<div class="form-row">
						    <div class="col-md-6 mb-3">
						        <label for="meldung">Möchten Sie eine Störung melden?</label>
                                <button type="submit" class="btn btn-secondary btn-block" class="form-control" name = "b_fehler" action = "action_page.php">Fehler melden</button>
    						</div>
						    <div class="col-md-6 mb-3">
						        <label for="anfrage">(Mini-) Change/ Gespräch </label>
                                <button type="submit" class="btn btn-secondary btn-block" class="form-control" name = "b_anfrage" action = "action_page2.php">Anfrage Senden</button>
    						</div>
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

