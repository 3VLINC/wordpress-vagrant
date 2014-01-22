# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	
	config.vm.hostname = "testing-dev"
	
	config.vm.box = "precise64"
	
	config.vm.box_url = "http://files.vagrantup.com/precise64.box"
	
	config.vm.network "private_network", ip: "192.168.208.20"
	
	config.vm.provider :virtualbox do |vb|
	
		vb.name = "testing-dev"
	
		vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
	
		vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
	
	end
	
	config.vm.synced_folder ".", "/vagrant", :owner => "vagrant", :group => "vagrant"
	
	config.vm.provision :shell, :path => "bootstrap.sh"
	
end
	
