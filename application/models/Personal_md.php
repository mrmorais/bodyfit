<?php
class Personal_md extends CI_Model {
	public $nome;
	public $sobrenome;
	public $email;
	
	public function cadastrarPersonal($nome, $sobrenome, $email, $senha) {
		//Função de cadastro
		$this->load->database();
		$dados = array("nome"=>$nome, "sobrenome"=>$sobrenome, "email"=>$email, "senha"=>$senha);
		
		if($this->db->insert('personal', $dados)) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}
	
	public function setar($id) {
		$this->load->database();
		
		$this->db->where("id", $id);
		$query = $this->db->get('personal');
		
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				$this->id = $row->id;
				$this->nome = $row->nome;
				$this->sobrenome = $row->sobrenome;
				$this->email = $row->email;
			}
			return $this;
		} else {
			return false;
		}
	}
	
	public function emailExiste($email) {
		$this->load->database();
		$sql = "SELECT * FROM personal WHERE email = ?";
		$resultado = $this->db->query($sql, array($email));
		if ($resultado->num_rows() > 0) {
			return true;
		}
		return false;
	}
	public function avaliacoesDiarias($id){
		$this->load->database();
		
		$data = date("Y-m-d");
		$this->db->where("personal_id", $id);
		$this->db->where("data", $data);
		$query = $this->db->get("avaliacao_marcada");
		
		$arrayAvaliacoes = array();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$idAv= $row->id;
				$dataAv = $row->data;
				$idAlunoAv = $row->aluno_id;
				
				array_push($arrayAvaliacoes, array("id"=>$idAv, "aluno_id"=>$idAlunoAv, "data"=>$dataAv,"quantidade"=>$query->num_rows()));
			}
		}
		return $arrayAvaliacoes;
	}
	public function pegarAlunos($id){
		
		$this->load->database();
		
		$sql = "SELECT aluno.* FROM aluno, personal_has_academia, academia, personal WHERE personal.id = ? and personal_has_academia.personal_id = personal.id and academia.id = personal_has_academia.academia_id and academia.id = aluno.academia_id";
		$query = $this->db->query($sql, array($id));
		
		$arrayAlunos = array();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$idA= $row->id;
				$nomeA = $row->nome;
				$sobrenomeA = $row->sobrenome;
				$emailA = $row->email;
				$telefoneA = $row->telefone;
				$enderecoA = $row->endereco;
				
				
				//$arrayAlunos = array("id"=>$idA, "nome"=>$nomeA, "sobrenome"=>$sobrenomeA);
				array_push($arrayAlunos, array("id"=>$idA, "nome"=>$nomeA, "sobrenome"=>$sobrenomeA, "email"=>$emailA,"telefone"=>$telefoneA, "endereco"=>$enderecoA));
				//return $arrayAcademia;
			}
			return $arrayAlunos;
		} else {
			return false;
		}
	}
	public function getTreino($p_id, $al_id) {
		
		$this->load->database();
		$q = $this->db->query("SELECT p.id ,e.series, e.repeticoes, p.musculo, p.nome, e.tempo, c.nome as 'categoria', d.dia
								FROM execucao as e, aluno as a, treino as t, pratica as p, personal as per, categoria as c, dia as d
								WHERE 
									per.id = ?
									and a.id = ?
									and per.id = t.personal_id
									and a.id = t.aluno_id
									and t.id = e.treino_id
									and t.aluno_id = e.treino_aluno_id
									and e.academia_has_pratica_pratica_id = p.id
									and p.categoria_id = c.id
									and e.id = d.execucao_id
									and t.ativo = 1
									", array($p_id, $al_id));
		$execs = [];
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$execs[] = array("id"=>$row->id,
								 "series"=>$row->series,
								 "repeticoes"=>$row->repeticoes,
								 "musculo"=>$row->musculo,
								 "nome"=>$row->nome,
								 "categoria"=>$row->categoria,
								 "tempo"=>$row->tempo,
								 "dia"=>$row->dia);
			}
			return $execs;
		} else {
			$treinoExiste = $this->db->query("SELECT * FROM treino WHERE aluno_id = ?", array($al_id));
			if($treinoExiste->num_rows() == 0) {
				$novo = $this->db->query('INSERT INTO treino(inicio, ativo, aluno_id, personal_id) VALUES(current_date, ?, ?, ?)', 
				array(0, $al_id, $p_id));
			}
		}
	}
	public function adicionarExecucao($tr_id, $p_id, $al_id, $series, $repeticoes, $pratica, $dia){
				$novaExecucao = $this->db->query('INSERT INTO execucao(treino_id, treino_personal_id, treino_aluno_id, series, repeticoes, academia_has_pratica_pratica_id) VALUES(?, ?, ?, ?,?,?)', 
				array($tr_id, $p_id, $al_id, $series, $repeticoes, $pratica));
				$id_ex = $this->db->insert_id();
				$this->adicionarDia($id_ex, $tr_id, $dia);
	}
	
	public function adicionarDia($id_execucao, $id_treino, $dia) {
		$novoDia = $this->db->query("INSERT INTO dia(dia, execucao_id, execucao_treino_id) VALUES(?, ?, ?)",
									array($dia, $id_execucao, $id_treino));
	}
	
	public function getCategoria() {
		
		$this->load->database();
		$q = $this->db->query("SELECT c.* FROM categoria c, pratica p, academia_has_pratica ap, academia a, personal pe, personal_has_academia pa
									where pe.id = pa.personal_id and
									a.id = pa.academia_id and
									c.id = p.categoria_id and
									ap.academia_id = a.id and
									ap.pratica_id = p.id and pe.id= ? group by c.nome", array($this->id));
		$cat = [];
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$cat[] = array(	"id"=>$row->id,
								"nome"=>$row->nome);
			}
			return $cat;
		} else {
			return false;
		}
	}
	/*
	public function fazerTreino($p_id, $a_id){
		$this->load->database();
		$sql = "SELECT aluno.id, treino.id, aluno.nome, aluno.sobrenome, aluno.sexo, treino.inico, treino.fim FROM aluno, treino, personal WHERE personal.id = ? and treino.personal_id = personal.id and treino.aluno_id = aluno.id and treino.ativo = 0";
		$query = $this->db->query($sql, array($p_id));
		$exe = [];
		
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				
				if($row->sexo == "m" or $row->sexo =="M"){
					$sexo = "Masculino";
				}
				if($row->sexo == "f" or $row->sexo == "F"){
						$sexo = "Feminino";
				}
				$exe[] = array(	"id_al"=>$row->id,
								"nome"=>$row->nome.' '.$row->sobrenome,
								"sexo"=>$sexo,
								"data_inicial"=>$row->inico,
								"data_final"=>$row->fim);
			}
			return $exe;
		} else {
			return false;
		}
	}
	*/
	public function getAlunosSemTreino($p_id) {
		$this->load->database();
		$sql = "SELECT a.* FROM aluno a, personal p, personal_has_academia pa WHERE p.id = pa.personal_id and pa.academia_id = a.academia_id and p.id = ? and a.id not in (select aluno_id from treino where ativo=1)";
		$query = $this->db->query($sql, array($p_id));
		$exe = [];
		
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				
				if($row->sexo == "m" or $row->sexo =="M"){
					$sexo = "Masculino";
				}
				if($row->sexo == "f" or $row->sexo == "F"){
						$sexo = "Feminino";
				}
				$exe[] = array(	"id"=>$row->id,
								"nome"=>$row->nome.' '.$row->sobrenome,
								"sexo"=>$sexo);
			}
			return $exe;
		} else {
			return false;
		}
	}
	
	public function pegarAcademia($id){
		$this->load->database();
		
		$sql = "SELECT academia.nome, academia.endereco, academia.cidade, academia.estado, academia.telefone FROM academia, personal, personal_has_academia WHERE personal.id = ? and personal_has_academia.personal_id = personal.id and personal_has_academia.academia_id = academia.id";
		$query = $this->db->query($sql, array($id));
		
		$arrayAcademia = array();
		
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				$nomeAc = $row->nome;
				$enderecoAc = $row->endereco;
				$cidadeAc = $row->cidade;
				$estadoAc = $row->estado;
				$telefoneAc = $row->telefone;
				
				$arrayAcademia = array("nome"=>$nomeAc, "endereco"=>$enderecoAc, "cidade"=>$cidadeAc, "estado"=>$estadoAc, "telefone"=>$telefoneAc);
			}
			return $arrayAcademia;
		} else {
			return false;
		}
	}
	
	public function validate($email, $senha){
		$this->load->database();
		//SELECT's, primeiro parametro é o nome da coluna e o segundo é a variável de comparação
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		
		//Executa a query
		$query = $this->db->get('personal');
		
		//Verifica o numero de linhas
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				return $row->id;
			}
		} else {
			return false;
		}
	}
	
	public function searchAluno($busca, $p_id) {
		$this->load->database();
		$sql = "SELECT aluno.* FROM aluno, personal_has_academia, academia, personal WHERE personal.id = ? and personal_has_academia.personal_id = personal.id and academia.id = personal_has_academia.academia_id and academia.id = aluno.academia_id and (aluno.nome like '".$busca."%' or aluno.sobrenome like '".$busca."%');";
		$query = $this->db->query($sql, array($p_id));
		$resultados = [];
		foreach ($query->result() as $row) {
			$resultados[] = array("id"=>$row->id, "nome"=>$row->nome." ".$row->sobrenome, "email"=>$row->email, "endereco"=>$row->endereco, "telefone"=>$row->telefone);
		}
		return $resultados;
	}
	public function pegarTodos($busca, $p_id) {
		$this->load->database();
		if($busca == "true"){
			$sql = "SELECT aluno.* FROM aluno, personal_has_academia, academia, personal WHERE personal.id = ? and personal_has_academia.personal_id = personal.id and academia.id = personal_has_academia.academia_id and academia.id = aluno.academia_id";
			$query = $this->db->query($sql, array($p_id));
			$resultados = [];
			foreach ($query->result() as $row) {
				$resultados[] = array("id"=>$row->id, "nome"=>$row->nome." ".$row->sobrenome, "email"=>$row->email, "endereco"=>$row->endereco, "telefone"=>$row->telefone);
			}
			return $resultados;
		}else{
			return false;
		}
	}
	public function pegarTodosExercicios($busca, $p_id) {
		$this->load->database();
		if($busca == "true"){
			$sql = "SELECT pratica.* FROM pratica, academia, academia_has_pratica, personal_has_academia, personal WHERE personal.id = ? and personal.id = personal_has_academia.personal_id and personal_has_academia.academia_id = academia.id and academia.id = academia_has_pratica.academia_id and academia_has_pratica.pratica_id = pratica.id";
			$query = $this->db->query($sql, array($p_id));
			$resultados = [];
			foreach ($query->result() as $row) {
				$resultados[] = array("id"=>$row->id, "categoria"=>$row->categoria_id, "nome"=>$row->nome, "descricao"=>$row->descricao, "musculo"=>$row->musculo);
			}
			return $resultados;
		}else{
			return false;
		}
	}
	public function pegarAvaliacoes($p_id) {
		$this->load->database();
		$data = date("Y-m-d");
			$sql = "SELECT avaliacao_marcada.id, aluno.nome, aluno.sobrenome, aluno.sexo, avaliacao_marcada.data FROM aluno, avaliacao_marcada, personal WHERE personal.id = ? and avaliacao_marcada.personal_id = personal.id and aluno.id = avaliacao_marcada.aluno_id and avaliacao_marcada.data >= '$data' ORDER BY avaliacao_marcada.data ASC";
			$query = $this->db->query($sql, array($p_id));
			$resultados = [];
			
			foreach ($query->result() as $row) {
				
				if($row->sexo == "m" or $row->sexo =="M"){
					$sexoAv = "Masculino";
				}
				if($row->sexo == "f" or $row->sexo == "F"){
						$sexoAv = "Feminino";
				}
				
				$data_inicial = date("Y-m-d");
				$data_final = $row->data;

				$diferenca = strtotime($data_final) - strtotime($data_inicial);
				
				$dias = floor($diferenca / (60 * 60 * 24));
				
				switch($dias){
					case 0:
						$status = "Hoje";
						break;
					case 1:
						$status = "Amanhã";
						break;
					default:
						$status = "Faltam ".$dias." dias";
				}
											
				$resultados[] = array("id_av"=>$row->id, "nome"=>$row->nome." ".$row->sobrenome, "sexo"=>$sexoAv, "data_marcada"=>$row->data, "dias" => $status);
			}
			return $resultados;
	}
	public function agendarAvaliacao($idAluno, $p_id, $data) {
		$this->load->database();
		$sql = "INSERT INTO `avaliacao_marcada`(`personal_id`, `aluno_id`, `data`) VALUES ('$p_id', '$idAluno', '$data')";
		$query = $this->db->query($sql);
		
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function alterarAvaliacao($id, $p_id, $novaData, $dataAntiga) {
		$this->load->database();
		$sql = "UPDATE `avaliacao_marcada` SET `data`='$novaData' WHERE `id`='$id' and `personal_id` = '$p_id' and `data` = '$dataAntiga'";
		$query = $this->db->query($sql);
		
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function deletarAvaliacao($id, $p_id) {
		$this->load->database();
		$sql = "DELETE FROM `avaliacao_marcada` WHERE `id`='$id' and `personal_id`='$p_id'";
		$query = $this->db->query($sql);
		
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}
?>
