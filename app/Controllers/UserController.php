<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function testDb()
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->getAllUsers();
        return view('dashboard', ['users' => $users]);
    }
}