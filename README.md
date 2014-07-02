wordpress-vagrant
=================

Given a hostname and an IP address the included setup.sh file will create and configure a WordPress Vagrant Server for development purposes.

Installation
---------------------

1. Close repository into a folder (e.g. my-new-website) `git clone https://github.com/3VLINC/wordpress-vagrant/ my-new-website` 
2. From the command line move to the my-new-website folder and run `./setup.sh`
3. Follow the prompts to set the hostname and IP Address, ensuring there are no conflicting IPs in your network
4. In your hosts file map the domain name to the IP Address
5. Your website should now be accessible in your browser at the hostname you specified
6. From the command line move to my-new-website folder and run `vagrant rsync-auto`
7. Start dev'ing
