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
                            <h3>Add Products</h3>
                            <form action="" method="post" enctype="multipart/form-data" class="login_form">
                                <select name="category"  class="login_formele">
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $category):?>
                                    <option value="<?=$category['id'];?>"><?=$category['cat_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <input type="text" value="<?=set_value('product_name')?>" name="product_name" placeholder="Products Name" class="login_formele" >
                                <input type="text" value="<?=set_value('MRP')?>" name="MRP" placeholder="Products MRP" class="login_formele" >
                                <input type="text" value="<?=set_value('selling_price')?>" name="selling_price" placeholder="selling Price" class="login_formele" >
                                <input type="text" value="<?=set_value('qty')?>" name="qty" placeholder="Quntity" class="login_formele" >
                                <input type="file" value="<?=set_value('product_image')?>" name="product_image" class="login_formele" >
                                <textarea type="text" id="editor" name="description"  placeholder="Description" class="login_formele"><?=set_value('description')?></textarea>
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

    <script>
      CKEDITOR.replace('editor');
    </script>

<?=$this->endSection('main_content');?>