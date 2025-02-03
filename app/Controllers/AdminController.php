<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use App\Models\User;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index(){
        $data = [];
        helper('form');

        if($this->request->getMethod()==='POST'){
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required'
            ];
           
            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                // $data['validation'] = $this->validator->getErrors();
            }else{
                
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                $admin  = new Admin();
                $userdata = $admin->where('email',$email)->first();

                if($userdata){
                    // echo "hrllo";
                    // die;
                    if(password_verify($password,$userdata['password'])){

                        $session = session();
                        $user_data = [
                            'id' => $userdata['id'],
                            'first_name' => $userdata['first_name'],
                            'email' => $userdata['email'],
                            'admin' => true
                        ];
                        session()->set($user_data);
                        return redirect()->to(base_url('admin/dashboard'));
                    }else{
                        session()->setFlashdata('error','Invalid password');
                       
                    }
                }else{
                    session()->setFlashdata('error','Invalid Email');
                  
                }
            }
        }
          
        return view('admin/login',$data);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('admin'));
    }

    public function admin(){
        $admin = new Admin();
        $data['admins'] = $admin->findAll();
        return view('admin/admin',$data);
    }

    
    public function user(){
        $user = new User();
        $data['users'] = $user->findAll();
        return view('admin/user',$data);
    }


   

    
}
