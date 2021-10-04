<?php

require_once 'includes/class-enqueue.php';
require_once 'includes/class-cleanup.php';
require_once 'includes/class-hide.php';
require_once 'includes/class-shortcodes.php';

/**
 * Enqueue child styles.
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', [], 100 );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );

add_filter(
	'kadence_svg_icon',
	function ( $output, $icon, $icon_title, $base ) {

		if ( 'phone' === $icon ) {
			$output = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" class="kadence-svg-icon kadence-phone-svg" fill="currentColor"><path fill-rule="evenodd" d="M5.32 3.8c.3-.42.42-.86.07-1.25A19.16 19.16 0 0 0 3.74.44a1.63 1.63 0 0 0-2.23 0l-.7.7C-.86 2.81.17 6.37 2.9 9.1c2.73 2.73 6.29 3.76 7.98 2.07l.7-.7c.53-.57.62-1.56 0-2.21-.33-.33-.98-.84-2.13-1.66-.35-.31-.77-.25-1.15 0-.18.13-.32.25-.57.5l-.46.46c-.06.06-.88-.35-1.68-1.15-.8-.8-1.21-1.62-1.15-1.68l.46-.46a8.94 8.94 0 0 0 .43-.48ZM8.1 8.42l.46-.46.3-.28c1 .72 1.6 1.17 1.83 1.42.14.15.12.42 0 .55l-.67.67c-1.1 1.1-3.97.27-6.3-2.06C1.42 5.94.6 3.06 1.68 1.98l.69-.69c.1-.1.4-.13.53 0 .26.25.73.86 1.43 1.84a2.54 2.54 0 0 1-.28.3l-.46.46C2.8 4.67 3.46 6 4.73 7.27 5.99 8.54 7.33 9.2 8.1 8.42ZM7 .04a5.7 5.7 0 0 1 4.96 4.97l-1.18.2A4.5 4.5 0 0 0 6.8 1.23L7 .04Zm-.4 2.37a3.3 3.3 0 0 1 2.99 3l-1.19.2a2.1 2.1 0 0 0-2-2l.2-1.2Z" clip-rule="evenodd"/></svg>';

		}

		return $output;
	},
	10,
	4
);

add_action( 'wp_footer', function () {

	?>
	<script>
		 jQuery( document ).ready( function( $ ) {
			 let blockID = $( '.site-footer-middle-section-4 .footer-widget-area-inner section.widget_block' ).prop( 'id' );

			 $( '.footer-form input[name="_kb_form_post_id"]' ).val( blockID );
			 $( 'input.kb-tel-field' ).mask( '+7 (000) 000-00-00' );
		 } );
	</script>
	<?php
} );