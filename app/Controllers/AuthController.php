<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;


class AuthController extends BaseController
{
    public function register()
    {
        helper(['form']);
        return view('auth/register');
    }

    public function registerPost()
    {
        helper(['form']);
        $error = null;

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            $error = 'Validation failed!';
        } else {
            $authService = new \App\Services\AuthService();
            $success = $authService->registerUser($username, $email, $password);
            if ($success) {
                return redirect()->to('/login');
            } else {
                $error = 'Failed to register user.';
            }
        }

        return view('auth/register', [
            'error'      => $error,
            'validation' => $this->validator ?? null
        ]);
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $error = null;
        $success = null;

        $authService = new \App\Services\AuthService();
        $user = $authService->authenticate($email, $password);

        if ($user) {
            return redirect()->to('/dashboard');
        } else {
            $error = 'Invalid email or password.';
        }

        return view('auth/login', [
            'error' => $error,
            'success' => $success
        ]);
    }
}
