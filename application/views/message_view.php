<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 24 - Created page, added redirect functionality
 * May 14 - Removed menu, redundant feature
 *
 * ###################################################################################################
 * +
 */

?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
    <script type="text/javascript">
        function redirect(){
            window.location = <?='"'.$url.'"'?>;
        }
    </script>
</head>
<body onLoad="setTimeout('redirect()', 2000)">
<center>
<div class="pageContent">
    <div id="main">
        <div class="container">
            <h1>IB CAS Organizer</h1>
        </div>
        <?php //$this->load->view("menu"); ?>
        <div class="container">
            <h1><?=$msg?></h1>
        </div>
        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
</html>
