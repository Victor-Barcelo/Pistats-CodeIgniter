<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('users_model');
        $this->main_url = 'http://pistats.victorbarcelo.net';
    }
    
    public function index() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            if ($this->users_model->login($login, $password)) {
                redirect('main');
            } else {
                $this->session->sess_destroy();
                $this->load->view('login', array('login_error' => true));
            }
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('');
    }
    
    public function api_login() {
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        if ($login == '' || $password == '') {
            $this->session->sess_destroy();
            $this->vutil->json_fail();
        }
        if ($this->users_model->login($login, $password)) {
            $this->vutil->json_success();
        } else {
            $this->session->sess_destroy();
            $this->vutil->json_fail();
        }
    }
}
