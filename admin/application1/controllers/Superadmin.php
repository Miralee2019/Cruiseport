<?php $path = TEMP_PATH; ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

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
            $body = 'Your request for store registration is rejected by superadmin.';
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
            $body = 'Your account has been suspended by super admin.';
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
        $body = "Your are blocked by the superadmin.";
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
        $from_email = "canopus.testing@gmail.com";
        $to_email = $to;
        $config['protocol'] = 'ftp';
        $config['smtp_host'] = 'ssl://ftp.linosys.in'; //change this
        $config['smtp_port'] = '21';
        $config['smtp_user'] = 'cashrub@linosys.in'; //change this
        $config['smtp_pass'] = 'cashrub@123'; //change this

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

        // for windows or localhost server.
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
        //Send mail 

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
        for ($i = 7; $i > 0; $i--) {
            $b_key2 = rand(100000, 999999);
        }

        $beacon_umique_key2 = $b_key2;
        $beacon_name = $this->input->post('beacon_name');
        $beacon_uuid = $this->input->post('beacon_uuid');
        $beacon_major = $this->input->post('beacon_major');
        $beacon_minor = $this->input->post('beacon_minor');
        $beacon_key = "beacon-" . $beacon_umique_key2;

        $chk_if_already_name = $this->Supermodel->select_data('T_Beacon', array(
            'name' => $beacon_name
        ));
        if ($chk_if_already_name) {
            $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" style="margin-right:2%;" aria-label="close">&times;</a>
                    Cashrub Beacon already exists with this name<b></b>
                    </div>');
            $data['beacon_key'] = $beacon_key;
            $data['super_email'] = $this->session->userdata('super_email');
            redirect('superadmin/addCashrubBeacons');
        } else {
            $chk_if_already = $this->Supermodel->select_data('T_Beacon', array(
                'uuid' => $beacon_uuid,
                'major_value' => $beacon_major,
                'minor_value' => $beacon_minor
            ));

            if ($chk_if_already) {
                $this->session->set_flashdata('add_cashrub_banner', '<div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" style="margin-right:2%;" aria-label="close">&times;</a>
                        Cashrub Beacon already exists with this uuid,major or minor<b></b>
                        </div>');
                $data['beacon_key'] = $beacon_key;
                $data['super_email'] = $this->session->userdata('super_email');
                redirect('superadmin/addCashrubBeacons');
            } else {
                $beacon_data = array(
                    'beacon_key' => $beacon_key,
                    'name' => $beacon_name,
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

                redirect('superadmin/addCashrubBeacons');
            }
        }
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

        $from_email = "testing.linosys@gmail.com";
        $to_email = $to;
        // for windows or localhost server.

        $config['protocol'] = 'ftp';
        $config['smtp_host'] = 'ssl://ftp.linosys.in'; //change this
        $config['smtp_port'] = '21';
        $config['smtp_user'] = 'cashrub@linosys.in'; //change this
        $config['smtp_pass'] = 'cashrub@123'; //change this
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
