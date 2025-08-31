<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'avatar_data', 'xp', 'last_login', 'avatar_hair', 'avatar_clothes', 'avatar_accessory', 'avatar_color'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Add custom user-related methods here

    public function getAllUsers()
    {
        return $this->findAll();
    }
}
