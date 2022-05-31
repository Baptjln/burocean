<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'burocean' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd~o1|7w/{tq<4Z,eXw?uB=gK/5LB.0](yct46Ul#@S&ab:Pjl##/<zm#0E+q%J8d' );
define( 'SECURE_AUTH_KEY',  'A/eDOqe}Vm<%qdtkIYSwjqW>gQ8tVd^DUbRl!EV`h2pfT<!)dW,dY=8Z2LJADhz?' );
define( 'LOGGED_IN_KEY',    'h_{ncIpA<Am}a_nMp&DwX0{@;(3;>&^q:#qZT$OJ:aLNq]shuJZHXPv^GwQS3ua(' );
define( 'NONCE_KEY',        'z?09#bDg)k&=#|x8sH8q7LjL;@[Bjmyb.O^i.0z6WY:uS#)KHyd]p[s{BYC++i[!' );
define( 'AUTH_SALT',        '8d@Qb#N71k+lUe2K9{`J!.!QZ~+lwjI8x:)Sg+u_OCNkLkgq!:A],S!M_L[?nI2@' );
define( 'SECURE_AUTH_SALT', 'r4?M+@Md{q1jM|L6QId>|OR$^hA.nvjl:x^%Sk?!Cz}>*h2;UI~WX*.2p/!0NhS ' );
define( 'LOGGED_IN_SALT',   'F)2pd{:n2%Z[$i|F4)!yT]H44w;7-?2_Yv^j`M3&O3M~G1`U4zXZAKqD},u$: 6T' );
define( 'NONCE_SALT',       '|+#znVacy4@(,,,p+Av>S%tVN75{BY^7b&*qV]T^U;B0vQlB9,c$)n.Z4T]]07/q' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'bu_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
