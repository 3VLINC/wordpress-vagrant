<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** The name of the database for the Last Post */
define('LAST_POST_DB_NAME', 'last_post');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'wordpresspass');

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
define('AUTH_KEY',         '4C-n/^n!zuz-gJJ7_!ucE`BbB[q%ofL11aUR8xK,9i:,g+N}WvSzJ|8-m`;sg+m2');
define('SECURE_AUTH_KEY',  'h}L!b7w!-c$TKE{7GAz7m+>?>|Yz2pI6--(3r],M+fapgk*<)-1j=_y97Y10~;b[');
define('LOGGED_IN_KEY',    'lD[4.:yt`!s,On.{?X(42yL+Hy<Y-& M(jo)}^U}QK&#ehm$lz{,w}?N@%p[S*B]');
define('NONCE_KEY',        '[~s+L&uqnD~Xe-8q.CEp7A|+~(1kyI#KY<)xv!1r?v4g`M-Hktv5OB~>9NkX~#=.');
define('AUTH_SALT',        'jK8I#e#:>:pNzf{9(+cH9?#BiEKxC0h}{TF-;gc5_+Ci<?%&+O~G3bOX Zv=/YL6');
define('SECURE_AUTH_SALT', 'hYs3FrD/%X5Mu%ZPlV73Qd(JiUg,ND0z!@;_%7PIS0#-tK#Dd4l.h_!T$8*}K]+q');
define('LOGGED_IN_SALT',   '~TeL&g3p%:gfswbw:,h21h7[jgN;n^#| w  *6.G4q@+E%s>:~C|CVRHsx@|)J(b');
define('NONCE_SALT',       'Im?Ik+r:LS*~N$V,ZsDK+asea/7oY%;avV]j}`+dP~q}$E6K@Krb/ nr[m0Y`g{o');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content' );

define( 'WP_CONTENT_URL', 'http://wp.dev/wp-content' );

define( 'WP_HOME', 'http://wp.dev');

define( 'WP_SITEURL', 'http://wp.dev/wordpress');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
