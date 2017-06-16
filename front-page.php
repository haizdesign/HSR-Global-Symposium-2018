<?php
/*
Template Name: Home
This is the template used on the main site landing page
*/
get_header(); ?>

<div id="primary" class="content-area home">
    <main id="main" class="site-main" role="main">

        <section class="home-news">
            <div class="news-boxes content-area">
                    <?php
                        $homenews = new WP_Query('posts_per_page = 3');

                        while($homenews -> have_posts()) : $homenews -> the_post();
                    ?>
                    <article class="home-box">
                        <a href="<?php the_permalink(); ?>"><h1 class="home-post-title"><?php the_title(); ?></h1></a>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>"><button  class="btn">Read more</button></a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div><!-- .news-boxes -->
            <div class="home-subscribe secondary">
                <div class="subscribe-header">
                    <span>Receive email updates</span>
                </div>
            </div><!-- .home-subscribe -->
        </section>


        <article class="home-updates">
        	<header class="entry-header">
        		<h1 class="entry-title">Updates</h1>
        	</header><!-- .entry-header -->

        	<div class="entry-content">

        	</div><!-- .entry-content -->

        </article><!-- .home-updates -->

        <article class="home-keydates">
        	<header class="entry-header">
        		<h1 class="entry-title">Key Dates</h1>
        	</header><!-- .entry-header -->

        	<div class="entry-content">

        	</div><!-- .entry-content -->

        </article><!-- .home-keydates -->

        <article class="home-sponsors">
        	<header class="entry-header">
        		<h1 class="entry-title">Our Sponsors</h1>
        	</header><!-- .entry-header -->

        	<div class="entry-content">

        	</div><!-- .entry-content -->

        </article><!-- .home-sponsors -->


    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
