<?php
/*
 * ##############CHANGELOG###########################################################################
 * May 15, 2012 - Created page, form, set the button and title to variable
 *
 * ###################################################################################################
 * +
 */

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
            <h1><?=$action ?> an Event</h1>
        </div>
        <div class="container">
            <a href="/home">Home</a> | <a href="/home/manage">Back</a>
        </div>
        <div class="container">
            <?=form_open($url)."\n"?>
            <p>Section: <?=$section ?></p>
            Name: <input type="text" class="input2" name="name" value="<?=$old ?>"><br>
            <input type="hidden" name="section" value="<?=$section ?>">
            <input type="hidden" name="old" value="<?=$old ?>">
            <input type="submit" class="login" value="<?=$action."!" ?>"/>
            </form>
        </div>
        <?php $this->load->view("footer"); ?>

    </div>
</div>
</center>
</body>
</html>
