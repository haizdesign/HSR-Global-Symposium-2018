<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="blog-thumb">
		<?php the_post_thumbnail('small-thumb'); ?>
		<?php twentysixteen_entry_date(); ?>
		<?php twentysixteen_entry_meta(); ?>
	</figure>
	<div class="blog-text">
		<header class="entry-header">
				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
				<?php endif; ?>
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			
			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_excerpt( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
						get_the_title()
					) );
			
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
