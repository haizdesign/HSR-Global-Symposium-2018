<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>

<div id="primary" class="content-area full-width">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
    
    <?php
        if ( has_post_thumbnail() ): ?>
    <?php
        $caption = get_post(get_post_thumbnail_id())->post_excerpt;?>
        <?php if($caption): ?>
            <div class="single-post-thumbnail clear">
                <?php the_post_thumbnail('large-thumb');?>
            <div class="featured-caption"><?php echo $caption ?></div>
            </div>
        <?php else: ?>
            <?php the_post_thumbnail('large-thumb');?>
        <?php endif; ?>
    <?php endif; ?>

    <div class="entry-content row clearfix">

        <div class="sitemap">
					
            <h3 class="sitemap-pages">Published Web Pages:</h3>
            <div class="col pages">
                <ul>
                    <?php wp_list_pages('title_li=&post_status=publish&exclude=8967'); ?>
                </ul>
                <h3>Archives by Tag:</h3>
                <?php wp_tag_cloud(); ?>
            
            </div><!-- /.col.pages -->
            
            <div class="col">
                <h3>Archives by Category:</h3>
                <ul><?php wp_list_categories('title_li='); ?></ul>
                <h3>Archives by Month:</h3>
                <ul><?php wp_get_archives('type=monthly'); ?></ul>
                <h3>Archives by Year:</h3>
                <ul><?php wp_get_archives('type=yearly'); ?></ul>
            </div><!-- /.col -->
		     
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'haizdesign' ),
                    'after'  => '</div>',
                ) );
            ?>
	    </div><!-- .entry-content -->
	
	<?php if ( get_field('photo_credits' ) ) : ?>
                <section class="photo-credits">
                    <?php the_field('photo_credits'); ?>
                </section>
    <?php endif; ?>
	
</article><!-- #post-## -->

		<?php  // End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>