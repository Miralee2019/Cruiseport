<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beacon_asign_model extends CI_Model{
    
    function getBySpaceId($space_id){
       $query=$this->db->select('*')
               ->where('space_id',$space_id)
               ->get('T_AssignBeacon');
       return $query->result();
    }
    
    function insertBatch($data){
        return $this->db->insert_batch('T_AssignBeacon', $data); 
    }
    function deleteBySpaceid($space_id){
        return $this->db->where('space_id',$space_id)
                ->delete('T_AssignBeacon');
    }
    
}
