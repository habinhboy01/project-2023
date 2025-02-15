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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'awtg' );

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
define( 'AUTH_KEY',         '5.8{@3.|7]w|I,R0Pr$x](,ov?dFBCSZ<H)JGfY^=`GIF)FEt.C A3O/Z?CDa;&*' );
define( 'SECURE_AUTH_KEY',  '+VTQVvd#Z}E^u[baT48D#olL89q_xRp]T:R::<UbTp_3)SY5GpgdP_JuEpUC~jOl' );
define( 'LOGGED_IN_KEY',    'ID8XGX${v5RZT3AV3,?`M7ZexZ pq)jthu|2~n*&nrYo?p9Q-,z ]NEl1D*oLbT>' );
define( 'NONCE_KEY',        'm=J`W/m7ohLB^K~mL7YE<0},E_DH%/]-5EazvBOK7sCXNPrwe,t)ST|ox&A?tbA{' );
define( 'AUTH_SALT',        'aV ]YX,(Q0holR=U8v6QTcBF,5^x:>/#-QBMjeD8XxIzC^0&)6wI/885<x6pKQK0' );
define( 'SECURE_AUTH_SALT', 's8HEBX*/?G:rK$Um}gf}hdk+cr<BU+~+H!Jze.x?=al&%[xz/iED(&8.gt:B*)Bx' );
define( 'LOGGED_IN_SALT',   'tg4}//DnT+J`cUMe5e;_9n5[fDQi<?k(ODZb|]XR@f0}LpJK~v[%UoS8$8&ph>{A' );
define( 'NONCE_SALT',       '9&y<I`k]HL;)<G($NFS,=$vu4.y27#j5eavqvb_CsVYMy*i<NA@C/@XvJX[]-uxN' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
