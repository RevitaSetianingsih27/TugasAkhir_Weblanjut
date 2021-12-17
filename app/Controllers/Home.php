<?php

namespace App\Controllers;
use App\Models\PenjualanBulananModel;
use App\Models\PenjualanHarianModel;
use App\Models\PengeluaranBulananModel;
use App\Models\PengeluaranHarianModel;
use App\Models\DatakaryawanModel;
use App\Models\DataPenggunaModel;
use App\Models\SuperUser;

class Home extends BaseController
{
    protected $userModel;
    protected $karyawanModel;
    protected $pBulananModel;
    protected $pHarianModel;
    protected $jBulananModel;
    protected $jHarianModel;
    protected $session;

    public function __construct()
    {
        // parent::__construct();
        $this->session = \Config\Services::session();
        session_start();
        $this->userModel = new DataPenggunaModel();//Create a instance of the model
        $this->karyawanModel = new DataKaryawanModel();//Create a instance of the model
        $this->pBulananModel = new PengeluaranBulananModel();//Create a instance of the model
        $this->pHarianModel = new PengeluaranHarianModel();//Create a instance of the model
        $this->jBulananModel = new PenjualanBulananModel();//Create a instance of the model
        $this->jHarianModel = new PenjualanHarianModel();//Create a instance of the model
        helper('form', 'url');
    }
    public function index()
    {
        return view('vUser');
    }

    public function contact()
    {
        return view('vContact');
    }

    public function login()
    {
        return view('vlogin');
    }

