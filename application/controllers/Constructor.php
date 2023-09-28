<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Constructor extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->helper('url');

        // Load the SortArray class
        $arrayToAnalyze = [7, 2, 9, 1, 6, 5];
        $this->load->library('SortArray', $arrayToAnalyze);
    }

	public function index() {
        // Sample array to analyze
        $data['original_array'] = '7, 2, 9, 1, 6, 5';
        $this->load->view('constructor', $data);

	}

    public function getAction() {
        $action = $_GET['action'];

        $result = '';
        if($action == 'sorted_array') {
            $result = implode(', ', $this->sortarray->getData());
        } else if($action == 'median') {
            $result = $this->sortarray->getMedian();
        } else if($action == 'largest') {
            $result = $this->sortarray->getLargestValue();
        }

        echo json_encode($result);
    }

    
}
