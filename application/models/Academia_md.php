<?php
class Academia_md extends CI_Model {
	public $nome;
	public $cidade;
	public $estado;
	public $endereco;
	public $telefone;
	
	public function cadastrarAcademia($nome, $cidade, $estado, $endereco, $telefone) {
		$this->load->database();
		$dados = array("nome"=>$nome, "cidade"=>$cidade, "estado"=>$estado, "endereco"=>$endereco, "telefone"=>$telefone);
		$this->db->insert('academia', $dados);
		
		return $this->db->insert_id();
	}
}
?>
