<?php
namespace App\Models;
use CodeIgniter\Model;

class PetModel extends Model
{
    protected $table = 'pets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'asset', 'unlock_level'];
    public $timestamps = false;
}
