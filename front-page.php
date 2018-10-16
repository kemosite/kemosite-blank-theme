<?php
/**
 * The home template file
 *
 * The home page template is the front page by default. If you do
 * not set WordPress to use a static front page, this template is
 * used to show latest posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package WordPress
 * @subpackage kemosite-blank-theme
 * @since 4.9.6
 * @version 4.6.9.1
 */
 ?>

<?php get_header(); ?>

<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->



		<main role="main">

			<section>

				<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1><?php single_post_title(); ?></h1>
				</header>
				<?php endif; ?>

				<article>

					<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
						<div>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
							</a>
						</div>
					<?php endif; ?>

					<?php
					// Show the selected front page content.
					the_content();
					?>

				</article>

				<!-- <hr> -->

				<?php				

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				
				/*
				echo "<pre>";
				if (function_exists('stats_get_csv')) { print_r(stats_get_csv('postviews')); }
				echo "</pre>";
				*/

				?>

			</section>

		</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>