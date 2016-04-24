<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crevetterose
 */

?>

	</div><!-- #content -->

</div><!-- #page -->
<footer id="colophon" class="site-footer" role="contentinfo">
  <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'footer-menu' ) ); ?>
	<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'crevetterose' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'crevetterose' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'crevetterose' ), 'crevetterose', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
