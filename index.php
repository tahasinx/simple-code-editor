<?php
session_start();

if (isset($_POST['submit'])) {
    $_SESSION['code'] = $_POST['code'];
}
if (isset($_SESSION['code'])) {
    $code = $_SESSION['code'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="" href="https://img.icons8.com/cotton/2x/source-code--v2.png" />
    <title>Simple Snippet</title>
    <link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/theme/dracula.min.css">
    <style>
        .CodeMirror {
            width: 100%;
            height: 40vh;
            border: 1px solid #ccc;
            font-family: "Courier New", Courier, monospace;
        }

        button {
            color: blueviolet;
            cursor: pointer
        }
    </style>
</head>

<body>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button type="submit" name="submit">RUN <i class="fa fa-play" aria-hidden="true"></i></button>
        <?php if (isset($_SESSION['code'])) { ?>

            <a href="result.php?fullscreen=1" title="Full Screen"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
            <a href="save.php" title="Save"><i class="fa fa-download" aria-hidden="true"></i></a>

        <?php } ?>

        <textarea name="code" spellcheck="false" id="code-editor" placeholder="Type or paste your html,css,javascript code here....."><?php if (isset($_SESSION['code'])) {
                                                                                                                                            echo $code;
                                                                                                                                        } ?></textarea>
    </form>

    <iframe src="result.php" style="width: 100%;height: 50vh"></iframe>

    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
            lineNumbers: true,
            mode: "javascript",
            theme: "dracula"
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>