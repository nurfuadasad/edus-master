<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Counterup_Two_Widget extends Widget_Base {

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
		return 'edus-counterup-two-widget';
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
		return esc_html__( 'Counterup: 02', 'edus-master' );
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
			'theme',
			[
				'label'       => esc_html__( 'Theme', 'edus-master' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'black' => esc_html__( 'Black', 'edus-master' ),
					'white' => esc_html__( 'White', 'edus-master' ),
				],
				'default'     => 'black',
				'description' => esc_html__( 'select theme.', 'edus-master' )
			]
		);
		$this->add_control( 'title_status',
			[
				'label'       => esc_html__( 'Subtitle Show/Hide', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'show/hide Subtitle', 'edus-master' ),
			] );
		$this->add_control( 'title', [
			'label'       => esc_html__( 'Title', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Years Experience', 'edus-master' ),
			'description' => esc_html__( 'enter title', 'edus-master' )
		] );
		$this->add_control( 'number', [
			'label'       => esc_html__( 'Number', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( '25', 'edus-master' ),
			'description' => esc_html__( 'enter counterup number', 'edus-master' )
		] );

		$this->end_controls_section();

		$this->start_controls_section(
			'styling_settings_section',
			[
				'label' => esc_html__( 'Styling Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'background',
				'label'    => esc_html__( 'Background', 'edus-master' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .single-counterup-02 .content',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'label'    => esc_html__( 'Border', 'edus-master' ),
				'selector' => '{{WRAPPER}} .single-counterup-02',
			]
		);
		$this->add_control( 'number_color', [
			'label'     => esc_html__( 'Number Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-counterup-02 .content .count-num" => "color: {{VALUE}}",
				"{{WRAPPER}} .single-counterup-02 .content"           => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-counterup-02 .content .title" => "color: {{VALUE}}"
			]
		] );
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
				'name'     => 'number_typography',
				'label'    => esc_html__( 'Number Typography', 'edus-master' ),
				'selector' => '{{WRAPPER}} .single-counterup-02 .count-wrap',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Title Typography', 'edus-master' ),
				'selector' => '{{WRAPPER}} .single-counterup-02 .title',
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

		$title  = $settings['title'];
		$number = $settings['number'];
		$this->add_render_attribute( 'counterup_wrapper', 'class', 'single-counterup-02' );
		$this->add_render_attribute( 'counterup_wrapper', 'class', $settings['theme'] );

		?>
        <div <?php echo $this->get_render_attribute_string( 'counterup_wrapper' ); ?>>
            <div class="content"><span
                        class="count-num"><?php echo esc_html( $number ); ?></span>
			<?php
			if ( ! empty( $settings['title_status'] ) ) : ?>
                <h4 class="title"><?php echo esc_html( $title ); ?></h4>
			<?php endif; ?>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Counterup_Two_Widget() );