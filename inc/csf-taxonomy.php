<?php
/*
 * Theme Taxonomy Options
 * @package Edus
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( class_exists('CSF') ){

	$allowed_html = edus_master()->kses_allowed_html(array('mark'));

	$prefix = 'edus';
	/*-------------------------------------
		Service Category Options
	-------------------------------------*/
	CSF::createTaxonomyOptions( $prefix .'_course_category', array(
		'taxonomy'  => 'course-cat',
		'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
	) );

	// Create a section
	CSF::createSection( $prefix .'_course_category', array(
		'fields' => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon','edus'),
				'default' => 'flaticon-businessman'
			),
		)
	) );
    /*-------------------------------------
        Case Study Category Options
    -------------------------------------*/
    CSF::createTaxonomyOptions( $prefix .'_event_category', array(
        'taxonomy'  => 'event-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_event_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','edus'),
                'default' => 'flaticon-statistics'
            ),
        )
    ) );
    /*-------------------------------------
     Portfolio Category Options
  -------------------------------------*/
    CSF::createTaxonomyOptions( $prefix .'_mentor_category', array(
        'taxonomy'  => 'mentor-cat',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    // Create a section
    CSF::createSection( $prefix .'_mentor_category', array(
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Icon','edus'),
                'default' => 'flaticon-suitcase'
            ),
        )
    ) );


}//endif