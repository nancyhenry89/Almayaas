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
define('DB_NAME', 'almayaas');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8XUK ??lZhj#WsNhGh UKD5GLTnJ@[p/BPugLVgm),w207B{L6$~|aLK6oAi&s3w');
define('SECURE_AUTH_KEY',  ':U#O-7Igdn~$]:vP}:177A-3wN@ /5kAhz&BGb`p1uB^;&oLX0k3ZF!SX.GFN3<}');
define('LOGGED_IN_KEY',    'KTjs*z+n0)Q?S0B$T0u)(yZ<8n1NN/ Uf^l3=!XK.|}lST.x{6)~{oo?d<1EF=m,');
define('NONCE_KEY',        '$HcEL6Hm5PVI8,92Ng9>HhsYdp&|,DL0RqYO2*mX!1-HIK*U<B3x]P0y/`rfjp{!');
define('AUTH_SALT',        'B`>e?y`ZeNT{bSxc7xm`edb%t|9GUdEcR{Dp$].L~#]m@q #0}F:vj,TL$g[Meno');
define('SECURE_AUTH_SALT', 'RFo?8P<C:m8wzcXA&CTHhVW$)b2m%/.y$o[W7ZKe] Wg<7FK~fl:#?H>b1ff#~e@');
define('LOGGED_IN_SALT',   '1e@$.9/_gdd-L|n<jRTDAC{{ga%_<hk2Re!=wYGAdmhSUz4AkO<.uL9l&R@nzYuw');
define('NONCE_SALT',       'y*f!0=y4c7dJdJ!J1>tBlL<+Pw Sl9BAnVE*Sd:Mf2.OlE<+Vt;(2&[tN}bH_G^@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'my_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
