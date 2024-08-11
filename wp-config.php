<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '`|**~)e#ztqz(0.sqPqUq47K{FeGBN]#Jhxc*q@93{:cL:%fH_((ew!*/YsWS$2O' );
define( 'SECURE_AUTH_KEY',  'H}N%MhFPvyg=wdg^,S,wN;Ot{h`W1yv{e2d@z-VpFDS%,Jk,uyO{UQrQ#O@YJ&Ae' );
define( 'LOGGED_IN_KEY',    'VabD;R>cA&v,c<XP3&P[f<^a,U#b(y;$iY<$>MAoJ%.DgYU$_nR<@E!xZ#=*jc%K' );
define( 'NONCE_KEY',        '@;A9PO0]q7?e8N_9uAmqr1TV~n#,s{!8W,^;36Y9kX|wFcdX&br]?}Bcg#XgWOZ[' );
define( 'AUTH_SALT',        ',Hgg5+is8Y--C/WSq2#P$F|0eQ-#xVs!?a:( -f`Ajej,3%0%y:?I[UG{A@_CAL7' );
define( 'SECURE_AUTH_SALT', '&`.f_KtA@LREF=gk`_wq?]dlvHq$mU1{dg)0o~NMPc.#%v4^(<|a(Q*Y2pDBZc^f' );
define( 'LOGGED_IN_SALT',   'L&1C8z8E{8iXxW~D`}0C48{v_0L0^J)UjFGDsR;Yk+F6?IuX#-Q[Ea&%T>.Y/GE2' );
define( 'NONCE_SALT',       'B}GV.xP`w/$Ubz=L1j-DmW2eeM_rZX@1uv~M`Dlr=g8,/r(*X.-t,+TNs=o:>2JI' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
