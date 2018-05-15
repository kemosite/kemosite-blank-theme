<?php get_header(); ?>

<div class="grid-x grid-margin-x grid-padding-x">
	
	<div class="medium-8 cell">

		<?php if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1><?php single_post_title(); ?></h1>
		</header>
		<?php else : ?>
		<header>
			<h2>Posts</h2>
		</header>
		<?php endif; ?>

		<main role="main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */

					?>

					<article>
					
						<header>
							<?php
							if ( is_single() ) {
								the_title( '<h1 class="entry-title">', '</h1>' );
							} elseif ( is_front_page() && is_home() ) {
								the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							} else {
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							}
							?>
						</header>

						<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
							<div>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
								</a>
							</div>
						<?php endif; ?>

						<div>
							<?php
							the_content();

							wp_link_pages();
							?>
						</div>

					</article>

					<hr>

					<?php					

				endwhile;

				the_posts_pagination();

			else :



			endif;
			?>

		</main>
		
	</div>

	<div class="medium-4 cell">

		<?php get_sidebar(); ?>
		
	</div>

</div>

<?php get_footer();
