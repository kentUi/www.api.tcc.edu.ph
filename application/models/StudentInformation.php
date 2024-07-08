<?php
defined('BASEPATH') or exit('No direct script access allowed');
class StudentInformation extends CI_Model
{
    public function __construct()
    {
        $this->load->model('GetCredentials');
    }

    public function login($data)
    {        
        $rs = $this->db->where('info_sid', $data['username'])->where('info_password', md5($data['password']))->get('t_info_basic');
        $rs->num_rows() != 1 ? $result = 403 :  $result = $this->GetCredentials->login();
        return $result;
    }

    public function details($id)
    {
        $rs = $this->db->where('info_sid', $id)->get('t_info_basic');
        $rs->num_rows() != 1 ? $result = 'Student Not Found!' : $result = $rs->row();

       return $result;
    }
}
