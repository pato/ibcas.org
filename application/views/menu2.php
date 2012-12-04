<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </a>
            <a class="brand" href="../anizer">IB CAS Organizer</a>

            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <?php if (isset($alive) && $alive == true) { ?>
                        <li><a href="/anizer">Home</a></li>
                        <li><a href="/anizer/manage">Manage Events</a></li>
                        <li><a href="/anizer/section?id=0">Creativity</a></li>
                        <li><a href="/anizer/section?id=1">Action</a></li>
                        <li><a href="/anizer/section?id=2">Service</a></li>
                        <li><a href="/anizer/account">Account</a></li>
                        <li><a href="/anizer/logout">Logout</a></li>
                    <?php } else {?>
                        <li><a href="/anizer/login">Login</a></li>
                        <li><a href="/anizer/signup">Signup</a></li>
                    <?php } ?>
                </ul>
            </div>
            </div>
    </div>
</div>


<?php $this->load->view("flashdata"); ?>
