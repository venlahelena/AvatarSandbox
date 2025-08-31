<?php
namespace App\Models;
use CodeIgniter\Model;

class AchievementModel extends Model
{
    protected $table = 'achievements';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'description', 'date_earned'];
    protected $useTimestamps = false;
}
