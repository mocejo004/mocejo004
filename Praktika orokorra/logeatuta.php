<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
	session_start ();
	if($_SESSION['eposta']==''){
		header('Location:albumpubliko.html');
	}
	else{
		$eposta=$_SESSION['eposta'];
	}
	
?>
<html>
    <head>
        <title>Logeatuta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script type="text/javascript" src="js/javascript.js"></script>
		<script type="text/javascript" src="js/javascript2.js"></script>
    </head>
<body onload="return bilatuPribatuak('<?php echo $eposta; ?>')"; >
        <div class="container">

            <div class="jumbotron">
                <h1>Web Sistemak praktika orokorra</h1> 
                <p>Argazki albuma!</p> 
            </div>
			<div class="row" align="right">
                <div class="col-lg-12">
				<b><?php echo $eposta;?></b>
				<form style="display:inline;" action="Logout.php">
					<button type="submit" class="btn" id="logout" >Irten</button>
				</form>
            </div>
            </div>
            <div class="row">
                <div class="col-md-4">


                    <form class="form-horizontal" action="gordeArgazkia.php" method="POST" enctype="multipart/form-data" id="img-upload-form">

                        <div id="legend">
                            <h1 class="page-header">Argazkia Igo</h1>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="album">Album-a</label></br>
								<select id="album" name="album" onchange="erakutziBesteak()" class="form-control input-lg" >
									<?php require('lortuAlbumak.php'); ?>
									<option value="albumBerria">Album berria sortu</option>
								</select>
                            <p class="help-block">Zein album-etan igo nahi duzu argazkia?</p>
                        </div>
						<div class="control-group" id="albumBerriaDiv" style="display : none;">
                            <label class="control-label" for="newAlbum">Album berriaren izena</label></br>
								 <input type="text" id="albumName" name="albumName" placeholder="Albumaren izena" class="form-control input-lg">
                            <p class="help-block">Zein da album berriari jarri nahi diozun izena?</p>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="imgName">Argazki Izena</label>
                            <div class="controls">
                                <input type="text" id="imgName" name="imgName" placeholder="Argazkiaren izena" class="form-control input-lg">
                                <p class="help-block">Argazkiaren izena, mesedez esanguratzua izan dadin...</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="imgPerm">Argazki baimenak</label></br>
                            <select id="imgPerm" name="imgPerm" class="form-control input-lg">
                                <option>Publikoa</option>
                                <option selected>Pribatua</option>
                                <option>Atzipen mugatua</option>
                            </select>
                            <p class="help-block">Zure argazkiaren ikusgarritazuna definituko du</p>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="img">Argazkia hautatu</label></br>

                            <div class="controls">

                                <input type="file" name="argazkia" id="img" multiple></br>

                                <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Argazkia igo</button>							

                            </div>
                        </div></form>
            </div>

            <div class="col-md-8">
					
                    <div class="col-lg-12">
                        <h1 class="page-header">Argazki Galeria</h1>
                        <ol class="breadcrumb" >
                            <li  id="publikoa"><a onmouseover="this.style.cursor='pointer'" onclick="aldatuEgoera('publikoa','<?php echo $eposta; ?>')">Publikoak</a></li>
                            <li id="atzipenMugatua"><a onmouseover="this.style.cursor='pointer'" onclick="aldatuEgoera('atzipenMugatua','<?php echo $eposta; ?>')">Atzipen mugatua</a></li>
                            <li class="active" id="pribatua"><a onmouseover="this.style.cursor='pointer'" onclick="aldatuEgoera('pribatua','<?php echo $eposta; ?>')">Nire argazki pribatuak</a></li>

                        </ol>

                        <div class="row">
                            <div class="row">
								<div class="col-lg-4">

									<span><b>Editatu argazkien baimenak</span></b>
								</div>
                                <div class="col-lg-8">

                                    <form id="bilaketa" class="navbar-form navbar-right" role="form">

                                        <input type="text" id="bilaketaTextua" class="form-control" placeholder="Bilatu">

                                        <button type="button" class="btn btn-default" onclick="return bilatu()"><i class="glyphicon glyphicon-search"></i></button></br>

                                    </form>
                                </div>
							</div>
                        Hautatu albuma:
                                <div class="row">
                                    <div class="col-lg-8">
                                        <select id="albumGuztiak" name="albumGuztiak" onchange="ikustaraziAlbuma()" class="form-control input-sm" >
                                            <option value=""></option>
                                            <?php require('lortuAlbumak.php'); ?>
                                        </select>
                                    </div>
                                </div>
                            <br>
						</div>
                    </div>
					<div  id="argazkiTaula">

					</div>
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

</body>
</html>

