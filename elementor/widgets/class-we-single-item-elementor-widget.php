<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_We_Single_Item_Widget extends Widget_Base {

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
		return 'edus-we-single-item-three-widget';
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
		return esc_html__( 'We Single Item', 'edus-master' );
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
		return 'eicon-pojome';
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
			'title',
			[
				'label'       => esc_html__( 'Title', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'description' => esc_html__( 'enter title.', 'edus-master' ),
				'default'     => esc_html__( 'Get a free trail option', 'edus-master' )
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'description' => esc_html__( 'enter description.', 'edus-master' ),
				'default'     => esc_html__( "Built purse maids cease her ham new seven among and. Pulled coming wooded tended it answer remain me be. ", 'edus-master' )
			]
		);
		$this->add_control( 'btn_text', [
			'label'       => esc_html__( 'Button Text', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Read More', 'edus-master' ),
			'description' => esc_html__( 'enter button text', 'edus-master' )
		] );
		$this->add_control( 'btn_link', [
			'label'       => esc_html__( 'Button Link', 'edus-master' ),
			'type'        => Controls_Manager::URL,
			'default'     => array(
				'url' => '#'
			),
			'description' => esc_html__( 'enter button link', 'edus-master' )
		] );

		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'edus-master' ),
				'type'        => Controls_Manager::ICONS,
				'description' => esc_html__( 'select Icon.', 'edus-master' ),
				'default'     => [
					'value'   => 'flaticon-statistics',
					'library' => 'solid',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_styling_section',
			[
				'label' => esc_html__( 'Icon Styling', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'title_style_tabs'
		);

		$this->start_controls_tab(
			'title_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'edus-master' ),
			]
		);
		$this->add_control( 'icon_color', [
			'label'     => esc_html__( 'Icon Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item .icon" => "color: {{VALUE}}",
                "{{WRAPPER}} .we-single-item .icon:after" => "border-bottom-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'icon_shape_color', [
			'label'     => esc_html__( 'Icon Shape Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item .icon:after" => "border-top-color: {{VALUE}}",
			]
		] );
		$this->add_control(
			'icon_bottom_space',
			[
				'label'      => esc_html__( 'Icon Bottom Space', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .we-single-item .icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'edus-master' ),
			]
		);

		$this->add_control( 'icon_hover_color', [
			'label'     => esc_html__( 'Icon Hover Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item:hover .icon" => "color: {{VALUE}}"
			]
		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'content_styling_section',
			[
				'label' => esc_html__( 'Content Styling', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'edus-master' ),
			]
		);
		$this->add_control( 'normal_background_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item" => "background-color: {{VALUE}};"
			]
		] );
		$this->add_control( 'normal_title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item .content .title" => "color: {{VALUE}};"
			]
		] );
		$this->add_control( 'normal_description_color', [
			'label'     => esc_html__( 'Description Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item .content p" => "color: {{VALUE}};"
			]
		] );;
		$this->add_control( 'button_color', [
			'label'     => esc_html__( 'Button Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .btn-wrapper .read-btn" => "color: {{VALUE}};"
			]
		] );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'edus-master' ),
			]
		);
		$this->add_control( 'hover_title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item:hover .content .title" => "color: {{VALUE}};"
			]
		] );
		$this->add_control( 'hover_description_color', [
			'label'     => esc_html__( 'Description Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .we-single-item:hover .content p" => "color: {{VALUE}};"
			]
		] );
		$this->add_control( 'button_hover_color', [
			'label'     => esc_html__( 'Button Hover Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .btn-wrapper .read-btn:hover" => "color: {{VALUE}};"
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

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => esc_html__( 'Title Typography', 'edus-master' ),
			'selector' => "{{WRAPPER}} .we-single-item .content .title"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'button_typography',
			'label'    => esc_html__( 'Button Typography', 'edus-master' ),
			'selector' => "{{WRAPPER}} .btn-wrapper .read-btn"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'description_typography',
			'label'    => esc_html__( 'Description Typography', 'edus-master' ),
			'selector' => "{{WRAPPER}} .we-single-item .content p"
		] );

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
		?>
        <div class="we-single-item">
            <div class="icon">
				<?php
				Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
				?>
            </div>
            <div class="content">
                <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><h4
                            class="title"><?php echo esc_html( $settings['title'] ) ?></h4>
                </a>
                <p><?php echo esc_html( $settings['description'] ) ?></p>
                <div class="btn-wrapper">
                    <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"
                       class="read-btn"><?php echo esc_html( $settings['btn_text'] ); ?></a>
                </div>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_We_Single_Item_Widget() );