<?php error_reporting(0); ?>
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Supercontroller extends CI_Controller {


        function __construct() {
            // Construct the parent class
            parent::__construct();
            // $this->load->helper('url');
            $this->load->model('Supermodel');
            
            $this->load->database();
            $this->load->library('session');

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
      

        }


        //  start checkauth
        private function checkauth() {
            if ($email = $this->session->userdata('super_email')) {
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

                        $this->session->set_flashdata('superlogin_error', 'Your mobile number is successfully verified.');
                        redirect('control/login');

                    }else{
                        $this->session->set_flashdata('otp_error', 'OTP code is invalid.');
                        redirect('control/verifyOtp?store_id='.$data['otp'][0]->store_id);
                    }
                }else{
                    $this->session->set_flashdata('superlogin_error', 'Mobile number is already verified.');
                    redirect('control/login');                  
                }

                
            }

        }

        function view_userinfo(){

            $data['users'] = $this->Supermodel->select_data('T_User','',array('user_id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');


            $this->load->view('superadmin/view_userinfo', $data);
        }

        function shop_screen(){

            $data['total_users'] = $this->Supermodel->select_data('T_User');
            $data['total_store'] = $this->Supermodel->select_data('T_Store' ,array('store_email !=' => NULL),array('store_id' => 'desc'));
            $data['active_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 1 ));
            $data['suspend_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 5 ));
            $data['super_email'] = $this->session->userdata('super_email');

            

            $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity');

            $this->load->view('superadmin/shop-screen', $data);
        }

        function sendNotificationToStore(){
            
            $store_id = $this->input->post('store_id');
            
            $subject = $this->input->post('subject');
            $body = $this->input->post('message');
            // var_dump($subject);die;

            $data['get_store-email'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id));
            $notify_email =  $data['get_store-email'][0]->store_email;

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $sts =  $this->send_mail($notify_email,$subject,$body,$headers);

            if($sts){
                $this->session->set_flashdata('notification_message', '<div class="alert alert-success">
                  <strong>Notification has been sent to the store.</strong>
                </div>');

                redirect('supercontroller/shop_screen');
            }else{
                $this->session->set_flashdata('notification_message', '<div class="alert alert-danger">
                  <strong>Notification send failed.</strong>
                </div>');

                redirect('supercontroller/shop_screen');
            }
        }


        function sendNotificationToUser(){
            $user_id = $this->input->post('user_id');
            
            $subject = $this->input->post('subject');
            $body = $this->input->post('message');
            // var_dump($subject);die;

            $data['get_user-email'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));
            $notify_email =  $data['get_user-email'][0]->email;

            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $sts =  $this->send_mail($notify_email,$subject,$body,$headers);

            if($sts){
                $this->session->set_flashdata('notification_user_message', '<div class="alert alert-success">
                  <strong>Notification has been sent to the user.</strong>
                </div>');

                redirect('supercontroller/view_userinfo');
            }else{
                $this->session->set_flashdata('notification_user_message', '<div class="alert alert-danger">
                  <strong>Notification send failed.</strong>
                </div>');

                redirect('supercontroller/view_userinfo');
            }
        }


        function view_shopinfo(){
            $data['super_email'] = $this->session->userdata('super_email');

            $this->load->view('superadmin/view_shopinfo', $data);
        }

        function view_purchase(){
                        $data['purchase'] = $this->Supermodel->select_data('T_Payment','',array('store_id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');

            $this->load->view('superadmin/view_purchase', $data);
        }

        function view_walkins(){
            $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity',array('user_id !=' => NULL), array('beacon_activity_id' => 'desc' ));
            $data['super_email'] = $this->session->userdata('super_email');

            $this->load->view('superadmin/view_walkins', $data);
        }
function profile(){
            
            if($_POST){

                $email = $this->input->post("email");
                $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email));
                
                $this->form_validation->set_rules('newpassword', 'New Password', 'required');
                $this->form_validation->set_rules('confirmnewpassword', 'Confirm New Password', 'required|matches[newpassword]');

                if ($this->form_validation->run() == FALSE){

                    $data['super_email'] = $this->session->userdata('super_email');
                    $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email = ' => $this->session->userdata('super_email') ));
                    $this->load->view('superadmin/profile', $data);

                } else {

                    $password = $this->input->post('newpassword');

                    $passwordChange = $this->Supermodel->update('T_Superadmin', array('email' => $email), array('password' => $password ));

                    $this->session->set_flashdata('superPasswordChange', '<div class="alert alert-success">
                      <strong>Password changed successfully.</strong>
                    </div>');

                    $data['super_email'] = $this->session->userdata('super_email');
                    $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email = ' => $this->session->userdata('super_email') ));
                    $this->load->view('superadmin/profile', $data);
                }    


            }

            $data['super_email'] = $this->session->userdata('super_email');
            $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email = ' => $this->session->userdata('super_email') ));
            $this->load->view('superadmin/profile', $data);

        }

        function changeStoreStatus(){
            $store = $this->uri->segment(3);
            $status = $this->uri->segment(4);
            $statusChange = $this->Supermodel->update('T_Store', array('store_id' => $store), array('status_id' => $status ));

            if($status == 2){
                if($statusChange){

                    $adminChange = $this->Supermodel->update('T_Store', array('store_id' => $store), array('is_admin_approved' => 1 ));

                    $url = str_replace(' ', '', base_url('index.php/Welcome/verify_email'));
                    
                    $body="You store is approved by the admin please <a href='" . $url . "/" . $store."'>Click</a> here to verify your email address";
                    
                    $data['get_store_email'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));


                    $subject = 'Verify your email';
                    $to_email = $data['get_store_email'][0]->store_email;
                                    
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    $sts =  $this->send_mail($to_email,$subject,$body,$headers);

                    // $body = '<!DOCTYPE html>
                    //                 <html>
                    //                 <head>
                    //                     <meta charset="utf-8" />
                    //                     <title>Anil Labs - Codeigniter mail templates</title>
                    //                     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    //                 </head>
                    //                 <body>
                    //                 <div>
                    //                    <div style="font-size: 26px;background: #2196F3;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif;text-align: center" align="center" id="emb-email-header"><img style="border: 0;-ms-interpolation-mode: bicubic;display: block;Margin-left: auto;Margin-right: auto;max-width: 245px;max-height: 67px" src="http://cashrub.canopus-projects.com/cashrub_admin/assets/images/cashrub-logo.png" alt="" width="225" height="108"></div><br>
                    //                 <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;text-decoration:none;Margin-bottom: 0px">Welcome <b style="text-decoration:none;">'.$to_email.'</b>,</p> 
                    //                 <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 0px"> Thank you for registering with the CashRub</p>
                    //                 </div>
                    //                 </body>
                    //                 </html>';

           //          for($i=5;$i>0;$i--){
        //              $otp = rand(1000,9999); 
        //             }

        //             $otp = $otp;
        //             $match2 = $otp;

                    // $done = $this->Adminmodel->update('T_Store', array('store_id' => $store ), array('otp_code' => $match2) );

                    $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                        <strong>Store has been approved successfully, verification link and OTP code has been sent to the store.</strong>
                    </div>');

                }else{
                    $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                      <strong>Store is already approved.</strong>
                    </div>');
                }
            }

            if($status == 5){
                if($statusChange){
                    
                    $adminChange = $this->Supermodel->update('T_Store', array('store_id' => $store), array('is_admin_approved' => 0 ));


                    // $url = str_replace(' ', '', base_url('index.php/Welcome/verify_email'));
                    
                    $body="Your store request is cancelled by admin";
                    
                    $data['get_store_email'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));

                    $subject = 'Admin has cancelled your store registration request';
                    $to_email = $data['get_store_email'][0]->store_email;
                    
                    
                    $headers = '';
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    $sts =  $this->send_mail($to_email,$subject,$body,$headers);

                    $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                      <strong>Store request cancelled successfully.</strong>
                    </div>');   


                
                }else{
                
                    $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                      <strong>Store request is already cancelled.</strong>
                    </div>');
                    
                    redirect('superadmin/superhome');
                }
            }


            
        }

        function changeUserStatus(){
            $user = $this->uri->segment(3);
            $status = $this->uri->segment(4);
            $statusChange = $this->Supermodel->update('T_User', array('user_id' => $user), array('status_id' => $status ));

            if($statusChange){


                // Notification

                    $data['users'] = $this->Supermodel->select_data('T_User', array('user_id' => $user) );
        

                    $body="Your are blocked by the superadmin.";
                    
                    $data['get_user_email'] = $this->Supermodel->select_data('T_User', array('email' => $data['users'][0]->email ));

                    $subject = 'You are blocked by the admin.';

                    $to_email = $data['users'][0]->email;
                    
                    
                    $headers = '';
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    $sts =  $this->send_mail($to_email,$subject,$body,$headers);



                $this->session->set_flashdata('user_blocked', '<div class="alert alert-success">
                  <strong>User blocked successfully.</strong>
                </div>');


            } else {
                $this->session->set_flashdata('user_blocked', '<div class="alert alert-danger">
                  <strong>User already blocked.</strong>
                </div>');
            }
            
        }

        function superhome(){
            
            $data['total_users'] = $this->Supermodel->select_data('T_User', array('user_id != ' => NULL ) , array('user_id' => 'desc'));

            $data['total_store'] = $this->Supermodel->select_data('T_Store', array('store_id != ' => NULL ) , array('store_id' => 'desc'));
            
            $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity', array('beacon_activity_id != ' => NULL ) , array('beacon_activity_id' => 'desc'));


            $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL ) , array('payment_id' => 'desc'));
            
            $data['users'] = $this->Supermodel->select_data('T_User', array('user_id != ' => NULL ) , array('user_id' => 'desc'));

            $data['getCountCredits'] = $this->Supermodel->getCountCredits();

            $data['super_email'] = $this->session->userdata('super_email');


            $this->load->view('superadmin/dashboard', $data);   
        
        }
        
        function login(){
            $this->load->view('superadmin/superlogin');
        }


        function check_login() {

            if ($_POST) {
                $email = $this->input->post("username");
                $password = $this->input->post("password");

                $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email));


                $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');

                if ($this->form_validation->run() == FALSE){
                    
                    // $this->session->set_flashdata('superlogin_error', 'Please enter valid email address');
                    $this->load->view('superadmin/superlogin');
                
                } else {
                    if($data['superadmin']){

                        $data['superadminpass'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email, 'password' => $password));

                        if($data['superadminpass']){

                                    $newdata = array(
                                        'super_email' => $data['superadmin'][0]->email,
                                        'logged_in' => TRUE
                                    );

                                   $data['total_users'] = $this->Supermodel->select_data('T_User', array('user_id != ' => NULL ) , array('user_id' => 'desc'));

                                        $data['total_store'] = $this->Supermodel->select_data('T_Store', array('store_id != ' => NULL ) , array('store_id' => 'desc'));
                                        
                                        $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity', array('beacon_activity_id != ' => NULL ) , array('beacon_activity_id' => 'desc'));


                                        $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL ) , array('payment_id' => 'desc'));
                                        
                                        $data['users'] = $this->Supermodel->select_data('T_User', array('user_id != ' => NULL ) , array('user_id' => 'desc'));

                                    $data['getCountCredits'] = $this->Supermodel->getCountCredits();

                                    $this->session->set_userdata($newdata);
                                    
                                    $data['super_email'] = $this->session->userdata('super_email');







                                        









                                    $this->load->view('superadmin/dashboard', $data);   
                                
                        }else{
                            $this->session->set_flashdata('superlogin_error', 'Password doesn\'t match');
                            $this->load->view('superadmin/superlogin');
                        }

                    } else {
                        
                        $this->session->set_flashdata('superlogin_error', 'Email address doesn\'t exists');
                        $this->load->view('superadmin/superlogin');
                    }
                }   

            }else{
                $this->load->view('superadmin/superlogin');
            }

        }


        function reset_password(){

            if($_POST){

                  $this->form_validation->set_rules('password', 'Password', 'required');
                  $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');

                  if ($this->form_validation->run() == FALSE){
                    
                    $this->load->view('superadmin/reset_password');
                
                  } else {

                    $password = $this->input->post("password");
                    $email = $this->input->post("email");                    

                    // var_dump($email."new");
                    // die;

                    $update = $this->Supermodel->update('T_Superadmin', array('email' => $email ), array('password' => $password));

                    

                    $this->session->set_flashdata('superlogin_error', '<div style="text-align:center;" class="alert alert-success">
                        <strong>Password reset successfully.</strong>
                    </div>');
                    
                    redirect('supercontroller/login');

                  }  

            }

            $data['email'] =  $_GET['email'];
            $this->load->view('superadmin/reset_password', $data);
        }

        function forgot_password(){

            if($_POST){

                $this->form_validation->set_rules('username', 'Username', 'required|valid_email');

                if ($this->form_validation->run() == FALSE){
                    
                    // $this->session->set_flashdata('forgot_error', 'Please enter valid email address');
                    $this->load->view('superadmin/forgot_password');
                
                } else {
                    // if($data['superadmin']){

                        $email = $this->input->post("username");

                        $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email));

                        if($data['superadmin']){

                            $url = str_replace(' ', '', base_url('index.php/supercontroller/reset_password'));
                            $body=" <a href='" . $url . "?email=" . $email."'>Click</a> here to reset your password";
                            $subject = 'Reset your password';
                            $to_email = $email;
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $sts = $this->send_mail($to_email,$subject,$body,$headers);

                            $this->session->set_flashdata('superlogin_error', 'Reset password link has been sent to you email');

                            $this->load->view('superadmin/superlogin');                                
                        
                        }else{

                            $this->session->set_flashdata('forgot_error', 'Email doesn\'t exists');
                            $this->load->view('superadmin/forgot_password');
                        }

                }
            }    

            $this->load->view('superadmin/forgot_password');
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
                  <strong>Profile update successfully.</strong>
                </div>');

            redirect('control/profile');
                    
            }

        }

        function logout() {
            $this->session->sess_destroy();
            redirect('supercontroller/login');
        }


        function setting(){
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            

            // $points = $this->db->get('T_Payment');
            // $points = $this->Adminmodel->countPoints();

            // // var_dump($points);die;


            $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')));
            

            $this->load->view("setting", $data);
        }

    }
