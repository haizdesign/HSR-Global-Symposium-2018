<?php
/**
 * The template for displaying the footer
 *
 */
?>

		</div><!-- .site-content -->
    </div><!-- .outer -->
</div><!-- .site -->

        <section class="testimonials">
            <div class="testimonial site-inner">
                <p class="quote"><?php echo do_shortcode( '[testimonials limit=1 no_cache=true random=true paging=false]' ); ?></p>
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
						<span class="footer-contacts">info@healthsystemsglobal.org<br>
						+44 01234 567 890</span>
                    </div><!-- .extras-r1 -->

                    <div class="extras-r2 site-details">
                        <span class="footer-info">Health Systems Global organizes a symposium every two years to bring together its members with the full range of players involved in health systems and policy research. There is currently no other international gathering that serves the needs of this community.</span>
                    </div><!-- .site-info -->
                </div><!-- .footer-extras -->
            </div><!-- .footer-wrap -->
		</footer><!-- .site-footer -->


<?php wp_footer(); ?>
</body>
</html>
