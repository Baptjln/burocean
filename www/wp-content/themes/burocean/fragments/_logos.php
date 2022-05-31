<div class="logos wrapper">
    <?php if( have_rows('logos', 'option') ): ?>

    	<ul class="row table owl-carousel">
    
    	<?php while( have_rows('logos', 'option') ): the_row(); 
    
    		// vars
    		$image = get_sub_field('image');
    		$link = get_sub_field('lien');
    
        ?>
    
    		<li class="col item">
    
    			<?php if( $link ): ?>
    				<a href="<?php echo $link; ?>" target="_blank">
    			<?php endif; ?>
    
    				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
    
    			<?php if( $link ): ?>
    				</a>
    			<?php endif; ?>
    
    		    <?php echo $content; ?>
    
    		</li>
    
    	<?php endwhile; ?>
    
    	</ul>
    
    <?php endif; ?>
</div>