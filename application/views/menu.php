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

<div class="container" style="padding:10px;">
    <?php
    if (isset($alive)&&$alive==true){
    ?>
    <table style="margin-left:11%;margin-right:10px;width:70%;">
        <tr>
            <td><a href="/anizer">Home</a> | <a href="/anizer/manage">Manage Events</a></td>
            <td><a href="/anizer/section?id=0">Creativity</a> &#9734 <a href="/anizer/section?id=1">Action</a> &#9734 <a href="/anizer/section?id=2">Service</a></td>
            <td><a href="/anizer/account">Account</a> | <a href="/anizer/logout">Logout</a></td>
        </tr>
    </table>
    <?php }else{ ?>
    <a href="/anizer/login">Login</a> | <a href="/anizer/signup">Signup</a>
    <?php } ?>
</div>

<?php $this->load->view("flashdata"); ?>
