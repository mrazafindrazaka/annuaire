<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_users()
	{
		$query = $this->db->get("utilisateur");
		return $query->result();
	}

	public function get_all_services()
	{
		$this->db->order_by('service', 'ASC');
		$query = $this->db->get("service");
		return $query->result();
	}

	public function insert_member($member)
	{
		$this->db->insert('information', $member);
	}

	public function update_member($id_member, $member)
	{
		$this->db->where('id', $id_member);
		$this->db->update('information', $member);
	}

	public function delete_member($id_member)
	{
		$this->db->where('id', $id_member);
		$this->db->delete('information');
	}
}
