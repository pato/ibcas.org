<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 15 - Created page, sections
 * April 22 - Added support for new data model
 * May 15 - Added doctype, allows progressbars to work
 *
 * ###################################################################################################
 * +
 */

function section($section){
    if ($section[0]==0){
        echo '<a href="/home/section?id=0">';
    }else if ($section[0]==1){
        echo '<a href="/home/section?id=1">';
    }else{
        echo '<a href="/home/section?id=2">';
    }
    ?>
    <div class="meter">
        <span style="width: <?php echo 100*($section[1]/50); ?>%"></span>
    </div>
    </a>
    <p>Total Hours: <?php echo $section[1]; ?></p>

    <?php
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
    <link href='/favicon.ico' rel='shortcut icon'/>
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
