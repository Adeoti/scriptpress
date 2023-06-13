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


}
?>