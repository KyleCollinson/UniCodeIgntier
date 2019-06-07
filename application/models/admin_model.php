<?php
class admin_model extends CI_Model{

	public function __construct(){
			$this->load->database();
	}
	
		public function get_user(){
                $query = $this->db->get('user');
                return $query->result_array();
		}
		public function get_users_by_id($id = 0){
		
		 if ($id === 0)
        {
            $uquery = $this->db->get('users');
            return $uquery->result_array();
        }
 
        $uquery = $this->db->get_where('users', array('id' => $id));
        return $uquery->row_array();
    }
	public function set_users($id = 0){
		
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'firstname' => $this->input->post('firstname'),
			'surname' => $this->input->post('surname'),
			'usertype' => $this->input->post('usertype'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'id' => $this->input->post('id'),
		);

		if ($id == 0) {
		return $this->db->insert('user', $data);
		
		}else {
		
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
		
		}
	}

	public function delete_user($id){
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
	
public function promote($id){
$this->db->where('id',$id);		
	$data = array(
            
			'usertype' => "1",
			
			);
$this->db->update('user',$data);

}	
public function demote($id){
$query = $this->db->get('user');

$this->db->where('id',$id);
$this->db->update('user','usertype',0);

}
}
	