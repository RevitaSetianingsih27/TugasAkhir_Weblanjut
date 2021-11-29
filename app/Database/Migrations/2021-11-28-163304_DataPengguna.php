<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'=>[
				'type'=> 'INT',
				'constraint'=> 10,
				'unsigned'=> true,
				'auto_increment'=> true
			],
			'nama'=>[
				'type'=> 'VARCHAR',
				'constraint'=> 100,
			],
			'nomor_hp' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'alamat'=>[
				'type'=> 'VARCHAR',
				'constraint'=> 200,
			]
			
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('datapengguna');
    }

    public function down()
    {
        $this->forge->dropTable('datapengguna');
    }
}
