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

?>
<div class="container">
    <?php
    if (isset($alive)&&$alive==true){
    ?>
    <a href="/home">Home</a> | <a href="/home/manage">Manage Events</a> | <a href="/home/section?id=0">Creativity</a> | <a href="/home/section?id=1">Action</a> | <a href="/home/section?id=2">Service</a> | <a href="/home/account">Account</a> | <a href="/home/logout">Logout</a>
    <?php }else{ ?>
    <a href="/home/login">Login</a> | <a href="/home/signup">Signup</a>
    <?php } ?>
</div>
