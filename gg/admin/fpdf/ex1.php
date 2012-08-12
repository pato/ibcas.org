<?php
/***************************/ 
/* Radek HULAN             */
/* http://hulan.info/blog/ */
/***************************/ 

require('html2pdf.php');

if(isset($_POST['html']))
{
	$pdf = new createPDF(
		$_POST['html'],   // html text to publish
		$_POST['title'],  // article title
		$_POST['url'],    // article URL
		$_POST['author'], // author name
		time()
	);
    $pdf->run();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>HTML2PDF</title>
<style type='text/css'>
  fieldset{padding:10px}
  body{font-size:small}
</style>
</head><body>
<h1>HTML2PDF</h1>
  <form name="pdfgen" method="post" target="_blank" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div>
    <fieldset><legend>HTML2PDF</legend>
    <p>Title: <input type="text" maxlength="30" name="title"></p>
    <p>URL: <input type="text" maxlength="30" name="url"></p>
    <p>Author: <input type="text" maxlength="30" name="author"></p>
    <p><textarea name="html" cols="50" rows="15"></textarea></p>
    <p><input type="submit" value="Generate PDF"></p>
    </fieldset>
  </div>
  </form>
</body></html>
