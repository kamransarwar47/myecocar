<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propose_route extends CI_Controller
{

    /**
     * Page Propose Route
     */
    public function index()
    {
        $this->form_validation->set_rules('origin_input', 'D’où partez-vous', 'trim|required');
        $this->form_validation->set_rules('destination_input', 'Où allez-vous', 'trim|required');
        $this->form_validation->set_rules('datepickerFrom', 'Date de départ', 'trim|required');
        $this->form_validation->set_rules('depart_time_input', 'heure de départ', 'trim|required');
        if ($this->input->post('round_trip_checkbox') == 'on') {
            $this->form_validation->set_rules('datepickerTo', 'Date de retour', 'trim|required');
            $this->form_validation->set_rules('arrival_time_input', 'temps de retour', 'trim|required');
        }
        $this->form_validation->set_rules('vehicle_model_make', 'Marque et modèle', 'trim|required');
        $this->form_validation->set_rules('fuel_type', 'Carburant', 'trim|required');
        $this->form_validation->set_rules('free_spaces', 'Places libres', 'trim|required');
        $this->form_validation->set_rules('baggages', 'bagages', 'trim|required');
        $this->form_validation->set_rules('max_detour', 'Détour maximum', 'trim|required');
        $this->form_validation->set_rules('sch_flex', 'Flexibilité Horaire', 'trim|required');
        $this->form_validation->set_rules('acceptance', 'Acceptation', 'trim|required');
        $this->form_validation->set_rules('travel_description', 'Description du trajet', 'trim|required');
        $this->form_validation->set_rules('travel_charges', 'entrer le montant', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title']   = 'PROPOSER UNE ROUTE';
            $data['content'] = $this->load->view('page-propose-route', '', true);
            $this->load->view('templates/template', $data);
        } else {
            $data['user_id']            = $this->session->userdata('User_LoginId');
            $data['origin_input']       = $this->input->post('origin_input');
            $data['origin_city']        = $this->input->post('origin_city');
            $data['origin_country']     = $this->input->post('origin_country');
            $data['destination_input']  = $this->input->post('destination_input');
            $data['dest_city']          = $this->input->post('dest_city');
            $data['dest_country']       = $this->input->post('dest_country');
            $data['datepickerFrom']     = date('Y-m-d', strtotime($this->input->post('datepickerFrom')));
            $data['depart_time_input']  = date('H:i:s', strtotime($this->input->post('depart_time_input')));
            $data['vehicle_model_make'] = $this->input->post('vehicle_model_make');
            $data['fuel_type']          = $this->input->post('fuel_type');
            $data['free_spaces']        = $this->input->post('free_spaces');
            $data['baggages']           = $this->input->post('baggages');
            $data['max_detour']         = $this->input->post('max_detour');
            $data['sch_flex']           = $this->input->post('sch_flex');
            $data['acceptance']         = $this->input->post('acceptance');
            $data['travel_description'] = $this->input->post('travel_description');
            $data['travel_charges']     = $this->input->post('travel_charges');

            if ($this->common_model->insert('route', $data) != false) {
                // return tour details
                if (isset($_POST['round_trip_checkbox']) && $_POST['round_trip_checkbox'] == 'on') {
                    $data['origin_input']      = $this->input->post('destination_input');
                    $data['origin_city']       = $this->input->post('dest_city');
                    $data['origin_country']    = $this->input->post('dest_country');
                    $data['destination_input'] = $this->input->post('origin_input');
                    $data['dest_city']         = $this->input->post('origin_city');
                    $data['dest_country']      = $this->input->post('origin_country');
                    $data['datepickerFrom']    = date('Y-m-d', strtotime($this->input->post('datepickerTo')));
                    $data['depart_time_input'] = date('H:i:s', strtotime($this->input->post('arrival_time_input')));
                    $this->common_model->insert('route', $data);
                }
            }

            set_message('You Have Entered a Travel Successfully', 'success');
            redirect('propose_route');
        }
    }

}
