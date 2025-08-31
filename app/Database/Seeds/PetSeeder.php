<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class PetSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Dogs
            [
                'type' => 'French Bulldog',
                'asset' => '',
                'unlock_level' => 1,
            ],
            [
                'type' => 'Labrador Retriever',
                'asset' => '',
                'unlock_level' => 1,
            ],
            [
                'type' => 'Siberian Husky',
                'asset' => '',
                'unlock_level' => 2,
            ],
            // Cats
            [
                'type' => 'Ragdoll',
                'asset' => '',
                'unlock_level' => 1,
            ],
            [
                'type' => 'Maine Coon',
                'asset' => '',
                'unlock_level' => 2,
            ],
            [
                'type' => 'Sphynx',
                'asset' => '',
                'unlock_level' => 3,
            ],
        ];
        $this->db->table('pets')->insertBatch($data);
    }
}
