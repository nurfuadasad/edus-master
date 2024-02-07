<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Mission_Single_One_Widget extends Widget_Base {

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
		return 'edus-mission-single-one-widget';
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
		return esc_html__( 'Mission: Item 01', 'edus-master' );
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
		return 'eicon-post-slider';
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


		$this->add_control( 'title', [
			'label'   => esc_html__( 'Title', 'edus-master' ),
			'type'    => Controls_Manager::TEXTAREA,
			'default' => esc_html__( 'Learn Mission Us', 'edus-master' )
		] );
		$this->add_control( 'description', [
			'label'   => esc_html__( 'Description', 'edus-master' ),
			'type'    => Controls_Manager::TEXTAREA,
			'default' => esc_html__( 'Move with a great team, its better', 'edus-master' )
		] );
		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'edus-master' ),
				'type'        => Controls_Manager::ICONS,
				'description' => esc_html__( 'select Icon.', 'edus-master' ),
				'default'     => [
					'value'   => 'flaticon-receipt',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'edus-master' ),
				'type'        => Controls_Manager::URL,
				'description' => esc_html__( 'enter link', 'edus-master' ),
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
				"{{WRAPPER}} .mission-single-item .icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'content_bg_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .mission-single-item" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .mission-single-item .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'paragraph_typography', [
			'label'       => esc_html__( 'Paragraph Color', 'edus-master' ),
			'description' => esc_html__( 'select Paragraph Color', 'edus-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors'   => [
				"{{WRAPPER}} .mission-single-item .content p" => "color: {{VALUE}}"
			]
		] );

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
				"{{WRAPPER}} .mission-single-item .icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'content_hover_bg_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .mission-single-item" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_color_hover', [
			'label'     => esc_html__( 'Title Hover Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .mission-single-item .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'paragraph_hover_color', [
			'label'       => esc_html__( 'Paragraph Hover Color', 'edus-master' ),
			'description' => esc_html__( 'select Paragraph Color', 'edus-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors'   => [
				"{{WRAPPER}} .mission-single-item .content p" => "color: {{VALUE}}"
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
			'label'       => esc_html__( 'Title Typography', 'edus-master' ),
			'name'        => 'title_typography',
			'description' => esc_html__( 'select title typography', 'edus-master' ),
			'selector'    => "{{WRAPPER}} .mission-single-item .content .title"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'label'       => esc_html__( 'Paragraph Typography', 'edus-master' ),
			'name'        => 'paragraph_typography',
			'description' => esc_html__( 'select Paragraph typography', 'edus-master' ),
			'selector'    => "{{WRAPPER}} .mission-single-item .content p"
		] );
		$this->end_controls_section();

	}

	/**
	 * Render Elementor widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
        <div class="mission-single-item">
                <div class="icon">
					<?php
					Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] )
					?>
                </div>
                <div class="content">
                    <h5 class="title">
                        <a <?php print edus_master()->render_elementor_link_attributes( $settings['link'], '' ); ?>><?php echo esc_html( $settings['title'] ) ?></a>
                    </h5>
                    <p><?php echo esc_html( $settings['description'] ); ?></p>
                </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Mission_Single_One_Widget() );