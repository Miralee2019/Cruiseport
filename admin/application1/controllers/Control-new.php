<?php error_reporting(0); ?>
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require_once APPPATH . 'third_party/smtp/Send_Mail.php';

    class Control extends CI_Controller {


        function __construct() {
            // Construct the parent class
            parent::__construct();
            // $this->load->helper('url');
            $this->load->model('Adminmodel');
           
            $this->load->model('Beacon_asign_model');
            $this->load->model('Space_point_model', "space_point");
            $this->load->model('Space_model', "space");
            $this->load->model('Beacon_model', "beacon");

            $this->load->library('email');
            $this->load->database();
            $this->load->library('session');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            date_default_timezone_set('Asia/Calcutta'); 

            $expire =  $this->checkOfferExpiryDate();

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

    function addWalkingPoint(){
            // var_dump($_POST);

            // if ($this->checkauth()) {
            //     return redirect('control/home');
            // }

            $walk = array(
                'walking_point' => $this->input->post('walk'),
                                 
            );

            $walk = $this->Adminmodel->update('T_Store', array('store_email' => $this->session->userdata('email')), $walk);

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
            // var_dump($data['walk_p']);

            // redirect("control/home");

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['dashBoardOfferDetails'] = $this->Adminmodel->getFullStoreOfferDetailWithDashboard($data['details'][0]->store_id, '1');
            $data['totalW'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
            $data['offferActives'] =  $this->Adminmodel->offferActives($this->session->userdata('store_id')) ;
            $data['offerShares'] = $this->Adminmodel->totalSharesByOffer($this->session->userdata('store_id'));
                            
            $data['activity'] = $this->Adminmodel->activity($this->session->userdata('store_id'));
            $data['totalUsers'] = $this->Adminmodel->totalUsers();

            $data['store_id'] =  $this->session->userdata('store_id');

            // var_dump($data['walk_p']);die;
            // $this->load->view('dashboard',$data);

            $this->session->set_flashdata('setting', '<div class="alert alert-success">
                  <strong>Walkin points updated successfully.</strong>
            </div>');

            redirect("control/setting");


        }



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
            
            $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91".$data['otp'][0]->store_mobile_no."&message=Your+OTP+is ".$matchresend."&sender=ABCDEF&route=4&country=0");

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

            if(!$this->checkauth()){
                return redirect('control/login');
            }
            
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['dashBoardOfferDetails'] = $this->Adminmodel->getFullStoreOfferDetailWithDashboard($data['details'][0]->store_id, '1');
            $data['totalW'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
            
            $data['offferActives'] =  $this->Adminmodel->offferActives($this->session->userdata('store_id')) ;
            $data['offerShares'] = $this->Adminmodel->totalSharesByOffer($this->session->userdata('store_id'));
                            
            $data['activity'] = $this->Adminmodel->activity($this->session->userdata('store_id'));
            
            $data['totalUsers'] = $this->Adminmodel->totalUsers();

            $data['store_id'] =  $this->session->userdata('store_id');

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));

            $data['store_activity'] = $this->Adminmodel->select_data('T_ActivityLog',array('store_id' => $this->session->userdata('store_id')) );

            // var_dump($data['store_activity']);die;


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
                

                $logo = array('store_logo' => $fileName);
                    
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

                    $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                    $this->load->view('store-register' ,$data);
                
                }else{

                    $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->input->post('email')) );
                    $data['phone'] = $this->Adminmodel->select_data('T_Store', array('store_mobile_no' => $this->input->post('phone')) );


                    $email_user = $this->Adminmodel->select_data('T_User', array('email' => $this->input->post('email')) );


                    if($data['store']){

                        $this->session->set_flashdata('register_error', 'Email already exists');
                        $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                        $this->load->view('store-register' ,$data);
                    
                    } elseif ($data['phone']) {
                    
                        $this->session->set_flashdata('register_error', 'Phone number already exists');
                        $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                        $this->load->view('store-register' ,$data);
                    
                    } elseif ($email_user) {

                        $this->session->set_flashdata('register_error', 'Email already exists');
                        $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                        $this->load->view('store-register' ,$data);

                    } else {

                        $maintain_id = $this->db->select('store_id')->order_by('store_id','desc')->limit(1)->get('T_Store')->row('store_id');


                        $data['store_old'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $maintain_id) );

                        $logo = $data['store_old'][0]->store_logo;

                        // var_dump($data['store'][0]->store_email);die;                            

                        if(!empty($data['store_old'][0]->store_email) ){

                            $insertArr = array(
                                'store_email' => $this->input->post('email'),
                                'store_password' => $this->input->post('password'),
                                'store_address1' => $this->input->post('address1'),
                                // 'store_address2' => $this->input->post('address2'),
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
                                'walking_point' => "10",
                                'reg_date' => date("Y-m-d"),
                                'reg_time' => date("H:i:s"),
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

                            $this->session->set_flashdata('login_error', 'Your registration is successful, we will send mail to store admin once it has been approved by the Superadmin.');
                            

                            redirect('control/login');




                        } else {

                            if(!empty($logo)){

                                $insertArr = array(
                                    'store_email' => $this->input->post('email'),
                                    'store_password' => $this->input->post('password'),
                                    'store_address1' => $this->input->post('address1'),
                                    // 'store_address2' => $this->input->post('address2'),
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
                                    'walking_point' => "10",
                                    'reg_date' => date("Y-m-d"),
                                    'reg_time' => date("H:i:s"),
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



                                $this->session->set_flashdata('login_error', 'Your registration is successful, we will send mail to store admin once it has been approved by the Superadmin.');
                                redirect('control/login');

                            } else {

                                $insertArr = array(
                                    'store_email' => $this->input->post('email'),
                                    'store_password' => $this->input->post('password'),
                                    'store_address1' => $this->input->post('address1'),
                                    // 'store_address2' => $this->input->post('address2'),
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
                                    'walking_point' => "10",
                                    'reg_date' => date("Y-m-d"),
                                    'reg_time' => date("H:i:s"),
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
                $data['store'] = $this->Adminmodel->select_data('T_Categorys');
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

                        if($status_id == 7){
                            $this->session->set_flashdata('login_error', 'Your account is suspended by superadmin');
                            redirect('control/login');
                        }

                        if($status_id == 8){
                            $this->session->set_flashdata('login_error', 'Your registration request is reject by the superadmin');
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

                                $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

                                $data['store_activity'] = $this->Adminmodel->select_data('T_ActivityLog', array('store_id' => $this->session->userdata('store_id')  ));

                                $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));
                                
// var_dump($data['totalUsers']);
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
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($body);

            //Send mail 
            return $this->email->send();
        }

        function editAccountSetting(){
            // var_dump($_POST);

            if(!$this->checkauth()){
                return redirect('control/login');
            }

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
                $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
                $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')));

                $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

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
       

        // function editProfile(){

        //     if(!$this->checkauth()){
        //         return redirect('control/login');
        //     }

        //     // var_dump($_POST);

        //     if (!empty($_FILES)) {
        //         $tempFile = $_FILES['file']['tmp_name'];
        //         $fileName = $_FILES['file']['name'];
        //         $targetPath = getcwd() . '/uploads/';
        //         $targetFile = $targetPath . $fileName ;
        //         $file_size = $_FILES['file']['size'];
                

        //         $store_logo = array(
        //             'store_logo' => $fileName
        //         );


        //         $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->session->userdata('email')), $store_logo);

        //         move_uploaded_file($tempFile, $targetFile);
        //         // header("Refresh:0");
        //         // redirect('control/editProfile');
        //         // echo "<meta http-equiv=\"refresh\" content=\"0;URL=upload.php\">";

        //     }

        //     if(!empty($_POST)){

        //         $updateProfileData = array(
        //         'store_email' => $this->input->post('email'),
        //         'store_password' => $this->input->post('password'),
        //         'store_first_name' => $this->input->post('business_name'),
        //         'category' => $this->input->post('category'),
        //         'store_mobile_no' => $this->input->post('mobile_number'),
        //         'store_open_hours' => $this->input->post('open_hours'),
        //         'store_close_hours' => $this->input->post('close_hours'),
        //         'store_address1' => $this->input->post('store_address1'),
        //         'store_address2' => $this->input->post('store_address2'),
        //         'state' => $this->input->post('state'),
        //         'zipcode' => $this->input->post('zipcode'),
        //         'store_latitude' => $this->input->post('latitude'),
        //         'store_longitude' => $this->input->post('longitude'),
        //         'store_description' => $this->input->post('description')
        //     );

        //         // var_dump($updateProfileData);die;

        //     $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateProfileData);

        //      $this->session->set_flashdata('message', '<div class="alert alert-success">
        //           <strong>Profile updated successfully.</strong>
        //         </div>');

        //     redirect('control/profile');
                    
        //     }

        // }


        function editProfile(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            // var_dump($_POST);

            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $fileName ;
                $file_size = $_FILES['file']['size'];
                

                $store_logo = array(
                    'temp_logo' => $fileName
                );


                $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->session->userdata('email')), $store_logo);

                move_uploaded_file($tempFile, $targetFile);
                // header("Refresh:0");
                // redirect('control/editProfile');
                // echo "<meta http-equiv=\"refresh\" content=\"0;URL=upload.php\">";

            }

            if(!empty($_POST)){

                $temp_logo = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

                $updateProfileData = array(
                    'store_email' => $this->input->post('email'),
                    'store_password' => $this->input->post('password'),
                    'store_first_name' => $this->input->post('business_name'),
                    'category' => $this->input->post('category'),
                    'store_mobile_no' => $this->input->post('mobile_number'),
                    'store_open_hours' => $this->input->post('open_hours'),
                    'store_close_hours' => $this->input->post('close_hours'),
                    'store_address1' => $this->input->post('store_address1'),
                    'store_address2' => $this->input->post('store_address2'),
                    'store_logo' => $temp_logo[0]->temp_logo ? : $this->input->post('image_file'),
                    'state' => $this->input->post('state'),
                    'zipcode' => $this->input->post('zipcode'),
                    'store_latitude' => $this->input->post('latitude'),
                    'store_longitude' => $this->input->post('longitude'),
                    'store_description' => $this->input->post('description')
                );

                // check if otp verification process

                if($this->input->post('mobile_number_otp')){
                    
                    $data['alter_mob'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $this->session->userdata('store_id')));

                    if($data['alter_mob'][0]->otp_code == $this->input->post('mobile_number_otp')){
                    
                        $data['alter_mob'][0]->store_alternet_contact_no;


                        $updateProfileWithMobileData = array(
                            'store_mobile_no' => $data['alter_mob'][0]->store_alternet_contact_no
                        );

                        // var_dump($updateProfileWithMobileData);die;

                        $mobile_update = $this->Adminmodel->update('T_Store', array('store_email' => $this->session->userdata('email')), $updateProfileWithMobileData);

                        // var_dump($mobile_update);die;

                        $body = "You have recently updated your mobile number";
                        $subject = 'Mobile number update';
                        $to_email = $data['alter_mob'][0]->store_email;
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $sts =  $this->send_mail($to_email,$subject,$body,$headers);                         


                        $this->session->set_flashdata('message', '<div class="alert alert-success">
                          <strong>Mobile number updated successfully.</strong>
                        </div>');

                        redirect('control/profile');


                    } else {

                        $this->session->set_flashdata('phone_otp', '<div class="alert alert-danger">
                          <strong>You have entered invalid OTP</strong>
                        </div>');
                        redirect('control/phone_otp');


                    } 

                // check if otp is not comming

                } else {
                    

                    $data['store_mob'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $this->session->userdata('store_id')));

                    // check if mobile number in request is same as older one

                    if($data['store_mob'][0]->store_mobile_no  ==  $this->input->post('mobile_number') ){

                        if($data['store_mob'][0]->store_password == $this->input->post('password')){

                            $update_data = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateProfileData);

                            // 

                            $email_s = $this->input->post('email');
                            $body="Profile updated";
                            $subject = 'Your Profile is update';
                            $to_email = $email_s;
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $sts =  $this->send_mail($to_email,$subject,$body,$headers);

                            // 

                            $this->session->set_flashdata('message', '<div class="alert alert-success">
                                  <strong>Profile updated successfully.</strong>
                                </div>');

                            redirect('control/profile');    

                        } else {

                            $update_data = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateProfileData);

                            // 

                            $email_s = $this->input->post('email');
                            $body="Profile updated";
                            $subject = 'Your Profile is update';
                            $to_email = $email_s;
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $sts =  $this->send_mail($to_email,$subject,$body,$headers);

                            // 

                            $this->session->set_flashdata('login_error2', 'Profile updated successfully,Please login');

                            $this->session->sess_destroy();
                            $this->load->view("login");



                            // redirect('control/logout');    


                        }


                    // if not same number in request 

                    }else{

                        $data['number_check'] = $this->Adminmodel->select_data('T_Store', array('store_mobile_no' => $this->input->post('mobile_number') ));

                        // check if number is used by other store

                        if($data['number_check']){

                            $this->session->set_flashdata('message', '<div class="alert alert-danger">
                              <strong>Mobile number is already registered with the other store please use different number.</strong>
                            </div>');

                            redirect('control/profile');

                        // do if enter number is not same as other

                        } else {

                            // sending otp

                            for($i=5;$i>0;$i--){
                                $resendotp = rand(1000,9999); 
                            }

                            $resendotp = $resendotp;
                            $matchresend = $resendotp;

                            $done = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), array('otp_code' => $matchresend) );

                            $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91".$this->input->post('mobile_number')."&message=Your+OTP+is ".$matchresend."&sender=ABCDEF&route=4&country=0");

                            // end sending otp


                            // update mobile number

                            $done = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), array('store_alternet_contact_no' => $this->input->post('mobile_number')) );
                            $email = $this->session->userdata('email');
                            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email) );
                            $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));


                            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
                            
                            $this->load->view('phone_otp', $data);

                        }

                    }
                }

            }

        }

        function phone_otp(){
            $email = $this->session->userdata('email');
                        $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email) );
                        $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                        
                        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

                        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
                        
                        $this->load->view('phone_otp', $data);   
        }

        function profile(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email) );
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');
            
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $this->load->view('profile', $data);
        }

        function addOffer(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $data['store_points_chk'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            // var_dump($data['store_points_chk'][0]->store_point);die;

            if($data['store_points_chk'][0]->store_point != 0 ){

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
                                'publish_time' => date("H:i:s"),
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
                              <strong>Your offer request is send to the superadmin for approval.</strong>
                            </div>');   
                            
                            redirect('control/viewOffer');
                        }

                    }

            }else{

                $this->session->set_flashdata('message', '<div class="alert alert-success">
                <strong>Not able to add offer, you have 0 balance.</strong>
                </div>');   
                            
                redirect('control/viewOffer');

            }


            $data['store'] = $this->Adminmodel->select_data('T_Categorys');
            
            // var_dump($data['store']);die;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
            $this->load->view('addOffer', $data);

        }   

        function viewOffer(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }


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
            
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
            
            $this->load->view('viewOffer', $data);
        }


