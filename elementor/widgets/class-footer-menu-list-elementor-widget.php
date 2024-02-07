<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Footer_Menu_Widget extends Widget_Base
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
        return 'edus-footer-menu-widget';
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
        return esc_html__('Footer Menu', 'edus-master');
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
        return 'eicon-menu-bar';
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
            'footer_top_content',
            [
                'label'   => esc_html__( 'Footer Top Conten', 'edus-master' ),
                'type'        => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'you can set yes/no to enable/disable', 'edus-master' ),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'edus-master'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter title', 'edus-master'),
                'default' => esc_html__('Latest Courses', 'edus-master')
            ]
        );
        $this->add_control(
            'menu_icon',
            [
                'label' => esc_html__('Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-book',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control(
            'paragraph',
            [
                'label' => esc_html__('Paragraph', 'edus-master'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter paragraph', 'edus-master'),
                'default' => esc_html__('Gave read use way make spot', 'edus-master')
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'menu',
            [
                'label' => esc_html__('Menu', 'edus-master'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter menu', 'edus-master'),
                'default' => esc_html__('Academic English', 'edus-master')
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-chevron-right',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'edus-master'),
            ]
        );

        $this->add_control(
            'menu_list_items',
            [
                'label' => esc_html__('Menu List Items', 'edus-master'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('icon_color', [
            'label' => esc_html__('Title Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .footer-menu-item .footer-title .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .footer-menu-item .footer-title .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_color', [
            'label' => esc_html__('Paragraph Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .footer-menu-item .footer-title .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control(
            'icon_margin_left',
            [
                'label' => esc_html__('Icon Margin Right', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-menu-item  ul li i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'menu_margin_top',
            [
                'label' => esc_html__('Footer Margin Top', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-menu-item .footer-menu-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('menu_icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .footer-menu-item ul li i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('menu_list_color', [
            'label' => esc_html__('Menu Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .footer-menu-item ul li" => "color: {{VALUE}}"
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
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .footer-menu-item .footer-title .content .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'paragraph_typography',
                'label' => esc_html__('Paragraph Typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .footer-menu-item .footer-title .content p',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'label' => esc_html__('Menu Typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .footer-menu-item ul li',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $all_list_items = $settings['menu_list_items'];
        ?>

        <div class="footer-menu-item">
        <?php if ( ! empty( $settings['footer_top_content'] ) ) : ?>
            <div class="footer-title">
                <div class="icon">
                    <?php Icons_Manager::render_icon($settings['menu_icon'], ['aria-hidden' => 'true']); ?>
                </div>
                <div class="content">
                    <h4 class="title"><?php echo esc_html($settings['title']) ?></h4>
                    <p><?php echo esc_html($settings['paragraph']) ?></p>
                </div>
            </div>
        <?php endif; ?>
            <ul class="footer-menu-item">
                <?php
                foreach ($all_list_items as $item): ?>
                    <li>
                        <?php
                        Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']);
                        printf('<a href="%1$s">%2$s</a>', esc_url($item['link']['url']), esc_html($item['menu']));
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Footer_Menu_Widget());