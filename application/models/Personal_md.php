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
	public function pegarAlunos($id){
		$this->load->database();
		
		$sql = "SELECT aluno.id, aluno.nome, aluno.sobrenome FROM aluno, personal_has_academia, academia, personal WHERE personal.id = ? and personal_has_academia.personal_id = personal.id and academia.id = personal_has_academia.academia_id and academia.id = aluno.academia_id";
		$query = $this->db->query($sql, array($id));
		
		$arrayAlunos = array();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$idA= $row->id;
				$nomeA = $row->nome;
				$sobrenomeA = $row->sobrenome;
				
				//$arrayAlunos = array("id"=>$idA, "nome"=>$nomeA, "sobrenome"=>$sobrenomeA);
				array_push($arrayAlunos, array("id"=>$idA, "nome"=>$nomeA, "sobrenome"=>$sobrenomeA));
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
}
?>
