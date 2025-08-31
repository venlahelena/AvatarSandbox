<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddXpToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'xp' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'after' => 'avatar_data',
            ],
            'last_login' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'xp',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['xp', 'last_login']);
    }
}
