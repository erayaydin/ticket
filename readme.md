# High Ticket System

High Ticket System is lightweight and developer friendly **PHP Laravel** ticket system. It also usable for production environment.

## Dependencies

- [laravel/framework 5.1.*](https://packagist.org/packages/laravel/framework)
- [laravelcollective/html 5.1.*](https://packagist.org/packages/laravelcollective/html)
- [bican/roles 2.1.*](https://packagist.org/packages/bican/roles)

## DevDependencies (for Developing)

- [fzaninotto/faker ~1.4](https://packagist.org/packages/fzaninotto/faker)
- [mockery/mockery 0.9.*](https://packagist.org/packages/mockery/mockery)
- [phpunit/phpunit ~4.0](https://packagist.org/packages/phpunit/phpunit)
- [phpspec/phpspec ~2.1](https://packagist.org/packages/phpspec/phpspec)
- [laracasts/generators ^1.1](https://packagist.org/packages/laracasts/generators)
- [laracasts/testdummy ~2.0](https://packagist.org/packages/laracasts/testdummy)

## Under Construction

- Base
  - [x] Register
  - [x] Login
  - [x] Password Reset
  - [x] Account Settings
  - [x] Logout
- Tickets
  - [x] Create Ticket
    - [x] Upload multiple file
  - [x] Ticket Details
    - [x] Files
    - [x] Comments
    - [x] New Comments
    - [ ] Change ticket status (permission:ticket.status.edit)
  - [ ] Edit Ticket (permission:ticket.edit)
  - [ ] Delete Ticket (permission:ticket.delete)
- Priorities
  - [x] Index Priority
  - [x] Create Priority
  - [x] Edit Priority
  - [x] Delete Priority
- Statuses
  - [x] Index Status
  - [x] Create Status
  - [x] Edit Status
  - [x] Delete Status
- Departments
  - [ ] Index Department
  - [ ] Create Department
  - [ ] Edit Department
  - [ ] Delete Department
- Users
  - [ ] Index User
  - [ ] Create User
  - [ ] Edit User
  - [ ] Delete User

## Developer Guide

Firstly, clone project to your computer.

```
git clone git@github.com:erayaydin/ticket.git
```

Move to project folder

```
cd ticket
```

Install php composer dependencies.

```
php artisan install
```

Edit `.env` file

```
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomString

DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

Migrate migration files

```
php artisan migrate
```

Seed role table

```
php artisan db:seed --class="RoleTableSeeder"
```

> There is no user factory and seed table yet. Create manually with temporary route.
> 
> **Dont commit that temporary route**

> There is no priority factory and seed table yet. Create manually with temporary route.
> 
> **Dont commit that temporary route**

> There is no status factory and seed table yet. Create manually with temporary route.
>
> **Dont commit that temporary route**

### Standards for contributing

**Use Language Files**

Dont just write plain text to view files. Use language support. `trans(...)`

**Carefully define route names**

Route names should **module**.**route**

**Carefully create view files**

View file names should **controller**/**method**.blade.php

**Uploading Files to storage path**

**Do Not** upload files to *public*, use *storage path*. **IF not directly show in view**

**Use Bower for assets**

**Do Not** use *dist* files for assets(css/js etc). Use bower for that and Elixir.

**Use Request File**

Create request files for validation.