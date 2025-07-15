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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify-html.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.7/beautify-css.min.js"></script>
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

    <h1 style="font-family: 'Oxanium', cursive; color: #4B0082; text-align: center; margin-top: 20px;">Simple Code Editor</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button type="submit" name="submit" style="margin-bottom: 10px;">RUN <i class="fa fa-play" aria-hidden="true"></i></button>
        <?php if (isset($_SESSION['code'])) { ?>

            <a href="result.php?fullscreen=1" title="Full Screen" style="margin-left: 10px;"><i class="fa fa-window-maximize" aria-hidden="true"></i></a>
            <a href="save.php" title="Save" style="margin-left: 10px;"><i class="fa fa-download" aria-hidden="true"></i></a>

        <?php } ?>

        <div style="margin-bottom: 10px;">
            <label for="theme-select" style="font-weight: bold; margin-right: 8px;">Editor Theme:</label>
            <select id="theme-select" style="padding: 2px 8px;">
                <option value="default">Light</option>
                <option value="dracula">Dark (Dracula)</option>
            </select>
            <button type="button" id="format-btn" style="margin-left: 20px; padding: 2px 12px; font-weight: bold; color: #fff; background: #4B0082; border: none; border-radius: 3px; cursor: pointer;">Format Code</button>
        </div>
        <div style="margin-top: 15px; margin-bottom: 5px; font-weight: bold;">Editor</div>
        <div style="background: #fff3cd; color: #856404; border: 1px solid #ffeeba; padding: 10px; margin-bottom: 15px; border-radius: 4px; font-size: 14px;">
            <strong>Warning:</strong> Running code in the result window will execute any HTML, CSS, or JavaScript you enter. Malicious code may harm your browser or steal data. Only run code you trust.
        </div>
        <textarea name="code" spellcheck="false" id="code-editor" placeholder="Type or paste your html,css,javascript code here....."><?php if (isset($_SESSION['code'])) {
                                                                                                                                            echo htmlspecialchars($code);
                                                                                                                                        } ?></textarea>
    </form>

    <div style="margin-top: 20px; margin-bottom: 5px; font-weight: bold;">Result</div>
    <iframe src="result.php" style="width: 100%;height: 50vh; border: 1px solid #ccc; border-radius: 4px;"></iframe>

    <script>
        // Detect browser color scheme
        var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        var initialTheme = prefersDark ? 'dracula' : 'default';
        // Set dropdown to match
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('theme-select').value = initialTheme;
        });
        var editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
            lineNumbers: true,
            mode: "javascript",
            theme: initialTheme
        });
        // Theme switcher
        document.getElementById('theme-select').addEventListener('change', function() {
            editor.setOption('theme', this.value);
        });
        // Format Code button
        document.getElementById('format-btn').addEventListener('click', function() {
            var code = editor.getValue();
            var formatted = code;
            // Simple detection: if code contains <html> or <body>, treat as HTML; if { and ;, treat as JS; else CSS
            if (/\<\/?(html|body|div|span|head|title|script|style)/i.test(code)) {
                formatted = html_beautify(code);
            } else if (/\{[^}]*;/.test(code)) {
                formatted = js_beautify(code);
            } else {
                formatted = css_beautify(code);
            }
            editor.setValue(formatted);
        });
        // Auto-save to localStorage
        var LS_KEY = 'simple_code_editor_autosave';
        // Restore code from localStorage if available
        if (localStorage.getItem(LS_KEY)) {
            editor.setValue(localStorage.getItem(LS_KEY));
        }
        // Save code on change
        editor.on('change', function() {
            localStorage.setItem(LS_KEY, editor.getValue());
        });
        // Auto-format on paste
        editor.on('change', function(instance, changeObj) {
            if (changeObj.origin === 'paste') {
                var code = editor.getValue();
                var formatted = code;
                if (/\<\/?(html|body|div|span|head|title|script|style)/i.test(code)) {
                    formatted = html_beautify(code);
                } else if (/\{[^}]*;/.test(code)) {
                    formatted = js_beautify(code);
                } else {
                    formatted = css_beautify(code);
                }
                editor.setValue(formatted);
            }
        });
        // Clear localStorage on form submit
        document.querySelector('form').addEventListener('submit', function() {
            localStorage.removeItem(LS_KEY);
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>