<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKaryawanModel extends Model
{
    protected $table                = 'datakaryawan';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['nama', 'nomor_hp', 'jabatan'];
	protected $useTimestamps        = true;

	public function getDataKaryawan($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
