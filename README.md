# Building a Bank Account Api with Laravel
This is a demo application showing how to build a backend api for bank transactions using PHP and Laravel.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisties
 
What things you need to install the software.

- Git 
- PHP.
- Composer.
- Laravel CLI.
- A webserver like Nginx or Apache.
- A Node Package Manager ( npm or yarn ).

### Install
Clone the git repository on your computer
``` 
$ git clone https://github.com/faithdevs/Bank_Account_Api.git
```
You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies.

```
$ cd e-commerce-laravel-vue
$ composer install
```

## Setup
- When you are done with installation, copy the ```.env.example``` file to ```.env```
- Generate the application key
 ```
    $ php artisan key:generate
  ```
 - Add your database credentials to the necessary ```env``` fields
 - Migrate the application
 ```
 $ php artisan migrate
 ```
 

## Run the application

```
$ php artisan serve 
```


## Testing 
Some types of test has been done on the apis. 
- Unit testing
- Http testing
- Database Testing 

Run this command
```
$ php artisan test
```

## Postman Api Documentation
The postman doc with the api urls, paramaters passed and http reponse.
Check it out [Bank account api postman](https://documenter.getpostman.com/view/12575851/UVeMJj4M)

## Built With 
- [Laravel](https://laravel.com/) - The PHP framework for building the API endpoints needed for the application
