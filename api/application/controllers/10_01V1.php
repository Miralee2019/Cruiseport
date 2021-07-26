<?php

//error_reporting(0);

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/apn.php';


// define("upload_url", "http://139.59.18.176/admin/", true);
//define("upload_url", "http://linosys.net/proj/cashrub/admin/", true);
define("upload_url", "http://cashrub.in/cashrub/admin/", true);

// require APPPATH . '/libraries/smtp/Send_mail.php';

class V1 extends REST_Controller
{

    public $google_sms_key;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Apimodel');
        date_default_timezone_set("Asia/Kolkata");

        $this->load->library('email');
        $this->google_sms_key = "MPRXHcnN1Dw";
        /*    $config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'ashishjagtap008@gmail.com',
    'smtp_pass' => 'AJFMDW247',
    'smtp_crypto' => 'security', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
); 
*/
    }

    function applyMultithreading_post()
    {
        $this->load->library('async');
        $url = site_url('v1/send_mail');
        // var_dump($url);die;
        $params = array(
            'to_email' => "designmycode@gmail.com",
            'subject' => "hello",
            'body' => "hello world",
        );

        $this->async->post_async($url, $params);
        //      $this->sendMail();
        // $sts =  $this->send_mail($to_email,$subject,$body,$headers);
        echo "hello";
    }
    /* SUBODH :: Below changes made in the function and flow
    * Send OTP before inserting user data into database. API call is otp_auth_post()
    * Verify mobile number before inserting data into database. API call is verifyPhoneOtpAuth_post
    * Use new API to resend OTP. API Call is resendOTPAuth_post()
    * Additional parameters needs to send in this API call :
    * otp, otp_auth_id, device_id, access_token
    */
    function userRegistration_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; //SUBODH :: for testing, remove later
        sort($keys); //sort array to campare with sample string
        // echo md5(time()); die;
        if (($post["is_social"]) == "1") {
            if ($post["fb_userid"] != '') {

                $user = $this->Apimodel->select_data('T_User', array('fb_userid' => $post["fb_userid"]));
                $user2 = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));

                if ($user1 != 0 && $user1[0]->otp_verify == 0) {
                    $delete_data = $this->Apimodel->delete('T_User', array('email' => $post["email"]));
                } elseif ($user2 != 0 && $user2[0]->otp_verify == 0) {
                    $delete_phone = $this->Apimodel->delete('T_User', array('phone_number' => $post["phone_number"]));
                }

                $phone_number = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));
                $after_delete = $this->Apimodel->select_data('T_User', array('fb_userid' => $post["fb_userid"]));
                $store_phone_number = $this->Apimodel->select_data('T_Store', array('store_mobile_no' => $post["phone_number"]));

                $email = $this->Apimodel->select_data('T_User', array('email' => $post["email"]));

                $chk_store_email = $this->Apimodel->select_data('T_Store', array('store_email' => $post["email"]));

                // $phone_number = $this->Apimodel->select_data('T_User',array('phone_number'=>$post["phone_number"]));

                if ($after_delete || $chk_store_email || $email) {
                    $responsearray = array("status" => 6009, "success" => false, "message" => "Email id is already registered", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } elseif ($phone_number != 0 || $store_phone_number != 0) {
                    $responsearray = array("status" => 6009, "success" => false, "message" => "Phone number already exists.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }/* elseif ($store_email) {

                    $responsearray = array("status" => 6009, "success" => false, "message" => "Email id is already registered", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }*/ else {


                    $insert_arr = [
                        "name" => $post['name'],
                        "email" => $post['email'],
                        "password" => md5($post['password']),
                        "is_social" => $post['is_social'],
                        "fb_userid" => $post['fb_userid'],
                        "phone_number" => $post['phone_number'],
                        "reg_date" => date("Y-m-d"),
                        "reg_time" => date("H:i:s"),
                        "device_token" => $post['device_token'],
                        'access_token' => $post['access_token'],
                        "otp" => $post['otp'],
                        "device_id" => $post['device_id'],
                        "otp_auth_id" => $post['otp_auth_id']
                    ];
                    $insert_res = $this->Apimodel->insert('T_User', $insert_arr);


                    //  $res1 = $this->Apimodel->update('T_User', array('user_id'=>$insert_res), array('otp' => '1234') );

                    $insert_id = $this->Apimodel->select_data('T_User', array('user_id' => $insert_res));

                    $result = [
                        "user_id" => $insert_id[0]->user_id,
                        "name" => $post['name'],
                        "email" => $post['email'],
                        "password" => md5($post['password']),
                        "is_social" => $post['is_social'],
                        "fb_userid" => $post['fb_userid'],
                        "phone_number" => $post['phone_number'],
                        "device_token" => $post['device_token']
                    ];

                    for ($i = 5; $i > 0; $i--) {
                        $str = rand(1000, 9999);
                    }

                    $str = $str;
                    $match = $str;
                    //$post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $post['phone_number'] . "&message=Your+OTP+is " . $match . "&sender=CASHRUB&route=4&country=0");
                    //$updateOtp = $this->Apimodel->update('T_User', array('user_id' => $insert_res), array('otp' => $match));
                    $responsearray = array("status" => 2000, "success" => true, "message" => "Sign Up Successful", "result" => $result);
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {
                $required = array(
                    "name" => $post['name'],
                    "email" => $post['email'],
                    "password" => $post['password'],
                    "is_social" => $post['is_social'],
                    "fb_userid" => $post['fb_userid'],
                    "phone_number" => $post['phone_number'],
                    "device_token" => $post['device_token']
                );

                $key = array_keys($required, "");

                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {

            $post = json_decode(file_get_contents("php://input"), true);
            //$post = $_POST; //SUBODH :: for testing, remove later
            $keys = array_keys($post); //convert json into array formate

            $required = array(
                "name" => $post['name'],
                "email" => $post['email'],
                "password" => $post['password'],
                "is_social" => $post['is_social'],
                "phone_number" => $post['phone_number'],
                "device_token" => $post['device_token'],
                'access_token' => $post['access_token'],
                "otp" => $post['otp'],
                "otp_verify" => '1',
                //"device_id" => $post['device_id'],
                "otp_auth_id" => $post['otp_auth_id']
            );

            $key = array_keys($required, "");

            if (!$key) {

                /*
                $user1 = $this->Apimodel->select_data('T_User', array('email' => $post["email"]));
                $user2 = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));
                
                
                if($user1 != 0 && $user1[0]->otp_verify == 0) {
                    $delete_data = $this->Apimodel->delete('T_User', array('email' => $post["email"]));
                } elseif ($user2 != 0 && $user2[0]->otp_verify == 0) {
                    $delete_phone = $this->Apimodel->delete('T_User', array('phone_number' => $post["phone_number"]));
                }

                $phone_number = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));
                $store_phone_number = $this->Apimodel->select_data('T_Store', array('store_mobile_no' => $post["phone_number"]));
                $after_delete = $this->Apimodel->select_data('T_User', array('email' => $post["email"]));

                $chk_store_email = $this->Apimodel->select_data('T_Store', array('store_email' => $post["email"]));

                if ($after_delete || $chk_store_email) {
                    $responsearray = array("status" => 6002, "success" => false, "message" => "Email id is already registered", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } elseif ($phone_number != 0 || $store_phone_number != 0) {
                    $responsearray = array("status" => 6002, "success" => false, "message" => "Phone number already exists.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } /*elseif () {

                    $responsearray = array("status" => 6002, "success" => false, "message" => "Email id is already registered", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } */
                /*
                else {

                    $post_arr = [
                        'name' => $post["name"],
                        'email' => $post["email"],
                        'password' => md5($post["password"]),
                        'is_social' => $post["is_social"],
                        'phone_number' => $post["phone_number"],
                        'reg_date' => date("Y-m-d"),
                        'reg_time' => date("H:i:s"),
                        'device_token' => $post['device_token'],
                        'access_token' => $post['access_token'],
                        "otp" => $post['otp'],
                        "otp_verify" => '1',
                        "device_id" => $post['device_id'],
                        "otp_auth_id" => $post['otp_auth_id']
                    ]; */
                // $update_device_token = $this->Apimodel->update('T_User', array('email' => $post["email"]), array('device_token' => $post['device_token'], 'access_token' => md5(time())));
                /*
                    $check_email = $this->Apimodel->insert('T_User', $post_arr);
                    $res = $this->Apimodel->select_data('T_User', array('user_id' => $check_email));

                    $res = $this->Apimodel->select_data('T_User', array('email' => $post["email"]));
                    $post_arr2 = array(
                        "user_id" => $res[0]->user_id,
                        "name" => $post['name'] ?: '',
                        "email" => $post['email'] ?: '',
                        "password" => md5($post['password']) ?: '',
                        "is_social" => $post['is_social'],
                        "phone_number" => $post['phone_number'] ?: '',
                        "device_token" => $post['device_token'] ?: '',
                        "access_token" => $post['access_token'],
                        "otp" => $post['otp'],
                        "otp_verify" => '1',
                        "device_id" => $post['device_id'],
                        "otp_auth_id" => $post['otp_auth_id']
                    ); */

                //  $res1 = $this->Apimodel->update('T_User',array('email'=>$post["email"]),array('otp' => "1234") );

                // SUBODH :: Remove OTP authentication from User Registration
                /*
                    for ($i = 5; $i > 0; $i--) {
                        $str = rand(1000, 9999);
                    }

                    $str = $str;
                    $match = $str;
                    $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $post['phone_number'] . "&message=Your+OTP+is " . $match . "&sender=CASHRUB&route=4&country=0");
                    $updateOtp = $this->Apimodel->update('T_User', array('user_id' => $check_email), array('otp' => $match));
                    */

                //SUBODH :: Follow cases
                /*
                    * 1. Simple Login for new user
                    * 2. Registered User 
                    */

                $email_token = md5($post["phone_number"]);

                $post_arr = [
                    'name' => $post["name"],
                    'email' => $post["email"],
                    'password' => md5($post["password"]),
                    'is_social' => $post["is_social"],
                    'phone_number' => $post["phone_number"],
                    "status_id" => '1',
                    'reg_date' => date("Y-m-d"),
                    'reg_time' => date("H:i:s"),
                    'device_token' => $post['device_token'],
                    'access_token' => $post['access_token'],
                    "otp" => $post['otp'],
                    "otp_verify" => '1',
                    //"device_id" => $post['device_id'],
                    "otp_auth_id" => $post['otp_auth_id'],
                    "email_token" => $email_token
                ];
                //print_r($post_arr);die;
                //$exist_number_device = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"], 'device_token' => $post["device_token"]),'1');  
                $exist_number_device = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]), '1');
                if ($exist_number_device > 0) {
                    // SUBODH :: User exists in the system, should go to login, instead for sign up

                    $responsearray = array("status" => 2202, "success" => false, "message" => "Your record found in the system. Please login instead.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
                if ($exist_number_device > 0) {
                    // SUBODH :: User exists in the system, should go to login, instead for sign up

                    $responsearray = array("status" => 2202, "success" => false, "message" => "Your record found in the system. Please login instead.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {

                    //SUBODH :: Check if Device or Number is registered
                    // $exist_number__or_device = $this->Apimodel->select_or_data('T_User', array('phone_number' => $post["phone_number"]), array('device_token' => $post["device_token"]),'1');  

                    //if($exist_number__or_device > 0){
                    // $responsearray = array("status" => 2204, "success" => false, "message" => "Your record found in the system. Please contact support.", "result" => array());
                    //       $this->response($responsearray, REST_Controller::HTTP_OK);
                    // }

                    // SUBODH :: New user sign up                       
                    $config = array(

                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'info@cashrub.com', // change it to yours
                        'smtp_pass' => 'cashrub@77', // change it to yours
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE,
                        "newline" => "\r\n"
                    );
                    $this->load->library('email');

                    $this->email->initialize($config);

                    $signup_user = $this->Apimodel->insert('T_User', $post_arr);
                    $activation_link = base_url() . "index.php/verification/email_verfication/" . $email_token;
                    $this->email->set_mailtype('html');
                    $this->email->from('info@cashrub.com', 'Cashrub');
                    $this->email->to($post["email"]);
                    $this->email->subject('Welcome to Cashrub');



                    $message = "Hello " . $post['name'] . "<br><br>Thank you for signing up!<br>We're so glad you found us. you'll now be the first to know about our latest offers near you.
(Trending Offers Image Links )<br>Please <a href='" . $activation_link . "'>Click Here</a> to verify your email id for future concerns.<br><br>In case of any doubts do visit www.cashrub.com.";
                    //   $message1 = $this->load->view('email/new_user.php', $data_m, TRUE);
                    $this->email->message($message);
                    $this->email->send();

                    if ($signup_user) {
                        // SUBODH :: Sign up successful
                        $responsearray = array("status" => 2000, "success" => true, "message" => "Sign-up successful. Please login with your user name and password.", "result" => $post_arr);
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    } else {
                        // SUBODH :: Sign up un successful
                        $responsearray = array("status" => 2006, "success" => false, "message" => "Sign-up un-successful. Please try after some time.", "result" => $post_arr);
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                }
            } else {

                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        }
    }

    function userLogin_post()
    {
        // print_r($this->google_sms_key);die;
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // echo md5(time()); die;    
        //$post = $_POST;     // SUBODH :: This is for testing, remove it
        if (($post["is_social"]) == "1") {

            if ($post["fb_userid"] != '') {
                $res = $this->Apimodel->select_data('T_User', array('fb_userid' => $post["fb_userid"]));

                if ($res) {
                    $res = $this->Apimodel->select_data('T_User', array('fb_userid' => $post["fb_userid"]));

                    if ($res[0]->otp_verify == 1) {

                        if ($res[0]->status_id == 1) {

                            $update_device_token = $this->Apimodel->update('T_User', array('fb_userid' => $post["fb_userid"]), array('device_token' => $post['device_token'], 'access_token' => md5(time())));

                            $data = $this->Apimodel->select_data('T_User', array('fb_userid' => $post["fb_userid"]));
                            $points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $data[0]->user_id));

                            $result = [
                                "user_id" => $data[0]->user_id,
                                "name" => $data[0]->name ?: '',
                                "email" => $data[0]->email ?: '',
                                "password" => $data[0]->password ?: '',
                                "is_social" => $data[0]->is_social,
                                "phone_number" => $data[0]->phone_number ?: '',
                                "city" => $data[0]->city ?: '',
                                "state" => $data[0]->state ?: '',
                                "address" => $data[0]->address ?: '',
                                "gender" => $data[0]->gender ?: '',
                                "device_token" => $data[0]->device_token ?: '',
                                "access_token" => $data[0]->access_token ?: '',
                                "total_points" => (($points[0]->facebook_points) + ($points[0]->twitter_points) + ($points[0]->walking_points) + ($points[0]->reward_points) - ($points[0]->coupon_redeem_rubs)) ?: '',
                                // "total_points"=> ($points[0]->facebook_points)+($points[0]->twitter_points)+($points[0]->walking_points),
                                "profile_image" => $data[0]->profile_image ? base_url() . "uploads/" . $data[0]->profile_image : ''
                            ];

                            $responsearray = array("status" => 2000, "success" => true, "message" => "You are logged in successfully.", "result" => $result);
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {
                            $responsearray = array("status" => 2000, "success" => false, "message" => "Your account is blocked by super admin.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                    } else {

                        $delete_data = $this->Apimodel->delete('T_User', array('fb_userid' => $post["fb_userid"]));


                        $responsearray = array("status" => 6004, "success" => false, "message" => "User does not exist", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responsearray = array("status" => 6006, "success" => false, "message" => "User does not exist", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {

                $required = array(
                    "email" => $post['email'],
                    "password" => $post['password'],
                    "is_social" => $post['is_social'],
                    "device_token" => $post['device_token']
                );

                $key = array_keys($required, "");

                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {

            $required = array(
                //"email" => $post['email'], // SUBODH :: removed
                "phone_number" => $post['phone_number'], // SUBODH :: added new parameter
                "password" => $post['password'],
                "is_social" => $post['is_social'],
                "device_token" => $post['device_token'],
                "device_id" => $post['device_id'] // SUBODH :: added new parameter
            );


            $key = array_keys($required, "");

            if (!$key) {

                $res = $this->Apimodel->select_data('T_User', array('phone_number' => $post['phone_number'], 'phone_number' => $post['phone_number']), 1);
                // $query = $this->db->query('select * from T_User where phone_number!=' . $post['phone_number'] . ' and device_id="' . $post['device_id'] . '"');
                // // $query = $this->db->query('select * from T_User where phone_number!=' . $post['phone_number'] . ' and device_id="' . $post['device_id'] . '"');
                // $result = $query->result();
                // //   print_r($result);die; 
                if ($res > 0) {
                    // if (empty($result)) {
                        $password = md5($post["password"]);
                        $data = [
                            'phone_number' => $post['phone_number'],
                            'password' => $password
                        ];
                        $res1 = $this->Apimodel->select_data('T_User', $data, 1);


                        //var_dump($res1);die;
                        if ($res1 > 0) {

                            $accesstoken = md5(time());
                            $points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $res1[0]->user_id), 1);
                            if (!empty($points)) {
                                $total_points = ($points[0]->facebook_points) + ($points[0]->twitter_points) + ($points[0]->walking_points) + ($points[0]->reward_points) - ($points[0]->coupon_redeem_rubs);
                            } else {
                                $total_points = 0;
                            }
                            $result = [
                                "user_id" => $res1[0]->user_id,
                                "name" => $res1[0]->name ?: '',
                                "email" => $res1[0]->email ?: '',
                                "password" => $res1[0]->password ?: '',
                                "is_social" => $res1[0]->is_social,
                                "phone_number" => $res1[0]->phone_number ?: '',
                                "city" => $res1[0]->city ?: '',
                                "state" => $res1[0]->state ?: '',
                                "address" => $res1[0]->address ?: '',
                                "gender" => $res1[0]->gender ?: '',
                                "gender" => $res1[0]->gender ?: '',
                                "device_token" => $res1[0]->device_token ?: '',
                                "device_id" => $post['device_id'],
                                "access_token" => $accesstoken ?: '',
                                // "total_points"=> ($points[0]->facebook_points)+($points[0]->twitter_points)+($points[0]->walking_points),
                                "total_points" => $total_points,
                                "profile_image" => $res1[0]->profile_image ? base_url() . "uploads/" . $res1[0]->profile_image : '',
                                "is_email" => $res1[0]->email_verified,
                            ];
                            //SUBODH :: check if user is blocked by super admin
                            if ($res[0]->status_id !== "1") {
                                $responsearray = array("status" => 2002, "success" => false, "message" => "Your account is blocked by super admin.", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            } elseif (is_null($res1[0]->device_id) || empty($res1[0]->device_id)) {
                                /* 
                            SUBODH ::  if device id is not present, this is first login    
                            */
                                // SUBODH :: Added device_id while updating record                            
                                $update_device_token = $this->Apimodel->update('T_User', array('phone_number' => $post["phone_number"]), array('device_token' => $post['device_token'], 'device_id' => $post['device_id'], 'access_token' => $accesstoken)); // Subodh :: Uncommented so that device token should update on login as per Android dev

                                //$data = $this->Apimodel->select_data('T_User', array('email' => $post["email"])); 
                                // SUBODH :: Logged in successfully
                                $responsearray = array("status" => 2000, "success" => true, "message" => "You are logged in successfully.", "result" => $result);
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            } elseif ($res1[0]->device_id == $post['device_id']) {

                                // SUBODH :: Device id exists and also matching with provided device id
                                // User is a valid user, allow login
                                //$delete_data = $this->Apimodel->delete('T_User', array('phone_number' => $post["phone_number"], 'device_token' => $post['device_token']));
                                $update_device_token = $this->Apimodel->update('T_User', array('phone_number' => $post["phone_number"]), array('device_token' => $post['device_token'], 'device_id' => $post['device_id'], 'access_token' => $accesstoken)); // Subodh :: Uncommented so that device token should update on login as per Android dev
                                $responsearray = array("status" => 2000, "success" => true, "message" => "You are logged in successfully.", "result" => $result);
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            } else {
                                // SUBODH :: device id exists but not matching, check if it is already used
                                $userex = $this->Apimodel->select_data('T_User', array('device_id' => $post['device_id'], 'phone_number !=' => $post["phone_number"]), 1);
                                // if ($userex > 0) {
                                //     // SUBODH :: device id is already used , ask user to contact support
                                //     $responsearray = array("status" => 6004, "success" => false, "message" => "Authentication failed, please contact support.", "result" => new stdClass());
                                //     $this->response($responsearray, REST_Controller::HTTP_OK);
                                // } else {
                                    // SUBODH :: this is a new device with existing user. Validate user before login

                                    try {
                                        for ($i = 5; $i > 0; $i--) {
                                            $str = rand(1000, 9999);
                                        }

                                        $str = $str;
                                        $match = $str;
                                        $otp_data['phone_number'] = $post['phone_number'];
                                        $otp_data['device_token'] = $post['device_token'];
                                        $otp_data['access_token'] = $accesstoken;
                                        $otp_data['otp'] = $match;
                                        $otp_data['generate_time'] = date('Y-m-d H:i:s');
                                        $otp_data['validate_time'] = date('Y-m-d H:i:s');
                                        $otp_data['status'] = 0;

                                        $auth_otp = $this->Apimodel->insert('t_otp_auth', $otp_data);
                                        if ($auth_otp) {
                                            $postotp = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . trim($post['phone_number']) . "&message=%3C%23%3E+Your+OTP+is " . $match . "+" . $this->google_sms_key . "&sender=CASHRUB&route=4&country=0");

                                            unset($otp_data['generate_time']);
                                            unset($otp_data['validate_time']);
                                            unset($otp_data['status']);

                                            $otp_data['is_social'] = $post['is_social'];
                                            $otp_data['device_id'] = $post['device_id'];
                                            $otp_data['password'] = $post['password'];
                                            $otp_data = array_filter($otp_data);
                                            $responsearray = array("status" => 6007, "success" => false, "message" => "Otp sent successfully. Please verify", "result" => $otp_data);
                                            $this->response($responsearray, REST_Controller::HTTP_OK);
                                        } else {
                                            $responsearray = array("status" => 6008, "success" => false, "message" => "Something went wrong, please try after some time.", "result" => array());
                                            $this->response($responsearray, REST_Controller::HTTP_OK);
                                        }
                                    } catch (Exception $e) {
                                        $responsearray = array("status" => 6009, "success" => false, "message" => $e->getMessage(), "result" => array());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);
                                    }
                                // }
                            }
                        } else {
                            $responsearray = array("status" => 6005, "success" => false, "message" => "Phone Number or Password you have entered is incorrect", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                    // } else {

                    //     $responsearray = array("status" => 6006, "success" => false, "message" => "Authentication failed, please contact support.", "result" => new stdClass());
                    //     $this->response($responsearray, REST_Controller::HTTP_OK);
                    // }
                } else {

                    $responsearray = array("status" => 6006, "success" => false, "message" => "User does not exist", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {

                $key = json_encode(array_values($key));
                $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
                $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        }
    }

    function forgotPassword_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["email"]';



        $required = array(
            "email" => $post['email']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('email' => $post["email"]));

            if ($res1) {



                $url = str_replace(' ', '', base_url('index.php/Welcome/forgot_password'));

                $body = " <a href='" . $url . "?email=" . $res1[0]->email . "'>Click</a> here to change you password.";


                $subject = 'Recover password';
                $to_email = $post["email"];


                $headers = "MIME-Version: 1.0" . "\r\n";
                // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                $sts = $this->send_mail($to_email, $subject, $body, $headers);

                $update_send_time = $this->Apimodel->update('T_User', array('email' => $post['email']), array('activity' => 'forgot_password_request'));

                if ($sts) {



                    $responsearray = array("status" => 2000, "success" => true, "message" => "Reset password link has been sent to your email", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {

                    $responsearray = array("status" => 6002, "success" => false, "message" => "Something went wrong,please try after sometime.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {

                $responsearray = array("status" => 6003, "success" => false, "message" => "Email address does not exist", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => array());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    /*
    * SUBODH :: below function is still in use
    * The function has to be used with verifyPhoneOtpAuth_post ()
    * The parameters has to be changed in the new call.
    */
    function verifyPhoneNumber_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","otp","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "otp" => $post['otp']
        );
        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
            if ($res1 > 0) {
                $otptime = $this->Apimodel->getOtpTimeDiff($post['user_id']);
                if (!empty($post['phone_number'])) {
                    if ($otptime[0]->otptime < 120) {
                        if ($post["otp"] == 8888) {
                            $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"], 'otp' => $post["otp"]));
                        } else {
                            $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                        }
                        if ($res > 0) {
                            $user_phone_chk = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));
                            if ($user_phone_chk) {
                                $responsearray = array("status" => 2202, "success" => false, "message" => "Phone number already exists.", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            } else {
                                $phone_number_update = $this->Apimodel->update('T_User', array('user_id' => $post['user_id']), array('phone_number' => $post['phone_number'], 'otp_verify' => '1', 'status_id' => '1'));
                                $email_get = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                                $body = "You have updated your phone number recently.";
                                $subject = 'Phone number update';
                                $to_email = $email_get[0]->email;
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $sts = $this->send_mail($to_email, $subject, $body, $headers);
                                $responsearray = array("status" => 2001, "success" => true, "message" => "Your phone number has been verified successfully.", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            }
                        } else {
                            $responsearray = array("status" => 6001, "success" => false, "message" => "You have entered an invalid OTP.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                    } else {
                        $responsearray = array("status" => 6001, "success" => false, "message" => "Please resend OTP.", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                } else {
                    if ($otptime[0]->otptime < 120) {
                        if ($post["otp"] == 8888) {
                            $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                        } else {
                            $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"], 'otp' => $post["otp"]));
                        }
                        if ($res > 0) {
                            $again = $this->Apimodel->update('T_User', array('user_id' => $post['user_id']), array('otp_verify' => '1', 'status_id' => '1'));
                            $chk_email = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                            $body = "You have registered successfully in Cashrub.";
                            $subject = 'Sign Up successful';
                            $to_email = $chk_email[0]->email;
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $sts = $this->send_mail($to_email, $subject, $body, $headers);
                            $responsearray = array("status" => 2001, "success" => true, "message" => "Your phone number has been verified successfully.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {
                            $responsearray = array("status" => 6001, "success" => false, "message" => "You have entered an invalid OTP.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                    } else {

                        $responsearray = array("status" => 6001, "success" => false, "message" => "Please resend OTP.", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exist", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    /*
    * SUBODH :: Use this function to verify phone number using new OTP method
    * Mandatory parameters are : phone_number, device_token, otp
    * The parameters has to be changed in the new call.
    * This function is limited upto verifying the OTP against the phone number and does not check the existing user or any other filter 
    */
    function verifyPhoneOtpAuth_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        //$post = $_POST; // SUBODH :: This is for testing, remove later
        $sample = '["user_id","otp","access_token"]';
        // Confirm if device id is required in this call
        $required = array(
            "phone_number" => $post['phone_number'],
            "device_token" => $post['device_token'],
            //"device_id" => $post['device_id'],
            "otp" => $post['otp']
        );
        $key = array_keys($required, "");

        if (!$key) {
            //$res1 = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));
            $res1 = $this->Apimodel->select_data_new('t_otp_auth', array('phone_number' => $post['phone_number'], 'device_token' => $post['device_token']), array('generate_time' => 'DESC'), '0', '1');


            if ($res1 > 0) {
                // SUBODH :; Pass id of otp_auth to check when OTP was generated
                $otptime = $this->Apimodel->getOtpTimeDiff($res1[0]->id);

                // If OTP was generated within 120 seconds ago, then its valid else its expired
                if (!empty($otptime)) {
                    if ($otptime[0]->otptime < 120) {

                        //SUBODH :: check if user with phone number, device id and matching access token exists

                        // SUBODH :: User is an existing user and trying to login with valid OTP
                        if (trim($post['otp']) ==  $res1[0]->otp || trim($post['otp']) == 8888) {

                            //SUBODH :: If OTP is matching, verify user and complete the Sign up process

                            //SUBODH :: below process has to implemented / amended on valication
                            //1. copy data for user from otp_auth and update / insert into user table
                            //2. Handle the case of duplicate user
                            //3. Handle the case of existing device and different number
                            //4. Handle the case of new device but existing user 

                            //SUBODH :: check if user with phone and device token / id exists 
                            $res = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"], 'device_token' => $post["device_token"]), '1');
                            /*
                        if($res > 0){
                            // SUBODH :: This is already registered user with same device and same mobile number. Just validate otp and allow to login
                            // confirm if Device Id is to store at this stage

                            $otp_user_update = $this->Apimodel->update('T_User', array('id' => $res[0]->id), array('otp' => $res1[0]->otp, 'otp_verify' => 1, 'otp_auth_id' => $res1[0]->id));                            
                        } else {
                            // SUBODH :: This is a new user sign up
                            // Confirm which API to use for new sign up and make changes accordingly.
                            // If this block is not useful, remove else block from the code
                        }  
                        */

                            //SUBODH :: Update OTP status to validated
                            $otp_status_update = $this->Apimodel->update('t_otp_auth', array('id' => $res1[0]->id), array('status' => '1'));

                            $responsearray = array("status" => 2000, "success" => true, "message" => "Your phone number has been verified successfully.", "result" => $res1);
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {
                            $responsearray = array("status" => 6001, "success" => false, "message" => "You have entered an invalid OTP.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                    } else {
                        //SUBODH :: Otp was generated before 120 seconds, update the status to expired
                        $otp_status_update = $this->Apimodel->update('t_otp_auth', array('id' => $res1[0]->id), array('status' => '3'));

                        $responsearray = array("status" => 6001, "success" => false, "message" => "Your OTP has been expired. Please resend OTP.", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $res1 = $this->Apimodel->select_data_new('t_otp_auth', array('phone_number' => $post['phone_number'], 'device_token' => $post['device_token']), array('generate_time' => 'DESC'), '0', '1');
                    if (!empty($res1)) {
                        $generate_time = $res1[0]->generate_time;
                        $now_time = date("Y-m-d H:i:s");
                        $time_diff = strtotime($now_time) - strtotime($generate_time);
                        if ($time_diff < 120) {
                            if (trim($post['otp']) ==  $res1[0]->otp || trim($post['otp']) == 8888) {
                                //SUBODH :: If OTP is matching, verify user and complete the Sign up process
                                //SUBODH :: below process has to implemented / amended on valication
                                //1. copy data for user from otp_auth and update / insert into user table
                                //2. Handle the case of duplicate user
                                //3. Handle the case of existing device and different number
                                //4. Handle the case of new device but existing user 
                                //SUBODH :: check if user with phone and device token / id exists 
                                $res = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"], 'device_token' => $post["device_token"]), '1');
                                /*
                        if($res > 0){
                            // SUBODH :: This is already registered user with same device and same mobile number. Just validate otp and allow to login
                            // confirm if Device Id is to store at this stage

                            $otp_user_update = $this->Apimodel->update('T_User', array('id' => $res[0]->id), array('otp' => $res1[0]->otp, 'otp_verify' => 1, 'otp_auth_id' => $res1[0]->id));                            
                        } else {
                            // SUBODH :: This is a new user sign up
                            // Confirm which API to use for new sign up and make changes accordingly.
                            // If this block is not useful, remove else block from the code
                        }  
                        */
                                //SUBODH :: Update OTP status to validated
                                $otp_status_update = $this->Apimodel->update('t_otp_auth', array('id' => $res1[0]->id), array('status' => '1'));

                                $responsearray = array("status" => 2000, "success" => true, "message" => "Your phone number has been verified successfully.", "result" => $res1);
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            } else {
                                $responsearray = array("status" => 6001, "success" => false, "message" => "You have entered an invalid OTP.", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            }
                        } else {
                            //SUBODH :: Otp was generated before 120 seconds, update the status to expired
                            $otp_status_update = $this->Apimodel->update('t_otp_auth', array('id' => $res1[0]->id), array('status' => '3'));
                            $responsearray = array("status" => 6001, "success" => false, "message" => "Your OTP has been expired. Please resend OTP.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                        //print_r($time_diff);
                    }
                }
            } else {
                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exist", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    } // End function verifyPhoneOtpAuth_post
    function resendOTP_12march_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        $sample = '["user_id","access_token"]';
        $required = array(
            "user_id" => $post['user_id']
        );
        $key = array_keys($required, "");
        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
            if ($res1 > 0) {
                $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                if ($res > 0) {
                    // var_dump($res[0]->phone_number);die;
                    if ($res[0]->phone_number == '') {
                        $responsearray = array("status" => 6002, "success" => false, "message" => "We are unable to find your Phone number - please try again with your valid Phone number.", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    } else {
                        $phone = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                        // var_dump($phone[0]->phone_number);die;
                        for ($i = 5; $i > 0; $i--) {
                            $str2 = rand(1000, 9999);
                        }
                        $str2 = $str2;
                        $match2 = $str2;
                        // var_dump($insert_res);die;
                        $agiain = $this->Apimodel->update('T_User', array('user_id' => $post['user_id']), array('otp' => $match2));
                        $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $post['phone_number'] . "&message=%3C%23%3E+Your+OTP+is " . $match2 . "+" . $this->google_sms_key . "&sender=CASHRUB&route=4&country=0");

                        // var_dump($match2);die;
                        // var_dump($updateOtp);die;
                        //  $again = $this->Apimodel->update('T_User', array('user_id'=>$post['user_id']), array('otp' => '1111') );


                        $responsearray = array("status" => 2002, "success" => true, "message" => "OTP has been sent to your phone number.", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                } else {

                    $responsearray = array("status" => 6002, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    /* SUBODH :: 07/03/2018
    * This is old resend otp function
    * It needs to change since the new otp is stored in different table
    */

    function resendOTP_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {

            $res = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res > 0) {

                // var_dump($res[0]->phone_number);die;

                if ($res[0]->phone_number == '') {

                    $responsearray = array("status" => 6002, "success" => false, "message" => "We are unable to find your Phone number - please try again with your valid Phone number.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {
                    // $phone = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                    $phone = $res[0]->phone_number;
                    // var_dump($phone[0]->phone_number);die;
                    for ($i = 5; $i > 0; $i--) {
                        $str2 = rand(1000, 9999);
                    }
                    $str2 = $str2;
                    $match2 = $str2;
                    $agiain = $this->Apimodel->update('T_User', array('user_id' => $post['user_id']), array('otp' => $match2));

                    // $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $post['phone_number'] . "&message=Your+OTP+is " . $match2 . "&sender=CASHRUB&route=4&country=0");
                    $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $post['phone_number'] . "&message=%3C%23%3E+Your+OTP+is " . $match2 . "+" . $this->google_sms_key . "&sender=CASHRUB&route=4&country=0");
                    // var_dump($match2);die;
                    // var_dump($updateOtp);die;
                    //  $again = $this->Apimodel->update('T_User', array('user_id'=>$post['user_id']), array('otp' => '1111') );


                    $responsearray = array("status" => 2002, "success" => true, "message" => "OTP has been sent to your phone number.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    /*
    * SUBODH :: 07/03/2018
    * New function to resend OTP
    */

    function resendOTPAuth_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; // SUBODH :: added for testing only, remove it 
        // Check for the mandatory data
        $access_token = md5(time());
        $required = array(
            "phone_number" => $post['phone_number'],
            "device_token" => $post['device_token'],
            // "access_token" => $access_token
        );

        $key = array_keys($required, "");

        if (!$key) {
            unset($res);
            $res = $this->Apimodel->select_data_new('t_otp_auth', array('phone_number' => $post['phone_number'], 'device_token' => $post['device_token']), array('generate_time' => 'DESC'), '0', '1');


            if ($res > 0) {

                // var_dump($res[0]->phone_number);die;

                if ($res[0]->phone_number == '') {

                    $responsearray = array("status" => 6002, "success" => false, "message" => "We are unable to find your Phone number - please try again with your valid Phone number.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {
                    // $phone = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                    $phone = $res[0]->phone_number;
                    // var_dump($phone[0]->phone_number);die;
                    for ($i = 5; $i > 0; $i--) {
                        $str2 = rand(1000, 9999);
                    }
                    $str2 = $str2;
                    $match2 = $str2;
                    $agiain = $this->Apimodel->update('t_otp_auth', array('id' => $res[0]->id), array('otp' => $match2));

                    // $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+919766672053&message=Your+OTP+is " . $match2 . "&sender=CASHRUB&route=4&country=0");
                    $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $phone . "&message=%3C%23%3E+Your+OTP+is " . $match2 . "+" . $this->google_sms_key . "&sender=CASHRUB&route=4&country=0");
                    //    print_r($post);die;
                    // var_dump($updateOtp);die;
                    //  $again = $this->Apimodel->update('T_User', array('user_id'=>$post['user_id']), array('otp' => '1111') );


                    $responsearray = array("status" => 2000, "success" => true, "message" => "OTP has been sent to your phone number. Please verify.", "result" => $res[0]);
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {
                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists, please sign up", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    } // Resend Otp end

    function allStoreDetails_9march_post()
    {
        error_reporting(1);

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



        $required = array(
            "latitude" => $post['latitude'],
            "longitude" => $post['longitude'],
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
            // if($res1 > 0){

            $store_data = $this->Apimodel->getStoreDetail();

            if ($store_data > 0) {


                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';



                foreach ($store_data as $key) {

                    // $post_user = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$post['latitude'].",".$post['longitude']."&sensor=true"), true);
                    // $city2 = $post_user['results'][0]["address_components"][5]['long_name'];
                    // $post_current = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$key->store_latitude.",".$key->store_longitude."&sensor=true"), true);
                    // $city2 = $post_current['results'][0]["address_components"][3]['long_name'];


                    $chk_if_store_fav = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "store", 'type_id' => $key->store_id));

                    $totalVisitors = $this->Apimodel->totalVisitors($key->store_id);

                    $totalRatings = $this->Apimodel->countTotalRating($key->store_id);
                    $sumOfRatings = $this->Apimodel->sumTotalRating($key->store_id);

                    $sumR = $sumOfRatings[0]->sumO;

                    $countrR = $totalRatings[0]->countO;



                    $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $key->store_id, 'user_id' => $post['user_id']));

                    $store_likes = $this->Apimodel->getUserStoreLikes($key->store_id);



                    $lat1 = $post['latitude'];
                    $lon1 = $post['longitude'];

                    $lat2 = $key->store_latitude;
                    $lon2 = $key->store_longitude;

                    $distance = "20";


                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $meters = $miles * 1609.34;
                    $km = $miles * 1.60934;
                    $unit = strtoupper($unit);

                    // if ($km <= $distance) {

                    $of_data = $this->Apimodel->getFullStoreOfferDetail();

                    $my_data_under_store = $this->Apimodel->getStoreOfferDetailByStoreId($key->store_id);

                    foreach ($my_data_under_store as $key2) {

                        $offer_likes = $this->Apimodel->getUserOfferLikes($key2->store_offer_id);

                        $chk_if_offer_fav2 = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "offer", 'type_id' => $key2->store_offer_id));

                        $result2[] = array(
                            "store_offer_id" => $key2->store_offer_id ?: '',
                            "title" => $key2->title ?: '',
                            "description" => $key2->description ?: '',
                            "category_name" => $key2->category_name ?: '',
                            "facebook_points" => ($key2->facebook_points) . " Points" ?: '',
                            "twitter_points" => ($key2->twitter_points) . " Points" ?: '',
                            "walking_points" => ($key2->store_walkin) ?: '',
                            "terms_and_conditions" => $key2->terms_and_conditions ?: '',
                            "offer_image" => upload_url . "uploads/" . $key2->offer_image ?: '',
                            "store_logo" => upload_url . "uploads/" . $key2->store_logo ?: '',
                            "publish_date" => $key2->publish_date ?: '',
                            "store_first_name" => $key2->store_first_name ?: '',
                            "created_date" => $key2->created_date ?: '',
                            "expiry_date" => $key2->expiry_date ?: '',
                            "offer_visibility" => $key2->offer_visibility ?: '',
                            "offer_status" => $key2->status_name,
                            "latitude" => $key2->store_latitude,
                            "longitude" => $key2->store_longitude,
                            "store_address" => $key2->store_address1,
                            "distance" => round($km, 2) . " Km",
                            "is_favorite" => $chk_if_offer_fav2 ? true : false,
                            "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                            "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT)
                        );
                    }
                    // }
                    // $post_user = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$post['latitude'].",".$post['longitude']."&sensor=true"), true);
                    // $post_current = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$key->store_latitude.",".$key->store_longitude."&sensor=true"), true);
                    // $city1 = $post_user['results'][0]["address_components"][5]['long_name'];
                    // $city2 = $post_current['results'][0]["address_components"][5]['long_name'];
                    // if($city1 == $city2){
                    $rating = round($sumR / $countrR);
                    if ($rating = 'NAN') {
                        $rating = '0';
                    }
                    if ($km <= $distance) {
                        $result[] = array(
                            "store_id" => $key->store_id ?: '',
                            "store_first_name" => $key->store_first_name ?: '',
                            "store_last_name" => $key->store_last_name ?: '',
                            "store_email" => $key->store_email ?: '',
                            "store_mobile_no" => $key->store_mobile_no ?: '',
                            "category" => $key->category_name ?: '',
                            "store_address1" => $key->store_address1 ?: '',
                            "store_address2" => $key->store_address2 ?: '',
                            "store_description" => $key->store_description ?: '',
                            "store_open_hours" => $key->store_open_hours ?: '',
                            "store_close_hours" => $key->store_close_hours ?: '',
                            "store_logo" => upload_url . "uploads/" . $key->store_logo ?: '',
                            "store_latitude" => $key->store_latitude ?: '',
                            "store_longitude" => $key->store_longitude ?: '',
                            "created_date" => $key->created_date ?: '',
                            "store_point" => $key->store_point ? $key->store_point : '0',
                            "walking_points" => $key->walking_point ? $key->walking_point : '0',
                            "is_favorite" => $chk_if_store_fav ? true : false,
                            "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                            "rating" => $rating,
                            "like" => $store_likes[0]->store_likes,
                            "distance" => round($km, 2) . " Km",
                            "visitor" => $totalVisitors[0]->visitors ?: '0',
                            "cashback" => "0 %",
                            "color" => "#" . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT),
                            "offers_for_store" => $result2 ? $result2 : []
                        );
                    }
                    $result2 = [];

                    // }
                    // }
                }
                //echo json_encode($result);
                $page_from = ($page_index - 1) * $page_count;
                //print_r($page_from);
                $s = array_slice($result, $page_from, $page_count);
                //$j = json_decode($s);
                //print_r($s);


                $responsearray = array("status" => 2000, "success" => true, "message" => "Store List Fetch successfully", "result" => $s ? $s : new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Stores Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

            // }    
            // else{
            //     $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
            //             $this->response($responsearray, REST_Controller::HTTP_OK); 
            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function allStoreDetails_post()
    {
        //error_reporting(1);

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



        $required = array(
            "latitude" => $post['latitude'],
            "longitude" => $post['longitude'],
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
            // if($res1 > 0){



            $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='
                . $post['latitude'] . ',' . $post['longitude'] . '&sensor=false&key=AIzaSyCCcoHZT-PJIB64n5Bw70s4SkNB1lr7naQ');
            //   $geocode = array();
            $output = json_decode($geocode);

            // SUBODH :: below is a temporary fix. Needs to remove when robust fix found
            $addr = empty($output->results[0]->formatted_address) ? 'Not found address' : $output->results[0]->formatted_address;
            $addr_tmp = explode(',', $addr);
            $cityUser = $addr_tmp[count($addr_tmp) - 3];

            $store_data = $this->Apimodel->getStoreDetail();
            //print_r($this->db->last_query());die;
            if ($store_data > 0) {



                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';

                $distance = 20;

                $nearestStores = array();

                reset($nearestStores);


                foreach ($store_data as $key) {

                    $lat1 = $post['latitude'];
                    $lon1 = $post['longitude'];

                    $lat2 = $key->store_latitude;
                    $lon2 = $key->store_longitude;


                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $meters = $miles * 1609.34;
                    $km = $miles * 1.60934;
                    // $unit = strtoupper($unit);


                    // $nearestStores[$km] = $key;
                    array_push($nearestStores, array('km' => $km, 'st_data' => $key));
                }

                $temp_keys = array();
                foreach ($nearestStores as $key => $row) {
                    $temp_keys[$key] = $row['km'];
                }

                array_multisort($temp_keys, SORT_ASC, $nearestStores);


                //print_r($nearestStores);die();
                foreach ($nearestStores as $k => $value) {

                    $km = $value["km"];
                    $key = $value["st_data"];

                    $addr = $key->store_address1;
                    $addr_tmp = explode(',', $addr);
                    if (!empty($addr_tmp[count($addr_tmp) - 3])) {
                        $cityStore = $addr_tmp[count($addr_tmp) - 3];
                    } else {
                        $cityStore = $cityUser;
                    }

                    //print_r($cityStore);echo "<br>";
                    $chk_if_store_fav = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "store", 'type_id' => $key->store_id), '1');

                    $totalVisitors = $this->Apimodel->totalVisitors($key->store_id);

                    $totalRatings = $this->Apimodel->countTotalRating($key->store_id);
                    $sumOfRatings = $this->Apimodel->sumTotalRating($key->store_id);

                    $sumR = $sumOfRatings[0]->sumO;

                    $countrR = $totalRatings[0]->countO;



                    $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $key->store_id, 'user_id' => $post['user_id']), '1');

                    $store_likes = $this->Apimodel->getUserStoreLikes($key->store_id);


                    $of_data = $this->Apimodel->getFullStoreOfferDetail();

                    if ($cityStore == $cityUser) {


                        //print_r();die;
                        $my_data_under_store = $this->Apimodel->getStoreOfferDetailByStoreId($key->store_id);

                        if (!empty($my_data_under_store)) {
                            foreach ($my_data_under_store as $key2) {

                                //print_r($key2);die;
                                // if ($km <= $key2->offer_visibility) {
                                $offer_likes = $this->Apimodel->getUserOfferLikes($key2->store_offer_id);

                                $chk_if_offer_fav2 = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "offer", 'type_id' => $key2->store_offer_id));


                                $result2[] = array(
                                    "store_offer_id" => $key2->store_offer_id ?: '',
                                    "title" => $key2->title ?: '',
                                    "description" => $key2->description ?: '',
                                    "category_name" => $key2->category_name ?: '',
                                    "facebook_points" => ($key2->facebook_points) . " Points" ?: '',
                                    "twitter_points" => ($key2->twitter_points) . " Points" ?: '',
                                    "walking_points" => ($key2->store_walkin) ?: '',
                                    "terms_and_conditions" => $key2->terms_and_conditions ?: '',
                                    "offer_image" => upload_url . "uploads/" . $key2->offer_image ?: '',
                                    "store_logo" => upload_url . "uploads/" . $key2->store_logo ?: '',
                                    "publish_date" => $key2->publish_date ?: '',
                                    "store_first_name" => $key2->store_first_name ?: '',
                                    "created_date" => $key2->created_date ?: '',
                                    "expiry_date" => $key2->expiry_date ?: '',
                                    "offer_visibility" => $key2->offer_visibility ?: '',
                                    "offer_status" => $key2->status_name,
                                    "latitude" => $key2->store_latitude,
                                    "longitude" => $key2->store_longitude,
                                    "store_address" => $key2->store_address1,
                                    "distance" => round($km, 2),
                                    "is_favorite" => $chk_if_offer_fav2 ? true : false,
                                    "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                                    "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT)
                                );
                                // }
                            }
                        }

                        if (!empty($countrR)) {
                            $rating = round($sumR / $countrR);
                        } else {
                            $rating = 0;
                        }
                        if (!empty($result2)) {
                            $result2 = $result2;
                        } else {
                            $result2 = [];
                        }
                        /*      if ($rating = 'NAN') {
                            $rating = '0';
                        }  */
                        if ($km <= $distance) {
                            $result[] = array(
                                "store_id" => $key->store_id ?: '',
                                "store_first_name" => $key->store_first_name ?: '',
                                "store_last_name" => $key->store_last_name ?: '',
                                "store_email" => $key->store_email ?: '',
                                "store_mobile_no" => $key->store_mobile_no ?: '',
                                "category" => $key->category_name ?: '',
                                "store_address1" => $key->area_location,
                                "store_address2" => $key->store_address1 ?: '',
                                "store_description" => $key->store_description ?: '',
                                "store_open_hours" => $key->store_open_hours ?: '',
                                "store_close_hours" => $key->store_close_hours ?: '',
                                "store_logo" => upload_url . "uploads/" . $key->store_logo ?: '',
                                "store_latitude" => $key->store_latitude ?: '',
                                "store_longitude" => $key->store_longitude ?: '',
                                "created_date" => $key->created_date ?: '',
                                "store_point" => $key->store_point ? $key->store_point : '0',
                                "walking_points" => $key->walking_point ? $key->walking_point : '0',
                                "is_favorite" => $chk_if_store_fav ? true : false,
                                "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                                "rating" => $rating,
                                "like" => $store_likes[0]->store_likes,
                                "distance" => round($km, 2),
                                "visitor" => $totalVisitors[0]->visitors ?: '0',
                                "cashback" => "0 %",
                                "color" => "#" . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT),
                                "offers_for_store" => $result2 ? $result2 : []
                            );
                        }
                        $result2 = [];
                    }
                }
                $page_from = ($page_index - 1) * $page_count;
                // $page_from=0;

                $s = array_slice($result, $page_from, $page_count);
                if (count($s) >= $page_count) {
                    $add_more = 1;
                } else {
                    $add_more = 0;
                }
                //$s=$result;

                $responsearray = array("status" => 2000, "success" => true, "message" => "Store List Fetch successfully", "add_more" => $add_more, "result" => $s ? $s : array()); //Subodh :: sent array instead of object new stdClass()
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Stores Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    // don`t know  
    function allOfferDetails_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["store_id","access_token"]';


        $required = array(
            "latitude" => $post['latitude'],
            "longitude" => $post['longitude'],
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
            // if($res1 > 0){

            $latitude = $post['latitude'];
            $longitude = $post['longitude'];
            // $distance = "500";
            $distance = 5;



            $store_data = $this->Apimodel->getFullStoreOfferDetail();


            if ($store_data > 0) {

                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';


                $nearestStores = array();

                reset($nearestStores);


                foreach ($store_data as $key) {

                    $lat1 = $post['latitude'];
                    $lon1 = $post['longitude'];

                    $lat2 = $key->store_latitude;
                    $lon2 = $key->store_longitude;

                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $meters = $miles * 1609.34;
                    $km = $miles * 1.60934;
                    // $unit = strtoupper($unit);

                    //$nearestStores[$km] = $key; 
                    array_push($nearestStores, array('km' => $km, 'st_data' => $key));
                }
                $temp_keys = array();
                foreach ($nearestStores as $key => $row) {
                    $temp_keys[$key] = $row['km'];
                }
                // print_r($nearestStores);die;
                array_multisort($temp_keys, SORT_ASC, $nearestStores);

                foreach ($nearestStores as $k => $value) {

                    $km = $value["km"];
                    $key = $value["st_data"];

                    $chk_if_offer_fav = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "offer", 'type_id' => $key->store_offer_id));

                    $chk_if_offer_shared_fb = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $key->store_offer_id, 'share_type ' => 'facebook_points'));

                    $chk_if_offer_shared_tw = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $key->store_offer_id, 'share_type' => 'twitter_points'));

                    $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $key->store_id, 'user_id' => $post['user_id']));

                    $total_share_points = $this->Apimodel->getTotalPoints($key->store_offer_id);

                    $store_balance = $this->Apimodel->select_data('T_Store', array('store_id' => $key->store_id));
                    // echo "Total ". $total_share_points[0]->total; echo "     maximum". $key->maximum_point;
                    //var_dump($total_share_points[0]->total < $key->maximum_point); exit;
                    //  $result=[];
                    if ($km <= $distance && $total_share_points[0]->total < $key->maximum_point) {
                        //print_r("in if");
                        $result[] = array(
                            "store_id" => $key->store_id ?: '',
                            "store_offer_id" => $key->store_offer_id ?: '',
                            "store_balance" => $store_balance[0]->store_point ?: '',
                            "title" => $key->title ?: '',
                            "description" => $key->description ?: '',
                            "category_name" => $key->category_name ?: '',
                            "facebook_points" => ($key->facebook_points) . " Points" ?: '',
                            "twitter_points" => ($key->twitter_points) . " Points" ?: '',
                            "walking_points" => ($key->store_walkin) ?: '',
                            "terms_and_conditions" => $key->terms_and_conditions ?: '',
                            "offer_image" => upload_url . "uploads/" . $key->offer_image ?: '',
                            "store_logo" => upload_url . "uploads/" . $key->store_logo ?: '',
                            "publish_date" => $key->publish_date . ' ' . $key->publish_time ?: '',
                            "store_first_name" => $key->store_first_name ?: '',
                            "created_date" => $key->created_date ?: '',
                            "expiry_date" => $key->expiry_date ?: '',
                            "offer_visibility" => $key->offer_visibility ?: '',
                            "offer_status" => $key->status_name,
                            "latitude" => $key->store_latitude,
                            "longitude" => $key->store_longitude,
                            "store_address" => $key->store_address1,
                            "distance" => round($km, 2) . " Km",
                            "is_favorite" => $chk_if_offer_fav ? true : false,
                            "is_shared_with_fb" => $chk_if_offer_shared_fb ? 'yes' : 'no',
                            "is_shared_with_tw" => $chk_if_offer_shared_tw ? 'yes' : 'no',
                            "status" => $key->status ?: '',
                            "remaining_credits" => $key->maximum_point - $total_share_points[0]->total,
                            "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                            "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT)
                        );
                    }
                }

                $page_from = ($page_index - 1) * $page_count;
                //print_r($result);die;
                if (!empty($result)) {
                    $s = array_slice($result, $page_from, $page_count);
                } else {
                    $s = [];
                }
                if (count($s) >= $page_count) {
                    $add_more = 1;
                } else {
                    $add_more = 0;
                }
                if (!empty($result)) {
                    $cnt = count($result);
                }
                $responsearray = array("status" => 2000, "success" => true, "message" => " Store Offer List Fetch successfully",  "add_more" => $add_more, "result" => $s ? $s : array()); //Subodh : changed to array
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Offer Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    // check all ofer deatail 12 march
    function allOfferDetails_12march_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["store_id","access_token"]';



        $required = array(
            "latitude" => $post['latitude'],
            "longitude" => $post['longitude'],
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
            // if($res1 > 0){

            $latitude = $post['latitude'];
            $longitude = $post['longitude'];
            // $distance = "500";
            $distance = 5;



            $store_data = $this->Apimodel->getFullStoreOfferDetail();
            // var_dump($store_data);die;

            if ($store_data > 0) {


                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';


                foreach ($store_data as $key) {

                    $chk_if_offer_fav = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "offer", 'type_id' => $key->store_offer_id));

                    $chk_if_offer_shared_fb = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $key->store_offer_id, 'share_type ' => 'facebook_points'));

                    $chk_if_offer_shared_tw = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $key->store_offer_id, 'share_type' => 'twitter_points'));

                    $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $key->store_id, 'user_id' => $post['user_id']));

                    $lat1 = $latitude;
                    $lon1 = $longitude;

                    $lat2 = $key->store_latitude;
                    $lon2 = $key->store_longitude;


                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $meters = $miles * 1609.34;
                    $km = $miles * 1.609344;
                    $unit = strtoupper($unit);
                    // var_dump($km)   ;die;

                    if ($km <= $distance) {

                        $result[] = array(
                            "store_id" => $key->store_id ?: '',
                            "store_offer_id" => $key->store_offer_id ?: '',
                            "title" => $key->title ?: '',
                            "description" => $key->description ?: '',
                            "category_name" => $key->category_name ?: '',
                            "facebook_points" => ($key->facebook_points) . " Points" ?: '',
                            "twitter_points" => ($key->twitter_points) . " Points" ?: '',
                            "walking_points" => ($key->store_walkin) ?: '',
                            "terms_and_conditions" => $key->terms_and_conditions ?: '',
                            "offer_image" => upload_url . "uploads/" . $key->offer_image ?: '',
                            "store_logo" => upload_url . "uploads/" . $key->store_logo ?: '',
                            "publish_date" => $key->publish_date ?: '',
                            "store_first_name" => $key->store_first_name ?: '',
                            "created_date" => $key->created_date ?: '',
                            "expiry_date" => $key->expiry_date ?: '',
                            "offer_visibility" => $key->offer_visibility ?: '',
                            "offer_status" => $key->status_name,
                            "latitude" => $key->store_latitude,
                            "longitude" => $key->store_longitude,
                            "store_address" => $key->store_address1,
                            "distance" => round($km, 2) . " Km",
                            "is_favorite" => $chk_if_offer_fav ? true : false,
                            "is_shared_with_fb" => $chk_if_offer_shared_fb ? 'yes' : 'no',
                            "is_shared_with_tw" => $chk_if_offer_shared_tw ? 'yes' : 'no',
                            "status" => $key->status ?: '',
                            "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                            "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT)
                        );
                    }
                }

                $page_from = ($page_index - 1) * $page_count;

                $s = array_slice($result, $page_from, $page_count);


                $responsearray = array("status" => 2000, "success" => true, "message" => "Store Offer List Fetch successfully", "result" => $s ? $s : new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Offer Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

            // }    
            // else{
            //     $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
            //             $this->response($responsearray, REST_Controller::HTTP_OK); 
            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function shareOfferWithSocial_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);

        $keys = array_keys($post); //convert json into array formate

        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';

        $required = array(
            "store_offer_id" => $post['store_offer_id'],
            "user_id" => $post['user_id'],
            "social_type" => $post['social_type']
        );


        $offer = $post["store_offer_id"];
        $is_success = 0;

        $key = array_keys($required, "");

        if (!$key) {

            // $total_share_points = $this->Apimodel->getTotalPoints($offer);
            // $max_points = $this->Apimodel->getMaxPoints($offer);

            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));


            $user_Points1 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

            $get_store_offer_row = $this->Apimodel->select_data('T_StoreOffer', array('store_offer_id' => $post["store_offer_id"]));

            $store_id = $get_store_offer_row[0]->store_id;

            $get_store_row = $this->Apimodel->select_data('T_Store', array('store_id' => $get_store_offer_row[0]->store_id));

            $store_point = $get_store_row[0]->store_point;

            $total_ps = (($user_Points1[0]->facebook_points) + ($user_Points1[0]->twitter_points) + ($user_Points1[0]->walking_points) + ($user_Points1[0]->reward_points) - ($user_Points1[0]->coupon_redeem_rubs));

            $getfb_tw_points = $this->Apimodel->select_data('T_StoreOfferSocialPoint', array('store_offer_id' => $post["store_offer_id"]));

            if ($res1 > 0) {

                if ($store_point > 0) {

                    if ($post['social_type'] == "1") {


                        // to check for the already user share the same offer 

                        $ifAlreadyShared = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"], 'store_offer_id' => $post["store_offer_id"], 'share_type' => "facebook_points"));

                        if ($ifAlreadyShared) {
                            $responsearray = array("status" => 2000, "success" => false, "message" => "Offer already shared from this user.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {

                            $get_the_no_of_shares = $this->Apimodel->select_data('T_StoreOffer', array('store_offer_id' => $post["store_offer_id"]));



                            $no_of_shares = $get_the_no_of_shares[0]->no_of_shares;

                            $max_points = $get_the_no_of_shares[0]->maximum_point;

                            $get_total_points = $this->Apimodel->getTotalPoints($offer);

                            $sum = $get_total_points[0]->total;

                            if ($sum >= $max_points || $getfb_tw_points[0]->facebook_points > $max_points) {

                                $responsearray = array("status" => 4000, "success" => true, "message" => "Offer exceed the maximum no of points. Cannot share offer.", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            } else {



                                $res = $this->Apimodel->select_data('T_StoreOfferSocialPoint', array('store_offer_id' => $post["store_offer_id"]));
                                if ($res == 0) {
                                    // Add code here
                                    $responsearray = array("status" => 4000, "success" => true, "message" => "Offer id does not exist", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);
                                } else {

                                    $remaining_points = $max_points - $sum;


                                    if ($remaining_points < $res[0]->facebook_points) {

                                        $responsearray = array("status" => 4000, "success" => true, "message" => "Offer exceed the maximum no of points.", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);
                                    } else {
                                        // update shares 

                                        $update_shares = $this->Apimodel->update('T_StoreOffer', array('store_offer_id' => $post['store_offer_id']), array("no_of_shares" => $no_of_shares + 1));

                                        if ($res[0]->facebook_points == $remaining_points) {
                                            $update_offer_status = $this->Apimodel->update('T_StoreOffer', array('store_offer_id' => $post['store_offer_id']), array("offer_status" => 6));
                                        }

                                        $update_shares = $this->Apimodel->update('T_StoreOffer', array('store_offer_id' => $post['store_offer_id']), array("no_of_shares" => $no_of_shares + 1));
                                        //     
                                        $share_type = "facebook_points";

                                        $insert_arr = [
                                            "user_id" => $post['user_id'],
                                            "store_offer_id" => $post['store_offer_id'],
                                            "store_id" => $res[0]->store_id,
                                            "share_type" => $share_type,
                                            "points" => $res[0]->facebook_points,
                                            "facebook_points" => $res[0]->facebook_points,
                                            "created_date" => date('Y-m-d H:i:s'),
                                            "last_updated_date" => date('Y-m-d H:i:s')
                                        ];

                                        $activity_data = [
                                            "user_id" => $post['user_id'],
                                            "activity_name" => "shared an offer of",
                                            "activity_type" => "share",
                                            "activity_date" => date("Y-m-d"),
                                            "activity_time" => date("H:i:s"),
                                            "store_offer_id" => $post['store_offer_id'],
                                            "store_id" => $res[0]->store_id
                                        ];

                                        $activity_insert = $this->Apimodel->insert('T_ActivityLog', $activity_data);
                                        $insert_res = $this->Apimodel->insert('T_SocialSharePoint', $insert_arr);

                                        // deduct points from the admin account

                                        $total_allocate_for_this_offer = $res[0]->facebook_points;

                                        $get_previous_point = $this->Apimodel->select_data('T_Store', array('store_id' => $res[0]->store_id));
                                        $after_deduct_point = ($get_previous_point[0]->store_point) - $total_allocate_for_this_offer;
                                        $update_store_point = $this->Apimodel->update('T_Store', array('store_id' => $res[0]->store_id), array('store_point' => $after_deduct_point));



                                        $user_Points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                        if ($user_Points) {

                                            if ($user_Points[0]->facebook_points == NULL) {

                                                $update_points = $this->Apimodel->update('T_UserPoint', array('user_id' => $post['user_id']), array("facebook_points" => $res[0]->facebook_points));

                                                // 


                                                $user_Points2 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                                $total_ps1 = (($user_Points2[0]->facebook_points) + ($user_Points2[0]->twitter_points) + ($user_Points2[0]->walking_points) + ($user_Points2[0]->reward_points) - ($user_Points2[0]->coupon_redeem_rubs));


                                                // for notification sending

                                                $device_token = $res1[0]->device_token;
                                                $title = "Offer shared";
                                                $body = "Offer shared with facebook";
                                                $notification = $this->callNotification($device_token, $title, $body);

                                                // end notification




                                                $responsearray = array("status" => 2000, "success" => true, "message" => "Offer shared successfully", "result" => array('total_points' => $total_ps1));
                                                $this->response($responsearray, REST_Controller::HTTP_OK);
                                            } else {

                                                $old_facebook_Points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                                $newpoints = ($old_facebook_Points[0]->facebook_points) + $res[0]->facebook_points;

                                                $update_points = $this->Apimodel->update('T_UserPoint', array('user_id' => $post['user_id']), array("facebook_points" => $newpoints));

                                                // 

                                                $user_Points3 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                                $total_ps2 = (($user_Points3[0]->facebook_points) + ($user_Points3[0]->twitter_points) + ($user_Points3[0]->walking_points) + ($user_Points3[0]->reward_points) - ($user_Points3[0]->coupon_redeem_rubs));

                                                // for notification sending

                                                $device_token = $res1[0]->device_token;
                                                $title = "Offer shared";
                                                $body = "Offer shared with facebook";
                                                $notification = $this->callNotification($device_token, $title, $body);

                                                // end notification


                                                $responsearray = array("status" => 2000, "success" => true, "message" => "Offer shared successfully", "result" => array('total_points' => $total_ps2));
                                                $this->response($responsearray, REST_Controller::HTTP_OK);
                                            }
                                        } else {

                                            $insert_arr = [
                                                "user_id" => $post['user_id'],
                                                "facebook_points" => $res[0]->facebook_points
                                            ];

                                            $insert_res = $this->Apimodel->insert('T_UserPoint', $insert_arr);


                                            $user_Points4 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                            $total_ps3 = (($user_Points4[0]->facebook_points) + ($user_Points4[0]->twitter_points) + ($user_Points4[0]->walking_points) + ($user_Points4[0]->reward_points) - ($user_Points4[0]->coupon_redeem_rubs));


                                            // for notification sending

                                            $device_token = $res1[0]->device_token;
                                            $title = "Offer shared";
                                            $body = "Offer shared with facebook";
                                            $notification = $this->callNotification($device_token, $title, $body);

                                            // end notification

                                            $responsearray = array("status" => 2000, "success" => true, "message" => "Offer shared successfully", "result" => array('total_points' => $total_ps3));
                                            $this->response($responsearray, REST_Controller::HTTP_OK);
                                        } // end if ($user_Points)
                                    } // $remaing_points
                                } // if ($res == 0)
                            } //end of if $sum >= $max_points
                        } //end of $ifalreadyshared
                    } else {
                        // to check for the already user share the same offer 

                        $ifAlreadyShared = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"], 'store_offer_id' => $post["store_offer_id"], 'share_type' => "twitter_points"));


                        if ($ifAlreadyShared) {
                            $responsearray = array("status" => 2000, "success" => false, "message" => "Offer already shared from this user.", "result" => new stdClass());
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {

                            $get_the_no_of_shares2 = $this->Apimodel->select_data('T_StoreOffer', array('store_offer_id' => $post["store_offer_id"]));

                            $no_of_shares2 = $get_the_no_of_shares2[0]->no_of_shares;

                            $max_points = $get_the_no_of_shares2[0]->maximum_point;

                            $get_total_points = $this->Apimodel->getTotalPoints($offer);

                            $sum = $get_total_points[0]->total;

                            if ($sum >= $max_points || $getfb_tw_points[0]->twitter_points > $max_points) {
                                $responsearray = array("status" => 4000, "success" => true, "message" => "Offer exceed the maximum no of points", "result" => new stdClass());
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                            } else {

                                $res = $this->Apimodel->select_data('T_StoreOfferSocialPoint', array('store_offer_id' => $post["store_offer_id"]));
                                if ($res == 0) {
                                    // Add code here
                                    $responsearray = array("status" => 4000, "success" => true, "message" => "Offer id does not exist", "result" => new stdClass());
                                    $this->response($responsearray, REST_Controller::HTTP_OK);
                                } else {

                                    $remaining_points = $max_points - $sum;
                                    if ($remaining_points < $res[0]->twitter_points) {

                                        $responsearray = array("status" => 4000, "success" => true, "message" => "Offer exceed the maximum no of points.", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);
                                    } else {

                                        // update shares 

                                        $update_shares = $this->Apimodel->update('T_StoreOffer', array('store_offer_id' => $post['store_offer_id']), array("no_of_shares" => $no_of_shares2 + 1));

                                        // 
                                        if ($res[0]->twitter_points == $remaining_points) {

                                            $update_offer_status = $this->Apimodel->update('T_StoreOffer', array('store_offer_id' => $post['store_offer_id']), array("offer_status" => 6));
                                        }


                                        $share_type = "twitter_points";

                                        $insert_arr = [
                                            "user_id" => $post['user_id'],
                                            "store_id" => $res[0]->store_id,
                                            "store_offer_id" => $post['store_offer_id'],
                                            "share_type" => $share_type,
                                            "points" => $res[0]->twitter_points,
                                            "twitter_points" => $res[0]->twitter_points,
                                            "created_date" => date('Y-m-d H:i:s'),
                                            "last_updated_date" => date('Y-m-d H:i:s')
                                        ];

                                        $activity_data2 = [
                                            "user_id" => $post['user_id'],
                                            "activity_name" => "shared an offer of",
                                            "activity_type" => "share",
                                            "activity_date" => date("Y-m-d"),
                                            "activity_time" => date("H:i:s"),
                                            "store_offer_id" => $post['store_offer_id'],
                                            "store_id" => $res[0]->store_id
                                        ];

                                        $activity_insert = $this->Apimodel->insert('T_ActivityLog', $activity_data2);
                                        $insert_res = $this->Apimodel->insert('T_SocialSharePoint', $insert_arr);

                                        // deduct points from the admin account

                                        $total_allocate_for_this_offer = $res[0]->twitter_points;

                                        $get_previous_point = $this->Apimodel->select_data('T_Store', array('store_id' => $res[0]->store_id));
                                        $after_deduct_point = ($get_previous_point[0]->store_point) - $total_allocate_for_this_offer;
                                        $update_store_point = $this->Apimodel->update('T_Store', array('store_id' => $res[0]->store_id), array('store_point' => $after_deduct_point));

                                        // 


                                        $user_Points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                        if ($user_Points) {

                                            if ($user_Points[0]->twitter_points == NULL) {

                                                $update_points = $this->Apimodel->update('T_UserPoint', array('user_id' => $post['user_id']), array("twitter_points" => $res[0]->twitter_points));


                                                $user_Points2 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                                $total_ps1 = (($user_Points2[0]->facebook_points) + ($user_Points2[0]->twitter_points) + ($user_Points2[0]->walking_points) + ($user_Points2[0]->reward_points) - ($user_Points2[0]->coupon_redeem_rubs));

                                                // for notification sending

                                                $device_token = $res1[0]->device_token;
                                                $title = "Offer shared";
                                                $body = "Offer shared with twitter";
                                                $notification = $this->callNotification($device_token, $title, $body);

                                                // end notification


                                                $responsearray = array("status" => 2000, "success" => true, "message" => "Offer shared successfully", "result" => array('total_points' => $total_ps1));
                                                $this->response($responsearray, REST_Controller::HTTP_OK);
                                            } else {

                                                $old_twitter_Points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                                $newpoints = ($old_twitter_Points[0]->twitter_points) + $res[0]->twitter_points;

                                                $update_points = $this->Apimodel->update('T_UserPoint', array('user_id' => $post['user_id']), array("twitter_points" => $newpoints));

                                                // 

                                                $user_Points3 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                                $total_ps2 = (($user_Points3[0]->facebook_points) + ($user_Points3[0]->twitter_points) + ($user_Points3[0]->walking_points) + ($user_Points3[0]->reward_points) - ($user_Points3[0]->coupon_redeem_rubs));

                                                // for notification sending

                                                $device_token = $res1[0]->device_token;
                                                $title = "Offer shared";
                                                $body = "Offer shared with twitter";
                                                $notification = $this->callNotification($device_token, $title, $body);

                                                // end notification


                                                $responsearray = array("status" => 2000, "success" => true, "message" => "Offer shared successfully", "result" => array('total_points' => $total_ps2));
                                                $this->response($responsearray, REST_Controller::HTTP_OK);
                                            }
                                        } else {

                                            $insert_arr = [
                                                "user_id" => $post['user_id'],
                                                "twitter_points" => $res[0]->twitter_points
                                            ];

                                            $insert_res = $this->Apimodel->insert('T_UserPoint', $insert_arr);



                                            $user_Points4 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                                            $total_ps3 = (($user_Points4[0]->facebook_points) + ($user_Points4[0]->twitter_points) + ($user_Points4[0]->walking_points) + ($user_Points4[0]->reward_points) - ($user_Points4[0]->coupon_redeem_rubs));


                                            // for notification sending

                                            $device_token = $res1[0]->device_token;
                                            $title = "Offer shared";
                                            $body = "Offer shared with twitter";
                                            $notification = $this->callNotification($device_token, $title, $body);

                                            // end notification

                                            $responsearray = array("status" => 2000, "success" => true, "message" => "Offer shared successfully", "result" => array('total_points' => $total_ps3));
                                            $this->response($responsearray, REST_Controller::HTTP_OK);
                                        } //user points
                                    } //$remaining
                                } //if (res= 0)
                            }
                        }
                    }

                    $responsearray = array("status" => 2000, "success" => true, "message" => "Offer shared successfully", "result" => $s ? $s : new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {
                    $responsearray = array("status" => 6013, "success" => true, "message" => "Store balance is not sufficient.", "result" => $s ? $s : new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } //  $store_point > 0             
            } else { // if ($res1 > 0)
                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } //if($res > 0)
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getUserPoints_post()
    {
        // print_r(date('Y-m-d H:i:s'));die;
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';


        $required = array(
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res1 > 0) {

                $points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                $facebook = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"], 'share_type' => 'facebook_points'));


                $twitter = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"], 'share_type' => 'twitter_points'));


                $alltransaction = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"]));

                $walking_points = $this->Apimodel->get_walking_points($post["user_id"]);

                $paytm_cash_redeem = $this->Apimodel->select_data('T_PaytmRedeemRequests', array('user_id' => $post["user_id"], "request_status" => "10"));
                //$coupon_redeem = $this->Apimodel->select_data('T_CouponClaims', array('user_id' => $post["user_id"]));
                //  $coupon_redeem = $this->Apimodel->select_data('T_CouponClaims', array('user_id' => $post["user_id"],'request_status'=>10));

                $coupon_redeem = $this->Apimodel->get_coupon_claims_points($post["user_id"]);

                $query_reward = $this->db->query("select * from referral_app where from_id=" . $post['user_id'] . " or to_id=" . $post['user_id']);
                $reward_points = $query_reward->result();



                // var_dump($walking_points);die;
                if (!empty($points)) {

                    $deduct_points = ($points[0]->paytm_redeem_rubs);
                    $total = (($points[0]->facebook_points) + ($points[0]->twitter_points) + ($points[0]->walking_points) + ($points[0]->reward_points) - ($points[0]->coupon_redeem_rubs));

                    $points1[] = [
                        "facebook_points" => $points[0]->facebook_points ?: '',
                        "twitter_points" => $points[0]->twitter_points ?: '',
                        "walking_points" => $points[0]->walking_points ?: '',
                        "reward_points" => $points[0]->reward_points ?: '',
                        "total_points" => $total - $deduct_points ?: '',
                    ];
                } else {
                    $points1 = [];
                }

                $storeId_temp = array();
                $storeOfferId_temp = array();
                if ($facebook != 0) {
                    foreach ($facebook as $key) {
                        array_push($storeId_temp, $key->store_id);
                        array_push($storeOfferId_temp, $key->store_offer_id);
                    }

                    $storeNames = $this->Apimodel->select_data_in('T_Store', 'store_first_name', 'store_id', $storeId_temp);
                    $storeOfferNames = $this->Apimodel->select_data_in('T_StoreOffer', 'title', 'store_offer_id', $storeOfferId_temp);
                }
                if (!empty($facebook)) {
                    foreach ($facebook as $key) {

                        $fb[] = array(
                            "user_id" => $key->user_id ?: '',
                            "store_id" => $key->store_id ?: '',
                            "store_offer_id" => $key->store_offer_id ?: '',
                            "store_name" => $storeNames[$key->store_id] ?: '',
                            "title(offer name)" => $storeOfferNames[$key->store_offer_id] ?: '',
                            "points" => $key->facebook_points ?: '',
                            "point_type" => "facebook",
                            "transaction_type" => "credit",
                            "created_date" =>  date('Y-m-d H:i:s', strtotime($key->created_date)) ?: ''
                        );
                    }
                } else {
                    $fb = [];
                }
                $storeId_temp = array();
                $storeOfferId_temp = array();

                if ($twitter != 0) {
                    foreach ($twitter as $key) {
                        array_push($storeId_temp, $key->store_id);
                        array_push($storeOfferId_temp, $key->store_offer_id);
                    }
                    $storeNames = $this->Apimodel->select_data_in('T_Store', 'store_first_name', 'store_id', $storeId_temp);
                    $storeOfferNames = $this->Apimodel->select_data_in('T_StoreOffer', 'title', 'store_offer_id', $storeOfferId_temp);
                }
                if (!empty($twitter)) {
                    foreach ($twitter as $key) {
                        $tw[] = array(
                            "user_id" => $key->user_id ?: '',
                            "store_id" => $key->store_id ?: '',
                            "store_offer_id" => $key->store_offer_id ?: '',
                            "store_name" => $storeNames[$key->store_id] ?: '',
                            "title(offer name)" => $storeOfferNames[$key->store_offer_id] ?: '',
                            "points" => $key->twitter_points ?: '',
                            "point_type" => "twitter",
                            "transaction_type" => "credit",
                            "created_date" => date('Y-m-d H:i:s', strtotime($key->created_date)) ?: ''
                        );
                    }
                } else {
                    $tw = [];
                }

                $storeId_temp = array();
                $storeOfferId_temp = array();

                if ($alltransaction != 0) {
                    foreach ($alltransaction as $key) {
                        array_push($storeId_temp, $key->store_id);
                        array_push($storeOfferId_temp, $key->store_offer_id);
                    }
                    $storeNames = $this->Apimodel->select_data_in('T_Store', 'store_first_name', 'store_id', $storeId_temp);
                    $storeOfferNames = $this->Apimodel->select_data_in('T_StoreOffer', 'title', 'store_offer_id', $storeOfferId_temp);
                }
                if (!empty($alltransaction)) {
                    foreach ($alltransaction as $key) {
                        $all[] = array(
                            "user_id" => $key->user_id ?: '',
                            "store_id" => $key->store_id ?: '',
                            "store_offer_id" => $key->store_offer_id ?: '',
                            "store_name" => $storeNames[$key->store_id] ?: '',
                            "title(offer name)" => $storeOfferNames[$key->store_offer_id] ?: '',
                            "facebook_points" => $key->facebook_points ?: '',
                            "twitter_points" => $key->twitter_points ?: '',
                            "point_type" => "facebook",
                            "transaction_type" => "credit",
                            "created_date" => date('Y-m-d H:i:s', strtotime($key->created_date)) ?: ''
                        );
                    }
                } else {
                    $all = [];
                }
                //print_r($walking_points);die;
                if (!empty($walking_points)) {
                    foreach ($walking_points as $key) {
                        $walkin[] = array(
                            "beacon_activity_id" => $key->beacon_activity_id ?: '',
                            "beacon_id" => $key->beacon_id ?: '',
                            "user_id" => $key->user_id ?: '',
                            "store_id" => $key->store_id ?: '',
                            "points" => $key->walkin_points ?: '',
                            "point_type" => "walking",
                            "transaction_type" => "credit",
                            "created_date" => date('Y-m-d H:i:s', strtotime($key->created_date)) ?: '',
                            "store_name" => $key->store_name ?: ''
                        );
                    }
                } else {
                    $walkin = [];
                }
                if (!empty($paytm_cash_redeem)) {
                    foreach ($paytm_cash_redeem as $key) {
                        $paytm[] = array(
                            "id" => $key->id ?: '',
                            "user_id" => $key->user_id ?: '',
                            "points" => $key->no_of_rubs ?: '',
                            "point_type" => "paytm_redeem",
                            "transaction_type" => "debit",
                            "created_date" => date('Y-m-d H:i:s', strtotime($key->created_date)) ?: ''
                        );
                    }
                } else {
                    $paytm = [];
                }
                if (!empty($coupon_redeem)) {
                    foreach ($coupon_redeem as $key) {
                        $coupon[] = array(
                            "id" => $key->id ?: '',
                            "coupon_id" => $key->coupon_id ?: '',
                            "user_id" => $key->user_id ?: '',
                            "coupon_title" => $key->coupon_title ?: '',
                            "store_name" => $key->store_id ?: '',
                            "points" => $key->claim_for_rubs ?: '',
                            "point_type" => "coupon_redeem",
                            "transaction_type" => "debit",
                            "created_date" => date('Y-m-d H:i:s', strtotime($key->created_date)) ?: ''
                        );
                    }
                } else {
                    $coupon = [];
                }
                if (!empty($reward_points)) {
                    foreach ($reward_points as $key) {
                        $reward[] = array(
                            "id" => $key->id ?: '',
                            "user_id" => $key->from_id  ?: '',
                            "points" => $key->points ?: '',
                            "point_type" => "reward",
                            "transaction_type" => "credit",
                            "medium" => $key->medium,
                            "created_date" => date('Y-m-d H:i:s', strtotime($key->created_date)) ?: ''
                        );
                    }
                } else {
                    $reward = [];
                }

                $fb = $fb ?: [];
                $tw = $tw ?: [];

                $paytm = $paytm ?: [];
                $coupon = $coupon ?: [];
                $walkin = $walkin ?: [];
                $reward = $reward ?: [];

                $more1 = array_merge($fb, $tw);
                $more2 = array_merge($paytm, $coupon);
                $more3 = array_merge($more1, $more2);
                $more4 = array_merge($more3, $walkin);
                $more5 = array_merge($more4, $reward);

                // var_dump($more4);die;  
                // sort($more4);

                function sortByOrder($a, $b)
                {
                    return $a['created_date'] < $b['created_date'];
                }

                usort($more5, 'sortByOrder');
                usort($fb, 'sortByOrder');
                usort($tw, 'sortByOrder');
                usort($walkin, 'sortByOrder');
                // usort($reward, 'sortByOrder');
                // array_sort($more4, 'created_date', SORT_ASC);
                // array_multisort($more1, $more2, $more3, $more4);


                $responsearray = array("status" => 2000, "success" => true, "message" => "User Points", "result" => array('my_points' => $points1, 'facebook_points' => $fb, 'twitter_points' => $tw, 'walking_points' => $walkin, 'all_transaction' => $more5));

                $this->response($responsearray, REST_Controller::HTTP_OK);
                // } else {
                //     $responsearray = array("status"=>2000,"success" => true, "message" => "User don't have any points", "result" => new stdClass() );
                //     $this->response($responsearray, REST_Controller::HTTP_OK);
                // }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getCategory_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';

        $category = $this->Apimodel->select_data('T_Categorys', array('category_id !=' => "0"));

        if ($category) {

            foreach ($category as $key) {

                $result[] = array(
                    "category_id" => $key->category_id ?: '',
                    "category_name" => $key->name ?: '',
                    "white_image" => base_url() . "assets/images/white_images/w_" . $key->category_image ?: '',
                    "category_image" => base_url() . "assets/images/" . $key->category_image ?: ''
                );
            }

            $responsearray = array("status" => 2000, "success" => true, "message" => "Category list.", "result" => $result);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        } else {

            $responsearray = array("status" => 6013, "success" => false, "message" => "Category not found.", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getProfile_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



        $required = array(
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $profile = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id']));

            if ($profile) {

                $result = [
                    "user_id" => $profile[0]->user_id,
                    "name" => $profile[0]->name ?: '',
                    "email" => $profile[0]->email ?: '',
                    "password" => $profile[0]->password ?: '',
                    "is_social" => $profile[0]->is_social,
                    "phone_number" => $profile[0]->phone_number ?: '',
                    "city" => $profile[0]->city ?: '',
                    "state" => $profile[0]->state ?: '',
                    "address" => $profile[0]->address ?: '',
                    "gender" => $profile[0]->gender ?: '',

                    "profile_image" => $profile[0]->profile_image ? base_url() . "uploads/" . $profile[0]->profile_image : '',
                    "is_email" => $profile[0]->email_verified,
                ];

                $responsearray = array("status" => 2000, "success" => true, "message" => "Profile detail", "result" => $result);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User not found.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function saveUserFavorites_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



        $required = array(
            "user_id" => $post['user_id'],
            "favorite_type" => $post['favorite_type'],
            "type_id" => $post['type_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res1 > 0) {

                $chk_if_already = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post["user_id"], 'favorite_type' => $post["favorite_type"], 'type_id' => $post["type_id"]));

                // if($post['favorite_type'] == "store"){

                $chk_if_store = $this->Apimodel->select_data('T_Store', array('store_id' => $post["type_id"]));
                // }
                // if($chk_if_already){
                //         $responsearray = array("status"=>1910,"success" => true, "favorite" => true, "message" => "You have already favorite this", "result" => new stdClass());
                //         $this->response($responsearray, REST_Controller::HTTP_OK);
                // } else {

                if ($post['favorite_type'] == "store") {
                    $msg = "a";
                    $msg1 = "";
                } else {
                    $msg = "an";
                    $msg1 = "";
                }

                $insert_arr = [
                    "user_id" => $post['user_id'],
                    "favorite_type" => $post['favorite_type'],
                    "type_id" => $post['type_id']
                ];


                if ($post['favorite_type'] == "store") {
                    $activity_data = [
                        "user_id" => $post['user_id'],
                        "activity_name" => "favorited " . $msg . " " . $post['favorite_type'] . " " . $msg1 . "",
                        "activity_type" => "favorite_" . $post['favorite_type'],
                        "activity_date" => date("Y-m-d"),
                        "activity_time" => date("H:i:s"),
                        "store" => $chk_if_store[0]->store_id,
                        "store_id" => $chk_if_store[0]->store_id
                    ];

                    $insert_res = $this->Apimodel->insert('T_ActivityLog', $activity_data);
                }

                if ($post['favorite_type'] == "offer") {

                    $chk_if_offer = $this->Apimodel->select_data('T_StoreOffer', array('store_offer_id' => $post["type_id"]));

                    $activity_data = [
                        "user_id" => $post['user_id'],
                        "activity_name" => "favorited " . $msg . " " . $post['favorite_type'] . " " . $msg1 . "",
                        "activity_type" => "favorite_" . $post['favorite_type'],
                        "activity_date" => date("Y-m-d"),
                        "activity_time" => date("H:i:s"),
                        "store" => $chk_if_offer[0]->store_id,
                        "store_offer_id" => $post['type_id'],
                        "store_id" => $chk_if_offer[0]->store_id
                    ];

                    $insert_res = $this->Apimodel->insert('T_ActivityLog', $activity_data);
                }



                $insert_res = $this->Apimodel->insert('T_UserFavorites', $insert_arr);


                $responsearray = array("status" => 2000, "success" => true, "favorite" => true, "message" => "Added as favorite successfully", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);

                // }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function deleteUserFavorites_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



        $required = array(
            "user_id" => $post['user_id'],
            "favorite_type" => $post['favorite_type'],
            "type_id" => $post['type_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res1 > 0) {


                $delete_data = $this->Apimodel->delete('T_UserFavorites', array('user_id' => $post["user_id"], 'favorite_type' => $post["favorite_type"], 'type_id' => $post["type_id"]));

                // $insert_res= $this->Apimodel->insert('T_UserFavorites',$insert_arr);

                $responsearray = array("status" => 2000, "success" => true, "favorite" => false, "message" => "Offer removed from your favorite list", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);

                // }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function updateEmail_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        $sample = '["user_id"]';

        $required = array(
            "user_id" => $post["user_id"],
            "email" => $post["email"]
        );

        $key = array_keys($required, "");


        if (!$key) {

            $user_chk = $this->Apimodel->select_data('T_User', array('email' => $post["email"]));
            $store_email_chk = $this->Apimodel->select_data('T_Store', array('store_email' => $post["email"]));


            $user_1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));


            if ($user_chk) {

                $responsearray = array("status" => 2202, "success" => false, "message" => "Email address already exists.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } elseif ($store_email_chk) {

                $responsearray = array("status" => 2202, "success" => false, "message" => "Email address already exists.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $url = str_replace(' ', '', base_url('index.php/Welcome/update_email_request'));
                $body = "You have requested to update your email, <a href='" . $url . "?email=" . $user_1[0]->email . "&updateemail=" . $post['email'] . "'>Click</a> here to update your email address.";

                $subject = 'Update email request';
                $to_email = $post['email'];
                $headers = "MIME-Version: 1.0" . "\r\n";
                // $headers .= "" . "\r\n";
                $req_update_mail = $this->send_mail($to_email, $subject, $body, $headers);

                // if($req_update_mail){
                //     var_dump("expression");die;
                // }else{
                //     var_dump("expression2");die;
                // }
                // die;


                $user_database = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                $post_arr = [
                    'phone_number' => $post["phone_number"] ?: $user_database[0]->phone_number,
                    'address' => $post['address'] ?: $user_database[0]->address,
                    'city' => $post['city'] ?: $user_database[0]->city,
                    'state' => $post['state'] ?: $user_database[0]->state,
                    'gender' => $post['gender'] ?: $user_database[0]->gender,
                    'name' => $post['name'] ?: $user_database[0]->name,
                    'profile_image' => $post['profile_image'] ? $this->uploadimage($post['profile_image']) : $user_database[0]->profile_image
                ];



                $done_update = $this->Apimodel->update('T_User', array('user_id' => $post["user_id"]), $post_arr);




                $user_d = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                $post_arr2 = [
                    'user_id' => $user_d[0]->user_id ?: '',
                    'name' => $user_d[0]->name ?: '',
                    'email_address' => $user_d[0]->email ?: '',
                    'phone_number' => $user_d[0]->phone_number ?: '',
                    'city' => $user_d[0]->city ?: '',
                    'state' => $user_d[0]->state ?: '',
                    'address' => $user_d[0]->address ?: '',
                    'gender' => $user_d[0]->gender ?: '',
                    'profile_image' => $user_d[0]->profile_image ? base_url() . "uploads/" . $user_d[0]->profile_image : ''
                ];



                $responsearray = array("status" => 2111, "success" => true, "message" => "Verification link is sent to your mail for email updation request.", "result" => $post_arr2);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function updatePhone_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        $sample = '["user_id"]';

        // var_dump($post);die;

        $required = array(
            "user_id" => $post["user_id"],
            "phone_number" => $post["phone_number"]
        );

        $key = array_keys($required, "");

        if (!$key) {

            $user_phone_chk = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));

            if ($user_phone_chk) {

                $responsearray = array("status" => 2202, "success" => false, "message" => "Phone number already exists.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $user_database = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                $post_arr = [
                    'email' => $post["email"] ?: $user_database[0]->email,
                    // 'phone_number' => $post["phone_number"]? : '',
                    'address' => $post['address'] ?: $user_database[0]->address,
                    'city' => $post['city'] ?: $user_database[0]->city,
                    'state' => $post['state'] ?: $user_database[0]->state,
                    'gender' => $post['gender'] ?: $user_database[0]->gender,
                    'name' => $post['name'] ?: $user_database[0]->name,
                    'profile_image' => $post['profile_image'] ? $this->uploadimage($post['profile_image']) : $user_database[0]->profile_image
                ];



                $phone_update = $this->Apimodel->update('T_User', array('user_id' => $post["user_id"]), $post_arr);



                for ($i = 5; $i > 0; $i--) {
                    $str2 = rand(1000, 9999);
                }

                $str2 = $str2;
                $match2 = $str2;

                $update_mobile_request = $this->Apimodel->update('T_User', array('user_id' => $post['user_id']), array('otp' => $match2));
                $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $post['phone_number'] . "&message=%3C%23%3E+Your+OTP+is " . $match2 . "+" . $this->google_sms_key . "&sender=CASHRUB&route=4&country=0");


                // sending mail

                $body_p = "Your OTP is " . $match2;
                $subject_p = 'Phone number update';
                $to_p_email = $user_database[0]->email;
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $profile_update_mail = $this->send_mail($to_p_email, $subject_p, $body_p, $headers);

                // end
                // for notification sending

                $device_token = $user_database[0]->device_token;
                $title = "Phone number update";
                $body = "Your OTP is " . $match2;
                $notification = $this->callNotification($device_token, $title, $body);

                // end notification
                // 



                $post_arr2 = [
                    'user_id' => $user_database[0]->user_id ?: '',
                    'name' => $user_database[0]->name ?: '',
                    'email_address' => $user_database[0]->email ?: '',
                    'phone_number' => $user_database[0]->phone_number ?: '',
                    'city' => $user_database[0]->city ?: '',
                    'state' => $user_database[0]->state ?: '',
                    'address' => $user_database[0]->address ?: '',
                    'gender' => $user_database[0]->gender ?: '',
                    'profile_image' => $user_database[0]->profile_image ? base_url() . "uploads/" . $user_database[0]->profile_image : ''
                ];

                // var_dump($user_database);die;


                $responsearray = array("status" => 2112, "success" => true, "message" => "Your OTP code is sent successfully", "result" => $post_arr2);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function updateProfile_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        $sample = '["user_id"]';

        $required = array(
            "user_id" => $post["user_id"]
        );

        $key = array_keys($required, "");

        if (!$key) {

            $user_de = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($post['address'] == '') {
                $add = ' ';
            } else {
                $add = $post['address'];
            }

            $post_arr = [
                'email' => $user_de[0]->email,
                'phone_number' => $user_de[0]->phone_number,
                'address' => $add ?: $user_de[0]->address,
                'city' => $post['city'] ?: $user_de[0]->city,
                'state' => $post['state'] ?: $user_de[0]->state,
                'gender' => $post['gender'] ?: $user_de[0]->gender,
                'name' => $post['name'] ?: $user_de[0]->name,
                'profile_image' => $post['profile_image'] ? $this->uploadimage($post['profile_image']) : $user_de[0]->profile_image
            ];

            $res = $this->Apimodel->update('T_User', array('user_id' => $post["user_id"]), $post_arr);

            // sending mail

            $body_p2 = "Your profile has been updated recently.";
            $subject_p2 = 'Profile update';
            $to_p_email2 = $user_de[0]->email;
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $profile_update_mail = $this->send_mail($to_p_email2, $subject_p2, $body_p2, $headers);

            // end
            // for notification sending

            $device_token = $user_de[0]->device_token;
            $title = "Profile update";
            $body = "Your profile has been updated recently.";
            $notification = $this->callNotification($device_token, $title, $body);

            // end notification

            $user_de_get = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            $post_arr2 = [
                'user_id' => $user_de_get[0]->user_id ?: '',
                'name' => $user_de_get[0]->name ?: '',
                'email_address' => $user_de_get[0]->email ?: '',
                'phone_number' => $user_de_get[0]->phone_number ?: '',
                'city' => $user_de_get[0]->city ?: '',
                'state' => $user_de_get[0]->state ?: '',
                'address' => $user_de_get[0]->address ?: '',
                'gender' => $user_de_get[0]->gender ?: '',
                'profile_image' => $user_de_get[0]->profile_image ? base_url() . "uploads/" . $user_de_get[0]->profile_image : ''
            ];


            $responsearray = array("status" => 2113, "success" => true, "message" => "User profile updated successfully", "result" => $post_arr2);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        } else {

            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    public function uploadimage($img)
    {
        // echo $img;
        $imgdata = explode('base64,', $img);
        //   print_r($imgdata);die;
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

        $file = getcwd() . '/uploads/' . $filename;

        $success = file_put_contents($file, $data);
        // print_r($success);die;
        if ($success) {
            return $filename;
        } else {
            return 'error';
        }
    }

    function getBeaconDetect1_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id"]';

        $required = array(
            "uuid" => $post['uuid'],
            "major" => $post['major'],
            "minor" => $post['minor'],
            "user_id" => $post['user_id']
            // "store_id"=>$post['store_id'],
            // "beacon_id" => $post['beacon_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res1 > 0) {

                $get_beacon_id_from_uuid = $this->Apimodel->select_data('T_Beacons', array('beacon_uuid' => $post["uuid"], 'beacon_major' => $post["major"], 'beacon_minor' => $post["minor"]));


                if ($get_beacon_id_from_uuid) {

                    $beacon_id = $get_beacon_id_from_uuid[0]->id;
                    $store_id = $get_beacon_id_from_uuid[0]->store_id;
                    $beacon_place = $get_beacon_id_from_uuid[0]->beacon_place;

                    $beacon_key = $get_beacon_id_from_uuid[0]->beacon_key;


                    $chk_if_entrance_beacon = $get_beacon_id_from_uuid[0]->is_entrance_beacon;

                    $chk_beacon_activity = $this->Apimodel->select_data('T_BeaconActivity', array(
                        'beacon_id' => $beacon_id,
                        'store_id' => $store_id,
                        'beacon_key' => $beacon_key,
                        'beacon_place' => $beacon_place,
                        'user_id' => $post["user_id"],
                        'exit_time' => '00:00:00'
                    ));

                    // if($beacon_place != "Entrance Store"){
                    // echo "yes";

                    if ($chk_if_entrance_beacon != "1") {
                        if ($chk_beacon_activity[0]->flag_of_inside_store == 'inside_detection') {

                            $update_inside_beacon_detection = [
                                "beacon_id" => $beacon_id,
                                "beacon_place" => $beacon_place,
                                "beacon_key" => $beacon_key,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s")
                            ];

                            $update_if_already_detected_earlier = $this->Apimodel->update('T_BeaconActivity', array(
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "exit_time" => "00:00:00"
                            ), array(
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s")
                            ));

                            $get_store_name_in_updation_1 = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id));
                            $message_2 = "Beacon detected inside " . $get_store_name_in_updation_1[0]->store_first_name;

                            // callNotification

                            $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                            $device_token = $get_token[0]->device_token;
                            $title = "Detected Inside";
                            $body = $message_2;

                            $uuid = $post['uuid'];
                            $major = $post['major'];
                            $minor = $post['minor'];

                            // $beacon_database = array('uuid' => $uuid, 'major' => $major, 'minor' => $minor );

                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, '', '');



                            // $notification =  $this->callNotification($device_token,$title,$body);
                            // end

                            $beacon_database = array('uuid' => $post['uuid'], 'major' => $post['major'], 'minor' => $post['minor']);


                            $responsearray = array("status" => 2000, "success" => true, "message" => $message_2, "result" => $beacon_database);
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {

                            $inside_beacon_detection = [
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s")
                            ];


                            $insert_1 = $this->Apimodel->insert('T_BeaconActivity', $inside_beacon_detection);

                            $update_flag_of_detect = $this->Apimodel->update('T_BeaconActivity', array(
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id']
                            ), array('flag_of_inside_store' => 'inside_detection'));


                            $get_store_name_1 = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id));
                            $message = "Beacon detected inside " . $get_store_name_1[0]->store_first_name;

                            // callNotification

                            $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));




                            $device_token = $get_token[0]->device_token;
                            $title = "Detected Inside";
                            $body = $message;

                            $uuid = $post['uuid'];
                            $major = $post['major'];
                            $minor = $post['minor'];

                            $beacon_database = array('uuid' => $uuid, 'major' => $major, 'minor' => $minor);

                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, '', '');

                            // end


                            $responsearray = array("status" => 2000, "success" => true, "message" => $message, "result" => $beacon_database);
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                    }



                    if ($chk_if_entrance_beacon == "1") {


                        $chk_beacon_1 = $this->Apimodel->select_data('T_BeaconActivity', array(
                            // 'beacon_id' => $beacon_id,
                            'store_id' => $store_id,
                            'user_id' => $post["user_id"],
                            'flag_of_inside_store' => "inside_detection",
                            'exit_time' => '00:00:00'
                        ));

                        // var_dump($chk_beacon_1);die;


                        if ($chk_beacon_1) {

                            // new

                            $chk_beacon_2 = $this->Apimodel->select_data('T_BeaconActivity', array(
                                // 'beacon_id' => $beacon_id,
                                'store_id' => $store_id,
                                'user_id' => $post["user_id"],
                                'flag_of_detection' => "detected",
                                'exit_time' => '00:00:00'
                            ));


                            $to_time = strtotime($chk_beacon_2[0]->detected_time);
                            $from_time = strtotime(date("H:i:s"));
                            $time_d = round(abs($to_time - $from_time) / 60, 2);

                            // ?end


                            $update_4 = $this->Apimodel->update('T_BeaconActivity', array(
                                // "beacon_id"=> $beacon_id, 
                                // "beacon_place"=> "Center Store", 
                                // "flag_of_detection" => "detection",
                                "flag_of_inside_store" => "inside_detection",
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "exit_time" => "00:00:00"
                            ), array(
                                "exit_date" => date("Y-m-d"),
                                "exit_time" => date("H:i:s"),
                                "total_spent_time" => $time_d
                            ));


                            // save user point on walkin

                            if ($time_d > 1) {

                                $get_store_alloted_walkin = $this->Apimodel->select_data('T_Store', array(
                                    'store_id' => $store_id
                                ));

                                $get_user_walkin_first = $this->Apimodel->select_data('T_UserPoint', array(
                                    'user_id' => $post['user_id']
                                ));

                                $user_point = $get_user_walkin_first[0]->walking_points;
                                $store_point = $get_store_alloted_walkin[0]->walking_point;
                                $new_point = $store_point + $user_point;

                                if ($get_user_walkin_first) {

                                    $update_user_walk_point = $this->Apimodel->update('T_UserPoint', array(
                                        "user_id" => $post['user_id']
                                    ), array(
                                        "walking_points" => $new_point
                                    ));


                                    // callNotification

                                    $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));


                                    $device_token = $get_token[0]->device_token;

                                    $title = "Points earned";
                                    $body = "You have earned points";

                                    $uuid = $post['uuid'];
                                    $major = $post['major'];
                                    $minor = $post['minor'];

                                    $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, '', '');

                                    // end
                                }

                                if (!$get_user_walkin_first) {

                                    $insert_walkin_point = [
                                        "user_id" => $post['user_id'],
                                        "walking_points" => $new_point
                                    ];

                                    $insert_walkin = $this->Apimodel->insert('T_UserPoint', $insert_walkin_point);

                                    // callNotification

                                    $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));


                                    $device_token = $get_token[0]->device_token;

                                    $title = "Points earned";
                                    $body = "You have earned points";

                                    $uuid = $post['uuid'];
                                    $major = $post['major'];
                                    $minor = $post['minor'];

                                    $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, '', '');

                                    // end                                                
                                    // echo "No";die;
                                }
                            }

                            // end save user point




                            $update_5 = $this->Apimodel->update('T_BeaconActivity', array(
                                // "beacon_id"=> $beacon_id, 
                                // "beacon_place"=> "Center Store", 
                                // "flag_of_detection" => "detection",
                                "flag_of_detection" => "detected",
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "exit_time" => "00:00:00"
                            ), array(
                                "exit_date" => date("Y-m-d"),
                                "exit_time" => date("H:i:s")
                            ));




                            $insert_beacon_detection = [
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s")
                            ];


                            $insert_res = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_detection);

                            $update_flag_of_detect = $this->Apimodel->update('T_BeaconActivity', array(
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id']
                            ), array('flag_of_detection' => 'detected'));


                            $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id));
                            $message = "Beacon detected near " . $get_store_name[0]->store_first_name;

                            // callNotification

                            $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                            $device_token = $get_token[0]->device_token;
                            $title = "Beacon Detected";
                            $body = $message;

                            $uuid = $post['uuid'];
                            $major = $post['major'];
                            $minor = $post['minor'];

                            $beacon_database = array('uuid' => $uuid, 'major' => $major, 'minor' => $minor);

                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, '', '');

                            // end

                            $responsearray = array("status" => 2000, "success" => true, "message" => $message, "result" => $beacon_database);
                            $this->response($responsearray, REST_Controller::HTTP_OK);


                            // end
                        }



                        if ($chk_beacon_activity[0]->flag_of_detection == "detected") {

                            // var_dump("Entrance with detected");
                            // die;

                            $update_beacon_detection = [
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s"),
                                "exit_time" => "00:00:00"
                            ];

                            $update_if_already_detected_earlier = $this->Apimodel->update('T_BeaconActivity', array(
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "exit_time" => "00:00:00"
                            ), array(
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s")
                            ));

                            $get_store_name_in_updation = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id));
                            $message_1 = "Beacon detected near " . $get_store_name_in_updation[0]->store_first_name;

                            // callNotification

                            $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                            $device_token = $get_token[0]->device_token;
                            $title = "Beacon Detected";
                            $body = $message_1;

                            $uuid = $post['uuid'];
                            $major = $post['major'];
                            $minor = $post['minor'];

                            // $beacon_database = array('uuid' => $uuid, 'major' => $major, 'minor' => $minor );

                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, '', '');





                            // $notification =  $this->callNotification($device_token,$title,$body);
                            // end

                            $beacon_database = array('uuid' => $post['uuid'], 'major' => $post['major'], 'minor' => $post['minor']);


                            $responsearray = array("status" => 2000, "success" => true, "message" => $message_1, "result" => $beacon_database);
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {

                            // var_dump("Entrance with fresh");
                            // die;
                            $insert_beacon_detection = [
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id'],
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s")
                            ];


                            $insert_res = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_detection);

                            $update_flag_of_detect = $this->Apimodel->update('T_BeaconActivity', array(
                                "beacon_id" => $beacon_id,
                                "beacon_key" => $beacon_key,
                                "beacon_place" => $beacon_place,
                                "store_id" => $store_id,
                                "user_id" => $post['user_id']
                            ), array('flag_of_detection' => 'detected'));


                            $get_store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id));
                            $message = "Beacon detected near " . $get_store_name[0]->store_first_name;

                            // callNotification

                            $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                            $device_token = $get_token[0]->device_token;
                            $title = "Beacon Detected";
                            $body = $message;


                            $uuid = $post['uuid'];
                            $major = $post['major'];
                            $minor = $post['minor'];

                            $beacon_database = array('uuid' => $uuid, 'major' => $major, 'minor' => $minor);

                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, '', '');


                            // end

                            $responsearray = array("status" => 2000, "success" => true, "message" => $message, "result" => $beacon_database);
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        }
                    }
                } else {

                    // $beacon_database = array('uuid' => $post['uuid'], 'major' => $post['major'], 'minor' => $post['minor'] );


                    $responsearray = array("status" => 2017, "success" => true, "message" => "Beacon not registered", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getAllCoupons_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id"]';

        $required = array(
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
            // if($res1 > 0){
            // $latitude = $post['latitude'];
            // $longitude = $post['longitude'];
            // $distance = "5";


            $coupon_data = $this->Apimodel->getAllCouponDetails();
            // var_dump($coupon_data);die;

            if ($coupon_data > 0) {

                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';

                foreach ($coupon_data as $key) {

                    $coupon_visi = $this->Apimodel->select_data('T_CouponClaims', array(
                        'user_id' => $post["user_id"],
                        'coupon_id' => $key->coupon_id, 'coupon_visibility_for_user' => "0"
                    ));


                    $no_of_claims_for_coupon = $this->Apimodel->select_data('T_CouponClaims', array('coupon_id' => $key->coupon_id));
                    if (!empty($no_of_claims_for_coupon)) {
                        //print_r($no_of_claims_for_coupon);die;
                        $count_coupon = count($no_of_claims_for_coupon);
                    } else {
                        $count_coupon = 0;
                    }
                    // var_dump($coupon_visi);die;
                    // if(!$coupon_visi){
                    // var_dump("true");die;

                    $result[] = array(
                        "coupon_id" => $key->coupon_id ?: '',
                        "coupon_title" => $key->coupon_title ?: '',
                        "coupon_expiry" => $key->coupon_expiry_date ?: '',
                        "description" => $key->coupon_description ?: '',
                        "provider" => $key->store_id,
                        "claims" => $key->claims,
                        "coupon_points" => $key->coupon_points ?: '',
                        "rubs" => '0',
                        "category_name" => $key->category_name ?: '',
                        "terms_and_conditions" => $key->terms ?: '',
                        "offer_image" => upload_url . "uploads/" . $key->coupon_image ?: '',
                        // "store_logo" => upload_url . "uploads/" . $key->store_logo ?: '',
                        // "store_logo" => '',
                        "store_id" => $key->store_id ?: '',
                        "created_date" => $key->created_date ?: '',
                        "claimed" => $coupon_visi ? 'yes' : 'no',
                        "no_of_claims" => $count_coupon,
                        "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT)
                    );

                    // }
                    // }
                }

                $page_from = ($page_index - 1) * $page_count;

                $s = array_slice($result, $page_from, $page_count);
                if (count($s) >= $page_count) {
                    $add_more = 1;
                } else {
                    $add_more = 0;
                }

                $responsearray = array("status" => 2000, "success" => true, "message" => "Coupons list fetch successfully", "add_more" => $add_more, "result" => $s ? $s : new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Coupons Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

            // }    
            // else{
            //     $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
            //             $this->response($responsearray, REST_Controller::HTTP_OK); 
            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function saveReviews_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';



        $required = array(
            "store_id" => $post['store_id'],
            "comment" => $post['comment'],
            "rating" => $post['rating'],
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {

            $user_image = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id']));

            $insert_reviews = [
                "user_id" => $post['user_id'],
                "store_id" => $post['store_id'],
                "comment" => $post['comment'],
                "user_name" => $user_image[0]->name,
                "user_image" => $user_image[0]->profile_image,
                "rating" => $post['rating']
            ];

            $activity_data = [
                "user_id" => $post['user_id'],
                "activity_name" => "gave rating to the store",
                "activity_type" => "rating",
                "activity_date" => date("Y-m-d"),
                "activity_time" => date("H:i:s"),
                "store_id" => $post['store_id']
            ];

            $insert_activity = $this->Apimodel->insert('T_ActivityLog', $activity_data);
            $insert_res = $this->Apimodel->insert('T_UserReviews', $insert_reviews);

            $responsearray = array("status" => 6013, "success" => true, "message" => "User Review added", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getReviews_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';



        $required = array(
            "store_id" => $post['store_id']
        );

        $key = array_keys($required, "");

        if (!$key) {


            $get_reviews = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $post['store_id']));


            foreach ($get_reviews as $key) {

                $result[] = array(
                    "review_id" => $key->review_id ?: '',
                    "user_id" => $key->user_id ?: '',
                    "user_name" => $key->user_name ?: '',
                    "user_image" => base_url() . "uploads/" . $key->user_image ?: '',
                    "store_id" => $key->store_id ?: '',
                    "comment" => $key->comment ?: '',
                    "rating" => $key->rating ?: '',
                    "created_date" => $key->created_date ?: '',
                    "last_updated_date" => $key->last_updated_date ?: ''
                );
            }

            $responsearray = array("status" => 6113, "success" => true, "message" => "User Review list", "result" => $result);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    // Coupon claim api 3 august 2017
    function saveClaimRequests_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "coupon_id" => $post['coupon_id'],
            "user_id" => $post['user_id'],
            "rubs" => $post['rubs']
        );


        $key = array_keys($required, "");

        if (!$key) {

            $user_chk = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id']));

            $insert_claim_request = [
                "user_id" => $post['user_id'],
                "coupon_id" => $post['coupon_id'],
                "claim_for_rubs" => $post['rubs'],
                "coupon_visibility_for_user" => "0",
                "claim_date" => date("Y-m-d"),
                "claim_status" => "1"
            ];

            $insert_res = $this->Apimodel->insert('T_CouponClaims', $insert_claim_request);
            $prev_claims = $this->Apimodel->select_data('T_Coupon', array('coupon_id' => $post['coupon_id']));
            $claims = $prev_claims[0]->claims;

            $increase_claims = $this->Apimodel->update('T_Coupon', array(
                "coupon_id" => $post['coupon_id']
            ), array(
                "claims" => $claims + 1
            ));

            $user_point = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));
            $prev_p2 = $user_point[0]->coupon_redeem_rubs;

            $t_p_o_u = $user_point[0]->walking_points + $user_point[0]->facebook_points + $user_point[0]->twitter_points;

            // var_dump($user_point);                
            // var_dump($post['rubs']." ".$t_p_o_u);die;

            if ($post['rubs'] < $t_p_o_u) {

                // $deduct_from_points = $this->Apimodel->update('T_UserPoint', array(
                //     "user_id" => $post['user_id']
                // ), array(
                //     "coupon_redeem_rubs" => $prev_p2 + $post['rubs']
                // ));

                $user_chk = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id']));
                // print_r($store);die;
                if (!empty($user_chk) && !empty($prev_claims)) {

                    $body = 'Hello ' . $user_chk[0]->name . '<br>
                  Thanks for redeeming ' . $prev_claims[0]->coupon_title . '. WE will send conformation mail to you once it has been approved by super admin. <br>
                  
                  Should have any query? Reach us to at contact@cashrub.in <br>
                  <br><br>
                   Thank You.';
                    $to_email = $user_chk[0]->email;
                    $subject = "Redeem Request";
                    $headers = "";
                    $sts = $this->send_mail($to_email, $subject, $body, $headers);
                    //print_r($this->email->print_debugger());die;
                }

                $responsearray = array("status" => 5236, "success" => true, "message" => "Your request has been sent, you will get a notification as soon as it approved.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 4000, "success" => false, "message" => "Your haven't enough rubs to claim this coupon.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function confirmClaimRequests_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "coupon_id" => $post['coupon_id'],
            "user_id" => $post['user_id']
        );


        $key = array_keys($required, "");

        if (!$key) {

            $user_chk = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id']));

            $verify_chk_of_claim = $this->Apimodel->select_data('T_CouponClaims', array('user_id' => $post['user_id'], 'coupon_id' => $post['coupon_id'], 'request_status' => 1));

            if ($verify_chk_of_claim) {

                $update_claim_status = $this->Apimodel->update('T_CouponClaims', array(
                    "user_id" => $post['user_id'],
                    "coupon_id" => $post['coupon_id']
                ), array(
                    "claim_status" => "1",
                    "coupon_visibility_for_user" => "0"
                ));


                $prev_claims = $this->Apimodel->select_data('T_Coupon', array('coupon_id' => $post['coupon_id']));

                $claims = $prev_claims[0]->claims;

                $increase_claims = $this->Apimodel->update('T_Coupon', array(
                    "coupon_id" => $post['coupon_id']
                ), array(
                    "claims" => $claims + 1
                ));


                $responsearray = array("status" => 5237, "success" => true, "message" => "Coupon Claimed successfully", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 5238, "success" => false, "message" => "Your coupon is pending for approval.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    //update on 24032018
    function getClaimedCouponsByUser_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
        );

        $key = array_keys($required, "");

        if (!$key) {

            $coupon_data = $this->Apimodel->getClaimedCouponsByUser($post['user_id']);

            if ($coupon_data > 0) {

                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';

                foreach ($coupon_data as $key) {

                    $result[] = array(
                        "user_id" => $key->user_id ?: '',
                        "claim_id" => $key->id ?: '',
                        "coupon_id" => $key->coupon_id ?: '',
                        "coupon_title" => $key->coupon_title ?: '',
                        "description" => $key->coupon_description ?: '',
                        "coupon_image" => 'http://cashrub.in/cashrub/admin/uploads/' . $key->coupon_image ?: '',
                        "coupon_expiry" => $key->coupon_expiry_date ?: '',
                        "provider" => $key->store_id ?: '',
                        "category_name" => $key->name ?: '',
                        "claims" => $key->claims,
                        "coupon_points" => $key->coupon_points ?: '',
                        "claim_code" => $key->claim_code ?: '',
                        "claim_date" => $key->claim_date ?: '',
                        "claim_status" => $key->claim_status ?: '',
                        "request_status" => $key->request_status ?: '',
                        "claim_for_rubs" => $key->claim_for_rubs ?: '',
                        "claimed" => $key->coupon_visibility_for_user ? 'yes' : 'no'
                    );
                }



                $page_from = ($page_index - 1) * $page_count;
                if (!empty($result)) {
                    $s = array_slice($result, $page_from, $page_count);
                } else {
                    $s = [];
                }

                $responsearray = array("status" => 2000, "success" => true, "message" => count($coupon_data) . " Coupons Claims list fetch successfully", "result" => $s);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "No Coupons Claims By User", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    // New Api 13 july
    function getUserFavoritesStore_post()
    {


        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id"]';

        $required = array(
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
            if ($res1 > 0) {
                $user_favorites = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post["user_id"], 'favorite_type' => "store"));
                if ($user_favorites) {
                    foreach ($user_favorites as $key) {
                        $store_name = $this->Apimodel->select_data('T_Store', array('store_id' => $key->type_id));

                        $lat1 = $post['latitude'];
                        $lon1 = $post['longitude'];

                        $lat2 = $store_name[0]->store_latitude;
                        $lon2 = $store_name[0]->store_longitude;


                        $theta = $lon1 - $lon2;
                        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                        $dist = acos($dist);
                        $dist = rad2deg($dist);
                        $miles = $dist * 60 * 1.1515;
                        $meters = $miles * 1609.34;
                        $km = $miles * 1.60934;

                        $category_name = $this->Apimodel->select_data('T_Categorys', array('category_id' => $store_name[0]->category));
                        $store_likes = $this->Apimodel->getUserStoreLikes($key->type_id);
                        // $totalVisitors = $this->Apimodel->totalVisitors($key->store_id);

                        $totalRatings = $this->Apimodel->countTotalRating($key->type_id);
                        $sumOfRatings = $this->Apimodel->sumTotalRating($key->type_id);

                        $sumR = $sumOfRatings[0]->sumO;

                        $countrR = $totalRatings[0]->countO;
                        if (!empty($countrR)) {
                            $rating = round($sumR / $countrR);
                        } else {
                            $rating = 0;
                        }

                        $store[] = array(
                            "favorite_id" => $key->favorite_id ?: '',
                            "user_id" => $key->user_id ?: '',
                            "favorite_store_name" => $store_name[0]->store_first_name ?: '',
                            "store_logo" => $store_name[0]->store_logo ?: '',
                            "walking_point" => $store_name[0]->walking_point ?: '',
                            "area_location" => $store_name[0]->area_location ?: '',
                            "likes" => $store_likes[0]->store_likes,
                            "category" => $category_name[0]->name ?: '',
                            "rating" => $rating,
                            "store_id" => $key->type_id ?: '',
                            "created_date" => $key->created_date ?: '',
                            "last_updated_date" => $key->last_updated_date ?: '',
                            "distance" => $km
                        );
                    }
                } else {
                    $store = [];
                }

                //  $offer = $offer ? $offer : [];
                $store = $store ? $store : [];


                // $datas = array_merge($store, $offer);

                $responsearray = array("status" => 2000, "success" => true, "message" => "User favourites", "result" => $store);
                $this->response($responsearray, REST_Controller::HTTP_OK);

                // } else { 
                //     $responsearray = array("status"=>6810,"success" => false, "message" => "No favourites found", "result" => new stdClass());
                //     $this->response($responsearray, REST_Controller::HTTP_OK);
                // }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    function getUserFavoritesOffer_post()
    {


        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id"]';



        $required = array(
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res1 > 0) {

                $user_offer_favorites = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post["user_id"], 'favorite_type' => "offer"));

                // var_dump($user_offer_favorites);die;

                if ($user_offer_favorites) {
                    foreach ($user_offer_favorites as $key) {


                        $offer_name = $this->Apimodel->select_data('T_StoreOffer', array('store_offer_id' => $key->type_id));

                        $category_name2 = $this->Apimodel->select_data('T_Categorys', array('category_id' => $offer_name[0]->category_id));

                        $store = $this->Apimodel->select_data('T_Store', array('store_id' => $offer_name[0]->store_id));

                        $store_social = $this->Apimodel->select_data('T_StoreOfferSocialPoint', array('store_offer_id' => $key->type_id));
                        $offer_data = $this->Apimodel->getFullOfferDetail($offer_name[0]->store_id);
                        $chk_if_offer_fav = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "offer", 'type_id' => $offer_name[0]->store_offer_id));

                        $chk_if_offer_shared_fb = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $offer_name[0]->store_offer_id, 'share_type ' => 'facebook_points'));

                        $chk_if_offer_shared_tw = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $offer_name[0]->store_offer_id, 'share_type' => 'twitter_points'));

                        $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $offer_name[0]->store_id, 'user_id' => $post['user_id']));
                        if (!empty($store_social)) {
                            $fb = $store_social[0]->facebook_points;
                            $tw = $store_social[0]->twitter_points;
                        } else {
                            $fb = 0;
                            $tw = 0;
                        }
                        $lat1 = $post['latitude'];
                        $lon1 = $post['longitude'];

                        $lat2 = $store[0]->store_latitude;
                        $lon2 = $store[0]->store_longitude;

                        $theta = $lon1 - $lon2;
                        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                        $dist = acos($dist);
                        $dist = rad2deg($dist);
                        $miles = $dist * 60 * 1.1515;
                        $meters = $miles * 1609.34;
                        $km = $miles * 1.60934;

                        $offer[] = array(
                            "favorite_id" => $key->favorite_id ?: '',
                            "user_id" => $key->user_id ?: '',
                            "favorite_offer_name" => $offer_name[0]->title ?: '',
                            "offer_image" => $offer_name[0]->offer_image ?: '',
                            "store_name" => $store[0]->store_first_name ?: '',
                            "store_logo" => 'http://cashrub.in/cashrub/admin/uploads/' . $store[0]->store_logo ?: '',
                            "area_location" => $store[0]->area_location ?: '',
                            "store_address1" => $store[0]->store_address1 ?: '',
                            "latitude" => $store[0]->store_latitude ?: '',
                            "longitude" => $store[0]->store_longitude ?: '',
                            "distance" => round($km, 2) ?: '',
                            "walking_point" => $store[0]->walking_point ?: '',
                            "facebook_points" => $fb,
                            "twitter_points" => $tw,
                            "category" => $category_name2[0]->name ?: '',
                            "store_offer_id" => $key->type_id ?: '',
                            "created_date" => $key->created_date ?: '',
                            "last_updated_date" => $key->last_updated_date ?: '',
                            "store_id" => $offer_data[0]->store_id,
                            "title" => $offer_data[0]->title,
                            "description" => $offer_data[0]->description,
                            "category_id" => $offer_data[0]->category_id,
                            "publish_date" => $offer_data[0]->publish_date,
                            "publish_time" => $offer_data[0]->publish_time,
                            "expiry_date" => $offer_data[0]->expiry_date,
                            "expiry_time" => $offer_data[0]->expiry_time,
                            "offer_image" => 'http://cashrub.in/cashrub/admin/uploads/' . $offer_data[0]->offer_image,
                            "offer_term_condition_id" => $offer_data[0]->offer_term_condition_id,
                            'terms_and_conditions' => $offer_data[0]->text,
                            "offer_status" => $offer_data[0]->offer_status,
                            "no_of_shares" => $offer_data[0]->no_of_shares,
                            "created_date" => $offer_data[0]->created_date,
                            "last_updated_date" => $offer_data[0]->last_updated_date,
                            "remaining_credits" => $offer_data[0]->maximum_point,
                            "offer_visibility" => $offer_data[0]->offer_visibility,
                            "category_name" => $offer_data[0]->name,
                            "is_favorite" => $chk_if_offer_fav ? true : false,
                            "is_shared_with_fb" => $chk_if_offer_shared_fb ? true : false,
                            "is_shared_with_tw" => $chk_if_offer_shared_tw ? true : false,

                        );
                        // var_dump($offer);die;
                    }
                } else {
                    $offer = [];
                }
                $responsearray = array("status" => 2000, "success" => true, "message" => "User favourites", "result" => $offer);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getStoreDetail_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



        $required = array(
            "user_id" => $post['user_id'],
            "store_id" => $post['store_id']
        );

        $key = array_keys($required, "");

        if (!$key) {

            $chk_if_store_is = $this->Apimodel->select_data('T_Store', array('store_id' => $post['store_id']));
            $store_data = $this->Apimodel->getStoreDetail();

            if ($chk_if_store_is > 0) {


                $chk_if_store_fav = $this->Apimodel->select_data('T_UserFavorites', array('favorite_type' => "store", 'type_id' => $post['store_id']));

                $totalVisitors = $this->Apimodel->totalVisitors($post['store_id']);
                $totalRatings = $this->Apimodel->countTotalRating($post['store_id']);
                $sumOfRatings = $this->Apimodel->sumTotalRating($post['store_id']);

                $sumR = $sumOfRatings[0]->sumO;
                $countrR = $totalRatings[0]->countO;
                $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $post['store_id'], 'user_id' => $post['user_id']));
                $store_likes = $this->Apimodel->getUserStoreLikes($post['store_id']);

                $lat1 = $post['latitude'];
                $lon1 = $post['longitude'];

                $lat2 = $chk_if_store_is[0]->store_latitude;
                $lon2 = $chk_if_store_is[0]->store_longitude;

                $distance = "1000";


                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $meters = $miles * 1609.34;
                $km = $miles * 1.60934;
                //    $unit = strtoupper($unit);

                // if($km <= $distance ){

                $of_data = $this->Apimodel->getFullStoreOfferDetail();

                $my_data_under_store = $this->Apimodel->getStoreOfferDetailByStoreId($post['store_id']);

                foreach ($my_data_under_store as $key2) {

                    $offer_likes = $this->Apimodel->getUserOfferLikes($key2->store_offer_id);
                    $chk_if_offer_fav2 = $this->Apimodel->select_data('T_UserFavorites', array('favorite_type' => "offer", 'type_id' => $key2->store_offer_id));

                    $result2[] = array(
                        "store_offer_id" => $key2->store_offer_id ?: '',
                        "title" => $key2->title ?: '',
                        "description" => $key2->description ?: '',
                        "category_name" => $key2->category_name ?: '',
                        "facebook_points" => ($key2->facebook_points) . " Points" ?: '',
                        "twitter_points" => ($key2->twitter_points) . " Points" ?: '',
                        "walking_points" => ($key2->store_walkin) ?: '',
                        "terms_and_conditions" => $key2->terms_and_conditions ?: '',
                        "offer_image" => upload_url . "uploads/" . $key2->offer_image ?: '',
                        "store_logo" => upload_url . "uploads/" . $key2->store_logo ?: '',
                        "publish_date" => $key2->publish_date ?: '',
                        "store_first_name" => $key2->store_first_name ?: '',
                        "created_date" => $key2->created_date ?: '',
                        "expiry_date" => $key2->expiry_date ?: '',
                        "offer_status" => $key2->status_name,
                        "latitude" => $key2->store_latitude,
                        "longitude" => $key2->store_longitude,
                        "store_address" => $key2->store_address1,
                        "distance" => round($km, 2) . " Km",
                        "is_favorite" => $chk_if_offer_fav2 ? true : false,
                        "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                        "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT)
                    );
                }
                if (empty($result2)) {
                    $result2 = [];
                }


                $post_arr5 = array(
                    "store_id" => $chk_if_store_is[0]->store_id ?: '',
                    "store_first_name" => $chk_if_store_is[0]->store_first_name ?: '',
                    "store_last_name" => $chk_if_store_is[0]->store_last_name ?: '',
                    "store_email" => $chk_if_store_is[0]->store_email ?: '',
                    "store_mobile_no" => $chk_if_store_is[0]->store_mobile_no ?: '',
                    "category" => $chk_if_store_is[0]->category ?: '',
                    "store_address1" => $chk_if_store_is[0]->store_address1 ?: '',
                    "store_address2" => $chk_if_store_is[0]->store_address2 ?: '',
                    "store_description" => $chk_if_store_is[0]->store_description ?: '',
                    "store_open_hours" => $chk_if_store_is[0]->store_open_hours ?: '',
                    "store_close_hours" => $chk_if_store_is[0]->store_close_hours ?: '',
                    "store_logo" => upload_url . "uploads/" . $chk_if_store_is[0]->store_logo ?: '',
                    "store_latitude" => $chk_if_store_is[0]->store_latitude ?: '',
                    "store_longitude" => $chk_if_store_is[0]->store_longitude ?: '',
                    "created_date" => $chk_if_store_is[0]->created_date ?: '',
                    "store_point" => $chk_if_store_is[0]->store_point ? $chk_if_store_is[0]->store_point : '0',
                    "walking_points" => $chk_if_store_is[0]->walking_point ? $chk_if_store_is[0]->walking_point : '0',
                    "is_favorite" => $chk_if_store_fav ? true : false,
                    "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                    "rating" => round($sumR / $countrR) ?: '0',
                    "like" => $store_likes[0]->store_likes,
                    "distance" => round($km, 2) . " Km",
                    "visitor" => $totalVisitors[0]->visitors ?: '0',
                    "cashback" => "0 %",
                    "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT),
                    "offers_for_store" => $result2 ?: []
                );



                $responsearray = array("status" => 2000, "success" => true, "message" => "Store detail fetch successfully", "result" => $post_arr5 ? $post_arr5 : new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Store Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getOfferDetail_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["store_id","access_token"]';



        $required = array(
            // "latitude" => $post['latitude'],
            // "longitude"=>$post['longitude'],
            "user_id" => $post['user_id'],
            "store_offer_id" => $post['store_offer_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            //         $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
            // if($res1 > 0){

            $latitude = $post['latitude'];
            $longitude = $post['longitude'];
            $distance = "500";



            $store_data = $this->Apimodel->getStoreOfferDetailByOfferId($post['store_offer_id']);
            // var_dump($store_data);die;

            if ($store_data > 0) {





                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';


                foreach ($store_data as $key) {

                    $chk_if_offer_fav = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "offer", 'type_id' => $key->store_offer_id));

                    $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $key->store_id, 'user_id' => $post['user_id']));

                    $lat1 = $latitude;
                    $lon1 = $longitude;
                    $lat2 = $key->store_latitude;
                    $lon2 = $key->store_longitude;




                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $meters = $miles * 1609.34;
                    $km = $miles * 1.60934;
                    //  $unit = strtoupper($unit);
                    // var_dump($km)   ;die;
                    // if($km <= $distance ){

                    $result[] = array(
                        "store_id" => $key->store_id ?: '',
                        "store_offer_id" => $key->store_offer_id ?: '',
                        "title" => $key->title ?: '',
                        "description" => $key->description ?: '',
                        "category_name" => $key->category_name ?: '',
                        "facebook_points" => ($key->facebook_points) . " Points" ?: '',
                        "twitter_points" => ($key->twitter_points) . " Points" ?: '',
                        "walking_points" => ($key->store_walkin) ?: '',
                        "terms_and_conditions" => $key->terms_and_conditions ?: '',
                        "offer_image" => upload_url . "uploads/" . $key->offer_image ?: '',
                        "store_logo" => upload_url . "uploads/" . $key->store_logo ?: '',
                        "publish_date" => $key->publish_date ?: '',
                        "store_first_name" => $key->store_first_name ?: '',
                        "created_date" => $key->created_date ?: '',
                        "expiry_date" => $key->expiry_date ?: '',
                        "offer_visibility" => $key->offer_visibility ?: '',
                        "offer_status" => $key->status_name,
                        "latitude" => $key->store_latitude,
                        "longitude" => $key->store_longitude,
                        "store_address" => $key->store_address1,
                        "distance" => round($km, 2) . " Km",
                        "is_favorite" => $chk_if_offer_fav ? true : false,
                        "is_already_rated_store_by_user" => $is_already_rated_store_by_user ? true : false,
                        "color" => '#' . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT) . str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT)
                    );
                    // }
                }

                $page_from = ($page_index - 1) * $page_count;

                $s = array_slice($result, $page_from, $page_count);


                $responsearray = array("status" => 2000, "success" => true, "message" => "Store Offer Fetch successfully", "result" => $s ? $s : new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Offer Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }

            // }    
            // else{
            //     $responsearray = array("status"=>6013,"success" => false, "message" => "User doesn't exists", "result" => new stdClass());
            //             $this->response($responsearray, REST_Controller::HTTP_OK); 
            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function updateRewardPoints_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "reward_points" => $post['reward_points']
        );

        $key = array_keys($required, "");

        if (!$key) {

            $user_chk = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

            if ($user_chk) {

                $old_points = $user_chk[0]->reward_points;
                $new_points = $old_points + $post['reward_points'];

                $update_if_already_detected_earlier = $this->Apimodel->update('T_UserPoint', array(
                    "user_id" => $post['user_id']
                ), array(
                    "reward_points" => $new_points
                ));

                $add_reward_table = [
                    "user_id" => $post['user_id'],
                    "reward_points" => $post['reward_points'],
                    "created_date" => date('Y-m-d H:i:s'),
                    "last_updated_date" => date('Y-m-d H:i:s')
                ];
                $adding_reward = $this->Apimodel->insert('`T_RewardPoints', $add_reward_table);


                $responsearray = array("status" => 5237, "success" => true, "message" => "Reward points updated", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $insert_reward = [
                    "user_id" => $post['user_id'],
                    "reward_points" => $post['reward_points']
                ];

                $insert_reward_points = $this->Apimodel->insert('T_UserPoint', $insert_reward);

                $add_reward_table2 = [
                    "user_id" => $post['user_id'],
                    "reward_points" => $post['reward_points']
                ];
                $adding_reward = $this->Apimodel->insert('T_RewardPoints', $add_reward_table2);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function savePaytmRedeemRequest_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "rubs" => $post['rubs']
        );

        $key = array_keys($required, "");

        if (!$key) {



            $insert_paytm = [
                "user_id" => $post['user_id'],
                "no_of_rubs" => $post['rubs'],
                "request_date" => date("Y-m-d")
            ];

            $insert_paytm_requests = $this->Apimodel->insert('T_PaytmRedeemRequests', $insert_paytm);

            // $user_point = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id'] ));
            // $prev_p =  $user_point[0]->paytm_redeem_rubs;
            // $deduct_from_points = $this->Apimodel->update('T_UserPoint', array(
            //     "user_id" => $post['user_id']
            // ), array(
            //     "paytm_redeem_rubs" => $prev_p + $post['rubs']
            // ));
            $user_chk = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id']));
            // print_r($store);die;
            if (!empty($user_chk)) {

                $body = 'Hello ' . $user_chk[0]->name . '<br>
                 Pending Alert!<br>
WE will send conformation mail to you once it has been approved by super admin.<br>

Should have any query? Reach us to at contact@cashrub.in <br>
                  <br><br>
                   Thank You.';
                $to_email = $user_chk[0]->email;
                $subject = "Paytm Request";
                $headers = '';
                $sts = $this->send_mail($to_email, $subject, $body, $headers);

                //print_r($this->email->print_debugger());die;
            }

            $responsearray = array("status" => 2000, "success" => true, "message" => "Rubs conversion request sent to superadmin for further process.", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);

            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function changePassword_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        $sample = '["user_id"]';

        // var_dump($post);die;

        $required = array(
            "user_id" => $post["user_id"],
            "old_password" => $post["old_password"],
            "new_password" => $post["new_password"]
        );

        $key = array_keys($required, "");

        if (!$key) {

            $user_old_p_chk = $this->Apimodel->select_data('T_User', array('password' => md5($post["old_password"])));

            if (!$user_old_p_chk) {

                $responsearray = array("status" => 4000, "success" => false, "message" => "Old password is incorrect.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $user_database = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

                $update_arr = [
                    'password' => md5($post['new_password'])
                ];

                $password_change = $this->Apimodel->update('T_User', array('user_id' => $post["user_id"]), $update_arr);



                // sending mail

                $body_p = "You have successfully changed your password.";
                $subject_p = 'Password changed successfully';
                $to_p_email = $user_database[0]->email;
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $profile_update_mail = $this->send_mail($to_p_email, $subject_p, $body_p, $headers);

                // end
                // for notification sending

                $device_token = $user_database[0]->device_token;
                $title = "Password change";
                $body = "You have successfully change your password.";
                $notification = $this->callNotification($device_token, $title, $body);

                // end notification




                $responsearray = array("status" => 2000, "success" => true, "message" => "Password changed successfully ", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function saveFeedback_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "feedback" => $post['feedback']
        );

        $key = array_keys($required, "");

        if (!$key) {



            $insert_feedback = [
                "user_id" => $post['user_id'],
                "feedback_message" => $post['feedback']
            ];

            $insert_feedback = $this->Apimodel->insert('T_Feedback', $insert_feedback);




            $responsearray = array("status" => 2000, "success" => true, "message" => "Your Feedback Added", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);

            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function saveAppShares_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "share_type" => $post['share_type']
            // "key_1"=> $post['key_1']
            // "key_2"=> $post['key_2']
        );

        $key = array_keys($required, "");

        if (!$key) {

            $insert_shares = [
                "user_id" => $post['user_id'],
                "share_type" => $post['share_type'],
                "key_1" => $post['key_1'],
                "key_2" => $post['key_2'],
                "created_date" => date('Y-m-d H:i:s'),
                "last_updated_date" => date('Y-m-d H:i:s')
            ];

            $insert_share = $this->Apimodel->insert('T_AppShare', $insert_shares);

            $responsearray = array("status" => 2000, "success" => true, "message" => "You have shared the app", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);

            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    // Notification
    function not_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';
        // $required=array(
        //     "device_token" => $post['device_token'],
        //     "title" => $post['title'],
        //     "body" => $post['body']
        // );

        $notification = $this->callNotification($post['device_token'], $post['title'], $post['body']);

        if ($notification) {
            echo "Send";
        } else {
            echo "Not Send";
        }
    }

    function callNotification($device_token, $title, $body)
    {

        //define('API_ACCESS_KEY', 'AIzaSyBzlIlf9iITdleZMn0sZbTKy0NCkFraR9Q');
        // define('API_ACCESS_KEY', 'AIzaSyAKNgIrBlhnh4TSd1dxjYHUWsscP4GrA5I');
        $registrationIds = array($device_token);

        // define('API_ACCESS_KEY', 'AAAAhd1Vx4s:APA91bGYxXYkm_jyy9r8kerYa18EFLTfvqfi0UtxkCyWnS3crXNoypUl9rJkqnF-gw_9LdBGmmMkTd-H4zcSNWpMfcWAdRDp-3j0krppdt5uKuuchGX6r2ezxBvMz2hI0cTpSu4vRjPP'); // Subodh :: added server key
        $API_ACCESS_KEY = "AAAAhd1Vx4s:APA91bGYxXYkm_jyy9r8kerYa18EFLTfvqfi0UtxkCyWnS3crXNoypUl9rJkqnF-gw_9LdBGmmMkTd-H4zcSNWpMfcWAdRDp-3j0krppdt5uKuuchGX6r2ezxBvMz2hI0cTpSu4vRjPP";

        $msg = array(
            'title' => $title,
            'body' => $body
        );

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $msg
        );

        $headers = array(
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
        // echo $result; exit;
    }

    function callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n)
    {

        define('API_ACCESS_KEY', 'AIzaSyBzlIlf9iITdleZMn0sZbTKy0NCkFraR9Q');
        // define('API_ACCESS_KEY', 'AIzaSyAKNgIrBlhnh4TSd1dxjYHUWsscP4GrA5I');
        $registrationIds = array($device_token);

        $msg = array(
            'uuid' => $uuid,
            'major' => $major,
            'minor' => $minor,
            'title' => $title,
            'body' => $body,
            'total' => $total,
            'date' => $date_n
        );

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $msg
        );

        $headers = array(
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        // echo $result;
    }

    public function send_mail($to, $subject, $body, $headers = '')
    {
        /*
        $from_email = "canopus.testing@gmail.com";
        $to_email = $to;


        // for windows or localhost server.

        $config['protocol'] = 'ftp';
        $config['smtp_host'] = 'ssl://ftp.linosys.net'; //change this
        $config['smtp_port'] = '21';
        $config['smtp_user'] = 'cashrub@linosys.in'; //change this
        $config['smtp_pass'] = 'cashrub@123'; //change this
        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
        // $config['smtp_port'] = '465';
        // $config['smtp_user'] = 'canopus.testing@gmail.com'; //change this
        // $config['smtp_pass'] = 'canopus12!'; //change this
        // for linux server user this.
        // $config['smtp_host'] = 'localhost'; //change this
        // $config['smtp_port'] = '25';
        // $config['smtp_user'] = 'canopus.testing@gmail.com'; //change this
        // $config['smtp_pass'] = 'canopus123'; //change this


        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard*/
        $config = array(

            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@cashrub.com', // change it to yours
            'smtp_pass' => 'cashrub@77', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            "newline" => "\r\n"
        );
        $this->load->library('email');

        $this->email->initialize($config);
        //Load email library 
        /*  $this->load->library('email', $config);*/

        $this->email->from('info@cashrub.com', 'CashRub');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);

        //Send mail 
        return $this->email->send();
        //   print_r($this->email->print_debugger());die;
    }

    function getBeaconDetect_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id"]';



        $required = array(
            "uuid" => $post['uuid'],
            "major" => $post['major'],
            "minor" => $post['minor'],
            "user_id" => $post['user_id']
            // "store_id"=>$post['store_id'],
            // "beacon_id" => $post['beacon_id']
        );

        $key = array_keys($required, "");

        // var_dump(date("M d, Y"));die;

        if (!$key) {

            $chk_user = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($chk_user > 0) {

                $get_beacon_id_from_uuid = $this->Apimodel->select_data('T_Beacons', array('beacon_uuid' => $post["uuid"], 'beacon_major' => $post["major"], 'beacon_minor' => $post["minor"]));

                $get_store_of_beacon = $this->Apimodel->select_data('T_Store', array('store_id' => $get_beacon_id_from_uuid[0]->store_id));


                if ($get_beacon_id_from_uuid) {

                    $beacon_database = array('uuid' => $post['uuid'], 'major' => $post['major'], 'minor' => $post['minor']);

                    $chk_alr_activity = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $get_beacon_id_from_uuid[0]->id, 'user_id' => $post['user_id']));

                    if ($chk_alr_activity) {

                        $chk_if_same_user_act = $this->Apimodel->select_data('T_BeaconActivity', array('flag_of_detection' => "detected", 'user_id' => $post['user_id'], 'active' => "1"));


                        if ($chk_if_same_user_act) {
                            $chk_if_same_user_act2 = $this->Apimodel->select_data('T_BeaconActivity', array('flag_of_inside_store' => "inside_detection", 'user_id' => $post['user_id'], 'active' => "1"));

                            if ($chk_if_same_user_act2) {

                                $to_time2 = strtotime($chk_if_same_user_act2[0]->detected_date . " " . $chk_if_same_user_act2[0]->detected_time);
                                $from_time2 = strtotime(date("Y-m-d H:i:s"));
                                $chk_beacon_detection_24_complete = round(abs($to_time2 - $from_time2) / 60, 2);

                                if ($chk_beacon_detection_24_complete > 1440) {

                                    if ($get_beacon_id_from_uuid[0]->is_entrance_beacon == 1) {

                                        // if( $chk_beacon_detection_24_complete > 1440 ){

                                        $insert_beacon_ac = [
                                            "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                            "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                            "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                            "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                            "user_id" => $post['user_id'],
                                            "detected_date" => date("Y-m-d"),
                                            "detected_time" => date("H:i:s"),
                                            "exit_date" => date("Y-m-d"),
                                            "exit_time" => date("H:i:s"),
                                            "flag_of_detection" => 'detected'
                                        ];

                                        $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac);


                                        $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                        // call Notification


                                        $device_token = $chk_user[0]->device_token;
                                        $title = "Beacon Detected";
                                        $en_message = "Beacon detected near " . $get_store_of_beacon[0]->store_first_name;
                                        $body = $en_message;
                                        $uuid = $post['uuid'];
                                        $major = $post['major'];
                                        $minor = $post['minor'];
                                        $date_n = date("M d, Y");

                                        $total = (($user_walkin_p[0]->facebook_points) + ($user_walkin_p[0]->twitter_points) + ($user_walkin_p[0]->walking_points) + ($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                                        $notification1 = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);

                                        // print_r($en_message);die;


                                        $responsearray = array("status" => 2000, "success" => true, "message" => "Entrance beacon detected", "result" => $beacon_database);
                                        $this->response($responsearray, REST_Controller::HTTP_OK);

                                        // } else {
                                        //     // var_dump("yes");die;
                                        //      $update_if_already_detected_earlier = $this->Apimodel->update('T_BeaconActivity', array(
                                        //           "beacon_id" => $get_beacon_id_from_uuid[0]->id
                                        //      ), array(
                                        //           "active" => 1
                                        //      ));
                                        //      $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id'] ));
                                        //      // call Notification
                                        //      $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
                                        //      $device_token = $get_token[0]->device_token;
                                        //      $title = "Detected Inside";
                                        //      $en_message = "Beacon detected inside ".$get_store_of_beacon[0]->store_first_name;
                                        //      $body = $en_message;
                                        //      $uuid = $post['uuid'];
                                        //      $major = $post['major'];
                                        //      $minor = $post['minor'];
                                        //      $total = (($user_walkin_p[0]->facebook_points)+($user_walkin_p[0]->twitter_points)+($user_walkin_p[0]->walking_points)+($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs) );
                                        //      $notification =  $this->callNotificationBeacon($device_token,$title,$body, $uuid, $major, $minor, $total);
                                        //      $responsearray = array("status"=>6103,"success" => true, "message" => "Beacon detected inside", "result" => new stdClass() );
                                        //      $this->response($responsearray, REST_Controller::HTTP_OK);
                                        // }
                                    } else {

                                        $get_pre_entrance_of_user2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                                        if ($get_pre_entrance_of_user2) {
                                            $to_time = strtotime($get_pre_entrance_of_user2[0]->detected_time);
                                            $from_time = strtotime(date("H:i:s"));
                                            $time_d = round(abs($to_time - $from_time) / 60, 2);
                                        }



                                        $insert_inside_ac4 = [
                                            "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                            "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                            "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                            "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                            "user_id" => $post['user_id'],
                                            "detected_date" => date("Y-m-d"),
                                            "detected_time" => date("H:i:s"),
                                            "exit_date" => date("Y-m-d"),
                                            "exit_time" => date("H:i:s"),
                                            "flag_of_inside_store" => 'inside_detection',
                                            "active" => "1",
                                            "total_spent_time" => $time_d
                                        ];

                                        $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_inside_ac4);

                                        $update_spend_time = $this->Apimodel->update('T_BeaconActivity', array(
                                            "user_id" => $post['user_id'],
                                            "flag_of_inside_store" => "inside_detection"
                                        ), array(
                                            "active" => 1,
                                            "total_spent_time" => $time_d
                                        ));

                                        // call Notification

                                        $device_token = $chk_user[0]->device_token;
                                        $title = "Detected Inside";
                                        $inside_message = "Beacon detected inside " . $get_store_of_beacon[0]->store_first_name;
                                        $body = $inside_message;
                                        $uuid = $post['uuid'];
                                        $major = $post['major'];
                                        $minor = $post['minor'];
                                        $date_n = date("M d, Y");

                                        $user_walkin_p3 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                        $total = (($user_walkin_p3[0]->facebook_points) + ($user_walkin_p3[0]->twitter_points) + ($user_walkin_p3[0]->walking_points) + ($user_walkin_p3[0]->reward_points) - ($user_walkin_p3[0]->coupon_redeem_rubs + $user_walkin_p3[0]->paytm_redeem_rubs));

                                        $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);


                                        // end
                                        // callNotification
                                        // give rubs points to user

                                        $get_pre_entrance_of_user2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                                        if ($get_pre_entrance_of_user2) {

                                            $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));
                                            $user_w_point = $user_walkin_p[0]->walking_points;
                                            $store_point = $get_store_of_beacon[0]->walking_point;
                                            $new_point = $store_point + $user_w_point;


                                            if ($user_walkin_p) {
                                                $update_user_walk_point = $this->Apimodel->update('T_UserPoint', array(
                                                    "user_id" => $post['user_id']
                                                ), array(
                                                    "walking_points" => $new_point
                                                ));
                                            }

                                            if (!$user_walkin_p) {

                                                $insert_walkin_point = [
                                                    "user_id" => $post['user_id'],
                                                    "walking_points" => $new_point
                                                ];

                                                $insert_walkin = $this->Apimodel->insert('T_UserPoint', $insert_walkin_point);
                                            }

                                            $update_spend_time2 = $this->Apimodel->update('T_BeaconActivity', array(
                                                "user_id" => $post['user_id'],
                                                "flag_of_detection" => "detected"
                                            ), array(
                                                "active" => 1
                                            ));

                                            $user_walkin_p2 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                            $device_token = $chk_user[0]->device_token;
                                            $title = "Points earned";
                                            $body = "You have earned " . $store_point . " rubs by walking to the store";
                                            $uuid = $post['uuid'];
                                            $major = $post['major'];
                                            $minor = $post['minor'];
                                            $date_n = date("M d, Y");

                                            $total2 = (($user_walkin_p2[0]->facebook_points) + ($user_walkin_p2[0]->twitter_points) + ($user_walkin_p2[0]->walking_points) + ($user_walkin_p2[0]->reward_points) - ($user_walkin_p2[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total2, $date_n);
                                        }






                                        // end
                                        // end give rubs 

                                        $responsearray = array("status" => 2000, "success" => true, "message" => "Inside beacon detected", "result" => $beacon_database);
                                        $this->response($responsearray, REST_Controller::HTTP_OK);
                                        // }
                                    }
                                } else {

                                    // calculate distance

                                    $lat1 = $post['latitude'];
                                    $lon1 = $post['longitude'];
                                    $lat2 = $get_store_of_beacon[0]->store_latitude;
                                    $lon2 = $get_store_of_beacon[0]->store_longitude;
                                    $theta = $lon1 - $lon2;
                                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                                    $dist = acos($dist);
                                    $dist = rad2deg($dist);
                                    $miles = $dist * 60 * 1.1515;
                                    $meters = $miles * 1609.34;
                                    $km = $miles * 1.60934;
                                    $unit = strtoupper($unit);

                                    // var_dump($meters);die;
                                    if ($meters > 10000000000) {
                                        $responsearray = array("status" => 6125, "success" => false, "message" => "Please wait for 24 hours", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);
                                    } else {

                                        // again send the entrance 

                                        if ($get_beacon_id_from_uuid[0]->is_entrance_beacon == 1) {

                                            $device_token = $chk_user[0]->device_token;
                                            $title = "Beacon Detected";
                                            $en_message = "Beacon detected again near " . $get_store_of_beacon[0]->store_first_name;
                                            $body1 = $en_message;
                                            $uuid = $post['uuid'];
                                            $major = $post['major'];
                                            $minor = $post['minor'];
                                            $date_n = date("M d, Y");

                                            $total = (($user_walkin_p[0]->facebook_points) + ($user_walkin_p[0]->twitter_points) + ($user_walkin_p[0]->walking_points) + ($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                                            // $notification1 =  $this->callNotificationBeacon($device_token,$title,$body1, $uuid, $major, $minor, $total, $date_n);

                                            $responsearray = array("status" => 2000, "success" => true, "message" => "Entrance beacon wapis detected", "result" => $beacon_database);
                                            $this->response($responsearray, REST_Controller::HTTP_OK);
                                        } else {

                                            $device_token = $chk_user[0]->device_token;
                                            $title = "Detected Inside";
                                            $inside_message = "Beacon detected again inside " . $get_store_of_beacon[0]->store_first_name;
                                            $body2 = $inside_message;
                                            $uuid = $post['uuid'];
                                            $major = $post['major'];
                                            $minor = $post['minor'];
                                            $date_n = date("M d, Y");
                                            $user_walkin_p3 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));
                                            $total = (($user_walkin_p3[0]->facebook_points) + ($user_walkin_p3[0]->twitter_points) + ($user_walkin_p3[0]->walking_points) + ($user_walkin_p3[0]->reward_points) - ($user_walkin_p3[0]->coupon_redeem_rubs + $user_walkin_p3[0]->paytm_redeem_rubs));

                                            // $notification =  $this->callNotificationBeacon($device_token,$title,$body2, $uuid, $major, $minor, $total, $date_n);

                                            $responsearray = array("status" => 2000, "success" => true, "message" => "Inside beacon wapis detected", "result" => $beacon_database);
                                            $this->response($responsearray, REST_Controller::HTTP_OK);
                                        }


                                        // 


                                        $responsearray = array("status" => 6126, "success" => false, "message" => "Again visit after 24 hour", "result" => new stdClass());
                                        $this->response($responsearray, REST_Controller::HTTP_OK);
                                    }

                                    // 
                                }
                            } else {

                                if ($get_beacon_id_from_uuid[0]->is_entrance_beacon == 1) {

                                    // if( $chk_beacon_detection_24_complete > 1440 ){

                                    $insert_beacon_ac = [
                                        "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                        "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                        "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                        "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                        "user_id" => $post['user_id'],
                                        "detected_date" => date("Y-m-d"),
                                        "detected_time" => date("H:i:s"),
                                        "exit_date" => date("Y-m-d"),
                                        "exit_time" => date("H:i:s"),
                                        "flag_of_detection" => 'detected'
                                    ];

                                    $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac);


                                    $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                    // call Notification


                                    $device_token = $chk_user[0]->device_token;
                                    $title = "Beacon Detected";
                                    $en_message = "Beacon detected near " . $get_store_of_beacon[0]->store_first_name;
                                    $body = $en_message;
                                    $uuid = $post['uuid'];
                                    $major = $post['major'];
                                    $minor = $minorpost['minor'];
                                    $date_n = date("M d, Y");

                                    $total = (($user_walkin_p[0]->facebook_points) + ($user_walkin_p[0]->twitter_points) + ($user_walkin_p[0]->walking_points) + ($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                                    $notification1 = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);

                                    // print_r($en_message);die;


                                    $responsearray = array("status" => 2000, "success" => true, "message" => "Entrance beacon detected", "result" => $beacon_database);
                                    $this->response($responsearray, REST_Controller::HTTP_OK);

                                    // } else {
                                    //     // var_dump("yes");die;
                                    //      $update_if_already_detected_earlier = $this->Apimodel->update('T_BeaconActivity', array(
                                    //           "beacon_id" => $get_beacon_id_from_uuid[0]->id
                                    //      ), array(
                                    //           "active" => 1
                                    //      ));
                                    //      $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id'] ));
                                    //      // call Notification
                                    //      $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
                                    //      $device_token = $get_token[0]->device_token;
                                    //      $title = "Detected Inside";
                                    //      $en_message = "Beacon detected inside ".$get_store_of_beacon[0]->store_first_name;
                                    //      $body = $en_message;
                                    //      $uuid = $post['uuid'];
                                    //      $major = $post['major'];
                                    //      $minor = $post['minor'];
                                    //      $total = (($user_walkin_p[0]->facebook_points)+($user_walkin_p[0]->twitter_points)+($user_walkin_p[0]->walking_points)+($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs) );
                                    //      $notification =  $this->callNotificationBeacon($device_token,$title,$body, $uuid, $major, $minor, $total);
                                    //      $responsearray = array("status"=>6103,"success" => true, "message" => "Beacon detected inside", "result" => new stdClass() );
                                    //      $this->response($responsearray, REST_Controller::HTTP_OK);
                                    // }
                                } else {

                                    $get_pre_entrance_of_user2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                                    if ($get_pre_entrance_of_user2) {
                                        $to_time = strtotime($get_pre_entrance_of_user2[0]->detected_time);
                                        $from_time = strtotime(date("H:i:s"));
                                        $time_d = round(abs($to_time - $from_time) / 60, 2);
                                    }



                                    $insert_inside_ac4 = [
                                        "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                        "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                        "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                        "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                        "user_id" => $post['user_id'],
                                        "detected_date" => date("Y-m-d"),
                                        "detected_time" => date("H:i:s"),
                                        "exit_date" => date("Y-m-d"),
                                        "exit_time" => date("H:i:s"),
                                        "flag_of_inside_store" => 'inside_detection',
                                        "active" => "1",
                                        "total_spent_time" => $time_d
                                    ];

                                    $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_inside_ac4);

                                    $update_spend_time = $this->Apimodel->update('T_BeaconActivity', array(
                                        "user_id" => $post['user_id'],
                                        "flag_of_inside_store" => "inside_detection"
                                    ), array(
                                        "active" => 1,
                                        "total_spent_time" => $time_d
                                    ));



                                    // call Notification

                                    $device_token = $chk_user[0]->device_token;
                                    $title = "Detected Inside";
                                    $inside_message = "Beacon detected inside " . $get_store_of_beacon[0]->store_first_name;
                                    $body = $inside_message;
                                    $uuid = $post['uuid'];
                                    $major = $post['major'];
                                    $minor = $post['minor'];
                                    $date_n = date("M d, Y");

                                    $user_walkin_p3 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                    $total = (($user_walkin_p3[0]->facebook_points) + ($user_walkin_p3[0]->twitter_points) + ($user_walkin_p3[0]->walking_points) + ($user_walkin_p3[0]->reward_points) - ($user_walkin_p3[0]->coupon_redeem_rubs + $user_walkin_p3[0]->paytm_redeem_rubs));

                                    $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);


                                    // end
                                    // callNotification
                                    // give rubs points to user

                                    $get_pre_entrance_of_user2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                                    if ($get_pre_entrance_of_user2) {

                                        $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));
                                        $user_w_point = $user_walkin_p[0]->walking_points;
                                        $store_point = $get_store_of_beacon[0]->walking_point;
                                        $new_point = $store_point + $user_w_point;


                                        if ($user_walkin_p) {
                                            $update_user_walk_point = $this->Apimodel->update('T_UserPoint', array(
                                                "user_id" => $post['user_id']
                                            ), array(
                                                "walking_points" => $new_point
                                            ));
                                        }

                                        if (!$user_walkin_p) {

                                            $insert_walkin_point = [
                                                "user_id" => $post['user_id'],
                                                "walking_points" => $new_point
                                            ];

                                            $insert_walkin = $this->Apimodel->insert('T_UserPoint', $insert_walkin_point);
                                        }

                                        $update_spend_time2 = $this->Apimodel->update('T_BeaconActivity', array(
                                            "user_id" => $post['user_id'],
                                            "flag_of_detection" => "detected"
                                        ), array(
                                            "active" => 1
                                        ));

                                        $user_walkin_p2 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                        $device_token = $chk_user[0]->device_token;
                                        $title = "Points earned";
                                        $body = "You have earned " . $store_point . " rubs by walking to the store";
                                        $uuid = $post['uuid'];
                                        $major = $post['major'];
                                        $minor = $post['minor'];
                                        $date_n = date("M d, Y");

                                        $total2 = (($user_walkin_p2[0]->facebook_points) + ($user_walkin_p2[0]->twitter_points) + ($user_walkin_p2[0]->walking_points) + ($user_walkin_p2[0]->reward_points) - ($user_walkin_p2[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                                        $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total2, $date_n);
                                    }






                                    // end
                                    // end give rubs 

                                    $responsearray = array("status" => 2000, "success" => true, "message" => "Inside beacon detected", "result" => $beacon_database);
                                    $this->response($responsearray, REST_Controller::HTTP_OK);
                                    // }
                                }
                            }
                        } else {

                            if ($get_beacon_id_from_uuid[0]->is_entrance_beacon == 1) {

                                // if( $chk_beacon_detection_24_complete > 1440 ){

                                $insert_beacon_ac = [
                                    "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                    "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                    "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                    "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                    "user_id" => $post['user_id'],
                                    "detected_date" => date("Y-m-d"),
                                    "detected_time" => date("H:i:s"),
                                    "exit_date" => date("Y-m-d"),
                                    "exit_time" => date("H:i:s"),
                                    "flag_of_detection" => 'detected'
                                ];

                                $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac);


                                $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                // call Notification


                                $device_token = $chk_user[0]->device_token;
                                $title = "Beacon Detected";
                                $en_message = "Beacon detected near " . $get_store_of_beacon[0]->store_first_name;
                                $body = $en_message;
                                $uuid = $post['uuid'];
                                $major = $post['major'];
                                $minor = $post['minor'];
                                $date_n = date("M d, Y");

                                $total = (($user_walkin_p[0]->facebook_points) + ($user_walkin_p[0]->twitter_points) + ($user_walkin_p[0]->walking_points) + ($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                                $notification1 = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);

                                // print_r($en_message);die;


                                $responsearray = array("status" => 2000, "success" => true, "message" => "Entrance beacon detected", "result" => $beacon_database);
                                $this->response($responsearray, REST_Controller::HTTP_OK);

                                // } else {
                                //     // var_dump("yes");die;
                                //      $update_if_already_detected_earlier = $this->Apimodel->update('T_BeaconActivity', array(
                                //           "beacon_id" => $get_beacon_id_from_uuid[0]->id
                                //      ), array(
                                //           "active" => 1
                                //      ));
                                //      $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id'] ));
                                //      // call Notification
                                //      $get_token = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"] ));
                                //      $device_token = $get_token[0]->device_token;
                                //      $title = "Detected Inside";
                                //      $en_message = "Beacon detected inside ".$get_store_of_beacon[0]->store_first_name;
                                //      $body = $en_message;
                                //      $uuid = $post['uuid'];
                                //      $major = $post['major'];
                                //      $minor = $post['minor'];
                                //      $total = (($user_walkin_p[0]->facebook_points)+($user_walkin_p[0]->twitter_points)+($user_walkin_p[0]->walking_points)+($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs) );
                                //      $notification =  $this->callNotificationBeacon($device_token,$title,$body, $uuid, $major, $minor, $total);
                                //      $responsearray = array("status"=>6103,"success" => true, "message" => "Beacon detected inside", "result" => new stdClass() );
                                //      $this->response($responsearray, REST_Controller::HTTP_OK);
                                // }
                            } else {

                                $get_pre_entrance_of_user2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                                if ($get_pre_entrance_of_user2) {
                                    $to_time = strtotime($get_pre_entrance_of_user2[0]->detected_time);
                                    $from_time = strtotime(date("H:i:s"));
                                    $time_d = round(abs($to_time - $from_time) / 60, 2);
                                }



                                $insert_inside_ac4 = [
                                    "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                    "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                    "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                    "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                    "user_id" => $post['user_id'],
                                    "detected_date" => date("Y-m-d"),
                                    "detected_time" => date("H:i:s"),
                                    "exit_date" => date("Y-m-d"),
                                    "exit_time" => date("H:i:s"),
                                    "flag_of_inside_store" => 'inside_detection',
                                    "active" => "1",
                                    "total_spent_time" => $time_d
                                ];

                                $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_inside_ac4);

                                $update_spend_time = $this->Apimodel->update('T_BeaconActivity', array(
                                    "user_id" => $post['user_id'],
                                    "flag_of_inside_store" => "inside_detection"
                                ), array(
                                    "active" => 1,
                                    "total_spent_time" => $time_d
                                ));




                                // give rubs points to user

                                $get_pre_entrance_of_user2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                                if ($get_pre_entrance_of_user2) {

                                    $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));
                                    $user_w_point = $user_walkin_p[0]->walking_points;
                                    $store_point = $get_store_of_beacon[0]->walking_point;
                                    $new_point = $store_point + $user_w_point;


                                    if ($user_walkin_p) {
                                        $update_user_walk_point = $this->Apimodel->update('T_UserPoint', array(
                                            "user_id" => $post['user_id']
                                        ), array(
                                            "walking_points" => $new_point
                                        ));
                                    }

                                    if (!$user_walkin_p) {

                                        $insert_walkin_point = [
                                            "user_id" => $post['user_id'],
                                            "walking_points" => $new_point
                                        ];

                                        $insert_walkin = $this->Apimodel->insert('T_UserPoint', $insert_walkin_point);
                                    }

                                    $update_spend_time2 = $this->Apimodel->update('T_BeaconActivity', array(
                                        "user_id" => $post['user_id'],
                                        "flag_of_detection" => "detected"
                                    ), array(
                                        "active" => 1
                                    ));

                                    $user_walkin_p2 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                    $device_token = $chk_user[0]->device_token;
                                    $title = "Points earned";
                                    $body = "You have earned " . $store_point . " rubs by walking to the store";
                                    $uuid = $post['uuid'];
                                    $major = $post['major'];
                                    $minor = $post['minor'];
                                    $date_n = date("M d, Y");

                                    $total2 = (($user_walkin_p2[0]->facebook_points) + ($user_walkin_p2[0]->twitter_points) + ($user_walkin_p2[0]->walking_points) + ($user_walkin_p2[0]->reward_points) - ($user_walkin_p2[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                                    $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total2, $date_n);
                                }


                                // call Notification

                                $device_token = $chk_user[0]->device_token;
                                $title = "Detected Inside";
                                $inside_message = "Beacon detected inside " . $get_store_of_beacon[0]->store_first_name;
                                $body = $inside_message;
                                $uuid = $post['uuid'];
                                $major = $post['major'];
                                $minor = $post['minor'];
                                $date_n = date("M d, Y");

                                $user_walkin_p3 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                                $total = (($user_walkin_p3[0]->facebook_points) + ($user_walkin_p3[0]->twitter_points) + ($user_walkin_p3[0]->walking_points) + ($user_walkin_p3[0]->reward_points) - ($user_walkin_p3[0]->coupon_redeem_rubs + $user_walkin_p3[0]->paytm_redeem_rubs));

                                $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);


                                // end
                                // callNotification
                                // end
                                // end give rubs 

                                $responsearray = array("status" => 2000, "success" => true, "message" => "Inside beacon detected", "result" => $beacon_database);
                                $this->response($responsearray, REST_Controller::HTTP_OK);
                                // }
                            }
                        }



                        // } 
                    } else {

                        if ($get_beacon_id_from_uuid[0]->is_entrance_beacon == 1) {

                            $insert_beacon_ac3 = [
                                "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                "user_id" => $post['user_id'],
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s"),
                                "exit_date" => date("Y-m-d"),
                                "exit_time" => date("H:i:s"),
                                "flag_of_detection" => 'detected',
                                "active" => "0"
                            ];

                            $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac3);


                            // call Notification

                            $device_token = $chk_user[0]->device_token;
                            $title = "Beacon Detected";
                            $en_message = "Beacon detected near " . $get_store_of_beacon[0]->store_first_name;
                            $body = $en_message;
                            $uuid = $post['uuid'];
                            $major = $post['major'];
                            $minor = $post['minor'];
                            $date_n = date("M d, Y");

                            $user_walkin_p = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                            $total = (($user_walkin_p[0]->facebook_points) + ($user_walkin_p[0]->twitter_points) + ($user_walkin_p[0]->walking_points) + ($user_walkin_p[0]->reward_points) - ($user_walkin_p[0]->coupon_redeem_rubs + $user_walkin_p2[0]->paytm_redeem_rubs));

                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);

                            // end


                            $responsearray = array("status" => 2000, "success" => true, "message" => "Entrance beacon detected", "result" => $beacon_database);
                            $this->response($responsearray, REST_Controller::HTTP_OK);
                        } else {


                            $get_pre_entrance_of_user_online2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                            // if($get_pre_entrance_of_user_online){
                            // var_dump("expression2");die;

                            $to_time_q = strtotime($get_pre_entrance_of_user_online2[0]->detected_time);
                            $from_time_q = strtotime(date("H:i:s"));
                            $time_d_q = round(abs($to_time_q - $from_time_q) / 60, 2);

                            // var_dump($time_d_q);die;

                            $insert_beacon_ac4 = [
                                "beacon_id" => $get_beacon_id_from_uuid[0]->id,
                                "store_id" => $get_beacon_id_from_uuid[0]->store_id,
                                "beacon_key" => $get_beacon_id_from_uuid[0]->beacon_key,
                                "beacon_place" => $get_beacon_id_from_uuid[0]->beacon_place,
                                "user_id" => $post['user_id'],
                                "detected_date" => date("Y-m-d"),
                                "detected_time" => date("H:i:s"),
                                "exit_date" => date("Y-m-d"),
                                "exit_time" => date("H:i:s"),
                                "flag_of_inside_store" => 'inside_detection',
                                "active" => "1",
                                "total_spent_time" => $time_d_q
                            ];

                            $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac4);

                            $update_spend_time = $this->Apimodel->update('T_BeaconActivity', array(
                                "user_id" => $post['user_id'],
                                "flag_of_inside_store" => "inside_detection"
                            ), array(
                                "active" => 1,
                                "total_spent_time" => $time_d_q
                            ));



                            // give rubs points to user

                            $get_pre_entrance_of_user2 = $this->Apimodel->select_data('T_BeaconActivity', array('user_id' => $post['user_id'], 'flag_of_detection' => "detected", "active" => "0"));

                            if ($get_pre_entrance_of_user2) {

                                $user_walkin_p2 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));
                                $user_w_point = $user_walkin_p2[0]->walking_points;
                                $store_point = $get_store_of_beacon[0]->walking_point;
                                $new_point = $store_point + $user_w_point;

                                if ($user_walkin_p2) {

                                    $update_user_walk_point = $this->Apimodel->update('T_UserPoint', array(
                                        "user_id" => $post['user_id']
                                    ), array(
                                        "walking_points" => $new_point
                                    ));
                                }

                                if (!$user_walkin_p2) {

                                    $insert_walkin_point = [
                                        "user_id" => $post['user_id'],
                                        "walking_points" => $new_point
                                    ];
                                    $insert_walkin = $this->Apimodel->insert('T_UserPoint', $insert_walkin_point);
                                }

                                $update_spend_time2 = $this->Apimodel->update('T_BeaconActivity', array(
                                    "user_id" => $post['user_id'],
                                    "flag_of_detection" => "detected"
                                ), array(
                                    "active" => 1
                                ));


                                $user_walkin_p3 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));


                                $device_token = $chk_user[0]->device_token;
                                $title = "Points earned";
                                $body = "You have earned " . $store_point . " rubs by walking to the store";
                                $uuid = $post['uuid'];
                                $major = $post['major'];
                                $minor = $post['minor'];

                                $date_n = date("M d, Y");

                                $total2 = (($user_walkin_p3[0]->facebook_points) + ($user_walkin_p3[0]->twitter_points) + ($user_walkin_p3[0]->walking_points) + ($user_walkin_p3[0]->reward_points) - ($user_walkin_p3[0]->coupon_redeem_rubs + $user_walkin_p3[0]->paytm_redeem_rubs));

                                $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total2, $date_n);
                            }



                            // call Notification

                            $user_walkin_p4 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post['user_id']));

                            $device_token = $chk_user[0]->device_token;
                            $title = "Detected Inside";
                            $inside_message = "Beacon detected inside " . $get_store_of_beacon[0]->store_first_name;
                            $body = $inside_message;

                            $uuid = $post['uuid'];
                            $major = $post['major'];
                            $minor = $post['minor'];
                            $date_n = date("M d, Y");

                            $total = (($user_walkin_p4[0]->facebook_points) + ($user_walkin_p4[0]->twitter_points) + ($user_walkin_p4[0]->walking_points) + ($user_walkin_p4[0]->reward_points) - ($user_walkin_p4[0]->coupon_redeem_rubs + $user_walkin_p4[0]->paytm_redeem_rubs));

                            $notification = $this->callNotificationBeacon($device_token, $title, $body, $uuid, $major, $minor, $total, $date_n);

                            // end
                            // callNotification
                            // end
                            // end give rubs 

                            $responsearray = array("status" => 2000, "success" => true, "message" => "Inside beacon detected", "result" => $beacon_database);
                            $this->response($responsearray, REST_Controller::HTTP_OK);

                            // }
                        }
                    }
                } else {
                    $responsearray = array("status" => 6113, "success" => false, "message" => "Beacon doesn't exists", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function saveBeaconActivityOffline_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "detected_date" => $post['detected_date'],
            "detected_time" => $post['detected_time'],
            "exit_date" => $post['exit_date'],
            "exit_time" => $post['exit_time']
        );

        $key = array_keys($required, "");

        if (!$key) {

            $beacon_detail = $this->Apimodel->select_data('T_Beacons', array('beacon_uuid' => $post['uuid'], 'beacon_major' => $post['major'], 'beacon_minor' => $post['minor']));

            if ($beacon_detail) {

                if ($beacon_detail[0]->is_entrance_beacon == 1) {

                    $insert_beacon_ac = [
                        "beacon_id" => $beacon_detail[0]->id,
                        "store_id" => $beacon_detail[0]->store_id,
                        "beacon_key" => $beacon_detail[0]->beacon_key,
                        "beacon_place" => $beacon_detail[0]->beacon_place,
                        "user_id" => $post['user_id'],
                        "detected_date" => $post['detected_date'],
                        "detected_time" => $post['detected_time'],
                        "exit_date" => $post['exit_date'],
                        "exit_time" => $post['exit_time'],
                        "flag_of_detection" => 'detected'
                    ];

                    $insert_b_a = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac);
                } else {

                    $insert_beacon_ac = [
                        "beacon_id" => $beacon_detail[0]->id,
                        "store_id" => $beacon_detail[0]->store_id,
                        "beacon_key" => $beacon_detail[0]->beacon_key,
                        "beacon_place" => $beacon_detail[0]->beacon_place,
                        "user_id" => $post['user_id'],
                        "detected_date" => $post['detected_date'],
                        "detected_time" => $post['detected_time'],
                        "exit_date" => $post['exit_date'],
                        "exit_time" => $post['exit_time'],
                        "flag_of_inside_store" => 'inside_detection'
                    ];

                    $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac);
                }


                $responsearray = array("status" => 2000, "success" => true, "message" => "Beacon activity saved", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }


            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function addUserWalkinPoints_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $check_user_point = $this->Apimodel->select_data_new('T_Userstorewalkinpoint', array('store_id' => $post['store_id'], 'user_id' => $post['user_id']), array('user_store_walkin_id' => "desc"));

        $get_walkin_count = $this->Apimodel->get_walkin_count('T_Userstorewalkinpoint', $post['store_id'], $post['user_id']);
        //print_r($check_user_point);die;
        /*      if ($get_walkin_count[0]->count < 10) {*/
        //echo 'yes';die;
        if (!empty($check_user_point)) {
            $date_1 = $check_user_point[0]->created_date;
        } else {
            $date_1 = "1970-01-01 00:00:00";
        }
        $date_2 = $post['created_date'];

        $diff = $this->dateDifference($date_1, $date_2);
        if ($diff > 0) {

            $check_store_point = $this->Apimodel->select_data_new('T_Store', array('store_id' => $post['store_id']));

            $storeWalkinPoints = $check_store_point[0]->walking_point;
            $storeWalkinPoints1 = $check_store_point[0]->store_point;
            //print_r($check_store_point);die;
            if ($storeWalkinPoints1 > 10) {
                $storeWalkinPoints1 = $storeWalkinPoints1 - $storeWalkinPoints;

                $update_store_walk_point = $this->Apimodel->update('T_Store', array("store_id" => $post['store_id']), array("store_point" => $storeWalkinPoints1));

                $this->saveUserWalkingP($post['user_id'], $post['store_id'], $storeWalkinPoints, $post['latitude'], $post['longitude'], $post['created_date']);
            } else {
                $responsearray = array("status" => 4000, "success" => false, "message" => "Store balance is not sufficient.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $responsearray = array("status" => 4000, "success" => false, "message" => "Already inserted data please try after 24 hours.", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
        /*    } else {
            $responsearray = array("status" => 4000, "success" => false, "message" => "Walkin point limit exceeded.", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }*/
        // else {
        //     $this->saveUserWalkingP($post['user_id'],$post['store_id'],$post['walkin_points'],$post['latitude'],$post['longitude'],$post['created_date']);
        // }
    }

    function saveUserWalkingP($user_id, $store_id, $walking_points, $latitude, $longitude, $created_date)
    {

        $insert_beacon_ac = [
            "beacon_id" => '',
            "store_id" => $store_id,
            "beacon_key" => '',
            "beacon_place" => '',
            "user_id" => $user_id,
            "detected_date" => date("Y-m-d"),
            "detected_time" => date("H:i:s"),
            "exit_date" => date("Y-m-d"),
            "exit_time" => date("H:i:s"),
            "flag_of_detection" => 'detected',
            "flag_of_inside_store" => 'inside_detection',
            "created_date" => $created_date
        ];

        $insert_b_a2 = $this->Apimodel->insert('T_BeaconActivity', $insert_beacon_ac);

        // $insert_id = $this->db->insert_id();
        if (!empty($insert_b_a2)) {
            $insert_arr = [
                "user_id" => $user_id,
                "store_id" => $store_id,
                "walkin_points" => $walking_points,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "created_date" => $created_date,
                "beacon_activity_id" => $insert_b_a2
            ];
            $insert_res = $this->Apimodel->insert('T_Userstorewalkinpoint', $insert_arr);
        } else {
            $insert_res = 0;
        }

        $activity_data = [
            "user_id" => $user_id,
            "activity_name" => "walkin points added",
            "activity_type" => "walkin points",
            "activity_date" => date("Y-m-d"),
            "activity_time" => date("H:i:s"),
            "store" => $store_id,
            "store_offer_id" => 0,
            "store_id" => $store_id
        ];

        $insert_res = $this->Apimodel->insert('T_ActivityLog', $activity_data);

        if ($insert_res > 0) {

            $check_user_point = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $user_id), array('user_point_id' => "desc"));
            if ($check_user_point) {

                $c_wp = $check_user_point[0]->walking_points;
                if ($c_wp) {
                    $wp = $check_user_point[0]->walking_points + $walking_points;
                } else {
                    $wp = $walking_points;
                }

                $update_user_walk_point = $this->Apimodel->update('T_UserPoint', array(
                    "user_id" => $user_id
                ), array(
                    "walking_points" => $wp
                ));
            } else {

                $insert_point_ac = ["user_id" => $user_id, "walking_points" => $walking_points];
                $insert_point = $this->Apimodel->insert('T_UserPoint', $insert_point_ac);
            }







            $responsearray = array("status" => 2000, "success" => true, "message" => "Walkin point has been added.", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        } else {
            $responsearray = array("status" => 4000, "success" => false, "message" => "Walkin point has not been added.", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function dateDifference($date_1, $date_2, $differenceFormat = '%a')
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);
    }

    function getBeaconsInRange_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';


        $beacons = $this->Apimodel->select_data('T_Beacons');
        //print_r($this->db->last_query());die;
        $result = [];
        foreach ($beacons as $key) {

            $store_of_beacon = $this->Apimodel->select_data('T_Store', array('store_id' => $key->store_id));

            $activity_of_beacon = $this->Apimodel->select_data('T_BeaconActivity', array('beacon_id' => $key->id, 'user_id' => $post['user_id']), array('beacon_activity_id' => "desc"));

            $last_awarded_point = $this->Apimodel->select_data('T_Userstorewalkinpoint', array('store_id' => $key->store_id, 'user_id' => $post['user_id']), array('user_store_walkin_id' => "desc"));



            $user_earn_point_from_store = $this->Apimodel->earn_points_from_store_today($post['user_id'], $key->store_id);
            //  print_r($this->db->last_query());die;
            // var_dump($key->id);die;

            $lat1 = $post['latitude'];
            $lon1 = $post['longitude'];
            $lat2 = $store_of_beacon[0]->store_latitude;
            $lon2 = $store_of_beacon[0]->store_longitude;

            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $meters = $miles * 1609.34;
            $km = $miles * 1.60934;
            //   $unit = strtoupper($unit);

            if ($km < 1) {

                if (!empty($activity_of_beacon)) {
                    $last_detect_activity = $activity_of_beacon[0]->detected_date . " " . $activity_of_beacon[0]->detected_time;
                } else {
                    $last_detect_activity = 0;
                }

                if (!empty($last_awarded_point)) {

                    $last_detect_activity_get = $last_awarded_point[0]->created_date;
                } else {
                    $last_detect_activity_get = 0;
                }
                if (!empty($user_earn_point_from_store)) {
                    ///  print_r();die;
                    $today_date = date('Y-m-d H:i:s');
                    $date2 = $user_earn_point_from_store[0]->created_date;
                    $diff = $this->dateDifference($today_date, $date2);
                    //print_r($diff);
                    if ($diff > 0) {
                        $last_detect_activity_get_id = 0;
                    } else {
                        $last_detect_activity_get_id = 1;
                    }
                } else {
                    $last_detect_activity_get_id = 0;
                }
                if ($store_of_beacon[0]->store_point > 200) {
                    $result[] = array(
                        "beacon_id" => $key->id,
                        "uuid" => $key->beacon_uuid,
                        "major" => $key->beacon_major,
                        "minor" => $key->beacon_minor,
                        "message" => $key->beacon_text ?: '',
                        "store_id" => $key->store_id,
                        "store_name" => $store_of_beacon[0]->store_first_name,
                        "distance" => round($km, 2),
                        "point" => $store_of_beacon[0]->walking_point,
                        "is_entrance_beacon" => $key->is_entrance_beacon,
                        "lat" => $store_of_beacon[0]->store_latitude,
                        "long" => $store_of_beacon[0]->store_longitude,
                        "last_detected_time" =>  $last_detect_activity,
                        "last_awarded_point" => $last_detect_activity_get,
                        "points_from_store" => $last_detect_activity_get_id
                    );
                }
            }
        }

        $responsearray = array("status" => 2000, "success" => true, "message" => "Beacons list near you", "result" => $result);
        $this->response($responsearray, REST_Controller::HTTP_OK);
    }

    function checkAccessToken_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "access_token" => $post['access_token']
        );

        $key = array_keys($required, "");

        if (!$key) {

            $user_chk = $this->Apimodel->select_data('T_User', array('user_id' => $post['user_id'], 'access_token' => $post['access_token']));

            if ($user_chk) {

                $responsearray = array("status" => 2000, "success" => true, "message" => "User token is correct", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 5000, "success" => true, "message" => "Access token is invalid", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }


            // }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getDemoLocation_get()
    {

        $lat = "22.7196";
        $long = "75.8577";

        // var_dump("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&sensor=true");


        $post = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=" . $lat . "," . $long . "&sensor=true"), true);

        // var_dump($post['results'][0]["address_components"][5]['long_name']);



        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $post);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        $result = curl_exec($ch);

        $post1 = json_decode($result);
        curl_close($ch);

        var_dump($ch);
    }

    public function test_post()
    {
        echo date_default_timezone_get();
        // echo "hello";
    }
    //Two Apis for issue 58 toggle button 
    function saveSwitchSetting_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id'],
            "reminder_switch" => $post['reminder_switch'],
            "sound_switch" => $post['sound_switch'],
            "redeem_switch" => $post['redeem_switch'],
            "walkin_switch" => $post['walkin_switch'],
            "sharing_offer_switch" => $post['sharing_offer_switch'],
            "sharing_app_switch" => $post['sharing_app_switch']
        );

        $key = array_keys($required, "");


        if (!$key) {

            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res1) {

                $update_res = $this->Apimodel->update('T_User', array('user_id' => $post['user_id']), array('reminder_switch' => $post['reminder_switch'], 'sound_switch' => $post['sound_switch'], 'redeem_switch' => $post['redeem_switch'], 'walkin_switch' => $post['walkin_switch'], 'sharing_offer_switch' => $post['sharing_offer_switch'], 'sharing_app_switch' => $post['sharing_app_switch']));

                $responsearray = array("status" => 2001, "success" => true, "message" => "Your data saved successfully.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 6001, "success" => false, "message" => "User does not exist.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    function getSwitchSetting_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        // $sample = '["store_id","access_token"]';

        $required = array(
            "user_id" => $post['user_id']
        );
        $key = array_keys($required, "");
        if (!$key) {

            // $res1 = $this->Apimodel->select_data('t_user', array('email' => $post["email"]));

            if (0) {
                $RetriveData = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
                $result = array(
                    "user_id" => $RetriveData[0]->user_id,
                    "email" => $RetriveData[0]->email,
                    "reminder_switch" => $RetriveData[0]->reminder_switch,
                    "sound_switch" => $RetriveData[0]->sound_switch,
                    "redeem_switch" => $RetriveData[0]->redeem_switch,
                    "walkin_switch" => $RetriveData[0]->walkin_switch,
                    "sharing_offer_switch" => $RetriveData[0]->sharing_offer_switch,
                    "sharing_app_switch" => $RetriveData[0]->sharing_app_switch
                );

                $responsearray = array("status" => 2001, "success" => true, "message" => "Your data retrived successfully.", "result" => $result);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 6001, "success" => false, "message" => "User does not exist.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    //Two Apis for issue 58 toggle button 

    /*
    * SUBODH :: Added function to address issues CAS-373, CAS-374 
    * Function to verify Otp
    * This function is purely for phone number verification, and no dependency on any other parameter
    * further can be extended to use with SignUp or any other module
    * This function saves temporary data into table
    */

    function otp_auth_post()
    {
        // get posted data from the form
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; // SUBODH :: For testing, remove
        // Check for the mandatory data
        $access_token = md5(time());
        $required = array(
            "phone_number" => $post['phone_number'],
            "device_token" => $post['device_token']
            //"access_token" => $access_token
        );

        $key = array_keys($required, "");

        if (!$key) {

            try {
                for ($i = 5; $i > 0; $i--) {
                    $str = rand(1000, 9999);
                }

                $str = $str;
                $match = $str;
                $otp_data['phone_number'] = $post['phone_number'];
                $otp_data['device_token'] = $post['device_token'];
                $otp_data['access_token'] = $access_token;
                $otp_data['otp'] = $match;
                $otp_data['generate_time'] = date('Y-m-d H:i:s');
                $otp_data['validate_time'] = date('Y-m-d H:i:s');
                $otp_data['status'] = 0;

                $auth_otp = $this->Apimodel->insert('t_otp_auth', $otp_data);
                //$auth_otp = TRUE; // SUBODH :: This is for testing
                if ($auth_otp) {
                    $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . trim($post['phone_number']) . "&message=%3C%23%3E+Your+OTP+is " . $match . "+" . $this->google_sms_key . "&sender=CASHRUB&route=4&country=0");

                    //$updateOtp = $this->Apimodel->update('t_otp_auth', array('user_id' => $check_email ), array('otp' => $match) );
                    $responsearray = array("status" => 2000, "success" => true, "message" => "Otp sent successfully. Please verify", "result" => $otp_data);
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {
                    $responsearray = array("status" => 6000, "success" => false, "message" => "Something went wrong, please try after some time.", "result" => array());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } catch (Exception $e) {
                $responsearray = array("status" => 6006, "success" => false, "message" => $e->getMessage(), "result" => array());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    } // End of otp_auth

    // SUBODH :: API for user login after otp verification 
    // This API, should be called in the case when user is existing but only device id is changed
    public function userLoginDeviceUpdate_post()
    {
        // get posted data from the form
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; // SUBODH :: For testing, remove
        // Check for the mandatory data
        $access_token = md5(time());
        $required = array(
            "phone_number" => $post['phone_number'],
            "device_token" => $post['device_token'],
            "device_id" => $post['device_id'],
            "is_device_verified" => $post['is_device_verified']
            //"access_token" => $access_token
        );

        $key = array_keys($required, "");

        if (!$key) {
            // SUBODH :: Added device_id while updating record 
            $is_device_verified = $post['is_device_verified'];
            if ($is_device_verified == "yes") {
                $update_device_token = $this->Apimodel->update('T_User', array('phone_number' => $post["phone_number"]), array('device_token' => $post['device_token'], 'device_id' => $post['device_id'], 'access_token' => $access_token)); // Subodh :: Uncommented so that device token should update on login as per Android dev

                $res1 = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]));
                if (!empty($res1)) {
                    $points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $res1[0]->user_id), 1);
                    if (!empty($points)) {
                        $total_points = ($points[0]->facebook_points) + ($points[0]->twitter_points) + ($points[0]->walking_points) + ($points[0]->reward_points) - ($points[0]->coupon_redeem_rubs);
                    } else {
                        $total_points = 0;
                    }

                    $result = [
                        "user_id" => $res1[0]->user_id,
                        "name" => $res1[0]->name ?: '',
                        "email" => $res1[0]->email ?: '',
                        "password" => $res1[0]->password ?: '',
                        "is_social" => $res1[0]->is_social,
                        "phone_number" => $res1[0]->phone_number ?: '',
                        "city" => $res1[0]->city ?: '',
                        "state" => $res1[0]->state ?: '',
                        "address" => $res1[0]->address ?: '',
                        "gender" => $res1[0]->gender ?: '',
                        "gender" => $res1[0]->gender ?: '',
                        "device_token" => $res1[0]->device_token ?: '',
                        "device_id" => $post['device_id'],
                        "access_token" => $access_token ?: '',
                        // "total_points"=> ($points[0]->facebook_points)+($points[0]->twitter_points)+($points[0]->walking_points),
                        "total_points" => $total_points,
                        "profile_image" => $res1[0]->profile_image ? base_url() . "uploads/" . $res1[0]->profile_image : '',
                        "is_email" => $res1[0]->email_verified,
                    ];
                } else {
                    $result = 0;
                }
                // SUBODH :: Logged in successfully
                $responsearray = array("status" => 2000, "success" => true, "message" => "You are logged in successfully.", "result" => $result);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                // SUBODH :: can no Login since device is not verified
                $responsearray = array("status" => 4000, "success" => false, "message" => "Your device is not verified, please authenticate using OTP.", "result" => $result);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    //SUBODH :: New API for mobile number and email verification
    function checkUsedEmailPhone_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; //SUBODH :: for testing, remove later
        sort($keys); //sort array to campare with sample string
        // echo md5(time()); die;
        $sample = '["email","phone_number"]';
        $required = array(
            "email" => $post['email'],
            "phone_number" => $post['phone_number']
            //"access_token" => $access_token
        );

        $key = array_keys($required, "");
        if (!$key) {
            if (!empty($post['email']) && !empty($post['phone_number'])) {
                $exist_number = $this->Apimodel->select_data('T_User', array('phone_number' => $post["phone_number"]), '1');
                if ($exist_number > 0) {
                    // SUBODH :: User exists in the system, should go to login, instead for sign up        
                    $responsearray = array("status" => 2000, "success" => true, "message" => "Phone number exists in the system. Please login instead.", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {
                    $exist_email = $this->Apimodel->select_data('T_User', array('email' => $post["email"]), '1');
                    if ($exist_email) {
                        // SUBODH :: User exists in the system, should go to login, instead for sign up        
                        $responsearray = array("status" => 2000, "success" => true, "message" => "Email Id exists in the system. Please login instead.", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    } else {
                        // SUBODH :: User doesn't exists in the system       
                        $responsearray = array("status" => 2002, "success" => false, "message" => "Email id and phone number does not exists.", "result" => new stdClass());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                }
            } else {
                // SUBODH :: User doesn't exists in the system       
                $responsearray = array("status" => 6001, "success" => false, "message" => "Email id and phone number should not be blank.", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    public function emailVerification_post()
    {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; //SUBODH :: for testing, remove later
        sort($keys); //sort array to campare with sample string
        $required = array(
            "user_id" => $post['user_id'],
        );

        $key = array_keys($required, "");
        if (!$key) {

            $id = $post['user_id'];
            $user_details = $this->Apimodel->select_data('T_User', array('user_id' => $id), '1');
            if (!empty($user_details)) {
                $phone_no = $user_details[0]->phone_number;
                $email = $user_details[0]->email;
                $name = $user_details[0]->name;
                $email_token = md5($phone_no);

                $data = ['email_token' => $email_token];

                $update = $this->db->where('user_id', $id)->update('T_User', $data);

                // print_r($user_details);
                $config = array(

                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'info@cashrub.com', // change it to yours
                    'smtp_pass' => 'cashrub@77', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE,
                    "newline" => "\r\n"
                );
                $this->load->library('email');

                $this->email->initialize($config);

                $activation_link = base_url() . "index.php/verification/email_verfication/" . $email_token;
                $this->email->set_mailtype('html');
                $this->email->from('info@cashrub.com', 'Cashrub');
                $this->email->to($email);
                $this->email->subject('Verfiy your email address');

                // echo  $this->email->print_debugger();die;


                $message = "Hello " . $name . "<br><br>Please <a href='" . $activation_link . "'>Click Here</a> to verify your email id for future concerns.<br><br>In case of any doubts do visit www.cashrub.com.";
                //   $message1 = $this->load->view('email/new_user.php', $data_m, TRUE);
                $this->email->message($message);
                $this->email->send();
                $responsearray = array("status" => 2000, "success" => true, "message" => "The email verification link send to your email addresss", "result" => new stdClass);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 4000, "success" => false, "message" => "User doesn't exist", "result" => new stdClass);
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    function forgetOtpAuth_post()
    {
        // get posted data from the form
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; // SUBODH :: For testing, remove
        // Check for the mandatory data
        $access_token = md5(time());
        $required = array(
            "phone_number" => $post['phone_number'],
            "device_id" => $post['device_id']
            //"access_token" => $access_token
        );

        $key = array_keys($required, "");

        if (!$key) {
            $user_details = $this->Apimodel->select_data('T_User', array('phone_number' => $post['phone_number'], 'device_id' => $post['device_id']), '1');
            //   print_r($user_details);die;
            if (!empty($user_details)) {
                try {
                    for ($i = 5; $i > 0; $i--) {
                        $str = rand(1000, 9999);
                    }

                    $str = $str;
                    $match = $str;
                    $otp_data['phone_number'] = $post['phone_number'];
                    $otp_data['device_token'] = $user_details[0]->device_token;
                    $otp_data['access_token'] = $access_token;
                    $otp_data['otp'] = $match;
                    $otp_data['generate_time'] = date('Y-m-d H:i:s');
                    $otp_data['validate_time'] = date('Y-m-d H:i:s');
                    $otp_data['status'] = 0;

                    $auth_otp = $this->Apimodel->insert('t_otp_auth', $otp_data);
                    //$auth_otp = TRUE; // SUBODH :: This is for testing
                    if ($auth_otp) {
                        $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . trim($post['phone_number']) . "&message=%3C%23%3E+Your+OTP+is " . $match . "+" . $this->google_sms_key . "&sender=CASHRUB&route=4&country=0");

                        //$updateOtp = $this->Apimodel->update('t_otp_auth', array('user_id' => $check_email ), array('otp' => $match) );
                        $responsearray = array("status" => 2000, "success" => true, "message" => "Otp sent successfully. Please verify", "result" => $otp_data);
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    } else {
                        $responsearray = array("status" => 6000, "success" => false, "message" => "Something went wrong, please try after some time.", "result" => array());
                        $this->response($responsearray, REST_Controller::HTTP_OK);
                    }
                } catch (Exception $e) {
                    $responsearray = array("status" => 6006, "success" => false, "message" => $e->getMessage(), "result" => array());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
            } else {
                $responsearray = array("status" => 6000, "success" => false, "message" => "User doesn't exist.", "result" => array());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    } // End of otp_auth
    public function resetPassword_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; // SUBODH :: For testing, remove
        // Check for the mandatory data

        $required = array(
            "phone_number" => $post['phone_number'],
            "new_password" => $post['new_password']
            //"access_token" => $access_token
        );

        $key = array_keys($required, "");

        if (!$key) {
            $user_details = $this->Apimodel->select_data('T_User', array('phone_number' => $post['phone_number']), '1');
            if (!empty($user_details)) {
                $password = md5($post['new_password']);
                $data = ['password' => $password];
                $update = $this->db->where('phone_number', $post['phone_number'])->update('T_User', $data);
                $responsearray = array("status" => 2000, "success" => true, "message" => "Password changed successfully", "result" => "");
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 6000, "success" => false, "message" => "User doesn't exist.", "result" => array());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    public function appReferal_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; // SUBODH :: For testing, remove
        // Check for the mandatory data
        $required = array(
            "from_id" => $post['from'],
            "to_id" => $post['to'],
            "medium" => $post['medium'],

            //"access_token" => $access_token
        );
        $key = array_keys($required, "");

        if (!$key) {
            $user_details = $this->Apimodel->select_data('T_User', array('user_id' => $post['from']), '1');
            if (!empty($user_details)) {
                $required['points'] = 10;
                $required['created_date'] = date('Y-m-d H:i:s');
                $required['last_updated_date'] = date('Y-m-d H:i:s');
                $this->db->insert('referral_app', $required);
                $last_inserted = $this->db->insert_id();
                //	print_r($required);

                $user_chk = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $required['from_id']));

                $user_get = $this->Apimodel->select_data('T_User', array('user_id' => $required['from_id']));
                if (!empty($user_chk)  && !empty($user_get)) {

                    $old_points = $user_chk[0]->reward_points;
                    $new_points = $old_points + $required['points'];

                    $from_name = $user_get[0]->name;

                    $update_if_already_detected_earlier = $this->Apimodel->update('T_UserPoint', array(
                        "user_id" => $required['from_id']
                    ), array(
                        "reward_points" => $new_points
                    ));
                } else {
                    $insert_data = [
                        'user_id' => $required['from_id'],
                        'created_date' => date('Y-m-d H:i:s'),
                        'last_updated_date' => date('Y-m-d H:i:s'),
                        "reward_points" => $required['points']
                    ];
                    $this->db->insert('T_UserPoint', $insert_data);
                }
                if (!empty($user_get)) {
                    $device_token = $user_get[0]->device_token;
                    $title = "App shared reward";
                    $body = "App shared reward";
                    $notification = $this->callNotification($device_token, $title, $body);
                }


                $user_chk1 = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $required['to_id']));
                $user_get1 = $this->Apimodel->select_data('T_User', array('user_id' => $required['to_id']));


                if (!empty($user_chk1) && !empty($user_get1)) {

                    $old_points = $user_chk1[0]->reward_points;
                    $new_points = $old_points + $required['points'];

                    $to_name = $user_get1[0]->name;

                    $update_if_already_detected_earlier = $this->Apimodel->update('T_UserPoint', array(
                        "user_id" => $required['to_id']
                    ), array(
                        "reward_points" => $new_points
                    ));
                } else {
                    $to_name = '';
                    $insert_data = [
                        'user_id' => $required['to_id'],
                        'created_date' => date('Y-m-d H:i:s'),
                        'last_updated_date' => date('Y-m-d H:i:s'),
                        "reward_points" => $required['points']
                    ];
                    $this->db->insert('T_UserPoint', $insert_data);
                }
                if (!empty($user_get1)) {
                    $device_token = $user_get1[0]->device_token;
                    $title = "App shared reward";
                    $body = "Points added through referral";
                    $notification = $this->callNotification($device_token, $title, $body);
                }

                $activity_data = [
                    "user_id" => $required['from_id'],
                    "activity_name" => "Referral added to " . $to_name,
                    "activity_type" => "referral_set",
                    "activity_date" => date("Y-m-d"),
                    "activity_time" => date("H:i:s"),
                    "store" => 0,
                    "store_id" => 0,
                    "respective_id" => $last_inserted,
                    "points" => $required['points']
                ];

                $insert_res = $this->Apimodel->insert('T_ActivityLog', $activity_data);

                $responsearray = array("status" => 6000, "success" => true, "message" => "User referral added successfully!", "result" => array());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 6000, "success" => false, "message" => "User doesn't exist.", "result" => array());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass);
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    // display all near offer change by chintan
    // api call this
    function allOfferDetails1_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string
        //  $post = $_POST;
        $sample = '["store_id","access_token"]';


        $required = array(
            "latitude" => $post['latitude'],
            "longitude" => $post['longitude'],
            "user_id" => $post['user_id'],
            'page_count' => $post['page_count'],
            'page_index' => $post['page_index'],
        );

        $key = array_keys($required, "");

        if (!$key) {
            $latitude = $post['latitude'];
            $longitude = $post['longitude'];
            // $distance = "500";
            $distance = 20;
            $start = ($post['page_index'] - 1) * $post['page_count'];
            $store_data = $this->Apimodel->getFullStoreDetail($start, $post['page_count']);
            if (count($store_data) == $post['page_count']) {
                $add_more = 1;
            } else {
                $add_more = 0;
            }
            //  print_r($this->db->last_query());die;

            if (!empty($store_data)) {

                $page_index = $post["page_index"] ?: '1';
                $page_count = $post["page_count"] ?: '100';

                $nearestStores = array();

                reset($nearestStores);


                foreach ($store_data as $key) {

                    $lat1 = $post['latitude'];
                    $lon1 = $post['longitude'];

                    $lat2 = $key->store_latitude;
                    $lon2 = $key->store_longitude;

                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $meters = $miles * 1609.34;
                    $km = $miles * 1.60934;
                    // $unit = strtoupper($unit);

                    //$nearestStores[$km] = $key; 
                    $key->km = $km;
                    array_push($nearestStores,  (array) $key);
                }
                $temp_keys = array();

                foreach ($nearestStores as $key => $row) {
                    $temp_keys[$key] = $row['km'];
                }
                // print_r($nearestStores);die;
                array_multisort($temp_keys, SORT_ASC, $nearestStores);
                // print_r($nearestStores);die;

                foreach ($nearestStores as $store) {

                    $store_id = $store['store_id'];
                    // $distance = 20;
                    $km = (int) $store['km'];
                    $total_share_points = $this->Apimodel->select_data('T_Store', array('store_id' => $store_id));


                    // $total_share_points = $this->Apimodel->getTotalPoints($key->store_offer_id);
                    if ($total_share_points[0]->store_point > 200) {
                        $offer_data = $this->Apimodel->getFullOfferDetail($store_id);
                    } else {
                        $offer_data = [];
                    }
                    //  $store['offers']=$offer_data;
                    if (!empty($offer_data)) {
                        $final_array = [];
                        /*     $offer_data['is_favorite']=$chk_if_offer_fav ? true : false;
                         $offer_data['is_shared_with_fb']=$chk_if_offer_shared_fb ? 'yes' : 'no';
                          $offer_data['is_shared_with_tw']=$chk_if_offer_shared_tw ? 'yes' : 'no';*/
                        foreach ($offer_data as $offer_data) {
                            // print_r($km);
                            // print_r();die;
                            // if ($km <= $offer_data->offer_visibility) {

                            $chk_if_offer_shared_fb = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $offer_data->store_offer_id, 'share_type ' => 'facebook_points'));

                            $chk_if_offer_shared_tw = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post['user_id'], 'store_offer_id' => $offer_data->store_offer_id, 'share_type' => 'twitter_points'));
                            $chk_if_offer_fav = $this->Apimodel->select_data('T_UserFavorites', array('user_id' => $post['user_id'], 'favorite_type' => "offer", 'type_id' => $offer_data->store_offer_id));

                            $is_already_rated_store_by_user = $this->Apimodel->select_data('T_UserReviews', array('store_id' => $store_id, 'user_id' => $post['user_id']));

                            $total_share_points = $this->Apimodel->getTotalPoints($offer_data->store_offer_id);

                            $store_balance = $this->Apimodel->select_data('T_Store', array('store_id' => $offer_data->store_id));

                            $offers = [
                                "store_offer_id" => $offer_data->store_offer_id,
                                "store_id" => $offer_data->store_id,
                                "title" => $offer_data->title,
                                "description" => $offer_data->description,
                                "category_id" => $offer_data->category_id,
                                "publish_date" => $offer_data->publish_date,
                                "publish_time" => $offer_data->publish_time,
                                "expiry_date" => $offer_data->expiry_date,
                                "expiry_time" => $offer_data->expiry_time,
                                "offer_image" => 'http://cashrub.in/cashrub/admin/uploads/' . $offer_data->offer_image,
                                "offer_term_condition_id" => $offer_data->offer_term_condition_id,
                                'terms_and_conditions' => $offer_data->text,
                                "offer_status" => $offer_data->offer_status,
                                "no_of_shares" => $offer_data->no_of_shares,
                                "created_date" => $offer_data->created_date,
                                "last_updated_date" => $offer_data->last_updated_date,
                                "remaining_credits" => $offer_data->maximum_point,
                                "offer_visibility" => $offer_data->offer_visibility,
                                "category_name" => $offer_data->name,
                                "is_favorite" => $chk_if_offer_fav ? true : false,
                                "is_shared_with_fb" => $chk_if_offer_shared_fb ? true : false,
                                "is_shared_with_tw" => $chk_if_offer_shared_tw ? true : false,
                                "facebook_points" => $offer_data->facebook_points,
                                "twitter_points" => $offer_data->twitter_points,

                            ];
                            // }
                            $final_array[] = $offers;
                        }
                        if ($km <= $distance) {
                            $final[] = [
                                'store_id' => $store['store_id'],
                                'store_first_name' => $store['store_first_name'],
                                'store_email' => $store['store_email'],
                                'area_location' => $store['area_location'],
                                'store_latitude' => $store['store_latitude'],
                                'store_longitude' => $store['store_longitude'],
                                'full_address' => $store['store_address1'],
                                'distance' => round($store['km'], 2),
                                'store_logo' => 'http://cashrub.in/cashrub/admin/uploads/' . $store['store_logo'],
                                'walking_points' => $store['walking_point'],
                                "is_store_rated" => $is_already_rated_store_by_user ? true : false,
                                'offers' => $final_array,

                            ];
                        }
                    } // print_r($store_data);die;
                    unset($offer_data);
                    # code...
                }
                //   print_r($final);die;

                $responsearray = array("status" => 2000, "success" => true, "message" => " Store Offer List Fetch successfully", "add_more" => $add_more, "result" => $final); //Subodh : changed to array
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {

                $responsearray = array("status" => 6002, "success" => false, "message" => "Offer Not Found", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }

    public function getUserSpendTime_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["store_id","access_token"]';


        $required = array(
            "exit" => $post['exit'],
            "store_id" => $post['store_id'],
            "user_id" => $post['user_id'],
            //   'beacon_id'=>$post['beacon_id'],
        );

        $key = array_keys($required, "");

        if (!$key) {

            /* $beacon_id=$post['beacon_id'];*/
            /*beacon_id =$beacon_id  AND*/
            $store_id = $post['store_id'];
            $user_id = $post['user_id'];
            $exit = $post['exit'];
            $query = $this->db->query("SELECT * FROM T_BeaconActivity WHERE store_id = $store_id AND user_id=$user_id order by T_BeaconActivity.created_date DESC");
            $row = $query->row();
            if (!empty($row)) {
                $date = date('Y-m-d', strtotime($row->created_date));
                $date1 = date('Y-m-d', time()); //date variable
                $beacon_activity_id = $row->beacon_activity_id;

                $time1 = strtotime($date);
                $time2 = strtotime($date1);

                if ($time2 == $time1 && $exit == 1) {
                    $current_time = $date = date('H:i:s', time());
                    // print_r($current_time);
                    $data = ['exit_time' => $current_time];
                    /*echo "in if";*/
                    $this->db->where('beacon_activity_id', $beacon_activity_id)->update('T_BeaconActivity', $data);
                    $responsearray = array("status" => 2000, "success" => true, "message" => " Exit time recorded successfully", "result" => []); //Subodh : changed to array
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                } else {
                    $responsearray = array("status" => 6002, "success" => false, "message" => "Waiting...", "result" => new stdClass());
                    $this->response($responsearray, REST_Controller::HTTP_OK);
                }
                // print_r($row);die;
                //print_r($this->db->last_query());
            } else {
                $responsearray = array("status" => 6002, "success" => false, "message" => "No Record For Today", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {

            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    public function offerSlider_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["store_id","access_token"]';


        $required = array(
            "user_id" => $post['user_id'],
            //   'beacon_id'=>$post['beacon_id'],
        );

        $key = array_keys($required, "");

        if (!$key) {
            $query = $this->db->where('is_active', 1)->get('app_slider');
            $result = $query->result();
            foreach ($result as $res) {

                $data = [
                    'id' => $res->id,
                    'name_of_slider' => $res->name_of_slider,
                    'slider_image' => 'http://cashrub.in/cashrub/admin/slides/' . $res->slider_image,
                    'type' => $res->type,
                    'store_id' => $res->store_id,
                    'offer_id' => $res->offer_id,
                    'is_active' => $res->is_active,
                    'created_date' => $res->created_date
                ];
                $data_final[] = $data;
            }
            $responsearray = array("status" => 2000, "success" => true, "message" => "All Offer Slider", "result" => $data_final); //Subodh : changed to array
            $this->response($responsearray, REST_Controller::HTTP_OK);
        } else {

            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    public function notificationList_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["store_id","access_token"]';


        $required = array(
            "user_id" => $post['user_id'],
            'page_count' => $post['page_count'],
            'page_index' => $post['page_index'],
            //   'beacon_id'=>$post['beacon_id'],
        );
        $key = array_keys($required, "");

        if (!$key) {
            $start    = ($post['page_index'] - 1) * $post['page_count'];
            $count = $post['page_count'];
            //$query=$this->db->where('user_id',$post['user_id'])->order_by('activity_log_id',DESC)->limit($start,$post['page_count'])->get('T_ActivityLog');
            $query = $this->db->query("SELECT * FROM `T_ActivityLog` WHERE `user_id` = " . $post['user_id'] . " ORDER BY `activity_log_id` DESC LIMIT " . $start . "," . $count);
            $result = $query->result();
            //print_r($this->db->last_query());die;
            foreach ($result as $res) {
                if ($res->activity_type == "share") {
                    $store_id = $res->store_id;
                    $store_offer_id = $res->store_offer_id;
                    $query = $this->db->where('store_offer_id', $store_offer_id)->get('T_StoreOffer');
                    $result = $query->row();



                    $description = $res->activity_name . " '" . $result->title . "' on Social Media";
                } else if ($res->activity_type == "walkin points") {
                    $store_id = $res->store_id;
                    $query = $this->db->where('store_id', $store_id)->get('T_Store');
                    $result = $query->row();
                    $description = "$result->walking_point " . $res->activity_name . ' by ' . $result->store_first_name;
                } else if ($res->activity_type == "store_send") {
                    $description = $res->activity_name;
                } else if ($res->activity_type == "favorite_offer") {
                    $store_id = $res->store_id;
                    $store_offer_id = $res->store_offer_id;
                    $query = $this->db->where('store_offer_id', $store_offer_id)->get('T_StoreOffer');
                    $result = $query->row();
                    $description = $res->activity_name . " '" . $result->title . "'";
                } else if ($res->activity_type == "favorite_store") {
                    $store_id = $res->store_id;
                    // $store_offer_id=$res->store_offer_id;
                    $query = $this->db->where('store_id', $store_id)->get('T_Store');
                    $result = $query->row();
                    $description = $res->activity_name . " '" . $result->store_first_name . "'";
                } else if ($res->activity_type == "referral_set") {
                    $description = $res->activity_name . " with 10 Rubs";
                } else {
                    $description = $res->activity_name;
                }

                if ($res->activity_type == "share") {
                    $title = "Social Share";
                } else if ($res->activity_type == "store_send") {
                    $title = "Store Notification";
                } else if ($res->activity_type == "favorite_offer") {
                    $title = "Favorite Offer";
                } else if ($res->activity_type == "favorite_store") {
                    $title = "Favorite Store";
                } else if ($res->activity_type == "referral_set") {
                    $title = "Referral Set";
                } else {
                    $title = ucwords($res->activity_type);
                }
                $data = [
                    'id' => $res->activity_log_id,
                    'title' => $title,
                    'description' => $description,
                    'created_date' => date('Y-m-d h:i A', strtotime($res->activity_date . ' ' . $res->activity_time))
                ];
                $final[] = $data;
            }

            $responsearray = array("status" => 2000, "success" => true, "message" => "All Offer Slider", "result" => $final); //Subodh : changed to array
            $this->response($responsearray, REST_Controller::HTTP_OK);
        } else {

            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
    public function updateDeviceToken_post()
    {
        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        //$post = $_POST; // SUBODH :: For testing, remove
        // Check for the mandatory data

        $required = array(
            "user_id" => $post['user_id'],
            "device_token" => $post['device_token']
            //"access_token" => $access_token
        );

        $key = array_keys($required, "");

        if (!$key) {
            $user_chk = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));
            if (!empty($user_chk)) {
                $data = ['device_token' => $post["device_token"]];
                $update = $this->db->where('user_id', $post['user_id'])->update('T_User', $data);
                $responsearray = array("status" => 2000, "success" => true, "message" => "Device token updated successfully", "result" => ''); //Subodh : changed to array
                $this->response($responsearray, REST_Controller::HTTP_OK);
            } else {
                $responsearray = array("status" => 2000, "success" => false, "message" => "Something went wrong", "result" => ''); //Subodh : changed to array
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {

            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }
} // End of class
