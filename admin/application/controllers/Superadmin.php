<?php $path = TEMP_PATH; ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(1);

define("email_send_url", "<?= $path; ?>/admin/index.php/welcome/send_mail", true);

class Superadmin extends CI_Controller {

    function __construct() {

        // Construct the parent class
        parent::__construct();
        // $this->load->helper('url');
        $this->load->model('Supermodel');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('mylibrary');
        // $this->load->library('email');
        $delete_user = $this->Supermodel->delete('T_User', array('otp_verify' => "0"));
        $delete_u = $this->Supermodel->delete('T_User', array('status_id' => "0"));
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

        ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
    }

    private function checkauth() {
        if ($email = $this->session->userdata('super_email')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function index() {
        if ($this->checkauth()) {
            return redirect('superadmin/superhome');
        }

        redirect('superadmin/login');
    }

    function otp() {
        $this->load->view('otp');
    }

    function resendOtp() {
        $store_id = $_GET['store_id'];
        for ($i = 5; $i > 0; $i--) {
            $resendotp = rand(1000, 9999);
        }
        $resendotp = $resendotp;
        $matchresend = $resendotp;
        $done = $this->Adminmodel->update('T_Store', array('store_id' => $store_id), array('otp_code' => $matchresend));
        $data['otp'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id));
        $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $data['otp'][0]->store_mobile_no . "&message=Your+OTP+is " . $matchresend . "&sender=ABCDEF&route=4&country=0");
        $this->session->set_flashdata('otp_error', 'Your verification code has been sent to your registered phone number.');
        redirect('control/verifyOtp?store_id=' . $store_id);
    }

    function verifyOtp() {
        $data['store_id'] = $_GET['store_id'];
        $this->load->view('otp', $data);
        $store_id = $_GET['store_id'];
        $data['otp'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id));
        if (!empty($_POST)) {
            $otp = $this->input->post('otp');
            $store_id = $_GET['store_id'];
            $data['otp'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id));
            if ($data['otp'][0]->is_mobile_verify == 0) {
                if ($data['otp'][0]->otp_code == $otp) {
                    $otpVerify = $this->Adminmodel->update('T_Store', array('store_id' => $store_id), array('is_mobile_verify' => 1));
                    $this->session->set_flashdata('superlogin_error', 'Your mobile number is successfully verified.');
                    redirect('control/login');
                } else {
                    $this->session->set_flashdata('otp_error', 'OTP code is invalid.');
                    redirect('control/verifyOtp?store_id=' . $data['otp'][0]->store_id);
                }
            } else {
                $this->session->set_flashdata('superlogin_error', 'Mobile number is already verified.');
                redirect('control/login');
            }
        }
    }

    function view_userinfo() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        // if($this->uri->segment(3) == "chk2"){
        //     $data['users'] = $this->Supermodel->select_data('T_User',array('email != ' => NULL , 'otp_verify' => '1'),array('user_id' => 'desc'));
        //     $data['total_store'] = $this->Supermodel->select_data('T_User' ,array('email !=' => NULL),array('user_id' => 'desc' ,'status_id' => '1' , 'status_id' => '5' ));
        //     $data['active_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 1 ));
        //     $data['suspend_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 5 ));
        //     $data['super_email'] = $this->session->userdata('super_email');
        //     $this->load->view('superadmin/view_userinfo', $data);
        // }
        if ($this->uri->segment(3)) {
            $data['s_date'] = date('Y-m-d');
            $data['users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
            $data['total_store'] = $this->Supermodel->select_data('T_User', array('email !=' => NULL), array('user_id' => 'desc', 'status_id' => '1', 'status_id' => '5'));
            $data['active_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 1));
            $data['suspend_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 5));
            $data['super_email'] = $this->session->userdata('super_email');
            $this->session->set_flashdata('refresh_message1', '<div class="alert alert-success">
                  <strong> Refresh successful.</strong>
                  </div>');
            redirect("superadmin/view_userinfo");
            // $this->load->view('superadmin/view_userinfo', $data);
        } else {
            $data['users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
            $data['total_store'] = $this->Supermodel->select_data('T_User', array('email !=' => NULL), array('user_id' => 'desc', 'status_id' => '1', 'status_id' => '5'));
            $data['active_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 1));
            $data['suspend_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 5));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');
            $this->load->view('superadmin/view_userinfo', $data);
        }
    }

    function dateRangeUser() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        $data['total_store'] = $this->Supermodel->select_data('T_User', array('status_id !=' => "0"));
        $data['active_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 1));
        $data['suspend_stores'] = $this->Supermodel->select_data('T_User', array('status_id' => 5));
        $data['users'] = $this->Supermodel->getDataofRangeSelected("T_User", "reg_date", $_GET['startdate'], $_GET['enddate'], "user_id");
        $data['super_email'] = $this->session->userdata('super_email');
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('superadmin/view_userinfo', $data);
    }

    function shop_screen() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        if ($this->uri->segment(3)) {
            $data['total_users'] = $this->Supermodel->select_data('T_User');
            $data['total_store'] = $this->Supermodel->select_data('T_Store', array('store_email !=' => NULL), array('store_id' => 'desc'));
            $data['active_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 1));
            $data['suspend_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 7));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity');
            $data['s_date'] = date('Y-m-d');

            $this->session->set_flashdata('refresh_message2', '<div class="alert alert-success">
                  <strong> Refresh successful.</strong>
                  </div>');
            redirect("superadmin/shop_screen");
            // $this->load->view('superadmin/shop-screen', $data);
        } else {
            $data['total_users'] = $this->Supermodel->select_data('T_User');
            $data['total_store'] = $this->Supermodel->select_data('T_Store', array('store_email !=' => NULL), array('store_id' => 'desc'));
            $data['active_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 1));
            $data['suspend_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 7));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity');
            $data['s_date'] = date('Y-m-d');
            $this->load->view('superadmin/shop-screen', $data);
        }
    }

    function dateRangeStore() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['total_users'] = $this->Supermodel->select_data('T_User');
        $data['total_store'] = $this->Supermodel->getDataofRangeSelectedForStore("T_Store", "reg_date", $_GET['startdate'], $_GET['enddate'], "store_id");
        $data['active_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 1));
        $data['suspend_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 7));
        $data['super_email'] = $this->session->userdata('super_email');
        $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity');
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('superadmin/shop-screen', $data);
    }

    function sendNotificationToStore() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $store_id = $this->input->post('store_id');
        //  print_r($this->input->post()); die;
        $data['get_store-email'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id));
        $to_email = $data['get_store-email'][0]->store_email;
        $subject = $this->input->post('subject');
        $body = $this->input->post('message');
        // #async
        /*$param = array(
            'email' => $notify_email,
            'subject' => $subject,
            'body' => $body
        );

        $this->mylibrary->do_in_background(email_send_url, $param);*/
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
        $this->session->set_flashdata('notification_message', '<div class="alert alert-success">
              <strong>Notification has been sent to the store.</strong>
              </div>');
        redirect('superadmin/shop_screen');
    }

    function sendNotificationToUser() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        $user_id = $this->input->post('user_id');
        $data['geT_User-email'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));

        $to_email = $data['geT_User-email'][0]->email;
        $subject = $this->input->post('subject');
        $body = $this->input->post('message');
        // var_dump($subject);die;
        // #async
        // $param = array(
        //     'email' => $notify_email,
        //     'subject' => $subject,
        //     'body' => $body
        // );
        // $this->mylibrary->do_in_background(email_send_url, $param);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
        $this->session->set_flashdata('notification_user_message', '<div class="alert alert-success">
              <strong>Notification has been sent to the user.</strong>
              </div>');
        redirect('superadmin/view_userinfo');
    }

    function sendNotificationToWalkinUser() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $user_id = $this->input->post('user_id');
        $data['geT_User-email'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));
        $to_email = $data['geT_User-email'][0]->email;
        $subject = $this->input->post('subject');
        $body = $this->input->post('message');            // var_dump($subject);die;

        /*$param = array(
            'email' => $notify_email,
            'subject' => $subject,
            'body' => $body
        );
        $this->mylibrary->do_in_background(email_send_url, $param);*/
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
        
        $this->session->set_flashdata('notification_user_message', '<div class="alert alert-success">
              <strong>Notification has been sent to the user.</strong>
              </div>');
        redirect('superadmin/view_walkins', $data);
    }

    function view_shopinfo() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($this->uri->segment(4)) {
            $store_id = $this->uri->segment(3);
            $data['super_email'] = $this->session->userdata('super_email');
            $data['selected_store_detail'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id));
            $data['purchase_detail'] = $this->Supermodel->select_data('T_Payment', array('store_id' => $store_id), array('payment_id' => 'desc'));
            $data['total_purchase'] = $this->Supermodel->totalPurchaseOfStore($store_id);

            $this->session->set_flashdata('refresh_message', '<div class="alert alert-success">
                  <strong> Refresh successful.</strong>
                  </div>');
            // redirect("superadmin/view_shopinfo");
            $this->load->view('superadmin/view_shopinfo', $data);
        } else {
            $store_id = $this->uri->segment(3);
            $data['super_email'] = $this->session->userdata('super_email');
            $data['selected_store_detail'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id));
            $data['purchase_detail'] = $this->Supermodel->select_data('T_Payment', array('store_id' => $store_id), array('payment_id' => 'desc'));
            $data['total_purchase'] = $this->Supermodel->totalPurchaseOfStore($store_id);
            $this->load->view('superadmin/view_shopinfo', $data);
        }
    }

    function view_purchase() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($this->uri->segment(3)) {
            $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL), array('payment_id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');            // $data['e_date'] = '2017-12-01';
            $this->session->set_flashdata('refresh_message3', '<div class="alert alert-success">
                  <strong> Refresh successful.</strong>
                  </div>');
            redirect("superadmin/view_purchase");
            // $this->load->view('superadmin/view_purchase', $data);
        } else {
            $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL), array('payment_id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');            // $data['e_date'] = '2017-12-01';
            $this->load->view('superadmin/view_purchase', $data);
        }
    }

    function dateRangePurchase() {

        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['purchase'] = $this->Supermodel->getDataofRangeSelectedBilling("T_Payment", "created_date", $_GET['startdate'], $_GET['enddate'], "payment_id");
        $data['super_email'] = $this->session->userdata('super_email');
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('superadmin/view_purchase', $data);
    }

    function view_walkins() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($this->uri->segment(3)) {
            // $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity',array('user_id !=' => NULL), array('beacon_activity_id' => 'desc' ));
            $data['total_walkins'] = $this->Supermodel->allStoreWalkinData();
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');
            $data['total_w'] = $this->Supermodel->allStoreWalkinData_Count();
            $data['last_month_walkin'] = $this->Supermodel->lastMonthWalkin(date('m') - 1);
            $data['todayWalkinsMade'] = $this->Supermodel->todayWalkinsMade();
            $this->session->set_flashdata('refresh_message4', '<div class="alert alert-success">
                  <strong> Refresh successful.</strong>
                  </div>');
            redirect("superadmin/view_walkins");
            // $this->load->view('superadmin/view_walkins', $data);
        } else {
            // $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity',array('user_id !=' => NULL), array('beacon_activity_id' => 'desc' ));
            $data['total_walkins'] = $this->Supermodel->allStoreWalkinData();
            
            //Display walkin count 19042018 
           
            $data['total_w'] = $this->Supermodel->allStoreWalkinData_Count();

            
            $data['last_month_walkin'] = $this->Supermodel->lastMonthWalkin(date('m'));
            $data['todayWalkinsMade'] = $this->Supermodel->todayWalkinsMade();
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');
            $this->load->view('superadmin/view_walkins', $data);
            // var_dump($data['last_month_walkin']);
        }
    }

    function dateRangeWalkin() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        //$data['total_walkins'] = $this->Supermodel->getDataofRangeSelectedWalkin("T_BeaconActivity", "detected_date", $_GET['startdate'], $_GET['enddate'], "beacon_activity_id");
        $data['total_walkins'] = $this->Supermodel->allStoreWalkinData_Filter($_GET['startdate'], $_GET['enddate']);      

        $data['total_w'] = $this->Supermodel->allStoreWalkinData_Count_Filter($_GET['startdate'], $_GET['enddate']);      
        
        $data['last_month_walkin'] = $this->Supermodel->lastMonthWalkin(date('m'));
        $data['todayWalkinsMade'] = $this->Supermodel->todayWalkinsMade();

        $data['super_email'] = $this->session->userdata('super_email');
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('superadmin/view_walkins', $data);
    }

    function profile() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($_POST) {
            $email = $this->input->post("email");
            $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email));

            $config = array(
                array(
                    'field' => 'newpassword',
                    'label' => 'New Password',
                    'rules' => 'required|min_length[6]|max_length[12]',
                    'errors' => array(
                        'required' => 'New password field is required',
                        'min_length' => 'New Password field must be at least 6 characters in length',
                        'max_length' => 'New Password field cannot exceed 12 characters in length',
                    ),
                ),
                array(
                    'field' => 'confirmnewpassword',
                    'label' => 'Confirm New Password',
                    'rules' => 'required|min_length[6]|max_length[12]|matches[newpassword]',
                    'errors' => array(
                        'required' => 'Confirm password field is required',
                        'min_length' => 'Confirm Password field must be at least 6 characters in length',
                        'max_length' => 'Confirm Password field cannot exceed 12 characters in length',
                        'matches' => 'Confirm password does not match with new password field',
                    ),
                )
            );
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE) {
                $data['super_email'] = $this->session->userdata('super_email');
                $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email = ' => $this->session->userdata('super_email')));
                $this->load->view('superadmin/profile', $data);
            } else {
                $password = $this->input->post('newpassword');
                $chk_if_same_pass_enter = $this->Supermodel->select_data('T_Superadmin', array('email = ' => $email, 'password' => $password));

                if ($chk_if_same_pass_enter) {
                    $this->session->set_flashdata('superPasswordChange', '<div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Your new password match with the current password, Please choose different password</strong>
                            </div>');
                    $data['super_email'] = $this->session->userdata('super_email');
                    $this->load->view('superadmin/profile', $data);
                } else {
                    $passwordChange = $this->Supermodel->update('T_Superadmin', array('email' => $email), array('password' => $password));
                    $this->session->set_flashdata('login_display_password_change', '<div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Password changed successfully.</strong>
                          </div>');
                    redirect('superadmin/login');
                }
            }
        }

        $data['super_email'] = $this->session->userdata('super_email');
        $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email = ' => $this->session->userdata('super_email')));
        $this->load->view('superadmin/profile', $data);
    }

    function changeStoreStatus() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        $store = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        $statusChange = $this->Supermodel->update('T_Store', array('store_id' => $store), array('status_id' => $status));

        if ($status == 2) {

            $adminChange = $this->Supermodel->update('T_Store', array('store_id' => $store), array('is_admin_approved' => 1));
            $url = str_replace(' ', '', base_url('index.php/Welcome/verify_email'));
            $data['get_store_email'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));

            $subject = 'Verify your email';
            $to_email = $data['get_store_email'][0]->store_email;
            $data['email'] = $to_email;
            $data['url'] = $url . "/" . $store;
            $body = $this->load->view('design_email', $data, TRUE);
            // $body = "hi <b>$to_email</b>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $sts = $this->send_mail($to_email, $subject, $body, $headers);
            // print_r($sts);die;
          //  print_r($this->email->print_debugger());die;
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);
            $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                    <strong>Store has been approved successfully, verification link and OTP code has been sent to the store.</strong>
                    </div>');
        }

        if ($status == 8) {
            $adminChange = $this->Supermodel->update('T_Store', array('store_id' => $store), array('is_admin_approved' => 0));
            $body = "Your store request is rejected by superadmin";
            $data['get_store_email'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));
            $subject = 'Superadmin has rejected your store registration request';
            $body = 'Hello '.$data['get_store_email'][0]->store_first_name.'<br>

