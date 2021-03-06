<?php
/*
Plugin Name: Sticky Notification
Plugin URI: //github.com/farhansadiqmullick/sticky-notification
Description: Sticky Notification in Top
Version: 1.0
Author: WPPOOL
Author URI: https://wppool.dev
License: GPLv2 or later
Text Domain: sticky-notification
Domain Path: /languages/
Plugin Type: Piklist
*/

if (!defined('ABSPATH')) { exit; }

class Sticky
{

    public function __construct()
    {
        add_action('plugins_laoded', array($this, 'sticky_plugin_load'));
        add_action('wp_enqueue_scripts', array($this, 'sticky_plugin_assets_load'));
        add_action('init', array($this, 'sticky_plugin_admin_menu'));
        add_shortcode('sticky_navbar', array($this, 'sticky_navbar_display'));
    }
    function sticky_plugin_load()
    {
        load_plugin_textdomain('sticky-notification', false, plugin_dir_path(__FILE__) . 'languages');
    }

    function sticky_plugin_assets_load()
    {
        wp_enqueue_style('bootstrap-min-css', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css', null, '', 'all');
        wp_enqueue_style('sticky-style-css', plugin_dir_url(__FILE__) . 'assets/css/style.css', null, rand(111, 999), 'all');
        wp_enqueue_script('jquery', plugin_dir_url(__FILE__) . 'assets/js/jquery-3.2.1.slim.min.js', '', '', true);
        wp_enqueue_script('popper-js', plugin_dir_url(__FILE__) . 'assets/js/popper.min.js', ['jquery'], '', true);
        wp_enqueue_script('bootstrap-min-js', plugin_dir_url(__FILE__) . 'assets/js/bootstrap.min.js', ['jquery'], '', true);
        wp_enqueue_script('sticky-main-js', plugin_dir_url(__FILE__) . 'assets/js/main.js', ['jquery'], '', true);
    }
        
    function sticky_plugin_admin_menu(){

		$labels = array(
			"name"               => __("Sticky Topbar", "sticky-notification"),
			"singular_name"      => __("Sticky Topbar", "sticky-notification"),
			"featured_image"     => __('Topbar Image', 'sticky-notification'),
			"set_featured_image" => __('Set Topbar Image', 'sticky-notification')
		);

		$args = array(
			"label"               => __("Sticky Topbar", "sticky-notification"),
			"labels"              => $labels,
			"description"         => "",
			"public"              => false,
			"publicly_queryable"  => true,
			"show_ui"             => true,
			"delete_with_user"    => false,
			"show_in_rest"        => true,
			"has_archive"         => false,
			"show_in_menu"        => true,
			"show_in_nav_menus"   => false,
			"exclude_from_search" => true,
			"capability_type"     => "post",
			"map_meta_cap"        => true,
			"hierarchical"        => false,
			"rewrite"             => array("slug" => "sticky-topbar", "with_front" => true),
			"query_var"           => true,
			"supports"            => array("title", "thumbnail"),
		);

		register_post_type("sticky-topbar", $args);
	}


    function sticky_navbar_display($sticky)
    {
        
            $args = array(
                'post_type'   => 'sticky-topbar',
                'post_status' => 'publish',
                'meta_key'    => 'sticky_metadata_display',
                'meta_value'  => 1
            );
            $query  = new WP_Query($args);
            while ($query->have_posts()) {
                $query->the_post();
        $left_color = get_post_meta( get_the_ID(), 'sticky_bg_color', true );
        $middle_color =  get_post_meta( get_the_ID(), 'sticky_middle_color', true );
        $right_color = get_post_meta( get_the_ID(), 'sticky_right_bg_color', true );
        
        $leftSticker =  wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'sticky_topbar_left_image_field', true ))[0];
        $rightSticker =  wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'sticky_topbar_right_image_field', true ))[0];
        $token1 = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'sticky_token1_image', true ))[0];
        $token2 = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'sticky_token2_image', true ))[0];
        $offerSticker1 = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'offer_sticker1', true ))[0];
        $offerSticker2 = wp_get_attachment_image_src(get_post_meta( get_the_ID(), 'offer_sticker2', true ))[0];
        $offerURL = get_post_meta(get_the_ID(), 'sticky_topbar_offer_url', true);
        $timerColor = get_post_meta(get_the_ID(), 'sticky_topbar_timer_color', true);


        $sticky .= <<<EOD
            <div class="top_bar limeted-offer" style="background: linear-gradient(90deg, {$left_color} 0%, {$middle_color} 49.05%, {$right_color} 100%);"><span class="close_bar"></span>
            <img class="badge-1" src="{$leftSticker}" alt="">
            <img class="badge-2" src="{$rightSticker}" alt="">

            <a href="{$offerURL}" class="hidden_btn "></a>

            <div class="container">
                <div class="offer_section" data-timercolor="{$timerColor}">

                    <img class="offer-sticker-1" src="{$token1}" alt="">

                    <img class="offer-sticker-2" src="{$token2}" alt="">

                    <div id="offer_limit" data-limit="2022-03-03T20:00:00+06:00">
                        <ul>
                            <li>
                                <p class="time">01 <span>:</span></p> <span>Days</span>
                            </li>
                            <li>
                                <p class="time">09 <span>:</span></p> <span>Hours</span>
                            </li>
                            <li>
                                <p class="time">11 <span>:</span></p> <span>Minutes</span>
                            </li>
                            <li>
                                <p class="time">41</p> <span>Seconds</span>
                            </li>
                        </ul>
                    </div>
                    <img class="offer-sticker-3" src="{$offerSticker1}" alt="">
                    <img class="offer-sticker-4" src="{$offerSticker2}" alt="">
                </div>
            </div>
        </div>
EOD;
return $sticky;
            }
    }
}

new Sticky();

?>