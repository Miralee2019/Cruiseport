<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {


	function __construct() {
        // Construct the parent class
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('Adminmodel');
    	
    	$this->load->database();
		$this->load->library('session');
    }


    //  start checkauth
    private function checkauth() {
        if ($email = $this->session->userdata('email')) {
			return TRUE;
        } else {
            return FALSE;
        }
    }
	// end checkauth

	public function index(){
		if ($this->checkauth()) {
            return redirect('control/home');
        }
		// $this->load->view('store-register');
		redirect('control/login');
	}

	function home(){
		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view('dashboard',$data);	
	}


	// function file(){
	// 	if (!empty($_FILES)) {
	//         $tempFile = $_FILES['file']['tmp_name'];
	//         $fileName = $_FILES['file']['name'];
	//         $targetPath = getcwd() . '/uploads/';
	//         $targetFile = $targetPath . $fileName ;
	//         move_uploaded_file($tempFile, $targetFile);
 //        }
	// }

	function callget(){
		$maintain_id = $this->db->select('store_id')->order_by('store_id','desc')->limit(1)->get('T_Store')->row('store_id');

				// $logo = $this->db->select('store_id')->order_by('store_id','desc')->limit(1)->get('T_Store')->row('store_logo');


				$data['store'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $maintain_id) );

				var_dump($data['store'][0]->store_logo);
	}

	function new_store_register(){

		if (!empty($_FILES)) {
	        $tempFile = $_FILES['file']['tmp_name'];
	        $fileName = $_FILES['file']['name'];
	        $filetype = $_FILES['file']['type'];
	        $targetPath = getcwd() . '/uploads/';
	        $targetFile = $targetPath . $fileName ;
	        
			// if (!( ($_FILES["file"]["type"] == "image/png"))){  
			// 	echo "invalid file";
			// } else { 

				$logo = array(
		        	'store_logo' => $fileName 
		        );
				
				$this->Adminmodel->insert('T_Store', $logo);

				move_uploaded_file($tempFile, $targetFile);

			// }
		}

		if(!empty($_POST)){

			
			$data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->input->post('email')) );

			if(!$data['store']){

				$maintain_id = $this->db->select('store_id')->order_by('store_id','desc')->limit(1)->get('T_Store')->row('store_id');

				// $logo = $this->db->select('store_id')->order_by('store_id','desc')->limit(1)->get('T_Store')->row('store_logo');


				$data['store'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $maintain_id) );

				$logo = $data['store'][0]->store_logo;
					

				$insertArr = array(
					'store_email' => $this->input->post('email'),
					'store_password' => $this->input->post('password'),
					'store_address1' => $this->input->post('address1'),
					'store_address2' => $this->input->post('address2'),
					'state' => $this->input->post('state'),
					'zipcode' => $this->input->post('zipcode'),
					'store_description' => $this->input->post('description'),
					'store_open_hours' => $this->input->post('opening_hours'),
					'store_close_hours' => $this->input->post('closing_hours'),
					'store_latitude' => $this->input->post('latitude'),
					'store_longitude' => $this->input->post('longitude'),
					'category' => $this->input->post('category'),
					'store_mobile_no' => $this->input->post('phone'),
					'store_first_name' => $this->input->post('business_name'),
					'store_logo' => $logo
				);

				$res = $this->Adminmodel->update('T_Store', array('store_id' => $maintain_id), $insertArr);
				
				// $insert_id = $this->Adminmodel->insert('T_Store', $insertArr);


				$url = str_replace(' ', '', base_url('index.php/Welcome/verify_email'));
				
				$body=" <a href='" . $url . "/" . $maintain_id."'>Click</a> here to verify your email address";
				$subject = 'Verify your email';
				$to_email = $this->input->post('email');
	                            
	            $headers = "MIME-Version: 1.0" . "\r\n";
	            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	            $sts =  $this->send_mail($to_email,$subject,$body,$headers);	
				
				$this->session->set_flashdata('login_error', 'Your verification link has been sent to your registered email address.');
				$this->load->view('login');

				// redirect('control/login');	
			
			}else{
				$this->session->set_flashdata('register_error', 'Email already exists');
            	$data['store'] = $this->Adminmodel->select_data('T_Category');
                $this->load->view('store-register' ,$data);
			}	
		}else{
			$data['store'] = $this->Adminmodel->select_data('T_Category');
			$this->load->view('store-register' ,$data);
		}
	}

	function login(){
		$this->load->view('login');
	}


	function check_login() {
        if ($_POST) {
            $email = $this->input->post("username");
            $password = $this->input->post("password");
            
            $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email, 'store_password' => $password));
            
			if ($data['store']) {
            
				$status = $data['store'][0]->is_email_verify;

		            if($status == 1){
			            $newdata = array(
	                    'store_id' => $data['store'][0]->store_id,
	                    'email' => $data['store'][0]->store_email,
	                    'logged_in' => TRUE
	                );

	                // var_dump($newdata);die;
	                $this->session->set_userdata($newdata);

	                $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

	                // var_dump($data['dash']);die;
	                $this->load->view('dashboard', $data);
		            
		            }else{
		            	$this->session->set_flashdata('login_error', 'Please verify your email id before login.');
                		$this->load->view('login');
		            }
			} else {
            
                $this->session->set_flashdata('login_error', 'Invalid Email And Password');
                $this->load->view('login');
            }
	
		}else{
			$this->load->view('login');
		}

	}


	public function send_mail($to, $subject, $body, $headers = '') {
        
        $from_email = "canopus.testing@gmail.com";
        $to_email = $to;


        // for windows or localhost server.

        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
        // $config['smtp_port'] = '465';
        // $config['smtp_user'] = 'canopus.testing@gmail.com'; //change this
        // $config['smtp_pass'] = 'canopus123'; //change this


        // for linux server user this.

         $config['smtp_host'] = 'localhost'; //change this
         $config['smtp_port'] = '25';
         $config['smtp_user'] = 'canopus.testing@gmail.com'; //change this
         $config['smtp_pass'] = 'canopus123'; //change this
        

        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
        //Load email library 
        $this->load->library('email', $config);

        $this->email->from($from_email, 'Test');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($body);

        //Send mail 
        return $this->email->send();
    }


    function editAccountSetting(){
    	// var_dump($_POST);

    	$otp = $this->input->post('otp');
    	$cotp = $this->input->post('cotp');
    	
    	if($otp == $cotp){
    		$updateSetting = array(
	    		'store_email' => $this->input->post('email'),
				'store_password' => $this->input->post('password'),
				'otp_code' => $otp,
				'is_mobile_verify' => 1
			);	

    		$res = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateSetting);

			redirect('control/profile');

		} else{
    		echo "otp doesn't match";
    	}
    	
    }

    function editProfile(){
    	// var_dump($_POST);


    	$updateProfileData = array(
	    	'store_email' => $this->input->post('email'),
			'store_password' => $this->input->post('password'),
			'store_first_name' => $this->input->post('business_name'),
			'category' => $this->input->post('category'),
			'store_open_hours' => $this->input->post('open_hours'),
			'store_close_hours' => $this->input->post('close_hours'),
			'store_address1' => $this->input->post('store_address1'),
			'store_address2' => $this->input->post('store_address2'),
			'state' => $this->input->post('state'),
			'zipcode' => $this->input->post('zipcode'),
			'store_latitude' => $this->input->post('latitude'),
			'store_longitude' => $this->input->post('longitude'),
			'store_description' => $this->input->post('description')
		);

    	$res = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateProfileData);

    	redirect('control/profile');

	}

	function profile(){
		$email = $this->session->userdata('email');
		$data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email) );
		$data['store'] = $this->Adminmodel->select_data('T_Category');
		
		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view('profile', $data);
	}

	function addOffer(){

		if (!empty($_FILES)) {
	        $tempFile = $_FILES['filenew']['tmp_name'];
	        $fileName = $_FILES['filenew']['name'];
	        $targetPath = getcwd() . '/uploads/';
	        $targetFile = $targetPath . $fileName ;
	        move_uploaded_file($tempFile, $targetFile);
        
	        // var_dump($fileName);
		}

        if(!empty($_POST)){
        	// var_dump(date("h:i:s"));die;
            // var_dump($this->session->userdata('store_id')); die;
        	// var_dump($this->input->post('category'));

        	$filename = $_FILES['filenew']['name'];
			// var_dump($filename);

			
			$terms = array(
				'text' => $this->input->post('offer_terms'), 
			);

			$offer_term_condition_id = $this->Adminmodel->insert('T_StoreOfferTermCondition', $terms);

			$originalDate = $this->input->post('offer_expiry_date');
			$newDate = date("Y-m-d", strtotime($originalDate));

			$insertOfferData = array(
				
				'store_id' => $this->session->userdata('store_id'),
				'title' => $this->input->post('offer_title'),
				'description' => $this->input->post('offer_description'),
				'offer_image' => $_FILES['filenew']['name'],
				'expiry_date' =>  $newDate,
				'offer_term_condition_id' =>  $offer_term_condition_id,
				'category_id' => $this->input->post('category'),
				'publish_date' => date("Y-m-d"),
				'publish_time' => date("h:i:s"),
				'offer_visibility' => $this->input->post('offer_visibility'),
				'maximum_point' => $this->input->post('maximum_point')
			);

			// var_dump($insertOfferData);die;

			$store_offer_id = $this->Adminmodel->insert('T_StoreOffer/Ad', $insertOfferData);

			// $facebook = $this->input->post('fpoints');
			// $facebook_points = $this->input->post('facebook_points');

			// $twitter = $this->input->post('tpoints');
			// $twitter_points = $this->input->post('twitter_points');			 

			// $walking = $this->input->post('wpoints');
			// $walking_points = $this->input->post('walking_points');			 			


			$pointsData = array(

				'store_offer_id' => $store_offer_id,
				'facebook_points' => $this->input->post('facebook_points'),
				'twitter_points' => $this->input->post('twitter_points'),
				'walking_points' => $this->input->post('walking_points')												
			);

			$so_social_point_id1 = $this->Adminmodel->insert('T_StoreOfferSocialPoint', $pointsData);


			// $facebookPointData = array(
			// 	'store_offer_id	' => $store_offer_id,
			// 	'social_type_id' =>	$facebook,
			// 	'point' =>  $facebook_points
			// );

			// $so_social_point_id1 = $this->Adminmodel->insert('T_StoreOfferSocialPoint', $facebookPointData);

			// $twitterPointData = array(
			// 	'store_offer_id	' => $store_offer_id,
			// 	'social_type_id' =>	$twitter,
			// 	'point' => $twitter_points 
			// );

			// $so_social_point_id2 = $this->Adminmodel->insert('T_StoreOfferSocialPoint', $twitterPointData);


			// $walkingPointData = array(
			// 	'store_offer_id	' => $store_offer_id,
			// 	'social_type_id' =>	$walking,
			// 	'point' =>  $walking_points
			// );

			// $so_social_point_id3 = $this->Adminmodel->insert('T_StoreOfferSocialPoint', $walkingPointData);

        
		$this->session->set_flashdata('message', '<div class="alert alert-success">
			  <strong>Offer added successfully.</strong>
			</div>');	


		redirect('control/viewOffer');
        

        }
        $data['store'] = $this->Adminmodel->select_data('T_Category');
		
		// var_dump($data['store']);die;
		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view('addOffer', $data);

	}

	function viewOffer(){


		$data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

		

		$data['offerDetails'] = $this->Adminmodel->getFullStoreOfferDetail($data['details'][0]->store_id);
		// var_dump($data['offerDetails']);die;

		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view('viewOffer', $data);
	}

	function addBeacons(){
		
		if(!empty($_POST)){
			
			$insertBeaconData = array(	
				'store_id' => $this->session->userdata('store_id'),
				'name' => $this->input->post('beacon_name'),
				'uuid' => $this->input->post('beacon_uuid'),
				'major_value' => $this->input->post('beacon_major'),
				'minor_value' =>  $this->input->post('beacon_minor')
			);

			$beacon_id = $this->Adminmodel->insert('T_Beacon', $insertBeaconData);

			redirect('control/viewBeacon');
		}

		redirect('control/viewBeacon');	
	}

	function viewBeacon(){
		$data['beacon'] = $this->Adminmodel->select_data('T_Beacon');
// var_dump($data['beacon']);die;
		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view('add_beacons', $data);	
	}

	function logout() {
        $this->session->sess_destroy();
        redirect('control/login');
    }

    function notification(){
    
		if(!empty($_POST)){

			$insertNotification = array(
				'beacon' => $this->input->post('beacon'),
				'notification_message' => $this->input->post('notification_message')
			);

			$res = $this->Adminmodel->update('T_Beacon', array('name' => $this->input->post('beacon')), array('notification_text' => $this->input->post('notification_message') ));
			// var_dump($res);die;
    	}	

    	$data['allBeacona'] = $this->Adminmodel->select_data('T_Beacon');
		// var_dump($data['allBeacona']);die;
    	$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
    	$this->load->view('notification', $data);	
    }


    function deleteBeacon($Id){

    	$del_data = $this->Adminmodel->delete('T_Beacon', array('beacon_id' => $Id ));
	
		redirect('control/viewBeacon');
	}

	function removeOffer($store_offer_id, $offer_terms){

		$terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_terms ));

		$social = $this->Adminmodel->delete('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id ));

    	$del_data = $this->Adminmodel->delete('T_StoreOffer/Ad', array('store_offer_id' => $store_offer_id ));


	
		redirect('control/addOffer');
	}

	function editOffer($store_offer_id){


		if (!empty($_FILES)) {
	        $tempFile = $_FILES['filenew']['tmp_name'];
	        $fileName = $_FILES['filenew']['name'];
	        $targetPath = getcwd() . '/uploads/';
	        $targetFile = $targetPath . $fileName ;
	        move_uploaded_file($tempFile, $targetFile);
        
	    }

        if(!empty($_POST)){

        	$filename = $_FILES['filenew']['name'];
			
			$terms = array(
				'text' => $this->input->post('offer_terms') 
			);

			$data['store'] = $this->Adminmodel->select_data('T_StoreOffer/Ad' ,array('store_offer_id' => $store_offer_id));

			$offer_term_condition_id = $data['store'][0]->offer_term_condition_id;

			
			$res = $this->Adminmodel->update('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_term_condition_id), $terms);



			$originalDate = $this->input->post('offer_expiry_date');
			$newDate = date("Y-m-d", strtotime($originalDate));

			$updateOfferData = array(
				
				'store_id' => $this->session->userdata('store_id'),
				'title' => $this->input->post('offer_title'),
				'description' => $this->input->post('offer_description'),
				'offer_image' => $_FILES['filenew']['name'],
				'expiry_date' =>  $newDate,
				'offer_term_condition_id' =>  $offer_term_condition_id,
				'category_id' => $this->input->post('category'),
				'publish_date' => date("Y-m-d"),
				'publish_time' => date("h:i:s"),
				'offer_visibility' => $this->input->post('offer_visibility'),
				'maximum_point' => $this->input->post('maximum_point')
			);

			$res = $this->Adminmodel->update('T_StoreOffer/Ad', array('store_offer_id' => $store_offer_id), $updateOfferData);

			$pointsData = array(

				'facebook_points' => $this->input->post('facebook_points'),
				'twitter_points' => $this->input->post('twitter_points'),
				'walking_points' => $this->input->post('walking_points')												
			);

			$so_social_point_id1 = $this->Adminmodel->update('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id), $pointsData);
		}



		$data['edit_offer'] = $this->Adminmodel->getFullStoreOfferDetailWithStoreId($store_offer_id);
		// var_dump($data['edit_offer']);die;
		$data['store'] = $this->Adminmodel->select_data('T_Category');
		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view("editOffer", $data);
	}

	function editBeacon($Id){

		if(!empty($_POST)){
			
			$updateBeaconData = array(	
				'beacon_id' => $Id,
				'store_id' => $this->session->userdata('store_id'),
				'name' => $this->input->post('beacon_name'),
				'uuid' => $this->input->post('beacon_uuid'),
				'major_value' => $this->input->post('beacon_major'),
				'minor_value' =>  $this->input->post('beacon_minor')
			);

			// var_dump($updateBeaconData);die;

			$res = $this->Adminmodel->update('T_Beacon', array('beacon_id' => $Id), $updateBeaconData);

			redirect('control/viewBeacon');
		}

		$data['edit_beacon'] = $this->Adminmodel->select_data('T_Beacon', array('beacon_id' => $Id) );
		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view("edit_beacons", $data);
	}	

	function diagrameditor(){
		$this->load->view("draw/main/examples/editors/diagrameditor");
	}

	function setting(){
		$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
		$this->load->view("setting", $data);
	}
}
