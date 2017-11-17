$script = <<SCRIPT
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
apt-get install nodejs gettext -y;
cd /vagrant;
npm install
./node_modules/.bin/gulp build

SCRIPT

Vagrant.configure("2") do |config|
  config.vm.box = "bento/ubuntu-16.04"
  config.vm.provision "shell", inline: $script
end
