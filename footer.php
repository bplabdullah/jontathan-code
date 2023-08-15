<?php
/**
* The template for displaying the footer
*
* Contains the opening of the #site-footer div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage Twenty_Twenty
* @since Twenty Twenty 1.0
*/
?>
<footer id="site-footer" class="header-footer-group">
    <div class="section-inner">
        <div class = "col-left">
            <?php the_field( 'footer', 'option' ); ?>
        </div>
        <div class = "col-right">
            <div>
                <!--<a href="<?php the_field('privacy','option')?>">Privacy</a>-->
                <?php
                $link = get_field('privacy','option');
                if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
            <div>
                <!--<a href="<?php the_field('tc','option')?>">T&C’s</a>-->
                <?php
                $link = get_field('tc','option');
                if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
            <?php if( have_rows('icons','option') ): ?>
            <div class="footer-images">
                <?php while( have_rows('icons','option') ): the_row();
                $image = get_sub_field('image','option');
				$image_link = get_sub_field('image_link','option');
                ?>
                <div class = "img">
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
					<a href="<?php echo ( $image_link ); ?>" target = "_blank"><img src = "<?php echo ( $image ); ?>" alt="IG"></a>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    </footer><!-- #site-footer -->
<script>
jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
	animationSpeed: 600,
	slideshow: false,
//     itemWidth: 210,
    itemMargin: 0,
	  start: function(){
        jQuery('.page-template-template-lodgings #site-footer,.page-template-template-lodgings .animation-txt').css('opacity','1'); 
    },
  });
});

	

// Text Animation

// (function($) {
    
//   var T, 
//   write = {
//     settings: {
//       letters: $('.animation-txt a'),
//     },
//     init: function() {
//       T = this.settings;
//         var self=this;
        

//       this.putIntab();
//     },
//     putIntab: function(){
//       for(var i=0;i<T.letters.length;i++){

//         var tableau= $.trim(T.letters[i].innerHTML).split(/(?=[^>]*(?:<|$))/);
//         //tableau=["te","st"];
//         //efface le texte existant
//         T.letters[i].innerText=" ";
//         //affiche le nouveau texte caractere par caractère
//         this.afficheDelay(i,tableau);
//        }
//     },
//     afficheDelay: function(champ,texte){
//     	var y = 0;
//       var self = this;
//       //parcours le tableau dans un interval donné en 2nd param
//       var affiche = setInterval(function(){
//         //ajoute dans le texte d'id champ, la lettre y du tableau
//         var lettre = texte[y];
//         $("<span>"+lettre+"<span>").appendTo(self.settings.letters[champ]);
//         y++;
//         if (y==texte.length){
//           clearInterval(affiche)
//         }
//       },360);//temps entre chaque caracteres
//     },
//   };
//   write.init();
// })(jQuery);


// jQuery( "li.menu-item-141" ).after( jQuery( ".s-icon" ) );
</script>
    <?php wp_footer(); ?>
</body>
</html>