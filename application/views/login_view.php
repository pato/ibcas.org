<?php
/*
 * ##############CHANGELOG###########################################################################
 * April 23 - Created view
 *
 * ###################################################################################################
 * +
 */

?>
<? $this->load->view("doctype"); ?>
<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.php" type="text/css"/>
    <link href='../favicon.ico' rel='shortcut icon'/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <meta name="description" content="This is an IB CAS requirements organizer, used to handle all the paperwork and logs that are required for completion of the CAS section of the IB Diploma Programme." />
    <meta name="keywords" content="ib, cas, organizer, international, baccalaureate, manager, agenda, free, diploma, programme, program, logs, paperwork, required, creativity, action, service" />
    <meta name="author" content="Patricio Lankenau" />
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
            <?php
            if (isset($msg)){
                echo "<err>".$msg."</err>";
            }
            echo form_open('anizer/login');
            ?>

            <table align="center">
                <tr>
                    <td align="right">Username: </td>
                    <td><input type="text" class="input2" name="username" value="<?php echo set_value('username'); ?>" size="50" /></td>
                </tr>
                <tr><th colspan="2"><?=form_error('username')?></th></tr>
                <tr>
                    <td align="right">Password: </td>
                    <td><input type="password" class="input2" name="password" value="<?php //echo set_value('password'); ?>" size="50" /></td>
                </tr>
                <tr><th colspan="2"><?=form_error('password')?></th></tr>
            </table>
            <input type="submit" value="Login" class="login"/>
            </form>
            </div>
        <?php $this->load->view("footer"); ?>
    </div>
</div>
</center>
</body>
</html>
