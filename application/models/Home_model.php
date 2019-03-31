<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_informations()
	{
		$this->db->select('*, information.id AS id_member');
		$this->db->from('information');
		$this->db->join('service', 'information.id_service = service.id');
		$this->db->order_by('information.nom');
		$query = $this->db->get();
		return $query->result();
	}

	public function search_for($search)
	{
		$this->db->select('*, information.id AS id_member');
		$this->db->from('information');
		$this->db->join('service', 'information.id_service = service.id');
		$this->db->where('MATCH (prenom, nom, autre) AGAINST ("*' . $search . '*" IN BOOLEAN MODE)', NULL, FALSE);
		$this->db->or_where('service.id LIKE BINARY "' . $search . '"');
		$this->db->or_like('service.service', $search);
		$query = $this->db->get();
		return $query->result();
	}
}
