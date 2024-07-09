<?php get_header(); ?>

<section class="wrapper">
	
	<div class="txt-center bloc-titre wrapper">
	    <h1 class="font-2"><?php the_title(); ?></h1>
	    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div <div class="breadcrumb txt-center">','</div>'); } ?>
	</div>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="contenu">
    	<?php the_content(); ?>
    </div>
	
	<?php endwhile; else: ?>
	<div class="box-erreur">
		<h2 class="erreur">Erreur</h2>
		<p>Désolé, mais la page que vous recherchez n'existe pas ou plus.</p>
		<a class="btn-retour" href="<?php bloginfo("url"); ?>">Retour à l'accueil</a>
	</div>
	<?php endif; ?>
	
</section>

<?php include('fragments/_logos.php'); ?>

<?php get_footer(); ?>