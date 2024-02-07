<?php

/**
 * Package Edus
 * Author Ir Tech
 * @since 2.0.0
 * */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

if (!class_exists('Edus_Admin_Request')){
	class Edus_Admin_Request{

		private static $instance;

		public function __construct() {
			add_action('admin_post_edus_license_verify',array($this,'license_verify'));
		}
		/**
		 * get Instance
		 * @since 1.0.0
		 * */
		public static function getInstance(){
			if (null == self::$instance){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * License verify
		 * @since 1.0.0
		 * */
		public function license_verify(){
			if (isset($_POST['edus_license_verify']) && wp_verify_nonce($_POST['edus_license_verify'],'edus_license_verify')){
				return;
			}

			$endpoint = 'https://irtech.biz/api/license/new';
			$secret_code = '4ZlzSYuYzdTwiCVNbJbH6EqlJeGFOM4X';
			$response = wp_remote_post($endpoint,array(
				'sslverify' => false,
				'body' => [
					'purchase_code' => trim($_POST['edus_purchase_code']),
					'site_url' => home_url('/'),
					'item_unique_key' => $secret_code
				]
			));
			if (!is_wp_error($response)){

				$licnese_response = json_decode($response['body']);
				update_option('edus_purchase_code',trim($_POST['edus_purchase_code']));
				update_option('edus_secret_code',$secret_code);
				update_option('edus_license_status',$licnese_response->license_status);
				update_option('edus_license_msg',$licnese_response->msg);
			}

			wp_safe_redirect(admin_url('/').'/admin.php?page=theme-license');
			die();
		}


	}//end class
	if ( class_exists('Edus_Admin_Request')){
		Edus_Admin_Request::getInstance();
	}
}