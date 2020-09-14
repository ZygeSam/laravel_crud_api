# laravel_crud_api
A simple CRUD api made with php-laravel
Download Visual Studio Code as text-editor
    Click on the link given below to download the XAMPP for Windows: https://www.apachefriends.org/download.html. 
    Download COMPOSER
    Click on the link given below to download the Composer: https://getcomposer.org/download/.
    To download the Composer for Windows, click on the link Composer-Setup.exe.
    Navigate to xampp/htdocs/ to move to the xampp folder on your terminal.
    Type composer create-project ?prefer-dist laravel/laravel laravel_crus_api 5.2.29 on your terminal
    On your terminal type the command given below:'
php artisan make:migration create_people_table - -create="people"
The migration table with the name "create_people_table" will be created successfully and saved in the database folder.
Download the source code from this repo https://github.com/ZygeSam/laravel_crud_api/tree/api
Copy and Paste the migration code (schema) from the database folder from the downloaded project into your present project
Type php artisan migrate to migrate the database
Create a Person model, a PersonController and a PersonResource.
Copy and paste the code where needed from the downloaded repo
