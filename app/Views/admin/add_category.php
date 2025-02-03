<?=$this->extend('admin/main_layout');?>

<?=$this->section('main_content');?>
                    <div class="right_box">
                        <div class="products_box">
                            <?php if(isset($validation)):?>
                              <div class="col-12">
                                <div class="alert alert-danger">
                                    <?=$validation->listErrors();?>
                                </div>
                              </div>
                             <?php endif;?>   
                            <h3>Add Category</h3>
                            <form action="<?=base_url()?>admin/category" method="post" enctype="multipart/form-data" class="login_form">
                                
                                <input type="text" value="<?=set_value('category')?>" name="category" placeholder="Category Name" class="login_formele">
                                <input type="file" name="category_image" class="login_formele">

                                <div class="login_btnsc">
                                    <button class="login_btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 



<?=$this->endSection('main_content');?>