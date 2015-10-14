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
						<h1 class="page-header"><a href="?/Aluno/avaliacoes"><span class="glyphicon glyphicon-chevron-left"></span></a>Avaliacao - Nº 1</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						<h4>Dados da avaliação</h4>
						<table class="table">
							<tr>
								<th>Número da avaliacão</th>
								<th>Personal avaliador</th>
								<th>Data da avaliacão</th>
							</tr>
							<tr>
							<?php
								echo "<td>".$av['id']."</td>";
								echo "<td>".$av['p_nome']."</td>";
								echo "<td>".$av['p_sobrenome']."</td>";
							?>
							</tr>
						</table>
					</div>
				</div><!--historico-->
				<div class="row">
					<div class="col-md-12">
						<h4>Medidas</h4>
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
    
    <!-- Script JS -->
    <script src="public/js/script.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="public/template/bower_components/raphael/raphael-min.js"></script>
    <script src="public/template/bower_components/morrisjs/morris.min.js"></script>
    <script src="public/template/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/template/dist/js/sb-admin-2.js"></script>
</body>

</html>
