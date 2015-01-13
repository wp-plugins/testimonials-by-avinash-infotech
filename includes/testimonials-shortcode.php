<?php
add_shortcode( 'testimonials', 'testimonial_shortcode' );

function testimonial_shortcode( ) {
	
	
?>
	<h3>Latest Testimonials</h3>  
    <div id="shortcode-testimonials">
    	<ul>       
               
        <?PHP 
        global $post;
        $args = array( 'numberposts' => 100, 'offset'=> 0, 'post_type' => 'testimonial', 'featuredsetting' => 'latest-testimonial');
        $myposts = get_posts( $args );
        foreach( $myposts as $post ) :	setup_postdata($post);
		
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            $byline = get_post_meta ($post->ID, 'byline', true);
            $url = get_post_meta ($post->ID, 'url', true);
            $gravatar_email = get_post_meta ($post->ID, 'gravatar_email', true);
            ?> 
            	<li>
                      
                <h4><?PHP the_title(); ?></h4>
                
                    <div class="image-info">
                        <img src="<?php echo $image[0]; ?>" alt="<?PHP the_title(); ?>">
                    </div>
                    <div class="detail-info">
                        <blockquote><?PHP echo get_the_content();?></blockquote>
                        <p class="author"> <?PHP the_title(); ?>, <?php echo $byline; ?></p>
                        <p class="author">Website: <?php echo $url; ?></p>
                        <p class="author">Email: <?php echo $gravatar_email; ?></p>
                    </div>
                
               </li>
        <?PHP endforeach;?>
       </ul>
	</div>        
        <?php
}

?>