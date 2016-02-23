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
define('DB_NAME', 'wordpress44');

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
define('AUTH_KEY',         '<vCj6.Vw*ZA1bW@u+$r9@G+c5M5fvl/<|uR#y-oep<JK41)#ihIyWe&.Tjpqc`pe');
define('SECURE_AUTH_KEY',  '{.AP^%a;F7=C<ZtFuqMl,bm(Ae|oC|{q`6c+Y8]6teD%?MdBO@~u)SQ+b=zLBb8b');
define('LOGGED_IN_KEY',    'dE1iN4Ou-B,DE9i<9p:crK8_v/|i&d8AIZ3F1q@=@#Jpfv1?n1Sah-1%?SJY19$p');
define('NONCE_KEY',        'm78P@n|MC5nG.i|CDo|YWO:6S<YQ`;yBW&A%t,nU65n7.N*|AC;8n~?QI -4$C+N');
define('AUTH_SALT',        'PiVQq3:-+_=0@)9*k$|Vfqrzp8YJbu$F4=IBRbvk/-WlyKR:.T<BCl1 BCzPYZo[');
define('SECURE_AUTH_SALT', '} 6;S=UY8atyWj-sJlbu88~Qcy{,+HD7rXv<hEKfcd]7/-&X{]r>yLd0q|iP)/GA');
define('LOGGED_IN_SALT',   '+PsVr2D~u|-uK**2#_OQ;XN8+dqB*6GA(|il+#W0;J5||v8)4&bw4bh!+-DggWy^');
define('NONCE_SALT',       'I_{YPiExfYnRb/ g8d!daN&h$+L-LGRPp<37mRuu+^2Pk>1<Kql(b):B`F|bJ*IN');

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
