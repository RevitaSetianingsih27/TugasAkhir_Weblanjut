<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanBulananModel extends Model
{
    protected $table                = 'penjualanbulanan';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['tanggal', 'nama_barang', 'jumlah', 'harga', 'total','created_at','updated_at'];
	protected $useTimestamps        = true;

	public function getPenjualanBulanan($id = false){
		if($id == false) {
			$date=date('Y-m');
			return $this->like('tanggal',$date)->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
