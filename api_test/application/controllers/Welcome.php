<?php

error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/apn.php';

class Welcome extends CI_Controller {

     /**
      * Index Page for this controller.
      *
      * Maps to the following URL
      *                 http://example.com/index.php/welcome
      *         - or -
      *                 http://example.com/index.php/welcome/index
      *         - or -
      * Since this controller is set as the default controller in
      * config/routes.php, it's displayed at http://example.com/
      *
      * So any other public methods not prefixed with an underscore will
      * map to /index.php/welcome/<method_name>
      * @see https://codeigniter.com/user_guide/general/urls.html
      */
     public function index() {
         
         $this->load->helper('url');

         $this->load->view('welcome_message');
     }


  //    public function verify_email($user_id){
  //     $this->load->model('Apimodel');

  //     $res_to_show = $this->Apimodel->email_veri($user_id);

  //     if($res_to_show){
  //         $t = $res_to_show[0]->diff;

  //           if($t > 14){

  //               $check = $this->Apimodel->delete('T_User', array('user_id' => $user_id));
  //               if($check){
  //                   echo "No longer exits please register again"; 
  //               }
  //               else{
  //                   echo "something went wrong";
  //               }

  //           } 
  //           else{
  //               $res = $this->Apimodel->update('T_User', array('user_id' => $user_id),  array('is_email_verify' => 1) );

  //               if($res){
  //                   echo "Email Verification successfully";
  //               }
  //               else{
  //                   echo "Already Verified";
  //               }
                    
  //           }

  //     }

  //     else{
  //        echo "Link Is Expired Please Register Again";
  //     }
  // }

     public function verify_email($user_id){
        $this->load->model('Apimodel');
        $res = $this->Apimodel->update('T_User', array('user_id' => $user_id),  array('status' => 1) );

        if($res){
            echo "<font size='7'>Email verified successfully</font>";
          //  echo "<p><br><h1>Email verified successfully<h1><p>";
        }
        else{ 
            echo "<font size='7'>Your Email id is already verified. Please login</font>"; 
           // echo "<p><br><h1>Your Email id is already verified. Please login<h1><p>";
        }
          
     }
 
     
    public function forgot_password(){
      
      $this->load->model('Apimodel');
      $data['email'] = $_GET['email'];
    

      $emails = $this->Apimodel->select_data('T_User', array('email' => $data['email'] ));
      $user_id = $emails[0]->user_id;
      $time = $this->Apimodel->expireTime($user_id); 


      if($time[0]->time > 1200){

        $this->session->set_flashdata('link_error', '<div style="text-align:center;" class="alert alert-danger">
        <strong>Link expired please try again later.</strong>
        </div>');
        $this->load->view('changepassword_new', $data);

      } else {

        $this->load->view('changepassword_new', $data);
      }  

            
     }

    function update_email_request(){
 
      
      $this->load->model('Apimodel');
      $email = $_GET['email'];
      $updateemail = $_GET['updateemail'];

      $update_email = $this->Apimodel->update('T_User', array('email' => $email), array('email' => $updateemail) );
      
      $body = "Your profile has been updated recently.";
      $subject = 'Email address update';
      $to_email = $updateemail;
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // sending email

      $s_email =  $this->send_mail($to_email,$subject,$body,$headers);  

      // end email


      // for notification sending

      $dev_token = $this->Apimodel->select_data('T_User', array('email' => $updateemail ));
      
      $device_token = $dev_token[0]->device_token;
      $title = "Email update";
      $body = "Your Email address has been updated"; 
      
      $notification =  $this->callNotification($device_token,$title,$body);

      // end notification

      echo "Email updated successfully.";
      

    }

     public function changepassword(){
      // var_dump($_POST);die;
        
        $this->load->model('Apimodel');
        $pass = $_POST['password'];
        $cpass = $_POST['confirmpassword'];
        $email = $_POST['email'];
        
  
        // var_dump($pass." ".$cpass);die;   

        $emails = $this->Apimodel->select_data('T_User', array('email' => $email ));
        $user_id = $emails[0]->user_id;
        $time = $this->Apimodel->expireTime($user_id);  
 
// var_dump($time[0]->time);die;


        if($time[0]->time > 1200){

            $this->session->set_flashdata('link_error', '<div style="text-align:center;" class="alert alert-danger">
              <strong>Link expired please try again later.</strong>
            </div>');

            // echo "Link expired please try again later.";
            $data['email'] = $_POST['email'];
            $this->load->view('changepassword_new', $data);


        }else{  

          if($pass != $cpass){

            
            $this->session->set_flashdata('reset_error', '<div style="text-align:center;" class="alert alert-danger">
              <strong>Password doesn\'t match.</strong>
            </div>');

            $data['email'] = $_POST['email'];
            $this->load->view('changepassword_new', $data);

          } else {

            $update_password = $this->Apimodel->update('T_User', array('email' => $email), array('password' => md5($pass)));
          

          // if($update_password){
            $this->session->set_flashdata('reset_error', '<div style="text-align:center;" class="alert alert-success">
              <strong>Password changed successfully.</strong>
            </div>');

            $data['email'] = $_POST['email'];
            $this->load->view('changepassword_new', $data);  
          // } else { 
          
          //   $this->session->set_flashdata('link_error', '<div style="text-align:center;" class="alert alert-danger">
          //     <strong>Link expired please try again later.</strong>
          //   </div>');

          //   $data['email'] = $_POST['email'];
          //   $this->load->view('changepassword_new', $data);  
          // } 
          


              
              
          } 

        }

        
        
       
    } 
 
    public function changepasswordss($id = '', $otp = '', $type = '') {

         $this->load->model('Apimodel');


         if (!empty($_POST)) {
             $password = $_POST['password'];
             $confirmpassword = $_POST['cpassword'];

             $user_id = $_POST['id'];
             $token = $this->input->post('token');
             $type = $this->input->post('type');
             if ($password === $confirmpassword) {
$res = $this->Apimodel->update('T_User', array('user_id' => $user_id),  
array('password' => md5($password)));
                 if ($res > 0) {

                     echo 'Password changed successfully';
                     die;
                 } else {
                     echo 'Error occurred';
                     die;
                 }
             } else {
                 echo 'Password and confirm password do not match';
                 die;
             }
         }

         $res = $this->Apimodel->select_data('T_User', array('user_id' => $id, 'password' => $otp));
         
        $pagedata = array('user' => $res[0]);
         if ($res > 0) {
             $this->load->view('changepassword', $pagedata);
         } else {
             echo "<H1>Link expired please try again later</H1>";
         }
     }




    function callNotification($device_token,$title,$body){
        
        define( 'API_ACCESS_KEY', 'AIzaSyAKNgIrBlhnh4TSd1dxjYHUWsscP4GrA5I' );
        $registrationIds = array($device_token);

        $msg = array
        (
            'title' => $title,
            'body' => $body
        );

        $fields = array
        (
            'registration_ids'  => $registrationIds,
            'data'          => $msg
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        // echo $result;

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




}