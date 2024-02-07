<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Shape_Div_One extends Widget_Base
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
        return 'edus-shape-dib-widget';
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
        return esc_html__('Shape Div', 'edus-master');
    }

    public function get_keywords()
    {
        return ['Animation', 'Circle', 'Effect', "Ir Tech", 'Edus'];
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
        return 'eicon-circle-o';
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

        $this->add_control( 'shape_bg_color', [
            'label'     => esc_html__( 'Shape Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .shape' => "border-top-color:{{VALUE}}"
            ]
        ] );
	    $this->add_control( 'shape_bg_transparent_color', [
		    'label'     => esc_html__( 'Shape Transparent Color', 'edus-master' ),
		    'type'      => Controls_Manager::COLOR,
		    'selectors' => [
			    '{{WRAPPER}} .shape' => "border-right-color:{{VALUE}}"
		    ]
	    ] );
        $this->add_control(
            'shape-radius',
            [
                'label' => esc_html__( 'Shape Radius', 'edus-master' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'shape_border',
                'label' => esc_html__( 'Shape Border', 'edus-master' ),
                'selector' => '{{WRAPPER}} .shape',
            ]
        );
        $this->add_control(
            'shape_height',
            [
                'label' => esc_html__('Shape Height', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'px' => 'px',
                    'size' => 140,
                ],
                'selectors' => [
                    '{{WRAPPER}} .shape' => 'border-right-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'shape_width',
            [
                'label' => esc_html__('Shape Width', 'edus-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'px' => 'px',
                    'size' => 140,
                ],
                'selectors' => [
                    '{{WRAPPER}}  .shape' => 'border-top-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'alignment',
            [
                'label' => esc_html__('Alignment', 'edus-master'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'edus-master'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'edus-master'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'edus-master'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    "{{WRAPPER}} .shape" => "text-align: {{VALUE}}"
                ]
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
        ?>
        <div class="shape"></div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Shape_Div_One());