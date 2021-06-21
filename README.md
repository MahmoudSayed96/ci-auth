# CodeIgniter 4 Auth System Application

## Simple authentication system

### Main Functions

> \App\Controllers\AuthController

- login: Return login form view.
- register: Return register form view.
- save: Save user in database.
- check: Make login user to access app.

> App\Libraries\Auth.

- user:Return logged in user data.
- id: Return id of logged in user.
- check: Check if user logged in or not.
- logout: Logout user from application.
- routes: Create routes for auth system.

> App\Libraries\Hash

- make: Make password plan text hashed.
- check: Check hashed password and verify it with password.

> \App\Helpers\Auth_helper

- isAuth: Check if user authenticated or not.
- auth: Return logged in user data/use it in view.

> \App\Helpers\Form_helper

- display_error: Display each error in view based on $validation and $fieldName.

> \App\Filters\AuthCheckFilter

Filter access routes by auth users.

```php
$routes->group('', ['filter' => 'authCheck'], function($routes){
    $routes->get('/profile', 'ProfileController::show', ['as' => 'profile']);
})
```

> \App\Filters\AlreadyLoggedInFilter

Prevent auth user access login/register routes.

```php
$routes->group('', ['filter' => 'alreadyLoggedIn'], function($routes){
    $routes->get('/login', 'AuthController::login', ['as' => 'login']);
    $routes->get('/register', 'AuthController::register', ['as' => 'register']);
})
```
