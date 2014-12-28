<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vutil
{
    public function __construct() {
        $this->ci = & get_instance();
    }
    
    public function json_out($data) {
        $this->ci->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
    public function json_out_success($data) {
        $data_in = array('success' => TRUE, 'data'=>$data);
        $this->ci->output->set_content_type('application/json')->set_output(json_encode($data_in));
    }
    
    public function json_fail() {
        $this->ci->output->set_content_type('application/json')->set_output(json_encode(array('success' => FALSE)));
    }
    
    public function json_success() {
        $this->ci->output->set_content_type('application/json')->set_output(json_encode(array('success' => TRUE)));
    }
}

/* End of file Someclass.php */
