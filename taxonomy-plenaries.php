<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<figure class="blog-thumb">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail'); ?>
						</a>
					</figure>
					<div class="blog-text">
						<header class="entry-header">
								<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header><!-- .entry-header -->
							
							<div class="entry-content">
									<p class="speakers-role"><span>Role</span><?php the_field('speakers_role'); ?></p>
									<?php if (get_field('twitter_account_name')) : ?>
									<p class="speakers-org"><span>Organisation</span><a href="<?php the_field('organisation_url'); ?>"><?php the_field('speakers_organisation'); ?></a></p>
										<p class="speakers-twitter"><span><i class="fa fa-twitter" aria-hidden="true"></i></span><a href="https://twitter.com/<?php the_field('twitter_account_name');?>" target="_blank">@<?php the_field('twitter_account_name'); ?></a></p>
									<?php endif; ?>
									<?php if (get_field('speakers_email')) : ?>
										<p class="speakers-email"><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:<?php the_field('speakers_email');?>" target="_blank"><?php the_field('speakers_email'); ?></a></p>
									<?php endif; ?>

									<a href="<?php the_permalink(); ?>" class="button">Full profile</a>
							
									<?php
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									) );
								?>
								
							</div><!-- .entry-content -->
							
							<footer class="entry-footer">
								<!-- <?php the_author(); ?> -->
							</footer><!-- .entry-footer -->
						</div><!-- .blog-text -->
						
				</article><!-- #post-## -->

			<?php // End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
