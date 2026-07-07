<?php /* Template Name: Qui sommes-nous ? */ ?>
	
<?php get_header(); ?>

<section class="page">
	
	<div class="txt-center bloc-titre container">
		<h1 class="font-2"><?php the_title(); ?></h1>
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div <div class="breadcrumb txt-center">','</div>'); } ?>
	</div>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="contenu">
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="photo"><?php the_post_thumbnail(); ?></figure>
		<?php endif; ?>
		
		<?php $thecontent = get_the_content(); ?>
		<div class="container">
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
	
	<div class="feature">
		<div class="container">
			<?php include('fragments/_fabricant.php'); ?>
		</div>
	</div>
</section>

<?php include('fragments/_logos.php'); ?>

<?php get_footer(); ?>