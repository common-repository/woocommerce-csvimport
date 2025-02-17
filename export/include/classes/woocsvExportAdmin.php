<?php

namespace Allaerd\Export;

/**
 * Created by PhpStorm.
 * User: allaerd
 * Date: 25/03/16
 * Time: 08:45
 */
class woocsvExportAdmin {

	public function menu() {
		//export sub page
		$page = add_submenu_page( 'woocsv_import', 'Export', __( 'Export', 'woocommerce-csvimport' ), 'manage_woocommerce', 'woocsv-export', array ( $this, 'content' ) );
		add_action( 'admin_print_scripts-' . $page, array ( $this, 'enqueue_scripts' ) );

	}

	public function enqueue_scripts() {
		wp_register_script( 'woocsv-export', ALLAERD_IMPORTER_PLUGIN_URL . 'admin/js/woocsv-export-admin.js' );

		$strings = array (
			'security' => wp_create_nonce( 'woocsv-security-nonce' ),
		);

		wp_localize_script( 'woocsv-export', 'woocsvexport', $strings );
		wp_enqueue_script( 'woocsv-export' );
	}

	public function content() {
		global $wpdb;

		if ( isset( $_POST[ 'action' ] ) && $_POST[ 'action' ] == 'export' ) {
			delete_option( 'woocsv_export_current' );
			//$this->export();
		}

		$woocsv_export_current = get_option( 'woocsv_export_current' );

		$min = 0;
		$max = $wpdb->get_var( "select count(*) from $wpdb->posts where post_type = 'product'" );

		$upload_dir = wp_upload_dir();
		$files      = glob( $upload_dir[ 'basedir' ] . '/woocsv_export_*' );
		rsort( $files );
		$headers = array_merge( array ( 'All' ), array_keys( (array) woocsv_export()->headers ) );
		include ALLAERD_IMPORTER_PLUGIN_PATH . '/export/partials/main.php';
	}

}