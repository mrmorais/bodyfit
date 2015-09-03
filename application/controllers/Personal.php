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
		//Abrir página inicial
		$this->load->view('personal/home', array("user"=>$this->usuarioLogado));
	}
	
	public function sair() {
		$this->load->library('session');
		$this->session->sess_destroy();
		header("Location: ?/Page/");
	}
}
