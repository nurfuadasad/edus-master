<?php
/**
 * Elementor Widget
 * @package edus
 * @since 1.0.0
 */

namespace Elementor;
class edus_Tutor_Member_Two_Widget extends Widget_Base
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
        return 'edus-tutor-member-two-widget';
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
        return esc_html__('Tutor Item: 02', 'edus-master');
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
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'edus-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'edus-master'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $repeater->add_control(
            'name', [
                'label' => esc_html__('Name', 'edus-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter name', 'edus-master'),
                'default' => esc_html__('Mario Hedge', 'edus-master')
            ]
        );
        $repeater->add_control(
            'designation', [
                'label' => esc_html__('Designation', 'edus-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter designation', 'edus-master'),
                'default' => esc_html__('Board Of Directors', 'edus-master')
            ]
        );
        $repeater->add_control(
            'social_icon_01', [
                'label' => esc_html__('Social Icon One', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_01_link', [
                'label' => esc_html__('Social Icon One URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_02', [
                'label' => esc_html__('Social Icon Two', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_02_link', [
                'label' => esc_html__('Social Icon Two URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_03', [
                'label' => esc_html__('Social Icon Three', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_03_link', [
                'label' => esc_html__('Social Icon Three URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_04', [
                'label' => esc_html__('Social Icon Four', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_04_link', [
                'label' => esc_html__('Social Icon Four URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $this->add_control('team_member_items', [
            'label' => esc_html__('Team Member Items', 'edus-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'image' => array(
                        'url' => Utils::get_placeholder_image_src()
                    ),
                    'name' => esc_html__('Mario Hedge', 'edus-master'),
                    'designation' => esc_html__('Board Of Directors', 'edus-master'),
                    'description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore. ', 'edus-master')

                ]
            ],

        ]);

        $this->end_controls_section();

        $this->start_controls_section(
            'team_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'normal_background',
                'label' => esc_html__('Background', 'edus-master'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item-02 .content',
            ]
        );
        $this->add_control('name_color', [
            'label' => esc_html__('Name Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('designation_color', [
            'label' => esc_html__('Designation Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .content span" => "color: {{VALUE}}"
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
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_bg_icon_normal_background',
                'label' => esc_html__('Background', 'edus-master'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item-02 .social-link li',
            ]
        );
        $this->add_control('social_icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .social-link li" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'team_social_icon_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'edus-master'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_hover_background',
                'label' => esc_html__('Background', 'edus-master'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item-02 .social-link li:hover',
            ]
        );
        $this->add_control('social_hover_icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .social-link li:hover" => "color: {{VALUE}}"
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
            'selector' => "{{WRAPPER}} .team-single-item-02 .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'designation_typography',
            'label' => esc_html__('Designation Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .team-single-item-02 span"
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
        $all_team_member_items = $settings['team_member_items'];
        ?>
        <ul class="team-member-carousel-wrapper team-single-item-list">
            <?php
            foreach ($all_team_member_items as $item):
                $image_id = $item['image']['id'];
                $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                $image_alt = !empty($img_id) ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';
                ?>
                <li class="tm-outer-wrap">
                    <div class="team-single-item-02">
                        <div class="thumb">
                            <img src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_url($image_alt) ?>">
                        <ul class="social-link">
                            <?php
                            for ($i = 1; $i < 5; $i++) {
                                if (!empty($item['social_icon_0' . $i]) && !empty($item['social_icon_0' . $i . '_link'])) {
                                    ?>
                                    <li>
                                        <a <?php echo edus_master()->render_elementor_link_attributes($item['social_icon_0' . $i . '_link']) ?>>
                                            <?php Icons_Manager::render_icon($item['social_icon_0' . $i], ['aria-hidden' => 'true']); ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        </div>
                        <div class="content-wrap">
                            <div class="content">
                                <span><?php echo esc_html($item['designation']); ?></span>
                                <h4 class="title"><?php echo esc_html($item['name']); ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new edus_Tutor_Member_Two_Widget());