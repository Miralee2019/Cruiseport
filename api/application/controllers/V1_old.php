<?php
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/apn.php';

// require APPPATH . '/libraries/smtp/Send_mail.php';

class V1 extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Apimodel');
        date_default_timezone_set("Asia/Kolkata");

    }


    function userRegistration_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

         // echo md5(time()); die;      
        if(($post["is_social"]) == "1"){
            if($post["fb_userid"] !=''){
                
                
                    $user = $this->Apimodel->select_data('T_User',array('fb_userid'=>$post["fb_userid"]));
                        
                    if($user[0]->otp_verify == 0){
                        $delete_data = $this->Apimodel->delete('T_User', array('fb_userid' => $post["fb_userid"] ));
                    }    

                    $phone_number = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"] ));
                    $after_delete = $this->Apimodel->select_data('T_User', array('fb_userid' => $post["fb_userid"] ));

                    // $phone_number = $this->Apimodel->select_data('T_User',array('phone_number'=>$post["phone_number"]));
                                


                                if($after_delete){
                                    $responsearray = array("status"=>6009,"success" => false, "message" => "Email id is already registered", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                } elseif($phone_number) {
                                    $responsearray = array("status"=>6009,"success" => false, "message" => "Phone number already exists.", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                } else {


                                    $insert_arr=[
                                          "name"=>$post['name'],  
                                          "email"=>$post['email'],  
                                          "password"=>md5($post['password']),
                                          "is_social"=>$post['is_social'],
                                          "fb_userid"=>$post['fb_userid'],
                                          "phone_number"=>$post['phone_number']
                                    ];
                                    $insert_res= $this->Apimodel->insert('T_User',$insert_arr);
                                   

                                  //  $res1 = $this->Apimodel->update('T_User', array('user_id'=>$insert_res), array('otp' => '1234') );
                                    
                                    $insert_id = $this->Apimodel->select_data('T_User',array('user_id'=>$insert_res));

                                    $result = [
                                                      "user_id" => $insert_id[0]->user_id,
                                                      "name"=>$post['name'],  
                                                      "email"=>$post['email'],  
                                                      "password"=>md5($post['password']),
                                                      "is_social"=>$post['is_social'],
                                                      "fb_userid"=>$post['fb_userid'],
                                                      "phone_number"=>$post['phone_number'] 
                                    ];
                                      
                                    for($i=5;$i>0;$i--){
                                            $str = rand(1000,9999); 
                                    }

                                    $str = $str;
                                    $match = $str;

                                    // $body=" <b>'".$match."'</b>Please enter this OTP to verify your phone number";

                                    // $subject = 'Your OTP for phone number verification';
                                    // $to_email = $post['email'];
                                                    
                                    // $headers = "MIME-Version: 1.0" . "\r\n";
                                    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                    // $sts =  $this->send_mail($to_email,$subject,$body,$headers);

                                    $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=".$post['phone_number']."&message=Your+verification+code+is ".$match."&sender=ABCDEF&route=4&country=0");



                                    $updateOtp = $this->Apimodel->update('T_User', array('user_id' => $insert_res ), array('otp' => $match) );                                                


                                    $responsearray = array("status"=>2000,"success" => true, "message" => "Sign Up Successful", "result" => $result);
                                    $this->response($responsearray, REST_Controller::HTTP_OK);
      
                                }

              
            }else{
                    $required = array(        
                          "name"=>$post['name'],  
                          "email"=>$post['email'],  
                          "password"=>$post['password'],
                          "is_social"=>$post['is_social'],
                          "fb_userid"=>$post['fb_userid'],
                          "phone_number"=>$post['phone_number']
                    ); 

                    $key = array_keys($required, "");  

                    $key = json_encode(array_values($key));
                    $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                    $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
            
            }


        } else{

            $post = json_decode(file_get_contents("php://input"), true);
            $keys = array_keys($post); //convert json into array formate

            $required=array(
                
                          "name"=>$post['name'],  
                          "email"=>$post['email'],  
                          "password"=>$post['password'],
                          "is_social"=>$post['is_social'],
                          "phone_number"=>$post['phone_number']
            );


            $key = array_keys($required, "");
            
            if (!$key) {
                    
                    $user = $this->Apimodel->select_data('T_User', array('email' => $post["email"] ));
                    
                    if($user[0]->otp_verify == 0){
                        $delete_data = $this->Apimodel->delete('T_User', array('email' => $post["email"] ));
                    }

                    $phone_number = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"] ));
                    $after_delete = $this->Apimodel->select_data('T_User', array('email' => $post["email"] ));
                    
                    if($after_delete){
                        $responsearray = array("status"=>6002,"success" => false, "message" => "Email id is already registered", "result" => new stdClass());   
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    } elseif($phone_number) {
                        $responsearray = array("status"=>6002,"success" => false, "message" => "Phone number already exists.", "result" => new stdClass());   
                        $this->response($responsearray, REST_Controller::HTTP_OK);

                    }else{

                                    $post_arr=[
                                        'name'=>$post["name"] ,
                                        'email'=>$post["email"] ,
                                        'password'=>md5($post["password"]),
                                        'is_social'=>$post["is_social"] ,
                                        'phone_number'=>$post["phone_number"] 
                                    ];
                            $check_email = $this->Apimodel->insert('T_User', $post_arr);
                            $res = $this->Apimodel->select_data('T_User', array('user_id' => $check_email ));

                            
                            
                            // $url = str_replace(' ', '', base_url('index.php/Welcome/verify_email/'));
                            // $res = $this->Apimodel->select_data('T_User', array('email_address' => $post["email_address"]));
                            
                            $res = $this->Apimodel->select_data('T_User', array('email' => $post["email"] ));


                            $post_arr2 = 
                            array(
                                    "user_id"=>$res[0]->user_id,
                                    "name"=>$post['name']?:'',
                                    "email"=>$post['email']?:'',
                                    "password"=>md5($post['password'])?:'',
                                    "is_social"=>$post['is_social'],
                                    "phone_number"=>$post['phone_number'] ?:''
                                    
                            );

                            //  $res1 = $this->Apimodel->update('T_User',array('email'=>$post["email"]),array('otp' => "1234") );
                              

                                    for($i=5;$i>0;$i--){
                                            $str = rand(1000,9999); 
                                    }

                                    $str = $str;
                                    $match = $str;

                                    
                                    // $body=" <b>'".$match."'</b>Please enter this OTP to verify your phone number";

                                    // $subject = 'Your OTP for phone number verification';
                                    // $to_email = $post['email'];
                                                    
                                    // $headers = "MIME-Version: 1.0" . "\r\n";
                                    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                    // $sts =  $this->send_mail($to_email,$subject,$body,$headers);


                                    $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=".$post['phone_number']."&message=Your+verification+code+is ".$match."&sender=ABCDEF&route=4&country=0");



                                    $updateOtp = $this->Apimodel->update('T_User', array('user_id' => $check_email ), array('otp' => $match) );




                            // $body=" <a href='" . $url . "/" . $res[0]->user_id."'>Click</a> here to verify your email address";

                            // $subject = 'Verify Email';

                            // $to_email = $post["email_address"];

                            // $headers = "MIME-Version: 1.0" . "\r\n";
                            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



                            // $sts =  $this->send_mail($to_email,$subject,$body,$headers);

                            // if($sts){

                                $responsearray = array("status"=>2000,"success" => true, "message" => "Sign-up successful. Please verify otp.", "result" => $post_arr2);    
                                $this->response($responsearray, REST_Controller::HTTP_OK);

                            // }
                            // else{
                            //     $responsearray = array("status"=>6002,"success" => false, "message" => "Something went wrong , please try after sometime.", "result" => new stdClass());   
                            //     $this->response($responsearray, REST_Controller::HTTP_OK);
                            // }
                    }
                            
            } else {

                            $key = json_encode(array_values($key));
                            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                            $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass);
                            $this->response($responsearray, REST_Controller::HTTP_OK);

            } 
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



    function userLogin_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

         // echo md5(time()); die;      
            if(($post["is_social"]) == "1"){
                
                if($post["fb_userid"] !=''){
                    $res=$this->Apimodel->select_data('T_User',array('fb_userid'=>$post["fb_userid"]));
                    
                    if($res){
                        $res=$this->Apimodel->select_data('T_User',array('fb_userid'=>$post["fb_userid"]));


                        if($res[0]->otp_verify == 1){

                            if($res[0]->status_id == 1){

                                $data = $this->Apimodel->select_data('T_User',array('fb_userid'=>$post["fb_userid"]) );


                                $result = [
                                    "user_id"=>$data[0]->user_id,
                                    "name"=>$data[0]->name ?:'',
                                    "email"=>$data[0]->email?:'',
                                    "password"=>$data[0]->password?:'',
                                    "is_social"=>$data[0]->is_social,
                                    "phone_number"=>$data[0]->phone_number ?:'',
                                    "city" => $data[0]->city? :'',
                                    "state" => $data[0]->state? :'',
                                    "address" => $data[0]->address? :'',
                                    "gender" => $data[0]->gender? :'',
                                    "profile_image" => $data[0]->profile_image ? base_url()."uploads/".$data[0]->profile_image : ''            
                                ];

                                $responsearray = array("status"=>2000,"success" => true, "message" => "You are logged in successfully.", "result" => $result);
                                $this->response($responsearray, REST_Controller::HTTP_OK);

                            } else {
                                $responsearray = array("status"=>2000,"success" => false, "message" => "Your account is blocked by super admin.", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            }

                        } else {

                                $delete_data = $this->Apimodel->delete('T_User', array('fb_userid' => $post["fb_userid"] ));
                    

                                $responsearray = array("status"=>6004,"success" => false, "message" => "User does not exist", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);

                        }

                    } else {
                        $responsearray = array("status"=>6006,"success" => false, "message" => "User does not exist", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }

                } else {
                        
                    $required = array(        
                          
                          "email"=>$post['email'],  
                          "password"=>$post['password'],
                          "is_social"=>$post['is_social']
                          
                    ); 

                    $key = array_keys($required, "");  

                    $key = json_encode(array_values($key));
                    $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                    $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);    

                }

            } else {
                   
                $required = array(        
                   "email"=>$post['email'],  
                   "password"=>$post['password'],
                   "is_social"=>$post['is_social']
                );  
                $key = array_keys($required, "");

                if (!$key) {

                    $res = $this->Apimodel->select_data('T_User', array('email' => $post['email'] ));
                          // var_dump($res);die; 
                    if ($res) {

                        $res1 = $this->Apimodel->select_data('T_User', array('email' => $post["email"], 'password' => md5($post["password"]) ));

                        if($res1){

                            if($res[0]->otp_verify == 1){


                                if($res[0]->status_id == 1){

                                    $data = $this->Apimodel->select_data('T_User',array('email'=>$post["email"]) );


                                    $result = [
                                        "user_id"=>$data[0]->user_id,
                                        "name"=>$data[0]->name ?:'',
                                        "email"=>$data[0]->email?:'',
                                        "password"=>$data[0]->password?:'',
                                        "is_social"=>$data[0]->is_social,
                                        "phone_number"=>$data[0]->phone_number ?:'',
                                        "city" => $data[0]->city? :'',
                                        "state" => $data[0]->state? :'',
                                        "address" => $data[0]->address? :'',
                                        "gender" => $data[0]->gender? :'',
                                        "profile_image" => $data[0]->profile_image ? base_url()."uploads/".$data[0]->profile_image : ''
                                    ];
                                                            


                                    $responsearray = array("status"=>2000,"success" => true, "message" => "You are logged in successfully.", "result" => $result);
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                } else {

                                    $responsearray = array("status"=>2000,"success" => false, "message" => "Your account is blocked by super admin.", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);
                                }
                                
                            } else {

                                $delete_data = $this->Apimodel->delete('T_User', array('email' => $post["email"] ));
                    
                                
                                $responsearray = array("status"=>6004,"success" => false, "message" => "User does not exist", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);    
                                                
                            }
                                            
                        } else {
                            $responsearray = array("status"=>6004,"success" => false, "message" => "Email ID or Password you have entered is incorrect", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);    
                        }

                    } else{
                            
                        $responsearray = array("status"=>6006,"success" => false, "message" => "User does not exist", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);

                    } 

                }else{

                    $key = json_encode(array_values($key));
                    $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                    $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);

                }
            
            }

    }     

    
    function forgotPassword_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["email"]';



        $required=array(
            "email"=>$post['email']
        );

        $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('email' => $post["email"]  ));

                            if($res1){


                                
                                $url = str_replace(' ', '', base_url('index.php/Welcome/forgot_password'));
                    
                                $body=" <a href='" . $url . "?email=" . $res1[0]->email."'>Click</a> here to change you password.";
                    

                                $subject = 'Recover password';
                                $to_email = $post["email"];
                                
                                
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                $sts =  $this->send_mail($to_email,$subject,$body,$headers);  

                                $update_send_time = $this->Apimodel->update('T_User', array('email'=>$post['email']), array('activity' => 'forgot_password_request'  ) );                              

                                if($sts){

 
                                
                                    $responsearray = array("status"=>2000,"success" => true, "message" => "Reset password link has been sent to your email", "result" => new stdClass());    
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                }
                                else{

                                    $responsearray = array("status"=>6002,"success" => false, "message" => "Something went wrong,please try after sometime.", "result" => new stdClass());   
                                    $this->response($responsearray, REST_Controller::HTTP_OK);
                                }
                               

                            }    
                            else{

                                $responsearray = array("status"=>6003,"success" => false, "message" => "Email address does not exist", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => array());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }          

   


    function verifyPhoneNumber_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

         $sample = '["user_id","otp","access_token"]';



            $required=array(
                "user_id"=>$post['user_id'],
                "otp"=>$post['otp']
            );


 // var_dump($post['phone_number']);



            $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));        

                        if($res1>0){


                            
                            $otptime = $this->Apimodel->getOtpTimeDiff($post['user_id']);
                            

                            if(!empty($post['phone_number'])){

                                if($otptime[0]->otptime < 30){
                                            
                                    $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"], 'otp' => $post["otp"]));
                                
                                    if ($res > 0) {

                                        $phone_number_update = $this->Apimodel->update('T_User', array('user_id'=>$post['user_id']), array('phone_number' => $post['phone_number'] , 'otp_verify' => '1' , 'status_id' => '1'  ) );


            // var_dump($phone_number_update);die;                            

     
                                        $email_get = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
                                        $body="You have updated your phone number recently.";

                                        $subject = 'Phone number update';
                                        $to_email = $email_get[0]->email;
                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                        
                                        $sts =  $this->send_mail($to_email,$subject,$body,$headers);


                                    
                                        $responsearray = array("status"=>2001,"success" => true, "message" => "Your phone number has been verified successfully.", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);

                                    }
                                    else {
                                        $responsearray = array("status"=>6001,"success" => false, "message" => "You have entered an invalid OTP.","result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);    
                                    
                                    }

                                }else{

                                    $responsearray = array("status"=>6001,"success" => false, "message" => "Please resend OTP.","result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                }

                            } else {

                                if($otptime[0]->otptime < 30){
                                            
                                    $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"], 'otp' => $post["otp"]));
                                
                                    if ($res > 0) {

                                        $again = $this->Apimodel->update('T_User', array('user_id'=>$post['user_id']), array('otp_verify' => '1','status_id' => '1' ) );
                                        

     
                                        $chk_email = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
                                        $body="You have registered successfully in Cashrub.";

                                        $subject = 'Sign Up successful';
                                        $to_email = $chk_email[0]->email;
                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                        
                                        $sts =  $this->send_mail($to_email,$subject,$body,$headers);


                                    
                                        $responsearray = array("status"=>2001,"success" => true, "message" => "Your phone number has been verified successfully.", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);

                                    }
                                    else {
                                        $responsearray = array("status"=>6001,"success" => false, "message" => "You have entered an invalid OTP.","result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);    
                                    
                                    }

                                }else{

                                    $responsearray = array("status"=>6001,"success" => false, "message" => "Please resend OTP.","result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                }

                            }
                            
                        }   
                        else{

                            $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exist","result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK); 

                        } 
            } else { 
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }


    function resendOTP_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

         $sample = '["user_id","access_token"]';



         $required=array(
                "user_id"=>$post['user_id']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                            if($res1 > 0){

                                $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                            
                                if ($res > 0) {

                                    // var_dump($res[0]->phone_number);die;

                                    if($res[0]->phone_number == ''){

                                         $responsearray = array("status"=>6002,"success" => false, "message" => "We are unable to find your Phone number - please try again with your valid Phone number.","result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);    

                                    }
                                    else{

                                    $phone = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                                    // var_dump($phone[0]->phone_number);die;
                                        for($i=5;$i>0;$i--){
                                            $str2 = rand(1000,9999); 
                                    }

                                    $str2 = $str2;
                                    $match2 = $str2;

                                    // $body=" <b>'".$match2."'</b>Please enter this OTP to verify your phone number";

                                    // $subject = 'Your OTP for phone number verification';
                                    // $to_email = $res[0]->email;
                                                    
                                    // $headers = "MIME-Version: 1.0" . "\r\n";
                                    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                    // $sts =  $this->send_mail($to_email,$subject,$body,$headers);




                                    // var_dump($insert_res);die;

                                    $agiain = $this->Apimodel->update('T_User', array('user_id' => $post['user_id'] ), array('otp' => $match2) );

                                    $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=".$post['phone_number']."&message=Your+verification+code+is ".$match2."&sender=ABCDEF&route=4&country=0");

// var_dump($match2);die;

                                    
// var_dump($updateOtp);die;
                                   //  $again = $this->Apimodel->update('T_User', array('user_id'=>$post['user_id']), array('otp' => '1111') );
                                    

                                        $responsearray = array("status"=>2002,"success" => true, "message" => "OTP has been sent to your phone number.", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);    
                                    }
                                }
                                else {
                                   
                                     $responsearray = array("status"=>6002,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);   
                                }

                            }    
                            else{

                                $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }


    

     function allStoreDetails_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



            // $required=array(
            //     "user_id"=>$post['user_id']
            // );

            // $key = array_keys($required, "");
            
                // if (!$key) {
                //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                            // if($res1 > 0){

                                $store_data = $this->Apimodel->getStoreDetail();
                            
                                if ($store_data > 0) {

                                    
                                        $page_index = $post["page_index"]?:'1';
                                        $page_count = $post["page_count"]?:'100';


                                            foreach ($store_data as $key) {

 $chk_if_store_fav = $this->Apimodel->select_data('T_UserFavorites', array('favorite_type' => "store" ,'type_id' => $key->store_id ));

                                                $lat1 = "23.2599333";
                                                $lon1 = "77.41261499999996";

                                                // $lat1 = $post['latitude'];
                                                // $lon1 = $post['longitude'];
                                                
                                                $lat2 = $key->store_latitude;
                                                $lon2 = $key->store_longitude;
                                            
                                                $distance = "1000"; 
                                            

                                                $theta = $lon1 - $lon2;
                                                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                                                $dist = acos($dist);
                                                $dist = rad2deg($dist);
                                                $miles = $dist * 60 * 1.1515;
                                                $meters = $miles*1609.34;
                                                $km = $miles*1.60934;
                                                $unit = strtoupper($unit);

                                                // if($km <= $distance ){

                                                    $result[] = array(
                                                        "store_id" => $key->store_id ?:'',
                                                        "store_first_name" => $key->store_first_name ?:'', 
                                                        "store_last_name" => $key->store_last_name ?:'',
                                                        "store_email" => $key->store_email ?:'',
                                                        "store_mobile_no" => $key->store_mobile_no ?:'',
                                                        "category" => $key->category_name ?:'',
                                                        "store_address1" => $key->store_address1 ?:'',
                                                        "store_address2" => $key->store_address2 ?:'',
                                                        "store_description" => $key->store_description ?:'',
                                                        "store_open_hours" => $key->store_open_hours ?:'',
                                                        "store_close_hours" => $key->store_close_hours ?:'',
                                                        "store_logo" => "http://cashrub.canopus-projects.com/cashrub_admin/uploads/".$key->store_logo ?:'',
                                                        "store_latitude" => $key->store_latitude ? : '',
                                                        "store_longitude" => $key->store_longitude ?:'',
                                                        "created_date" => $key->created_date ?:'',
                                                        "store_point" => $key->store_point ? $key->store_point : '0',
                                                        "walking_points" => $key->walking_point ? $key->walking_point : '0',
                                                        "is_favorite" => $chk_if_store_fav ? true : false,
                                                        "rating" => rand(1,5),
                                                        "like" => rand(1,10),
                                                        "distance" => round($km, 2)." Km"
                                                    
                                                    );

                                                // }


                                                
                                                  
                                                
                                            }
                                            
                                            $page_from = ($page_index - 1) * $page_count;
                                            
                                            $s = array_slice($result, $page_from, $page_count);


                                            $responsearray = array("status"=>2000,"success" => true, "message" => "Store List Fetch successfully", "result" => $s ? $s : new stdClass() );
                                            $this->response($responsearray, REST_Controller::HTTP_OK);


                                } else {
                                   
                                    $responsearray = array("status"=>6002,"success" => false, "message" => "Stores Not Found", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);   
                                }

                            // }    
                            // else{

                            //     $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                            //             $this->response($responsearray, REST_Controller::HTTP_OK); 

                            // }

            // }else{
            //     $key = json_encode(array_values($key));
            //     $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            //     $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
            //     $this->response($responsearray, REST_Controller::HTTP_OK);
            // }

    }






    function allOfferDetails_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["store_id","access_token"]';



            // $required=array(
                
            //     "latitude" => $post['latitude'],
            //     "longitude"=>$post['longitude'],
            //     "distance" => $post['distance']
            // );

            // $key = array_keys($required, "");
            
            // if (!$key) {
                //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                            // if($res1 > 0){

                                $latitude = $post['latitude'];
                                $longitude = $post['longitude'];
                                $distance = "5";


                                $store_data = $this->Apimodel->getFullStoreOfferDetail();
                                // var_dump($store_data);die;
                            
                                if ($store_data > 0) {




                                    
                                        $page_index = $post["page_index"]?:'1';
                                        $page_count = $post["page_count"]?:'100';


                                        foreach ($store_data as $key) {
                                                    
                                            $chk_if_offer_fav = $this->Apimodel->select_data('T_UserFavorites', array('favorite_type' => "offer" ,'type_id' => $key->store_offer_id ));
                                                        

                                            $lat1 = $latitude;
                                            $lon1 = $longitude;
                                            $lat2 = $key->store_latitude;
                                            $lon2 = $key->store_longitude;
                                        
                 
                                        

                                            $theta = $lon1 - $lon2;
                                            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                                            $dist = acos($dist);
                                            $dist = rad2deg($dist);
                                            $miles = $dist * 60 * 1.1515;
                                            $meters = $miles*1609.34;
                                            $km = $miles*1.60934;
                                            $unit = strtoupper($unit);
                                            // var_dump($km)   ;die;

                                            if($km <= $distance ){

                                                $result[] = array(
                                                    "store_offer_id" => $key->store_offer_id ?:'',
                                                    "title" => $key->title ?:'',
                                                    "description" => $key->description ?:'',
                                                    "category_name" => $key->category_name ?:'',
                                                    "facebook_points" => ($key->facebook_points)." Points" ?:'',
                                                    "twitter_points" => ($key->twitter_points)." Points" ?:'',
                                                    "walking_points" => ($key->store_walkin) ?:'',
                                                    "terms_and_conditions" => $key->terms_and_conditions ?:'',
                                                    "offer_image" => "http://cashrub.canopus-projects.com/cashrub_admin/uploads/".$key->offer_image ?:'',
                                                    "store_logo" => "http://cashrub.canopus-projects.com/cashrub_admin/uploads/".$key->store_logo ?:'',

                                                    "publish_date" => $key->publish_date ?:'',
                                                    "store_offer_id" => $key->store_offer_id ?:'',
                                 
                                                    "store_first_name" => $key->store_first_name ?:'',
                                                    "created_date" => $key->created_date ?:'',                                                      

                                                    "expiry_date" => $key->expiry_date ?:'',
                                                    "offer_status" => $key->status_name,
                                                    "latitude" => $key->store_latitude,
                                                    "longitude" => $key->store_longitude,
                                                    "store_address" => $key->store_address1,
                                                    "distance" => round($km, 2)." Km",
                                                    "is_favorite" => $chk_if_offer_fav ? true : false,
                                                    "color" =>  '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT)



                                                );   
                                            }

                                        }
                                            
                                        $page_from = ($page_index - 1) * $page_count;
                                            
                                        $s = array_slice($result, $page_from, $page_count);


                                        $responsearray = array("status"=>2000,"success" => true, "message" => "Store Offer List Fetch successfully", "result" => $s ? $s : new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);


                                } else {
                                   
                                    $responsearray = array("status"=>6002,"success" => false, "message" => "Offer Not Found", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);   
                                }

                            // }    
                            // else{

                            //     $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                            //             $this->response($responsearray, REST_Controller::HTTP_OK); 

                            // }

            // }else{
            //     $key = json_encode(array_values($key));
            //     $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            //     $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
            //     $this->response($responsearray, REST_Controller::HTTP_OK);
            // }

    }


    // function shareOfferWithSocial_post(){

    //     $post = json_decode(file_get_contents("php://input"), true);
    //     $keys = array_keys($post); //convert json into array formate
    //     sort($keys); //sort array to campare with sample string

    //     $sample = '["user_id","access_token"]';



    //         $required=array(
    //             "store_offer_id" => $post['store_offer_id'],
    //             "user_id"=>$post['user_id'],
    //             "social_type"=>$post['social_type']
    //         );

    //         $key = array_keys($required, "");
            
    //         if (!$key) {
    //                     $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

    //                     if($res1 > 0){


    //                         if($post['social_type'] == 1){
                                    
    //                                 $res=$this->Apimodel->select_data('T_StoreOfferSocialPoint',array('store_offer_id'=>$post["store_offer_id"]));
                                    
    //                                 $share_type = "facebook_points";

    //                                 $insert_arr=[
    //                                     "user_id"=>$post['user_id'],  
    //                                     "store_offer_id"=>$post['store_offer_id'], 
    //                                     "store_id"=> $res[0]->store_id, 
    //                                     "share_type"=>$share_type,
    //                                     "points" => $res[0]->facebook_points
    //                                 ];

    //                                 $insert_res= $this->Apimodel->insert('T_SocialSharePoint',$insert_arr);

    //                                 $user_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

    //                                 if($user_Points){

    //                                     if($user_Points[0]->facebook_points == NULL){

    //                                         $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("facebook_points" => $res[0]->facebook_points ));

    //                                     } else {
                                            
    //                                         $old_facebook_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

    //                                         $newpoints = ($old_facebook_Points[0]->facebook_points) + $res[0]->facebook_points;

    //                                         $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("facebook_points" => $newpoints ));
    //                                     }

    //                                 }else{

    //                                     $insert_arr=[
    //                                             "user_id"=>$post['user_id'],   
    //                                             "facebook_points"=> $res[0]->facebook_points
    //                                         ];

    //                                     $insert_res= $this->Apimodel->insert('T_UserPoint',$insert_arr);
    //                                 }

    //                         } elseif ($post['social_type'] == 2) {
                                    
    //                                 $res=$this->Apimodel->select_data('T_StoreOfferSocialPoint',array('store_offer_id'=>$post["store_offer_id"]));
                                    
    //                                 $share_type = "twitter_points";

    //                                 $insert_arr=[
    //                                     "user_id"=>$post['user_id'],  
    //                                     "store_id"=> $res[0]->store_id, 
    //                                     "store_offer_id"=>$post['store_offer_id'],  
    //                                     "share_type"=>$share_type,
    //                                     "points" => $res[0]->twitter_points
    //                                 ];

    //                                 $insert_res= $this->Apimodel->insert('T_SocialSharePoint',$insert_arr);

    //                                 $user_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

    //                                 if($user_Points){

    //                                     if($user_Points[0]->twitter_points == NULL){

    //                                         $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("twitter_points" => $res[0]->twitter_points ));

    //                                     } else {
                                            
    //                                         $old_twitter_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

    //                                         $newpoints = ($old_twitter_Points[0]->twitter_points) + $res[0]->twitter_points;

    //                                         $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("twitter_points" => $newpoints ));
    //                                     }

    //                                 }else{

    //                                     $insert_arr=[
    //                                             "user_id"=>$post['user_id'],   
    //                                             "twitter_points"=> $res[0]->twitter_points
    //                                         ];

    //                                     $insert_res= $this->Apimodel->insert('T_UserPoint',$insert_arr);
    //                                 }

    //                         }else {


    //                                 $res=$this->Apimodel->select_data('T_StoreOfferSocialPoint',array('store_offer_id'=>$post["store_offer_id"]));
                                    
    //                                 $share_type = "walking_points";

    //                                 $insert_arr=[
    //                                     "user_id"=>$post['user_id'],  
    //                                     "store_id"=> $res[0]->store_id, 
    //                                     "store_offer_id"=>$post['store_offer_id'],  
    //                                     "share_type"=>$share_type,
    //                                     "points" => $res[0]->walking_points
    //                                 ];

    //                                 $insert_res= $this->Apimodel->insert('T_SocialSharePoint',$insert_arr);

    //                                 $user_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

    //                                 if($user_Points){

    //                                     if($user_Points[0]->walking_points == NULL){

    //                                         $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("walking_points" => $res[0]->walking_points ));

    //                                     } else {
                                            
    //                                         $old_walking_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

    //                                         $newpoints = ($old_walking_Points[0]->walking_points) + $res[0]->walking_points;

    //                                         $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("walking_points" => $newpoints ));
    //                                     }

    //                                 }else{

    //                                     $insert_arr=[
    //                                             "user_id"=>$post['user_id'],   
    //                                             "walking_points"=> $res[0]->walking_points
    //                                         ];

    //                                     $insert_res= $this->Apimodel->insert('T_UserPoint',$insert_arr);
    //                                 }

    //                     }


    //                     $responsearray = array("status"=>2000,"success" => true, "message" => "Offer shared successfully", "result" => $s ? $s : new stdClass());
    //                     $this->response($responsearray, REST_Controller::HTTP_OK);


                              

    //                     } else {

    //                             $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
    //                             $this->response($responsearray, REST_Controller::HTTP_OK); 

    //                     }

    //         }else{
    //             $key = json_encode(array_values($key));
    //             $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
    //             $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
    //             $this->response($responsearray, REST_Controller::HTTP_OK);
    //         }

    // }


        function shareOfferWithSocial_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



            $required=array(
                "store_offer_id" => $post['store_offer_id'],
                "user_id"=>$post['user_id'],
                "social_type"=>$post['social_type']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                        if($res1 > 0){


                            if($post['social_type'] == 1){


                                // to check for the already user share the same offer 
                                
                                $ifAlreadyShared = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"] , 'store_offer_id' => $post["store_offer_id"] , 'share_type' => "facebook_points" ));

                                if($ifAlreadyShared){

                                    $responsearray = array("status"=>2000,"success" => false, "message" => "Offer already shared from this user.", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                }else{


                                    $res=$this->Apimodel->select_data('T_StoreOfferSocialPoint',array('store_offer_id'=>$post["store_offer_id"]));
                                    
                                    $share_type = "facebook_points";

                                    $insert_arr=[
                                        "user_id"=>$post['user_id'],  
                                        "store_offer_id"=>$post['store_offer_id'], 
                                        "store_id"=> $res[0]->store_id, 
                                        "share_type"=>$share_type,
                                        "points" => $res[0]->facebook_points,
                                        "facebook_points" => $res[0]->facebook_points
                                    ];

                                    $insert_res= $this->Apimodel->insert('T_SocialSharePoint',$insert_arr);

                                    $user_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

                                    if($user_Points){

                                        if($user_Points[0]->facebook_points == NULL){

                                            $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("facebook_points" => $res[0]->facebook_points ));

                                        } else {
                                            
                                            $old_facebook_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

                                            $newpoints = ($old_facebook_Points[0]->facebook_points) + $res[0]->facebook_points;

                                            $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("facebook_points" => $newpoints ));
                                        }

                                    }else{

                                        $insert_arr=[
                                                "user_id"=>$post['user_id'],   
                                                "facebook_points"=> $res[0]->facebook_points
                                            ];

                                        $insert_res= $this->Apimodel->insert('T_UserPoint',$insert_arr);
                                    }

                                }

                            } elseif ($post['social_type'] == 2) {

                                // to check for the already user share the same offer 
                                
                                $ifAlreadyShared = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"] , 'store_offer_id' => $post["store_offer_id"] , 'share_type' => "twitter_points" ));

                                    if($ifAlreadyShared){

                                        $responsearray = array("status"=>2000,"success" => false, "message" => "Offer already shared from this user.", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);

                                    }else{

                                        $res=$this->Apimodel->select_data('T_StoreOfferSocialPoint',array('store_offer_id'=>$post["store_offer_id"]));
                                    
                                        $share_type = "twitter_points";

                                        $insert_arr=[
                                            "user_id"=>$post['user_id'],  
                                            "store_id"=> $res[0]->store_id, 
                                            "store_offer_id"=>$post['store_offer_id'],  
                                            "share_type"=>$share_type,
                                            "points" => $res[0]->twitter_points,
                                            "twitter_points" => $res[0]->twitter_points
                                        ];

                                        $insert_res = $this->Apimodel->insert('T_SocialSharePoint',$insert_arr);

                                        $user_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

                                        if($user_Points){

                                            if($user_Points[0]->twitter_points == NULL){

                                                $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("twitter_points" => $res[0]->twitter_points ));

                                            } else {
                                                
                                                $old_twitter_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

                                                $newpoints = ($old_twitter_Points[0]->twitter_points) + $res[0]->twitter_points;

                                                $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("twitter_points" => $newpoints ));
                                            }

                                        }else{

                                            $insert_arr=[
                                                    "user_id"=>$post['user_id'],   
                                                    "twitter_points"=> $res[0]->twitter_points
                                                ];

                                            $insert_res= $this->Apimodel->insert('T_UserPoint',$insert_arr);
                                        }
                                    }    


                            }else {


                                    $res=$this->Apimodel->select_data('T_StoreOfferSocialPoint',array('store_offer_id'=>$post["store_offer_id"]));
                                    
                                    $share_type = "walking_points";

                                    $insert_arr=[
                                        "user_id"=>$post['user_id'],  
                                        "store_id"=> $res[0]->store_id, 
                                        "store_offer_id"=>$post['store_offer_id'],  
                                        "share_type"=>$share_type,
                                        "points" => $res[0]->walking_points
                                    ];

                                    $insert_res= $this->Apimodel->insert('T_SocialSharePoint',$insert_arr);

                                    $user_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

                                    if($user_Points){

                                        if($user_Points[0]->walking_points == NULL){

                                            $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("walking_points" => $res[0]->walking_points ));

                                        } else {
                                            
                                            $old_walking_Points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"] ));

                                            $newpoints = ($old_walking_Points[0]->walking_points) + $res[0]->walking_points;

                                            $update_points = $this->Apimodel->update('T_UserPoint', array('user_id'=>$post['user_id']), array("walking_points" => $newpoints ));
                                        }

                                    }else{

                                        $insert_arr=[
                                                "user_id"=>$post['user_id'],   
                                                "walking_points"=> $res[0]->walking_points
                                            ];

                                        $insert_res= $this->Apimodel->insert('T_UserPoint',$insert_arr);
                                    }

                        }


                        $responsearray = array("status"=>2000,"success" => true, "message" => "Offer shared successfully", "result" => $s ? $s : new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);


                              

                        } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK); 

                        }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }



    function getUserPoints_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



            $required=array(
                "user_id"=>$post['user_id']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                            if($res1 > 0){

                                $points = $this->Apimodel->select_data('T_UserPoint',array('user_id'=>$post["user_id"]));

                                if($points){

                                    $result = [
                                        "facebook_points" => $points[0]->facebook_points ?: '0' ,
                                        "twitter_points"=>$points[0]->twitter_points ?: '0' ,  
                                        "walking_points"=>$points[0]->walking_points ?: '0' ,
                                        "total_points"=> ($points[0]->facebook_points)+($points[0]->twitter_points)+($points[0]->walking_points)
                                    ];
 
                                    $responsearray = array("status"=>2000,"success" => true, "message" => "User Points", "result" => $result );
                                      $this->response($responsearray, REST_Controller::HTTP_OK);
                                } else {
                                    $responsearray = array("status"=>2000,"success" => true, "message" => "User don't have any points", "result" => new stdClass() );
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                }
                            
                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }


    function getCategory_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



            // $required=array(
            //     "user_id"=>$post['user_id']
            // );

            // $key = array_keys($required, "");
            
            // if (!$key) {
                        $category = $this->Apimodel->select_data('T_Categorys', array('category_id !=' => "0" ));

                            if($category){

                                

                                            foreach ($category as $key) {

                                                    $result[] = array(

                                                        "category_id" => $key->category_id ?:'', 
                                                        "category_name" => $key->name ?:'',
                                                        "category_image" => "http://cashrub.canopus-projects.com/cashrub_api/assets/images/".$key->category_image ?:''
                                                        
                                                        
                                                    );
                                            }

                                    
 
                                    $responsearray = array("status"=>2000,"success" => true, "message" => "Category list.", "result" => $result );
                                      $this->response($responsearray, REST_Controller::HTTP_OK);
                                                        
                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "Category not found.", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            // }else{
            //     $key = json_encode(array_values($key));
            //     $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            //     $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
            //     $this->response($responsearray, REST_Controller::HTTP_OK);
            // }

    }

    function getProfile_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



            $required=array(
                "user_id"=>$post['user_id']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $profile = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id'] ));

                            if($profile){

                                $result = [
                                    "user_id"=>$profile[0]->user_id,
                                    "name"=>$profile[0]->name ?:'',
                                    "email"=>$profile[0]->email?:'',
                                    "password"=>$profile[0]->password?:'',
                                    "is_social"=>$profile[0]->is_social,
                                    "phone_number"=>$profile[0]->phone_number ?:'',
                                    "city" => $profile[0]->city? :'',
                                    "state" => $profile[0]->state? :'',
                                    "address" => $profile[0]->address? :'',
                                    "gender" => $profile[0]->gender?:'',
                                    "profile_image" => $profile[0]->profile_image ? base_url()."uploads/".$profile[0]->profile_image : ''
                                ];

                                $responsearray = array("status"=>2000,"success" => true, "message" => "Profile detail", "result" => $result );
                                $this->response($responsearray, REST_Controller::HTTP_OK);

                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "User not found.", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }

    function saveUserFavorites_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

            $sample = '["user_id","access_token"]';



            $required=array(
                "user_id"=>$post['user_id'],
                "favorite_type"=>$post['favorite_type'],
                "type_id"=>$post['type_id']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                            if($res1 > 0){

                                $chk_if_already = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post["user_id"] , 'favorite_type' => $post["favorite_type"] ,'type_id' => $post["type_id"] ));

                                if($chk_if_already){

                                        $responsearray = array("status"=>1910,"success" => false, "message" => "You have already favorite this", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);

                                } else {

                                    $insert_arr=[
                                              "user_id"=>$post['user_id'],  
                                              "favorite_type"=>$post['favorite_type'],  
                                              "type_id"=>$post['type_id']
                                        ];
                                    $insert_res= $this->Apimodel->insert('T_UserFavorites',$insert_arr);

                                    $responsearray = array("status"=>2000,"success" => true, "message" => "You have favorite this", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                }

                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }


function updateUserProfile_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
                  
        $sample = '["user_id"]';

// var_dump($post);die;

        $required=array(
            "user_id" => $post["user_id"]
        );


        $key = array_keys($required, "");
          //var_dump($post['is_tracking_on']);die;  
            if (!$key) {
                $user = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                if($user){

                    if(!empty($post['email'])){

                        if($user[0]->email != $post['email']){


                                $ck_email_al = $this->Apimodel->select_data('T_User', array('email' => $post["email"]));

                                if($ck_email_al){

                                    $responsearray = array("status"=>2202,"success" => false, "message" => "Email address already exists.", "result" => new stdClass() );
                                    $this->response($responsearray, REST_Controller::HTTP_OK);
                                    

                                } else {

                                    $url = str_replace(' ', '', base_url('index.php/Welcome/update_email_request'));
                    
                                    $body="You have request to update your email <a href='".$url."?email=".$user[0]->email."&updateemail=".$post['email']."'>Click</a> here to update you email address.";
                        
                                    // var_dump($body);die;
                                    $subject = 'Update email request';
                                    $to_email = $post['email'];
                                    
                                    
                                    $headers = "MIME-Version: 1.0" . "\r\n";
                                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                    $sts =  $this->send_mail($to_email,$subject,$body,$headers);                                


                                    $responsearray = array("status"=>2111,"success" => true, "message" => "Verification link is sent to your mail for email updation request.", "result" => new stdClass() );
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                }

                        }

                    }

                    if(!empty($post['phone_number'])){

                        if($user[0]->phone_number != $post['phone_number']){

                            $ck_phone_al = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));

                            if($ck_phone_al){

                                $responsearray = array("status"=>7112,"success" => false, "message" => "Phone number already exists", "result" => new stdClass() );

                                $this->response($responsearray, REST_Controller::HTTP_OK);

                            } else {

                                for($i=5;$i>0;$i--){
                                $str2 = rand(1000,9999); 
                                }

                                $str2 = $str2;
                                $match2 = $str2;

                                $update_mobile_request = $this->Apimodel->update('T_User', array('user_id' => $post['user_id'] ), array('otp' => $match2) );

                                $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=".$post['phone_number']."&message=Your+verification+code+is ".$match2."&sender=ABCDEF&route=4&country=0");


                                $responsearray = array("status"=>2112,"success" => true, "message" => "OTP is sent to your mobile number for the mobile number update", "result" => new stdClass() );

                                $this->response($responsearray, REST_Controller::HTTP_OK);

                            }

                            
                        }
                    }

                    

                    $post_arr = [
                            'email' => $post["email"]? : $user[0]->email, 
                            'phone_number' => $post["phone_number"]? : '',
                            'address' => $post['address']? : '',
                            'city' => $post['city']? : '',
                            'state' => $post['state']? : '',
                            'gender' => $post['gender']? : $user[0]->gender,
                            'name' => $post['name']? : '',
                            'profile_image' => $post['profile_image'] ? $this->uploadimage($post['profile_image']): $user[0]->profile_image
                    ];                                      
                      
                        $res = $this->Apimodel->update('T_User', array('user_id' => $post["user_id"]), $post_arr);

                        $user_d = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                        $post_arr2 = [
                            'user_id' => $user_d[0]->user_id ? :'',
                            'name' => $user_d[0]->name ? : '', 
                            'email_address' => $user_d[0]->email? : '', 
                            'phone_number' => $user_d[0]->phone_number? :'' , 
                            'city' => $user_d[0]->city? :'',
                            'state' => $user_d[0]->state? :'',
                            'address' => $user_d[0]->address? :'',
                            'gender' => $user_d[0]->gender? :'',
                            'profile_image' => $user_d[0]->profile_image ? base_url()."uploads/".$user_d[0]->profile_image : ''
                              
                        ];


                        $responsearray = array("status"=>2113,"success" => true, "message" => "User profile updated successfully", "result" => $post_arr2);
                        $this->response($responsearray, REST_Controller::HTTP_OK);

                }else{
                    $responsearray = array("status"=>6017,"success" => false, "message" => "User Doesn't Exists.", "result" => new stdClass());    
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } 
            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
    
    }   
   

    public function uploadimage($img) {
        // echo $img;
        $imgdata = explode('base64,', $img);
        
        if (empty($imgdata[1])) {
            $img_new = 'base64,' . $img;
            $imgdata = explode('base64,', $img_new);
            $data = base64_decode($imgdata[1]);
        } else {
            // var_dump($imgdata[0]);die;
            $data = base64_decode($imgdata[1]);
            
        }
        
        $filename = uniqid() . '.jpg';
        //$file = '/opt/lampp/htdocs/uber/codeignitor/uploads' . '/' . $filename;
        // $file = "D:/INETPUB/VHOSTS/canopussystems.com/marvelapp.canopussystems.com/uploads/$filename";
        
        $file = getcwd() . '/uploads/'.$filename;

        $success = file_put_contents($file, $data);
        if ($success) {
            return $filename;
        } else {
            return 'error';
        }
    }


    function getBeaconDetails_post(){
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
                  
        $sample = '["user_id"]';


        $required=array(
            "uuid" => $post["uuid"],
            "major" => $post["major"],
            "minor" => $post["minor"]
        );


        $key = array_keys($required, "");
          
            if (!$key) {
                $beacon = $this->Apimodel->select_data('T_Beacon', array('uuid' => $post["uuid"],'major_value' => $post["major"],
                'minor_value' => $post["minor"] ));

                if($beacon){
                        $post_arr = [
                            'beacon_id' => $beacon[0]->beacon_id, 
                            'store_id' => $beacon[0]->store_id? : '',
                            'uuid' => $beacon[0]->uuid? : '',
                            'major' => $beacon[0]->major_value? : '',
                            'name' => $beacon[0]->name? : '',
                            'minor' => $beacon[0]->minor_value? : ''
                        ];                                      
                      
                        $responsearray = array("status"=>2014,"success" => true, "message" => "Beacon details fetch successfully", "result" => $post_arr);
                        $this->response($responsearray, REST_Controller::HTTP_OK);

                }else{
                    $responsearray = array("status"=>6017,"success" => false, "message" => "No beacon found.", "result" => new stdClass());    
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } 
            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
    
    }   


function getAllBeacon_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

            $sample = '["user_id"]';



            $required=array(
                "latitude" =>$post['latitude'],
                "longitude" =>$post['longitude']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $beacon_data = $this->Apimodel->select_data('T_Beacon');

                            if($beacon_data > 0){

                                        $page_index = $post["page_index"]?:'1';
                                        $page_count = $post["page_count"]?:'100';

                                        foreach ($beacon_data as $key) {

                                            $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $key->store_id ));


                                            // find distance near by distance


                                                // $lat1 = "23.2599333";
                                                // $lon1 = "77.41261499999996";

                                                $lat1 = $post['latitude'];
                                                $lon1 = $post['longitude'];
                                                
                                                $lat2 = $get_store_name[0]->store_latitude;
                                                $lon2 = $get_store_name[0]->store_longitude;
                                            
                                                $distance = "100"; 
                                            

                                                $theta = $lon1 - $lon2;
                                                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                                                $dist = acos($dist);
                                                $dist = rad2deg($dist);
                                                $miles = $dist * 60 * 1.1515;
                                                $meters = $miles*1609.34;
                                                $km = $miles*1.60934;
                                                $unit = strtoupper($unit);

                                              // var_dump($km);die;

                                            // end find distance


                                                if($km <= $distance ){

                                                        $result[] = array(

                                                            "beacon_id" => $key->beacon_id ? : '',
                                                            "store_id" => $key->store_id ?:'',
                                                            "store_name" => $get_store_name[0]->store_first_name ?:'',
                                                            "beacon_name" => $key->name ?:'',
                                                            "beacon_place" => $key->beacon_place ?:'',
                                                            "uuid" => $key->uuid ?:'',
                                                            "major" => $key->major_value ?:'',
                                                            "minor" => $key->minor_value ?:''
                                                        
                                                                
                                                    );

                                                }
                                        

                                        }

                                    $page_from = ($page_index - 1) * $page_count;
                                    $s = array_slice($result, $page_from, $page_count);

                                    $responsearray = array("status"=>2000,"success" => true, "message" => "Beacon information fetch successfully", "result" => $s ? $s : new stdClass() );
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                

                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "No beacon found", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }


function getBeaconList_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

            // $sample = '["user_id"]';



            // $required=array(
            //     "latitude" =>$post['latitude'],
            //     "longitude" =>$post['longitude']
            // );

            // $key = array_keys($required, "");
            
            // if (!$key) {

            foreach ($post['beacon_list'] as $key) {

                // echo $key['beacon_id'];


                $chk_for_becon_id_from_uuid = $this->Apimodel->select_data('T_Beacon', array(
                        'uuid' => $key['uuid'],
                        'major_value' => $key['major'],
                        'minor_value' => $key['minor'] 
                    )
                );

                $get_beacon_chk_for_entrance = $this->Apimodel->select_data('T_BeaconActivity', array(
                        'beacon_id' => $chk_for_becon_id_from_uuid[0]->beacon_id,
                        'store_id' => $chk_for_becon_id_from_uuid[0]->store_id,
                        'beacon_place' => $chk_for_becon_id_from_uuid[0]->beacon_place
                    )
                );

                if($get_beacon_chk_for_entrance){

                    if( $get_beacon_chk_for_entrance[0]->beacon_place != "Entrance Store" ){

                        $insert_beacon_detection = [
                            "beacon_id"=> $chk_for_becon_id_from_uuid[0]->beacon_id,  
                            "store_id"=> $chk_for_becon_id_from_uuid[0]->store_id,
                            "beacon_place" => $chk_for_becon_id_from_uuid[0]->beacon_place,  
                            "user_id"=>$post['user_id'],
                            "detected_date" => date("Y-m-d"),
                            "detected_time" => date("h:i:s")
                        ];


                        $insert_beacon_other_than_entrance = $this->Apimodel->insert('T_BeaconActivity',$insert_beacon_detection);
                        $responsearray = array("status"=>2000,"success" => true, "message" => "Beacon passed other stall in shop", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);

                    } else {


                        // update exit time of beacon


                        $chk_if_already_beacon = $this->Apimodel->select_data(
                                    'T_BeaconActivity', array(
                                    'beacon_id' => $chk_for_becon_id_from_uuid[0]->beacon_id, 
                                    'store_id' => $chk_for_becon_id_from_uuid[0]->store_id,
                                    'user_id' => $post["user_id"],
                                    'exit_time' => '00:00:00' 
                        ));


                        $update_beacon=[
                            "exit_date" => date("Y-m-d"),  
                            "exit_time" => date("h:i:s")
                        ];

                        $update_beacon_exit = $this->Apimodel->update('T_BeaconActivity', array(
                                'beacon_id' => $chk_for_becon_id_from_uuid[0]->beacon_id, 
                                'store_id' => $chk_for_becon_id_from_uuid[0]->store_id,
                                'user_id' => $post["user_id"] 
                            ), $update_beacon 
                        );

                        foreach ($chk_if_already_beacon as $key) {
                                       
                            $getSpent = $this->Apimodel->getSpendTimeOfBeacon($key->beacon_activity_id); 

                            $update_spent_time = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $chk_for_becon_id_from_uuid[0]->beacon_id , 'store_id' => $chk_for_becon_id_from_uuid[0]->store_id ,'user_id' => $post["user_id"] , 'beacon_activity_id' => $key->beacon_activity_id ), array('total_spent_time' => $getSpent[0]->time_difference ));        
                                        
                        }


                        $responsearray = array("status"=>1920,"success" => true, "message" => "Beacon is out of range", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);

                        // end


                    }


                    $chk_for_other_beacon_of_store = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $key['beacon_id'],'beacon_place' => $key['beacon_place'] ));


                } else {

                    $insert_beacon_detection = [
                        "beacon_id"=> $chk_for_becon_id_from_uuid[0]->beacon_id,  
                        "store_id"=> $chk_for_becon_id_from_uuid[0]->store_id,
                        "beacon_place" => $chk_for_becon_id_from_uuid[0]->beacon_place,  
                        "user_id"=>$post['user_id'],
                        "detected_date" => date("Y-m-d"),
                        "detected_time" => date("h:i:s")
                    ];


                    $insert_beacon = $this->Apimodel->insert('T_BeaconActivity',$insert_beacon_detection);
                    $responsearray = array("status"=>2000,"success" => true, "message" => "Beacon detected", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);            

                }
            }

            die;

                        $beacon_data = $this->Apimodel->select_data('T_Beacon');

                            if($beacon_data > 0){

                                        $page_index = $post["page_index"]?:'1';
                                        $page_count = $post["page_count"]?:'100';

                                        foreach ($beacon_data as $key) {

                                            $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $key->store_id ));


                                            // find distance near by distance


                                                // $lat1 = "23.2599333";
                                                // $lon1 = "77.41261499999996";

                                                $lat1 = $post['latitude'];
                                                $lon1 = $post['longitude'];
                                                
                                                $lat2 = $get_store_name[0]->store_latitude;
                                                $lon2 = $get_store_name[0]->store_longitude;
                                            
                                                $distance = "100000"; 
                                            

                                                $theta = $lon1 - $lon2;
                                                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                                                $dist = acos($dist);
                                                $dist = rad2deg($dist);
                                                $miles = $dist * 60 * 1.1515;
                                                $meters = $miles*1609.34;
                                                $km = $miles*1.60934;
                                                $unit = strtoupper($unit);

                                              

                                            // end find distance


                                                if($km <= $distance ){

                                                        $result[] = array(


                                                            "beacon_id" => $key->beacon_id ? : '',
                                                            "store_id" => $key->store_id ?:'',
                                                            "store_name" => $get_store_name[0]->store_first_name ?:'',
                                                            "beacon_name" => $key->name ?:'',
                                                            "beacon_place" => $key->beacon_place ?:'',
                                                            "uuid" => $key->uuid ?:'',
                                                            "major" => $key->major_value ?:'',
                                                            "minor" => $key->minor_value ?:''
                                                        
                                                                
                                                    );

                                                }
                                        

                                        }

                                    $page_from = ($page_index - 1) * $page_count;
                                    $s = array_slice($result, $page_from, $page_count);

                                    $responsearray = array("status"=>2000,"success" => true, "message" => "Beacon information fetch successfully", "result" => $s ? $s : new stdClass() );
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                

                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "No beacon found", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            // }else{
            //     $key = json_encode(array_values($key));
            //     $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            //     $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
            //     $this->response($responsearray, REST_Controller::HTTP_OK);
            // }

}   



