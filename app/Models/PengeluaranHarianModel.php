<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranHarianModel extends Model
{
    protected $table                = 'penngeluaranharian';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['nama_barang', 'jumlah', 'harga', 'total'];
	protected $useTimestamps        = true;

	public function getPengeluaranHarian($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
