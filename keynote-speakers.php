<?php
/**
 * Template Name: Keynote Speakers
 *
 */

get_header(); ?>

	<div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title">Keynote Speakers</h1>
			</header><!-- .page-header -->

			<section class="the-speakers">

			<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array (
					'post_type'   => 'speakers',
					'post_status' => 'publish',
					'order'               => 'ASC',
					'orderby'             => 'title',
					'posts_per_page'	=> 18,
					'paged' 			=> $paged
				);
			?>

			<?php $the_speakers = new WP_Query($args); ?>

			<?php if ( $the_speakers -> have_posts() ) : ?>
				
			<?php while ( $the_speakers -> have_posts() ) : $the_speakers->the_post(); ?>

			<article class="speaker">
				<figure class="speakers-thumb">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('speakers-thumb'); ?>
					</a>
					<div class="link-mask">
						<a href="<?php the_permalink(); ?>">
							<i class="fa fa-address-card-o" aria-hidden="true"></i>
							<p>View full profile</p>
						</a>
					</div>
				</figure>
				<div class="speaker-text">
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="speakers-name"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<strong><?php the_field('speakers_role'); ?></strong><br>
						<?php the_field('speakers_organisation'); ?>
					</header><!-- .entry-header -->

					<a href="<?php the_permalink(); ?>" class="button">Full profile</a>

				</div><!-- .speaker-text -->
		
			</article><!--.speaker -->	

			<?php endwhile; ?>

		</section><!-- .the-speakers -->

		<?php if ($the_speakers->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
			  	<nav class="prev-next-posts">
			    	<div class="prev-posts-link">
			      		<?php echo get_previous_posts_link( 'Previous' ); // display newer posts link ?>
			    	</div>
			    	<div class="next-posts-link">
			      	<?php echo get_next_posts_link( 'Next', $the_speakers->max_num_pages ); // display older posts link ?>
			    	</div>
			 	</nav>
			<?php } ?>

			<?php wp_reset_postdata(); ?>
			
			<?php else:  ?>
			  <p><?php _e( 'Sorry, no speakers have been added yet.' ); ?></p>
			<?php endif; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>


