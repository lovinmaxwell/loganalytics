# Sparkplug PHP Framework

> Laravel + AngularJS + Re-usable composer packages =  Sparkplug

## Installation
Before anything, fork this repository and git clone on your local, once changes are added, later you can send in a pull request

### Pre-requisite
* Ubunutu machine preferably, or a VM which has Ubuntu (If this is the case, skip the Setup block and follow below steps)
  * cd /var/www
  * git clone <HTTPS URL>
  * cd /var/www/<PROJECT DIR>
  * sudo composer install
  * php artisan serve
  * If you would like to stick to [http://localhost:8000](http://localhost:8000) skip the App configuration block
* If you still would want to opt to be more lite, you could do the following
  * Install [Vagrant] (https://www.vagrantup.com/)
  * Install [Virtualbox] (https://www.virtualbox.org/)
  * Install a console emulator like [Cmder] (http://cmder.net/) or [Git Bash] (https://git-scm.com/)
* Fork this repository, to do the changes and send in a pull request

Restart your machine once

### Setup
* Open cmder
* Open Virtualbox
* vagrant box add https://atlas.hashicorp.com/provolution/boxes/lemp-box
* vagrant init provolution/lemp-box
* You should have a Vagrantfile in the place where the command was executed
  * Open up Vagrantfile, find line, config.vm.synced_folder and change it to
  * Open folder and create a new folder www
  * config.vm.synced_folder "<YOUR DIR>/www/", "/var/www/"
* vagrant up --provider virtualbox - Wait for the dev box to boot itself
* vagrant ssh - To get into the terminal
* bash -l - As this box opens up in zsh terminal be default
* cd /var/www/
* git clone <HTTPS URL>
* cd /var/www/<PROJECT DIR>
* sudo composer install
* php artisan serve - If you want to run on port 8000 you may skip App configuration block
* exit
* Once you are in the Windows or your Mac OS box's browser you can access the project at [http://localhost:8000](http://localhost:8000)

### App configuration
Below we are setting a virtual host and access our application on the default port 80
* Create a virtual domain on your nginx server, [How To Set Up Nginx Server Blocks] (https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-virtual-hosts-on-ubuntu-14-04-lts)
* Login to mysql with your default mysql username and password, for this box it is root, root
* Create a new database with name sparkplug and exit mysql
* Change the DB username and password in the .env file present in your project
* cd /var/www/<PROJECT DIR> && php artisan migrate - This will create all the tables required
* Login again to mysql and import all the DB tables
* Open up the URL in your browser

### References
* [How To Set Up Nginx Server Blocks] (https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-virtual-hosts-on-ubuntu-14-04-lts)
* [(LEMP) Development VM With Vagrant] (https://vesselinv.com/lemp-with-vagrant/)
* [Setting up a name for your vagrant box] (http://stackoverflow.com/questions/17845637/vagrant-default-name)
* [How to clear cached memory on ubuntu] (http://www.ubuntugeek.com/how-to-clear-cached-memory-on-ubuntu.html)
* [Using Grunt + Bower with Laravel and Bootstrap] (http://blog.elenakolevska.com/using-grunt-with-laravel-and-bootstrap/)
* [Convert Laravel 5's Frontend Scaffold to Bower] (https://mattstauffer.co/blog/convert-laravel-5-frontend-scaffold-to-bower)
* [Status Pages] (https://better-error-pages.statuspage.io/)
* [Error pages and messages - Meaning of each reponse code from server] (https://http.cat/)
* [Terminal color changes for linux terms and vagrant boxes] (http://askubuntu.com/questions/39731/terminal-colors-not-working)
* [Using localized 500 error pages with nginx] (http://devblog.springest.com/using-localized-500-error-pages-with-nginx/)
* ["composer update" vs "composer install"] (https://adamcod.es/2013/03/07/composer-install-vs-composer-update.html)


### Credits

#### People
* [Taylor Otwell] (https://github.com/taylorotwell)
* [Jeffrey Way] (https://github.com/JeffreyWay)
* [Abdullah Almsaeed] (https://github.com/almasaeed2010/)

### License

This framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)