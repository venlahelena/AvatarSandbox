<?php
namespace App\Controllers;
use App\Models\PetModel;
use App\Models\UserPetModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class PetController extends BaseController
{
    public function show()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $userPetModel = new UserPetModel();
        $petModel = new PetModel();
        $userPet = $userPetModel->where('user_id', $userId)->first();
        $pet = $userPet ? $petModel->find($userPet['pet_id']) : null;
        return view('pet/show', [
            'userPet' => $userPet,
            'pet' => $pet
        ]);
    }

    public function interact($action)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $userPetModel = new UserPetModel();
        $userPet = $userPetModel->where('user_id', $userId)->first();
        if (!$userPet) {
            return redirect()->to('/profile')->with('error', 'No pet found.');
        }
        // Simple stat changes
        switch ($action) {
            case 'feed':
                $userPet['health'] = min(100, $userPet['health'] + 10);
                $userPet['energy'] = min(100, $userPet['energy'] + 5);
                break;
            case 'play':
                $userPet['happiness'] = min(100, $userPet['happiness'] + 10);
                $userPet['energy'] = max(0, $userPet['energy'] - 5);
                break;
            case 'train':
                $userPet['energy'] = max(0, $userPet['energy'] - 10);
                $userPet['happiness'] = min(100, $userPet['happiness'] + 5);
                break;
        }
    $userPetModel->update($userPet['id'], $userPet);
    return redirect()->to('/dashboard')->with('success', 'Pet interaction successful!');
    }

    public function rename()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $newName = $this->request->getPost('pet_name');
        $userPetModel = new UserPetModel();
        $userPet = $userPetModel->where('user_id', $userId)->first();
        if ($userPet && $newName) {
            $userPetModel->update($userPet['id'], ['name' => $newName]);
        }
        return redirect()->to('/profile');
    }
}
