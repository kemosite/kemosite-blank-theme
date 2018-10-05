<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the content.
 *
 */
?>

<footer>

	<?php if (has_nav_menu( 'footer-column-one' ) || has_nav_menu( 'footer-column-two' )): ?>

	<div class="grid-x expanded callout secondary">

		<div class="small-12 medium-3 cell"></div>

	    <div class="small-12 medium-3 cell">
	    	<?php if ( has_nav_menu( 'footer-column-one' ) ) : ?>
		    	<?php wp_nav_menu( array(
					'theme_location' => 'footer-column-one',
					'menu_id' => 'footer-column-one',
					'menu_class' => '',
					'container' => 'nav',
					'walker' => new footer_menu_walker()
				) ); ?>
			<?php endif; ?>
	    </div>

	    <div class="small-12 medium-3 cell">
	    	<?php if ( has_nav_menu( 'footer-column-two' ) ) : ?>
		    	<?php wp_nav_menu( array(
					'theme_location' => 'footer-column-two',
					'menu_id' => 'footer-column-two',
					'menu_class' => '',
					'container' => 'nav',
					'walker' => new footer_menu_walker()
				) ); ?>
			<?php endif; ?>
	    </div>

	    <div class="small-12 medium-3 cell"></div>

	</div>

	<?php endif; ?>

	<?php if ( is_active_sidebar( 'copyright_widget' )): ?>

	<div class="grid-x expanded callout secondary">
    	<div class="small-12 cell">
			<?php if ( is_active_sidebar( 'copyright_widget' ) ) : ?><?php dynamic_sidebar( 'copyright_widget' ); ?><?php endif; ?>
    	</div>
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
