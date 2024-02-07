<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Single_Skill_Item_Widget extends Widget_Base {

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
        return 'edus-skill-item-widget';
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
        return esc_html__( 'Skill Item: 01', 'edus-master' );
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
                'label' => esc_html__('General Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'edus-master'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'edus-master'),
                'default' => esc_html__('Experience', 'edus-master')
            ]
        );
        $this->add_control(
            'number',
            [
                'label' => esc_html__('Count Number', 'edus-master'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter number.', 'edus-master'),
                'default' => esc_html__('60', 'edus-master')
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Background Image', 'edus-master'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('select Image.', 'edus-master'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__( 'List Menu Styling Settings', 'edus-master' ),
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
        $this->add_control( 'title_color', [
            'label'     => esc_html__( 'Title Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-skill-item  .title" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'number_title_color', [
            'label'     => esc_html__( 'Number Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-skill-item .count" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'content_color', [
            'label'     => esc_html__( 'Background Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-skill-item:before" => "background-color: {{VALUE}}"
            ]
        ] );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'edus-master' ),
            ]
        );
        $this->add_control( 'hover_title_color', [
            'label'     => esc_html__( 'Title Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-skill-item:hover .title" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'hover_number_title_color', [
            'label'     => esc_html__( 'Number Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-skill-item:hover .count" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'content_hover_color', [
            'label'     => esc_html__( 'Background Color', 'edus-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-skill-item:after" => "background-color: {{VALUE}}"
            ]
        ] );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__( 'List Menu Typography Styling Settings', 'edus-master' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => esc_html__( 'Title Typography', 'edus-master' ),
                'selector' => '{{WRAPPER}} .single-skill-item .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'count_typography',
                'label'    => esc_html__( 'Number Typography', 'edus-master' ),
                'selector' => '{{WRAPPER}} .single-skill-item .count',
            ]
        );
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

        $image_id = $settings['image']['id'];
        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full')[0] : '';
        ?>
        <div class="single-skill-item" style="background-image: url(<?php echo esc_url($image_url)?>);">
            <div class="counter">
                <div class="count"><?php echo esc_html($settings['number']) ?><span>%</span></div>
            </div>
            <p class="title"><?php echo esc_html($settings['title'])?></p>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Single_Skill_Item_Widget() );