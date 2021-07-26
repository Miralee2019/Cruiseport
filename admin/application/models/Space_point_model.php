<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Space_point_model extends CI_Model{
    
private $tablename= "T_SpacePoint";
  
  public function selectby_spaceId($id){
     return $this->db->select("*")->where('space_id',$id)->get($this->tablename)->result();
  } 
      
  function insert($data){
      $this->db->insert($this->tablename,$data);
      return $this->db->insert_id();
      
  }
  function deleteby_spaceId($id){
    return  $this->db->delete($this->tablename,array('space_id'=>$id));
  }
}

?>