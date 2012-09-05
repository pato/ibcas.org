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
            $color = "";
        }
	if ($progress>70){
		$color = "";
	}else if ($progress>35){
		$color = " orange";
	}else{
		$color = " red";
	}
    ?>
    <div class="meter<?=$color?>">
        <span style="width: <?=$progress?>%"></span>
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
    <link rel="stylesheet" href="../css/style.php" type="text/css"/>
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
        <div class="container">
            <h1>IB CAS Organizer</h1>
        </div>
        <?php $this->load->view("menu"); ?>
        <div class="container">
            <?php /*
            <h3>Total Progress</h3>
                <div class="meter">
                <span style="width: <?=$totalprogress?>%"></span>
                </div>
                <p>Total Hours: <?=$totalhours?></p>
            <h3>Individual Progress</h3>
             *
             */ ?>
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
        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
</html>
