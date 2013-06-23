<?php
/**
 * The template for displaying Author Archive pages
 *
 * @package 	WordPress
 * @subpackage 	Marginal
 * @since 		Marginal 1.0
 */
?>

<?php 
	get_template_part('parts/html-header');
	get_template_part('parts/header'); 
?>

<?php if ( have_posts() ): the_post(); ?>

<h2 class="output-message">Author archive: <?php echo get_the_author() ; ?></h2>

	<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<section class="author">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
		<h3>About <?php echo get_the_author() ; ?></h3>
		<?php the_author_meta( 'description' ); ?>
	</section>
	<?php endif; ?>


<?php rewind_posts(); while (have_posts()) : the_post();
		if(!get_post_format()) {
			get_template_part('parts/standard', 'listed');
		} else {
			get_template_part('parts/'.get_post_format(), 'listed');
		}
	endwhile;
else:?>
<h2 class="output-message">No posts to display</h2>
<?php endif; ?>

<?php 
	get_template_part('parts/footer');
	get_template_part('parts/html-footer'); 
?>