// New changes 29 june in addBeacons API for adding the CashRub beacons.

        function addBeacons(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }
            
            if(!empty($_POST)){

                // echo $this->input->post('beacon_key').'<br>';
                //  echo $this->session->userdata('store_id');
                //  exit;
                
                $beacon_key_chk = $this->Adminmodel->select_data('T_Beacon', array('beacon_key' => $this->input->post('beacon_key'),  'assigned_to_store' => $this->session->userdata('store_id') ));
                
                if($beacon_key_chk){
                
                    
                    $beacon_status_chk = $this->Adminmodel->select_data('T_Beacon', array('beacon_key' => $this->input->post('beacon_key') ,'beacon_status' => "0"  ));


                    if($beacon_status_chk){

                        $if_entrance =  $this->input->post('is_entrance');

                        if($if_entrance){

                            $chk_if_store_already_have_one_entrance_beacon = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id') ,'is_entrance_beacon' => "1" ));

                            if($chk_if_store_already_have_one_entrance_beacon){

                                $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                                  <strong>You have already set one entrance beacon please set the beacon in other area of your store</strong>
                                </div>');

                                redirect('control/viewBeacon');

                            } else {

                                $insertBeaconData = array(  
                                    'store_id' => $this->session->userdata('store_id'),
                                    'is_entrance_beacon' => $if_entrance ? : '0',
                                    'beacon_key' => $this->input->post('beacon_key'),
                                    'beacon_name' => $beacon_status_chk[0]->name,
                                    'beacon_place' => $this->input->post('beacon_place'),
                                    'beacon_uuid' => $beacon_status_chk[0]->uuid,
                                    'beacon_major' => $beacon_status_chk[0]->major_value,
                                    'beacon_minor' => $beacon_status_chk[0]->minor_value,
                                    'beacon_type' => "cashrub_beacon"
                                    
                                      
                                );

                                $beacon_id = $this->Adminmodel->insert('T_Beacons', $insertBeaconData);


                                $res = $this->Adminmodel->update('T_Beacon', array('beacon_key' => $this->input->post('beacon_key')), array('beacon_status' => "1" ));

                                $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-success">
                                  <strong>Beacon assigned to the store</strong>
                                </div>');
                                redirect('control/viewBeacon');

                            }

                        } else {

                            $insertBeaconData = array(  
                                'store_id' => $this->session->userdata('store_id'),
                                'is_entrance_beacon' => $if_entrance ? : '0',
                                'beacon_key' => $this->input->post('beacon_key'),
                                'beacon_name' => $beacon_status_chk[0]->name,
                                'beacon_place' => $this->input->post('beacon_place'),
                                'beacon_uuid' => $beacon_status_chk[0]->uuid,
                                'beacon_major' => $beacon_status_chk[0]->major_value,
                                'beacon_minor' => $beacon_status_chk[0]->minor_value,
                                'beacon_type' => "cashrub_beacon"

                                  
                            );

                            $beacon_id = $this->Adminmodel->insert('T_Beacons', $insertBeaconData);


                            $res = $this->Adminmodel->update('T_Beacon', array('beacon_key' => $this->input->post('beacon_key')), array('beacon_status' => "1" ));

                            $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-success">
                              <strong>Beacon assigned to the store</strong>
                            </div>');

                            redirect('control/viewBeacon');

                        }

                    } else {
                        
                        $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                          <strong>Beacon is already assigned</strong>
                        </div>');

                        redirect('control/viewBeacon');
                    }


                }
                else{

                    $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                          <strong>Beacon id is wrong</strong>
                        </div>');

                    redirect('control/viewBeacon');

                }

            }

            redirect('control/viewBeacon'); 
        }

        function viewBeacon(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $data['beacon'] = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id')));
            //echo $this->session->userdata('store_id');
            //var_dump($data['beacon']);die;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $this->load->view('add_beacons', $data);    
        }

        function logout() {
            $this->session->sess_destroy();
            redirect('control/login');
        }

       
        function notification(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }
        
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

            $data['allBeacona'] = $this->Adminmodel->select_data('T_Beacon',array('store_id'=> $this->session->userdata('store_id')) );
            // var_dump($data['allBeacona']);die;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $this->load->view('notification', $data);   
        }

        function deleteBeacon($Id){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $del_data = $this->Adminmodel->delete('T_Beacons', array('beacon_key' => $Id ));
            $del_data2 = $this->Adminmodel->delete('T_AssignBeacon', array('beacon_name' => $Id ));
                
        
            redirect('control/viewBeacon');
        }

        function removeOffer($store_offer_id, $offer_terms){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_terms ));

            $social = $this->Adminmodel->delete('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id ));

            $del_data = $this->Adminmodel->delete('T_StoreOffer', array('store_offer_id' => $store_offer_id ));


        
            redirect('control/addOffer');
        }


        function removeOfferNew($store_offer_id){
            
            if(!$this->checkauth()){
                return redirect('control/login');
            }

            // $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_terms ));


            $status_change_to_remove = $this->Adminmodel->update('T_StoreOffer', array('store_offer_id' => $store_offer_id ), array('offer_status' => "11" ) );


            // $social = $this->Adminmodel->delete('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id ));
            // $data['store'] = $this->Adminmodel->select_data('T_StoreOffer' ,array('store_offer_id' => $store_offer_id));
            // $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $data['store'][0]->offer_term_condition_id ));
            // $del_data = $this->Adminmodel->delete('T_StoreOffer', array('store_offer_id' => $store_offer_id ));


            $this->session->set_flashdata('message', '<div class="alert alert-success">
                  <strong>Offer removed successfully.</strong>
            </div>');

        
            
        }

       function removePayment($payment_id){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $payment = $this->Adminmodel->delete('T_Payment', array('payment_id' => $payment_id ));

            $this->session->set_flashdata('setting', '<div class="alert alert-success">
                  <strong>Payment detail deleted successfully.</strong>
            </div>');

            // redirect('control/setting');
        }

       function editOffer($store_offer_id){

            if(!$this->checkauth()){
                return redirect('control/login');
            }


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
                    'publish_time' => date("H:i:s"),
                    'offer_status' => "2",
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
                  <strong>Your Offer is updated.Now is waiting for super admin for approval</strong>
                </div>');   



                redirect('control/viewOffer'); 

            }



            $data['edit_offer'] = $this->Adminmodel->getFullStoreOfferDetailWithStoreId($store_offer_id);
            // var_dump($data['edit_offer']);die;
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $this->load->view("editOffer", $data);
        }

        // function editBeacon($Id){

        //     if(!$this->checkauth()){
        //         return redirect('control/login');
        //     }

        //     if(!empty($_POST)){
                
        //         $updateBeaconData = array(  
        //             'beacon_id' => $Id,
        //             'store_id' => $this->session->userdata('store_id'),
        //             'name' => $this->input->post('beacon_name')
        //             // 'uuid' => $this->input->post('beacon_uuid'),
        //             // 'major_value' => $this->input->post('beacon_major'),
        //             // 'minor_value' =>  $this->input->post('beacon_minor')
        //         );

        //         // var_dump($updateBeaconData);die;

        //         $res = $this->Adminmodel->update('T_Beacon', array('beacon_id' => $Id), $updateBeaconData);

        //         redirect('control/viewBeacon');
        //     }

        //     $data['edit_beacon'] = $this->Adminmodel->select_data('T_Beacon', array('beacon_id' => $Id) );
        //     $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        //     $this->load->view("edit_beacons", $data);
        // }   

        function diagrameditor(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $this->load->view("draw/main/examples/editors/diagrameditor");
        }

        function setting(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }
            // $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email) );
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');
            
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            // $points = $this->db->get('T_Payment');
            // $points = $this->Adminmodel->countPoints();

            // // var_dump($points);die;


           $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')), array('payment_id' => 'desc' ));
            

            $this->load->view("setting", $data);
        }


        function addPoints(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
            
            $this->load->view('add_points', $data); 
        }


        function payment(){
            
            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $paymentData = array(
                'store_id' => $this->session->userdata('store_id'),
                'payment_name' => $this->input->post('payment'),
                'payment_date' => $this->input->post('payment_date'),
                'payment_time' => date("H:i:s"),
                'points' => $this->input->post('points'),
                'credits' => $this->input->post('credits') 

            );
            // var_dump($paymentData);die;

            $this->Adminmodel->insert('T_Payment', $paymentData);


            $this->session->set_flashdata('message', '<div class="alert alert-success">
                  <strong>Points will be added in your account once superadmin will approve.</strong>
                </div>');   

            redirect('control/addPoints');
        }


        function changeStatus(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $value = $this->uri->segment(3);
            $store_offer_id = $this->uri->segment(4);

            
            $changeStatus = array(
                'offer_status' => $value
            );

            $res = $this->Adminmodel->update('T_StoreOffer', array('store_offer_id' => $store_offer_id), $changeStatus);
            
            redirect('control/viewOffer');
        }
 
        function shareDetails($offer_id){

            if(!$this->checkauth()){
                return redirect('control/login');
            }
        
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $data['shareDetails'] = $this->Adminmodel->select_data('T_SocialSharePoint', array('store_offer_id' => $offer_id), array('social_share_point_id' => 'desc' ) );

            $data['total_shares'] = $this->Adminmodel->totalSharesByOffer($offer_id);
            $data['today_shares'] = $this->Adminmodel->todayShares($offer_id);
           $totalcredits= $this->Adminmodel->getStorePoint(array('store_id'=>$this->session->userdata('store_id')));
            //print_r($totalcredits['store_point']);
           
             $getRemaining = $this->Adminmodel->getStoreRemainingPoint(array('store_offer_id' => $offer_id));

             // echo "<pre>";
              // print_r($getRemaining);  die;
/*$r_point = $getRemaining['points'];*/
       // print_r($getRemaining['points']); die;
             // print_r($getRemaining['points']); 
            
             foreach ($getRemaining as $value) {
                $sum=$sum+$value['points'];
                 
             }

              $credits1=$totalcredits['store_point'];
               $data['remaining_credits']= $credits1 - $sum;

            
            $this->load->view('offerShareDeatails', $data);     
        }

        function walkinReport(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
                
            $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));
            $data['today_Walkins'] = $this->Adminmodel->todayWalkinsInStore($this->session->userdata('store_id'));
            

            $data['userWalkinData'] = $this->Adminmodel->userWalkinFullInformation($this->session->userdata('store_id'));

            $this->load->view('walkin_report',$data);
        }

        // function userReport(){

        //     if(!$this->checkauth()){
        //         return redirect('control/login');
        //     }

        //     $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        //     $data['total_Walkins'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
        //     $data['total_time_spent'] = $this->Adminmodel->totalTimeSpent();

        //     $data['userWalkinData'] = $this->Adminmodel->userWalkinDetails();


        //     $this->load->view('user_report',$data);
        // }

        function userReport(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $login_store_id = $this->session->userdata('store_id'); 

            // var_dump($this->session->userdata('store_email'));die;

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($login_store_id);
            $data['total_time_spent'] = $this->Adminmodel->totalTimeSpentInStore($login_store_id);
            $data['userWalkinData'] = $this->Adminmodel->userWalkinThrough($login_store_id);

            $data['usert'] = $this->Adminmodel->totalTimeSpentOfUser($login_store_id, "28");
            
            $data['lastw'] = $this->Adminmodel->getLastWalkinOfUser($login_store_id, "28", "ASC");
            $data['userw'] = $this->Adminmodel->totalTimeSpentOfUser($login_store_id, "28");
            
            // var_dump($data['userw']);die;            
            // var_dump($data['userw']);die;

            $this->load->view('user_report',$data);
        }

        function terms(){

            // if(!$this->checkauth()){
            //     return redirect('control/login');
            // }
            
            $this->load->view('terms');
        }


