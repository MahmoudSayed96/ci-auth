<?php

namespace App\Libraries;

use App\Models\UserModel;
use Config\Services;

/***
 * Handle authenticated users.
 */
class Auth
{

    /**
     * Get authenticated user data.
     *
     * @return array
     */
    public static function user()
    {
        if (!session()->has('loggedUserId')) {
            return null;
        }
        $userModel = new UserModel();
        $loggedUserId = session()->get('loggedUserId');
        $user = $userModel->where('id', $loggedUserId)->first();
        return $user;
    }

    /**
     * Get authenticated user id.
     *
     * @return array
     */
    public static function id()
    {
        if (!session()->has('loggedUserId')) {
            return null;
        }
        $userModel = new UserModel();
        $loggedUserId = session()->get('loggedUserId');
        $user = $userModel->where('id', $loggedUserId)
            ->select('id')
            ->first();
        return $user['id'];
    }

    /**
     * Check if user logged in.
     *
     * @return bool
     */
    public static function check()
    {
        if (session()->has('loggedUserId')) {
            return true;
        }
        return false;
    }

    /**
     * Logout authenticated user.
     */
    public static function logout()
    {
        if (session()->has('loggedUserId')) {
            session()->remove('loggedUserId');
            return redirect()->route('login');
        }
    }

    /**
     * Auth routes.
     */
    public static function routes()
    {
        // Create a new instance of our RouteCollection class.
        $routes = Services::routes();
        $routes->group('', ['filter' => 'alreadyLoggedIn'], function ($routes) {
            $routes->get('/login', 'AuthController::login', ['as' => 'login']);
            $routes->get('/register', 'AuthController::register', ['as' => 'register']);
            $routes->post('/auth/save', 'AuthController::save');
            $routes->post('/auth/check', 'AuthController::check');
        });
        $routes->group('', ['filter' => 'authCheck'], function ($routes) {
            $routes->get('/logout', 'AuthController::logout', ['as' => 'logout']);
        });
    }
}