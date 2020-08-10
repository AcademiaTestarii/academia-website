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
define('DB_NAME', 'academia_wpdb');

/** MySQL database username */
define('DB_USER', 'academia_wpdb');

/** MySQL database password */
define('DB_PASSWORD', '}G&5Q^9ZfG{_');

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
define('AUTH_KEY',         'FKQVxqDp!h*C3ewg(VK5lGodDsWydt7<oWdoI,k6%9c(WS 9HSr#-IS]62J6Ms e');
define('SECURE_AUTH_KEY',  '(5>TYTJ{n7,5kc[)NDyV[x+k<F(@ww$oYyoc&e0}M])/k5kAf;*?#T/Cj->JGoIm');
define('LOGGED_IN_KEY',    '3{$TJs>Z<v_)PAhJ+H_c*!MwK</Ib+nHfY7T<z,&C!ax6#SrN|gs56,m<ICBG1kG');
define('NONCE_KEY',        'gN]]-f:7g&ITvg#sQ{5gfLhJi)|;B9ys&N+xBN)iM0Eouu&uU`63](z5-_rx  )h');
define('AUTH_SALT',        '1Uw]Ng+J^2>5dAqn>9~U0:Nlj2:FhET+GxQ>Q:j:uwpo7<n=_$z^tlJ(/pM6|%^a');
define('SECURE_AUTH_SALT', '( zzqz96ml?Ym2q8Z$-83tj{MOEH7q(Me</cZrH4p.y~g!oeO2fi!7ACW9EO*Y2$');
define('LOGGED_IN_SALT',   '1pY<:|YO5ta3@xzd~e(z2f/S1A:1W~<o.s254M.#G5J@~2G(6dZLGSHZZ-qct^Oj');
define('NONCE_SALT',       '+-p{5!%m>B[/GkIWrI fMk8[MDTDo~jxfY?>P%25mDoim&j#= c>894pl_* MM<y');

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
