<?php
/**
 * Plugin Name:	   Allow Iframes In Content
 * Description:	   Allows iframes to placed into Wordpress content
 * Version:		   1.0
 * Author:			Topher
 * License: GPLv3+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 */

/**
 * Add iFrame to allowed wp_kses_post tags
 *
 * @param array  $tags Allowed tags, attributes, and/or entities.
 * @param string $context Context to judge allowed tags by. Allowed values are 'post'.
 *
 * @return array
 */
function custom_wpkses_post_tags( $tags, $context ) {

	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'align' => true,
			'width' => true,
			'height' => true,
			'frameborder' => true,
			'name' => true,
			'src' => true,
			'id' => true,
			'class' => true,
			'style' => true,
			'scrolling' => true,
			'marginwidth' => true,
			'marginheight' => true,
		);
	}

	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'custom_wpkses_post_tags', 0, 2 );
