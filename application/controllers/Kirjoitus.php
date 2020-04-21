<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kirjoitus
 *
 * @author Saila
 */
class Kirjoitus extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('util');
        $this->load->model("kirjoitus_model");
    }
    
    public function index() {
        $data['kirjoitukset']= $this->kirjoitus_model->hae_kaikki();
        $data['main_content']="kirjoitus/kirjoitukset_view";
        $this->load->view("template",$data);
    }
    
    public function lisaa() {
        $data = array(
            'id'                =>'',
            'otsikko'           =>'',
            'teksti'            =>'',
            'kayttaja_id'       =>''
        );
        $data['main_content']="kirjoitus/kirjoitus_view";
        $this->load->view("template", $data);
    }
    
    public function tallenna() {
        $data = array(
            'id'                =>$this->input->post('id'),
            'otsikko'           =>$this->input->post('otsikko'),
            'teksti'            =>$this->input->post('teksti'),
            'kayttaja_id'       =>$this->input->post('kayttaja_id')
        );
        $this->kirjoitus_model->lisaa($data);
        
        $data['main_content']="kirjoitus/kirjoitus_view";
        $this->load->view("template", $data);
    }
    
    public function poista($id) {
        $this->kirjoitus_model->poista(intval($id));
        $this->index();
    }
}
