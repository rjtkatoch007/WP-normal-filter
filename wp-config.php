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
define( 'DB_NAME', 'testpress' );

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
define( 'AUTH_KEY',         '62{+S!PXL?yWJ2FJC/{q rfuQUF4t7Yi+K<Xf[E1jN:IX&2m3A&M9$_s|ul_Y:bg' );
define( 'SECURE_AUTH_KEY',  'n<BVPX/|,O!;#p+V_dBx9I}*B|[Deck)QFnX6_b%Y&<WneU!&zlZy+:{e+I3!pTA' );
define( 'LOGGED_IN_KEY',    'RU9a`vKP`eF:7YBVFo.>0]]4ftL+zG[=2&_F3uk<9}Vso3|/krMzexl81T(&.H_^' );
define( 'NONCE_KEY',        '[nobcR=~mGQq.tTwV[Hj* o+$k8~XI#/E~Q{id;SoCZwoCF*?vFkOW)Ev?w9m,w{' );
define( 'AUTH_SALT',        'V@[/RD&9;WvEO]GCdJ?Lq)I3_q{-YL9-S1k-iqC[Bq1Vf~Y20[*9QDRI%?P;JMXT' );
define( 'SECURE_AUTH_SALT', 'lg<U~*vO[jc1xm5Q;@s&H#&,bb*ePpYc>!QT,&}}nN#d8bVb*fh{}MEWC1Wi*WV5' );
define( 'LOGGED_IN_SALT',   '<J--hVvL,Lx:j],gzU6be3TAEBJQU!;+ P]C6?AZpO:6vN&LCw#.jF*&T <,|)KU' );
define( 'NONCE_SALT',       '9{g>l}FVa>?^p%I8p#^CVzT0nB#XUfFx8atK#&v Bn8]f[dQl|gt+pY(E!T_n9=W' );

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
