<?php

use App\Libraries\Auth;
use App\Models\UserModel;

/**
 * Check logged in user.
 *
 * @return bool
 */
if (!function_exists('isAuth')) {
    function isAuth()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }
}

/**
 * Get logged in user data.
 *
 * @return mixed
 */
if (!function_exists('auth')) {
    function auth()
    {
        if (Auth::check()) {
            $userModel = new UserModel();
            return $userModel->where('id', Auth::id())->first();
        }
        return null;
    }
}