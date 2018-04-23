<?php 
session_start();
require_once("db.php");
require_once("login.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Call for Help</title>
		<!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"> 
        <style>
            .footer {
               position: fixed;
               left: 0;
               bottom: 0;
               width: 100%;
               background-color: #f5f5f5;
               color: black;
               text-align: center;
            }
        </style>
	</head>
	<body>
		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-4  align ="center">
        			<center><img width="200px" height="200px" src="images/logo.png"></center><br><br><br><br>
        			
        			<form method="post">

						<div class="form-group">
							<label for="email"><b>E-Mail Adresse</b></label><br>
							<input type="text" id="inputEmail" placeholder = "Bitte geben Sie Ihre E-Mail Adresse ein." name="email" class="form-control">
						</div>
						<div class="form-row">
        				    <div class="col-md-8 mb-2">
							<label for="ansprechpartner">Verbinden Sie sich gerade mit der eigene E-mail Adresse?</label><br>
	                        </div>
    					    <div class="col-md-4 mb-2">
	                        	<select class="custom-select" name="ansprechpartner"  method="post" id="inputAP">
    	                            <option value="ja">ja</option>
    	                            <option value="nein">nein</option>
                                </select></br>
                            </div>
					    </div>
						<div class="form-group">
							<label for="inputPassword"><b>Passwort</b></label><br>
							<input type="password" id="inputPassword" name="password" placeholder = "Bitte geben Sie Ihren Passwort ein." class="form-control" ><br>
						</div> 
					
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control" >Anmelden</button>
						</div> 
					</form>
          		</div>
        	</div>
    	</div>
    	<div class="footer" align = "center">
        	<p>Powered by</p>
        	<a  href="http://www.3s-hamburg.de"><img src="images/3s_logo.png"  /></a>
   		</div> 
	</body>
</html>