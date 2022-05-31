
	<footer>
    	<div class="wrapper">
        	<div class="row">
            	<div class="col-md-9 hidden-sm">
                	<?php
                        $cats = get_categories('taxonomy=gammes-cats');
            
                        foreach ($cats as $cat) {
                            echo '<div class="col-md-4">';
                            $cat_id= $cat->term_id;
                            echo "<h3>".$cat->name."</h3>";
            
                            $args = array(
                                'posts_per_page' => -1,
                                'orderby' => array(
                                    'menu_order' => 'ASC',
                                    'date' => 'DESC'
                                ),
            					'tax_query' => array(
            					    array(
            						    'taxonomy' => 'gammes-cats',
                                        'field' => 'slug',
                                        'terms' => ".$cat->name."
            						)
                                )
            				);
            				
            				$query = query_posts( $args );
            				echo '<ul>';
            				
                            if (have_posts()) : while (have_posts()) : the_post(); ?>
            
                                <li>
                                    <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        		</li>
            
                            <?php 
                                endwhile; endif;
                                echo '</ul>';
                                wp_reset_query();
                                echo '</div>';
                            ?>
                    <?php } ?>
            	</div>
            	
            	<div class="col-md-3 contact">
                	<div class="logo">
                    	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288.41 30.37"><g data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M33.29,6V17.46S32.84,24,46,23.89c0,0,10.64.06,11.29-5.65V5.91H52.31V17.14s.26,4.08-6.55,4.08c0,0-7.4.13-7.66-3.7V6Z"/><path class="cls-1" d="M67.69,5.84V23.69h5.78V8.83h9.86s3.64,0,3.51,2.53c0,0,.32,2-3.51,2.08H79.11L77.17,16,87,24.66l5.26-1.16L84.63,16H87.1s6.49-.58,6.29-5.06c0,0,.39-5.19-11.55-5.13Z"/><path class="cls-1" d="M126.57,0C111.3.12,99,6.82,99,15s12.49,14.63,27.76,14.51,27.6-6.82,27.53-14.95S141.84-.12,126.57,0m22.77,14.65c0,5.36-10.07,9.78-22.58,9.88S104.08,20.37,104,15s10.06-9.78,22.57-9.88,22.68,4.16,22.73,9.52"/><path class="cls-1" d="M183.93,6.82v3H172s-6-.26-6.23,4v3.9s-.52,3.83,5.77,4.09H183.8v2.85H170.17s-9.28-.06-9.48-6.29V12.72s.59-5.9,10.32-6Z"/><path class="cls-1" d="M216.9,7.14v3H204s-5.12-.2-5.32,3.95v4.16s-.26,3.89,6.36,3.89H216.7V25h-14s-8.44-.13-9-6.49V12.85s.91-5.78,9-5.64Z"/><polygon class="cls-1" points="204.05 14.08 217.03 14.08 217.03 17.27 201.84 17.27 204.05 14.08"/><polygon class="cls-1" points="224.29 25.38 236.17 7.27 242.86 7.27 255.64 25.96 248.89 25.96 247.72 23.43 235 23.43 236.89 20.38 245.45 20.38 239.54 11.43 230.72 25.44 224.29 25.38"/><polygon class="cls-1" points="263.88 7.92 263.88 26.03 269.4 26.03 269.4 13.96 282.12 26.29 288.42 26.29 288.42 8.02 282.84 8.02 282.84 20.38 269.99 7.92 263.88 7.92"/><path class="cls-1" d="M5.19,8.21V20.87h10.9s4-.2,4-2.73c0,0,0-2.72-4.68-2.92H9l1.75-2.14h4.38s3.6-.19,3.6-2.73c0,0,.3-2.24-4.77-2.24ZM.2,5.52H14.41s9.67.06,9.6,4.41c0,0,.2,3.38-4,3.83,0,0,5.39,1.49,5.32,5,0,0,.33,4.54-8.57,4.74H0Z"/><path fill="#c4af0e" class="cls-1" d="M1.69,26.94s51.14,6.49,95.4-6.36c0,0,27.52-8.83,37.9-11.55S181.46-4.09,255.06,4c0,0-70.74-6.1-119.68,8.18,0,0-30.11,10-36.34,11.42,0,0-34.27,12.72-97.35,3.38"/></g></g></svg>
                        <span><?php the_field('baseline', 'option'); ?></span>
                    </div>
                	<p><?php the_field('adresse', 'option'); ?></p>
                	<div class="tel"><i class="icon-phone"></i><?php the_field('telephone', 'option'); ?></div>
                	<div class="email"><i class="icon-email"></i><?php the_field('email', 'option'); ?></div>
                	<a class="mentions" href="/mentions-legales/" title="Mentions légales">Mentions légales</a>
            	</div>
        	</div>
    	</div>
	</footer>
	
	<?php wp_footer(); ?>
</body>
</html>