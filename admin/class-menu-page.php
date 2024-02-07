<?php

/*
 * @package Edus
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Edus_Master_Admin_Menu') ){

	class Edus_Master_Admin_Menu{
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
			//add admin menu page
			add_action('admin_menu',array($this,'theme_admin_menu_page'));
            //    set_tab_menu
            add_action('admin_notices',array($this,'set_tab_menus'));
            //admin menu activation
            add_action('admin_footer',array($this,'admin_menu_activation'));
            //admin notice
            if (get_option('edus_license_status') == 'not_verified' || empty(get_option('edus_license_status'))){
                add_action( 'admin_notices', array($this,'license_notice') );
            }
		}


		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Theme admin menu page
		 * @since 1.0.0
		 * */
		public function theme_admin_menu_page(){
			//check user capability
			if (!current_user_can('edit_posts',get_current_user_id())){
				return;
			}
			//add menu page
			add_menu_page(
				esc_html__('Edus Page','edus-master'),
				esc_html__('Edus','edus-master'),
				'manage_options',
				'edus_theme_options',
				array($this,'admin_options_fallback_function'),
				EDUS_MASTER_ADMIN_ASSETS .'/img/icon.png',
				80
			);
            //add sub menu page
            add_submenu_page('edus_theme_options',esc_html__('License','edus-master'),esc_html__('License','edus-master'),'manage_options','theme-license',array($this,'theme_licence'),99);
		}
		public function admin_options_fallback_function (){
			//admin menu page
		}

        public function theme_licence(){
            if (file_exists(EDUS_MASTER_ADMIN.'/partials/license-page.php')){
                require_once EDUS_MASTER_ADMIN.'/partials/license-page.php';
            }
        }
        /**
         * Set tab menu
         * @since 1.0.0
         * */
        public function set_tab_menus(){
            $tab_menus =  array(
                'course' => array(
                    array(
                        'link' => 'edit.php?post_type=course',
                        'name' => sprintf(esc_html__('%s','edus-master'),'Course'),
                        'id' => 'edit-course'
                    ),
                    array(
                        'link' => 'edit-tags.php?taxonomy=course-cat&post_type=course',
                        'name' => sprintf(esc_html__('%s Categories','edus-master'),'Course'),
                        'id'=> 'edit-course-cat'
                    )
                ),
                'event' => array(
                    array(
                        'link' => 'edit.php?post_type=event',
                        'name' => sprintf(esc_html__('%s','edus-master'),'Event'),
                        'id' => 'edit-event'
                    ),
                    array(
                        'link' => 'edit-tags.php?taxonomy=event-cat&post_type=event',
                        'name' => sprintf(esc_html__('%s Categories','edus-master'),'Event'),
                        'id'=> 'edit-event-cat'
                    )
                ),
                'mentor' => array(
                    array(
                        'link' => 'edit.php?post_type=mentor',
                        'name' => sprintf(esc_html__('%s','edus-master'),'Mentor'),
                        'id' => 'edit-mentor'
                    ),
                    array(
                        'link' => 'edit-tags.php?taxonomy=mentor-cat&post_type=mentor',
                        'name' => sprintf(esc_html__('%s Categories','edus-master'),'Mentor'),
                        'id'=> 'edit-mentor-cat'
                    )
                )
            );
            if (is_array($tab_menus) && !empty($tab_menus)){
                foreach ($tab_menus as $post_type => $menu){
                    self::Tab_nav_render($post_type,$menu);
                }
            }
        }

        /**
         * License Notice
         * @since 2.0.0
         */
        public function license_notice(){
            $whitelist = array(
                '127.0.0.1',
                '::1',
            );
            $remote_addr = $_SERVER['REMOTE_ADDR'];
            preg_match('/ir-tech|xgenious/',$remote_addr,$match);
            if(!in_array($remote_addr, $whitelist) || !empty($match)){
                return;
            }
            ?>
            <div class="notice notice-warning is-dismissible">
                <p><?php esc_html_e( 'License Your Theme From "Edus > License" To Import Demo Data', 'edus-master' ); ?></p>
            </div>
            <?php
        }
        /**
         * nav tab render
         * @since 1.0.0
         * */
        public static function Tab_nav_render($post_type,$tab_menu_arr){
            $current_screen = get_current_screen();
            if ( !empty($tab_menu_arr) && is_admin() && $current_screen->post_type == $post_type ){
                print '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
                foreach ( $tab_menu_arr as $admin_tab ){
                    $admin_id = str_replace('edit-','',$admin_tab['id']);
                    $class = ( $admin_id == $current_screen->id || $admin_tab['id'] == $current_screen->id ) ? 'nav-tab nav-tab-active' : 'nav-tab';
                    print '<a href="'.esc_url(admin_url($admin_tab['link'])).'" class="'.esc_attr($class).' nav-tab-'.esc_attr($admin_tab['id']).'">'.esc_html($admin_tab['name']).'</a>';
                }
                print '</h2>';
            }
        }
        /**
         * menu activation scripts
         * @since 1.0.0
         * */
        public function admin_menu_activation(){
            if ( !is_admin() ){
                return;
            }
            $current_post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
            $pages_type = ['course'];
            $pages_type = json_encode($pages_type);
            ?>
            <script type="text/javascript">
                (function ($) {
                    'use strict';
                    var check,page_slugs,mainwrap,i;
                    check = '<?php echo $current_post_type ;?>';
                    page_slugs = <?php echo $pages_type; ?>;
                    mainwrap = $('#toplevel_page_edus_theme_options');
                    for ( i =0; i < page_slugs.length; i++ ){
                        if ( page_slugs[i] == check ){
                            //remove submenu class
                            mainwrap
                                .find('wp-submenu.wp-submenu-wrap')
                                .find('li.current')
                                .siblings()
                                .removeClass('current')
                                .find('a')
                                .removeClass('current');
                            var link_slug =  'a[href*="post_type=<?php echo $current_post_type; ?>"]' ;
                            //add submenu class
                            mainwrap
                                .addClass('wp-has-current-submenu wp-menu-open')
                                .removeClass('wp-not-current-submenu')
                                .children('a')
                                .addClass('wp-has-current-submenu wp-menu-open')
                                .removeClass('wp-not-current-submenu')
                                .end()
                                .find('.wp-submenu.wp-submenu-wrap')
                                .find(link_slug)
                                .addClass('current')
                                .parent('li')
                                .addClass('current');
                            break;
                        }
                    }
                    if( mainwrap.find('.wp-submenu.wp-submenu-wrap').find('li').is('.current') ){
                        mainwrap
                            .addClass('wp-has-current-submenu wp-menu-open')
                            .removeClass('wp-not-current-submenu');
                    }
                    if(check){
                        $('.wp-submenu.wp-submenu-wrap')
                            .find('a[href*="admin.php?page=toplevel_page_edus_theme_options"]')
                            .removeClass('current')
                            .parent('li')
                            .removeClass('current');
                    }
                })(jQuery);
            </script>
            <?php
        }


	}//end class
	if ( class_exists('Edus_Master_Admin_Menu') ){
		Edus_Master_Admin_Menu::getInstance();
	}

}//end if
