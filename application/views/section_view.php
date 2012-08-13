<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 15 - Created page
 * April 16 - Added file section to every event
 * April 17 - Create jquery to hide files content
 * April 24 - Removed the files from section view, linked to event viewer, added support for goal forms
 * May 6 - Added upload/delete of reflections, added extra space between events
 * May 18 - Added link to logid
 *
 * ##################################################################################################
 */
function URL(){
    return "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
?>

<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
     <script type="text/javascript">
       $(document).ready(function() {
           <?php for ($y=1;$y<=count($events);$y++): ?>
$("#showuploadgoalform<?=$y?>").fancybox({
                    'titlePosition'		: 'outside',
                    'transitionIn'		: 'elastic',
                    'transitionOut'		: 'elastic',
            });
            $("#showdeletegoalform<?=$y?>").fancybox({
                    'titlePosition'		: 'outside',
                    'transitionIn'		: 'elastic',
                    'transitionOut'		: 'elastic'
            });
            $("#showuploadreflection<?=$y?>").fancybox({
                        'titlePosition'		: 'outside',
                        'transitionIn'		: 'elastic',
                        'transitionOut'		: 'elastic'
            });
                <?php 
                $count = count($events[$y-1]['reflections']);
                for ($z=1;$z<=$count;$z++): ?>
                
                $("#showdeletereflection<?=$y."a".$z?>").fancybox({
                        'titlePosition'		: 'outside',
                        'transitionIn'		: 'elastic',
                        'transitionOut'		: 'elastic'
                });
                <? endfor;?>
           <? endfor;?>
           
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
        ?>
           <div class="container">
                <h3><?=$event['title']?></h3>
                    <p>Total Hours: <?=$event['hours']?></p>
                    <br><p>Goal Form:</p>
                    <p><a href="/files/<?=$event['goal']?>"><?=$event['goal']?></a> <a id="showdeletegoalform<?=$i?>" href="#deletegoalform<?=$i?>">[Delete]</a> <a id="showuploadgoalform<?=$i?>" href="#uploadgoalform<?=$i?>">[Upload]</a></p>
                    <br><p>Reflections: <a id="showuploadreflection<?=$i?>" href="#uploadreflection<?=$i?>">[Upload New]</a></p>
                    <?php //echo '<p><a href="/files/'.$reflection.'">'.$reflection.'</a>';//</p>';
                    $y = 0;
                    foreach ($event['reflections'] as $reflection): 
                        $y++;
                    ?>
                        <p><a href="/files/<?=$reflection?>"><?=$reflection?></a> <a id="showdeletereflection<?=$i.'a'.$y?>" href="#deletereflection<?=$i.'a'.$y?>">[Delete]</a></p>
                    <?
                    endforeach;
                    ?>
                    <br>
                    <p>Log:</p>
                    <a href="/home/log?id=<?=$event['logid']?>">[Edit]</a>
                    <a href="/home/makelog?id=<?=$event['logid']?>">[Download]</a>
            </div>
        <?php endforeach; ?>
        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
<div style="display: none;">
    <?php
    $y = 0;
    foreach ($events as $event):
    $y++;
    ?>
    <div id="uploadgoalform<?=$y?>" style="width:400px;height:100px;overflow:auto;">
        <p>Please select file to upload</p>
        <?=form_open_multipart('home/upload_goal')?>
        <input type="file" name="userfile" size="40"/>
        <input type="hidden" name="event_type" value="<?=$sname?>">
        <input type="hidden" name="event_title" value="<?=$event['title']?>">
        <input type="hidden" name="url" value="<?=URL()?>">
        <input type="submit" class="register" value="Upload"/>
        </form>
    </div>
    <div id="deletegoalform<?=$y?>" style="width:400px;height:100px;overflow:auto;">
        <?=form_open('home/delete_goal')."\n"?>
        <p>Are you sure you want to delete "<?=$event['goal']?>" ?</p>
        <input type="hidden" name="event_file" value="<?=$event['goal']?>">
        <input type="hidden" name="event_type" value="<?=$sname?>">
        <input type="hidden" name="event_title" value="<?=$event['title']?>">
        <input type="hidden" name="url" value="<?=URL()?>">
        <input type="submit" class="login" value="Delete"/>
        </form>
    </div>
    <div id="uploadreflection<?=$y?>" style="width:400px;height:100px;overflow:auto;">
        <p>Please select file to upload</p>
        <?=form_open_multipart('home/upload_reflection')?>
        <input type="file" name="userfile" size="40"/>
        <input type="hidden" name="event_type" value="<?=$sname?>">
        <input type="hidden" name="event_title" value="<?=$event['title']?>">
        <input type="hidden" name="url" value="<?=URL()?>">
        <input type="submit" class="register" value="Upload"/>
        </form>
    </div>
    <?php
    $z = 0;
    foreach ($event['reflections'] as $reflection):
    $z++; ?>
    <div id="deletereflection<?=$y.'a'.$z?>" style="width:400px;height:100px;overflow:auto;">
            <?=form_open('home/delete_reflection')."\n"?>
            <p>Are you sure you want to delete "<?=$reflection?>" ?</p>
            <input type="hidden" name="event_file" value="<?=$reflection?>">
            <input type="hidden" name="event_type" value="<?=$sname?>">
            <input type="hidden" name="event_title" value="<?=$event['title']?>">
            <input type="hidden" name="number" value="<?=$z?>">
            <input type="hidden" name="url" value="<?=URL()?>">
            <input type="submit" class="login" value="Delete"/>
            </form>
        </div>
    <? endforeach; ?>
    <? endforeach; ?>
</div>
</html>
