<?php get_header(); ?>

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<!-- <h1><?php bloginfo( 'name' ); ?></h1> -->
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
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php while ( have_posts() ) : the_post(); ?>

	<main role="main">

		<section>

			<!--
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
			-->

			<article>

				<?php
				$image = wp_get_attachment_image_src( get_post_thumbnail_id($latest_post->object_id), 'single-post-thumbnail');
				$image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($latest_post->object_id), 'single-post-thumbnail', wp_get_attachment_metadata($latest_post->object_id) );
				$image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($latest_post->object_id), 'single-post-thumbnail', wp_get_attachment_metadata($latest_post->object_id) );
				?>
				<?php if ($image && $image_srcset && $image_sizes): ?>
					<div><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
				<?php endif; ?>

				<header>

					<?php
					if ( is_front_page() && is_home() ) {
						echo '<h2 class="entry-title"><a href="' . esc_url($latest_post->guid) . '" rel="bookmark">'.$latest_post->post_title.'</a></h2>';
					} else {
						echo '<h1 class="entry-title"><a href="' . esc_url($latest_post->guid) . '" rel="bookmark">'.$latest_post->post_title.'</a></h1>';
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

	<!-- <hr> -->

<?php endwhile; ?>

<?php get_footer(); ?>