<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('form_model');
    }

	public function index() {
        $data['output'] = '';
		$this->load->view('form', $data);
	}

    public function validate() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data = json_decode(trim(file_get_contents('php://input')), true); 
        
        if (strlen($data['full_name']) < 1) {
            $this->form_validation->set_rules('full_name', 'Name', 'required|alpha');
        }

        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) { 
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        }

        if (strlen($data['mobile_no']) < 1 || strlen($data['mobile_no']) < 11) {
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|min_length[1]|max_length[11]');
        } else if (strlen($data['mobile_no']) > 11) {           
            $this->form_validation->set_rules(
                    'mobile_no', 'Mobile No',
                    'required|min_length[1]|max_length[11]',
                    array(
                        'required'      => 'The mobile no. is invalid.'
                    )
            );
        }

        if (empty($data['dob'])) {
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required|date_valid');
        } 

        if (empty($data['gender'])) {
            $this->form_validation->set_rules('gender', 'Gender', 'required');
        } 

        if (empty($data['age'])) {
            $this->form_validation->set_rules('age', 'Age', 'required');
        } 
       
        if($this->form_validation->run() === FALSE) {
            $return_data = array(
                'error'   => true,
                'name_error' => form_error('full_name'),
                'email_error' => form_error('email'),
                'mobile_no_error' => form_error('mobile_no'),
                'dob_error' => form_error('dob'),
                'age_error' => form_error('age')
            );
        } else {
            // add data
            $this->insert($data);

            $return_data = array(
                'success' => true
            );
        }

        echo json_encode($return_data);
    }

    public function insert($data) {
        $this->form_model->add_profile($data);
        return true;
    }
   
}
