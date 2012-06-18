<?php
/*
 * ##############CHANGELOG###########################################################################
 * May 15, 2012 - Created page, encode function, rename, delete, add event
 *
 * ###################################################################################################
 * +
 */

function encode($string){
    return base64_encode($string);
}
?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">
	<div class="container">
            <h1>Manage Events</h1>
        </div>
        <?php $this->load->view("menu"); ?>
        <?php foreach ($sections as $section): ?>
            <div class="container">
                <h2><?=$section['name'] ?></h2><br>
                <table style="margin-left:auto;margin-right:auto;">
                <?php
                $i = 0;
                foreach ($section['events'] as $event):
                $i++;
                ?>
                    <tr>
                    <td width="500"><p><b><?=$event['title']?></b> (<?=$event['hours']?> Hours)</p></td>
                    <td><p><a href="/home/events?v=<?=encode("rename(^)".$section['name']."(^)".$event['title']) ?>">[Rename]</a></p></td>
                    <td><p><a href="/home/events?v=<<?=encode("delete(^)".$section['name']."(^)".$event['title']) ?>">[Delete]</a></p></td>
                    </tr>
                <?php endforeach; ?>
                </table>
                <h2><a href="/home/events?v=<?=encode("add(^)".$section['name']) ?>">::Add Event::</a></h2>
            </div>
    <?php endforeach; ?>

        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
</html>
