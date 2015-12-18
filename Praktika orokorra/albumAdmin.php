<!DOCTYPE html>
<?php
	session_start ();
	if($_SESSION['eposta']!='admin@ikasle.ehu.eus'){
		header('Location:albumpubliko.html');
	}
	else{
		$eposta=$_SESSION['eposta'];
	}

?>
<html>
<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript" src="js/javascript2.js"></script>
    <script type="text/javascript" src="js/menuAdmin.js"></script>
    <script type="text/javascript" src="js/mouseover_popup.js"></script>
    <script type="text/javascript" src="js/javascriptAdmin.js"></script>

</head>
    <body onload="eskaerakKudeatu()" >
    <div class="container">

    <div class="jumbotron">
        <h1>Web Sistemak praktika orokorra</h1>
        <p>Argazki albuma!</p>
    </div>
        <div class="row" align="right">
            <div class="col-md-12">
            <b><?php echo $eposta; ?></b>
            <form style="display: inline" action="Logout.php">
                <button type="submit" class="btn" id="logout" >Irten</button>
            </form>
        </div><br>
    </div>
        <div class="row" align="left"><div class="col-md-8">
        <div id="wrapper">

            <!-- Sidebar -->
            <div class="col-md-3" id="leftCol">

                <div class="well">
                    <ul class="nav nav-stacked" id="sidebar">
                        <li><a id="esk" onclick="eskaerakKudeatu();" onmouseover="this.style.cursor='pointer'" >Eskaerak kudeatu</a></li>
                        <li><a id="arg"   onclick="argazkiakKudeatu();" onmouseover="this.style.cursor='pointer'">Argazkiak kudeatu</a></li>
                        <li><a id="erb"   onclick="erabiltzaileakKudeatu();" onmouseover="this.style.cursor='pointer'">Erabiltzaileak kudeatu</a></li>
                    </ul>
                </div>

            </div>

            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-9" id="eskaeraKud" style="display:none">
                            <h1>Eskaerak kudeatu</h1>
                            <p>Hauek dira sisteman sartzeko eskaera berrriak</p>
                            <table class="table table-hover ">
                                <thead>
                                <td>Egindako eskaerak</td>
                                <td>Aukerak</td>
                                </thead>
                                <tbody>
									<?php require_once('eskaerakBegiratu.php'); ?>
                                </tbody>
                            </table>

                        </div>


                        <div class="col-lg-9" id="argazkiKud" style="display:none">
                            <h1>Argazkiak kudeatu</h1>
                            <p>Hauek dira sisteman dauden argazkiak</p>
							<?php require_once('argazkiGuztiakKudeatu.php'); ?>
                        </div>


                        <div class="col-lg-9" id="erabKud" style="display:none">
                            <h1>Erabiltzaileak kudeatu</h1>
                            <p>Hauek dira sisteman dauden erabiltzaileak</p>
                            <table class="table table-hover ">
                                <thead>
                                <td>Erabiltzaileak</td>
                                <td>Aukerak</td>
                                </thead>
                                <tbody>
									<?php require_once('lortuErabiltzaileak.php'); ?>
                                </tbody>
                            </table>

                        </div>
                </div>
                </div>
            </div>     </div>
        </div>
            <!-- /#page-content-wrapper -->


        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

    </div>

</body>
</html>