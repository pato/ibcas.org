<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 15 - Created page, sections
 * April 22 - Added support for new data model
 * May 15 - Added doctype, allows progressbars to work
 * August 14 - Progress bars now change color depending on progress, limit progress to 100
 *
 * ###################################################################################################
 * +
 */

function section($section){
    if ($section[0]==0){
        echo '<a href="/anizer/section?id=0">';
    }else if ($section[0]==1){
        echo '<a href="/anizer/section?id=1">';
    }else{
        echo '<a href="/anizer/section?id=2">';
    }
	$progress = 100*($section[1]/50);
        if ($progress>100){
            $progress = 100;
            $color = "progress-success";
        }
	if ($progress>70){
		$color = " progress-success";
	}else if ($progress>35){
		$color = " progress-warning";
	}else{
		$color = " progress-danger";
	}
        $color .= " progress-striped";
    ?>
    <div class="progress <?=$color?>">
        <div class="bar" style="width: <?=$progress?>%;"></div>
    </div>

    </a>
    <p>Total Hours: <?php echo $section[1]; ?></p>

    <?php
}

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
    <script type="text/javascript">
       $(document).ready(function() {
           $("#show_news").click(function (){
               $("#news").toggle("fast");
           });
       });
    </script>
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
                        <h3>Overview</h3>
                        <table class="progress">
                            <tr>
                                <td>
                                    <div class="section">
                                        <h2>Creativity</h2>
                                        <?php section($creativity); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="section">
                                        <h2>Action</h2>
                                         <?php section($action); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="section">
                                        <h2>Service</h2>
                                        <?php section($service); ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="news" class="unit">
                        <h3 id="show_news"> News</h3>
                        <div class="well" style="background-color: #fff;">
                            <h4>November 13, 2012</h4>
                            <p>Started site-wide UI update</p>
                            <?/*
                            <h4>September 9, 2012</h4>
                            <p>Thanks to a suggestion, CAS events can now be created, renamed, and deleted from the section view</p>
                            <p>Furthermore, before an event is permanently deleted, a confirmation dialog will be shown</p>
                            <h4>September 8, 2012</h4>
                            <p>The menu has been re-designed</p>
                            <p>News section was added to the homepage</p>
                             */?>
                        </div>
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
