<?php
/**
 * The template for displaying the footer
 *
 */
?>
		<?php if (get_field('photo_credits')) : ?>
			<section class="photo-credits">
				<?php the_field('photo_credits'); ?>
			</section>
		<?php endif; ?>
		</div><!-- .site-content -->
    </div><!-- .outer -->
</div><!-- .site -->

        <section class="testimonials">
            <div class="testimonial site-inner">
                <p class="quote"><?php echo do_shortcode( '[testimonials limit=1 no_cache=true random=true paging=false hide_source=false]' ); ?></p>
            </div>
        </section><!-- .testimonials -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer-wrap site-inner">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
			        <nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'haizdesign' ); ?>">
			            <?php
			                wp_nav_menu( array(
			                    'theme_location' => 'footer',
			                    'menu_class'     => 'footer-menu',
			                 ) );
			            ?>
			        </nav><!-- .footer-navigation -->
			    <?php endif; ?>

		        <div class="footer-extras">
                    <div class="extras-r1">
                    	<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'haizdesign' ); ?>">
			                <?php
			                    wp_nav_menu( array(
			                        'theme_location' => 'social',
			                        'menu_class'     => 'social-links-menu',
			                        'depth'          => 1,
			                        'link_before'    => '<span class="screen-reader-text">',
			                        'link_after'     => '</span>',
			                    ) );
			                ?>
			            </nav><!-- .social-navigation -->
						<span class="footer-contacts">
							<a href="mailto:info@healthsystemsglobal.org">info@healthsystemsglobal.org</a></span>
                    </div><!-- .extras-r1 -->

                    <div class="extras-r2 site-details">
                        <div class="footer-info"><a href="http://www.healthsystemsglobal.org/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/hsg-logo.svg" alt="Health Systems Global" /></a><p>Health Systems Global organizes a symposium every two years to bring together its members with the full range of players involved in health systems and policy research. There is currently no other international gathering that serves the needs of this community.</p></div>
                    </div><!-- .site-info -->
                </div><!-- .footer-extras -->
            </div><!-- .footer-wrap -->
		</footer><!-- .site-footer -->
		<footer id="credits" class="site-footer credits">
		<div class="site-info">
			<?php do_action( 'haizdesign_credits' ); ?>
			<div class="copyright">
			<?php
			printf(
				/* translators: %s = text link: WordPress, URL: http://wordpress.org/ */
				__( '&copy; %1$s', 'haizdesign' ),
				date('Y') . '&nbsp;<a href="' .esc_url( home_url('/') ) . '">' . esc_attr__( 'Health Systems Global', 'haizdesign' ) . '</a>.<br>Developed by <a href="https://haizdesign.com">Haiz Design</a>, and designed by <a href="http://veryownstudio.com/">Very Own Studio</a>, based on branding design by <a href="http://www.fruit-design.co.uk/">Fruit Design</a>.'
				); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #credits -->

	<?php
    /**
     * haizdesign_after_footer hook
     * @hooked haizdesign_scrollup - 10
     */
    do_action( 'haizdesign_after_footer' );
    ?>


<?php wp_footer(); ?>
</body>
</html>
