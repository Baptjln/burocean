<?php get_header(); ?>

<section class="wrapper" id="single">
    
    <?php $couleur = get_field('couleur'); ?>
	
	<div class="txt-center bloc-titre">
	    <h1 class="font-2">Gamme <strong style="color: <?php echo $couleur ?>;"><?php the_title(); ?></strong></h1>
	    
		<?php 
			$terms = get_the_terms( $post->ID, 'gammes-cats' );
			if ($terms) {
				foreach($terms as $term) {
					$name = $term->name;
					$slug = $term->slug;
				} 
			}
		?>
		
		<div class="breadcrumb txt-center">
			<span><a href="<?php bloginfo('url'); ?>" title="Accueil">Accueil</a> /</span>
			<span><a href="<?php bloginfo('url'); ?>/gammes/<?php echo $slug; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a> /</span>
			<span><?php the_title(); ?></span>
		</div>
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
        	        <div class="logo-nf"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/nf-environnement.jpg" /></div>
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
        	    <div class="flex<?php if( get_sub_field('photo_ronde') == 'Oui' ): ?> rond<?php endif; ?>">
            	    <?php if( have_rows('images') ): ?>
            	        <?php while( have_rows('images') ): the_row();
                	        $image = get_sub_field('photo');
            	        ?>
            	            <div class="image">
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