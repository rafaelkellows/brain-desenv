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
define('DB_NAME', 'montblanc');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '7jzHwCl/l*(M^ko?*:.~NIB+Cmza;|Y;EOJ)81W>zU Um`|7#Ya(M_HiG~I1Okb+');
define('SECURE_AUTH_KEY',  'eZOtLLkr2mS~Ca`5=k&#%E(.Fr72P`SIInOQ2Tu$9$I^GdcuC]opPJO8lp~)q9.D');
define('LOGGED_IN_KEY',    'o:QI^q^qUHYr2Ptpo9,dtN1e>DR15&q;6b[^aZR}OCl4><V _dD1$nt,N{Sg&-{?');
define('NONCE_KEY',        'F[6W7mVb)L,)IDWRtH,ew$n>3aMZ}iR8X]:RIgXOs`Q7:Gk  7l}DDm~pViCUU@5');
define('AUTH_SALT',        'tQnA,1YG,Q^l{}oC/ }HL;WpV|`mIT10I+$K=1Lym6)4K=KVl(L.`N#sipV$[~M%');
define('SECURE_AUTH_SALT', ',_h|rg2A#VoV*JV$zh+(P-i<kZT<2r$/;2+=3A``Qi@#!|lEsLLZ2qNQuDI6.-@4');
define('LOGGED_IN_SALT',   'ize7)<ZlP$`)c;yqqfn7YJ^)O`(@*%TxZK; (,FCHw/sU-)jlpqG5d6y{j0H^6sm');
define('NONCE_SALT',       'YPEnT`4o;`U-~9&3Fjvn8B$.*Ii4jIfuxqnfpiqK8YY#83C?nCKpZwSPz.5L#w [');

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
