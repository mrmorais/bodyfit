<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {
	private $usuarioLogado = null;
	
	private function auth() {
		$this->load->model("aluno_md");
		
		$this->load->library('session');
		if ($this->session->has_userdata('tipo')) {
			if ($this->session->userdata('tipo')=="aluno") {
				$this->usuarioLogado = $this->aluno_md->setar($this->session->userdata("id"));
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
		$this->load->model("academia_md");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		//Abrir página inicial
		$this->load->view('aluno/home', array("user"=>$this->usuarioLogado, "academia"=>$academia));
	}
	
	public function treino($pagina = null) {
		$this->auth();
		$this->load->model("academia_md");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		
		switch($pagina) {
			case null:
				//Abrir página de treinos
				$treino = $this->usuarioLogado->getTreino();
				$this->load->view('aluno/treino', array("user"=>$this->usuarioLogado, "academia"=>$academia, "treino"=>$treino));
				break;
			case "todo":
				$treino = $this->usuarioLogado->getTreino();
				$this->load->view('aluno/treino_todo', array("user"=>$this->usuarioLogado, "academia"=>$academia, "treino"=>$treino));
				break;
			default:
				show_404();
		}
		
	}
	
	public function inbox() {
		$this->auth();
		$this->load->model("academia_md");
		$this->load->model("mensagem_md");
		$inbox = $this->mensagem_md->getMensagens($this->usuarioLogado->id, "aluno");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		//Abrir página inicial
		$this->load->view('aluno/inbox', array("user"=>$this->usuarioLogado, "academia"=>$academia, "inbox"=>$inbox));
	}
	public function enviarMsg() {
		$this->auth();
		
		$this->load->model("mensagem_md");
		$msg = $this->input->post("msg");
		$p_id = $this->input->post("p_id");
		$this->mensagem_md->enviar($this->usuarioLogado->id, $p_id, $msg, "aluno");
	}
	
	public function avaliacoes($action = "show", $id=0) {
		$this->auth();
		switch($action) {
			case "show":
				$this->load->model("academia_md");
				$this->load->model("avaliacao_md");
				$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
				$proximaAvaliacao = $this->usuarioLogado->getProximaAvaliacao();
				$avaliacoes = $this->avaliacao_md->getAvaliacoesByUserId($this->usuarioLogado->id);
				$this->load->view('aluno/avaliacoes', array("user"=>$this->usuarioLogado, 
															"academia"=>$academia, 
															"next_av"=>$proximaAvaliacao,
															"avaliacoes"=>$avaliacoes));
				break;
			case "cancelar":
				$this->usuarioLogado->cancelarAvaliacaoMarcada($id);
				header("Location: ?/Aluno/avaliacoes");
				break;
			default:
				show_404();
		}	
	}
	
	public function avaliacao($id=0) {
		if ($id == 0) {
			show_404();
		}
		
		$this->auth();
		$this->load->model("avaliacao_md");
		$avaliacao = $this->avaliacao_md->getAvaliacao($id, $this->usuarioLogado->id);
		if ($avaliacao == null) {
			show_404();
		}
		$this->load->view("aluno/avaliacao", array("av"=>$avaliacao));
	}
	
	public function relatorios() {
		$this->auth();
		$this->load->model("academia_md");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		//Abrir página inicial
		$this->load->view('aluno/relatorios', array("user"=>$this->usuarioLogado, "academia"=>$academia));
	}
	
	public function sair() {
		$this->load->library('session');
		$this->session->sess_destroy();
		header("Location: ?/Page/");
	}
}
