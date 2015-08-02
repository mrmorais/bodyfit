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
					if ($this->gerente->emailExiste($this->input->post('gerente_email'))) {
						//Informar que já existe um usuário com este e-mail
						//Issue #3
						echo "Já existe este e-mail cadastrado (Issue #3)";
					} else {
						//Cadastrar gerente e academia no banco de dados
						$gerente_nome = $this->input->post('gerente_nome');
						$gerente_sobrenome = $this->input->post('gerente_sobrenome');
						$gerente_email = $this->input->post('gerente_email');
						$gerente_senha = $this->input->post('gerente_senha');
						//O cadastro retorna o ID gerado para o gerente
						$idGerente = $this->gerente->cadastrarGerente($gerente_nome, 
																	  $gerente_sobrenome, 
																	  $gerente_email, 
																	  $gerente_senha);
						//Cadastrar a academia (Issue #4)
					}
					
				}
			
				
				break;
			case "user":
				//Carrega a página de cadastro de usuário
				break;
		}
	}
}
