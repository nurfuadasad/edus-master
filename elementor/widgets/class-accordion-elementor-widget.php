<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Accordion_One extends Widget_Base {

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
        return 'edus-accordion-one-widget';
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
        return esc_html__( 'Accordion 01', 'edus-master' );
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
        return 'eicon-editor-list-ul';
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label'       => esc_html__( 'Title', 'edus-master' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'enter title.', 'edus-master' ),
                'default'     => esc_html__( 'How to import my whole data?', 'edus-master' )
            ]
        );
        $repeater->add_control(
            'description', [
                'label'       => esc_html__( 'Description', 'edus-master' ),
                'type'        => Controls_Manager::TEXTAREA,
                'description' => esc_html__( 'enter text.', 'edus-master' ),
                'default'     => esc_html__( 'Duis aute irure dolor reprehenderit in voluptate velit essle cillum dolore eu fugiat nulla pariatur. Excepteur sint ocaec at cupdatat proident suntin culpa qui officia deserunt mol anim id esa laborum perspiciat.', 'edus-master' )
            ]
        );
        $this->add_control('accordion_items', [
            'label' => esc_html__('Accordion Item', 'edus-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'title'        => esc_html__( 'How to import my whole data?', 'edus-master' ),
                    'description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco lab oris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.','edus-master'),
                ]
            ],

        ]);
        $this->end_controls_section();


        /*  tab styling tabs start */
        $this->start_controls_section(
            'tab_settings_section',
            [
                'label' => esc_html__('Tab Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'tab_style_tabs'
        );

        $this->start_controls_tab(
            'tab_style_normal_tab',
            [
                'label' => __('Expanded Style', 'edus-master'),
            ]
        );

        $this->add_control('tab_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-header a[aria-expanded=true]" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_paragraph_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Paragraph Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-body" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_icon_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-header a:after" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_icon_bg_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Background Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-header a:after" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Background', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-body" => "background-color: {{VALUE}}",
                "{{WRAPPER}} .accordion-wrapper .card .card-header a[aria-expanded=true]" => "background-color: {{VALUE}}",
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_hover_tab',
            [
                'label' => esc_html__('Normal', 'edus-master'),
            ]
        );

        $this->add_control('tab_hover_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-header a" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_hover_paragraph_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Paragraph Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-body" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_hover_icon_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-header a[aria-expanded=false]:after" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_hover_icon_bg_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Background Color', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-header a[aria-expanded=false]:after" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_hover_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Background', 'edus-master'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-body" => "background-color: {{VALUE}}",
                "{{WRAPPER}} .accordion-wrapper .card .card-header a" => "background-color: {{VALUE}}",
            ]
        ]);


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        /*  tab styling tabs end */

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'edus-master'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .accordion-wrapper .card .card-header a"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Paragraph Typography', 'edus-master'),
            'name' => 'paragraph_typography',
            'description' => esc_html__('select Paragraph typography', 'edus-master'),
            'selector' => "{{WRAPPER}} .accordion-wrapper .card .card-body"
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
    protected function render() {
        $settings = $this->get_settings_for_display();
        $accordion_items = $settings['accordion_items'];
        $random_number = rand(999,999999);
        ?>
        <div class="accordion-wrapper">
            <div id="accordion-<?php echo esc_attr($random_number);?>">
                <?php
                $a = 0;
                foreach ( $accordion_items as $item ):
                    $collapse_class = (0 == $a) ? '' : 'collapsed';
                    $show_class = (0 == $a) ? 'show' : '';
                    $aria_expanded = (0 == $a) ? 'true' : 'false';
                    $a++;
                    $random__item_number = rand(999,999999);
                    ?>
                    <div class="card">
                        <div class="card-header" id="headingOne_<?php echo esc_attr($random__item_number);?>">
                            <h5 class="mb-0">
                                <a class="<?php echo esc_attr($collapse_class);?>" data-toggle="collapse" role="button" data-target="#collapseOne_<?php echo esc_attr($random__item_number);?>" aria-expanded="<?php echo esc_attr($aria_expanded);?>" aria-controls="collapseOne_<?php echo esc_attr($random__item_number);?>">
                                    <?php echo esc_html($item['title']);?>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne_<?php echo esc_attr($random__item_number);?>" class="collapse <?php echo esc_attr($show_class); ?>"  data-parent="#accordion-<?php echo esc_attr($random_number);?>">
                            <div class="card-body">
                                <?php echo esc_html($item['description']);?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Accordion_One() );