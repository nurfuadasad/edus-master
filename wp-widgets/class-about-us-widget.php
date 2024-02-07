<?php
/**
 *  edus about us widget
 * @package Edus
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

class About_Us_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'edus_about_us_widget',
            esc_html__('Edus About Us', 'edus-master'),
            array('description' => esc_html__('Display About Us', 'edus-master'))
        );
    }

    public function form($instance)
    {
        $paragraph = isset($instance['paragraph']) ? $instance['paragraph'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('author_thumb')); ?>"></label>
            <input type="hidden" class="widefat edus_logo_id"
                   id="<?php echo esc_attr($this->get_field_id('author_thumb')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('author_thumb')) ?>"
                   value="<?php echo esc_attr($instance['author_thumb']); ?>"
            />
        <div class="edus-logo-preview"></div>
        <input type="button" class="edus_flogo_uploader" value="<?php esc_html_e('Upload Logo', 'edus-master'); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('paragraph')) ?>"><?php esc_html_e('Paragraph', 'edus-master'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('paragraph')) ?>" class="widefat"
                   id="<?php echo esc_attr($this->get_field_id('paragraph')) ?>"
                   value="<?php echo esc_attr($paragraph) ?>">
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        $paragraph = $instance['paragraph'] ? $instance['paragraph'] : '';
        $display_image = false;
        if ($instance['author_thumb']) {
            $display_image = 1;
            $image_src = wp_get_attachment_image_src($instance['author_thumb'], "full");
            $image_src_alt = get_post_meta($instance['author_thumb'], '_wp_attachment_image_alt', true);
        }
        echo wp_kses_post($args['before_widget']);
        ?>
        <div class="about_us_widget">
            <?php if ($display_image): ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
                    <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($image_src_alt); ?>">
                </a>
            <?php endif; ?>
            <p><?php echo esc_html($paragraph) ?></p>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    public function update($new_instance, $old_instance)
    {
        $instance['author_thumb'] = sanitize_text_field($new_instance['author_thumb']);
        $instance['paragraph'] = sanitize_text_field($new_instance['paragraph']);

        return $instance;
    }
}

if (!function_exists('About_Us_Widget')) {
    function About_Us_Widget()
    {
        register_widget('About_Us_Widget');
    }

    add_action('widgets_init', 'About_Us_Widget');
}