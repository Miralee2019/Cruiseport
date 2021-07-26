<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        // Construct the parent class
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('Supermodel');
    	$this->load->database();

    	$this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        date_default_timezone_set('Asia/Calcutta');
    }


	public function index()
	{
		$this->load->view('welcome_message');
	}

	// public function verify_email($insert_id){
    	
 //    	// $this->load->model('Supermodel');
    	
 //    	$res = $this->Supermodel->update('T_Store', array('store_id' => $insert_id),  array('is_email_verify' => 1, '	is_admin_approved' => 1,'status_id' => 1 ));

 //    	// var_dump($res);die;
	//     if($res){
			
	// 			$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	//    			if($data['store'][0]->is_mobile_verify == 1){
	   			
	//    				$this->session->set_flashdata('login_error', 'You are successfully verified, Please login to continue.');
	// 				$this->load->view('login');
	   			
	//    			} else {
	//    				$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	//    				for($i=5;$i>0;$i--){
	// 	            	$otp = rand(1000,9999); 
	// 	            }

	// 	            $otp = $otp;
	// 	            $match2 = $otp;

	// 				$done = $this->Supermodel->update('T_Store', array('store_id' => $insert_id ), array('otp_code' => $match2) );

	//    				$post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=".$data['store'][0]->store_mobile_no."&message=Your+OTP+is ".$match2."&sender=ABCDEF&route=4&country=0");

	//    				$this->session->set_flashdata('otp_error', 'Your email address is successfully verified, Please verify your phone number.');
	//    				redirect('control/verifyOtp?store_id='.$insert_id);

	//    			}
	// 	} else {

	//       		$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	//    			if($data['store'][0]->is_mobile_verify == 1){
	   			
	//    				$this->session->set_flashdata('login_error', 'You are already verified, Please login to continue.');
	// 				$this->load->view('login');
	   			
	//    			} else {

	//    				$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	//    				for($i=5;$i>0;$i--){
	//                 	$otp = rand(1000,9999); 
	//                 }

	//                 $otp = $otp;
	//                 $match2 = $otp;

	// 				$done = $this->Supermodel->update('T_Store', array('store_id' => $insert_id ), array('otp_code' => $match2) );

	//    				$post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=".$data['store'][0]->store_mobile_no."&message=Your+OTP+is ".$match2."&sender=ABCDEF&route=4&country=0");

	//    				$this->session->set_flashdata('otp_error', 'Your email address is successfully verfied, Please verify your phone number.');
	//    				redirect('control/verifyOtp?store_id='.$insert_id);

	//    			}

	//     }
          
 	// }


	public function verify_email($insert_id){
    	
    	// $this->load->model('Supermodel');
    	
    	$res = $this->Supermodel->update('T_Store', array('store_id' => $insert_id),  array('is_email_verify' => 1, 'is_admin_approved' => 1,'status_id' => 1 ));

    	// var_dump($res);die;
	    if($res){
			
				$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	   			if($data['store'][0]->is_mobile_verify == 1){
	   			
	   				$this->session->set_flashdata('login_error', 'You are successfully verified, Please login to continue.');
					$this->load->view('login');
	   			
	   			} else {
	   				$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	   				for($i=5;$i>0;$i--){
		            	$otp_z = rand(1000,9999); 
		            }

		            $otp_a = $otp_z;
		            $match_here = $otp_a;

					$done_update_otp = $this->Supermodel->update('T_Store', array('store_id' => $insert_id ), array('otp_code' => $match_here) );

	   				$post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91".$data['store'][0]->store_mobile_no."&message=Your+OTP+is ".$match_here."&sender=ABCDEF&route=4&country=0");

	   				$this->session->set_flashdata('otp_error', 'Your email address is successfully verified, Please verify your phone number.');
	   				redirect('control/verifyOtp?store_id='.$insert_id);

	   			}
		} else {

	      		$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	   			if($data['store'][0]->is_mobile_verify == 1){
	   			
	   				$this->session->set_flashdata('login_error', 'You are already verified, Please login to continue.');
					$this->load->view('login');
	   			
	   			} else {

	   				$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $insert_id));

	   				for($i=5;$i>0;$i--){
	                	$otp_r = rand(1000,9999); 
	                }

	                $otp_s = $otp_r;
	                $match_s = $otp_s;

					$done_update = $this->Supermodel->update('T_Store', array('store_id' => $insert_id ), array('otp_code' => $match_s) );

	   				$post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91".$data['store'][0]->store_mobile_no."&message=Your+OTP+is ".$match_s."&sender=ABCDEF&route=4&country=0");

	   				$this->session->set_flashdata('otp_error', 'Your email address is successfully verfied, Please verify your phone number.');
	   				redirect('control/verifyOtp?store_id='.$insert_id);

	   			}

	    }
          
    }


    function forgot_password_verify($id){

		$data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $id ));
    	
    	if($data['store'][0]->link_expire == "2"){

	   $time1 = $data['store'][0]->reset_link_expire_time;
	   $time2 = date("Y-m-d H:i:s");	



	   $r = round((strtotime($time2)-strtotime($time1))/3600);



	   if($r < 24){
	
		$data['id'] = $id;
		$this->load->view('reset_password', $data);
           
	   }else{
		echo "Reset password link is expired.";		
	   }

    	} else {
    		echo "Reset password link is expired.";
    	}



    }

    function reset_password($id){
    	 
    	$pass1 = $this->input->post('password1');
		$pass2 = $this->input->post('password2');

		if($pass1 == ''){
			$this->session->set_flashdata('reset_error', 'Password field is required.');
			redirect('welcome/forgot_password_verify/'.$id);
		} elseif ($pass2 == '') {
			$this->session->set_flashdata('reset_error', 'Confirm Password field is required.');
			redirect('welcome/forgot_password_verify/'.$id);
		} elseif($pass1 != $pass2) {	
			$this->session->set_flashdata('reset_error', 'Password doesn\'t match.');
			redirect('welcome/forgot_password_verify/'.$id);
		} else {
			$pass_change = $this->Supermodel->update('T_Store', array('store_id' => $id), array('store_password' => md5($pass1)));

			if($pass_change){

				$expire_change = $this->Supermodel->update('T_Store', array('store_id' => $id), array('link_expire' => "1"));
				$this->session->set_flashdata('login_error', 'Password change successfully.');
                $this->load->view('login');
				
			} else {
				$this->session->set_flashdata('login_error', 'Something went wrong please try again later.');
                $this->load->view('login');
			}
		}
    }


    // async method 

	public function send_mail() {
            
            $from_email = "canopus.testing@gmail.com";
            // $to_email = $_POST['email'];


            // for windows or localhost server.

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'canopus.testing@gmail.com'; //change this
            $config['smtp_pass'] = 'canopus12!'; //change this


            // for linux server user this.

             // $config['smtp_host'] = 'localhost'; //change this
             // $config['smtp_port'] = '25';
             // $config['smtp_user'] = 'canopus.testing@gmail.com'; //change this
             // $config['smtp_pass'] = 'canopus123'; //change this
            

            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
            //Load email library 
            $this->load->library('email', $config);

            $this->email->from($from_email, 'CashRub');
            $this->email->to($_POST['email']);
            $this->email->subject($_POST['subject']);
            $this->email->message($_POST['body']);

            //Send mail 
            return $this->email->send();
        }
		// Email sending with smtp( Created by Subhash Shipu)
		function email_with_zoho()
		{
			$this->load->library("PhpMailerLib");
			$mail = $this->phpmailerlib->load();
			
			try {
				//Server settings
				
				$mail->SMTPDebug = 0;
				$mail->isSMTP();                                      
				$mail->Host = 'smtp.zoho.in';
				$mail->SMTPAuth = true;                                
				$mail->Username = 'info@cashrub.com';    
				$mail->Password = 'SagX7KCvahbQ';     
				$mail->Port = 465;
				$mail->SMTPSecure = 'ssl';
				
				//Recipients
				$mail->setFrom('info@cashrub.com', 'Zoho Testing');
				$mail->addAddress('amolpomane@gmail.com');     // Add a recipient
				
				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'ZOHO Testing ';
				$mail->Body    = 'hello zoho testing';

				if($mail->send())
				{
					echo "mail sent";
				}
				else
				{
					echo "mail not sent";
				}
				
				return true;
			} catch (Exception $e) {
				echo "mail not sent";
				//die('not sent');
			}
			die();
		}



}
