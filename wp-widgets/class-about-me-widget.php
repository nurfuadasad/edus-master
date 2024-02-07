<?php
/**
 *  edus about me  widget
 * @package Edus
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

class Edus_About_Me extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'edus_about_me',
            esc_html__('Edus About Me ', 'edus-master'),
            array('description' => esc_html__('Display About Me', 'edus-master'))
        );
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $paragraph = isset($instance['paragraph']) ? $instance['paragraph'] : '';
        $author_name = isset($instance['author_name']) ? $instance['author_name'] : '';
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
            <label for="<?php echo esc_attr($this->get_field_id('author_name')) ?>"><?php esc_html_e('Author Name:', 'edus-master'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('author_name')) ?>"
                   name="<?php echo esc_attr($this->get_field_name('author_name')) ?>"
                   value="<?php echo esc_attr($author_name) ?>"
            >
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('paragraph')) ?>"><?php esc_html_e('Paragraph', 'edus-master'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('paragraph')) ?>" class="widefat"
                   id="<?php echo esc_attr($this->get_field_id('paragraph')) ?>"
                   value="<?php echo esc_attr($paragraph) ?>">
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
        $author_name = $instance['author_name'] ?  $instance['author_name'] : '';
        $paragraph = $instance['paragraph'] ? $instance['paragraph'] : '';
        $display_image = false;
        if ($instance['author_thumb']) {
            $display_image = 1;
            $image_src = wp_get_attachment_image_src($instance['author_thumb'], "full");
            $image_src_alt = get_post_meta($instance['author_thumb'], '_wp_attachment_image_alt', true);
        }
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
        <div class="about_me_widget">
            <?php
            if (!empty($title)) {
                echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
            }
            ?>
            <div class="content">
                <?php if ($display_image): ?>
                    <div class="thumb">
                        <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($image_src_alt); ?>">
                    </div>
                <?php endif; ?>
                <h4 class="title"><?php echo esc_html($author_name) ?></h4>
                <p><?php echo esc_html($paragraph) ?></p>
                <?php
                if (!empty($instance['facebook']) || !empty($instance['twitter']) || !empty($instance['linkedin']) || !empty($instance['instagram']) || !empty($instance['google-plus']) || !empty($instance['youtube'])):
                    printf('<ul class="social-link style-02">');
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
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    public function update($new_instance, $old_instance)
    {
        $instance['author_thumb'] = sanitize_text_field($new_instance['author_thumb']);
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['author_name'] = sanitize_text_field($new_instance['author_name']);
        $instance['paragraph'] = sanitize_text_field($new_instance['paragraph']);
        $instance['facebook'] = esc_url_raw($new_instance['facebook']);
        $instance['twitter'] = esc_url_raw($new_instance['twitter']);
        $instance['linkedin'] = esc_url_raw($new_instance['linkedin']);
        $instance['instagram'] = esc_url_raw($new_instance['instagram']);
        $instance['google-plus'] = esc_url_raw($new_instance['google-plus']);
        $instance['youtube'] = esc_url_raw($new_instance['youtube']);

        return $instance;
    }
}

if (!function_exists('Edus_About_Me')) {
    function Edus_About_Me()
    {
        register_widget('Edus_About_Me');
    }

    add_action('widgets_init', 'Edus_About_Me');
}