We Reget to tell you that your Shop details has been rejected due to Inaccurate data. <br>
We ask you to send one of the following documents for the further review<br>

1. Shopkeeper ID <br>
2. Shopact Registration <br>


Once you send these documets, our review team will review the same for the further process. <br>

Should have any query? Reach us to at contact@cashrub.com <br>
<br><br>

Thanks';
            $to_email = $data['get_store_email'][0]->store_email;
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $sts = $this->send_mail($to_email, $subject, $body, $headers);
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);
            $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                  <strong>Store request rejected successfully.</strong>
                  </div>');
        }

        if ($status == 1) {
            $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                  <strong>Store account Activate successfully.</strong>
                  </div>');
        }

        if ($status == 7) {
            $adminChange = $this->Supermodel->update('T_Store', array('store_id' => $store), array('is_admin_approved' => 0));
            $body = "Your account is suspended by store admin";
            $data['get_store_email'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));
            $subject = 'Admin has suspend your account';
            $to_email = $data['get_store_email'][0]->store_email;
            $body = 'Hello'. $data['get_store_email']->store_first_name.'<br>
your store is suspended<br>
Should have any query? Reach us to at contact@cashrub.com <br>
<br><br>

Thanks';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $sts = $this->send_mail($to_email, $subject, $body, $headers);
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);
            $this->session->set_flashdata('store_blocked', '<div style="text-align:center;" class="alert alert-success">
                  <strong>Store account suspended successfully.</strong>
                  </div>');
        }
    }

    function changeUserStatus() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $user = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        $statusChange = $this->Supermodel->update('T_User', array('user_id' => $user), array('status_id' => $status));
        // Notification
        $data['users'] = $this->Supermodel->select_data('T_User', array('user_id' => $user));
        $body = "Hi ".$data['users'][0]->name."<br> 
BLOCKED !<br>
Your account is Blocked due to some  Security configuration issues.If You want to continue with us then do Create new account with valid information.
<br>
In case of any doubts do visit www.cashrub.in.
 <br><br>
