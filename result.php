<?php
session_start();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@3.4.21/dist/vue.global.prod.js"></script>
<!-- Add more libraries as needed by including their CDN links in your code -->
<?php
if (isset($_GET['fullscreen'])) {
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

