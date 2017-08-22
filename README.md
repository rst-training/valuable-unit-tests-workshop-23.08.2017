# Workshop participant

Krzysztof Menżyk

# Setup

```
composer install
```

## Run in Vagrant

If you don't have `php` or `composer` on your local machine, you can use Vagrant

```
user@host: vagrant box update
user@host: vagrant up
user@host: vagrant ssh
vagrant@vagrant-ubuntu-trusty-64: cd /vagrant
vagrant@vagrant-ubuntu-trusty-64:/vagrant$ composer install
```

## Run in Docker

If you don't have `php` or `composer` on your local machine, you can use [Docker](https://docs.docker.com/engine/installation/#server) and [Docker Compose](https://docs.docker.com/compose/install/)

```
user@host: docker-compose up -d
user@host: docker-compose exec php bash
root@62c554c1fd7c:/app# composer install
```

# PHPUnit

```
vendor/bin/phpunit
```
