<?php
/*
 * ##############CHANGELOG###########################################################################
 * Aug 17, 2012 - Created page
 *
 * ###################################################################################################
 * <link rel="stylesheet" href="/css/style.php" type="text/css"/>
 */

?>
<? $this->load->view("doctype"); ?>
<html>
<head>
    <title>IB CAS Organizer</title>

    <link href="../css/mystyle.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <link href='/favicon.ico' rel='shortcut icon'/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <meta name="description" content="This is an IB CAS requirements organizer, used to handle all the paperwork and logs that are required for completion of the CAS section of the IB Diploma Programme." />
    <meta name="keywords" content="ib, cas, organizer, international, baccalaureate, manager, agenda, free, diploma, programme, program, logs, paperwork, required, creativity, action, service" />
    <meta name="author" content="Patricio Lankenau" />
    <?$this->load->view('tracking');?>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">        
	<?php $this->load->view("menu2"); ?>
        <div class="container">
            <div class="row-fluid">
                <div class="span10 offset1">
                    <div class="unit">
                        <div class="page-header">
                            <h1>IB CAS Organizer</h1>
                        </div>
                        <h4>This is an IB CAS organizer, used to handle all the paperwork and logs that are required for completion of the CAS section of the IB Diploma Program.</h4>
                        <table>
                            <tr>
                                <td>
                                <div class='wrapper'>
                                    <img class="img-rounded" src='../img/overview.png' width="640"/>
                                    <div class='description'>
                                        <h4>Track your progress in Creativity, Action, and Service</h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class='wrapper'>
                                <img class="img-rounded" src='../img/manage.png' width="640"/>
                                <div class='description'>
                                    <h4>Create and manage all your events</h4>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class='wrapper'>
                                <img class="img-rounded" src='../img/logs.png' width="640"/>
                                <div class='description'>
                                    <h4>Keep track of your logs online</h4>
                                </div>
                            </div>
                            </td>
                        </tr>
                    </table>
                <h3>And much more!</h3>
                </div>
                <?php $this->load->view("footer2"); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</center>
</body>
</html>
