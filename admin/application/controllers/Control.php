<?php error_reporting(0); ?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* define("email_send_url", "<?= $path; ?>/admin/index.php/welcome/send_mail", true);*/

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

        $this->load->helper('string');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        date_default_timezone_set("Asia/Kolkata");

        $this->load->helper('download');

        $expire = $this->checkOfferExpiryDate();
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

    function addWalkingPoint() {
        // var_dump($_POST);
        // if ($this->checkauth()) {
        //     return redirect('control/home');
        // }

        $walk = array(
            'walking_point' => $this->input->post('walk'),
        );

        $walk = $this->Adminmodel->update('T_Store', array('store_email' => $this->session->userdata('email')), $walk);

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        // var_dump($data['walk_p']);
        // redirect("control/home");

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['dashBoardOfferDetails'] = $this->Adminmodel->getFullStoreOfferDetailWithDashboard($data['details'][0]->store_id, '1');
        $data['totalW'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));
        $data['offferActives'] = $this->Adminmodel->offferActives($this->session->userdata('store_id'));
        $data['offerShares'] = $this->Adminmodel->totalSharesByOffer($this->session->userdata('store_id'));

        $data['activity'] = $this->Adminmodel->activity($this->session->userdata('store_id'));
        $data['totalUsers'] = $this->Adminmodel->totalUsers();

        $data['store_id'] = $this->session->userdata('store_id');

     $store = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
                 // print_r($store);die;
                  if(!empty($store))
                   {
                 /*   $total_rubs=$store[0]->store_point+$rubs;
                  $store_data=['store_point'=>$total_rubs];
                 $this->db->where('store_id',$store_id)->update('T_Store',$store_data);*/
               
                  $body="Hello ".$store[0]->store_first_name.", <br>
walkin points now updated successfully. <br>
In case of any doubts do visit www.cashrub.in.<br>
Thank You.";
$subject="Walkin Points Changed";
$to_email=$store[0]->store_email;

 $sts = $this->send_mail($to_email, $subject, $body, $headers);
 //print_r($this->email->print_debugger());die;
                }
        // var_dump($data['walk_p']);die;
        // $this->load->view('dashboard',$data);

        $this->session->set_flashdata('setting', '<div class="alert alert-success">
          <strong>Walkin points updated successfully.</strong>
          </div>');

        redirect("control/setting");
    }

    public function index() {
        if ($this->checkauth()) {
            return redirect('control/home');
        }
        // $this->load->view('store-register');
        redirect('control/login');
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

        // var_dump($data['otp']);die;
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

                    $this->session->set_flashdata('login_error', 'Your mobile number is successfully verified.');
                    redirect('control/login');
                } else {
                    $this->session->set_flashdata('otp_error', 'OTP code is invalid.');
                    redirect('control/verifyOtp?store_id=' . $data['otp'][0]->store_id);
                }
            } else {
                $this->session->set_flashdata('login_error', 'Mobile number is already verified.');
                redirect('control/login');
            }
        }
    }

    function home() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['dashBoardOfferDetails'] = $this->Adminmodel->getFullStoreOfferDetailWithDashboard($data['details'][0]->store_id, '1');
        $data['totalW'] = $this->Adminmodel->totalWalkins($this->session->userdata('store_id'));

        $data['offferActives'] = $this->Adminmodel->offferActives($this->session->userdata('store_id'));

        $data['offerShares'] = $this->Adminmodel->totalSharesByOfferdash($this->session->userdata('store_id'));

        $data['activity'] = $this->Adminmodel->activity($this->session->userdata('store_id'));

       // $data['totalUsers'] = $this->Adminmodel->totalUsers();
          $data['totalUsers'] = $this->Adminmodel->totalWalkins1($this->session->userdata('store_id'));

        $data['store_id'] = $this->session->userdata('store_id');

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));

        // $data['store_activity'] = $this->Adminmodel->select_data('T_ActivityLog',array('store_id' => $this->session->userdata('store_id')),array('created_date' => 'desc'));
        // $data['store_activity'] = $this->Adminmodel->select_data('T_ActivityLog', array('store_id' => $this->session->userdata('store_id'), 'activity_type' => 'share'), array('created_date' => 'desc'));
        // $data['offer_shares'] = $this->Adminmodel->getTotalOfferShares($this->session->userdata('store_id'));

        $data['store_activity'] = $this->Adminmodel->getTotalOfferActivity1($this->session->userdata('store_id'));
        // var_dump($data['store_activity']);die;
        $this->load->view('dashboard', $data);
    }

    function callget() {
        $maintain_id = $this->db->select('store_id')->order_by('store_id', 'desc')->limit(1)->get('T_Store')->row('store_id');
        $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $maintain_id));

        var_dump($data['store'][0]->store_logo);
    }

    function new_store_register() {
//print_r($_FILES);die;
        if (!empty($_FILES)) {
           /* $tempFile = $_FILES['files']['tmp_name'];
            $fileName = $_FILES['files']['name'];
            $filetype = $_FILES['files']['type'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName;
            $logo = array(
                'store_logo' => $fileName
            );
//print_r($logo);die;
          //  $this->Adminmodel->insert('T_Store', $logo);

            move_uploaded_file($tempFile, $targetFile);*/
                 $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['upload_path']=getcwd() . '/uploads/';
   
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('files')) {
         print_r($this->upload->display_errors());die;
    } else {
$pic=$this->upload->data()['file_name'];
       //  print_r(array('upload_data' =>$pic ));
    }
    if(empty($pic))
    {
        $pic=0;
    }
     /*  $store_logo = array(
                'temp_logo' => $pic
            );*/
          $logo = array(
                'store_logo' => $pic
            );
        }

        if (!empty($_POST)) {
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
                //     'field' => 'state',
                //     'label' => 'State',
                //     'rules' => 'required',
                //     'errors' => array(
                //         'required' => 'State field is required.',
                //     ),
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
                //     'field' => 'catagory',
                //     'label' => 'Category',
                //     'rules' => 'required',
                //     'errors' => array(
                //         'required' => 'Category field is required.',
                //     ),
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
    $geocode1 = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='
                . $this->input->post('latitude') . ',' .$this->input->post('longitude') . '&sensor=false&key=AIzaSyCCcoHZT-PJIB64n5Bw70s4SkNB1lr7naQ');
         //   $geocode = array();
            $output1 = json_decode($geocode1);

            // SUBODH :: below is a temporary fix. Needs to remove when robust fix found
           // $addr1 = empty($output1->results[0]->formatted_address) ? 'Bavdhan, Pune, Maharashtra 411021, India': $output->results[0]->formatted_address;

           foreach ($output1->results[0]->address_components as $address_components) {
  if($address_components->types[0] == 'administrative_area_level_2')
  {
    $city = $address_components->long_name;
  }
  if($address_components->types[0] == 'political')
  {
    $area = $address_components->long_name;
  }
  } 
  $addr=$area.', '.$city;
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {

                $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                $this->load->view('store-register', $data);
            } else {

                $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->input->post('email')));
              //  $data['user'] = $this->Adminmodel->select_data('T_User', array('email' => $this->input->post('email')));
                $data['phone'] = $this->Adminmodel->select_data('T_Store', array('store_mobile_no' => $this->input->post('phone')));
             //   $email_user = $this->Adminmodel->select_data('T_User', array('email' => $this->input->post('email')));
                if ($data['store']) {
                    $this->session->set_flashdata('register_error', 'Email already exists');
                    $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                    $this->load->view('store-register', $data);
                } /*elseif ($data['user']) {
                    $this->session->set_flashdata('register_error', 'Email already exists');
                    $data['user'] = $this->Adminmodel->select_data('T_Categorys');
                    $this->load->view('store-register', $data);
                }*/ elseif ($data['phone']) {
                    $this->session->set_flashdata('register_error', 'Phone number already exists');
                    $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                    $this->load->view('store-register', $data);
                }/* elseif ($email_user) {

                    $this->session->set_flashdata('register_error', 'Email already exists');
                    $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                    $this->load->view('store-register', $data);
                }*/ else {

                    $maintain_id = $this->db->select('store_id')->order_by('store_id', 'desc')->limit(1)->get('T_Store')->row('store_id');
                    $data['store_old'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $maintain_id));

                 //   $logo = $data['store_old'][0]->store_logo;

                    // var_dump($data['store'][0]->store_email);die;

                    if (!empty($data['store_old'][0]->store_email)) {

                        $insertArr = array(
                            'store_email' => $this->input->post('email'),
                            'store_password' => md5($this->input->post('password')),
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
                            'store_logo'=>$logo['store_logo'],
                            'temp_logo'=>$logo['store_logo'],
                            'store_point' => "3000",
                            'walking_point' => "10",
                            'reg_date' => date("Y-m-d"),
                            'reg_time' => date("H:i:s"),
                            'store_first_name' => $this->input->post('business_name'),
                             'area_location'=>$addr
                        );
                        // $res = $this->Adminmodel->update('T_Store', array('store_id' => $maintain_id), $insertArr);

                        $insert_id = $this->Adminmodel->insert('T_Store', $insertArr);

                        $email = $this->input->post('email');

                        $body = " <b>'" . $email . "'</b> has registered recently on cashrub please
                        approve or reject the store registration";
                        $subject = 'New store register request';
                        $to_email = "info@cashrub.com";
                        // $to_email = "designcode546@gmail.com"; ----------- Old email

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        $sts = $this->send_mail($to_email, $subject, $body, $headers);

                        $this->session->set_flashdata('otp_error', 'Your verification code has been sent to your registered phone number.');

                        $this->session->set_flashdata('login_error', 'Your registration is successful, we will send mail to store admin once it has been approved by the Superadmin.');
                        redirect('control/login');
                    } else {

                      /*  if (!empty($logo)) {

                            $insertArr = array(
                                'store_email' => $this->input->post('email'),
                                'store_password' => md5($this->input->post('password')),
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
                                   'store_logo'=>$logo['store_logo'],
                            'temp_logo'=>$logo['store_logo'],
                                'store_point' => "3000",
                                'walking_point' => "10",
                                'reg_date' => date("Y-m-d"),
                                'reg_time' => date("H:i:s"),
                                'store_first_name' => $this->input->post('business_name'),
                              /*  'store_logo' => $logo,
                                 'area_location'=>$addr
                            );

                            $res = $this->Adminmodel->update('T_Store', array('store_id' => $maintain_id), $insertArr);
                            $email = $this->input->post('email');

                            $body = " <b>'" . $email . "'</b> has registered recently on cashrub please
                            approve or reject the store registration";
                            $subject = 'New store register request';
                            $to_email = "info@cashrub.com";
                            // $to_email = "designcode546@gmail.com"; ----------- Old email

                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            $sts = $this->send_mail($to_email, $subject, $body, $headers);

                            $this->session->set_flashdata('login_error', 'Your registration is successful, we will send mail to store admin once it has been approved by the Superadmin.');
                            redirect('control/login');
                        } else {*/

                            $insertArr = array(
                                'store_email' => $this->input->post('email'),
                                'store_password' => md5($this->input->post('password')),
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
                                   'store_logo'=>$logo['store_logo'],
                            'temp_logo'=>$logo['store_logo'],  
                                'store_first_name' => $this->input->post('business_name'),
                                 'area_location'=>$addr
                            );

                            $res = $this->Adminmodel->insert('T_Store', $insertArr);
                            $email = $this->input->post('email');

                            $body = " <b>'" . $email . "'</b> has registered recently on cashrub please
                            approve or reject the store registration";
                            $subject = 'New store register request';
                            $to_email = "info@cashrub.com";
                            // $to_email = "designcode546@gmail.com"; ----------- Old email

                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            $sts = $this->send_mail($to_email, $subject, $body, $headers);

                            $this->session->set_flashdata('login_error', 'Your registeration is successful we have sent a mail to the admin for approval.');
                            redirect('control/login');
                       /* }*/
                    }
                }
            }
        } else {
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');
            $this->load->view('store-register', $data);
        }
    }

    function login() {
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
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('login');
            } else {
                $email = $this->input->post("username");
                $password = md5($this->input->post("password"));

                $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email, 'store_password' => $password));

                if ($data['store']) {

                    $email_status = $data['store'][0]->is_email_verify;
                    $mobile_status = $data['store'][0]->is_mobile_verify;
                    $admin_approve = $data['store'][0]->is_admin_approved;
                    $status_id = $data['store'][0]->status_id;

                    if ($status_id == 7) {
                        $this->session->set_flashdata('login_error', 'Your account is suspended by superadmin');
                        redirect('control/login');
                    }

                    if ($status_id == 8) {
                        $this->session->set_flashdata('login_error', 'Your registration request is reject by the superadmin');
                        redirect('control/login');
                    } elseif ($admin_approve == 0) {
                        $this->session->set_flashdata('login_error', 'Your registration request is waiting for admin approval');
                        redirect('control/login');
                    } elseif ($email_status == 0) {
                        $this->session->set_flashdata('login_error', 'Please verify your email address before login.');
                        redirect('control/login');
                    } elseif ($mobile_status == 0) {
                        $this->session->set_flashdata('otp_error', 'Please verify your mobile number before login.');
                        redirect('control/verifyOtp?store_id=' . $data['store'][0]->store_id);
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
                        $data['offferActives'] = $this->Adminmodel->offferActives($this->session->userdata('store_id'));
                        $data['offerShares'] = $this->Adminmodel->totalSharesByOffer($this->session->userdata('store_id'));

                        $data['activity'] = $this->Adminmodel->activity($this->session->userdata('store_id'));
                        $data['totalUsers'] = $this->Adminmodel->totalUsers();

                        $data['store_id'] = $this->session->userdata('store_id');

                        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

                        $data['store_activity'] = $this->Adminmodel->select_data('T_ActivityLog', array('store_id' => $this->session->userdata('store_id')));

                        $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));


 $store = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
                 // print_r($store);die;
                  if(!empty($store))
                   {
                   	if($store[0]->store_point<=200)
               {
                  $body="Hello ".$store[0]->store_first_name.", <br>
               
insufficient balance. please recharge to keep offers active. <br>
In case of any doubts do visit www.cashrub.in.<br>
 <br>
Thank You.";
$subject="Insufficient balance!";
$to_email=$store[0]->store_email;

 $sts = $this->send_mail($to_email, $subject, $body, $headers);
 //print_r($this->email->print_debugger());die;
    }
                }
