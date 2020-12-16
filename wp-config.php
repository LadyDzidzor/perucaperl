<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'new_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'IDrbo,%R !d{d8GvUXRo>yFsXKFq~Y.z`J;E@G6Zv5o]N3ZZ1BX$,!>J2D9*K:;O' );
define( 'SECURE_AUTH_KEY',   '=*~=RZ9HCTHG}}p;!6dPb$f}*_{#DUz)C8buS,XmJ2L{U[1T7t]_T.Rl.9gDkPwM' );
define( 'LOGGED_IN_KEY',     'rZL=$V-IIg:`Ab;VD&?3lIbL n:gfuzrQ_vb#J]hna4@n=3=_Lpc~141O)o<V7T-' );
define( 'NONCE_KEY',         ':?o)$^tL&Qom9VvfKcH>;,b1A;RiA]c?v eI!!,#6*Q}9j~f[p`m.OMM-h;Q%|r:' );
define( 'AUTH_SALT',         '-%lEP;R22Z]bd;X/MnPwUDs}4Zkc{*x6VvFx=(6hO|o$%^`t@,zut)q{7?*,zuxh' );
define( 'SECURE_AUTH_SALT',  'uWrGN}95^{U8,iMQWK[Xjqln4C!)@js&}<g?_Hwii6DHE~f<.j}s`*v9jxZHy/MS' );
define( 'LOGGED_IN_SALT',    ']:Sr5hUn]I{ yvyAD:42]v{#u>E7tHC5S9g:(ivuer+Wh,:!}:D|ph`?l#d|^~nG' );
define( 'NONCE_SALT',        'G.&x!1LGxG:4wd{Ww5+%Jy6!JFL:$8<a{qie2Is.|FIHv_Hdi+%JFqKxNt]<pPPB' );
define( 'WP_CACHE_KEY_SALT', 'sdV4ioSUfMS_AO-Mj@=)Kqbfn,/DWFKZZ#;Mor. H^?UR6Z#-!K]DNh?]_m8m6pU' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
