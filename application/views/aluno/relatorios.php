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
    
    <!-- Custom Fonts -->
    <link href="public/template/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Slider JS -->
    <link rel="stylesheet" href="public/dateslider/css/classic.css" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">
		${demo.css}
	</style>
		
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
						<h1 class="page-header">Relatórios</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div id="picker" class="row">
					<div class="col-md-12">
						<div id="slider"></div>
					</div>
				</div>
				<div class="row"><hr>
					<div class="col-md-12">
						<table class="row col-md-12">
							<tr>
								<td><label><input type="checkbox" class="dado"> Peso</label></td>
								<td><label><input type="checkbox" class="dado"> Altura</label></td>
								<td><label><input type="checkbox" class="dado"> Ombro</label></td>
								<td><label><input type="checkbox" class="dado"> Tórax</label></td>
								<td><label><input type="checkbox" class="dado"> Cintura</label></td>
								<td><label><input type="checkbox" class="dado"> Braço</label></td>
							</tr>
							<tr>
								<td><label><input type="checkbox" class="dado"> Coxas</label></td>
								<td><label><input type="checkbox" class="dado"> Glúteo</label></td>
								<td><label><input type="checkbox" class="dado"> Punho</label></td>
								<td><label><input type="checkbox" class="dado"> Abdominal</label></td>
								<td><label><input type="checkbox" class="dado"> Tornozelo</label></td>
								<td><label><input type="checkbox" class="dado"> Panturrilha</label></td>
							</tr>
						</table>
					</div>
				</div><!--row-->
				
				<hr>
				<div class="row">
					<div class="col-md-12">
						<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
				</div>
				
				
			</div><!--container-->
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

    <!-- Custom Theme JavaScript -->
    <script src="public/template/dist/js/sb-admin-2.js"></script>
    
    
    <!-- Custom Theme JavaScript -->
    <script src="public/template/dist/js/sb-admin-2.js"></script>
    
    <!-- Range Slider JavaScript -->
    <script src="public/js/jquery.js"></script>
    <script src="public/dateslider/jquery-ui.js"></script>
    <script src="public/dateslider/jQDateRangeSlider-withRuler-min.js"></script>
    
     
    <script>
		var months = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
	  $("#slider").dateRangeSlider({
		bounds: {min: new Date(2015, 0, 1), max: new Date(2015, 7, 31, 12, 59, 59)},
		defaultValues: {min: new Date(2015, 1, 10), max: new Date(2015, 4, 22)},
		scales: [{
		  first: function(value){ return value; },
		  end: function(value) {return value; },
		  next: function(value){
			var next = new Date(value);
			return new Date(next.setMonth(value.getMonth() + 1));
		  },
		  label: function(value){
			return months[value.getMonth()];
		  },
		  format: function(tickContainer, tickStart, tickEnd){
			tickContainer.addClass("myCustomClass");
		  }
		}]
	  });
    </script>
    
    <!-- Highchart JavaScript -->
    <script src="public/highchart/js/highcharts.js"></script>
	<script src="public/highchart/js/modules/data.js"></script>
	<script src="public/highchart/js/modules/exporting.js"></script>
	
	<script type="text/javascript">
	$(function () {
		$('#container').highcharts({
			title: {
				text: 'Relatório de Avaliação',
				x: -20 //center
			},
			subtitle: {
				text: '',
				x: -20
			},
			xAxis: {
				categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
					'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
			},
			yAxis: {
				title: {
					text: 'Centímetros (Cm)'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				valueSuffix: '°C'
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0
			},
			series: [{
				name: 'Ombro',
				data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
			}, {
				name: 'Tórax',
				data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
			}, {
				name: 'Cintura',
				data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
			}, {
				name: 'Glúteo',
				data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
			}]
		});
	});
		</script>
</body>

</html>