Thank You.";
        $data['geT_User_email'] = $this->Supermodel->select_data('T_User', array('email' => $data['users'][0]->email));
        $subject = 'You are blocked by the admin.';
        $to_email = $data['users'][0]->email;
        // #async
        // $param = array(
        //     'email' => $to_email,
        //     'subject' => $subject,
        //     'body' => $body
        // );
        // $this->mylibrary->do_in_background(email_send_url, $param);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $sts = $this->send_mail($to_email, $subject, $body, $headers);

        $this->session->set_flashdata('user_blocked', '<div class="alert alert-success">
              <strong>User blocked successfully.</strong>
              </div>');
    }

    function superhome() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['total_users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
        $data['total_store'] = $this->Supermodel->select_data('T_Store', array('store_email != ' => NULL), array('store_id' => 'desc'));
        $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity', array('beacon_activity_id != ' => NULL), array('beacon_activity_id' => 'desc'));
        $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL), array('payment_id' => 'desc'));
        $data['users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
        $data['getCountCredits'] = $this->Supermodel->getCountCredits();
        $data['super_email'] = $this->session->userdata('super_email');

        $data['custom_data'] = $this->Supermodel->my_custom_dashboard_data();
        $data['dashboard_store'] = json_encode($data['custom_data']);
        $data['custom_data2'] = $this->Supermodel->my_custom_dashboard_data2();
        $data['dashboard_user'] = json_encode($data['custom_data2']);
        $data['custom_data3'] = $this->Supermodel->my_custom_dashboard_data3();
        $data['dashboard_purchase'] = json_encode($data['custom_data3']);
        $data['custom_data4'] = $this->Supermodel->my_custom_dashboard_data4();
        $data['dashboard_walkin'] = json_encode($data['custom_data4']);
        $this->load->view('superadmin/dashboard_test', $data);
    }

    function login() {
        $this->load->view('superadmin/superlogin');
    }

    //New code
    public function superdashbored() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');

        $data['total_users'] = $this->Supermodel->filterbydate('T_User', 'reg_date', $startdate, $enddate);
        $data['total_store'] = $this->Supermodel->filterbydate('T_Store', 'reg_date', $startdate, $enddate);
        $data['total_walkins'] = $this->Supermodel->filterbydate('T_BeaconActivity', 'detected_date', $startdate, $enddate);
        $data['purchase'] = $this->Supermodel->filterbydate('T_Payment', 'payment_date', $startdate, $enddate);
        $data['getCountCredits'] = $this->Supermodel->getCountCredits2($startdate, $enddate);
        $data['super_email'] = $this->session->userdata('super_email');
        $data['custom_data'] = $this->Supermodel->my_custom_dashboard2_data($startdate, $enddate);
        $data['dashboard_store'] = json_encode($data['custom_data']);
        $data['custom_data2'] = $this->Supermodel->my_custom_dashboard2_data2($startdate, $enddate);
        $data['dashboard_user'] = json_encode($data['custom_data2']);
        $data['custom_data3'] = $this->Supermodel->my_custom_dashboard2_data3($startdate, $enddate);
        $data['dashboard_purchase'] = json_encode($data['custom_data3']);
        $data['custom_data4'] = $this->Supermodel->my_custom_dashboard2_data4($startdate, $enddate);
        $data['dashboard_walkin'] = json_encode($data['custom_data4']);

        $data['sdate'] = $startdate;
        $data['edate'] = $enddate;
        $this->load->view('superadmin/dashboard_test', $data);
    }

    //New code

    function check_login() {
        if ($_POST) {
            $email = $this->input->post("username");
            $password = $this->input->post("password");
            $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email));
            $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('superadmin/superlogin');
            } else {
                if ($data['superadmin']) {
                    $data['superadminpass'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email, 'password' => $password));
                    if ($data['superadminpass']) {
                        $newdata = array(
                            'super_email' => $data['superadmin'][0]->email,
                            'logged_in' => TRUE
                        );
                        $data['total_users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
                        $data['total_store'] = $this->Supermodel->select_data('T_Store', array('store_email != ' => NULL), array('store_id' => 'desc'));
                        $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity', array('beacon_activity_id != ' => NULL), array('beacon_activity_id' => 'desc'));
                        $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL), array('payment_id' => 'desc'));
                        $data['users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
                        $data['getCountCredits'] = $this->Supermodel->getCountCredits();
                        $this->session->seT_Userdata($newdata);

                        $data['super_email'] = $this->session->userdata('super_email');
                        $data['custom_data'] = $this->Supermodel->my_custom_dashboard_data();
                        $data['dashboard_store'] = json_encode($data['custom_data']);
                        $data['custom_data2'] = $this->Supermodel->my_custom_dashboard_data2();
                        $data['dashboard_user'] = json_encode($data['custom_data2']);
                        $data['custom_data3'] = $this->Supermodel->my_custom_dashboard_data3();
                        $data['dashboard_purchase'] = json_encode($data['custom_data3']);
                        $data['custom_data4'] = $this->Supermodel->my_custom_dashboard_data4();
                        $data['dashboard_walkin'] = json_encode($data['custom_data4']);

                        $this->load->view('superadmin/dashboard_test', $data);
                    } else {
                        $this->session->set_flashdata('superlogin_error', 'Password doesn\'t match');
                        $this->load->view('superadmin/superlogin');
                    }
                } else {
                    $this->session->set_flashdata('superlogin_error', 'Email address doesn\'t exist');
                    $this->load->view('superadmin/superlogin');
                }
            }
        } else {
            $this->load->view('superadmin/superlogin');
        }
    }

    function reset_password() {
        if ($_POST) {
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('superadmin/reset_password');
            } else {
                $password = $this->input->post("password");
                $email = $this->input->post("email");
                $update = $this->Supermodel->update('T_Superadmin', array('email' => $email), array('password' => $password));
                $this->session->set_flashdata('superlogin_error', '<div style="text-align:center;" class="alert alert-success">
                    <strong>Password reset successfully.</strong>
                    </div>');
                redirect('superadmin/login');
            }
        }
        $data['email'] = $_GET['email'];
        $this->load->view('superadmin/reset_password', $data);
    }

    function forgot_password() {
        if ($_POST) {
            $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('superadmin/forgot_password');
            } else {
                $email = $this->input->post("username");
                $data['superadmin'] = $this->Supermodel->select_data('T_Superadmin', array('email' => $email));
                if ($data['superadmin']) {
                    $url = str_replace(' ', '', base_url('index.php/superadmin/reset_password'));
                    $body = " <a href='" . $url . "?email=" . $email . "'>Click</a> here to reset your password";
                    $subject = 'Reset your password';
                    $to_email = $email;
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    //  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // #async
                    // $param = array(
                    //     'email' => $to_email,
                    //     'subject' => $subject,
                    //     'body' => $body
                    // );
                    
                    // $this->mylibrary->do_in_background(email_send_url, $param);
                    $this->send_mailff($email, $subject, $body, $headers);

                    $this->session->set_flashdata('superlogin_error', 'Reset password link has been sent to your email');
                    $this->load->view('superadmin/superlogin');
                } else {
                    $this->session->set_flashdata('forgot_error', 'Email doesn\'t exists');
                    $this->load->view('superadmin/forgot_password');
                }
            }
        }
        $this->load->view('superadmin/forgot_password');
    }

    public function send_mailff($to, $subject, $body, $headers = '') {
       $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'info@cashrub.com', // change it to yours
  'smtp_pass' => 'cashrub@77', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

       
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('info@cashrub.com','cashrub'); // change it to yours
      $this->email->to($to);// change it to yours
      $this->email->subject($subject);
      $this->email->message($body);

        return $this->email->send();

    }

    function editAccountSetting() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        $otp = $this->input->post('otp');
        $cotp = $this->input->post('cotp');
        if ($otp == $cotp) {
            $updateSetting = array(
                'store_email' => $this->input->post('email'),
                'store_password' => $this->input->post('password'),
                'otp_code' => $otp,
                'is_mobile_verify' => 1
            );
            $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateSetting);
            redirect('control/profile');
        } else {
            echo "otp doesn't match";
        }
    }

    function editProfile() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName;
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



        if (!empty($_POST)) {
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
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                  <strong>Profile update successfully.</strong>
                  </div>');
            redirect('control/profile');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('superadmin/login');
    }

    function setting() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')));
        $this->load->view("setting", $data);
    }

    // new methods 4 july

    function addCashrubBeacons() {
        $data['super_email'] = $this->session->userdata('super_email');
        $this->load->view("superadmin/addCashrubBeacons", $data);
    }

    function saveCashrubBeacons() {
    /*    for ($i = 7; $i > 0; $i--) {
            $b_key2 = rand(100000, 999999);
        }

        $beacon_umique_key2 = $b_key2;*/
        $beacon_key = $this->input->post('beacon_key');
        $beacon_uuid = $this->input->post('beacon_uuid');
        $beacon_major = $this->input->post('beacon_major');
        $beacon_minor = $this->input->post('beacon_minor');
      /*  $beacon_key = "beacon-" . $beacon_umique_key2;
*/
    /*    $chk_if_already_name = $this->Supermodel->select_data('T_Beacon', array(
            'name' => $beacon_name
        ));*/
  /*      if ($chk_if_already_name) {
            $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" style="margin-right:2%;" aria-label="close">&times;</a>
                    Cashrub Beacon already exists with this name<b></b>
                    </div>');
            $data['beacon_key'] = $beacon_key;
            $data['super_email'] = $this->session->userdata('super_email');
            redirect('superadmin/addCashrubBeacons');
        } else {*/
            $chk_if_already = $this->Supermodel->select_data('T_Beacon', array(
                'beacon_key'=> $beacon_key
              /*  'uuid' => $beacon_uuid,
                'major_value' => $beacon_major,
                'minor_value' => $beacon_minor*/
            ));

            if ($chk_if_already) {
                $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" style="margin-right:2%;" aria-label="close">&times;</a>
                        Cashrub Beacon already exists with this key,uuid,major or minor<b></b>
                        </div>');
                $data['beacon_key'] = $beacon_key;
                $data['super_email'] = $this->session->userdata('super_email');
                redirect('superadmin/beacons');
            } else {
                $beacon_data = array(
                    'beacon_key' => $beacon_key,
                  /*  'name' => $beacon_name,*/
                    'uuid' => $beacon_uuid,
                    'major_value' => $beacon_major,
                    'minor_value' => $beacon_minor
                );
                $insert_beacon = $this->Supermodel->insert('T_Beacon', $beacon_data);
                $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" style="margin-right:2%;" aria-label="close">&times;</a>
                        Cashrub Beacon added with unique_id <b>' . $beacon_key . '</b>
                        </div>');
                $data['beacon_key'] = $beacon_key;
                $data['super_email'] = $this->session->userdata('super_email');

                redirect('superadmin/beacons');
            }
       /* }*/
    }

    function assignBeaconToStores() {
        $data['super_email'] = $this->session->userdata('super_email');
        $data['cashrub_beacon_list'] = $this->Supermodel->select_data('T_Beacon', array('already_assigned' => "0"), array(' assigned_to_store' => "0"));
        $data['get_stores_list'] = $this->Supermodel->select_data('T_Store', array('store_email != ' => NULL));

        $this->load->view("superadmin/assignBeaconToStores", $data);
    }

    function save_assignBeaconToStores() {
        $data['cashrub_beacon_list'] = $this->Supermodel->select_data('T_Beacon', array('already_assigned' => "0"), array(' assigned_to_store' => "0"));
        $data['get_stores_list'] = $this->Supermodel->select_data('T_Store', array('store_email != ' => NULL));
        $beacons_list = [];
        $store_id_to_assign = $this->input->post('store_id_to_assign');
        $data['get_stores_datas'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id_to_assign));

        foreach ($this->input->post("assigned_beacons") as $value) {
            $assign_to_store_update = $this->Supermodel->update('T_Beacon', array('beacon_key' => $value), array('assigned_to_store' => $store_id_to_assign)
            );
            if ($assign_to_store_update) {
                $assign_update = $this->Supermodel->update('T_Beacon', array('beacon_key' => $value), array('already_assigned' => "1")
                );
                $result_get .= "<b>Beacon ID: </b> " . $value . " <br>";
            }
        }
        $to_email = $data['get_stores_datas'][0]->store_email;
        $subject = 'New Beacons added in your account by superadmin';
        $body = "Hello <b>" . $data['get_stores_datas'][0]->store_first_name . "</b> ,<br> New Beacon Added in your store by super admin <br> " . $result_get;
        // #async
        // $param = array(
        //     'email' => $to_email,
        //     'subject' => $subject,
        //     'body' => $body
        // );
        // $this->mylibrary->do_in_background(email_send_url, $param);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
        
        $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" style="margin-right:2%;" aria-label="close">&times;</a>
                Cashrub Beacons assigned to the store <b>' . $data['get_stores_datas'][0]->store_first_name . '</b>
                </div>');

        $data['super_email'] = $this->session->userdata('super_email');
        redirect('superadmin/addCashrubBeacons');
    }

    // coupon functionality adding 6 july 2017        
    function redeemCoupon() {
        $data['categorys'] = $this->Supermodel->select_data('T_Categorys');
        $data['super_email'] = $this->session->userdata('super_email');
        $data['get_stores_list'] = $this->Supermodel->select_data('T_Store', array('store_email != ' => NULL));
        $this->load->view("superadmin/addCoupons", $data);
    }

    function addCoupon() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['filenew']['tmp_name'];
            $fileName = $_FILES['filenew']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName;

            $file_size = $_FILES['filenew']['size'];
            if ($file_size < 2000000) {
                move_uploaded_file($tempFile, $targetFile);
            }
        }

        if (!empty($_POST)) {
            $filename = $_FILES['filenew']['name'];
            $originalDate = $this->input->post('coupon_expiry_date');
            $newDate = date("Y-m-d", strtotime($originalDate));
            if ($newDate == '1970-01-01') {
                $datemodify = date("Y-m-d");
            } else {
                $datemodify = $newDate;
            }
            $data['title'] = $this->Supermodel->select_data('T_Coupon', array('coupon_title' => $this->input->post('coupon_title'), 'status !=' => 9));
            if ($data['title']) {
                $this->session->set_flashdata('coupon_message', '<div class="alert alert-danger">
                  <strong>Coupon with this title already exists.</strong>
                  </div>');
                redirect('superadmin/redeemCoupon');
            } else {
                $insertCouponData = array(
                    'coupon_title' => $this->input->post('coupon_title'),
                    'coupon_description' => $this->input->post('coupon_description'),
                    'store_id' => $this->input->post('store_id_to_assign'),
                    'coupon_image' => $_FILES['filenew']['name'],
                    'coupon_expiry_date' => $datemodify,
                    'terms' => $this->input->post('coupon_terms'),
                    'coupon_points' => $this->input->post('coupon_points'),
                    'category_id' => $this->input->post('category')
                );

                $store_offer_id = $this->Supermodel->insert('T_Coupon', $insertCouponData);
                $this->session->set_flashdata('coupon_message', '<div class="alert alert-success">
                  <strong>Coupon added successfully.</strong>
                  </div>');
                redirect('superadmin/redeemCoupon');
            }
        }
    }

    function viewCoupons() {
        $data['couponDetails'] = $this->Supermodel->select_data('T_Coupon', array('status' => '1'));
        $data['super_email'] = $this->session->userdata('super_email');
        $this->load->view('superadmin/viewAllCoupons', $data);
    }

    function viewExpiredCoupons() {
        $data['couponDetails'] = $this->Supermodel->select_data('T_Coupon', array('status' => '9'));
        $data['super_email'] = $this->session->userdata('super_email');
        $this->load->view('superadmin/viewExpiredCoupons', $data);
    }

    function viewRejectedCoupons() {
        $data['couponDetails'] = $this->Supermodel->select_data('T_Coupon', array('status' => '11'));
        $data['super_email'] = $this->session->userdata('super_email');
        $this->load->view('superadmin/viewRejectedCoupons', $data);
    }

    function removeCoupon($coupon_id) {
        // $delete_coupon = $this->Supermodel->delete('T_Coupon', array('coupon_id' => $coupon_id ));
        $updateCouponData = array(
            'status' => "11"
        );
        $update_coupon_info = $this->Supermodel->update('T_Coupon', array('coupon_id' => $coupon_id), $updateCouponData);
        // $delete_coupon = $this->Supermodel->update('T_Coupon', array('coupon_id' => $coupon_id ), array('status' => "11") );
        print $update_coupon_info;

        $this->session->set_flashdata('all_coupon_message', '<div class="alert alert-success">
          <strong>Coupon removed successfully.</strong>
          </div>');
    }

    function editCoupon($coupon_id) {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['filenew']['tmp_name'];
            $fileName = $_FILES['filenew']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName;

            if (($_FILES['filenew']['size']) < 2000000) {
                move_uploaded_file($tempFile, $targetFile);
            }
        }
        if (!empty($_POST)) {
            $filename = $_FILES['filenew']['name'];
            $originalDate = $this->input->post('offer_expiry_date');
            $newDate = date("Y-m-d", strtotime($originalDate));
            // $datemodify =  if($newDate == '1970-01-01') { echo date("Y-m-d"); } else { echo $newDate; };
            if ($newDate == '1970-01-01') {
                $datemodify = date("Y-m-d");
            } else {
                $datemodify = $newDate;
            }

            $updateCouponData = array(
                'coupon_title' => $this->input->post('coupon_title'),
                'coupon_description' => $this->input->post('coupon_description'),
                'store_id' => $this->input->post('store_id_to_assign'),
                'coupon_image' => $_FILES['filenew']['name'] ? $_FILES['filenew']['name'] : $this->input->post('myfile'),
                'coupon_expiry_date' => $datemodify,
                'terms' => $this->input->post('coupon_terms'),
                'coupon_points' => $this->input->post('coupon_points'),
                'category_id' => $this->input->post('category')
            );

            $update_coupon_info = $this->Supermodel->update('T_Coupon', array('coupon_id' => $coupon_id), $updateCouponData);
            $this->session->set_flashdata('all_coupon_message', '<div class="alert alert-success">
              <strong>Coupon updated successfully.</strong>
              </div>');

            redirect('superadmin/viewCoupons');
        }
        $data['categorys'] = $this->Supermodel->select_data('T_Categorys');
        $data['edit_coupon'] = $this->Supermodel->select_data('T_Coupon', array('coupon_id' => $coupon_id));
        $data['super_email'] = $this->session->userdata('super_email');
        $data['get_stores_list'] = $this->Supermodel->select_data('T_Store', array('store_email != ' => NULL));

        $this->load->view('superadmin/editCoupon', $data);
    }

    function changeCouponStatus() {
        $value = $this->uri->segment(3);
        $coupon_id = $this->uri->segment(4);
        $coupon_status = array(
            'status' => $value
        );

        $status_change = $this->Supermodel->update('T_Coupon', array('coupon_id' => $coupon_id), $coupon_status);
        $this->session->set_flashdata('all_coupon_message', '<div class="alert alert-success">
          <strong>Coupon status change successfully.</strong>
          </div>');
        redirect('superadmin/viewCoupons');
    }

    //for view-claims report updated on 26022018

    function viewCouponClaims($coupon_id) {
        if ($this->uri->segment(4)) {
            $user_id = $this->uri->segment(3);
            $this->session->set_flashdata('refresh_message_claim', '<div class="alert alert-success">
              <strong> Refresh successful.</strong>
              </div>');
            $data['coupon_claims'] = $this->Supermodel->select_data('T_CouponClaims', array('coupon_id' => $coupon_id), array('id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['coupon_id_t'] = $coupon_id;
            $data['s_date'] = date('Y-m-d');
            // $this->load->view('superadmin/view_coupon_claims', $data);
            $data['todays_claims'] = $this->Supermodel->getTodaysClaims($coupon_id);
            $data['total_claims'] = $this->Supermodel->getTotalClaims($coupon_id);
            $data['coupon_status'] = $this->Supermodel->getCouponStatus($coupon_id);
            redirect("superadmin/viewCouponClaims/" . $coupon_id);
        } else {
            $user_id = $this->uri->segment(3);
            $data['coupon_claims'] = $this->Supermodel->select_data('T_CouponClaims', array('coupon_id' => $coupon_id), array('id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['coupon_id_t'] = $coupon_id;
            $data['s_date'] = date('Y-m-d');
            // print_r( $this->Supermodel->getTodaysClaims($coupon_id));
            // print_r( $this->Supermodel->getTotalClaims($coupon_id));
            // die();
            $data['todays_claims'] = $this->Supermodel->getTodaysClaims($coupon_id);
            $data['total_claims'] = $this->Supermodel->getTotalClaims($coupon_id);
            $data['coupon_status'] = $this->Supermodel->getCouponStatus($coupon_id);
            // print_r($data);die();
            $this->load->view('superadmin/view_coupon_claims', $data);
        }
    }

    function dateRangeCouponClaim($coupon_id) {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['coupon_claims'] = $this->Supermodel->getDataofRangeCouponClaim("T_CouponClaims", "claim_date", $_GET['startdate'], $_GET['enddate'], "id", $coupon_id);
        $data['coupon_id_t'] = $coupon_id;
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('superadmin/view_coupon_claims', $data);
    }

    // test

    function superhome_test() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['total_users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
        $data['total_store'] = $this->Supermodel->select_data('T_Store', array('store_email != ' => NULL), array('store_id' => 'desc'));
        $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity', array('beacon_activity_id != ' => NULL), array('beacon_activity_id' => 'desc'));
        $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL), array('payment_id' => 'desc'));
        $data['users'] = $this->Supermodel->select_data('T_User', array('email != ' => NULL, 'otp_verify' => '1'), array('user_id' => 'desc'));
        $data['getCountCredits'] = $this->Supermodel->getCountCredits();
        $data['super_email'] = $this->session->userdata('super_email');

        $data['custom_data'] = $this->Supermodel->my_custom_dashboard_data();
        $data['dashboard_store'] = json_encode($data['custom_data']);
        $data['custom_data2'] = $this->Supermodel->my_custom_dashboard_data2();
        $data['dashboard_user'] = json_encode($data['custom_data2']);
        $data['custom_data3'] = $this->Supermodel->my_custom_dashboard_data3();
        $data['dashboard_purchase'] = json_encode($data['custom_data3']);
        $data['custom_data4'] = $this->Supermodel->my_custom_dashboard_data4();
        $data['dashboard_walkin'] = json_encode($data['custom_data4']);

        $this->load->view('superadmin/dashboard_test', $data);
    }

    function getUsresBydate() {
        $no_of_users = $this->Supermodel->countUserRegByDate($_GET['date']);
        print $no_of_users[0]->no_of_user;
    }

    function graphCall() {
        $my = [];
        // for ($i = 17; $i <= 18; $i++) { 
        for ($k = 1; $k <= 12; $k++) {
            for ($j = 1; $j < 31; $j++) {
                $date = date("Y") . "-" . $k . "-" . $j;
                $no_of_users = $this->Supermodel->countUserRegByDate($date);
                $outputs = array();
                $outputs["date"] = date("Y") . "-" . $k . "-" . $j;
                $outputs["value"] = $no_of_users[0]->no_of_user;
                // $my.push($outputs);
                array_push($my, $outputs);
            }
        }
        // }
        $line = json_encode($my);
        // $line2 = json_decode($line);
        print $line;
    }

    function userReportByUser() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        if ($this->uri->segment(4)) {
            $user_id = $this->uri->segment(3);

            $data['super_email'] = $this->session->userdata('super_email');
            $data['user_report'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id), array('activity_log_id' => 'desc'));
            $data['walkin'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'walkin'));
            $data['share'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'share'));
            $data['favorite'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'favorite'));

            $data['rating'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'rating'));
            $data['twitter'] = $this->Supermodel->getTwitterPoints($user_id);
            $data['facebook'] = $this->Supermodel->getFacebookPoints($user_id);
            $data['user_points'] = $this->Supermodel->select_data('T_UserPoint', array('user_id' => $user_id));

            $data['f_p'] = $this->Supermodel->getFacebookP($user_id);
            $data['t_p'] = $this->Supermodel->getTwitterP($user_id);
            $data['w_p'] = $this->Supermodel->getWalkinP($user_id);
            $data['userName'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));

            $data['total_walkins'] = $this->Supermodel->userWalkinData_Count($user_id);
            $data['total_w'] = $data['total_walkins'][0]->walkin_count;

            $data["point"] = $this->Supermodel->select_data("T_SocialSharePoint", array('user_id'=>$user_id));
            
            $data['selected_user_detail'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));
            $data['total_spent'] = $this->Supermodel->getUserWalkinSpent($user_id);
            $data['total_points'] = $data['f_p'][0]->facebook_p + $data['t_p'][0]->twitter_p + $data['w_p'][0]->walkin_p;
            $data['s_date'] = date('Y-m-d');

            $this->session->set_flashdata('refresh_message5', '<div class="alert alert-success">
              <strong> Refresh successful.</strong>
              </div>');
            // redirect("superadmin/userReportByUser");
            $this->load->view('superadmin/view_userReport.php', $data);
        } else {
            $user_id = $this->uri->segment(3);
            $data['super_email'] = $this->session->userdata('super_email');
            $data['user_report'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id), '',array('activity_log_id' => 'desc'));
            //echo $this->db->last_query();die();    
            $data['walkin'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'walkin'));
            $data['share'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'share'));
            $data['favorite'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'favorite'));

            $data['rating'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'rating'));
            $data['twitter'] = $this->Supermodel->getTwitterPoints($user_id);
            $data['facebook'] = $this->Supermodel->getFacebookPoints($user_id);
            $data['user_points'] = $this->Supermodel->select_data('T_UserPoint', array('user_id' => $user_id));

            $data['userName'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));
            $where = array('user_id' => $user_id);
            $data['userWalkinData'] = $this->Supermodel->singleUserWalkinData($where);
            $data['f_p'] = $this->Supermodel->getFacebookP($user_id);
            $data['t_p'] = $this->Supermodel->getTwitterP($user_id);
            $data['w_p'] = $this->Supermodel->getWalkinP($user_id);

            // $data['total_walkins'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id));
            // if ($data['total_walkins']) {
            //      $data['total_w'] = count($data['total_walkins']);
            // }

            $data['total_walkins'] = $this->Supermodel->userWalkinData_Count($user_id);
            $data['total_w'] = $data['total_walkins'][0]->walkin_count;

            $data["point"] = $this->Supermodel->select_data("T_SocialSharePoint", array('user_id'=>$user_id));
            
            $data['selected_user_detail'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));
            $data['total_spent'] = $this->Supermodel->getUserWalkinSpent($user_id);
            $data['total_points'] = $data['f_p'][0]->facebook_p + $data['t_p'][0]->twitter_p + $data['w_p'][0]->walkin_p;
            $data['s_date'] = date('Y-m-d');
            $this->load->view('superadmin/view_userReport.php', $data);
        }
    }

    function dateRangeUserReport() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $start_date = $_GET['startdate'];
        $end_date = $_GET['enddate'];

        $user_id = $this->uri->segment(3);
        $data['walkin'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'walkin'));
        $data['share'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'share'));
        $data['favorite'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'favorite'));
        $data['rating'] = $this->Supermodel->select_data('T_ActivityLog', array('user_id' => $user_id, 'activity_type' => 'rating'));

        $data['twitter'] = $this->Supermodel->getTwitterPoints_Filter($user_id,$start_date,$end_date);
        $data['facebook'] = $this->Supermodel->getFacebookPoints_Filter($user_id,$start_date,$end_date);
        $data['user_points'] = $this->Supermodel->select_data('T_UserPoint', array('user_id' => $user_id));
        $data['f_p'] = $this->Supermodel->getFacebookP_Filter($user_id,$start_date,$end_date);
        $data['t_p'] = $this->Supermodel->getTwitterP_Filter($user_id,$start_date,$end_date);
        $data['w_p'] = $this->Supermodel->getWalkinP_Filter($user_id,$start_date,$end_date);

        // $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity', array('user_id' => $user_id));
        // $data['total_w'] = count($data['total_walkins']);
        $data['total_walkins'] = $this->Supermodel->userWalkinData_Count_Filter($user_id);
        $data['total_w'] = $data['total_walkins'][0]->walkin_count;

        $data["point"] = $this->Supermodel->userShare_Point_Filter($user_id,$start_date,$end_date);

        $data['total_spent'] = $this->Supermodel->getUserWalkinSpent_Filter($user_id,$start_date,$end_date);
        $data['selected_user_detail'] = $this->Supermodel->select_data('T_User', array('user_id' => $user_id));
        $data['total_points'] = $data['f_p'][0]->facebook_p + $data['t_p'][0]->twitter_p + $data['w_p'][0]->walkin_p;
        $data['user_report'] = $this->Supermodel->getDataofRangeSelectedUserReport("T_ActivityLog", "activity_date", $_GET['startdate'], $_GET['enddate'], "activity_log_id", $user_id);
        $data['super_email'] = $this->session->userdata('super_email');

        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];

        $this->load->view('superadmin/view_userReport.php', $data);
    }

    function offerUpdateRequest() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        $data['total_users'] = $this->Supermodel->select_data('T_User');
        $data['total_store'] = $this->Supermodel->select_data('T_StoreOffer', array('offer_status' => '2'));
        $data['active_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 1));
        $data['suspend_stores'] = $this->Supermodel->select_data('T_Store', array('status_id' => 7));
        $data['super_email'] = $this->session->userdata('super_email');

        $data['total_walkins'] = $this->Supermodel->select_data('T_BeaconActivity');
        $data['s_date'] = '2017-01-01';
        $data['e_date'] = '2017-12-01';
        $this->load->view('superadmin/offer_update_request', $data);
    }

    function changePaytmRedeemptionStatus() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        // $user = $this->uri->segment(3);
        // $status = $this->uri->segment(4);
        // $request = $this->uri->segment(5);
        //     // $rubs = $this->uri->segment(6);
        // $subject = $this->uri->segment(7);
        // $body = $this->uri->segment(8);        
        $user = $this->input->post('user_id');
        $status = $this->input->post('status');
        $request = $this->input->post('request');
        //$rubs = $this->input->post('rubs');
        $subject = $this->input->post('subject');
        $body = $this->input->post('desc');
        // echo "$user <br> $status <br> $request <br> $rubs <br> $subject <br> $body";
        // die();
        $statusChange = $this->Supermodel->update('T_PaytmRedeemRequests', array('id' => $request, 'user_id' => $user), array('request_status' => $status));
        if ($status == 10) {
            $rub_p = $this->Supermodel->select_data('T_PaytmRedeemRequests', array('id' => $request));
            $user_point = $this->Supermodel->select_data('T_UserPoint', array('user_id' => $user));
            $prev_p = $user_point[0]->paytm_redeem_rubs;
            $add_to_points = $this->Supermodel->update('T_UserPoint', array(
                "user_id" => $user
                    ), array(
                "paytm_redeem_rubs" => $prev_p + $rub_p[0]->no_of_rubs
            ));

            $data['users'] = $this->Supermodel->select_data('T_User', array('user_id' => $user));

           

            $activity_data = [
                                "user_id" => $user,
                                "activity_name" => "convert to paytm",
                                "activity_type" => "convert_to_paytm",
                                "activity_date" => date("Y-m-d"),
                                "activity_time" => date("H:i:s"),
                                "store_offer_id" => $request,
                                "store_id" => 0
                            ];

            $activity_insert = $this->Supermodel->insert('T_ActivityLog', $activity_data);             
            

            //$body="Your paytm redemption process is successfully done.";
            //$subject = 'Your Paytm redemption status';

            $to_email = $data['users'][0]->email;
            // #async
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);

            $this->session->set_flashdata('paytm_redeemption_status', '<div class="alert alert-success">
              <strong>User paytm redemption request accepted successfully.</strong>
              </div>');
            redirect("superadmin/paytmRedeemRequests");
        }

        if ($status == 8) {
            $data['users'] = $this->Supermodel->select_data('T_User', array('user_id' => $user));
            //$body="Your paytm redemption request is rejected because of some reason";
            //$subject = 'You Paytm redemption status';
            $to_email = $data['users'][0]->email;
            $headers = '';
            // #async
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);

            $this->session->set_flashdata('paytm_redeemption_status', '<div class="alert alert-success">
              <strong>User paytm redemption request rejected successfully.</strong>
              </div>');
            redirect("superadmin/paytmRedeemRequests");
        }
    }

    function changeCouponRedeemptionStatus() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        // $user = $this->uri->segment(3);
        // $status = $this->uri->segment(4);
        // $coupon = $this->uri->segment(5);
        // $claim = $this->uri->segment(6);
        $user = $this->input->post('user_id');
        $status = $this->input->post('status');
        $claim = $this->input->post('claim');
        //$rubs = $this->input->post('rubs');
        $coupon = $this->input->post('coupon');
        $subject = $this->input->post('subject');
        $body = $this->input->post('desc');
        

        $statusChange = $this->Supermodel->update('T_CouponClaims', array('user_id' => $user, 'coupon_id' => $coupon, 'id' => $claim), array('request_status' => $status));
        if ($status == 10) {        
            
            $rub_p = $this->Supermodel->select_data('T_CouponClaims', array('id' => $claim));
            $user_point = $this->Supermodel->select_data('T_UserPoint', array('user_id' => $user));
            $prev_p = $user_point[0]->coupon_redeem_rubs;

            $add_to_points = $this->Supermodel->update('T_UserPoint', array(
                "user_id" => $user
                    ), array(
                "coupon_redeem_rubs" => $prev_p + $rub_p[0]->claim_for_rubs
            ));

            
            $res_store =  $this->Supermodel->getStoreIdByCouponId($coupon);    
            $activity_data = [
                                "user_id" => $user,
                                "activity_name" => $res_store[0]->coupon_title,
                                "activity_type" => "redeem_coupon",
                                "activity_date" => date("Y-m-d"),
                                "activity_time" => date("H:i:s"),
                                "store_offer_id" => $coupon,
                                "store_id" => 0
                            ];

            $activity_insert = $this->Supermodel->insert('T_ActivityLog', $activity_data);             
            

            $data['users'] = $this->Supermodel->select_data('T_User', array('user_id' => $user));


            // $body="Your coupon redemption process is successfully done.";
            // $subject = 'Your coupon redemption status';
            $to_email = $data['users'][0]->email;
            // #async
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);

            $this->session->set_flashdata('coupon_redeemption_status', '<div class="alert alert-success">
              <strong>Your coupon redemption request has been accepted.</strong>
              </div>');
            redirect("superadmin/couponRedeemRequests");
        }

        if ($status == 8) {
            $data['users'] = $this->Supermodel->select_data('T_User', array('user_id' => $user));
            $body = "Your coupon redemption request is rejected because of some reason";
            // $subject = 'You coupon redemption status';
            // $to_email = $data['users'][0]->email;
            // #async
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);
            $this->session->set_flashdata('coupon_redeemption_status', '<div class="alert alert-success">
                <strong>Your coupon redemption request has been rejected.</strong>
                </div>');
            redirect("superadmin/couponRedeemRequests");
        }
    }

    function changePaymentStatus() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $store = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        $payment = $this->uri->segment(5);
        $points = $this->uri->segment(6);

        $statusChange = $this->Supermodel->update('T_Payment', array('payment_id' => $payment), array('payment_status' => $status));
        if ($status == 10) {
            $data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));
            $prev_p = $data['store'][0]->store_point;

            $change_point = array(
                'store_point' => $prev_p + $points
            );

            $update_points = $this->Supermodel->update('T_Store', array('store_id' => $store), $change_point);
            $body = "Your request of purchasing points has been approved.";
            $subject = 'Purchasing points status';
            $to_email = $data['store'][0]->store_email;
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);
            $this->session->set_flashdata('payment_status', '<div class="alert alert-success">
              <strong>Store purchasing request accepted successfully.</strong>
              </div>');
        }

        if ($status == 8) {
            $data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));
            $body = "Your request for purchasing points is rejected by super admin";
            $subject = 'Purchasing points status';
            $to_email = $data['store'][0]->store_email;
            // #async
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);
            $this->session->set_flashdata('payment_status', '<div class="alert alert-success">
              <strong>Store purchasing request rejected successfully.</strong>
              </div>');
        }
    }

    function new_offer_requests() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($this->uri->segment(3)) {
            $data['new_offer'] = $this->Supermodel->offer_requests();
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');

            $this->session->set_flashdata('refresh_message_offer_request', '<div class="alert alert-success">
              <strong> Refresh successful.</strong>
              </div>');
            redirect("superadmin/new_offer_requests");
        } else {
            $data['new_offer'] = $this->Supermodel->offer_requests();
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');
            $this->load->view('superadmin/new_offer_requests', $data);
        }
    }

    function changeOfferStatus() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $offer = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        $store = $this->uri->segment(5);
        $statusChange = $this->Supermodel->update('T_StoreOffer', array('store_offer_id' => $offer), array('offer_status' => $status));

        if ($status == 1) {
            $data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));
            $body = "Your offer request has been accepted by Super admin.";
            $subject = 'Offer status';
            $to_email = $data['store'][0]->store_email;
            // #async
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);
            // $this->mylibrary->do_in_background(email_send_url, $param);
            $this->session->set_flashdata('offer_status', '<div class="alert alert-success">
              <strong>Offer request accepted successfully.</strong>
              </div>');
        }

        if ($status == 8) {
            $data['store'] = $this->Supermodel->select_data('T_Store', array('store_id' => $store));
            $body = "Your offer request has been rejected by Super admin";
            $subject = 'Offer status';
            $to_email = $data['store'][0]->store_email;
            // $param = array(
            //     'email' => $to_email,
            //     'subject' => $subject,
            //     'body' => $body
            // );
            // $this->mylibrary->do_in_background(email_send_url, $param);

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);

            $this->session->set_flashdata('offer_status', '<div class="alert alert-success">
              <strong>Offer request rejected successfully.</strong>
              </div>');
        }
    }

    function dateRangeOffer() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        // $data['purchase'] = $this->Supermodel->select_data('T_Payment', array('payment_id != ' => NULL ) , array('payment_id' => 'desc'));
        $data['new_offer'] = $this->Supermodel->getDataofRangeSelectedOffer("T_StoreOffer", "publish_date", $_GET['startdate'], $_GET['enddate'], "store_offer_id");
        $data['super_email'] = $this->session->userdata('super_email');
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('superadmin/new_offer_requests', $data);
    }

    function couponRedeemRequests() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($this->uri->segment(3)) {

            $data['requests'] = $this->Supermodel->select_data('T_CouponClaims', array('coupon_id !=' => NULL), array('created_date' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');

            $this->session->set_flashdata('refresh_message6', '<div class="alert alert-success">
              <strong> Refresh successful.</strong>
              </div>');
            redirect("superadmin/couponRedeemRequests");
            // $this->load->view('superadmin/coupon_redeem_requests', $data);                
        } else {
            $data['requests'] = $this->Supermodel->select_data('T_CouponClaims', array('coupon_id !=' => NULL), array('created_date' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');
            $this->load->view('superadmin/coupon_redeem_requests', $data);
        }
    }

    function dateRangeCoupon() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['requests'] = $this->Supermodel->getDataofRangeSelectedCouponRedeem("T_CouponClaims", "claim_date", $_GET['startdate'], $_GET['enddate'], "id");
        $data['super_email'] = $this->session->userdata('super_email');
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];

        $this->load->view('superadmin/coupon_redeem_requests', $data);
    }

    function paytmRedeemRequests() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($this->uri->segment(3)) {
            $data['requests'] = $this->Supermodel->select_data('T_PaytmRedeemRequests', array('id !=' => NULL), array('id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');

            $this->session->set_flashdata('refresh_message7', '<div class="alert alert-success">
              <strong> Refresh successful.</strong>
              </div>');
            redirect("superadmin/paytmRedeemRequests");
            // $this->load->view("superadmin/paytm_redeem_requests", $data);
        } else {
            $data['requests'] = $this->Supermodel->select_data('T_PaytmRedeemRequests', array('id !=' => NULL), '',array('id' => 'desc'));
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');
            $this->load->view("superadmin/paytm_redeem_requests", $data);
        }
    }

    function dateRangePaytm() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }
        $data['requests'] = $this->Supermodel->getDataofRangeSelectedPaytm("T_PaytmRedeemRequests", "request_date", $_GET['startdate'], $_GET['enddate'], "id");
        $data['super_email'] = $this->session->userdata('super_email');
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];

        $this->load->view('superadmin/paytm_redeem_requests', $data);
    }

    function my_custom_dashboard_data() {
        $data['custom_data'] = $this->Supermodel->my_custom_dashboard_data3();
        $data['custom_data1'] = array('month' => "july", "purchase" => "300");
        $new = array_push($data['custom_data'], $data['custom_data1']);
        echo "<pre>";
        echo json_encode($data['custom_data']);
    }

    //---------------------------------------------------------------------------------------------------------------
    function view_storeofferinfo() {
        if (!$this->checkauth()) {
            return redirect('superadmin/login');
        }

        if ($this->uri->segment(3)) {
            $storeofferId = $this->uri->segment(3);
            $data['offerdetails'] = $this->Supermodel->select_data('T_StoreOffer', array('store_offer_id' => $storeofferId));
            //echo $this->db->last_query();die;
            $data['super_email'] = $this->session->userdata('super_email');
            $data['s_date'] = date('Y-m-d');

            $this->load->view('superadmin/view_storeofferinfo', $data);
        }
    }

    function check_BeaconAlreadyExist() {
        $beaconnme = $this->input->post('user_name');
        $check = $this->Supermodel->Check_BeaconAlready_Exist($beaconnme);
        if ($check) {
            echo "Beacon Name already Exist";
        } else {
            echo "";
        }
    }

    public function send_mail($to, $subject, $body, $headers = '') {
            $this->load->library('email');  

    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.zoho.in',
  'smtp_port' => 465,
  'smtp_user' => 'info@cashrub.com', // change it to yours
  'smtp_pass' => 'SagX7KCvahbQ', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

    $this->email->initialize($config);     
        // $this->load->library($config);
   $this->email->set_newline("\r\n");

    $this->email->from('info@cashrub.com', 'CashRub');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($body);
// print_r($to);
// print_r($body);
// print_r($subject);
            //Send mail 
    // return $this->email->send();
      if($this->email->send())
    {
    return true;
}else{
    print_r($this->email->print_debugger());die;
}
    }
	
	public function send_testing_email()
	{
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "smtp.zoho.in";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "info@cashrub.com"; 
		$config['smtp_pass'] = "SagX7KCvahbQ";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");  

		$ci->email->from('info@cashrub.com', 'Subhash');
		$list = array('subhash1120@gmail.com');
		$ci->email->to($list);
		$ci->email->subject('This is an email test');
		$ci->email->message('It is working. Great!');
		if($ci->email->send())
		{
			echo "sent";
		}
		else
		{
			echo "<pre>";
			print_r($ci->email->print_debugger());
			echo "Not sent";
		}
	}
	
