<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    </head>
    <body>
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
                   </form><br/>
			</div>
            <div class="row" align="center">
						<?php
							$link = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

							if ($link->connect_errno) {
								printf("Falló la conexión: %s\n", $link->connect_error);
								echo $mezua."</br><a href='albumpubliko.html'>Hasierara bueltatu</a>";
								exit();
							}
							$errorea=false;
							$mezua="</br></br><h1 style='color:red'>EZIN IZAN DA ERABILTZAILEA GORDE</h1>";
							$erabIzena=$_POST['usernameSignUp'];
							$eposta=$_POST['emailSignUp'];
							$gakoa=$_POST['passwordSignUp'];
							$gakoa2=$_POST['password_confirmSignUp'];
							
							if($erabIzena===""){
								$mezua=$mezua."<p>Erabiltzailearen izenak ezin du hutsa izan. </p>";
								$errorea=true;
							}
							
							if($gakoa!=$gakoa2){
								$mezua=$mezua."<p>Bi gakoak ez dira berdinak. </p>";
								$errorea=true;
							}
							
							if(strlen($gakoa)<6){
								$mezua=$mezua."<p>Gakoak gutxienez 6 karaktere/zenbaki</p>";
								$errorea=true;
							}
							
							if(!filter_var($eposta,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-z]{1,}\d{3}@ikasle\.ehu\.(eus|es)$/")))){
								$mezua=$mezua."<p>Erabiltzailearen eposta formatua ez da onartzen.</p>";
								$errorea=true;
							}
							if($errorea==false){
									$pasahitza=base64_encode($gakoa);
									$mota='User';
									$result=mysqli_query($link,"INSERT INTO ERABILTZAILEA VALUES('$eposta','$pasahitza','$mota',0)");
							
									if(!$result){
										echo "Errorea erabiltzailea gordetzerakoan. Baliteke email hori daukan erabiltzailerik jada egotea.";
										echo $mezua."</br><a href='albumpubliko.html'>Hasierara bueltatu</a>";
										exit();
									}
									$mezua="<h1 style='color:green'>Erabiltzailea ondo gorde da, administratzaileari eskaera bidali zaio.</h1>";
							}
							echo $mezua."</br><a href='albumpubliko.html'>Hasierara bueltatu</a>";
							mysqli_close($link);
						?>
		</div>
 </body>
</html>