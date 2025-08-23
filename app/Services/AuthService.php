<?php
namespace App\Services;

use App\Models\UserModel;
use App\Libraries\Hash;

class AuthService
{
    protected $userModel;
    protected $hash;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->hash = new Hash();
    }

    public function registerUser($username, $email, $password)
    {
        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => $this->hash->encrypt($password)
        ];
        return $this->userModel->save($data);
    }

    public function authenticate($email, $password)
    {
        $user = $this->userModel->where('email', $email)->first();
        if ($user && $this->hash::check($password, $user['password'])) {
            return $user;
        }
        return null;
    }
}
