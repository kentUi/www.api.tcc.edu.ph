<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GetAuthLogs extends CI_Model
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Manila');
    }

    public function get_client_ip() {
        
        $ip_address = '';
    
        // Cloudflare headers
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip_address = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        // AWS headers
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // General headers
        elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
    
        return $ip_address;
    }

    public function logs($status, $username, $client)
    {
        $data = [
            'log_key_id' => $client,
            'log_username' => $username,
            'log_status' => $status,
            'log_ip_address' => $this->get_client_ip(),
            'log_browser' => $_SERVER['HTTP_USER_AGENT']
        ];

        $this->db->insert('sys_klogs', $data);
    }
}
