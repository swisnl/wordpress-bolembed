<?php

/**
 * @package BolEmbed
 */

/*
Plugin Name: Bol Embed
Plugin URI: https://embedbol.com/
Description: A plugin to embed products from bol.com.
Version: 0.1
Author: SWIS
Author URI: https://swis.nl
License: GPLv2 or later
Text Domain: bolembed
*/

add_action( 'init', function() {
  wp_oembed_add_provider( '#^https?://www.bol.com/[a-z]{2}/p/[^/]+/(\d+)/?(\?[^?/]+)?$#', 'https://embedbol.com/oembed', true );
});

register_activation_hook( __FILE__, function() {
  global $wpdb;

  $wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '_oembed_%' AND meta_value = '{{unknown}}'");
});

register_deactivation_hook( __FILE__, function() {
  global $wpdb;

  $wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '_oembed_%' AND meta_value LIKE '%bolembed%'");
});