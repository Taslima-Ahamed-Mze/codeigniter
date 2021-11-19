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
            'firstname' => 'required|max_length[50]',
            'lastname' => 'required|max_length[50]',
            'birthdate' => 'required',
            'address' => 'required',
            'zip_code' => 'required|max_length[5]',
            'phone' => 'required|max_length[10]',
            'service' => 'required',


        ]);
        $userModel = new UserModel();
        $serviceModel = new ServiceModel();
        

        if (!$validated) 
        {
            if($id==null)
            {
                $data = $userModel->listUser();
                echo view('new', [
                    'validation' => $this->validator,
                    'users'=>$data,
                    'services'=>$serviceModel->orderBy('id', 'ASC')->findAll(),
                ]);
            }else{
                
                echo view('edit', [
                    'validation' => $this->validator,
                    'users'=>$userModel->findOne($id),
                    'services'=>$serviceModel->orderBy('id', 'ASC')->findAll(),
                ]);
            }
           

        } 
        else 
        {
            $data = array(
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'birthdate' => $this->request->getVar('birthdate'),
            'address' => $this->request->getVar('address'),
            'zip_code' => $this->request->getVar('zip_code'),
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
                if($userModel->update($id,$data))
                {
                    session()->setFlashdata('message', "Utilisateur modifié avec succés");
                    session()->setFlashdata('alert-class', 'alert-success');
                    return $this->response->redirect(site_url('/'));
                }
                else{
                    session()->setFlashdata('message', "Echec d'ajout");
                    session()->setFlashdata('alert-class', 'alert-danger');
    
                   return redirect()->route('/edit')->withInput();
                }

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
    


    public function delete($id =null){
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/'));
    } 
}

