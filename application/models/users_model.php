<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($login, $password) {
        if ($this->is_login_success($login, $password)) {
            $this->users_model->update_user_last_login($login, $password);
            $user_info = $this->users_model->get_user_info($login, $password);
            $su = $user_info->su == 1 ? TRUE : FALSE;
            $data = array('id' => $user_info->id, 'login' => $user_info->login, 'email' => $user_info->email, 'su' => $su, 'logged_in' => TRUE);
            $this->session->set_userdata($data);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_login_success($login, $password) {
        $query = $this->db->get_where('users', array('login' => $login, 'password' => $password));
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public function is_user_logged() {
        $sess_id = $this->session->userdata('logged_in');
        if (!empty($sess_id)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update_user_last_login($login, $password) {
        $id = $this->get_user_info($login, $password)->id;
        $data = array('last_login' => time());
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    
    public function get_user_info($login, $password) {
        $query = $this->db->get_where('users', array('login' => $login, 'password' => $password));
        return $query->row();
    }
    
    public function get_user_emails() {
        $this->db->select('email');
        $query = $this->db->get('users');
        return $query->result_array();
    }
    
    public function get_temp_alert_users() {
        $this->db->select('login,email,notify_temp_alert');
        $query = $this->db->get('users');
        return $query->result_array();
    }
    
    public function update_user_alerts($user_data) {
        // $data = array('title' => $title, 'name' => $name,);
        // $this->db->where('login', $id);
        // $this->db->update('mytable', $data);
    }
}

/* End of file login_model.php */

/* Location: ./application/models/login_model.php */
