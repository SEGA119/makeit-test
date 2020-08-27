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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'makeit_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h[IWkmVkBmn)X[+Dr_;$nSj+k8Wxs[ZpkxY.TOv`}6^uA+.PC;|E3LZYEMX $Io$' );
define( 'SECURE_AUTH_KEY',  'Id=/e9?)?dQK7~.{_gN,LxN#R|R2Cx<.k _9b-m;`#HxOSD]3lD0,@]Q$FRqJdDs' );
define( 'LOGGED_IN_KEY',    '5Kx4Ks_>6F25cAiGniU|c4P1gv#[{B~icumE;X5o{B;L{4bOxbwBGr:Z_Hjbb`mm' );
define( 'NONCE_KEY',        '3|i8m#U+XmK[f_bDaJ%ZhN&=r,:R.d|Yq:3sJhe`[Wb&~tM(>o~K]#}JZ>ZiLX7`' );
define( 'AUTH_SALT',        'sYe]W@(<7%,P[uwg?,4@f2:Vf%=Q!{_I}bl gyuS:2##^ztO+!(@@$&K8}A*2_%+' );
define( 'SECURE_AUTH_SALT', '*M2?MChg,N=qchV#zQ:XI4l7W/1doR /hoI.|#ktwb;1~4kDTyj9a+:(<?P8J<YS' );
define( 'LOGGED_IN_SALT',   '(i`_W>xkT8>j~J/o6h/VJnc(@.,j*^Um7+}w&}nk][{|xoNHmMn=yKA|mHE.`F==' );
define( 'NONCE_SALT',       'E&*$RImc1<A79$m@SAPxl|N.3x5y#L{JlY7#04*c4!@QC;g]tKTL||f.me#.9ndb' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
