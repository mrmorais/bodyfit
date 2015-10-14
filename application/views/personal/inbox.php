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
    <script>
	var enviar = function(id) {
		var msg = $("#campo-"+id).val();
		$.post("?/Personal/enviarMsg", { msg : msg, a_id : id });
		window.location.reload();
	};
    </script>
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
						<h1 class="page-header">Inbox</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						Selecione um Aluno<hr>
					</div>
					<?php foreach ($inbox as $chat) { ?>
					<div class="col-md-4" id="<?php echo $chat['info']['id']; ?>">
						<div class="chat-panel panel panel-default personal-inbox">
							<div class="panel-heading">
								<div class="row personal-inbox-link">
									<div class="col-md-3"><img src="public/img/profile.png" width="100%"></div>
										<div class="col-md-9"><h4><?php echo $chat['info']['nome']." ".$chat['info']['sobrenome']; ?></h4>
										<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-chevron-down"></i>
										</button>
										</div>
									</div>
								</div>
							<div class="chat-inbox chat-hided">
								<div class="panel-body">
									<ul class="chat">
										<?php 
										if($chat['msgs'] == 0) { 
											echo "<h2>Sem mensagens</h2>";
										} else {
											foreach ($chat['msgs'] as $msg) {
										?>
										<li class="left clearfix">
											<div class="header">
												<strong class="primary-font"><?php echo $msg['autor']; ?></strong>
												<small class="pull-right text-muted">
												</small>
											</div>
											<p>
												<?php echo $msg['msg']; ?>
											</p>
										</li><!--mensagem-->
										<?php }
										} ?>
									</ul>
								</div><!--corpo do chat-->
								<div class="panel-footer">
									<div class="input-group">
										<input id="campo-<?php echo $chat['info']['id']; ?>" type="text" class="form-control input-sm" placeholder="Digite aqui sua mensagem..." />
										<span class="input-group-btn">
											<button class="btn btn-warning btn-sm" id="btn-chat" onclick="enviar(<?php echo $chat['info']['id']; ?>)">
												Enviar
											</button>
										</span>
									</div>
								</div><!--area de envio-->
							</div><!--parte que se carrega-->
						</div>
					</div><!--chat-->
					<?php } ?>
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
