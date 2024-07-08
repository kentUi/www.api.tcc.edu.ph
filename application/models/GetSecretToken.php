<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GetSecretToken extends CI_Model
{
    public function serect_token()
    {
        $query = $this->db->where('rep_source', 'secret_key')->get('sys_repository');
        return $query->row();
    }
}
