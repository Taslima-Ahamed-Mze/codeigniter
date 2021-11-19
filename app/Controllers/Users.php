<?php

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ServiceModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $serviceModel = new ServiceModel();
        $id = $this->request->getVar('service');
        
        if($id==null)
        {
            $data['users'] = $userModel->listUser();
        }
        else
        {
            $data['users'] = $userModel->listUserByService($id);
        }
        $data['services'] = $serviceModel->orderBy('id', 'ASC')->findAll();
        return view('index', $data);
    }
 
    public function new()
    {
        $serviceModel = new ServiceModel();
        $data['services'] = $serviceModel->orderBy('id', 'ASC')->findAll();
        return view('new',$data);
    }
    public function store($id=null)
    {
        helper(['form', 'url']);
        $validated = $this->validate([
            'fname' => 'required|max_length[50]',
            'lname' => 'required|max_length[50]',
            'date' => 'required',
            'address' => 'required',
            'zcode' => 'required|max_length[5]',
            'phone' => 'required|max_length[10]',
            'service' => 'required',


        ]);
        $userModel = new UserModel();
        

        if (!$validated) 
        {
            $data = $userModel->listUser();
            echo view('index', [
                'validation' => $this->validator,
                'users'=>$data,
            ]);
           

        } 
        else 
        {
            $data = array(
            'firstname' => $this->request->getVar('fname'),
            'lastname' => $this->request->getVar('lname'),
            'birthdate' => $this->request->getVar('date'),
            'address' => $this->request->getVar('address'),
            'zip_code' => $this->request->getVar('zcode'),
            'phone' => $this->request->getVar('phone'),
            'service_id' => $this->request->getVar('service'),

            ); 
            if($id==null)
            {

                if($userModel->save($data))
                {
                    session()->setFlashdata('message', "Utilisateur ajouté avec succés");
                    session()->setFlashdata('alert-class', 'alert-success');
                    return $this->response->redirect(site_url('/'));
                }
                else
                {
                    session()->setFlashdata('message', "Echec d'ajout");
                    session()->setFlashdata('alert-class', 'alert-danger');
    
                   return redirect()->route('/new')->withInput(); 
                }
            }else{
                $userModel->update($id,$data);
                return $this->response->redirect(site_url('/'));
            }
            
        }  
    }
    public function edit($id = null)
    {
        $userModel = new UserModel();
        $serviceModel = new ServiceModel();
        $data['users'] = $userModel->findOne($id);

        //$data['users'] = $userModel->where('id', $id)->first();
        $data['services'] = $serviceModel->orderBy('id', 'ASC')->findAll();
        return view('edit', $data);
    }
    


    public function delete($id = ""){
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/'));
    } 
}

