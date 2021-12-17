<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranHarianModel extends Model
{
    protected $table                = 'pengeluaranharian';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['nama_barang', 'jumlah', 'harga', 'total','created_at','updated_at'];
	protected $useTimestamps        = true;

	public function getPengeluaranHarian($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
