<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
        $this->load->helper('url');
		$this->load->model('chat_model');
		$this->load->database();
	}

	public function index()
	{
		$data['mensagens'] = $this->chat_model->recuperaTodas();
		$this->load->view('index', $data);
	}

	public function postar(){
		date_default_timezone_set('Brazil/West');

	    //if(isset($_SESSION['usuario'])){
	        $from		= 1;
	        $to			= 2;
	        $mensagem 	= $_POST['mensagem'];  

	        $this->chat_model->salvar($from, $to, $mensagem);
	    //}
	}

	public function mensagens(){
		$data['mensagens'] = $this->chat_model->recuperaTodas();
		$this->load->view('chat/mensagens', $data);
	}
}