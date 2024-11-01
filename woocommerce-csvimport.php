<?php
/*
	Plugin Name:            Woocommerce CSV Import
	Plugin URI:             http://allaerd.org/
	Description:            Import and Export Woocommerce products

 	Author:					Allaerd Mensonides
 	Author URI:				https://allaerd.org

 	Version:				3.4.0

	Requires at least: 		4.0
	Tested up to: 			4.8

	License: GPLv2 or later

	Text Domain: woocommerce-csvimport
	Domain Path: /languages
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ALLAERD_IMPORTER_PLUGIN_PATH', dirname( __FILE__ ) );
define( 'ALLAERD_IMPORTER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/********
 *
 * NEW style
 *
 ********/
$paths = array (
	'/export/include/abstracts/',
	'/export/include/interfaces/',
	'/export/include/classes/',
	'/export/include/products/',
	'/extensions/',
);

foreach ( $paths as $path ) {
	$files = glob( dirname( __FILE__ ) . $path . '*.php' );
	foreach ( $files as $file ) {
		include $file;
	}
}


//common
include dirname( __FILE__ ) . '/src/Allaerd/UserRoles.php';
include dirname( __FILE__ ) . '/src/Allaerd/UploadErrorMessages.php';

////exporter
include dirname( __FILE__ ) . '/export/Exporter.php';


/********
 * OLD style
 ********/

//include the main classes
include dirname( __FILE__ ) . '/include/class-woocsv-import.php';

//include statics
include dirname( __FILE__ ) . '/include/class-woocsv-batches.php';
include dirname( __FILE__ ) . '/include/class-woocsv-schedule-import.php';

//logger
include dirname( __FILE__ ) . '/include/LoggerInterface.php';
include dirname( __FILE__ ) . '/include/LogToFile.php';

//extensions
include_once dirname( __FILE__ ) . '/extensions/import_wc_vendors.php';

/**
 * ajax actions
 */
//delete batch
add_action( 'wp_ajax_delete_batch', array ( 'woocsv_batches', 'delete' ) );

//delete batch all
add_action( 'wp_ajax_delete_batch_all', 'woocsv_batches::delete_all' );

//start_batch
add_action( 'wp_ajax_start_batch', 'woocsv_batches::start' );

/**
 * multi language
 */

load_plugin_textdomain( 'woocommerce-csvimport', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

//global stuff
$woocsv_import  = new woocsv_import();
$woocsv_product = '';

// the good hook for loading add-ons. others will be removed
do_action( 'woocsv_after_init' );


//helper functions
function aem_helper_date( $timestamp = NULL ) {

	if ( ! $timestamp ) {
		$new_date = '';

		return $new_date;
	}

	$temp_date = new DateTime();
	$temp_date->setTimestamp( $timestamp );
	$new_date = $temp_date->format( 'Y-m-d H:i' );

	return $new_date;

}
