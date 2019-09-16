# The Givers Network Project
This project is a standard project for every project. 
It includes all useful features which are easy to customize and change some configurations to support a new project.

**There are 2 web service request facades to plug with Hive web services.**

1. ClientGrant
1. PasswordGrant

## How to initialize this project
1. You have to install the following **prerequisite programs** below.
    - [PHP version 7.1 or above](http://php.net/downloads.php)
    - [Git](https://www.git-scm.com/download)
    - [Composer](https://getcomposer.org/download/)
    - [NodeJS](https://nodejs.org/en/download/) *-- __( No need for a production site. )__*
1. You have to open the following **PHP extensions** below.
    - php_fileinfo *-- For getting file information*
    - php_mbstring *-- For non-ASCII encoding*
    - php_openssl *-- For cryptography*
    - php_gd2 *-- For image management*
1. After you finish cloning this project then you have to **create .env file from .env-local.example or .env-production.example file 
   depending on your environment**. After that run the following commands below.
    - `composer install` *-- To install PHP components.*

        *( Use `composer install --no-dev` for production environment to exclude unnecessary libraries on a production site. )*
       
    - `npm install` *-- To install JavaScript components. __( No need for a production site. )__*
    - `php artisan key:generate` *-- To create an application key to support cryptography.*
    - `php artisan storage:link` *-- To create a symbolic link from "public/storage" to "storage/app/public".*
    - `php artisan languages:link` *-- To create a symbolic link from "public/languages" to "resources/lang".*        

## Troubleshooting
1. Here are the command steps that you should run when upgrade your stage or production sites.
    1. `php artisan down [--message=<your_message>] [--retry=<number_of_seconds>]`
        To take down your site with your message and tell the end users how many seconds that they can retry
        after you take down your site.

        For example:

        > php artisan down --message="Upgrade the system." --retry=120

    1. `git fetch origin`
    1. `git checkout <release_branch_name_from_your_remote_origin>` for your stage site
        or `git pull origin master` for your production site.
    1. `composer install --no-dev`
    1. `php artisan up` To bring your site up after everything works fine.

1. If you have some problems after run `composer install`, please try to remove **bootstrap/cache/packages.php**
   and **bootstrap/cache/services.php** files.

## How to generate JavaScript document by JSDoc
Run the following command patterns below under this project folder.

### For Windows
`node_modules\.bin\jsdoc -r resources\assets\js -t node_modules\ink-docstrap\template -c jsdoc.conf.json -d <your_destination_path>`
### For Linux
`./node_modules/.bin/jsdoc -r resources/assets/js -t node_modules/ink-docstrap/template -c jsdoc.conf.json -d <your_destination_path>`

You can append the above commands with **-a all** to generate all access levels. The default access level is public.

#### Reference: [JSDoc](http://usejsdoc.org)
