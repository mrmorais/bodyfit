<?php
class Aluno_md extends CI_Model {
	public $nome;
	public $sobrenome;
	public $data_nascimento;
	public $email;
	public $sexo;
	public $endereco;
	public $telefone;
	
	public function validarCodigoDeAcesso($codigo) {
		//Retorno: se existe= id da academia
		//Retorno: se não existe= false
		return 2;
	}
	public function cadastrarAluno($nome, $sobrenome, $email, $senha, $nascimento, $sexo, $telefone, $endereco, $academia_id) {
		//Função de cadastro
		$this->load->database();
		$dados = array("nome"=>$nome, "sobrenome"=>$sobrenome, "email"=>$email, "senha"=>$senha, "nascimento"=>$nascimento, "academia_id"=>$academia_id, "sexo"=>$sexo, "telefone"=>$telefone, "endereco"=>$endereco);
		//Por enquanto sexo, telefone e endereço foram suprimidos, enquanto não estão no db
		if($this->db->insert('aluno', $dados)) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}
	public function emailExiste($email) {
		$this->load->database();
		$sql = "SELECT * FROM aluno WHERE email = ?";
		$resultado = $this->db->query($sql, array($email));
		if ($resultado->num_rows() > 0) {
			return true;
		}
		return false;
	}
}
?>
