<?php
if (!defined('ABSPATH')){
	exit(); //exit if access it directly
}
/*
* Theme Excerpt Class
* @since 1.0.0
* @source https://gist.github.com/bgallagh3r/8546465
*/
if (!class_exists('Edus_Master_excerpt')):
class Edus_Master_excerpt {

    public static $length = 55;

    public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100,
      'promo'=>15
    );

    public static $more = true;

    /**
    * Sets the length for the excerpt,
    * then it adds the WP filter
    * And automatically calls the_excerpt();
    *
    * @param string $new_length
    * @return void
    * @author Baylor Rae'
    */
    public static function length($new_length = 55, $more = true) {
        Edus_Master_excerpt::$length = $new_length;
        Edus_Master_excerpt::$more = $more;

        add_filter( 'excerpt_more', 'Edus_Master_excerpt::auto_excerpt_more' );

        add_filter('excerpt_length', 'Edus_Master_excerpt::new_length');

        Edus_Master_excerpt::output();
    }

    public static function new_length() {
        if( isset(Edus_Master_excerpt::$types[Edus_Master_excerpt::$length]) )
            return Edus_Master_excerpt::$types[Edus_Master_excerpt::$length];
        else
            return Edus_Master_excerpt::$length;
    }

    public static function output() {
        the_excerpt();
    }

    public static function continue_reading_link() {

        return '<span class="readmore"><a href="'.get_permalink().'">'.esc_html__('Read More','edus-master').'</a></span>';
    }

    public static function auto_excerpt_more( ) {
        if (Edus_Master_excerpt::$more) :
            return ' ';
        else :
            return ' ';
        endif;
    }

} //end class
endif;

if (!function_exists('edus_master_excerpt')){

	function Edus_Master_excerpt($length = 55, $more=true) {
		Edus_Master_excerpt::length($length, $more);
	}

}


?>