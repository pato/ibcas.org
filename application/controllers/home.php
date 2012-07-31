<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 15 - Created page
 * April 22 - Added support for new data model, changed section data parameter
 * April 23 - Created login, signup, and logout pages
 * April 24 - Added check for menu if logged in or not
 * May 6 - Added sandbox, as well as form handlers for deleting and adding of reflections, added background
 * May 10 - Created account management page
 * May 13 - Created message method, replaced all occurences
 * May 15 - Created manage page, event page for handling creation, renaming, and deletion of events
 * July 18 - Create log controller, sends data to log_view
 * July 29 - Created checking if user owns log, then loads log data; created updateLog, added validation for password change
 *
 * ###################################################################################################
 * @todo Create function to escape my characters from input
 * @todo Create check to make sure no two events are named the same
 */
class Home extends CI_Controller{
    private function message($m, $u, $a=true){
        $data['msg'] = $m;
        $data['url'] = $u;
        $data['alive'] = $a;
        $this->load->view('message_view', $data);
    }
    private function decode($string){
        return base64_decode($string);
    }
    public function index(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $data['creativity'] = array(0,$this->student->creativity['totalHours']);
            $data['action'] = array(1,$this->student->action['totalHours']);
            $data['service'] = array(2,$this->student->service['totalHours']);
            $data['alive'] = true;

            setcookie("bg",$this->student->getBackground());
            
            $this->load->view("home_view",$data);
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function section(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            if ($_GET['id']==0){
                $data = $this->student->creativity;
                $data['sname'] = "creativity";
            }else if ($_GET['id']==1){
                $data = $this->student->action;
                $data['sname'] = "action";
            }else if ($_GET['id']==2){
                $data = $this->student->service;
                $data['sname'] = "service";
            }
            $data['alive'] = true;
            $this->load->view("section_view",$data);
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function manage(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $data['sections'] = array($this->student->creativity,$this->student->action,$this->student->service);
            $data['alive'] = true;
            $this->load->view("manage_view",$data);
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function events(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if (!$this->student->loggedin){redirect('/home/login', 'refresh');}

        $task = explode("(^)", $this->decode($_GET['v']));
        if ($task[0]=="rename"){
            $data['action']="Rename";
            $data['section']=$task[1];
            $data['old']=$task[2];
            $data['url']="home/renameEvent";
            $this->load->view("rename_view", $data);
        }else if($task[0]=="delete"){
            $this->student->deleteEvent($task[1],$task[2]);
            $this->message("Event deleted!", "/home/manage");
        }else if($task[0]=="add"){
            $data['action']="Add";
            $data['section']=$task[1];
            $data['old']="";
            $data['url']="home/addEvent";
            $this->load->view("rename_view", $data);
        }
    }
    public function addEvent(){
        $this->load->model("student");
        if (!isset($_SESSION)){
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $section = $this->input->post('section');
            $name = $this->input->post('name');
            $this->student->addEvent($section, $name);
            $this->message("Event added!","/home/manage");
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function renameEvent(){
        $this->load->model("student");
        if (!isset($_SESSION)){
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $section = $this->input->post('section');
            $old = $this->input->post('old');
            $new = $this->input->post('name');
            $this->student->renameEvent($section, $old, $new);
            $this->message("Event renamed!","/home/manage");
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function signup(){
        $this->load->model("student");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_error_delimiters('<err>', '</err>');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('signup_view');
        }else{
            $this->student->signup();
            $this->message("Signed up successfully!","/home/login",false);
        }
    }
    public function login(){
        $this->load->model("student");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<err>', '</err>');
        if ($this->form_validation->run() == FALSE){
            $this->load->view('login_view');
        }else{
            $this->student->loginForm();
            if ($this->student->loggedin){
                $this->message("Logged in successfully!","/home", false);
            }else{
                $data['msg'] =  "Could not authenticate";
                $this->load->view('login_view',$data);
            }
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        $this->message("Logged out successfully!","/home/login",false);
    }
    public function log(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            //load data
            $this->load->model("log");
            $this->log->load($this->input->get('id'));
            if ($this->student->username!==$this->log->owner){die("You don't own this log");}
            $data['entries'] = $this->log->entries;
            $data['alive'] = true;
            $data['id'] = $this->input->get('id');
            $this->load->view("log_view",$data);
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function update_log(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $this->load->model("log");
            $this->log->load($this->input->post('id'));
            $this->log->updateData();
            $this->student->updateHours($this->input->post('id'));
            redirect('/home/log?id='.$this->input->post('id'), 'refresh');
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function delete_goal(){
        $this->load->model("student");
        if (!isset($_SESSION)){
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $file = $this->input->post('event_file');
            $type = $this->input->post('event_type');
            $title = $this->input->post('event_title');
            $this->student->deleteGoalForm($type, $title);
            unlink("files/".$file);
            $this->message("Goal form deleted!",$this->input->post('url'));
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function delete_reflection(){
        $this->load->model("student");
        if (!isset($_SESSION)){
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $file = $this->input->post('event_file');
            $type = $this->input->post('event_type');
            $title = $this->input->post('event_title');
            $num = $this->input->post('number');
            $this->student->deleteReflection($type, $title, $num);
            unlink("files/".$file);
            $this->message("Reflection deleted!",$this->input->post('url'));
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function upload_goal(){
        $this->load->model("student");
        if (!isset($_SESSION)){
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $config['upload_path'] = './files/';
            $config['allowed_types'] = 'doc|docx|pdf|txt|text';
            $config['max_size']	= '10000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    $this->message("<err>Error uploading</err>",$this->input->post('url'));
            }else{
                    $udata = $this->upload->data();
                    $name = rand(100000,999999).'-'.$this->student->username.'-'.$udata['file_name'];
                    rename($udata['full_path'], $udata['file_path'].$name);
                    $type = $this->input->post('event_type');
                    $title = $this->input->post('event_title');
                    $this->student->addGoalForm($type, $title, $name);
                    $this->message("Uploaded succesfully!",$this->input->post('url'));
            }
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function upload_reflection(){
        $this->load->model("student");
        if (!isset($_SESSION)){
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $config['upload_path'] = './files/';
            $config['allowed_types'] = 'doc|docx|pdf|txt|text';
            $config['max_size']	= '10000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    $this->message("<err>Error uploading</err>",$this->input->post('url'));
            }else{
                    $udata = $this->upload->data();
                    $name = rand(100000,999999).'-'.$this->student->username.'-'.$udata['file_name'];
                    rename($udata['full_path'], $udata['file_path'].$name);
                    $type = $this->input->post('event_type');
                    $title = $this->input->post('event_title');
                    $this->student->addReflection($type, $title, $name);
                    $this->message( "Uploaded succesfully!", $this->input->post('url'));
            }
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function event(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $data['event'] = $this->student->creativity['events'][0];
            $data['event']['type']='creativity';
            $this->load->view("event_view",$data);
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function sandbox(){
        echo "http://".$_SERVER['HTTP_HOST'];
    }
    public function bg(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $this->student->setBackground($this->input->get("id"));
            setcookie("bg",$this->student->getBackground());
            
            $this->message("Background Changed!", "/");
            
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function account(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $data['background'] = $this->student->background;
            $data['username'] = $this->student->username;
            $data['email'] = $this->student->email;
            $this->load->view("account_view", $data);
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function changeEmail(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $this->student->setEmail($this->input->post("email"));
            $this->message("Email changed successfully!", '/home');
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function changePassword(){
        $this->load->model("student");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|matches[repassword]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required');
        $this->form_validation->set_error_delimiters('<err>', '</err>');
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            if ($this->form_validation->run() == FALSE){
                $data['background'] = $this->student->background;
                $data['username'] = $this->student->username;
                $data['email'] = $this->student->email;
                $this->load->view('account_view', $data);
            }else{
                $this->student->setPassword($this->input->post("repassword"));
                $this->message("Password changed successfully!", '/home/logout');
            }
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function saveAccount(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            $this->student->setBackground($this->input->get("id"));
            setcookie("bg",$this->student->getBackground());
        }else{
            redirect('/home/login', 'refresh');
        }
    }
    public function manage_events(){
        $this->load->model("student");
        if (!isset($_SESSION)) {
            session_start();
            $this->student->login($_SESSION['username'],$_SESSION['password']);
        }
        if ($this->student->loggedin){
            //code goes here
        }else{
            redirect('/home/login', 'refresh');
        }
    }
}
?>