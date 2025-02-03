<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    public function products(){
        $data = [];
        helper('form');
        if($this->request->getMethod()==='POST'){
            $rules = [
                'category'      =>'required',
                'product_name'  =>'required',
                'MRP'           =>'required',
                'selling_price' =>'required',
                'qty'           =>'required',
                'product_image' =>'uploaded[product_image]|is_image[product_image]|mime_in[product_image,image/jpg,image/png,image/jpeg]|max_size[product_image,4048]',
                'description'   =>'required',
            ];

            if(!$this->validate($rules)){
                $data['validation']  = $this->validator;
            }else{
                $product  = new Product();
                $image = $this->request->getFile('product_image');
                $newImageName = $image->getClientName();
                $image->move(ROOTPATH.'public/uploads/',$newImageName);
                $data  = [
                    'product_name'=>$this->request->getVar('product_name'),
                    'product_des' =>$this->request->getVar('description'),
                    'qty'         =>$this->request->getVar('qty'),
                    'MRP'         =>$this->request->getVar('MRP'),
                    'selling_price'=>$this->request->getVar('selling_price'),
                    'image'        =>$newImageName,
                    'fk_catid'     =>$this->request->getVar('category'),
                ];
                $result = $product->save($data);
                session()->setFlashdata('success','Product Added Successfully.');
                return redirect()->to(base_url('admin/products'));
            }
        }

        $category = new Category();
        $data['categories'] = $category->findAll();
        return view('admin/products',$data);
    }

    public function recentorder(){
        return view('admin/recent_order');
    }

    public function dashboard(){
        $product = new Product();
        $data['products'] = $product->findAll();
        // $catId = $data['product'][0]['fk_catid'];
        // $category = new Category();
        // $data['cat_names'] = $category->where('id',$catId)->findAll();
        return view('admin/dashboard',$data);
    }
}
