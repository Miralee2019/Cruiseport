<?php



class Supermodel extends CI_Model {



    function __construct() {

        parent::__construct();

    }

    function filterbydate($table, $column, $startdate, $enddate){

        $q = $this->db->query(
            "SELECT * FROM $table WHERE cast($column as date) BETWEEN date('".$startdate."') AND date('".$enddate."')"
        );

        // print_r($this->db->last_query());die;
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







    function totalSharesByOffer($store_id){



        $q = $this->db->query(

            'SELECT COUNT(store_offer_id) AS shares FROM T_SocialSharePoint

            WHERE store_id = '.$store_id);

        // var_dump($this->db->last_query());die;

        return $q->result();

    }



    function todayShares($store_id){

        $q = $this->db->query(

            'SELECT COUNT(*) AS shares FROM T_SocialSharePoint 

            WHERE created_date > DATE_SUB(NOW(), INTERVAL 1 DAY) 

            AND store_id = '.$store_id);

        // var_dump($this->db->last_query());die;

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

            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name')

        // ->join('T_Store','T_Store.store_id = T_Store.store_id')

        // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')

        

        ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')

        

        ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')

        ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')

        ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')





        ->where('T_StoreOffer.store_id',$store_id)

        // ->where('T_UserCar.isPaired','0')

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





    

    public function insert($table, $post) {



        $query = $this->db->insert($table, $post);

        return $this->db->insert_id();

    }



    public function select_data($table_name, $where_arr = '',$group_by = '', $order_by = '', $limit1 = '', $limit2 = '') {



        $this->db->select('*');

        $this->db->from($table_name);



        if (is_array($where_arr)) {

            $this->db->where($where_arr);

        }

        if (is_array($group_by)) {



            $this->db->group_by($group_by[0]);

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







    function countUserRegByDate($date){

        $q = $this->db->query(

            'SELECT COUNT(*) AS no_of_user FROM `T_User` WHERE reg_date = '.'"'.$date.'"'

        );

        return $q->result();   

    }



    function getDataofRangeSelected($table,$col1,$min_range,$max_range,$order){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" AND otp_verify = 1 order by '.$order.' ASC' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    function getDataofRangeSelectedBilling($table,$col1,$min_range,$max_range,$order){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE cast('.$col1.' as date) BETWEEN "'.$min_range.'" AND "'.$max_range.'" order by '.$order.' ASC' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    function getDataofRangeSelectedWalkin($table,$col1,$min_range,$max_range,$order){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" order by '.$order.' ASC' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    function getDataofRangeSelectedUserReport($table,$col1,$min_range,$max_range,$order,$user_id){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" AND user_id = '.$user_id.' order by '.$order.' ASC' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    function getDataofRangeSelectedForStore($table,$col1,$min_range,$max_range,$order){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE store_email IS NOT NULL AND '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" order by '.$order.' ASC' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    function getDataofRangeCouponClaim($table,$col1,$min_range,$max_range,$order,$coupon_id){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" AND coupon_id = '.$coupon_id.' order by '.$order.' ASC' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }





    // new 

   

    function getFacebookShares($store_id){

        $q = $this->db->query(

            'SELECT COUNT(facebook_points) AS facebook_shares FROM `T_SocialSharePoint` WHERE store_id = '.$store_id

        );

        return $q->result();   

    }
     //functions for user details report by filter 24042018

    function getFacebookShares_Filter($store_id,$startdate,$enddate){

        $q = $this->db->query(

            "SELECT COUNT(facebook_points) AS facebook_shares FROM `T_SocialSharePoint` WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND store_id = ".$store_id 
        );

        return $q->result();   

    }

//cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND

    function getTwitterShares($store_id){

        $q = $this->db->query(

            'SELECT COUNT(twitter_points) AS twitter_shares FROM `T_SocialSharePoint` WHERE store_id = '.$store_id

        );

        return $q->result();   

    }

    function getTwitterShares_Filter($store_id,$startdate,$enddate){

        $q = $this->db->query(

            "SELECT COUNT(twitter_points) AS twitter_shares FROM `T_SocialSharePoint` WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND store_id = ".$store_id

        );

        return $q->result();   

    }
    function getTwitterP($user_id){

        $q = $this->db->query(

            'SELECT SUM(twitter_points) AS twitter_p FROM `T_SocialSharePoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }        

  function getTwitterP_Filter($user_id,$startdate,$enddate){

        $q = $this->db->query(

            "SELECT SUM(twitter_points) AS twitter_p FROM `T_SocialSharePoint` WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND user_id = ".$user_id

        );

        return $q->result();   

    }        



    function getFacebookPoints($user_id){

        $q = $this->db->query(

            'SELECT COUNT(facebook_points) AS facebook_shares FROM `T_SocialSharePoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }

    function getFacebookPoints_Filter($user_id,$startdate,$enddate){

        $q = $this->db->query(

            "SELECT COUNT(facebook_points) AS facebook_shares FROM `T_SocialSharePoint` WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND user_id = ".$user_id

        );

        return $q->result();   

    }

    function getTwitterPoints($user_id){

        $q = $this->db->query(

            'SELECT COUNT(twitter_points) AS twitter_shares FROM `T_SocialSharePoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }

   function getTwitterPoints_Filter($user_id,$startdate,$enddate){

        $q = $this->db->query(

            "SELECT COUNT(twitter_points) AS twitter_shares FROM `T_SocialSharePoint` WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND user_id = ".$user_id

        );

        return $q->result();   

    }

    function getFacebookP($user_id){

        $q = $this->db->query(

            'SELECT SUM(facebook_points) AS facebook_p FROM `T_SocialSharePoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }        


    function getFacebookP_Filter($user_id,$startdate,$enddate){

        $q = $this->db->query(

            "SELECT SUM(facebook_points) AS facebook_p FROM `T_SocialSharePoint` WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND user_id = ".$user_id

        );

        return $q->result();   

    }      

    function getWalkinP($user_id){

        $q = $this->db->query(

            'SELECT SUM(walking_points) AS walkin_p FROM `T_UserPoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }

    function getWalkinP_Filter($user_id,$startdate,$enddate){

        $q = $this->db->query(

            "SELECT SUM(walking_points) AS walkin_p FROM `T_UserPoint` WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."'  AND user_id = ".$user_id

        );

        return $q->result();   

    }




    function getPointsOfUser($user_id){

        $q = $this->db->query(

            'SELECT SUM(twitter_points) AS twitter_p, SUM(facebook_points) AS facebook_p, SUM(walking_points) AS walkin_p FROM `T_UserPoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }



    function getSharesOfSocial($user_id){

        $q = $this->db->query(

            'SELECT COUNT(facebook_points) AS facebook_shares, COUNT(twitter_points) AS twitter_shares FROM `T_SocialSharePoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }



    function totalUsers(){

        $q = $this->db->query(

            'SELECT COUNT(user_id) AS users FROM T_User'

        );

        return $q->result();        

    }



    function totalShares(){

        $q = $this->db->query('SELECT (SUM(facebook_points)+SUM(twitter_points)) as total FROM `T_StoreOfferSocialPoint`');

        return $q->result();

    }



    function totalFavorites($type_id){

        $q = $this->db->query(

            'SELECT COUNT(type_id) AS favorite FROM T_UserFavorites WHERE

            type_id = '.$type_id);



        return $q->result();   

    }



    function getUserDatabase($user_id){

        $q = $this->db->query(

            'SELECT * FROM `T_User` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }



    function getStoreDatabase($user_id){

        $q = $this->db->query(

            'SELECT * FROM `T_Store` WHERE store_id = '.$user_id

        );

        return $q->result();   

    }



    function getUserWalkinPoints($user_id){

        $q = $this->db->query(

            'SELECT SUM(walking_points) AS user_w_points FROM `T_UserPoint` WHERE user_id = '.$user_id

        );

        return $q->result();   

    }







    function totalPurchaseOfStore($store_id){

        $q = $this->db->query(

            'SELECT SUM(points) AS t_purchase FROM `T_Payment` WHERE store_id = '.$store_id

        );

        return $q->result();   

    }







    function creditRemaining($store_id){

        $q = $this->db->query(

            'SELECT SUM(maximum_point) AS credits FROM `T_StoreOffer` WHERE store_id = '.$store_id

        );

        return $q->result();

    }



    function getCountWalkin($user_id){

        $q = $this->db->query(

            'SELECT count(user_id) AS walks FROM `T_BeaconActivity` WHERE user_id = '.$user_id

        );

        return $q->result();

    }



    function getCountCredits(){

        $q = $this->db->query(

            'SELECT sum(points) AS credits FROM `T_Payment`'

        );

        return $q->result();

    }

    function getCountCredits2($startdate, $enddate){

        $q = $this->db->query(

            "SELECT sum(points) AS credits FROM T_Payment WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."' AND payment_status = 10"
        );

        return $q->result();

    }





    // function testPurpose($table1,$table2,$col1,$col2){

    

    //     $q=$this->db->select('T_StoreOffer.title, T_StoreOffer.offer_status')



    //     ->join($table1, '$table1'.$col1.'='. 'T_StoreOffer.offer_status')

    //     ->get('T_StoreOffer');



    //     var_dump($this->db->last_query());die;



    //     if ($result->num_rows() > 0) {

    //         $data = $result->result();

    //         return $data;

    //     } else {

    //         return $result->num_rows();

    //     }



    

    // }





    function getStoreDashboardDataaByMonth($month){



        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS store_count FROM `T_Store` WHERE store_email is not null AND MONTH(created_date) = '.$month.' GROUP BY MONTH(created_date)');



        return $q->result();



    }



    function getUserDashboardDataaByMonth($month){



        $q = $this->db->query('SELECT COUNT(MONTH(created_date)) AS user_count FROM `T_User` WHERE MONTH(created_date) = '.$month.'   GROUP BY MONTH(created_date)');



        return $q->result();



    }





// 

    function lastMonthWalkin($month){

        $q = $this->db->query('SELECT COUNT(user_id) as month_walkin FROM `T_BeaconActivity` WHERE MONTH(created_date) = '.$month );

        return $q->result();        

    }





    function todayWalkinsMade(){

        $q = $this->db->query('

            SELECT COUNT(T_BeaconActivity.user_id) AS walkin FROM `T_BeaconActivity`

            INNER JOIN T_Beacons ON T_Beacons.id = T_BeaconActivity.beacon_id  

            WHERE T_BeaconActivity.created_date > DATE_SUB(NOW(), INTERVAL 1 DAY)');

        return $q->result();

        

    }

    



    function getUserWalkinSpent($user_id){

        $q = $this->db->query('SELECT SUM(total_spent_time) as walkin_spent FROM `T_BeaconActivity` WHERE user_id = '.$user_id );

        return $q->result();

        

    }



    function my_custom_dashboard_data(){

        $q = $this->db->query('SELECT reg_date AS date, count(*) AS value FROM `T_Store` GROUP BY date');

        return $q->result();    

    }

    function my_custom_dashboard2_data($startdate, $enddate){

        $q = $this->db->query("SELECT reg_date AS date, count(*) AS value FROM `T_Store`
            WHERE reg_date BETWEEN date('".$startdate."') AND date('".$enddate."') GROUP BY date");

        return $q->result();

    }



    function my_custom_dashboard_data2(){

        $q = $this->db->query('SELECT reg_date AS date, count(*) AS value FROM `T_User` WHERE email !="" GROUP BY date');

        return $q->result();    

    }

    function my_custom_dashboard2_data2($startdate, $enddate){
        $q = $this->db->query("SELECT reg_date AS date, count(*) AS value FROM `T_User` 
            WHERE cast(reg_date as date) BETWEEN date('".$startdate."') AND date('".$enddate."') GROUP BY date");
        return $q->result();
    }


    function my_custom_dashboard_data3(){

        //$q = $this->db->query('SELECT MONTHNAME(created_date) AS month, sum(credits) AS purchase FROM T_Payment GROUP BY month');
        // $q = $this->db->query('SELECT CONCAT(date_format(created_date,"%b") ," ",YEAR(created_date)) AS month, sum(credits) AS purchase FROM T_Payment WHERE payment_status = 10 GROUP BY month ORDER BY created_date ASC');
        $q = $this->db->query('SELECT CONCAT(date_format(created_date,"%b") ," ",YEAR(created_date)) AS month, sum(points) AS purchase FROM T_Payment WHERE payment_status = 10 GROUP BY month ORDER BY created_date ASC');
        return $q->result();

    }

    function my_custom_dashboard2_data3($startdate, $enddate){

        // $q = $this->db->query("SELECT MONTHNAME(created_date) AS month, sum(credits) AS purchase FROM T_Payment 
        //     WHERE created_date BETWEEN date('".$startdate."') AND date('".$enddate."') GROUP BY month");

        $q = $this->db->query("SELECT CONCAT(date_format(created_date,'%b') ,' ',YEAR(created_date)) AS month, sum(points) AS purchase FROM T_Payment WHERE cast(created_date as date) BETWEEN '".$startdate."' AND '".$enddate."' AND payment_status = 10  GROUP BY month ORDER BY created_date ASC");
        //print_r($this->db->last_query());die();

        return $q->result();

    }

    function my_custom_dashboard_data4(){

        $q = $this->db->query('SELECT detected_date AS date, count(*) AS value FROM `T_BeaconActivity` GROUP BY date');

        return $q->result();    

    }

    function my_custom_dashboard2_data4($startdate, $enddate){

        $q = $this->db->query("SELECT detected_date AS date, count(*) AS value FROM `T_BeaconActivity`
         WHERE cast(detected_date as date) BETWEEN date('".$startdate."') AND date('".$enddate."') GROUP BY date");

        return $q->result();    

    }

    function offer_requests(){

        $q = $this->db->query('SELECT * FROM `T_StoreOffer` ORDER BY last_updated_date DESC');

        return $q->result();

    }



    function getDataofRangeSelectedOffer($table,$col1,$min_range,$max_range,$order){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" order by '.$order.' desc' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    function getDataofRangeSelectedCouponRedeem($table,$col1,$min_range,$max_range,$order){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" order by '.$order.' desc' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    function getDataofRangeSelectedPaytm($table,$col1,$min_range,$max_range,$order){

        $q = $this->db->query(

            'SELECT * FROM '.$table.' WHERE '.$col1.' BETWEEN "'.$min_range.'" AND "'.$max_range.'" order by '.$order.' desc' 

        );

        // var_dump($this->db->last_query());die;

        return $q->result();   

        

    }



    //----------------------------------------------------------------------------------------------------------------------------------



    function getStore_offerRequest($where){



        $this->db->select('T_Storeoffer.*, T_Store.store_id, store_first_name');

        $this->db->from('T_Storeoffer');

        $this->db->join('T_Store','T_Storeoffer.store_id = T_Store.store_id');

        // $this->db->join('t_categorys, T_Storeoffer.category_id = t_categorys.category_id');

        $this->db->where('T_Storeoffer.store_offer_id', $where);

        return  $this->db->get()->row_array();



    }



    function Check_BeaconAlready_Exist($beacon_name)

    {

        $this->db->select('name');

        $this->db->from('T_Beacon');

        $this->db->where('name', $beacon_name);

        $q = $this->db->get()->result();

        if($q)

        {

            return true;

        }else{

            return false;

        }

    }



    function singleUserWalkinData($where){

        $this->db->select('*');

        $this->db->from('T_BeaconActivity');

        $this->db->where($where);

        $this->db->order_by('beacon_activity_id','DESC');

        return $this->db->get()->result();

    }



    // for view-walkin report updated on 26022018

    function allStoreWalkinData(){



        // $q = $this->db->query(

        //     'SELECT *

        //     FROM T_BeaconActivity

        //     WHERE             

        //     beacon_activity_id  IN (SELECT max(beacon_activity_id) FROM T_BeaconActivity GROUP BY user_id ORDER by beacon_activity_id DESC)  

        //     ORDER BY beacon_activity_id DESC'

        // );
        $q = $this->db->query(

            'SELECT *

            FROM T_BeaconActivity

            WHERE             

            beacon_activity_id  IN (SELECT max(beacon_activity_id) FROM T_BeaconActivity GROUP BY user_id ORDER by beacon_activity_id DESC)  

            ORDER BY beacon_activity_id DESC'

        );



    // print_r($this->db->last_query());die();

        return $q->result();

    }





    // for view-claims report updated on 26022018

    function getTodaysClaims($coupon_id) {





        $q= $this->db->query('SELECT COUNT(*) AS todaysClaims FROM T_CouponClaims WHERE coupon_id ='.$coupon_id.' AND claim_date ='.date('Y-m-d'));



        return $q->result();





    }



    function getTotalClaims($coupon_id) {





        $q= $this->db->query('SELECT COUNT(*) AS totalClaims FROM T_CouponClaims WHERE coupon_id ='.$coupon_id);



        return $q->result();





    }





    function getCouponStatus($coupon_id) {





        $q= $this->db->query('SELECT status  FROM T_Coupon WHERE coupon_id ='.$coupon_id);



        return $q->result();





    }

    function getStoreIdByCouponId($coupon) {

        $q=$this->db->query("SELECT store_id,store_offer_id,coupon_title FROM T_Coupon WHERE coupon_id = " . $coupon);
        return $q->result();

    }

    function getCouponByStoreOfferId($store_offer_id) {

        $q=$this->db->query("SELECT claim_for_rubs FROM  T_CouponClaims WHERE id = " . $store_offer_id);
        return $q->result();

    }
    
    function getPaytmRedeemByStoreOfferId($store_offer_id) {

        $q=$this->db->query("SELECT no_of_rubs FROM T_PaytmRedeemRequests WHERE id = " . $store_offer_id);
        return $q->result();

    }

    function allStoreWalkinData_Filter($startdate,$enddate) {


        $q = $this->db->query(

            "SELECT *

            FROM T_BeaconActivity

            WHERE             

            
            beacon_activity_id  IN (SELECT max(beacon_activity_id) FROM T_BeaconActivity where detected_date BETWEEN  '".$startdate."'  AND  '".$enddate."' GROUP BY user_id ORDER by beacon_activity_id DESC)  
            

            ORDER BY beacon_activity_id DESC"

        );

        //  $q = $this->db->query(

        //     "SELECT * FROM T_BeaconActivity

        //     WHERE         
        //     beacon_activity_id  IN (SELECT max(beacon_activity_id) FROM T_BeaconActivity where detected_date in (SELECT detected_date  from T_BeaconActivity where detected_date BETWEEN  '".$startdate."'  AND  '".$enddate."' order by beacon_activity_id desc) GROUP BY user_id ORDER by beacon_activity_id DESC)              

        //     ORDER BY beacon_activity_id DESC"

        // );

       //$r = $q->result();

        //echo $this->db->last_query(); die();

        return $q->result();

    }

    function allStoreWalkinData_Count_Filter($startdate,$enddate) {


        $q = $this->db->query(

            "SELECT count(*) as walkin_count FROM T_BeaconActivity WHERE detected_date BETWEEN  '".$startdate."'  AND  '".$enddate."' ORDER BY beacon_activity_id DESC"

        );           

        return $q->result();

    }

  function allStoreWalkinData_Count() {


        $q = $this->db->query(

            "SELECT count(*) as walkin_count FROM T_BeaconActivity ORDER BY beacon_activity_id DESC"

        );           

        return $q->result();

    }


    function userWalkinData_Count_Filter($userid,$startdate,$enddate) {


        $q = $this->db->query(

            "SELECT count(*) as walkin_count FROM T_BeaconActivity WHERE user_id = ". $userid. "  AND detected_date BETWEEN  '".$startdate."'  AND  '".$enddate."' ORDER BY beacon_activity_id DESC"

        );           
        
        return $q->result();

    }

    function userWalkinData_Count($userid) {


        $q = $this->db->query(

            "SELECT count(*) as walkin_count FROM T_BeaconActivity WHERE user_id = ". $userid

        );           
         
        return $q->result();

    }   


     function getUserWalkinSpent_Filter($user_id,$startdate,$enddate) {

        $q = $this->db->query("SELECT SUM(total_spent_time) as walkin_spent FROM `T_BeaconActivity` WHERE user_id = ".$user_id . " and detected_date BETWEEN  '".$startdate."'  AND  '".$enddate."'");

         

        return $q->result();

        

    }

    function userShare_Point_Filter($user_id,$startdate,$enddate) {

        $q = $this->db->query("SELECT * FROM `T_SocialSharePoint` WHERE user_id = ".$user_id . " and cast(created_date as date) BETWEEN  '".$startdate."'  AND  '".$enddate."'");
         

        return $q->result();        

    }


}







//  main class end