<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Core_Single_Item_Widget extends Widget_Base
{

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
    public function get_name()
    {
        return 'edus-core-single-item-widget';
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
    public function get_title()
    {
        return esc_html__('Core Feature Item', 'edus-master');
    }

    public function get_keywords()
    {
        return ['ir-tech', 'edus', 'image box'];
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
    public function get_icon()
    {
        return 'eicon-image';
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
    public function get_categories()
    {
        return ['edus_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
	    $repeater->add_control(
		    'tab_position',
		    [
			    'label'   => esc_html__( 'Image Position', 'edus-master' ),
			    'type'    => Controls_Manager::SELECT,
			    'default' => '',
			    'options' => [
				    ''  => esc_html__( 'Left Image', 'edus-master' ),
				    'style-01' => esc_html__( 'Right Image', 'edus-master' ),
			    ],
		    ]
	    );
        $repeater->add_control('title', [
            'label' => esc_html__('Title', 'edus-master'),
            'type' => Controls_Manager::TEXTAREA,
            'description' => esc_html__( 'enter title. use {c} color text {/c} for color text', 'edus-master' ),
            'default' => esc_html__('Graduate Research With Us Offers.', 'edus-master')
        ]);
	    $repeater->add_control('subtitle', [
		    'label' => esc_html__('Subtitle', 'edus-master'),
		    'type' => Controls_Manager::TEXTAREA,
		    'default' => esc_html__('See the E Learning Tools your competitors are already using to heriangton..', 'edus-master')
	    ]);
        $repeater->add_control('tab-menu', [
            'label' => esc_html__('Menu Item', 'edus-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('What We Do', 'edus-master')
        ]);
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'edus-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
            ]
        );
        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'edus-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('See the E Learning Tools your competitors are already using - Start Now! GetApp helps more than 800k businesses find the best software for their needs to know about our mission.', 'edus-master')
        ]);
         $repeater->add_control('second_description', [
            'label' => esc_html__('Second Description', 'edus-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Joe Pulizzi published an epic post, Why Education is a Powerful Content Marketing Strategy: 17 Examples.', 'edus-master')
        ]);
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'edus-master'),
            ]
        );
        $repeater->add_control('read-btn', [
            'label' => esc_html__('Read Button', 'edus-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__(' Become A Student', 'edus-master')
        ]);
        $this->add_control(
            'case-study-list',
            [
                'label' => esc_html__('Case Study List', 'edus-master'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'slider_navigation_styling_settings_section',
            [
                'label' => esc_html__('Slider Nav Styling Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
        );

        $this->start_controls_tab(
            'active_hover_style_normal_tab',
            [
                'label' => esc_html__('Active and Hover Style', 'edus-master'),
            ]
        );
        $this->add_control('normal_icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link.active i" => "color: {{VALUE}}",
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link:hover i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_text_color', [
            'label' => esc_html__('Icon Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link.active span" => "color: {{VALUE}}",
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link:hover span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_icon_bg_color', [
            'label' => esc_html__('Icon Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link:hover" => "background-color: {{VALUE}}",
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link.active" => "background-color: {{VALUE}}",
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link.active:after" => "border-bottom-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_cat_color', [
            'label' => esc_html__('Category Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_title_color', [
            'label' => esc_html__('Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_description_color', [
            'label' => esc_html__('Description Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_button_color', [
            'label' => esc_html__('Button Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side .read-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_bg_color', [
            'label' => esc_html__('Button Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side .read-btn" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side i" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Normal', 'edus-master'),
            ]
        );
        $this->add_control('hover _icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover _text_color', [
            'label' => esc_html__('Icon Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover _icon_bg_color', [
            'label' => esc_html__('Icon Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .custom-tabs-menu .nav-item .nav-link" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('case_hover_button_color', [
            'label' => esc_html__('Button Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side .read-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_hover_bg_color', [
            'label' => esc_html__('Button Background Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner .right-side .read-btn:hover" => "background-color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Typography Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_title_typography',
            'label' => esc_html__('Title Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .case-study-tabs .tab-inner .right-side .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_description_typography',
            'label' => esc_html__('Description Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .case-study-tabs .tab-inner .right-side p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_category_typography',
            'label' => esc_html__('Category Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .case-study-tabs .tab-inner .right-side span"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_button_typography',
            'label' => esc_html__('Button Typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .case-study-tabs .tab-inner .right-side .read-btn"
        ]);
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $case_study_tab_item = $settings['case-study-list'];

        ?>
        <div class="case-study-tabs">
            <ul class="custom-flex custom-tabs-menu nav nav-tabs row">
                <?php foreach ($case_study_tab_item as $key => $item) : ?>
                    <li class="nav-item">
                        <a href="#finance-<?php echo esc_attr($key); ?>"
                           class="nav-link <?php if ($key == 0): ?>active show<?php endif; ?>" data-toggle="tab">
                            <?php echo esc_html($item['tab-menu']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content">
                <?php foreach ($case_study_tab_item as $key => $details_item) :
                    $image_id = $details_item['image']['id'];
                    $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                    ?>
                    <div class="tab-pane fade <?php if ($key == 0) : ?> active show <?php endif; ?>"
                         id="finance-<?php echo esc_attr($key); ?>">
                        <div class="tab-inner <?php echo $details_item['tab_position'] ?>">
                            <?php if (!empty($image_url)) : ?>
                                <div class="tab-thumb">
                                    <img src="<?php echo esc_url($image_url); ?>"
                                         alt="<?php echo esc_attr($image_alt); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="tab-content-wrap">
                                <div class="right-side">
                                    <h3 class="title"><a href="#">
		                                    <?php
		                                    $title = str_replace( [ '{c}', '{/c}' ], [ '<span>', '</span>' ], $details_item['title'] );
		                                    print wp_kses( $title, edus_master()->kses_allowed_html( 'all' ) );
		                                    ?>
                                        </a>
                                    </h3>
                                    <span><?php echo esc_html($details_item['subtitle']) ?></span>
                                    <p><?php echo esc_html($details_item['description']) ?></p>
                                    <p><?php echo esc_html($details_item['second_description']) ?></p>
                                    <a <?php echo edus_master()->render_elementor_link_attributes($details_item['link']) ?>
                                            class="read-btn"><i class="far fa-user"></i><?php echo esc_html($details_item['read-btn']) ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Core_Single_Item_Widget());