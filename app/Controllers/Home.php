<?php
namespace App\Controllers;
use App\Models\Admin;
use CodeIgniter\Files\File;
use App\Models\CartModel;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
 {
    
    public function index(){
        
        $category = new Category();
        $data['categories'] = $category->findAll();
        $product = new Product();
        $data['products'] = $product->findAll();
        return view('index',$data);
    }

    public function cart(){
        $CartModel = new CartModel();
        if ($this->request->getMethod() == 'POST'){
            
            $productId =$this->request->getVar('productId');
            $userId = $this->request->getVar('userId');
            $data= array(
                'fk_product_id' => $this->request->getVar('productId'),
                'qty'=>1,
                'cost' => $this->request->getVar('Cost'),
                'fk_user_id'=> $this->request->getVar('userId')
            );
            // print_r($data);exit;
            $productdetails = $CartModel->Where('fk_product_id',$productId)->where('fk_user_id',$userId)->findAll();
            
            if(count($productdetails) == 1)
            {
               $oldQty = $productdetails[0]['qty'];
               $id = $productdetails[0]['id'];
    
               $updateddata= array(   
                'qty'=> $oldQty + 1,
               );
                // return '555';
                if($CartModel->update($id,$updateddata))
                {
                     $returnarr=array('status'=>'success','Qty'=>$oldQty+1);
                } else{
                    echo 2;
                }
            }else{
                 if($CartModel->save($data))
                {
                   $returnarr = array('status' => 'success','Qty' => 1);
                   // echo json_encode($returnarr);
                }else{
                    echo 2;
                }
            }
             echo json_encode($returnarr);
    
           
        }
       }

       public function decrement(){

        $CartModel = new CartModel();
        if ($this->request->getMethod() == 'POST'){
            $returnarr= array();
            $productId =$this->request->getVar('productId');
            $userId = $this->request->getVar('userId');

            $productdetails = $CartModel->Where('fk_product_id',$productId)->where('fk_user_id',$userId)->findAll();
            $oldQty = $productdetails[0]['qty'];
            $id = $productdetails[0]['id'];
            if ($oldQty==1) {

              if($CartModel->where('id', $id)->delete()) 
              {
                $returnarr=array('status' => 'deleted');
              }

             } else {
                $updateddata= array(   
                'qty'=> $oldQty - 1,
                );
                if($CartModel->update($id,$updateddata))
                {
                     $returnarr=array('status'=>'success','Qty'=>$oldQty - 1);
                } else{
                     echo 2;
                }

            }
             echo json_encode($returnarr);
        }
    }


    public function checkout() 
    {
        $data = [];
        
        $category = new Category();
        $data['categories'] = $category->findAll();
        return view('checkout',$data);
    }

    public function productdetails($id)
    {
        helper('form');
        $category = new Category();
        $data['categories'] = $category->findAll();
        $admin = new Product();
        $data['productdetails']= $admin->where('id',$id)->first();
        return view('details',$data);
    }

    public function orderlist($id)
    {  $data = [];
        $category = new Category();
        $data['categories'] = $category->findAll();

        $product = new Product();
        $data['products'] = $product->where('fk_catid',$id)->findAll();
        return view('orderlist',$data);
    }

    public function particuler()
    {
        $data =[];
        $category = new Category();
        $data['categories'] = $category->findAll();
        return view('particuler',$data);
    }

    public function success()
    {
        $data =[];
        $category = new Category();
        $data['categories'] = $category->findAll();
        return view('success',$data);
    }

    public function signup()
    {
        $data = [];
        helper('form');
        if($this->request->getMethod() === 'POST'){
            $rules = [
                'username' =>'required|alpha_space|min_length[3]|max_length[10]',
                'email'    =>'required|min_length[8]|max_length[30]|valid_email|is_unique[users.email]',
                'password' =>'required|alpha_numeric|min_length[5]|max_length[8]',
                'c_password' =>'required|matches[password]',
                'mobile'   =>'required|integer|min_length[10]|max_length[10]',
                
            ];
            if (!$this->validate($rules)) {
                $data['validation']  = $this->validator;
            }else{
                $user =new User();
                $user_data= [
                    'username' =>$this->request->getVar('username'),
                    'email'  =>$this->request->getVar('email'),
                    'password' =>$this->request->getVar('password'),
                    'mobile' =>$this->request->getVar('mobile'),
                ];

                $user->save($user_data);
                session()->setFlashdata('success','Registered Successfully.');
                return redirect()->to(base_url('/login'));
                
                
                
            }
        }
        return view('signup',$data);
    }

    public function login(){
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

                $admin  = new User();
                $userdata = $admin->where('email',$email)->first();

                if($userdata){
                    if(password_verify($password,$userdata['password'])){

                        $session = session();
                        $user_data = [
                            'id' => $userdata['id'],
                            'username' => $userdata['username'],
                            'email' => $userdata['email'],
                            'isLoggedIn' => true
                        ];
                        session()->set($user_data);
                        return redirect()->to(base_url());
                    }else{
                        session()->setFlashdata('error','Invalid password');
                       
                    }
                }else{
                    session()->setFlashdata('error','Invalid Email');
                  
                }
            }
        }
            return view('login',$data);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    public function tailcss(){
        return view('tailcss');
    }

   
}