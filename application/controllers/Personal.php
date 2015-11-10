<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {
	private $usuarioLogado = null;
	
	private function auth() {
		$this->load->model("personal_md");
		
		$this->load->library('session');
		if ($this->session->has_userdata('tipo')) {
			if ($this->session->userdata('tipo')=="personal") {
				$this->usuarioLogado = $this->personal_md->setar($this->session->userdata("id"));
			} else {
				header("Location: ?/Page/login");
			}
		} else {
			header("Location: ?/Page/login");
		}
	}
	public function index()
	{
		$this->auth();
		$this->load->model("personal_md");
		
		$academia = $this->personal_md->pegarAcademia($this->usuarioLogado->id);
		$avaliacoes = $this->personal_md->avaliacoesDiarias($this->usuarioLogado->id);
		
		$this->load->view('personal/home', array("user"=>$this->usuarioLogado, "academia"=>$academia, "avaliacoes"=>$avaliacoes));
	}
	
	public function treinos() {
		$this->auth();
		$this->load->model("personal_md");
		
		$resultados = $this->personal_md->getAlunosSemTreino($this->usuarioLogado->id);
		
		//echo json_encode($resultados);
		$this->load->view('personal/treinos', array("user"=>$this->usuarioLogado, "treinos"=>$resultados));
	}
	public function treino($id_al) {
		$this->auth();
		$this->load->model("personal_md");
		$this->load->model("aluno_md");
		$this->load->library('javascript');
		
		$resultado = $this->aluno_md->setar($id_al);
		$treino = $this->usuarioLogado->getTreino($this->usuarioLogado->id, $id_al);
		$categoria = $this->usuarioLogado->getCategoria();
		
		$this->load->view("personal/treino", array("treino"=>$treino, "aluno"=>$resultado, "categoria"=>$categoria));
	}
	public function novoTreino($id_al){
		$this->auth();
		$this->db->query("UPDATE treino SET ativo = 0 WHERE aluno_id = ?", array($id_al));
		$novo = $this->db->query('INSERT INTO treino(inicio, ativo, aluno_id, personal_id) VALUES(current_date, ?, ?, ?)', 
				array(1, $id_al, $this->usuarioLogado->id));
		$this->treino($id_al);
	}
	
	public function adicionarExecucaoAoTreino() {
		$this->auth();
		$this->load->model("personal_md");
		$this->load->model("aluno_md");
		
		$id_pratica = $this->input->post("id_pratica");
		$id_aluno = $this->input->post("id_aluno");
		$series = $this->input->post("series");
		$repeticoes = $this->input->post("repeticoes");
		$dia = $this->input->post("dia");
		
		$treino = $this->db->query("SELECT * FROM treino WHERE aluno_id=?", array($id_aluno));
		$treinoNaoAtivo = $this->db->query("SELECT * FROM treino WHERE aluno_id=? AND ativo = 0", array($id_aluno));
		if ($treino->num_rows() == $treinoNaoAtivo->num_rows()) {
			foreach($treinoNaoAtivo->result() as $row) {
				//primeiro treino não ativado
				//adicionar praticas
				$this->db->query("UPDATE treino SET ativo = 1 WHERE id = ?", array($row->id));
				$this->usuarioLogado->adicionarExecucao($row->id, $this->usuarioLogado->id, $id_aluno, $series, $repeticoes, $id_pratica, $dia);
			}
		} else {
			
			$treinoAtual = $this->db->query("SELECT * FROM treino WHERE aluno_id=? AND ativo = 1 LIMIT 1", array($id_aluno));
			if($treinoAtual->num_rows() > 0){
				//tem treino mas vai atualizar
				foreach($treinoAtual->result() as $row) {
					$this->usuarioLogado->adicionarExecucao($row->id, $this->usuarioLogado->id, $id_aluno, $series, $repeticoes, $id_pratica, $dia);
				}
			}else{
				//ja teve treinos, mas atualmente n possui nenhum
				//precisa criar um
				$novo = $this->db->query('INSERT INTO treino(inicio, ativo, aluno_id, personal_id) VALUES(current_date, ?, ?, ?)', 
				array(1, $id_aluno, $this->usuarioLogado->id));
			}
			
		}
	}
	
	public function searchAluno() {
		$this->auth();
		$q = $this->input->post("q");
		
		$this->load->model("personal_md");
		$resultados = $this->personal_md->searchAluno($q, $this->usuarioLogado->id);
		
		echo json_encode($resultados);
	}
	public function agendarAvaliacao() {
		$this->auth();
		$z = $this->input->post("z");
		$p = $this->input->post("p");
		//$dataatual = date("Y-m-d");
		$this->load->model("personal_md");
		$var = $p;
		$date = str_replace('/', '-', $var);
		$newdata = date('Y-m-d', strtotime($date));
		$resultados = $this->personal_md->agendarAvaliacao($z, $this->usuarioLogado->id, $newdata);
		
		echo json_encode($resultados);
	}
	public function inbox() {
		$this->auth();
		$academia = $this->personal_md->pegarAcademia($this->usuarioLogado->id);
		$this->load->model("mensagem_md");
		$inbox = $this->mensagem_md->getMensagens($this->usuarioLogado->id, "personal");
		//$academia = $this->academia_md->setar($this->usuarioLogado->id);
		//Abrir página inicial
		$this->load->view('personal/inbox', array("user"=>$this->usuarioLogado, "academia"=>$academia, "inbox"=>$inbox));
	}
	public function enviarMsg() {
		$this->auth();
		
		$this->load->model("mensagem_md");
		$msg = $this->input->post("msg");
		$a_id = $this->input->post("a_id");
		$this->mensagem_md->enviar($a_id, $this->usuarioLogado->id, $msg, "personal");
	}
	public function avaliacoes() {
		$this->auth();
		//$r = $this->input->post("r");
		
		$this->load->model("personal_md");
		$resultados = $this->personal_md->pegarAvaliacoes($this->usuarioLogado->id);
		
		//echo json_encode($resultados);
		$this->load->view('personal/avaliacoes', array("user"=>$this->usuarioLogado, "avaliacoes"=>$resultados));
	}
	public function pegarTodos() {
		$this->auth();
		$r = $this->input->post("r");
		
		$this->load->model("personal_md");
		$resultados = $this->personal_md->pegarTodos($r, $this->usuarioLogado->id);
		
		echo json_encode($resultados);
	}
	public function pegarTodosExercicios() {
		$this->auth();
		$r = $this->input->post("e");
		
		$this->load->model("personal_md");
		$resultados = $this->personal_md->pegarTodosExercicios($r, $this->usuarioLogado->id);
		
		echo json_encode($resultados);
	}
	public function pegarTodasAvaliacoes() {
		$this->auth();
		$t = $this->input->post("t");
		
		if($t=="true"){
			$this->load->model("personal_md");
			$resultados = $this->personal_md->pegarAvaliacoes($this->usuarioLogado->id);
			
			echo json_encode($resultados);
		}
	}
	public function pegarTodosTreinos(){
		$this->auth();
		$tr = $this->input->post("tr");
		
		if($tr=="true"){
			$this->load->model("personal_md");
			$resultados = $this->personal_md->getAlunosSemTreino($this->usuarioLogado->id);
			
			echo json_encode($resultados);
		}
	}
	public function alterarAvaliacao() {
		$this->auth();
		$j = $this->input->post("j");
		$k = $this->input->post("k");
		$l = $this->input->post("l");
		
		$this->load->model("personal_md");
		$var = $k;
		
		$date = str_replace('/', '-', $var);
		$novaData = date('Y-m-d', strtotime($date));
		$resultados = $this->personal_md->alterarAvaliacao($j, $this->usuarioLogado->id, $novaData, $l);
		
		if($resultados){
			$this->load->model("personal_md");
			$resultados = $this->personal_md->pegarAvaliacoes($this->usuarioLogado->id);
			
			echo json_encode($resultados);
		}
	}
	public function deletarAvaliacao() {
		$this->auth();
		$d = $this->input->post("d");
		
		$this->load->model("personal_md");
		
		$resultados = $this->personal_md->deletarAvaliacao($d, $this->usuarioLogado->id);
		
		if($resultados){
			$this->load->model("personal_md");
			$resultados = $this->personal_md->pegarAvaliacoes($this->usuarioLogado->id);
			
			echo json_encode($resultados);
		}
	}
	public function alunos(){
		$this->auth();
		$this->load->model("personal_md");
		$alunos = $this->personal_md->pegarAlunos($this->usuarioLogado->id);
		//Abrir página inicial
		$this->load->view('personal/alunos', array("user"=>$this->usuarioLogado, "alunos"=>$alunos));
		
	}
	public function sair() {
		$this->load->library('session');
		$this->session->sess_destroy();
		header("Location: ?/Page/");
	}
}