// var_dump($data['totalUsers']);
                        redirect('control/home');
                        //$this->load->view('dashboard', $data);
                    }

                    //conditions
                } else {

                    $this->session->set_flashdata('login_error', 'Email ID or Password you have entered is incorrect');
                    $this->load->view('login');
                }
            }
        } else {
            $this->load->view('login');
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
  'wordwrap' => TRUE,
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
    if($this->email->send())
    {
    return true;
}else{
	print_r($this->email->print_debugger());
}

        //Send mail
        // return $this->email->send();
    }

    function editAccountSetting() {
        // var_dump($_POST);

        if (!$this->checkauth()) {
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

        if ($this->form_validation->run() == FALSE) {
            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')));

            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $this->load->view('setting', $data);
        } else {

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
    function editProfile() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        // var_dump($_POST);
//print_r($_FILES);die;

        if (!empty($_FILES)) {

             $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['upload_path']=getcwd() . '/uploads/';
   
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('file')) {
         print_r($this->upload->display_errors());die;
    } else {
$pic=$this->upload->data()['file_name'];
       //  print_r(array('upload_data' =>$pic ));
    }
    if(empty($pic))
    {
        $pic=0;
    }
       $store_logo = array(
                'temp_logo' => $pic
            );
       $res = $this->Adminmodel->update('T_Store', array('store_email' => $this->session->userdata('email')), $store_logo);
         // print_r('hii');die;
            
            // header("Refresh:0");
            // redirect('control/editProfile');
            // echo "<meta http-equiv=\"refresh\" content=\"0;URL=upload.php\">";
        }else{
           // print_r('hii');die;
        }


        if (!empty($_POST)) {

            $temp_logo = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

              $geocode1 = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='
                . $this->input->post('latitude') . ',' .$this->input->post('longitude') . '&sensor=false&key=AIzaSyCCcoHZT-PJIB64n5Bw70s4SkNB1lr7naQ');
         //   $geocode = array();
            $output1 = json_decode($geocode1);

            if(!empty($temp_logo))
            {
    $pic=$temp_logo[0]->temp_logo;
            }else{
                $pic=$this->input->post('image_file');
            }

            // SUBODH :: below is a temporary fix. Needs to remove when robust fix found
           // $addr1 = empty($output1->results[0]->formatted_address) ? 'Bavdhan, Pune, Maharashtra 411021, India': $output->results[0]->formatted_address;

           foreach ($output1->results[0]->address_components as $address_components) {
  if($address_components->types[0] == 'administrative_area_level_2')
  {
    $city = $address_components->long_name;
  }
  if($address_components->types[0] == 'political')
  {
    $area = $address_components->long_name;
  }
  } 
  $addr=$area.', '.$city;
  //print_r($addr);die;

            $updateProfileData = array(
                'store_email' => $this->input->post('email'),
            /*    'store_password' => $this->input->post('password'),*/
                'store_first_name' => $this->input->post('business_name'),
                'category' => $this->input->post('category'),
                'store_mobile_no' => $this->input->post('mobile_number'),
                'store_open_hours' => $this->input->post('open_hours'),
                'store_close_hours' => $this->input->post('close_hours'),
                'store_address1' => $this->input->post('store_address1'),
                'store_address2' => $this->input->post('store_address2'),
                'store_logo' => $pic,
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'store_latitude' => $this->input->post('latitude'),
                'store_longitude' => $this->input->post('longitude'),
                'store_description' => $this->input->post('description'),
                'area_location'=>$addr
            );

            // check if otp verification process
            $data['alter_mob'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $this->session->userdata('store_id')));

            if ($this->input->post('mobile_number_otp')) {

                // $data['alter_mob'] = $this->Adminmodel->select_data('T_Store', array('store_id' => $this->session->userdata('store_id')));

                if ($data['alter_mob'][0]->otp_code == $this->input->post('mobile_number_otp')) {

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
                    $sts = $this->send_mail($to_email, $subject, $body, $headers);
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

                if ($data['store_mob'][0]->store_mobile_no == $this->input->post('mobile_number')) {
                    //$paswd=$this->input->post('password');
                  /*  if ($data['store_mob'][0]->store_password == md5($this->input->post('password'))) {*/

                        $update_data = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateProfileData);

                        $email_s = $this->input->post('email');
                        $body = "Your profile has been updated successfully.";
                        $subject = 'Profile Updated';
                        $to_email = $email_s;
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $sts = $this->send_mail($to_email, $subject, $body, $headers);

                        $this->session->set_flashdata('message', '<div class="alert alert-success">
                          <strong>your profile has been updated successfully.</strong>
                          </div>');

                        redirect('control/profile');
                /*    } else {

                        $update_data = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), $updateProfileData);

                        //

                        $email_s = $this->input->post('email');
                        $body = "Your password has been updated successfully.";
                        $subject = 'Profile Updated';
                        $to_email = $email_s;
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $sts = $this->send_mail($to_email, $subject, $body, $headers);

                        //

                        $this->session->set_flashdata('login_error2', 'Your password has been updated successfully. Please login.');

                        $this->session->sess_destroy();
                        $this->load->view("login");

                        // $this->session->set_flashdata('message', '<div class="alert alert-success">
                        //      <strong>your profile has been updated successfully.</strong>
                        //    </div>');
                        // redirect('control/profile');
                        // redirect('control/logout');
                    }*/
                    // if not same number in request
                } else {

                    $data['number_check'] = $this->Adminmodel->select_data('T_Store', array('store_mobile_no' => $this->input->post('mobile_number')));

                    // check if number is used by other store

                    if ($data['number_check']) {

                        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                          <strong>Mobile number is already registered with the other store please use different number.</strong>
                          </div>');

                        redirect('control/profile');

                        // do if enter number is not same as other
                    } else {

                        // sending otp

                        for ($i = 5; $i > 0; $i--) {
                            $resendotp = rand(1000, 9999);
                        }

                        $resendotp = $resendotp;
                        $matchresend = $resendotp;

                        $done = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), array('otp_code' => $matchresend));

                        $post = file_get_contents("https://control.msg91.com/api/sendhttp.php?authkey=151244A0M4jedLtf590b0ff2&mobiles=+91" . $this->input->post('mobile_number') . "&message=Your+OTP+is " . $matchresend . "&sender=ABCDEF&route=4&country=0");

                        // end sending otp
                        // update mobile number

                        $done = $this->Adminmodel->update('T_Store', array('store_email' => $this->input->post('email')), array('store_alternet_contact_no' => $this->input->post('mobile_number')));
                        $email = $this->session->userdata('email');
                        $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
                        $data['store'] = $this->Adminmodel->select_data('T_Categorys');
                        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
                        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

                        $this->load->view('phone_otp', $data);
                    }
                }
            }
        }
    }

    function phone_otp() {
        $email = $this->session->userdata('email');
        $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
        $data['store'] = $this->Adminmodel->select_data('T_Categorys');

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $this->load->view('phone_otp', $data);
    }

    function profile() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $email = $this->session->userdata('email');
        $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
        $data['store'] = $this->Adminmodel->select_data('T_Categorys');

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $this->load->view('profile', $data);
    }
 private function handle_error($err) {
        $this->error .= $err . "rn";
    }

    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }
    function addOffer() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $data['store_points_chk'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        // var_dump($data['store_points_chk'][0]->store_point);die;
 $allOfferCount = $this->Adminmodel->allOfferCount( $this->session->userdata('store_id'));

        if ($data['store_points_chk'][0]->store_point > 200) { 

           /* if (!empty($_FILES)) {
                $tempFile = $_FILES['filenew']['tmp_name'];
                $fileName = $_FILES['filenew']['name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $fileName;

                $file_size = $_FILES['filenew']['size'];
                if ($file_size < 2000000) {
                    move_uploaded_file($tempFile, $targetFile);
                }
            }*/
            //print_r($_FILES);die;
             if (!empty($_FILES)) {
            //set preferences
            //file upload destination
            $upload_path = './uploads/';
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
                if (!$this->upload->do_upload('filenew')) {
                    //if file upload failed then catch the errors
                    $this->session->set_flashdata('add_cashrub_banner','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                 //   print_r($this->upload->display_errors());die;
                    redirect('control/addOffer');

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
//print_r($pic);die;
            if (!empty($_POST)) {
                $available_points=($data['store_points_chk'][0]->store_point-200)-$allOfferCount->total;
               // print_r($available_points);die;
                if($available_points>=$this->input->post('maximum_point')){
                $filename = $_FILES['filenew']['name'];

                $terms = array(
                    'text' => $this->input->post('offer_terms'),
                );

                $offer_term_condition_id = $this->Adminmodel->insert('T_StoreOfferTermCondition', $terms);

                $originalDate = $this->input->post('offer_expiry_date');
                $newDate = date("Y-m-d", strtotime($originalDate));

                if ($newDate == '1970-01-01') {
                    $datemodify = date("Y-m-d");
                } else {
                    $datemodify = $newDate;
                }

                $data['title'] = $this->Adminmodel->select_data('T_StoreOffer', array('title' => $this->input->post('offer_title')));

                if ($data['title']) {

                    $this->session->set_flashdata('add_message', '<div class="alert alert-danger">
                      <strong>Offer with this name already exists.</strong>
                      </div>');

                    redirect('control/addOffer');
                } else {
                    $insertOfferData = array(
                        'store_id' => $this->session->userdata('store_id'),
                        'title' => $this->input->post('offer_title'),
                        'description' => $this->input->post('offer_description'),
                        'offer_image' => $pic ? $pic : $this->input->post('myfile'),
                        'expiry_date' => $datemodify,
                        'offer_term_condition_id' => $offer_term_condition_id,
                        'category_id' => $this->input->post('category'),
                        'publish_date' => date("Y-m-d"),
                        'publish_time' => date("H:i:s"),
                        'offer_visibility' => $this->input->post('offer_visibility'),
                        'maximum_point' => $this->input->post('maximum_point')
                    );
                    //print_r($insertOfferData);die;
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
                      <strong>Your offer request is sent to the superadmin for approval.</strong>
                      </div>');

                    redirect('control/viewOffer');
                }
            }else {

            $this->session->set_flashdata('message', '<div class="alert alert-success">
                <strong>Not able to add offer, you have insufficient balance.</strong>
                </div>');

            redirect('control/viewOffer');
        }
        }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-success">
                <strong>Not able to add offer, you have 0 balance.</strong>
                </div>');

            redirect('control/viewOffer');
        }
        $data['store'] = $this->Adminmodel->select_data('T_Categorys');

        // var_dump($data['store']);die;
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $this->load->view('addOffer', $data);
    }

    function viewOffer() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $data['details'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['offerDetails'] = $this->Adminmodel->getFullStoreOfferDetail($data['details'][0]->store_id);
        $data['allOfferCount'] = $this->Adminmodel->allOfferCount($data['details'][0]->store_id);
      //  print_r($this->db->last_query());die;
        // var_dump($data['offerDetails']);die;

        if (empty($data['offerDetails'])) {

            $this->session->set_flashdata('nooffer', '<div style="text-align:center;" class="alert alert-danger">
              <strong>There are no offers</strong>
              </div>');

            // redirect('control/viewOffer');
        }

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $this->load->view('viewOffer', $data);
    }

    // New changes 29 june in addBeacons API for adding the CashRub beacons.

    function addBeacons() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        if (!empty($_POST)) {

            $beacon_key_chk = $this->Adminmodel->select_data('T_Beacon', array('beacon_key' => $this->input->post('beacon_key'), 'assigned_to_store' => $this->session->userdata('store_id')));
            
            if ($beacon_key_chk != 0) {
                $beacon_status_chk = $this->Adminmodel->select_data('T_Beacon', array('beacon_key' => $this->input->post('beacon_key'), 'beacon_status' => "0"));
                if ($beacon_status_chk) {

                    $if_entrance = $this->input->post('is_entrance');

                    if ($if_entrance) {

                        $chk_if_store_already_have_one_entrance_beacon = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'is_entrance_beacon' => "1"));

                        if ($chk_if_store_already_have_one_entrance_beacon) {

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
                            $res = $this->Adminmodel->update('T_Beacon', array('beacon_key' => $this->input->post('beacon_key')), array('beacon_status' => "1"));

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
                        $res = $this->Adminmodel->update('T_Beacon', array('beacon_key' => $this->input->post('beacon_key')), array('beacon_status' => "1"));

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
            } else {
                $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                  <strong>Beacon id is wrong</strong>
                  </div>');

                redirect('control/viewBeacon');
            }
        }

        redirect('control/viewBeacon');
    }

    function viewBeacon() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        if ($this->uri->segment(3)) {
            $data['beacon'] = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id')));
            // var_dump($data['beacon']);die;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $this->session->set_flashdata('success', '<div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Refresh successful</strong>
              </div>');
            return redirect('control/viewBeacon');
        } else {

            $data['beacon'] = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id')));
            // var_dump($data['beacon']);die;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            $this->load->view('add_beacons', $data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('control/login');
    }

    function notification() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
//print_r($_POST);die;
        if (!empty($_POST)) {

           /* $insertNotification = array(
                'beacon' => $this->input->post('beacon'),
                'notification_message' => $this->input->post('notification_message')
            );

            $res = $this->Adminmodel->update('T_Beacons', array('name' => $this->input->post('beacon')), array('beacon_text' => $this->input->post('notification_message')));*/
            $post_data=['beacon_text'=>$this->input->post('notification_message'),
                        ];
             $id=$this->input->post('beacon');           
            $res= $this->db->where('id',$id)->update('T_Beacons',$post_data);

            $this->session->set_flashdata('notification', '<div style="text-align:left;" class="alert alert-success">
              <strong>Notification for beacon set successfully. </strong>
              </div>');

            redirect('control/notification');
            // var_dump($res);die;
        }

        $data['allBeacona'] = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id')));
       // print_r($this->db->last_query());die;
        // var_dump($data['allBeacona']);die;
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $this->load->view('notification', $data);
    }

    function deleteBeacon($Id) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $del_data = $this->Adminmodel->delete('T_Beacons', array('beacon_key' => $Id));
        $del_data2 = $this->Adminmodel->delete('T_AssignBeacon', array('beacon_name' => $Id));
        redirect('control/viewBeacon');
    }

    function removeOffer($store_offer_id, $offer_terms) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_terms));

        $social = $this->Adminmodel->delete('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id));

        $del_data = $this->Adminmodel->delete('T_StoreOffer', array('store_offer_id' => $store_offer_id));

        redirect('control/addOffer');
    }

    function removeOfferNew($store_offer_id) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        // $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_terms ));
        $status_change_to_remove = $this->Adminmodel->update('T_StoreOffer', array('store_offer_id' => $store_offer_id), array('offer_status' => "11"));
        // $social = $this->Adminmodel->delete('T_StoreOfferSocialPoint', array('store_offer_id' => $store_offer_id ));
        // $data['store'] = $this->Adminmodel->select_data('T_StoreOffer' ,array('store_offer_id' => $store_offer_id));
        // $terms = $this->Adminmodel->delete('T_StoreOfferTermCondition', array('offer_term_condition_id' => $data['store'][0]->offer_term_condition_id ));
        // $del_data = $this->Adminmodel->delete('T_StoreOffer', array('store_offer_id' => $store_offer_id ));
        $this->session->set_flashdata('message', '<div class="alert alert-success">
          <strong>Offer removed successfully.</strong>
          </div>');
    }

    function removePayment($payment_id) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $payment = $this->Adminmodel->delete('T_Payment', array('payment_id' => $payment_id));

        $this->session->set_flashdata('setting', '<div class="alert alert-success">
          <strong>Payment detail deleted successfully.</strong>
          </div>');

        // redirect('control/setting');
    }

    function editOffer($store_offer_id) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
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

            // var_dump($this->input->post('category'));die;

            $filename = $_FILES['filenew']['name'];

            $terms = array(
                'text' => $this->input->post('offer_terms')
            );

            $data['store'] = $this->Adminmodel->select_data('T_StoreOffer', array('store_offer_id' => $store_offer_id));
       $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
//print_r($data['dash']);die;
            $offer_term_condition_id = $data['store'][0]->offer_term_condition_id;
            $res = $this->Adminmodel->update('T_StoreOfferTermCondition', array('offer_term_condition_id' => $offer_term_condition_id), $terms);

            $originalDate = $this->input->post('offer_expiry_date');
            $newDate = date("Y-m-d", strtotime($originalDate));

            // $datemodify =  if($newDate == '1970-01-01') { echo date("Y-m-d"); } else { echo $newDate; };

            if ($newDate == '1970-01-01') {
                $datemodify = date("Y-m-d");
            } else {
                $datemodify = $newDate;
            }
             $allOfferCount = $this->Adminmodel->allOfferCount( $this->session->userdata('store_id'));
         $available_points=($data['dash'][0]->store_point-200)-$allOfferCount->total;
       //  print_r($available_points);die;
             if ($data['dash'][0]->store_point > 200 && $available_points>=$this->input->post('maximum_point')) { 

            $updateOfferData = array(
                'store_id' => $this->session->userdata('store_id'),
                'title' => $this->input->post('offer_title'),
                'description' => $this->input->post('offer_description'),
                'offer_image' => $_FILES['filenew']['name'] ? $_FILES['filenew']['name'] : $this->input->post('myfile'),
                'expiry_date' => $datemodify,
                'offer_term_condition_id' => $offer_term_condition_id,
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

            //send mail to store admin
            $to_email = $this->session->userdata('email');
            $subject = 'Offer request sent.';
            $body = "Hello, your offer updation request has been sent to super admin.<br>Wait for the approval from super admin. You will get notification once done.";
        
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $sts = $this->send_mail($to_email, $subject, $body, $headers);
        


            $this->session->set_flashdata('message', '<div class="alert alert-success">
              <strong>Your offer has been updated. Wait for the approval from Super admin.</strong>
              </div>');

            redirect('control/viewOffer');
        }else{
         //   print_r($updateOfferData);die;
          $this->session->set_flashdata('message', '<div class="alert alert-danger">
              <strong>Not able to add offer, you have insufficient balance.</strong>
              </div>');
           redirect('control/viewOffer');
    }
    }

        $data['edit_offer'] = $this->Adminmodel->getFullStoreOfferDetailWithStoreId($store_offer_id);
        // var_dump($data['edit_offer']);die;
        $data['store'] = $this->Adminmodel->select_data('T_Categorys');
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

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

    function diagrameditor() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $this->load->view("draw/main/examples/editors/diagrameditor");
    }

    function setting() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        if ($this->uri->segment(3)) {
            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            // $points = $this->db->get('T_Payment');
            // $points = $this->Adminmodel->countPoints();
            // // var_dump($points);die;

            $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')), array('payment_id' => 'desc'));

            $this->session->set_flashdata('setting', '<div class="alert alert-success">
              <strong>Refresh successful</strong>
              </div>');

            redirect('control/setting');
            //$this->load->view("setting", $data);
        } else {

            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            // $points = $this->db->get('T_Payment');
            // $points = $this->Adminmodel->countPoints();
            // // var_dump($points);die;
            $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')), array('payment_id' => 'desc'));
            $this->load->view("setting", $data);
        }
        // $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
    }

    function addPoints() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $this->load->view('add_points', $data);
    }

    function payment() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $paymentData = array(
            'store_id' => $this->session->userdata('store_id'),
            'payment_name' => "", // $this->input->post('payment'),
            'payment_date' => date("Y:m:d"), //$this->input->post('payment_date'),
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

    function changeStatus() {

        if (!$this->checkauth()) {
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

    /* function shareDetails($offer_id){

      if(!$this->checkauth()){
      return redirect('control/login');
      }

      $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

      $data['shareDetails'] = $this->Adminmodel->select_data('T_SocialSharePoint', array('store_offer_id' => $offer_id), array('social_share_point_id' => 'desc' ) );

      $data['total_shares'] = $this->Adminmodel->totalSharesByOffer($offer_id);
      $data['today_shares'] = $this->Adminmodel->todayShares($offer_id);

      $totalcredits= $this->Adminmodel->getStorePoint(array('store_offer_id' => $offer_id));
      $getRemaining = $this->Adminmodel->getStoreRemainingPoint(array('store_offer_id' => $offer_id));
      foreach ($getRemaining as $value) {
      $sum=$sum+$value['points'];

      }

      $credits1=$totalcredits['maximum_point'];
      $data['remaining_credits']= $credits1 - $sum;
      $this->load->view('offerShareDeatails', $data);
  } */

  function shareDetails($offer_id) {

    if (!$this->checkauth()) {
        return redirect('control/login');
    }

    if ($this->uri->segment(4)) {

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['shareDetails'] = $this->Adminmodel->select_data('T_SocialSharePoint', array('store_offer_id' => $offer_id), array('social_share_point_id' => 'desc'));

        $data['total_shares'] = $this->Adminmodel->totalSharesByOffer($offer_id);
        $data['today_shares'] = $this->Adminmodel->todayShares($offer_id);
        $totalcredits = $this->Adminmodel->getStorePoint(array('store_offer_id' => $offer_id));

        $getRemaining = $this->Adminmodel->getStoreRemainingPoint(array('store_offer_id' => $offer_id));

        foreach ($getRemaining as $value) {
            $sum = $sum + $value['points'];
        }

        $credits1 = $totalcredits['maximum_point'];

        $data['remaining_credits'] = $credits1 - $sum;
        $this->session->set_flashdata('success', '<div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Refresh successful</strong>
          </div>');

        return redirect('control/shareDetails/' . $offer_id);
    } else {
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['shareDetails'] = $this->Adminmodel->select_data('T_SocialSharePoint', array('store_offer_id' => $offer_id), array('social_share_point_id' => 'desc'));
        $data['total_shares'] = $this->Adminmodel->totalSharesByOffer($offer_id);
        $data['today_shares'] = $this->Adminmodel->todayShares($offer_id);
        $data['offer_id_confirm'] = $offer_id;
        $totalcredits = $this->Adminmodel->getStorePoint(array('store_offer_id' => $offer_id));

        $getRemaining = $this->Adminmodel->getStoreRemainingPoint(array('store_offer_id' => $offer_id));

        foreach ($getRemaining as $value) {
            $sum = $sum + $value['points'];
        }

        $credits1 = $totalcredits['maximum_point'];
        $data['remaining_credits'] = $credits1 - $sum;

        $this->load->view('offerShareDeatails', $data);
    }
}

public function offerDateFun($offer_id) {

    if (!$this->checkauth()) {
        return redirect('control/login');
    }
        //echo $offer_id ;die();
    $start_date = $_GET['startdate'];
    $end_date = $_GET['enddate'];
    $data['offer_id_confirm'] = $offer_id;
    $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
    $store_id = $this->session->userdata('store_id');
    $data['shareDetails'] = $this->Adminmodel->getDataofRangeOffer($start_date, $end_date, $offer_id, $store_id);

    $data['total_shares'] = $this->Adminmodel->totalSharesByOffer($offer_id);
    $data['today_shares'] = $this->Adminmodel->todayShares($offer_id);
    $totalcredits = $this->Adminmodel->getStorePoint(array('store_offer_id' => $offer_id));

    $getRemaining = $this->Adminmodel->getStoreRemainingPoint(array('store_offer_id' => $offer_id));

    foreach ($getRemaining as $value) {
        $sum = $sum + $value['points'];
    }

    $credits1 = $totalcredits['maximum_point'];
    $data['remaining_credits'] = $credits1 - $sum;

    $data['s_date'] = $_GET['startdate'];
    $data['e_date'] = $_GET['enddate'];
        //  $this->session->set_flashdata('success', '<div class="alert alert-success">
        //       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        //       <strong>Refresh successful</strong>
        // </div>');
        //return redirect('control/shareDetails/'.$offer_id);
    $this->load->view('offerShareDeatails', $data);
}

function walkinReport() {

    if (!$this->checkauth()) {
        return redirect('control/login');
    }

    if ($this->uri->segment(3)) {
        $login_store_id = $this->session->userdata('store_id');
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            // $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($login_store_id);
            //$today = $this->Adminmodel->todaysInStore($this->session->userdata('store_id'));
            //print_r($today); die();
      //  $data['today_Walkins'] = $this->Adminmodel->todaysInStore($login_store_id);
         $data['today_Walkins'] = $this->Adminmodel->todaysInStore($login_store_id);
        $data['userWalkinData'] = $this->Adminmodel->userWalkinFullInformation($login_store_id, "DESC");
        $data['total_Walkins'] = count($data['userWalkinData']);
       // print_r($data);die;
        $this->session->set_flashdata('success', '<div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Refresh successful</strong>
          </div>');

        return redirect('control/walkinReport');
            //$this->load->view('walkin_report',$data);
    } else {
        $login_store_id = $this->session->userdata('store_id');
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            //$today = $this->Adminmodel->todaysInStore($this->session->userdata('store_id'));
            //print_r($today); die();
        $data['today_Walkins'] = $this->Adminmodel->todaysInStore($login_store_id);
        // print_r($this->db->last_query());die;
        $data['userWalkinData'] = $this->Adminmodel->userWalkinFullInformation($login_store_id, "DESC");
        $data['total_Walkins'] = count($data['userWalkinData']);

        $this->load->view('walkin_report', $data);
    }
}

function userReport() {

    if (!$this->checkauth()) {
        return redirect('control/login');
    }

    if ($this->uri->segment(3)) {
        $login_store_id = $this->session->userdata('store_id');

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['total_Walkins'] = $this->Adminmodel->totalWalkins1($login_store_id);
        $data['total_time_spent'] = $this->Adminmodel->totalTimeSpentInStore($login_store_id);
        $data['userActivity'] = $this->Adminmodel->userActivity($login_store_id);

        $this->session->set_flashdata('success', '<div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Refresh successful</strong>
          </div>');
        return redirect('control/userReport');
    } else {

        $login_store_id = $this->session->userdata('store_id');

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['total_Walkins'] = $this->Adminmodel->totalWalkins1($login_store_id);
       // print_r($this->db->last_query());die;
        $data['total_time_spent'] = $this->Adminmodel->totalTimeSpentInStore($login_store_id);
        $data['userActivity'] = $this->Adminmodel->userActivity($login_store_id);

        $this->load->view('user_report', $data);
    }
}

function dateRange_user_report() {
    if (!$this->checkauth()) {
        return redirect('control/login');
    }

    $start_date = $_GET['startdate'];
    $end_date = $_GET['enddate'];

    $login_store_id = $this->session->userdata('store_id');
    $data['total_Walkins'] = $this->Adminmodel->totalWalkins_Filter($login_store_id, $start_date, $end_date);
    $data['total_time_spent'] = $this->Adminmodel->totalTimeSpentInStore_Filter($login_store_id, $start_date, $end_date);
    $data['userActivity'] = $this->Adminmodel->userActivity_Filter($login_store_id, $start_date, $end_date);

    $data['s_date'] = $_GET['startdate'];
    $data['e_date'] = $_GET['enddate'];

    $this->load->view('user_report', $data);
}

function terms() {

        // if(!$this->checkauth()){
        //     return redirect('control/login');
        // }

    $this->load->view('terms');
}

// new methods 16 june 7.30pm

function s() {

    if (!$this->checkauth()) {
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
    if (!$this->checkauth()) {
        return redirect('control/login');
    }

    $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
    $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));
    $space_id = $data['chk_if_al_space'][0]->space_id;

    if ($data['chk_if_al_space'][0]->space_id) {
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
    if (!$this->checkauth()) {
        return redirect('control/login');
    }

    $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
    $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));
    $space_id = $data['chk_if_al_space'][0]->space_id;

    if ($data['chk_if_al_space'][0]->space_id) {

        $url = 'control/assign_beacon/' . $space_id;
        redirect($url);
    }

    $this->load->view('add_spaces', $data);
}

public function save_space() {
    if (!$this->checkauth()) {
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

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        if (!$space_id) {
            return redirect('control/spaces');
        }

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
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

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        if (!$space_id) {
            return redirect('control/spaces');
        }
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

        $space_ids = $data['chk_if_al_space'][0]->space_id;

        // if($data['chk_if_al_space'][0]->space_id){
        //     $url = 'control/assign_beacon/' . $space_ids;
        //     redirect($url);
        // }
        $data['beaconsdata'] = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id')));

        $data['get_placed_beacons'] = $this->Adminmodel->get_placed_beacons($this->session->userdata('store_id'));

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

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        if (!$space_id) {
            return redirect('control/spaces');
        }
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

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
        //return redirect('control/assign_beacon');
        $this->load->view('assign_beacon_new_edit', $data);
    }

    /////end  code vatan//////////

    public function delete_space() {

        if (!$this->checkauth()) {
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

        if (!$this->checkauth()) {
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

        if (!$this->checkauth()) {
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

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $data = $this->input->post('data');

        //var_dump($data);die;

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

            echo 'true';
        } else {
            echo "false";
        }
    }

    public function save_edit_beacon() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $data = $this->input->post('data');

        //var_dump($data);die;

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

            $email_s = $this->session->userdata('email');
            $body = "Your beacon position has been changed recently.";
            $subject = 'Beacon position updated successfully';
            $to_email = $email_s;
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $sts = $this->send_mail($to_email, $subject, $body, $headers);

            echo 'true';
        } else {
            echo "false";
        }
    }

    public function add_beacon($space_id) {
        if (!$this->checkauth()) {
            return redirect('control/login');
        }
//      var_dump($space_id);

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['space_id'] = $space_id;

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $this->load->view('add_beacon', $data);
    }

    // New changes 29 june in save_beacondetail API

    public function save_beacondetail() {
        if (!$this->checkauth()) {
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

        if (!$chk_for_beacon_name) {

            if (!$beacon) {

                $is_entrance_of_third_party = $this->input->post('is_entrance_of_third_party');

                if ($is_entrance_of_third_party) {
                    // var_dump("Yes");die;

                    $chk_if_store_already_have_one_entrance_beacon2 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'is_entrance_beacon' => "1"));

                    if ($chk_if_store_already_have_one_entrance_beacon2) {

                        $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                            <strong>You have already set one entrance beacon please set the beacon in other area of your store</strong>
                            </div>');

                        redirect('control/viewBeacon');
                    } else {

                        for ($i = 7; $i > 0; $i--) {
                            $b_key = rand(100000, 999999);
                        }
                        $beacon_umique_key = $b_key;

                        if ($id = $this->beacon->insert(array(
                            'store_id' => $this->session->userdata('store_id'),
                            'space_id' => $space_id,
                            'is_entrance_beacon' => $is_entrance_of_third_party ? : '0',
                            'beacon_place' => $beacon_place,
                            'beacon_key' => "beacon-" . $beacon_umique_key,
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
                    for ($i = 7; $i > 0; $i--) {
                        $b_key2 = rand(100000, 999999);
                    }
                    $beacon_umique_key2 = $b_key2;

                    if ($id = $this->beacon->insert(array(
                        'store_id' => $this->session->userdata('store_id'),
                        'space_id' => $space_id,
                        'is_entrance_beacon' => $is_entrance_of_third_party ? : '0',
                        'beacon_place' => $beacon_place,
                        'beacon_key' => "beacon-" . $beacon_umique_key2,
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
        } else {

            $this->session->set_flashdata('beacon', '<div style="text-align:left;" class="alert alert-danger">
                <strong>Beacon with this name already existed</strong>
                </div>');

            redirect('control/viewBeacon');
        }
    }

    function paint() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $space_id = $data['chk_if_al_space'][0]->space_id;
  $data['beacon_details'] = $this->beacon->selectbystore_Id($this->session->userdata('store_id'));
        if ($data['chk_if_al_space'][0]->space_id) {
            $url = 'control/assign_beacon/' . $space_id;
            redirect($url);
        }
       // print_r($data);die;

        $this->load->view("paint/index", $data);
    }

    function savePaintImage() {

        $image = imagecreatefrompng($_POST['image']);
        $id = uniqid();
        imagealphablending($image, false);
        imagesavealpha($image, true);
        $folder = base_url() . 'uploads/paint/wPaint-' . $id . '.png';

        imagepng($image, 'uploads/wPaint-' . $id . '.png');
        // return image path
        // new
        $space_image = 'wPaint-' . $id . '.png';
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

    function getLastPaintUpload() {

        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

        $space_id = $data['chk_if_al_space'][0]->space_id;
        // $space_id = $this->db->select('space_id')->order_by('space_id','desc')->limit(1)->get('T_Space')->row('space_id');
        // echo '{"space_id": "'.$space_id.'"}';
        echo $space_id;
    }

    public function heat_beacon($space_id) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        // if (!$space_id) {
        //      return redirect('control/spaces');
        // }

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $space_ids = $data['chk_if_al_space'][0]->space_id;
        $data['beacons'] = $this->Beacon_asign_model->getBySpaceId($space_ids);
        $data['space_detail'] = $this->space->selectby_Id($space_ids);
        $data['space_point'] = $this->space_point->selectby_spaceId($space_ids);
        $data['beacon_details'] = $this->beacon->selectbystore_Id($this->session->userdata('store_id'));
        $data['heatmap_user_data'] = $this->Adminmodel->getHeatCountOfUser("beacon-1");

        // var_dump($data['beacons']);die;
        $this->load->view('paint/heatmap', $data);
    }

    function heatmap() {
        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['chk_if_al_space'] = $this->Adminmodel->select_data('T_Space', array('store_id' => $this->session->userdata('store_id')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $space_id = $data['chk_if_al_space'][0]->space_id;

        if ($data['chk_if_al_space'][0]->space_id) {
            $url = 'control/heat_beacon/' . $space_id;
            redirect($url);
        }

        $this->load->view("paint/heatmap", $data);
    }

// New method 12 july

    function checkIfAlreadyBeacon() {

        $beacon_name = $this->uri->segment(3);
        $chk_for_beacon_name = $this->Adminmodel->select_data('T_Beacons', array(
            'beacon_name' => $beacon_name
        ));
        echo $chk_for_beacon_name[0]->beacon_name;
    }

    function editBeacon($Id) {

        // var_dump($Id);die;
        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        if (!empty($_POST)) {

            $beacon_k = $this->input->post('beacon_key');
            $beacon_type = $this->input->post('beacon_type');

            if ($beacon_type == "cashrub_beacon") {

                $for_entry_beacon1 = $this->input->post('is_entrance_update');

                if ($for_entry_beacon1 == "1") {

                    $chk_if_alr1 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'is_entrance_beacon' => "1"));

                    if ($chk_if_alr1) {

                        $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                          <strong>You already have one entrance beacon you can\'t add thie one for the entrance </strong>
                          </div>');
                        redirect('control/editbeacon/' . $beacon_k);
                    } else {

                        $updateBeaconData9 = array(
                            'beacon_key' => $beacon_k,
                            'store_id' => $this->session->userdata('store_id'),
                            'beacon_name' => $this->input->post('beacon_name'),
                            'beacon_place' => $this->input->post('beacon_place'),
                            'is_entrance_beacon' => $for_entry_beacon1
                        );

                        $update_cashrub_beacon = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k), $updateBeaconData9);
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

                    $update_cashrub_beacon2 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k), $updateBeaconData2);

                    $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                      <strong>Third-Party beacon updated successfully</strong>
                      </div>');
                    redirect('control/viewBeacon');
                }
            } else {

                $for_entry_beacon5 = $this->input->post('is_entrance_update');
                // var_dump($for_entry_beacon5);

                if ($for_entry_beacon5 == "1") {

                    $chk_if_alr5 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'is_entrance_beacon' => "1"));

                    if ($chk_if_alr5) {

                        $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                          <strong>You already have one entrance beacon you can\'t add thie one for the entrance </strong>
                          </div>');
                        redirect('control/editbeacon/' . $beacon_k);
                    } else {

                        $chk_if_entry_same = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'beacon_key' => $beacon_k));

                        if (
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

                            $update_cashrub_beacon5 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k), $updateBeaconData5);

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
                            if ($chk_if_beacon_alr) {

                                $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                                  <strong>Beacon is already exists with this UUID,major or minor </strong>
                                  </div>');
                                redirect('control/editbeacon/' . $beacon_k);
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

                                $update_cashrub_beacon5 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k), $updateBeaconData5);

                                $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                                  <strong>Third-Party beacon updated successfully</strong>
                                  </div>');

                                redirect('control/viewBeacon');
                            }
                        }
                    }
                } else {

                    // var_dump("Helo");die;

                    $chk_if_entry_same2 = $this->Adminmodel->select_data('T_Beacons', array('store_id' => $this->session->userdata('store_id'), 'beacon_key' => $beacon_k));

                    if (
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

                        $update_cashrub_beacon5 = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k), $updateBeaconData5);

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

                        if ($chk_if_beacon_alr1) {

                            $this->session->set_flashdata('edit_beacon', '<div class="alert alert-danger">
                              <strong>Beacon is already exists with this UUID,major or minor </strong>
                              </div>');
                            redirect('control/editbeacon/' . $beacon_k);
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

                            $update_cashrub_beacon = $this->Adminmodel->update('T_Beacons', array('beacon_key' => $beacon_k), $updateBeaconData1);

                            $this->session->set_flashdata('beacon', '<div class="alert alert-success">
                              <strong>Third Party beacon updated successfully</strong>
                              </div>');
                            redirect('control/viewBeacon');
                        }
                    }
                }
            }
        }

        $data['edit_beacon'] = $this->Adminmodel->select_data('T_Beacons', array('beacon_key' => $Id));
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $this->load->view("edit_beacons", $data);
    }

    // Cronjobs

    function deleteUserIfNotVerified() {

        $delete_user = $this->Adminmodel->delete('T_User', array('otp_verify' => "0"));

        $delete_u = $this->Adminmodel->delete('T_User', array('status_id' => "0"));
    }

    function checkOfferExpiryDate() {

        $data['chk_expiry'] = $this->Adminmodel->select_data('T_StoreOffer');

        foreach ($data['chk_expiry'] as $key) {

            $current_date = date_create(date('Y-m-d'));
            $offer_expiry_date = date_create($key->expiry_date);
            $diff = date_diff($current_date, $offer_expiry_date);
            $exact = $diff->format("%R%a");

            if ($exact <= 0) {
                // echo $exact;
                $offer_expires = $this->Adminmodel->update('T_StoreOffer', array('store_offer_id' => $key->store_offer_id), array('offer_status' => "9"));
            }
        }
        $data['chk_expiry_coupon'] = $this->Adminmodel->select_data('T_Coupon', array('status !=' => "11"));

        foreach ($data['chk_expiry_coupon'] as $key) {

            $current_date = date_create(date('Y-m-d'));
            $coupon_expiry_date = date_create($key->coupon_expiry_date);
            $diff = date_diff($current_date, $coupon_expiry_date);
            $exact2 = $diff->format("%R%a");

            if ($exact2 < 0) {
                // echo $exact;
                $coupon_expires = $this->Adminmodel->update('T_Coupon', array('coupon_id' => $key->coupon_id), array('status' => "9"));
            }
        }
        // deleting unverified users.

        $delete_user = $this->Adminmodel->delete('T_User', array('otp_verify' => "0"));

        // delete stores

        $delete_store = $this->Adminmodel->delete('T_Store', array('store_email' => NULL));

        $delete_u = $this->Adminmodel->delete('T_User', array('status_id' => "0"));
    }

    function services() {
        $query=$this->db->where('type','admin')->get('terms');

        $data['terms']=$query->row();
       // print_r($data);die;
        $this->load->view("terms",$data);
    }

    function tutorial() {

        $this->load->view("tutorial");
    }

    function frequentlyAskedQuestion() {

        $this->load->view("frequently_asked_question");
    }

    function about_us() {

        $this->load->view("about_us");
    }

    function privacy_policy() {

        $this->load->view("privacy_policy");
    }

    function forgotPassword() {
        $this->load->view("forgot_password");
    }

    function submitForgotPassword() {

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
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('forgot_password');
        } else {
            $email = $this->input->post("username");

            $data['store'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));

            if ($data['store']) {

                $url = str_replace(' ', '', base_url('index.php/Welcome/forgot_password_verify'));

               /* $body = " <a href='" . $url . "/" . $data['store'][0]->store_id . "'>Click</a> here to change your password";*/
            $body =     "Hello ".$data['store'][0]->store_first_name." ,<br>
<a href='" . $url . "/" . $data['store'][0]->store_id . "'>Click</a> here to change your password <br>
Go to www.cashrub.in and login with username and password to access the account. In case you need any help hit reply, we are here.  <br>

        
If you did this, you can safely disregard this email.
<br><br>
Thank You.";
                $subject = 'Recover Password';
                $to_email = $email;
                // $headers = "MIME-Version: 1.0" . "\r\n";
                // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                $sts = $this->send_mail($to_email, $subject, $body, $headers);
   				// print_r($sts);die;

                if ($sts) {

                    $expire_manage = $this->Adminmodel->update('T_Store', array('store_email' => $email), array('link_expire' => "2", 'reset_link_expire_time' => date("Y-m-d H:i:s")));
                    $this->session->set_flashdata('login_error', 'Reset password link is sent to your email.');
                    $this->load->view('login');
                } else {
                    $this->session->set_flashdata('login_error', 'Something went wrong please try again later.');
                    $this->load->view('login');
                }
            } else {

                $this->session->set_flashdata('forgot_error', 'Email ID is not registered');
                $this->load->view('forgot_password');
            }
        }
    }

    //================================== B 05.01.2018 ==========================

    public function dateRangeWalkinDetails($user_id) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $data['offer_id_confirm'] = $user_id;
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        //shesh code
        $store_id = $this->session->userdata('store_id');
        $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore_byuser($store_id, $user_id);
        //$data['today_Walkins'] = $this->Adminmodel->todayWalkinsInStore($this->session->userdata('store_id'));
        $data['today_Walkins'] = $this->Adminmodel->todaysInStore($this->session->userdata('store_id'));

        $data['userDetail'] = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
        //$data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));
        $a = $_GET['startdate'];
        $b = $_GET['enddate'];

        // $data['store_id'] = $this->session->userdata('store_id');
        $c = $this->session->userdata('store_id');
        // $data['userWalkinData'] = $this->Adminmodel->getDataofRangeSelectedWalkin("T_BeaconActivity","detected_date",$_GET['startdate'], $_GET['enddate'], "beacon_activity_id");
        $data['userWalkinData'] = $this->Adminmodel->dateRangeWalkDetail($a, $b, $c, $user_id);
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('single_user_walkindata', $data);
    }

    public function dateRangeWalkin() {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $a = $_GET['startdate'];
        $b = $_GET['enddate'];
        // $data['store_id'] = $this->session->userdata('store_id');
        $c = $this->session->userdata('store_id');
        // $data['userWalkinData'] = $this->Adminmodel->getDataofRangeSelectedWalkin("T_BeaconActivity","detected_date",$_GET['startdate'], $_GET['enddate'], "beacon_activity_id");

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));
        //$today = $this->Adminmodel->todaysInStore($this->session->userdata('store_id'));
        //print_r($today); die();
        // $data['today_Walkins'] = $this->Adminmodel->todaysInStore($this->session->userdata('store_id'));
        $data['userWalkinData'] = $this->Adminmodel->getDataofRangeSelectedWalkin($a, $b, $c);
        $data['total_Walkins'] = count($data['userWalkinData']);
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $this->load->view('walkin_report', $data);
    }

    public function dateRangeWalkin_setting() {
        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $start_date = $_GET['startdate'];
        $end_date = $_GET['enddate'];
        $store_id = $this->session->userdata('store_id');

        $data['payment'] = $this->Adminmodel->getDataofRangeSelectedSetting($start_date, $end_date, $store_id);
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];

        $this->load->view('setting', $data);
    }

    //================================== End B 05.01.2018 ==========================
    ////////////////////vatan code 2nd january//////////////////////
    function userdetails($user_id) {

        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        if ($this->uri->segment(4)) {
            $store_id = $this->session->userdata('store_id');
            $data['offer_id_confirm'] = $user_id;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['user_id']=$this->uri->segment(4);
            $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore_byuser($store_id, $user_id);
            // $data['today_Walkins'] = $this->Adminmodel->todayWalkinsInStore($store_id);
            // $data['totlwakinuser'] = $this->Adminmodel->select_data('T_BeaconActivity', array('user_id' => $user_id, 'store_id' => $store_id));
            $twpoints = $this->Adminmodel->select_data('T_SocialSharePoint', array('user_id' => $user_id, 'store_id' => $store_id), array('social_share_point_id' => 'desc'));
            $offer_array = array();
            foreach ($twpoints as $value) {
                $sum = $sum + ($value->points);
                array_push($offer_array, array('offer_id' => $value->store_offer_id, 'points' => $value->points, 'share_type' => $value->share_type));
            }

            $data['SumPOint'] = $sum;
            $data['offer_array'] = $offer_array;
            $data['singleUserActivity'] = $this->Adminmodel->singleUserActivity($store_id, $user_id);

            $data['total_spend_time_of_user'] = $this->Adminmodel->totalTimeSpentOfUser($store_id, $user_id);
            $data['userDetail'] = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
            $data['first_w_date'] = $this->Adminmodel->select_data('T_BeaconActivity', array('user_id' => $user_id, 'store_id' => $this->session->userdata('store_id')));

            $this->session->set_flashdata('success', '<div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Refresh successful</strong>
              </div>');

            return redirect('control/user_details/' . $user_id);
        } else {
            $store_id = $this->session->userdata('store_id');
            $data['offer_id_confirm'] = $user_id;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
   $data['user_id']=$user_id;
            $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore_byuser($store_id, $user_id);
            // $data['today_Walkins'] = $this->Adminmodel->todayWalkinsInStore($store_id);
            // $data['totlwakinuser'] = $this->Adminmodel->select_data('T_BeaconActivity', array('user_id' => $user_id, 'store_id' => $store_id));
            $twpoints = $this->Adminmodel->select_data('T_SocialSharePoint', array('user_id' => $user_id, 'store_id' => $store_id), array('social_share_point_id' => 'desc'));
            $offer_array = array();
            $sum=0;
            if(!empty($twpoints))
            {	
            foreach ($twpoints as $value) {
                $sum = $sum + ($value->points);
                array_push($offer_array, array('offer_id' => $value->store_offer_id, 'points' => $value->points, 'share_type' => $value->share_type));
            }
        }
            $data['SumPOint'] = $sum;
            $data['offer_array'] = $offer_array;
            $data['singleUserActivity'] = $this->Adminmodel->singleUserActivity($store_id, $user_id);

            $data['total_spend_time_of_user'] = $this->Adminmodel->totalTimeSpentOfUser($store_id, $user_id);
            $data['userDetail'] = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
           // $data['first_w_date'] = $this->Adminmodel->select_data('T_BeaconActivity', array('user_id' => $user_id, 'store_id' => $this->session->userdata('store_id')));
              $query1= $this->db->query('SELECT * FROM `T_BeaconActivity` WHERE `user_id` = '.$user_id.' AND `store_id` = '.$this->session->userdata("store_id").' order by created_date DESC  limit 1');
 $data['last_w_date'] = $query1->result();
                $query2 = $this->db->query('SELECT * FROM `T_BeaconActivity` WHERE `user_id` = '.$user_id.' AND `store_id` = '.$this->session->userdata("store_id").' order by created_date ASC  limit 1');
$data['first_w_date'] =$query2->result();
            // $where = array('store_id' => $this->session->userdata('store_id'), 'user_id' => $user_id);
            // $data['userWalkinData'] = $this->Adminmodel->singleUserData($where);

            $this->load->view('user_details', $data);
        }
    }

    function dateRange_user_details($user_id) {
        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $data['s_date'] = $_GET['startdate'];
        $data['e_date'] = $_GET['enddate'];
        $start_date = $_GET['startdate'];
        $end_date = $_GET['enddate'];

        $store_id = $this->session->userdata('store_id');
        $data['offer_id_confirm'] = $user_id;
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore_byuser($store_id, $user_id);
        // $data['today_Walkins'] = $this->Adminmodel->todayWalkinsInStore($store_id);
        // $data['totlwakinuser'] = $this->Adminmodel->select_data('T_BeaconActivity', array('user_id' => $user_id, 'store_id' => $store_id));
        $where = "user_id = $user_id AND store_id = $store_id";
        $twpoints = $this->Adminmodel->getOfferPointsBetween('T_SocialSharePoint', $where, $start_date, $end_date);

        $offer_array = array();
        foreach ($twpoints as $value) {
            $sum = $sum + ($value->points);
            array_push($offer_array, array('offer_id' => $value->store_offer_id, 'points' => $value->points, 'share_type' => $value->share_type));
        }

        $data['SumPOint'] = $sum;
        $data['offer_array'] = $offer_array;
        $data['singleUserActivity'] = $this->Adminmodel->singleUserActivity_Filter($store_id, $user_id, $start_date, $end_date);

        $data['total_spend_time_of_user'] = $this->Adminmodel->totalTimeSpentOfUser($store_id, $user_id);
        $data['userDetail'] = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
        $data['first_w_date'] = $this->Adminmodel->getWalkinDateBetween('T_BeaconActivity', $where, $start_date, $end_date);
        // $data['first_w_date'] = $this->Adminmodel->select_data('T_BeaconActivity', array('user_id' => $user_id, 'store_id' => $this->session->userdata('store_id')));
        $this->load->view('user_details', $data);
    }

    function singleUserWalkinData($user_id) {
        if (!$this->checkauth()) {
            return redirect('control/login');
        }
        if ($this->uri->segment(4)) {
            $data['offer_id_confirm'] = $user_id;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            //shesh code
            $store_id = $this->session->userdata('store_id');
            $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore_byuser($store_id, $user_id);
            //$data['today_Walkins'] = $this->Adminmodel->todayWalkinsInStore($this->session->userdata('store_id'));
            $data['today_Walkins'] = $this->Adminmodel->todaysInStore($this->session->userdata('store_id'));
            //shesh code end
            $data['userDetail'] = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
              $data['user_earn'] = $this->Adminmodel->select_data('T_UserPoint', array('user_id' => $user_id));
            //$data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));
            $where = array('store_id' => $this->session->userdata('store_id'), 'user_id' => $user_id);
            $data['userWalkinData'] = $this->Adminmodel->singleUserWalkinData($where);

            $this->session->set_flashdata('success', '<div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Refresh successful</strong>
              </div>');

            //$this->load->view('single_user_walkindata',$data);
            return redirect('control/singleUserWalkinData/' . $user_id);
        } else {

            $data['offer_id_confirm'] = $user_id;
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            //shesh code
            $store_id = $this->session->userdata('store_id');
            $data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore_byuser($store_id, $user_id);
            //$data['today_Walkins'] = $this->Adminmodel->todayWalkinsInStore($this->session->userdata('store_id'));
            $data['today_Walkins'] = $this->Adminmodel->todaysInStore1($this->session->userdata('store_id'),$user_id);
            //shesh code end
             $data['user_earn'] = $this->Adminmodel->select_data('T_UserPoint', array('user_id' => $user_id));
            $data['userDetail'] = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
            //$data['total_Walkins'] = $this->Adminmodel->totalWalkinsInStore($this->session->userdata('store_id'));
            $where = array('store_id' => $this->session->userdata('store_id'), 'user_id' => $user_id);
            $data['userWalkinData'] = $this->Adminmodel->singleUserWalkinData($where);

            $this->load->view('single_user_walkindata', $data);
        }
    }

    ///////////////code end ///////////////////////
    // Shesh code start

    public function save_invoice() {
        //load mPDF library
        $this->load->library('m_pdf');
        //load mPDF library
     /*   $this->load->helper('path');*/
        //load mPDF library
        //now pass the data//
        $this->data['title'] = "MY Invoice.";
        $this->data['description'] = "";
        $this->data['description'] = $this->official_copies;
        //now pass the data //
        //$html=$this->load->view('setting',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.

        $html = '<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <div id="invoice" class="modal fade">
        <div class="modal-dialog modal-full">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Invoice #' . $_POST["invoice_id"] . '</h5>
        </div>

        <div class="panel-body no-padding-bottom">
        <div class="row">
        <div class="col-md-6 content-group">
        <h4 class="logo hidden-xs" style="color:black;"> Cash Rub </h4></a>

        <ul class="list-condensed list-unstyled">
        <li>2269 Elba Lane</li>
        <li>Paris, France</li>
        <li>888-555-2311</li>
        </ul>
        </div>

        <div class="col-md-6 content-group">
        <div class="invoice-details">
        <h5 class="text-uppercase text-semibold">Invoice #' . $_POST['invoice_id'] . '</h5>
        <ul class="list-condensed list-unstyled">
        <li>Date: <span class="text-semibold">January 12, 2015</span></li>
        <li>Due date: <span class="text-semibold">May 12, 2015</span></li>
        </ul>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-6 col-lg-9 content-group">
        <span class="text-muted">Invoice To:</span>
        <ul class="list-condensed list-unstyled">
        <li><h5>Rebecca Manes</h5></li>
        <li><span class="text-semibold">Normand axis LTD</span></li>
        <li>3 Goodman Street</li>
        <li>London E1 8BF</li>
        <li>United Kingdom</li>
        <li>888-555-2311</li>
        <li><a href="#">rebecca@normandaxis.ltd</a></li>
        </ul>
        </div>

        <div class="col-md-6 col-lg-3 content-group">
        <span class="text-muted">Payment Details:</span>
        <ul class="list-condensed list-unstyled invoice-payment-details">
        <li><h5>Total Due: <span class="text-right text-semibold">$8,750</span></h5></li>
        <li>Bank name: <span class="text-semibold">Profit Bank Europe</span></li>
        <li>Country: <span>United Kingdom</span></li>
        <li>City: <span>London E1 8BF</span></li>
        <li>Address: <span>3 Goodman Street</span></li>
        <li>IBAN: <span class="text-semibold">KFH37784028476740</span></li>
        <li>SWIFT code: <span class="text-semibold">BPT4E</span></li>
        </ul>
        </div>
        </div>
        </div>

        <div class="table-responsive">
        <table class="table table-lg">
        <thead>
        <tr>
        <th class="col-sm-2">Payment Id</th>
        <th class="col-sm-2">Store Name</th>
        <th class="col-sm-2">Store Email</th>
        <th class="col-sm-2">Bill Description</th>
        <th class="col-sm-2">Payment Date</th>
        <th class="col-sm-2">Amount</th>
        </tr>
        </thead>
        <tbody>

        <tr>

        <td>' . $_POST["payment_id"] . '</td>
        <td>' . $_POST["store_first_name"] . '</td>
        <td>' . $_POST["store_email"] . '</td>
        <td>' . $_POST["payment_name"] . '</td>
        <td>' . $_POST["payment_date"] . '</td>
        <td>$500</td>
        </tr>

        </tbody>
        </table>
        </div>

        <div class="panel-body">
        <div class="row invoice-payment">
        <div class="col-sm-7">
        <div class="content-group">
        <h6>Authorized person</h6>
        <div class="mb-15 mt-15">
        <img src="' . base_url() . 'assets/images/signature.png" class="display-block" style="width: 150px;" alt="">
        </div>

        <ul class="list-condensed list-unstyled text-muted">
        <li>Eugene Kopyov</li>
        <li>2269 Elba Lane</li>
        <li>Paris, France</li>
        <li>888-555-2311</li>
        </ul>
        </div>
        </div>

        <div class="col-sm-5">
        <div class="content-group">
        <h6>Total due</h6>
        <div class="table-responsive no-border">
        <table class="table">
        <tbody>
        <tr>
        <th>Subtotal:</th>
        <td class="text-right">$7,000</td>
        </tr>
        <tr>
        <th>Tax: <span class="text-regular">(25%)</span></th>
        <td class="text-right">$1,750</td>
        </tr>
        <tr>
        <th>Total:</th>
        <td class="text-right text-primary"><h5 class="text-semibold">$8,750</h5></td>
        </tr>
        </tbody>
        </table>
        </div>

        </div>
        </div>
        </div>
        <h6>Other information</h6>
        <p class="text-muted">Thank you for using Limitless. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</p>
        </div>
        </div>
        </div>

        </div>';
        //this the the PDF filename that user will get to download

        $pdfFilePath = "MY_Invoice-" . time() . "-download.pdf";

        //$PATH = base_url('uploads/pdf/');
        //actually, you can pass mPDF parameter on this load() function
        echo $pdf = $this->m_pdf->load();
        //generate the PDF!

        echo $pdf->WriteHTML($html, 2);

        //;
        //$pdffile=file_get_contents(
        echo $pdf->Output($pdfFilePath, "D");
        //);
        //var_dump($file);
        //rename('$pdfFilePath', $PATH);
        //move_uploaded_file($pdffile, $PATH.$pdffile);
        $email_to = $this->session->userdata('email');
        $pdffilename = urlencode($pdfFilePath);
        echo $url = base_url() . 'index.php/control/download_pdf/pdf/' . $pdffilename;

        $link = '<a href="' . $url . '">' . $url . '</a>';

        $message = '';
        $message .= '<strong>To download your invoice click on given link : -</strong><br>';
        $message .= '<strong>Please click:</strong> ' . $link;
        $message; //send this through mail

        /* $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 443,
          'smtp_user' => 'testing.linosys@gmail.com', // change it to yours
          'smtp_pass' => 'Canopus12!', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
      ); */

      $config = Array(
        'protocol' => 'ftp',
        'smtp_host' => 'ssl://ftp.linosys.net',
        'smtp_port' => 21,
            'smtp_user' => 'cashrub@linosys.in', // change it to yours
            'smtp_pass' => 'cashrub@123', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
        $this->email->from('testing.linosys@gmail.com'); // change it to yours
        $this->email->to($email_to); // change it to yours
        $this->email->subject('Your invoice');
        $this->email->message($message);

        if ($this->email->send()) {

            $this->session->set_flashdata('success', '<div class="alert alert-success"><strong>Please check your email.</strong></div>');
            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            // $points = $this->db->get('T_Payment');
            // $points = $this->Adminmodel->countPoints();
            // // var_dump($points);die;
            $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')), array('payment_id' => 'desc'));
            $this->load->view("setting", $data);
            //$this->load->view('setting');
        } else {
            $this->session->set_flashdata('not_send', '<div class="alert alert-danger"><strong>Mail not sent</strong></div>');
            $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
            $data['store'] = $this->Adminmodel->select_data('T_Categorys');

            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

            // $points = $this->db->get('T_Payment');
            // $points = $this->Adminmodel->countPoints();
            // // var_dump($points);die;
            $data['payment'] = $this->Adminmodel->select_data('T_Payment', array('store_id' => $this->session->userdata('store_id')), array('payment_id' => 'desc'));
            $this->load->view("setting", $data);
            //$this->load->view('setting');
            //show_error($this->email->print_debugger());
        }

        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        //echo $file=$pdf->Output($pdfFilePath, "D");
    }

    public function getInvoice($id) {
        $payment_id = $this->uri->segment(3);
        $where = "payment_id = $payment_id";
        $payment_details = $this->Adminmodel->getPaymentDetails($where);
        echo json_encode($payment_details);
        // die();
    }
   function callNotification($device_token, $title, $body) {
 
        //define('API_ACCESS_KEY', 'AIzaSyBzlIlf9iITdleZMn0sZbTKy0NCkFraR9Q');
        // define('API_ACCESS_KEY', 'AIzaSyAKNgIrBlhnh4TSd1dxjYHUWsscP4GrA5I');
        $registrationIds = $device_token;

       // define('API_ACCESS_KEY', 'AAAAhd1Vx4s:APA91bGYxXYkm_jyy9r8kerYa18EFLTfvqfi0UtxkCyWnS3crXNoypUl9rJkqnF-gw_9LdBGmmMkTd-H4zcSNWpMfcWAdRDp-3j0krppdt5uKuuchGX6r2ezxBvMz2hI0cTpSu4vRjPP'); // Subodh :: added server key
        $API_ACCESS_KEY="AAAAhd1Vx4s:APA91bGYxXYkm_jyy9r8kerYa18EFLTfvqfi0UtxkCyWnS3crXNoypUl9rJkqnF-gw_9LdBGmmMkTd-H4zcSNWpMfcWAdRDp-3j0krppdt5uKuuchGX6r2ezxBvMz2hI0cTpSu4vRjPP";

    /*    $msg = array
        (
            'title' => $title,
            'body' => $body
        );

        $fields = array
        (
            'registration_ids' => $registrationIds,
            'data' => $msg
        );*/
       $fields= json_encode([
 "to" => $registrationIds,
 "notification" => [
     "body"  => $body,
     "title" => $title
 ],
 "data" => [
     "body"  =>  $body,
     "title" => $title
 ]]);
//print_r($fields);die;
        $headers = array
        (
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        );

       /* $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;*/
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $fields,
  CURLOPT_HTTPHEADER => array(
    "authorization: key=AAAAhd1Vx4s:APA91bGYxXYkm_jyy9r8kerYa18EFLTfvqfi0UtxkCyWnS3crXNoypUl9rJkqnF-gw_9LdBGmmMkTd-H4zcSNWpMfcWAdRDp-3j0krppdt5uKuuchGX6r2ezxBvMz2hI0cTpSu4vRjPP",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 8801eda3-dcc5-4ad5-4b7d-9c36ad967cd1"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return "cURL Error #:" . $err;
} else {
  return $response;
}
        // echo $result; exit;
    }
    public function send_notification() {

//print_r($_POST);die;
        if (!$this->checkauth()) {
            return redirect('control/login');
        }
 $user_id = $this->input->post('user_id');
  if (isset($user_id)) {
            $user_info = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
            $device_token = $user_info[0]->device_token;
        }

        $store_info = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
         $body = $this->input->post('message');
        $storeName = $store_info[0]->store_first_name;
        $title=$storeName;
    	 
    	$notification = $this->callNotification($device_token, $title, $body);
        if(!empty($notification))
        {
                 $activity_data = [
                                            "user_id" => $user_id,
                                            "activity_name" => $body,
                                            "activity_type" => "store_send",
                                            "activity_date" => date("Y-m-d"),
                                            "activity_time" => date("H:i:s"),
                                            "store_offer_id" => 0,
                                            "store_id" =>$this->session->userdata('store_id')
                                        ];

           $activity_insert = $this->db->insert('T_ActivityLog', $activity_data);
        }
//print_r($this->db->last_query());die;
     
          $this->session->set_flashdata('success', '<div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Notification Sent</strong>
              </div>');
         redirect('control/userReport');

    }
public function send_notification1() {

//print_r($_POST);die;
        if (!$this->checkauth()) {
            return redirect('control/login');
        }
 $user_id = $this->input->post('user_id');
  if (isset($user_id)) {
            $user_info = $this->Adminmodel->select_data('T_User', array('user_id' => $user_id));
            $device_token = $user_info[0]->device_token;
        }

        $store_info = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
         $body = $this->input->post('message');
        $storeName = $store_info[0]->store_first_name;
        $title=$storeName;
         
        $notification = $this->callNotification($device_token, $title, $body);
        if(!empty($notification))
        {
                 $activity_data = [
                                            "user_id" => $user_id,
                                            "activity_name" => $body,
                                            "activity_type" => "store_send",
                                            "activity_date" => date("Y-m-d"),
                                            "activity_time" => date("H:i:s"),
                                            "store_offer_id" => 0,
                                            "store_id" =>$this->session->userdata('store_id')
                                        ];

           $activity_insert = $this->db->insert('T_ActivityLog', $activity_data);
        }
//print_r($this->db->last_query());die;
     
          $this->session->set_flashdata('success', '<div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Notification Sent</strong>
              </div>');
         redirect('control/walkinReport');

    }

    public function download_pdf() {
        $this->load->helper('pdf_helper');

        $fileName = urldecode($this->uri->segment(4));

        $data = file_get_contents(base_url() . $fileName);
        force_download($filename, $data);
        //$file = realpath ("http://111.118.246.35/shesh_cashrub/cashrub_admin/") . "//" .$fileName;
        //$file = base_url().$fileName;
        //force_download($file, NULL);
        /* $file = realpath ( "download" ) . "\\" . $fileName;
          // check file exists
          if (file_exists ( $file )) {
          // get file content
          $data = file_get_contents ( $file );
          //force download
          force_download ( $fileName, $data );
          } else {
          // Redirect to base url
          echo '404 Not Found' ;
      } */
  }

    //Shesh code end

  /*public function send_mail($to, $subject, $body, $headers = '') {

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
*/
   /* public function update()
    {
    	$query=$this->db->get('T_Store');
    	  $result=$query->result();
    	  foreach ($result as $res) {
    	 //print_r($res);die;
    	   $geocode1 = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='
                . $res->store_latitude . ',' .$res->store_longitude . '&sensor=false&key=AIzaSyAPQXi7ZBZ73SPXi7JfHycSCi30thvQGCg');
         //   $geocode = array();
            $output1 = json_decode($geocode1);

            // SUBODH :: below is a temporary fix. Needs to remove when robust fix found
           // $addr1 = empty($output1->results[0]->formatted_address) ? 'Bavdhan, Pune, Maharashtra 411021, India': $output->results[0]->formatted_address;

           foreach ($output1->results[0]->address_components as $address_components) {
  if($address_components->types[0] == 'administrative_area_level_2')
  {
    $city = $address_components->long_name;
  }
  if($address_components->types[0] == 'political')
  {
    $area = $address_components->long_name;
  }
  } 
  $addr=$area.', '.$city;
   	# code...
  //print_r($addr);die;
  $data=['area_location'=>$addr];
  $this->db->where('store_id',$res->store_id)->update('T_Store',$data);
 // $output1='';
    	  }
    }*/
    public function change_password()
    {
    	  if (!$this->checkauth()) {
            return redirect('control/login');
        }

        $email = $this->session->userdata('email');
        $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
        $data['store'] = $this->Adminmodel->select_data('T_Categorys');

        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));

        $data['walk_p'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
    	$this->load->view('change_password',$data);
    }
    public function change_password_done()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
    	   $store_id = $this->session->userdata('store_id');
 $email = $this->session->userdata('email');
    	       $store= $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id));
    	       if(!empty($store))
    	       {
    	       	$store_password=$store[0]->store_password;
    	       	$old_pasword=md5($this->input->post('old_password'));
    	       	$new_password=$this->input->post('new_password');
    	       	$confirm_password=$this->input->post('confirm_password');
    	   //    	print_r($old_pasword); echo "<br>";
    	    //   	print_r($store_password);die;
    	       	if($store_password==$old_pasword)
    	       	{
    	       			if($new_password==$confirm_password)
    	       			{
    	       				$main_password=md5($new_password);
         $this->Adminmodel->update('T_Store', array('store_id' => $store_id), array('store_password' => $main_password));

          $email_s = $email;
                        $body = "Hello ".$store[0]->store_first_name.",<br><br>
Successfully changed !!!!!<br>
   Your account's password is successfully updated from profile on ".date('Y-m-d h:i A')." <br>
Go to www.cashrub.in and login with username and password to access the account. In case you need any help hit reply, we are here. <br>
        
If you did this, you can safely disregard this email.<br><br>

Thank You.";
                        $subject = 'Profile Updated';
                        $to_email = $email_s;
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $sts = $this->send_mail($to_email, $subject, $body, $headers);

                

                    

                        $this->session->sess_destroy();
                            $this->session->set_flashdata('login_error2', 'Your password has been updated successfully. Please login.');
                          echo "1";

     //    print_r($this->db->last_query());die;
    	       			}else{
    	       				echo "Confirm password is not match with password!";
    	       			}
    	       	}else{
    	       		echo "Old password is not correct!";
    	       	}
    	      
    	       }else{
    	       	   return redirect('control/login');
    	       }
    	
    }
    public function billing()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
          $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
        $data['transactions']=$this->Adminmodel->payment_detail_by_store($this->session->userdata('store_id'),5);
            $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
        $this->load->view('billing_view',$data);
    }
    public function transaction_details()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
          $email = $this->session->userdata('email');
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
        $data['transactions']=$this->Adminmodel->payment_detail_by_store($this->session->userdata('store_id'),0);
          $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
       // print_r($this->db->last_query());die;
        $this->load->view('transaction_details_view',$data);
    }
    public function payment_settings()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }  
          $email = $this->session->userdata('email');
        $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
        $this->load->view('card_settings',$data);
    }
    public function check_rubs()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
       // print_r($this->session->userdata());die;
        $email=$this->session->userdata('email');
        $id=$this->session->userdata('store_id');
        $query=$this->db->where('store_id',$id)->get('T_Store');
        $user_data=$query->row();
        $rubs=$this->input->post('rubs');
        $price=(($rubs/4)+((($rubs/4)*10)/100)) ;
        $gst=($price/100)*18;
        $total=round($gst,2)+round($price,2);
      $data=['email'=>$email,
             'store_id'=>$id,
             'rubs'=>$rubs,
             'price'=>$price,
             'gst'=>$gst,
             'total'=>$total,
             'user_data'=>$user_data 
            ];
              $data['dash'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $this->session->userdata('email')));
            $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
              //  $data['profile'] = $this->Adminmodel->select_data('T_Store', array('store_email' => $email));
              $this->load->view('billing_payment',$data);
    }
    public function save_payment()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
      //  print_r($_POST);
        $id=$this->input->post('payment_id');
         $email=$this->input->post('email');
          $phone=$this->input->post('phone'); 
          $rubs=$this->input->post('rubs');
          $response=$this->check_to_razorpay($id);
        //  print_r($response);die;
           $store_id=$this->session->userdata('store_id');
          if(!empty($response))
          {
            $response_data=json_decode($response);
            $payment_id=$response_data->id;
            $status=$response_data->status;
            $email1=$response_data->email;
            $contact=$response_data->contact;
            $Amount=$response_data->amount;
            $card_id=$response_data->card_id;
            $refund_status=$response_data->refund_status;
              $method=$response_data->method;
               $amount_refunded=$response_data->amount_refunded;
               $created_at=$response_data->created_at;
                $status=$response_data->status;
                 $currency=$response_data->currency;
            $price=$Amount/100;
              $data=['transaction_key'=>$payment_id,
                       'card_id'=>$card_id,
                       'amount'=>$price,
                       'contact'=>$contact,
                       'email'=>$email1,
                       'refund_status'=>$refund_status,
                       'method'=>$method,
                       'amount_refunded'=>$amount_refunded,
                       'created_at'=>$created_at,
                       'status'=>$status,
                       'currency'=>$currency,
                       'payment_json'=>$response,
                       'store_id'=>$store_id,
                       'no_of_rubs'=>$rubs
                      ];
            if($id==$payment_id && $status=="authorized")
            {
                  $store = $this->Adminmodel->select_data('T_Store', array('store_id' => $store_id));
                 // print_r($store);die;
                  if(!empty($store))
                   {
                    $total_rubs=$store[0]->store_point+$rubs;
                  $store_data=['store_point'=>$total_rubs];
                 $this->db->where('store_id',$store_id)->update('T_Store',$store_data);
               
                  $body="Hello ".$store[0]->store_first_name.",<br><br>Greetings from Cashrub!
<br><br>
Your Payment Is successful.<br>Details:<br> <b>Payment Key:</b> ".$payment_id."<br><b>Amount: </b>".$price."<br><b>No of Rubs:</b>".$rubs."<br><b>Payment Method:</b>".$method."<br>
<br>In case of any doubts do visit www.cashrub.com.<br> Thank You.
<br>";
$subject="Purchase of Rubs!";
$to_email=$store[0]->store_email;

 $sts = $this->send_mail($to_email, $subject, $body, $headers);
 //print_r($this->email->print_debugger());die;
    echo 1;
                }
            }else{
                echo 0;
            }
             $this->db->insert('payment_details',$data);
            //if()
          }
       //  print_r(json_decode($response));die;

    }

    public function check_to_razorpay($id)
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://rzp_test_2HKZ23YQdAMfcP:5lWniGSIkaaEGluQ0yqQZBQO@api.razorpay.com/v1/payments/".$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 2b571406-e8e9-f17c-c09c-67a885538c85"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return  "cURL Error #:" . $err;
} else {
  return $response;
}
    }

    public function date_filter_for_transaction()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
        $date=$this->input->post('date');
        $date_arr=explode("-", $date);
        $start=strtotime(trim($date_arr[0]));
        $end=strtotime(trim($date_arr[1]));
           $store_id=$this->session->userdata('store_id');
//print_r($start." ".$end);die;
      $query= $this->db->query("SELECT * FROM `payment_details` WHERE `store_id` = $store_id and  created_at >=$start and created_at<= $end  ORDER BY `id` DESC");
        $data['transactions']=$query->result();
    //  print_r($this->db->last_query());die;
       // print_r();die;
         $this->load->view('date_filter_for_transaction',$data);
    }
    public function pdf()
    {
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
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
    	 if (!$this->checkauth()) {
            return redirect('control/login');
        }
    	$id=$this->input->post('id');
    	$query=$this->db->where('id',$id)->get('payment_details');
    	$result=$query->row();
    	$data['transaction']=$result;

    	$this->load->view('pdf',$data);
    	//print_r($_POST);
    }

}
