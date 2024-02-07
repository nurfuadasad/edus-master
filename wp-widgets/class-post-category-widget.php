<?php
/**
 * Edus post category widget
 * @package Edus
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

class Edus_Post_Category_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'edus_post_category',
            esc_html__('Edus: Post Category', 'edus-master'),
            array('description' => esc_html__('Display Post categories', 'edus-master'))
        );
    }

    public function widget($args, $instance)
    {

        $allowed_html = Edus()->kses_allowed_html('all');
        $title = isset($instance['title']) && !empty($instance['title']) ? $instance['title'] : '';
        $number = $instance['number'] ?? '';
        $order  = $instance['order'] ?? 'ASC';
        $orderby = $instance['orderby'] ?? 'ID';
        echo wp_kses($args['before_widget'], $allowed_html);
        if (!empty($title)) {
            echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
        }

        //WP_Query argument
        $all_terms = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
            'orderby' => $orderby,
            'order' => $order,
            'number' => $number,
        ));

        //have to write code for displing query data
        if (!empty($all_terms)):?>
            <ul>
            <?php
            $all_cat_related_to_post = [];
            $all_cat = wp_get_post_terms(get_the_ID(), 'category');
            foreach ($all_cat as $cat) {
                array_push($all_cat_related_to_post, $cat->term_id);
            }
            ?>
            <?php foreach ($all_terms as $term):
                $acive_class = in_array($term->term_id, $all_cat_related_to_post) ? 'class="category-widget-item active"' : 'class="category-widget-item"';

                printf('<li><a  %3$s href="%1$s"><h4 class="title"> %2$s<span class="count">%4$s</span></h4></a></li>',
                    get_term_link($term->term_id),
                    $term->name,
                    $acive_class,
                    $term->count
                );
            endforeach;
        else:
            esc_html__(' Oops, there are no category.', 'edus-master')
            ?>
        <?php endif; ?>
        </ul>
        <?php
        echo wp_kses($args['after_widget'], $allowed_html);
    }

    public function form($instance)
    {

        //have to create form instance
        if (!empty($instance) && $instance['title']) {
            $title = apply_filters('widget_title', $instance['title']);
        } else {
            $title = esc_html__('Categories', 'edus-master');
        }
        $order =  $instance['order'] ?? 'ASC';
        $number = $instance['number'] ?? '';
        $orderby =$instance['orderby'] ?? 'ID';
        $order_arr = array(
            'ASC' => esc_html__('Acceding', 'edus-master'),
            'DESC' => esc_html__('Descending', 'edus-master')
        );
        $orderby_arr = array(
            'ID' => esc_html__('ID', 'edus-master'),
            'title' => esc_html__('Title', 'edus-master'),
            'date' => esc_html__('Date', 'edus-master'),
            'rand' => esc_html__('Random', 'edus-master')
        );

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'edus-master'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order')) ?>"><?php esc_html_e('Order', 'edus-master'); ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('order')) ?>" class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('order')) ?>">
                <?php
                foreach ($order_arr as $key => $value) {
                    $checked = ($key == $order) ? 'selected' : '';
                    printf('<option value="%1$s" %3$s >%2$s</option>', $key, $value, $checked);
                }
                ?>
            </select>

        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('orderby')) ?>"><?php esc_html_e('OrderBy', 'edus-master'); ?></label>
            <select name="<?php echo esc_attr($this->get_field_name('orderby')) ?>" class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('orderby')) ?>">
                <?php
                foreach ($orderby_arr as $key => $value) {
                    $checked = ($key == $orderby) ? 'selected' : '';
                    printf('<option value="%1$s" %3$s >%2$s</option>', $key, $value, $checked);
                }
                ?>
            </select>

        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')) ?>"><?php esc_html_e('Number', 'edus-master'); ?></label>
            <input type="number" name="<?php echo esc_attr($this->get_field_name('number')) ?>" class="widefat"
                   id="<?php echo esc_attr($this->get_field_id('number')) ?>" value="<?php echo esc_attr($number) ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title']       = (!empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '');
        $instance['number'] = (!empty($new_instance['number']) ? sanitize_text_field($new_instance['number']) : '');
        $instance['order'] = (!empty($new_instance['order']) ? sanitize_text_field($new_instance['order']) : '');
        $instance['orderby'] = (!empty($new_instance['orderby']) ? sanitize_text_field($new_instance['orderby']) : '');

        return $instance;
    }

} // end class

if (!function_exists('Edus_Post_Category_Widget')) {
    function Edus_Post_Category_Widget()
    {
        register_widget('Edus_Post_Category_Widget');
    }

    add_action('widgets_init', 'Edus_Post_Category_Widget');
}