function getBeaconDetectOld_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

            $sample = '["user_id"]';



            $required=array(    

                "uuid" => $post['uuid'],
                "major" => $post['major'],
                "minor" => $post['minor'],
                "user_id"=>$post['user_id']
                // "store_id"=>$post['store_id'],
                // "beacon_id" => $post['beacon_id']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                            if($res1 > 0){

                                $get_beacon_id_from_uuid = $this->Apimodel->select_data('T_Beacon', array('uuid' => $post["uuid"],'major_value' => $post["major"],'minor_value' => $post["minor"] ) );

                                $beacon_id = $get_beacon_id_from_uuid[0]->beacon_id;
                                $store_id = $get_beacon_id_from_uuid[0]->store_id;
                                $beacon_place = $get_beacon_id_from_uuid[0]->beacon_place;
                                

                                $chk_beacon_activity = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $beacon_id,'store_id' => $store_id,'beacon_place' => $beacon_place , 'user_id' => $post["user_id"],'exit_time' => '00:00:00'));

                                if($chk_beacon_activity){

                                    $beacon_move_to_store = $beacon_place;

                                    if($beacon_move_to_store != "Entrance Store" ){

                                        $chk_1 = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $beacon_id,'store_id' => $store_id,'beacon_place' => $beacon_place , 'user_id' => $post["user_id"],'exit_time' => '00:00:00','beacon_place !=' => 'Entrance Store' ));


                                        if($chk_1[0]->flag_of_inside_store != "complete" ){

                                            $beacon_detection_within_store = [
                                                  "beacon_id"=> $beacon_id, 
                                                  "beacon_place"=> $beacon_place, 
                                                  "store_id"=> $store_id,  
                                                  "user_id"=>$post['user_id'],
                                                  "detected_date" => date("Y-m-d"),
                                                  "detected_time" => date("h:i:s")
                                            ];

                                            $insert_beacon_detection_within_store = $this->Apimodel->insert('T_BeaconActivity',$beacon_detection_within_store);


                                            $update_beacon_inside = [
                                                "exit_date" => date("Y-m-d"),  
                                                "exit_time" => date("h:i:s"),
                                                "flag_of_inside_store" => "complete"
                                            ];


                                            $update_beacon_flag_after_inside = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'beacon_place' => $beacon_place,'user_id' => $post["user_id"] , 'exit_time' => '00:00:00' ), $update_beacon_inside );

                                            $update_beacon_of_inside = [
                                                "exit_date" => date("Y-m-d"),  
                                                "exit_time" => date("h:i:s"),
                                                "flag_of_inside_store" => "complete"
                                            ];

                                            $update_beacon_flag_of_inside = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] , 'exit_time' => '00:00:00' ,'beacon_place' => 'Entrance Store' ), $update_beacon_of_inside );

                                            


                                            // $update_beacon_status_after_inside = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] , 'exit_time' => '00:00:00' ), $update_beacon_inside );


                                            $get_store_name1 = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                            $message1 = "Beacon detected under ".$get_store_name1[0]->store_first_name." store";

                                            $responsearray = array("status"=>1920,"success" => true, "message" => $message1, "result" => new stdClass());
                                            $this->response($responsearray, REST_Controller::HTTP_OK);

                                        }

                                    } else {


                                        $chk_2 = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $beacon_id,'store_id' => $store_id,'beacon_place' => $beacon_place , 'user_id' => $post["user_id"],'exit_time' => '00:00:00','beacon_place' => 'Entrance Store' ));

                                        if($chk_2[0]->flag_of_inside_store != "complete" ){

                                            $update_beacon_detection = [
                                                  "beacon_id"=> $beacon_id, 
                                                  "beacon_place"=> $beacon_place, 
                                                  "store_id"=> $store_id,  
                                                  "user_id"=>$post['user_id'],
                                                  "detected_date" => date("Y-m-d"),
                                                  "detected_time" => date("h:i:s")
                                            ];

                                            // $update_beacon=[
                                            //     "exit_date" => date("Y-m-d"),  
                                            //     "exit_time" => date("h:i:s")
                                            // ];

                                            $update_beacon_exit = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] ), $update_beacon_detection );


                                            // foreach ($chk_beacon_activity as $key) {
                                           
                                            //     $getSpent = $this->Apimodel->getSpendTimeOfBeacon($key->beacon_activity_id); 

                                            //     $update_spent_time = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] , 'beacon_activity_id' => $key->beacon_activity_id ), array('total_spent_time' => $getSpent[0]->time_difference ));        
                                            
                                            // }

                                            // if($beacon_place != "Entrance Store"){

                                            //     $responsearray = array("status"=>1920,"success" => true, "message" => "Beacon move to the other store", "result" => new stdClass());
                                            //     $this->response($responsearray, REST_Controller::HTTP_OK);

                                            // }else{

                                            $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));

                                            $message = "Beacon detected near ".$get_store_name[0]->store_first_name;

                                            $responsearray = array("status"=>1920,"success" => true, "message" => $message, "result" => new stdClass());
                                            $this->response($responsearray, REST_Controller::HTTP_OK);
                                                    
                                            // }

                                        } else {
                                            $update_beacon_exit = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] , 'beacon_place' => "Entrance Store" ), array('flag_of_inside_store' => "complete"));
                                        }

                                        
                                        
                                    }

                                } else {

                                    $insert_beacon_detection = [
                                              "beacon_id"=> $beacon_id, 
                                              "beacon_place"=> $beacon_place, 
                                              "store_id"=> $store_id,  
                                              "user_id"=>$post['user_id'],
                                              "detected_date" => date("Y-m-d"),
                                              "detected_time" => date("h:i:s")
                                                  
                                    ];


                                    $insert_res= $this->Apimodel->insert('T_BeaconActivity',$insert_beacon_detection);

                                    // if($beacon_place != "Entrance Store"){

                                    //         $responsearray = array("status"=>1920,"success" => true, "message" => "Beacon enter to the store", "result" => new stdClass());
                                    //         $this->response($responsearray, REST_Controller::HTTP_OK);

                                    //     }else{

                                            $responsearray = array("status"=>2000,"success" => true, "message" => "Beacon detected", "result" => new stdClass());
                                            $this->response($responsearray, REST_Controller::HTTP_OK);            
                                    
                                        // }


                                    
                                }                               

                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }


