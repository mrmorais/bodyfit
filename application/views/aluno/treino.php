<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bodyfit</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/template/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/template/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="public/template/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/template/dist/css/sb-admin-2.css" rel="stylesheet">
    
	<!--Freelancer CSS-->
    <link href="public/css/freelancer.css" rel="stylesheet">
    
	<!--Bodyfit CSS-->
    <link href="public/css/style.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="public/template/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/template/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Bodyfit</a>
            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?/Gerente/sair"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php include("menu.php"); ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Treino <a class="btn btn-default" onclick="window.print()">Imprimir</a></h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div class="row" id="printable">
					<div class="col-md-12">
						<div id="creditos">
							<center><h3>TABELA DE TREINAMENTO</h3><br>
							<?php echo "Aluno: <b>".$user->nome." ".$user->sobrenome."</b><br>Academia: <b>".$academia->nome."</b><hr>Treino gerado por <b>Bodyfit</b><hr>" ?>
							</center>
						</div>
						<table class="table">
							<tr>
								<th>Dom</th>
								<th>Seg</th>
								<th>Ter</th>
								<th>Qua</th>
								<th>Qui</th>
								<th>Sex</th>
								<th>Sab</th>
							</tr>
							<tr class="exercicio-row">
								<?php
								if($treino!=false) {
									for ($dia = 0; $dia < 7; $dia++) {
										echo "<td>";
										foreach($treino as $exec) {
											if ($exec['dia']==$dia) {
												echo '<div class="exe">';
													echo '<span class="hover">';
														echo '<b>'.$exec['nome'].'</b><br>';
														echo '<i class="fa fa-clock-o"></i> '.$exec['repeticoes'].'/'.$exec['series'];
														if ($exec['tempo']!="0") {
															echo $exec['tempo'].' minuto(s)';
														}
													echo '</span>';
												echo '</div>';
											}
										}
										echo "</td>";
									}
								}
								?>
							</tr>
							<?php 
							if($treino==false) {
								echo "<tr>";
								echo "<td colspan='7'><center><h2>Você não possui um treino especificado</h2><br>
								Fale com seu personal elaborar um treino <a href='?/Aluno/inbox/' class='btn btn-info'>Inbox</a></center></td>";
								echo "</tr>";
							}
							?>
						</table>
					</div>
				</div>
			</div><!-- /.container -->
			<div class="row" id="footer">
				<div class="col-md-12">
				Siblings 2015
				</div>
			</div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="public/template/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/template/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    
    <!-- Script JS 
    <script src="public/js/script.js"></script>-->

    <!-- Morris Charts JavaScript -->
    <script src="public/template/bower_components/raphael/raphael-min.js"></script>
    <script src="public/template/bower_components/morrisjs/morris.min.js"></script>
    <script src="public/template/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/template/dist/js/sb-admin-2.js"></script>

</body>

</html>
