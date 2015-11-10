<?php
class Academia_md extends CI_Model {
	public $id;
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
	
	public function setar($id) {
		$this->load->database();
		$query = $this->db->query("SELECT * FROM academia WHERE id = ? LIMIT 1", array($id));
		foreach ($query->result() as $row) {
			$this->id = $row->id;
			$this->nome = $row->nome;
			$this->cidade = $row->cidade;
			$this->estado = $row->estado;
			$this->telefone = $row->telefone;
			$this->endereco = $row->endereco;
		}
		return $this;
	}
	
	public function emitirCodigo() {
		//$tipo indica se é para um aluno ou para um personal. "aluno"|"personal"
		$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$codigo = '';
		$len = strlen($caracteres);
		for ($n = 1; $n <= 6; $n++) {
			$rand = mt_rand(1, $len);
			$codigo .= $caracteres[$rand-1];
		}
		
		$this->load->database();
		$dados = array("academia_id"=>$this->id, "codigo"=>$codigo);
		if($this->db->insert("codigo_acesso", $dados)) {
			return $codigo;
		} else {
			return false;
		}
	}
	
	public function buscarAluno($id){
		$this->load->database(); 
		
		//$this->db->where("academia_id", $id);
		//$query = $this->db->get('aluno');
		
		$query = $this->db->query('SELECT id, nome, sobrenome, email FROM aluno');
		$alunos = [];
		foreach ($query->result() as $row) {
			
			$alunos[] = array("id"=>$row->id, "nome"=>$row->nome, "sobrenome"=> $row->sobrenome, "email"=> $row->email);
		}
		
		return $alunos;
	}
	
	public function buscarPersonal($id){
		$this->load->database();
		
		$query = $this->db->query('SELECT id, nome, sobrenome, email FROM personal');
		$personal = [];
		foreach ($query->result() as $row) {
			
			$personal[] = array("id"=>$row->id, "nome"=>$row->nome, "sobrenome"=> $row->sobrenome, "email"=> $row->email);
		}
		
		return $personal;
	}
	
	public function buscarPraticas($id){
		$this->load->database();
		
		$query = $this->db->query("SELECT * FROM academia_has_pratica WHERE academia_id = ".$id."");		
		$pratica_id = [];
		$pratica = [];
		
		foreach ($query->result() as $row) {
			$sql = $this->db->query("SELECT * FROM pratica WHERE id = ".$row->pratica_id."");
			
			foreach ($sql->result() as $row) {
			
				$pratica[] = array("id"=>$row->id, "nome"=>$row->nome, "descricao"=> $row->descricao, "musculo"=> $row->musculo);
			}
		}
		
		return $pratica;
	}
	
	public function buscarTodasPraticas(){
		$this->load->database();
		
		$query = $this->db->query('SELECT * FROM pratica');
		$pratica = [];
		foreach ($query->result() as $row) {
			
			$pratica[] = array("id"=>$row->id, "nome"=>$row->nome, "descricao"=> $row->descricao, "musculo"=> $row->musculo);
		}
		
		return $pratica;
	}
	
	public function adicionarPratica($pratica_id, $academia_id){
		$this->load->database();
		
		$dados = array("pratica_id"=>$pratica_id, "academia_id"=>$academia_id);
		$this->db->insert("academia_has_pratica", $dados);
	}
	
	public function removerPratica($id){
		$this->load->database();
		
		$this->db->query('DELETE FROM academia_has_pratica WHERE pratica_id = '.$id.'');
	}
}
?>
