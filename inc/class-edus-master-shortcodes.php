<?php
/*
 * @package Edus
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}


if (!class_exists('Edus_Master_shortcodes')) {

    class Edus_Master_shortcodes
    {

        /*
        * $instance
        * @since 1.0.0
        * */
        private static $instance;

        /**
         * construct()
         * @since 1.0.0
         * */
        public function __construct()
        {
            //social post share
            add_shortcode('edus_post_share', array($this, 'post_share'));
            //social icon
            add_shortcode('edus_social_icon_wrap', array(__CLASS__, 'social_icon_wrap'));
            add_shortcode('edus_social_icon', array(__CLASS__, 'social_icons'));
            //top menu
            add_shortcode('edus_top_menu_wrap', array(__CLASS__, 'top_menu_wrap'));
            add_shortcode('edus_top_menu', array(__CLASS__, 'top_menu'));
            //top menu
            add_shortcode('edus_top_menu_wrap_02', array(__CLASS__, 'top_menu_wrap_02'));
            add_shortcode('edus_top_menu_02', array(__CLASS__, 'top_menu_02'));
            //info_item
            add_shortcode('edus_info_item_wrap', array(__CLASS__, 'info_item_wrap'));
            add_shortcode('edus_info_link', array(__CLASS__, 'info_link'));
            add_shortcode('edus_info_inline_text', array(__CLASS__, 'info_inline_text'));

        }


        /**
         * getInstance()
         * @since 1.0.0
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Shortcode :: dizzcox_post_share
         * @since 1.0.0
         * */
        public static function post_share($atts, $content = null)
        {

            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));

            global $post;
            $output = '';

            if (is_singular() || is_home()) {

                //get current page url
                $edus_url = urlencode_deep(get_permalink());
                //get current page title
                $edus_title = str_replace(' ', '%20', get_the_title($post->ID));
                //get post thumbnail for pinterest
                $edus_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $edus_thumbnail = !empty($edus_thumbnail) ? $edus_thumbnail[0] : '';

                //all social share link generate
                $facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $edus_url;
                $twitter_share_link = 'https://twitter.com/intent/tweet?text=' . $edus_title . '&amp;url=' . $edus_url . '&amp;via=' . get_bloginfo('url');
                $linkedin_share_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $edus_url . '&amp;title=' . $edus_title;
                $pinterest_share_link = 'https://pinterest.com/pin/create/button/?url=' . $edus_url . '&amp;media=' . $edus_thumbnail . '&amp;description=' . $edus_title;

                $output .= '<ul class="social-share">';
                $output .= '<li><a class="facebook" href="' . esc_url($facebook_share_link) . '"><i class="fab fa-facebook-f"></i></a></li>';
                $output .= '<li><a class="twitter" href="' . esc_url($twitter_share_link) . '"><i class="fab fa-twitter"></i></a></li>';
                $output .= '<li><a class="linkedin" href="' . esc_url($linkedin_share_link) . '"><i class="fab fa-linkedin"></i></a></li>';
                $output .= '<li><a class="pinterest" href="' . esc_url($pinterest_share_link) . '"><i class="fab fa-pinterest-p"></i></a></li>';
                $output .= '</ul>';

                return $output;
            }
        }

        /**
         * info item wrap
         * @sicne 1.0.0
         * */
        public static function info_item_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="info-items <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }

        /**
         * info item two wrap
         * @sicne 1.0.0
         * */
        public static function info_text_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="social-link <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }


        /**
         * Info Item link
         * @since 1.0.0
         * */
        public static function info_link($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'icon' => '',
                'text' => '',
                'url' => ''
            ), $atts));

            $icon = (!empty($icon)) ? ' <i class="' . esc_attr($icon) . '"></i> ' : '';
            ob_start();

            ?>
            <li>
                <a href="<?php echo esc_url($url) ?>"><?php echo wp_kses_post($icon); ?><?php echo esc_html($text); ?></a>
            </li>
            <?php
            return ob_get_clean();
        }

        /**
         * Info text with link
         * @sicne 1.0.0
         * */
        public static function info_inline_text($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'title' => '',
                'url' => ''
            ), $atts));

            ob_start();

            ?>
            <li><a href="<?php echo esc_url($url) ?>"><?php echo esc_html($text); ?></a></li>
            <?php
            return ob_get_clean();
        }

        /**
         * Info Item link
         * @since 1.0.0
         * */
        public static function info_text_item($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'icon' => '',
                'text' => '',
            ), $atts));

            $icon = (!empty($icon)) ? ' <i class="' . esc_attr($icon) . '"></i> ' : '';
            ob_start();

            ?>
            <li><?php echo wp_kses_post($icon); ?><?php echo esc_html($text); ?></li>
            <?php
            return ob_get_clean();
        }

        /**
         * social icon wrap
         * @since 1.0.0
         * */
        public static function social_icon_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="social-link <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }

        /**
         * social icon
         * @since 1.0.0
         * */
        public static function social_icons($atts, $contex = null)
        {
            extract(shortcode_atts(array(
                'social_icon' => '',
                'social_link' => '',
            ), $atts));

            $icon = (!empty($social_icon)) ? ' <i class="' . esc_attr($social_icon) . '"></i> ' : '';
            ob_start();

            ?>
            <li><a href="<?php echo esc_url($social_link); ?>"><?php echo wp_kses_post($icon); ?> </a></li>
            <?php
            return ob_get_clean();
        }

        /**
         * top menu wrap
         * @since 1.0.0
         * */
        public static function top_menu_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="info-items <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }

        /**
         * social icon
         * @since 1.0.0
         * */
        public static function top_menu($atts, $contex = null)
        {
            extract(shortcode_atts(array(
                'top_menu_text' => '',
                'top_menu_link' => '',
            ), $atts));
            ob_start();

            ?>
            <li><a href="<?php echo esc_url($top_menu_link); ?>"><?php echo esc_html($top_menu_text); ?></a></li>
            <?php
            return ob_get_clean();
        }

        /**
         * top menu wrap 02
         * @since 1.0.0
         * */
        public static function top_menu_wrap_02($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="info-items-02 <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }

        /**
         * Top menu item
         * @since 1.0.0
         * */
        public static function top_menu_02($atts, $contex = null)
        {
            extract(shortcode_atts(array(
                'top_menu_title_text' => '',
                'top_menu_text' => '',
                'top_menu_link' => '',
            ), $atts));
            ob_start();

            ?>
            <li>
                <h4 class="title"><?php echo esc_html($top_menu_title_text); ?></h4>
                <a href="<?php echo esc_url($top_menu_link); ?>">
                    <span class="number">
                        <?php echo esc_html($top_menu_text); ?>
                    </span>
                </a>
            </li>
            <?php
            return ob_get_clean();
        }

    }//end class

    if (class_exists('Edus_Master_shortcodes')) {
        Edus_Master_shortcodes::getInstance();
    }

}//end if
