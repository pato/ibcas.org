<html>
<head>
    <title>IB CAS Organizer</title>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript">
        $(document).ready(function() {
            $("#showuploadgoalform").fancybox({
                    'titlePosition'		: 'outside',
                    'transitionIn'		: 'none',
                    'transitionOut'		: 'none'
            });
        });
	</script>
</head>
<body>
<center>
<div class="pageContent">
    <div id="main">
        <div class="container">
            <h3>Computer Science Contest</h3>
            <table>
                <tr>
                    <td>Total Hours:</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>Goal Form:</td>
                    <td>goalform.doc</td>
                    <td><a href="?action=delete&what=goalform">[Delete]</a></td>
                    <td><a id="showuploadgoalform" href="#uploadgoalform">[Upload]</a></td>
                </tr>
                <tr>
                    <td>Reflections:</td>
                    <td>reflection1.doc</td><td>reflection2.doc</td><td>reflection3.doc</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div style="display: none;">
    <div id="uploadgoalform" style="width:400px;height:100px;overflow:auto;">
            Upload Goal Form
    </div>
</div>
</center>
</body>
</html>

