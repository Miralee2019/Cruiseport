<?php error_reporting(0); ?>
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
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
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

        function otp(){
            $this->load->view('otp');
        }

        function resendOtp(){
            $store_id = $_GET['store_id'];  

            for($i=5;$i>0;$i--){
                $resendotp = rand(1000,9999); 
            }

            $resendotp = $resendotp;
            $matchresend = $resendotp;

            $done = $this->Adminmodel->update('T_Store', array('store_id' => $store_id ), array('otp_code' => $matchresend) );

            $data['otp'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id ));
            
            $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=".$data['otp'][0]->store_mobile_no."&message=Your+verification+code+is ".$matchresend."&sender=ABCDEF&route=4&country=0");

// var_dump($data['otp']);die;
            $this->session->set_flashdata('otp_error', 'Your verification code has been sent to your registered phone number.');
                
            redirect('control/verifyOtp?store_id='.$store_id);



        }

        function verifyOtp(){
            
            $data['store_id'] = $_GET['store_id']; 
            $this->load->view('otp', $data);


            $store_id = $_GET['store_id']; 
            $data['otp'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id ));
                
            if(!empty($_POST)){
                
                $otp = $this->input->post('otp');
                $store_id = $_GET['store_id'];

                $data['otp'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id ));

                if($data['otp'][0]->is_mobile_verify == 0){
                    if($data['otp'][0]->otp_code == $otp){

                        $otpVerify = $this->Adminmodel->update('T_Store', array('store_id' => $store_id), array('is_mobile_verify' => 1 ));

                        $this->session->set_flashdata('login_error', 'Your mobile number is successfully verified.');
                        redirect('control/login');

                    }else{
                        $this->session->set_flashdata('otp_error', 'OTP code is invalid.');
                        redirect('control/verifyOtp?store_id='.$data['otp'][0]->store_id);
                    }
                }else{
                    $this->session->set_flashdata('login_error', 'Mobile number is already verified.');
                    redirect('control/login');                  
                }

                
            }

        }

        function home(){
            
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['dashBoardOfferDetails'] = $this->Adminmodel->getFullStoreOfferDetailWithDashboard($data['details'][0]->store_id, '1');
            $data['totalW'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
            $data['offferActives'] =  $this->Adminmodel->offferActives($this->session->userdata('store_id')) ;
            $data['offerShares'] = $this->Adminmodel->totalSharesByOffer($this->session->userdata('store_id'));
                            
            $data['activity'] = $this->Adminmodel->activity($this->session->userdata('store_id'));
            $data['totalUsers'] = $this->Adminmodel->totalUsers();

            $data['store_id'] =  $this->session->userdata('store_id');

            $this->load->view('dashboard',$data);   
        
        }

        function callget(){
            $maintain_id = $this->db->select('store_id')->order_by('store_id','desc')->limit(1)->get('T_Store')->row('store_id');
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
                

                $logo = array(
                    'store_logo' => $fileName 
                );
                    
                $this->Adminmodel->insert('T_Store', $logo);

                move_uploaded_file($tempFile, $targetFile);

            }

            if(!empty($_POST)){

                

                $config = array(
                    array(
                            'field' => 'business_name',
                            'label' => 'Business name',
                            'rules' => 'required',
                            'errors' => array(
                                    'required' => 'Business name field is required.',
                            ),
                    ),
                    // array(
                    //         'field' => 'state',
                    //         'label' => 'State',
                    //         'rules' => 'required',
                    //         'errors' => array(
                    //                 'required' => 'State field is required.',
                    //         ),
                    // ),
                    array(
                            'field' => 'email',
                            'label' => 'Email',
                            'rules' => 'required|valid_email',
                            'errors' => array(
                                    'required' => 'Email address field is required.',
                            ),
                    ),
                    array(
                            'field' => 'password',
                            'label' => 'Password',
                            'rules' => 'required|min_length[6]|max_length[12]',
                            'errors' => array(
                                    'required' => 'Password field is required.',
                            ),
                    ),
                    array(
                            'field' => 'confirmpassword',
                            'label' => 'Confirm password',
                            'rules' => 'required|matches[password]',
                            'errors' => array(
                                    'required' => 'Confirm password field is required.',
                            ),
                    ),
                    array(
                            'field' => 'phone',
                            'label' => 'Phone',
                            'rules' => 'required|numeric',
                            'errors' => array(
                                    'required' => 'Phone number field is required.',
                            ),
                    ),
                    array(
                            'field' => 'zipcode',
                            'label' => 'Zipcode',
                            'rules' => 'required|numeric|min_length[6]|max_length[6]',
                            'errors' => array(
                                    'required' => 'Zipcode field is required.',
                            ),
                    ),
                    // array(
                    //         'field' => 'catagory',
                    //         'label' => 'Category',
                    //         'rules' => 'required',
                    //         'errors' => array(
                    //                 'required' => 'Category field is required.',
                    //         ),
                    // ),
                    array(
                            'field' => 'description',
                            'label' => 'Description',
                            'rules' => 'required',
                            'errors' => array(
                                    'required' => 'Description field is required.',
                            ),
                    )
                    
                );

                $this->form_validation->set_rules($config);


                if ($this->form_validation->run() == FALSE){

                    $data['store'] = $this->Adminmodel->select_data('T_Category');
                    $this->load->view('store-register' ,$data);
                
                }else{

                    $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->input->post('email')) );
                    $data['phone'] = $this->Adminmodel->select_data('T_Store', array('store_mobile_no' => $this->input->post('phone')) );


                    if($data['store']){

                        $this->session->set_flashdata('register_error', 'Email already exists');
                        $data['store'] = $this->Adminmodel->select_data('T_Category');
                        $this->load->view('store-register' ,$data);
                    
                    } elseif ($data['phone']) {
                    
                        $this->session->set_flashdata('register_error', 'Phone number already exists');
                        $data['store'] = $this->Adminmodel->select_data('T_Category');
                        $this->load->view('store-register' ,$data);
                    
                    } else {

                        $maintain_id = $this->db->select('store_id')->order_by('store_id','desc')->limit(1)->get('T_Store')->row('store_id');


                        $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $maintain_id) );

                        $logo = $data['store'][0]->store_logo;

                        // var_dump($data['store'][0]->store_email);die;                            

                        if(!empty($data['store'][0]->store_email) ){

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
                                'status_id' => "6",
                                'store_point' => "3000",
                                'store_first_name' => $this->input->post('business_name')
                            );


                            // $res = $this->Adminmodel->update('T_Store', array('store_id' => $maintain_id), $insertArr);
                            
                            $insert_id = $this->Adminmodel->insert('T_Store', $insertArr);

                            $email = $this->input->post('email');
                            
                            
                            
                            $body=" <b>'".$email."'</b> has registered recently on cashrub please 
                            approve or reject the store registration";


                            $subject = 'New store register request';
                            $to_email = "designcode546@gmail.com";
                                            
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            $sts =  $this->send_mail($to_email,$subject,$body,$headers);

                            

                            $this->session->set_flashdata('otp_error', 'Your verification code has been sent to your registered phone number.');

                            $this->session->set_flashdata('login_error', 'Your registeration is successful we have sent a mail to 
                                the admin for approval.');
                            

                            redirect('control/login');




                        } else {

                            if(!empty($logo)){

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
                                    'status_id' => "6",
                                    'store_point' => "3000",
                                    'store_first_name' => $this->input->post('business_name'),
                                    'store_logo' => $logo
                                );



                                $res = $this->Adminmodel->update('T_Store', array('store_id' => $maintain_id), $insertArr);

                                
                                $email = $this->input->post('email');
                                
                                $body=" <b>'".$email."'</b> has registered recently on cashrub please 
                                approve or reject the store registration";

                                
                                $subject = 'New store register request';
                                $to_email = "designcode546@gmail.com";
                                                
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                $sts =  $this->send_mail($to_email,$subject,$body,$headers);



                                $this->session->set_flashdata('login_error', 'Your registeration is successful we have sent a mail to 
                                    the admin for approval.');
                                redirect('control/login');

                            } else {

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
                                    'status_id' => "6",
                                    'store_point' => "3000",
                                    'store_first_name' => $this->input->post('business_name')
                                );



                                $res = $this->Adminmodel->insert('T_Store', $insertArr);

                                
                                $email = $this->input->post('email');
                                
                                $body=" <b>'".$email."'</b> has registered recently on cashrub please 
                                approve or reject the store registration";

                                
                                $subject = 'New store register request';
                                $to_email = "designcode546@gmail.com";
                                                
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                $sts =  $this->send_mail($to_email,$subject,$body,$headers);



                                $this->session->set_flashdata('login_error', 'Your registeration is successful we have sent a mail to the admin for approval.');
                                redirect('control/login');

                            }

                            
                        }

                    }
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

                $config = array(
                    array(
                            'field' => 'username',
                            'label' => 'Email address',
                            'rules' => 'required|valid_email',
                            'errors' => array(
                                    'required' => 'Email address field is required.',
                            ),
                    ),
                    array(
                            'field' => 'password',
                            'label' => 'Password',
                            'rules' => 'required',
                            'errors' => array(
                                    'required' => 'Password field is required.',
                            ),
                    )
                   
                );

                $this->form_validation->set_rules($config);


                if ($this->form_validation->run() == FALSE){
                    
                    $this->load->view('login');

                } else {
                    $email = $this->input->post("username");
                    $password = $this->input->post("password");
                    
                    $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email, 'store_password' => $password));
                    
                    if ($data['store']) {
                    
                        $email_status = $data['store'][0]->is_email_verify;
                        $mobile_status = $data['store'][0]->is_mobile_verify;
                        $admin_approve = $data['store'][0]->is_admin_approved;
                        $status_id = $data['store'][0]->status_id;

                        if($status_id == 5){
                            $this->session->set_flashdata('login_error', 'Your registration request is cancelled by the admin');
                            redirect('control/login');
                        } elseif($admin_approve == 0) {
                            $this->session->set_flashdata('login_error', 'Your registration request is waiting for admin approval');
                            redirect('control/login');
                        } elseif($email_status == 0){
                            $this->session->set_flashdata('login_error', 'Please verify your email address before login.');
                            redirect('control/login');
                        } elseif ($mobile_status == 0) {
                            $this->session->set_flashdata('otp_error', 'Please verify your mobile number before login.');
                            redirect('control/verifyOtp?store_id='.$data['store'][0]->store_id);
                        } else {
                                $newdata = array(
                                    'store_id' => $data['store'][0]->store_id,
                                    'email' => $data['store'][0]->store_email,
                                    'logged_in' => TRUE
                                );

                                $this->session->set_userdata($newdata);

                                $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

                                $data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
                                $data['dashBoardOfferDetails'] = $this->Adminmodel->getFullStoreOfferDetailWithDashboard($data['details'][0]->store_id, '1');
                                $data['totalW'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
                                $data['offferActives'] =  $this->Adminmodel->offferActives($this->session->userdata('store_id')) ;
                                $data['offerShares'] = $this->Adminmodel->totalSharesByOffer($this->session->userdata('store_id'));
                                
                                $data['activity'] = $this->Adminmodel->activity($this->session->userdata('store_id'));
                                $data['totalUsers'] = $this->Adminmodel->totalUsers();
                    
                                $data['store_id'] = $this->session->userdata('store_id');

                                $this->load->view('dashboard', $data);      
                        }

                        //conditions
                    } else {
                    
                        $this->session->set_flashdata('login_error', 'Email ID or Password you have entered is incorrect');
                        $this->load->view('login');
                    }
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

            $this->email->from($from_email, 'CashRub');
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


            $config = array(

                    array(
                            'field' => 'otp',
                            'label' => 'OTP',
                            'rules' => 'required|min_length[4]|max_length[4]',
                            'errors' => array(
                                    'required' => 'OTP field is required.',
                            ),
                    ),
                    array(
                            'field' => 'cotp',
                            'label' => 'Confirm OTP',
                            'rules' => 'required|matches[otp]',
                            'errors' => array(
                                    'required' => 'Confirm OTP field is required.'
                            ),
                    ),
                   
                    
            );

            $this->form_validation->set_rules($config);



            if ($this->form_validation->run() == FALSE){


                $email = $this->session->userdata('email');
                $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email) );
                $data['store'] = $this->Adminmodel->select_data('T_Category');
                $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
                $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')));
                $this->load->view('setting', $data);

            }else{

                $updateSetting = array(
                    'store_email' => $this->input->post('email'),
                    'store_password' => $this->input->post('password'),
                    'otp_code' => $otp,
                    'is_mobile_verify' => 1
                );  

                // var_dump($updateSetting);die;

                $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateSetting);

                $this->session->set_flashdata('setting', '<div class="alert alert-success">
                  <strong>Setting updated successfully.</strong>
                </div>');

                redirect('control/setting');
            }

            
        }
       

        function editProfile(){
            // var_dump($_POST);

            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $fileName ;
                $file_size = $_FILES['file']['size'];
                

                $store_logo = array(
                    'store_logo' => $fileName
                );


                $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->session->userdata('email')), $store_logo);

                move_uploaded_file($tempFile, $targetFile);
                // header("Refresh:0");
                // redirect('control/editProfile');
                // echo "<meta http-equiv=\"refresh\" content=\"0;URL=upload.php\">";

            }

            if(!empty($_POST)){

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

                // var_dump($updateProfileData);die;

            $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateProfileData);

             $this->session->set_flashdata('message', '<div class="alert alert-success">
                  <strong>Profile updated successfully.</strong>
                </div>');

            redirect('control/profile');
                    
            }

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
		        
	        	$file_size = $_FILES['filenew']['size'];
	                

	            if($file_size < 2000000 ){
	        	   move_uploaded_file($tempFile, $targetFile);	
	        	}

			}

	        if(!empty($_POST)){
	        	$filename = $_FILES['filenew']['name'];
				
				$terms = array(
					'text' => $this->input->post('offer_terms'), 
				);

				$offer_term_condition_id = $this->Adminmodel->insert('T_StoreOfferTermCondition', $terms);

				$originalDate = $this->input->post('offer_expiry_date');
				$newDate = date("Y-m-d", strtotime($originalDate));

				if($newDate == '1970-01-01'){
					$datemodify = date("Y-m-d"); 	
				}else{
					$datemodify = $newDate;
				}
				
				$data['title'] = $this->Adminmodel->select_data('T_StoreOffer', array('title' => $this->input->post('offer_title')));
				
				if($data['title']){

					$this->session->set_flashdata('add_message', '<div class="alert alert-danger">
					  <strong>Offer with this name already exists.</strong>
					</div>');	
					
					redirect('control/addOffer');

				}else{
					$insertOfferData = array(
						
						'store_id' => $this->session->userdata('store_id'),
						'title' => $this->input->post('offer_title'),
						'description' => $this->input->post('offer_description'),
						'offer_image' => $_FILES['filenew']['name'] ? $_FILES['filenew']['name'] : $this->input->post('myfile'),
		                'expiry_date' =>  $datemodify,
						'offer_term_condition_id' =>  $offer_term_condition_id,
						'category_id' => $this->input->post('category'),
						'publish_date' => date("Y-m-d"),
						'publish_time' => date("h:i:s"),
						'offer_visibility' => $this->input->post('offer_visibility'),
						'maximum_point' => $this->input->post('maximum_point')
					);
					
					$store_offer_id = $this->Adminmodel->insert('T_StoreOffer', $insertOfferData);
					$pointsData = array(

						'store_offer_id' => $store_offer_id,
						'store_id' => $this->session->userdata('store_id'),
						'facebook_points' => $this->input->post('facebook_points'),
						'twitter_points' => $this->input->post('twitter_points'),
						'walking_points' => $this->input->post('walking_points')												
					);

					$so_social_point_id1 = $this->Adminmodel->insert('T_StoreOfferSocialPoint', $pointsData);

				 	$this->session->set_flashdata('message', '<div class="alert alert-success">
					  <strong>Offer added successfully.</strong>
					</div>');	
					
					redirect('control/viewOffer');
				}

				
	        

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

            if(empty($data['offerDetails'])){

                $this->session->set_flashdata('nooffer', '<div style="text-align:center;" class="alert alert-danger">
                  <strong>There are no offers</strong>
                </div>');

                // redirect('control/viewOffer');
            }

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $this->load->view('viewOffer', $data);
        }

        function addBeacons(){
            
            if(!empty($_POST)){
                
                $beacon_data = $this->Adminmodel->select_data('T_Beacon', array('store_id' => $this->session->userdata('store_id'), 
                    'name' => $this->input->post('beacon_name') ));
            
                if($beacon_data){

                    $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                      <strong>Beacon id already exists. </strong>
                    </div>');

                    redirect('control/viewBeacon');


                } else {
                    $insertBeaconData = array(  
                        'store_id' => $this->session->userdata('store_id'),
                        'name' => $this->input->post('beacon_name')
                        // 'uuid' => $this->input->post('beacon_uuid'),
                        // 'major_value' => $this->input->post('beacon_major'),
                        // 'minor_value' =>  $this->input->post('beacon_minor')
                    );

                    $beacon_id = $this->Adminmodel->insert('T_Beacon', $insertBeaconData);


                    $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-success">
                      <strong>Beacon added successfully. </strong>
                    </div>');

                    redirect('control/viewBeacon');
                }

            }

            redirect('control/viewBeacon'); 
        }

        function viewBeacon(){
            $data['beacon'] = $this->Adminmodel->select_data('T_Beacon', array('store_id' => $this->session->userdata('store_id')));
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

                $this->session->set_flashdata('notification', '<div style="text-align:left;" class="alert alert-success">
                      <strong>Notification send successfully. </strong>
                </div>');

                redirect('control/notification');
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

            $del_data = $this->Adminmodel->delete('T_StoreOffer', array('store_offer_id' => $store_offer_id ));


        
            redirect('control/addOffer');
        }


        function removeOfferNew($store_offer_id){

               // $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_terms ));

            $social = $this->Adminmodel->delete('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id ));

            $data['store'] = $this->Adminmodel->select_data('T_StoreOffer' ,array('store_offer_id' => $store_offer_id));

            $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $data['store'][0]->offer_term_condition_id ));


            $del_data = $this->Adminmodel->delete('T_StoreOffer', array('store_offer_id' => $store_offer_id ));




        
            redirect('control/addOffer');
        }

       function removePayment($payment_id){

            $payment = $this->Adminmodel->delete('T_Payment', array('payment_id' => $payment_id ));

            $this->session->set_flashdata('setting', '<div class="alert alert-success">
                  <strong>Payment detail deleted successfully.</strong>
            </div>');

            // redirect('control/setting');
        }

       function editOffer($store_offer_id){


			if (!empty($_FILES)) {
		        $tempFile = $_FILES['filenew']['tmp_name'];
		        $fileName = $_FILES['filenew']['name'];
		        $targetPath = getcwd() . '/uploads/';
		        $targetFile = $targetPath . $fileName ;
	                  
	                if(($_FILES['filenew']['size']) < 2000000 ){
		        	move_uploaded_file($tempFile, $targetFile);	
		        }
	   
	        
		    }

	        if(!empty($_POST)){

// var_dump($this->input->post('category'));die;

	        	$filename = $_FILES['filenew']['name'];
				
				$terms = array(
					'text' => $this->input->post('offer_terms') 
				);

				$data['store'] = $this->Adminmodel->select_data('T_StoreOffer' ,array('store_offer_id' => $store_offer_id));

				$offer_term_condition_id = $data['store'][0]->offer_term_condition_id;

				
				$res = $this->Adminmodel->update('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_term_condition_id), $terms);



				$originalDate = $this->input->post('offer_expiry_date');
				$newDate = date("Y-m-d", strtotime($originalDate));

				// $datemodify =  if($newDate == '1970-01-01') { echo date("Y-m-d"); } else { echo $newDate; };

				if($newDate == '1970-01-01'){
					$datemodify = date("Y-m-d"); 	
				}else{
					$datemodify = $newDate;
				}

				$updateOfferData = array(
					
					'store_id' => $this->session->userdata('store_id'),
					'title' => $this->input->post('offer_title'),
					'description' => $this->input->post('offer_description'),
					'offer_image' => $_FILES['filenew']['name'] ? $_FILES['filenew']['name'] : $this->input->post('myfile'),
					'expiry_date' =>  $datemodify,
					'offer_term_condition_id' =>  $offer_term_condition_id,
					'category_id' => $this->input->post('category'),
					'publish_date' => date("Y-m-d"),
					'publish_time' => date("h:i:s"),
					'offer_visibility' => $this->input->post('offer_visibility'),
					'maximum_point' => $this->input->post('maximum_point')
				);

				$res = $this->Adminmodel->update('T_StoreOffer', array('store_offer_id' => $store_offer_id), $updateOfferData);

				$pointsData = array(

					'facebook_points' => $this->input->post('facebook_points'),
					'twitter_points' => $this->input->post('twitter_points'),
					'walking_points' => $this->input->post('walking_points')												
				);

				$so_social_point_id1 = $this->Adminmodel->update('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id), $pointsData);

	                    	$this->session->set_flashdata('message', '<div class="alert alert-success">
				  <strong>Offer updated successfully.</strong>
				</div>');	



				redirect('control/viewOffer'); 

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
                    'name' => $this->input->post('beacon_name')
                    // 'uuid' => $this->input->post('beacon_uuid'),
                    // 'major_value' => $this->input->post('beacon_major'),
                    // 'minor_value' =>  $this->input->post('beacon_minor')
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
            // $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email) );
            $data['store'] = $this->Adminmodel->select_data('T_Category');
            
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            

            // $points = $this->db->get('T_Payment');
            // $points = $this->Adminmodel->countPoints();

            // // var_dump($points);die;


           $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')), array('payment_id' => 'desc' ));
            

            $this->load->view("setting", $data);
        }


        function addPoints(){
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            
            $this->load->view('add_points', $data); 
        }


        function payment(){
            
            

            $paymentData = array(
                'store_id' => $this->session->userdata('store_id'),
                'payment_name' => $this->input->post('payment'),
                'payment_date' => $this->input->post('payment_date'),
                'points' => $this->input->post('points'),
                'credits' => $this->input->post('credits') 

            );
            // var_dump($paymentData);

            $this->Adminmodel->insert('T_Payment', $paymentData);

            $this->session->set_flashdata('message', '<div class="alert alert-success">
                  <strong>Points added in your account.</strong>
                </div>');   

            redirect('control/addPoints');
        }


        function changeStatus(){
            $value = $this->uri->segment(3);
            $store_offer_id = $this->uri->segment(4);

            
            $changeStatus = array(
                'offer_status' => $value
            );

            $res = $this->Adminmodel->update('T_StoreOffer', array('store_offer_id' => $store_offer_id), $changeStatus);
            
            redirect('control/viewOffer');
        }
 
        function shareDetails($offer_id){
        
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['shareDetails'] = $this->Adminmodel->select_data('T_SocialSharePoint', array('store_offer_id' => $offer_id ));

            $data['total_shares'] = $this->Adminmodel->totalSharesByOffer($this->session->userdata('store_id'));
            $data['today_shares'] = $this->Adminmodel->todayShares($this->session->userdata('store_id'));


            $this->load->view('offerShareDeatails', $data);     
        }

        function walkinReport(){
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
                
            $data['total_Walkins'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
            $data['today_Walkins'] = $this->Adminmodel->todayWalkins($this->session->userdata('store_id'));
            
            $data['credit_remain'] = $this->Adminmodel->creditRemaining($this->session->userdata('store_id'));

            $data['userWalkinData'] = $this->Adminmodel->userWalkinDetails();

            $this->load->view('walkin_report',$data);
        }

        function userReport(){
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['total_Walkins'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
            $data['total_time_spent'] = $this->Adminmodel->totalTimeSpent();

            $data['userWalkinData'] = $this->Adminmodel->userWalkinDetails();


            $this->load->view('user_report',$data);
        }

        function terms(){
	    	
			$this->load->view('terms');
	}
    }
