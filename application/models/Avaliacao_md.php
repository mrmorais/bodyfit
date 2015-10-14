<?php
class Avaliacao_md extends CI_Model {
	public $id;
	
	public function getAvaliacoesByUserId($uID) {
		$this->load->database();
		$this->load->model('personal_md');
		
		$this->db->where("aluno_id", $uID);
		$avaliacoes_q = $this->db->get("avaliacao_fis");
		
		$avaliacoes = [];
		
		foreach($avaliacoes_q->result() as $av) {
			$personal_tmp = $this->personal_md->setar($av->personal_id);
			$avaliacoes[] = array("id"=>$av->id, 
								  "p_nome"=>$personal_tmp->nome, 
								  "p_sobrenome"=>$personal_tmp->sobrenome,
								  //outros dados
								  "data"=>$av->data);
		}
		return $avaliacoes;
	}
	
	public function getAvaliacao($avID, $uID) {
		$this->load->database();
		$this->load->model('personal_md');
		
		$this->db->where("aluno_id", $uID);
		$this->db->where("id", $avID);
		$avaliacao_q = $this->db->get("avaliacao_fis");
		$avaliacao = [];
		foreach($avaliacao_q->result() as $av) {
			$personal_tmp = $this->personal_md->setar($av->personal_id);
			$avaliacao = array("id"=>$av->id,
							  "p_nome"=>$personal_tmp->nome,
							  "p_sobrenome"=>$personal_tmp->sobrenome,
							  //outros dados
							  "data"=>$av->data);
		}
		return $avaliacao;
		
	}
}
?>
