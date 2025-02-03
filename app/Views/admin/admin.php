<?=$this->extend('admin/main_layout');?>

<?=$this->section('main_content');?>
                    <div class="right_box">
                        <div class="table_box1">
                            <h3>Admin List</h3>
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach($admins as $admin): ?>
                                  <tr>
                                    <td><?=$admin['first_name']?></td>
                                    <td><?=$admin['last_name']?></td>
                                    <td><?=$admin['email']?></td>
                                    <td><?=$admin['phone']?></td>
                                  </tr>

                                <?php endforeach;?>  
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 


<?=$this->endSection('main_content');?>