function getUserPoints_post() {

        $post = json_decode(file_get_contents("php://input"), true);
        $keys = array_keys($post); //convert json into array formate
        sort($keys); //sort array to campare with sample string

        $sample = '["user_id","access_token"]';



        $required = array(
            "user_id" => $post['user_id']
        );

        $key = array_keys($required, "");

        if (!$key) {
            $res1 = $this->Apimodel->select_data('T_User', array('user_id' => $post["user_id"]));

            if ($res1 > 0) {

                $points = $this->Apimodel->select_data('T_UserPoint', array('user_id' => $post["user_id"]));

                $facebook = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"], 'share_type' => 'facebook_points'));


                $twitter = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"], 'share_type' => 'twitter_points'));               


                $alltransaction = $this->Apimodel->select_data('T_SocialSharePoint', array('user_id' => $post["user_id"]));

                $walking_points = $this->Apimodel->get_walking_points($post["user_id"]);

                $paytm_cash_redeem = $this->Apimodel->select_data('T_PaytmRedeemRequests', array('user_id' => $post["user_id"], "request_status" => "10"));
                //$coupon_redeem = $this->Apimodel->select_data('T_CouponClaims', array('user_id' => $post["user_id"]));
                $coupon_redeem = $this->Apimodel->select_data('T_CouponClaims', array('user_id' => $post["user_id"],'request_status'=>10));

                $reward_points = $this->Apimodel->select_data('T_RewardPoints', array('user_id' => $post["user_id"]));



                // var_dump($walking_points);die;
                // if($points){

                $deduct_points = ($points[0]->paytm_redeem_rubs);
                $total = (($points[0]->facebook_points) + ($points[0]->twitter_points) + ($points[0]->walking_points) + ($points[0]->reward_points) - ($points[0]->coupon_redeem_rubs) );

                $points1[] = [
                    "facebook_points" => $points[0]->facebook_points ?: '0',
                    "twitter_points" => $points[0]->twitter_points ?: '0',
                    "walking_points" => $points[0]->walking_points ?: '0',
                    "reward_points" => $points[0]->reward_points ?: '0',
                    "total_points" => $total - $deduct_points
                ];


                $storeId_temp =array();
                $storeOfferId_temp = array();            
                if(count($facebook) != 0)
                {
                    foreach ($facebook as $key) {
                        array_push($storeId_temp , $key->store_id);
                        array_push($storeOfferId_temp , $key->store_offer_id);                                
                    } 

                    $storeNames = $this->Apimodel->select_data_in('T_Store','store_first_name','store_id',$storeId_temp);
                    $storeOfferNames = $this->Apimodel->select_data_in('T_StoreOffer','title','store_offer_id',$storeOfferId_temp);
                }

              

                foreach ($facebook as $key) {
                    $fb[] = array(
                        "user_id" => $key->user_id ?: '',
                        "store_id" => $key->store_id ?: '',                       
                        "store_offer_id" => $key->store_offer_id ?: '',
                        "store_first_name" => $storeNames[$key->store_id]?: '',
                        "title" => $storeOfferNames[$key->store_offer_id] ?: '',                   
                        "points" => $key->facebook_points ?: '',
                        "point_type" => "facebook",
                        "transaction_type" => "credit",
                        "created_date" => $key->created_date ?: ''
                        
                    );
                    
                }

                $storeId_temp =array();
                $storeOfferId_temp = array();            

                if(count($twitter) != 0)
                {
                    foreach ($twitter as $key) {
                        array_push($storeId_temp , $key->store_id);
                        array_push($storeOfferId_temp , $key->store_offer_id);                                
                    } 
                    $storeNames = $this->Apimodel->select_data_in('T_Store','store_first_name','store_id',$storeId_temp);
                    $storeOfferNames = $this->Apimodel->select_data_in('T_StoreOffer','title','store_offer_id',$storeOfferId_temp);
                   
                }
                
                foreach ($twitter as $key) {
                    $tw[] = array(
                        "user_id" => $key->user_id ?: '',
                        "store_id" => $key->store_id ?: '',                        
                        "store_offer_id" => $key->store_offer_id ?: '',
                        "store_first_name" => $storeNames[$key->store_id]?: '',
                        "title" => $storeOfferNames[$key->store_offer_id] ?: '',                                      
                        "points" => $key->twitter_points ?: '',
                        "point_type" => "twitter",
                        "transaction_type" => "credit",
                        "created_date" => $key->created_date ?: ''
                    );
                   
                }


                $storeId_temp =array();
                $storeOfferId_temp = array();            

                if(count($alltransaction) != 0)
                {
                    foreach ($alltransaction as $key) {
                        array_push($storeId_temp , $key->store_id);
                        array_push($storeOfferId_temp , $key->store_offer_id);                                
                    } 
                    $storeNames = $this->Apimodel->select_data_in('T_Store','store_first_name','store_id',$storeId_temp);
                    $storeOfferNames = $this->Apimodel->select_data_in('T_StoreOffer','title','store_offer_id',$storeOfferId_temp);

                }
                foreach ($alltransaction as $key) {
                    $all[] = array(
                        "user_id" => $key->user_id ?: '',
                        "store_id" => $key->store_id ?: '',
                        "store_offer_id" => $key->store_offer_id ?: '',
                        "store_first_name" => $storeNames[$key->store_id]?: '',
                        "title" => $storeOfferNames[$key->store_offer_id] ?: '',                                
                        "facebook_points" => $key->facebook_points ?: '',
                        "twitter_points" => $key->twitter_points ?: '',
                        "point_type" => "facebook",
                        "transaction_type" => "credit",
                        "created_date" => $key->created_date ?: ''
                    );
                }
              

                
                foreach ($walking_points as $key) {
                    $walkin[] = array(
                        "beacon_activity_id" => $key->beacon_activity_id ?: '',
                        "beacon_id" => $key->beacon_id ?: '',
                        "user_id" => $key->user_id ?: '',
                        "store_id" => $key->store_id ?: '',
                        "points" => "30",
                        "point_type" => "walking",
                        "transaction_type" => "credit",
                        "created_date" => $key->created_date ?: '',
                        "store_name" => $key->store_name ?: ''
                    );
                }              

                foreach ($paytm_cash_redeem as $key) {
                    $paytm[] = array(
                        "id" => $key->id ?: '',
                        "user_id" => $key->user_id ?: '',
                        "points" => $key->no_of_rubs ?: '',
                        "point_type" => "paytm_redeem",
                        "transaction_type" => "debit",
                        "created_date" => $key->created_date ?: ''
                    );
                }

                foreach ($coupon_redeem as $key) {
                    $coupon[] = array(
                        "id" => $key->id ?: '',
                        "coupon_id" => $key->coupon_id ?: '',
                        "user_id" => $key->user_id ?: '',
                        "points" => $key->claim_for_rubs ?: '',
                        "point_type" => "coupon_redeem",
                        "transaction_type" => "debit",
                        "created_date" => $key->created_date ?: ''
                    );
                }

                foreach ($reward_points as $key) {
                    $reward[] = array(
                        "id" => $key->id ?: '',
                        "user_id" => $key->user_id ?: '',
                        "points" => $key->reward_points ?: '',
                        "point_type" => "reward",
                        "transaction_type" => "credit",
                        "created_date" => $key->created_date ?: ''
                    );
                }

                $fb = $fb ?: [];
                $tw = $tw ?: [];

                $paytm = $paytm ?: [];
                $coupon = $coupon ?: [];
                $walkin = $walkin ?: [];
                $reward = $reward ?: [];

                $more1 = array_merge($fb, $tw);
                $more2 = array_merge($paytm, $coupon);
                $more3 = array_merge($more1, $more2);
                $more4 = array_merge($more3, $walkin);
                $more5 = array_merge($more4, $reward);

                // var_dump($more4);die;  
                // sort($more4);

                function sortByOrder($a, $b) {
                    return $a['created_date'] < $b['created_date'];
                }

                usort($more5, 'sortByOrder');
                usort($fb, 'sortByOrder');
                usort($tw, 'sortByOrder');
                usort($walkin, 'sortByOrder');
                // usort($reward, 'sortByOrder');
                // array_sort($more4, 'created_date', SORT_ASC);
                // array_multisort($more1, $more2, $more3, $more4);


                $responsearray = array("status" => 2000, "success" => true, "message" => "User Points", "result" => array('my_points' => $points1, 'facebook_points' => $fb, 'twitter_points' => $tw, 'walking_points' => $walkin, 'all_transaction' => $more5));

                $this->response($responsearray, REST_Controller::HTTP_OK);
                // } else {
                //     $responsearray = array("status"=>2000,"success" => true, "message" => "User don't have any points", "result" => new stdClass() );
                //     $this->response($responsearray, REST_Controller::HTTP_OK);
                // }
            } else {

                $responsearray = array("status" => 6013, "success" => false, "message" => "User doesn't exists", "result" => new stdClass());
                $this->response($responsearray, REST_Controller::HTTP_OK);
            }
        } else {
            $key = json_encode(array_values($key));
            $key = str_replace(array('[', ']', '"', ','), array('', '', '', ', '), $key);
            $responsearray = array("status" => 4000, "success" => false, "message" => "The $key field is required", "result" => new stdClass());
            $this->response($responsearray, REST_Controller::HTTP_OK);
        }
    }