<?php

	class Chat_model extends CI_Model{
		var $id;
		var $from;
		var $to;
		var $mensagem;
		var $data;

		function salvar($from, $to, $mensagem){
			$data = array(
			   'from' 		=> $from,
			   'to' 		=> $to,
			   'mensagem' 	=> $mensagem,
			   'data' 		=> date("Y-m-d H:i:s")
			);

			$this->db->insert('chat', $data);
			return;
		}

		function recuperaTodas(){
			$this->db->select('from, to, mensagem, data');
			$this->db->order_by('data','asc');
			$result = $this->db->get('chat');

			return $result->result();
		}
	}