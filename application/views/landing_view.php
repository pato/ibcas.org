<?php
/*
 * ##############CHANGELOG###########################################################################
 * Aug 17, 2012 - Created page
 *
 * ###################################################################################################
 * +
 */

?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
    <link href='/favicon.ico' rel='shortcut icon'/>
    <meta name="description" content="This is an IB CAS requirements organizer, used to handle all the paperwork and logs that are required for completion of the CAS section of the IB Diploma Programme." />
    <meta name="keywords" content="ib, cas, organizer, international, baccalaureate, manager, agenda, free, diploma, programme, program, logs, paperwork, required, creativity, action, service" />
    <meta name="author" content="Patricio Lankenau" />
    <?$this->load->view('tracking');?>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">
	<div class="container">
            <h1>IB CAS Organizer</h1>
        </div>
        <?php $this->load->view("menu"); ?>
        <div class="container" style="height:700px;">
            <p>This is an IB CAS requirements organizer, used to handle all the paperwork and logs that are required for completion of the CAS section of the IB Diploma Program.</p>
                <h2>Features</h2>
                <div class="features">
                <table>
                    <tr>
                        <td>
                        <div class='wrapper'>
                            <img class="img" src='../img/overview.png' width="640"/>
                            <div class='description'>
                                <p class='description_content'>Track your progress in Creativity, Action, and Service</p>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <div class='wrapper'>
                        <img class="img" src='../img/manage.png' width="640"/>
                        <div class='description'>
                            <p class='description_content'>Create and manage all your events</p>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <div class='wrapper'>
                        <img class="img" src='../img/logs.png' width="640"/>
                        <div class='description'>
                            <p class='description_content'>Keep track of your logs online</p>
                        </div>
                    </div>
                    </td>
                </tr>
                </table>
            </div>
            <h2>And much more!</h2>
        </div>
        <?php //<div class="container" style="height:450px;background:#ffffff url('../img/landing.png') no-repeat;"></div> ?>
            
        <?php $this->load->view("footer"); ?>

    </div>
</div>
</center>
</body>
</html>
