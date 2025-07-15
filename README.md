# Simple Code Editor

A web-based code editor for writing, running, and saving HTML, CSS, and JavaScript code snippets. Built with PHP and CodeMirror.

## Features

- **Live code editing** with syntax highlighting (CodeMirror)
- **Manual code formatting:** Format your code with a single click using the 'Format Code' button (supports HTML, CSS, and JavaScript)
- **Auto-format on paste:** Code is automatically formatted when pasted into the editor
- **Run** HTML/CSS/JS code and preview the result instantly
- **Download** your code as a text file
- **Theme selection:** Light and Dark (Dracula) themes for the editor
- **Auto-save:** Your code is automatically saved in your browser as you type
- **XSS Warning:** Clear warning about running untrusted code
- **Responsive UI** with improved layout and labels

## Usage

1. **Open the app in your browser.**
2. **Write or paste your HTML, CSS, or JavaScript code** in the editor area.
3. **Format your code manually** at any time by clicking the **Format Code** button above the editor.
4. **Pasted code is auto-formatted** for readability.
5. **Choose your preferred editor theme** (Light or Dark) from the dropdown above the editor.
6. **Click the RUN button** to preview your code in the result pane below.
7. **Download your code** using the download icon (appears after running code).
8. **Open the result in fullscreen** using the fullscreen icon (appears after running code).
9. **Your code is auto-saved** in your browser and restored if you reload the page.

## Security Notes

- **Warning:** Running code in the result window will execute any HTML, CSS, or JavaScript you enter. Malicious code may harm your browser or steal data. Only run code you trust.
- **No PHP execution:** The editor does not execute PHP code. Any PHP code entered will be shown as plain text in the preview.
- **No authentication:** Anyone with access to the app can use it. Do not use in a public or production environment without adding authentication and further security.

## Limitations

- Only one code snippet is stored per session/browser.
- No support for multiple files or code sharing.
- Does not execute or preview PHP or other server-side code.

## Setup

1. Place the files in a PHP-enabled web server directory (e.g., XAMPP's `htdocs`).
2. Open `index.php` in your browser.
3. Requires internet access for CodeMirror, js-beautify, and icon/font CDN assets.

## File Overview

- `index.php` — Main editor UI and logic
- `result.php` — Displays the result of the code in an iframe
- `save.php` — Allows downloading the code as a text file
- `README.md` — This documentation

---

**Enjoy coding!**