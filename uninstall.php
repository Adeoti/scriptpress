<?php
/**
 * @package ScriptPress
 */

 if(! defined("WP_UNINSTALL_PLUGIN")){
    exit; // abort operation if triggered directly
 }

 
 $scriptpress_options = array("wp-scriptpress-footer","wp-scriptpress-js","wp-scriptpress-header","wp-scriptpress-css");
 foreach($scriptpress_options as $option){
     delete_option($option);
 }


?>