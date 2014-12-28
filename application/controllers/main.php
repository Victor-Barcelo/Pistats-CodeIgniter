<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('pi_info_model');
        $this->load->model('users_model');
    }
    
    public function index() {
        $this->abort_if_invalid_user();
        $data['js'] = array('https://www.google.com/jsapi', 'static/js/temperature_chart.js','static/js/header.js');
        $data['disk_info'] = $this->pi_info_model->get_disk_info();
        $data['temp_alert_users'] = $this->users_model->get_temp_alert_users();
        $this->load->view('main/header', $data);
        $this->load->view('main/main', $data);
        $this->load->view('main/footer', $data);
    }
    
    public function get_temperature_data() {
        $valid_login = $this->session->userdata('logged_in');
        if (!$valid_login) {
            $this->vutil->json_out(array('success' => FALSE));
            return;
        }
        $data['temperature_info'] = $this->pi_info_model->get_temperature_info();
        $this->vutil->json_out(array('success' => TRUE, 'data' => $data['temperature_info']));
        return;
    }
    
    private function abort_if_invalid_user() {
        $valid_login = $this->session->userdata('logged_in');
        if (!$valid_login) {
            redirect('login');
        }
    }
    
}

/* End of file main */

/* Location: ./application/controllers/main */
