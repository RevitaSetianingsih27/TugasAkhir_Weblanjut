<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanHarianModel extends Model
{
    protected $table                = 'penjualanharian';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['nama_barang', 'jumlah', 'harga', 'total','created_at','updated_at'];
	protected $useTimestamps        = true;

	public function getPenjualanHarian($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