public function terms_conditions()
{
	$type=$this->uri->segment(3);
	$data['type']=$type;
    $query=$this->db->where('type',$type)->get('terms');
    $data['terms']=$query->row();
    $this->load->view('superadmin/terms_conditions',$data);
}
public function insert_terms()
{
  //  print_r($_POST);die;
   $id =$this->input->post('id');
   $type=$this->input->post('type');
$data=['text'=>$this->input->post('terms'),'type'=>$this->input->post('type')];
   if(!empty($id)){
    
    $this->db->where('id',$id)->where('type',$type)->update('terms',$data);
   }else{
    $this->db->insert('terms',$data);
   }
   redirect('superadmin/terms_conditions/'.$type);
}

    public function beacons()
    {
           if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
        $data['beacons_list']=$this->Supermodel->beacons_list1();
         $this->load->view('superadmin/beacon_view',$data);

    }
    public function import_beacon()
    {
          $count=0;

        $fp = fopen($_FILES['files']['tmp_name'],'r') or die("<div class='alert alert-danger'>Upload csv formatted file!</div>");

        $filename=$_FILES['files']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if($ext=="csv")
        {    
        while($csv_line = fgetcsv($fp,1000024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['beacon_key'] = $csv_line[0];
                $insert_csv['uuid'] = $csv_line[5];
                $insert_csv['major_value'] = $csv_line[6];
 $insert_csv['minor_value'] = $csv_line[7];

            }
            $i++;
            $data = array(
                'beacon_key' => $insert_csv['beacon_key']  ,
                'uuid' =>  $insert_csv['uuid'],
                'major_value' =>  $insert_csv['major_value'],
                'minor_value'=>$insert_csv['minor_value'] 
               );

               $query1= $this->db->query('select beacon_key from T_Beacon where beacon_key="'.$insert_csv['beacon_key'].'"'); 
                /*$this->db->where('beacon_key',);  
                $this->db->from('T_Beacon');*/
            //    =$this->db->get();
if($query1->num_rows() > 0){
                $row=$query1->result();
                         }else{
                            $row=0;
                         }       
 //print_r($row);die;
              if(empty($row))  
            {
            $this->db->insert('T_Beacon',$data);
           }
           // $data['crane_features']=$this->db->insert('tableName', $data);
        }
        fclose($fp) or die("<div class='alert alert-danger'>Upload csv formatted file!</div>");

        echo "<div class='alert alert-success'>Data imported successfully!</div>";
       }else{
        echo "<div class='alert alert-danger'>Upload csv formatted file!</div>";
       }
    }
    public function view_assign()
    {
        //print_r($_POST);die;
        if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
        $beacon_id=$this->input->post('beacon_id');
        $beacon_name=[];
        foreach ($beacon_id as $beacon) {
            $query1= $this->db->query('select beacon_key from T_Beacon where beacon_id="'.$beacon.'"'); 
            $row=$query1->row();
       $beacon_name[]=$row->beacon_key;
        }
$query=$this->db->get('T_Store');
$data['stores']=$query->result();
        $data['beacon_name']=$beacon_name;
        $data['beacon_id']=$beacon_id;
       // print_r($data);die;
        $this->load->view('superadmin/assign_beacon',$data);
    }
    public function assign_beacon_confirm()
    {
 
    $beacon_id=$this->input->post('beacon_id');
     $beacon_key=$this->input->post('beacon_key');
      $store_id=$this->input->post('store_id');
   //print_r($beacon_id);die;
if(!empty($beacon_id))
{  
   
      foreach($beacon_id as $beacon) {
        //print_r($beacon);die;
        $data=[
                'assigned_to_store'=>$store_id
                ];
                  $query1= $this->db->query('select * from T_Beacon where beacon_id="'.$beacon.'"'); 
            $row=$query1->row();
           // print_r($row);die;
if(!empty($row)){
         $data1=['store_id'=>$store_id,
         		 'beacon_key'=>$row->beacon_key,
         		 'beacon_uuid'=>$row->uuid,
         		 'beacon_major'=>$row->major_value,
         		 'beacon_minor'=>$row->minor_value,
         		 'beacon_type'=>"cashrub_beacon",
         		 'created_date'=>date('Y-m-d H:i:s'),
         		 'last_updated_date'=>date('Y-m-d H:i:s')
         		];       
			}else{
				$data1=[];
			}
		//	print_r($data1);die;
			   $query12= $this->db->query('select * from T_Beacons where beacon_key="'.$row->beacon_key.'"'); 
            $row1=$query12->row();

			if(!empty($data1) && empty($row1))
			{	
			$this->db->insert('T_Beacons',$data1);
         }else{
         	$store=['store_id'=>$store_id];
         	$this->db->where('beacon_key',$row->beacon_key)->update('T_Beacons',$store);
         }
         $this->db->where('beacon_id',$beacon)->update('T_Beacon',$data);

 $store = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id));
 if(!empty($store)){
          $to_email = $store[0]->store_email;
        $subject = "Assign Beacon";
        $body = "
Hello ".$store[0]->store_first_name.", <br><br>
New Beacon assigned To the ".$store[0]->store_first_name." Store .<br>
Number of beacon: ".$row->beacon_key." <br>
Shop Name:".$store[0]->store_first_name."<br>
Location: ".$store[0]->store_address1."<br>
Time and Date:".date('Y-m-d h:i A')."  <br>
      In case of any doubts do visit www.cashrub.com.
 <br><br>
Thank You.

";
        // #async
        /*$param = array(
            'email' => $notify_email,
            'subject' => $subject,
            'body' => $body
        );

        $this->mylibrary->do_in_background(email_send_url, $param);*/
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
}        // print_r($this->db->last_query());die;
      }
       // print_r($beacon_id);die;
         $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-success">Beacon assigned successfully.</div>');
       redirect('superadmin/beacons');
 }
 redirect('superadmin/beacons');
    }

      public function view_unassign()
    {
        //print_r($_POST);die;
        if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
        $beacon_id=$this->input->post('beacon_id');
        $beacon_name=[];
        foreach ($beacon_id as $beacon) {
            $query1= $this->db->query('select beacon_key from T_Beacon where beacon_id="'.$beacon.'"'); 
            $row=$query1->row();
       $beacon_name[]=$row->beacon_key;
        }
$query=$this->db->get('T_Store');
$data['stores']=$query->result();
        $data['beacon_name']=$beacon_name;
        $data['beacon_id']=$beacon_id;
       // print_r($data);die;
        $this->load->view('superadmin/unassign_beacon',$data);
    }
       public function unassign_beacon_confirm()
    {
 
    $beacon_id=$this->input->post('beacon_id');
     $beacon_key=$this->input->post('beacon_key');
      $store_id=$this->input->post('store_id');
   
if(!empty($beacon_id))
{  
   
      foreach($beacon_id as $beacon) {
        //print_r($beacon);die;
        $data=[
                'assigned_to_store'=>0
                ];
                  $query1= $this->db->query('select * from T_Beacon where beacon_id="'.$beacon.'"'); 
            $row=$query1->row();

          $store = $this->Supermodel->select_data('T_Store', array('store_id' => $row->assigned_to_store));
 if(!empty($store)){
          $to_email = $store[0]->store_email;
        $subject = "Unassign Beacon";
        $body = "
Hello ".$store[0]->store_first_name.", <br><br>
".$row->beacon_key." beacon is unassigned.<br>
Number of beacon: ".$row->beacon_key." <br>
Shop Name:".$store[0]->store_first_name."<br>
Location: ".$store[0]->store_address1."<br>
Time and Date:".date('Y-m-d h:i A')."  <br>
      In case of any doubts do visit www.cashrub.com.
 <br><br>
Thank You.

";
        // #async
        /*$param = array(
            'email' => $notify_email,
            'subject' => $subject,
            'body' => $body
        );

        $this->mylibrary->do_in_background(email_send_url, $param);*/
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
        
}  


            if(!empty($row))
            {
$this->db->where('beacon_key',$row->beacon_key)->delete('T_Beacons');
         }
         $this->db->where('beacon_id',$beacon)->update('T_Beacon',$data);
        // print_r($this->db->last_query());die;

      }
       // print_r($beacon_id);die;
         $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-danger">Beacon unassigned successfully.</div>');
       redirect('superadmin/beacons');
 }
 redirect('superadmin/beacons');
    }

      public function view_single_beacon()
    {
        //print_r($_POST);die;
        if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
        $beacon_id=$this->input->post('beacon_id');
        $beacon_name=[];
      /*  foreach ($beacon_id as $beacon) {*/
            $query1= $this->db->query('select * from T_Beacon where beacon_id="'.$beacon_id.'"'); 
            $row=$query1->row();
           //  print_r($this->db->last_query());die;
       $beacon_name[]=$row->beacon_key;
       /* }*/

$query=$this->db->get('T_Store');
$data['stores']=$query->result();
        $data['beacon_name']=$beacon_name;
        $data['beacon_id']=$beacon_id;
        $data['beacon']=$row;
      //  print_r($data);die;
        $this->load->view('superadmin/view_single_beacon',$data);
    }
    public function update_beacon()
    {
              if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
    	//print_r($_POST);die;
    	    $beacon_id=$this->input->post('beacon_id');
     $beacon_key=$this->input->post('beacon_key');
      $store_id=$this->input->post('store_id');
      $unassigned=$this->input->post('unassign');



      if(!empty($unassigned)){
      $data=[
                'assigned_to_store'=>0
                ];
                  $query1= $this->db->query('select * from T_Beacon where beacon_id="'.$beacon_id.'"'); 
            $row=$query1->row();
   
   $store = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id));
 if(!empty($store)){
          $to_email = $store[0]->store_email;
        $subject = "Unassign Beacon";
        $body = "
Hello ".$store[0]->store_first_name.", <br><br>
".$beacon_id." beacon is unassigned.
Number of beacon: ".$beacon_id." <br>
Shop Name:".$store[0]->store_first_name."<br>
Location: ".$store[0]->store_address1."<br>
Time and Date:".date('Y-m-d h:i A')."  <br>
      In case of any doubts do visit www.cashrub.com.
 <br><br>
Thank You.

";
        // #async
        /*$param = array(
            'email' => $notify_email,
            'subject' => $subject,
            'body' => $body
        );

        $this->mylibrary->do_in_background(email_send_url, $param);*/
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
      //  print_r($this->email->print_debugger());die;
}  


            if(!empty($row))
            {
$this->db->where('beacon_key',$row->beacon_key)->delete('T_Beacons');
         }
                 
            }else{
           $data=[
                'assigned_to_store'=>$store_id
                ];  

                $query1= $this->db->query('select * from T_Beacon where beacon_id="'.$beacon_id.'"'); 
            $row=$query1->row();
           // print_r($row);die;
if(!empty($row)){
         $data1=['store_id'=>$store_id,
         		 'beacon_key'=>$row->beacon_key,
         		 'beacon_uuid'=>$row->uuid,
         		 'beacon_major'=>$row->major_value,
         		 'beacon_minor'=>$row->minor_value,
         		 'beacon_type'=>"cashrub_beacon",
         		 'created_date'=>date('Y-m-d H:i:s'),
         		 'last_updated_date'=>date('Y-m-d H:i:s')
         		];       
			}else{
				$data1=[];
			}
		//	print_r($data1);die;
			   $query12= $this->db->query('select * from T_Beacons where beacon_key="'.$row->beacon_key.'"'); 
            $row1=$query12->row();

			if(!empty($data1) && empty($row1))
			{	
			$this->db->insert('T_Beacons',$data1);
         }else{
         	$store=['store_id'=>$store_id];
         	$this->db->where('beacon_key',$row->beacon_key)->update('T_Beacons',$store);
         }	
          $store = $this->Supermodel->select_data('T_Store', array('store_id' => $store_id));
 if(!empty($store)){
          $to_email = $store[0]->store_email;
        $subject = "Assign Beacon";
        $body = "
Hello ".$store[0]->store_first_name.", <br><br>
New Beacon assigned To the ".$store[0]->store_first_name." Store .<br>
Number of beacon: ".$row->beacon_key." <br>
Shop Name:".$store[0]->store_first_name."<br>
Location: ".$store[0]->store_address1."<br>
Time and Date:".date('Y-m-d h:i A')."  <br>
      In case of any doubts do visit www.cashrub.com.
 <br><br>
Thank You.

";
        // #async
        /*$param = array(
            'email' => $notify_email,
            'subject' => $subject,
            'body' => $body
        );

        $this->mylibrary->do_in_background(email_send_url, $param);*/
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $sts = $this->send_mail($to_email, $subject, $body, $headers);
}  
            }
  // print_r($data);die;
