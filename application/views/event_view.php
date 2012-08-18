<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 24 - Created Page
 *
 * ###################################################################################################
 * +
 */
?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript">
        $(document).ready(function() {
            $("#showuploadgoalform").fancybox({
                    'titlePosition'		: 'outside',
                    'transitionIn'		: 'elastic',
                    'transitionOut'		: 'elastic'
            });
            $("#showdeletegoalform").fancybox({
                    'titlePosition'		: 'outside',
                    'transitionIn'		: 'elastic',
                    'transitionOut'		: 'elastic'
            });
        });
	</script>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">
        <div class="container">
            <h3><?=$event['title']?></h3>
                
                    <p>Total Hours: <?=$event['hours']?></p>
                    <p>Goal Form: <?=$event['goal']?> <a id="showdeletegoalform" href="#deletegoalform">[Delete]</a> <a id="showuploadgoalform" href="#uploadgoalform">[Upload]</a></p>
                    <p>Reflections:</p>
                    <?php
                    foreach ($event['reflections'] as $reflection){
                        echo '<p>'.$reflection.'</p>';
                    }
                    ?>
        </div>
    </div>
</div>
<div style="display: none;">
    <div id="uploadgoalform" style="width:400px;height:100px;overflow:auto;">
        <?=form_open_multipart('anizer/upload_goal')?>
        <input type="file" name="userfile" size="40"/>
        <input type="hidden" name="event_type" value="<?=$event['type']?>">
        <input type="hidden" name="event_title" value="<?=$event['title']?>">
        <input type="submit" value="Upload"/>
        </form>
    </div>
    <div id="deletegoalform" style="width:400px;height:100px;overflow:auto;">
        <?=form_open('anizer/delete_goal')."\n"?>
        Are you sure you want to delete the file?
        <input type="hidden" name="event_file" value="<?=$event['goal']?>">
        <input type="hidden" name="event_type" value="<?=$event['type']?>">
        <input type="hidden" name="event_title" value="<?=$event['title']?>">
        <input type="submit" value="Delete"/>
        </form>
    </div>
</div>
</center>
</body>
</html>

