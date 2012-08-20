<?php
/*
 * ##############CHANGELOG###########################################################################
 * May 10 - Created page, allows changing of backgrounds
 * July 29 - Added settings for email and password, validation for forms
 *
 * ###################################################################################################
 * +
 */

?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/css/validationEngine.jquery.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/js/jquery.validationEngine-en.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/jquery.validationEngine.js" charset="utf-8"></script>
     <script type="text/javascript">
       $(document).ready(function() {
           //$("#backgroundselect").hide();
           //$("#settings").hide();
           $("#show_bk").click(function (){
               $("#backgroundselect").toggle("slow");
           });
           $("#show_es").click(function (){
               $("#settings").toggle("slow");
           });
        $("#emailform").validationEngine();
        //$("#passwordform").validationEngine();
       });
     </script>
    <?$this->load->view('tracking');?>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">
	<div class="container">
            <h1>Account Management</h1>
        </div>
        <?php $data['alive']=true;$this->load->view("menu",$data); ?>
        <div class="container" >
             <h3><a href="#" id="show_es">Settings</a></h3>
             <div id="settings">
                 <h4>Change Information</h4>
                 <form action="/anizer/changeInfo" method="POST" id="emailform">
                     <table style="margin-left: auto;margin-right: auto;">
                         <tr>
                             <td>Full Name:</td>
                            <td><input type="text" class="input2" name="fullname" value="<?=$fullname?>"></td>
                         </tr>
                         <tr>
                             <td>Candidate ID:</td>
                            <td><input type="text" class="input2" name="candidateid" value="<?=$candidateid?>"></td>
                         </tr>
                         <tr>
                             <td>School Code:</td>
                            <td><input type="text" class="input2" name="school" value="<?=$school?>"></td>
                         </tr>
                         <tr>
                     </table>
                 <input type="submit" value="Change" class="login">
                 </form>
                 <h4>Change Email</h4>
                 <form action="/anizer/changeEmail" method="POST" id="emailform">
                     <table style="margin-left: auto;margin-right: auto;">
                         <tr>
                             <td>Username:</td>
                             <td><?=$username?></td>
                         </tr>
                         <tr>
                             <td>Email:</td>
                             <td><input type="text" class="input2 validate[required,custom[email]]" name="email" id="email" value="<?=$email?>"></td>
                         </tr>
                         <tr>
                     </table>
                 <input type="submit" value="Change" class="login">
                 </form>
                 <?php echo validation_errors(); ?>
                 <h4>Change Password</h4>
                 <form action="/anizer/changePassword" method="POST" id="passwordform">
                     <table style="margin-left: auto;margin-right: auto;">
                         <tr>
                             <td>New Password:</td>
                             <td><input type="password" name="password1" id="password1" class="input2 validate[required,minSize[6]]"></td>
                         </tr>
                         <tr>
                             <td>Retype Password:</td>
                             <td><input type="password" name="repassword" id="repassword "class="input2 validate[required,equals[password1]]"></td>
                         </tr>
                     </table>
                     <input type="submit" value="Change" class="login">
                 </form>
             </div>
        </div>
        <?=form_open('anizer/saveAccount')."\n"?>
        <div class="container" >
            <h3><a href="#" id="show_bk">Background Select</a></h3>
            <table style="margin-left: auto;margin-right: auto;" id="backgroundselect">
                <tr>
                    <?php
                    for ($i=1;$i<=30;$i++){
                        if (($i-1)%6==0){
                            echo '</tr><tr>';
                        }
                        echo '<td>';
                        echo '<a href="../anizer/bg?id='.$i.'">';
                        echo '<div style="background:url(\'../img/bg'.$i.'.gif\') repeat;margin:3px;width:100px; height:100px; border:2px solid;" ><span style="font-size:80px; padding-left:30px;">
                            </span></div>';
                        echo '</a></td>';
                    }
                    ?>
                </tr>
            </table>
        </div>
        </form>
        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
</html>
