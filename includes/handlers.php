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
        wp_enqueue_script('scriptPressMainjs', plugin_dir_url(__FILE__)."/assets/js/index.js", array(), 1.0, true);
    }
    public function scriptPressFotter($footer_text){
        $custom_text = '<center>
        <b>&copy; 2023. ScriptPress. Made with <b style="color:magenta;">&hearts;</b> by <a style="color:#482ff7;" href="https://github.com/Adeoti">Adeoti</a> || <a href="#" style="color:#482ff7;">Hire me</a></b>
    </center>';
        $footer_text = $custom_text;
        return $footer_text;
    }

}
?>