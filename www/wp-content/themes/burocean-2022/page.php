<?php get_header(); ?>

<section class="page">
	
	<div class="txt-center bloc-titre wrapper">
	    <h1 class="font-2"><?php the_title(); ?></h1>
	    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div <div class="breadcrumb txt-center">','</div>'); } ?>
	</div>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="contenu">
    	<?php if ( has_post_thumbnail() ) : ?>
            <figure class="photo"><?php the_post_thumbnail(); ?></figure>
        <?php endif; ?>
        
        <?php $thecontent = get_the_content(); ?>
        <div class="wrapper">
        	<?php if(!empty($thecontent)) { ?>
            	<div class="bloc-jaune">
            <?php } ?>
            
            <?php the_content(); ?>
            
        	<?php if(!empty($thecontent)) { ?>
        	    </div>
            <?php } ?>
    	</div>
    </div>
	
	<?php endwhile; else: ?>
	<div class="box-erreur">
		<h2 class="erreur">Erreur</h2>
		<p>Désolé, mais la page que vous recherchez n'existe pas ou plus.</p>
		<a class="btn-retour" href="<?php bloginfo("url"); ?>">Retour à l'accueil</a>
	</div>
	<?php endif; ?>
	
	<?php if (is_page(53)){ ?>
    	<div class="feature">
            <div class="wrapper">
                <?php include('fragments/_fabricant.php'); ?>
            </div>
        </div>
    <?php } ?>
	
	<?php 
    	$largeur_col = get_field('largeur_colonne');
		$largeur_col_e = get_field('largeur_colonne_e');
        $largeur_col_2 = 12 - $largeur_col;
		$largeur_col_e_2 = 12 - $largeur_col_e;
	?>
	
	<div class="wrapper">
    	<div class="row cols-page">
        	<div class="col-md-<?php echo $largeur_col; ?>">
            	<?php if( get_field('titre_col_gauche') ): ?>
            	    <h3 class="titre-row"><?php the_field('titre_col_gauche'); ?></h3>
                <?php endif; ?>
                <?php the_field('texte_col_gauche'); ?>
        	</div>
        	
        	<div class="col-md-<?php echo $largeur_col_2; ?> <?php if (is_page(55)) { ?>col-lg-5 col-lg-offset-1 contact<?php } ?>">
        	    <?php if( get_field('titre_col_droite') ): ?>
            	    <h3 class="titre-row"><?php the_field('titre_col_droite'); ?></h3>
                <?php endif; ?>
                <?php the_field('texte_col_droite'); ?>
    	    </div>
    	</div>
        
    	<div class="row cols-page">
        	<div class="col-md-12"><?php the_field('mentions'); ?></div>
    	</div>
		
		<div class="row cols-page">
			<div class="col-md-<?php echo $largeur_col_e; ?>">
				<?php if( get_field('titre_col_gauche_e') ): ?>
					<h3 class="titre-row"><?php the_field('titre_col_gauche_e'); ?></h3>
				<?php endif; ?>
				<?php the_field('texte_col_gauche_e'); ?>
			</div>
			
			<div class="col-md-<?php echo $largeur_col_e_2; ?>">
				<?php if( get_field('titre_col_droite_e') ): ?>
					<h3 class="titre-row"><?php the_field('titre_col_droite_e'); ?></h3>
				<?php endif; ?>
				<?php the_field('texte_col_droite_e'); ?>
			</div>
		</div>
		
		<div class="row cols-page">
			<div class="col-md-<?php echo $largeur_col_e; ?>">
				<?php if( get_field('titre_col_gauche_e_2') ): ?>
					<h3 class="titre-row"><?php the_field('titre_col_gauche_e_2'); ?></h3>
				<?php endif; ?>
				<?php the_field('texte_col_gauche_e_2'); ?>
			</div>
			
			<div class="col-md-<?php echo $largeur_col_e_2; ?>">
				<?php if( get_field('titre_col_droite_e_2') ): ?>
					<h3 class="titre-row"><?php the_field('titre_col_droite_e_2'); ?></h3>
				<?php endif; ?>
				<?php the_field('texte_col_droite_e_2'); ?>
			</div>
		</div>
	</div>
</section>

<?php include('fragments/_logos.php'); ?>

<?php get_footer(); ?>