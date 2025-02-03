<?=$this->extend('admin/main_layout');?>

<?=$this->section('main_content');?>
                    <div class="right_box">
                        <div class="table_box1">
                            <h3>User List</h3>
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if(isset($users)):?>
                                    <?php foreach($users as $user):?>  
                                  <tr>
                                    <td><?=$user['username']?></td>
                                    <td><?=$user['email']?></td>
                                    <td><?=$user['mobile']?></td>
                                  </tr>
                                  <?php endforeach; endif;?>
                                 
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 


<?=$this->endSection('main_content');?>