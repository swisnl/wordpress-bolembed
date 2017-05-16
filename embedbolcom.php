<?php

/**
 * @package embedbolcom
 */

/*
Plugin Name: embedbolcom
Plugin URI: https://embedbol.com/
Description: A plugin to embed products from bol.com.
Version: 0.1
Author: SWIS
Author URI: https://swis.nl
License: GPLv2 or later
Text Domain: embedbolcom
*/

add_action( 'init', function() {
  wp_oembed_add_provider( '#^https?://www.bol.com/[a-z]{2}/p/[^/]+/(\d+)/?(\?[^?/]+)?$#', 'https://embedbol.com/oembed', true );
});
