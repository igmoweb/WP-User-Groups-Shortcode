<?php
/**
 * Plugin Name: WP User Groups Shortcode
 * Description: Register a shortcode to list users by group slug: [wp_user_groups_list group="group-slug"]
 * Author: Ignacio Cruz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'plugins_loaded', 'wp_user_groups_shortcode_init' );
function wp_user_groups_shortcode_init() {
	if ( ! function_exists( 'wp_user_groups_get_asset_version' ) ) {
		return;
	}

	add_shortcode( 'wp_user_groups_list', 'wp_user_groups_shortcode_render' );
}

/**
 * Render the user groups list shortcode
 *
 * @param array $atts Shortcode attributes {
 *      @type string $group Group slug
 * }
 *
 * @return string
 */
function wp_user_groups_shortcode_render( $atts ) {
	$defaults = array(
		'group' => ''
	);
	$atts = shortcode_atts( $defaults, $atts, 'wp_user_groups_list' );
	$users = wp_get_users_of_group( array( 'term' => $atts['group'] ) );

	/**
	 * Allow to override the user shortcode template
	 */
	$template = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'user-template.php';
	$template = apply_filters( 'wp_user_groups_list_template_file', $template );

	ob_start();
	?>
	<ul class="wp-user-groups-list">
		<?php foreach ( $users as $user ): ?>
			<?php include $template; ?>
		<?php endforeach; ?>
	</ul>
	<?php

	wp_enqueue_style( 'wp-user-groups-shortcode', plugin_dir_url( __FILE__ ) . 'assets/shortcode.css' );
	return ob_get_clean();
}