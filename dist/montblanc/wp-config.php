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
define('DB_NAME', 'dbmontblanc');

/** MySQL database username */
define('DB_USER', 'dbmontblanc');

/** MySQL database password */
define('DB_PASSWORD', 'Kellows@Rafael4527');

/** MySQL hostname */
define('DB_HOST', 'dbmontblanc.db.2054282.hostedresource.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'CXMrv-y5V3pX-yI4Ic/Y3#)O+b2K>_O ]{:^FlNeNAnrrU;$czbZ~=gQ,3_r*iXr');
define('SECURE_AUTH_KEY',  'G@ ?~e2Q~5;Q4wh@IkymwUdcMOm_%WZQDsVj/J g$)b&UTX))rr2s^ShEzjen{M$');
define('LOGGED_IN_KEY',    'f?P;B2#>9V/U>Qlf2Rb,~e0tor@3lll~-1b`v5dcPLSkY_Kc-BQsj*p=,O|xtNaG');
define('NONCE_KEY',        '{R-yd}-=9P%hnN3gF_&rVk {KknG@-&V&<,PDd[0sH%b}ubj^$kC6T9{udGB}Pl,');
define('AUTH_SALT',        '@Wy)>NYsL~yk(?rYd%PL2K`Dtv>i/&;LYCmajXKsG(6d.4j}L@%t3Bwx/vn6BT,0');
define('SECURE_AUTH_SALT', 'EK w(Bt57eSk+,7DYsC^qX05!JVaAJ~)^cRMktJ{|e2pUr3%`/Zo?4MOp+K|Cw+$');
define('LOGGED_IN_SALT',   '`X`EkLK#:v5-OgMU{0LZv<b0Cnu`O~XCoU!vy-0>i>X~PTsn>NlD^S::gQB8xvKB');
define('NONCE_SALT',       '9el: tPGa+fj{A:(%&/Ws,3xU>jrl2Pxw_r^=fQaM%`5&nyErm)foyN9=k-=dl1k');

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