    public function dologin(){
        $superUser = new SuperUser();
        session_start();
        $username= $this->request->getPOST('username');
        $password= $this->request->getPOST('password');
        $data = $superUser->where('username',$username)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass =$password == $pass;
            if($verify_pass){
                $_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['username'],
                    'status'        => 'admin'
                ];
                $this->session->set($_data);
                return redirect()->to('/');
            }else{
                $this->session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $this->session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/login');
        }
    }

    public function admin(){
        session_start();
        $status=session()->get('status');
       if($status!="admin"){
           return redirect()->to('/login');
       }else{
           return view('index');
       }
    }

    public function penjualanBulanan()
    {
        // $jBulananModel = new PenjualanBulananModel();
        $data['data'] = $this->jBulananModel->getPenjualanBulanan();
        return view('vPenjualanBulanan',$data);
    }
    
    public function penjualanHarian()
    {
        $data['data'] = $this->jHarianModel->getPenjualanHarian();
        return view('vPenjualanHarian',$data);
    }

    public function pengeluaranBulanan()
    {
        $data['data'] = $this->pBulananModel->getPengeluaranBulanan();
        return view('vPengeluaranBulanan',$data);
    }
    
    public function pengeluaranHarian()
    {
        $data['data'] = $this->pHarianModel->getPengeluaranHarian();
        return view('vPengeluaranHarian',$data);
    }
    
    public function dataKaryawan()
    {
        $data['data'] = $this->karyawanModel->getDataKaryawan();
        return view('vDataKaryawan',$data);
    }
    
    public function dataPengguna()
    {
        $data['data'] = $this->userModel->getDataPengguna();
        return view('vDataPengguna',$data);
    }
    
    public function tDataJualHarian()
    {
        return view('vTambahDataPenjualanHarian');
    }

    public function save_JualH(){
        helper(['form','url']);
        $data=[
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vTambahDataPenjualanHarian', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            $this->jHarianModel->insert($data);
            $data['tanggal'] = date('Y-m-d');
            $this->jBulananModel->insert($data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/incomeHarian'));
        }
    }
    
    
    public function update_JualH($id){
        helper(['form','url']);
        $data=[
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vEditDataPenjualanHarian', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            $this->jHarianModel->update($id,$data);
            $data['tanggal'] = date('Y-m-d');
            $this->jBulananModel->update($id,$data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/incomeHarian'));
        }
    }
    

    public function save_KeluarH(){
        helper(['form','url']);
        $data=[
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vEditDataPengeluaranHarian', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            $this->pHarianModel->insert($data);
            $data['tanggal'] = date('Y-m-d');
            $this->pBulananModel->insert($data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/outcomeHarian'));
        }
    }

    public function update_KeluarH($id){
        helper(['form','url']);
        $data=[
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vTambahDataPengeluaranHarian', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            $this->pHarianModel->insert($data);
            $data['tanggal'] = date('Y-m-d');
            $this->pBulananModel->update($id,$data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/outcomeHarian'));
        }
    }

    public function tDataJualBulanan()
    {
        return view('vTambahDataPenjualanBulanan');
    }

    public function save_JualB(){
        helper(['form','url']);
        $data=[
            'tanggal' => $this->request->getPost('tanggal'),
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal Pembelian.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vTambahDataPenjualanBulanan', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            // var_dump(date('Y-m-d'));exit();
            if($data['tanggal'] == date('Y-m-d')){
                $this->jHarianModel->insert($data);
            }
            $this->jBulananModel->insert($data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/incomeBulanan'));
        }
    }
    

    public function update_JualB($id){
        helper(['form','url']);
        $data=[
            'tanggal' => $this->request->getPost('tanggal'),
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal Pembelian.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vTambahDataPenjualanBulanan', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            // var_dump(date('Y-m-d'));exit();
            if($data['tanggal'] == date('Y-m-d')){
                $this->jHarianModel->update($id,$data);
            }
            $this->jBulananModel->update($id,$data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/incomeBulanan'));
        }
    }
    

    public function save_KeluarB(){
        helper(['form','url']);
        $data=[
            'tanggal' => $this->request->getPost('tanggal'),
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal Pembelian.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vTambahDataPengeluaranBulanan', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            // var_dump(date('Y-m-d'));exit();
            if($data['tanggal'] == date('Y-m-d')){
                $this->pHarianModel->insert($data);
            }
            $this->pBulananModel->insert($data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/outcomeBulanan'));
        }
    }

    public function update_KeluarB($id){
        helper(['form','url']);
        $data=[
            'tanggal' => $this->request->getPost('tanggal'),
            'nama_barang' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];
        $validation = $this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal Pembelian.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Kue.'
                ]
            ],
            'jumlah'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jumlah Pembelian.'
                ]
            ],
            'harga'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Harga Kue.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vEditDataPengeluaranBulanan', [
                'validation' => $this->validator
            ]);
        }else{
            $data['total'] = $data['jumlah'] * $data['harga'];
            // var_dump(date('Y-m-d'));exit();
            if($data['tanggal'] == date('Y-m-d')){
                $this->pHarianModel->update($id,$data);
            }
            $this->pBulananModel->update($id,$data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/outcomeBulanan'));
        }
    }

    public function save_karyawan(){
        helper(['form','url']);
        $data=[
            'no_hp' => $this->request->getPost('no_hp'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];
        $validation = $this->validate([
            'no_hp' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nomor HP.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama.'
                ]
            ],
            'jabatan'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jabatan.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vTambahDataKaryawan', [
                'validation' => $this->validator
            ]);
        }else{
            $this->karyawanModel->insert($data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/dataKaryawan'));
        }
    }

    public function update_karyawan($id){
        helper(['form','url']);
        $data=[
            'no_hp' => $this->request->getPost('no_hp'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];
        $validation = $this->validate([
            'no_hp' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nomor HP.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama.'
                ]
            ],
            'jabatan'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Jabatan.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vEditDataKaryawan', [
                'validation' => $this->validator
            ]);
        }else{
            $this->karyawanModel->update($data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/dataKaryawan'));
        }
    }

    public function save_pengguna(){
        helper(['form','url']);
        $data=[
            'no_hp' => $this->request->getPost('tanggal'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('jumlah'),
        ];
        $validation = $this->validate([
            'no_hp' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nomor HP.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama.'
                ]
            ],
            'alamat'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan alamat.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vEditDataPengguna', [
                'validation' => $this->validator
            ]);
        }else{
            $this->karyawanModel->insert($data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/dataPengguna'));
        }
    }

    
    public function update_pengguna($id){
        helper(['form','url']);
        $data=[
            'no_hp' => $this->request->getPost('no_hp'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $validation = $this->validate([
            'no_hp' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Nomor HP.'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan Nama.'
                ]
            ],
            'alamat'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukan alamat.'
                ]
            ],
        ]);
        // var_dump($data);exit();
        if(!$validation) {
            //render view with error validation message
            return view('vEditDataPengguna', [
                'validation' => $this->validator
            ]);
        }else{
            $this->karyawanModel->update($id,$data);
            // die(mysqli_error());exit();
            return redirect()->to(base_url('/dataPengguna'));
        }
    }


    public function tDataKeluarHarian()
    {
        return view('vTambahDataPengeluaranHarian');
    }
    
    public function tDataKeluarBulanan()
    {
        return view('vTambahDataPengeluaranBulanan');
    }
    
    public function tDataKaryawan()
    {
        return view('vTambahDataKaryawan');
    }
    
    public function tDataPengguna()
    {
        return view('vTambahDataPengguna');
    }
    public function eDataJualHarian($id)
    {
        $data['data']=$this->jHarianModel->getPenjualanHarian($id);
        return view('vEditDataPenjualanHarian',$data);
    }
    
    public function eDataJualBulanan($id)
    {
        $data['data']=$this->jBulananModel->getPenjualanBulanan($id);
        return view('vEditDataPenjualanBulanan',$data);
    }
    
    public function eDataKeluarHarian($id)
    {
        $data['data']=$this->pHarianModel->getPengeluaranHarian($id);
        return view('vEditDataPengeluaranHarian',$data);
    }
    
    public function eDataKeluarBulanan($id)
    {
        $data['data']=$this->pBulananModel->getPengeluaranBulanan($id);
        return view('vEditDataPengeluaranBulanan',$data);
    }
    
    public function eDataKaryawan($id)
    {
        $data['data']=$this->karyawanModel->getDataKaryawan($id);
        return view('vEditDataKaryawan',$data);
    }
    
    public function eDataPengguna($id)
    {
        $data['data']=$this->userModel->getDataPengguna($id);
        return view('vEditDataPengguna',$data);
    }
    public function hapus_jualB($id){
        $this->jBulananModel->delete($id);
        return redirect()->to('/incomeBulanan');

    }
    public function hapus_jualH($id){
        $this->jHarianModel->delete($id);
        return redirect()->to('/incomeHarian');

    }
    public function hapus_keluarB($id){
        $this->jBulananModel->delete($id);
        return redirect()->to('/outcomeBulanan');

    }
    public function hapus_keluarH($id){
        $this->jHarianModel->delete($id);
        return redirect()->to('/outcomeBulanan');

    }
    public function hapus_karyawan($id){
        $this->karyawanModel->delete($id);
        return redirect()->to('/dataKaryawan');

    }
    public function hapus_pengguna($id){
        $this->userModel->delete($id);
        return redirect()->to('/dataPengguna');

    }
    
}
