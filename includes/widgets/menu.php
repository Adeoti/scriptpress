<?php
require_once plugin_dir_path(__FILE__)."../handlers.php";
class SPMenu extends ScriptPressHandler{

    /* Setting the Admin Menu Page */
    public function createSPMenu(){
        add_menu_page("WP ScriptPress","ScriptPress","manage_options","wp-script-press",[$this, 'adminMenuPage'], plugin_dir_url(__FILE__)."../../assets/images/scriptpress_logo.svg" ,50);
    }

    /* Admin Menu Page Template*/
    public function adminMenuPage(){
        require_once plugin_dir_path(__FILE__)."dashboard.php";
    }

    /* Custom Settings Link */
    public function createSPLinks($link){
        $settings_link = "<a href='admin.php?page=wp-script-press' style='color:#482ff7; font-weight:600;'>Settings</a>";
        array_push($link,$settings_link);
        return $link;
    }

}


?>