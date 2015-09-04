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
		//Abrir página inicial
		$this->load->view('personal/home', array("user"=>$this->usuarioLogado, "academia"=>$academia));
	}
	public function alunos(){
		$this->auth();
		$this->load->model("personal_md");
		$alunos = $this->personal_md->pegarAlunos($this->usuarioLogado->id);
		//Abrir página inicial
		$this->load->view('personal/alunos', array("user"=>$this->usuarioLogado, "alunos"=>$alunos));
		
	}
	public function inbox() {
		$this->auth();
		$this->load->model("academia_md");
		$academia = $this->academia_md->setar($this->usuarioLogado->academia_id);
		//Abrir página inicial
		$this->load->view('personal/inbox', array("user"=>$this->usuarioLogado, "academia"=>$academia));
	}
	public function sair() {
		$this->load->library('session');
		$this->session->sess_destroy();
		header("Location: ?/Page/");
	}
}
