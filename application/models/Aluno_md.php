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
		$this->load->database();
		
		$query = $this->db->query("SELECT * FROM codigo_acesso WHERE codigo = ? and tipo = ? and ativo = 1 LIMIT 1", array($codigo, "aluno"));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$this->desabilitarCodigoDeAcesso($row->id);
				
				return $row->academia_id;
			}
		} else {
			return false;
		}
	}
	
	public function desabilitarCodigoDeAcesso($codigo_id) {
		$this->load->database();
		$query = $this->db->query("UPDATE codigo_acesso SET ativo = 0 WHERE id = ?", array($codigo_id));
	}
	
	public function cadastrarAluno($nome, $sobrenome, $email, $senha, $nascimento, $sexo, $telefone, $endereco, $academia_id) {
		//Função de cadastro
		$this->load->database();
		
		$dados = array("nome"=>$nome, "sobrenome"=>$sobrenome, "email"=>$email, "senha"=>$senha, "nascimento"=>$this->formatarData($nascimento), "academia_id"=>$academia_id, "sexo"=>$sexo, "telefone"=>$telefone, "endereco"=>$endereco);
		if($this->db->insert('aluno', $dados)) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}
	public function formatarData($data) {
		$data = explode("/", $data);
		return $data[2]."-".$data[1]."-".$data[0];
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
