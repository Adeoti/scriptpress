<?php
    if(! current_user_can('manage_options')){
        return;
    }
?>
<div class="wrap">
    <h2>ScriptPress Dashboard</h2>
    <hr>

        <?php
            $default_tab = null;
            $tab = isset($_GET['tab'])? $_GET['tab'] : $default_tab;
        ?>
    <nav class="nav-tab-wrapper">
        <a href="?page=wp-script-press&tab=wp-SPheader" class="nav-tab <?php if($tab === 'wp-SPheader'){ echo 'nav-tab-active';}?>">Header</a>
        <a href="?page=wp-script-press&tab=wp-SPfooter" class="nav-tab <?php if($tab === 'wp-SPfooter'){ echo 'nav-tab-active';}?>">Footer</a>
        <a href="?page=wp-script-press&tab=wp-SPcss" class="nav-tab <?php if($tab === 'wp-SPcss'){ echo 'nav-tab-active';}?>">CSS</a>
        <a href="?page=wp-script-press&tab=wp-SPjs" class="nav-tab <?php if($tab === 'wp-SPjs'){ echo 'nav-tab-active';}?>">JS</a>
    </nav>

        <div class="tab-content">
            <div class="wrap">
            <?php
            if($tab != null){
                require_once plugin_dir_path(__FILE__)."../scripts/scriptmaster.php";
            }else{
                require_once plugin_dir_path(__FILE__)."../scripts/welcome.php";
            }
                
            ?>
            </div>
        </div>
</div>