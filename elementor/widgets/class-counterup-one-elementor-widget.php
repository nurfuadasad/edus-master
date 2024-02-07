<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Counterup_One_Widget extends Widget_Base
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
        return 'edus-counterup-one-widget';
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
        return esc_html__('Counterup: 01', 'edus-master');
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
        return 'eicon-counter';
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
		    'title_shape',
		    [
			    'label'   => esc_html__( 'Title Shape', 'edus-master' ),
			    'type'    => Controls_Manager::SELECT,
			    'default' => '',
			    'options' => [
				    'shape' => esc_html__( 'With Shape', 'edus-master' ),
				    ''             => esc_html__( 'Without Shape', 'edus-master' ),
			    ],
		    ]
	    );

	    $this->add_control('title', [
            'label' => esc_html__('Title', 'edus-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Cool Mentors', 'edus-master'),
            'description' => esc_html__('enter title', 'edus-master')
        ]);
        $this->add_control('number', [
            'label' => esc_html__('Number', 'edus-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('150', 'edus-master'),
            'description' => esc_html__('enter counterup number', 'edus-master')
        ]);
        $this->add_control('sign', [
            'label' => esc_html__('sign', 'edus-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('+', 'edus-master'),
            'description' => esc_html__('enter counterup sign', 'edus-master')
        ]);

	    $this->add_responsive_control(
		    'text_align',
		    [
			    'label'     => esc_html__( 'Alignment', 'edus-master' ),
			    'type'      => Controls_Manager::CHOOSE,
			    'options'   => [
				    'left'   => [
					    'title' => esc_html__( 'Left', 'edus-master' ),
					    'icon'  => 'fa fa-align-left',
				    ],
				    'center' => [
					    'title' => esc_html__( 'Center', 'edus-master' ),
					    'icon'  => 'fa fa-align-center',
				    ],
				    'right'  => [
					    'title' => esc_html__( 'Right', 'edus-master' ),
					    'icon'  => 'fa fa-align-right',
				    ],
			    ],
			    'default'   => 'center',
			    'toggle'    => true,
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
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-counterup-01 .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('number_color', [
            'label' => esc_html__('Number Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-counterup-01 .content .count-wrap .count-num" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-counterup-01 .content .count-wrap " => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-counterup-01 .content .title" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-counterup-01 .content .title span" => "color: {{VALUE}}"
            ]
        ]);
	    $this->add_control('shape_color', [
		    'label' => esc_html__('Shape Color', 'edus-master'),
		    'type' => Controls_Manager::COLOR,
		    'selectors' => [
			    "{{WRAPPER}} .single-counterup-01.shape:before" => "border-bottom-color: {{VALUE}}"
		    ]
	    ]);
	    $this->add_control('sing_color', [
		    'label' => esc_html__('Sign Color', 'edus-master'),
		    'type' => Controls_Manager::COLOR,
		    'selectors' => [
			    "{{WRAPPER}} .single-counterup-01 .content .count-wrap .sing-plus" => "color: {{VALUE}}"
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
                'name' => 'number_typography',
                'label' => esc_html__('Number Typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .single-counterup-01 .count-wrap .count-num',
            ]
        );
	    $this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
			    'name' => 'sign_typography',
			    'label' => esc_html__('Sing Typography', 'edus-master'),
			    'selector' => '{{WRAPPER}} .single-counterup-01 .count-wrap .sing-plus',
		    ]
	    );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .single-counterup-01 .title',
                 '{{WRAPPER}} .single-counterup-01 .title span',
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

        $title = $settings['title'];
        $number = $settings['number'];
        $this->add_render_attribute('counterup_wrapper', 'class', 'single-counterup-01');
        $this->add_render_attribute('counterup_wrapper', 'class', $settings['title_shape']);
        $this->add_render_attribute('counterup_wrapper', 'style', 'text-align:'.$settings['text_align']);

        ?>
        <div <?php echo $this->get_render_attribute_string('counterup_wrapper'); ?>>
            <div class="content">
                <div class="count-wrap"><span
                            class="count-num"><?php echo esc_html($number); ?></span><span class="sing-plus"><?php echo esc_html($settings['sign']) ?></span>
                </div>
                <h4 class="title"><?php echo esc_html($title); ?></h4>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Counterup_One_Widget());