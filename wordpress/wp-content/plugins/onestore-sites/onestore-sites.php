<?php
/*
Plugin Name: OneStore Sites
Plugin URI: https://sainwp.com
Description: Import free sites build with OneStore theme.
Author: sainwp
Author URI: https://sainwp.com/about/
Version: 0.1.1
Text Domain: onestore-sites
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

define( 'ONESTORE_SITES_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );
define( 'ONESTORE_SITES_PATH', dirname( __FILE__ ) );

if ( ! class_exists( 'WP_Importer' ) ) {
	defined( 'WP_LOAD_IMPORTERS' ) || define( 'WP_LOAD_IMPORTERS', true );
	require ABSPATH . '/wp-admin/includes/class-wp-importer.php';
}

require dirname( __FILE__ ) . '/classess/class-placeholder.php';
require dirname( __FILE__ ) . '/importer/class-logger.php';
require dirname( __FILE__ ) . '/importer/class-logger-serversentevents.php';
require dirname( __FILE__ ) . '/importer/class-wxr-importer.php';
require dirname( __FILE__ ) . '/importer/class-wxr-import-info.php';
require dirname( __FILE__ ) . '/importer/class-wxr-import-ui.php';

require dirname( __FILE__ ) . '/classess/class-tgm.php';
require dirname( __FILE__ ) . '/classess/class-plugin.php';
require dirname( __FILE__ ) . '/classess/class-sites.php';
require dirname( __FILE__ ) . '/classess/class-export.php';
require dirname( __FILE__ ) . '/classess/class-ajax.php';


OneStore_Sites::get_instance();
new OneStore_Sites_Ajax();

/**
 * Redirect to import page
 *
 * @param $plugin
 * @param bool|false $network_wide
 */
function onestore_sites_plugin_activate( $plugin, $network_wide = false ) {
	if ( ! $network_wide && $plugin == plugin_basename( __FILE__ ) ) {

		$url = add_query_arg(
			array(
				'page' => 'onestore-sites',
			),
			admin_url( 'themes.php' )
		);

		wp_redirect( $url );
		die();

	}
}
add_action( 'activated_plugin', 'onestore_sites_plugin_activate', 90, 2 );

if ( is_admin() ) {
	function onestore_sites_admin_footer( $html ) {
		if ( isset( $_REQUEST['dev'] ) ) {
			$sc = get_current_screen();
			if ( $sc->id == 'appearance_page_onestore-sites' ) {
				$html = '<a class="page-title-action" href="' . admin_url( 'export.php?content=all&download=true&from_onestore=placeholder' ) . '">Export XML Placeholder</a> - <a class="page-title-action" href="' . admin_url( 'export.php?content=all&download=true&from_onestore' ) . '">Export XML</a> - <a class="page-title-action" href="' . admin_url( 'admin-ajax.php?action=cs_export' ) . '">Export Config</a>';
			}
		}
		return $html;
	}
	add_filter( 'update_footer', 'onestore_sites_admin_footer', 199 );
}
