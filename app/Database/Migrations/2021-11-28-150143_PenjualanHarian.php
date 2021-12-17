<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenjualanHarian extends Migration
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
			'nama_barang'=>[
				'type'=> 'VARCHAR',
				'constraint'=> 100,
			],
			'jumlah' => [
				'type' => 'INT',
				'constraint' => 30,
			],
			'harga'=>[
				'type'=> 'INT',
				'constraint'=> 30,
			],
			'total'=>[
				'type'=>'INT',
				'constraint'=> 11,
			]
			
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('penjualanharian');
    }

    public function down()
    {
        $this->forge->dropTable('penjualanharian');
    }
}
