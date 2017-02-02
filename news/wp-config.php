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
define('DB_NAME', 'brainvestnews');

/** MySQL database username */
define('DB_USER', 'brainvestnews');

/** MySQL database password */
define('DB_PASSWORD', 'Kellows@Rafael4527');

/** MySQL hostname */
define('DB_HOST', '68.178.143.95');

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
define('AUTH_KEY',         'o[$;n|)4YjwBIf~;%9 `F.XXNAOSK3|ab!Wa8>1B+?B3 ~YS/wONfzRr(:FHTD@~');
define('SECURE_AUTH_KEY',  's]A|0~_L ?[SGk6(}A)0xnZvI-Q|paw$@h5b;*qzAZYr#jp?k+2U|W&ij_WC&hxD');
define('LOGGED_IN_KEY',    ':~UXL8i~.OG!cO)t=C(R^!@wJFD%IAbEo8c|ZGGz}Vn(aW<w05ep4DIY^V-K!<2v');
define('NONCE_KEY',        '#%UsVr<C%E=YFj2P!+vN`>@*8Bfud>XV4HV$ItF7L>FRs,z{jnV|ki9zx]vY 4E7');
define('AUTH_SALT',        ']~y+0~*Jd.glWn@G[]anX6=mUYJ+*Ao?T~)Q44ao2Y`-M{K|.77r~.k}Y`C;vO=C');
define('SECURE_AUTH_SALT', 'Wjw# cJ^c#1`(6s$8wq1T6f(o{P[z&`~y$g4kJVm]6[!;;Bi(mHu*&8.2+Kh/JIJ');
define('LOGGED_IN_SALT',   '>Ne4]6P)2}#5SymBCvMhG5}h.A@ztq}<dB{9YEg[eXQUa.%.e7LcTg]lYhm8SP54');
define('NONCE_SALT',       '-/x{e:PYK@z:Bq1y6k)6*iE%g&m8%=cCK_TcwY&-5_+4CujHO^.#OZ80$fmHV-nc');

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
