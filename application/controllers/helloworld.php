<?php
/*
 * ##############CHANGELOG###########################################################################
 *
 *
 * ###################################################################################################
 * +
 */
class Helloworld extends CI_Controller{
    function index(){
        $this->load->model('helloworld_model');

        $data['result'] = $this->helloworld_model->getData();
        $data['page_title'] = "Hello World";
        $this->load->view('helloworld_view',$data);
    }
}
?>
