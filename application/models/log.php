<?php
/*
 * ##############CHANGELOG############################################################################
 * May 18 - Created Model
 *
 * ###################################################################################################
 */
class Log extends CI_Model{
    var $id = 0;
    var $name = "";
    var $entries = "";

    function Log(){
        parent::__construct();
    }
    function load($id){
        
    }
}
?>
