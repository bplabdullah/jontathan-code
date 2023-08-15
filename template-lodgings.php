<?php
/**
 * Template Name: Lodgings
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">
<section class = "lodgings hero-sec">
	<div class = "container">
		<div class = "row">
			<?php if( have_rows('content') ): ?>
    <?php while( have_rows('content') ): the_row(); ?>
<?php 
$content = get_sub_field('paragraph');
if( !empty( $content ) ): ?>
            <div class = "hero-txt">
				<?php echo ($content) ?>	
			</div>
			<?php endif; ?>		
<?php if( have_rows('slides') ): ?>
    <div id="slider" class="flexslider carousel">			
    <ul class="slides">
    <?php while( have_rows('slides') ): the_row(); 
        $image = get_sub_field('image');
		$title = get_sub_field('title');
		$caption = get_sub_field('caption');
        ?>
        <li>
			<img src = "<?php echo $image;?>" alt="herom">
			<h2><?php echo $title; ?></h2>
            <p><?php echo $caption; ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
			</div>
<?php endif; ?>			
<?php 
$btntext = get_sub_field('book_txt');
$btnlink = get_sub_field('book_link');			
if( !empty( $btntext && $btnlink ) ): ?>
			<div class = "animation-txt">			
		 		<a href = "<?php echo ($btnlink);?>"  target = "_blank"><?php echo ($btntext); ?></a> 
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


