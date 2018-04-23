<?php 
session_start();
require_once("db.php");
$_SESSION['button'] == "anfrage";
include ("header.php");
?>
		<div class="container" style ="margin-top: 20px">
			<div class="row justify-content-center">
        		<div class="col-md-6  align ="center">
        			
        			<form method="post" action="upload.php" enctype="multipart/form-data">
					    <div class="form-group">
						
						</div> 
				        <div class="form-row">
						    <div class="col-md-6 mb-3">
						        <label for="anfrage"><b>- Die gewünschte Anfrage:</b></label>
    						</div>
						    <div class="col-md-6 mb-3">
						        <select class="custom-select" name="anfrage" method="post">
						            <option value="leer"></option>
    	                            <option value="Vollwertige Change">Vollwertige Change</option>
    	                            <option value="Mini Change">Mini Change</option>
    	                            <option value="Koordinator">Koordinatorengespräch</option>
    	                            <option value="Beratung">Beratung</option>
                                </select>
    						</div>
    					</div>
				        <div class="form-row">
						    <div class="col-md-6 mb-3">
						        <label for="anlaß"><b>- Anlaß der Anfrage:</b></label>
    						</div>
						    <div class="col-md-6 mb-3">
						        <select class="custom-select" name="anlaß" method="post">
						            <option value="leer"></option>
    	                            <option value="Neue Anschaffung">Neue Anschaffung</option>
    	                            <option value="Unzuverlässiges System">Unzuverlässiges System</option>
    	                            <option value="Regel Change">Regel Change</option>
    	                            <option value="Umstrukturierung">Umstrukturierung</option>
                                </select>
    						</div>
    					</div>
						<div class="form-group">
							<label for="zeitraum"><b>- Gewünschte Zeitraum</b></label>
							<textarea class="form-control" name="zeitraum"  cols="25" rows="1" maxlength="100" wrap="soft" method="post" placeholder = "Wann sollte das Gespräch/ Change stattfinden?"></textarea>
						</div> 
						<div class="form-group">
							<label for="bemerkung"><b>- Weitere Bemerkungen</b></label></br>
							<textarea class="form-control" name="bemerkung"  cols="25" rows="5" maxlength="10000" wrap="soft" method="post" placeholder = "Was wird angeschaft? (Hard-/ Software: Name, Modell, Version, Anzahl....)"></textarea></br>
						</div> 
                        <div class="form-group">
                            <label for="datei"><b>- Hier können Sie eine Datei (Screenshot..) hochladen.</b></label>
                            <input type="file" name="datei">
                        </div>					
						<div class="form-group">
							<button type="submit" class="btn btn-secondary btn-block" class="form-control">Senden</button>
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

