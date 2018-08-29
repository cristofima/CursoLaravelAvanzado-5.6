
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

##   Advanced Laravel Course

Laravel 5.6, master detail CRUD about movies with genders, includes the following topics:

 - Web Services´s Consumption
	 - SOAP
	 - REST
- Testing
	- HTTP Tests
	- Database Testing
- Database
	- Seeding
- Eloquent ORM
	- Other Creation Methods
	- Soft Deleting
	- Local Scopes
	- Querying Relations
	- Eager Loading
	- Inserting and Updating Related Models
- Frontend
	- Localization
	- Compiling Assets (Laravel Mix)
- Artisan Console
	- Generating Commands
	- Command I/O
- Queues
	- Creating / Dispatching Jobs
	- Running Queue Workers
	- Handling Failed Jobs
- Notifications
	- Create / Send Notifications
	- Mail Notifications
	- Push Notifications with One Signal
- File Storage
	- Storing / Retrieving Files
- Security
	- Authentication
	- Authorization
	- Hashing
- Reports
	- PDF
	- Excel
- Official Packages
	- API Authentication (Passport)
	- Laravel Socialite

## Installation

-   Clone repository
```
git clone https://gitlab.com/cristofima/curso-laravel-avanzado.git
```
-   Copy .env.example file to .env and edit .env to configure your database
```
cd curso-laravel-avanzado
cp .env.example .env
```
- Install libraries and dependencies
```
composer install
```
-   Generate application key, migrate and seed database
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```
- Serve application
```
php artisan serve
```