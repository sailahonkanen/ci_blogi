<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kommentti
 *
 * @author Saila
 */
class Kommentti extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('util');
        $this->load->model('kirjoitus_model');
        $this->load->model('kommentti_model');
        $this->load->helper('url');
    }
    
    public function index($id) {
        $data['kirjoitus']= $this->kirjoitus_model->hae($id);
        $data['kommentit']= $this->kommentti_model->hae_kaikki($id);
        $data['main_content']="kommentti/kommentti_view";
        $this->load->view("template.php",$data);
        
    }
    
    public function tallenna() {
        $id = $this->input->post('kirjoitus_id');
        $data = array(
            'teksti'            => $this->input->post('teksti'),
            'kirjoitus_id'      => $id,
            'kayttaja_id'       =>$this->input->post('kayttaja_id')
            
        );
        $this->kommentti_model->lisaa($data);
        redirect('kommentti/index/' . $id, 'refresh');
    }
    
    public function poista($id,$kirjoitus_id) {
        $this->kommentti_model->poista(intval($id));
        redirect('kommentti/index/' . $kirjoitus_id,'refresh');
    }
}
