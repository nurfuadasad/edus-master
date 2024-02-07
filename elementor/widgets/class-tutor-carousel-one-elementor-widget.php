<?php
/**
 * Elementor Widget
 * @package edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Tutor_Member_One_Widget extends Widget_Base
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
        return 'edus-tutor-member-one-widget';
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
        return esc_html__('Tutor Slider: 01', 'edus-master');
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
        return 'eicon-person';
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
            'slider_settings_section',
            [
                'label' => esc_html__('Slider Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('Items', 'edus-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('you can set how many item show in slider', 'edus-master'),
                'default' => '1'
            ]
        );
        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'edus-master'),
                'description' => esc_html__('you can set margin for slider', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'autoplay' => 'yes'
                )
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'edus-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'edus-master'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'edus-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'edus-master'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'autoplaytimeout',
            [
                'label' => esc_html__('Autoplay Timeout', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 2,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5000,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'autoplay' => 'yes'
                )
            ]

        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('name_color', [
            'label' => esc_html__('Name Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .content-wrap .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('designation_color', [
            'label' => esc_html__('Designation Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .content-wrap span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('description_bottom_color', [
            'label' => esc_html__('Description Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .content-wrap p" => "border-bottom-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('team_social_icon_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);

        $this->start_controls_tabs(
            'team_social_icon_style_tabs'
        );

        $this->start_controls_tab(
            'team_social_icon_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'edus-master'),
            ]
        );
        $this->add_control('social_icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .social-link li" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'team_social_icon_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'edus-master'),
            ]
        );
        $this->add_control('social_hover_icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .social-link li:hover" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control('team_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_html__('Name Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .team-single-item .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'designation_typography',
            'label' => esc_html__('Designation Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .team-single-item span"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .team-single-item p"
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
        $rand_numb = rand(333, 999999999);

        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
        ];
        $instructors = get_users(array('role__in' => array('tutor_instructor')));

        ?>
        <div class="team-member-carousel-wrapper">
            <div class="team-member-carousel"
                 id="team-member-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                foreach ($instructors as $instructor) :
                    $image_id = get_user_meta($instructor->ID, '_tutor_profile_photo', true);
                    $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'large')[0]: '';
                    $image_alt = !empty($image_id) ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
                    $profile_url = tutor_utils()->profile_url( $instructor->ID );
                    ?>
                    <div class="tm-outer-wrap">
                        <div class="team-single-item">
                            <div class="thumb">
                                <img src="<?php echo esc_url( $image_url); ?>" alt="<?php echo esc_url($image_alt) ?>">
                            </div>
                            <div class="content">
                                <h3 class="title">
                                    <a href="<?php echo $profile_url ?>"><?php echo $instructor->display_name; ?></a>
                                </h3>
                                <span><?php echo get_the_author_meta('_tutor_profile_job_title', $instructor->ID); ?></span>
                                <p><?php echo get_the_author_meta('description', $instructor->ID); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Tutor_Member_One_Widget);