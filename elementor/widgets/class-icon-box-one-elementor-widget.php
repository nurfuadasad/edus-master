<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Icon_Box_One_Widget extends Widget_Base {

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
	public function get_name() {
		return 'edus-icon-box-item-widget';
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
	public function get_title() {
		return esc_html__( 'Icon Box: 01', 'edus-master' );
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
	public function get_icon() {
		return 'eicon-alert';
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
	public function get_categories() {
		return [ 'edus_widgets' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'General Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_status', [
				'label'       => esc_html__( 'Title Show/Hide', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'description' => esc_html__( 'show/hide title', 'edus-master' )
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'edus-master' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter title.', 'edus-master' ),
				'default'     => esc_html__( 'We are 24/7 icon-box', 'edus-master' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'edus-master' ),
				'type'        => Controls_Manager::URL,
				'description' => esc_html__( 'enter url.', 'edus-master' ),
				'default'     => [
					'url' => ''
				]
			]
		);
		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'edus-master' ),
				'type'        => Controls_Manager::ICONS,
				'description' => esc_html__( 'select Icon.', 'edus-master' ),
				'default'     => [
					'value'   => 'fas fa-phone-alt',
					'library' => 'solid',
				]
			]
		);
		$this->add_control(
			'description_status', [
				'label'       => esc_html__( 'Description Show/Hide', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
				'description' => esc_html__( 'show/hide description', 'edus-master' )
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'enter text.', 'edus-master' ),
				'default'     => esc_html__( '8-800-10-500', 'edus-master' )
			]
		);
		$this->add_control(
			'text_align',
			[
				'label'   => esc_html__( 'Alignment', 'edus-master' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
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
				'default' => 'center',
				'toggle'  => true,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'styling_settings_section',
			[
				'label' => esc_html__( 'Styling Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
        );

        $this->start_controls_tab(
            'active_hover_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'edus-master'),
            ]
        );
		$this->add_control(
			'item_padding',
			[
				'label'      => esc_html__( 'Padding', 'edus-master' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'edus-master' ),
				'selector' => '{{WRAPPER}} .icon-box-item',
			]
		);

		$this->add_control(
			'background_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'edus-master' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control( 'background_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .icon-box-item" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control(
			'icon_height',
			[
				'label'      => esc_html__( 'Icon Height', 'aapside-master' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 10,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 45,
				],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-item .icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_width',
			[
				'label'      => esc_html__( 'Icon Width', 'aapside-master' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 10,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 45,
				],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-item .icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label'      => esc_html__( 'Icon Size', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 10,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-item .icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_margin_bottom',
			[
				'label'      => esc_html__( 'Icon Margin Bottom', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-item .icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'position',
			[
				'label'   => esc_html__( 'Position', 'edus-master' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top'   => esc_html__( 'Top', 'edus-master' ),
					'left'  => esc_html__( 'Left', 'edus-master' ),
					'right' => esc_html__( 'Right', 'edus-master' ),
				],
			]
		);
		$this->add_control( 'icon_color', [
			'label'     => esc_html__( 'Icon Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .icon-box-item .icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'icon_bg_color', [
			'label'     => esc_html__( 'Icon Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .icon-box-item .icon" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .icon-box-item .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control(
			'title_margin_bottom',
			[
				'label'      => esc_html__( 'Title Margin Bottom', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-item .content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control( 'number_color', [
			'label'     => esc_html__( 'Number Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .icon-box-item .content p" => "color: {{VALUE}}"
			]
		] );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'edus-master'),
            ]
        );
        $this->add_control( 'background_hover_color', [
            'label'     => esc_html__( 'Background Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover" => "background-color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'icon_bg_hover_color', [
            'label'     => esc_html__( 'Icon Background Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon" => "background-color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'icon_hover_color', [
            'label'     => esc_html__( 'Icon Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'title_hover_color', [
            'label'     => esc_html__( 'Title Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .content .title" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'paragraph_hover_color', [
            'label'     => esc_html__( 'Paragraph Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .content p" => "color: {{VALUE}}"
            ]
        ] );
        $this->end_controls_tab();

        $this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'typography_settings_section',
			[
				'label' => esc_html__( 'Typography Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Title Typography', 'edus-master' ),
				'selector' => '{{WRAPPER}} .icon-box-item .content .title',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'    => esc_html__( 'Number Typography', 'edus-master' ),
				'selector' => '{{WRAPPER}} .icon-box-item .content p',
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
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'icon-box_wrapper', 'class', 'icon-box-item' );
		$this->add_render_attribute( 'link_wrapper', 'class', 'icon-box-anchor' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link_wrapper', $settings['link'] );
		}
		?>

        <div class="icon-box-item <?php echo $settings['position'] ?>"
             style="text-align:<?php echo $settings['text_align']; ?>">
            <div class="icon-wrap">
                <div class="icon">
					<?php
					Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
					?>
                </div>
            </div>
            <div class="content">
				<?php
				if ( ! empty( $settings['title_status'] ) ) {
					printf( '<a %1$s ><h3 class="title">%2$s</h3></a>', $this->get_render_attribute_string( 'link_wrapper' ), esc_html( $settings['title'] ) );
				}
				if ( ! empty( $settings['description_status'] ) ) {
					printf( '<p>%1$s</p>', esc_html( $settings['description'] ) );
				} ?>
            </div>
        </div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Icon_Box_One_Widget() );