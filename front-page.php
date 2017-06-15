<?php
/*
Template Name: Home
This is the template used on the main site landing page
*/
get_header(); ?>

<div id="primary" class="content-area home">
    <main id="main" class="site-main" role="main">

        <article class="home-box">
            <?php
                $homenews = new WP_Query($args);
                $args = array( 'post_type' => 'post',
                'numberposts' => 3, 'order'=> 'DESC',
                'orderby' => 'post_date' );

                while($homenews->have_posts()) : $homenews->the_post();
            ?>
            <?php echo the_title(); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </article>

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
