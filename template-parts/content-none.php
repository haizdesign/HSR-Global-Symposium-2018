<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( '404 - Nothing Found', 'twentysixteen' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentysixteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Check out some of the recent articles below or try again with some different keywords.', 'twentysixteen' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentysixteen' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
		<section class="home-news">
            <div class="news-boxes content-area home">
                    <?php
                        $homenews = new WP_Query('posts_per_page=3');

                        while($homenews -> have_posts()) : $homenews -> the_post();
                    ?>
                    <article class="home-box">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="image">
                                <?php the_post_thumbnail('small-thumb'); ?>
                            </figure>
                        </a>
                        <div class="news-text"><a href="<?php the_permalink(); ?>"><h2 class="home-post-title"><?php the_title(); ?></h2></a>
                        	<?php the_excerpt(); ?></div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div><!-- .news-boxes -->
        </section>

	</div><!-- .page-content -->
</section><!-- .no-results -->
