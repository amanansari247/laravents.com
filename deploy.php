<?php

namespace Deployer;

require 'recipe/laravel-deployer.php';

/*
|--------------------------------------------------------------------------
| Define your options
|--------------------------------------------------------------------------
|
| Here, you can edit the name of your application, change your repository URL, 
| customize which files and folders should be shared between releases, 
| customize which directories should be writable and much more.
|
*/

set('application', 'laravents.com');
set('repository', 'git@github.com:laravents/laravents.com.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

/*
|--------------------------------------------------------------------------
| Configure your hosts
|--------------------------------------------------------------------------
|
| This is what Deployer will use to connect to your servers. You can set up
| multiple hosts including localhosts to enable deployment directly from 
| the server (useful if you are using Laravel Forge for example).
|
*/

set('default_stage', 'prod');

host('tickets.laravents.com')
    ->stage('prod')
    ->set('deploy_path', '/home/forge/laravents.com')
    ->user('forge');

localhost()
    ->stage('local')
    ->set('deploy_path', '/home/forge/laravents.com')
    ->user('forge');

/*
|--------------------------------------------------------------------------
| Write your own tasks
|--------------------------------------------------------------------------
|
| A handful of helpful tasks are already available for you to use - check out
| `php artisan deploy:list`. Here you can define your own ones to automate
| any kind of custom deployment logic. Read more on the documentation.
|
*/

desc('Example task');
task('laravents.com:helloworld', 'echo "hello world!"');

/*
|--------------------------------------------------------------------------
| Add more to your deployments with hooks
|--------------------------------------------------------------------------
|
| Hooks enable you to attach new tasks before or after the execution of other 
| tasks. Run `php artisan deploy:dump deploy` to checkout where to hook on
| the deployment flow. To redefine the deployment process entirely, you
| may directly override the `deploy` task - check out documentation.
| 
| The following shallow hooks are made available to faciliate this process:
| - hook:build    Code and composer vendors are ready but nothing is built
| - hook:ready    Deployment is done but not live yet (before symlink)
| - hook:done     Deployment is done and live
|
*/

// Npm 
//after('hook:build', 'npm:install');
//after('hook:build', 'npm:production');

// Migrations
after('hook:ready', 'artisan:migrate');

// Horizon
after('hook:ready', 'artisan:horizon:terminate');

// Reload php-fpm 
set('php_fpm_service', 'php7.2-fpm');
after('hook:done', 'fpm:reload');