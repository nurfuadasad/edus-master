<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Back_Top_Widget extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'edus-back-top-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Back Top: 01', 'edus-master' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-arrow-up';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
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

        if ( version_compare( ELEMENTOR_VERSION, '2.6.0', '>=' ) ) {
            $this->add_control(
                'icon',
                [
                    'label'       => esc_html__( 'Icon', 'edus-master' ),
                    'type'        => Controls_Manager::ICONS,
                    'description' => esc_html__( 'select Icon.', 'edus-master' ),
                    'default'     => [
                        'value'   => 'fas fa-star',
                        'library' => 'solid',
                    ]
                ]
            );
        } else {
            $this->add_control(
                'icon',
                [
                    'label'       => esc_html__( 'Icon', 'edus-master' ),
                    'type'        => Controls_Manager::ICON,
                    'description' => esc_html__( 'select Icon.', 'edus-master' ),
                    'default'     => 'flaticon-vector'
                ]
            );
        }

        $this->end_controls_section();

        $this->start_controls_section(
            'button_gd_two_section',
            [
                'label' => esc_html__( 'Styling', 'edus-master' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('button_two_background');

        $this->start_controls_tab('normal_two_style',[
            'label' => esc_html__('Normal','edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(),[
            'name' => 'gd_two_background',
            'selector' => "{{WRAPPER}} .back-to-top",
            'description' => esc_html__('background','edus-master')
        ]);
        $this->add_control( 'gd_two_text_color', [
            'label'       => esc_html__( 'Color', 'edus-master' ),
            'type'        => Controls_Manager::COLOR,
            'description' => esc_html__( 'change color', 'edus-master' ),
            'selectors'   => [
                "{{WRAPPER}} .back-to-top" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_group_control(Group_Control_Border::get_type(),[
            'name' => 'button_normal_border',
            'label' => esc_html__('Border','edus-master'),
            'selector' => "{{WRAPPER}} .back-to-top"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('hover_two_style',[
            'label' => esc_html__('Hover','edus-master')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(),[
            'name' => 'edus_button_hover_background',
            'selector' => "{{WRAPPER}} .back-to-top:hover",
            'description' => esc_html__('hover background','edus-master')
        ]);
        $this->add_control( 'gd_two_hover_text_color', [
            'label'       => esc_html__( ' Color', 'edus-master' ),
            'type'        => Controls_Manager::COLOR,
            'description' => esc_html__( 'change color', 'edus-master' ),
            'selectors'   => [
                "{{WRAPPER}} .back-to-top:hover" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_group_control(Group_Control_Background::get_type(),[
            'name' => 'edus_gd_two_hover_background',
            'selector' => "{{WRAPPER}} .back-to-top:hover",
            'description' => esc_html__(' hover background','edus-master')
        ]);
        $this->add_group_control(Group_Control_Border::get_type(),[
            'name' => 'button_hover_border',
            'label' => esc_html__('Border','edus-master'),
            'selector' => "{{WRAPPER}} .back-to-top:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

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
        <div class="back-to-top">
            <span class="back-top">
                <?php
                if ( version_compare( ELEMENTOR_VERSION, '2.6.0', '>=' ) ) {
                    ! empty( $settings['icon']['value'] ) ? Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ) : '';
                } else {
                    ! empty( $settings['icon'] ) ? printf( '<i class="%1$s"></i>', esc_attr( $settings['icon'] ) ) : '';
                }
                ?>
            </span>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Edus_Back_Top_Widget() );