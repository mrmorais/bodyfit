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
	
	public function treino() {
		$this->auth();
		$this->load->model("academia_md");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		//Abrir página inicial
		$this->load->view('aluno/treino', array("user"=>$this->usuarioLogado, "academia"=>$academia));
	}
	
	public function inbox() {
		$this->auth();
		$this->load->model("academia_md");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		//Abrir página inicial
		$this->load->view('aluno/inbox', array("user"=>$this->usuarioLogado, "academia"=>$academia));
	}
	
	public function avaliacoes() {
		$this->auth();
		$this->load->model("academia_md");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		//Abrir página inicial
		$this->load->view('aluno/avaliacoes', array("user"=>$this->usuarioLogado, "academia"=>$academia));
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