if(!empty($beacon_id))
{  

         $this->db->where('beacon_id',$beacon_id)->update('T_Beacon',$data);
    }
    //print_r($this->db->last_query());die;
      $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-success">Beacon updated successfully.</div>');
     redirect('superadmin/beacons');
}
public function delete_single_beacon()
{
          if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
	   $beacon_id=$this->input->post('beacon_id');
	   if(!empty($beacon_id))
{  

      

     $query1= $this->db->query('select * from T_Beacon where beacon_id="'.$beacon_id.'"'); 
            $row=$query1->row();
            if(!empty($row))
            {
$this->db->where('beacon_key',$row->beacon_key)->delete('T_Beacons');
         }

   $this->db->where('beacon_id',$beacon_id)->delete('T_Beacon');
         echo 1;
    }else{
    	echo 0;
    }
}

public function encode_id()
{
          if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
    $length = 3;
    $randomBytes = openssl_random_pseudo_bytes($length);
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $result = '';
    for ($i = 0; $i < $length; $i++)
        $result .= $characters[ord($randomBytes[$i]) % $charactersLength];


$length = 1;
    $randomBytes = openssl_random_pseudo_bytes($length);
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $result1 = '';
    for ($i = 0; $i < $length; $i++)
        $result1 .= $characters[ord($randomBytes[$i]) % $charactersLength];

    $final=$result.$result1;
print_r(str_shuffle($final));
}
public function image_library()
{
          if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
	$index=$this->input->get('page_index');
	if(empty($this->input->get('page_index')))
	{
		$index=1;
		$data['get']=1;
	}
	$page_count=12;
	   $start    = ($index - 1) * $page_count;
     $data['categorys'] = $this->Supermodel->select_data('T_Categorys');
   $query=$this->db->get('image_library');
     $total=$query->result();
     $data['total']=ceil(count($total)/$page_count);
     $data['all_images'] = $this->Supermodel->all_image_list($start,$page_count);
   //  print_r($this->db->last_query());die;
    $this->load->view('superadmin/image_library_view',$data);
}
   //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
    }

    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }
