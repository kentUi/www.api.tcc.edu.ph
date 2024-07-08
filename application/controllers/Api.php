<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Api extends CI_Controller
{
    public $db;
    public $GetCredentials, $GetAuthBearer, $GetTextErrors;
    public $StudentInformation;
    public function __construct()
    {
        parent::__construct();
        header("Content-type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 86400");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With");

        require_once APPPATH . '../vendor/autoload.php';

        $this->load->model('GetCredentials');
        $this->load->model('GetAuthBearer');
        $this->load->model('GetTextErrors');

        $this->load->model('StudentInformation');
    }

    public function index()
    {
        $receiver = $this->GetCredentials->login();
        echo json_encode($receiver);
    }

    public function login()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($data) {
            $auth = $this->StudentInformation->login($data);
            echo json_encode($auth);
        } else {
            echo json_encode($this->GetTextErrors->invalid(), JSON_PRETTY_PRINT);
        }
    }
    public function get_info()
    {
        $check = json_decode(file_get_contents('php://input'));
        if ($check) {
            $bearer = $this->GetAuthBearer->Bearer();
            if (isset($bearer['data'])) {
                $data = $bearer['data'];
                $info = $this->StudentInformation->details($data['id']);
                echo json_encode($info);
            } else {
                echo json_encode($this->GetTextErrors->unauthorized(), JSON_PRETTY_PRINT);
            }
        } else {
            echo json_encode($this->GetTextErrors->invalid(), JSON_PRETTY_PRINT);
        }
    }
}
