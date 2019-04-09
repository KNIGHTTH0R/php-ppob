<?php

$data = file_get_contents('php://input');
$my_file = 'file.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
fwrite($handle, $data);
fclose($handle);

?>
