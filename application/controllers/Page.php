<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
	}
	
	public function cadastro($tipo="user") {
		switch($tipo) {
			case "academia":
				$this->load->library('form_validation');
				//regras de validação dos dados do gerente
				$this->form_validation->set_rules('gerente_nome', 'Nome do gerente', 'required|max_length[45]');
				$this->form_validation->set_rules('gerente_sobrenome', 'Sobrenome do gerente', 'required|max_length[45]');
				$this->form_validation->set_rules('gerente_email', 'Email', 'required|trim|valid_email|max_length[255]');
				$this->form_validation->set_rules('gerente_senha', 'Senha', 'required|max_length[32]');
				$this->form_validation->set_rules('gerente_r_senha', 'Repetir senha', 'required|matches[gerente_senha]|max_length[32]');
				//regras de validação dos dados da academia
				$this->form_validation->set_rules('academia_nome', 'Nome da academia', 'required|max_length[45]');
				$this->form_validation->set_rules('academia_cidade', 'Cidade', 'required|max_length[45]');
				$this->form_validation->set_rules('academia_estado', 'Estado', 'required|max_length[2]');
				$this->form_validation->set_rules('academia_endereco', 'Endereço', 'max_length[45]');
				$this->form_validation->set_rules('academia_telefone', 'Telefone', 'max_length[45]');
				
				if ($this->form_validation->run()==FALSE) {
					//Se o formulario não foi preenchido corretamente ou se não foi preenchido ainda
					//Carrega a página de cadastro
					$this->load->view('cad_academia');
				} else {
					//Se o formulário foi enviado e preenchido corretamente
					$this->load->model('gerente_md', 'gerente');
					$this->load->model('academia_md', 'academia');
					if ($this->gerente->emailExiste($this->input->post('gerente_email'))) {
						$this->message("email_already_exists");
					} else {
						//Cadastrar gerente e academia no banco de dados
						$gerente_nome = $this->input->post('gerente_nome');
						$gerente_sobrenome = $this->input->post('gerente_sobrenome');
						$gerente_email = $this->input->post('gerente_email');
						$gerente_senha = $this->input->post('gerente_senha');
						//O cadastro retorna o ID gerado para o gerente
						$idGerente = $this->gerente->cadastrarGerente($gerente_nome, $gerente_sobrenome, $gerente_email, $gerente_senha);

						$academia_nome = $this->input->post('academia_nome');
						$academia_cidade = $this->input->post('academia_cidade');
						$academia_estado = $this->input->post('academia_estado');
						$academia_endereco = $this->input->post('academia_endereco');
						$academia_telefone = $this->input->post('academia_telefone');
						$idAcademia = $this->academia->cadastrarAcademia($academia_nome, $academia_cidade, $academia_estado, $academia_endereco, $academia_telefone);

						//Inserindo a relação entre academia e gerente
						$this->load->database();
						$dados = array("gerente_id"=>$idGerente, "academia_id"=>$idAcademia);
						$this->db->insert('gerente_has_academia', $dados);
					}
					
				}
			
				
				break;
			case "user":
				//Carrega a página de cadastro de usuário
				break;
		}
	}
	
	public function message($tipo) {
		switch($tipo) {
			case "email_already_exists":
				$data = array("tipo"=>"erro", 
							  "msg"=>"Já existe um usário cadastrado com este e-mail", 
							  "bt_text"=>"Tentar novamente",
							  "bt_href"=>"?/Page/cadastro");
				$this->load->view('message', $data);
				break;
		}
	}
}
