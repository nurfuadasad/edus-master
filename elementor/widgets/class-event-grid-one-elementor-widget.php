<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Event_Grid_One_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'edus-event-grid-one-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Event: Grid 01', 'edus-master');
    }

    public function get_keywords()
    {
        return ['ir-tech', 'edus', 'event', 'the event calendar', 'event post'];
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['edus_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'column',
            [
                'label' => esc_html__('Column', 'edus-master'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '3' => esc_html__('04 Column', 'edus-master'),
                    '4' => esc_html__('03 Column', 'edus-master'),
                    '2' => esc_html__('06 Column', 'edus-master')
                ),
                'description' => esc_html__('select grid column', 'edus-master'),
                'default' => '4'
            ]
        );
        $this->add_control(
            'time_format',
            [
                'label' => esc_html__('Need 24 Hour Time Formate?', 'events-addon-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'events-addon-for-elementor'),
                'label_off' => esc_html__('Hide', 'events-addon-for-elementor'),
                'return_value' => 'true',
            ]
        );
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'edus-master'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'edus-master'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => false,
            'options' => edus_master()->get_terms_names('tribe_events_cat'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'edus-master'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'edus-master'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'edus-master'),
                'DESC' => esc_html__('Descending', 'edus-master'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'edus-master')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'edus-master'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'edus-master'),
                'title' => esc_html__('Title', 'edus-master'),
                'date' => esc_html__('Date', 'edus-master'),
                'rand' => esc_html__('Random', 'edus-master'),
                'comment_count' => esc_html__('Most Comments', 'edus-master'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'edus-master')
        ]);
        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'edus-master'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                25 => esc_html__('Short', 'edus-master'),
                55 => esc_html__('Regular', 'edus-master'),
                100 => esc_html__('Long', 'edus-master'),
            ),
            'default' => 25,
            'description' => esc_html__('select excerpt length', 'edus-master')
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('time_color', [
            'label' => esc_html__('Time Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-event-item .post-mate .post-date" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-event-item .post-mate .post-month" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('content_background', [
            'label' => esc_html__('Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-event-item" => "background-color:{{VALUE}}",
            ]
        ]);
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'edus-master'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-event-item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control('time_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('location_color', [
            'label' => esc_html__('Location Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-event-item .content .author-mate span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('location_icon_color', [
            'label' => esc_html__('Location Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-event-item .content .author-mate span i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('location_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-event-item .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-event-item .content .title:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('description_color', [
            'label' => esc_html__('Description Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-event-item p" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'edus-master'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .single-event-item .content .author-mate .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Location Typography', 'edus-master'),
            'name' => 'location_typography',
            'description' => esc_html__('select location typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .single-event-item .content .author-mate p .tribe-address"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Description Typography', 'edus-master'),
            'name' => 'description_typography',
            'description' => esc_html__('select description typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .single-event-item p"
        ]);
        $this->end_controls_section();
    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        global $post;
        $all_events = tribe_get_events(array(
            'posts_per_page' => $total_posts,
            'tribe_events_cat' => $category,
            'orderby' => $orderby,
            'order' => $order,
        ));
        ?>
        <div class="event-grid-carousel-wrapper">
            <div class="row">
                <?php
                foreach ($all_events as $data):
                    $post_id = $data->ID;
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'edus_grid', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    $event_start_time = get_post_meta($post_id, '_EventStartDate', true);
                    $event_venue_id = get_post_meta($post_id, '_EventVenueID', true);


                    $time_format = !empty($settings['time_format']) ? $settings['time_format'] : '';

                    ?>
                    <div class="col-lg-<?php echo esc_attr($settings['column']); ?> col-md-6">
                        <div class="single-event-item margin-bottom-30">
                            <?php if (!empty($img_url)): ?>
                                <div class="thumb">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                    <div class="post-mate">
                                        <h2 class="post-date"><?php echo esc_html(date('d', strtotime($event_start_time))) ?></h2>
                                        <div class="post-month"><?php echo esc_html(date('M', strtotime($event_start_time))) ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="content">
                                <div class="author-mate">
                                    <?php if ($time_format) { ?>
                                        <span>  <i class="far fa-clock"></i><?php echo tribe_get_start_date(null, false, 'H:i'); ?> - <?php echo tribe_get_end_date(null, false, 'H:i'); ?></span>
                                    <?php } else { ?>
                                        <span><i class="far fa-clock"></i><?php echo tribe_get_start_date(null, false, 'h:i'); ?> - <?php echo tribe_get_end_date(null, false, 'h:i'); ?></span>
                                    <?php } ?>
                                    <?php if ($event_venue_id): ?>
                                        <span><i class="fas fa-map-marker-alt"></i> <?php echo tribe_get_full_address($post_id); ?>
                                </span>
                                    <?php endif; ?>
                                </div>
                                <h4 class="title"><a
                                            href="<?php the_permalink($post_id); ?>"><?php echo esc_html($data->post_title); ?></a>
                                </h4>
                                <p><?php echo edus_master()->tribe_event_excerpt($settings['excerpt_length'], $data->post_content); ?></p>
                                <div class="btn-wrapper padding-top-15">
                                    <a href="<?php the_permalink($post_id); ?>" class="boxed-btn blank">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                wp_reset_query();
                ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Event_Grid_One_Widget());