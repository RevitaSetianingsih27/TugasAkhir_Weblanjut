<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanBulananModel extends Model
{
    protected $table                = 'penjualanbulanan';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['tanggal', 'nama_barang', 'jumlah', 'harga', 'total'];
	protected $useTimestamps        = true;

	public function getPenjualanBulanan($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
