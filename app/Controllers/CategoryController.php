<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryController extends BaseController
{
    public function category(){
        $data = [];
        helper('form');

        if($this->request->getMethod() === 'POST'){
            $rules = [
                'category' =>'required|alpha_space|min_length[3]|max_length[15]',
                'category_image' =>'uploaded[category_image]|is_image[category_image]|mime_in[category_image,image/jpg,image/png,image/jpeg]|max_size[category_image,4048]',
                
            ];
            if (!$this->validate($rules)) {
                $data['validation']  = $this->validator;
            }else{
                $user =new Category();
                $image = $this->request->getFile('category_image');
                // $filepath = WRITEPATH.'uploads/'.$image->store();
                // $uploaded_fileinfo = new File($filepath);
                // $filename = esc($uploaded_fileinfo->getBasename());

                if ($image->isValid() && ! $image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(ROOTPATH .'public/uploads',$newName);
                }
                


                $user_data= [
                    'cat_name' =>$this->request->getVar('category'),
                    'cat_image'  =>$newName,
                ];

                $user->save($user_data);
                session()->setFlashdata('success','Category Added Successfully.');
                return redirect()->to(base_url('admin/categories'));
                
            }
        }
        return view('admin/add_category',$data);
    }


    public function categories(){
        $cat =new Category();
        $data['categories'] = $cat->findAll();
        return view('admin/categories',$data);
    }

    public function updateCategory($id){
        $data = [];
        helper('form');

        if($this->request->getMethod() === 'POST'){
           
            $rules = [
                'category' =>'required|alpha_space|min_length[3]|max_length[15]',
                // 'category_image' =>'uploaded[category_image]|is_image[category_image]|mime_in[category_image,image/jpg,image/png,image/jpeg]|max_size[category_image,4048]',
                
            ];
            if (!$this->validate($rules)) {
                $data['validation']  = $this->validator;
            }else{
                $user =new Category();
                $cat  =$user->find($id);
                $newName = $cat['cat_image'];

                
                $image = $this->request->getFile('category_image');

                // $filepath = WRITEPATH.'uploads/'.$image->store();
                // $uploaded_fileinfo = new File($filepath);
                // $filename = esc($uploaded_fileinfo->getBasename());
               
                if ($image->isValid() && ! $image->hasMoved()) {
                    if(file_exists(ROOTPATH.'public/uploads/'.$newName)){
                        unlink(ROOTPATH.'public/uploads/'.$newName);
                    }
                    $newName = $image->getRandomName();
                    $image->move(ROOTPATH .'public/uploads',$newName);
   
                }

                $user_data= [
                    'cat_name' =>$this->request->getVar('category'),
                    'cat_image'  =>$newName,
                ];
                // echo $id;
                // echo "gello";
                // die;
                $updateCategory = $user->update($id,$user_data);
                
                session()->setFlashdata('success','Category Updated Successfully.');
                return redirect()->to(base_url('admin/categories'));
                
            }
        }

        $category =new Category();
        $data['category'] = $category->where('id',$id)->first();
        return view('admin/updateCategory',$data);
    }

    public function deleteCategory($id){
        $product=  new Product();
        $deleteProduct = $product->where('fk_catid',$id)->delete();

        $category =new Category();
        $deleteCategory = $category->where('id',$id)->delete();

        if($deleteProduct && $deleteCategory){
            session()->setFlashdata('success','Category Deleted Successfully.');
            return redirect()->to(base_url('admin/categories'));

        }
        
        
    }
}
