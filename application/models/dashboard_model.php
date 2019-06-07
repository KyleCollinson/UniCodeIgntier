<?php
class Dashboard_model extends CI_Model{

	public function __construct(){
			$this->load->database();
	}
	
	public function get_dashboard($slug = FALSE)
	{
		if ($slug === FALSE)
		{
		$query = $this->db->get('listings');
		return $query->result_array();
		}

		$query = $this->db->get_where('listings', array('slug' => $slug, 'id' =>$this->session->userdata('id')));
		return $query->row_array();
		if ($query->row_array()== 0)
			{
				echo("you have not listed anything, please create a listing");
			}
	}

	public function get_dashboard_by_id($id = 0){
		 if ($id === 0)
        {
            $query = $this->db->get('listings');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('listings', array('id' => $id));
        return $query->row_array();
    }
	
	public function set_dashboard($id = 0){
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'brand' => $this->input->post('brand'),
			'slug' => $slug,
			'model' => $this->input->post('model'),
			'colour' => $this->input->post('colour'),
			'date_added' => $this->input->post('date_added'),
			'year_made' => $this->input->post('year_made'),
			'id' => $this->input->post('id'),
		);

		if ($id == 0) {
		return $this->db->insert('listings', $data);
		
		} else {
		
		$this->db->where('id', $id);
		return $this->db->update('listings', $data);
		}
}

	public function delete_dashboard($id){
		$this->db->where('id', $id);
		return $this->db->delete('listings');
	}
}