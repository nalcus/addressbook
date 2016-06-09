Address Book by Nicholas Alcus
------------------------------

How to deploy:

1) Create a LAMP server.
2) Install composer.
3) Create MySQL Database with database called 'addressbook'
4) Create MySQL user name 'addressbook'@'localhost' password:'LeGoS99@@' and grant all Data and Structure permissions.
5) Clone repository from: https://github.com/nalcus/addressbook.git
6) Navigate to application directory and set permissions 'sudo chmod -R 777 storage'
7) Migrate database using artisan. 'php artisan migrate'
8) Navigate to [webroot]/addressbook/public
