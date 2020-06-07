<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'after_setup_theme', 'crb_load',99 );
function crb_load() {
    if (!class_exists('\Carbon_Fields\Carbon_Fields')) {
		require_once( BS_PATH. '/lib/carbon-fields/vendor/autoload.php' ); 
	}
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'bs_slider_attach_post_meta' );
// function 
function bs_slider_attach_post_meta(){

    Container::make( 'post_meta', __( 'Slider option' ) )
        ->where( 'post_type', '=', 'bs_slider' )
        ->add_fields( array(
        	Field::make( 'checkbox', 'crb_show_pagination', __( 'Show Pagination' ) )->set_option_value( 'yes' ),
	        Field::make( 'checkbox', 'crb_show_arrow', __( 'Show Pagination' ) )->set_option_value( 'yes' ),
            Field::make( 'select', 'select_slider_type', __( 'Choose slider type' ) )
			    ->set_options( array(
			        'main_slider' => __('Main Slider','bs-slider'),
			        'category_slider' => __('Woocommerce Category','bs-slider'),
			    ) ),

		    Field::make( 'complex', 'slider_item', 'Items' )
		    	->set_layout( 'tabbed-vertical' )
			    ->set_conditional_logic( array(
			        'relation' => 'AND', // Optional, defaults to "AND"
			        array(
			            'field' => 'select_slider_type',
			            'value' => 'main_slider', // Optional, defaults to "". 
			            'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
			        )
			    ) )
	            ->add_fields( array(
	                
	                Field::make( 'image', 'main_slider_image', __( 'Slider Image' ) ),
	                Field::make( 'complex', 'slider_title', __( 'Add more content ' ) )
	                ->set_layout( 'tabbed-vertical' )
				    ->add_fields( array(
				        Field::make( 'textarea', 'main_slider_title', __( 'Slide Content' ) )
				        	->set_help_text( 'Enter text here' ),
				        Field::make( 'text', 'animation_duration', __( 'Animation duration' ) )
				        	->set_help_text( 'Animation duration Example: 0.5s' ),
				        Field::make( 'text', 'animation_delay', __( 'Animation delay' ) )
				        	->set_help_text( 'Animation delay Example: 0.5s' ),
						Field::make( 'select', 'select_slider_animation', __( 'Choose slider Animation' ) )
						    ->set_options( array(
								'none'=> '--Select One--' ,
								'bounce'=> 'bounce' ,
								'flash'=> 'flash' ,
								'pulse'=> 'pulse' ,
								'rubberBand'=> 'rubberBand' ,
								'shakeX'=> 'shakeX' ,
								'shakeY'=> 'shakeY' ,
								'headShake'=> 'headShake' ,
								'swing'=> 'swing' ,
								'tada'=> 'tada' ,
								'wobble'=> 'wobble' ,
								'jello'=> 'jello' ,
								'heartBeat'=> 'heartBeat' ,
								'backInDown'=> 'backInDown' ,
								'backInLeft'=> 'backInLeft' ,
								'backInRight'=> 'backInRight' ,
								'backInUp'=> 'backInUp' ,
								'backOutDown'=> 'backOutDown' ,
								'backOutLeft'=> 'backOutLeft' ,
								'backOutRight'=> 'backOutRight' ,
								'backOutUp'=> 'backOutUp' ,
								'bounceIn'=> 'bounceIn' ,
								'bounceInDown'=> 'bounceInDown' ,
								'bounceInLeft' => 'bounceInLeft' ,
								'bounceInRight' => 'bounceInRight' ,
								'bounceInUp' => 'bounceInUp' ,
								'bounceOut' => 'bounceOut' ,
								'bounceOutDown' => 'bounceOutDown' ,
								'bounceOutLeft' => 'bounceOutLeft' ,
								'bounceOutRight' => 'bounceOutRight' ,
								'bounceOutUp' => 'bounceOutUp' ,
								'fadeIn' => 'fadeIn' ,
								'fadeInDown' => 'fadeInDown' ,
								'fadeInDownBig' => 'fadeInDownBig' ,
								'fadeInLeft' => 'fadeInLeft' ,
								'fadeInLeftBig' => 'fadeInLeftBig' ,
								'fadeInRight' => 'fadeInRight' ,
								'fadeInRightBig' => 'fadeInRightBig' ,
								'fadeInUp' => 'fadeInUp' ,
								'fadeInUpBig' => 'fadeInUpBig' ,
								'fadeInTopLeft' => 'fadeInTopLeft' ,
								'fadeInTopRight' => 'fadeInTopRight' ,
								'fadeInBottomLeft' => 'fadeInBottomLeft' ,
								'fadeInBottomRight' => 'fadeInBottomRight' ,
								'fadeOut' => 'fadeOut' ,
								'fadeOutDown' => 'fadeOutDown' ,
								'fadeOutDownBig' => 'fadeOutDownBig' ,
								'fadeOutLeft' => 'fadeOutLeft' ,
								'fadeOutLeftBig' => 'fadeOutLeftBig' ,
								'fadeOutRight' => 'fadeOutRight' ,
								'fadeOutRightBig' => 'fadeOutRightBig' ,
								'fadeOutUp' => 'fadeOutUp' ,
								'fadeOutUpBig' => 'fadeOutUpBig',
								'fadeOutTopLeft' => 'fadeOutTopLeft',
								'fadeOutTopRight' => 'fadeOutTopRight',
								'fadeOutBottomRight' => 'fadeOutBottomRight',
								'fadeOutBottomLeft' => 'fadeOutBottomLeft',
								'flip' => 'flip',
								'flipInX' => 'flipInX',
								'flipInY' => 'flipInY',
								'flipOutX' => 'flipOutX',
								'flipOutY' => 'flipOutY',
								'Lightspeed' => 'Lightspeed',
								'lightSpeedInRight' => 'lightSpeedInRight',
								'lightSpeedInLeft' => 'lightSpeedInLeft',
								'lightSpeedOutRight' => 'lightSpeedOutRight',
								'lightSpeedOutLeft' => 'lightSpeedOutLeft',
								'rotateIn' => 'rotateIn',
								'rotateInDownLeft' => 'rotateInDownLeft',
								'rotateInDownRight' => 'rotateInDownRight',
								'rotateInUpLeft' => 'rotateInUpLeft',
								'rotateInUpRight' => 'rotateInUpRight',
								'rotateOut' => 'rotateOut',
								'rotateOutDownLeft' => 'rotateOutDownLeft',
								'rotateOutDownRight' => 'rotateOutDownRight',
								'rotateOutUpLeft' => 'rotateOutUpLeft',
								'rotateOutUpRight' => 'rotateOutUpRight',
								'hinge' => 'hinge',
								'jackInTheBox' => 'jackInTheBox',
								'rollIn' => 'rollIn',
								'rollOut' => 'rollOut',
								'zoomIn' => 'zoomIn' ,
								'zoomInDown' => 'zoomInDown' ,
								'zoomInLeft' => 'zoomInLeft' ,
								'zoomInRight' => 'zoomInRight' ,
								'zoomInUp' => 'zoomInUp' ,
								'zoomOut' => 'zoomOut' ,
								'zoomOutDown' => 'zoomOutDown' ,
								'zoomOutLeft' => 'zoomOutLeft' ,
								'zoomOutRight' => 'zoomOutRight' ,
								'zoomOutUp' => 'zoomOutUp' ,
								'slideInDown' => 'slideInDown' ,
								'slideInLeft' => 'slideInLeft' ,
								'slideInRight' => 'slideInRight' ,
								'slideInUp' => 'slideInUp' ,
								'slideOutDown' => 'slideOutDown' ,
								'slideOutLeft' => 'slideOutLeft' ,
								'slideOutRight' => 'slideOutRight' ,
								'slideOutUp' => 'slideOutUp' ,
							) ),
				        
 
				    ) )

	            ) )

			
        ) );
}

