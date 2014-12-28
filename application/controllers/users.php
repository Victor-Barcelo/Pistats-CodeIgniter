<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once (__DIR__ . '/../third_party/twitter.class.php');

class Users extends CI_Controller
{
    var $twitter;
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('email');
        $consumerKey = 'r29pd1H172kd31vDqS5XKlgiw';
        $consumerSecret = 'NieNYkiEpCdZ9ByAdjCFZG1ayhiK7Oj8yanzz4wLb1dY2h74To';
        $accessToken = '2881863592-iAQEp0OnHq6Q9Anu47ZRCnBbMjJuHXLUgdcTFyT';
        $accessTokenSecret = 'Qqf4Z8uyRjevU3KYFEewsqLghvZRotGsIy3m3vlrTFnxU';
        $this->twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
    }
    
    public function notify_temperature_alert() {
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        $temperature = $this->input->post('temperature');
        if ($this->users_model->login($login, $password)) {
            $emails = $this->users_model->get_user_emails();
            $this->mail_temperature_alert($emails, $temperature);
            $this->tweet_temperature_alert($temperature);
        } else {
            $this->session->sess_destroy();
            $this->vutil->json_fail();
        }
    }
    
    private function mail_temperature_alert($emails, $temperature) {
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        foreach ($emails as & $email) {
            $this->email->from('pistats@none.com', 'Pistats');
            $this->email->to($email);
            $this->email->cc('');
            $this->email->bcc('');
            $this->email->subject('Pistats: Alerta de alta temperatura');
            $this->email->message('Alta temperatura producida: ' . $temperature);
            $this->email->send();
        }
        $this->vutil->json_success();
    }
    
    public function tweet_temperature_alert($temperature) {
        $this->twitter->send('Alta temperatura producida: ' . $temperature);
    }
    
    public function update_user_alerts() {
        if ($this->users_model->is_user_logged()) {
            $users = $this->input->post('data');
            $this->users_model->update_user_alerts($users);
        } else {
            $this->vutil->json_fail();
        }
    }
}

/* End of file user_administration.php */

/* Location: ./application/controllers/user_administration.php */

//
//
