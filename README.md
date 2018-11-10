# PHP-Micro-MVC-Framework
before you start
1. rename app/conf-dev.php or app/conf-prod.php to app/conf.php
2. fill the info (database credentials will be enough to go)
3. create the database and import the mysql.sql

please note that there are front-end error logger for ajax and javascript errors included in the project it saves the ajax errors to `app/ajax-errors.log` and javascript errors to `app/js-error.log`
you may need to take the users premissions 

or if wish to disable it at all from app/view/head.php:17

the code aslo using front-end versioning to make sure that the user has the most recent code

to change the version 
1. go to app/conf.php and change version `VERSION` variable (for exmple to 1.0.1)
2. rename `public/css-v1.0.0` and `public/js-v1.0.0` to `public/css-v1.0.1` and `public/js-v1.0.1`
this will make sure every script and stylesheet in your project is downloaded and not loaded fron the cache

for the versioning to work you need to import javascript file using 
`<script src="<?php echo JS; ?>name.js"></script>`

and css files using `<link href="<?php echo CSS; ?>name.css" rel="stylesheet">`
