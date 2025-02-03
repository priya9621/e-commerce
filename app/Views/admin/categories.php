<?=$this->extend('admin/main_layout');?>

<?=$this->section('main_content');?>
                    <div class="right_box">
                        <div class="table_box1">
                            <h3>Category List</h3>
                            <a href="<?=base_url()?>admin/category" class="btn btn-info mb-2">Add Category</a>
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php if(!empty($categories)):?>
                                    <?php foreach($categories as $category):?>   
                                  <tr>
                                    <td><?=$category['cat_name']?></td>
                                    <td><img src="<?=base_url().'public/uploads/'.$category['cat_image'];?>" height="100px" width="100px" alt="image"></td>
                                    <td>
                                      <a class="btn btn-success btn-sm" href="<?=base_url()?>admin/update-category/<?=$category['id']?>">Update</a>|<a onclick="return confirm('Are you sure delete item ! ')" class="btn btn-danger btn-sm" href="<?=base_url()?>admin/delete-category/<?=$category['id']?>">Delete</a>
                                    </td>
                                  </tr>
                                <?php endforeach; else:  ?>
                                  <tr>
                                    <td class="text-danger text-center" colspan="2">Category Not Found</td>
                                  </tr>
                                <?php endif;  ?>  
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 


<?=$this->endSection('main_content');?>