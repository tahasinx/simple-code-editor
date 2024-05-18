<?php
session_start();
$code = $_SESSION['code'];

header('Content-type: application/txt');
header('Content-Disposition: attachment; filename="code.txt"');
echo $code;

?>