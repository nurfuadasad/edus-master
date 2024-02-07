<?php
/**
 *  edus Social Share widget
 * @package edus
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

class Social_Share_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'edus_social_share_widget',
            esc_html__('Edus Social Share', 'edus-master'),
            array('description' => esc_html__('Display Social Share', 'edus-master'))
        );
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $social_icons = array(
            'facebook',
            'twitter',
            'linkedin',
            "instagram",
            "google-plus",
            "youtube",
        );
        foreach ($social_icons as $sc) {
            if (!isset($instance[$sc])) {
                $instance[$sc] = "";
            }
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')) ?>"><?php esc_html_e('Title:', 'edus-master'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')) ?>"
                   value="<?php echo esc_attr($title) ?>"
            >
        </p>
        <?php foreach ($social_icons as $sci) : ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id($sci)); ?>"><?php echo esc_html(ucfirst($sci) . " " . esc_html__('URL', 'edus-master')); ?>
                : </label>
            <br/>

            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id($sci)); ?>"
                   name="<?php echo esc_attr($this->get_field_name($sci)); ?>"
                   value="<?php echo esc_attr($instance[$sci]); ?>"/>
            <small><?php echo esc_html__('Leave it blank if you don\'t want this social icon', 'edus-master') ?></small>
        </p>
    <?php
    endforeach;
    }

    public function widget($args, $instance)
    {
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
        $social_icons = array(
            'facebook',
            'twitter',
            'linkedin',
            "instagram",
            "google-plus",
            "youtube",
        );
        echo wp_kses_post($args['before_widget']);
        ?>
        <div class="social-share-widget">
            <?php
            if (!empty($title)) {
                echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
            }
            ?>
            <?php
            if (!empty($instance['facebook']) || !empty($instance['twitter']) || !empty($instance['linkedin']) || !empty($instance['instagram']) || !empty($instance['google-plus']) || !empty($instance['youtube'])):
                printf('<ul class="social-link style-03">');
                foreach ($social_icons as $social):
                    $url = trim($instance[$social]);
                    if (!empty($url)) {
                        printf('<li><a  href="%1$s"><i class="fa fa-%2$s" aria-hidden="true"></i></a></li>', esc_url($url), esc_attr($social));
                    }
                endforeach;
                echo wp_kses_post('</ul>');
            endif;
            ?>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
    }
    public function update($new_instance, $old_instance)
    {
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['facebook'] = esc_url_raw($new_instance['facebook']);
        $instance['twitter'] = esc_url_raw($new_instance['twitter']);
        $instance['linkedin'] = esc_url_raw($new_instance['linkedin']);
        $instance['instagram'] = esc_url_raw($new_instance['instagram']);
        $instance['google-plus'] = esc_url_raw($new_instance['google-plus']);
        $instance['youtube'] = esc_url_raw($new_instance['youtube']);

        return $instance;
    }
}
if (!function_exists('Social_Share_Widget')) {
    function Social_Share_Widget()
    {
        register_widget('Social_Share_Widget');
    }

    add_action('widgets_init', 'Social_Share_Widget');
}
