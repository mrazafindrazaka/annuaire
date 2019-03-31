<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('member_model');
	}

	public function index()
	{
		$data['title'] = 'Accueil';
		$data['members'] = $this->home_model->get_all_informations();
		$data['services'] = $this->member_model->get_all_services();
		$this->load->view('templates/header.php', $data);
		$this->load->view('home/home.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	public function search($default = "")
	{
		$search = $this->input->post('search');
		if ($search == NULL)
			$search = $default;
		$data['title'] = 'Recherche';
		$data['search'] = $search;
		if (empty($search)) {
			$data['members'] = $this->home_model->get_all_informations();
		} else {
			$data['members'] = $this->home_model->search_for($search);
		}
		$data['services'] = $this->member_model->get_all_services();
		$this->load->view('templates/header.php', $data);
		$this->load->view('home/home.php', $data);
		$this->load->view('templates/footer.php', $data);
	}
}