// new methods 16 june 7.30pm

        function s(){

            if(!$this->checkauth()){
                return redirect('control/login');
            }

            $data = $this->space->selectAll();

            $count = 0;
            foreach ($data as $d) {
                $data[$count]->space_point = $this->space_point->selectby_spaceId($d->space_id);
                $data[$count]->beacon_point = $this->Beacon_asign_model->getBySpaceId($d->space_id);

                $count++;
            }
            $data['space_data'] = $data;

            $this->load->view('spaces', $data);
        }

        // public function edit_space_point($space_id) {
        //     if(!$this->checkauth()){
        //         return redirect('control/login');
        //     }

        //     if (!$space_id) {
        //         return redirect('control/spaces');
        //     }
        //     $data['space_detail'] = $this->space->selectby_Id($space_id);
        //     $data['space_point'] = $this->space_point->selectby_spaceId($space_id);
        //     $this->load->view('edit_space_point', $data);
        // }

        public function spaces($sort = 'space_id') {
            if(!$this->checkauth()){
                return redirect('control/login');
            }

$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
      $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));
      $space_id = $data['chk_if_al_space'][0]->space_id;

      if($data['chk_if_al_space'][0]->space_id){
        $url = 'control/assign_beacon/' . $space_id;
        redirect($url);
      }


            $data = $this->space->selectAll();
            if ($sort == "name") {
               $data = $this->space->selectAll_byname(); 
            } elseif ($sort == "date") {
                $data = $this->space->selectAll_bydate();
            } else {
                $data = $this->space->selectAll();
            }

            $count = 0;
            foreach ($data as $d) {
                $data[$count]->space_point = $this->space_point->selectby_spaceId($d->space_id);
                $data[$count]->beacon_point = $this->Beacon_asign_model->getBySpaceId($d->space_id);

                $count++;
            }
            $data['space_data'] = $data;
    //           echo '<pre>';
    //           var_dump($data['space_data']); die;
            $this->load->view('spaces', $data);
        }



    public function add_spaces() {
        if(!$this->checkauth()){
                return redirect('control/login');
        }





$data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));
        $space_id = $data['chk_if_al_space'][0]->space_id;

        if($data['chk_if_al_space'][0]->space_id){

            $url = 'control/assign_beacon/' . $space_id;
            redirect($url);

        }
        
        $this->load->view('add_spaces',$data);
    }

    public function save_space() {
        if(!$this->checkauth()){
                return redirect('control/login');
        }

        $space_name = $this->input->post('space_name');
        $width = $this->input->post('width');
        $height = $this->input->post('height');


        if ($_FILES["space_image"]["tmp_name"]) {

            $imageInformation = getimagesize($_FILES['space_image']['tmp_name']);

            $imageWidth = $imageInformation[0]; //Contains the Width of the Image
            $imageHeight = $imageInformation[1]; //Contains the Height of the Image


            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
//          $config['max_size'] = 250;
            $this->load->library('upload', $config);
            $this->upload->do_upload('space_image');
            $data_upload_files = $this->upload->data();
            $image = $data_upload_files["file_name"];
            $data = array(
                'store_id' => $this->session->userdata('store_id'),
                // 'space_name' => $space_name,
                'space_image' => $image,
                'width' => $imageWidth,
                'height' => $imageHeight
            );
            $space_id = $this->space->insert($data);
            $res['space_detail'] = $this->space->selectby_Id($space_id);
//            var_dump($res);
            // $this->load->view('space_point',$res);

            $url = 'control/assign_beacon/' . $space_id;
            // $url = 'control/spaces/';
            return redirect($url);
        } else {
            $data = array(
                'space_name' => $space_name,
                'width' => $width,
                'height' => $height
            );
            $space_id = $this->space->insert($data);
            $res['space_detail'] = $this->space->selectby_Id($space_id);
//            var_dump($res);
            //$this->load->view('space_point',$res);
            $url = 'control/assign_beacon/' . $space_id;
            // $url = 'control/spaces/';
            return redirect($url);
        }
    }
    
    public function assign_beacon_old($space_id) {
        
        if(!$this->checkauth()){
            return redirect('control/login');
        }

         if (!$space_id) {
             return redirect('control/spaces');
         }

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') )); 
        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['beacons'] = $this->Beacon_asign_model->getBySpaceId($space_id);
        //var_dump($data['beacons']);die;
        $data['space_detail'] = $this->space->selectby_Id($space_id);
        $data['space_point'] = $this->space_point->selectby_spaceId($space_id);
        $data['beacon_details'] = $this->beacon->selectbyspace_Id($space_id);
//             echo '<pre>';
//             var_dump($data['beacon_details']); die;
//             $this->load->view('assign_beacon',$data);
        // var_dump($data);die;
        $this->load->view('assign_beacon_new', $data);
    }


     public function assign_beacon($space_id) {
        
        if(!$this->checkauth()){
            return redirect('control/login');
        }

         if (!$space_id) {
             return redirect('control/spaces');
         }


        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));
        
        $space_ids = $data['chk_if_al_space'][0]->space_id;

        // if($data['chk_if_al_space'][0]->space_id){
        //     $url = 'control/assign_beacon/' . $space_ids;
        //     redirect($url);
        // }


        $data['beacons'] = $this->Beacon_asign_model->getBySpaceId($space_ids);
        //var_dump($data['beacons']);die;
        $data['space_detail'] = $this->space->selectby_Id($space_ids);
        $data['space_point'] = $this->space_point->selectby_spaceId($space_ids);
        $data['beacon_details'] = $this->beacon->selectbystore_Id($this->session->userdata('store_id'));
