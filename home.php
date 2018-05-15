<?php get_header(); ?>

<!-- Display all categories, then display posts by popularity or date published -->

<?php foreach (get_categories() as $cat_key => $category): ?>

	<div class="grid-x grid-margin-x grid-padding-x">

		<div class="medium-8 cell">

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

		</div>

		<div class="medium-4 cell">

			<!-- Side content -->

			<ul>

			<?php foreach ($posts as $post_key => $post): ?>

				<?php /*
				echo "<pre>";
				print_r($post);
				echo "</pre>";
				*/ ?>

				<li><a href="<?php echo $post->guid; ?>"><?php echo $post->post_title; ?></a></li>

			<?php endforeach; ?>

			</ul>

		</div>

	</div>

	<hr>

<?php endforeach; ?>

<?php get_footer();
