<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kommentti_model
 *
 * @author Saila
 */
class Kommentti_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function hae_kaikki($id) {

        $this->db->select('*');
        $this->db->select('kommentti.id as id');
        $this->db->from('kommentti');
        $this->db->join('kayttaja', "kommentti.kayttaja_id = kayttaja.id", 'inner');
        $this->db->where('kirjoitus_id',$id);
        
        $kysely=$this->db->get();
        return $kysely->result();
    }
    
    public function lisaa($data) {
        $this->db->insert("kommentti", $data);
        return $this->db->insert_id();
    }
    
    public function poista($id) {
        $this->db->where('id',$id);
        $this->db->delete('kommentti');
    }
}
