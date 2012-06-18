<?
/*********************************
**Set up your variables**
**********************************/
$cookiefile = tempnam("/tmp", "cookies");
/* Create a temporary file to store cookies.
   This should work on most systems and is more
   flexible than specifying path explicitly */
 
$login_url='https://gradespeed.kleinisd.net/pc/Default.aspx';
/* The page that displays the login form. */
 
$login_post_url='https://gradespeed.kleinisd.net/pc/Default.aspx';
/* The "action" value of the login form. This is not always
    equal to $login_url. */
 
//$username = $_POST['myuser'];
//$password = $_POST['mypass'];

$username = "plankenau";
$password = "Cocacola1";

if ($username=="") {
die("No credentials");
}
 
$agent="Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
 
/*********************************
**Load the "login" page and get some cookies**
**********************************/
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$login_url);
/* The URL of the page to retrieve */
 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
/* Disguise self as a browser app. Some servers
might need a different value here. Some servers
might try to check if the page is visited by a
real human being using this value. */
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
/* Don't output the results -
   return them as a string instead */
 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
/* Follow redirects.
This isn't actually necessary here :P */
 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
/* Read cookies from this file */
 
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
/* Save cookies to the same file too */
 
$result = curl_exec ($ch);
/* Perform the query, retrieve the page. */
 
curl_close ($ch);

/*************************************
Actually log in with the proper referer and cookies
**************************************/
 
/* The fields of the login form. These will probably be
  different for every particular page. */
$postfields = array(
        'txtUserName'  => $username,
        'txtPassword' => $password,
        //'rememberMe' => 'false',
        //'j_username' => $username,
        //'j_password' => $password,
    );
 
$reffer = $login_url;
/* If the server checks the referer we need to spoof it */
 
$ch = curl_init(); 
 
curl_setopt($ch, CURLOPT_URL,$login_post_url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
/* http_build_query() will properly escape the fields and
  build a query string. */
 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
/* Follow redirects. This is probably necessary here. */
curl_setopt($ch, CURLOPT_REFERER, $reffer);
/* spoof the HTTP referer */
 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
/* Note that this is the same file as before */
 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
$result = curl_exec ($ch);
/* Now we've got the contents of the page you see after
  logging in saved in $result */
 
curl_close ($ch); 
 
 

$data_url='https://gradespeed.kleinisd.net/pc/ParentStudentGrades.aspx';
$reffer = $login_post_url;
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$data_url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_REFERER, $reffer);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec ($ch);
$mainGrades = getGrades($result);
//echo "Main Grades<pre>".print_r(getGrades($result),true)."</pre>";

$links = getLinks($result);
//echo "<pre>".print_r($links, true);
/*
foreach ($links as $link){
	$data_url='https://gradespeed.kleinisd.net/pc/ParentStudentGrades.aspx?'.$links[0];
	$reffer = $login_post_url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$data_url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_REFERER, $reffer);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec ($ch);
	$classGrades = getClassGrades($result);
	echo "<pre>".print_r($classGrades, true);
}
*/
for ($i=0;$i<3;$i++){
	$data_url='https://gradespeed.kleinisd.net/pc/ParentStudentGrades.aspx?'.$links[$i];
	$reffer = $login_post_url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$data_url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_REFERER, $reffer);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec ($ch);
	$classGrades = getClassGrades($result);
	echo "<pre>".print_r($classGrades, true);
	//echo "<div>".$classGrades[0][0]." ".$classGrades[0][4]."</div>";
}

function getGrades($result){
	$html = explode('Please enable Javascript to view the student data.',$result);
	$htmle = htmlentities($html[1]);

	$var = explode(' ',$htmle);$var = explode(';',$var[8]);$var = $var[0]; //session key for encrypted data
	$code = decodeString(clean($html[1], $var));
	//echo $code;
	//preg_match_all('/title="(.*?)">/',$code, $grades);
	//return $grades[1];
	preg_match_all('/title="Teacher(.*?), . Course (.*?) Period . (Cycle|Semester) . (Grade|Exam) (.*?)">/',$code,$grades);
	return array($grades[1],$grades[2], $grades[3], $grades[4], $grades[5]);
	//teacher, class, Cycle or Semester, Grade or Exam, grade
}
function getClassGrades($result){
	$html = explode('Please enable Javascript to view the student data.',$result);
	$htmle = htmlentities($html[2]);
	preg_match_all('/(.*?) = \'\';/',$htmle,$matches);
	$var = $matches[1][0];
	$code = decodeString(clean($html[2], $var));
	preg_match_all('#<td class="AssignmentName">(.*?)</td><td class="DateAssigned">(.*?)</td><td class="DateDue">(.*?)</td><td class="AssignmentGrade">(.*?)</td>#',$code,$grades);
	//return $grades[4];
	return array($grades[1],$grades[3],$grades[4]);
	//Assigment Name, Date Due, Grade
}
function getLinks($result){
	$html = explode('Please enable Javascript to view the student data.',$result);
	$htmle = htmlentities($html[1]);

	$var = explode(' ',$htmle);$var = explode(';',$var[8]);$var = $var[0]; //session key for encrypted data
	$code = decodeString(clean($html[1], $var));
	preg_match_all('/<a href="\?(.*?)"/',$code,$links);
	return $links[1];
}


//echo '<div style="display: none">';
//echo $html[1];

//echo "Decoded:".decodeString(clean($html[1], $var));
//echo "<br>Raw:<br>".clean($html[1], $var);

//$code = decodeString(clean($html[1], $var));

//preg_match_all('/title="(.*?)">/',$code, $grades); //gets all grades
//echo "<pre>".print_r($grades[1],true);

//preg_match_all('/<a href="\?(.*?)"/',$code,$links);
//echo "<pre>".print_r($links[1],true);



curl_close ($ch); 
unlink($cookiefile);

function clean($input, $var){
	$temp = str_replace("-->","",str_replace("<!--","",$input));
	$temp = preg_replace("(\<(/?[^\>]+)\>)","",$temp);
	$temp = str_replace("window.setTimeout('window.scroll(0,0);', 100);","",$temp);
	$temp = str_replace("document.write(decodeString(".$var."));","",$temp);
	$temp = str_replace($var,"",$temp);
	$temp = str_replace("var ;","",$temp);
	$temp = str_replace("=  +","",$temp);
	$temp = str_replace("= '';","",$temp);
	$temp = str_replace("';","",$temp);
	$temp = str_replace("'","",$temp);
	$temp = trim($temp);
	$temp = preg_replace("[\s]","",$temp);
return $temp;
}

function decodeString($input){
	$keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
	$output = "";
	//$input = preg_replace("/[^A-Za-z0-9\+\/\=]/g", "",$input);
	//echo $input;
	$i = 0;
	do{
	$enc1 = strpos($keyStr,$input{$i++});
	$enc2 = strpos($keyStr,$input{$i++});
	$enc3 = strpos($keyStr,$input{$i++});
	$enc4 = strpos($keyStr,$input{$i++});

	//echo $enc1."|".$enc2."|".$enc3."|".$enc4."<br>";

	$chr1 = ($enc1 << 2) | ($enc2 >> 4);
	$chr2 = (($enc2 & 15) << 4) | ($enc3 >> 2);
	$chr3 = (($enc3 & 3) << 6) | $enc4;

	//echo chr($chr1).chr($chr2).chr($chr3);

		  $output = $output.chr($chr1);

		  if ($enc3 != 64) {
			 $output = $output.chr($chr2);
		  }
		  if ($enc4 != 64) {
			 $output = $output.chr($chr3);
		  }
	}while ($i<strlen($input));
	return $output;
}
?>