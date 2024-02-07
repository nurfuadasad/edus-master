<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_What_We_Item_Widget extends Widget_Base {

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
		return 'edus-what-we-one-widget';
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
		return esc_html__( 'What We: Item 01', 'edus-master' );
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
		$this->add_control( 'image',
			[
				'label'       => esc_html__( 'Image', 'edus-master' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'enter title.', 'edus-master' ),
				'default'     => array(
					'url' => Utils::get_placeholder_image_src()
				)
			] );
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'description' => esc_html__( 'enter title.', 'edus-master' ),
				'default'     => esc_html__( 'we-doUndergraduates', 'edus-master' )
			]
		);
		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'libo-master' ),
				'type'        => Controls_Manager::ICONS,
				'description' => esc_html__( 'select Icon.', 'libo-master' ),
				'default'     => [
					'value'   => 'flaticon-statistics',
					'library' => 'solid',
				]
			]
		);
		$this->add_control( 'students',
			[
				'label'       => esc_html__( 'Students', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'enter students', 'edus-master' ),
				'default'     => esc_html__( '500+ Students', 'edus-master' )
			] );
		$this->add_control( 'description',
			[
				'label'       => esc_html__( 'Description', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'enter description', 'edus-master' ),
				'default'     => esc_html__( 'Discover UWE Bristol’s first-class learning facilities, vibrant student life, beautiful campuses.', 'edus-master' )
			] );
		$this->add_control( 'btn_text', [
			'label'       => esc_html__( 'Button Text', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Undergraduate Study', 'edus-master' ),
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
				"{{WRAPPER}} .what-we-single-item .icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'content_bg_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .what-we-single-item .content" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .what-we-single-item .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'paragraph_typography', [
			'label'       => esc_html__( 'Paragraph Color', 'edus-master' ),
			'description' => esc_html__( 'select Paragraph Color', 'edus-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors'   => [
				"{{WRAPPER}} .what-we-single-item .content p" => "color: {{VALUE}}"
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
				"{{WRAPPER}} .what-we-single-item:hover .icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'content_hover_bg_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .what-we-single-item .content:hover" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_hover_color', [
			'label'     => esc_html__( 'Title Hover Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .what-we-single-item:hover .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'paragraph_hover_typography', [
			'label'       => esc_html__( 'Paragraph Hover Color', 'edus-master' ),
			'description' => esc_html__( 'select Paragraph Color', 'edus-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors'   => [
				"{{WRAPPER}} .what-we-single-item:hover .content p" => "color: {{VALUE}}"
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
			'selector'    => "{{WRAPPER}} .what-we-single-item .content .title"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'label'       => esc_html__( 'Paragraph Typography', 'edus-master' ),
			'name'        => 'paragraph_typography',
			'description' => esc_html__( 'select Paragraph typography', 'edus-master' ),
			'selector'    => "{{WRAPPER}} .what-we-single-item .content p"
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
		$img_id   = $settings['image']['id'];
		$img_url  = ! empty( $img_id ) ? wp_get_attachment_image_src( $img_id, 'full' )[0] : '';
		$img_alt  = ! empty( $img_id ) ? get_post_meta( $img_id, '_wp_attachment_image_alt', true ) : '';

		?>
        <div class="what-we-single-item margin-bottom-30">
            <div class="thumb">
                <img src="<?php echo esc_url( $img_url ) ?>" alt="<?php echo esc_attr( $img_alt ) ?>">
                <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><h4
                            class="title"><?php echo esc_html( $settings['title'] ) ?></h4>
                </a>
            </div>
            <div class="content">
                <div class="icon">
					<?php echo edus_master()->render_elementor_icons( $settings['icon'] ) ?>
                </div>
                <span><i class="fas fa-users"></i> <?php echo esc_html( $settings['students'] ); ?></span>
                <p class="description"><?php echo esc_html( $settings['description'] ); ?></p>
                <div class="btn-wrapper">
                    <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"
                       class="graduate-btn"><?php echo esc_html( $settings['btn_text'] ); ?></a>
                </div>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_What_We_Item_Widget() );