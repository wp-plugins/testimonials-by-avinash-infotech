<?php 
add_action('wp_head','plugin_hook');

function plugin_hook()
{
	wp_enqueue_script( 'jquery' );
	
    wp_register_script( 'testimonial_js', plugins_url( '/js/testimonial.min.js', __FILE__ ), array( 'jquery' ) );
    wp_register_style( 'testimonial_stylesheet', plugins_url( '/css/testimonial_style.css', __FILE__ ) );
		
	wp_enqueue_script( 'testimonial_js' );
	wp_enqueue_style( 'testimonial_stylesheet' );    

?>

  
    <script>
		$ = jQuery.noConflict();
	
		$(function(){
			var items = (Math.floor(Math.random() * ($('#widget-testimonials li').length)));
			$('#widget-testimonials li').hide().eq(items).show();
			
		  function next(){
				$('#widget-testimonials li:visible').delay(5000).fadeOut('slow',function(){
					$(this).appendTo('#widget-testimonials ul');
					$('#widget-testimonials li:first').fadeIn('slow',next);
			});
		   }
		  next();
		});
		
		$(function(){
			var items = (Math.floor(Math.random() * ($('#shortcode-testimonials li').length)));
			$('#shortcode-testimonials li').hide().eq(items).show();
			
		  function next(){
				$('#shortcode-testimonials li:visible').delay(5000).fadeOut('slow',function(){
					$(this).appendTo('#shortcode-testimonials ul');
					$('#shortcode-testimonials li:first').fadeIn('slow',next);
			});
		   }
		  next();
		});
		
		
		
	</script>
    
    <?php
}
?>

