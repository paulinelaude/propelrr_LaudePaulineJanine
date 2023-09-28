<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabonacci extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->helper('url');
    }

	public function index() {
        $data['output'] = '';
		$this->load->view('fabonacci', $data);
	}

    public function getFabonacci() {
        $input = $_GET['input'];
        $result = $this->fibonacci($input);
        echo json_encode($result);
    }

    public function fibonacci($n) {
        $return_data = '';

        $arr = array();

        $t = 0;
        $t1 = 1;
        $t2 = 0;

        for($i=1;$i<=20;$i++) {
            
            $arr[] = $t;

            $t = $t1 + $t2;
            $t1 = $t2;
            $t2 = $t;            
        }

        $new_datas = array_slice($arr, 0, $n, true);
        
        foreach ($new_datas as $new_data) {
            $return_data .= $new_data . '&nbsp;&nbsp;';
        }
        
        return $return_data;        
    }

}
