<?php  

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkunModel;
use App\Models\PenghuniModel;

class Akun extends BaseController
{
    protected $akunModel;
    protected $penghuniModel;

    public function __construct()
    {
        $this->akunModel= new AkunModel();
        $this->penghuniModel= new PenghuniModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
    $dataUser = $keyword ? $this->akunModel->search($keyword) : $this->akunModel->getUsersByRole('user');

    $data = [
        'judul' => 'Akun Penghuni | SIMKOST',
        'subjudul' => 'Akun User (Penghuni)',
        'user' => $dataUser, // Data pengguna dengan role 'user'
        'validation' => \Config\Services::validation(),
    ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/tambah_akun');
        echo view('layout/footer');
    }

    public function save()
    {   
        if (!$this->validate([
            'username'=> 'required|is_unique[user.username]',
        ])) {
            return redirect()->to('/akun_user')->withInput()->with('gagal','Username sudah terdaftar!');
        }

        $data = $this->request->getVar();

        $request = $this->akunModel->save([
        'id_user'=>'',
        'id_penghuni'=>$data['id_penghuni'],
        'username'=>$data['username'],
        'password'=>$data['password'],
        'role'=>'user'
        ]);

        if ($request){
            return redirect()->to('akun_user');
            }else{
                dd($this->akunModel->errors());
        }
    }

    public function delete($id_user)
    {
        $request = $this->akunModel->delete($id_user);
        if($request){
            return redirect()->to('akun_user');
        }
    }

    public function update()
    {
        $id_user = $this->request->getGet('id_user');
        $akunModel = new AkunModel();
        
        $validationRules = [
            'username' => [
                'rules'=>"required|is_unique[user.username,$id_user]"]
            ];

            if (!$this->validate($validationRules)){
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }


        $dataToUpdate = [
            'id_penghuni'=> $this->request->getGet('id_penghuni'),
            'username' => $this->request->getGet('username'),
            'password' => $this->request->getGet('password')
        ];

        if ($akunModel->update($id_user, $dataToUpdate)) {
            return redirect()->to('akun_user');
            } else {
                return redirect()->back()->with('errors',$akunModel->errors());
        }
    }

    
}

?>