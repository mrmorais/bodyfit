<?php
class Gerente_md extends CI_Model {
	public $id;
	public $nome;
	public $sobrenome;
	public $email;
	public $tipo;
	
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
	
	public function emailExiste($email) {
		$this->load->database();
		$sql = "SELECT * FROM gerente WHERE email = ?";
		$resultado = $this->db->query($sql, array($email));
		if ($resultado->num_rows() > 0) {
			return true;
		}
		return false;
	}
}
