<?php
/*
 * ##############CHANGELOG###########################################################################
 * May 6 - Created page, added support for custom backgrounds
 * August 14 - Added styles for different color progress bars
 * ###################################################################################################
 * +
 */
header("Content-type: text/css");
$background = isset($_COOKIE['bg'])?$_COOKIE['bg']:"3";
?>

body,h1,h2,h3,p,quote,small,form,input,ul,li,ol,label{
	/* The reset rules */
	margin:0px;
	padding:0px;
}

body{ /*background:#e4ebe9 url(../img/pattern.png)*/
	color:#555555;
	font-size:13px;
	background: #eeeeee;
	background: url(../img/bg<?=$background?>.gif);
	background-position:top left;
        background-repeat: repeat;
        background-attachment: fixed;
	font-family:Arial, Helvetica, sans-serif;
	width: 100%;
}
a:link {
    text-decoration:none;
    color: #000000;
}
a:visited {
    text-decoration:none;
    color: #000000;
}
a:active {
    text-decoration:none;
    color: #FF0000;
}
a:hover {
    text-decoration:none;
    color: #335FD6;
}
a img{
    border:none;
}
table.progress{
    width:100%;
}
table.progress td{
    width:300px;
    text-align: center;
    border-style:outset;
    border-color:#efg;
    border-width:5px;
}
err{
    font-family: Arial,Helvetica,sans-serif;
    color: #ff0000;
    font-size: 13px;
    font-style: italic;
    font-weight: lighter;
}
h1{
	font-size:28px;
	font-weight:bold;
	font-family:"Trebuchet MS",Arial, Helvetica, sans-serif;
	letter-spacing:1px;
}

h2{
	font-family:"Arial Narrow",Arial,Helvetica,sans-serif;
	font-size:22px;
	font-weight:normal;
	letter-spacing:1px;
	padding-left:2px;
	text-transform:uppercase;
	white-space:nowrap;
	margin-top:4px;
	color:#888888;
}
h3{
    font-size:20px;
}

#main p{
	padding-bottom:8px;
}

.clear{
	clear:both;
}

#main{
	width:800px;
	/* Centering it in the middle of the page */
	margin:60px auto;
}

