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
define( 'DB_NAME', 'scoop' );

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
define( 'AUTH_KEY',         'QTYlQ2Y6Y|Aw}zZMsl JlDux%w/@5H6w}~BT}:-$s~&}MZ7.g1aS/h42dl!`c*nH' );
define( 'SECURE_AUTH_KEY',  '}.~=rGaa+f%JRb>]t9V@s}qO]G@/,d(Jn%SrPdwl}T;be!26GA1*RyhW9{M:i#8%' );
define( 'LOGGED_IN_KEY',    'rr9.,)d.kY]<~/*u$CMG6I#F0I0ult27h)I_!<u!CJ)tHt0$(> VG}2tuEn$3Y!1' );
define( 'NONCE_KEY',        '= b7=SX+H[XOWzn@p&7T ~t;(@5fmNtnql>&=?8oyDoTU]W}O$N-]MPMk3+r<` U' );
define( 'AUTH_SALT',        'NMv3Rl32NfR>b#Nm6A`P;`g-)?MQk63rB1)]2!Mw8}d_Pu+5|]Y3U?3WD%Ial MZ' );
define( 'SECURE_AUTH_SALT', '6bq(#uMiVlh3v?7V {(+ywU5TYCZ&iE,+VMNv:]s(FT.wF@.{-Y,`hTuXX{=KBrn' );
define( 'LOGGED_IN_SALT',   '>~!jMP_NCOc~@kNfF~/OV <xG6Sp{ahzN;}c@eFquM8r)4Io%Sam!F~b9[a|z>1j' );
define( 'NONCE_SALT',       'N<]VIY-Zg#zrkin<kcUQ=3>SSL^XgH)d}i}X<P`#B3%M;{(a]=5Wb b)veNs>!>n' );

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
