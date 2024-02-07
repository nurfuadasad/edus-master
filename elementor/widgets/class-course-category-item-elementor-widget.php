<?php
/**
 * Elementor Widget
 * @package Edus
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Course_Category_Item_Widget extends Widget_Base
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
        return 'edus-course-category-item-widget';
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
        return esc_html__('Course Category Item : 01', 'edus-master');
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

        $this->add_control('title', [
            'label' => esc_html__('Title', 'edus-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('UI/UX Design', 'edus-master')
        ]);
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'edus-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'edus-master'),
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'edus-master'),
                'default' => [
                    'value' => 'fas fa-user-tie',
                    'library' => 'solid',
                ]
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'edus-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .course-category-item .content .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .course-category-item .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('border_color', [
            'label' => esc_html__('Border Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .course-category-item" => "border-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_styling_settings', [
            'type' => Controls_Manager::DIVIDER
        ]);

        $this->add_control('background_color', [
            'label' => esc_html__('Background Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .course-category-item:hover:before" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .course-category-item:hover .content .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('icon_hover_color', [
            'label' => esc_html__('Icon Hover Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .course-category-item:hover .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        /* icon hover controls tabs end */


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
            'selector' => "{{WRAPPER}} .course-category-item .content .title"
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
        ?>
        <div class="course-category-item">
            <div class="icon">
                <?php
                Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                ?>
            </div>
            <div class="content">
                <h5 class="title">
                    <a <?php echo edus_master()->render_elementor_link_attributes($settings['link']) ?>>
                        <?php echo esc_html($settings['title']); ?>
                    </a>
                </h5>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Course_Category_Item_Widget());