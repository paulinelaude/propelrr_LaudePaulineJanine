<?php
class form_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

    public function add_profile($post_data) { 
		$data = array(
			'name'	 			    => $post_data['full_name'],
			'email'	 		        => $post_data['email'],
			'contact_no'	 		=> $post_data['mobile_no'],
			'bday'	 	            => $post_data['dob'],
			'age'	 				=> $post_data['age'],
			'gender'		    	=> $post_data['gender']
		);
		return $this->db->insert('profile', $data);
	}
}