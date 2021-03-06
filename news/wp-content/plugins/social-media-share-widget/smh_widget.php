<?php
/*
Plugin Name: Social Media Share Widget
Plugin URI: http://morrisonandrew.weebly.com
Description: Add Social Media Share from your sidebar. Includes 30 different icons to choose from.  The default icon set features all the icon types found in the other icon sets. 
Author: Andrew Morrison 
Version: 1.2.7
Author URI: http://morrisonandrew.weebly.com
*/

/*  Copyright 2014 Andrew Morrison  (email : xxrandrew@outlook.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_filter ('plugins_url', 'smh_wpcs_correct_domain_in_url');

define('SMH_PLUGIN_FILE', __FILE__);
define('SMH_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('SMH_PLUGIN_PATH', trailingslashit(dirname(__FILE__)));
define('SMH_PLUGIN_DIR', plugins_url('/', __FILE__));

register_deactivation_hook(__FILE__, 'smh_3_unregister');
register_activation_hook(__FILE__, 'smh_3_preregister');
add_action('widgets_init', 'smhWidgetReg');
add_action('plugins_loaded', 'smh_textdomain');
add_action( 'admin_print_styles-widgets.php', 'smh_3_admin_styles' );
add_action( 'admin_print_scripts-widgets.php',  'smh_3_admin_scripts' );
if( is_active_widget( false, false, 'smhwidget' ) ){
    add_action('wp_print_styles', 'smh_3_front_styles');
}


function smh_wpcs_correct_domain_in_url($url){
    if (function_exists('icl_get_home_url')){
        // Use the language switcher object, because that contains WPML settings, and it's available globally
        global $icl_language_switcher;
        // Only make the change if we're using the languages-per-domain option
        if (isset($icl_language_switcher->settings['language_negotiation_type']) && $icl_language_switcher->settings['language_negotiation_type'] == 2)
            return str_replace(untrailingslashit(get_option('home')), untrailingslashit(icl_get_home_url()), $url);
    }
    return $url;
}

function smh_3_preregister() {
    add_option('default_iconset', 'Default');
    add_option('first_save', 1);
}

function smh_3_unregister() {
    delete_option( 'default_iconset' );
    delete_option( 'first_save' );
}

function smh_textdomain(){
    load_plugin_textdomain('SMHWidget', false, basename( dirname( __FILE__ ) ) . '/languages');
}

function smhWidgetReg() {
    register_widget('SMHWidget');
}

function smh_3_admin_styles(){
    $styles_dir = SMH_PLUGIN_DIR . "styles/";
    wp_enqueue_style('smh-admin-style',$styles_dir . 'smh_admin.css', array(), '1.2.5');
}
function smh_3_admin_scripts(){
    $scripts_dir = SMH_PLUGIN_DIR . "js/";
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('jquery-livequery',$scripts_dir . 'jquery.livequery.js', array('jquery'));
    wp_enqueue_script('jquery-tooltip',$scripts_dir . 'tooltip.min.js', array('jquery'));
    wp_enqueue_script('smh-admin-script',$scripts_dir . 'smh_admin.js', array('jquery', 'jquery-tooltip'), '1.2.5');
}
function smh_3_front_styles(){
    $styles_dir = SMH_PLUGIN_DIR . "styles/";
    wp_enqueue_style('smh-widget-style',$styles_dir . 'smh_front.css', array(), '1.2.5');
}

class SMHWidget
extends WP_Widget
{
    public function SMHWidget(){

        $widget_ops=array
        (
        'classname'   => 'SMHWidget',
        'description' => 'Social Media Share'
        );

        $control_ops=array ( 'width' => 300, 'height' => 300 );

        $this->WP_Widget('SMHWidget', __('Social Media Share', 'SMHWidget'), $widget_ops, $control_ops); 

    }

    function update($new_instance, $old_instance) {
        $first_save = get_option('first_save');
        if ($first_save == 1) $first_save = 0;
        update_option('first_save', $first_save);

        $instance = $old_instance;
        $default_rss = get_bloginfo_rss('rss2_url');
        $iconsetpath = SMH_PLUGIN_PATH . "images/iconset/" . $new_instance['selected_iconset'];
        $icon_array = array();
        foreach (glob($iconsetpath . "/*.png") as $filename) {
            $icon_name = basename($filename, ".png");
            $icon_name_slug = $this->sanitize($icon_name);
            $icon_array[$icon_name_slug] = $icon_name_slug;
        }

        $value_array = array_merge(array(
        "selected_iconset" => "selected_iconset",
        "title" => "title",
        "plural" => "plural",
        "facebook" => "facebook",
        "twitter" => "twitter",
        "rss" => "rss",
        "youtube" => "youtube",
        "contact" => "contact",
        "flickr" => "flickr",
        "linkedin" => "linkedin",
        "delicious" => "delicious",
        "digg" => "digg",
        "buzz" => "buzz",
        "stumbleupon" => "stumbleupon",
        "reddit" => "reddit",
        "vimeo" => "vimeo",
        "yelp" => "yelp",
        "website" => "website",
        "sortable" => "sortable",
        "target" => "target"), $icon_array);
        foreach ( $value_array as $val ) {
            $new_value = isset($new_instance[$val]) ? strip_tags( $new_instance[$val] ) : "";
            $instance[$val] = $new_value;
        }
        return $instance;
    }

    function form( $instance ) {
        global $current_user;
        $author_meta = $this->authorinfo();
        get_currentuserinfo();
        $is_authorized = ((current_user_can('manage_options') || ($current_user->ID == $author_meta->ID)) ? true : false);
        $iconsetpath = SMH_PLUGIN_PATH . "images/iconset/";
        $iconsetfolders = $this->get_dirs($iconsetpath);
        $option_default_iconset = get_option('default_iconset', 'Default');
        $first_save = get_option('first_save');
        $default_rss = ($first_save == 1) ? get_bloginfo_rss('rss2_url') : "";
        $output = "";

        $defaults = array(
        'selected_iconset'  => $option_default_iconset,
        'title'             => 'Connect with me',
        'rss'               => $default_rss,
        'plural'            => false,
        'target'            => '_blank',
        'sortable'          => ''
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
        extract( $instance, EXTR_PREFIX_ALL, 'smh');

        # Output the options
        $output .= '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title:', 'SMHWidget') . ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $smh_title . '" /></label></p>';
        $output .= "<div id='widget_icon_setup'>\n";
        $output .= "<fieldset>\n";
        $output .= "<legend>" . __("Social Media Share", "SMHWidget") . "</legend>\n";
        $output .= "<div class=\"seltheme_container\">\n";
        $output .= "<label>" . __("Select a Theme", "SMHWidget") . ": \n";
        $output .= "<select name='" . $this->get_field_name('selected_iconset') . "' id='" . $this->get_field_id('selected_iconset') . "' class='smh_theme_select'>\n";
        foreach ($iconsetfolders as $iconfolder)
        {
            $output .= "<OPTION value=\"" . $iconfolder . "\"" . ($iconfolder == $smh_selected_iconset ? " selected=\"selected\"" : "") . ">" . __(ucwords($iconfolder) . " Theme", "SMHWidget") . "</OPTION>";
        }
        $output .= "</select>\n";
        $output .= "</label>\n";
        $output .= "</div>\n";
        $output .= wp_nonce_field('smh-update-widget', 'smh_widget_update', true, false); 
        $output .= "<div class=\"iconset_container\">\n";
        $output .= "<div class=\"smh_utility nopad\">";
        $output .= "<p class=\"helper small fl\"><a id=\"more_info\" href=\"#\">&nbsp;</a></p>\n";
        $output .= "<!-- tooltip element -->\n";
        $output .= "<div class='tooltip'>\n";
        $output .= "<table style='margin:0'>\n";
        $output .= "<tr>\n";
        $output .= "<td colspan='2' class='label'><h3>" . __("Social Media Share Widget Help", "SMHWidget") . "</h3></td>\n";
        $output .= "</tr>\n";
        $output .= "<tr>\n";
        $output .= "<td>1.</td>\n";
        $output .= "<td>" . __("Select an icon theme from the drop-down menu.", "SMHWidget") . "</td>\n";
        $output .= "</tr>\n";
        $output .= "<tr>\n";
        $output .= "<td>2.</td>\n";
        $output .= "<td>" . __("Click an available icon to reveal the URL text box below.", "SMHWidget") . "</td>\n";
        $output .= "</tr>\n";
        $output .= "<tr>\n";
        $output .= "<td>3.</td>\n";
        $output .= "<td>" . __("Enter a URL in the text field &amp; click save to update the widget.", "SMHWidget") . "</td>\n";
        $output .= "</tr>\n";
        $output .= "<tr>\n";
        $output .= "<td></td>\n";
        $output .= "<td><strong>" . __("Note: Icons without a set url will not be displayed.", "SMHWidget") . "</strong>"  . "</td>\n";
        $output .= "</tr>\n";
        $output .= "</table>\n";
        $output .= "</div>\n";
        $output .= "<p class=\"helper small fl\"><span>" . __("Tip: Click icon to set its URL", "SMHWidget") . "...</span></p>\n";
        $output .= "</div>\n";
        foreach (glob($iconsetpath . $smh_selected_iconset . "/*.png") as $filename) {
            $icon_name = basename($filename, ".png");
            $icon_name_slug = "smh_" . $this->sanitize($icon_name);

            $instance_value = isset(${$icon_name_slug}) ? ${$icon_name_slug} : "";
            $icon_value = (isset($instance_value)) ? $instance_value : "";
            if ($icon_name == "contact") {
                $output .= $this->contact_pages($smh_selected_iconset, $filename, $icon_value);
            } elseif ($icon_name == "googleplus") {
                $icon_value = (empty($icon_value) ? 0 : $icon_value);
                $output .= $this->icon_field($smh_selected_iconset, $filename, $icon_value);
            } else {
                $output .= $this->icon_field($smh_selected_iconset, $filename, $icon_value);
            }
        }
        $output .= "<div class=\"iconset_container_bdr\">\n";
        foreach (glob($iconsetpath . $smh_selected_iconset . "/*.png") as $filename) {
            $icon_name = basename($filename, ".png");
            $output .= $this->icon_image($smh_selected_iconset, $filename);
        }
        $output .= "<input class=\"smh_sortable\" type=\"hidden\" id=\"" . $this->get_field_id( 'sortable' ) . "\" name=\"" . $this->get_field_name( 'sortable' ) . "\" value=\"$smh_sortable\" />";
        $output .= "<input type=\"hidden\" id=\"smh_sortable_init\" value=\"0\" />";
        $output .= "</div>\n";
        $output .= "<div class=\"smh_utility\">";
        $output .= "<label style='margin-top: 5px; display: block; clear: both;'>" . __("Use \"our\" instead of \"my\" in icon text?", "SMHWidget") . "\n";
        $output .= "<input class=\"checkbox\" type=\"checkbox\" " . checked( (bool) $smh_plural, '1', false ) . "id=\"" . $this->get_field_id( 'plural' ) . "\" name=\"" . $this->get_field_name( 'plural' ) . "\" value=\"1\" />";
        $output .= "</label>\n";
        $output .= "<label style='margin-top: 5px; display: block; clear: both;'>" . __("Open links in a new tab or window?", "SMHWidget") . "\n";
        $output .= "<input class=\"checkbox\" type=\"checkbox\" " . checked( $smh_target, '_blank', false ) . "id=\"" . $this->get_field_id( 'target' ) . "\" name=\"" . $this->get_field_name( 'target' ) . "\" value=\"_blank\" />";
        $output .= "</label>\n";
        $output .= "</div>\n";
        $output .= "</div>\n";
        $output .= "</fieldset>\n";
        $output .= "</div>\n";
        $output .= "<script type='text/javascript'>\n";
        $output .= "jQuery(document).ready(function(){\n";
        $output .= "if (typeof jQuery.fn.sortable == 'function'){\n";
        $output .= "jQuery('.iconset_container_bdr').livequery(function(){\n";
        $output .= "jQuery(this).sortable(sOptions).disableSelection();\n";
        $output .= "}); \n";
        $output .= "} \n";
        $output .= "});\n";
        $output .= "</script>\n";

        echo $output;
    }

    function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters('widget_title', esc_attr($instance['title']));
        echo $before_widget;
        if(!empty($title)) {
            echo $before_title.$title.$after_title;
        }
        $this->get_smhWidget($instance);    
        echo $after_widget;
    }

    function get_SMHWidget($instance){
        $author_meta = $this->authorinfo();
        $default_rss = get_bloginfo_rss('rss2_url');
        $option_default_iconset = get_option('default_iconset', 'Default');
        foreach ($instance as $optionname => $optionvalue) {
            $var_name = "smh_" . $optionname;
            ${$var_name} = $optionvalue;
        }
        $iconsetpath = SMH_PLUGIN_PATH . "images/iconset/";
        if (isset($smh_selected_iconset)) {
            $icon_mask = $iconsetpath . $smh_selected_iconset . "/*.png";
        } else {
            $default_iconset = get_option('default_iconset', 'Default');
            $icon_mask = $iconsetpath . $default_iconset . "/*.png";
        }
        $html="<!-- BEGIN SOCIAL MEDIA CONTACTS -->\n";
        $html.="<div id=\"socialmedia-container\">\n";
        $icon_filenames = array();
        $smh_sortable_all_array = @json_decode(rawurldecode($smh_sortable), true);

        $icon_theme = isset($smh_selected_iconset) ? $smh_selected_iconset : $default_iconset;

        $smh_sortable_array = (isset($smh_sortable_all_array[$icon_theme])) ? $smh_sortable_all_array[$icon_theme] : false;
        if ((empty($smh_sortable_array) === false) && is_array($smh_sortable_array)){
            foreach ($smh_sortable_array as $key => &$val){
                $val = str_replace('icon_container', '', $val);
            }
            foreach (glob($icon_mask) as $filename) {
                $icon_name_slug = $this->sanitize(basename($filename, ".png"));
                $icon_filenames[$icon_name_slug] = $filename;
            }
            foreach($smh_sortable_array as $smh_order => $smh_slug){
                if (isset($icon_filenames[$smh_slug])){
                    $filename = $icon_filenames[$smh_slug];
                    $icon_name = basename($filename, ".png");
                    $icon_name_slug = $this->sanitize($icon_name);
                    $icon_varname = "smh_" . $icon_name_slug;
                    $instance_value = isset(${$icon_varname}) ? ${$icon_varname} : "";
                    $icon_url = (empty($instance_value)) ? false : $instance_value;
                    if ($icon_url) $html .= $this->build_widget_icon($filename, $icon_url, $smh_plural, $smh_target);
                }
            }
        } else {
            foreach (glob($icon_mask) as $filename) {
                $icon_name = basename($filename, ".png");
                $icon_name_slug = $this->sanitize($icon_name);
                $icon_varname = "smh_" . $icon_name_slug;
                $instance_value = isset(${$icon_varname}) ? ${$icon_varname} : "";
                $icon_url = (empty($instance_value)) ? false : $instance_value;
                if ($icon_url) $html .= $this->build_widget_icon($filename, $icon_url, $smh_plural, $smh_target);
            }      
        }
        $html.="</div>\n";
        $html.="<!-- END SOCIAL MEDIA CONTACTS -->\n";
        echo $html;
    }

    function build_widget_icon($icon, $iconlink="", $smh_plural=false, $smh_target='_blank'){
        $icon_info = pathinfo($icon);
        $icon_name = $icon_info['filename'];
        $icon_name_slug = $this->sanitize($icon_info['filename']);
        $icon_theme = basename($icon_info['dirname']);
        $output= "";
        $iconsrc = str_replace(array(rtrim(SMH_PLUGIN_PATH, '/\\'), '\\'), array(rtrim(plugins_url('/', __FILE__), '/\\'), '/'), $icon);
        $src = file_exists($icon) ? $iconsrc : false;
        if ($src){
            if ($icon_name == "contact") {
                $iconlink = get_permalink($iconlink);
                $output.="<div id=\"social-" . $icon_name_slug . "\" class=\"smh_icon_container $icon_theme\"><a href=\"" . $iconlink . "\" title=\"Link to " . (empty($smh_plural) ? "my" : "our") . " " . ucwords($icon_name) . " Page\"><img alt=\"Link to " . (empty($smh_plural) ? "my" : "our") . " " . ucwords($icon_name) . "\" src=\"" . $src . "\" /></a></div>";
            } elseif ($icon_name == "googleplus"){
                if (empty($iconlink) || $iconlink === 0){ 
                    return $output;
                } else {
                    $output .=  "<div id=\"social-" . $icon_name . "\" class='googleplus smh_icon_container " . $icon_theme . "'>\n";
                    $output .=  "<div class='googlehider'>\n";
                    $output .=  "<g:plusone annotation='none'></g:plusone>\n";
                    $output .=  "\n";
                    $output .=  "<!-- Place this render call where appropriate -->\n";
                    $output .=  "<script type='text/javascript'>\n";
                    $output .=  "window.___gcfg = {lang: 'en-GB'};\n";
                    $output .=  "\n";
                    $output .=  "(function() {\n";
                    $output .=  "var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;\n";
                    $output .=  "po.src = 'https://apis.google.com/js/plusone.js';\n";
                    $output .=  "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);\n";
                    $output .=  "})();\n";
                    $output .=  "</script>\n";
                    $output .=  "</div>\n";
                    $output .=  "<img alt=\"" . __("Recommend this page!", "SMHWidget") . "\" title=\"" . __("Recommend this page!", "SMHWidget") . "\" src='" . $src . "' class='mygoogle' />\n";
                    $output .=  "</div>\n";
                }
            } else {
                $iconlink_type = $this->emailORurl($iconlink);
                switch($iconlink_type){
                    case 'email' :
                        $iconlink = $this->addMailTo($iconlink);
                        break;
                    case 'url' :
                        $iconlink = $this->addhttp($iconlink);
                        break;
                    default :
                        $iconlink = $iconlink;
                        break;
                }

                $output.="<div id=\"social-" . $icon_name . "\" class=\"smh_icon_container $icon_theme\"><a href=\"" . $iconlink . "\" " . (($smh_target == '_blank') ? "target=\"_blank\" " : "") . "title=\"" . __("Link to " . (empty($smh_plural) ? "my" : "our") . " " . ucwords($icon_name) . " Page", "SMHWidget") . "\"><img alt=\"" . __("Link to " . (empty($smh_plural) ? "my" : "our") . " " . ucwords($icon_name) . " Page") . "\" src=\"" . $src . "\" /></a></div>";
            }
        }
        return $output;
    }

    function authorinfo(){
        $blog_admin_email = (function_exists('get_blog_option') ? (get_blog_option( $this->current_blog_var->blog_id,'admin_email' )) : get_option('admin_email'));
        $blog_admin_info = get_user_by('email', $blog_admin_email);
        $blog_owner_id = (function_exists('get_user_id_from_string') ? (get_user_id_from_string( $blog_admin_email )) : ($blog_admin_info->ID));
        $authordata = get_userdata( $blog_owner_id );
        return $authordata;
    }

    function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }

    function addMailTo($email){
        if (stristr($email, 'mailto:') === false){
            $email = "mailto:" . $email;
        }
        return $email;
    }

    function emailORurl($string) {
        $string = str_replace(array('mailto:', 'http://', 'https://', 'ftp://', 'sftp://', 'ftps://'), array('','','','','',''), strtolower($string));
        if (filter_var($string, FILTER_VALIDATE_EMAIL)){
            return 'email';
        } elseif (filter_var($string, FILTER_VALIDATE_URL)){
            return 'url';
        } elseif (filter_var("http://" . $string, FILTER_VALIDATE_URL)){
            return 'url';
        } else {
            return false;
        }
    }

    function icon_field($directory_name, $icon, $value="", $onclick=""){
        $icon_info = pathinfo($icon);
        $icon_name = $icon_info['filename'];
        $icon_name_slug = $this->sanitize($icon_info['filename']);
        $output = "";
        $disabled = (!file_exists($icon)) ? " disabled\" disabled = \"disabled" : "";
        $onclick = (empty($onclick) ? "" : " onclick =\"if(this.value=='" . $onclick . "'){this.value='';}\"");
        $output.= "<p class=\"icon_url_input\" id=\"" . $icon_name_slug . "_icon_url_input\" style=\"display: none; \">\n";
        $output.= "<label>" . __(($icon_name == "googleplus" ? "Enable " : "") . ucwords($icon_name) . " Icon", "SMHWidget") . ":&nbsp;\n";
        if($icon_name == "googleplus")
            $output.= "<input id=\"smh_profile_url_" . $icon_name_slug . "\" name=\"" . $this->get_field_name($icon_name_slug) . "\" value=\"1\" type=\"checkbox\" class=\"smh_widget_url_input" . $disabled . "\" " . checked($value, "1", false) . " style=\"width: auto!important; margin-top: 5px;\">\n";
        else
            $output.= "<input id=\"smh_profile_url_" . $icon_name_slug . "\" name=\"" . $this->get_field_name($icon_name_slug) . "\" value=\"" . $value . "\" type=\"text\" class=\"smh_widget_url_input" . $disabled . "\"" . $onclick . ">\n";
        $output.= "</label>\n";
        $output.= "</p>\n";
        return $output;
    }

    function icon_image($directory_name, $icon){
        $output = "";
        $icon_info = pathinfo($icon);
        $icon_name = $icon_info['filename'];
        $icon_name_slug = $this->sanitize($icon_info['filename']);
        $iconurl = str_replace(rtrim(SMH_PLUGIN_PATH, '/\\'), rtrim(plugins_url('/', __FILE__), '/\\'), $icon);

        $src = file_exists($icon) ? $iconurl : SMH_PLUGIN_DIR . "images/" . "unknown.png";
        $output .="<div class='icon_container' id='" . $icon_name_slug . "icon_container'>\n";
        $output .="<img alt=\"" . __(ucwords($directory_name) . " Theme: " . ucwords($icon_name) . " Icon", "SMHWidget") . "\" src=\"" . $src . "\" height=\"32\" width=\"32\" />\n";
        $output .="<span class=\"" . (file_exists($icon) ? "" : "icon_disabled") . "\">" . ucwords($icon_name) . "</span>";
        $output .=" <input type=\"hidden\" name=\"" . $directory_name . "_" . $icon_name_slug . "_sort\" class=\"smh_sort\" />\n";
        $output .=" </div>\n";
        return $output;
    }

    function get_dirs($path = '.') {
        $dirs = array();
        foreach (new DirectoryIterator($path) as $file) {
            if ($file->isDir() && !$file->isDot()) {
                $dirs[] = $file->getFilename();
            }
        }
        return $dirs;
    }

    function contact_pages($directory_name, $icon, $value=""){
        $icon_info = pathinfo($icon);
        $icon_name = $icon_info['filename'];
        $disabled = (!file_exists($icon)) ? "disabled\" disabled = \"disabled" : "";
        $smh_pages=get_pages();
        $wp_pages=array(0 => __("Choose a Page", "SMHWidget"));
        $output = "";
        foreach ($smh_pages as $smh_pages_list) { $wp_pages[ "$smh_pages_list->ID" ]=$smh_pages_list->post_title; }
        $output.= "<p class=\"icon_url_input\" id=\"" . $icon_name . "_icon_url_input\" style=\"display: none; \">\n";
        $output.= "<label>" . __(ucwords($icon_name) . " Icon", "SMHWidget") . ":&nbsp;\n";
        $output.= "<select id=\"smh_profile_url_" . $icon_name . "\" name=\"" .  $this->get_field_name('contact') . "\" class=\"smh_widget_url_input " . $disabled . "\">\n";
        foreach ($wp_pages as $pageid => $pagetitle) {
            $output.= "<option value = \"" . (($pageid === 0) ? "" : $pageid) . "\" " . ($value == $pageid ? "selected=\"selected\"" : "") . " class=\"" . $pageid . "\"" . ">" . $pagetitle . "</option>\n";
            #if ($pageid == 'leadgen') $output .= "<option disabled='disabled'>&mdash;</option>\n";
        }        
        $output.= "</select>\n";
        $output.= "</label>\n";
        $output.= "</p>\n";
        return $output;
    }       

    function sanitize($value) {
        if (!@preg_match('/\pL/u', 'a')) {
            $pattern = '/[^a-zA-Z0-9]/';
        } else {
            $pattern = '/[^\p{L}\p{N}]/u';
        }
        return preg_replace($pattern, '', $value);
    }

}
