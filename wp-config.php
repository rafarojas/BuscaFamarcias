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
define('DB_NAME', 'farma_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'pwd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', '-1');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#n5q8^{noY:75e+S2gV:M ~8A.{(K[v8@*@^Zq/I4)[&-09/u|1P7R|!:H@KowhP');
define('SECURE_AUTH_KEY',  'IOz]5 ++{gVM>M$(<v~oH.BBItz4a^!L>Uj#L0[H.r*QG%5QAHY87|!HP071/G[g');
define('LOGGED_IN_KEY',    'd>}]SY-sOTyFzh4->sqb4}e-n%v1K>C2ofy;o+,],G{01r@/>UmIi#^UkNhZ.1XA');
define('NONCE_KEY',        ';z~QZL/GVIWi2^+T16+xDnP)rD+V|J~LT ~[/gG=_H1D4Mj(8Vs|x8xkuk.*b4Wc');
define('AUTH_SALT',        '<Tn]*{2y,/7/4oklq4s>l4IKJx8-^M<{T0$`X?8@5&Eh(a|-SSH,JYgCQv9%la4d');
define('SECURE_AUTH_SALT', 'H0K&vl2@;lluoEP<VsBZT*+`:^nP%oK&:2hB_5ueYJYPn|k@:{JkD_w{E?Hzp,9]');
define('LOGGED_IN_SALT',   'ibY$x0hKQQWIFyYIBw3cWTCJR6r! MB&lx&P|_,u0o?`ak-*oMm_e!~EAilJ*|iC');
define('NONCE_SALT',       ' amu4E8~}lFm^o|?#=|E5(G4QqG[.hAo>/K>2)`$07+<W@IuVs,!ckho)!`.GFGc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
