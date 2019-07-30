<p align="center"><img src="https://user-images.githubusercontent.com/1494325/62109653-64b63c00-b2b5-11e9-87a3-3419cd156130.png"></p>
<p align="center"><sup>Docker ∿ WordPress ∿ Modern Application ∿ Modern Front ∿ CI</sup></p>
<p align="center">
<a href="https://travis-ci.org/rezonans/rezonans"><img src="https://travis-ci.org/rezonans/rezonans.svg?branch=master"></a>
<img src="https://img.shields.io/packagist/dt/rezonans/rezonans">
<img src="https://img.shields.io/github/license/rezonans/rezonans">
</p>

### Usage

* Start with `composer create-project --prefer-dist rezonans/rezonans ./new-site`, 
it will download wordpress to `./new-site/wordpress`, 
and other required packages to `./new-site/vendor`


* The next step is run docker containers, to start application locally. 
You should have installed docker-ce and docker-compose as well. 
`cd ./new-site/docker-config` , prepare environment data: `cp ./.env.example ./.env` 
and start docker with `docker-compose up --build -d` 
You can check all container running well using `docker-compose ps`, 
and stop all with `docker-compose stop` 
or `docker-compose down` to remove all containers as well 


* Open website on `localhost` in your browser and make install wordpress using values from 
`new-site/docker-config/.env` for database configuration, as host put `mysql`


* Go wp admin Appearance -> Themes and turn on the rezonans theme (it should be in the list)
* Go Settings -> Permalinks and turn off plain mode
* Go Plugins and activate Advanced Custom Fields plugin


* Research src/app/App.php to understanding routes

### Development

The project still under construction, as [the task board I'm using Trello](https://trello.com/b/bEfVUNZF/rezonans)
