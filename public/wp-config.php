<?php

	require('vendor/autoload.php');

	$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
	
	$dotenv->load();

	define('DB_NAME', getenv('DB_NAME'));
	 
	/** MySQL database username */
	define('DB_USER', getenv('DB_USER'));
	
	/** MySQL database password */
	define('DB_PASSWORD', getenv('DB_PASS'));
	
	/** MySQL hostname */
	define('DB_HOST', getenv('DB_HOST'));
	
	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', getenv('DB_CHARSET'));
	
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
	
	define('AUTH_KEY',         '!p#)T?l`}mJKu^X`9r[mz|:ADdJPYo:f|+Z[>[nM;tZ5v4}*cJliN/9lIwOGa^:&');
	define('SECURE_AUTH_KEY',  'Qe|_9ud]v,!F4BOwRw0ImCB%H|V&opq$xI#OG0@vsKX)46xDVUug3]9*J,rp8vAO');
	define('LOGGED_IN_KEY',    '#i;TdZV$IQMyl1m4&g.8)3g55trO&-(RI2:h}WdN+UBd:Y1J|;%fS^2Of8Q*WQ+7');
	define('NONCE_KEY',        'N4KnGo&P99TGEP:+m.%-SV/;}MbJ6[#y~|4W-K^#@Jh-p#_`p!+$M ,vcTf:=yjP');
	define('AUTH_SALT',        'D-/|iGN#J;wT888u2/t&IhW`pCG7:7{32tUCWswlo*FW.c}+C~:;S+m:?dC|>|r,');
	define('SECURE_AUTH_SALT', '=b.R *a2;HSJ;]Hb0t?%.>R(WL}E&Y$=4]PMJBgHpgxyfylp~%+MW[NR!W%P;+.L');
	define('LOGGED_IN_SALT',   'kw[d<|Yt!l2&skE+.5xwB3k|TE+I=p/TtwH-01~@sQ-2V;?E7pP3ndCIBZ$8xQ,n');
	define('NONCE_SALT',       '+;8P?!eHv=MYArpL[&PFTGm3 Q-&jM.m>S/Vp|%/MsIlxq-cyj-_8;vi up^ |RG');

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
	define('WPLANG', 'en_CA');
	
	/**
	 * For developers: WordPress debugging mode.
	 *
	 * Change this to true to enable the display of notices during development.
	 * It is strongly recommended that plugin and theme developers use WP_DEBUG
	 * in their development environments.
	 */
	define('WP_DEBUG', getenv('WP_DEBUG'));
	
	define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content' );

	define( 'WP_CONTENT_URL', getenv('HOST_NAME').'/wp-content' );
	
	define( 'WP_HOME', getenv('HOST_NAME').'');
	
	define( 'WP_SITEURL', getenv('HOST_NAME').'/wordpress');

	define('WP_FAIL2BAN_AUTH_LOG',LOG_AUTHPRIV);
	
	/* That's all, stop editing! Happy blogging. */
	
	/** Absolute path to the WordPress directory. */
	if ( !defined('ABSPATH') )
		define('ABSPATH', dirname(__FILE__) . '/');
	
	/** Sets up WordPress vars and included files. */
	require_once(ABSPATH . 'wp-settings.php');
	
?>