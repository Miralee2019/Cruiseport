<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beacon_model extends CI_Model {

    private $tablename = "T_Beacons";

    public function selectbyspace_Id($id) {

        return $this->db->select("*")->where('space_id', $id)->get($this->tablename)->result();
    }

    public function selectbystore_Id($id) {

        return $this->db->select("*")->where('store_id', $id)->get($this->tablename)->result();
    }

    function insert($data) {
        $this->db->insert($this->tablename, $data);
        return $this->db->insert_id();
    }

    function delete_option_byspaceId($id) {
        return $this->db->delete($this->tablename, array('space_id' => $id));
    }
    
    function selectunique($where){
        return $this->db->select("*")->where($where)->get($this->tablename)->result();
    }
}

?>
