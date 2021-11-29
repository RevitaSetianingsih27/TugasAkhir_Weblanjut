<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengeluaranBulanan extends Migration
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
            'tanggal'=>[
				'type'=> 'DATETIME',
                'null' => true,
			],
			'nama_barang'=>[
				'type'=> 'VARCHAR',
				'constraint'=> 100,
			],
			'jumlah' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'harga'=>[
				'type'=> 'VARCHAR',
				'constraint'=> 100,
			],
			'total'=>[
				'type'=>'VARCHAR',
				'constraint'=> 150,
			]
			
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pengeluaranbulanan');
    }

    public function down()
    {
        $this->forge->dropTable('pengeluaranbulanan');
    }
}
