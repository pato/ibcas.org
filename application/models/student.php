<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 22 - Created Model
 * April 23 - Created loggedin variable, to check if user authenticated, added session mnagement
 * May 6 - Added deleteReflection and addReflections, as well added next url parameter for message_view
 * May 12 - Fixed signup to create example events in all categories
 * May 15 - Created addEvent, deleteEvent, renameEvent
 *
 * ###################################################################################################
 * @todo make log id when new events are added
 */
class Student extends CI_Model{
    var $username = "";
    var $password = "";
    var $id = 0;
    var $email = "";
    var $creativitytext = "";
    var $actiontext = "";
    var $servicetext = "";
    var $creativity = array();
    var $action = array();
    var $service = array();
    var $loggedin = false;
    var $background = 1;
    
    function Student(){
        parent::__construct();
    }
    function login($user, $pass){
        $query = $this->db->get_where('users', array('username' => $user, 'password' => $pass));
        if ($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $this->id = $row->id;
                $this->username = $row->username;
                $this->password = $row->password;
                $this->email    = $row->email;
                $this->background = $row->background;
                $this->creativitytext = $row->creativity;
                $this->actiontext     = $row->action;
                $this->servicetext    = $row->service;
            }
            $this->loadData();
            $this->loggedin =  true;
            if (!isset($_SESSION)){
            session_start();
            }
            $_SESSION['username']=$this->username;
            $_SESSION['password']=$this->password;
            $_SESSION['alive']=true;
            //$this->session->set_userdata(array('username'=>$this->username,'password'=>$this->password));
        }else{
            $this->loggedin =  false;
        }
    }
    function setBackground($newbackground){
        $this->background = $newbackground;
        $this->saveData();
    }
    function getBackground(){
        return $this->background;
    }
    function signup(){
	$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
		'email' => $this->input->post('email')
	);
	$this->db->insert('users', $data);
    }
    function loginForm(){
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->login($user,$pass);
    }
    function addGoalForm($type, $title, $name){
        if ($type=="creativity"){
            for ($i=0;$i<count($this->creativity['events']);$i++){
                if ($this->creativity['events'][$i]['title']==$title){
                    $this->creativity['events'][$i]['goal']=$name;
                }
            }
        }else if ($type=="action"){
            for ($i=0;$i<count($this->action['events']);$i++){
                if ($this->action['events'][$i]['title']==$title){
                    $this->action['events'][$i]['goal']=$name;
                }
            }
        }else if ($type=="service"){
            for ($i=0;$i<count($this->service['events']);$i++){
                if ($this->service['events'][$i]['title']==$title){
                    $this->service['events'][$i]['goal']=$name;
                }
            }
        }
        $this->saveData();
    }
    function addReflection($type, $title, $name){
        if ($type=="creativity"){
            for ($i=0;$i<count($this->creativity['events']);$i++){
                if ($this->creativity['events'][$i]['title']==$title){
                    //$this->creativity['events'][$i]['reflections']=$name;
                    array_push($this->creativity['events'][$i]['reflections'],$name);
                }
            }
        }else if ($type=="action"){
            for ($i=0;$i<count($this->action['events']);$i++){
                if ($this->action['events'][$i]['title']==$title){
                    //$this->action['events'][$i]['goal']=$name;
                    array_push($this->action['events'][$i]['reflections'],$name);
                    
                }
            }
        }else if ($type=="service"){
            for ($i=0;$i<count($this->service['events']);$i++){
                if ($this->service['events'][$i]['title']==$title){
                    //$this->service['events'][$i]['goal']=$name;
                    array_push($this->service['events'][$i]['reflections'],$name);
                }
            }
        }
        $this->saveData();
    }
    function addEvent($type, $title){
        if ($type=="Creativity"){
            array_push($this->creativity['events'],
                array(
                    'title'=>$title,
                    'goal'=>"null",
                    'reflections'=>array("null"),
                    'logid'=>124,
                    'hours'=>0
                ));
        }else if ($type=="Action"){
            array_push($this->action['events'],
                array(
                    'title'=>$title,
                    'goal'=>"null",
                    'reflections'=>array("null"),
                    'logid'=>124,
                    'hours'=>0
                ));
        }else if ($type=="Service"){
            array_push($this->service['events'],
                array(
                    'title'=>$title,
                    'goal'=>"null",
                    'reflections'=>array("null"),
                    'logid'=>124,
                    'hours'=>0
                ));
        }
        $this->saveData();
    }
    function deleteGoalForm($type, $title){
        if ($type=="creativity"){
            for ($i=0;$i<count($this->creativity['events']);$i++){
                if ($this->creativity['events'][$i]['title']==$title){
                    $this->creativity['events'][$i]['goal']="null";
                }
            }
        }else if ($type=="action"){
            for ($i=0;$i<count($this->action['events']);$i++){
                if ($this->action['events'][$i]['title']==$title){
                    $this->action['events'][$i]['goal']="null";
                }
            }
        }else if ($type=="service"){
            for ($i=0;$i<count($this->service['events']);$i++){
                if ($this->service['events'][$i]['title']==$title){
                    $this->service['events'][$i]['goal']="null";
                }
            }
        }
        $this->saveData();
    }
    function deleteReflection($type, $title, $number){
        if ($type=="creativity"){
            for ($i=0;$i<count($this->creativity['events']);$i++){
                if ($this->creativity['events'][$i]['title']==$title){
                    //$this->creativity['events'][$i]['reflections'][$number-1]="null";
                    unset($this->creativity['events'][$i]['reflections'][$number-1]);
                }
            }
        }else if ($type=="action"){
            for ($i=0;$i<count($this->action['events']);$i++){
                if ($this->action['events'][$i]['title']==$title){
                    //$this->action['events'][$i]['reflections'][$number-1]="null";
                    unset($this->action['events'][$i]['reflections'][$number-1]);
                }
            }
        }else if ($type=="service"){
            for ($i=0;$i<count($this->service['events']);$i++){
                if ($this->service['events'][$i]['title']==$title){
                    //$this->service['events'][$i]['reflections'][$number-1]="null";
                    unset($this->service['events'][$i]['reflections'][$number-1]);
                }
            }
        }
        $this->saveData();
    }
    function deleteEvent($type, $title){
        if ($type=="Creativity"){
            for ($i=0;$i<count($this->creativity['events']);$i++){
                if ($this->creativity['events'][$i]['title']==$title){
                    unset($this->creativity['events'][$i]);
                    break;
                }
            }
        }else if ($type=="Action"){
            for ($i=0;$i<count($this->action['events']);$i++){
                if ($this->action['events'][$i]['title']==$title){
                    unset($this->action['events'][$i]);
                    break;
                }
            }
        }else if ($type=="Service"){
            for ($i=0;$i<count($this->service['events']);$i++){
                if ($this->service['events'][$i]['title']==$title){
                    unset($this->service['events'][$i]);
                    break;
                }
            }
        }
        $this->updateTotal();
        $this->saveData();
    }
    function renameEvent($type, $old, $new){
        if ($type=="Creativity"){
            for ($i=0;$i<count($this->creativity['events']);$i++){
                if ($this->creativity['events'][$i]['title']==$old){
                    $this->creativity['events'][$i]['title']=$new;
                    break;
                }
            }
        }else if ($type=="Action"){
            for ($i=0;$i<count($this->action['events']);$i++){
                if ($this->action['events'][$i]['title']==$old){
                    $this->action['events'][$i]['title']=$new;
                    break;
                }
            }
        }else if ($type=="Service"){
            for ($i=0;$i<count($this->service['events']);$i++){
                if ($this->service['events'][$i]['title']==$old){
                    $this->service['events'][$i]['title']=$new;
                    break;
                }
            }
        }
        $this->saveData();
    }
    function updateTotal(){
        //Creativity
        $total = 0;
        foreach ($this->creativity['events'] as $event){
            $total += $event['hours'];
        }
        $this->creativity['totalHours'] = $total;

        //Action
        $total = 0;
        foreach ($this->action['events'] as $event){
            $total += $event['hours'];
        }
        $this->action['totalHours'] = $total;

        //Service
        $total = 0;
        foreach ($this->service['events'] as $event){
            $total += $event['hours'];
        }
        $this->service['totalHours'] = $total;
    }
    function loadData(){
       //Creativity
       $data = explode("|", $this->creativitytext);
       $events = explode("#",$data[1],-1);
       $this->creativity = array(
            'name' => "Creativity",
            'totalHours' => $data[0],
            'events' => array()
        );
       foreach($events as $event){
           $eventray = explode("^", $event);
           $builder = array(
               'title'=>$eventray[0],
               'goal'=>$eventray[1],
               'logid'=>$eventray[2],
               'hours'=>$eventray[3],
               
               'reflections'=>array(),
           );
           $reflections = explode("%", $eventray[4],-1);
           foreach($reflections as $reflection){
               array_push($builder['reflections'],$reflection);
           }
           array_push($this->creativity['events'],$builder);
       }
       //Action
       $data = explode("|", $this->actiontext);
       $events = explode("#",$data[1],-1);
       $this->action = array(
            'name' => "Action",
            'totalHours' => $data[0],
            'events' => array()
        );
       foreach($events as $event){
           $eventray = explode("^", $event);
           $builder = array(
               'title'=>$eventray[0],
               'goal'=>$eventray[1],
               'logid'=>$eventray[2],
               'hours'=>$eventray[3],

               'reflections'=>array(),
           );
           $reflections = explode("%", $eventray[4],-1);
           foreach($reflections as $reflection){
               array_push($builder['reflections'],$reflection);
           }
           array_push($this->action['events'],$builder);
       }
       //Service
       $data = explode("|", $this->servicetext);
       $events = explode("#",$data[1],-1);
       $this->service = array(
            'name' => "Service",
            'totalHours' => $data[0],
            'events' => array()
        );
       foreach($events as $event){
           $eventray = explode("^", $event);
           $builder = array(
               'title'=>$eventray[0],
               'goal'=>$eventray[1],
               'logid'=>$eventray[2],
               'hours'=>$eventray[3],

               'reflections'=>array(),
           );
           $reflections = explode("%", $eventray[4],-1);
           foreach($reflections as $reflection){
               array_push($builder['reflections'],$reflection);
           }
           array_push($this->service['events'],$builder);
       }

    }
    function fakeData(){
         $this->creativity = array(
            'name' => "Creativity",
            'totalHours' => 40,
            'events' => array(
                array(
                    'title'=>"Computer Science Contest",
                    'goal'=>"goalform.doc",
                    'reflections'=>array("reflection1.doc","reflection2.doc","reflection3.doc"),
                    'logid'=>123,
                    'hours'=>7
                ),
                array(
                    'title'=>"Mu Alpha Theta Contest",
                    'goal'=>"goalform.doc",
                    'reflections'=>array("reflection1.doc","reflection2.doc","reflection3.doc"),
                    'logid'=>124,
                    'hours'=>15
                )
            )
        );
         $this->action = array(
            'name' => "Action",
            'totalHours' => 12,
            'events' => array(
                array(
                    'title'=>"Paintballing",
                    'goal'=>"goalform.doc",
                    'reflections'=>array("reflection1.doc","reflection2.doc","reflection3.doc"),
                    'logid'=>123,
                    'hours'=>16
                ),
                array(
                    'title'=>"Going to the Gym",
                    'goal'=>"goalform.doc",
                    'reflections'=>array("reflection1.doc","reflection2.doc","reflection3.doc"),
                    'logid'=>124,
                    'hours'=>25
                )
            )
        );
         $this->service = array(
            'name' => "Service",
            'totalHours' => 25,
            'events' => array(
                array(
                    'title'=>"Klein Oak Special Ed Halloween Party",
                    'goal'=>"goalform.doc",
                    'reflections'=>array("reflection1.doc","reflection2.doc","reflection3.doc"),
                    'logid'=>123,
                    'hours'=>3
                ),
                array(
                    'title'=>"Church",
                    'goal'=>"goalform.doc",
                    'reflections'=>array("reflection1.doc","reflection2.doc","reflection3.doc"),
                    'logid'=>124,
                    'hours'=>6
                )
            )
        );
    }
    function saveData(){
        //Creativity
        $cur = $this->creativity;
        $text = "";
        $text .= $cur['totalHours']."|";
        foreach ($cur['events'] as $event){
            $text .= $event['title']."^";
            $text .= $event['goal']."^";
            $text .= $event['logid']."^";
            $text .= $event['hours']."^";
            foreach ($event['reflections'] as $reflection){
                $text .= $reflection."%";
            }
            $text .= "#";
        }
        $this->creativitytext = $text;
        //Action
        $cur = $this->action;
        $text = "";
        $text .= $cur['totalHours']."|";
        foreach ($cur['events'] as $event){
            $text .= $event['title']."^";
            $text .= $event['goal']."^";
            $text .= $event['logid']."^";
            $text .= $event['hours']."^";
            foreach ($event['reflections'] as $reflection){
                $text .= $reflection."%";
            }
            $text .= "#";
        }
        $this->actiontext = $text;
        //Service
        $cur = $this->service;
        $text = "";
        $text .= $cur['totalHours']."|";
        foreach ($cur['events'] as $event){
            $text .= $event['title']."^";
            $text .= $event['goal']."^";
            $text .= $event['logid']."^";
            $text .= $event['hours']."^";
            foreach ($event['reflections'] as $reflection){
                $text .= $reflection."%";
            }
            $text .= "#";
        }
        $this->servicetext = $text;
        //Update on MySQL
        $this->db->where('id',$this->id);
        $data = array(
            'creativity' => $this->creativitytext,
            'action' => $this->actiontext,
            'service' => $this->servicetext,
            'background' => $this->background
        );
        $this->db->update('users',$data);
    }

}
?>