<?php

/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */


namespace Elementor;

class Edus_Find_Course_Two_Widget extends Widget_Base {


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

		return 'edus-find-course-two-widget';

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

		return esc_html__( 'Find Course From: 02', 'edus-master' );

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

		return 'eicon-lightbox';

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
                'label' => esc_html__('General Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'placeholder_title',
            [
                'label'       => esc_html__( 'Placeholder', 'edus-master' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Search Your Courses', 'edus-master' ),
                'placeholder' => esc_html__( 'Search Your Courses', 'edus-master' ),
            ]
        );
        $this->add_control( 'button_text', [
            'type'        => Controls_Manager::TEXT,
            'label'       => esc_html__( 'Button Text', 'edus-master' ),
            'description' => esc_html__( 'set button button text', 'edus-master' ),
            'default'     => esc_html__( 'Find Courses', 'edus-master' ),
        ] );
        $this->end_controls_section();


        $this->start_controls_section(

            'styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(

            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control( 'search_icon_color', [
            'label'     => esc_html__( 'Search Icon Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .dream-course-form .dream-course-search .input-box i" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control('button_bg_color', [
            'label' => esc_html__('Button Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .course-btn" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('button_title_color', [
            'label' => esc_html__('Button Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .course-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_bg_color', [
            'label' => esc_html__('Button Background Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .course-btn:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_title_color', [
            'label' => esc_html__('Button Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .course-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(

            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .dream-course-form .dream-course-search .input-box input',
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
		//query settings
		$total_posts = $settings['total'];
		$category    = $settings['category'];
		$order       = $settings['order'];
		$orderby     = $settings['orderby'];
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

        <form class="dream-course-form-two" action="<?php echo esc_url(home_url('/')) ?>" method="get">
            <div class="dream-course-search">
                <div class="input-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="s" placeholder="<?php echo $settings['placeholder_title'] ?>">
                    <input type="hidden" name="post_type" value="courses">
                </div>
                <div class="btn-wrapper">
                    <button class="course-btn" type="submit"><?php echo esc_html( $settings['button_text'] ); ?></button>
                </div>
            </div>
        </form>
		<?php

	}

}


Plugin::instance()->widgets_manager->register_widget_type( new Edus_Find_Course_Two_Widget() );