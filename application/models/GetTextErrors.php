<?php
defined('BASEPATH') or exit('No direct script access allowed');
class GetTextErrors extends CI_Model
{
    public function invalid()
    {
       return array("response" => "Invalid Paramenters. Please try again. Thank you.");
    }
    public function unauthorized()
    {
       return array("Unauthorized" => "Authorization header is missing");
    }
}
