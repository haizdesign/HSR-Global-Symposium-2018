<?php
/*
Template Name: Home
This is the template used on the main site landing page
*/
get_header(); ?>

<div id="primary" class="content-area home">
    <main id="main" class="site-main" role="main">
        <div class="header-badge">
                <h1>Join us in<br>
                <span>Liverpool</span><br>
                7-12 October 2018</h1>
        </div>
        <!-- Home CTAs -->
        <section class="home-cta">
            <div class="cta-boxes content-area">
                <?php if (have_rows('home_cta')): ?>
                    <?php while (have_rows('home_cta')) : the_row();
                    // vars
                    $cta_title = get_sub_field('cta_title');
                    $cta_excerpt = get_sub_field('cta_excerpt');
                    $cta_button = get_sub_field('cta_button');
                    ?>

                    <article class="cta-box">
                        <h1 class="home-cta-title"><?php echo $cta_title; ?></h1>
                        <?php echo $cta_excerpt; ?>
                        <a href="<?php echo $cta_button; ?>"><button  class="btn">Read more</button></a>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
            </div><!-- .cta-boxes -->
            <div class="subscribe sidebar">
                <div class="mailchimp-form">
                    <?php gravity_form( 1, $display_title = false, $display_description = true, $display_inactive = false, $field_values = null, $ajax = false, $tabindex, $echo = true ); ?>
                </div>
                <?php if ( has_nav_menu( 'social' ) ) : ?>
					<nav id="social-navigation" class="social-navigation" role="navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif; ?>
            </div><!-- .home-subscribe -->
        </section>

        <!-- Updates/blog -->
        <article class="home-updates">
        	<header class="entry-header">
        		<h1 class="entry-title">Updates</h1>
                <section class="home-news">
                    <div class="news-boxes content-area home">
                            <?php
                                $homenews = new WP_Query('posts_per_page = 3');

                                while($homenews -> have_posts()) : $homenews -> the_post();
                            ?>
                            <article class="home-box">
                                <figure class="image">
                                    <?php the_post_thumbnail('small-thumb'); ?>
                                </figure>
                                <a href="<?php the_permalink(); ?>"><h1 class="home-post-title"><?php the_title(); ?></h1></a>
                                <?php the_excerpt(); ?>
                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div><!-- .news-boxes -->
                </section>
        	</header><!-- .entry-header -->

        	<div class="entry-content">

        	</div><!-- .entry-content -->

        </article><!-- .home-updates -->

        <article class="home-keydates">
        	<header class="entry-header">
        		<h1 class="entry-title">Key Dates</h1>
        	</header><!-- .entry-header -->

        	<div class="home-events entry-content">
                <?php echo do_shortcode('[metaslider id=135]'); ?>
        	</div><!-- .entry-content -->

        </article><!-- .home-keydates -->

        <article class="home-sponsors">
        	<header class="entry-header">
        		<h1 class="entry-title">Our Sponsors</h1>
        	</header><!-- .entry-header -->

        	<div class="entry-content">
                <?php echo do_shortcode( '[INSERT_ELEMENTOR id=172]' ); ?>
        	</div><!-- .entry-content -->

        </article><!-- .home-sponsors -->


    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
