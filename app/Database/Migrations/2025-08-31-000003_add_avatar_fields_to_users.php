<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAvatarFieldsToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'avatar_hair' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'default' => 'none',
                'after' => 'avatar_data',
            ],
            'avatar_clothes' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'default' => 'none',
                'after' => 'avatar_hair',
            ],
            'avatar_accessory' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
                'default' => 'none',
                'after' => 'avatar_clothes',
            ],
            'avatar_color' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'default' => '#FFD580',
                'after' => 'avatar_accessory',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['avatar_hair', 'avatar_clothes', 'avatar_accessory', 'avatar_color']);
    }
}
