<?php

class Kayttaja extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('kayttaja_model');
        $this->load->model('kirjoitus_model');
        $this->load->library('session');
    }

    public function index() {
        $data['main_content']="kayttaja/register_view";
        $this->load->view("template",$data);
    }

    public function register_kayttaja() {

        $kayttaja = array(
            'sukunimi' => $this->input->post('sukunimi'),
            'etunimi' => $this->input->post('etunimi'),
            'tunnus' => $this->input->post('tunnus'),
            'salasana' => md5($this->input->post('salasana')),
            'email' => $this->input->post('email')
        );
        print_r($kayttaja);

        $tunnus_check = $this->kayttaja_model->tunnus_check($kayttaja['tunnus']);

        if ($tunnus_check) {
            $this->kayttaja_model->register_kayttaja($kayttaja);
            $this->session->set_flashdata('success_msg', 'Rekisteröinti onnistui. Nyt voit kirjautua tunnuksellasi.');
            redirect('kayttaja/login_view');
        } else {
            $this->session->set_flashdata('error_msg', 'Virhe. Yritä uudelleen.');
            redirect($this->index());
        }
    }

    public function login_view() {
        $data['main_content']="kayttaja/login_view";
        $this->load->view("template",$data);
    }

    function login_kayttaja() {
        $kayttaja_login = array(
            'tunnus' => $this->input->post('tunnus'),
            'salasana' => md5($this->input->post('salasana'))
        );

        $data = $this->kayttaja_model->login_kayttaja($kayttaja_login['tunnus'], $kayttaja_login['salasana']);
        if ($data) {
            $this->session->set_userdata('id', $data['id']);
            $this->session->set_userdata('tunnus', $data['tunnus']);

            redirect($this->kirjoitukset_view());
        } else {
            $this->session->set_flashdata('error_msg', 'Virhe. Yritä uudelleen.');
            $this->login_view();
        }
    }

    function kirjoitukset_view() {
        $data['main_content'] = "kirjoitus/kirjoitukset_view";
        $this->load->view("template", $data);
    }
    
    public function kayttaja_logout() {
        $this->session->sess_destroy();
        redirect('kayttaja/login_view', 'refresh');
    }

}
