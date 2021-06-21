<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Libraries\Auth;
use App\Models\UserModel;

class AuthController extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}

	/**
	 * Load login form view.
	 */
	public function login()
	{
		return view('auth/login');
	}

	/**
	 * Load register form view.
	 */
	public function register()
	{
		return view('auth/register');
	}

	/**
	 * Make register new user.
	 */
	public function save()
	{
		// Validate request.
		$validation = $this->validate($this->rules());

		if (!$validation) {
			return view('auth/register', ['validation' => $this->validator]);
		} else {
			$formData = [
				'name' => $this->request->getPost('name'),
				'email' => $this->request->getPost('email'),
				'password' => Hash::make($this->request->getPost('password')),
			];

			$userModel = new UserModel();
			$query = $userModel->insert($formData);
			if (!$query) {
				return redirect()->back()->with('fail', 'Something wrong');
			} else {
				$lastId = $userModel->insertID();
				session()->set('loggedUserId', $lastId);
				return redirect()->route('dashboard');
			}
		}
	}

	/**
	 * Login user to application.
	 */
	public function check()
	{
		$validation = $this->validate([
			'email' => [
				'rules' => 'required|valid_email|is_not_unique[users.email]',
				'errors' => [
					'required' => 'Email is Required',
					'valid_email' => 'Enter valid email',
					'is_not_unique' => 'This email not registered'
				]
			],
			'password'   => [
				'rules' => 'required|min_length[8]|max_length[15]',
				'errors' => [
					'required' => 'Password is required',
					'min_length' => 'Invalid password',
					'max_length' => 'Invalid password'
				]
			]
		]);

		if (!$validation) {
			return view('auth/login', ['validation' => $this->validator]);
		} else {
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$userModel = new UserModel();
			$user = $userModel->where('email', $email)->first();
			if (!empty($user)) {
				$verify = Hash::check($password, $user['password']);
				if (!$verify) {
					session()->setFlashData('fail', 'Email or password invalid');
					return redirect()->to('/auth')->withInput();
				} else {
					session()->set('loggedUserId', $user['id']);
					return redirect()->to('/dashboard');
				}
			}
			session()->setFlashData('fail', 'Email or password invalid');
			return redirect()->route('login')->withInput();
		}
	}

	/**
	 * Logout user.
	 */
	public function logout()
	{
		return Auth::logout();
	}

	/**
	 * Register form validation rules.
	 *
	 * @return array
	 */
	private function rules()
	{
		return [
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Your full name is required'
				]
			],
			'email' => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => 'Your email address is required',
					'valid_email' => 'Enter valid email',
					'is_unique' => 'This email already exists'
				]
			],
			'password' => [
				'rules' => 'required|min_length[8]|max_length[15]',
				'errors' => [
					'required' => 'Password is required',
					'min_length' => 'Password length less than 5 characters',
					'max_length' => 'Password greater than 15 characters'
				]
			],
			'password_confirm' => [
				'rules' => 'required|min_length[8]|max_length[15]|matches[password]',
				'errors' => [
					'required' => 'Password confirm is required',
					'min_length' => 'Password confirm length less than 5 characters',
					'max_length' => 'Password confirm greater than 15 characters',
					'matches' => 'Password confirm not match password'
				]
			]
		];
	}
}