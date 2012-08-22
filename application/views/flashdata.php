<?php
if ($this->session->flashdata('is')=="true"){
    echo '<div id="msg" class="container" style="display:block;">';
    echo '<h3>'.$this->session->flashdata('msg').'</h3>';
    echo '</div>';
    ?>
    <script type="text/javascript">
        window.onload = function (){
            //$("#msg").slideDown('slow');
            $("#msg").delay(1500).slideUp('slow');
        }
    </script>
    <?
}
?>