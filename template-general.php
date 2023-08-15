<?php
/**
 * Template Name: General
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<?php
global $post;
$slug = $post->post_name; ?>
<main id="site-content">
<section class = "hero-sec <?php echo $slug; ?>">
	<div class = "container">
		<div class = "row">
			<?php if( have_rows('content') ): ?>
    <?php while( have_rows('content') ): the_row(); ?>
				<?php 
$image = get_sub_field('image');
if( !empty( $image ) ): ?>
			<figure><img src = "<?php echo $image;?>" alt="heromgg"></figure>
<?php endif; ?>
<?php 
$content = get_sub_field('paragraph');
if( !empty( $content ) ): ?>
            <div class = "col hero-txt">
				<?php echo ($content) ?>	
			</div>
			<?php endif; ?>
<?php 
$btntext = get_sub_field('book_txt');
$btnlink = get_sub_field('book_link');			
if( !empty( $btntext || $btnlink ) ): ?>
			<div class = "animation-txt">
				<a href = "<?php the_sub_field('book_link');?>"  target = "_blank"><?php the_sub_field('book_txt'); ?></a>
			</div>
			<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
		</div>
	</div>
</section>
</main>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();


