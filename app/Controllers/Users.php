<?php

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->join();
        // $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('index', $data);
    }

    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/'));
    }  
    public function new()
    {
        return view('new');
    }
}
