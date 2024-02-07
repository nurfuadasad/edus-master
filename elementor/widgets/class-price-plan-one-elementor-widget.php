<?php

/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */


namespace Elementor;

class Edus_Price_Plan_One_Widget extends Widget_Base {


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

		return 'edus-price-plan-one-widget';

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

		return esc_html__( 'Price Plan: 01', 'edus-master' );

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

		return 'eicon-price-table';

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

				'tab' => Controls_Manager::TAB_CONTENT,

			]

		);
		$this->add_control( 'month_label', [
			'label'       => esc_html__( 'Monthly Charge', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Monthly Charge ', 'edus-master' ),
			'description' => esc_html__( 'add month tab label', 'edus-master' )
		] );
		$this->add_control( 'year_label', [
			'label'       => esc_html__( 'Yearly Charge', 'edus-master' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Yearly Charge', 'edus-master' ),
			'description' => esc_html__( 'add year tab label', 'edus-master' )
		] );
		$repeater = new Repeater();

		$repeater->add_control(
			'choose_package',
			[
				'label'   => esc_html__( 'Choose Package', 'edus-master' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'monthly',
				'options' => [
					'monthly' => esc_html__( 'Monthly Charge', 'edus-master' ),
					'yearly'  => esc_html__( 'Yearly Charge', 'edus-master' ),
				],
			]
		);
		$repeater->add_control(
			'active_package',
			[
				'label'   => esc_html__( 'Active Package', 'edus-master' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'active' => esc_html__( 'Popular Charge', 'edus-master' ),
					''  => esc_html__( 'Default Charge', 'edus-master' ),
				],
			]
		);
		$repeater->add_control( 'title', [
			'label' => esc_html__( 'Title', 'edus-master' ),
			'type' => Controls_Manager::TEXT,
			'default' => esc_html__( 'Primary Plan', 'edus-master' ),
			'description' => esc_html__( 'enter title', 'edus-master' )

		] );

		$repeater->add_control( 'price', [

			'label' => esc_html__( 'Price', 'edus-master' ),

			'type' => Controls_Manager::TEXT,

			'default' => esc_html__( '250', 'edus-master' ),

			'description' => esc_html__( 'enter price', 'edus-master' )

		] );

		$repeater->add_control( 'sign', [

			'label' => esc_html__( 'Sign', 'edus-master' ),

			'type' => Controls_Manager::TEXT,

			'default' => esc_html__( '$', 'edus-master' ),

			'description' => esc_html__( 'enter sign', 'edus-master' )

		] );

		$repeater->add_control( 'month', [

			'label' => esc_html__( 'Month', 'edus-master' ),

			'type' => Controls_Manager::TEXT,

			'default' => esc_html__( '/mo', 'edus-master' ),

			'description' => esc_html__( 'enter month', 'edus-master' )

		] );

		$repeater->add_control( 'btn_text', [

			'label' => esc_html__( 'Button Text', 'edus-master' ),

			'type' => Controls_Manager::TEXT,

			'default' => esc_html__( 'Get Started', 'edus-master' ),

			'description' => esc_html__( 'enter button text', 'edus-master' )

		] );

		$repeater->add_control( 'btn_link', [

			'label' => esc_html__( 'Button Link', 'edus-master' ),

			'type' => Controls_Manager::URL,

			'default' => array(

				'url' => '#'

			),

			'description' => esc_html__( 'enter button link', 'edus-master' )

		] );
		$repeater->add_control(

			'feature', [

				'label' => esc_html__( 'Feature Item', 'edus-master' ),

				'type' => Controls_Manager::TEXTAREA,

				'default' => esc_html__( '100 GB Hosting', 'edus-master' ),

				'description' => esc_html__( 'enter feature item', 'edus-master' )

			]

		);
		$this->add_control(
			'price-plan-list',
			[
				'label'       => esc_html__( 'Price Plan Item', 'libo-master' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section( 'price_plan_styling_section', [

			'label' => esc_html__( 'Styling Settings', 'edus-master' ),

			'tab' => Controls_Manager::TAB_STYLE

		] );


		$this->start_controls_tabs(

			'price_plan_style_tabs'

		);


		$this->start_controls_tab(

			'price_plan_style_normal_tab',

			[

				'label' => __( 'Normal', 'edus-master' ),

			]

		);

		$this->add_group_control( Group_Control_Background::get_type(), [

			'name' => 'price_plan_background',

			'label' => esc_html__( 'Price Plan Background ', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01"

		] );

		$this->add_control( 'title_color', [

			'label' => esc_html__( 'Title Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}} .single-price-plan-01 .price-header .title" => "color: {{VALUE}}"

			]

		] );

		$this->add_control( 'price_color', [

			'label' => esc_html__( 'Price Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}}  .single-price-plan-01 .price-wrap" => "color: {{VALUE}}"

			]

		] );

		$this->add_control( 'features_color', [

			'label' => esc_html__( 'Features Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}} .single-price-plan-01 .price-body ul li" => "color: {{VALUE}}"

			]

		] );


		$this->end_controls_tab();


		$this->start_controls_tab(

			'price_plan_style_hover_tab',

			[

				'label' => __( 'Hover', 'edus-master' ),

			]

		);

		$this->add_group_control( Group_Control_Background::get_type(), [

			'name' => 'price_plan_hover_background',

			'label' => esc_html__( 'Price Plan Background ', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01:hover"

		] );

		$this->add_control( 'title_hover_color', [

			'label' => esc_html__( 'Title Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}} .single-price-plan-01:hover .price-header .title" => "color: {{VALUE}}"

			]

		] );

		$this->add_control( 'price_hover_color', [

			'label' => esc_html__( 'Price Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}} .single-price-plan-01:hover .price-wrap" => "color: {{VALUE}}"

			]

		] );

		$this->add_control( 'features_hover_color', [

			'label' => esc_html__( 'Features Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}} .single-price-plan-01:hover .price-body ul li" => "color: {{VALUE}}"

			]

		] );


		$this->end_controls_tab();


		$this->end_controls_tabs();


		$this->end_controls_section();

		/* button styling */

		$this->start_controls_section( 'price_plan_button_section', [

			'label' => esc_html__( 'Button Settings', 'edus-master' ),

			'tab' => Controls_Manager::TAB_STYLE

		] );


		$this->start_controls_tabs( 'button_styling' );

		$this->start_controls_tab( 'normal_style', [

			'label' => esc_html__( 'Button Normal', "edus-master" )

		] );

		$this->add_control( 'button_normal_color', [

			'label' => esc_html__( 'Button Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}} .single-price-plan-01 .price-footer .btn-wrapper .boxed-btn" => "color: {{VALUE}}"

			]

		] );

		$this->add_control( 'divider_01', [

			'type' => Controls_Manager::DIVIDER

		] );

		$this->add_group_control( Group_Control_Background::get_type(), [

			'name' => 'button_background',

			'label' => esc_html__( 'Button Background ', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01 .price-footer .btn-wrapper .boxed-btn"

		] );

		$this->add_control( 'divider_02', [

			'type' => Controls_Manager::DIVIDER

		] );

		$this->add_group_control( Group_Control_Border::get_type(), [

			'name' => 'price_plan_button_border',

			'label' => esc_html__( 'Border', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01 .price-footer .btn-wrapper .boxed-btn"

		] );


		$this->end_controls_tab();


		$this->start_controls_tab( 'hover_style', [

			'label' => esc_html__( 'Button Hover', "edus-master" )

		] );

		$this->add_control( 'button_hover_normal_color', [

			'label' => esc_html__( 'Button Color', 'edus-master' ),

			'type' => Controls_Manager::COLOR,

			'selectors' => [

				"{{WRAPPER}} .single-price-plan-01 .price-footer .btn-wrapper .boxed-btn:hover" => "color: {{VALUE}}"

			]

		] );

		$this->add_control( 'divider_03', [

			'type' => Controls_Manager::DIVIDER

		] );

		$this->add_group_control( Group_Control_Background::get_type(), [

			'name' => 'button_hover_background',

			'label' => esc_html__( 'Button Background ', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01 .price-footer .btn-wrapper .boxed-btn:hover"

		] );

		$this->add_control( 'divider_04', [

			'type' => Controls_Manager::DIVIDER

		] );

		$this->add_group_control( Group_Control_Border::get_type(), [

			'name' => 'price_plan_hover_button_border',

			'label' => esc_html__( 'Border', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01 .price-footer .btn-wrapper .boxed-btn:hover"

		] );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control( 'divider_05', [

			'type' => Controls_Manager::DIVIDER

		] );

		$this->add_control(

			'button_border_radius',

			[

				'label' => esc_html__( 'Border Radius', 'edus-master' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%' ],

				'selectors' => [

					'{{WRAPPER}} .btn-wrapper .boxed-btn.gd-bg-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);

		$this->end_controls_section();

		/* button styling end */


		/* typography settings start */

		$this->start_controls_section( 'typography_settings', [

			'label' => esc_html__( 'Typography Settings', 'edus-master' ),

			'tab' => Controls_Manager::TAB_STYLE

		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [

			'name' => 'title_typography',

			'label' => esc_html__( 'Title Typography', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01 .price-header .name"

		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [

			'name' => 'price_typography',

			'label' => esc_html__( 'Price Typography', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01 .price-header .price-wrap .price"

		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [

			'name' => 'features_typography',

			'label' => esc_html__( 'Features Typography', 'edus-master' ),

			'selector' => "{{WRAPPER}} .single-price-plan-01 .price-body ul"

		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [

			'name' => 'button_typography',

			'label' => esc_html__( 'Button Typography', 'edus-master' ),

			'selector' => "{{WRAPPER}} .btn-wrapper .boxed-btn"

		] );

		$this->end_controls_section();

		/* typography settings end */

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

		$price_plan_item = $settings['price-plan-list'];
		?>
        <div class="price-plan-tabs">
            <div class="custom-tabs-menu">
                <ul class="custom-flex nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="monthly-tab" data-toggle="tab" href="#monthly"><?php echo esc_html( $settings['month_label'] ); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly"><?php echo esc_html( $settings['year_label'] ); ?></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                    <div class="tab-inner">
                        <ul class="tab-content-wrap">
							<?php foreach ( $price_plan_item as $details_item ) :
								if ( 'monthly' == $details_item['choose_package'] ) {
									continue;
								}
								?>
                                <li class="single-price-plan-01 <?php echo esc_attr( $details_item['active_package'] ); ?>">
                                    <div class="price-header">
                                        <h4 class="title"><?php echo esc_html( $details_item['title'] ); ?></h4>
                                    </div>
                                    <div class="price-body">
                                        <div class="price-wrap">
                                            <div class="price"><?php echo esc_html( $details_item['sign'] ); ?><?php echo esc_html( $details_item['price'] ); ?><sub><?php echo esc_html( $details_item['month'] ); ?></sub></div>
                                        </div>
                                        <ul>
											<?php
											$all_feature_items = explode( "\n", $details_item['feature'] );
											foreach ( $all_feature_items as $feature ) {
												printf( '<li><i class="fa fa-check success"></i>%1$s</li>', esc_html( $feature ) );
											}
											?>
                                        </ul>
                                    </div>
                                    <div class="price-footer">
                                        <div class="btn-wrapper">
                                            <a href="<?php echo esc_url( $details_item['btn_link']['url'] ); ?>"
                                               class="boxed-btn"><?php echo esc_html( $details_item['btn_text'] ); ?></a>
                                        </div>
                                    </div>
                                </li>
							<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                    <div class="tab-inner">
                        <ul class="tab-content-wrap">
							<?php foreach ( $price_plan_item as $details_item ) :
								if ( 'yearly' == $details_item['choose_package'] ) {
									continue;
								}
								?>
                                <li class="single-price-plan-01 <?php echo esc_attr( $details_item['active_package'] ); ?>">
                                    <div class="price-header">
                                        <h4 class="title"><?php echo esc_html( $details_item['title'] ); ?></h4>
                                    </div>
                                    <div class="price-body">
                                        <div class="price-wrap">
                                            <div class="price"><?php echo esc_html( $details_item['sign'] ); ?><?php echo esc_html( $details_item['price'] ); ?><sub><?php echo esc_html( $details_item['month'] ); ?></sub></div>
                                        </div>
                                        <ul>
											<?php
											$all_feature_items = explode( "\n", $details_item['feature'] );
											foreach ( $all_feature_items as $feature ) {
												printf( '<li><i class="fa fa-check success"></i>%1$s</li>', esc_html( $feature ), );
											}
											?>
                                        </ul>
                                    </div>
                                    <div class="price-footer">
                                        <div class="btn-wrapper">
                                            <a href="<?php echo esc_url( $details_item['btn_link']['url'] ); ?>"
                                               class="boxed-btn"><?php echo esc_html( $details_item['btn_text'] ); ?></a>
                                        </div>
                                    </div>
                                </li>
							<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<?php

	}

}


Plugin::instance()->widgets_manager->register_widget_type( new Edus_Price_Plan_One_Widget() );