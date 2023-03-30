<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'store' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';`%q?Vch1uj*i]#OQglcWf [f5j;>A|Z@43jezAqo-?cn^[@}N/>d{)IiFrMi`P#' );
define( 'SECURE_AUTH_KEY',  'Mk&*>^HI&lJ1=JRDl*c>=Tqp!T9@D*KTWb9ip8Amn8k?HSlH} F@$Lnnbd(A;m<e' );
define( 'LOGGED_IN_KEY',    'ZSo0P:]ITH6#X}~tR#F4s|Rb%z*3^=BfdCDQ)L*#)A-:,%T )r93Ish249/dF];%' );
define( 'NONCE_KEY',        'Kf/)-r`dXV?.EvIdE8SgDL&z+ou>&kPW!NLQ2EwaDVc0<7>YRB0Gg9<uyCsO*wnw' );
define( 'AUTH_SALT',        'Up:)$3/b:Pd;0 m{wB^ZC2?hHlglx>vpy_wo568QSnW4NGoQS;O>xBXLTaRQ$_p#' );
define( 'SECURE_AUTH_SALT', '$TQ6`0bhFN qO79Z2RtPjqhQMf]a:ZVCT5_kYB=+soROITR.*M=@%Al[Q#zr_Baj' );
define( 'LOGGED_IN_SALT',   'tO1hAX?r0s([lCR4jk+=/^L3U[=U?%tjUZ*8r>m#erwuCBsK,E-TtWNF!y45v1Yj' );
define( 'NONCE_SALT',       'ec2]Cl)P{}Y}c;b.+|wZp ,fqVoL+*;her3U^b/qbh,B=R=TT5-V*CimD1,_2nVt' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
