<?php get_header(); ?>

<?php
	foreach ( (array) get_object_taxonomies($post->post_type) as $taxonomy ) {
	  $object_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'all'));
	  foreach ($object_terms as $term) {
	      $termSlug = $term->slug;
	   }
	}
?>

<section class="wrapper">
    <div class="txt-center bloc-titre">
        <h1 class="font-2"><?php echo $term->name; ?></h1>
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div <div class="breadcrumb txt-center">','</div>'); } ?>
        <?php echo category_description( get_category_by_slug('gammes-cats')->term_id ); ?>
    </div>
	
	<div class="liste-cats">
    	<div class="grid-sizer"></div>
    	<?php
    		$args = array(
    		  'post_type'   => 'gammes',
    		  'posts_per_page' => -1,
    		  'tax_query' => array(
    				array(
    					'taxonomy' => 'gammes-cats',
    					'field' => 'slug',
    					'terms' => $termSlug
    				)
    			)
    		);
    		query_posts($args);
    	?>
    	<?php while ( have_posts() ) : the_post(); ?>
    	
    		<div class="col">
                <figure class="photo">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('liste-cats'); ?></a>
                </figure>
                <h2 style="background: <?php echo the_field('couleur'); ?>;">
                    <a style="color: <?php echo the_field('couleur'); ?>;" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <p><?php echo excerpt(30) ?></p>
        	</div>
        
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
</section>

<?php include('fragments/_logos.php'); ?>

<?php get_footer(); ?>