// new 16 june api


    function getBeaconDetect_post(){

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

            $sample = '["user_id"]';



            $required=array(    

                "uuid" => $post['uuid'],
                "major" => $post['major'],
                "minor" => $post['minor'],
                "user_id"=>$post['user_id']
                // "store_id"=>$post['store_id'],
                // "beacon_id" => $post['beacon_id']
            );

            $key = array_keys($required, "");
            
            if (!$key) {
                        $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));

                            if($res1 > 0){

                                $get_beacon_id_from_uuid = $this->Apimodel->select_data('T_Beacon', array('uuid' => $post["uuid"],'major_value' => $post["major"],'minor_value' => $post["minor"] ) );

                                $beacon_id = $get_beacon_id_from_uuid[0]->beacon_id;
                                $store_id = $get_beacon_id_from_uuid[0]->store_id;
                                $beacon_place = $get_beacon_id_from_uuid[0]->beacon_place;
                                
                                $chk_beacon_activity = $this->Apimodel->select_data('T_BeaconActivity', array(
                                    'beacon_id' => $beacon_id,
                                    'store_id' => $store_id,
                                    'beacon_place' => $beacon_place,
                                    'user_id' => $post["user_id"],
                                    'exit_time' => '00:00:00'
                                ));

                                // if($beacon_place != "Entrance Store"){

                                    // echo "yes";


                                if($beacon_place != "Entrance Store"){
                                     if($chk_beacon_activity[0]->flag_of_inside_store == 'inside_detection'){


                                        $update_inside_beacon_detection = [
                                            "beacon_id"=> $beacon_id, 
                                            "beacon_place"=> $beacon_place, 
                                            "store_id"=> $store_id,  
                                            "user_id"=>$post['user_id'],
                                            "detected_date" => date("Y-m-d"),
                                            "detected_time" => date("h:i:s")
                                        ];

                                        $update_if_already_detected_earlier = $this->Apimodel->update('T_BeaconActivity', array(
                                            "beacon_id"=> $beacon_id, 
                                            "beacon_place"=> $beacon_place, 
                                            "store_id"=> $store_id,  
                                            "user_id"=>$post['user_id'],
                                            "exit_time"=> "00:00:00"
                                        ), array(
                                            "detected_date" => date("Y-m-d"),
                                            "detected_time" => date("h:i:s")
                                        ));

                                        $get_store_name_in_updation_1 = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                        $message_2 = "Beacon detected inside ".$get_store_name_in_updation_1[0]->store_first_name;
                                        $responsearray = array("status"=>2000,"success" => true, "message" => $message_2, "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);  


                                    } else {

                                        $inside_beacon_detection = [
                                            "beacon_id"=> $beacon_id, 
                                            "beacon_place"=> $beacon_place, 
                                            "store_id"=> $store_id,  
                                            "user_id"=>$post['user_id'],
                                            "detected_date" => date("Y-m-d"),
                                            "detected_time" => date("h:i:s")
                                        ];


                                        $insert_1 = $this->Apimodel->insert('T_BeaconActivity',$inside_beacon_detection);

                                        $update_flag_of_detect = $this->Apimodel->update('T_BeaconActivity', array(
                                            "beacon_id"=> $beacon_id, 
                                            "beacon_place"=> $beacon_place, 
                                            "store_id"=> $store_id,  
                                            "user_id"=>$post['user_id']
                                        ), array('flag_of_inside_store' => 'inside_detection'));


                                        $get_store_name_1 = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                        $message = "Beacon detected inside ".$get_store_name_1[0]->store_first_name;

                                        $responsearray = array("status"=>2000,"success" => true, "message" => $message, "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);    

                                    }
                                }

                                   

                                // } else {


                                //     $chk__2 = $this->Apimodel->select_data('T_BeaconActivity', array(
                                //         'beacon_id' => $beacon_id,
                                //         'store_id' => $store_id,
                                //         'beacon_place' => "Center Store",
                                //         'user_id' => $post["user_id"],
                                //         'exit_time' => '00:00:00'
                                //     ));



                                //     if($chk_2[0]->flag_of_inside_store == "inside_detection"){

                                //         // var_dump("if  inside");
                                //         // die;

                                //         $update_3 = $this->Apimodel->update('T_BeaconActivity', array(
                                //                 "beacon_id"=> $beacon_id, 
                                //                 "beacon_place"=> "Center Store", 
                                //                 "store_id"=> $store_id,  
                                //                 "user_id"=>$post['user_id']
                                //             ), array(
                                //                 "exit_time" => date("Y-m-d"),
                                //                 "exit_date" => date("h:i:s")
                                //         ));

                                //         $get_store_name_in_updation_3 = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                //         $message_3 = "Beacon detected near ".$get_store_name_in_updation_3[0]->store_first_name;
                                            
                                //         $responsearray = array("status"=>2000,"success" => true, "message" => $message_3, "result" => new stdClass());
                                //         $this->response($responsearray, REST_Controller::HTTP_OK);


                                //     }else{

                                if($beacon_place == "Entrance Store"){


                                    $chk_beacon_1 = $this->Apimodel->select_data('T_BeaconActivity', array(
                                        // 'beacon_id' => $beacon_id,
                                        'store_id' => $store_id,
                                        'user_id' => $post["user_id"],
                                        'flag_of_inside_store' => "inside_detection",
                                        'exit_time' => '00:00:00'
                                    ));

                                    // var_dump($chk_beacon_1);die;


                                    if($chk_beacon_1){

                                        // new

                                            $chk_beacon_2 = $this->Apimodel->select_data('T_BeaconActivity', array(
                                                    // 'beacon_id' => $beacon_id,
                                                    'store_id' => $store_id,
                                                    'user_id' => $post["user_id"],
                                                    'flag_of_detection' => "detected"
                                                    // 'exit_time' => '00:00:00'
                                                ));


                                            $to_time = strtotime($chk_beacon_2[0]->detected_time);
                                            $from_time = strtotime(date("h:i:s"));
                                            $time_d = round(abs($to_time - $from_time) / 60,2);

                                        // ?end


                                        $update_4 = $this->Apimodel->update('T_BeaconActivity', array(
                                                // "beacon_id"=> $beacon_id, 
                                                // "beacon_place"=> "Center Store", 
                                                // "flag_of_detection" => "detection",
                                                "flag_of_inside_store" => "inside_detection",
                                                "store_id"=> $store_id,  
                                                "user_id"=> $post['user_id'],
                                                "exit_time"=> "00:00:00"
                                                
                                            ), array(
                                                "exit_date" => date("Y-m-d"),
                                                "exit_time" => date("h:i:s"),
                                                "total_spent_time" => $time_d
                                        ));


                                        // save user point on walkin

                                        if($time_d > 1){

                                            $get_store_alloted_walkin = $this->Apimodel->select_data('T_Store', array(
                                                    'store_id' => $store_id
                                                ));

                                                $get_user_walkin_first = $this->Apimodel->select_data('T_UserPoint', array(
                                                    'user_id' => $post['user_id']
                                                ));

                                                $user_point = $get_user_walkin_first[0]->walking_points;
                                                $store_point = $get_store_alloted_walkin[0]->walking_point;
                                                $new_point = $store_point+$user_point;

                                                if($get_user_walkin_first){

                                                    $update_user_walk_point = $this->Apimodel->update('T_UserPoint', array(
                                                        "user_id"=> $post['user_id']
                                                        ), array(
                                                            "walking_points" => $new_point
                                                    ));

                                                    // echo "yes";die;


                                                }

                                                if(!$get_user_walkin_first){

                                                    $insert_walkin_point = [  
                                                        "user_id"=>$post['user_id'],
                                                        "walking_points" => $new_point
                                                    ];

                                                    $insert_walkin = $this->Apimodel->insert('T_UserPoint',$insert_walkin_point);

                                                    // echo "No";die;
                                                }

                                                

                                        }

                                        // end save user point




                                        $update_5 = $this->Apimodel->update('T_BeaconActivity', array(
                                                // "beacon_id"=> $beacon_id, 
                                                // "beacon_place"=> "Center Store", 
                                                // "flag_of_detection" => "detection",
                                                "flag_of_detection" => "detected",
                                                "store_id"=> $store_id,  
                                                "user_id"=>$post['user_id'],
                                                "exit_time"=> "00:00:00"
                                            ), array(
                                                "exit_date" => date("Y-m-d"),
                                                "exit_time" => date("h:i:s")
                                        ));

                                        // new custom

                                        // $chk_beacon_12 = $this->Apimodel->select_data('T_BeaconActivity', array(
                                        //     // 'beacon_id' => $beacon_id,
                                        //     'store_id' => $store_id,
                                        //     'user_id' => $post["user_id"],
                                        //     'flag_of_inside_store' => "inside_detection",
                                        //     'exit_time !=' => '00:00:00'
                                        // ));

                                        // if($chk_beacon_12){

                                        //     foreach ($chk_beacon_1 as $key) {
                                       
                                        //         $getSpent = $this->Apimodel->getSpendTimeOfBeacon($key->beacon_activity_id); 

                                        //         // var_dump($getSpent[0]->time_difference);die;

                                        //         $update_spent_time_1 = $this->Apimodel->update('T_BeaconActivity', array('beacon_activity_id' => $key->beacon_activity_id ), array('total_spent_time' => $getSpent[0]->time_difference ));        
                                            
                                            
                                        //         var_dump($update_spent_time_1);die;
                                        //     }
                                        //     echo "hello";

                                        // }

                                        
                                        // new custom end


                                        // insert new entrance after first phase complete


                                            $insert_beacon_detection = [
                                                "beacon_id"=> $beacon_id, 
                                                "beacon_place"=> $beacon_place, 
                                                "store_id"=> $store_id,  
                                                "user_id"=>$post['user_id'],
                                                "detected_date" => date("Y-m-d"),
                                                "detected_time" => date("h:i:s")
                                            ];


                                            $insert_res= $this->Apimodel->insert('T_BeaconActivity',$insert_beacon_detection);

                                            $update_flag_of_detect = $this->Apimodel->update('T_BeaconActivity', array(
                                                "beacon_id"=> $beacon_id, 
                                                "beacon_place"=> $beacon_place, 
                                                "store_id"=> $store_id,  
                                                "user_id"=>$post['user_id']
                                            ), array('flag_of_detection' => 'detected'));


                                            $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                            $message = "Beacon detected near ".$get_store_name[0]->store_first_name;

                                            $responsearray = array("status"=>2000,"success" => true, "message" => $message, "result" => new stdClass());
                                            $this->response($responsearray, REST_Controller::HTTP_OK);   


                                        // end

                                    }



                                    if($chk_beacon_activity[0]->flag_of_detection == "detected"){

                                            // var_dump("Entrance with detected");
                                            // die;

                                            $update_beacon_detection = [
                                                "beacon_id"=> $beacon_id, 
                                                "beacon_place"=> $beacon_place, 
                                                "store_id"=> $store_id,  
                                                "user_id"=>$post['user_id'],
                                                "detected_date" => date("Y-m-d"),
                                                "detected_time" => date("h:i:s"),
                                                "exit_time" => "00:00:00"
                                            ];

                                            $update_if_already_detected_earlier = $this->Apimodel->update('T_BeaconActivity', array(
                                                "beacon_id"=> $beacon_id, 
                                                "beacon_place"=> $beacon_place, 
                                                "store_id"=> $store_id,  
                                                "user_id"=>$post['user_id'],
                                                "exit_time" => "00:00:00"
                                            ), array(
                                                "detected_date" => date("Y-m-d"),
                                                "detected_time" => date("h:i:s")
                                            ));

                                            $get_store_name_in_updation = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                            $message_1 = "Beacon detected near ".$get_store_name_in_updation[0]->store_first_name;
                                            
                                            $responsearray = array("status"=>2000,"success" => true, "message" => $message_1, "result" => new stdClass());
                                            $this->response($responsearray, REST_Controller::HTTP_OK);            


                                    } else {

                                            // var_dump("Entrance with fresh");
                                            // die;
                                            $insert_beacon_detection = [
                                                "beacon_id"=> $beacon_id, 
                                                "beacon_place"=> $beacon_place, 
                                                "store_id"=> $store_id,  
                                                "user_id"=>$post['user_id'],
                                                "detected_date" => date("Y-m-d"),
                                                "detected_time" => date("h:i:s")
                                            ];


                                            $insert_res= $this->Apimodel->insert('T_BeaconActivity',$insert_beacon_detection);

                                            $update_flag_of_detect = $this->Apimodel->update('T_BeaconActivity', array(
                                                "beacon_id"=> $beacon_id, 
                                                "beacon_place"=> $beacon_place, 
                                                "store_id"=> $store_id,  
                                                "user_id"=>$post['user_id']
                                            ), array('flag_of_detection' => 'detected'));


                                            $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                            $message = "Beacon detected near ".$get_store_name[0]->store_first_name;

                                            $responsearray = array("status"=>2000,"success" => true, "message" => $message, "result" => new stdClass());
                                            $this->response($responsearray, REST_Controller::HTTP_OK);            
                                            
                                    }
                                        
                                }

                                


                                //     }
                                // }

                                
                                // end
                                
                                // if($chk_beacon_activity){

                                //     var_dump("yes");

                                    // $beacon_move_to_store = $beacon_place;

                                    // if($beacon_move_to_store != "Entrance Store" ){

                                    //     $chk_1 = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $beacon_id,'store_id' => $store_id,'beacon_place' => $beacon_place , 'user_id' => $post["user_id"],'exit_time' => '00:00:00','beacon_place !=' => 'Entrance Store' ));


                                    //     if($chk_1[0]->flag_of_inside_store != "complete" ){

                                    //         $beacon_detection_within_store = [
                                    //               "beacon_id"=> $beacon_id, 
                                    //               "beacon_place"=> $beacon_place, 
                                    //               "store_id"=> $store_id,  
                                    //               "user_id"=>$post['user_id'],
                                    //               "detected_date" => date("Y-m-d"),
                                    //               "detected_time" => date("h:i:s")
                                    //         ];

                                    //         $insert_beacon_detection_within_store = $this->Apimodel->insert('T_BeaconActivity',$beacon_detection_within_store);


                                    //         $update_beacon_inside = [
                                    //             "exit_date" => date("Y-m-d"),  
                                    //             "exit_time" => date("h:i:s"),
                                    //             "flag_of_inside_store" => "complete"
                                    //         ];


                                    //         $update_beacon_flag_after_inside = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'beacon_place' => $beacon_place,'user_id' => $post["user_id"] , 'exit_time' => '00:00:00' ), $update_beacon_inside );

                                    //         $update_beacon_of_inside = [
                                    //             "exit_date" => date("Y-m-d"),  
                                    //             "exit_time" => date("h:i:s"),
                                    //             "flag_of_inside_store" => "complete"
                                    //         ];

                                    //         $update_beacon_flag_of_inside = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] , 'exit_time' => '00:00:00' ,'beacon_place' => 'Entrance Store' ), $update_beacon_of_inside );

                                            

                                    //         $get_store_name1 = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));
                                    //         $message1 = "Beacon detected under ".$get_store_name1[0]->store_first_name." store";

                                    //         $responsearray = array("status"=>1920,"success" => true, "message" => $message1, "result" => new stdClass());
                                    //         $this->response($responsearray, REST_Controller::HTTP_OK);

                                    //     }

                                    // } else {


                                    //     $chk_2 = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $beacon_id,'store_id' => $store_id,'beacon_place' => $beacon_place , 'user_id' => $post["user_id"],'exit_time' => '00:00:00','beacon_place' => 'Entrance Store' ));

                                    //     if($chk_2[0]->flag_of_inside_store != "complete" ){

                                    //         $update_beacon_detection = [
                                    //               "beacon_id"=> $beacon_id, 
                                    //               "beacon_place"=> $beacon_place, 
                                    //               "store_id"=> $store_id,  
                                    //               "user_id"=>$post['user_id'],
                                    //               "detected_date" => date("Y-m-d"),
                                    //               "detected_time" => date("h:i:s")
                                    //         ];

                                    //         // $update_beacon=[
                                    //         //     "exit_date" => date("Y-m-d"),  
                                    //         //     "exit_time" => date("h:i:s")
                                    //         // ];

                                    //         $update_beacon_exit = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] ), $update_beacon_detection );


                                    //         // foreach ($chk_beacon_activity as $key) {
                                           
                                    //         //     $getSpent = $this->Apimodel->getSpendTimeOfBeacon($key->beacon_activity_id); 

                                    //         //     $update_spent_time = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] , 'beacon_activity_id' => $key->beacon_activity_id ), array('total_spent_time' => $getSpent[0]->time_difference ));        
                                            
                                    //         // }

                                    //         // if($beacon_place != "Entrance Store"){

                                    //         //     $responsearray = array("status"=>1920,"success" => true, "message" => "Beacon move to the other store", "result" => new stdClass());
                                    //         //     $this->response($responsearray, REST_Controller::HTTP_OK);

                                    //         // }else{

                                    //         $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id ));

                                    //         $message = "Beacon detected near ".$get_store_name[0]->store_first_name;

                                    //         $responsearray = array("status"=>1920,"success" => true, "message" => $message, "result" => new stdClass());
                                    //         $this->response($responsearray, REST_Controller::HTTP_OK);
                                                    
                                    //         // }

                                    //     } else {
                                    //         $update_beacon_exit = $this->Apimodel->update('T_BeaconActivity', array('beacon_id' => $beacon_id, 'store_id' => $store_id ,'user_id' => $post["user_id"] , 'beacon_place' => "Entrance Store" ), array('flag_of_inside_store' => "complete"));
                                    //     }

                                        
                                        
                                    // }

                                // } else {

                                    

                                    
                                // }                               

                            } else {

                                $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK); 

                            }

            }else{
                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status"=>4000,"success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

    }



}

