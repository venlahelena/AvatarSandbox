<?php
namespace App\Models;
use CodeIgniter\Model;

class UserPetModel extends Model
{
    protected $table = 'user_pets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'pet_id', 'name', 'health', 'happiness', 'energy', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
