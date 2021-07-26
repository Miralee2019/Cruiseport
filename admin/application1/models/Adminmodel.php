<?php

class Adminmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function creditRemaining($store_id) {
        $q = $this->db->query(
            'SELECT SUM(maximum_point) AS credits FROM `T_StoreOffer` WHERE store_id = ' . $store_id
        );
        return $q->result();
    }

    function userWalkinDetails() {
        $q = $this->db->query(
            'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,TIMESTAMPDIFF(HOUR,T_BeaconActivity.created_date,NOW()) AS difftime, T_BeaconActivity.beacon_id,
            T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,
            T_BeaconActivity.exit_time, T_User.name, T_User.profile_image FROM `T_BeaconActivity`INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id'
        );
        return $q->result();
    }

    function totalTimeSpent() {
        $q = $this->db->query(
            'SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time` ,T_BeaconActivity.beacon_id,
            T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,
            T_BeaconActivity.exit_time, T_User.name FROM `T_BeaconActivity`INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id'
        );
        return $q->result();
    }

    function totalUsers() {
        $q = $this->db->query(
            'SELECT COUNT(user_id) AS users FROM T_User'
        );
        return $q->result();
    }

    function totalSharesByOffer($store_offer_id) {

        $q = $this->db->query(
            'SELECT COUNT(store_offer_id) AS shares FROM T_SocialSharePoint
            WHERE store_offer_id = ' . $store_offer_id);
        // var_dump($this->db->last_query());die;
        return $q->result();
    }

    function totalSharesByOfferdash($store_id) {

        $q = $this->db->query(
            //     'SELECT COUNT(store_offer_id) AS shares FROM T_SocialSharePoint
            // WHERE store_id = ' . $store_id);
            'SELECT COUNT(ssp.store_offer_id) AS shares 
            FROM T_SocialSharePoint ssp 
            JOIN T_StoreOffer so ON ssp.store_offer_id = so.store_offer_id 
            WHERE so.offer_status = 1 AND ssp.store_id = ' . $store_id);
        // var_dump($this->db->last_query());die;
        return $q->result();
    }

    function todayShares($store_offer_id) {
        // $q = $this->db->query(
        //     'SELECT COUNT(*) AS shares FROM T_SocialSharePoint 
        //     WHERE created_date > DATE_SUB(NOW(), INTERVAL 0 DAY) 
        //     AND store_offer_id = '.$store_offer_id);
        // Linosys developer code
        $q = $this->db->query(
            'SELECT COUNT(*) AS shares FROM T_SocialSharePoint 
            WHERE DATE(created_date) = CURDATE()
            AND store_offer_id = ' . $store_offer_id);
        // Linosys developer code
        // var_dump($this->db->last_query());die;   
        return $q->result();
    }

    function totalFavorites($type_id) {
        $q = $this->db->query(
            'SELECT COUNT(type_id) AS favorite FROM T_UserFavorites WHERE
            type_id = ' . $type_id);

        return $q->result();
    }

    function totalWalkins($store_id) {
        $q = $this->db->query('
            SELECT COUNT(T_BeaconActivity.user_id) AS walkin FROM `T_BeaconActivity`
            INNER JOIN T_Beacon ON T_Beacon.beacon_id = T_BeaconActivity.beacon_id  
            WHERE T_Beacon.store_id = ' . $store_id);
        return $q->result();
    }

    function totalWalkins_Filter($store_id, $start_date, $end_date) {
        $q = $this->db->query('
            SELECT COUNT(T_BeaconActivity.user_id) AS walkin FROM `T_BeaconActivity`
            INNER JOIN T_Beacon ON T_Beacon.beacon_id = T_BeaconActivity.beacon_id  
            WHERE T_Beacon.store_id = ' . $store_id. ' AND detected_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"');
        return $q->result();
    }

    function todayWalkins($store_id) {
        $q = $this->db->query('
            SELECT COUNT(T_BeaconActivity.user_id) AS walkin FROM `T_BeaconActivity`
            INNER JOIN T_Beacon ON T_Beacon.beacon_id = T_BeaconActivity.beacon_id  
            WHERE T_BeaconActivity.created_date > DATE_SUB(NOW(), INTERVAL 1 DAY) AND T_Beacon.store_id = ' . $store_id
        );
        return $q->result();
    }

    function activity($store_id) {

        $q = $this->db->query('SELECT T_Store.store_id , ROUND(TIME_TO_SEC(TIMEDIFF(NOW(), T_StoreOffer.last_updated_date)) / 60) AS minute, T_Store.store_email, T_Store.store_logo,  T_Store.status_id , T_StoreOffer.store_offer_id FROM `T_StoreOffer` INNER JOIN T_Store ON T_Store.store_id = T_StoreOffer.store_id  
            WHERE T_Store.store_id = ' . $store_id . ' ORDER BY `T_StoreOffer`.`store_offer_id`  DESC LIMIT 1');
        // var_dump($this->db->last_query());die;  
        return $q->result();
    }

    function totalShares() {
        $q = $this->db->query('SELECT (SUM(facebook_points)+SUM(twitter_points)) as total FROM `T_StoreOfferSocialPoint`');
        return $q->result();
    }

    function offferActives($store_id) {
        $q = $this->db->query('SELECT COUNT(offer_status) as active FROM `T_StoreOffer` WHERE offer_status = 1 AND store_id =' . $store_id);
        return $q->result();
    }

    function monthWise($store_id, $month) {
        $q = $this->db->query('SELECT SUM(walking_points) as stat_count 
           FROM `T_StoreOfferSocialPoint` WHERE MONTH(created_date) = ' . $month . ' AND store_id = ' . $store_id);
        return $q->result();
    }

    public function getFullStoreOfferDetail($store_id) {
        $q = $this->db->select('T_StoreOffer.title, T_StoreOffer.offer_status,T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name,T_Store.walking_point As store_walkin')
                // ->join('T_Store','T_Store.store_id = T_Store.store_id')
                // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
        ->join('T_StoreOfferTermCondition', 'T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
        ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
        ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
        ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
        ->join('T_Store', 'T_Store.store_id = T_StoreOffer.store_id')
        ->where('T_StoreOffer.store_id', $store_id)
        ->where('T_StoreOffer.offer_status !=', '11')
                // ->where_in('T_UserCar.status', array('0','1','2'))
        ->get('T_StoreOffer');
        // var_dump($this->db->last_query());die;
        return $q->result();
    }

    public function getFullStoreOfferDetailWithStoreId($store_offer_id) {
        $q = $this->db->select('T_StoreOffer.title,T_StoreOffer.maximum_point,T_StoreOffer.offer_visibility, T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points')
                // ->join('T_Store','T_Store.store_id = T_Store.store_id')
                // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
        ->join('T_StoreOfferTermCondition', 'T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
        ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
        ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
        ->where('T_StoreOffer.store_offer_id', $store_offer_id)
                // ->where('T_UserCar.isPaired','0')
                // ->where_in('T_UserCar.status', array('0','1','2'))
        ->get('T_StoreOffer');
// var_dump($this->db->last_query());die;
        return $q->result();
    }

    public function getFullStoreOfferDetailWithDashboard($store_id, $offer_status) {
        $q = $this->db->select('T_StoreOffer.title, T_StoreOffer.offer_status,T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name')
                // ->join('T_Store','T_Store.store_id = T_Store.store_id')
                // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
        ->join('T_StoreOfferTermCondition', 'T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
        ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
        ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
        ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
        ->where('T_StoreOffer.store_id', $store_id)
        ->where('T_StoreOffer.offer_status', $offer_status)

                // ->where('T_UserCar.isPaired','0')
                // ->where_in('T_UserCar.status', array('0','1','2'))
        ->get('T_StoreOffer');
// var_dump($this->db->last_query());die;
        return $q->result();
    }

    public function check_store($user_id, $store_id) {

        $q = $this->db->query('SELECT Hour(TIMEDIFF(now(),`created_date`)) AS diff FROM T_FavouriteStore where user_id = ' . $user_id . ' AND store_id =' . '"' . $store_id . '"');
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
        if ($a) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $wherearr) {

        if (is_array($wherearr)) {
            $this->db->where($wherearr);
        }

        $this->db->delete($table);

        $a = $this->db->affected_rows();
        if ($a) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_multiple($table_array, $post_array) {
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

    function getStoreWalkinDetailsByMonth($store_id, $month) {

        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS stat_count FROM `T_BeaconActivity` WHERE MONTH(created_date) = ' . $month . ' AND store_id = ' . $store_id . ' AND flag_of_inside_store = "inside_detection"  GROUP BY MONTH(created_date)');

        return $q->result();
    }


    function totalWalkinsInStore_Filter($store_id,$start_date,$end_date) {

        //$q1 = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE store_id = '.$store_id.' AND flag_of_inside_store = "inside_detection"');
        // $q2 = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE store_id = '.$store_id.' AND flag_of_detection = "detected"');
        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE store_id = ' . $store_id . ' AND flag_of_inside_store = "inside_detection" AND cast(created_date as date) BETWEEN "'.$start_date.'" AND "'.$end_date.'"');
        return $q->result();
    }

    function totalWalkinsInStore($store_id) {

        //$q1 = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE store_id = '.$store_id.' AND flag_of_inside_store = "inside_detection"');
        // $q2 = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE store_id = '.$store_id.' AND flag_of_detection = "detected"');
        $q2 = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE store_id = ' . $store_id . ' AND flag_of_inside_store = "inside_detection"');
        // die($this->db->last_query($q2));
        return $q2->result();
    }

    function todayWalkinsInStore($store_id) {
        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS walkin FROM `T_BeaconActivity` WHERE T_BeaconActivity.created_date > DATE_SUB(NOW(), INTERVAL 1 DAY) AND flag_of_inside_store = "inside_detection" AND T_BeaconActivity.store_id = ' . $store_id);

        return $q->result();
    }

    function todaysInStore($store_id) {
        $date=date('Y-m-d');

        $q = $this->db->query('SELECT * FROM `T_BeaconActivity` WHERE  DATE(`created_date`) = "'.$date.'" AND flag_of_detection = "detected" AND T_BeaconActivity.store_id = ' . $store_id);

        return $q->result();
    }
     function todaysInStore1($store_id,$user_id) {
        $date=date('Y-m-d');

        $q = $this->db->query('SELECT * FROM `T_BeaconActivity` WHERE  DATE(`created_date`) = "'.$date.'" and user_id='.$user_id.' AND flag_of_detection = "detected" AND T_BeaconActivity.store_id = ' . $store_id);

        return $q->result();
    }

    function totalTimeSpentInStore_Filter($store_id,$start_date,$end_date) {
        $q = $this->db->query(
            'SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time`FROM `T_BeaconActivity`
            WHERE T_BeaconActivity.flag_of_detection = "detected" 
            AND T_BeaconActivity.exit_time != "00:00:00"
            AND T_BeaconActivity.store_id = ' . $store_id . 
            ' AND cast(created_date as date) BETWEEN  "'.$start_date.'" AND "'.$end_date.'"');
        // print_r($this->db->last_query());
        // die();
      // $res =$q->result();
       // echo $this->db->last_query();
       // die(); 
        return $q->result();
    }
    function totalTimeSpentInStore($store_id) {
        $q = $this->db->query(
            'SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time`FROM `T_BeaconActivity`
            WHERE T_BeaconActivity.flag_of_detection = "detected" 
            AND T_BeaconActivity.exit_time != "00:00:00"
            AND T_BeaconActivity.store_id = ' . $store_id 

        );
        // print_r($this->db->last_query());
        // die();

        return $q->result();
    }

    function totalTimeSpentOfUser($store_id, $user_id) {
        $q = $this->db->query(
            'SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time_of_user`FROM `T_BeaconActivity`
            WHERE T_BeaconActivity.flag_of_detection = "detected" 
            AND T_BeaconActivity.exit_time != "00:00:00"
            AND T_BeaconActivity.user_id = "' . $user_id . '"
            AND T_BeaconActivity.store_id = ' . $store_id
        );
        // var_dump($this->db->last_query());die;
        return $q->result();
    }

    function userWalkinFullInformation($store_id, $order) {
        $q = $this->db->query(
            'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,TIMESTAMPDIFF(HOUR,T_BeaconActivity.created_date,NOW()) AS difftime, T_BeaconActivity.beacon_id,T_BeaconActivity.user_id, T_BeaconActivity.detected_time,T_BeaconActivity.detected_date, T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_User.name,T_User.email,T_BeaconActivity.created_date,T_User.profile_image,T_BeaconActivity.store_id,T_Store.walking_point,T_Store.store_first_name 
            FROM `T_BeaconActivity` 
            INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
            INNER JOIN T_Store ON T_Store.store_id = T_BeaconActivity.store_id
            WHERE T_BeaconActivity.flag_of_detection = "detected" AND T_BeaconActivity.store_id = "' . $store_id . '" AND  beacon_activity_id = (SELECT max(beacon_activity_id) FROM T_BeaconActivity WHERE store_id = "' . $store_id . '" and T_User.user_id = T_BeaconActivity.user_id  ORDER BY beacon_activity_id desc) 
            GROUP BY T_BeaconActivity.user_id ORDER BY T_BeaconActivity.created_date ' . $order
        );
        // print_r($this->db->last_query());die();

        return $q->result();
    }

    function getLastWalkinOfUser($store_id, $user_id, $order) {

        $q = $this->db->query(
            'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,T_BeaconActivity.beacon_id,T_BeaconActivity.user_id, T_BeaconActivity.detected_time,T_BeaconActivity.detected_date, T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_User.name, T_User.profile_image,T_BeaconActivity.store_id,T_Store.walking_point 

            FROM `T_BeaconActivity` 
            INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
            INNER JOIN T_Store ON T_Store.store_id = T_BeaconActivity.store_id
            WHERE T_BeaconActivity.flag_of_detection = "detected" 
            AND T_BeaconActivity.exit_time != "00:00:00"
            AND T_BeaconActivity.user_id = ' . $user_id . '
            AND T_BeaconActivity.store_id = "' . $store_id . '" 
            ORDER BY beacon_activity_id ' . $order . '  LIMIT 1'
        );
        // echo "<pre>";
        // print_r($this->db->last_query());
        // echo "</pre>";
        // die();
        return $q->result();
    }

    // For getting user report of walkin 28 june

    //cast(activity_date as date) BETWEEN  date('".$start_date."') AND date('".$end_date."')"
    function userActivity($store_id) {
        
        $q = $this->db->query('SELECT ta.*, tu.email, tu.name, tu.profile_image
                               FROM T_ActivityLog ta 
                               JOIN T_User tu ON ta.user_id = tu.user_id 
                               WHERE ta.store_id = '.$store_id.' AND ta.activity_log_id IN (SELECT MAX(activity_log_id) FROM T_ActivityLog WHERE store_id = '.$store_id.' GROUP BY user_id) 
                              ORDER BY activity_log_id DESC');

       // $res =$q->result();
       // echo $this->db->last_query();
       // die();        

        return $q->result();

    }


    function userActivity_Filter($store_id, $start_date, $end_date) {
        // $q = $this->db->query(
        //         'SELECT ta.*, tso.title, tu.email, tu.name, tu.profile_image, tssp.points
        //     FROM T_ActivityLog ta JOIN T_StoreOffer tso ON ta.store_offer_id = tso.store_offer_id
        //     JOIN T_User tu ON ta.user_id = tu.user_id JOIN T_SocialSharePoint tssp ON ta.user_id = tssp.user_id 
        //     WHERE ta.store_id =' . $store_id . ' AND tssp.store_offer_id = ta.store_offer_id GROUP BY ta.user_id ORDER BY ta.activity_log_id DESC');
        // print_r($this->db->last_query());
        // die();

        //AND cast(created_date as date) BETWEEN  date('.$start_date.') AND date('.$end_date.')'
        /*
        if(empty($start_date) && empty($end_date)) {
            $q = $this->db->query('SELECT ta.*, tu.email, tu.name, tu.profile_image
                FROM T_ActivityLog ta JOIN T_User tu ON ta.user_id = tu.user_id WHERE ta.store_id = '. $store_id. ' 
                AND ta.activity_log_id IN (SELECT MAX(activity_log_id) FROM T_ActivityLog WHERE store_id = '.$store_id.' GROUP BY user_id) ORDER BY activity_log_id DESC');
        } else {
            $q = $this->db->query('SELECT ta.*, tu.email, tu.name, tu.profile_image
                FROM T_ActivityLog ta JOIN T_User tu ON ta.user_id = tu.user_id WHERE ta.store_id = '. $store_id. ' AND activity_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"
                AND ta.activity_log_id IN (SELECT MAX(activity_log_id) FROM T_ActivityLog WHERE store_id = '.$store_id.' GROUP BY user_id) ORDER BY activity_log_id DESC');
            // die($this->db->last_query());
        }*/

        $q = $this->db->query('SELECT ta.*, tu.email, tu.name, tu.profile_image
                               FROM T_ActivityLog ta 
                               JOIN T_User tu ON ta.user_id = tu.user_id 
                               WHERE ta.store_id = '.$store_id.' 
                               AND ta.activity_log_id IN (SELECT MAX(activity_log_id) FROM T_ActivityLog WHERE store_id = '.$store_id.' GROUP BY user_id) AND cast(ta.created_date as date) BETWEEN "'.$start_date.'" AND "'.$end_date.'"
                              ORDER BY activity_log_id DESC');
       //$res =$q->result();
       //echo $this->db->last_query();
      // die();      
        return $q->result();
    }

    function getOfferPointsBetween($table, $where, $start_date, $end_date){
        $q = $this->db->query("SELECT * FROM $table WHERE $where AND date(created_date) BETWEEN '".$start_date."' AND '".$end_date."'");
        return $q->result();
    }

    function singleUserActivity($store_id, $user_id) {
        $q = $this->db->query('SELECT ta.* FROM T_ActivityLog ta WHERE ta.store_id = '. $store_id. ' 
            AND ta.user_id = '. $user_id. ' ORDER BY activity_log_id DESC');
        // print_r($this->db->last_query());
        // die();
        return $q->result();
    }

    function singleUserActivity_Filter($store_id, $user_id, $start_date, $end_date) {
        $q = $this->db->query('SELECT ta.* FROM T_ActivityLog ta WHERE ta.store_id = '. $store_id. ' 
            AND ta.user_id = '. $user_id. ' AND activity_date BETWEEN "'.$start_date.'" AND "'.$end_date.'" ORDER BY activity_log_id DESC');
        // print_r($this->db->last_query());
        // die();
        return $q->result();
    }

    function getWalkinDateBetween($table, $where, $start_date, $end_date) {
        $q = $this->db->query('SELECT * FROM '.$table.' WHERE '.$where. ' AND detected_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"');
        // print_r($this->db->last_query());
        // die();
        return $q->result();
    }

    function offerName($id) {
        $q = $this->db->query('SELECT title FROM T_StoreOffer WHERE store_offer_id=' . $id);
        return $q->result();
    }

    function storeName($id) {
        $q = $this->db->query('SELECT store_first_name FROM T_Store WHERE store_id=' . $id);
        return $q->result();
    }

    function getTotal_Walkins($store_id) {

        $q = $this->db->query(
            'SELECT  count(B.beacon_activity_id) as total_walkins 
            FROM T_BeaconActivity B           
            WHERE B.flag_of_detection = "detected"
            AND B.store_id ='.$store_id
        );
       
       // $r =$q->result();
       // echo $this->db->last_query();
       // die();
        return $q->result();
    }

    function userWalkinThrough($store_id) {
        
        $q = $this->db->query(
            'SELECT  B.beacon_activity_id, (TIME_TO_SEC(B.exit_time) - TIME_TO_SEC(B.detected_time))/60 AS `time` , TIMESTAMPDIFF(HOUR,B.created_date,NOW()) AS difftime, B.beacon_id,B.user_id, B.detected_date,B.detected_time,B.exit_date,B.exit_time,S.walking_point, U.name,U.email, U.profile_image 
            FROM T_BeaconActivity B
            LEFT JOIN T_User U ON U.user_id = B.user_id
            LEFT JOIN T_Store S ON S.store_id = B.store_id
            WHERE B.flag_of_detection = "detected"
            AND B.store_id ='.$store_id.'
            GROUP BY B.user_id
            ORDER BY B.exit_date , B.exit_time DESC'
        );      
        return $q->result();
    }

    function userWalkinThrough_Filter($store_id, $start_date, $end_date) {
        if (empty($start_date) && empty($end_date)) {
            $q = $this->db->query(
                'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,TIMESTAMPDIFF(HOUR,T_BeaconActivity.created_date,NOW()) AS difftime, T_BeaconActivity.beacon_id,T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_Store.walking_point, T_User.name,T_User.email, T_User.profile_image 
                FROM `T_BeaconActivity`
                LEFT JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
                LEFT JOIN T_Store ON T_Store.store_id = T_BeaconActivity.store_id
                WHERE T_BeaconActivity.flag_of_detection = "detected"
                AND T_BeaconActivity.store_id = "' . $store_id . '"
                GROUP BY T_BeaconActivity.user_id
                ORDER BY DATE(T_BeaconActivity.exit_date) DESC'
            );
        } else {
            $q = $this->db->query(
                'SELECT (TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60 AS `time` ,TIMESTAMPDIFF(HOUR,T_BeaconActivity.created_date,NOW()) AS difftime, T_BeaconActivity.beacon_id,T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_Store.walking_point, T_User.name,T_User.email, T_User.profile_image 
                FROM `T_BeaconActivity`
                LEFT JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
                LEFT JOIN T_Store ON T_Store.store_id = T_BeaconActivity.store_id
                WHERE T_BeaconActivity.flag_of_detection = "detected"
                AND T_BeaconActivity.store_id = "' . $store_id . '"
                AND detected_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"
                GROUP BY T_BeaconActivity.user_id
                ORDER BY DATE(T_BeaconActivity.exit_date) DESC'
            );
        }
        // print_r($this->db->last_query());
        // 
        return $q->result();
    }

    function getHeatCountOfUser($beacon_key) {
        $q = $this->db->query(
            'SELECT COUNT(DISTINCT(user_id)) AS heat_count_of_users FROM `T_BeaconActivity` WHERE beacon_key = "' . $beacon_key . '"'
        );
        // return $this->db->last_query();
        return $q->result();
    }

    function getStorePoint($where) {
        return $this->db->get_where('T_StoreOffer', $where)->row_array();
    }

    function getStoreRemainingPoint($where) {
        return $this->db->get_where('T_SocialSharePoint', $where)->result_array();
    }

//========================  B 05.01.2018===================================
    public function dateRangeWalkDetail($a, $b, $c, $user_id) {

        $this->db->select('T_BeaconActivity.detected_time,T_BeaconActivity.exit_time,T_BeaconActivity.created_date,T_BeaconActivity.detected_date,T_BeaconActivity.exit_date,T_BeaconActivity.store_id,T_User.user_id,T_Store.walking_point')->from("T_BeaconActivity")->join('T_User', 'T_User.user_id = T_BeaconActivity.user_id')->join('T_Store', 'T_Store.store_id = T_BeaconActivity.store_id');
        $this->db->where('T_BeaconActivity.detected_date >=', $a);
        $this->db->where('T_BeaconActivity.detected_date <=', $b);
        $this->db->where('T_BeaconActivity.store_id', $c);
        $this->db->where('T_BeaconActivity.user_id', $user_id);
        return $q = $this->db->get()->result();
    }

    public function getDataofRangeSelectedWalkin($a, $b, $c) {

        $this->db->select('T_BeaconActivity.created_date,T_BeaconActivity.exit_time,T_BeaconActivity.detected_time,T_BeaconActivity.detected_date,T_BeaconActivity.exit_date,T_BeaconActivity.store_id,T_User.name,T_Store.walking_point')->from("T_BeaconActivity")->join('T_User', 'T_User.user_id = T_BeaconActivity.user_id')->join('T_Store', 'T_Store.store_id = T_BeaconActivity.store_id');
        $this->db->where('T_BeaconActivity.detected_date >=', $a);
        $this->db->where('T_BeaconActivity.detected_date <=', $b);
        $this->db->where('T_BeaconActivity.store_id', $c);
        return $q = $this->db->get()->result();
    }

    public function getDataofRangeSelectedSetting($start_date, $end_date, $store_id) {

        $this->db->select("T_Payment.payment_id,T_Payment.payment_date,T_Payment.payment_time,T_Payment.created_date,T_Payment.payment_name,T_Payment.points,T_Payment.credits,T_Store.store_first_name,T_Store.store_email")->from('T_Payment')->join('T_Store', "T_Store.store_id = T_Payment.store_id");
        // $this->db->where('T_Payment.payment_date >=', $start_date);
        // $this->db->where('T_Payment.payment_date <=', $end_date);
        $this->db->where('date(T_Payment.payment_date) BETWEEN "'. $start_date. '" and "'. $end_date.'"'); 
        $this->db->where('T_Payment.store_id', $store_id);
        $this->db->order_by("T_Payment.payment_id","desc");
        return $this->db->get()->result();
    }

    public function getDataofRangeSelected_user_report($start_date, $end_date, $store_id) {
        // $this->db->select("T_BeaconActivity.beacon_id,T_BeaconActivity.user_id,T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,T_BeaconActivity.exit_date,T_BeaconActivity.exit_time,T_Store.walking_point,T_User.name,T_User.profile_image")->from('T_BeaconActivity')->join('T_User','T_User.user_id=T_BeaconActivity.user_id')->join('T_Store','T_Store.store_id=T_BeaconActivity.store_id');
        // $this->db->where('T_BeaconActivity.detected_date >=',$start_date);
        // $this->db->where('T_BeaconActivity.detected_date <=',$end_date);
        // $this->db->where('T_BeaconActivity.store_id',$store_id);
        // $this->db->group_by('T_BeaconActivity.user_id');
        // return  $this->db->get()->result();


        $q = $this->db->query(
            "SELECT ta.*, tso.title, tu.email, tu.name, tu.profile_image, tssp.points
            FROM T_ActivityLog ta JOIN T_StoreOffer tso ON ta.store_offer_id = tso.store_offer_id
            JOIN T_User tu ON ta.user_id = tu.user_id JOIN T_SocialSharePoint tssp ON ta.user_id = tssp.user_id 
            WHERE ta.store_id =" . $store_id . " AND tssp.store_offer_id = ta.store_offer_id GROUP BY ta.user_id  having ta.activity_date BETWEEN '" . $start_date . "' AND '" . $end_date . "' ORDER BY ta.activity_log_id DESC");

        return $q->result();
    }

    public function getDataofRange_user_detail($start_date, $end_date, $user_id, $store_id) {

        // echo $user_id;
        // echo $store_id;
        // echo "chal gya"; die();


        $this->db->select("T_ActivityLog.activity_log_id,T_ActivityLog.activity_name,T_ActivityLog.activity_type,T_ActivityLog.store_id,T_ActivityLog.store_offer_id,T_ActivityLog.store,T_ActivityLog.user_id,T_ActivityLog.activity_date,T_ActivityLog.activity_time,T_ActivityLog.created_date,T_ActivityLog.last_updated_date")->from('T_ActivityLog')->join('T_User', 'T_User.user_id=T_ActivityLog.user_id')->join('T_Store', 'T_Store.store_id=T_ActivityLog.store_id');

        $this->db->where('T_ActivityLog.activity_date >=', $start_date);
        $this->db->where('T_ActivityLog.activity_date <=', $end_date);
        $this->db->where('T_ActivityLog.user_id', $user_id);
        $this->db->where('T_ActivityLog.store_id', $store_id);


        return $this->db->get()->result();
    }

//======================== End B 05.01.2018===================================
//shesh code start

    /* Shesh code */
    public function activity_type($user_id) {
        $store_id = $this->session->userdata('store_id');
        $where = "user_id='$user_id' AND store_id='$store_id'";
        $this->db->select('activity_type');
        $this->db->from('T_ActivityLog');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function totalWalkinsInStore_byuser($store_id, $user_id) {

        $query = $this->db->query("SELECT COUNT(created_date) as count FROM T_Userstorewalkinpoint WHERE store_id='$store_id' AND user_id='$user_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->count; // return the count
        } else {
            return 0;
        }
    }

//SELECT count('user_id') FROM T_Userstorewalkinpoint WHERE store_id='31' AND user_id='195'

    public function getTotalWalkinPoint_byuser($store_id, $user_id) {

        /* $query = $this->db->query("SELECT SUM(walkin_points) as earnpoints FROM T_Userstorewalkinpoint WHERE store_id='$store_id' AND user_id='$user_id'");
          if($query->num_rows() >0 )
          {
          $row =  $query->row();
          return $row->count; // return the count
          }
          else{
          return 0;
      } */
      $where = "store_id='$store_id' AND user_id='$user_id'";
      $this->db->select('SUM(walkin_points) AS earnpoints', FALSE);
      $this->db->from('T_Userstorewalkinpoint');
      $this->db->where($where);
      $qwer = $this->db->get()->result_array();
        //print_r($qwer);
      return $qwer;

        //exit;
  }

  public function getallWalkinpoints($store_id, $user_id) {
    $where = "store_id='$store_id' AND user_id='$user_id'";
    $this->db->select('walkin_points');
    $this->db->from('T_Userstorewalkinpoint');
    $this->db->where($where);
    return $this->db->get()->result();
}

/* Shesh Code Start */

public function getmaxpoint($store_id, $offer_id) {
    $where = "store_offer_id='$offer_id' AND store_id='$store_id'";
    $this->db->select('maximum_point');
    $this->db->from('T_StoreOffer');
    $this->db->where($where);
    return $this->db->get()->result();
}

/* Shesh code end */


/* Shesh code end */

function singleUserData($where) {

    $this->db->select('*');
    $this->db->from('T_ActivityLog');
    $this->db->where($where);
    $this->db->order_by('activity_log_id', 'DESC');
        // print_r($this->db->last_query());
        // die();
    return $this->db->get()->result();
        //return $q->result();
}

function singleUserWalkinData($where) {

    $this->db->select('*');
    $this->db->from('T_BeaconActivity');
    $this->db->where($where);
    $this->db->order_by('beacon_activity_id', 'DESC');
    return $this->db->get()->result();
}

public function getDataofRangeOffer($start_date, $end_date, $offer_id, $store_id) {


    $this->db->select("T_SocialSharePoint.social_share_point_id,T_SocialSharePoint.share_type,T_SocialSharePoint.points,T_SocialSharePoint.store_offer_id,T_SocialSharePoint.user_id,T_SocialSharePoint.store_id,T_SocialSharePoint.facebook_points,T_SocialSharePoint.twitter_points,T_SocialSharePoint.created_date,T_Store.store_first_name,T_Store.store_email")->from('T_SocialSharePoint')->join('T_Store', "T_Store.store_id = T_SocialSharePoint.store_id");
    $this->db->where('date(T_SocialSharePoint.created_date) BETWEEN "'. $start_date . '" and "'. $end_date.'"'); 
    // $this->db->where('T_SocialSharePoint.created_date >=', $start_date);
    // $this->db->where('T_SocialSharePoint.created_date <=', $end_date);
    $this->db->where('T_SocialSharePoint.store_offer_id', $offer_id);
    $this->db->where('T_SocialSharePoint.store_id', $store_id);
    return $this->db->get()->result();
}

function getTotalOfferShares($id) {
    $q = $this->db->query(
        "SELECT * FROM T_ActivityLog ta JOIN T_StoreOffer ts ON ta.store_id = ts.store_id 
        WHERE ts.offer_status = 1 AND ta.store_offer_id = ts.store_offer_id AND ts.store_id = $id  AND `activity_type` = 'share'"
    );
    // print_r($this->db->last_query());
    // die();
    return $q->result();
}

function getTotalOfferActivity($id) {
    $q = $this->db->query(
        "SELECT * FROM T_ActivityLog ta JOIN T_StoreOffer ts ON ta.store_id = ts.store_id 
        WHERE ts.offer_status = 1 AND ta.store_offer_id = ts.store_offer_id AND ts.store_id = $id  AND `activity_type` != 'walkin'"
    );
        // print_r($this->db->last_query());
        // die();
    return $q->result();
}

function get_placed_beacons($store_id) {
    $q = $this->db->query('SELECT count(tas.id) AS beac_count FROM T_AssignBeacon tas JOIN T_Beacons tb ON tas.beacon_name = tb.beacon_key WHERE tb.store_id =' . $store_id);
    return $q->result();
}

function getPaymentDetails($where) {
    $q = $this->db->query('SELECT tp.*, ts.store_email, ts.store_first_name, ts.store_mobile_no, ts.store_address1, ts.store_logo FROM T_Payment tp JOIN T_Store ts ON ts.store_id = tp.store_id WHERE '.$where);
    return $q->result();
}

}

//  main class end