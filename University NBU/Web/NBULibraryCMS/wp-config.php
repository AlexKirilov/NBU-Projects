<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nbu_library');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '2vN4ToHdMpSU}:r*<niHaw4!Ghes$}_LZJm|(#PWT%CHq{$15~kNSlW}9*?2Sr/&');
define('SECURE_AUTH_KEY',  'tVD=R||z`@5/}|4%=x,<)wO.JsZqBN^4oT)s$o/h4X:}zHtKg^9V8N~`y-@&@,Sm');
define('LOGGED_IN_KEY',    '3btO{C^^(d,4d3/8Tx|gJCUT-.0i~2k|Hr,Zf:v08 W:~uDElU](|B=CT_$|^-^I');
define('NONCE_KEY',        ' -LZ`]:!+*Eg@wFb-hUM|%=|,/cpg9`$Y? 3E<5(OvAKdTFY$/UE|1M||jGx^W;n');
define('AUTH_SALT',        'QrZ]Gff*d^SODm>wGW!wD44-j[HM%gA[II-59`9+|C-FEu4,DsP]kz(X2cU>1YR{');
define('SECURE_AUTH_SALT', 'ze5+@Xe3I]?xR,I08YTDGIvxUe-[>-v6IcqN9*HCJ5u%}&4ZDZ]fv,?$-h?X^v7N');
define('LOGGED_IN_SALT',   '-9`fDnUk rX^7>U.kf./b[;n(Q6=*(3OdL%a4^%6ta-$Ahxg`YG+d,#(R|+qgTmz');
define('NONCE_SALT',       'FXUNgd[Z+n-;i4#f4G(<VS8^{zd77mfE<8!+w6zb@+1D>#qm@@Zehgt^StCv~J.)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
