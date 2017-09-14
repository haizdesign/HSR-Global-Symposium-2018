<?php
/**
 * This is the default full width page template
 */

get_header(); ?>

<div id="primary" class="content-area full-width">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="speakers">

					<div class="plenary">
					<strong>Plenary: </strong>
					<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr( $category_name ); ?>"><?php echo get_the_term_list( $post->ID, 'plenaries', '', ', ' ); ?></a>
				</div>

				<div class="entry-content">
					<figure class="single-speakers-thumb">
						<?php the_post_thumbnail('speakers-thumb'); ?>
					</figure>
					<section class="speakers-info">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						<div class="details">
							<p class="speakers-org"><span class="the-label">Organisation</span><span class="the-field"><a href="<?php the_field('organisation_url'); ?>"><?php the_field('speakers_organisation'); ?></a></span></p>
							<p class="speakers-role"><span class="the-label">Role</span><span class="the-field"><?php the_field('speakers_role'); ?></span></p>
							<?php if (get_field('twitter_account_name')) : ?>
								<p class="speakers-twitter"><span class="the-label"><i class="fa fa-twitter" aria-hidden="true"></i></span><span class="the-field"><a href="https://twitter.com/<?php the_field('twitter_account_name');?>" target="_blank">@<?php the_field('twitter_account_name'); ?></a></span></p>
							<?php endif; ?>
							<?php if (get_field('speakers_email')) : ?>
								<p class="speakers-email"><span class="the-label"><i class="fa fa-envelope" aria-hidden="true"></i></span><span class="the-field"><a href="mailto:<?php the_field('speakers_email');?>" target="_blank"><?php the_field('speakers_email'); ?></a></span></p>
							<?php endif; ?>
						</div><!-- .details -->

					</section>
					<div class="speakers-bio">
						<?php the_field('speakers_bio'); ?>
					</div>

				</div><!-- .entry-content -->
				<!-- speaker's navigation -->
				<?php 
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
				?>

			</article><!-- #post-## -->

		<?php  // End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>