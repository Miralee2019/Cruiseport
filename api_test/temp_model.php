<?php

class Apimodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($table, $post) {

        $query = $this->db->insert($table, $post);
        return $this->db->insert_id();
    }

    public function select_data($table_name, $where_arr = '', $order_by = '', $limit1 = '', $limit2 = '') {

        $this->db->select('*');
        $this->db->from($table_name);

        if (is_array($where_arr)) {
            $this->db->where($where_arr);
        }
        if (is_array($order_by)) {
            foreach ($order_by as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        if ($limit1 != '') {
            $this->db->limit($limit2, $limit1);
        }
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            $data = $result->result();

            return $data;
        } else {
            return $result->num_rows();
        }
    }

    public function update($table, $wherearr, $updatearr) {

        $this->db->where($wherearr);
        return $this->db->update($table, $updatearr);
    }

    public function delete($table, $data) {

        // $this->db->where($id);
        // return $this->db->delete($table);

        // catch the data if data exists
        if(isset($data['id']))
        {
            $r = $data['id'];
        }
        if(isset($data['event_id']))
        {
            $event_id = $data['event_id'];
        }
        if(isset($data['provider_id']))
        {
            $provider_id = $data['provider_id'];
        }
        if(isset($data['customer_id']))
        {
            $customer_id=$data['customer_id'];
        }
        if(isset($data['user_id']))
        {
            $user_id = $data['user_id'];
        }
        if(isset($data['method']))
        {
            $s = $data['method'];
        }


        if(isset($provider_id))
        {
            if(isset($event_id))
                {
                    $sts = $this->db->where('id',$event_id);   
                }
            else{
                $sts = $this->db->where('provider_id',$provider_id);
            }    
        }
        elseif (isset($user_id)) {
            $sts = $this->db->where('id',$event_id);
        }
        elseif (isset($customer_id)) {
            $sts = $this->db->where('customer_id',$customer_id);
        }
        else{
            $sts = $this->db->where('id',$r);
        }
        $this->db->delete($table);
        $a = $this->db->affected_rows();
        if($a){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_profile($table, $id, $updatearr) {

        $this->db->where('id', $id);
        return $this->db->update($table, $updatearr);
    }

    public function getdata($table) {
        $data = $this->db->get($table);
        return $data->result();
    }

    public function getprofile($table, $id) {
        $this->db->where('id', $id);
        $profile = $this->db->get($table);
        return $profile->row();
    }

    public function getservice($table1, $table2, $table3, $user_id)
        {
            $result = $this->db->select('*, '.$table2.'.*, '.$table3.'.*')
            ->join($table2, ''.$table1.'.sub_service_id='.$table2.'.id')
            ->join($table3, ''.$table2.'.service_id='.$table3.'.id')
            ->where('user_id',$user_id)
            ->get($table1)
            ->result();
            return $result;
            // return $this->db->last_query();
    }

    public function get_service_end($table1, $table2, $table3, $data) {
        if (isset($data['user_id'])) {
            $base_id = $data['user_id'];

            $result = $this->db->select('*, ' . $table3 . '.*, ' . $table2 . '.*')
                    ->join($table2, $table1 . '.sub_service_id=' . $table2 . '.id')
                    ->join($table3, $table2 . '.service_id=' . $table3 . '.id')
                    ->where('user_id', $base_id)
                    ->get($table1)
                    ->result();
            return $result;
            // return $this->db->last_query();
        }
        if (isset($data['provider_id'])) {
            $base_id = $data['provider_id'];
            $result = $this->db->select('*, ' . $table3 . '.*, ' . $table2 . '.*')
                    ->join($table2, $table1 . '.sub_service_id=' . $table2 . '.id')
                    ->join($table3, $table2 . '.service_id=' . $table3 . '.id')
                    ->where('provider_id', $base_id)
                    ->get($table1)
                    ->result();
            return $result;
            // return $this->db->last_query();
        }
    }

    

    public function GetUserScheduled($table1,$table2,$table3,$table4,$user_id)
        {
            
            $result = $this->db->select('*, '.$table2.'.*, '.$table3.'.*, '.$table4.'.service_description')
        
        ->join($table2, $table1.'.request_id='.$table2.'.request_id')
        ->join($table3, $table2.'.provider_id='.$table3.'.id')
        ->join($table4, $table2.'.service_id='.$table4.'.id')
        ->where('user_id', $user_id)
        ->get($table1)
        ->result();
        return $result;
          // return $this->db->last_query();
    }

    public function get_timezone($table) {
        foreach ($table as $value) {
            // echo "$value <br>";
            $tab[] = $value;
        }

        if ($tab[1] == 'T_Provider') {
            // return true;
            $result = $this->db->select('*, ' . $tab[1] . '.*')
                    ->join($tab[1], '' . $tab[0] . '.provider_id=' . $tab[1] . '.id')
                    ->get($tab[0])
                    ->result();
            return $result;
            // return $this->db->last_query();
        } elseif ($tab[1] == 'T_User') {
            $result = $this->db->select('*, ' . $tab[1] . '.*')
                    ->join($tab[1], '' . $tab[0] . '.user_id=' . $tab[1] . '.id')
                    ->get($tab[0])
                    ->result();
            return $result;
            // return $this->db->last_query();
        } else {
            return "Table name not found";
        }
    }

    public function tracklatlong($table, $data) {
        $r = $data['id'];
        $sts = $this->db->where('id', $r);
        $a = $this->db->get($table);
        return $a->row();
    }

    public function searchbyservice($search) {
        if ($search) {
            $res = $this->db->query("SELECT * FROM `T_Provider` WHERE service_id = (SELECT service_id FROM `T_SubService` WHERE sub_service_name LIKE '$search%') OR service_id =(SELECT id FROM `T_Service` WHERE service_name LIKE '$search%' )");
            return $res->result();
        } else {
            return false;
        }
    }

    public function searchbylocation($search) {
        if ($search) {
            $res = $this->db->query("SELECT * FROM `T_Provider` WHERE address LIKE '$search%' OR home_address LIKE '$search%' OR office_address LIKE '$search%'");
            return $res->result();
        } else {
            return false;
        }
    }

    public function searchprovidername($search) {
        if ($search) {
            $res = $this->db->query("SELECT * FROM `T_Provider` WHERE f_name LIKE '$search%' OR l_name LIKE '$search%'  ");
            return $res->result();
        } else {
            return false;
        }
    }

    public function getsearchdata($latitude, $longitude) {
        //  $data = $this->db->get($table);

        $res = $this->db->query("select * from (SELECT *,(((acos(sin(($latitude*pi()/180)) * sin((`Latitude`*pi()/180))+cos(($latitude*pi()/180)) * cos((`Latitude`*pi()/180)) * cos((($longitude- `Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `T_Provider`) as tbl where distance<=50 ");
        return $res->result();
    }

    public function get_user_listing($wherearr) {

        $provider_id = $wherearr['provider_id'];
        $res = $this->db->query("SELECT u.id as user_id,u.username,u.emailid,u.f_name,u.l_name,u.phone_no,u.latitude,u.longitude,u.profile_pic,u.address_line1,u.address_line2,u.city,u.state,u.zip,u.gender,u.dob FROM `T_ProvideRequests` as p inner join T_User as u on u.id=p.user_id inner join T_SubService as s on s.id=p.sub_service_id where p.provider_id=$provider_id group by u.id ");
//           return $res->result();
        return  $res->result_array();
        
        
    }
     public function email_verification($table)
        {
            foreach ($table as $value) {
                // echo "$value <br>";
                $tab[] = $value;
            }
            //return $tab[5];
            $result = $this->db->select('*, '.$tab[1].'.*')
            ->join($tab[1], ''.$tab[0].'.provider_id='.$tab[1].'.id')
            ->get($tab[0])
            ->result();
            return $result;
            // return $this->db->last_query();
    }

    // date: 29/07
    public function get_transaction_details($table1, $table2, $wherearr){
        if(isset($wherearr['provider_id'])){
            $id = $wherearr['provider_id'];
            $result = $this->db->select('*, '.$table2.'.*')
                ->join($table2, $table1.'.request_id='.$table2.'.request_id')
                ->where($table1.'.provider_id', $id)
                ->get($table1)
                ->result();
            return $result;
        }
        if(isset($wherearr['user_id'])){
            $id = $wherearr['user_id'];
            $result = $this->db->select('*, '.$table2.'.*')
                ->join($table2, $table1.'.request_id='.$table2.'.request_id')
                ->where($table1.'.user_id', $id)
                ->get($table1)
                ->result();
            return $result;
        }
            // return $this->db->last_query();
    }

    // date:30/07
    public function getprovider($sub_service_id, $wherearr)
        {
            $res = $this->db->query("SELECT *,`T_Provider`.id as p_id FROM `T_Provider` LEFT JOIN `T_SubService` ON `T_Provider`.`sub_service_id` = `T_SubService`.`id` LEFT JOIN `T_Service` ON `T_SubService`.`service_id` = `T_Service`.`id` LEFT JOIN `T_ProviderConsultation` ON `T_Provider`.`id` = `T_ProviderConsultation`.`provider_id` LEFT JOIN `T_Experience` ON `T_Provider`.`id` = `T_Experience`.`provider_id` WHERE `T_Provider`.`sub_service_id` = $sub_service_id");
          // return $this->db->last_query();
                return $res->result();
    }

    public function avarage($table,$provider_id){
        $res=$this->db->query("SELECT AVG(rating) as rating FROM $table WHERE provider_id='".$provider_id."'");
        return $res->result();
    }

    public function book_appointment($table1,$table2,$wherearr)
        {
            $result = $this->db->select('*, '.$table2.'.*')
            ->join($table2, ''.$table1.'.provider_id='.$table2.'.id')
            ->where($wherearr)
            ->get($table1)
            ->result();
            return $result;
          // return $this->db->last_query();
    }


   public function provider_details($table1,$table2,$table3,$table4,$table5,$wherearr)
        {
            $result = $this->db->select('*, '.$table2.'.*')
            ->join($table2, ''.$table1.'.provider_id='.$table2.'.id')
            ->join($table3, ''.$table2.'.sub_service_id='.$table3.'.id')
            ->join($table4, ''.$table3.'.service_id='.$table4.'.id')
            ->join($table5, ''.$table1.'.provider_id='.$table5.'.id')
            ->where($wherearr)
            ->get($table1)
            ->result();
           return $result;
           // return $this->db->last_query();
    }

    public function get_notification($table1,$table2,$table3,$wherearr,$limit1 = '', $limit2 = '')
    {
        if ($limit1 != '') {
            $this->db->limit($limit2, $limit1);
        }
        $result = $this->db->select('*, '.$table2.'.*')
            ->join($table2, ''.$table1.'.provider_id='.$table2.'.id')
            ->join($table3, ''.$table1.'.customer_id='.$table3.'.id')
            ->where($wherearr)
            ->get($table1)
            ->result();
            return $result;
          // return $this->db->last_query();
    }
    
    public function appointments($table1,$table2,$table3,$table4,$wherearr,$limit1 = '', $limit2 = '')
    {
        if ($limit1 != '') {
            $this->db->limit($limit2, $limit1);
        }
        $result = $this->db->select('*, '.$table4.'.sub_service_name, '.$table2.'.*')
            ->join($table2, ''.$table1.'.provider_id='.$table2.'.id')
            ->join($table3, ''.$table1.'.user_id='.$table3.'.id')
            ->join($table4, ''.$table1.'.sub_service_id='.$table4.'.id')
            ->where($wherearr)
            ->get($table1)
            ->result();
            return $result;
          // return $this->db->last_query();
    }

    public function searchbyservice1($search) {
         if ($search) {
           $res = $this->db->query("SELECT T_Provider.id as id,T_Provider.f_name as first_name,T_Provider.l_name as last_name,T_Provider.availablity as availablity,T_Provider.latitude as latitude,T_Provider.longitude as longitude,T_Provider.profile_pic as profile_pic,T_Provider.address as address,T_Provider.office_address as office_address,T_SubService.sub_service_name as sub_service_name,T_ProviderConsultation.face_to_face_charge as consultation,T_Experience.experience_year as experience_year,T_Experience.experience_month as experience_month FROM `T_Provider` left join `T_SubService` on `T_SubService`.id=T_Provider.`sub_service_id` left join `T_Specialization` on `T_Specialization`.provider_id=`T_Provider`.`id` left join `T_Experience` on `T_Experience`.provider_id= `T_Provider`.`id` left join `T_ProviderConsultation` on `T_ProviderConsultation`.provider_id= `T_Provider`.`id` WHERE `f_name` like'$search%' || `l_name` like '$search%' || `T_SubService`.sub_service_name like '$search%'  ");
            return $res->result();
         } else {
            return false;
         }
     }

    public function count($provider_id) {
        $res=$this->db->query("SELECT COUNT(provider_id) as counting FROM T_ProviderReview where provider_id='".$provider_id."'");
        return $res->result();

     }

    public function filter($search, $specialization, $location, $time) {
        $query = "SELECT *,`T_Provider`.id as p_id FROM `T_Provider` LEFT JOIN `T_SubService` ON `T_Provider`.`sub_service_id` = `T_SubService`.`id` LEFT JOIN `T_Service` ON `T_SubService`.`service_id` = `T_Service`.`id` LEFT JOIN `T_ProviderConsultation` ON `T_Provider`.`id` = `T_ProviderConsultation`.`provider_id` LEFT JOIN `T_Experience` ON `T_Provider`.`id` = `T_Experience`.`provider_id` LEFT JOIN `T_Specialization` ON `T_Provider`.`id` = `T_Specialization`.`provider_id` WHERE ";
        
        $myname = explode(' ', $search);
        if($search){
            foreach ($myname as $key) {
                $name = $key;
                $query .= "(`T_Provider`.`f_name` LIKE '$name%' OR `T_Provider`.`l_name` LIKE '$name%')";
                $query .= " AND ";
            }
        }
        if ($location) {
            $query .= "(`T_Provider`.`address` LIKE '%$location%' OR `T_Provider`.`home_address` LIKE '%$location%' OR `T_Provider`.`office_address` LIKE '%$location%')";
            $query .= " AND ";
        }
        if ($specialization) {
            $query .= "`T_SubService`.`sub_service_name` LIKE '$specialization%'";
            $query .= " AND ";
        }
        if ($time) {
            // $time1 = string($time);
            $query .= "(`T_ProviderConsultation`.`home_available_from` <= '".$time."' OR `T_ProviderConsultation`.`face_available_from` <= '".$time."' OR `T_ProviderConsultation`.`video_available_from` <= '".$time."' OR `T_ProviderConsultation`.`chat_available_from` <= '".$time."')";
            $query .= " AND ";
        }
        if(true){
            $query .= "1";
        }
        $result = $this->db->query($query);
        return $result->result();
        // return $this->db->last_query();
    }
    public function searchquestions($search,$is_public) {
         $res=$this->db->query("SELECT * FROM `T_AskQuestions` WHERE `T_AskQuestions`.`is_public` = $is_public AND (question_details LIKE '%$search%' OR question LIKE '%$search%')");
         return $res->result();

      }

}

//  main class end