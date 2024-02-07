<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_course_Slider_One_Widget extends Widget_Base {

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
		return 'edus-course-slider-one-widget';
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
		return esc_html__( 'Course Item 01', 'edus-master' );
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
		$this->add_control(
			'courses_system',
			[
				'label'   => esc_html__( 'Courses Style System', 'edus-master' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'for-slider',
				'options' => [
                    'for-grid'   => esc_html__( 'Grid System', 'edus-master' ),
                    'for-slider' => esc_html__( 'Slider System', 'edus-master' ),
				],
			]
		);
		$this->add_control(
			'column',
			[
				'label'       => esc_html__( 'Column', 'edus-master' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'6' => esc_html__( '02 Column', 'edus-master' ),
					'3' => esc_html__( '04 Column', 'edus-master' ),
					'4' => esc_html__( '03 Column', 'edus-master' ),
					'2' => esc_html__( '06 Column', 'edus-master' )
				),
				'description' => esc_html__( 'select grid column', 'edus-master' ),
				'default'     => '4'
			]
		);
		$this->add_control( 'total', [
			'label'       => esc_html__( 'Total Posts', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '-1',
			'description' => esc_html__( 'enter how many course you want in masonry , enter -1 for unlimited course.' )
		] );
		$this->add_control( 'category', [
			'label'       => esc_html__( 'Category', 'edus-master' ),
			'type'        => Controls_Manager::SELECT2,
			'multiple'    => true,
			'options'     => Edus()->get_terms_names( 'course-cat', 'id' ),
			'description' => esc_html__( 'select category as you want, leave it blank for all category', 'edus-master' ),
		] );
		$this->add_control( 'order', [
			'label'       => esc_html__( 'Order', 'edus-master' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'ASC'  => esc_html__( 'Ascending', 'edus-master' ),
				'DESC' => esc_html__( 'Descending', 'edus-master' ),
			),
			'default'     => 'ASC',
			'description' => esc_html__( 'select order', 'edus-master' )
		] );
		$this->add_control( 'orderby', [
			'label'       => esc_html__( 'OrderBy', 'edus-master' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'ID'            => esc_html__( 'ID', 'edus-master' ),
				'title'         => esc_html__( 'Title', 'edus-master' ),
				'date'          => esc_html__( 'Date', 'edus-master' ),
				'rand'          => esc_html__( 'Random', 'edus-master' ),
				'comment_count' => esc_html__( 'Most Comments', 'edus-master' ),
			),
			'default'     => 'ID',
			'description' => esc_html__( 'select order', 'edus-master' )
		] );
		$this->add_control( 'readmore_text', [
			'label'   => esc_html__( 'Read More Text', 'edus-master' ),
			'type'    => Controls_Manager::TEXT,
			'default' => esc_html__( 'Read More', 'edus-master' )
		] );
		$this->add_control(
			'pagination',
			[
				'label'       => esc_html__( 'Pagination', 'edus-master' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'you can set yes to show pagination.', 'edus-master' ),
				'default'     => 'yes'
			]
		);
		$this->add_control(
			'pagination_alignment',
			[
				'label'       => esc_html__( 'Pagination Alignment', 'edus-master' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'left'   => esc_html__( 'Left Align', 'edus-master' ),
					'center' => esc_html__( 'Center Align', 'edus-master' ),
					'right'  => esc_html__( 'Right Align', 'edus-master' ),
				),
				'description' => esc_html__( 'you can set pagination alignment.', 'edus-master' ),
				'default'     => 'left',
				'condition'   => array( 'pagination' => 'yes' )
			]
		);
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
                'label'       => esc_html__( 'Items', 'edus-master' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'you can set how many item show in slider', 'edus-master' ),
                'default'     => '3'
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
                'default'     => 'yes'
            ]
        );
        $this->add_control(
            'nav_slider_position',
            [
                'label'      => esc_html__( 'Slider Nav Position', 'edus-master' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range'      => [
                    'px' => [
                        'min'  => - 200,
                        'max'  => 500,
                        'step' => 5,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => - 120,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .blog-slider-controls .slider-nav' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'nav',
            [
                'label'       => esc_html__( 'Nav', 'edus-master' ),
                'type'        => Controls_Manager::SWITCHER,
                'description' => esc_html__( 'you can set yes/no to enable/disable', 'edus-master' ),
            ]
        );
        $this->add_control(
            'nav_position',
            [
                'label'   => esc_html__( 'Nav Position', 'edus-master' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    ''  => esc_html__( 'Normal', 'edus-master' ),
                    'style-01' => esc_html__( 'Top Position', 'edus-master' ),
                ],
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label'       => esc_html__( 'Nav Right Icon', 'edus-master' ),
                'type'        => Controls_Manager::ICONS,
                'description' => esc_html__( 'you can set yes/no to enable/disable', 'edus-master' ),
                'default'     => [
                    'value'   => 'fas fa-angle-right',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label'       => esc_html__( 'Nav Left Icon', 'edus-master' ),
                'type'        => Controls_Manager::ICONS,
                'description' => esc_html__( 'you can set yes/no to enable/disable', 'edus-master' ),
                'default'     => [
                    'value'   => 'fas fa-angle-left',
                    'library' => 'solid',
                ],
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
				"{{WRAPPER}} .course-single-item .icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'content_bg_color', [
			'label'     => esc_html__( 'Content Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .course-single-item .content-wrap" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .course-single-item .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'paragraph_typography', [
			'label'       => esc_html__( 'Paragraph Color', 'edus-master' ),
			'description' => esc_html__( 'select Paragraph Color', 'edus-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors'   => [
				"{{WRAPPER}} .course-single-item .content p" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'read_color', [
			'label'     => esc_html__( 'Read More Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .course-single-item .content-wrap .read-btn" => "color: {{VALUE}}"
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
				"{{WRAPPER}} .course-single-item:hover .icon" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'content_hover_bg_color', [
			'label'     => esc_html__( 'Content Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .course-single-item:hover .content-wrap" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'title_hover_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .course-single-item:hover .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'paragraph_hover_typography', [
			'label'       => esc_html__( 'Paragraph Color', 'edus-master' ),
			'description' => esc_html__( 'select Paragraph Color', 'edus-master' ),
			'type'        => Controls_Manager::COLOR,
			'selectors'   => [
				"{{WRAPPER}} .course-single-item:hover .content p" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'read_hover_bg_color', [
			'label'     => esc_html__( 'Read More Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .course-single-item .content-wrap .read-btn:hover" => "color: {{VALUE}}"
			]
		] );
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'edus-master' ),
				'selector' => '{{WRAPPER}} .course-single-item-03:hover',
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/*  pagination styling tabs start */
		$this->start_controls_section(
			'pagination_settings_section',
			[
				'label' => esc_html__( 'Pagination Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'pagination_style_tabs'
		);

		$this->start_controls_tab(
			'pagination_style_normal_tab',
			[
				'label' => __( 'Normal', 'edus-master' ),
			]
		);

		$this->add_control( 'pagination_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Color', 'edus-master' ),
			'selectors' => [
				"{{WRAPPER}} .blog-pagination ul li a"    => "color: {{VALUE}}",
				"{{WRAPPER}} .blog-pagination ul li span" => "color: {{VALUE}}",
			]
		] );
		$this->add_control( 'pagination_border_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Border Color', 'edus-master' ),
			'selectors' => [
				"{{WRAPPER}} .blog-pagination ul li a"    => "border-color: {{VALUE}}",
				"{{WRAPPER}} .blog-pagination ul li span" => "border-color: {{VALUE}}",
			]
		] );
		$this->add_control( 'pagination_hr', [
			'type' => Controls_Manager::DIVIDER
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'pagination_background',
			'label'    => esc_html__( 'Background', 'edus-master' ),
			'selector' => "{{WRAPPER}} .blog-pagination ul li a, {{WRAPPER}} .blog-pagination ul li span"
		] );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'pagination_style_hover_tab',
			[
				'label' => __( 'Hover', 'edus-master' ),
			]
		);
		$this->add_control( 'pagination_hover_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Color', 'edus-master' ),
			'selectors' => [
				"{{WRAPPER}} .blog-pagination ul li a:hover"      => "color: {{VALUE}}",
				"{{WRAPPER}} .blog-pagination ul li span.current" => "color: {{VALUE}}",
			]
		] );
		$this->add_control( 'pagination_hover_border_color', [
			'type'      => Controls_Manager::COLOR,
			'label'     => esc_html__( 'Border Color', 'appside-master' ),
			'selectors' => [
				"{{WRAPPER}} .blog-pagination ul li a:hover"      => "border-color: {{VALUE}}",
				"{{WRAPPER}} .blog-pagination ul li span.current" => "border-color: {{VALUE}}",
			]
		] );
		$this->add_control( 'pagination_hover_hr', [
			'type' => Controls_Manager::DIVIDER
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'pagination_hover_background',
			'label'    => esc_html__( 'Background', 'edus-master' ),
			'selector' => "{{WRAPPER}} .blog-pagination ul li a:hover, {{WRAPPER}} .blog-pagination ul li span.current"
		] );


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		/*  pagination styling tabs end */


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
			'selector'    => "{{WRAPPER}} .course-single-item .content .title"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'label'       => esc_html__( 'Paragraph Typography', 'edus-master' ),
			'name'        => 'paragraph_typography',
			'description' => esc_html__( 'select Paragraph typography', 'edus-master' ),
			'selector'    => "{{WRAPPER}} .course-single-item .content p"
		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'label'       => esc_html__( 'Read More Typography', 'edus-master' ),
			'name'        => 'read_more_typography',
			'description' => esc_html__( 'select Paragraph typography', 'edus-master' ),
			'selector'    => "{{WRAPPER}}  .course-single-item .content-wrap .read-btn"
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
        $rand_numb = rand( 333, 999999999 );
		//query settings
		$total_posts = $settings['total'];
		$category    = $settings['category'];
		$order       = $settings['order'];
		$orderby     = $settings['orderby'];
		$paged       = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		//other settings
		$pagination           = $settings['pagination'] ? false : true;
		$pagination_alignment = $settings['pagination_alignment'];
        //slider settings
        $slider_settings = [
            "loop"            => esc_attr( $settings['loop'] ),
            "margin"          => esc_attr( $settings['margin']['size'] ?? 0 ),
            "items"           => esc_attr( $settings['items'] ?? 1 ),
            "autoplay"        => esc_attr( $settings['autoplay'] ),
            "autoplaytimeout" => esc_attr( $settings['autoplaytimeout']['size'] ?? 0 ),
            "nav"             => esc_attr( $settings['nav'] ),
            "navleft"         => Edus_master()->render_elementor_icons( $settings['nav_left_arrow'] ),
            "navright"        => Edus_master()->render_elementor_icons( $settings['nav_right_arrow'] )
        ];
		//setup query
		$args = array(
			'post_type'      => 'courses',
			'posts_per_page' => $total_posts,
			'order'          => $order,
			'orderby'        => $orderby,
			'post_status'    => 'publish'
		);

		if ( ! empty( $category ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'course-category',
					'field'    => 'term_id',
					'terms'    => $category
				)
			);
		}

		$post_data = new \WP_Query( $args );
		?>
		<?php if ( $settings['courses_system'] === 'for-grid' ) : ?>
            <div class="course-single-item-wrap">
                <div class="row">
					<?php
					while ( $post_data->have_posts() ):$post_data->the_post();
						$edus = Edus();
						global $post, $authordata;
						$course_id   = get_the_ID();
						$profile_url = tutor_utils()->profile_url( $authordata->ID );
						$image_url   = get_tutor_course_thumbnail( 'edus-full', $url = true );
						?>
                        <div class="col-lg-<?php echo esc_attr( $settings['column'] ); ?> col-md-6">
                            <div class="course-single-item margin-bottom-30">
                                <div class="thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?= $image_url ?>" alt="thumbnail">
                                    </a>
									<?php
									if ( edus_master()->is_edus_active() ) {
										edus_master()->tutor_rating();
										edus_master()->tutor_category();
									}
									?>
                                </div>
                                <div class="content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h4 class="title"><?php the_title(); ?></h4>
                                    </a>
                                    <div class="tutor-author-price">
                                        <div class="tutor-loop-author">
                                            <div class="tutor-single-course-avatar">
                                                <a href="<?php echo $profile_url; ?>"> <?php echo tutor_utils()->get_tutor_avatar( $post->post_author ); ?></a>
                                            </div>
                                            <div class="tutor-single-course-author-name">
                                                <a href="<?php echo $profile_url; ?>"><?php echo get_the_author(); ?></a>
                                            </div>
                                        </div>
										<?php
										edus_master()->tutor_price();
										?>
                                    </div>
                                    <div class="tutor-course-loop-meta">
										<?php
										$course_duration = get_tutor_course_duration_context();
										$course_students = tutor_utils()->count_enrolled_users_by_course();
										?>
                                        <div class="tutor-single-loop-meta">
                                            <i class='tutor-icon-user'></i><span><?php echo $course_students; ?> <?php echo esc_html__("Student",'edus-master')?></span>
                                        </div>
										<?php
										if ( ! empty( $course_duration ) ) { ?>
                                            <div class="tutor-single-loop-meta">
                                                <i class='tutor-icon-clock'></i>
                                                <span><?php echo $course_duration; ?></span>
                                            </div>
										<?php } ?>
										<?php
                                        if (edus_master()->is_woocommerce_active()) {
                                            edus_master()->tutor_enroll_btn();
                                        }
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php
					endwhile;
					wp_reset_query();
					?>
                    <div class="col-lg-12">
                        <div class="blog-pagination text-<?php echo esc_attr( $pagination_alignment ) ?> margin-top-20">
							<?php
							if ( ! $pagination ) {
								Edus()->post_pagination( $post_data );
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
		<?php endif; ?>
		<?php if ( $settings['courses_system'] === 'for-slider' ) : ?>
            <div class="course-carousel-one-wrapper">
                <div class="course-grid-carousel" id="course-grid-one-carousel-<?php echo esc_attr( $rand_numb ); ?>"
                     data-settings='<?php echo json_encode( $slider_settings ) ?>'
                >
					<?php
					while ( $post_data->have_posts() ):$post_data->the_post();
						$edus = Edus();
						global $post, $authordata;
						$course_id   = get_the_ID();
						$profile_url = tutor_utils()->profile_url( $authordata->ID );
						$image_url   = get_tutor_course_thumbnail( 'edus-full', $url = true );
						?>
                        <div class="course-outer-wrap">
                            <div class="course-single-item margin-bottom-30">
                                <div class="thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?= $image_url ?>" alt="thumbnail">
                                    </a>
                                    <?php
                                    if ( edus_master()->is_edus_active() ) {
                                        edus_master()->tutor_rating();
                                        edus_master()->tutor_category();
                                    }
                                    ?>
                                </div>
                                <div class="content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h4 class="title"><?php the_title(); ?></h4>
                                    </a>
                                    <div class="tutor-author-price">
                                        <div class="tutor-loop-author">
                                            <div class="tutor-single-course-avatar">
                                                <a href="<?php echo $profile_url; ?>"> <?php echo tutor_utils()->get_tutor_avatar( $post->post_author ); ?></a>
                                            </div>
                                            <div class="tutor-single-course-author-name">
                                                <a href="<?php echo $profile_url; ?>"><?php echo get_the_author(); ?></a>
                                            </div>
                                        </div>
                                        <?php
                                        edus_master()->tutor_price();
                                        ?>
                                    </div>
                                    <div class="tutor-course-loop-meta">
                                        <?php
                                        $course_duration = get_tutor_course_duration_context();
                                        $course_students = tutor_utils()->count_enrolled_users_by_course();
                                        ?>
                                        <div class="tutor-single-loop-meta">
                                            <i class='tutor-icon-user'></i><span><?php echo $course_students; ?> <?php echo esc_html__("Student",'edus-master')?></span>
                                        </div>
                                        <?php
                                        if ( ! empty( $course_duration ) ) { ?>
                                            <div class="tutor-single-loop-meta">
                                                <i class='tutor-icon-clock'></i>
                                                <span><?php echo $course_duration; ?></span>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if (edus_master()->is_woocommerce_active()) {
                                            edus_master()->tutor_enroll_btn();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php
					endwhile;
					wp_reset_query();
					?>
                </div>
                <?php if ( ! empty( $settings['nav'] ) ) : ?>
                    <div class="course-slider-controls">
                        <div class="slider-nav <?php echo $settings['nav_position'] ?>"></div>
                    </div>
                <?php endif; ?>
            </div>
		<?php endif; ?>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_course_Slider_One_Widget() );