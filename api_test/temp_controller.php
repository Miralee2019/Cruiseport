<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/smtp/Send_Mail.php';

class Api extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Apimodel');
    }

    /* Api for ProviderSignup */

    public function ProviderSignUp_post() {

        $post = json_decode(file_get_contents("php://input"));
        $provider_password = $post->password? : '';
        $provider_fname = $post->first_name? : '';
        $provider_email = $post->email? : '';
        $provider_lname = $post->last_name? : '';
        $provider_lat = $post->latitude? : '';
        $provider_long = $post->longitude? : '';
        $provider_address_line1 = $post->address_line1? : '';
        $provider_address_line2 = $post->address_line2? : '';
        $provider_phoneno = $post->phoneno? : '';
        $service_id = $post->service_id? : '';
        $device_token = $post->device_token;
        $device_type = $post->device_type;
        $device_OS = $post->device_OS;



        //////// for validations/////////////

        if (empty($provider_password) || empty($provider_email) || empty($provider_lname) || empty($provider_fname) || empty($service_id)) {
            $error = "Required fields are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {

            //check if email already exists//

            $res = $this->Apimodel->select_data('T_Provider', array('emailid' => $provider_email));

            if ($res > 0) {

                $error = 'Emailid already exists';
                $message = [
                    'status' => 4000,
                    'message' => $error,
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            } else {

                /* extracting post data  */
                $post_arr = array('device_type' => $device_type, 'device_token' => $device_token, 'device_OS' => $device_OS, 'password' => md5($provider_password), 'f_name' => $provider_fname, 'emailid' => $provider_email, 'l_name' => $provider_lname, 'latitude' => $provider_lat, 'longitude' => $provider_long, 'home_address' => $provider_address_line1, 'office_address' => $provider_address_line2, 'phone_no' => $provider_phoneno, 'service_id' => $service_id);

                /* model for data insertion */
                $res = $this->Apimodel->insert('T_Provider', $post_arr);

                $result = ["provide_id" => $res,
                    "first_name" => $provider_fname? : '',
                    "last_name" => $provider_lname? : '',
                    "email" => $provider_email? : '',
                    "address_line1" => $provider_address_line1? : '',
                    "address_line2" => $provider_address_line2? : '',
                    "latitude" => $provider_lat? : '',
                    "longitude" => $provider_long? : '',
                    "phoneno" => $provider_phoneno? : '',
                    "service_id" => $service_id? : ''];

                $final_arr = array('status' => 2000, 'message' => "Provider registered successfully", 'result' => $result);

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            }
        }
    }

    /* function for filtering error message */

    public function array_filter_recursive($input) {
        foreach ($input as &$value) {
            if (is_array($value)) {
                $value = $this->array_filter_recursive($value);
            }
        }
        return array_filter($input);
    }

    public function array_for_error_message($input) {
        foreach ($input as $key => &$value) {
            // var_dump(count($value));die;
            if (count($value) > 1) {
                $arr[] = $value;
            }
        }
        return $arr;
    }

    /* Api for ProviderLogin */

    public function ProviderLogin_post() {


        $post = json_decode(file_get_contents("php://input"));
        $provider_email = $post->email;
        $provider_password = $post->password;
        $provider_lat = $post->latitude;
        $provider_long = $post->longitude;
        $device_token = $post->device_token;

        /*  In case of login with social sites */
        if ($post->social_id != '') {

            $social_type = $post->social_type;
            $social_id = $post->social_id;
            $social_name = $post->social_name;
            $profile_pic = $post->profile_pic;
            $service_id = $post->service_id;



            if (empty($provider_email) || empty($social_type) || empty($social_id) || empty($service_id)) {
                $error = "Required fields are missing";


                $message = [
                    'status' => 4000,
                    'message' => $error,
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            } else {
                $where_Arr = array('social_id' => $social_id);

                $res = $this->Apimodel->select_data('T_Provider', $where_Arr);
                //var_dump($res);
                //die;
                if ($res > 0) {


                    $update_Arr = ['email' => $provider_email? : '',
                        'latitude' => $provider_lat? : '',
                        'longitude' => $provider_long? : '',
                        'device_token' => $device_token? : '',
                        'social_type' => $social_type? : '',
                        'social_id' => $social_id? : '',
                        'social_name' => $social_name? : '',
                        'service_id' => $service_id? : ''
                    ];
                    $res = $this->Apimodel->update('T_Provider', $where_Arr, $update_Arr);

                    $res_to_show = $this->Apimodel->select_data('T_Provider', array('social_id' => $social_id));


                    $result = ["provide_id" => $res_to_show[0]->id,
                        "first_name" => $res_to_show[0]->f_name? : '',
                        "last_name" => $res_to_show[0]->l_name? : '',
                        "email" => $res_to_show[0]->emailid? : '',
                        "address_line1" => $res_to_show[0]->home_address? : '',
                        "address_line2" => $res_to_show[0]->office_address? : '',
                        "latitude" => $res_to_show[0]->latitude? : '',
                        "longitude" => $res_to_show[0]->longitude? : '',
                        "phoneno" => $res_to_show[0]->phone_no? : '',
                        "social_type" => $res_to_show[0]->social_type? : '',
                        "social_id" => $res_to_show[0]->social_id? : '',
                        "social_name" => $res_to_show[0]->social_name? : '',
                        "service_id" => $res_to_show[0]->service_id? : ''
                    ];
                    $final_arr = array('status' => 2000, 'message' => "Provider successfully logged in", 'result' => $result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                } else {

                    $insert_Arr = [
                        'emailid' => $provider_email? : '',
                        'latitude' => $provider_lat? : '',
                        'longitude' => $provider_long? : '',
                        'device_token' => $device_token? : '',
                        'social_type' => $social_type? : '',
                        'social_id' => $social_id? : '',
                        'social_name' => $social_name? : '',
                        'service_id' => $service_id? : ''
                    ];

                    /* model for data insertion */
                    $res = $this->Apimodel->insert('T_Provider', $insert_Arr);

                    if ($res > 0) {
                        $res_to_show = $this->Apimodel->select_data('T_Provider', array('social_id' => $social_id));


                        $result = ["provide_id" => $res_to_show[0]->id,
                            "first_name" => $res_to_show[0]->f_name? : '',
                            "last_name" => $res_to_show[0]->l_name? : '',
                            "email" => $res_to_show[0]->emailid? : '',
                            "address_line1" => $res_to_show[0]->home_address? : '',
                            "address_line2" => $res_to_show[0]->office_address? : '',
                            "latitude" => $res_to_show[0]->latitude? : '',
                            "longitude" => $res_to_show[0]->longitude? : '',
                            "phoneno" => $res_to_show[0]->phone_no? : '',
                            "social_type" => $res_to_show[0]->social_type? : '',
                            "social_id" => $res_to_show[0]->social_id? : '',
                            "social_name" => $res_to_show[0]->social_name? : '',
                            "service_id" => $res_to_show[0]->service_id? : ''
                        ];
                    }


                    $final_arr = array('status' => 2000, 'message' => "Provider successfully logged in", 'result' => $result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                }
            }
        } else {

            //////// for validations/////////////
            if (empty($provider_email) || empty($provider_password)) {
                $error = "Required fields are missing";


                $message = [
                    'status' => 4000,
                    'message' => $error,
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            } else {

                //check for email and password //

                $res = $this->Apimodel->select_data('T_Provider', array('emailid' => $provider_email, 'password' => md5($provider_password)));
                if ($res > 0) {


                    /* extracting user data  */


                    $result = ["provide_id" => $res[0]->id,
                        "first_name" => $res[0]->f_name? : '',
                        "last_name" => $res[0]->l_name? : '',
                        "email" => $res[0]->emailid? : '',
                        "address_line1" => $res[0]->home_address? : '',
                        "address_line2" => $res[0]->office_address? : '',
                        "latitude" => $res[0]->latitude? : '',
                        "longitude" => $res[0]->longitude? : '',
                        "phoneno" => $res[0]->phone_no? : '',
                        "social_type" => $res[0]->social_type? : '',
                        "social_id" => $res[0]->social_id? : '',
                        "social_name" => $res[0]->social_name? : '',
                        "service_id" => $res[0]->service_id? : ''
                    ];


                    $update_Arr = [
                        'device_token' => $device_token? : '',
                    ];
                    $res = $this->Apimodel->update('T_Provider', array('emailid' => $provider_email), $update_Arr);

                    $final_arr = array('status' => 2000, 'message' => "Provider successfully logged in", 'result' => $result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                } else {
                    $error = 'Invalid emailid or password';
                    $message = [
                        'status' => 4000,
                        'message' => $error,
                        'result' => ''
                    ];
                    $this->set_response($message, REST_Controller::HTTP_CREATED);
                }
            }
        }
    }

    /* Api for UserSignup */

    public function USerSignUp_post() {

        $post = json_decode(file_get_contents("php://input"));
        $password = $post->password;
        $first_name = $post->first_name;
        $last_name = $post->last_name;
        $email = $post->email;
        $date_of_birth = $post->date_of_birth;
        $phone_no = $post->phone_no;
        $address_line1 = $post->address_line1;
        $address_line2 = $post->address_line2;
        $city = $post->city;
        $state = $post->state;
        $zip = $post->zip;
        $latitude = $post->latitude;
        $longitude = $post->longitude;
        $device_token = $post->device_token;
        $device_type = $post->device_type;
        $device_OS = $post->device_os;



        //////// for validations/////////////
        if (empty($email) || empty($password) || empty($first_name) || empty($last_name)) {
            $error = "Required fields are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {

            //check if email already exists//

            $res = $this->Apimodel->select_data('T_User', array('emailid' => $email));
            if ($res > 0) {

                $result = ["user_id" => $res[0]->id,
                    "first_name" => $res[0]->f_name? : '',
                    "last_name" => $res[0]->l_name? : '',
                    "email" => $res[0]->emailid? : '',
                    "phone_no" => $res[0]->phone_no? : '',
                    "address_line1" => $res[0]->address_line1? : '',
                    "address_line2" => $res[0]->address_line2? : '',
                    "city" => $res[0]->city? : '',
                    "state" => $res[0]->state? : '',
                    "zip" => $res[0]->zip? : '',
                    "date_of_birth" => $res[0]->dob? : ''];

                $error = 'Emailid already exists';
                $message = [
                    'status' => 5000,
                    'message' => $error,
                    'result' => $result
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            } else {

                /* extracting post data  */
                $post_arr = array('dob' => $date_of_birth, 'password' => md5($password), 'f_name' => $first_name, 'emailid' => $email, 'l_name' => $last_name, 'latitude' => $latitude, 'longitude' => $longitude, 'address_line1' => $address_line1, 'address_line2' => $address_line2, 'phone_no' => $phone_no, 'city' => $city, 'state' => $state, 'zip' => $zip, 'device_type' => $device_type, 'device_token' => $device_token, 'device_OS' => $device_OS, 'device_token' => $device_token);

                /* model for data insertion */
                $res = $this->Apimodel->insert('T_User', $post_arr);

                $result = ["user_id" => $res,
                    "first_name" => $first_name? : '',
                    "last_name" => $last_name? : '',
                    "email" => $email? : '',
                    "phone_no" => $phone_no? : '',
                    "address_line1" => $address_line1? : '',
                    "address_line2" => $address_line2? : '',
                    "city" => $city? : '',
                    "state" => $state? : '',
                    "zip" => $zip? : '',
                    "date_of_birth" => $date_of_birth? : ''];

                $final_arr = array('status' => 2000, 'message' => "User registered successfully", 'result' => $result);

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            }
        }
    }

    /* Api for userLogin */

    public function UserLogin_post() {

        $post = json_decode(file_get_contents("php://input"));
        $email = $post->email;
        $password = $post->password;
        $first_name = $post->first_name;
        $last_name = $post->last_name;
        $latitude = $post->latitude;
        $longitude = $post->longitude;
        $device_token = $post->device_token;
        $date_of_birth = $post->date_of_birth;
        $phone_no = $post->phone_no;



        /*  In case of login with social sites */
        if ($post->social_id != '') {

            $social_type = $post->social_type;
            $social_id = $post->social_id;
            $social_name = $post->social_name;

            //  var_dump($post->image);die;
            if (!empty($post->image)) {
                $filename = $this->uploadimage_post($post->image);
                if ($filename != 'error') {

                    $finalpath = base_url("uploads/") . '/' . $filename;
                } else {

                    $finalpath = '';
                }
            } else {
                $finalpath = '';
            }


            //////// for validations/////////////

            if (empty($social_type) || empty($social_id)) {
                $error = "Required fields are missing";


                $message = [
                    'status' => 4000,
                    'message' => $error,
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            } else {

                $where_Arr = array('social_id' => $social_id);

                $res = $this->Apimodel->select_data('T_User', $where_Arr);
                // var_dump($res);
                //  die;
                if ($res > 0) {
                    $res_id = $res[0]->id;


                    $update_Arr = [
                        'emailid' => $email? : '',
                        'f_name' => $first_name? : '',
                        'l_name' => $last_name? : '',
                        'latitude' => $latitude? : '',
                        'longitude' => $longitude? : '',
                        'device_token' => $device_token? : '',
                        'social_type' => $social_type? : '',
                        'social_id' => $social_id? : '',
                        'social_name' => $social_name? : '',
                        'dob' => $date_of_birth? : '',
                        'phone_no' => $phone_no? : '',
                    ];


                    //  var_dump($update_Arr);die;
                    $res = $this->Apimodel->update('T_User', $where_Arr, $update_Arr);

                    if ($res) {
                        $operation_perform = "Update";
                        // var_dump($operation_perform);die;
                        $post_arr = array('user_id' => $res_id,
                            'operation_perform' => $operation_perform);
                        //  var_dump($post_arr);die;
                        $history = $this->Apimodel->insert('T_UserHistory', $post_arr);

                        $res_to_show = $this->Apimodel->select_data('T_User', array('social_id' => $social_id));
//var_dump($res_to_show[0]->id);die;

                        $result = ["user_id" => $res_to_show[0]->id,
                            "first_name" => $res_to_show[0]->f_name? : '',
                            "last_name" => $res_to_show[0]->l_name? : '',
                            "email" => $res_to_show[0]->emailid? : '',
                            "address_line1" =>
                            $res_to_show[0]->address_line1? : '',
                            "address_line2" =>
                            $res_to_show[0]->address_line2? : '',
                            "latitude" => $res_to_show[0]->latitude? : '',
                            "longitude" => $res_to_show[0]->longitude? : '',
                            "phone_no" => strval($res_to_show[0]->phone_no)? : '',
                            "social_type" => $res_to_show[0]->social_type? : '',
                            "social_id" => $res_to_show[0]->social_id? : '',
                            "device_token" => $res_to_show[0]->device_token? : '',
                            "city" => $res_to_show[0]->city? : '',
                            "state" => $res_to_show[0]->state? : '',
                            "zip" => $res_to_show[0]->zip? : '',
                            "device_type" => $res_to_show[0]->device_type? : '',
                            "device_os" => $res_to_show[0]->device_OS? : '',
                            "date_of_birth" => $res_to_show[0]->dob? : '',
                            "social_name" => $res_to_show[0]->social_name? : '',
                            "already_registered" => 'Yes'
                        ];

                        $final_arr = array('status' => 2000, 'message' =>
                            "User successfully logged in", 'result' => $result);

                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                    } else {
                        $error = 'Upadate Error';
                        $message = [
                            'status' => 4000,
                            'message' => $error,
                            'result' => ''
                        ];
                        $this->set_response($message, REST_Controller::HTTP_CREATED);
                    }
                } else {

                    $insert_Arr = [
                        'emailid' => $email? : '',
                        'f_name' => $first_name? : '',
                        'l_name' => $last_name? : '',
                        'latitude' => $latitude? : '',
                        'longitude' => $longitude? : '',
                        'device_token' => $device_token? : '',
                        'social_type' => $social_type? : '',
                        'social_id' => $social_id? : '',
                        'social_name' => $social_name? : '',
                        'dob' => $date_of_birth? : '',
                        'phone_no' => $phone_no? : '',
                    ];

                    /* model for data insertion */
                    $res = $this->Apimodel->insert('T_User', $insert_Arr);
                    //var_dump($res);die;
                    if ($res) {
                        $operation_perform = "Insert";
                        // var_dump($operation_perform);die;
                        $post_arr = array('user_id' => $res,
                            'operation_perform' => $operation_perform);
                        $history = $this->Apimodel->insert('T_UserHistory', $post_arr);
                        $res_to_show = $this->Apimodel->select_data('T_User', array('social_id' => $social_id));


                        $result = ["user_id" => $res_to_show[0]->id,
                            "first_name" => $res_to_show[0]->f_name? : '',
                            "last_name" => $res_to_show[0]->l_name? : '',
                            "email" => $res_to_show[0]->emailid? : '',
                            "address_line1" =>
                            $res_to_show[0]->address_line1? : '',
                            "address_line2" =>
                            $res_to_show[0]->address_line2? : '',
                            "latitude" => $res_to_show[0]->latitude? : '',
                            "longitude" => $res_to_show[0]->longitude? : '',
                            "phone_no" => strval($res_to_show[0]->phone_no)? : '',
                            "social_type" => $res_to_show[0]->social_type? : '',
                            "social_id" => $res_to_show[0]->social_id? : '',
                            "device_token" => $res_to_show[0]->device_token? : '',
                            "city" => $res_to_show[0]->city? : '',
                            "state" => $res_to_show[0]->state? : '',
                            "zip" => $res_to_show[0]->zip? : '',
                            "device_type" => $res_to_show[0]->device_type? : '',
                            "device_os" => $res_to_show[0]->device_OS? : '',
                            "date_of_birth" => $res_to_show[0]->dob? : '',
                            "social_name" => $res_to_show[0]->social_name? : '',
                            "already_registered" => 'No',
                        ];


                        $final_arr = array('status' => 2000, 'message' =>
                            "User successfully logged in", 'result' => $result);

                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                    } else {

                        $error = 'Register Error';
                        $message = [
                            'status' => 4000,
                            'message' => $error,
                            'result' => ''
                        ];
                        $this->set_response($message, REST_Controller::HTTP_CREATED);
                    }
                }
            }
        } else {

            //////// for validations/////////////
            if (empty($email) || empty($password)) {
                $error = "Required fields are missing";


                $message = [
                    'status' => 4000,
                    'message' => $error,
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            } else {

                //check for email and password //

                $res = $this->Apimodel->select_data('T_User', array('emailid' => $email, 'password' => md5($password)));

                if ($res > 0) {

                    $result = ["user_id" => $res[0]->id,
                        "first_name" => $res[0]->f_name? : '',
                        "last_name" => $res[0]->l_name? : '',
                        "email" => $res[0]->emailid? : '',
                        "address_line1" => $res[0]->address_line1? : '',
                        "address_line2" => $res[0]->address_line2? : '',
                        "latitude" => $res[0]->latitude? : '',
                        "longitude" => $res[0]->longitude? : '',
                        "phone_no" => $res[0]->phone_no? : '',
                        "social_type" => $res[0]->social_type? : '',
                        "social_id" => $res[0]->social_id? : '',
                        "device_token" => $res[0]->device_token? : '',
                        "city" => $res[0]->city? : '',
                        "state" => $res[0]->state? : '',
                        "zip" => $res[0]->zip? : '',
                        "device_type" => $res[0]->device_type? : '',
                        "device_os" => $res[0]->device_OS? : '',
                        "date_of_birth" => $res[0]->dob? : '',
                        "social_name" => $res[0]->social_name? : '',
                        "already_registered" => 'Yes',
                    ];

                    if ($res[0]->email_activation != 1 &&
                            $res[0]->phone_activation != 1) {

                        $error = 'Please verify your email before login';
                        $message = [
                            'status' => 6000,
                            'message' => $error,
                            'result' => $result
                        ];
                        $this->set_response($message, REST_Controller::HTTP_CREATED);
                    } else {

                        /* extracting user data  */


                        $result = ["user_id" => $res[0]->id,
                            "first_name" => $res[0]->f_name? : '',
                            "last_name" => $res[0]->l_name? : '',
                            "email" => $res[0]->emailid? : '',
                            "address_line1" => $res[0]->address_line1? : '',
                            "address_line2" => $res[0]->address_line2? : '',
                            "latitude" => $res[0]->latitude? : '',
                            "longitude" => $res[0]->longitude? : '',
                            "phone_no" => strval($res[0]->phone_no)? : '',
                            "social_type" => $res[0]->social_type? : '',
                            "social_id" => $res[0]->social_id? : '',
                            "device_token" => $res[0]->device_token? : '',
                            "city" => $res[0]->city? : '',
                            "state" => $res[0]->state? : '',
                            "zip" => $res[0]->zip? : '',
                            "device_type" => $res[0]->device_type? : '',
                            "device_os" => $res[0]->device_OS? : '',
                            "date_of_birth" => $res[0]->dob? : '',
                            "social_name" => $res[0]->social_name? : '',
                            "already_registered" => 'Yes',
                        ];

                        $final_arr = array('status' => 2000,
                            'message' => "User successfully logged in", 'result' => $result);

                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP  response code
                    }
                } else {
                    $error = 'Invalid emailid or password';
                    $message = [
                        'status' => 4000,
                        'message' => $error
                    ];
                    $this->set_response($message, REST_Controller::HTTP_CREATED);
                }
            }
        }
    }

    /* Api for Forgot Password */

    public function ForgotPassword_post() {

        $post = json_decode(file_get_contents("php://input"));
        $email = $post->email;
        $type = $post->type;


        if (empty($email) || empty($type)) {
            $error = "Required fields are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {

            //check if email  exists//

            if ($type == 'provider') {
                $res = $this->Apimodel->select_data('T_Provider', array('emailid' => $email));
            } else {
                $res = $this->Apimodel->select_data('T_User', array('emailid' => $email));
            }

            if ($res > 0) {

                $url = str_replace(' ', '', base_url('Welcome/changepassword'));
                $body = "HI " . ucfirst($res[0]->f_name) . ' ' . ucfirst($res[0]->l_name);
                $body.="<a href='http://" . $url . "/" . $res[0]->id . "/" . $res[0]->password . '/' . $type . "'>Click</a> here to change your password";
                $subject = 'Recover password';
                $sts = $this->send_mail($email, $subject, $body);

                if ($sts) {
                    $message = [
                        'status' => 2000,
                        'message' => 'Reset password link has been sent to your email',
                        'result' => ''
                    ];
                    $this->set_response($message, REST_Controller::HTTP_CREATED);
                } else {
                    // echo "There is error in sending mail!";
                    $error = 'Mail sending failed';
                    $message = [
                        'status' => 4000,
                        'message' => $error,
                        'result' => ''
                    ];
                    $this->set_response($message, REST_Controller::HTTP_CREATED);
                }
            } else {

                $error = 'Email-id Does Not Exist';
                $message = [
                    'status' => 4000,
                    'message' => $error,
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            }
        }
    }

    public function UserDashboard_post() {

        $post = json_decode(file_get_contents("php://input"));
        $user_id = $post->user_id;

        //////// for validations/////////////
        if (empty($user_id)) {
            $error = "Required fields are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {



            /* where array  */
            $whereArr = array('user_id' => $user_id);

            /* model for data insertion */
            $res = $this->Apimodel->select_data('T_Service');

            foreach ($res as $key => $value) {
                $arr[] = array('id' => $value->id? : '', 'service_name' => ucfirst($value->service_name)? : '', 'service_type' => $value->service_type? : '', 'service_charge' => $value->service_charge? : '', 'service_mode' => $value->service_mode? : '', 'indoor_outdoor' => $value->indoor_outdoor? : '', 'service_description' => $value->service_description? : '', 'service_image_url' => $value->service_image_url? : '');
            }

            $result = array('services' => $arr);

            $final_arr = array('status' => 2000, 'message' => "services get successfully", 'result' => $result);

            $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
    }

//SignupVerification

    public function SignupVerificationEmail_post() {
        $post = json_decode(file_get_contents("php://input"));
        $user_id = $post->user_id? : '';
        $emailid = $post->email? : '';

        if (empty($user_id) || empty($emailid)) {
            $error = "Required fields are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {

            $body = '<a href =
"http://findgood.canopussystems.com/application/views/verifyemail.php?userid=' . $user_id . '">Please
click on the link for email confirmation</a>';
            //$this->email->attach('/path/to/file1.png'); // attach file
            //$this->email->attach('/path/to/file2.pdf');
            $sts = $this->send_mail($emailid, 'Email Verification Process', $body);

            if ($sts) {
                $message = [
                    'status' => 2000,
                    'message' => 'Mail Sent Successfully',
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            } else {
                $message = [
                    'status' => 4000,
                    'message' => 'Mail Sending Failed',
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            }
        }
    }

    // end EmailVerification
// for sending mail//////
    public function send_mail($to, $subject, $body) {
        $from_email = "canopus.testing@gmail.com";
        $to_email = $to;

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'canopus.testing@gmail.com'; //change this
        $config['smtp_pass'] = 'canopus123'; //change this
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
        //Load email library 
        $this->load->library('email', $config);

        $this->email->from($from_email, 'Findgood solution');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($body);

        //Send mail 
        return $this->email->send();
    }

    /* UpdateCustomerPaymentMethod */

    public function UpdateUserProfile_post() {
        error_reporting(E_ALL);
        $post = json_decode(file_get_contents("php://input"));

        //$provider_password = $post->provider_password? : '';
        $user_id = $post->user_id? : '';
        $name = $post->name? : '';
        $date_of_birth = $post->date_of_birth? : '';
        $city = $post->city? : '';
        $blood_group = $post->blood_group? : '';
        $blood_sugar = $post->blood_sugar? : '';
        $allergies = $post->allergies? : '';

        if (!empty($post->image)) {
            $filename = $this->uploadimage_post($post->image);
            if ($filename != 'error') {

                $finalpath = str_replace(' ', '', base_url("uploads/").'/'.$filename);
            } else {
                $finalpath = '';
            }
        }
//        //////// for validations/////////////

        if (empty($user_id)) {
            $error = "Required fields are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $names = explode(' ', $name);

            if (count($names) > 1) {
                $names1 = $names[1];
            } else {
                $names1 = '';
            }
            $post_arr = array('f_name' => $names[0],
                'l_name' => $names1,
                'dob' => $date_of_birth,
                'city' => $city,
                'blood_Group' => $blood_group,
                'blood_Sugar' => $blood_sugar,
                'allergies' => $allergies,
                'profile_pic' => $finalpath
            );

            /* model for data insertion */
            $res = $this->Apimodel->update_profile('T_User', $user_id, $post_arr);

            $final_arr = array('status' => 2000, 'message' => "Profile updated successfully", 'result' => "");

            $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP             response code
        }
    }

    //// function for uploading image///////////
    public function uploadimage_post($img) {

        $imgdata = explode('base64,', $img);
       if(empty($imgdata[1]))
        {
            $img_new='base64,'.$img;
            $imgdata = explode('base64,', $img_new);
            $data = base64_decode($imgdata[1]);
        }
        else
        {
            $data = base64_decode($imgdata[1]);
        }
        $filename = uniqid() . '.png';
        //$file = '/opt/lampp/htdocs/uber/codeignitor/uploads' . '/' . $filename;
        $file = "D:/INETPUB/VHOSTS/canopussystems.com/findgood.canopussystems.com/uploads/$filename";
        $success = file_put_contents($file, $data);
        if ($success) {
            return $filename;
        } else {
            return 'error';
        }
    }

    // UserChangePassword
    public function UserChangePassword_post() {

        $post = json_decode(file_get_contents("php://input"));
        $user_id = $post->user_id;
        //   $user_id = $this->post('user_id');
        $old_password = $post->old_password;
        $new_password = $post->new_password;
        //  var_dump($new_password);die;
        if (empty($user_id) || empty($old_password) || empty($new_password)) {
            $error = "Required fields are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $data = $this->Apimodel->select_data('T_User', array('id' =>
                $user_id));

            // var_dump($data[0]->id);die;
            $data_id = $data[0]->id;
            $data_password = $data[0]->password;
            if ($data_password == md5($old_password)) {
                // var_dump('password matched');die;
                $update_password = array('password' => md5($new_password));
                $sts = $this->Apimodel->update('T_User', array('id' =>
                    $user_id), $update_password);
                if ($sts) {
                    // var_dump('updated successfully');die;
                    $final_arr = array('status' => 2000, 'message' =>
                        'Password changed successfully', 'result' => '');
                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                }
            } else {
                // var_dump('password not matched');die;
                $final_arr = array('status' => 7000, 'message' =>
                    'Old password is incorrect', 'result' => '');
                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        }
    }

    // end UserChangePassword

    /*  send message through phonenumberverification sms */

    public function PhoneNumberVerification_post() {
        $post = json_decode(file_get_contents("php://input"));

        /// request parameters
        $user_id = $post->user_id;
        $otp_type = $post->otp_type;
        $verification_number = $post->verification_number;

        /// generate random numbers
        $digits = 6;
        $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        // var_dump($otp_type);die;

        if (empty($user_id) || empty($otp_type)) {
            $error = "Required fields are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $where_Arr = array('id' => $user_id);
            $res = $this->Apimodel->select_data('T_User', $where_Arr);
            $number = $res[0]->phone_no;
            $phone_activation = 0;
            if ($res > 0) {
                if ($otp_type == "sms") {
                    //    echo "sms";die;
                    if ($verification_number == "") {
                        $testurl = "http://111.118.246.34/twillo/sendmessage.php?number=$number&code=$code";
                        //  var_dump($testurl);die;
                        //http://111.118.246.34/twillo/sendmessage.php?number=918817493061&code=1234
                        $open = file_get_contents($testurl);
                        $post_arr = array('otp' => $code, 'otp_type' =>
                            $otp_type, 'phone_activation' =>
                            $phone_activation);

                        /* model for data insertion */
                        $res = $this->Apimodel->update_profile('T_User', $user_id, $post_arr);
                        $final_arr = array('status' => 2000, 'message'
                            => "OTP send successfully", 'result' => '');

                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                        // CREATED (201) being the HTTP response code
                    } else {
                        $testurl = "http://111.118.246.34/twillo/sendmessage.php?number=$verification_number&code=$code";
                        //var_dump($testurl);die;
                        //http://111.118.246.34/twillo/sendmessage.php?number=918817493061&code=1234
                        $open = file_get_contents($testurl);

                        $post_arr = array('otp' => $code, 'otp_type' =>
                            $otp_type, 'phone_activation' => $phone_activation);

                        /* model for data insertion */
                        $res = $this->Apimodel->update_profile('T_User', $user_id, $post_arr);
                        $final_arr = array('status' => 2000, 'message'
                            => "Successfully Send OTP", 'result' => '');

                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                        // CREATED (201) being the HTTP response code
                    }
                } elseif ($otp_type == "call") {
                    //  echo "call";die;
                    if ($verification_number == "") {
                        $testurl = "http://111.118.246.34/twillo/twilo/call-request.php?code=$code&number=$number";
                        //http://111.118.246.34/twillo/twilo/call-request.php?code=9098&number=918817493061
                        //  var_dump($testurl);die;
                        //http://111.118.246.34/twillo/sendmessage.php?number=918817493061&code=1234
                        $open = file_get_contents($testurl);

                        $post_arr = array('otp' => $code, 'otp_type' =>
                            $otp_type, 'phone_activation' => $phone_activation);

                        /* model for data insertion */
                        $res = $this->Apimodel->update_profile('T_User', $user_id, $post_arr);
                        $final_arr = array('status' => 2000, 'message'
                            => "Successfully Send OTP", 'result' => '');

                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                        // CREATED (201) being the HTTP response code
                    } else {

                        $testurl = "http://111.118.246.34/twillo/twilo/call-request.php?code=$code&number=$verification_number";
                        //var_dump($testurl);die;
                        //http://111.118.246.34/twillo/sendmessage.php?number=918817493061&code=1234
                        $open = file_get_contents($testurl);

                        $post_arr = array('otp' => $code, 'otp_type' =>
                            $otp_type, 'phone_activation' => $phone_activation);

                        /* model for data insertion */
                        $res = $this->Apimodel->update_profile('T_User', $user_id, $post_arr);
                        $final_arr = array('status' => 2000, 'message'
                            => "Successfully Send OTP", 'result' => '');

                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                        // CREATED (201) being the HTTP response code
                    }
                }
            } else {

                $final_arr = array('status' => 8000, 'message' => "Invalid user_id", 'result' => '');

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                // CREATED (201) being the HTTP response code
            }
        }
    }

    /* Api for checkuserotpverification */

    public function VerificationCode_post() {
        $post = json_decode(file_get_contents("php://input"));

        // request param
        $user_id = $post->user_id;
        $verification_type = $post->verification_type;
        $verification_code = $post->verification_code;


// var_dump($otp_type);die;

        if (empty($user_id) || empty($verification_type) || empty($verification_code)) {
            $error = "Required fields are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $where_Arr = array('id' => $user_id);
            $res1 = $this->Apimodel->select_data('T_User', array('id' => $user_id, 'otp' => $verification_code, 'otp_type' => $verification_type));
            //  var_dump($res);die;
            if ($res1) {
                $phone_activation = 1;
                $post_arr = array('phone_activation' => $phone_activation);
                // var_dump($post_arr);die;
                $res = $this->Apimodel->update('T_User', $where_Arr, $post_arr);



                $final_arr = array('status' => 2000, 'message' => "Verification Process Completed  Successfully ", 'result' => '');

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            } else {
                $final_arr = array('status' => 4000, 'message' => "Please enter a valid code ", 'result' => '');

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        }
    }

    /*  send link through PhoneNumber  sms */

    public function ForgetpasswordPhoneNumber_post() {

        $post = json_decode(file_get_contents("php://input"));
        $type = $post->type;
        $number = $post->phone_no;
        if (empty($number) || empty($type)) {

            $error = "Required fields are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $mob = substr($number, 2);


            if ($type == 'provider') {
                $res = $this->Apimodel->select_data('T_Provider', array('phone_no' => $mob));
            } else {
                $res = $this->Apimodel->select_data('T_User', array('phone_no' => $mob));
            }

            if ($res > 0) {

                $url = str_replace(' ', '', base_url('Welcome/changepassword'));
                $body = "HI " . ucfirst($res[0]->f_name) . ' ' . ucfirst($res[0]->l_name);
                //$body.="<a href='" . $url . "/" . $res[0]->id . "/" . $res[0]->password . '/' . $type . "'>Click</a> here to change your password";
                $url = "<br>http://findgood.canopussystems.com/Welcome/changepassword/" . $res[0]->id . "/" . $res[0]->password . '/' . $type;
                $subject = 'Recover password';
                $testurl = "http://111.118.246.34/twillo/forgotpassword.php?number=$number&code=$url";
                //var_dump($testurl);die;
                //http://111.118.246.34/twillo/sendmessage.php?number=918817493061&code=1234
                $open = file_get_contents($testurl);

                $post_arr = array('otp_type' =>
                    'sms', 'phone_activation' => 1);

                /* model for data insertion */
                $res = $this->Apimodel->update('T_User', array('phone_no' => $number), $post_arr);
                $final_arr = array('status' => 2000, 'message'
                    => "Reset password link send to mobile successfully", 'result' => '');

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                // CREATED (201) being the HTTP response code
            } else {
                $error = 'Mobile number does not exist';
                $message = [
                    'status' => 4000,
                    'message' => $error,
                    'result' => ''
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            }
        }
    }

    /* Api for AskQuestions */

    public function AskQuestions_post() {

        $post = json_decode(file_get_contents("php://input"));
        $user_id = $post->user_id;
        $question = $post->question;
        $question_details = $post->question_details;
        $location = $post->location;
        $status = 1;
        if (!empty($post->image)) {
            $filename = $this->uploadimage_post($post->image);
            if ($filename != 'error') {
                //$finalpath = "$filename";
                $finalpath = base_url("uploads/") . '/' . $filename;
            } else {
                $finalpath = '';
            }
        }
         else {
                $finalpath = '';
            }

        //////// for validations/////////////
        if (empty($user_id) || empty($question) || empty($question_details) || empty($location)) {
            $error = "Required fileds are missing";


            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {

            /* extracting post data  */
            $post_arr = array('user_id' => $user_id, 'question' => $question, 'question_details' => $question_details, 'image' => $finalpath, 'location' => $location, 'status' => $status);

            /* model for data insertion */
            $res = $this->Apimodel->insert('T_AskQuestions', $post_arr);

            $result = ["user_id" => $user_id,
                "question" => $question? : '',
                "question_details" => $question_details? : '',
                "location" => $location? : '',
                "status" => $status? : ''];

            $final_arr = array('status' => 2000, 'message' => "Question Ask successfully", 'result' => $result);

            $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
    }

// GetProviderByServiceid
    public function GetProviderBySubServiceid_post() {
        $post = json_decode(file_get_contents("php://input"));
        $sub_service_id = $post->sub_service_id? : '';
        $user_id = $post->user_id? : '';
        if (empty($sub_service_id)) {
            $error = "Required fileds are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $data = $this->Apimodel->getprovider($sub_service_id, array('T_Provider.sub_service_id' => $sub_service_id));

            if ($data) {
                foreach ($data as $key) {
                    $image_url = '';
                    $provider_id = $key->p_id;
                    // var_dump($provider_id);
                    $rate = $this->Apimodel->avarage("T_ProviderFeedbacks", $provider_id);
                    $favorite = $this->Apimodel->select_data("T_FavoriteProviders", array('provider_id' => $provider_id, 'customer_id' =>
                        $user_id));
                    // var_dump($favorite);
                    // $status = $favorite[0]->status;
                    // $pid = $favorite[0]->provider_id;
                    if ($favorite) {
                        if ($favorite[0]->status) {
                            // var_dump('hello');
                            $fav = 1;
                        } else {
                            // var_dump("elsestatus");
                            $fav = 0;
                        }
                        # code...
                    } else {
                        $fav = 1;
                    }
                    $image = $this->Apimodel->select_data("T_Provider_Clinic_Images", array('provider_id' => $provider_id));
                    $review = $this->Apimodel->count($provider_id);

                    if ($key->p_id) {
                        if ($image > 0) {
                            foreach ($image as $val) {
                                $image_url[] = [
                                    "images" => $val->image_url
                                ];
                            }
                        } else {
                            $image_url[] = [
                                "images" => 'No image found'
                            ];
                        }
                    } else {
                        $image_url[] = [
                            "images" => 'No image found'
                        ];
                    }
                    $availablity = $key->availablity;
                    if ($availablity == 1) {
                        $result[] = [
                            "provider_id" => $key->p_id ? : '',
                            "first_name" => ucfirst($key->f_name) ? : '',
                            "last_name" => ucfirst($key->l_name) ? : '',
                            "is_favorite" => $fav,
                            "profile_pic" => $key->profile_pic ? : '',
                            "rate" => $rate[0]->rating ? : '',
                            "availablity" => 'Available today' ? : '',
                            "service_name" => $key->service_name ? : '',
                            "sub_service_name" =>
                            ucfirst($key->sub_service_name) ? : '',
                            "office_address" => $key->office_address ? : '',
                            "experience" => ($key->experience_year ? :
                                    '0') . ' year ' . ($key->experience_month ? :
                                    '0') . ' month' ? : '',
                            "consultation_fees" =>
                            $key->face_to_face_charge ? : '',
                            "review" => $review[0]->counting ? : '',
                            "latitude" => $key->latitude ? : '',
                            "longitude" => $key->longitude ? : '',
                            "clinic_images" => $image_url ? : '',
                        ];
                    } else {
                        $result[] = [
                            "provider_id" => $key->p_id ? : '',
                            "first_name" => ucfirst($key->f_name) ? : '',
                            "last_name" => ucfirst($key->l_name) ? : '',
                            "profile_pic" => $key->profile_pic ? : '',
                            "is_favorite" => $fav,
                            "rate" => $rate[0]->rating ? : '',
                            "availablity" => 'Not available' ? : '',
                            "service_name" => $key->service_name ? : '',
                            "sub_service_name" =>
                            ucfirst($key->sub_service_name) ? : '',
                            "office_address" => $key->office_address ? : '',
                            "experience" => ($key->experience_year ? :
                                    '0') . ' year ' . ($key->experience_month ? :
                                    '0') . ' month' ? : '',
                            "consultation_fees" => $key->home_charge ? : '',
                            "review" => $review[0]->counting ? : '',
                            "latitude" => $key->latitude ? : '',
                            "longitude" => $key->longitude ? : '',
                            "clinic_images" => $image_url ? : ''
                        ];
                    }

                    $final_result = array('providers' => $result);
                    $final_arr = array('status' => 2000, 'message' =>
                        'Provider got successfully', 'result' =>
                        $final_result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                }
            } else {
                $final_arr = array('status' => 9000, 'message' => 'No result found', 'result' => '');
                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        }
    }

    // end GetProviderByServiceid
    // end GetProviderByServiceid
    // GetServiceDetailsById_post
    public function GetSubServiceDetailsById_post() {
        $post = json_decode(file_get_contents("php://input"));
        $service_id = $post->service_id? : '';
        if (empty($service_id)) {
            $error = "Required fileds are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $get_service = array('service_id' => $service_id);
            $get_details = $this->Apimodel->select_data('T_SubService', $get_service);
            if ($get_details) {
                foreach ($get_details as $key) {
                    $result[] = [
                        "sub_service_id" => $key->id ? : '',
                        "sub_service_name" => ucfirst($key->sub_service_name) ? : '',
                        "service_id" => $key->service_id ? : '',
                        "image" => $key->image ? : '',
                        "list_view_image" => $key->list_view_image ? : ''
                    ];

                    $final_result = array('Services' => $result);
                    $final_arr = array('status' => 2000, 'message' => 'Services got successfully', 'result' => $final_result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                }
            } else {
                $final_arr = array('status' => 4000, 'message' => 'no result found id not exist', 'result' => '');
                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        }
    }

    // RecentUpdates_post
    public function RecentUpdates_post() {
        $post = json_decode(file_get_contents("php://input"));
        $user_id = $post->user_id? : '';
        $page_index = $post->page_index? : '0';
        $page_count = $post->page_count? : '15';
        if (empty($user_id)) {
            $error = "Required fileds are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $res = $this->Apimodel->appointments('T_ProvideRequests', 'T_Provider', 'T_User', 'T_SubService', array('user_id' => $user_id), $page_index, $page_count);
            if ($res) {
                # code...
                foreach ($res as $key) {
                    $service_type = $key->service_type;
                    $datetime = $key->service_time;
                    $date = strtotime($datetime);
                    $service_time = date("Y-m-d", $date);
                    $date = date("Y-m-d");
                    // var_dump($service_time);die;
                    if ($date <= $service_time) {
                        # code...
                        if ($service_type == 1) {
                            $result[] = [
                                "provider_name" => ucfirst($key->f_name) . ' ' . ucfirst($key->l_name)? : '',
                                "consultation_type" => 'Home consultation',
                                "service_name" => ucfirst($key->sub_service_name)? : '',
                                "service_date" => $service_time? : ''
                            ];
                            // var_dump($result1);
                        } elseif ($service_type == 2) {
                            $result[] = [
                                "provider_name" => ucfirst($key->f_name) . ' ' . ucfirst($key->l_name)? : '',
                                "consultation_type" => 'Video consultation',
                                "service_name" => ucfirst($key->sub_service_name)? : '',
                                "service_date" => $service_time? : ''
                            ];
                            // var_dump($result2);
                        } elseif ($service_type == 3) {
                            $result[] = [
                                "provider_name" => ucfirst($key->f_name) . ' ' . ucfirst($key->l_name)? : '',
                                "consultation_type" => 'Face to Face consultation',
                                "service_name" => ucfirst($key->sub_service_name)? : '',
                                "service_date" => $service_time? : ''
                            ];
                            // var_dump($result3);
                        } else {
                            $result[] = [
                                "provider_name" => ucfirst($key->f_name) . ' ' . ucfirst($key->l_name)? : '',
                                "consultation_type" => 'Chat consultation',
                                "service_name" => ucfirst($key->sub_service_name)? : '',
                                "service_date" => $service_time? : ''
                            ];
                            // var_dump($result4);
                        }
                    }
                }
                $not = $this->Apimodel->get_notification('T_CustomerNotifications', 'T_Provider', 'T_User', array('customer_id' => $user_id), $page_index, $page_count);
                if ($not) {
                    foreach ($not as $key) {
                        $notification[] = [
                            "provider_name" => ucfirst($key->f_name) . ' ' . ucfirst($key->l_name)? : '',
                            "notification_message" => $key->notification_text
                        ];
                    }
                } else {
                    $notification = '';
                    $final_arr = array('status' => 9000, 'message' => "No result found", 'result' => '');
                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                }
                // var_dump($notification);die;
                if (!isset($result)) {
                    $result = '';
                }

                $final_result = array('appointments' => $result, 'notifications' => $notification);
                $final_arr = array('status' => 2000, 'message' => "Details got successfully", 'result' => $final_result);
                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            } else {
                $final_arr = array('status' => 9000, 'message' => "No result found", 'result' => '');
                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        }
    }

    // end RecentUpdates_post
    // ProviderDetails
    public function ProviderDetails_post() {
        error_reporting(E_ALL);
        $post = json_decode(file_get_contents("php://input"));
        $provider_id = $post->provider_id? : '';
        if (empty($provider_id)) {
            $error = "Required fileds are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $res = $this->Apimodel->provider_details('T_ProviderConsultation', 'T_Provider', 'T_SubService', 'T_Service', 'T_Experience', array('T_ProviderConsultation.provider_id' => $provider_id));
            // var_dump($res);die;
            if ($res) {

                foreach ($res as $key) {
                    $provider_id = $key->provider_id;
                    $rate = $this->Apimodel->avarage("T_ProviderFeedbacks", $provider_id);
                    $provider[] = [
                        "profile_pic" => $key->profile_pic ? : '',
                        "provider_name" => ucfirst($key->f_name) . ' ' . ucfirst($key->l_name) ? : '',
                        "service_name" => ucfirst($key->service_name) ? : '',
                        "sub_service_name" => ucfirst($key->sub_service_name) ? : '',
                        "address" => $key->office_address ? : '',
                        "rating" => $rate[0]->rating ? : '',
                        "experience" => $key->experience_year . ' yrs' ? : '',
                        "latitude" => $key->latitude ? : '',
                        "longitude" => $key->longitude ? : ''
                    ];

                    $consultation = [
                        "home_consultation" => $key->home_charge ? : '',
                        "video_consultation" => $key->video_charge ? : '',
                        "face_to_face consultation" => $key->face_to_face_charge ? : '',
                        "chat_consultation" => $key->chat_charge ? : ''
                    ];

                    $open_time = [
                        "home_consultation" => $key->home_available_from . "-" . $key->home_available_to ? : '',
                        "video_consultation" => $key->video_available_from . "-" . $key->video_available_to ? : '',
                        "face_to_face consultation" => $key->face_available_from . "-" . $key->face_available_to ? : '',
                        "chat_consultation" => $key->chat_available_from . "-" . $key->chat_available_to ? : ''
                    ];

                    // var_dump($open_time);die;
                    $result = array('provider' => $provider, 'consultation_fees' => $consultation, 'open_time' => $open_time);
                    $final_result = array('Provider_details' => $result);
                    $final_arr = array('status' => 2000, 'message' => "Provider details got successfully", 'result' => $final_result);
                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                }
            } else {
                $final_arr = array('status' => 9000, 'message' => "No result found", 'result' => '');
                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        }
    }

    // end ProviderDetails

    /* SearchProviderByName */


    public function SearchProvider_post() {

        $post = json_decode(file_get_contents("php://input"));
        $search = $post->search;
        $user_id = $post->user_id;



        $res = $this->Apimodel->searchbyservice1($search);

        // var_dump($res);die;
        if ($res) {
            foreach ($res as $key) {
                $image_url = '';
                $provider_id = $key->id;
                // var_dump($provider_id);
                $rate = $this->Apimodel->avarage("T_ProviderFeedbacks", $provider_id);
                $favorite = $this->Apimodel->select_data("T_FavoriteProviders", array('provider_id' => $provider_id, 'customer_id' =>
                    $user_id));
                if ($favorite) {
                    if ($favorite[0]->status) {
                        $fav = 1;
                    } else {
                        $fav = 0;
                    }
                } else {
                    $fav = 0;
                }
                $image = $this->Apimodel->select_data("T_Provider_Clinic_Images", array('provider_id' => $provider_id));
                $review = $this->Apimodel->count($provider_id);

                if ($key->id) {
                    if ($image > 0) {
                        foreach ($image as $val) {
                            $image_url[] = [
                                "images" => $val->image_url
                            ];
                        }
                    } else {
                        $image_url[] = [
                            "images" => 'No image found'
                        ];
                    }
                } else {
                    $image_url[] = [
                        "images" => 'No image found'
                    ];
                }
                $availablity = $key->availablity;
                if ($availablity == 1) {
                    $result[] = [
                        "provider_id" => $key->id ? : '',
                        "first_name" => ucfirst($key->first_name) ? : '',
                        "last_name" => ucfirst($key->last_name) ? : '',
                        "profile_pic" => $key->profile_pic ? : '',
                        "is_favorite" => $fav ,
                        "rate" => $rate[0]->rating ? : '',
                        "availablity" => 'Available today' ? : '',
                        "sub_service_name" =>
                        ucfirst($key->sub_service_name) ? : '',
                        "office_address" => $key->office_address ? : '',
                        "experience" => ($key->experience_year ? :
                                '0') . ' year ' . ($key->experience_month ? :
                                '0') . ' month' ? : '',
                        "consultation_fees" => $key->consultation ? : '',
                        "review" => $review[0]->counting ? : '',
                        "latitude" => $key->latitude ? : '',
                        "longitude" => $key->longitude ? : '',
                        "clinic_images" => $image_url ? : '',
                    ];
                } else {
                    $result[] = [
                        "provider_id" => $key->id ? : '',
                        "first_name" => ucfirst($key->first_name) ? : '',
                        "last_name" => ucfirst($key->last_name) ? : '',
                        "profile_pic" => $key->profile_pic ? : '',
                        "is_favorite" => $fav ,
                        "rate" => $rate[0]->rating ? : '',
                        "availablity" => 'Not available' ? : '',
                        "sub_service_name" =>
                        ucfirst($key->sub_service_name) ? : '',
                        "office_address" => $key->office_address ? : '',
                        "experience" => ($key->experience_year ? :
                                '0') . ' year ' . ($key->experience_month ? :
                                '0') . ' month' ? : '',
                        "consultation_fees" => $key->consultation ? : '',
                        "review" => $review[0]->counting ? : '',
                        "latitude" => $key->latitude ? : '',
                        "longitude" => $key->longitude ? : '',
                        "clinic_images" => $image_url ? : ''
                    ];
                }

                $final_result = array('Providers' => $result);
                $final_arr = array('status' => 2000, 'message' =>
                    'Provider got successfully', 'result' =>
                    $final_result);

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        } else {

            $final_arr = array('status' => 9000, 'message' =>
                        "No result found", 'result' => '');

         $this->set_response($final_arr, REST_Controller::HTTP_CREATED); 
      // CREATED (201) being the HTTP  response code
        }
    }

    /* GetNearByProviders API */

    public function GetProvidersPath_post() {
        $post = json_decode(file_get_contents("php://input"));
        $user_id = $post->user_id;
        $provider_id = $post->provider_id;
        $latitude = $post->latitude;
        $longitude = $post->longitude;

        //////// for validations/////////////
        if
        (empty($user_id) || empty($provider_id)) {
            $error = "Required fileds are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {
            $where_Arr = array('id' => $provider_id);
            $mydata = $this->Apimodel->select_data('T_Provider', $where_Arr);

            if ($mydata) {

                foreach ($mydata as $key) {
                    //  $where_Arr1 = array('provider_id' => $key->id);
                    $provider_id = $key->id;
                    $rate = $this->Apimodel->avarage("T_ProviderFeedbacks", $provider_id);
                    //var_dump($rate);die;
                    $sub_service_id = $key->sub_service_id;
                    $where_Arr = array('id' => $sub_service_id);
                    // var_dump($where_Arr);die;
                    $data = $this->Apimodel->select_data('T_SubService', $where_Arr);
                    if ($data) {
                        $result[] = [
                            "id" => $key->id? : '',
                            "service_name" => $data[0]->sub_service_name? : '',
                            "image" => $data[0]->image? : '',
                            "rate" => $rate[0]->rating ? : '',
                            "Provider" => $key->f_name . " " . $key->l_name? : '',
                            "provider_latitude" => $key->latitude? : '',
                            "provider_longitude" => $key->longitude? : '',
                            "user_latitude" => $latitude? : '',
                            "user_longitude" => $longitude? : '',
                        ];
                        $final_result = array('Direction' => $result);

                        $final_arr = array('status' => 2000, 'message' => 'Direction got successfully', 'result' => $final_result);
                        $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                    } else {
                        $error = [
                            ['error_code' => '2000', 'error_message' => 'No data found'],
                        ];
                        $message = [
                            'status' => 'failed',
                            'message' => $error
                        ];
                        $this->set_response($message, REST_Controller::HTTP_CREATED);
                    }
                }
            } else {

                $error = [
                    ['error_code' => '2000', 'error_message' => 'No data found'],
                ];
                $message = [
                    'status' => 'failed',
                    'message' => $error
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            }
        }
    }

    /* Api for FavoriteProviders */

    public function FavoriteProviders_post() {

        $post = json_decode(file_get_contents("php://input"));
        $customer_id = $post->customer_id? : '';
        $provider_id = $post->provider_id? : '';
        $status = $post->status? : '';

        //////// for validations/////////////

        if (empty($customer_id) || empty($provider_id)) {
            $error = "Required fields are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else {

            $where_Arr = array('customer_id' =>
                $customer_id, 'provider_id' =>
                $provider_id);

            $data = $this->Apimodel->select_data('T_FavoriteProviders', $where_Arr);
            if ($data) {

                $where_Arr = array('customer_id' => $customer_id, 'provider_id' =>
                    $provider_id);
                $post_arr = array('provider_id' => $provider_id,
                    'customer_id' =>
                    $customer_id,
                    'status' => $status);
                /* model for data insertion */
                // $res =  
                $this->Apimodel->update_profile('T_FavoriteProviders', $provider_id, $post_arr);
                $res = $this->Apimodel->update('T_FavoriteProviders', $where_Arr, $post_arr);


                if ($res) {
                    if ($status == 1) {
                        $str = 1;
                    } else {
                        $str = 0;
                    }
                    $result = ["provide_id" => $data[0]->id,
                        "Favorite_Providers" => $str? : '',
                    ];

                    $final_arr = array('status' => 2000, 'message' =>
                        "Status updated successfully", 'result' => $result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP   response code
                } else {

                    $result = ["provide_id" => $data[0]->id,
                        "Favorite_Providers" => '',
                    ];

                    $final_arr = array('status' => 4000, 'message' =>
                        "Error occurred", 'result' => '');

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP  response code
                }
            } else {
                /* extracting post data  */
                $post_arr = array('customer_id' => $customer_id,
                    'provider_id' => $provider_id, 'status' => $status);

                /* model for data insertion */
                $res = $this->Apimodel->insert('T_FavoriteProviders', $post_arr);
                $where_Arr = array('id' => $res);

                $data = $this->Apimodel->select_data('T_FavoriteProviders', $where_Arr);
                $sts = $data[0]->status;

                if ($sts) {
                    $str = 1;

                    $result = ["provide_id" => $res,
                        "Favorite_Providers" => $str? : '',
                    ];

                    $final_arr = array('status' => 2000, 'message' =>
                        "Status registered successfully", 'result' => $result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP  response code
                } else {
                    $str = 0;

                    $result = ["provide_id" => $res,
                        "Favorite_Providers" => $str? : '',
                    ];

                    $final_arr = array('status' => 2000, 'message' =>
                        "Status registered successfully", 'result' => $result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP  response code
                }
            }
        }
    }

     /* api for  GetMyQuestions */

     public function GetMyQuestions_post() {
        $post = json_decode(file_get_contents("php://input"));
        $user_id = $post->user_id;
        $page_index = $post->page_index? : '0';
        $page_count = $post->page_count? : '15';
        if (empty($user_id)) {
            $error = "Required fields are missing";
            $message = [
                'status' => 4000,
                'message' => $error,
                'result' => ''
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        } else{
            $res = $this->Apimodel->select_data('T_AskQuestions',array('user_id' => $user_id),array('id'=>'desc'),$page_index,$page_count);
            if ($res) {
                foreach ($res as $key) {
                    $answers = '';
                    $question_id = $key->id;
                    $q_ago=$this->time_elapsed_string(strtotime($key->datetime));
                    $q_date=explode(' ', $key->datetime);

                    $answer = $this->Apimodel->select_data("T_Answers", array('question_id' => $question_id));
                    // var_dump($answer);
                    if ($answer) {
                        if ($answer > 0) {
                            foreach ($answer as $val) {
                                $provider_id = $val->provider_id;
                                $provider = $this->Apimodel->select_data("T_Provider", array('id' => $provider_id));
                                $ago=$this->time_elapsed_string(strtotime($val->datetime));
                                $date=explode(' ', $val->datetime);
                                $answers[] = [
                                    "provider_id" => $provider[0]->id,
                                    "provider_name" => ucfirst($provider[0]->f_name).' '.ucfirst($provider[0]->l_name),
                                    "answer" => $val->answer_details,
                                    "time" => $ago,
                                    "date" => $date[0]
                                ];
                            }
                        } else {
                            $answers =array();
                        }
                    } else {
                        $answers =array();
                    }
                    // var_dump($answers);die;
                    $result[] = [
                            "question_id" => $key->id ? : '',
                            "question" => $key->question ? : '',
                            "question_details" => $key->question_details ? : '',
                            "location" => $key->location ? : '',
                            "time" => $q_ago,
                            "date" => $q_date[0],
                            "answers" => $answers
                        ];
                    
                    $final_result = array('questions' => $result);
                    $final_arr = array('status' => 2000, 'message' => 'Answer got successfully', 'result' => $final_result);

                    $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
                }
            } else {
                $final_arr = array('status' => 9000, 'message' => 'No result found', 'result' => '');
                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        }
    }

    function time_elapsed_string($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

// ProviderFilter_post
    public function ProviderFilter_post(){
        $post = json_decode(file_get_contents("php://input"));
        $search = $post->search? : '';
        $specialization = $post->specialization? : '';
        $location = $post->location? : '';
        $time = $post->time? : '';
        $user_id = $post->user_id? : '';
        $res = $this->Apimodel->filter($search, $specialization,
$location, $time);
                // var_dump($res);die;
        if ($res) {
            foreach ($res as $key) {
                $image_url = '';
                $provider_id = $key->p_id;
                $rate = $this->Apimodel->avarage("T_ProviderFeedbacks",
$provider_id);
                $favorite =
$this->Apimodel->select_data("T_FavoriteProviders",
array('provider_id' => $provider_id, 'customer_id' =>
$user_id));
                if ($favorite) {
                    if ($favorite[0]->status) {
                        $fav = 1;
                    } else {
                        $fav = 0;
                    }
                } else {
                        $fav = 0;
                }
                $image =
$this->Apimodel->select_data("T_Provider_Clinic_Images",
array('provider_id' => $provider_id));
                $review = $this->Apimodel->count($provider_id);

                if ($key->p_id) {
                    if ($image > 0) {
                        foreach ($image as $val) {
                            $image_url[] = [
                                "images" => $val->image_url
                            ];
                        }
                    } else {
                        $image_url[] = [
                            "images" => 'No image found'
                        ];
                    }
                } else {
                    $image_url[] = [
                        "images" => 'No image found'
                    ];
                }
                $availablity = $key->availablity;
                if ($availablity == 1) {
                    $result[] = [
                        "provider_id" => $key->p_id ? : '',
                        "first_name" => ucfirst($key->f_name) ? : '',
                        "last_name" => ucfirst($key->l_name) ? : '',
                        "profile_pic" => $key->profile_pic ? : '',
                        "is_favorite" => $fav ? : '',
                        "rate" => $rate[0]->rating ? : '',
                        "availablity" => 'Available today' ? : '',
                        "service_name" => $key->service_name ? : '',
                        "sub_service_name" =>
ucfirst($key->sub_service_name) ? : '',
                        "office_address" => $key->office_address ? : '',
                        "experience" => ($key->experience_year ? : '0') .
' year ' . ($key->experience_month ? : '0') . '
month' ? : '',
                        "consultation_fees" => $key->face_to_face_charge ?
: '',
                        "review" => $review[0]->counting ? : '',
                        "latitude" => $key->latitude ? : '',
                        "longitude" => $key->longitude ? : '',
                        "clinic_images" => $image_url ? : '',
                    ];
                } else {
                    $result[] = [
                        "provider_id" => $key->p_id ? : '',
                        "first_name" => ucfirst($key->f_name) ? : '',
                        "last_name" => ucfirst($key->l_name) ? : '',
                        "profile_pic" => $key->profile_pic ? : '',
                        "is_favorite" => $fav ? : '',
                        "rate" => $rate[0]->rating ? : '',
                        "availablity" => 'Not available' ? : '',
                        "service_name" => $key->service_name ? : '',
                        "sub_service_name" =>
ucfirst($key->sub_service_name) ? : '',
                        "office_address" => $key->office_address ? : '',
                        "experience" => ($key->experience_year ? : '0') .
' year ' . ($key->experience_month ? : '0') . '
month' ? : '',
                        "consultation_fees" => $key->home_charge ? : '',
                        "review" => $review[0]->counting ? : '',
                        "latitude" => $key->latitude ? : '',
                        "longitude" => $key->longitude ? : '',
                        "clinic_images" => $image_url ? : ''
                    ];
                }

                $final_result = array('Providers' => $result);
                $final_arr = array('status' => 2000, 'message' =>
'Provider Got Successfully', 'result' => $final_result);

                $this->set_response($final_arr,
REST_Controller::HTTP_CREATED);
            }
        } else {
            $final_arr = array('status' => 9000, 'message' => 'No result
found', 'result' => '');
            $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
        }
    }
    // end ProviderFilter_post
    

/* api for  GetAllOpenQuestions */

    public function GetAllOpenQuestions_post() {
    $post = json_decode(file_get_contents("php://input"));
        $page_index = $post->page_index? : '0';
        $page_count = $post->page_count? : '15';
        $res = $this->Apimodel->select_data('T_AskQuestions',array('is_public' => 1),array('id'=>'desc'),$page_index,$page_count);
        if ($res) {
            foreach ($res as $key) {
                $answers = '';
                $question_id = $key->id;
                $q_ago=$this->time_elapsed_string(strtotime($key->datetime));
                $q_date=explode(' ', $key->datetime);

                $answer = $this->Apimodel->select_data("T_Answers", array('question_id' => $question_id));
                // var_dump($answer);
                if ($answer) {
                    if ($answer > 0) {
                        foreach ($answer as $val) {
                            $provider_id = $val->provider_id;
                            $provider = $this->Apimodel->select_data("T_Provider", array('id' => $provider_id));
                            $ago=$this->time_elapsed_string(strtotime($val->datetime));
                            $date=explode(' ', $val->datetime);
                            $answers[] = [
                                "provider_id" => $provider[0]->id,
                                "provider_name" => ucfirst($provider[0]->f_name).' '.ucfirst($provider[0]->l_name),
                                "answer" => $val->answer_details,
                                "time" => $ago,
                                "date" => $date[0]
                            ];
                        }
                    } else {
                       $answers =array();
                    }
                } else {
                    $answers =array();
                }
                // var_dump($answers);die;
                $result[] = [
                        "question_id" => $key->id ? : '',
                        "question" => $key->question ? : '',
                        "question_details" => $key->question_details ? : '',
                        "location" => $key->location ? : '',
                        "time" => $q_ago,
                        "date" => $q_date[0],
                        "answers" => $answers
                    ];
                
                $final_result = array('questions' => $result);
                $final_arr = array('status' => 2000, 'message' => 'Answer got successfully', 'result' => $final_result);

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        } else {
            $final_arr = array('status' => 9000, 'message' => 'No result found', 'result' => '');
            $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
        }
    }
    
/* SearchQuestion api */
    public function SearchQuestion_post() {

         $post = json_decode(file_get_contents("php://input"));
         $search = $post->search;
         $is_public = 1;
         $res = $this->Apimodel->searchquestions($search, $is_public);

         // var_dump($res);die;
         if ($res) {
            foreach ($res as $key) {
                $answers = '';
                $question_id = $key->id;
                $q_ago=$this->time_elapsed_string(strtotime($key->datetime));
                $q_date=explode(' ', $key->datetime);

                $answer = $this->Apimodel->select_data("T_Answers", array('question_id' => $question_id));
                // var_dump($answer);
                if ($answer) {
                    if ($answer > 0) {
                        foreach ($answer as $val) {
                            $provider_id = $val->provider_id;
                            $provider = $this->Apimodel->select_data("T_Provider", array('id' => $provider_id));
                            $ago=$this->time_elapsed_string(strtotime($val->datetime));
                            $date=explode(' ', $val->datetime);
                            $answers[] = [
                                "provider_id" => $provider[0]->id,
                                "provider_name" => ucfirst($provider[0]->f_name).' '.ucfirst($provider[0]->l_name),
                                "answer" => $val->answer_details,
                                "time" => $ago,
                                "date" => $date[0]
                            ];
                        }
                    } else {
                        $answers = array();
                    }
                } else {
                    $answers = array();
                }
                // var_dump($answers);die;
                $result[] = [
                        "question_id" => $key->id ? : '',
                        "question" => $key->question ? : '',
                        "question_details" => $key->question_details ? : '',
                        "location" => $key->location ? : '',
                        "time" => $q_ago,
                        "date" => $q_date[0],
                        "answers" => $answers
                    ];
                
                $final_result = array('questions' => $result);
                $final_arr = array('status' => 2000, 'message' => 'Questions got successfully', 'result' => $final_result);

                $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
            }
        } else {
            $final_arr = array('status' => 9000, 'message' => 'No result found', 'result' => '');
            $this->set_response($final_arr, REST_Controller::HTTP_CREATED);
        }
     }

    
}
