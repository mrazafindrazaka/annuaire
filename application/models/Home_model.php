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
		$this->db->order_by('service.service ASC, information.nom ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function search_for($search)
	{
		$this->db->select('*, information.id AS id_member');
		$this->db->from('information');
		$this->db->join('service', 'information.id_service = service.id');
		if (!is_numeric($search)) {
			$search = $this->db->escape('*' . $search . '*');
			$this->db->where('MATCH (information.prenom, information.nom, information.autre) AGAINST ("' . $this->db->escape($search) . '" IN BOOLEAN MODE)', NULL, FALSE);
			$this->db->or_where('MATCH (service.service) AGAINST ("' . $this->db->escape($search) . '" IN BOOLEAN MODE)', NULL, FALSE);
			$this->db->order_by('service.service ASC, information.nom ASC');
		} elseif (is_numeric($search)) {
			$this->db->where('service.id LIKE BINARY "' . $this->db->escape_str($search) . '"');
		}
		$query = $this->db->get();
		return $query->result();
	}
}
