<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Section_Title_One_Widget extends Widget_Base {

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
		return 'edus-section-title-one-widget';
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
		return esc_html__( 'Heading Title: 01', 'edus-master' );
	}

	public function get_keywords() {
		return [ 'Section', 'Heading', 'Title', "Ir Tech", 'Edus' ];
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
		return 'eicon-heading';
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
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default' =>esc_html__('What We Do','bizbond-master'),
				'description' => esc_html__( 'enter title. use {c} color text {/c} for color text', 'edus-master' ),
			]
		);
		$this->add_control(
			'description_status',
			[
				'label'       => esc_html__( 'Description Show/Hide', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'show/hide description', 'edus-master' ),
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'edus-master' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter  description.', 'edus-master' ),
				'default'     => esc_html__( 'Top Packages', 'edus-master' ),
				'condition'   => [ 'description_status' => 'yes' ]
			]
		);
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
			'styling_section',
			[
				'label' => esc_html__( 'Styling Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'shape_top_space',
			[
				'label'      => esc_html__( 'Shape Top Space', 'edus-master' ),
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
					'{{WRAPPER}}.section-title .title.shape' => 'padding-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_bottom_space',
			[
				'label'      => esc_html__( 'Title Bottom Space', 'edus-master' ),
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
					'{{WRAPPER}} .section-title .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control( 'description_color', [
			'label'     => esc_html__( 'Description Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .section-title p" => "color: {{VALUE}}"
			]
		] );

		$this->add_control( 'title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .section-title .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_extra_color', [
			'label'     => esc_html__( 'Title Extra Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .section-title .title span" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_border_color', [
			'label'     => esc_html__( 'Title Shape Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .section-title .title.shape:before" => "border-bottom-color: {{VALUE}}"
			]
		] );

		$this->end_controls_section();
		$this->start_controls_section(
			'styling_typogrpahy_section',
			[
				'label' => esc_html__( 'Typography Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => esc_html__( 'Title Typography', 'edus-master' ),
			'selector' => "{{WRAPPER}} .section-title .title"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_extra_typography',
			'label'    => esc_html__( 'Title Extra Typography', 'edus-master' ),
			'selector' => "{{WRAPPER}} .section-title .title span"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'description_typography',
			'label'    => esc_html__( 'Description Typography', 'edus-master' ),
			'selector' => "{{WRAPPER}} .section-title p"
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
        <div class="section-title" style="text-align:<?php echo $settings['text_align']; ?>">

            <h3 class="title <?php echo $settings['title_shape'] ?>">
				<?php
				$title = str_replace( [ '{c}', '{/c}' ], [ '<span>', '</span>' ], $settings['title'] );
				print wp_kses( $title, edus_master()->kses_allowed_html( 'all' ) );
				?>
            </h3>
	        <?php
	        if ( ! empty( $settings['description_status'] ) ) {
		        printf( '<p>%1$s</p>', esc_html( $settings['description'] ) );
	        }
	        ?>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Section_Title_One_Widget() );