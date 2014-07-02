#!/bin/bash

read -p "Enter the dev url of the site (e.g. wp.dev) " domain
read -p "Enter the vagrant server IP (e.g. 192.168.208.2) " ip

echo "$domain will be hosted at $ip"

if [ ! -f public/wp-config.php ]; then

	touch public/wp-config.php
	
	echo "<?php
	
	define('DB_NAME', 'wordpress');
	
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
	" >> public/wp-config.php
	
	salt=$(curl https://api.wordpress.org/secret-key/1.1/salt/)
	
	echo "	$salt" >> public/wp-config.php
	
	echo "	/**#@-*/
	
	/**
	 * WordPress Database Table prefix.
	 *
	 * You can have multiple installations in one database if you give each a unique
	 * prefix. Only numbers, letters, and underscores please!
	 */
	\$table_prefix  = 'wp_';
	
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
	" >> public/wp-config.php
	
	echo "	define( 'WP_CONTENT_URL', 'http://$domain/wp-content' );
	
	define( 'WP_HOME', 'http://$domain');
	
	define( 'WP_SITEURL', 'http://$domain/wordpress');
	" >> public/wp-config.php
	
	echo "	/* That's all, stop editing! Happy blogging. */
	
	/** Absolute path to the WordPress directory. */
	if ( !defined('ABSPATH') )
		define('ABSPATH', dirname(__FILE__) . '/');
	
	/** Sets up WordPress vars and included files. */
	require_once(ABSPATH . 'wp-settings.php');
	
?>" >> public/wp-config.php
	
fi

if [ ! -f Vagrantfile ]; then

	touch Vagrantfile
	
	echo "# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = \"2\"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	
	config.vm.hostname = \"$domain\"
	
	config.vm.box = \"precise64\"
	
	config.vm.box_url = \"http://files.vagrantup.com/precise64.box\"
	
	config.vm.network \"private_network\", ip: \"$ip\"
	
	config.vm.provider :virtualbox do |vb|
	
		vb.name = \"$domain\"
	
		vb.customize [\"modifyvm\", :id, \"--natdnshostresolver1\", \"on\"]
	
		vb.customize [\"modifyvm\", :id, \"--natdnsproxy1\", \"on\"]
	
	end
	
	config.vm.synced_folder \".\", \"/vagrant\", :owner => \"vagrant\", :group => \"vagrant\"
	
	config.vm.provision :shell, :path => \"bootstrap.sh\"
	
end
	" >> Vagrantfile

fi