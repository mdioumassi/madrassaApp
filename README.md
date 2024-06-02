***Traduction
php artisan lang:publish

***Model- migration
sail artisan make:model Article --migration  
sail artisan make:migration create_articles_table 
sail artisan migrate  

*************Commande rollback
php artisan migrate:rollback  
 
*** Performances
composer require barryvdh/laravel-debugbar --dev 

***SAIL Back Laraval
sail composer require barryvdh/laravel-debugbar --dev 
sail composer require laravel/breeze --dev 
sail artisan breeze:install 
sail artisan make:factory ArticleFactory 
sail tinker (executer une commande)
exemple: User::factory()->count(50)->hasArticles(6)→create();  

*** Sail Front
sail artisan migrate 
sail npm install 
sail npm run build 

***Midleware
sail artisan make:middleware MustBeAdmin  

*** Validation
sail artisan make:request StoreArticleRequest  
sail artisan make:request StoreArticleRequest 

*** Noyification
 sail artisan make:notification

 ***Ecouteur
 sail artisan make:listener.