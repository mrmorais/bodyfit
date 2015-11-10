<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerente extends CI_Controller {
	private $usuarioLogado = null;
	private $academia = null;
	private $codigo = null;
	
	private function auth() {
		$this->load->model("Gerente_md");
		$this->load->model("Academia_md");
		
		$this->load->library('session');
		if ($this->session->has_userdata('tipo')) {
			if ($this->session->userdata('tipo')=="gerente") {
				$this->usuarioLogado = $this->Gerente_md->setar($this->session->userdata("id"));
				$this->academia = $this->Academia_md->setar($this->session->userdata("id"));
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
		$this->load->view('gerente/home', array("user"=>$this->usuarioLogado, "academia"=>$this->academia));
	}
	
	public function personais(){
		$this->auth();
		$this->load->model('Academia_md');
		$dados['tabela'] = $this->Academia_md->buscarPersonal($this->session->userdata("id"));
		
		$this->load->view('gerente/personais', array ('tabela'=>$dados['tabela']));
	}
	
	public function alunos($page = null) {
		$this->auth();
		$this->load->model('Academia_md');
		$dados['tabela'] = $this->Academia_md->buscarAluno($this->session->userdata("id"));
		
		//Abrir página inicial
		if($page){
			$dados['codigo'] =  $this->Academia_md->emitirCodigo();
			$this->load->view('gerente/alunos', array ('tabela'=>$dados['tabela'], 'alunos'=>$dados['codigo']));	
		} else {
			$this->load->view('gerente/alunos', array ('tabela'=>$dados['tabela']));
		}
	}
	
	public function modalidades() {
		$this->auth();
		$this->load->model('Academia_md');
		$dados['tabela'] = $this->Academia_md->buscarPraticas($this->session->userdata("id"));
		$dados['tabelaTodos'] = $this->Academia_md->buscarTodasPraticas();
		
		
		$this->load->view('gerente/modalidades', array ('tabela'=>$dados['tabela'], 'tabelaTodos'=>$dados['tabelaTodos'],));
	}
	
	public function adicionarPratica($id){
		$this->auth();
		$this->load->model('Academia_md');
		$this->Academia_md->adicionarPratica($id, $this->session->userdata("id"));
		
		$this->modalidades();
	}
	
	public function removerPratica($id){
		$this->auth();
		$this->load->model('Academia_md');
		$this->Academia_md->removerPratica($id);
		
		$this->modalidades();
	}
	
	public function contato() {
		$this->auth();
		//Abrir página inicial
		$this->load->view('gerente/contato', array("user"=>$this->usuarioLogado));
	}
	
	public function sair() {
		$this->load->library('session');
		$this->session->sess_destroy();
		header("Location: ?/Page/");
	}
}
