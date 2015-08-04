<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html><html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bem vindo ao Bodyfit</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">BodyFit</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#">fazer login</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#">criar conta</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Cadastro /aluno</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Cadastro Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <div class="row"><?php echo validation_errors(); ?></div>
                    <form id="cadastro" method="post" action="?/Page/cadastro/aluno" role="form">
						<div class="row text-center"><h3>Código de acesso</h3><hr class="star-primary"></div>
						<div class="form-group col-xs-12">
							<label>Código* </label><input type="text" name="aluno_codigo" maxlength="45" class="form-control" value="<?php echo set_value('aluno_nome'); ?>" required>
						</div>
						<div class="row text-center"><h3>Dados do aluno</h3><hr class="star-primary"></div>
						<div class="form-group col-xs-6">
							<label>Nome* </label><input type="text" name="aluno_nome" maxlength="45" class="form-control" value="<?php echo set_value('aluno_nome'); ?>" required>
						</div>
						<div class="form-group col-xs-6">
							<label>Sobrenome* </label><input type="text" name="aluno_sobrenome" maxlength="45" class="form-control" value="<?php echo set_value('aluno_sobrenome'); ?>" required>
						</div>
						<div class="form-group col-xs-12">
							<label>Email* </label><input type="email" name="aluno_email" maxlength="255" class="form-control" value="<?php echo set_value('aluno_email'); ?>" required>
						</div>
						<div class="form-group col-xs-6">
							<label>Senha* </label><input type="password" name="aluno_senha" maxlength="32" class="form-control" required>
						</div>
						<div class="form-group col-xs-6">
							<label>Repetir senha* </label><input type="password" name="aluno_r_senha" maxlength="32" class="form-control" required>
						</div>
						<div class="form-group col-xs-10">
							<label>Data de Nascimento* </label><input type="date" name="aluno_nascimento" maxlength="45" class="form-control" value="<?php echo set_value('aluno_nascimento'); ?>" required>
						</div>
						<div class="form-group col-xs-2">
							<label>Sexo* </label>
							<select class="form-control" name="aluno_sexo" value="<?php echo set_value('aluno_sexo'); ?>">
								<option value="M">M</option>
								<option value="F">F</option>
							</select>
						</div>
						<div class="form-group col-xs-6">
							<label>Endereço</label><input type="text" name="aluno_endereco" maxlength="45" class="form-control" value="<?php echo set_value('aluno_endereco'); ?>">
						</div>
						<div class="form-group col-xs-6">
							<label>Telefone</label><input type="text" name="aluno_telefone" maxlength="45" class="form-control" value="<?php echo set_value('aluno_telefone'); ?>">
						</div>
						<div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Localização</h3>
                        <p>IFRN<br>Apodi, RN 59700-000</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Redes Sociais</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Em breve...</h3>
                        <p>mais informações.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Siblings &copy; BodyFit 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="public/js/classie.js"></script>
    <script src="public/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="public/js/jqBootstrapValidation.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/js/freelancer.js"></script>

</body>

</html>
