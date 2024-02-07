<?php

/**
 * @package Edus
 * @author Ir-Tech
 */
if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Edus_Master_Init')) {

	class Edus_Master_Init
	{
		/*
        * $instance
        * @since 1.0.0
        * */
		protected static $instance;

		public function __construct()
		{
			//Load plugin assets
			add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
			//Load plugin admin assets
			add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
			//load plugin text domain
			add_action('init', array($this, 'load_textdomain'));
			//add custom icon to codester framework
			add_filter('csf_field_icon_add_icons', array($this, 'csf_custom_icon'));
			//load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
		}

		/**
		 * getInstance()
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 * */
		public function load_textdomain()
		{
			load_plugin_textdomain('edus-master', false, EDUS_MASTER_ROOT_PATH . '/languages');
		}

		/**
		 * load plugin dependency files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files()
		{
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => EDUS_MASTER_LIB . '/codestar-framework'
				),
                array(
                    'file-name' => 'class-admin-request',
                    'folder-name' => EDUS_MASTER_ADMIN
                ),
				array(
					'file-name' => 'class-menu-page',
					'folder-name' => EDUS_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-edus-master-excerpt',
					'folder-name' => EDUS_MASTER_INC
				),
				array(
					'file-name' => 'csf-taxonomy',
					'folder-name' => EDUS_MASTER_INC
				),
				array(
					'file-name' => 'class-edus-master-shortcodes',
					'folder-name' => EDUS_MASTER_INC
				),
				array(
					'file-name' => 'class-elementor-widget-init',
					'folder-name' => EDUS_MASTER_ELEMENTOR
				),
				array(
					'file-name' => 'class-tutor-widget-init',
					'folder-name' => EDUS_MASTER_TUTOR
				),
                array(
                    'file-name' => 'class-social-share-widget',
                    'folder-name' => EDUS_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-about-me-widget',
                    'folder-name' => EDUS_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-about-us-widget',
                    'folder-name' => EDUS_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-widget-nav-menu',
                    'folder-name' => EDUS_MASTER_WP_WIDGETS
                ),
				array(
					'file-name' => 'class-recent-post-widget',
					'folder-name' => EDUS_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-contact-info-widget',
					'folder-name' => EDUS_MASTER_WP_WIDGETS
				),
                array(
                    'file-name' => 'class-service-category-widget',
                    'folder-name' => EDUS_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-post-category-widget',
                    'folder-name' => EDUS_MASTER_WP_WIDGETS
                ),
				array(
					'file-name' => 'class-demo-data-import',
					'folder-name' => EDUS_MASTER_DEMO_IMPORT
				),
			);

            if (defined('ELEMENTOR_VERSION')) {
                $includes_files[] = array(
                    'file-name' => 'edus-elementor-icon-manager',
                    'folder-name' => EDUS_MASTER_INC
                );
            }
			if (is_array($includes_files) && !empty($includes_files)) {
				foreach ($includes_files as $file) {
					if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
						require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
					}
				}
			}
		}

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function plugin_assets()
		{
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

		/**
		 * load plugin css files()
		 * @since 1.0.0
		 * */
		public function load_plugin_css_files()
		{
			$plugin_version = EDUS_MASTER_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'flaticon',
					'src' => EDUS_MASTER_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'owl-carousel',
					'src' => EDUS_MASTER_CSS . '/owl.carousel.min.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
                array(
                    'handle' => 'slick',
                    'src' => EDUS_MASTER_CSS . '/slick.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
					'handle' => 'nice-select',
					'src' => EDUS_MASTER_CSS . '/nice-select.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'fontawesome',
					'src' => EDUS_MASTER_CSS . '/font-awesome.min.css',
					'deps' => array(),
					'ver' => '5.12.0',
					'media' => 'all'
				),
				array(
					'handle' => 'edus-master-main-style',
					'src' => EDUS_MASTER_CSS . '/main-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);

			if (!edus_master()->is_edus_active()) {
				$all_css_files[] = array(
					'handle' => 'animate',
					'src' => EDUS_MASTER_CSS . '/animate.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'bootstrap',
					'src' => EDUS_MASTER_CSS . '/bootstrap.min.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'magnific-popup',
					'src' => EDUS_MASTER_CSS . '/magnific-popup.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'edus-main-style',
					'src' => EDUS_MASTER_CSS . '/theme-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'edus-responsive',
					'src' => EDUS_MASTER_CSS . '/theme-responsive.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
			}

			$all_css_files = apply_filters('edus_master_css', $all_css_files);

			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * load plugin js
		 * @since 1.0.0
		 * */
		public function load_plugin_js_files()
		{
			$plugin_version = EDUS_MASTER_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'waypoints',
					'src' => EDUS_MASTER_JS . '/waypoints.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
				array(
					'handle' => 'counterup',
					'src' => EDUS_MASTER_JS . '/jquery.counterup.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'countdown',
                    'src' => EDUS_MASTER_JS . '/jquery.countdown.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'rProgressbar',
                    'src' => EDUS_MASTER_JS . '/jQuery.rProgressbar.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'owl-carousel',
					'src' => EDUS_MASTER_JS . '/owl.carousel.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'slick',
                    'src' => EDUS_MASTER_JS . '/slick.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'jquery.nice-select',
					'src' => EDUS_MASTER_JS . '/jquery.nice-select.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
				array(
					'handle' => 'edus-master-main-script',
					'src' => EDUS_MASTER_JS . '/main.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			if (!edus_master()->is_edus_active()) {
				$all_js_files[] = array(
					'handle' => 'popper',
					'src' => EDUS_MASTER_JS . '/popper.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'bootstrap',
					'src' => EDUS_MASTER_JS . '/bootstrap.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'magnific-popup',
					'src' => EDUS_MASTER_JS . '/jquery.magnific-popup.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
			}

			$all_js_files = apply_filters('edus_master_frontend_script_enqueue', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function admin_assets()
		{
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * load plugin admin css files()
		 * @since 1.0.0
		 * */
		public function load_admin_css_files()
		{
			$plugin_version = EDUS_MASTER_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'edus-master-admin-style',
					'src' => EDUS_MASTER_ADMIN_ASSETS . '/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'flaticon',
					'src' => EDUS_MASTER_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
			);

			$all_css_files = apply_filters('edus_admin_css', $all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * load plugin admin js
		 * @since 1.0.0
		 * */
		public function load_admin_js_files()
		{
			$plugin_version = EDUS_MASTER_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'edus-master-widget',
					'src' => EDUS_MASTER_ADMIN_ASSETS . '/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			$all_js_files = apply_filters('edus_admin_js', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * Add Custom Icon To Codester Framework
		 * @since 1.0.0
		 *
		 * */
		public function csf_custom_icon($icons)
		{
			//adding new icon
			$icons[]  = array(
				'title' => esc_html__('Flaticon', 'edus-master'),
				'icons' => array(
                    "flaticon-001-book",
                    "flaticon-002-whiteboard",
                    "flaticon-003-pillar",
                    "flaticon-004-flasks",
                    "flaticon-005-dna",
                    "flaticon-006-globe",
                    "flaticon-007-atom",
                    "flaticon-008-paint-palette",
                    "flaticon-009-ball",
                    "flaticon-010-saw",
                    "flaticon-011-chef-hat",
                    "flaticon-012-book",
                    "flaticon-013-briefcase",
                    "flaticon-014-magnifying-glass",
                    "flaticon-015-book",
                    "flaticon-016-ecommerce",
                    "flaticon-017-camera",
                    "flaticon-018-graphic-design",
                    "flaticon-019-video-camera",
                    "flaticon-020-drama",
                    "flaticon-021-syringe",
                    "flaticon-022-news",
                    "flaticon-023-book",
                    "flaticon-024-guitar",
                    "flaticon-025-helmet",
                    "flaticon-026-paw",
                    "flaticon-027-computer",
                    "flaticon-028-helmet",
                    "flaticon-029-laptop",
                    "flaticon-030-tools",
                    "flaticon-031-swimming-pool",
                    "flaticon-032-social-science",
                    "flaticon-033-book",
                    "flaticon-034-computer",
                    "flaticon-035-tractor",
                    "flaticon-036-blueprint",
                    "flaticon-037-law",
                    "flaticon-038-economics",
                    "flaticon-039-plant",
                    "flaticon-040-document",
                    "flaticon-041-document",
                    "flaticon-042-tooth",
                    "flaticon-043-settings",
                    "flaticon-044-plumbing",
                    "flaticon-045-sewing",
                    "flaticon-046-flask",
                    "flaticon-047-civil-engineering",
                    "flaticon-048-world",
                    "flaticon-049-bricks",
                    "flaticon-050-political-science",
                    "flaticon-051-megaphone",
                    "flaticon-052-criminology",
                    "flaticon-053-journalism",
                    "flaticon-054-electrical-engineer",
                    "flaticon-055-whiteboard",
                    "flaticon-056-scissors",
                    "flaticon-057-engineer",
                    "flaticon-058-flask",
                    "flaticon-059-car",
                    "flaticon-060-mannequin",
                    "flaticon-061-financial",
                    "flaticon-062-rocket",
                    "flaticon-063-astronomy",
                    "flaticon-064-settings",
                    "flaticon-065-warehouse",
                    "flaticon-066-beauty-treatment",
                    "flaticon-067-interior-design",
                    "flaticon-068-ball",
                    "flaticon-069-fabric",
                    "flaticon-070-settings",
                    "flaticon-071-biology",
                    "flaticon-072-bottle",
                    "flaticon-073-mental-health",
                    "flaticon-074-science",
                    "flaticon-075-building",
                    "flaticon-076-apple",
                    "flaticon-077-hat",
                    "flaticon-078-flask",
                    "flaticon-079-classical",
                    "flaticon-080-international-relations",
                    "flaticon-081-book",
                    "flaticon-082-artificial-intelligence",
                    "flaticon-083-baby",
                    "flaticon-084-building",
                    "flaticon-085-human-resources",
                    "flaticon-086-plane",
                    "flaticon-087-receptionist",
                    "flaticon-088-robotics",
                    "flaticon-089-philosophy",
                    "flaticon-090-entrepeneur",
                    "flaticon-091-ethics",
                    "flaticon-092-maths",
                    "flaticon-093-whiteboard",
                    "flaticon-094-zoology",
                    "flaticon-095-event-management",
                    "flaticon-096-microbiology",
                    "flaticon-097-nuclear-energy",
                    "flaticon-098-triangle",
                    "flaticon-099-anthropology",
                    "flaticon-100-game-development"
				)
			);

			$icons = array_reverse($icons);

			return $icons;
		}
	} //end class
	if (class_exists('Edus_Master_Init')) {
		Edus_Master_Init::getInstance();
	}
}
