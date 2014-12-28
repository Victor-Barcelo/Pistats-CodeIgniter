<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pi_info_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_general_info() {
        $info = array();
        return $info;
    }
    
    public function get_disk_info() {
        $info = array('name' => 'Tarjeta microSD', 'max_capacity' => '8 GB', 'usage' => '4.1 GB');
        $max_capacity = floatval(substr($info['max_capacity'], 0, strpos($info['max_capacity'], ' ')));
        $usage = floatval(substr($info['usage'], 0, strpos($info['usage'], ' ')));
        $info['usage_percent'] = round(($usage * 100) / $max_capacity, 1);
        return $info;
    }
    
    public function get_temperature_info() {
        $query = $this->db->get('temperatures');
        return $query->result_array();
    }
}

/* End of file pi_info.php */

/* Location: ./application/models/pi_info.php */
