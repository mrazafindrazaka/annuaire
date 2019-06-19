<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
	}

	public function login()
	{
		$data['title'] = 'Connexion';
		$this->load->view('templates/header.php', $data);
		$this->load->view('member/login.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	public function connection()
	{
		$users = $this->member_model->get_all_users();
		foreach ($users as $user) {
			if ($user->user == $this->input->post('user') && $user->pass == $this->input->post('pwd')) {
				set_cookie('user', $user->user, 300000);
				set_cookie('mode', $user->admin, 300000);
				set_cookie('id', $user->id, 300000);
				redirect(base_url(), 'refresh');
			}
		}
		redirect(base_url('member/login'), 'refresh');
	}

	public function disconnection()
	{
		delete_cookie('user');
		delete_cookie('mode');
		redirect(base_url(), 'refresh');
	}

	public function create()
	{
		if (get_cookie('mode') != 1) {
			redirect(base_url());
		}
		$data['title'] = 'Création';
		$data['services'] = $this->member_model->get_all_services();
		$this->load->view('templates/header.php', $data);
		$this->load->view('member/create.php', $data);
		$this->load->view('templates/footer.php', $data);
	}

	public function insert()
	{
		if (get_cookie('mode') != 1) {
			redirect(base_url());
		}
		$member = array(
			'id_service' => $this->input->post('id_service'),
			'prenom' => $this->input->post('prenom'),
			'nom' => $this->input->post('nom'),
			't_fixe' => $this->input->post('t_fixe'),
			't_mobile' => $this->input->post('t_mobile'),
			't_fixe_2' => $this->input->post('t_fixe_2'),
			'batiment' => $this->input->post('batiment'),
			'bureau' => $this->input->post('bureau'),
			'sexe' => $this->input->post('sexe'),
			'mail' => $this->input->post('mail'),
			'autre' => $this->input->post('autre'),
			'matricule' => $this->input->post('matricule')
		);
		$this->member_model->insert_member($member);
		redirect(base_url('member/create'), 'refresh');
	}

	public function update($id_member)
	{
		if (get_cookie('mode') != 1) {
			redirect(base_url());
		}
		$member = array(
			'id_service' => $this->input->post('id_service'),
			'prenom' => $this->input->post('prenom'),
			'nom' => $this->input->post('nom'),
			't_fixe' => $this->input->post('t_fixe'),
			't_mobile' => $this->input->post('t_mobile'),
			't_fixe_2' => $this->input->post('t_fixe_2'),
			'batiment' => $this->input->post('batiment'),
			'bureau' => $this->input->post('bureau'),
			'sexe' => $this->input->post('sexe'),
			'mail' => $this->input->post('mail'),
			'autre' => $this->input->post('autre'),
			'matricule' => $this->input->post('matricule')
		);
		$this->member_model->update_member($id_member, $member);
		$url = base_url('home/search/' . urlencode($this->input->post('back_location')));
		redirect($url, 'refresh');
	}

	public function delete($id_member)
	{
		if (get_cookie('mode') != 1) {
			redirect(base_url());
		}
		$this->member_model->delete_member($id_member);
		echo json_encode("done");
	}

	public function service()
	{
		if (get_cookie('mode') != 1) {
			redirect(base_url());
		}
		$id_service = $this->input->post('id_service');
		$service = array(
			'service' => $this->input->post('service')
		);
		$this->member_model->update_service($id_service, $service);
		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function admin()
	{
		$data['title'] = 'Administration';
		$this->load->view('templates/header.php', $data);
		$this->load->view('templates/footer.php', $data);
	}
}
