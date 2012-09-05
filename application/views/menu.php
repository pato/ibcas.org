<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 16 - Created menu.php
 * April 24 - Created menu switching if user is logged in or not
 * May 10 - Added link to account
 * May 15 - Added link to manage_events
 *
 * ###################################################################################################
 */
/*
<div id="navigation_container">
    <div class="l-triangle-top"></div>
    <div class="l-triangle-bottom"></div>
    <div class="rectangle">
    <?php if (isset($alive)&&$alive==true){ ?>
        <ul id="navigation">
          <li><a href="/anizer">Home</a></li>
          <li><a href="/anizer/manage">Manage Events</a></li>
          <li><a href="/anizer/section?id=0">Creativity</a></li>
          <li><a href="/anizer/section?id=1">Action</a></li>
          <li><a href="/anizer/section?id=2">Service</a></li>
          <li><a href="/anizer/account">Account</a></li>
          <li><a href="/anizer/logout">Logout</a></li>
        </ul>
    <?php }else{ ?>
        <ul id="navigation">
           <li><a href="/anizer/login">Login</a></li>
           <li><a href="/anizer/signup">Signup</a></li>
        </ul>
   <?php } ?>
   </div>
   <div class="r-triangle-top"></div>
   <div class="r-triangle-bottom"></div>
</div>
 */
?>
<div class="container">
    <?php
    if (isset($alive)&&$alive==true){
    ?>
    <a href="/anizer">Home</a> | <a href="/anizer/manage">Manage Events</a> | <a href="/anizer/section?id=0">Creativity</a> | <a href="/anizer/section?id=1">Action</a> | <a href="/anizer/section?id=2">Service</a> | <a href="/anizer/account">Account</a> | <a href="/anizer/logout">Logout</a>
    <?php }else{ ?>
    <a href="/anizer/login">Login</a> | <a href="/anizer/signup">Signup</a>
    <?php } ?>
</div>

<?php $this->load->view("flashdata"); ?>
