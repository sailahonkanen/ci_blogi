<?php

class Kayttaja_model extends CI_Model {

    public function register_kayttaja($kayttaja) {

        $this->db->insert('kayttaja', $kayttaja);
    }

    public function login_kayttaja($tunnus, $salasana) {
        $this->db->where('tunnus', $tunnus);
        $this->db->where('salasana', $salasana);
        
        $query = $this->db->get('kayttaja');

        if ($query == $this->db->get('kayttaja')) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function tunnus_check($tunnus) {

        $this->db->select('*');
        $this->db->from('kayttaja');
        $this->db->where('tunnus', $tunnus);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

}
