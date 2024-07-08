<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/../../vendor/autoload.php';

use Firebase\JWT\JWT;

class GenerateToken extends CI_Model
{
    public function __construct()
    {
        $this->load->model('GetSecretToken');
    }
    public function generate($whoIS)
    {
        $token = $this->GetSecretToken->serect_token();
        $secret_key = $token->rep_keys;

        $nonce = bin2hex(openssl_random_pseudo_bytes(255));

        $payload = array(
            "source" => $whoIS,
            "nonce" => $nonce,
            "exp" => time() + (60 * 60) // Token expiration time (1 hour from now),
        );

        $token = JWT::encode($payload, $secret_key, 'HS512');
        return $token;        
    }
}