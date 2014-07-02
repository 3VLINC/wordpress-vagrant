#!/bin/bash

DELETE_VAGRANT=false

read -p "If you chose to continue any vagrant machines in this directory will be destroyed. Are you sure you want to continue? y/n " RESPONSE_DELETE_VAGRANT

	case $RESPONSE_DELETE_VAGRANT in
    y|Y)
        DELETE_VAGRANT=true;;
    esac

if [ "$DELETE_VAGRANT" = true ]; then

	vagrant destroy
else
    exit
fi

read -p "Enter the dev url of the site (e.g. wp.dev) " domain



read -p "Enter the vagrant server IP (e.g. 10.10.208.2) " ip

echo "$domain will be hosted at $ip"

OVERWRITE_WP_CONFIG=true

if [ -f "public/wp-config.php" ]; then

    OVERWRITE_WPCONFIG=false

    read -p "A WP Config file already exists. Would you like to overwrite it? y/n " RESPONSE_OVERWRITE_WPCONFIG

    case $RESPONSE_OVERWRITE_WPCONFIG in
    y|Y)
        OVERWRITE_WPCONFIG=true;;
    esac

fi


if [ ! -f "public/wp-config.php" -o "$OVERWRITE_WPCONFIG" = true ]; then

	echo "writing wp-config.php"

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
	" > public/wp-config.php
	
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

OVERWRITE_VAGRANTFILE=true

if [ -f "Vagrantfile" ]; then

    OVERWRITE_VAGRANTFILE=false

    read -p "A Vagrantfile already exists. Would you like to overwrite it? y/n " RESPONSE_OVERWRITE_VAGRANTFILE

    case $RESPONSE_OVERWRITE_VAGRANTFILE in
    y|Y)
        OVERWRITE_VAGRANTFILE=true;;
    esac

fi

if [ ! -f Vagrantfile -o "$OVERWRITE_VAGRANTFILE" = true ]; then

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
	
	config.vm.synced_folder \".\", \"/vagrant\",type:\"rsync\",rsync__exclude: [\".git/\",\"public/wp-content/uploads\"], :owner => \"vagrant\", :group => \"vagrant\"
	
	config.vm.provision :shell, :path => \"bootstrap.sh\"
	
end
	" > Vagrantfile

fi

read -p "Enter the version number of WordPress you'd like to check out. Leave blank for the latest " CHECKOUT_WPVERSION


if [ "$CHECKOUT_WPVERSION" = "" ]; then

CHECKOUT_WPVERSION = "master"

fi

cd public/wordpress

git fetch

git checkout $CHECKOUT_WPVERSION

cd ../

read -p "Would you like to run vagrant up now? " RESPONSE_DO_VAGRANT_UP

case $RESPONSE_DO_VAGRANT_UP in
y|Y)
    vagrant up --provider virtualbox;;
esac
