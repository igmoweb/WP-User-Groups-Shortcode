<?php
	$description = wp_kses(
		get_user_meta( $user->ID, 'description', true ),
		wp_kses_allowed_html( 'user_description' )
	);
	$description = wpautop( $description );

	$link = sprintf( '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		esc_url( get_author_posts_url( $user->ID, $user->user_nicename ) ),
		/* translators: %s: author's display name */
		esc_attr( sprintf( __( 'Posts by %s' ), $user->display_name ) ),
		$user->display_name
	);
?>
<li>
	<div class="user-avatar">
		<?php echo get_avatar( $user->ID, 96 ); ?>
	</div>
	<h3 class="user-name">
		<?php echo $link; ?>
	</h3>
	<div class="user-bio">
		<?php echo $description ?>
	</div>
</li>