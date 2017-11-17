<?php
	$description = wp_kses(
		get_user_meta( $user->ID, 'description', true ),
		wp_kses_allowed_html( 'user_description' )
	);
	$description = wpautop( $description );
?>
<li>
	<div class="user-avatar">
		<?php echo get_avatar( $user->ID, 96 ); ?>
	</div>
	<h3 class="user-name">
		<?php echo $user->display_name; ?>
	</h3>
	<div class="user-bio">
		<?php echo $description ?>
	</div>
</li>