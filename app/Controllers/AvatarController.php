<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Libraries\AvatarHelper;

class AvatarController extends BaseController
{
    public function edit()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $userModel = new UserModel();
        $user = $userModel->find($userId);
        return view('avatar/edit', [
            'user' => $user,
            'allowedHair' => AvatarHelper::allowedHair(),
            'allowedClothes' => AvatarHelper::allowedClothes(),
            'allowedAccessory' => AvatarHelper::allowedAccessory(),
        ]);
    }

    public function update()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $data = [
            'avatar_hair' => $this->request->getPost('avatar_hair'),
            'avatar_clothes' => $this->request->getPost('avatar_clothes'),
            'avatar_accessory' => $this->request->getPost('avatar_accessory'),
            'avatar_color' => $this->request->getPost('avatar_color'),
        ];
        $errors = AvatarHelper::validateAvatar($data);
        if (!empty($errors)) {
            $userModel = new UserModel();
            $user = $userModel->find($userId);
            return view('avatar/edit', [
                'user' => $user,
                'errors' => $errors,
                'allowedHair' => AvatarHelper::allowedHair(),
                'allowedClothes' => AvatarHelper::allowedClothes(),
                'allowedAccessory' => AvatarHelper::allowedAccessory(),
            ]);
        }
        $userModel = new UserModel();
        $userModel->update($userId, $data);
        return redirect()->to('/dashboard');
    }
}