//             echo '<pre>';
//             var_dump($data['beacon_details']); die;
//             $this->load->view('assign_beacon',$data);
        // var_dump($data);die;
        $this->load->view('assign_beacon_new', $data);
    }

    ////////  add on 05.12.2017  vatan /////
    public function assign_beacon_edit($space_id) {
        
        if(!$this->checkauth()){
            return redirect('control/login');
        }

         if (!$space_id) {
             return redirect('control/spaces');
         }


        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));
        
        $space_ids = $data['chk_if_al_space'][0]->space_id;

        // if($data['chk_if_al_space'][0]->space_id){
        //     $url = 'control/assign_beacon/' . $space_ids;
        //     redirect($url);
        // }


        $data['beacons'] = $this->Beacon_asign_model->getBySpaceId($space_ids);
        //var_dump($data['beacons']);die;
        $data['space_detail'] = $this->space->selectby_Id($space_ids);
        $data['space_point'] = $this->space_point->selectby_spaceId($space_ids);
        $data['beacon_details'] = $this->beacon->selectbystore_Id($this->session->userdata('store_id'));
//             echo '<pre>';
//             var_dump($data['beacon_details']); die;
//             $this->load->view('assign_beacon',$data);
        // var_dump($data);die;
        $this->load->view('assign_beacon_new_edit', $data);

         
    }
      /////end  code vatan//////////

    public function delete_space() {
        
        if(!$this->checkauth()){
            return redirect('control/login');
        }


        $space_id = $this->uri->segment(3);
        $this->space->delete($space_id);
        $this->space_point->deleteby_spaceId($space_id);
        $this->session->set_flashdata('message', "Store plan deleted successfully");
        redirect('control/spaces');
    }

    public function edit_space($space_id) {
        // if (!$this->session->email) {
        //     redirect('main/index');
        // }
        //$space_id=$this->uri->segment(3);

        $data['space_data'] = $this->space->selectby_Id($space_id);
        $data['space_point'] = $this->space_point->selectby_spaceId($space_id);
        $this->load->view('edit_space', $data);

//         echo '<pre>';
//         var_dump($space_data);
//         var_dump($space_point);   
    }

    public function save_editspace() {
        
        if(!$this->checkauth()){
            return redirect('control/login');
        }


        $post = $this->input->post();
        //var_dump($post);die;
        $space_id = $this->input->post('space_id');
        $space_name = $this->input->post('space_name');
        $width = $this->input->post('width');
        $height = $this->input->post('height');


        if ($_FILES["space_image"]["tmp_name"]) {

            $imageInformation = getimagesize($_FILES['space_image']['tmp_name']);

            $imageWidth = $imageInformation[0]; //Contains the Width of the Image
            $imageHeight = $imageInformation[1]; //Contains the Height of the Image

            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
//        $config['max_size'] = 250;
            $this->load->library('upload', $config);
            $this->upload->do_upload('space_image');

            $data_upload_files = $this->upload->data();
            $image = $data_upload_files["file_name"];
            $data = array(
                'store_id' => $this->session->userdata('store_id'),
                'space_name' => $space_name,
                'space_image' => $image,
                'width' => $imageWidth,
                'height' => $imageHeight
            );
            $space_id = $this->space->update($space_id, $data);
//            var_dump($res); die;
            $data['space_detail'] = $this->space->selectby_Id($space_id);
            $data['space_point'] = $this->space_point->selectby_spaceId($space_id);
            // $this->load->view('edit_space_point',$data);
            $url = 'control/edit_space_point/' . $space_id;
            return redirect($url);

        } else {
            $data = array(
                'space_name' => $space_name,
                'width' => $width,
                'height' => $height
            );
            $space_id = $this->space->update($space_id, $data);
//            var_dump($res); die;
            $data['space_detail'] = $this->space->selectby_Id($space_id);
            $data['space_point'] = $this->space_point->selectby_spaceId($space_id);
            //$this->load->view('edit_space_point',$data);
            $url = 'control/edit_space_point/' . $space_id;
            return redirect($url);
        }
    }

    public function edit_space_point($space_id) {

        if(!$this->checkauth()){
            return redirect('control/login');
        }

        if (!$space_id) {
            return redirect('control/spaces');
        }

        $data['space_detail'] = $this->space->selectby_Id($space_id);
        $data['space_point'] = $this->space_point->selectby_spaceId($space_id);
        // $this->load->view('edit_space_point', $data);

        $this->session->set_flashdata('message', "Store plan updated");
        redirect('control/spaces');

    }

    public function save_beacon() {
        
        if(!$this->checkauth()){
            return redirect('control/login');
        }


        $data = $this->input->post('data');

        // var_dump($data);die;

        //$this->load->library('email');
        $this->load->model('Beacon_asign_model');

        $beacon = $this->Beacon_asign_model->getBySpaceId($data[0]['space_id']);
        if ($beacon) {
            $this->Beacon_asign_model->deleteBySpaceid($data[0]['space_id']);
        }
        if ($this->Beacon_asign_model->insertBatch($data)) {
            
            $this->session->set_flashdata('beacon_placed', '<div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Beacon places updated successfully</strong>
            </div>');
             
              
           //$to=  $this->session->userdata('email');


             // $body = "beacon position has changed";
             //             $subject = 'Beacon places updateded';
             //             $to = 'canopus.testing@gmail.com';
             //             $from_email = 'canopusinfo@gmail.com';
                                        
           //              $headers = "MIME-Version: 1.0" . "\r\n";
                        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                         
                        // $sts =  $this->Send_Mail($to,$from_email,$body,$subject);
                        

                       // var_dump($sts); die;
                         //show_error($this->email->print_debugger());
            //             if($sts){
                       
            //      $this->session->set_flashdata('beacon_placed', '<div class="alert alert-success">
            //       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            //       <strong>Email Send successfully</strong>
            // </div>');
            

            //             }else{
            //                $this->session->set_flashdata('beacon_placed', '<div class="alert alert-success">
            //       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            //       <strong>Email Not Send</strong>
            // </div>');
            //             }

            echo 'true';
       
            // $msg =" <strong>Beacon places updated successfully</strong>";
            // $email="vatan1790@gmail.com";
            // $config = Array(
            //           'protocol' => 'smtp',
            //           'smtp_host' => 'ssl://smtp.googlemail.com',
            //           'smtp_port' => 465,
            //           'smtp_user' => 'canopus.testing@gmail.com', // change it to yours
            //           'smtp_pass' => 'canopus12!', // change it to yours
            //           'mailtype' => 'html',
            //           'charset' => 'iso-8859-1',
            //           'wordwrap' => TRUE
            //         );

            //      $this->load->library('email', $config);

            //           $this->email->set_newline("\r\n");
            //           $this->email->from('vatan1790@gmail.com'); // change it to yours
            //           $this->email->to($email);// change it to yours
            //           $this->email->subject('Yours Link To Update Admin Password');
            //           $this->email->message($msg);
            //           //$this->email->send();
            //           if($this->email->send())
            //          {
            //           echo '<br>'.'Email sent...... Please Check Yours Email ID';
                    
            //          }else{

            //             echo '<br>'.'Email Not Sent';
            //          }
                     




         }                                 
         else {
            echo "false";
        }
    }


    public function add_beacon($space_id) {
        if(!$this->checkauth()){
            return redirect('control/login');
        }
//      var_dump($space_id);

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['space_id'] = $space_id;

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
        $this->load->view('add_beacon', $data);
    }

    // New changes 29 june in save_beacondetail API

    public function save_beacondetail() {
        if(!$this->checkauth()){
            return redirect('control/login');
        }

        // $space_id = $this->input->post('space_id');
        $beacon_name = $this->input->post('beacon_name');
        $beacon_uuid = $this->input->post('beacon_uuid');
        $beacon_major = $this->input->post('beacon_major');
        $beacon_minor = $this->input->post('beacon_minor');
        $beacon_place = $this->input->post('beacon_place');
        

//          var_dump($data); die;
        $beacon = $this->beacon->selectunique(array(
            'beacon_name' => $beacon_name, 
            'beacon_uuid' => $beacon_uuid, 
            'beacon_major' => $beacon_major, 
            'beacon_minor' => $beacon_minor
        ));

        $chk_for_beacon_name = $this->Adminmodel->select_data('T_Beacons', array(
            'beacon_name' => $beacon_name
        ));

        if(!$chk_for_beacon_name){

            if (!$beacon) {

                $is_entrance_of_third_party = $this->input->post('is_entrance_of_third_party');

                if($is_entrance_of_third_party){
                    // var_dump("Yes");die;
                    
                    $chk_if_store_already_have_one_entrance_beacon2 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id') ,'is_entrance_beacon' => "1" ));

                    if($chk_if_store_already_have_one_entrance_beacon2){

                        $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                        <strong>You have already set one entrance beacon please set the beacon in other area of your store</strong>
                        </div>');

                        redirect('control/viewBeacon');

                    } else {

                        for($i=7;$i>0;$i--){
                            $b_key = rand(100000,999999); 
                        }
                        $beacon_umique_key = $b_key;
                        
                        if ($id = $this->beacon->insert(array(
                                'store_id' => $this->session->userdata('store_id'),
                                'space_id' => $space_id,
                                'is_entrance_beacon' => $is_entrance_of_third_party ? : '0',
                                'beacon_place' => $beacon_place,
                                'beacon_key' => "beacon-".$beacon_umique_key,
                                'beacon_name' => $beacon_name, 
                                'beacon_uuid' => $beacon_uuid, 
                                'beacon_major' => $beacon_major, 
                                'beacon_minor' => $beacon_minor,
                                'beacon_type' => "third_party_beacon"
                            ))) {
                            // redirect('control/assign_beacon/' . $space_id);


                            $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-success">
                                      <strong>Beacon assigned to the store</strong>
                                    </div>');

                            redirect('control/viewBeacon');
                        }


                    } 

                } else {
                     // var_dump("No");die;


                    for($i=7;$i>0;$i--){
                        $b_key2 = rand(100000,999999); 
                    }
                    $beacon_umique_key2 = $b_key2;
                    
                    if ($id = $this->beacon->insert(array(
                            'store_id' => $this->session->userdata('store_id'),
                            'space_id' => $space_id,
                            'is_entrance_beacon' => $is_entrance_of_third_party ? : '0',
                            'beacon_place' => $beacon_place,
                            'beacon_key' => "beacon-".$beacon_umique_key2,
                            'beacon_name' => $beacon_name, 
                            'beacon_uuid' => $beacon_uuid, 
                            'beacon_major' => $beacon_major, 
                            'beacon_minor' => $beacon_minor,
                            'beacon_type' => "third_party_beacon"
                        ))) {
                        // redirect('control/assign_beacon/' . $space_id);


                        $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-success">
                                  <strong>Beacon assigned to the store</strong>
                                </div>');

                        redirect('control/viewBeacon');
                    }

                }

            } else {


                $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                <strong>Beacon already assigned</strong>
                </div>');

                redirect('control/viewBeacon');
            }

        }else{

            $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                <strong>Beacon with this name already existed</strong>
            </div>');

            redirect('control/viewBeacon');
        }
    }


     
    function paint(){

      if(!$this->checkauth()){
        return redirect('control/login');
      }  

      $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
      $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

      $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));
      $space_id = $data['chk_if_al_space'][0]->space_id;

      if($data['chk_if_al_space'][0]->space_id){
        $url = 'control/assign_beacon/' . $space_id;
        redirect($url);
      }

      $this->load->view("paint/index" ,$data);
    }


    function savePaintImage(){

      $image = imagecreatefrompng($_POST['image']);
      $id = uniqid();
      imagealphablending($image, false);
      imagesavealpha($image, true);
      $folder = base_url().'uploads/paint/wPaint-'.$id.'.png';

      imagepng($image, 'uploads/wPaint-'.$id.'.png');
      // return image path
      
      // new


        $space_image = 'wPaint-'.$id.'.png';
        $width = "1000";
        $height = "600";

        $data = array(
            'store_id' => $this->session->userdata('store_id'),
            'space_image' => $space_image,
            'width' => $width,
            'height' => $height
        );
        $space_id = $this->space->insert($data);
        $res['space_detail'] = $this->space->selectby_Id($space_id);
                
        $url = 'control/assign_beacon/' . $space_id;
        // return redirect($url);
      
      // end  



    }

    function getLastPaintUpload(){
        
        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));
        
        $space_id = $data['chk_if_al_space'][0]->space_id;


       // $space_id = $this->db->select('space_id')->order_by('space_id','desc')->limit(1)->get('T_Space')->row('space_id');
       
       // echo '{"space_id": "'.$space_id.'"}';  
        echo $space_id;
    }


    public function heat_beacon($space_id) {
        
        if(!$this->checkauth()){
            return redirect('control/login');
        }
        
        // if (!$space_id) {
        //      return redirect('control/spaces');
        // }

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

        $space_ids = $data['chk_if_al_space'][0]->space_id;
        $data['beacons'] = $this->Beacon_asign_model->getBySpaceId($space_ids);
        $data['space_detail'] = $this->space->selectby_Id($space_ids);
        $data['space_point'] = $this->space_point->selectby_spaceId($space_ids);
        $data['beacon_details'] = $this->beacon->selectbystore_Id($this->session->userdata('store_id'));
        $data['heatmap_user_data'] = $this->Adminmodel->getHeatCountOfUser("beacon-1");

        // var_dump($data['beacons']);die;
        $this->load->view('paint/heatmap', $data);
    }


    function heatmap(){
          if(!$this->checkauth()){
            return redirect('control/login');
          }  

          $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
          $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

          $space_id = $data['chk_if_al_space'][0]->space_id;

          if($data['chk_if_al_space'][0]->space_id){
            $url = 'control/heat_beacon/' . $space_id;
            redirect($url);
          }

          $this->load->view("paint/heatmap" ,$data);
    }

