# PHP-Micro-MVC-Framework
before you start
1. go to app folder
2. rename conf-dev.php or conf-prod.php to conf.php
3. fill the info (database credentials will be enough to go)
4. create the database and import the mysql.sql

please note that there are front-end error logger for ajax and javascript errors included in the project it saves the ajax errors to `app/ajax-errors.log` and javascript errors to `app/js-error.log`
you may need to take the users premissions 

or if wish to disable it at all from app/view/head.php:17
