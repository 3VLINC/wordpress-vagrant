# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	
	config.vm.hostname = "foresthillanimalclinic.dev"
	
	config.vm.box = "precise64"
	
	config.vm.box_url = "http://files.vagrantup.com/precise64.box"
	
	config.vm.network "private_network", ip: "10.10.208.27"

	config.hostmanager.enabled = true

	config.hostmanager.manage_host = true

	config.hostmanager.ignore_private_ip = false

	config.hostmanager.include_offline = true
	
	config.vm.provider :virtualbox do |vb|
	
		vb.name = "foresthillanimalclinic.dev"
	
		vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
	
		vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
	
	end
	
	config.vm.synced_folder ".", "/vagrant", id:"site-root", type:"rsync",rsync__exclude: [".git/","public/wp-content/uploads/*"], :owner => "vagrant", :group => "vagrant"

	config.vm.synced_folder "public/wp-content/uploads", "/vagrant/public/wp-content/uploads", id:"site-uploads", type:"rsync",rsync__exclude: ["*"], :owner => "www-data", :group => "www-data"
	
	config.vm.provision :shell, :path => "bootstrap.sh"
	
end
	
