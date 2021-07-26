<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {

function __construct() {
        // Construct the parent class
        parent::__construct();
        // $this->load->helper('url');
        }
public function email_verfication()
{
$token=$this->uri->segment(3);
if(!empty($token))
{
//print_r("in if");die;
	$query=$this->db->where('email_token',$token)->get('T_User');
	$result=$query->row();
	
	if(!empty($result))
	{
	$id=$result->user_id;
	
	$data=['email_verified'=>1,
	      "email_token"=>''
	      ];
	
	$update=$this->db->where('user_id',$id)->update('T_User',$data);
	
	$message['to_display']="Email Account Verified successfully!";
	
	}else{
//print_r("in else");
	$message['to_display']="Invalid Link!";
}
}else{
//print_r("in else");
	$message['to_display']="Invalid Link!";
}
	$this->load->view('verification_view',$message);
}
}

