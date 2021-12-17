<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranBulananModel extends Model
{
    protected $table                = 'pengeluaranbulanan';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['tanggal', 'nama_barang', 'jumlah', 'harga', 'total','created_at','updated_at'];
	protected $useTimestamps        = true;

	public function getPengeluaranBulanan($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
