<?php

namespace App\Controllers;
use App\Libraries\PetService;

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
        $userId = session('user_id');
        $userModel = model('UserModel');
        $user = $userModel->find($userId);

        // Fetch user's pet and pet type via PetService
        $petData = PetService::getUserPetWithType($userId);
        $petModel = model('PetModel');
        $pets = $petModel->orderBy('unlock_level', 'ASC')->findAll();
        return view('dashboard', [
            'user' => $user,
            'userPet' => $petData['userPet'],
            'pet' => $petData['pet'],
            'pets' => $pets
        ]);
    }
}
