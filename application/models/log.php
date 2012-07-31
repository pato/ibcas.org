<?php
/*
 * ##############CHANGELOG############################################################################
 * May 18 - Created Model
 * July 28 - Added function to create fakeData and build the array
 * July 29 - Added saving/loading/updating of data from/to mySQL datebase
 *
 * ###################################################################################################
 */
class Log extends CI_Model{
    var $id = 0;
    var $owner = "";
    var $entries = array();
    var $entriestext = "";
    var $hours = "";

    function Log(){
        parent::__construct();
    }
    function load($id){
        //$this->fakeData();
        $this->db->where('id',$id);
        $query = $this->db->get('logs');
        if ($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $this->id = $row->id;
                $this->owner = $row->owner;
                $this->entriestext = $row->entries;
                $this->hours = $row->hours;
            }
            $this->loadData();
        }else{
            //no log found
        }
    }
    function updateData(){
        $this->entries = array();
        for ($i=1;$i<=$this->input->post('count');$i++){
            if ($this->input->post('title'.$i)!==""){
                array_push($this->entries, array(
                    'title' => $this->input->post('title'.$i),
                    'date' => $this->input->post('date'.$i),
                    'time' => $this->input->post('time'.$i),
                    'hours' => $this->input->post('hours'.$i)
                ));
            }
        }
        $this->saveData();
    }
    function loadData(){
        //convert the entriestext into an array of entries
        $events = explode("#", $this->entriestext);
        for ($i=0;$i<(count($events)-1);$i++){
            $data = explode("^", $events[$i]);
            array_push($this->entries, array(
                'title' => $data[0],
                'date' => $data[1],
                'time' => $data[2],
                'hours' => $data[3]
            ));
        }
    }
    function saveData(){
        $text = "";
        $totalhours = 0;
        foreach ($this->entries as $entry){
            $text .= $entry['title']."^";
            $text .= $entry['date']."^";
            $text .= $entry['time']."^";
            $text .= $entry['hours']."^";
            $text .= "#";
            $totalhours += intval($entry['hours']);
        }
        $this->entriestext = $text;
        $this->hours = $totalhours;
        
        //Update on MySQL
        $this->db->where('id',$this->id);
        $data = array(
            'entries' => $this->entriestext,
            'hours' => $this->hours
        );
        $this->db->update('logs',$data);
    }
    function fakeData(){
        $this->entries = array(
            array(
                'title' => "Wore Shoes",
                'date' => "07/07/2012",
                'time' => "8pm-10pm",
                'hours' => "2"
            ),
            array(
                'title' => "Wore bigger shoes",
                'date' => "07/08/2012",
                'time' => "8pm-10pm",
                'hours' => "2"
            ),
            array(
                'title' => "Wore huge shoes",
                'date' => "07/18/2012",
                'time' => "6pm-10pm",
                'hours' => "4"
            )
        );
    }
}
?>
