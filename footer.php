<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package welearner
 */

?>

	<?php if( is_active_sidebar( 'footer-area' ) ): ?>
	<footer class="welearner-footer">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'footer-area' ); ?>
			</div>
		</div>
	</footer><!-- #colophon -->
	<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
