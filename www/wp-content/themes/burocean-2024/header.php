<!DOCTYPE html> 
<html <?php language_attributes(); ?> class="no-js"> 
 
<head> 
	<meta charset="<?php bloginfo("charset"); ?>">
	<title><?php wp_title() ?></title>
	
	<meta name="copyright" content="© Copyright 2018 Burocean" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	
	<?php wp_head(); ?>
	
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120229543-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-120229543-1');
    </script>
	
	<!-- Global site tag (gtag.js) - Google Ads: 1034037681 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1034037681"></script>
	<script> 
		window.dataLayer = window.dataLayer || []; 
		function gtag(){dataLayer.push(arguments);} 
		gtag('js', new Date()); 
		gtag('config', 'AW-1034037681');
	</script>
</head>

<body <?php body_class(); ?>>	
	<header>
		<div class="top-nav">
			<?php wp_nav_menu(array(
				'theme_location' => 'top-menu',
				'container_class' => 'wrapper',
				'container' => 'nav',
				'items_wrap' => '<ul>%3$s</ul>',
			));
			?>
		</div>
		
		<div class="wrapper">
			<div class="row table">
			    <div class="col col-md-4 accroche hidden-sm">
			        <span><?php the_field('texte_gauche', 'option'); ?></span>
			    </div>
			    
                <div class="col col-sm-8 col-md-4 txt-center">
                    <?php if (is_front_page()){ ?>
					    <h1 class="textReplace"><?php the_field('titre_h1_de_la_homepage', 'option'); ?></h1>
					<?php } ?>
                    <a class="logo" href="/" title="Retour à l'accueil">
                        <img src ="<?php echo get_template_directory_uri(); ?>/assets/images/logo-burocean-2024.jpg" alt="Logo Burocean" />
                    </a>
                </div>
                
                <div class="col col-sm-4 txt-right">
                    <a class="partenaires" onclick="return gtag_report_conversion('<?php the_field('lien_texte_droite', 'option'); ?>');" href="<?php the_field('lien_texte_droite', 'option'); ?>" title="<?php the_field('texte_droite', 'option'); ?>">
                        <i class="icon-user"></i><span class="hidden-sm"><?php the_field('texte_droite', 'option'); ?></span>
                    </a>
                </div>
			</div>
		</div>
		
		<div class="content-nav">
    		<span class="nav-mobile visible-sm"><i class="icon-nav"></i><span>Menu</span></span>
            <?php wp_nav_menu(array(
				'theme_location' => 'main',
				'container_class' => 'wrapper',
				'container' => 'nav',
				'items_wrap' => '<ul>%3$s</ul>',
			));
			?>
        </div>
	</header>