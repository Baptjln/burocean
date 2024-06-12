<?php get_header();  ?>

<section class="main">
    <div class="slider">
        <div class="catalogue hidden-sm">
            <div class="left">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/img-catalogue.png" />
                <a onclick="return gtag_report_conversion('<?php bloginfo('url'); ?>/<?php the_field('lien_catalogue', 'option'); ?>/');" href="<?php bloginfo('url'); ?>/<?php the_field('lien_catalogue', 'option'); ?>/" title="<?php the_field('titre_catalogue', 'option'); ?>" target="_blank"><?php the_field('titre_catalogue', 'option'); ?></a>
            </div>
        </div>
        
        
        <?php 
            $post_objects = get_field('gammes_a_afficher');
            $count = count( $post_objects );

        if( $post_objects ): ?>
        
        
        <div class="owl-carousel" data-slider-id="1">
            <?php foreach( $post_objects as $post_object): ?>  
                <?php 
                    $title = get_the_title($post_object->ID);
                    
                    $post_type = get_post_type(get_the_ID());   
                    $taxonomies = get_object_taxonomies($post_object);   
                    $tax = wp_get_post_terms($post_object->ID, $taxonomies,  array("fields" => "id=>slug"));
                ?>
                          
                <div class="item">
                    <a href="<?php bloginfo('url'); ?>/gammes/<?php echo implode( " ", $tax ); ?>">
						<?php 
							$image = get_field('image_home', $post_object->ID);
							$image_url = wp_get_attachment_image_src( $image, 'slider' );
						?>
						<img src="<?php echo $image_url[0]; ?>" />
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        
        
        <div class="owl-thumbs count-<?php echo $count; ?>" data-slider-id="1">
            <?php foreach( $post_objects as $post_object): ?> 
            
            <?php  
                $post_type = get_post_type(get_the_ID());   
                $taxonomies = get_object_taxonomies($post_object);   
                $tax = wp_get_post_terms($post_object->ID, $taxonomies,  array("fields" => "names"));
            ?>
                
                <div class="owl-thumb-item" style="background-color: <?php the_field('couleur', $post_object->ID); ?>">
                    <div class="owl-wrap">
                        <i class="icon-arrow"></i>
                        <h2><?php echo $tax[0]; ?></h2>
                    </div>
                </div>
        	<?php endforeach; ?>
        </div>
        
        <?php endif; ?>
        
    </div>
    
    <?php include('fragments/_logos.php'); ?>
    
    <div class="feature">
        <div class="wrapper">
            
            <h2 class="txt-center"><?php the_field('titre_bloc'); ?><span class="rouge"><?php the_field('sous_titre_bloc'); ?></span></h2>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p class="txt-center texte"><?php the_field('texte'); ?></p>
                </div>
            </div>
            
            <?php include('fragments/_fabricant.php'); ?>
        </div>
    </div>
    
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	
	<?php endwhile; else: ?>
	<div class="box-erreur">
		<h2 class="erreur">Erreur</h2>
		<p>Désolé, mais la page que vous recherchez n'existe pas ou plus.</p>
		<a class="btn-retour" href="<?php bloginfo("url"); ?>">Retour à l'accueil</a>
	</div>
	<?php endif; ?>
</section>

<?php get_footer(); ?>