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