// New method 12 july
    
    function checkIfAlreadyBeacon(){

        $beacon_name = $this->uri->segment(3);
        $chk_for_beacon_name = $this->Adminmodel->select_data('T_Beacons', array(
            'beacon_name' => $beacon_name
        ));        
        echo $chk_for_beacon_name[0]->beacon_name;
    }


    function editBeacon($Id){

            // var_dump($Id);die;
            if(!$this->checkauth()){
                return redirect('control/login');
            }

            if(!empty($_POST)){
                
                $beacon_k = $this->input->post('beacon_key');
                $beacon_type = $this->input->post('beacon_type');

                if($beacon_type == "cashrub_beacon" ){

                    $for_entry_beacon1 = $this->input->post('is_entrance_update');

                    if($for_entry_beacon1 == "1"){

                        $chk_if_alr1 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'is_entrance_beacon' => "1" ));
                    
                        if($chk_if_alr1){

                            $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                              <strong>You already have one entrance beacon you can\'t add thie one for the entrance </strong>
                            </div>');
                            redirect('control/editbeacon/'.$beacon_k);
                        
                        } else {

                            $updateBeaconData9 = array(  
                                'beacon_key' => $beacon_k,
                                'store_id' => $this->session->userdata('store_id'),
                                'beacon_name' => $this->input->post('beacon_name'),
                                'beacon_place' => $this->input->post('beacon_place'),
                                'is_entrance_beacon' => $for_entry_beacon1
                            );

                            $update_cashrub_beacon = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k ), $updateBeaconData9);


                            $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                              <strong>CashRub beacon updated successfully</strong>
                            </div>');

                            redirect('control/viewBeacon');
                        
                        }

                    } else {

                        $updateBeaconData2 = array(  
                            'beacon_key' => $beacon_k,
                            'store_id' => $this->session->userdata('store_id'),
                            'beacon_name' => $this->input->post('beacon_name'),
                            'beacon_place' => $this->input->post('beacon_place')
                        );

                        $update_cashrub_beacon2 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k ), $updateBeaconData2 );

                        $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                              <strong>Third-Party beacon updated successfully</strong>
                        </div>');
                        redirect('control/viewBeacon');    

                    }

                } else {

                    $for_entry_beacon5 = $this->input->post('is_entrance_update');


                    // var_dump($for_entry_beacon5);

                    if($for_entry_beacon5 == "1"){

                        $chk_if_alr5 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'is_entrance_beacon' => "1" ));
                    
                        if($chk_if_alr5){

                            $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                              <strong>You already have one entrance beacon you can\'t add thie one for the entrance </strong>
                            </div>');
                            redirect('control/editbeacon/'.$beacon_k);

                        } else { 

                            $chk_if_entry_same = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'beacon_key' => $beacon_k ));

                            if(
                                $chk_if_entry_same[0]->beacon_uuid == $this->input->post('beacon_uuid') &&  
                                $chk_if_entry_same[0]->beacon_major == $this->input->post('beacon_major') &&
                                $chk_if_entry_same[0]->beacon_minor == $this->input->post('beacon_minor')
                            ) {

                                $updateBeaconData5 = array(  
                                    'beacon_key' => $beacon_k,
                                    'store_id' => $this->session->userdata('store_id'),
                                    'beacon_name' => $this->input->post('beacon_name'),
                                    'beacon_place' => $this->input->post('beacon_place'),
                                    'beacon_uuid' => $this->input->post('beacon_uuid'),
                                    'beacon_major' => $this->input->post('beacon_major'),
                                    'beacon_minor' => $this->input->post('beacon_minor'),
                                    'is_entrance_beacon' => $for_entry_beacon5
                                );

                                $update_cashrub_beacon5 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k ), $updateBeaconData5 );

                                $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                                  <strong>Third-Party beacon updated successfully</strong>
                                </div>');

                                redirect('control/viewBeacon');

                            } else {


                                $chk_if_beacon_alr = $this->Adminmodel->select_data('T_Beacons', array(
                                    'store_id' => $this->session->userdata('store_id'), 
                                    'beacon_uuid' => $this->input->post('beacon_uuid'), 
                                    'beacon_major' => $this->input->post('beacon_major'),
                                    'beacon_minor' => $this->input->post('beacon_minor')
                                ));


                                if($chk_if_beacon_alr){

                                    $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                                      <strong>Beacon is already exists with this UUID,major or minor </strong>
                                    </div>');
                                    redirect('control/editbeacon/'.$beacon_k);

                                } else {

                                    $updateBeaconData5 = array(  
                                        'beacon_key' => $beacon_k,
                                        'store_id' => $this->session->userdata('store_id'),
                                        'beacon_name' => $this->input->post('beacon_name'),
                                        'beacon_place' => $this->input->post('beacon_place'),
                                        'beacon_uuid' => $this->input->post('beacon_uuid'),
                                        'beacon_major' => $this->input->post('beacon_major'),
                                        'beacon_minor' => $this->input->post('beacon_minor'),
                                        'is_entrance_beacon' => $for_entry_beacon5
                                    );

                                    $update_cashrub_beacon5 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k ), $updateBeaconData5 );

                                    $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                                      <strong>Third-Party beacon updated successfully</strong>
                                    </div>');

                                    redirect('control/viewBeacon');

                                }


                            }


                        }
                    
                    } else {

                        // var_dump("Helo");die;

                        $chk_if_entry_same2 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'beacon_key' => $beacon_k ));

                            if(
                                $chk_if_entry_same2[0]->beacon_uuid == $this->input->post('beacon_uuid') &&  
                                $chk_if_entry_same2[0]->beacon_major == $this->input->post('beacon_major') &&
                                $chk_if_entry_same2[0]->beacon_minor == $this->input->post('beacon_minor')
                            ) {


                                $updateBeaconData5 = array(  
                                    'beacon_key' => $beacon_k,
                                    'store_id' => $this->session->userdata('store_id'),
                                    'beacon_name' => $this->input->post('beacon_name'),
                                    'beacon_place' => $this->input->post('beacon_place'),
                                    'beacon_uuid' => $this->input->post('beacon_uuid'),
                                    'beacon_major' => $this->input->post('beacon_major'),
                                    'beacon_minor' => $this->input->post('beacon_minor')
                                );

                                $update_cashrub_beacon5 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k ), $updateBeaconData5 );

                                $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                                  <strong>Third-Party beacon updated successfully</strong>
                                </div>');

                                redirect('control/viewBeacon');
                                    


                            } else {

                                $chk_if_beacon_alr1 = $this->Adminmodel->select_data('T_Beacons', array(
                                    'store_id' => $this->session->userdata('store_id'), 
                                    'beacon_uuid' => $this->input->post('beacon_uuid'), 
                                    'beacon_major' => $this->input->post('beacon_major'),
                                    'beacon_minor' => $this->input->post('beacon_minor')
                                ));

                                if($chk_if_beacon_alr1){
                                    
                                    $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                                          <strong>Beacon is already exists with this UUID,major or minor </strong>
                                    </div>');
                                    redirect('control/editbeacon/'.$beacon_k);

                                } else {

                                    $updateBeaconData1 = array(  
                                        'beacon_key' => $beacon_k,
                                        'store_id' => $this->session->userdata('store_id'),
                                        'beacon_name' => $this->input->post('beacon_name'),
                                        'beacon_place' => $this->input->post('beacon_place'),
                                        'beacon_uuid' => $this->input->post('beacon_uuid'),
                                        'beacon_major' => $this->input->post('beacon_major'),
                                        'beacon_minor' => $this->input->post('beacon_minor')
                                    );

                                    $update_cashrub_beacon = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k ), $updateBeaconData1 );

                                    $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                                          <strong>Third Party beacon updated successfully</strong>
                                    </div>');
                                    redirect('control/viewBeacon');

                                }

                            }
                    }

                }
            }

            $data['edit_beacon'] = $this->Adminmodel->select_data('T_Beacons', array('beacon_key' => $Id) );
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email') ));

            $this->load->view("edit_beacons", $data);
        }   

    // Cronjobs        

        function deleteUserIfNotVerified(){
        
            $delete_user = $this->Adminmodel->delete('T_User', array('otp_verify' => "0" ));

            $delete_u = $this->Adminmodel->delete('T_User', array('status_id' => "0" ));

        }

        function checkOfferExpiryDate(){


            
            $data['chk_expiry'] = $this->Adminmodel->select_data('T_StoreOffer');

            foreach ($data['chk_expiry'] as $key) {
                
                $current_date = date_create(date('Y-m-d'));
                $offer_expiry_date = date_create($key->expiry_date);
                $diff=date_diff($current_date,$offer_expiry_date);
                $exact = $diff->format("%R%a");



                if($exact <= 0){
                    // echo $exact;
                    $offer_expires = $this->Adminmodel->update('T_StoreOffer', array('store_offer_id' => $key->store_offer_id ), array('offer_status' => "9" ) );

                }
            }


            $data['chk_expiry_coupon'] = $this->Adminmodel->select_data('T_Coupon', array('status !=' => "11"));

            foreach ($data['chk_expiry_coupon'] as $key) {
                
                $current_date = date_create(date('Y-m-d'));
                $coupon_expiry_date = date_create($key->coupon_expiry_date);
                $diff=date_diff($current_date,$coupon_expiry_date);
                $exact2 = $diff->format("%R%a");

                if($exact2 < 0){
                    // echo $exact;
                    $coupon_expires = $this->Adminmodel->update('T_Coupon', array('coupon_id' => $key->coupon_id ), array('status' => "9" ) );

                }
            }


            // deleting unverified users.

            $delete_user = $this->Adminmodel->delete('T_User', array('otp_verify' => "0" ));

            // delete stores

            $delete_store = $this->Adminmodel->delete('T_Store', array('store_email' => NULL ));

            $delete_u = $this->Adminmodel->delete('T_User', array('status_id' => "0" ));


        }



        function services(){

            $this->load->view("terms");

        }

        function tutorial(){

            $this->load->view("tutorial");

        }

        function frequentlyAskedQuestion(){

            $this->load->view("frequently_asked_question");

        }

        function about_us(){

            $this->load->view("about_us");

        }

        function privacy_policy(){

            $this->load->view("privacy_policy");

        }


        function forgotPassword(){
            $this->load->view("forgot_password");            
        }

        function submitForgotPassword(){



                $config = array(
                    array(
                            'field' => 'username',
                            'label' => 'Email address',
                            'rules' => 'required|valid_email',
                            'errors' => array(
                                    'required' => 'Email address field is required.',
                            ),
                    )
                );

                $this->form_validation->set_rules($config);


                if ($this->form_validation->run() == FALSE){
                    
                    $this->load->view('forgot_password');

                } else {
                    $email = $this->input->post("username");
                    


                    $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email ));
                    
                    if ($data['store']) {

                        

                        $url = str_replace(' ', '', base_url('index.php/Welcome/forgot_password_verify'));
                        
                        $body = " <a href='" . $url . "/" . $data['store'][0]->store_id . "'>Click</a> here to change your password";
                        $subject = 'Recover Password';
                        $to_email = $email;
                                        
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        $sts =  $this->send_mail($to_email,$subject,$body,$headers);
                        
                        if($sts){

                            $expire_manage = $this->Adminmodel->update('T_Store', array('store_email' => $email ), array('link_expire' => "2" , 'reset_link_expire_time' => date("Y-m-d H:i:s")  ) );
                            $this->session->set_flashdata('login_error', 'Reset password link is sent to your email.');
                            $this->load->view('login');
                        }else{
                            $this->session->set_flashdata('login_error', 'Something went wrong please try again later.');
                            $this->load->view('login');
                        }
                        
                    } else {
                    
                        $this->session->set_flashdata('forgot_error', 'Email ID is not registered');
                        $this->load->view('forgot_password');
                    }
                }




        }
              
//show_error($this->email->print_debugger());
        

 }
