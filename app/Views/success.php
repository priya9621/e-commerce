<?=$this->extend('common/main')?>
<?=$this->section('main_content')?>
    <!--products section start hare-->
    <section class="success_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="success_imgbox">
                        <svg xmlns="http://www.w3.org/2000/svg" class="success_icon" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                    </div>
                    <h3>Congratulation!</h3>
                    <h4>Well Done, Your Order Has been placed</h4>
                    <h5>Your Oredr Id: <span>#disk0199467</span></h5>
                    <div class="success_btnsc">
                        <a href="<?=base_url()?>particuler"><button class="success_btn">Track Your Order</button></a>
                    </div>
                </div>
            </div>    
        </div>
    </section>
    <!--products section end hare-->
<?=$this->endSection('main_content')?>