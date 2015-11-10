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
	<style>
  #div1,#div2,#div3,#div4,#div5,#div6,#div7 { width: 100px; height:300px; border-bottom: 100px; padding-bottom: 100px; }
	.exe{
		background:#C9F;
		margin: 5px;
		padding:10px;
		text-align:center;
		border-bottom: 300px;

		-moz-border-radius:7px;
		-webkit-border-radius:7px;
		 border-radius:7px;
	}
  </style>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
   <script type="text/javascript">
	pegarExercicios();
	function allowDrop(ev) {
		ev.preventDefault();
	}

	function drag(ev) {
		ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
		ev.preventDefault();
		
		var data = ev.dataTransfer.getData("text"); 
		ev.target.appendChild(document.getElementById(data));
	}
	function dropcopy(ev, dia) {
		ev.preventDefault();
		var repeticoes = prompt("Qual o numero de repetições?")
		var series = prompt("Qual o numero de series?")
		var data = ev.dataTransfer.getData("text");
		
		x = "<div class='exe' ondragend='drop(event)' ondragover='allowDrop(event)' id='x"+data+"'><span class='hover'><b>"+document.getElementById(data).textContent+"</b><br><i class='fa fa-clock-o'></i>"+parseInt(repeticoes)+"/"+parseInt(series)+"</span></div>";
		ev.target.innerHTML += x;
		$.ajax({
			type: 'post',
			url: '?/Personal/adicionarExecucaoAoTreino',
			data: {'id_pratica': data, 
				   'id_aluno': <?php echo $aluno->id; ?>,
				   'series': series,
				   'repeticoes': repeticoes,
				   'dia': dia}
		});
	}
	
	function pegarExercicios(){
		
		$.ajax({
			type: 'post',
			url: '?/Personal/pegarTodosExercicios',
			data: { e:"true"}
		}).success(function(data) {
			var obj = $.parseJSON(data);
			//console.log(obj);
			var html = "";
			
			if (obj.length > 0) {
				
			} else {
				html += "<tr>";
				html += "<th colspan='5'>Nenhuma pratica cadastrada</th>";
				html += "</tr>";
			}
			
			for (var n = 0; n < obj.length; n++) {
				html+= "<div>";
				html+= "  <ul>";
				html+= "	<b>Exercício</b>:<li draggable='true' ondragstart='drag(event)' id='"+obj[n].id+"'> "+obj[n].nome+"</li>";
				html+= "  </ul>";
				html+= "</div>";
			}
			//+".<br><b>Musculo</b>: "+obj[n].musculo+".<br><b>Descrição</b>: "+obj[n].descricao
			document.getElementById("exercicios").innerHTML = html;
		});
	}
	
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
						<h1 class="page-header">Treino <a class="btn btn-default" onclick="window.print()">Imprimir</a> <a href="?/Personal/novoTreino/<?php echo $aluno->id;?>" class="btn btn-primary">novo treino</a></h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div class="row" id="printable">
					<div class="col-md-12">
						<div id="creditos">
							<center><h3>TABELA DE TREINAMENTO</h3><br></center>
						</div>
						<table class="table" id="treino" border='1'>
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
								<div id="cart">
							<?php 
							if($treino==false) {
							
							echo '	<td id="div1" ondrop="dropcopy(event, 1)" ondragover="allowDrop(event)">';
							echo '	</td>';
							echo '	<td id="div2" ondrop="dropcopy(event, 2)" ondragover="allowDrop(event)">';
							echo '	</td>';
							echo '	<td id="div3" ondrop="dropcopy(event, 3)" ondragover="allowDrop(event)">';
							echo '	</td>';
							echo '	<td id="div4" ondrop="dropcopy(event, 4)" ondragover="allowDrop(event)">';
							echo '	</td>';
							echo '	<td id="div5" ondrop="dropcopy(event, 5)" ondragover="allowDrop(event)">';
							echo '	</td>';
							echo '	<td id="div6" ondrop="dropcopy(event, 6)" ondragover="allowDrop(event)">';
							echo '	</td>';
							echo '	<td id="div7" ondrop="dropcopy(event, 7)" ondragover="allowDrop(event)">';
							echo '	</td>';
							
							
								echo "<tr>";
								echo "<td colspan='7'><center><h2>Não possui um treino especificado</h2><br>
								Fale com seu aluno para elaborar um treino <a href='?/Personal/inbox/' class='btn btn-info'>Inbox</a></center></td>";
								echo "</tr>";
							}else{
								for ($dia = 1; $dia <= 7; $dia++) {
										echo "<td id='div".$dia."' ondrop='dropcopy(event, ".$dia.")' ondragover='allowDrop(event)'>";
										foreach($treino as $exec) {
											if ($exec['dia']==$dia) {
												echo "<div class='exe' id='x".$exec['id']."' ondrop='dropcopy(event)' ondragover='allowDrop(event)'>";
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
								</div>
							</tr>
						</table>
						
						
					</div>
				</div>
			</div><!-- /.container -->
			<div class='container-fluid' id="lista">
				<div class='row'>
					<div class='col-lg-12'>
					<h3 class='page-header'>Montar treino do aluno: <?php echo $aluno->nome.' '.$aluno->sobrenome; ?></h3>
					</div>
				</div>
			<div class='row'>
				<div class='col-md-12'>
					
					<?php 
					/*if($categoria!=false) {
						foreach($categoria as $cat) {
							echo '<h2><a href="#">'.$cat['nome'].'</a></h2>';
						}
					}else{
						echo "<center><h2>A academia não possui categorias</h2><br>Fale com seu gerente</center></td>";
					}
					*/
					?>
					
					<div id='exercicios'>
						<div id='catalog'>
						
						</div>
					</div>
				</div>
				
			</div>
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
