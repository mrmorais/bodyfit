<?php
class Mensagem_md extends CI_Model {
	public function getMensagens($idX, $tipo) {
		$this->load->database();
		$inbox = [];
		if ($tipo == "aluno") {
			$q_personais = $this->db->query("select p.id as p_id, p.nome as p_nome, p.sobrenome as p_sobrenome,
											al.id as a_id, al.nome as a_nome, al.sobrenome as a_sobrenome
											from personal as p, academia as a, aluno as al, personal_has_academia as pa
											where pa.academia_id = a.id
											and pa.personal_id = p.id
											and al.academia_id = a.id
											and al.id = ?", array($idX));
			if ($q_personais->num_rows() > 0) {
				foreach($q_personais->result() as $row) {
					$dados = array("id"=>$row->p_id, "nome"=>$row->p_nome, "sobrenome"=>$row->p_sobrenome);
					$q_msgs = $this->db->query("select * from mensagem where aluno_id = ? and personal_id = ?", array($idX, $row->p_id));
					$msgs = [];
					if ($q_msgs->num_rows() > 0) {
						foreach($q_msgs->result() as $msg) {
							if($msg->autor == "aluno") {
								$msgs[] = array("msg"=>$msg->msg, "autor"=>$row->a_nome." ".$row->a_sobrenome);
							} else {
								$msgs[] = array("msg"=>$msg->msg, "autor"=>$row->p_nome." ".$row->p_sobrenome);
							}
						}
					} else {
						$msgs = 0;
					}
					$inbox[] = array("info"=>$dados, "msgs"=>$msgs);
				}
			}
		} else{
			if($tipo == "personal") {
				$q_alunos = $this->db->query("select p.id as p_id, p.nome as p_nome, p.sobrenome as p_sobrenome,
												al.id as a_id, al.nome as a_nome, al.sobrenome as a_sobrenome
												from personal as p, academia as a, aluno as al, personal_has_academia as pa
												where a.id = al.academia_id and
												a.id = pa.academia_id and
												pa.personal_id = p.id and
												p.id = ?", array($idX));
				if ($q_alunos->num_rows() > 0) {
					foreach($q_alunos->result() as $row) {
						$dados = array("id"=>$row->a_id, "nome"=>$row->a_nome, "sobrenome"=>$row->a_sobrenome);
						$q_msgs = $this->db->query("select * from mensagem where aluno_id = ? and personal_id = ?", array($row->a_id, $idX));
						$msgs = [];
						if ($q_msgs->num_rows() > 0) {
							foreach($q_msgs->result() as $msg) {
								if($msg->autor == "aluno") {
									$msgs[] = array("msg"=>$msg->msg, "autor"=>$row->a_nome." ".$row->a_sobrenome);
								} else {
									$msgs[] = array("msg"=>$msg->msg, "autor"=>$row->p_nome." ".$row->p_sobrenome);
								}
							}
						} else {
							$msgs = 0;
						}
						$inbox[] = array("info"=>$dados, "msgs"=>$msgs);
					}
				}
			}
		}
		return $inbox;
	}
	
	public function enviar($uID, $pID, $msg, $autor) {
		$this->load->database();
		$this->db->insert("mensagem", array("aluno_id"=>$uID, "personal_id"=>$pID, "msg"=>$msg, "autor"=>$autor));
		//echo "dasds";
	}
}
?>
