<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/../../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class GetAuthBearer extends CI_Model
{
    public function __construct()
    {
        $this->load->model('GetSecretToken');
    }
    public function Bearer()
    {
       
        $auth_header = $_SERVER['HTTP_AUTHORIZATION'];
        $token = str_replace('Bearer ', '', $auth_header);        
        
        $get_key = $this->GetSecretToken->serect_token();
        $secret_key = $get_key->rep_keys;
        
        try {
            $decoded = JWT::decode($token, new Key($secret_key, 'HS512'));
        
            $input_data = file_get_contents('php://input');
            $data = json_decode($input_data, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Invalid JSON data received');
            }
        
            $user = json_encode($decoded);
            $source = json_decode($user, true);        
        
            return array("source" => $source, "data" => $data);
        
        } catch (Exception $e) {
            http_response_code(401);
            return json_encode(array("response" => "Unauthorized: " . $e->getMessage()));
        }
        
    }
}
