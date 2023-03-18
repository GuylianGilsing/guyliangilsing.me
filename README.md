# guyliangilsing.me
This repository houses my portfolio website. The site itself is completely static and displays content that is stored inside `.json` files.

## Table of Contents

<!-- TOC -->

- [guyliangilsing.me](#guyliangilsingme)
    - [Table of Contents](#table-of-contents)
    - [Used technologies](#used-technologies)
    - [Running this project](#running-this-project)
    - [Local PHP development server](#local-php-development-server)
        - [Prerequisites](#prerequisites)
        - [Install dependencies](#install-dependencies)
        - [Serving through PHP](#serving-through-php)
    - [Docker](#docker)
        - [Prerequisites](#prerequisites-1)
        - [Build image](#build-image)
        - [Start container](#start-container)
        - [Stop container](#stop-container)
        - [Remove container](#remove-container)
    - [Static code analysis](#static-code-analysis)
        - [Running the tool](#running-the-tool)
        - [Receive a detailed report for your written source code](#receive-a-detailed-report-for-your-written-source-code)

<!-- /TOC -->

## Used technologies
I've used the following technologies within this project:

- [Composer](https://getcomposer.org/)
- [Slim 4](https://www.slimframework.com/)
- [Twig](https://twig.symfony.com/)
- [TailwindCSS](https://tailwindcss.com/)
- [Docker](https://www.docker.com/)

## Running this project
Running the project can be done through several means. Docker and a local PHP development server.

## Local PHP development server
### Prerequisites
The following software, with the specified version, should be installed and accessible through any terminal.

- [Composer (vers. 2.5.1)](https://getcomposer.org/)
- [PHP (vers. 8.1.0)](https://www.php.net/releases/8.1/en.php)

**IMPORTANT**: all commands that are listed below should be run from the root directory of the project. The root directory is the same directory that this README file is located in.

### Install dependencies
All of the composer dependencies need to be installed before the project can be served. The following command can be used:

```bash
$ composer install
```

### Serving through PHP
a PHP installation comes with a built-in development server. This server can be started as follows:

```
$ cd ./public
$ php -S 127.0.0.1:8080
```

The commands listed above will spin up a local PHP development server on port 8080. The website can be viewed through [this](http://127.0.0.1:8080) link.

## Docker
### Prerequisites
The following software, with the specified version, should be installed and accessible through any terminal.

- [Docker 20.10.17](https://www.docker.com/)

**IMPORTANT**: all commands that are listed below should be run from the root directory of the project. The root directory is the same directory that this README file is located in.

This project base comes with a preconfigured `Dockerfile` that is placed in the root directory. This file creates an image that uses apache as its webserver. The apache configuration file can be found in the `config` folder which is placed in the root directory.

### Build image
Before you can run the docker container, you first need to build the image:

```bash
$ docker build ./ -t YOUR_IMAGE_NAME_HERE
```

### Start container
Once you have an image, you can run it as follows:

```bash
$ docker run -it -p 127.0.0.1:8080:80 -td YOUR_IMAGE_NAME_HERE
```

**Note**: the command above starts this app on the following URL: [127.0.0.1:8080](http://127.0.0.1:8080)

### Stop container
Once the container is running, you can stop it with the following command:

```bash
$ docker stop <container_name>
```

**Note**: the container name can be found by running the following command:

```bash
$ docker ps
```

### Remove container
Once the container is stopped, remove it with the following command:

```bash
$ docker rm <container_name>
```

## Static code analysis
[PHP insights](https://phpinsights.com/) is used, and configured, to provide a static code analysis report of the application source code.

### Running the tool
```bash
$ ./vendor/bin/phpinsights.bat
```

### Receive a detailed report for your written source code
```bash
$ ./vendor/bin/phpinsights.bat analyse -v
```
