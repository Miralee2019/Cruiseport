<?php

class Apimodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }


public function expireTime($user_id){

$q = $this->db->query('SELECT TIMESTAMPDIFF(SECOND, email_send_time , NOW() ) As time FROM T_User WHERE user_id = '.$user_id);

return $q->result();

}

function getSpendTimeOfBeacon($beacon_activity_id){

    $q = $this->db->query('SELECT SUM((TIME_TO_SEC(T_BeaconActivity.exit_time) - TIME_TO_SEC(T_BeaconActivity.detected_time))/60) AS `time_difference` ,T_BeaconActivity.beacon_id, T_BeaconActivity.user_id, T_BeaconActivity.detected_date,T_BeaconActivity.detected_time,
        T_BeaconActivity.exit_date,T_BeaconActivity.exit_time, T_User.name 
        FROM `T_BeaconActivity`INNER JOIN T_User ON T_User.user_id = T_BeaconActivity.user_id
        WHERE T_BeaconActivity.beacon_activity_id = '.$beacon_activity_id);

    return $q->result();
}

public function getOtpTimeDiff($user_id){
        $q = $this->db->query('SELECT TIMESTAMPDIFF(SECOND, last_updated_date, NOW()) AS otptime FROM T_User WHERE user_id = '.$user_id);
        return $q->result();        
}

public function getStoreDetail(){

            $q=$this->db->select('
                T_Store.store_first_name,T_Store.store_id, T_Store.store_last_name,T_Store.store_point,T_Store.store_email,T_Store.area_location,T_Store.store_mobile_no,T_Store.walking_point,
                T_Store.category,T_Store.state,T_Store.store_address1,T_Store.store_address2,T_Store.store_description,T_Store.store_open_hours,T_Store.store_close_hours,T_Store.store_latitude,T_Store.store_longitude,T_Store.created_date,T_Store.store_logo,T_Store.remark,T_Categorys.name AS category_name')
        

            // ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
            ->join('T_Categorys', 'T_Categorys.category_id  = T_Store.category')
            // ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
            // ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')


            ->where('T_Store.status_id',"1")
        //    ->where('T_Store.store_point >',"200")
            // ->where('T_Store.store_point !=',"0")
            // ->where('T_UserCar.isPaired','0')
                // ->where_in('T_UserCar.status', array('0','1','2'))
            ->get('T_Store');
            // var_dump($this->db->last_query());die;
            return $q->result();
        
}

// Mira
public function getStoreData($store_id){

    $q=$this->db->select('T_Store.store_id,T_Store.category,T_Store.store_logo,T_Store.created_date')
    ->where('T_Store.store_id',$store_id)->get('T_Store');
    return $q->result();

}
public function getbrandData($brand_id){

    $q=$this->db->select('*')
    ->where('brand_id',$brand_id)->get('t_brand');
    return $q->result();

}
// Mira

public function getFullStoreOfferDetail(){
            $q=$this->db->select('T_StoreOffer.title,T_StoreOffer.store_id,T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.created_date,T_StoreOffer.expiry_date,T_StoreOffer.publish_date,T_StoreOffer.publish_time,T_StoreOffer.offer_status as status,T_StoreOffer.category_id,T_StoreOffer.offer_visibility,
            T_StoreOffer.offer_image,T_StoreOffer.store_offer_id,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text AS terms_and_conditions,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name,T_Store.store_latitude,T_Store.walking_point As store_walkin,T_Store.store_address1,T_Store.store_longitude,T_Store.store_logo,T_Store.store_first_name, T_StoreOffer.maximum_point')
            // ->join('T_Store','T_Store.store_id = T_Store.store_id')
            // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
            
            ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
            
            ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
            ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
            ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
            ->join('T_Store', 'T_Store.store_id = T_StoreOffer.store_id')

->where('T_Store.status_id',"1")
            ->where('T_StoreOffer.offer_status',"1")
            ->where('T_Store.store_point >','0')
            ->order_by('T_StoreOffer.publish_date','DESC')
                    // ->where_in('T_UserCar.status', array('0','1','2'))
            ->get('T_StoreOffer');
    // var_dump($this->db->last_query());die;
            return $q->result();
        
    }    


public function getStoreOfferDetailByOfferId($store_offer_id){
            $q=$this->db->select('T_StoreOffer.title, T_StoreOffer.offer_status,T_StoreOffer.offer_visibility,T_StoreOffer.store_id,T_StoreOffer.store_offer_id,T_StoreOffer.description,T_StoreOffer.created_date,T_StoreOffer.expiry_date,T_StoreOffer.publish_date,T_StoreOffer.offer_status,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.store_offer_id,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text AS terms_and_conditions,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name,T_Store.store_latitude,T_Store.walking_point As store_walkin,T_Store.store_address1,T_Store.store_longitude,T_Store.store_logo,T_Store.store_first_name')
            // ->join('T_Store','T_Store.store_id = T_Store.store_id')
            // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
            
            ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
            
            ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
            ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
            ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
            ->join('T_Store', 'T_Store.store_id = T_StoreOffer.store_id')


            ->where('T_StoreOffer.store_offer_id',$store_offer_id)
            ->where('T_StoreOffer.offer_status',"1")

            // ->where('T_UserCar.isPaired','0')
                    // ->where_in('T_UserCar.status', array('0','1','2'))
            ->get('T_StoreOffer');
    // var_dump($this->db->last_query());die;
            return $q->result();
        
}  
public function getStoreOfferDetailByStoreId($store_id){
            $q=$this->db->select('T_StoreOffer.title, T_StoreOffer.offer_status,T_StoreOffer.store_offer_id,T_StoreOffer.store_id,T_StoreOffer.offer_visibility,T_StoreOffer.description,T_StoreOffer.created_date,T_StoreOffer.expiry_date,T_StoreOffer.publish_date,T_StoreOffer.offer_status,T_StoreOffer.category_id,
            T_StoreOffer.offer_image,T_StoreOffer.store_offer_id,T_StoreOffer.expiry_date,T_StoreOffer.offer_term_condition_id, T_StoreOfferTermCondition.text AS terms_and_conditions,
            T_Categorys.name AS category_name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferSocialPoint.walking_points,T_Status.status_name,T_Store.store_latitude,T_Store.walking_point As store_walkin,T_Store.store_address1,T_Store.store_longitude,T_Store.store_logo,T_Store.store_first_name')
            // ->join('T_Store','T_Store.store_id = T_Store.store_id')
            // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
            
            ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
            
            ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
            ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
            ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
            ->join('T_Store', 'T_Store.store_id = T_StoreOffer.store_id')


            ->where('T_StoreOffer.store_id',$store_id)
            ->where('T_StoreOffer.offer_status',"1")
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
public function getTotalPoints($id) {
        $q = $this->db->query('SELECT SUM(points) as total FROM `T_SocialSharePoint`WHERE store_offer_id ='.$id);
        // print_r($this->db->last_query());
        // die();
        return $q->result();
}
    // function checkAccessToken($user_id , $access_token){
    //     $q = $this->db->query('select T_User.user_id, T_User.access_token from T_User left join T_FavouriteStore on T_User.user_id = T_FavouriteStore.user_id where T_User.user_id ='.$user_id.' AND T_User.access_token ='.'"'.$access_token.'"');

    //     return $q->result();
    // }

function checkAccessToken($user_id , $access_token){
        $q = $this->db->query('select T_User.user_id, T_User.access_token from T_User where T_User.user_id ='.$user_id.' AND T_User.access_token ='.'"'.$access_token.'"');

        return $q->result();
}

    // public function select_data($table_name, $where_arr = '', $order_by = '', $limit1 = '', $limit2 = '') {

    //     $this->db->select('*');
    //     $this->db->from($table_name);

    //     if (is_array($where_arr)) {
    //         $this->db->where($where_arr);
    //     }
    //     if (is_array($order_by)) {
    //         foreach ($order_by as $key => $value) {
    //             $this->db->order_by($key, $value);
    //         }
    //     }
    //     if ($limit1 != '') {
    //         $this->db->limit($limit2, $limit1);
    //     }
    //     $result = $this->db->get();

    //     if ($result->num_rows() > 0) {
    //         $data = $result->result();

    //         return $data;
    //     } else {
    //         return $result->num_rows();
    //     }
    // }


    public function favorite($user_id){
        $this->db->select("*");
        $this->db->from("T_FavouriteStore");
        $this->db->where('user_id', $user_id);
        $this->db->where('notified', 0);
        $this->db->where('distance <',100);
        // $this->db->order_by("distance", "aesc");
        $query = $this->db->get();
        //         var_dump($this->db->last_query());die;
        return $query->result();
    }    
    
    public function favorite2($user_id){
        $this->db->select("*");
        $this->db->from("T_FavouriteStore");
        $this->db->where('user_id', $user_id);
        $this->db->where('notified', 1);
        $this->db->where('distance <',100);
        // $this->db->order_by("distance", "aesc");
        $query = $this->db->get();
        //         var_dump($this->db->last_query());die;
        return $query->result();
    }  

    public function select_data($table_name, $where_arr='null', $limit2='null') {

        $this->db->select('*');
        $this->db->from($table_name);

        if (is_array($where_arr)) {
            $this->db->where($where_arr);
        }
        
        $this->db->limit($limit2);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            $data = $result->result();

             //$q = $this->db->last_query();
             //var_dump($q);die;

            return $data;
        } else {
            return $result->num_rows();
        }
    }

    public function select_data_new($table_name, $where_arr = '', $order_by = '', $limit1 = '', $limit2 = '') {

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

    public function get_walking_points($user_id)
    {
        
         $q=$this->db->select('T_BeaconActivity.beacon_activity_id,beacon_id,T_BeaconActivity.user_id,T_BeaconActivity.store_id,T_BeaconActivity.created_date,store_first_name as store_name,T_Userstorewalkinpoint.walkin_points')
            // ->join('T_Store','T_Store.store_id = T_Store.store_id')
            // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
            
            // ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
            ->join('T_Store', 'T_Store.store_id  = T_BeaconActivity.store_id')
             ->join('T_Userstorewalkinpoint', 'T_Userstorewalkinpoint.beacon_activity_id  = T_BeaconActivity.beacon_activity_id')
            // ->join('T_StoreOffer', 'T_StoreOffer.store_offer_id = T_Coupon.store_offer_id')
            // ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
            
            ->where('T_BeaconActivity.user_id',$user_id)
            ->get('T_BeaconActivity');
            // var_dump($this->db->last_query());die;
            return $q->result();
        
    }

//update code on 22032018
  public function get_coupon_claims_points($user_id)
  {
 
      $q=$this->db->select('T_CouponClaims.id,T_CouponClaims.coupon_id,T_CouponClaims.user_id,T_CouponClaims.claim_for_rubs,T_CouponClaims.created_date,T_Coupon.coupon_title,T_Coupon.store_id')           
      ->join('T_Coupon', 'T_Coupon.coupon_id  = T_CouponClaims.coupon_id')           
      ->where('T_CouponClaims.user_id',$user_id)
      ->where('T_CouponClaims.request_status',10)
      ->get('T_CouponClaims');
      
      return $q->result();
 
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


//june 20


function getAllCouponDetails(){

    $q=$this->db->select('T_Coupon.coupon_title,T_Coupon.category_id,T_Coupon.store_id,T_Categorys.name AS category_name,
        T_Coupon.coupon_points,T_Coupon.terms,T_Coupon.coupon_id,T_Coupon.claims,T_Coupon.coupon_expiry_date,
        T_Coupon.coupon_image,T_Coupon.created_date,T_Coupon.coupon_description,T_Coupon.coupon_points')
            // ->join('T_Store','T_Store.store_id = T_Store.store_id')
            // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
            
            // ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
            ->join('T_Categorys', 'T_Categorys.category_id  = T_Coupon.category_id')
            // ->join('T_StoreOffer', 'T_StoreOffer.store_offer_id = T_Coupon.store_offer_id')
            // ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
           /* ->join('T_Store', 'T_Store.store_id = T_Coupon.store_id')*/
            ->where('T_Coupon.status',"1")
            ->get('T_Coupon');
            // print_r($this->db->last_query());die;
            return $q->result();
}


function getUserLikes($store_id){
    
    $q = $this->db->query('SELECT COUNT(*) AS store_likes FROM T_UserFavorites WHERE favorite_type = "store" AND type_id = '.$store_id);

    return $q->result();

}

function getUserStoreLikes($store_id){
    
    $q = $this->db->query('SELECT COUNT(*) AS store_likes FROM T_UserFavorites WHERE favorite_type = "store" AND type_id = '.$store_id);

    return $q->result();

}

function getUserOfferLikes($offer_id){
    
    $q = $this->db->query('SELECT COUNT(*) AS offer_likes FROM T_UserFavorites WHERE favorite_type = "offer" AND type_id = '.$offer_id);

    return $q->result();

}


// Api on 13 july

function totalVisitors($store_id){
    $q = $this->db->query('SELECT COUNT(DISTINCT(user_id)) AS visitors FROM `T_BeaconActivity` WHERE exit_time != "00:00:00" AND store_id = '.$store_id);

    return $q->result();
}

function countTotalRating($store_id){
    $q = $this->db->query('SELECT COUNT(rating) AS countO FROM `T_UserReviews` WHERE store_id = '.$store_id);
    return $q->result();
}

function sumTotalRating($store_id){
    $q = $this->db->query('SELECT SUM(rating) AS sumO FROM `T_UserReviews` WHERE store_id = '.$store_id);
    return $q->result();
}

function get_walkin_count($table,$store_id,$user_id) {
    $q = $this->db->query('SELECT COUNT(user_store_walkin_id) AS count FROM '.$table.' WHERE store_id='.$store_id.' AND user_id='.$user_id);
    return $q->result();
}

//update code on  12032018
function select_data_in($table_name, $column_name, $where_id, $array_ids) {  
    
            
       // $q ="select ".$column_name." from " .$table_name ." where ".$where_id." IN ( ".$array_ids." )"; 
        $t =array($where_id,$column_name);
        $this->db->select($t);
        $this->db->from($table_name);
        $this->db->where_in($where_id, $array_ids);
        $q = $this->db->get();
        $res =$q->result(); 
     
        $names = array();   
        foreach ($res as $key => $key_value ) {          
             $names[$key_value->$where_id] =  $key_value->$column_name;//$key_value->$where_id;     
        }
         
        return $names;   
       //return $q->result(); 
               
    }

/*
* SUBODH :: New function for where_or condition
* This function will create a Where or query with passed values in $where array
* Params : 
    $table_name (string) = Name of the table
    $where_arr (associative array) = column names for Where or conditions
    $or_where_arr (associative array) = column names for Where or conditions
    $limit2 (char) = limit value
*/

public function select_or_data($table_name, $where_arr = '', $or_where_arr = '', $limit2 = 0) {
    
            $this->db->select('*');
            $this->db->from($table_name);
    
            if (is_array($where_arr)) {
                $this->db->where($where_arr);
            }

            if (is_array($or_where_arr)) {
                $this->db->or_where($or_where_arr);
            }
            
            $this->db->limit($limit2);
            $result = $this->db->get();
    
            if ($result->num_rows() > 0) {
                $data = $result->result();
    
                //$q = $this->db->last_query();
                //var_dump($q);die;
    
                return $data;
            } else {
                return $result->num_rows();
            }
}

public function earn_points_from_store_today($user_id=0,$store_id=0)
{
   $query= $this->db->query("SELECT * FROM `T_Userstorewalkinpoint` WHERE user_id=$user_id and store_id=$store_id order by created_date DESC limit 1");
   return $query->result();
}
public function getClaimedCouponsByUser($user_id){
    $query=$this->db->query("SELECT T_Coupon.*,T_CouponClaims.id,T_CouponClaims.user_id,T_Categorys.name,T_CouponClaims.claim_code,T_CouponClaims.claim_date,T_CouponClaims.claim_status,T_CouponClaims.request_status,T_CouponClaims.claim_for_rubs,T_CouponClaims.coupon_visibility_for_user FROM `T_CouponClaims` inner join T_Coupon on T_Coupon.coupon_id=T_CouponClaims.coupon_id inner join T_Categorys on T_Coupon.category_id=T_Categorys.category_id  where T_CouponClaims.user_id=".$user_id." ORDER BY `T_CouponClaims`.`id` DESC");
    return $query->result();
}

public function getFullStoreDetail($start,$per_page){
         /*   $q=$this->db->select('
          T_Store.store_id,T_Store.store_first_name,T_Store.store_first_name,T_Store.store_email,T_Store.area_location,T_Store.store_latitude,T_Store.store_longitude')
            // ->join('T_Store','T_Store.store_id = T_Store.store_id')
            // ->join('T_StoreOffer','T_StoreOffer.store_id = T_Store.store_id')
            
            ->join('T_StoreOfferTermCondition','T_StoreOfferTermCondition.offer_term_condition_id = T_StoreOffer.offer_term_condition_id')
            
            ->join('T_Categorys', 'T_Categorys.category_id  = T_StoreOffer.category_id')
            ->join('T_StoreOfferSocialPoint', 'T_StoreOfferSocialPoint.store_offer_id = T_StoreOffer.store_offer_id')
            ->join('T_Status', 'T_Status.status_id = T_StoreOffer.offer_status')
            ->join('T_Store', 'T_Store.store_id = T_StoreOffer.store_id')

->where('T_Store.status_id',"1")
            ->where('T_StoreOffer.offer_status',"1")
            ->where('T_Store.store_point >','0')
            ->order_by('T_StoreOffer.publish_date','DESC')
                    // ->where_in('T_UserCar.status', array('0','1','2'))
            ->get('T_StoreOffer');*/
            $query=$this->db->query("SELECT `T_Store`.`store_id`, `T_Store`.`store_first_name`,`T_Store`.`store_address1`, `T_Store`.`store_first_name`, `T_Store`.`store_email`, `T_Store`.`area_location`, `T_Store`.`store_latitude`, `T_Store`.`store_longitude`,`T_Store`.`store_logo`,`T_Store`.`walking_point` FROM `T_StoreOffer` JOIN `T_StoreOfferTermCondition` ON `T_StoreOfferTermCondition`.`offer_term_condition_id` = `T_StoreOffer`.`offer_term_condition_id` JOIN `T_Categorys` ON `T_Categorys`.`category_id` = `T_StoreOffer`.`category_id` JOIN `T_StoreOfferSocialPoint` ON `T_StoreOfferSocialPoint`.`store_offer_id` = `T_StoreOffer`.`store_offer_id` JOIN `T_Status` ON `T_Status`.`status_id` = `T_StoreOffer`.`offer_status` JOIN `T_Store` ON `T_Store`.`store_id` = `T_StoreOffer`.`store_id` WHERE `T_Store`.`status_id` = '1' AND `T_StoreOffer`.`offer_status` = '1' AND `T_Store`.`store_point` > '0' GROUP BY `T_Store`.`store_id` ORDER BY `T_StoreOffer`.`publish_date` DESC LIMIT $start,$per_page");
   //  var_dump($this->db->last_query());die;
            return $query->result();
        
    } 
    public function getFullOfferDetail($store_id){
        
            $query=$this->db->query("SELECT `T_StoreOffer`.*,T_Categorys.name,T_StoreOfferSocialPoint.facebook_points,T_StoreOfferSocialPoint.twitter_points,T_StoreOfferTermCondition.text FROM `T_StoreOffer` JOIN `T_StoreOfferTermCondition` ON `T_StoreOfferTermCondition`.`offer_term_condition_id` = `T_StoreOffer`.`offer_term_condition_id` JOIN `T_Categorys` ON `T_Categorys`.`category_id` = `T_StoreOffer`.`category_id` JOIN `T_StoreOfferSocialPoint` ON `T_StoreOfferSocialPoint`.`store_offer_id` = `T_StoreOffer`.`store_offer_id` JOIN `T_Status` ON `T_Status`.`status_id` = `T_StoreOffer`.`offer_status` JOIN `T_Store` ON `T_Store`.`store_id` = `T_StoreOffer`.`store_id` WHERE `T_Store`.`status_id` = '1' AND `T_StoreOffer`.`offer_status` = '1' AND `T_Store`.`store_point` > '0' and T_StoreOffer.store_id=".$store_id." ORDER BY `T_StoreOffer`.`publish_date` DESC");
   //  var_dump($this->db->last_query());die;
            return $query->result();
        
    } 
public function get_port($userid)
{	
	$query= $this->db->query("SELECT ship.*,port.* FROM `T_User` INNER JOIN port ON port.port_id = T_User.ref_port_id INNER JOIN ship ON ship.ship_id = port.ref_ship_id WHERE T_User.user_id = '$userid'");	
	//$query = $this->db->get();
	$ret = $query->row();
	if($ret){
	return $ret;
	} else  {
	return new stdClass();	
	}
 //  return $query->result();
}
	
}
//  main class end