<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AchievementModel;
use App\Controllers\BaseController;
use App\Libraries\PetService;

class ProfileController extends BaseController
{
    public function index()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $userModel = new UserModel();
        $achievementModel = new AchievementModel();
        $user = $userModel->find($userId);
        $achievements = $achievementModel->where('user_id', $userId)->findAll();
        $petData = PetService::getUserPetWithType($userId);
        return view('user/profile', [
            'user' => $user,
            'achievements' => $achievements,
            'userPet' => $petData['userPet'],
            'pet' => $petData['pet']
        ]);
    }
}
