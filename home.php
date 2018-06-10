<?php get_header(); ?>

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<h1><?php bloginfo( 'name' ); ?></h1>
		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php foreach (get_categories() as $cat_key => $category): ?>

	<main role="main">

		<section>

			<header>

				<h4><?php echo $category->name; ?></h4>

			</header>

			<?php $posts = get_posts( array('numberposts' => 5, 'category' => $category->term_id, 'orderby' => 'date', 'order' => 'DESC')); ?>

			<?php $latest_post = $posts[0]; ?>

			<?php array_shift($posts); ?>

			<article>

				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($latest_post->object_id), 'single-post-thumbnail' ); ?>
				<?php if ($image): ?>
					<div><img style="width: 100%;" src="<?php echo $image[0]; ?>"></div>
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

				<?php if ($latest_post->post_content): ?>
				<div>
					
					<?php echo do_shortcode($latest_post->post_content); ?>

				</div>
				<?php endif; ?>

				<?php 
				
				echo "<pre>";
				if (function_exists('stats_get_csv')) { print_r(stats_get_csv('postviews')); }
				echo "</pre>";

				?>

			</article>


		</section>

	</main>

	<hr>

<?php endforeach; ?>

<?php get_footer();
