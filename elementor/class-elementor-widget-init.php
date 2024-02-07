<?php

/**
 * All Elementor widget init
 * @package Edus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly
}


if ( ! class_exists( 'Edus_Elementor_Widget_Init' ) ) {

	class Edus_Elementor_Widget_Init {
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;

		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array( $this, '_widget_categories' ) );
			//elementor widget registered
			add_action( 'elementor/widgets/widgets_registered', array( $this, '_widget_registered' ) );
			// elementor editor css
			add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'load_assets_for_elementor' ) );
			//add icon to elementor new icons fileds
			add_filter( 'elementor/icons_manager/native', array( $this, 'add_custom_icon_to_elementor_icons' ) );
		}

		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'edus_widgets',
				[
					'title' => esc_html__( 'Edus Widgets', 'edus-master' ),
					'icon'  => 'fas fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered() {
			if ( ! class_exists( 'Elementor\Widget_Base' ) ) {
				return;
			}
			$elementor_widgets = array(
				'accordion',
				'icon-box-list',
				'icon-box-one',
				'counterup-one',
				'counterup-two',
				'counterup-three',
				'brand-slider',
				'mission-single-item',
				'what-we-single-item',
				'portfolio-item-three',
				'single-skill-item',
				'blog-slider-one',
				'blog-slider-two',
				'testimonial-one',
				'testimonial-two',
				'we-single-item',
				'course-category-item',
				'empty-div',
				'navbar-style-one',
				'video-hover',
				'heading-title',
				'contact-info-list-one',
				'contact-info-list-two',
				'price-plan-one',
				'image-gallery',
				'core-single-item',
				'event-grid-one',
				'tutor-carousel-two',
				'shape-div',
				'edus-preloader',
				'back-top',
                'footer-menu-list'
			);

			if ( edus_master()->is_tutor_active() ) {
				$elementor_widgets = array_merge( array(
					'course-single-item',
					'course-single-item-two',
					'course-single-item-three',
					'find-course-form',
					'find-course-form-two',
					'tutor-carousel-one',
				), $elementor_widgets );
			}

			$elementor_widgets = apply_filters( 'edus_elementor_widget', $elementor_widgets );
			ksort( $elementor_widgets );
			if ( is_array( $elementor_widgets ) && ! empty( $elementor_widgets ) ) {
				foreach ( $elementor_widgets as $widget ) {
					if ( file_exists( EDUS_MASTER_ELEMENTOR . '/widgets/class-' . $widget . '-elementor-widget.php' ) ) {
						require_once EDUS_MASTER_ELEMENTOR . '/widgets/class-' . $widget . '-elementor-widget.php';
					}
				}
			}
		}

		public function add_custom_icon_to_elementor_icons( $icons ) {
			$icons['flaticon'] = [
				'name'          => 'flaticon',
				'label'         => esc_html__( 'Flaticon', 'edus-master' ),
				'url'           => EDUS_MASTER_CSS . '/flaticon.css',
				// icon css file
				'enqueue'       => [ EDUS_MASTER_CSS . '/flaticon.css' ],
				// icon css file
				'prefix'        => 'flaticon-',
				//prefix ( like fas-fa  )
				'displayPrefix' => '',
				//prefix to display icon
				'labelIcon'     => 'flaticon-001-book',
				//tab icon of elementor icons library
				'ver'           => '1.0.0',
				'fetchJson'     => EDUS_MASTER_JS . '/flaticon.js',
				//json file with icon list example {"icons: ['icon class']}
				'native'        => true,
			];

			return $icons;
		}

		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		 * */
		public function load_assets_for_elementor() {
			wp_enqueue_style( 'flaticon', EDUS_MASTER_CSS . '/flaticon.css' );
			wp_enqueue_style( 'edus-master-elementor-style', EDUS_MASTER_ADMIN_ASSETS . '/css/elementor-editor.css' );
		}
	}

	if ( class_exists( 'Edus_Elementor_Widget_Init' ) ) {
		Edus_Elementor_Widget_Init::getInstance();
	}
}//end if