public function upload_images()
{
          if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
 if (!empty($_FILES)) {
            //set preferences
            //file upload destination
            $upload_path = './image_library/';
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = '*';
             $config['max_size'] = '100000000';
            $image_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select an image file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'image_name' is the name of the input
                if (!$this->upload->do_upload('files')) {
                    //if file upload failed then catch the errors
                    $this->session->set_flashdata('add_cashrub_banner','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
    				redirect('superadmin/image_library');

                   // print_r($this->upload->display_errors());die;
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                   // $config['create_thumb'] = TRUE;
                    $config['width'] = 1024;
                    $config['height'] = 500;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
                }
            }
            // There were errors, we have to delete the uploaded image
            if ($is_file_error) {
                if ($image_data) {
                    $file = $upload_path . $image_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            } else {
                $data['resize_img'] = $upload_path . $image_data['file_name'];
                $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
            }
        }
        

        if(!empty($image_data['file_name']))
        {
        	$pic=$image_data['file_name'];
        }else{
        	$pic=0;
        }
        if(!empty($image_data['image_width']) && !empty($image_data['image_height']))
        {
        	$height=$image_data['image_height'];
        	$width=$image_data['image_width'];
        }else{
        	$height=0;
        	$width=0;
        }	
        $data_save=['category_id'=>$this->input->post('category'),
        			 'image_name'=>$pic,
        			 'height'=>$height,
        			 'width'=>$width,
        			 'created_date'=>date('Y-m-d H:i:s')
    				];
    				$this->db->insert('image_library',$data_save);
    				$this->session->set_flashdata('add_cashrub_banner','<div class="alert alert-success">Image was successfully uploaded to direcoty and resized!</div>');
    				redirect('superadmin/image_library');
  //  print_r($data_save);die;
}
public function delete_image()
{
	//print_r($_POST);die;
	$id=$this->input->post('image_id');
	if(!empty($id))
	{	
	  $query=$this->db->Where('id',$id)->get('image_library');
     $total=$query->row();
    //$realpath=realpath(base_url()."image_library/".$total->image_name);
$path = $_SERVER['DOCUMENT_ROOT'].'/cashrub/admin/image_library/'.$total->image_name;
/*if(unlink($path)) echo "Deleted file ";*/
unlink($path);
$this->db->where('id',$id)->delete('image_library');
   //  print_r($path);
echo 1;
 	}else{

 	}
}
public function billing()
{
 if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
          $email = $this->session->userdata('email');
         
        $data['transactions']=$this->Supermodel->payment_detail_by_store();
         
       // print_r($this->db->last_query());die;
        $this->load->view('superadmin/transaction_details_view',$data);
}
public function date_filter_for_transaction()
    {
    	 if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
                $date=$this->input->post('date');
        $date_arr=explode("-", $date);
        $start=strtotime(trim($date_arr[0])." 00:00");
        $end=strtotime(trim($date_arr[1])." 23:59");
         //  $store_id=$this->session->userdata('store_id');
//print_r($start." ".$end);die;
      $query= $this->db->query("SELECT * FROM `payment_details` WHERE created_at >=$start and created_at<= $end  ORDER BY `id` DESC");
        $data['transactions']=$query->result();
    //  print_r($this->db->last_query());die;
       // print_r();die;
         $this->load->view('date_filter_for_transaction',$data);
    }
    public function pdf()
    {
    	/* if (!$this->checkauth()) {
            return redirect('control/login');
        }*/
    	// $this->load->view('pdf');

	$id=$this->uri->segment(3);
	if(!empty($id)){
    	$query=$this->db->where('id',$id)->get('payment_details');
    	$result=$query->row();
    	$data['transaction']=$result;

    	$this->load->library('pdf');
    /*	$this->pdf->autoScriptToLang = true;
    	$this->pdf->showImageErrors = true;
$this->pdf->baseScript = 1;
$this->pdf->autoVietnamese = true;
$this->pdf->autoArabic = true;
$this->pdf->autoLangToFont = true;
/*$this->pdf->showWatermarkImage = true;*/
/*$this->pdf->SetWatermarkImage('IMageLink', 0.2, 'F');*/
$this->pdf->load_view('pdf',$data);
$this->pdf->Output();
}
    }
     public function pdf_transaction()
    {
    	 /*if (!$this->checkauth()) {
            return redirect('control/login');
        }*/
    	$id=$this->input->post('id');
    	$query=$this->db->where('id',$id)->get('payment_details');
    	$result=$query->row();
    	$data['transaction']=$result;

    	$this->load->view('pdf',$data);
    	//print_r($_POST);
    }
    public function app_slider()
    {
           if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
     $data['all_images'] = $this->Supermodel->all_sliders();
        $this->load->view('superadmin/app_slider_view',$data);
    }
    public function store_list()
    {
        if(!empty($this->input->post('offer')))
        {
            $offer=1;
        }else{
            $offer=0;
        }
        $query=$this->db->get('T_Store');
$data['stores']=$query->result();
$data['offer']=$offer;
 $this->load->view('superadmin/store_list_view',$data);
    }
     public function offer_list()
    {
        if(!empty($this->input->post('id')))
        {
            $id=$this->input->post('id');
           $query=$this->db->query("SELECT * FROM `T_StoreOffer` where store_id=$id and offer_status=1 ORDER BY `offer_status`  DESC");
           $offer_list=$query->result();
        }else{
            $offer_list=0;
        }
        $data['offer_list']=$offer_list;
 $this->load->view('superadmin/offer_list_view',$data);
    }
    public function save_slide()
    {
      //  print_r($_POST);die;
             if (!$this->checkauth()) {
           return redirect('superadmin/login');
        }
 if (!empty($_FILES)) {
            //set preferences
            //file upload destination
            $upload_path = './slides/';
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = '*';
             $config['max_size'] = '100000000';
            $image_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select an image file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'image_name' is the name of the input
                if (!$this->upload->do_upload('files')) {
                    //if file upload failed then catch the errors
                    $this->session->set_flashdata('add_cashrub_banner','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                 //   print_r($this->upload->display_errors());die;
                   redirect('superadmin/app_slider');

                   // print_r($this->upload->display_errors());die;
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                   // $config['create_thumb'] = TRUE;
                    $config['width'] = 1024;
                    $config['height'] = 500;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
                }
            }
            // There were errors, we have to delete the uploaded image
            if ($is_file_error) {
                if ($image_data) {
                    $file = $upload_path . $image_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            } else {
                $data['resize_img'] = $upload_path . $image_data['file_name'];
                $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
            }
        }
        

        if(!empty($image_data['file_name']))
        {
            $pic=$image_data['file_name'];
        }else{
            $pic=0;
        }
       
        $data_save=[
                     'slider_image'=>$pic,
                     'name_of_slider'=>$this->input->post('name_of_slider'),
                     'type'=>$this->input->post('type'),
                       'store_id'=>$this->input->post('store_id'),
                          'offer_id'=>$this->input->post('offer_id'),
                          'is_active'=>1,
                     'created_date'=>date('Y-m-d H:i:s')
                    ];
                    $this->db->insert('app_slider',$data_save);
                    $this->session->set_flashdata('add_cashrub_banner','<div class="alert alert-success">Slide inserted successfully!</div>');
                    redirect('superadmin/app_slider');
                 //   print_r($data_save);
    }
public function delete_slide()
{
    //print_r($_POST);die;
    $id=$this->input->post('image_id');
    if(!empty($id))
    {   
      $query=$this->db->Where('id',$id)->get('app_slider');
     $total=$query->row();
    //$realpath=realpath(base_url()."image_library/".$total->image_name);
$path = $_SERVER['DOCUMENT_ROOT'].'/cashrub/admin/slides/'.$total->slider_image;
/*if(unlink($path)) echo "Deleted file ";*/
unlink($path);
$this->db->where('id',$id)->delete('app_slider');
   //  print_r($path);
echo 1;
    }else{

    }
}
function sendMail()
{
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'info@cashrub.com', // change it to yours
  'smtp_pass' => 'cashrub@77', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = 'hello';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('info@cashrub.com'); // change it to yours
      $this->email->to('ashishjagtap008@gmail.com');// change it to yours
      $this->email->subject('Resume from JobsBuddy for your Job posting');
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }

}
}
