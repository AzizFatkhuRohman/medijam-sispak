<?php

namespace App\Controllers;
use App\Models\DataJamuModel;
use App\Controllers\BaseController;

class dataJamu extends BaseController
{
    protected $session;
    
    public function __construct(){
        $this->session = service('session');
        
    }
    public function dataJamuAdmin()
    {
        $title = 'Data Jamu';
        $dataJamu = new DataJamuModel;
        $data = $dataJamu->orderBy('id', 'desc')->findAll();
        return view ('dataJamu/dataJamuAdmin', compact('title', 'data'));
    }
    public function dataJamuAdminPost(){
        $rules = config('Validation')->registrationRules ?? [
            'namaJamu'    => [
                'rules'  => 'required|is_unique[data_jamu.namaJamu]',
                'errors' => [
                    'required' => 'Nama jamu tidak boleh kosong',
                    'is_unique' => 'Nama jamu sudah ada'
                ],
            ],
            'manfaat'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Manfaat tidak boleh kosong'
                ],
            ],
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $imagePost = $this->request->getFile('gambar');
        $imagePost->move(ROOTPATH . 'public/images');
        $dataJamu = new DataJamuModel;
        $data = [
            'namaJamu' => $this->request->getPost('namaJamu'),
            'gambar' => $imagePost->getName(),
            'manfaat' => $this->request->getPost('manfaat')
        ];
        $dataJamu->insert($data);
        return redirect()->back()->with('message', 'success');
    }
}
