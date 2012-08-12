<?php
session_start();

if(isset($_SESSION['alive']) && $_SESSION['alive']==true){
	//logged in
}else{
	header( 'Location: ./login.php' );
}
?>