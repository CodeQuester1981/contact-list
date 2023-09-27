In order to run the app, please follow the steps below:
(please note this was run on a windows machine with Laragon and DBeaver, using MailTrap to test emailing)

Please remember to run composer install and npm install

Create a Database (I simply called mine 'people') -> remember to point your .env to it.
Run php artisan migrate (this will create all the necessary tables for you)
Run php artisan serve (this should direct you to the registration page when opening your localhost)
Please register a user using the frontend.
Now run php artisan db:seed (this will populate your database with some data,
    and should create one or two contacts for you to test the CRUD functionality)
In order to kick off the emailer, you must create a contact manually.

I hope the above will be in order and I sincerely hope to be able to meet with you   :-)