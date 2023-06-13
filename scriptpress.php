<?php
/**
 * Plugin Name: ScriptPress
 * Plugin URI: https://github.com/adeoti/scriptpress
 * Description: Simple, yet powerful plugin to inject custom header and footer scripts, custom CSS and JS to your website, with ease.
 * Requires at least: 5.0
 * Requires PHP: 5.2
 * Version: 1.0.0
 * License: GPLv2 or later
 * Author: Adeoti Nurudeen
 * Author URI: https://adeoti.netlify.app
 * Text Domain: ScriPtpress
 * 
 * @package ScriptPress
 */

if(! defined('ABSPATH')){
    die("You can't load this via the backdoor");
}
require_once plugin_dir_path(__FILE__)."/includes/widgets/menu.php";
require_once plugin_dir_path(__FILE__)."/includes/handlers.php";

class ScriptPress extends SPMenu{
    public $pluginpath;
    public function __construct()
    {
        $this -> pluginpath = plugin_basename(__FILE__);
        register_activation_hook(__FILE__, [$this, 'registerActivation']);
        register_deactivation_hook(__FILE__, array($this,'registerDeactivation'));
        add_action('admin_menu', [$this,'createSPMenu']);
        add_filter('plugin_action_links_'.$this -> pluginpath, [$this, 'createSPLinks']);
        add_action('wp_head',[$this,'injectSPHeader']);
        add_action('wp_footer',[$this,'injectSPFooter']);
        add_action('wp_head',[$this,'injectCss']);
        add_action('wp_footer',[$this,'injectJs']);
    }
    public function registerActivation(){
        //set the activation status pointer
        update_option('__script_press_activated',true);
        flush_rewrite_rules();
        $is_scriptpress_active = get_option('__script_press_activated');
        if($is_scriptpress_active){
            wp_safe_redirect("admin.php?page=wp-script-press");
            exit;
        }
        
    }
   
    public function registerDeactivation(){
        update_option('__script_press_activated',false);
        flush_rewrite_rules();
    }

    

}

$scriptpress = new ScriptPress();











?>