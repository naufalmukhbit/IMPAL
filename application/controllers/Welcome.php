<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	public function index()
	{
		$this->load->view('sidebar_stocks');
	}
}
