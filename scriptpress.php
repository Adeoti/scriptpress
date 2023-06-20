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
 * Author URI: https://github.com/Adeoti
 * Text Domain: Scriptpress
 * 
 * @package ScriptPress
 */

if(! defined('ABSPATH')){
    die("You can't load this via the backdoor");
}
require_once plugin_dir_path(__FILE__)."/includes/widgets/menu.php";
require_once plugin_dir_path(__FILE__)."/includes/handlers.php";

/*
The main ScriptPress class
 */

class ScriptPress extends SPMenu{
    public $pluginpath;
    public function __construct()
    {
        $this -> pluginpath = plugin_basename(__FILE__);
        register_activation_hook(__FILE__, [$this, 'registerActivation']);
        register_deactivation_hook(__FILE__, array($this,'registerDeactivation'));
        add_action('admin_menu', [$this,'createSPMenu']);
        add_filter("plugin_action_links_{$this -> pluginpath}", [$this, 'createSPLinks']);
        add_action('wp_head', [$this,'injectSPHeader']);
        add_action('wp_footer', [$this,'injectSPFooter']);
        add_action('wp_head', [$this,'injectCss']);
        add_action('wp_footer', [$this,'injectJs']);
        add_action('admin_enqueue_scripts', [$this, 'adminEnqueueScripts']);
        add_filter('admin_footer_text', [$this,'scriptPressFotter']);
    }
    public function registerActivation(){
        //set the activation status pointer
        flush_rewrite_rules();
       
        
    }

   
    public function registerDeactivation(){
        flush_rewrite_rules();
    }

    

}

$scriptpress = new ScriptPress();











?>