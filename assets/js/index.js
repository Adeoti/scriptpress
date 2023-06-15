
jQuery(document).ready(function($) {
    var textarea = $('#wp-scriptpress-editor'); 

    var editor = CodeMirror.fromTextArea(textarea[0], {
        lineNumbers: true, // Enable line numbers
        mode: 'htmlmixed', // Set the mode (e.g., javascript, css, html)
        theme: 'eclipse',
        styleActiveLine: true,
        matchBrackets: true
    });
});
