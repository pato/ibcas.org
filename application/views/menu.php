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
    <a href="/anizer">Home</a> | <a href="/anizer/manage">Manage Events</a> | <a href="/anizer/section?id=0">Creativity</a> | <a href="/anizer/section?id=1">Action</a> | <a href="/anizer/section?id=2">Service</a> | <a href="/anizer/account">Account</a> | <a href="/anizer/logout">Logout</a>
    <?php }else{ ?>
    <a href="/anizer/login">Login</a> | <a href="/anizer/signup">Signup</a>
    <?php } ?>
</div>
