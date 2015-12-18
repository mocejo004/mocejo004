<?php
	$eposta=$_POST['emailSignIn'];
	$pasahitza=$_POST['passwordSignIn'];
	$pasahitzaKodeatuta=base64_encode($pasahitza);

	$link = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($link->connect_errno) {
		printf("Falló la conexión: %s\n", $link->connect_error);
		exit();
	}
	
	$result=mysqli_query($link,"SELECT Eposta FROM ERABILTZAILEA WHERE Eposta='$eposta' AND Pasahitza='$pasahitzaKodeatuta' AND Onartua=1");

	$row_cnt = $result->num_rows;
	if($row_cnt==1){
		session_start ();
		$_SESSION['eposta'] = $eposta;
		if($eposta=="admin@ikasle.ehu.eus"){
			header('Location:albumAdmin.php');
		}else{
			header('Location:logeatuta.php');
		}
	}else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script type="text/javascript" src="js/javascript.js"></script>
    </head>
    <body onload="return bilatu('publikoa','')">
               <div class="container">

            <div class="jumbotron">
                <h1>Web Sistemak praktika orokorra</h1> 
                <p>Argazki albuma!</p> 
            </div>
                   <form id="signin" class="navbar-form navbar-right" role="form" action="Login.php" method="POST">

                       <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <input id="emailSignIn" type="email" class="form-control" name="emailSignIn" value="" placeholder="UPV-ko E-posta">
                       </div>

                       <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                           <input id="passwordSignIn" type="password" class="form-control" name="passwordSignIn" value="" placeholder="Pasahitza">
                       </div>
					     <button type="submit" class="btn btn-primary">Logeatu</button>
						<div >
							<p style='color:red'>Erabiltzailea edo pasahitza txarto sartu dituzu!</p>
						</div>
				</form>
				                   <div class="row">
                       <div class="col-md-4">


                           <form class="form-horizontal" action="gordeErabiltzailea.php" method="POST">
                               <fieldset>
                                   <div id="legend">
                                       <legend class="">Erregistratu</legend>
                                   </div>
                                   <div class="control-group">
                                       <label class="control-label" for="usernameSignUp">Erabiltzaile izena</label>
                                       <div class="controls">
                                           <input type="text" id="usernameSignUp" name="usernameSignUp" placeholder="Zure Izena" class="form-control input-lg">
                                           <p class="help-block">Erabiltzaile izena, hutsunerik gabe</p>
                                       </div>
                                   </div>

                                   <div class="control-group">
                                       <label class="control-label" for="emailSignUp">E-posta</label>
                                       <div class="controls">
                                           <input type="email" id="emailSignUp" name="emailSignUp" placeholder="example000@ikasle.ehu.eus" class="form-control input-lg">
                                           <p class="help-block">Mesedez sartu zure Upv-ko E-posta</p>
                                       </div>
                                   </div>

                                   <div class="control-group">
                                       <label class="control-label" for="passwordSignUp">Pasahitza</label>
                                       <div class="controls">
                                           <input type="password" id="passwordSignUp" name="passwordSignUp" placeholder="Pasahitza" class="form-control input-lg">
                                           <p class="help-block">Pasahitzak gutxienez 6 karaktere</p>
                                       </div>
                                   </div>

                                   <div class="control-group">
                                       <label class="control-label" for="password_confirmSignUp">Password (Confirm)</label>
                                       <div class="controls">
                                           <input type="password" id="password_confirmSignUp" name="password_confirmSignUp" placeholder="Berretsi pasahitza" class="form-control input-lg">
                                           <p class="help-block">Mesedez sartu berriro pasahitza</p>
                                       </div>
                                   </div>

                                   <div class="control-group">
                                       <!-- Button -->
                                       <div class="controls">
                                           <button class="btn btn-success">Aurrera!</button>
                                       </div>
                                   </div>
                               </fieldset>
                           </form>
                       </div>
                       <div class="col-md-8">





                           <div class="row">

                               <div class="col-lg-12">
                                   <h1 class="page-header">Argazki Galeria</h1>
                                   <div class="row"  >
                                       <form id="bilaketa" class="navbar-form navbar-right" role="form">

                                           <input type="text" id="bilaketaTextua" class="form-control" placeholder="Bilatu" value="">

                                           <button type="button" class="btn btn-default" onclick="return bilatu('publikoa','')"><i class="glyphicon glyphicon-search" ></i></button></br>

                                       </form>
                                   </div>
                               </div>


                           </div>
                           <div class="row " id="argazkiTaula">

                           </div>
                       </div>
                       <hr>

                       <!-- Footer -->
                       <footer>
                           <div class="row">
                               <div class="col-lg-12">
                                   <p>Copyright &reg mzumarraga004.esy.es</p>
                               </div>
                           </div>
                       </footer>

                   </div>
               </div>

               </div>

               </div>
	</body>
</html>
<?php
}
?>