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
    var $entries = "";

    function Log(){
        parent::__construct();
    }
    function load($id){
        
    }
}
?>
