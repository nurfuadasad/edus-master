<?php
/**
 *  edus nav menu widget
 * @package Edus
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

class Edus_Widget_Nav_Menu extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'edus_nav_menu',
            esc_html__('Edus Nav Menu', 'edus-master'),
            array('description' => esc_html__('Display Nav Menu', 'edus-master'))
        );
    }

    public function form($instance)
    {
        $icon_class = isset($instance['icon_class']) ? $instance['icon_class'] : '';
        $title = isset($instance['title']) ? $instance['title'] : '';
        $paragraph = isset($instance['paragraph']) ? $instance['paragraph'] : '';
        $menu = isset($instance['menu']) ? $instance['menu'] : '';
        $menu_option = edus_master()->get_nav_menu_list('id');

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('color_select')) ?>"><?php esc_html_e('Select Your Icon Style', 'edus-master'); ?></label>
            <select type="select" name="<?php echo esc_attr($this->get_field_name('color_select')) ?>" id="<?php echo esc_attr($this->get_field_id('color_select')) ?>">
                <option value="<?php echo esc_attr('style-01') ?>"><?php echo esc_html__('Style 01') ?></option>
                <option value="<?php echo esc_attr('style-02') ?>"><?php echo esc_html__('Style 02') ?></option>
                <option value="<?php echo esc_attr('style-03') ?>"><?php echo esc_html__('Style 03') ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon_class')) ?>"><?php esc_html_e('set your icon class name', 'edus-master'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('icon_class')) ?>" class="widefat"
                   id="<?php echo esc_attr($this->get_field_id('icon_class')) ?>"
                   value="<?php echo esc_attr($icon_class) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'edus-master'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   value="<?php echo esc_attr($title) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('paragraph')) ?>"><?php esc_html_e('Paragraph', 'edus-master'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('paragraph')) ?>" class="widefat"
                   id="<?php echo esc_attr($this->get_field_id('paragraph')) ?>"
                   value="<?php echo esc_attr($paragraph) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('menu')) ?>"><?php esc_html_e('Navigation Menu', 'edus-master'); ?></label>
            <select type="select" name="<?php echo esc_attr($this->get_field_name('menu')) ?>" class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('menu')) ?>" >
                <?php foreach ($menu_option as $menu_id => $menu_name) :
                    $selected = $menu == $menu_id ? 'selected' : '';
                    ?>
                    <option  value="<?php echo esc_attr($menu_id) ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr($menu_name) ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </p>

        <?php

    }

    public function widget($args, $instance)
    {
        $paragraph = $instance['paragraph'] ? $instance['paragraph'] : '';
        $icon_class = $instance['icon_class'] ? $instance['icon_class'] : '';
        $title = $instance['title'] ? $instance['title'] : '';
        $menu = $instance['menu'] ? $instance['menu'] : '';
        $color_select = $instance['color_select'] ? $instance['color_select'] : '';
        echo wp_kses_post($args['before_widget']);
        ?>
        <div class="footer-widget widget footer-menu-item">
            <div class="footer-title <?php echo $color_select ?>">
                <div class="icon">
                    <i class="<?php echo esc_html($icon_class) ?>"></i>
                </div>
                <div class="content">
                    <h4 class="title"><?php echo esc_html($title) ?></h4>
                    <p><?php echo esc_html($paragraph) ?></p>
                </div>
            </div>
            <?php
            if (!empty($menu)) {
                $menu_args = [
                    'container_class' => 'navbar-collapse',
                    'container_id' => 'edus_main_menu',
                    'menu_class' => 'navbar-nav',
                    'menu' => $menu
                ];
                wp_nav_menu($menu_args);
            }
            ?>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    public function update($new_instance, $old_instance)
    {
        $instance['icon_class'] = sanitize_text_field($new_instance['icon_class']);
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['paragraph'] = sanitize_text_field($new_instance['paragraph']);
        $instance['menu'] = sanitize_text_field($new_instance['menu']);
        $instance['color_select'] = sanitize_text_field($new_instance['color_select']);

        return $instance;
    }
}

if (!function_exists('Edus_Widget_Nav_Menu')) {
    function Edus_Widget_Nav_Menu()
    {
        register_widget('Edus_Widget_Nav_Menu');
    }

    add_action('widgets_init', 'Edus_Widget_Nav_Menu');
}