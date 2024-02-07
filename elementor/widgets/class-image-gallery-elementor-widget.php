<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Image_Gallery_Widget extends Widget_Base {

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
		return 'edus-image-gallery-widget';
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
		return esc_html__( 'Image Gallery: 01', 'edus-master' );
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
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'hover_background',
				'label'    => esc_html__( 'Background Image', 'edus-master' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .single-image-gallery .thumb::before',
			]
		);

		$this->add_control(
			'image',
			[
				'label'       => esc_html__( 'Image', 'edus-master' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'enter image.', 'edus-master' ),
				'default'     => array(
					'url' => Utils::get_placeholder_image_src()
				)
			]
		);
		$this->add_control(
			'popup_image',
			[
				'label'       => esc_html__( 'Popup Image', 'edus-master' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'enter image.', 'edus-master' ),
				'default'     => array(
					'url' => Utils::get_placeholder_image_src()
				)
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'edus-master' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter title', 'edus-master' ),
				'default'     => esc_html__( 'Senior Party 2019', 'edus-master' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'galley_styling_settings_section',
			[
				'label' => esc_html__( 'Styling Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__( 'Background', 'plugin-domain' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .single-image-gallery .gallery-overlay',
            ]
        );
		$this->add_control( 'title_color', [
			'label'     => esc_html__( 'TItle Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-image-gallery .gallery-overlay .cart-icon a .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'icon_color', [
			'label'     => esc_html__( 'Designation Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-image-gallery .gallery-overlay .cart-icon a" => "color: {{VALUE}}"
			]
		] );
		$this->end_controls_tab();

		$this->add_control( 'team_typography_divider', [
			'type' => Controls_Manager::DIVIDER
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'name_typography',
			'label'    => esc_html__( 'Title Typography', 'edus-master' ),
			'selector' => "{{WRAPPER}} .single-image-gallery .gallery-overlay .cart-icon a .title"
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
		<?php
		$image_id  = $settings['image']['id'];
		$image_url = ! empty( $image_id ) ? wp_get_attachment_image_src( $image_id, 'full', false )[0] : '';
		$image_alt = ! empty( $img_id ) ? get_post_meta( $img_id, '_wp_attachment_image_alt', true ) : '';

		$popup_image_id  = $settings['popup_image']['id'];
		$popup_image_url = ! empty( $popup_image_id ) ? wp_get_attachment_image_src( $popup_image_id, 'full', false )[0] : '';
		?>
        <div class="single-image-gallery">
            <div class="thumb">
                <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
            </div>
            <div class="gallery-overlay">
                <div class="cart-icon">
                    <a class="image-popup" href="<?php echo esc_url( $popup_image_url ); ?>">
                        <i class="fas fa-search"></i>
                        <h4 class="title"><?php echo esc_html( $settings['title'] ); ?></h4>
                    </a>
                </div>
            </div>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Image_Gallery_Widget() );