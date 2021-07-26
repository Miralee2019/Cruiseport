<?php

class Adminmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function creditRemaining($store_id){
        $q = $this->db->query(
            'SELECT SUM(maximum_point) AS credits FROM `T_StoreOffer` WHERE store_id = '.$store_id
        );
        return $q->result();
    }

    function userWalkinDetails(){
        $q = $this->db->query(
            'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,TIMESTAMPDIFF(HOUR,T_BeaconActivity.created_date,NOW()) AS difftime, T_BeaconActivity.beacon_id,
            T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,
            T_BeaconActivity.exit_time, T_User.name, T_User.profile_image FROM `T_BeaconActivity`INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id'
        );
        return $q->result();
    }

    function totalTimeSpent(){
        $q = $this->db->query(
            'SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time` ,T_BeaconActivity.beacon_id,
            T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,
            T_BeaconActivity.exit_time, T_User.name FROM `T_BeaconActivity`INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id'
        );
        return $q->result();
    }

    function totalUsers(){
        $q = $this->db->query(
            'SELECT COUNT(user_id) AS users FROM T_User'
            );
        return $q->result();        
    }


    function totalSharesByOffer($store_offer_id){

        $q = $this->db->query(
            'SELECT COUNT(store_offer_id) AS shares FROM T_SocialSharePoint
            WHERE store_offer_id = '.$store_offer_id);
        // var_dump($this->db->last_query());die;
        return $q->result();
    }

    function todayShares($store_offer_id){
        $q = $this->db->query(
            'SELECT COUNT(*) AS shares FROM T_SocialSharePoint 
            WHERE created_date > DATE_SUB(NOW(), INTERVAL 1 DAY) 
            AND store_offer_id = '.$store_offer_id);
        // var_dump($this->db->last_query());die;
        return $q->result();
    }

    function totalFavorites($type_id){
        $q = $this->db->query(
            'SELECT COUNT(type_id) AS favorite FROM T_UserFavorites WHERE
            type_id = '.$type_id);

        return $q->result();   
    }
    
    function totalWalkins($store_id){
        $q = $this->db->query('
            SELECT COUNT(T_BeaconActivity.user_id) AS walkin FROM `T_BeaconActivity`
             INNER JOIN T_Beacon ON T_Beacon.beacon_id = T_BeaconActivity.beacon_id  
            WHERE T_Beacon.store_id = '.$store_id);
        return $q->result();
    
    }

    function todayWalkins($store_id){
        $q = $this->db->query('
            SELECT COUNT(T_BeaconActivity.user_id) AS walkin FROM `T_BeaconActivity`
             INNER JOIN T_Beacon ON T_Beacon.beacon_id = T_BeaconActivity.beacon_id  
            WHERE T_BeaconActivity.created_date > DATE_SUB(NOW(), INTERVAL 1 DAY) AND T_Beacon.store_id = '.$store_id
            );
        return $q->result();
    
    }

    function activity($store_id){

        $q = $this->db->query('SELECT T_Store.store_id , ROUND(TIME_TO_SEC(TIMEDIFF(NOW(), T_StoreOffer.last_updated_date)) / 60) AS minute, T_Store.store_email, T_Store.store_logo,  T_Store.status_id , T_StoreOffer.store_offer_id FROM `T_StoreOffer` INNER JOIN T_Store ON T_Store.store_id = T_StoreOffer.store_id  
            WHERE T_Store.store_id = '.$store_id.' ORDER BY `T_StoreOffer`.`store_offer_id`  DESC LIMIT 1');
   // var_dump($this->db->last_query());die;  
        return $q->result();
    }

    function totalShares(){
        $q = $this->db->query('SELECT (SUM(facebook_points)+SUM(twitter_points)) as total FROM `T_StoreOfferSocialPoint`');
        return $q->result();
    }

    function offferActives($store_id){
        $q = $this->db->query('SELECT COUNT(offer_status) as active FROM `T_StoreOffer` WHERE offer_status = 1 AND store_id ='.$store_id);
        return $q->result();
    }

     function monthWise($store_id, $month){
        $q = $this->db->query('SELECT SUM(walking_points) as stat_count 
             FROM `T_StoreOfferSocialPoint` WHERE MONTH(created_date) = '.$month.' AND store_id = '.$store_id);
        return $q->result();        
    }




    public function getFullStoreOfferDetail($store_id){
            $q=$this->db->select('T_StoreOffer.title, T_StoreOffer.offer_status,T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name,T_Store.walking_point As store_walkin')
        // ->join('T_Store','T_Store.store_id = T_Store.store_id')
        // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
        
        ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
        
        ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
        ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
        ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
        ->join('T_Store', 'T_Store.store_id = T_StoreOffer.store_id')


        ->where('T_StoreOffer.store_id',$store_id)
        ->where('T_StoreOffer.offer_status !=','11')
                // ->where_in('T_UserCar.status', array('0','1','2'))
        ->get('T_StoreOffer');
// var_dump($this->db->last_query());die;
        return $q->result();
        
    }



    public function getFullStoreOfferDetailWithStoreId($store_offer_id){
            $q=$this->db->select('T_StoreOffer.title,T_StoreOffer.maximum_point,T_StoreOffer.offer_visibility, T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points')
        // ->join('T_Store','T_Store.store_id = T_Store.store_id')
        // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
        
        ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
        
        ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
        ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')


        ->where('T_StoreOffer.store_offer_id',$store_offer_id)
        // ->where('T_UserCar.isPaired','0')
                // ->where_in('T_UserCar.status', array('0','1','2'))
        ->get('T_StoreOffer');
// var_dump($this->db->last_query());die;
        return $q->result();
        
    }


        public function getFullStoreOfferDetailWithDashboard($store_id, $offer_status){
            $q=$this->db->select('T_StoreOffer.title, T_StoreOffer.offer_status,T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name')
        // ->join('T_Store','T_Store.store_id = T_Store.store_id')
        // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
        
        ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
        
        ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
        ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
        ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')


        ->where('T_StoreOffer.store_id',$store_id)
        ->where('T_StoreOffer.offer_status',$offer_status)
        
        // ->where('T_UserCar.isPaired','0')
                // ->where_in('T_UserCar.status', array('0','1','2'))
        ->get('T_StoreOffer');
// var_dump($this->db->last_query());die;
        return $q->result();
        
    }




    
    public function check_store($user_id, $store_id){

        $q = $this->db->query('SELECT Hour(TIMEDIFF(now(),`created_date`)) AS diff FROM T_FavouriteStore where user_id = '.$user_id. ' AND store_id ='.'"'.$store_id.'"');
        // $q =   $this->db->query('SELECT `created_date` FROM T_User WHERE user_id ='.$user_id);
    // var_dump($this->db->last_query());die;   
        return $q->result();
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
        $this->db->update($table, $updatearr);
        $a = $this->db->affected_rows();
        if($a){
            return true;
        }
        else{
            return false;
        }
    }

    
    public function delete($table, $wherearr) {

        if (is_array($wherearr)) {
            $this->db->where($wherearr);
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

    
    public function insert_multiple($table_array, $post_array){
        $i = 0;
        
        foreach ($table_array as $key) {
            # code...
            $table = $table_array[$i];
            $ins = $this->db->insert($table, $post_array);
            $i++;
        }
        return $ins;
     }


// Walkin information getting methods 27 june

    function getStoreWalkinDetailsByMonth($store_id, $month){

        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS stat_count FROM `T_BeaconActivity` WHERE MONTH(created_date) = '.$month.' AND store_id = '.$store_id.' AND flag_of_inside_store = "inside_detection"  GROUP BY MONTH(created_date)');

        return $q->result();

    }

    function totalWalkinsInStore($store_id){

        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE store_id = '.$store_id.' AND flag_of_inside_store = "inside_detection"');

        return $q->result();
    }


    function todayWalkinsInStore($store_id){
    
        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE T_BeaconActivity.created_date > DATE_SUB(NOW(), INTERVAL 1 DAY) AND flag_of_inside_store = "inside_detection" AND T_BeaconActivity.store_id = '.$store_id);

        return $q->result();

    }

    function totalTimeSpentInStore($store_id){
        $q = $this->db->query(
            'SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time`FROM `T_BeaconActivity`
            WHERE T_BeaconActivity.flag_of_detection = "detected" 
            AND T_BeaconActivity.exit_time != "00:00:00"
            AND T_BeaconActivity.store_id = '.$store_id
        );
        
        return $q->result();
    }

    function totalTimeSpentOfUser($store_id, $user_id){
        $q = $this->db->query(
            'SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time_of_user`FROM `T_BeaconActivity`
            WHERE T_BeaconActivity.flag_of_detection = "detected" 
            AND T_BeaconActivity.exit_time != "00:00:00"
            AND T_BeaconActivity.user_id = "'.$user_id.'"
            AND T_BeaconActivity.store_id = '.$store_id
        );
        // var_dump($this->db->last_query());die;
        return $q->result();
    }


    function userWalkinFullInformation($store_id){
        $q = $this->db->query(
            'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,TIMESTAMPDIFF(HOUR,T_BeaconActivity.created_date,NOW()) AS difftime, T_BeaconActivity.beacon_id,T_BeaconActivity.user_id, T_BeaconActivity.detected_time,T_BeaconActivity.detected_date, T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_User.name,T_BeaconActivity.created_date,T_User.profile_image,T_BeaconActivity.store_id,T_Store.walking_point,T_Store.store_first_name 
            FROM `T_BeaconActivity` 
            INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
            INNER JOIN T_Store ON T_Store.store_id = T_BeaconActivity.store_id
            WHERE T_BeaconActivity.flag_of_detection = "detected" AND T_BeaconActivity.store_id = '.$store_id
        );
        return $q->result();
    }


    

    function getLastWalkinOfUser($store_id, $user_id, $order ){

        $q = $this->db->query(
            'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,T_BeaconActivity.beacon_id,T_BeaconActivity.user_id, T_BeaconActivity.detected_time,T_BeaconActivity.detected_date, T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_User.name, T_User.profile_image,T_BeaconActivity.store_id,T_Store.walking_point 
            
            FROM `T_BeaconActivity` 
            INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
            INNER JOIN T_Store ON T_Store.store_id = T_BeaconActivity.store_id
            WHERE T_BeaconActivity.flag_of_detection = "detected" 
            AND T_BeaconActivity.exit_time != "00:00:00"
            AND T_BeaconActivity.user_id = '.$user_id.'
            AND T_BeaconActivity.store_id = "'.$store_id.'" 
            ORDER BY beacon_activity_id '.$order.'  LIMIT 1'
        );
        return $q->result();
    }


    // For getting user report of walkin 28 june


    function userWalkinThrough($store_id){
        $q = $this->db->query(
            'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,TIMESTAMPDIFF(HOUR,T_BeaconActivity.created_date,NOW()) AS difftime, T_BeaconActivity.beacon_id,T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_Store.walking_point, T_User.name, T_User.profile_image 
            
            FROM `T_BeaconActivity`
            INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
            INNER JOIN T_Store ON T_Store.store_id = T_BeaconActivity.store_id
            WHERE T_BeaconActivity.flag_of_detection = "detected"
            AND T_BeaconActivity.store_id = "'.$store_id.'"
            GROUP BY T_BeaconActivity.user_id'


        );
        return $q->result();
    }

    function getHeatCountOfUser($beacon_key){
        $q = $this->db->query(
            'SELECT COUNT(DISTINCT(user_id)) AS heat_count_of_users FROM `T_BeaconActivity` WHERE beacon_key = "'.$beacon_key.'"'
        );
        // return $this->db->last_query();
        return $q->result();
    }





}

//  main class end