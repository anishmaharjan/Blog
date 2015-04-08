<?php
class Model_blogs extends CI_Model{

	public function get_posts()
	{
		$query =  $this->db->get('post');
		return $query->result();
	}
	
	public function add_post($data)
	{
		$this->db->insert('post',$data);
		return;
	}

	public function update_post() //ill functioning
	{
		$this->db->where('id', 6);
		$this->db->update('post',$data);
	}

	public function delete_post()
	{
		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('post');
	}

}
