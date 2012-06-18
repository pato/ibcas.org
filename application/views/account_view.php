<?php
/*
 * ##############CHANGELOG###########################################################################
 * May 10 - Created page, allows changing of backgrounds
 *
 * ###################################################################################################
 * +
 */

?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
     <script type="text/javascript">
       $(document).ready(function() {
           $("#backgroundselect").show();
           $("#show").click(function () {
            $("#backgroundselect").toggle("slow");
           });
       });
     </script>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">
	<div class="container">
            <h1>Account Management</h1>
        </div>
        <?php $data['alive']=true;$this->load->view("menu",$data); ?>
        <?=form_open('home/saveAccount')."\n"?>
        <div class="container" >
            <h3><a href="#" id="show">Background Select</a></h3>
            <table style="margin-left: auto;margin-right: auto;" id="backgroundselect">
                <tr>
                    <?php
                    for ($i=1;$i<=30;$i++){
                        if (($i-1)%6==0){
                            echo '</tr><tr>';
                        }
                        echo '<td>';
                        echo '<a href="../home/bg?id='.$i.'">';
                        echo '<div style="background:url(\'../img/bg'.$i.'.gif\') repeat;margin:3px;width:100px; height:100px; border:2px solid;" ><span style="font-size:80px; padding-left:30px;">
                            </span></div>';
                        echo '</a></td>';
                    }
                    ?>
                </tr>
            </table>
        </div>
        </form>
        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
</html>
