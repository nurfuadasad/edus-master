<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Edus_Contact_Info_List_One extends Widget_Base
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
        return 'edus-contact-Info-List-one-widget';
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
        return esc_html__('Contact Box List: 01', 'edus-master');
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
        return 'eicon-radio';
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
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'edus-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'edus-master'),
                'default' => [
                    'value' => 'far fa-map',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control('title', [
            'label' => esc_html__('Title', 'edus-master'),
            'type' => Controls_Manager::TEXT,
            'description' => esc_html__('Enter title', 'edus-master'),
            'default' => esc_html__('Office Address', 'edus-master')
        ]);
        $this->add_control('description', [
            'label' => esc_html__('Description', 'edus-master'),
            'type' => Controls_Manager::TEXTAREA,
            'description' => esc_html__('Enter description ', 'edus-master'),
            'default' => esc_html__('99 NY Address street, Brooklyn, United State', 'edus-master')
        ]);

        $this->end_controls_section();
        $this->start_controls_section('contact_info_list_styling_section', [
            'label' => esc_html__('Styling Settings', 'edus-master'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-contact-item .icon" => "color: {{VALUE}}"
            ]
        ]);
	    $this->add_control('bg_icon_color', [
		    'label' => esc_html__('Icon Background Color', 'edus-master'),
		    'type' => Controls_Manager::COLOR,
		    'selectors' => [
			    "{{WRAPPER}} .single-contact-item .icon" => "background-color: {{VALUE}}"
		    ]
	    ]);
	    $this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
			    'name' => 'box_shadow',
			    'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
			    'selector' => '{{WRAPPER}} .single-contact-item .icon',
		    ]
	    );
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-contact-item .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('description_color', [
            'label' => esc_html__('Description Color', 'edus-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-contact-item .content .details" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        $this->start_controls_section('contact_info_list_typography_section', [
            'label' => esc_html__('Typography Settings', 'edus-master'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'edus-master'),
                'description' => esc_html__('select Title typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .single-contact-item .content .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'edus-master'),
                'description' => esc_html__('select Paragraph typography', 'edus-master'),
                'selector' => '{{WRAPPER}} .single-contact-item .content .details',
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="contact-info-list-wrapper">
            <div class="single-contact-item">
                <div class="icon">
                    <?php
                        Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                    ?>
                </div>
                <div class="content">
                    <h4 class="title"><?php echo esc_html($settings['title']); ?></h4>
                    <?php
                    $details_item = explode("\n", $settings['description']);
                    foreach ($details_item as $detail) {
                        printf('<span class="details">%1$s</span>', esc_html($detail));
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Edus_Contact_Info_List_One());