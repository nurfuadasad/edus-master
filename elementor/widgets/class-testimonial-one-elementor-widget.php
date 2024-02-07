<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Testimonial_One_Widget extends Widget_Base {

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
		return 'edus-testimonial-one-widget';
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
		return esc_html__( 'Testimonial: 01', 'edus-master' );
	}

	public function get_keywords() {
		return [ 'Team', 'Member', 'Testimonial', "Ir Tech", 'Edus' ];
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
		return 'eicon-blockquote';
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

		$this->add_control( 'content_devider', [
			'type' => Controls_Manager::DIVIDER
		] );
		$repeater = new Repeater();
		$repeater->add_control( 'image',
			[
				'label'       => esc_html__( 'Image', 'edus-master' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'enter title.', 'edus-master' ),
				'default'     => array(
					'url' => Utils::get_placeholder_image_src()
				)
			] );
		$repeater->add_control( 'image_status',
			[
				'label'       => esc_html__( 'Image Show/Hide', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'show/hide image', 'edus-master' ),
			] );
		$repeater->add_control( 'name',
			[
				'label'       => esc_html__( 'Name', 'edus-master' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter name', 'edus-master' ),
				'default'     => esc_html__( 'Lara Croft', 'edus-master' )
			] );
		$repeater->add_control( 'designation_status',
			[
				'label'       => esc_html__( 'Designation Show/Hide', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'show/hide designation', 'edus-master' ),
			] );
		$repeater->add_control( 'designation',
			[
				'label'       => esc_html__( 'Designation', 'edus-master' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter designation', 'edus-master' ),
				'default'     => esc_html__( 'CEO, Edus', 'edus-master' )
			] );
		$repeater->add_control( 'ratings',
			[
				'label'       => esc_html__( 'Ratings Show/Hide', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'show/hide ratings', 'edus-master' ),
			] );
		$repeater->add_control( 'ratings_count',
			[
				'label'       => esc_html__( 'Ratings', 'edus-master' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'1' => esc_html__( '1 star', 'edus-master' ),
					'2' => esc_html__( '2 star', 'edus-master' ),
					'3' => esc_html__( '3 star', 'edus-master' ),
					'4' => esc_html__( '4 star', 'edus-master' ),
					'5' => esc_html__( '5 star', 'edus-master' ),
				],
				'description' => esc_html__( 'set ratings', 'edus-master' ),
				'condition'   => [ 'ratings' => 'yes' ]
			] );
		$repeater->add_control( 'description',
			[
				'label'       => esc_html__( 'Description', 'edus-master' ),
				'type'        => Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'enter description', 'edus-master' ),
				'default'     => esc_html__( 'Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore ma gna aliqua. Ut enim ad minim ve niam, quis nostrud exercitation ullamco lab oris nisi ut aliquip ex ea commodo cons equat. Duis aute irure dolor in reprehe nderit in voluptate velit esse.', 'edus-master' )
			] );
		$this->add_control( 'testimonial_items', [
			'label'   => esc_html__( 'Testimonial Item', 'edus-master' ),
			'type'    => Controls_Manager::REPEATER,
			'fields'  => $repeater->get_controls(),
			'default' => [
				[
					'image'       => array(
						'url' => Utils::get_placeholder_image_src()
					),
					'title'       => esc_html__( 'Miranda H.Halim', 'edus-master' ),
					'designation' => esc_html__( 'Founder, Miranda Co.', 'edus-master' ),
					'description' => esc_html__( "Our service is free to users because vendors pay us when they receive web traffic. We list all vendors - not just those that pay us - in our comprehensive directory so that you can compare, sort and filter your results to make the most informed decision possible. GetApp is a Gartner company. Gartner (NYSE: IT) is the world's leading information technology research.", 'edus-master' ),
				]
			],

		] );
		$this->end_controls_section();


		$this->start_controls_section(
			'slider_settings_section',
			[
				'label' => esc_html__( 'Slider Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'items',
			[
				'label'       => esc_html__( 'slidesToShow', 'edus-master' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'you can set how many item show in slider', 'edus-master' ),
				'default'     => '1',
			]
		);
		$this->add_control(
			'margin',
			[
				'label'       => esc_html__( 'Margin', 'edus-master' ),
				'description' => esc_html__( 'you can set margin for slider', 'edus-master' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 5,
					]
				],
				'default'     => [
					'unit' => 'px',
					'size' => 0,
				],
				'size_units'  => [ 'px' ]
			]
		);
		$this->add_control(
			'loop',
			[
				'label'       => esc_html__( 'Loop', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'you can set yes/no to enable/disable', 'edus-master' ),
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'       => esc_html__( 'Autoplay', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'you can set yes/no to enable/disable', 'edus-master' ),
			]
		);
		$this->add_control(
			'nav',
			[
				'label' => esc_html__('Nav', 'edus-master'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('you can set yes/no to enable/disable', 'edus-master'),
				'default' => 'yes'
			]
		);
		$this->add_control(
			'nav_left_arrow',
			[
				'label' => esc_html__('Nav Left Icon', 'edus-master'),
				'type' => Controls_Manager::ICONS,
				'description' => esc_html__('you can set yes/no to enable/disable', 'edus-master'),
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => ['nav' => 'yes']
			]
		);
		$this->add_control(
			'nav_right_arrow',
			[
				'label' => esc_html__('Nav Right Icon', 'edus-master'),
				'type' => Controls_Manager::ICONS,
				'description' => esc_html__('you can set yes/no to enable/disable', 'edus-master'),
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => ['nav' => 'yes']
			]
		);
		$this->add_control(
			'center',
			[
				'label'       => esc_html__( 'Center', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'you can set yes/no to enable/disable', 'edus-master' ),

			]
		);
		$this->add_control(
			'autoplaytimeout',
			[
				'label'      => esc_html__( 'Autoplay Timeout', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 10000,
						'step' => 2,
					]
				],
				'default'    => [
					'unit' => 'px',
					'size' => 5000,
				],
				'size_units' => [ 'px' ],
				'condition'  => array(
					'autoplay' => 'yes'
				)
			]
		);
		$this->end_controls_section();

		$this->start_controls_section( 'image_styling_section', [
			'label' => esc_html__( 'Image Styling Settings', 'edus-master' ),
			'tab'   => Controls_Manager::TAB_STYLE
		] );
		$this->add_responsive_control(
			'image_top_space',
			[
				'label'      => esc_html__( 'Image Top Space', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .single-testimonial-item .thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'image_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'edus-master' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single-testimonial-item .thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section( 'styling_section', [
			'label' => esc_html__( 'Styling Settings', 'edus-master' ),
			'tab'   => Controls_Manager::TAB_STYLE
		] );

		$this->add_group_control( Group_Control_Background::get_type(), [
			'label'    => esc_html__( 'Background', 'edus-master' ),
			'name'     => 'content_backaground',
			'selector' => "{{WRAPPER}} .single-testimonial-item .content"
		] );
		$this->add_control(
			'content_padding',
			[
				'label'      => esc_html__( 'Content Padding', 'edus-master' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single-testimonial-item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'content_border_radius',
			[
				'label'      => esc_html__( 'Content Border Radius', 'edus-master' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single-testimonial-item .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'content_border',
				'label'    => esc_html__( 'Border', 'edus-master' ),
				'selector' => '{{WRAPPER}} .single-testimonial-item .content',
			]
		);

		$this->add_control(
			'description_top_gap',
			[
				'label'      => esc_html__( 'Description Top Gap', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 500,
						'step' => 2,
					],
					'%'  => [
						'min'  => 0,
						'max'  => 500,
						'step' => 2,
					]
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					"{{WRAPPER}} .single-testimonial-item .content p" => 'margin-top: {{SIZE}}{{UNIT}};'
				]
			]
		);
		$this->add_control(
			'ratings_between_gap',
			[
				'label'      => esc_html__( 'Ratings Between Gap', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 500,
						'step' => 2,
					],
					'%'  => [
						'min'  => 0,
						'max'  => 500,
						'step' => 2,
					]
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					"{{WRAPPER}} .single-testimonial-item .content .ratings i+i" => 'margin-left: {{SIZE}}{{UNIT}};'
				]
			]
		);
		$this->add_control(
			'author_meta_top_gap',
			[
				'label'      => esc_html__( 'Client Details Top Space', 'edus-master' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 500,
						'step' => 2,
					],
					'%'  => [
						'min'  => 0,
						'max'  => 500,
						'step' => 2,
					]
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					"{{WRAPPER}} .single-testimonial-item .content .author-meta" => 'margin-top: {{SIZE}}{{UNIT}};'
				]
			]
		);
		$this->add_control( 'name_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Name Color', 'edus-master' ),
			'selectors' => [
				"{{WRAPPER}} .single-testimonial-item .content .author-meta .title" => "color: {{VALUE}}"
			]
		] );

		$this->add_control( 'description_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Description Color', 'edus-master' ),
			'selectors' => [
				"{{WRAPPER}} .single-testimonial-item .content .description" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'designation_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Designation Color', 'edus-master' ),
			'selectors' => [
				"{{WRAPPER}} .single-testimonial-item .content .author-meta .designation" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'rating_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Ratings Color', 'edus-master' ),
			'selectors' => [
				"{{WRAPPER}} .single-testimonial-item .content .ratings" => "color: {{VALUE}}"
			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'typography_section', [
			'label' => esc_html__( 'Typography Settings', 'edus-master' ),
			'tab'   => Controls_Manager::TAB_STYLE
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'name_typography',
			'label'    => esc_html__( 'Name Typography', 'edus-master' ),
			"selector" => "{{WRAPPER}} .single-testimonial-item .content .author-meta .title"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'description_typography',
			'label'    => esc_html__( 'Description Typography', 'edus-master' ),
			"selector" => "{{WRAPPER}} .single-testimonial-item .content p"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'designation_typography',
			'label'    => esc_html__( 'Designation Typography', 'edus-master' ),
			"selector" => "{{WRAPPER}} .single-testimonial-item .content .author-meta .designation"
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
		$settings              = $this->get_settings_for_display();
		$all_testimonial_items = $settings['testimonial_items'];
		$rand_numb             = rand( 333, 999999999 );

		//slider settings
		$slider_settings = [
			"loop"            => esc_attr( $settings['loop'] ),
			"margin"          => esc_attr( $settings['margin']['size'] ?? 0 ),
			"items"           => esc_attr( $settings['items'] ?? 1 ),
			"center"          => esc_attr( $settings['center'] ),
			"autoplay"        => esc_attr( $settings['autoplay'] ),
			"autoplaytimeout" => esc_attr( $settings['autoplaytimeout']['size'] ?? 0 ),
			"nav" => esc_attr($settings['nav']),
			"navleft" => Edus_master()->render_elementor_icons($settings['nav_left_arrow']),
			"navright" => Edus_master()->render_elementor_icons($settings['nav_right_arrow'])

		]

		?>
        <div class="testimonial-carousel-wrapper edus-rtl-slider">
            <div class="testimonial-carousel"
                 id="testimonial-one-carousel-<?php echo esc_attr( $rand_numb ); ?>"
                 data-settings='<?php echo json_encode( $slider_settings ) ?>'
            >
				<?php
				foreach ( $all_testimonial_items as $item ):
					$image_id = $item['image']['id'];
					$image_url = ! empty( $image_id ) ? wp_get_attachment_image_src( $image_id, 'full' )[0] : '';
					$image_alt = ! empty( $image_id ) ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';
					?>
                    <div class="ts-outer-wrap">
                        <div class="single-testimonial-item">
                            <div class="content">
                                <p class="description"><?php echo esc_html( $item['description'] ); ?></p>
                                <div class="author-meta">
                                    <div class="thumb">
										<?php
										if ( ! empty( $image_id ) && ! empty( $item['image_status'] ) ) {
											printf( '<img src="%1$s" alt="%2$s" />', esc_url( $image_url ), esc_attr( $image_alt ) );
										}
										?>
                                    </div>
                                    <h4 class="title"><?php echo esc_html( $item['name'] ); ?></h4>
									<?php
									if ( ! empty( $item['designation_status'] ) ) {
										printf( '<span class="designation">%1$s</span>', esc_html( $item['designation'] ) );
									}
									?>
                                </div>
								<?php if ( ! empty( $item['ratings'] ) ): ?>
                                    <div class="ratings">
										<?php
										for ( $i = 0; $i < $item['ratings_count']; $i ++ ) {
											print '<i class="fa fa-star"></i>';
										}
										?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
			<?php if ( ! empty( $settings['nav'] ) ) : ?>
                <div class="testimonial-carousel-controls">
                    <div class="slider-nav"></div>
                </div>
			<?php endif; ?>
        </div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Testimonial_One_Widget() );
