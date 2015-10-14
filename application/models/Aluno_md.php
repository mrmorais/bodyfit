<?php
class Aluno_md extends CI_Model {
	public $id;
	public $nome;
	public $sobrenome;
	public $data_nascimento;
	public $email;
	public $sexo;
	public $endereco;
	public $telefone;
	public $academia_id;
	
	public function validarCodigoDeAcesso($codigo) {
		//Retorno: se existe= id da academia
		//Retorno: se não existe= false
		$this->load->database();
		
		$query = $this->db->query("SELECT * FROM codigo_acesso WHERE codigo = ? and ativo = 1 LIMIT 1", array($codigo));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$this->desabilitarCodigoDeAcesso($row->id);
				
				return $row->academia_id;
			}
		} else {
			return false;
		}
	}
	
	public function setar($id) {
		$this->load->database();
		
		$this->db->where("id", $id);
		$query = $this->db->get('aluno');
		
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				$this->id = $row->id;
				$this->nome = $row->nome;
				$this->sobrenome = $row->sobrenome;
				$this->email = $row->email;
				$this->sexo = $row->sexo;
				$this->endereco = $row->endereco;
				$this->telefone = $row->telefone;
				$this->academia_id = $row->academia_id;
			}
			return $this;
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
	
	public function reformatarData($data) {
		$phpdata = strtotime($data);
		return date("d/m/Y", $phpdata);
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
	
	public function validate($email, $senha){
		$this->load->database();
		//SELECT's, primeiro parametro é o nome da coluna e o segundo é a variável de comparação
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		
		//Executa a query
		$query = $this->db->get('aluno');
		
		//Verifica o numero de linhas
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				return $row->id;
			}
		} else {
			return false;
		}
	}
	//[block] seted
	public function getAcademia() {
		
	}
	
	public function getProximaAvaliacao() {
		$this->load->database();
		$q = $this->db->query("SELECT av.*, p.nome, p.sobrenome FROM avaliacao_marcada as av, personal as p WHERE aluno_id=? and data>=now() and av.personal_id=p.id order by data limit 1;", array($this->id));
		if ($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				return array("id"=>$row->id, "p_nome"=>$row->nome, "p_sobrenome"=>$row->sobrenome, "data"=>$this->reformatarData($row->data));
			}
		} else {
			return false;
		}
	}
	
	public function cancelarAvaliacaoMarcada($id) {
		$this->load->database();
		$q = $this->db->delete("avaliacao_marcada", array("id"=>$id, "aluno_id"=>$this->id));
	}
	
	public function getTreino() {
		$this->load->database();
		$q = $this->db->query("SELECT e.series, e.repeticoes, p.musculo, p.nome, e.tempo, c.nome as 'categoria', d.dia
								FROM execucao as e, aluno as a, treino as t, pratica as p, categoria as c, dia as d
								WHERE 
									t.aluno_id = a.id 
									and t.id = e.treino_id
									and e.academia_has_pratica_pratica_id = p.id
									and p.categoria_id = c.id
									and e.id = d.execucao_id
									and a.id=?
									", array($this->id));
		$execs = [];
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$execs[] = array("series"=>$row->series,
								 "repeticoes"=>$row->repeticoes,
								 "musculo"=>$row->musculo,
								 "nome"=>$row->nome,
								 "categoria"=>$row->categoria,
								 "tempo"=>$row->tempo,
								 "dia"=>$row->dia);
			}
			return $execs;
		} else {
			return false;
		}
	}
	//[block] seted
}
?>
