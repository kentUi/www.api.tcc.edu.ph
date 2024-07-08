<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GetCredentials extends CI_Model
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Manila');
        $this->load->model('GenerateToken');
        $this->load->model('GetAuthLogs');
    }
    public function login()
    {
        $data = json_decode(file_get_contents('php://input'));
        if ($data) {
            $validate = $this->db->where('ss_client_key', $data->client_key)->get('sys_keys');
            $validate_result = $validate->row();
            $key_id = $validate_result->ss_key_id;
            $key = $validate_result->ss_client_key;

            if ($validate->num_rows() == 1) {
                $access_token = $this->GenerateToken->generate($key);
                $this->GetAuthLogs->logs('Authorized', $data->username, $key_id);
                return ['access_token' => $access_token,'date_start' => date('F d, Y h:i:s A'), 'status' => 200 ];
            } else {
                http_response_code(401);                
                $this->GetAuthLogs->logs('Unauthorized', $data->username, $key_id);
                return ['Unauthorized' => 'Invalid Client Key. Please try again. Thank you.', 'status' => 401];
            }
        } else {
            $this->GetAuthLogs->logs('Unauthorized', 'Public Access', 0);
            return ['Unauthorized' => 'Invalid Client Key. Please try again. Thank you.', 'status' => 401];
        }
    }
}
