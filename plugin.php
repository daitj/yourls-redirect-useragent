<?php
/*
Plugin Name: Redirect Based on User-Agent
Plugin URI: https://github.com/daitj/yourls-redirect-useragent
Description: A simple plugin to redirect based on User-Agent, all blacklisted user agents won't be redirected to target URL but instead shown a custom page
Version: 1.0
Author: daitj
Author URI: https://github.com/daitj
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

//First hook admin page
yourls_add_action( 'plugins_loaded', 'ana_add_page' );

function ana_add_page() {
    // parameters: page slug, page title, and function that will display the page itself
    yourls_register_plugin_page( 'ana_page', 'Redirect UserAgent Blacklist', 'ana_do_page' );
}

// Display admin page
function ana_do_page() {
    $saved = true;
    // Check if a form was submitted
    if( isset( $_POST['useragent_list'] ) ) {
        // Check nonce
        yourls_verify_nonce( 'ana_page' );

        // Process form
        $saved = ana_update_option();
    }

    // Get value from database
    $useragent_list = yourls_get_option( 'useragent_list' );

    // Create nonce
    $nonce = yourls_create_nonce( 'ana_page' );

    $error_msg = "";

    if($saved == false){
        $error_msg = "<p style='color:red'>Error saving value</p>";
    }
    echo <<<HTML
        <h2>Redirect UserAgent Administration</h2>
        <p>Add blacklisted usergent here, used as preg_match separated by new line</p>
        $error_msg
        <form method="post">
        <input type="hidden" name="nonce" value="$nonce" />
        <p><textarea name='useragent_list' id='useragent_list' cols='50' rows='10'>$useragent_list</textarea></p>
        <p><input type="submit" value="Save value" /></p>
        </form>
HTML;
}

// Update option in database
function ana_update_option() {
    $in = $_POST['useragent_list'];
    if($in) {
        // validate
        $in = str_replace("\r\n","\n",$in);
        $in_array = explode("\n", $in);
        $out_array =  [];
        foreach($in_array as $ua){
            $ua = trim($ua);
            if(strlen($ua) > 0){
                $out_array[] = $ua;
            }
        }
        if(count($out_array) == 0){
            return false;
        }
        $out = implode("\n", $out_array);
        // Update value in database
        yourls_update_option( 'useragent_list', $out );
        return true;
    }
}

// Hook our custom function into the 'pre_redirect' action
yourls_add_action( 'pre_redirect', 'ana_redirect_useragent' );

function ana_redirect_useragent($args) {

    // Get the user agent of the current request
    $user_agent = $_SERVER[ 'HTTP_USER_AGENT' ];

    // Get the list of redirect user agents from the options page
    $useragents = yourls_get_option( 'useragent_list' );
    
    //split it into list
    $useragent_list = explode("\n", $useragents);
    
    //match with the existing one
    if (empty($useragent_list)) {
        $useragent_list = array("#Google-PageRenderer#");
    }
    $ua_matches=false;
    foreach($useragent_list as $ua){
        if(preg_match($ua, $user_agent, $matches)){
            $ua_matches=true;
            break;
        }
    }
    
    if($ua_matches){
        if(file_exists(stream_resolve_include_path("other-ua-custom.php"))){
            include("other-ua-custom.php");
        }else{
            include("other-ua.php");
        }
        die();
    }
}

