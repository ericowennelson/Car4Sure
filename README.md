# Car4Sure

Setup project by following these step : 
- clone repository from https://github.com/ericowennelson/Car4Sure or download and extract zip file
- cd to project folder
- run composer install
- edit .env file to set mysql credentials
- run bin/console doctrine:database:create
- run bin/console doctrine:migration:migrate
- run symfony serve
- go to the specified url displayed in terminal
