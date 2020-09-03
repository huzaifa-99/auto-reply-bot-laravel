# Basic-Auto-Reply-Bot-Laravel
Replies to the same type of user queries automatically with web sockets implemented by Pusher-Js.

# Tecnologies 
  * PHP-Laravel Framework
  * Pusher Js
  * Vue JS
  * Node modules
  * Bootstrap-4
  * MySQL

# Interface
The first page has `login/register` buttons in the nav-bar, after clicking on one the user is redirected accordingly. 

When successfully logged-in, the user can select from a list of available subject and send a message/query, the system will then look for the answer to the query and broadcast the answer to that user if the answer is found from database, if it is not found then the system simply replies 'We dont have have an answer yet'.

If the logged-in user is an admin he can route to `/admin` and add or remove questions/subject/users and more.

# Project Installation
 * Download the project and unzip. 
 * Next, the `code` folder must be placed into the `htdocs` folder.
 * Go into the code folder and open it up in cli, then run `composer install` for `/vendor` and `npm install` for `node_modules`.
 * Database (in `database` folder) must be imported into MySQL for the code to function properly, Database username and password are the default ones for Xampp.
 * To run the project, use command `php artisan serve` in the current directory with cmd and go to the server url, which will take you to the `home` page. The process after that is already explained above.

# Project Demo
A demo video is available on [https://youtu.be/0NBsDduHhtw]. Previews are also available on this repo in `Previews` Folder

# More Info
The project was created 10 months before today(1/9/2020) on Laravel-6.0 version, i had used Vue and Pusher Js in this project.

The main aim of this project was for me to understand socket implementation in a web application.
