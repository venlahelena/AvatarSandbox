<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreatePetsAndUserPets extends Migration
{
    public function up()
    {
        // Pet types table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'asset' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'unlock_level' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pets');

        // User pets table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'pet_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'default' => 'My Pet',
            ],
            'health' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 100,
            ],
            'happiness' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 100,
            ],
            'energy' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 100,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pet_id', 'pets', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_pets');
    }

    public function down()
    {
        $this->forge->dropTable('user_pets');
        $this->forge->dropTable('pets');
    }
}
