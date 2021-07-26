<?php error_reporting(0); ?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* define("email_send_url", "<?= $path; ?>/admin/index.php/welcome/send_mail", true);*/

class Beaconcontroller extends CI_Controller {
	    function __construct() {
        // Construct the parent class
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('Adminmodel');

        $this->load->model('Beacon_asign_model');
        $this->load->model('Space_point_model', "space_point");
        $this->load->model('Space_model', "space");
        $this->load->model('Beacon_model', "beacon");

        $this->load->helper('string');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        date_default_timezone_set("Asia/Kolkata");

        $this->load->helper('download');

        $expire = $this->checkOfferExpiryDate();
    }
        private function checkauth() {
        if ($email = $this->session->userdata('email')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function index()
    {
    	   if ($this->checkauth()) {
            return redirect('control/home');
        }
         $this->load->view('superadmin/beacon_view');

    }
}