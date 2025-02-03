<?=$this->extend('admin/main_layout');?>

<?=$this->section('main_content');?>
                    <div class="right_box">
                        
                        <div class="right_amountbox">
                            <div class="right_txtbox">
                                <div class="user_box">
                                    <h4>Total Order</h4>
                                </div>
                                <h5>200</h5>
                            </div>
                            <div class="right_txtbox1">
                                <div class="user_box">
                                    <h4>Total User</h4>
                                </div>
                                <h5>2000</h5>
                            </div>
                            <div class="right_txtbox2">
                                <div class="user_box">
                                    <h4>Complete</h4>
                                </div>
                                <h5>400</h5>
                            </div>
                            <div class="right_txtbox3">
                                <div class="user_box">
                                    <h4>Pending</h4>
                                </div>
                                <h6>100</h6>
                            </div>
                        </div>
                       
                        <div class="table_box">
                            <h3>All Products</h3>
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>qty</th>
                                    <th>MRP</th>
                                    <th>selling-price</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($products)): ?>
                                    <?php foreach($products as $product):?>
                                  <tr>
                                    <td><?=$product['product_name']?></td>
                                    <td><?=$product['product_des']?></td>
                                    <td class="table_txt"><?=$product['qty']?></td>
                                    <td><?=$product['MRP']?></td>
                                    <td><?=$product['selling_price']?></td>
                                    <td class="table_txt">
                                      <img src="<?=base_url().'public/uploads/'.$product['image'];?>" width="100px" height="100px" alt="image">
                                    </td>
                                    <td><?=$product['fk_catid']?></td>
                                  </tr>

                                  <?php endforeach; else:?>
                                    <tr>
                                      <td class="text-danger text-center" colspan="6">Product Not Found</td>
                                    </tr>
                                  <?php endif;?>  
                                </tbody>
                            </table>
                        </div>
                    </div>


<?=$this->endSection('main_content');?>

   