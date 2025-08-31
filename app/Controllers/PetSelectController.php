<?php
namespace App\Controllers;
use App\Models\PetModel;
use App\Models\UserPetModel;
use App\Controllers\BaseController;

class PetSelectController extends BaseController
{
    public function index()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $petModel = new PetModel();
        $pets = $petModel->orderBy('unlock_level', 'ASC')->findAll();
        return view('pet/select', ['pets' => $pets]);
    }

    public function choose()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }
        $petId = $this->request->getPost('pet_id');
        if (!$petId) {
            return redirect()->to('/pet/select')->with('error', 'No pet selected.');
        }
        $userPetModel = new UserPetModel();
        $pet = model('PetModel')->find($petId);
        if (!$pet) {
            return redirect()->to('/pet/select')->with('error', 'Invalid pet.');
        }
        $existing = $userPetModel->where('user_id', $userId)->first();
        if ($existing) {
            // Update existing pet
            $userPetModel->update($existing['id'], [
                'pet_id' => $petId,
                'name' => $pet['type'],
                'health' => 100,
                'happiness' => 100,
                'energy' => 100,
            ]);
        } else {
            // Insert new pet
            $userPetModel->insert([
                'user_id' => $userId,
                'pet_id' => $petId,
                'name' => $pet['type'],
                'health' => 100,
                'happiness' => 100,
                'energy' => 100,
            ]);
        }
        return redirect()->to('/dashboard')->with('success', 'Pet selected!');
    }
}
