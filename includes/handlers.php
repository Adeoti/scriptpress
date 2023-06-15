<?php
class ScriptPressHandler{
    function injectSPHeader(){
        $SPheaderScript = get_option('wp-scriptpress-header','none');
        echo $SPheaderScript;
    }
    public function injectSPFooter(){
        $SPfooterScript = get_option('wp-scriptpress-footer','none');
        echo $SPfooterScript;
    }
    public function injectCss(){
        $SPCssScript = get_option('wp-scriptpress-css','none');
        echo "<style>".$SPCssScript."</style>";
    }
    public function injectJs(){
        $SPJsScript = get_option('wp-scriptpress-js','');
        echo "<script>".$SPJsScript."</script>";
        
    }
    public function adminEnqueueScripts(){

       // Enqueue CodeMirror styles from the CDN
    wp_enqueue_style('codemirrorStyle', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css');

    // Enqueue CodeMirror script from the CDN
    wp_enqueue_script('codemirrorJs', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/codemirror.min.js', array('jquery'), '5.62.2', true);

    wp_enqueue_script('codemirror-mode-html', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/htmlmixed/htmlmixed.min.js', array('codemirror'), '5.62.0', true);
    wp_enqueue_script('scriptPressMainJs', plugin_dir_url(__FILE__)."../assets/js/index.js", array(), 1.0, true);
    
     // Enqueue CodeMirror themes
    wp_enqueue_style('codemirror-theme-eclipse', 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/eclipse.min.css', array(), '5.62.0');
    wp_enqueue_style('scriptPressMainCss', plugin_dir_url(__FILE__)."../assets/css/index.css");
    
   
    }
    public function scriptPressFotter($footer_text){
        $custom_text = '<center>
        <b>&copy; 2023. ScriptPress. Made with <b class="sc-primary-color"><span class="dashicons dashicons-heart"></span></b> by <a class="sc-primary-color" href="https://github.com/Adeoti">Adeoti</a> || <a href="#" class="sc-primary-color">Hire me</a></b>
    </center>';
        $footer_text = $custom_text;
        return $footer_text;
    }

}
?>