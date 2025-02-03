<?=$this->extend('common/main')?>
<?=$this->section('main_content')?>
    <!--products section start hare-->
    <section class="details_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-12 col-12">
                    <div class="details_menubox">
                        <div class="">
                            <div class="item">
                                <img src="<?=base_url()?>public/uploads/<?=$productdetails['image']?>"  class="details_img">
                            </div>
                            <!-- <div class="item">
                                <img src="<?=base_url()?>public/images/D1301D76-E04D-EF09-6195-53229DE6D543_1-removebg-preview.png" class="details_img">
                            </div>
                            <div class="item">
                                <img src="<?=base_url()?>public/images/PngItem_1930140_1-removebg-preview.png" class="details_img">
                            </div> -->
                        </div>
                        <div class="details_btnsc">
                        <div id=input_div class="details_addtocart" style="display:none; background-color:orange;">
                            <input type="button" value="+" id="plus" onclick="add_to_cart(<?= $productdetails['id']?>,<?= $productdetails['selling_price']?>,<?= session()->get('id')?>)" class="plus_input">
                            <input type="text" size="2" value="1" id="addcount" class="details_inputtxt">
                            <input type="button" value="-" id="moins" onclick="minus(<?=$productdetails['id']?>,<?= session()->get('id')?>)" class="moins_input">
                        </div>

                        <!-- <span id="Pleasewait"></span> -->

                        <?php if (session()->get('isLoggedIn')):?>
                            <a id="addToCartbtn" href="javascript:void(0)"
                               onclick="add_to_cart(<?= $productdetails['id']?>,<?= $productdetails['selling_price']?>,<?= session()->get('id')?>)">
                            <button class="details_btn mt-2">ADD TO CART</button></a>

                        <?php else:?>
                            <a href="<?php echo base_url()?>login">
                            <button class="details_btn mt-2">ADD TO CART</button></a> 
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-12 col-12">
                    <div class="details_textbox">
                       <h3 id="mobileTitle"><?= $productdetails['product_name']?></h3>
                       <h4>₹<?= $productdetails['selling_price']?> <span><del>₹ <?= $productdetails['MRP']?></del></span></h4>
                       <!-- <P>Hurry, Only 1 left!</P> -->
                       <h5>Available offers</h5>
                       <h6><?=$productdetails['product_des']?></h6>
                       <!-- <h6><b>Partner OfferSign</b> up for Flipkart Pay Later and get Flipkart Gift Card worth ₹100*Know More</h6>
                       <h6>No Cost EMI on Bajaj Finserv EMI Card on cart value above ₹2999T&C</h6> -->
                    </div>
                    <!-- <div class="details_textbox1">
                        <h3>Specifications</h3>
                        <h6>Sales Package1 X Power Bank , Charging Cable , User Manual</h6>
                        <h6>Model Name Power Bank DX03 10000 Mah</h6>
                        <h6>Suitable Device Mobile</h6>
                        <h6>Number of Output Ports 3</h6>
                        <h6>Charging Cable Included Yes</h6>
                        <h6>Weight 195 g</h6>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!--products section end hare-->

<?=$this->endSection('main_content')?>