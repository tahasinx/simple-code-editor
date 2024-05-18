<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<?php
session_start();

if(isset($_GET['fullscreen'])){
    echo '<a href="index.php" style="font-size:15px;float:right;">'
    . '      <button style="cursor:pointer">'
            . '  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Back To Editor'
          . '</button>'
       . '</a>';
}

if (!isset($_SESSION['code'])) {
    
} else {
    $code = $_SESSION['code'];
    echo $code;
}

