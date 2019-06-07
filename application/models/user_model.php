<?php
	class user_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_user($id = 0){
        if ($id === 0)
        {
                $query = $this->db->get('user');
                return $query->result_array();
        }
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
}

	public function get_user_login($email, $password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$result = $this->db->get('user');
		return $result;
	}
	 public function set_user($id = 0)
    {
        $data = array(
            'firstname' => $this->security->xss_clean ($this->input->post('firstname')),
			'surname' => $this->security->xss_clean ($this->input->post('surname')),
            'email' => $this->security->xss_clean ($this->input->post('email')),
			'usertype' => $this->security->xss_clean ($this->input->post("0")),
			'password' => $this->security->xss_clean ($this->input->post('password'))
			
            //'password' =>($this->encryption->encrypt($this->input->post('password')))
			
        );
            
        if ($id == 0) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
    }
	
	public function get_users(){
				$query = $this->db->get('user');
                return $query->result_array();
		}

	public function delete_user($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('user');
	}
	public function get_user_by_id($id = 0){
		 if ($id === 0)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }
	
}
?>