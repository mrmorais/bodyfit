<?php
class Gerente_md extends CI_Model {
	public $id;
	public $nome;
	public $sobrenome;
	public $email;
	public $tipo;
	public $academia;
	
	public function __construct() {
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	public function cadastrarGerente($nome, $sobrenome, $email, $senha) {
		$this->load->database();
		$dados = array("nome"=>$nome, "sobrenome"=>$sobrenome, "email"=>$email, "senha"=>$senha, "tipo"=>1);
		
		if($this->db->insert('gerente', $dados)) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}
	
	public function setar($id) {
		$this->load->database();
		
		$this->db->where("id", $id);
		$query = $this->db->get('gerente');
		
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				$this->id = $row->id;
				$this->nome = $row->nome;
				$this->sobrenome = $row->sobrenome;
				$this->email = $row->email;
				$this->tipo = $row->tipo;
			}
			$this->academia = $this->setarAcademia();
			return $this;
		} else {
			return false;
		}
	}
	
	public function setarAcademia() {
		$this->load->model("academia_md");
		$academias = $this->getAcademiasId(1);
		$this->academia = $this->academia_md->setar($academias[0]);
	}
	
	public function getAcademiasId($id) {
		$this->load->database();
		
		$query = $this->db->query("SELECT gerente_id, academia_id FROM gerente_has_academia WHERE gerente_id = ? LIMIT 1", array($id));
		$academias = [];
		foreach($query->result() as $row) {
			$academias[] = $row->academia_id;
		}
		return $academias;
	}
	
	public function emailExiste($email) {
		$this->load->database();
		$sql = "SELECT * FROM gerente WHERE email = ?";
		$resultado = $this->db->query($sql, array($email));
		if ($resultado->num_rows() > 0) {
			return true;
		}
		return false;
	}
	
	public function validate($email, $senha){
		$this->load->database();
		//SELECT's, primeiro parametro é o nome da coluna e o segundo é a variável de comparação
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		
		//Executa a query
		$query = $this->db->get('gerente');
		
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
