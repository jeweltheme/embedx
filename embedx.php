<?php
/**
 * Plugin Name: EmbedX
 * Plugin URI:  https://jeweltheme.com/embedx
 * Description: Embed anything using iframe on WordPress
 * Version:     1.0.0
 * Author:      Jewel Theme
 * Author URI:  https://jeweltheme.com
 * Text Domain: embedx
 * Domain Path: languages/
 * License:     GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package embedx
 */

/*
 * don't call the file directly
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//register shortcode
add_shortcode('embedx', 'embedx_iframe_shortcoe');
function embedx_iframe_shortcoe( $atts, $content=null ){
    //validing all attribute
    $atts = shortcode_atts(
        array(
            'login' => false,
            'src' => '',
            'width' => '',
            'height' => '',
            'class' => '',
            'style' => '',
    ),$atts);

    $login = $atts['login'];

    //removing login attr
    unset($atts['login']);
    if (isset($atts['src']) && !empty($atts['src'])) {
        $attr='';
        foreach ($atts as $name => $value) {
            if (isset($value) && !empty($value)) {
                $attr .= $name.'="'.$value.'" ';
            }
        }
        $html = "<iframe $attr></iframe>";
    }
    //checking need log in or not
    if ($login !== false) {
        if ( is_user_logged_in()) {
            return $html;
        }
        return ;
    }
    else{
        return $html;
    }
}
