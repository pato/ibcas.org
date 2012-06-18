<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 15 - Created page
 * April 16 - Added file section to every event
 * April 17 - Create jquery to hide files content
 * April 24 - Removed the files from section view, linked to event viewer
 *
 * ##################################################################################################
 */

?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
     <script type="text/javascript">
       $(document).ready(function() {
           <?php
           for ($y=1;$y<=count($events);$y++){
            echo "$('#files_".$y."').hide();\n";
            echo '$("#show_'.$y.'").click(function () {';
            echo '$("#files_'.$y.'").toggle("slow");';
            echo '});';
           }
           ?>
           
       });
     </script>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">
	<div class="container">
            <h1><?php echo $name; ?></h1>
        </div>
        <?php $this->load->view("menu"); ?>
        <?php
        $i = 0;
        foreach ($events as $event):
        $i++;
        echo '<div class="container">';
        echo '<h3>'.$event['title'].'</h3>';
        echo '<p>Hours: '.$event['hours'].'</p>';
        echo '<p><a href="'.$event['goal'].'">Goal Form</a></p>';
        echo '<p>';
        foreach ($event['reflections'] as $reflection){
            echo '<a href="'.$reflection.'">Reflection</a> ';
        }
        echo '</p>';
        echo '<p><a href="logs?id='.$event['logid'].'">View/Edit Log</a></p>';
        echo '<p><a id="show_'.$i.'" >[Show/Hide Files]</a></p>'; //onclick="$(\'#files_'.$i.'\').show(2000);"
        echo '</div>';
        ?>
        <div class="container" id="files_<?=$i?>">
            <h3>Files</h3>

                    <p>Goal Form <a href="#">[Delete]</a> <a href="#">[Reupload]</a></p>

                    <p>Reflections <a href="#">[Upload New]</a></p>
                    <?php
                    foreach ($event['reflections'] as $reflection){
                        //echo '<a href="'.$reflection.'">Reflection</a> ';
                        echo '<p>Reflection <a href="#">[Delete]</a></p>';
                    }
                    ?>
        </div>
        <?php
        endforeach; ?>
        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
</html>
