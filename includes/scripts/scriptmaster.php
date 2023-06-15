<?php
if(!current_user_can("manage_options")){
    return;
}


    if(isset($_GET['tab'])){
        $tab = esc_html($_GET['tab']);
    }else{
        $tab = null;
    }


        $msgHolder = "";
        switch($tab){
            case 'wp-SPfooter':
                $msgHolder = "footer";
                break;
            case 'wp-SPheader':
                $msgHolder = "header";
                break;
            case 'wp-SPcss':
                $msgHolder = "css";
                break;
            case 'wp-SPjs':
                $msgHolder = "js";
                break;
                default:
                $msgHolder = "ScriptPress";
                break;
        }
?>


<div class="wrap">
    <p class="sc-primary-color"> 
    <span class="dashicons dashicons-edit"></span>
        Insert Custom <?php echo ucfirst($msgHolder)?> Script</p>

    <?php

        if(isset($_POST['refresh-wpscriptpress-'.$msgHolder])){
            if(update_option('wp-scriptpress-'.$msgHolder,'')){
                echo "<div id='message' class='updated notice is-dismissible'>
                    <p>Your custom ".$msgHolder." script has been removed!</p>
                </div>";
            }
        }
        if(isset($_POST['sp-save-'.$msgHolder])){
            $msgHolderscript = trim($_POST['sp-'.$msgHolder.'-script']);

            $msgHolderscript = stripslashes($msgHolderscript);
            if(!empty($msgHolderscript)){
                if(update_option("wp-scriptpress-".$msgHolder,$msgHolderscript)){
                    echo "<div id='message' class='updated notice is-dismissible'>
                    <p>Your custom ".$msgHolder." script has been inserted successfully!</p>
                    </div>";
                   
                }
            }else{
                echo "<div class='notice notice-warning is-dismissible'>
                    <article>Leaving this empty means you're getting rid of your custom ".$msgHolder." script.
                       &nbsp; &nbsp; 
                       <form action='' style='display:inline-block;' method='POST'>
                       <p><button class='button button-primary' name='refresh-wpscriptpress-".$msgHolder."'>yes, get rid of it!</button>
                        &nbsp; &nbsp; 
                        
                       </p>
                       </form>
                       
                    </article>
                </div>";
            }
        }

    ?>

    <form action="" method="POST">
    <textarea id="wp-scriptpress-editor" placeholder="Write or paste your <?php echo $msgHolder; ?> script here" name="sp-<?php echo $msgHolder; ?>-script" class="large-text" style="height:380px; overflow:auto; padding:8px; border:none; resize:none; outline:1px solid #482ff7;"><?php echo get_option("wp-scriptpress-".$msgHolder,'none');?></textarea>
        <br><button class="button button-primary" name="sp-save-<?php echo $msgHolder; ?>">save changes</button>
    </form>
</div>