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
    <!-- Favicon na aba-->
    <link href="public/img/favicon.ico" rel="shortcut icon" />

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
                <a class="navbar-brand" href="?/Page">BodyFit</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="?/Page/login">fazer login</a>
                    </li>
                    <li class="page-scroll">
                        <a href="?/Page/cadastro">criar conta</a>
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
                        <span class="name">Cadastro /academia</span>
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
                    <form id="cadastro" method="post" action="?/Page/cadastro/academia" role="form">
						<div class="row text-center"><h3>Dados do gerente</h3><hr class="star-primary"></div>
						<div class="form-group col-xs-6">
							<label>Nome* </label><input type="text" name="gerente_nome" maxlength="45" class="form-control" value="<?php echo set_value('gerente_nome'); ?>" required>
						</div>
						<div class="form-group col-xs-6">
							<label>Sobrenome* </label><input type="text" name="gerente_sobrenome" maxlength="45" class="form-control" value="<?php echo set_value('gerente_sobrenome'); ?>" required>
						</div>
						<div class="form-group col-xs-12">
							<label>Email* </label><input type="email" name="gerente_email" maxlength="255" class="form-control" value="<?php echo set_value('gerente_email'); ?>" required>
						</div>
						<div class="form-group col-xs-6">
							<label>Senha* </label><input type="password" name="gerente_senha" maxlength="32" class="form-control" required>
						</div>
						<div class="form-group col-xs-6">
							<label>Repetir senha* </label><input type="password" name="gerente_r_senha" maxlength="32" class="form-control" required>
						</div>
						<div class="row text-center"><h3>Dados da Academia</h3><hr class="star-primary"></div>
						<div class="form-group col-xs-12">
							<label>Nome da academia* </label><input type="text" name="academia_nome" maxlength="45" class="form-control" value="<?php echo set_value('academia_nome'); ?>" required>
						</div>
						<div class="form-group col-xs-10">
							<label>Cidade* </label><input type="text" name="academia_cidade" maxlength="45" class="form-control" value="<?php echo set_value('academia_cidade'); ?>" required>
						</div>
						<div class="form-group col-xs-2">
							<label>Estado* </label>
							<select class="form-control" name="academia_estado" value="<?php echo set_value('academia_estado'); ?>">
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AM">AM</option>
								<option value="AP">AP</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MG">MG</option>
								<option value="MS">MS</option>
								<option value="MT">MT</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="PR">PR</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="RS">RS</option>
								<option value="SC">SC</option>
								<option value="SE">SE</option>
								<option value="SP">SP</option>
								<option value="TO">TO</option>
							</select>
						</div>
						<div class="form-group col-xs-6">
							<label>Endereço</label><input type="text" name="academia_endereco" maxlength="45" class="form-control" value="<?php echo set_value('academia_endereco'); ?>">
						</div>
						<div class="form-group col-xs-6">
							<label>Telefone</label><input type="text" name="academia_telefone" maxlength="45" class="form-control" value="<?php echo set_value('academia_telefone'); ?>">
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
