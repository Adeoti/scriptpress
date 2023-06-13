<?php
require_once plugin_dir_path(__FILE__)."../handlers.php";
class SPMenu extends ScriptPressHandler{

    public function createSPMenu(){
        add_menu_page("WP ScriptPress","ScriptPress","manage_options","wp-script-press",[$this, 'adminMenuPage'],"dashicons-car",50);
    }

    public function adminMenuPage(){
        require_once plugin_dir_path(__FILE__)."dashboard.php";
    }

    public function createSPLinks($link){
        $settings_link = "<a href='admin.php?page=wp-script-press' style='color:#482ff7; font-weight:600;'>Settings</a>";
        $donate_link = "<a href='#' style='color:#482ff7; font-weight:600;' title='Please support me to create more of this'>Donate</a>";
        array_push($link,$settings_link,$donate_link);
        return $link;
    }

}


?>