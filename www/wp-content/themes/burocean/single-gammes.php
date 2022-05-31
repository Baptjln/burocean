<?php get_header(); ?>

<section class="wrapper" id="single">
    
    <?php $couleur = get_field('couleur'); ?>
	
	<div class="txt-center bloc-titre">
	    <h1 class="font-2">Gamme <strong style="color: <?php echo $couleur ?>;"><?php the_title(); ?></strong></h1>
	    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div <div class="breadcrumb txt-center">','</div>'); } ?>
	</div>
	
	<div class="top-single">
    	<div class="row">
        	<div class="col-md-4">
            	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            	    <?php the_content(); ?>
            	<?php endwhile; else: ?>
            	<?php endif; ?>
            	
                <?php if( have_rows('finitions') ): ?>
                    <h2 class="titre-row">Finitions</h2>
                	<ul class="finitions">
                    	<?php while( have_rows('finitions') ): the_row(); 
                    		$image = get_sub_field('image');
                    		$nom = get_sub_field('nom');
                        ?>
                    		<li>
                                <span class="tooltip"><?php echo $nom; ?></span>
                                <span class="image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></span>
                    		</li>
                    	<?php endwhile; ?>
                	</ul>
                <?php endif; ?>
        	</div>
        	
        	<div class="col-md-8">
            	<?php if( get_field('afficher_nf_environnement') ): ?>
        	        <div class="logo-nf"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/nf-environnement.jpg" /></div>
        	    <?php endif; ?>
            	
            	<figure class="photo">
            	    <?php $liste_photos = get_field('liste_photos'); ?>
            	    <?php if( $liste_photos ): ?>
    			        <a href="javascript:;" class="btn-gallery"><span><i class="icon-photo"></i>+ de photos</span></a>
                    <?php endif; ?>
                    
            	    <?php the_post_thumbnail('single'); ?>
                </figure>
                
                <?php if( $liste_photos ): ?>
    			    <div class="gallery hidden">
    		        <?php foreach( $liste_photos as $photo ): ?>
                        <a class="fancybox" href="<?php echo $photo['sizes']['large']; ?>" rel="gallery-<?php echo $i; ?>" title="<?php echo $photo['title']; ?>">
                            <img src="<?php echo $photo['sizes']['large']; ?>" alt="<?php echo $photo['title']; ?>" />
                        </a>                              
    		        <?php endforeach; ?>
    		        </div>
        		<?php endif; ?>
        	</div>
    	</div>
        
        <div class="row">
        	<?php $numero_page = get_field('numero_de_page_du_pdf'); ?>	
        	<div class="col-sm-12 lien-catalogue" style="background: <?php echo $couleur ?>;">
            	<a target="_blank" class="link" onclick="return gtag_report_conversion('<?php bloginfo('url'); ?>/<?php the_field('lien_catalogue', 'option'); ?>/index.html#p=<?php echo $numero_page; ?>');" href="<?php bloginfo('url'); ?>/<?php the_field('lien_catalogue', 'option'); ?>/index.html#p=<?php echo $numero_page; ?>" title="Voir la fiche détaillée"><i class="icon-arrow"></i>Voir la fiche détaillée</a>
        	</div>
        </div>
	</div>
	
	<?php if( have_rows('liste_caracteristiques') ): ?>
	    
	    <?php while( have_rows('liste_caracteristiques') ): the_row();
    	    
    	    $largeur_col = get_sub_field('largeur_colonne_texte');
    	    $largeur_col_2 = 12 - $largeur_col;
	    ?>
	    <div class="row row-line">
    	    <div class="col-texte col-md-<?php echo $largeur_col; ?>">
        	    <h2 class="titre-row"><?php the_sub_field('intitule'); ?></h2>
        	    <?php the_sub_field('texte'); ?>
    	    </div>
    	    
            <div class="col-images col-md-<?php echo $largeur_col_2; ?>">
        	    <div class="row<?php if( get_sub_field('photo_ronde') == 'Oui' ): ?> rond<?php endif; ?><?php echo $col_offset; ?>">
            	    <?php 
                	    $number = count( get_sub_field('images') );
                	    
                	    /*if ($number % 2 == 1) {
                           $col_offset = "col-md-offset-1";
                        }*/
                	    
                	    $total = round(12 / $number, 0, PHP_ROUND_HALF_DOWN);
                	    $col = "col-md-$total";
            	    ?>
            	    
            	    <?php if( have_rows('images') ): ?>
            	        <?php while( have_rows('images') ): the_row();
                	        $image = get_sub_field('photo');
            	        ?>
            	            <div class="col-sm-6 image <?php echo $col; ?>">
            	                <figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></figure>
            	                <span><?php the_sub_field('label_photo'); ?></span>
            	            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
        	    </div>
    	    </div>
	    </div>
	    <?php endwhile; ?>    
	<?php endif; ?>
</section>

<section class="contact-bottom">
	<div class="wrapper">
    	<p>vous avez besoin de plus d’informations ?</p>
    	<a class="btn" style="background: <?php echo $couleur ?>;" onclick="return gtag_report_conversion('<?php bloginfo('url'); ?>/nous-contacter/');" href="<?php bloginfo('url'); ?>/nous-contacter/" title="Contactez-nous !">Contactez-nous !</a>
	</div>
</section>

<?php include('fragments/_logos.php'); ?>

<?php get_footer(); ?>