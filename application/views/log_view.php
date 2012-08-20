<?php
/*
 * ##############CHANGELOG###########################################################################
 * May 18, 2012 - Created page
 * July 28 - Create table based on log data, each entry is its own form
 * July 29 - Created on big form for all entires, count of entires, as well as 5 empty entries at the bottom, added tablecloth
 *
 * ###################################################################################################
 */

?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
    <link href="../tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="../tablecloth/tablecloth.js"></script>
    <script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
                useMode:2,
                target:"date1",
                dateFormat:"%Y-%m-%d",
                limitToToday:true
        });
    </script>
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
            <h3>Entries</h3>
            <form action="/anizer/update_log" method="POST">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th>Activity</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Hours</th>
                </tr>
            <?php $count = 0; foreach ($entries as $entry): $count+=1; ?>
                <tr>
                    <td><input type="text" name="title<?=$count?>" value="<?=$entry['title']?>" size="40"></td>
                    <td><input type="text" name="date<?=$count?>" value="<?=$entry['date']?>"></td>
                    <td><input type="text" name="time<?=$count?>" value="<?=$entry['time']?>"></td>
                    <td><input type="text" name="hours<?=$count?>" value="<?=$entry['hours']?>" size="10"></td>
                </tr>
            <?php endforeach; ?>
            <?php for($i=0;$i<5;$i++): $count+=1;?>
                <tr>
                    <td><input type="text" name="title<?=$count?>" value="" size="40"></td>
                    <td><input type="text" name="date<?=$count?>" value=""></td>
                    <td><input type="text" name="time<?=$count?>" value=""></td>
                    <td><input type="text" name="hours<?=$count?>" value="" size="10"></td>
                </tr>
            <?php endfor; ?>
            </table>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="count" value="<?=$count?>">
            <input type="submit" class="login" value="Save">
            </form>
        </div>
        <?php $this->load->view("footer"); ?>

    </div>
</div>
</center>
</body>
</html>
