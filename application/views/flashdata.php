<?php
if ($this->session->flashdata('is')=="true"){
    echo '<div class="container">';
    echo '<div class="row-fluid">';
    echo '<div class="span10 offset1">';
    echo '<div id="msg" class="alert alert-info">';
    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    echo '<p><i class="icon-info-sign"></i> '.$this->session->flashdata('msg').'</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    ?>
    <script type="text/javascript">
        window.onload = function (){
            //$("#msg").slideDown('slow');
            $("#msg").delay(3500).slideUp('slow');
        }
    </script>
    <?
}
?>