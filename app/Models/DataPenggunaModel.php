<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPenggunaModel extends Model
{
    protected $table                = 'datapengguna';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['nama', 'nomor_hp', 'alamat','created_at','updated_at'];
	protected $useTimestamps        = true;

	public function getDataPengguna($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}
