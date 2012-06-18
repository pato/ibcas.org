<?php
class Test extends CI_Controller{
    function index(){
        $data['title']="Test Page";
        $data['heading']="Hello World!";
        $data['todo']=array('Clean House','Do Homework','Shower');
        $this->load->view('test_view',$data);
    }
}
?>
