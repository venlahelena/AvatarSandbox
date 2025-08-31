<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // If logged in, redirect to dashboard
        if (session('user_id')) {
            return redirect()->to('/dashboard');
        }
        return view('landing');
    }

    public function dashboard()
    {
        // If not logged in, redirect to landing/login
        if (!session('user_id')) {
            return redirect()->to('/');
        }
        return view('dashboard');
    }
}
