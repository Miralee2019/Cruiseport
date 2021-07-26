<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Space_model extends CI_Model {

    private $tablename = "T_Space";

    public function selectby_Id($id) {

        return $this->db->select("*")->where('space_id', $id)->get($this->tablename)->row();
    }

    public function selectAll() {

        return $this->db->select("*")->order_by('space_id', 'DESC')->get($this->tablename)->result();
    }

    public function selectAll_byname() {

        return $this->db->select("*")->order_by('space_name', 'ASC')->get($this->tablename)->result();
    }
    public function selectAll_bydate() {

        return $this->db->select("*")->order_by('last_update', 'DESC')->get($this->tablename)->result();
    }

    function insert($data) {
        $this->db->insert($this->tablename, $data);
        return $this->db->insert_id();
    }

    function delete($id) {
        return $this->db->delete($this->tablename, array('space_id' => $id));
    }

    function update($id, $params) {
        $this->db->where('space_id', $id);
        $this->db->update($this->tablename, $params);
        return $id;
    }

}

?>