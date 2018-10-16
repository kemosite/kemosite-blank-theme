<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the content.
 *
 */
?>

<hr>

<footer>

	<?php if (has_nav_menu( 'footer-menu' ) || is_active_sidebar( 'copyright_widget' )): ?>

	<div class="grid-x expanded footer">

		<?php if ( is_active_sidebar( 'copyright_widget' ) ) : ?>
		<div class="cell">
			<?php dynamic_sidebar( 'copyright_widget' ); ?>
    	</div>
    	<?php endif; ?>

    	<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
		<div class="cell">
	    	<?php wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id' => 'footer-menu',
				'menu_class' => 'footer-menu',
				'container' => '',
				'walker' => new footer_menu_walker()
			) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'social_widget' ) ) : ?>
		<div class="cell">
			<?php dynamic_sidebar( 'social_widget' ); ?>
    	</div>
    	<?php endif; ?>

	</div>

	<?php endif; ?>

</footer>

</div> <!-- .content placement -->

</div><!-- .grid-layout-container -->

</div><!-- .off-canvas-content -->

</div><!-- .off-canvas-wrapper -->

<?php wp_footer(); ?>

<noscript>
<style>
.off-canvas-wrapper { display: block; }
</style>
</noscript>

</body>
</html>
