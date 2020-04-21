<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kirjoitus_Model
 *
 * @author Saila
 */
class Kirjoitus_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function hae_kaikki() {
        $this->db->select('*');
        $this->db->select('kirjoitus.id as id');
        $this->db->from('kirjoitus');
        $this->db->join('kayttaja', "kirjoitus.kayttaja_id = kayttaja.id", 'inner');
        $this->db->order_by('paivays', 'desc');

        $kysely = $this->db->get();
        return $kysely->result();
    }

    public function hae($id) {
        $this->db->select('*');
        $this->db->select('kirjoitus.id as id');
        $this->db->from('kirjoitus');
        $this->db->join('kayttaja', "kirjoitus.kayttaja_id = kayttaja.id", 'inner');
        $this->db->where('kirjoitus.id', $id);

        $kysely = $this->db->get();
        return $kysely->row();
    }

    public function lisaa($data) {
        $this->db->insert('kirjoitus', $data);
        return $this->db->insert_id();
    }

    public function poista($id) {
        $this->db->where('kirjoitus_id', $id);
        $this->db->delete('kommentti');
        $this->db->where('id', $id);
        $this->db->delete('kirjoitus');
    }

}