.container{
	margin-top:20px;
	text-align:center;
	background:#FFFFFF;
	border:1px solid #E0E0E0;
	padding:15px;

	/* Rounded corners */
	-moz-border-radius:20px;
	-khtml-border-radius: 20px;
	-webkit-border-radius: 20px;
	border-radius:20px;
}
.legal{
	margin-top:20px;
	text-align:left;
	background:#FFFFFF;
	border:1px solid #E0E0E0;
	padding:40px;

	/* Rounded corners */
	-moz-border-radius:20px;
	-khtml-border-radius: 20px;
	-webkit-border-radius: 20px;
	border-radius:20px;
}
code{
    font-family: Consolas, Monaco, Courier New, Courier, monospace;
    font-size: 12px;
    background-color: #f9f9f9;
    border: 1px solid #D0D0D0;
    color: #002166;
    display: block;
    margin: 14px 0 14px 0;
    padding: 12px 10px 12px 10px;
}
.meter {
	height: 20px;  /* Can be anything */
	position: relative;
	background: #ccccff;
	-moz-border-radius: 25px;
	-webkit-border-radius: 25px;
	border-radius: 25px;
	padding: 10px;
	-webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
	-moz-box-shadow   : inset 0 -1px 1px rgba(255,255,255,0.3);
	box-shadow        : inset 0 -1px 1px rgba(255,255,255,0.3);
}
.meter > span {
	display: block;
	height: 100%;
	   -webkit-border-top-right-radius: 8px;
	-webkit-border-bottom-right-radius: 8px;
	       -moz-border-radius-topright: 8px;
	    -moz-border-radius-bottomright: 8px;
	           border-top-right-radius: 8px;
	        border-bottom-right-radius: 8px;
	    -webkit-border-top-left-radius: 20px;
	 -webkit-border-bottom-left-radius: 20px;
	        -moz-border-radius-topleft: 20px;
	     -moz-border-radius-bottomleft: 20px;
	            border-top-left-radius: 20px;
	         border-bottom-left-radius: 20px;
	background-color: rgb(43,194,83);
	background-image: -webkit-gradient(
	  linear,
	  left bottom,
	  left top,
	  color-stop(0, rgb(43,194,83)),
	  color-stop(1, rgb(84,240,84))
	 );
	background-image: -webkit-linear-gradient(
	  center bottom,
	  rgb(43,194,83) 37%,
	  rgb(84,240,84) 69%
	 );
	background-image: -moz-linear-gradient(
	  center bottom,
	  rgb(43,194,83) 37%,
	  rgb(84,240,84) 69%
	 );
	background-image: -ms-linear-gradient(
	  center bottom,
	  rgb(43,194,83) 37%,
	  rgb(84,240,84) 69%
	 );
	background-image: -o-linear-gradient(
	  center bottom,
	  rgb(43,194,83) 37%,
	  rgb(84,240,84) 69%
	 );
	-webkit-box-shadow:
	  inset 0 2px 9px  rgba(255,255,255,0.3),
	  inset 0 -2px 6px rgba(0,0,0,0.4);
	-moz-box-shadow:
	  inset 0 2px 9px  rgba(255,255,255,0.3),
	  inset 0 -2px 6px rgba(0,0,0,0.4);
	position: relative;
	overflow: hidden;
}
.orange > span {
	background-color: #f1a165;
	background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f1a165),color-stop(1, #f36d0a));
	background-image: -webkit-linear-gradient(top, #f1a165, #f36d0a); 
        background-image: -moz-linear-gradient(top, #f1a165, #f36d0a);
        background-image: -ms-linear-gradient(top, #f1a165, #f36d0a);
        background-image: -o-linear-gradient(top, #f1a165, #f36d0a);
}

.red > span {
	background-color: #f0a3a3;
	background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f0a3a3),color-stop(1, #f42323));
	background-image: -webkit-linear-gradient(top, #f0a3a3, #f42323);
        background-image: -moz-linear-gradient(top, #f0a3a3, #f42323);
        background-image: -ms-linear-gradient(top, #f0a3a3, #f42323);
        background-image: -o-linear-gradient(top, #f0a3a3, #f42323);
}
input.login {
	width: 74px;
	clear: left;
	height: 24px;
	text-align: center;
	cursor: pointer;
	border: none;
	font-weight: bold;
	margin: 10px 0;
	color: white;
	background: url(../img/bt_login.png) no-repeat 0 0;
}

input.register {
	clear: left;
	height: 24px;
	text-align: center;
	cursor: pointer;
	border: none;
	font-weight: bold;
	margin: 10px 0;
	width: 94px;
	color: white;
	background: transparent url(../img/bt_register.png) no-repeat 0 0;
}


.input {
	width: 221px;
	background: transparent url('../img/textbg.jpg') no-repeat;
	color : #747862;
	height:20px;
	border:0;
	padding:4px 8px;
	margin-bottom:0px;
}

.input2{
	background-image:url(../img/textbg2.jpg);
	background-repeat:repeat-x;
	border:1px solid #d1c7ac;
	width: 230px;
	color:#333333;
	padding:3px;
	margin-right:4px;
	margin-bottom:8px;
	font-family:tahoma, arial, sans-serif;
}
.bg{
    height:71px;
    width:71px;
    display: block;
}
.img {
    border-color: #7d6b72;
    border-style: solid;
    border-width: 5px;
}
<? /*
.events tr:nth-of-type(odd) {
  background-color:#ccc;
}
.section tr:nth-of-type(odd){
    background-color:#E1E4EA;
}
.section tr:nth-of-type(even){
    background-color:#BFBFBF;
}
*/ ?>
tr.even td{
    background-color:#BFBFBF;
}
tr.odd td{
    background-color:#E1E4EA;
}
tr.events td{
    background-color:#ccc;
}
div.features{
    padding-left: 50px;
}
div.wrapper{
    float: center; /* important */
    position:relative; /* important(so we can absolutely position the description div */
}
div.description{
    position:absolute; /* absolute position (so we can position it where we want)*/
    bottom: 0px; /* position will be on bottom */
    left:0px;
    width:100%;
    /* styling bellow */
    background-color:black;
    font-family: 'tahoma';
    font-size:15px;
    color:white;
    opacity:0.8; /* transparency */
    filter:alpha(opacity=80); /* IE transparency */
}
p.description_content{
    padding:5px;
    margin:0px;
}