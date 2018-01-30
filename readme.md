# The Beginning Project
This project is a standard project for every project. 
It includes all useful features which are easy to customize and change some configurations to support a new project.

## How to initialize this project
1. You have to install the following **prerequisite programs** below.
    - [PHP version 7.1 above](http://php.net/downloads.php)
    - [MariaDB](https://mariadb.org/download/) or MySQL version 5.7 above 
    - [Git](https://www.git-scm.com/download)
    - [Composer](https://getcomposer.org/download/)
    - [NodeJS](https://nodejs.org/en/download/) *-- No need for a production site.*
1. You have to open the following **PHP extensions** below.
    - php_fileinfo *-- For getting file information*
    - php_mbstring *-- For non-ASCII encoding*
    - php_openssl *-- For cryptography*
    - php_pdo_mysql *-- For MySQL connection*
    - php_gd2 *-- For image management*
    - php_xsl *-- For generating PHP document*
    - php_intl *-- For generating PHP document*
1. After you finish cloning this project then you have to **create .env file from .env-local.example or .env-production.example file 
   depending on your environment**. After that run the following commands below.
    - composer install *-- To install PHP components.*
    - npm install *-- To install JavaScript components. ( No need for a production site. )*
    - php artisan key:generate *-- To create an application key to support cryptography.*
    - php artisan storage:link *-- To create a symbolic link from "public/storage" to "storage/app/public".*
    - php artisan languages:link *-- To create a symbolic link from "public/languages" to "resources/lang".*
    - php artisan migrate *-- To migrate the database. Reference: [Running Migrations](https://laravel.com/docs/5.4/migrations#running-migrations)*

## How to generate PHP document by phpDocumentor
First of all, you must install phpDocumentor application outside this project because there are some dependency conflicts.
### How to install phpDocumentor
1. Run **composer require "phpdocumentor/phpdocumentor:2.\*"** command under your chosen installation path.
1. Add **.\vendor\bin** folder into your system environment variable *__Path__*.
    For example, if you install phpDocumentor under E:\phpDocumentor then add E:\phpDocumentor\vendor\bin into your system environment variable Path.

`Run the following command pattern below under this project folder.`
> **phpdoc -d app -t** *your_destination_path*
#### Reference: [phpDocumentor](https://phpdoc.org/docs/latest/index.html)

## How to generate JavaScript document by JSDoc
`Run the following command patterns below under this project folder.`

### For Windows
> **node_modules\\.bin\\jsdoc -r resources\\assets\\js -t node_modules\\ink-docstrap\\template -c jsdoc.conf.json -d** *your_destination_path*

You can append the above command with **-a all** to generate all access levels. The default access level is public.

### For Linux
> **./node_modules/.bin/jsdoc -r resources/assets/js -t node_modules/ink-docstrap/template -c jsdoc.conf.json -d** *your_destination_path*
#### Reference: [JSDoc](http://usejsdoc.org)
