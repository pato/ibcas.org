<?php
/*
 * ##############CHANGELOG############################################################################
 * May 18 - Created Model
 *
 * ###################################################################################################
 * @TODO - Add function to load/save log
 */
class Log extends CI_Model{
    var $id = 0;
    var $owner = "";
    var $entries = array();
    var $entriestext = "";

    function Log(){
        parent::__construct();
    }
    function load($id){
        if ($id==0) 
            $this->fakeData();
    }
    function fakeData(){
        $this->entries = array(
            array(
                'date' => "07/07/2012",
                'title' => "Wore Shoes"
            ),
            array(
                'date' => "07/08/2012",
                'title' => "Wore bigger shoes"
            )
        );
    }
}
?>
