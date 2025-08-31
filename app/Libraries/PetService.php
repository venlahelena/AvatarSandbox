<?php
namespace App\Libraries;
use App\Models\UserPetModel;
use App\Models\PetModel;

class PetService
{
    public static function getUserPetWithType($userId)
    {
        $userPetModel = model('UserPetModel');
        $petModel = model('PetModel');
        $userPet = $userPetModel->where('user_id', $userId)->first();
        // If user has no pet, assign default (first pet in pets table)
        if (!$userPet) {
            $defaultPet = $petModel->orderBy('unlock_level', 'ASC')->first();
            if ($defaultPet) {
                $userPetId = $userPetModel->insert([
                    'user_id' => $userId,
                    'pet_id' => $defaultPet['id'],
                    'name' => 'My Pet',
                    'health' => 100,
                    'happiness' => 100,
                    'energy' => 100,
                ]);
                $userPet = $userPetModel->find($userPetId);
            }
        }
        $pet = $userPet ? $petModel->find($userPet['pet_id']) : null;
        return [
            'userPet' => $userPet,
            'pet' => $pet
        ];
    }
}
