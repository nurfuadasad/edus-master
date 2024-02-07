<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Blog_Post_Slider_One_Widget extends Widget_Base {

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
		return 'edus-blog-one-widget';
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
		return esc_html__( 'Blog: Slider 01', 'edus-master' );
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
		return 'eicon-slider-album';
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
			'blog_system',
			[
				'label'   => esc_html__( 'Blog Style System', 'edus-master' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'for-slider',
				'options' => [
					'for-grid'   => esc_html__( 'Grid System', 'edus-master' ),
					'for-slider' => esc_html__( 'Slider System', 'edus-master' ),
				],
			]
		);
		$this->add_control( 'read-btn', [
			'label'       => esc_html__( 'Read More', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'description' => esc_html__( 'enter read button text', 'edus-master' ),
			'default'     => esc_html__( 'Read More', 'edus-master' )
		] );
		$this->add_control( 'total', [
			'label'       => esc_html__( 'Total Posts', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '-1',
			'description' => esc_html__( 'enter how many post you want in masonry , enter -1 for unlimited post.' )
		] );
		$this->add_control( 'category', [
			'label'       => esc_html__( 'Category', 'edus-master' ),
			'type'        => Controls_Manager::SELECT2,
			'multiple'    => true,
			'options'     => edus_master()->get_terms_names( 'category', 'id' ),
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
        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'edus-master'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                25 => esc_html__('Short', 'edus-master'),
                55 => esc_html__('Regular', 'edus-master'),
                100 => esc_html__('Long', 'edus-master'),
            ),
            'default' => 25,
            'description' => esc_html__('select excerpt length', 'edus-master')
        ]);
		$this->end_controls_section();
		$this->start_controls_section(
			'grid_settings_section',
			[
				'label' => esc_html__( 'General Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'column',
			[
				'label'       => esc_html__( 'Column', 'edus-master' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'3' => esc_html__( '04 Column', 'edus-master' ),
					'4' => esc_html__( '03 Column', 'edus-master' ),
					'2' => esc_html__( '06 Column', 'edus-master' )
				),
				'description' => esc_html__( 'select grid column', 'edus-master' ),
				'default'     => '4'
			]
		);
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
			'title_styling_settings_section',
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
		$this->add_control( 'normal_post_title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-blog-grid-01 .content .title" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'normal_post_paragraph_color', [
			'label'     => esc_html__( 'Category Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-blog-grid-01 .content .post-categories li" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'normal_background_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-blog-grid-01 .content" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'normal_post_border_color', [
			'label'     => esc_html__( 'Border Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-blog-grid-01 .content" => "border-color: {{VALUE}}"
			]
		] );
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'edus-master' ),
			]
		);

		$this->add_control( 'hover_post_title_color', [
			'label'     => esc_html__( 'Title Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-blog-grid-01 .content .title:hover" => "color: {{VALUE}}"
			]
		] );
		$this->add_control( 'normal_hover_background_color', [
			'label'     => esc_html__( 'Background Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-blog-grid-01:hover .content" => "background-color: {{VALUE}}"
			]
		] );
		$this->add_control( 'normal_post_hover_border_color', [
			'label'     => esc_html__( 'Border Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-blog-grid-01:hover .content" => "border-color: {{VALUE}}"
			]
		] );
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


		$this->start_controls_section(
			'slider_navigation_styling_settings_section',
			[
				'label' => esc_html__( 'Slider Nav Styling Settings', 'edus-master' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'slider_nav_style_tabs'
		);

		$this->start_controls_tab(
			'slider_navigation_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'edus-master' ),
			]
		);
		$this->add_control( 'normal_nav_color', [
			'label'     => esc_html__( 'Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .blog-slider-controls .slider-nav div" => "color: {{VALUE}}"
			]
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'label'    => esc_html__( 'Background', 'edus-master' ),
			'name'     => 'nav_background',
			'selector' => "{{WRAPPER}} .blog-slider-controls .slider-nav div"
		] );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'slider_navigation_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'edus-master' ),
			]
		);
		$this->add_control( 'hover_nav_color', [
			'label'     => esc_html__( 'Color', 'edus-master' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .blog-slider-controls .slider-nav div:hover" => "color: {{VALUE}}"
			]
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'label'    => esc_html__( 'Background', 'edus-master' ),
			'name'     => 'nav_hover_background',
			'selector' => "{{WRAPPER}} .blog-slider-controls .slider-nav div:hover"
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
			'name'        => 'post_meta_typography',
			'description' => esc_html__( 'select title typography', 'edus-master' ),
			'selector'    => "{{WRAPPER}} .single-blog-grid-01 .content .title"
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'label'       => esc_html__( 'Category Typography', 'edus-master' ),
			'name'        => 'category_typography',
			'description' => esc_html__( 'select category typography', 'edus-master' ),
			'selector'    => "{{WRAPPER}} .single-blog-grid-01 .content .post-categories li"
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
		$settings  = $this->get_settings_for_display();
		$rand_numb = rand( 333, 999999999 );
		//query settings
		$total_posts = $settings['total'];
		$category    = $settings['category'];
		$order       = $settings['order'];
		$orderby     = $settings['orderby'];
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
			'post_type'           => 'post',
			'posts_per_page'      => $total_posts,
			'order'               => $order,
			'orderby'             => $orderby,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
		);

		if ( ! empty( $category ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $category
				)
			);
		}
		$post_data = new \WP_Query( $args );
		?>
		<?php if ( $settings['blog_system'] === 'for-slider' ) : ?>
            <div class="blog-grid-carousel-wrapper">
                <div class="blog-grid-carousel" id="blog-grid-one-carousel-<?php echo esc_attr( $rand_numb ); ?>"
                     data-settings='<?php echo json_encode( $slider_settings ) ?>'
                >
					<?php
					while ( $post_data->have_posts() ):$post_data->the_post();
						$img_id      = get_post_thumbnail_id( get_the_ID() ) ? get_post_thumbnail_id( get_the_ID() ) : false;
						$img_url_val = $img_id ? wp_get_attachment_image_src( $img_id, 'edus_classic', false ) : '';
						$img_url     = is_array( $img_url_val ) && ! empty( $img_url_val ) ? $img_url_val[0] : '';
						$img_alt     = get_post_meta( $img_id, '_wp_attachment_image_alt', true );

						$comments_count = get_comments_number( get_the_ID() );
						$comment_text   = ( $comments_count > 1 ) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
						?>
                        <div class="blog-outer-wrap">
                            <div class="single-blog-grid-01">
                                <div class="thumb">
                                    <img src="<?php echo esc_url( $img_url ); ?>"
                                         alt="<?php echo esc_attr( $img_alt ); ?>">
                                </div>
                                <div class="content">
                                    <ul class="post-meta">
                                        <li>
                                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i> <?php echo esc_html( get_the_author() ); ?>
                                            </a></li>
                                        <li>
                                            <a href="<?php the_permalink(); ?>"><i class="far fa-comments"></i><?php echo esc_html( $comment_text ); ?></a>
                                        </li>
                                    </ul>
                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php edus_excerpt( $settings['excerpt_length'] ) ?>
                                    <a class="read-btn"
                                       href="<?php the_permalink(); ?>"><?php echo esc_html( $settings['read-btn'] ) ?></a>
                                </div>
                            </div>
                        </div>
					<?php
					endwhile;
					wp_reset_query();
					?>
                </div>
				<?php if ( ! empty( $settings['nav'] ) ) : ?>
                    <div class="blog-slider-controls">
                        <div class="slider-nav"></div>
                    </div>
				<?php endif; ?>
            </div>
		<?php endif; ?>
		<?php if ( $settings['blog_system'] === 'for-grid' ) : ?>
            <div class="blog-grid-wrapper">
                <div class="row">
					<?php
					while ( $post_data->have_posts() ):$post_data->the_post();
						$img_id      = get_post_thumbnail_id( get_the_ID() ) ? get_post_thumbnail_id( get_the_ID() ) : false;
						$img_url_val = $img_id ? wp_get_attachment_image_src( $img_id, 'edus_grid', false ) : '';
						$img_url     = is_array( $img_url_val ) && ! empty( $img_url_val ) ? $img_url_val[0] : '';
						$img_alt     = get_post_meta( $img_id, '_wp_attachment_image_alt', true );

						$comments_count = get_comments_number( get_the_ID() );
						$comment_text   = ( $comments_count > 1 ) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
						?>
                        <div class="col-lg-<?php echo esc_attr( $settings['column'] ); ?> col-md-6">
                            <div class="single-blog-grid-01 margin-bottom-30">
                                <div class="thumb">
                                    <img src="<?php echo esc_url( $img_url ); ?>"
                                         alt="<?php echo esc_attr( $img_alt ); ?>">
                                </div>
                                <div class="content">
                                    <ul class="post-meta">
                                        <li>
                                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fal fa-user"></i> <?php echo esc_html( get_the_author() ); ?>
                                            </a></li>
                                        <li>
                                            <a href="<?php the_permalink(); ?>"><i class="far fa-comments"></i><?php echo esc_html( $comment_text ); ?></a>
                                        </li>
                                    </ul>
                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<?php edus_excerpt( $settings['excerpt_length'] ) ?>
                                    <a class="read-btn"
                                       href="<?php the_permalink(); ?>"><?php echo esc_html( $settings['read-btn'] ) ?></a>
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
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Blog_Post_Slider_One_Widget() );