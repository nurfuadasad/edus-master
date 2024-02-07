<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Navbar_Style_One_Widget extends Widget_Base
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
        return 'edus-navbar-style-01-widget';
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
        return esc_html__('Edus Navbar Style 01', 'edus-master');
    }

    public function get_keywords()
    {
        return ['Navbar', 'Menu', 'Navigation', "Ir Tech", 'Edus'];
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
        return 'eicon-nav-menu';
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
        return ['edus_builder_widgets'];
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
        $this->add_control('top_bar', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Topbar', 'edus-master'),
            'description' => esc_html__('make navbar topbar', 'edus-master'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $this->add_control(
            'responsive_topbar',
            [
                'label' => esc_html__('Responsive Topbar', 'edus-master'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Show Desktop Tablet and Mobile', 'edus-master'),
                    'hide_topbar' => esc_html__('Hide Tablet and Mobile', 'edus-master'),
                ],
            ]
        );
        $this->add_control('logo_responsive', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Logo Responsive', 'edus-master'),
            'description' => esc_html__('responsive logo switch', 'edus-master'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $this->add_control(
            'logo_position',
            [
                'label' => esc_html__('Logo Position', 'edus-master'),
                'type' => Controls_Manager::SELECT,
                'default' => 'topbar',
                'options' => [
                    'topbar' => esc_html__('Top bar', 'edus-master'),
                    'menubar' => esc_html__('Menubar', 'edus-master'),
                ],
            ]
        );
        $this->add_control(
            'nav_shape',
            [
                'label' => esc_html__('Navigation Shape', 'edus-master'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Normal Navigation', 'edus-master'),
                    'm-top' => esc_html__('Margin Top Navigation', 'edus-master'),
                ],
            ]
        );
        $this->add_control(
            'margin_top',
            [
                'label' => esc_html__('Navigation Shape', 'edus-master'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'for-triangle' => esc_html__('With Shape', 'edus-master'),
                    '' => esc_html__('Without Shape', 'edus-master'),
                ],
            ]
        );
        $this->add_control('logo', [
            'type' => Controls_Manager::MEDIA,
            'label' => esc_html__('Logo', 'edus-master'),
            'description' => esc_html__('Upload logo for navbar', 'edus-master'),
            'default' => [
                'src' => Utils::get_placeholder_image_src()
            ]
        ]);
        $this->add_control('menu', [
            'type' => Controls_Manager::SELECT,
            'label' => esc_html__('Menu', 'edus-master'),
            'options' => edus_master()->get_nav_menu_list(),
            'description' => esc_html__('select menu for navbar', 'edus-master')
        ]);
        $this->add_control('is_absolute', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Absolute', 'edus-master'),
            'description' => esc_html__('make navbar absolute', 'edus-master')
        ]);
        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'edus-master'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'edus-master'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'edus-master'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'edus-master'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .navbar-elementor-style-two-wrapper .navbar-area .nav-container .navbar-collapse .navbar-nav' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'search_section',
            [
                'label' => esc_html__('Search Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'placeholder_title',
            [
                'label' => esc_html__('Placeholder', 'edus-master'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Search Your keyword', 'edus-master'),
                'placeholder' => esc_html__('Search Your keyword', 'edus-master'),
            ]
        );

        $this->add_control(
            'search_icon', [
                'label' => esc_html__('Search Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-search',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_align',
            [
                'label' => esc_html__('Alignment', 'edus-master'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'edus-master'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'edus-master'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'edus-master'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .info-bar-inner .left-content-area .search-form' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'top_right_menu_section',
            [
                'label' => esc_html__('Top Right Menu Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('top_nav_switch', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Top Nav Menu', 'edus-master'),
            'description' => esc_html__('make navbar menu', 'edus-master'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $repeater = new Repeater();
        $repeater->add_control(
            'nav_top_right_icon', [
                'label' => esc_html__('Nav Right Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'edus-master'),
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'nav_top_right_link', [
                'label' => esc_html__('Nav URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'nav_title',
            [
                'label' => esc_html__('Nav Title', 'edus-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter  title.', 'edus-master'),
                'default' => esc_html__('Become A Mentor', 'edus-master')
            ]
        );
        $this->add_control('top_nav_list', [
            'label' => esc_html__('Nav Menu Items', 'edus-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'nav_title' => esc_html__('Become A Mentor', 'edus-master'),
                ]
            ]

        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'nav_right_section',
            [
                'label' => esc_html__('Nav Right Menu Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('nav_extra_switch', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Nav Right', 'edus-master'),
            'description' => esc_html__('make navbar right nav', 'edus-master'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $repeater = new Repeater();
        $repeater->add_control(
            'nav_right_menu_icon',
            [
                'label' => esc_html__('Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'edus-master'),
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'nav_right_link', [
                'label' => esc_html__('Nav URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'nav_right_title',
            [
                'label' => esc_html__('Nav Title', 'edus-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter  title.', 'edus-master'),
                'default' => esc_html__('Popular Courses', 'edus-master')
            ]
        );
        $this->add_control('right_nav_list', [
            'label' => esc_html__('Nav Right Menu Items', 'edus-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'nav_right_title' => esc_html__('Popular Courses', 'edus-master'),
                ]
            ]

        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('button_status', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Button One', 'edus-master'),
            'description' => esc_html__('show/hide button', 'edus-master')
        ]);
        $this->add_control('button_text', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Button One Text', 'edus-master'),
            'description' => esc_html__('set navbar button text', 'edus-master'),
            'default' => esc_html__('Login', 'edus-master'),
            'condition' => ['button_status' => 'yes']
        ]);
        $this->add_control('button_link', [
            'type' => Controls_Manager::URL,
            'label' => esc_html__('Button One Link', 'edus-master'),
            'description' => esc_html__('set navbar button link', 'edus-master'),
            'default' => [
                'url' => '#'
            ],
            'condition' => ['button_status' => 'yes']
        ]);
        $this->add_control('button_two_status', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Button Two', 'edus-master'),
            'description' => esc_html__('show/hide button', 'edus-master')
        ]);
        $this->add_control('button_two_text', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Button Two Text', 'edus-master'),
            'description' => esc_html__('set navbar button text', 'edus-master'),
            'default' => esc_html__('Signup', 'edus-master'),
            'condition' => ['button_two_status' => 'yes']
        ]);
        $this->add_control('button_two_link', [
            'type' => Controls_Manager::URL,
            'label' => esc_html__('Button Two Link', 'edus-master'),
            'description' => esc_html__('set navbar button link', 'edus-master'),
            'default' => [
                'url' => '#'
            ],
            'condition' => ['button_two_status' => 'yes']
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'offer_btn_section',
            [
                'label' => esc_html__('Offer Button Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('offer_btn_switch', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Offer Button', 'edus-master'),
            'description' => esc_html__('make navbar Offer Button', 'edus-master'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $this->add_control('offer_btn_title', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Offer Button Title', 'edus-master'),
            'description' => esc_html__('set navbar offer text', 'edus-master'),
            'default' => esc_html__('50% Offer', 'edus-master')
        ]);
        $this->add_control('offer_btn_paragraph', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Offer Button Paragraph', 'edus-master'),
            'description' => esc_html__('set navbar offer text', 'edus-master'),
            'default' => esc_html__('Start Free Trail', 'edus-master')
        ]);
        $this->add_control(
            'offer_btn_link', [
                'label' => esc_html__('Offer Button URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'social_icon_section',
            [
                'label' => esc_html__('Social Icon Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('social_switch', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Social Icon', 'edus-master'),
            'description' => esc_html__('make navbar social icon', 'edus-master'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $repeater = new Repeater();
        $repeater->add_control(
            'social_icon', [
                'label' => esc_html__('Social Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_link', [
                'label' => esc_html__('Social Icon URL', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'edus-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $this->add_control('social_icon_list', [
            'label' => esc_html__('Social Icon Items', 'edus-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),

        ]);
        $this->end_controls_section();


        $this->start_controls_section(
            'menu_styling_section',
            [
                'label' => esc_html__('Menu Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'menu_background_color',
            'label' => esc_html__('Menu Background Color', 'edus-master'),
            'description' => esc_html__('change menu background color', 'edus-master'),
            "selector" => "{{WRAPPER}} .navbar-area .nav-container"
        ]);
        $this->add_responsive_control(
            'menu_padding',
            [
                'label' => esc_html__('Padding', 'edus-master'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-elementor-style-two-wrapper .navbar-area.navbar-default' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'menu_items_gap',
            [
                'label' => esc_html__('Menu Item Gap', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li + li' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'button_between_gap',
            [
                'label' => esc_html__('Button Between Gap', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li+li' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'button_left_margin_gap',
            [
                'label' => esc_html__('Button Left Margin', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'navigation_margin_top',
            [
                'label' => esc_html__('Navigation Margin Top', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => -40,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-elementor-style-two-wrapper .m-top' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('menu_area_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('menu_color', [
            'label' => esc_html__('Menu Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('menu_active_color', [
            'label' => esc_html__('Menu Active Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu active color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.current-menu-item" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li:hover" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.current-menu-item a" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li:hover > a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('dropdown_color', [
            'label' => esc_html__('Dropdown Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children:before" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('dropdown_border_bottom_color', [
            'label' => esc_html__('Dropdown Border Bottom Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown border bottom color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu" => "border-bottom-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_item_border_bottom_color', [
            'label' => esc_html__('Dropdown Item Border Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown item border color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li + li" => "border-top-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_hover_background_color', [
            'label' => esc_html__('Dropdown Hover Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown hover background color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_hover_color', [
            'label' => esc_html__('Dropdown Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown hover color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('_menu_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'menu_typography',
            'label' => esc_html__('Menu Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li"
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'button_gd_two_section',
            [
                'label' => esc_html__('Button One Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'button_one_padding',
            [
                'label' => esc_html__('Padding', 'edus-master'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:first-child .boxed-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('button_two_background');

        $this->start_controls_tab('normal_two_style', [
            'label' => esc_html__('Normal', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'gd_two_background',
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn",
            'description' => esc_html__('button background', 'edus-master')
        ]);
        $this->add_control('gd_two_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'default' => '#fff',
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:first-child .boxed-btn" => "color: {{VALUE}}",
                "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_normal_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn",
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('hover_two_style', [
            'label' => esc_html__('Hover', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'edus_button_hover_background',
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'edus-master')
        ]);
        $this->add_control('gd_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'default' => '#fff',
            'selectors' => [
                "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_hover_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->add_control('button_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'edus-master'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:first-child .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'button_style_two_section',
            [
                'label' => esc_html__('Button Two Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'button_two_padding',
            [
                'label' => esc_html__('Padding', 'edus-master'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('button_two_styling_background');

        $this->start_controls_tab('button_normal_two_style', [
            'label' => esc_html__('Normal', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_two_background',
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn",
            'description' => esc_html__('button background', 'edus-master')
        ]);
        $this->add_control('button_two_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_two_normal_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('button_hover_two_style', [
            'label' => esc_html__('Hover', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'edus_button_two_hover_background',
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'edus-master')
        ]);
        $this->add_control('button_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'default' => '#fff',
            'selectors' => [
                "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_two_hover_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->add_control('button_two_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'button_two_border_radius',
            [
                'label' => esc_html__('Border Radius', 'edus-master'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button_style_two_typography_section',
            [
                'label' => esc_html__('Button Typography', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li .boxed-btn"
        ]);
        $this->end_controls_section();

        /* topbar search  styling */
        $this->start_controls_section(
            'top_search_styling_section',
            [
                'label' => esc_html__('Top bar Search Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'topbar_search_margin_left_gap',
            [
                'label' => esc_html__('Search Left Margin', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .search-form' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'topbar_search_margin_right_gap',
            [
                'label' => esc_html__('Search Right Margin', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .search-form' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('search_icon_top_color', [
            'label' => esc_html__('Search Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .search-form .search-form-page input" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('search_top_color', [
            'label' => esc_html__('Search Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .search-form .search-form-page .submit-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('search_top_bg_color', [
            'label' => esc_html__('Search Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .search-form .search-form-page input" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();

        //Topbar Menu
        $this->start_controls_section(
            'top_menu_styling_section',
            [
                'label' => esc_html__('Top bar Menu Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'topbar_menu_margin_left_gap',
            [
                'label' => esc_html__('Top Menu Right Margin', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .top-right-nav' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('top_menu_color', [
            'label' => esc_html__('Top Menu Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .top-right-nav li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('top_menu_icon_color', [
            'label' => esc_html__('Top Menu Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .top-right-nav li a i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('top_menu_hover_color', [
            'label' => esc_html__('Top Menu Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .top-right-nav li:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();


        //Topbar Menu
        $this->start_controls_section(
            'nav_right_menu_styling_section',
            [
                'label' => esc_html__('Nav bar Right Menu Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'nav_menu_margin_left_gap',
            [
                'label' => esc_html__('Nav Menu Item Right Margin', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('nav_right_menu_color', [
            'label' => esc_html__('Nav Right Menu Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('nav_right_menu_icon_color', [
            'label' => esc_html__('Nav Right Menu Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li a i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('nav_right_menu_hover_color', [
            'label' => esc_html__('Nav Right Menu Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li a:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        /* sticky navbar styling */
        $this->start_controls_section(
            'sticky_navbar_styling_section',
            [
                'label' => esc_html__('Sticky Navbar Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_menu_background_color',
            'label' => esc_html__('Menu Background Color', 'edus-master'),
            'description' => esc_html__('change menu background color', 'edus-master'),
            "selector" => "{{WRAPPER}} .navbar-elementor-style-two-wrapper .navbar-area.navbar-default.nav-fixed"
        ]);
        $this->add_control('nav_fixed_menu_color', [
            'label' => esc_html__('Menu Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('nav_fixed_menu_active_color', [
            'label' => esc_html__('Menu Active Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu active color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li.current-menu-item" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li:hover" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li.current-menu-item a" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li:hover > a" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();

        /* sticky navbar button one styling */
        $this->start_controls_section(
            'sticky_nav_button_style_one_section',
            [
                'label' => esc_html__('Sticky Nav Button One Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('nav_fixed_button_two_background');

        $this->start_controls_tab('nav_fixed_normal_two_style', [
            'label' => esc_html__('Normal', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_gd_two_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn",
            'description' => esc_html__('button background', 'edus-master')
        ]);
        $this->add_control('nav_fixed_gd_two_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_normal_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('nav_fixed_hover_two_style', [
            'label' => esc_html__('Hover', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_edus_button_hover_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'edus-master')
        ]);
        $this->add_control('nav_fixed_gd_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'default' => '#333',
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_hover_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /* sticky navbar button two styling */
        $this->start_controls_section(
            'sticky_nav_button_style_two_section',
            [
                'label' => esc_html__('Sticky Nav Button Two Styling', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('nav_fixed_button_two_styling_background');

        $this->start_controls_tab('nav_fixed_button_normal_two_style', [
            'label' => esc_html__('Normal', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_button_two_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn",
            'description' => esc_html__('button background', 'edus-master')
        ]);
        $this->add_control('nav_fixed_button_two_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_two_normal_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('nav_fixed_button_hover_two_style', [
            'label' => esc_html__('Hover', 'edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_edus_button_two_hover_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'edus-master')
        ]);
        $this->add_control('nav_fixed_button_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_two_hover_border',
            'label' => esc_html__('Border', 'edus-master'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

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
        $site_logo_id = $settings['logo']['id'];
        $site_logo_url = !empty($site_logo_id) ? wp_get_attachment_image_src($site_logo_id, 'full')[0] : '';
        $site_logo_alt = !empty($site_logo_id) ? get_post_meta($site_logo_id, '_wp_attachment_image_alt', true) : '';
        $social_icon_list = $settings['social_icon_list'];
        $top_nav_list = $settings['top_nav_list'];
        $right_nav_list = $settings['right_nav_list'];
        //button attribute
        $this->add_render_attribute('button_attr', 'class', 'boxed-btn blank');
        if (!empty($settings['button_link']['url'])) {
            $this->add_link_attributes('button_attr', $settings['button_link']);
        }
        $this->add_render_attribute('button_two_attr', 'class', 'boxed-btn');
        if (!empty($settings['button_two_link']['url'])) {
            $this->add_link_attributes('button_two_attr', $settings['button_two_link']);
        }

        //is_absolute
        $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar-area');
        $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar');
        $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar-expand-lg');
        if (!empty($settings['is_absolute'])) {
            $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar-absolute');
        }
        ?>
        <?php if ($settings['top_bar'] === 'yes') : ?>
        <div class="info-bar-inner <?php echo $settings['responsive_topbar'] ?>">
            <div class="left-content-area">
                <?php if ($settings['logo_position'] === 'topbar') : ?>
                    <div class="logo-wrapper">
                        <?php
                        printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', get_home_url(), $site_logo_url, $site_logo_alt);
                        ?>
                    </div>
                <?php endif; ?>
                <div class="search-form style-01 active">
                    <form action="<?php echo esc_url(home_url('/')) ?>" class="search-form-page">
                        <button class="submit-btn"><?php Icons_Manager::render_icon($settings['search_icon'], ['aria-hidden' => 'true']); ?></button>
                        <div class="form-group">
                            <input type="text" name="s" class="form-control"
                                   placeholder="<?php echo $settings['placeholder_title'] ?>">
                            <input type="hidden" name="post_type" value="">
                        </div>
                    </form>
                </div>
            </div>
            <div class="right-content-area">
                <?php if ($settings['top_nav_switch'] === 'yes') : ?>
                    <ul class="top-right-nav">
                        <?php
                        foreach ($top_nav_list as $item) : ?>
                            <li>
                                <a <?php echo edus_master()->render_elementor_link_attributes($item['nav_top_right_link']) ?>>
                                    <?php Icons_Manager::render_icon($item['nav_top_right_icon'], ['aria-hidden' => 'true']); ?>
                                    <?php echo $item['nav_title'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if (!empty($settings['button_status'])): ?>
                    <div class="btn-wrapper">
                        <a <?php echo $this->get_render_attribute_string('button_attr'); ?>><?php echo esc_html($settings['button_text']); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
        <div class="navbar-elementor-style-two-wrapper <?php echo $settings['margin_top'] ?>">
            <nav <?php echo $this->get_render_attribute_string('navbar_wrapper_class') ?>>
                <div class="container nav-container <?php echo $settings['nav_shape'] ?> ">
                    <div class="responsive-mobile-menu">
                        <?php if ($settings['logo_position'] === 'menubar') : ?>
                            <div class="logo-wrapper">
                                <?php
                                printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', get_home_url(), $site_logo_url, $site_logo_alt);
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['logo_responsive'])): ?>
                            <div class="logo-wrapper mobile-logo">
                                <?php
                                printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', get_home_url(), $site_logo_url, $site_logo_alt);
                                ?>
                            </div>
                        <?php endif; ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#edus_main_menu"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <?php
                    if (!empty($settings['menu'])) {
                        $menu_args = [
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'edus_main_menu',
                            'menu_class' => 'navbar-nav',
                            'menu' => $settings['menu']
                        ];
                        if (defined('EDUS_MASTER_SELF_PATH')) {
                            $menu_args['walker'] = new \Edus_Megamenu_Walker();
                        }
                        wp_nav_menu($menu_args);
                    }
                    ?>
                    <div class="nav-right-content">
                        <?php if ($settings['nav_extra_switch'] === 'yes') : ?>
                            <ul class="top-right-nav">
                                <?php
                                foreach ($right_nav_list as $item) : ?>
                                    <li>
                                        <a <?php echo edus_master()->render_elementor_link_attributes($item['nav_right_link']) ?>>
                                            <?php Icons_Manager::render_icon($item['nav_right_menu_icon'], ['aria-hidden' => 'true']); ?><?php echo $item['nav_right_title'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if ($settings['social_switch'] === 'yes') : ?>
                            <ul class="social-link">
                                <?php
                                foreach ($social_icon_list as $item) : ?>
                                    <li>
                                        <a <?php echo edus_master()->render_elementor_link_attributes($item['social_icon_link']) ?>>
                                            <?php Icons_Manager::render_icon($item['social_icon'], ['aria-hidden' => 'true']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if ($settings['offer_btn_switch'] === 'yes') : ?>
                            <div class="offer-btn">
                                <a <?php echo edus_master()->render_elementor_link_attributes($settings['offer_btn_link']) ?>>
                                    <h4 class="title"><?php echo $settings['offer_btn_title'] ?></h4>
                                    <span><?php echo $settings['offer_btn_paragraph'] ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Navbar_Style_One_Widget());