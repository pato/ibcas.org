<?php
$zip = new ZipArchive;
$res = $zip->open('test.zip', ZipArchive::CREATE);
$zip->addFromString('test.txt', 'file content goes here');
$zip->addEmptyDir('files');
$zip->addFile('file1.php', 'files/entryname.txt');
$zip->close();

$file = "test.zip";

header("Content-Type: application/zip"); 
header("Content-Length: " . filesize($file)); 
header("Content-Disposition: attachment; filename=\"a_zip_file.zip\""); 
readfile($file); 

unlink($file); 
?>